<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penjualan_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT t.id,
                            t.tanggal,
                            listproduk.id,
                            listproduk.nama_produk,
                            t.qty,
                            t.total_bayar,
                            t.jumlah_uang,
                            t.diskon,
                            pel.nama as pelanggan,
                            t.nota,
                            peng.nama as kasir
                    FROM transaksi t
                        LEFT JOIN 
                        (
                            SELECT bar.id,
                                GROUP_CONCAT(p.nama_produk SEPARATOR ', ') as nama_produk
                            FROM (
                                SELECT transaksi.id,
                                        SUBSTRING_INDEX(SUBSTRING_INDEX(transaksi.barcode, ',', numbers.n), ',', - 1) barcode
                                FROM (
                                        SELECT 1 n
                                        UNION ALL
                                        SELECT 2
                                        UNION ALL
                                        SELECT 3
                                        UNION ALL
                                        SELECT 4
                                        ) numbers
                                        INNER JOIN transaksi ON CHAR_LENGTH(transaksi.barcode) - CHAR_LENGTH(REPLACE (transaksi.barcode, ',',
                                        '')) >= numbers.n - 1
                                ORDER BY id,
                                            n
                                ) bar
                                LEFT JOIN produk p on p.id = bar.barcode
                            GROUP BY bar.id
                        ) listproduk on listproduk.id = t.id
                        LEFT JOIN pelanggan pel on pel.id = t.pelanggan
                        LEFT JOIN pengguna peng on peng.id = t.kasir
                        ORDER BY t.tanggal DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
