<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
    }

    public function index()
    {
        $data['title'] = 'Pelanggan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pelanggan'] = $this->pelanggan_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pelanggan/index', $data);
    }

    public function addpelanggan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        );
        $this->db->insert('pelanggan', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Pelanggan');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pelanggan');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Pelanggan');
    }

    public function editpelanggan()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama' => $this->input->post('namaedit'),
            'jenis_kelamin' => $this->input->post('jkedit'),
            'alamat' => $this->input->post('alamatedit'),
            'telepon' => $this->input->post('teleponedit')
        );
        $this->db->where('id', $id);
        $this->db->update('pelanggan', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Pelanggan');
    }
}
