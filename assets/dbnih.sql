-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2022 at 03:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

DROP TABLE IF EXISTS `detail_transaksi`;
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `produk`, `qty`, `harga`) VALUES
(46, 59, 5, 1, '52000'),
(45, 59, 1, 1, '55000'),
(44, 59, 4, 1, '14000'),
(43, 59, 2, 1, '18000'),
(42, 58, 9, 1, '7000'),
(41, 57, 2, 1, '18000'),
(40, 56, 4, 1, '14000'),
(39, 55, 4, 3, '14000'),
(38, 55, 2, 2, '18000'),
(37, 55, 1, 1, '55000'),
(36, 54, 4, 3, '14000'),
(35, 54, 2, 2, '18000'),
(34, 54, 1, 1, '55000'),
(33, 53, 4, 2, '14000'),
(32, 53, 2, 2, '18000'),
(31, 53, 1, 2, '55000'),
(30, 52, 4, 1, '14000'),
(29, 52, 2, 1, '18000'),
(28, 52, 1, 2, '55000'),
(27, 51, 4, 1, '14000'),
(26, 50, 1, 1, '55000'),
(25, 49, 7, 1, '50000'),
(24, 49, 2, 1, '18000'),
(47, 59, 7, 1, '50000'),
(48, 59, 8, 1, '15000'),
(49, 60, 4, 2, '14000'),
(50, 61, 4, 3, '14000'),
(51, 62, 14, 1, '2500000'),
(52, 62, 12, 1, '2700000'),
(53, 63, 2, 1, '18000'),
(54, 63, 4, 1, '14000'),
(55, 64, 14, 1, '2500000'),
(56, 65, 13, 1, '1700000'),
(57, 65, 7, 1, '50000'),
(58, 65, 8, 1, '15000'),
(59, 66, 13, 2, '1700000'),
(60, 67, 12, 1, '2700000'),
(61, 67, 11, 1, '16000'),
(62, 68, 1, 1, '55000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

DROP TABLE IF EXISTS `kategori_produk`;
CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kategori`) VALUES
(2, 'Kebutuhan'),
(3, 'Makanan'),
(4, 'Konter');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` set('Pria','Wanita','Lainya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `alamat`, `telepon`) VALUES
(1, 'Adam', 'Pria', 'Seoul', '081237483291'),
(3, 'Bayu', 'Pria', 'Gedangan', '08991908721'),
(4, 'Ilyas ', 'Pria', 'Bantul', '0812312312'),
(5, 'Lintang Agustin', 'Pria', 'Karanganyar', '0821232141241');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `role`, `is_active`) VALUES
(1, 'admin', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', 'Admin', '1', 1),
(2, 'ibrahimalanshor', '$2y$10$5thNuizSyAdrGXC9A/WYd.StNiSRUy0eBZJ401hGBfUpwGINu9kyG', 'Ibrahim Al Anshor', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `harga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_modal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `barcode`, `nama_produk`, `kategori`, `satuan`, `harga`, `stok`, `terjual`, `harga_modal`) VALUES
(1, 'PULS ALPRB', 'Voucher Pulsa 50000', 1, 2, '55000', 19978, '1', '50000'),
(2, 'DJRM SPER', 'Djarum Super 12', 2, 1, '18000', 3, '3', '15000'),
(4, '0123123812319', 'Minyak', 2, 3, '14000', 151, '3', '12000'),
(5, 'VCR50K', 'Voucher 50K Pulsa', 4, 2, '52000', 82, '2', '50000'),
(7, 'MREDVELVET', 'Bubuk Red Velvet', 3, 1, '50000', 3, '1', '25000'),
(8, 'SOFTCASE', 'Softcase Smarthphone', 4, 3, '15000', 18, '0', '4000'),
(9, 'VCRM325GB3HR', 'Voucher Indosat 25 GB HR', 4, 2, '7000', 9, '0', '5000'),
(10, 'KBLDATATYPEC', 'Kabel Data Type .C', 4, 3, '15000', 10, '0', '6000'),
(11, 'ADAPTORROBOT1WATT', 'Adaptor Robot 10 WATT', 4, 3, '16000', 14, '0', '8000'),
(12, 'OPPOA51', 'OPPO A51', 4, 3, '2700000', 3, '0', '2500000'),
(13, 'REDMINOTE7', 'REDMI NOTE 7', 4, 3, '1700000', 1, '0', '1700000'),
(14, 'SAMSUNGM22', 'Samsung M22', 4, 3, '2500000', 2, '0', '2300000');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_produk`
--

DROP TABLE IF EXISTS `satuan_produk`;
CREATE TABLE IF NOT EXISTS `satuan_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan_produk`
--

INSERT INTO `satuan_produk` (`id`, `satuan`) VALUES
(1, 'Bungkus'),
(2, 'Voucher'),
(3, 'Pcs'),
(4, 'Liter');

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

DROP TABLE IF EXISTS `stok_keluar`;
CREATE TABLE IF NOT EXISTS `stok_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `barcode` int(11) NOT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_keluar`
--

INSERT INTO `stok_keluar` (`id`, `tanggal`, `barcode`, `jumlah`, `Keterangan`) VALUES
(1, '2020-02-21 13:42:01', 1, '10', 'rusak'),
(2, '2022-02-23 13:07:02', 5, '1', 'Kadaluarsa'),
(3, '2022-02-23 13:09:48', 5, '2', 'Kadaluarsa'),
(4, '2022-02-23 13:13:43', 5, '7', 'Kadaluarsa'),
(5, '2022-02-23 16:20:07', 7, '1', 'Rusak'),
(6, '2022-02-27 17:06:39', 9, '9999999999', 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

DROP TABLE IF EXISTS `stok_masuk`;
CREATE TABLE IF NOT EXISTS `stok_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `barcode` int(11) NOT NULL,
  `jumlah` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id`, `tanggal`, `barcode`, `jumlah`, `keterangan`, `supplier`) VALUES
(1, '2020-02-21 13:41:25', 1, '10', 'penambahan', NULL),
(2, '2020-02-21 13:41:40', 2, '20', 'penambahan', 1),
(3, '2020-02-21 13:42:23', 1, '10', 'penambahan', 2),
(4, '2022-01-20 09:37:43', 3, '100', 'penambahan', 3),
(5, '2022-01-20 09:38:25', 4, '100', 'penambahan', 3),
(6, '2022-02-22 12:39:30', 1, '20000', 'penambahan', NULL),
(7, '2022-02-23 09:20:15', 4, '100', 'penambahan', NULL),
(8, '2022-02-23 12:33:15', 5, '90', 'penambahan', 4),
(9, '2022-02-23 13:15:35', 5, '20', 'penambahan', 5),
(10, '2022-02-23 16:19:44', 7, '20', 'penambahan', 4),
(11, '2022-02-24 21:24:52', 8, '25', 'penambahan', 4),
(12, '2022-02-25 15:34:26', 2, '20', 'penambahan', 4),
(13, '2022-02-27 17:04:54', 9, '99999999999', 'penambahan', NULL),
(14, '2022-02-27 17:07:19', 9, '10', 'penambahan', NULL),
(15, '2022-02-27 17:10:39', 10, '10', 'penambahan', NULL),
(16, '2022-03-01 18:05:44', 11, '15', 'penambahan', NULL),
(17, '2022-03-02 10:16:43', 14, '4', 'penambahan', NULL),
(18, '2022-03-02 10:16:54', 13, '4', 'penambahan', NULL),
(19, '2022-03-02 10:17:04', 12, '5', 'penambahan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telepon`, `keterangan`) VALUES
(4, 'Bayu Prastyo', 'Gedangan RT 2 RW 4 Salam Karangpandan Karanganyar', '08991907216', 'Supplier Komponen Elektronik'),
(5, 'Esti Setyaningrum', 'Mojogedang', '089123912939129', 'Supplier Bunga'),
(7, 'Benny ', 'Kaling Tasikmadu', '08123123', 'Supplier Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

DROP TABLE IF EXISTS `toko`;
CREATE TABLE IF NOT EXISTS `toko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama`, `alamat`) VALUES
(1, 'AstraJingga Cell', 'Jl Kaling, Dukuh Kaling Tasikmadu Karanganyar');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `barcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_uang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelanggan` int(11) DEFAULT NULL,
  `nota` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasir` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `barcode`, `qty`, `total_bayar`, `jumlah_uang`, `diskon`, `pelanggan`, `nota`, `kasir`) VALUES
(51, '2022-02-25 22:35:53', '', '', '', '15000', '', NULL, 'TRANTKUN3', 1),
(52, '2022-02-25 23:08:14', '', '', '', '150000', '', NULL, 'TRANTKUN4', 1),
(53, '2022-02-25 23:30:31', '', '', '', '200000', '', NULL, 'TRANTKUN5', 1),
(54, '2022-02-25 23:32:01', '', '', '', '150000', '', NULL, 'TRANTKUN6', 1),
(55, '2022-02-25 23:38:23', '', '', '', '135000', '', NULL, 'TRANTKUN7', 1),
(56, '2022-02-27 13:59:02', '', '', '', '15000', '', NULL, 'TRANTKUN8', 1),
(57, '2022-02-27 14:06:19', '', '', '', '20000', '', NULL, 'TRANTKUN9', 1),
(58, '2022-02-27 17:13:20', '', '', '', '10000', '', NULL, 'TRANTKUN10', 1),
(59, '2022-02-27 18:04:25', '', '', '', '205000', '', NULL, 'TRANTKUN11', 1),
(60, '2022-03-01 18:36:26', '', '', '', '30000', '', NULL, 'TRANTKUN12', 1),
(61, '2022-03-01 18:37:09', '', '', '', '50000', '', NULL, 'TRANTKUN13', 1),
(62, '2022-03-02 10:47:42', '', '', '', '5300000', '', NULL, 'TRANTKUN14', 1),
(63, '2022-03-02 11:23:07', '', '', '', '35000', '', NULL, 'TRANTKUN15', 1),
(64, '2022-03-02 20:07:54', '', '', '', '2500000', '', NULL, 'TRANTKUN16', 1),
(65, '2022-03-03 12:15:05', '', '', '', '1770000', '', NULL, 'TRANTKUN17', 1),
(66, '2022-03-03 13:28:38', '', '', '', '3400000', '', NULL, 'TRANTKUN18', 1),
(67, '2022-03-03 15:35:20', '', '', '', '2720000', '', 3, 'TRANTKUN19', 1),
(68, '2022-03-03 15:35:58', '', '', '', '55000', '', NULL, 'TRANTKUN20', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
