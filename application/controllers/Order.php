<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('/');
        }
        $this->load->model('transaksi_model');
        $this->load->model('produk_model');
        $this->load->model('order_model');
        $this->load->model('stok_keluar_model');
        // $this->load->library('cart');
        $this->load->helper('form');
    }
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->produk_model->get_all_produk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('order/index', $data);
    }
    function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('produk_id'),
            'name' => $this->input->post('nama_produk'),
            'price' => $this->input->post('harga'),
            'qty' => $this->input->post('qty'),
        );
        $this->cart->insert($data);
        echo $this->show_cart();
    }
    function show_cart()
    {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
				<tr>
					<td>' . $items['name'] . '</td>
					<td>' . number_format($items['price']) . '</td>
					<td>' . $items['qty'] . '</td>
					<td>' . number_format($items['subtotal']) . '</td>
					<td><button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
				</tr>
			';
        }
        $output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2">' . 'Rp ' . number_format($this->cart->total()) . '</th>
			</tr>
            
		';
        return $output;
    }
    function load_cart()
    {
        echo $this->show_cart();
    }
    function hapus_cart()
    {
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    public function proses_order()
    {
        $data_order = array(
            'tanggal' => date('Y-m-d H:i:s')
        );
        $id_order = $this->order_model->tambah_order($data_order);

        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = array(
                    'transaksi_id' => $id_order,
                    'produk' => $item['id'],
                    'qty' => $item['qty'],
                    'harga' => $item['price']
                );
                $id = $item['id'];
                $jumlah = $item['qty'];
                $stok = $this->stok_keluar_model->getStok($id)->stok;
                $rumus = max($stok - $jumlah, 0);
                $addStok = $this->stok_keluar_model->addStok($id, $rumus);
                $proses = $this->order_model->tambah_detail_order($data_detail);
            }
        }
        //-------------------------Hapus shopping cart--------------------------		
        $this->cart->destroy();
        redirect('Order');
    }
}
