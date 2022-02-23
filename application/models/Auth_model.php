<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('pengguna');
    }

    public function getToko()
    {
        $this->db->select('nama, alamat');
        return $this->db->get('toko')->row();
    }
}
