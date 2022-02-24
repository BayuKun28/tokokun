<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function tambah_order($data)
    {
        $this->db->insert('transaksi', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
    public function tambah_detail_order($data)
    {
        $this->db->insert('detail_transaksi', $data);
    }
}
