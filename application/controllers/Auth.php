<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page TokoKun';
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                    // if ($user['role_id'] == 1) {
                    //     redirect('dashboard');
                    // } elseif ($user['role_id'] == 2) {
                    //     redirect('dashboard');
                    // } elseif ($user['role_id'] == 3) {
                    //     redirect('dashboard/pengunjung');
                    // }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password.!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not active.!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered.!</div>');
            redirect('auth');
        }
    }
    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/auth_header');
        //     $this->load->view('auth/registration');
        //     $this->load->view('templates/auth_footer');
        // } else {
        //     $data = [
        //         'name' => htmlspecialchars($this->input->post('name', true)),
        //         'email' => htmlspecialchars($this->input->post('email', true)),
        //         'image' => 'default.jpg',
        //         'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        //         'role_id' => 2,
        //         'is_active' => 1,
        //         'date_created' => time()
        //     ];
        //     $this->db->insert('user', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation!, Your Account Has been Created</div>');
        //     redirect('auth');
        // }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have been LogOut.!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Acces Blocked';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/blocked', $data);
        $this->load->view('templates/footer', $data);
    }
}
