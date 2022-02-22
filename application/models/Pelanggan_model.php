<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT * FROM pelanggan";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
