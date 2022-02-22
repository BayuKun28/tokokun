<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public function transaksiHari($hari)
    {
        return $this->db->query("SELECT COUNT(*) AS total FROM transaksi WHERE DATE_FORMAT(tanggal, '%d %m %Y') = '$hari'")->row();
    }

    public function transaksiBulan($tglawal, $tglakhir)
    {
        $sql = "SELECT COUNT(*) as total FROM transaksi WHERE DATE_FORMAT(tanggal, '%d %m %Y') BETWEEN '$tglawal' AND '$tglakhir' ";
        return $this->db->query($sql)->row();
    }
}
