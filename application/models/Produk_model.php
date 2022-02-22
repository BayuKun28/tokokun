<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT p.id,p.barcode,
                    p.nama_produk,
                    p.kategori as kdkategori,
                    kp.kategori,
                    p.satuan as kdsatuan,
                    sp.satuan,
                    p.harga,
                    p.stok,
                    p.harga_modal 
                    FROM produk p
                    JOIN kategori_produk kp on kp.id = p.kategori
                    JOIN satuan_produk sp on sp.id = p.satuan";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getsatuanselect2($sat)
    {
        $query = "SELECT * FROM satuan_produk WHERE satuan LIKE '%$sat%'";
        return $this->db->query($query)->result_array();
        // die($query);
        echo json_encode($query);
    }

    public function getkategoriselect2($kat)
    {
        $query = "SELECT * FROM kategori_produk WHERE kategori LIKE '%$kat%'";
        return $this->db->query($query)->result_array();
        // die($query);
        echo json_encode($query);
    }
}
