<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
    }
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/index', $data);
    }

    public function transaksi_hari()
    {
        $now = date('d m Y');
        $total = $this->transaksi_model->transaksiHari($now);
        echo json_encode($total);
    }
    public function transaksi_bulan()
    {
        $tglawal = date('Y-m-01');
        $tglakhir = date('d-m-t');

        $total = $this->transaksi_model->transaksiBulan($tglawal, $tglakhir);
        echo json_encode($total);
    }
}
