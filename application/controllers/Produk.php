<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('/');
        }
        $this->load->model('produk_model');
    }

    public function index()
    {
        $data['title'] = 'Produk';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->produk_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produk/index', $data);
    }

    public function getdatasatuan()
    {
        $sat = $this->input->get('sat');
        $query = $this->produk_model->getsatuanselect2($sat, 'satuan');
        echo json_encode($query);
    }

    public function getdatakategori()
    {
        $kat = $this->input->get('kat');
        $query = $this->produk_model->getkategoriselect2($kat, 'kategori');
        echo json_encode($query);
    }

    public function addproduk()
    {
        $data = array(
            'barcode' => $this->input->post('barcode'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kategori' => $this->input->post('kategori'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'harga_modal' => $this->input->post('harga_modal'),
            'stok' => $this->input->post('stok'),
            'terjual' => '0'
        );
        $this->db->insert('produk', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Produk');
    }



    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('produk');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Produk');
    }

    public function editproduk()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'barcode' => $this->input->post('barcodeedit'),
            'nama_produk' => $this->input->post('nama_produkedit'),
            'kategori' => $this->input->post('kategoriedit'),
            'satuan' => $this->input->post('satuanedit'),
            'harga' => $this->input->post('hargaedit'),
            'harga_modal' => $this->input->post('harga_modaledit'),
            'stok' => $this->input->post('stokedit')
        );
        $this->db->where('id', $id);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Produk');
    }
    public function get_nama()
    {
        header('Content-type: application/json');
        $id = $this->input->post('id');
        echo json_encode($this->produk_model->getNama($id));
    }

    public function get_stok()
    {
        header('Content-type: application/json');
        $id = $this->input->post('id');
        echo json_encode($this->produk_model->getStok($id));
    }
    public function get_barcode()
    {
        header('Content-type: application/json');
        $barcode = $this->input->post('barcode');
        $search = $this->produk_model->getBarcode($barcode);
        foreach ($search as $barcode) {
            $data[] = array(
                'id' => $barcode->id,
                'text' => $barcode->barcode
            );
        }
        echo json_encode($data);
    }
}
