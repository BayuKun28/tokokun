<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_masuk_model extends CI_Model
{

    public function stokHari($hari)
    {
        return $this->db->query("SELECT SUM(jumlah) AS total FROM stok_masuk WHERE DATE_FORMAT(tanggal, '%d %m %Y') = '$hari'")->row();
    }
}
