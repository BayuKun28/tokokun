<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('/');
        }
        $this->load->model('laporan_penjualan_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Penjualan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['penjualan'] = $this->laporan_penjualan_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan_penjualan/index', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Laporan_penjualan');
    }
}
