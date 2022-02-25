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
    public function getnomornota()
    {
        $sql = "SELECT (CONCAT(('TRANTKUN'),a.nomornota+1)) as nomornota FROM
        (SELECT SUBSTRING(t.nota, 9) as nomornota FROM transaksi t ORDER BY t.id DESC LIMIT 1) a";

        return $this->db->query($sql)->row()->nomornota;
        echo json_encode($sql);
        // $query = $this->db->query($sql);
        // if ($query->num_rows > 0) {
        //     $row = $query->row();
        //     $n = ((int)$row->nomornota) + 1;
        // } else {
        //     $n = "1";
        // }
        // $nomorakta = "TRANTKUN" . $n;
        // return $nomorakta;
    }
}
