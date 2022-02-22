<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_masuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('stok_masuk_model');
    }

    public function index()
    {
        $this->load->view('stok_masuk');
    }

    public function stok_hari()
    {
        header('Content-type: application/json');
        $now = date('d m Y');
        $total = $this->stok_masuk_model->stokHari($now);
        echo json_encode($total->total == null ? 0 : $total);
    }
}
