<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }

    public function index()
    {
        $data['title'] = 'Laporan Stok Masuk';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $toko = $this->db->get('toko')->row();
        $data['toko'] = $toko;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengaturan/index', $data);
    }

    public function edit()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->where('id', 1);
        $this->db->update('toko', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Pengaturan');
    }
}
