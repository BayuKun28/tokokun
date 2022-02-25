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
        $sql = "SELECT (CASE WHEN (SELECT t.id from transaksi t LIMIT 1) IS NULL THEN 'TRANTKUN1' 
                ELSE
                (SELECT (CONCAT(('TRANTKUN'),a.nomornota+1)) as nomornota 
                FROM
                (SELECT SUBSTRING(t.nota, 9) as nomornota 
                FROM transaksi t ORDER BY t.id DESC LIMIT 1) a)
                END) as nomornota";

        return $this->db->query($sql)->row()->nomornota;
        echo json_encode($sql);
    }

    public function getnotacetak()
    {
        $sql = "SELECT nota FROM transaksi ORDER BY id DESC LIMIT 1";
        return $this->db->query($sql)->row()->nota;
        echo json_encode($sql);
    }
    public function totalcetak()
    {
        $sql = "SELECT  
                SUM(p.harga*dt.qty) as total
                FROM transaksi t 
                LEFT JOIN detail_transaksi dt on dt.transaksi_id = t.id
                LEFT JOIN produk p on p.id = dt.produk 
                WHERE t.id = (SELECT id FROM transaksi ORDER BY id DESC LIMIT 1)
                ORDER BY p.id ASC";
        return $this->db->query($sql)->row()->total;
        echo json_encode($sql);
    }

    public function getbayar()
    {
        $sql = "SELECT jumlah_uang FROM transaksi ORDER BY id DESC LIMIT 1";
        return $this->db->query($sql)->row()->jumlah_uang;
        echo json_encode($sql);
    }

    public function getlistnota()
    {
        $sql = "SELECT  p.nama_produk,dt.qty ,
                (p.harga*dt.qty) as total
                FROM transaksi t 
                LEFT JOIN detail_transaksi dt on dt.transaksi_id = t.id
                LEFT JOIN produk p on p.id = dt.produk 
                WHERE t.id = (SELECT id FROM transaksi ORDER BY id DESC LIMIT 1)
                ORDER BY p.id ASC";
        return $this->db->query($sql)->result_array();
        echo json_decode($sql);
    }
}
