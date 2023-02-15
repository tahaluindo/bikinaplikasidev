-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: d9c88q3e09w6fdb2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com
-- Generation Time: Aug 17, 2020 at 10:47 AM
-- Server version: 5.7.23-log
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q46esnnk5nide3f5`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `harga_satuan` int(8) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga_total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_barang`, `harga_satuan`, `qty`, `harga_total`) VALUES
(32, 20, 263, 40000, 5, 200000),
(33, 21, 253, 180000, 3, 540000),
(34, 22, 261, 680000, 2, 1360000),
(35, 23, 262, 230000, 2, 460000),
(36, 23, 261, 680000, 6, 4080000),
(37, 23, 263, 40000, 9, 360000),
(38, 24, 263, 40000, 2, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `measure`
--

CREATE TABLE `measure` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `measure`
--

INSERT INTO `measure` (`id`, `name`, `created_at`, `updated_at`) VALUES
(9, 'pcs', '2019-11-08 03:20:21', '2019-11-08 03:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(5) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `alamat_kirim` varchar(50) NOT NULL,
  `total_berat` smallint(6) NOT NULL DEFAULT '0',
  `ongkir` mediumint(9) NOT NULL DEFAULT '0',
  `status` enum('Belum Konfirmasi','Sudah Konfirmasi','Dikirim','Selesai') NOT NULL DEFAULT 'Belum Konfirmasi',
  `no_resi` varchar(30) DEFAULT NULL,
  `bukti_transfer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `id_pelanggan`, `alamat_kirim`, `total_berat`, `ongkir`, `status`, `no_resi`, `bukti_transfer`) VALUES
(20, '2020-08-03', 23, 'jambi', 0, 0, 'Selesai', '12345', 'bukti_transfer/AWAS!!-Penipuan-Berkedok-Transfer-Rekening-BCA-2.jpg'),
(21, '2020-08-03', 23, 'jakarta', 0, 0, 'Selesai', NULL, 'bukti_transfer/AWAS!!-Penipuan-Berkedok-Transfer-Rekening-BCA-2.jpg'),
(22, '2020-08-03', 23, 'Jambi', 0, 0, 'Selesai', '12412435', 'bukti_transfer/AWAS!!-Penipuan-Berkedok-Transfer-Rekening-BCA-2.jpg'),
(23, '2020-08-03', 20, 'Jambi', 14000, 350000, 'Selesai', '324', 'bukti_transfer/avatar.jpg'),
(24, '2020-08-03', 20, 'dimana mana', 0, 0, 'Belum Konfirmasi', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('N','Y') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Januari', 'Y', '2020-07-03 22:56:34', '2020-07-04 05:38:31'),
(2, 'Februari', 'N', '2020-07-04 05:38:04', '2020-07-04 05:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `measure_id` int(10) UNSIGNED NOT NULL,
  `price` int(20) NOT NULL,
  `price_grosiran` int(11) NOT NULL,
  `warn_stock` int(11) NOT NULL,
  `berat` smallint(6) NOT NULL DEFAULT '0',
  `gambar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `supplier_id`, `name`, `code`, `measure_id`, `price`, `price_grosiran`, `warn_stock`, `berat`, `gambar`, `created_at`, `updated_at`) VALUES
(263, 3, 'Gurita Ibu', 'BFP5138', 9, 40000, 38000, 5, 0, 'gambar/IMG_20200729_WA0061.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 3, 'Matras Baby Family', 'BFP5137', 9, 230000, 200000, 5, 1000, 'gambar/IMG_20200729_WA0073.jpg', '0000-00-00 00:00:00', '2020-08-03 12:05:32'),
(261, 3, 'Stroller Pliko Bintang', 'BFP5136', 9, 680000, 650000, 7, 2000, 'gambar/IMG_20200729_WA0100.jpg', '0000-00-00 00:00:00', '2020-08-03 12:05:57'),
(260, 3, 'Set Pillow Baby Family', 'BFP5135', 9, 130000, 120000, 7, 0, 'gambar/IMG_20200729_WA0069.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 3, 'Geos Baby Scot', 'BFP5134', 9, 126000, 110000, 6, 0, 'gambar/IMG_20200729_WA0110.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 3, 'Bedong Belva x6pcs', 'BFP5133', 9, 192000, 175000, 6, 0, 'gambar/IMG_20200729_WA0083.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 3, 'Corset Perfact', 'BFP5132', 9, 65000, 55000, 6, 0, 'gambar/IMG_20200729_WA0060.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 3, 'Bedong Happy kid x6pcs', 'BFP5131', 9, 80000, 70000, 5, 0, 'gambar/IMG_20200729_WA0062.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 3, 'Bedong Felicia x6 pcs', 'BFP5130', 9, 160000, 150000, 7, 0, 'gambar/IMG_20200729_WA0064.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 3, 'Matras Bayi', 'BFP5129', 9, 90000, 80000, 4, 0, 'gambar/IMG_20200729_WA0087.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 3, 'Gendongan Bayi Scot Boneka', 'BFP5128', 9, 180000, 150000, 4, 0, 'gambar/IMG_20200729_WA0104.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 3, 'Kasur Bayi Creative', 'BFP5127', 9, 1050000, 1000000, 4, 0, 'gambar/IMG_20200729_WA0089.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 3, 'Kelambu Nishikawa', 'BFP5126', 9, 72000, 70000, 5, 0, 'gambar/IMG_20200729_WA0085.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 3, 'Baby Scot Gendong Kaos', 'BFP5125', 9, 88000, 77000, 7, 0, 'gambar/IMG_20200729_WA0111.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 3, 'Gendongan Line Series Baby 2 Go', 'BFP5123', 9, 380000, 350000, 3, 0, 'gambar/IMG-20200729-WA0108.jpg', '0000-00-00 00:00:00', '2020-08-03 02:11:24'),
(249, 3, 'Matras Baby Bess', 'BFP5124', 9, 90000, 80000, 5, 0, 'gambar/IMG_20200729_WA0081.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 3, 'Gendongan Animal Series Baby 2 Go', 'BFP5122', 9, 256000, 230000, 3, 0, 'gambar/IMG_20200729_WA0115.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 3, 'Bantal Penyangga Botol Susu', 'BFP5121', 9, 90000, 75000, 4, 0, 'gambar/IMG_20200729_WA0068.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 3, 'Handuk Bayi Merdeka', 'BFP5120', 9, 58000, 50000, 5, 0, 'gambar/IMG_20200729_WA0057.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 3, 'Matras Bayi Full Character', 'BFP5117', 9, 120000, 110000, 5, 0, 'gambar/IMG_20200729_WA0088.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 3, 'Kelambu 1 Kawat', 'BFP5119', 9, 60000, 55000, 6, 0, 'gambar/IMG_20200729_WA0077.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 3, 'Handuk Bayi ', 'BFP5118', 9, 45000, 40000, 4, 0, 'gambar/IMG_20200729_WA0055.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 3, 'Baby Walker Royal Biasa', 'BFP5116', 9, 350000, 330000, 4, 0, 'gambar/IMG_20200729_WA0090.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 3, 'Washlap Libby', 'BFP5113', 9, 35000, 30000, 6, 0, 'gambar/IMG_20200729_WA0059.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 3, 'Gendongan Baby Scot ', 'BFP5115', 9, 262000, 240000, 7, 0, 'gambar/IMG-20200729-WA0116.jpg', '0000-00-00 00:00:00', '2020-08-03 02:09:09'),
(239, 3, 'Baby Scot Pillow Set', 'BFP5114', 9, 162000, 145000, 5, 0, 'gambar/IMG_20200729_WA0066.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 3, 'Bantal Ibu Menyusui Baby Family', 'BFP5112', 9, 125000, 115000, 6, 0, 'gambar/IMG_20200729_WA0072.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 3, 'Handuk Bayi Full Print ', 'BFP5111', 9, 54000, 50000, 7, 0, 'gambar/IMG_20200729_WA0058.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 3, 'Baby Scot Matras Bayi Series 2', 'BFP5108', 9, 300000, 280000, 4, 0, 'gambar/IMG_20200729_WA0082.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 3, 'Gendongan Baby Scot Abu Sling', 'BFP5110', 9, 165000, 145000, 4, 0, 'gambar/IMG_20200729_WA0105.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 3, 'Hipseat Baby Scot', 'BFP5109', 9, 382000, 370000, 3, 0, 'gambar/IMG_20200729_WA0106.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 3, 'Baby Walker Royal', 'BFP5107', 9, 400000, 380000, 5, 0, 'gambar/IMG_20200729_WA0094.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 3, 'Bedong Jenny x6 pcs', 'BFP5105', 9, 80000, 70000, 7, 0, 'gambar/IMG_20200729_WA0084.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 3, 'Kasur Bayi Full Print', 'BFP5106', 9, 182000, 170000, 5, 0, 'gambar/IMG_20200729_WA0086.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 3, 'Gendongan Baby Scot Platinum', 'BFP5104', 9, 456000, 438000, 5, 0, 'gambar/IMG_20200729_WA0109.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 3, 'Gendongan Baby Scot Carrier', 'BFP5103', 9, 118000, 110000, 5, 0, 'gambar/IMG_20200729_WA0117.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 3, 'Baby Walker Family 3in1', 'BFP5101', 9, 450000, 440000, 4, 0, 'gambar/IMG_20200729_WA0114.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 3, 'Bantal Ibu Menyusui Baby Family', 'BFP5102', 9, 140000, 120000, 7, 0, 'gambar/IMG_20200729_WA0071.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 8, 'Baju Renang Bayi', 'BFP0200', 9, 90000, 89000, 4, 0, 'gambar/f4162c2eba9b59dfc09d6dbfd00ae5ab.jpg', '2020-08-03 01:51:49', '2020-08-03 02:09:29'),
(225, 3, 'Storller Labelle', 'BFP5100', 9, 550000, 500000, 3, 0, 'gambar/IMG_20200729_WA0099.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 3, 'Gendong Sling Baby Scot', 'BFP5139', 9, 128000, 120000, 4, 0, 'gambar/IMG_20200729_WA0102.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Utama', '2020-07-04 05:59:59', '2020-07-04 06:37:22'),
(4, 'bbb', '2020-07-04 08:33:20', '2020-07-04 08:33:20'),
(5, 'admin', '2020-07-28 23:48:34', '2020-07-28 23:48:34'),
(6, 'Sarida', '2020-07-28 23:53:15', '2020-07-28 23:53:15'),
(7, 'Santi', '2020-08-02 07:48:35', '2020-08-02 07:48:35'),
(8, 'Baby Scot', '2020-08-02 22:35:02', '2020-08-02 22:35:02'),
(9, 'Putra', '2020-08-02 23:19:42', '2020-08-02 23:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `price` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `type` enum('S','B','SO','retur_penjualan','retur_barang') COLLATE utf8_unicode_ci NOT NULL,
  `periode_id` int(10) UNSIGNED NOT NULL,
  `catatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `product_id`, `date`, `price`, `qty`, `type`, `periode_id`, `catatan`, `created_at`, `updated_at`) VALUES
(54, 249, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:39:02', '2020-08-03 01:39:02'),
(53, 248, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:38:52', '2020-08-03 01:38:52'),
(52, 250, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:38:41', '2020-08-03 01:38:41'),
(51, 251, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:38:32', '2020-08-03 01:38:32'),
(50, 252, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:38:24', '2020-08-03 01:38:24'),
(49, 253, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:38:14', '2020-08-03 09:44:45'),
(48, 254, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:38:04', '2020-08-03 01:38:04'),
(47, 255, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:37:52', '2020-08-03 01:37:52'),
(46, 256, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:37:40', '2020-08-03 01:37:40'),
(45, 257, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:37:29', '2020-08-03 01:37:29'),
(44, 258, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:37:19', '2020-08-03 01:37:19'),
(43, 259, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:37:09', '2020-08-03 01:37:09'),
(42, 260, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:36:48', '2020-08-03 01:36:48'),
(41, 261, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:36:38', '2020-08-03 09:44:52'),
(40, 262, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:36:29', '2020-08-03 09:44:52'),
(39, 263, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:36:20', '2020-08-03 09:44:52'),
(55, 247, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:39:12', '2020-08-03 01:39:12'),
(56, 246, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:40:38', '2020-08-03 01:40:38'),
(57, 245, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:40:54', '2020-08-03 01:40:54'),
(58, 242, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:41:10', '2020-08-03 01:41:10'),
(59, 244, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:41:25', '2020-08-03 01:41:25'),
(60, 243, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:41:51', '2020-08-03 01:41:51'),
(61, 241, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:42:03', '2020-08-03 01:42:03'),
(62, 238, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:42:15', '2020-08-03 01:42:15'),
(63, 240, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:42:35', '2020-08-03 01:42:35'),
(64, 239, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:42:49', '2020-08-03 01:42:49'),
(65, 237, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:43:04', '2020-08-03 01:43:04'),
(66, 236, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:43:18', '2020-08-03 01:43:18'),
(67, 233, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:43:34', '2020-08-03 01:43:34'),
(68, 235, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:43:44', '2020-08-03 01:43:44'),
(69, 234, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:43:57', '2020-08-03 01:43:57'),
(70, 232, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:44:10', '2020-08-03 01:44:10'),
(71, 230, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:44:22', '2020-08-03 01:44:22'),
(72, 231, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:44:35', '2020-08-03 01:44:35'),
(73, 229, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:44:48', '2020-08-03 01:44:48'),
(74, 228, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:45:01', '2020-08-03 01:45:01'),
(75, 226, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:45:20', '2020-08-03 01:45:20'),
(76, 227, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:45:33', '2020-08-03 01:45:33'),
(77, 225, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:45:50', '2020-08-03 17:29:25'),
(78, 264, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:46:02', '2020-08-03 01:46:02'),
(79, 265, '2020-08-03', 0, 100, 'SO', 1, '-', '2020-08-03 01:52:14', '2020-08-03 17:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('SU','U') COLLATE utf8_unicode_ci NOT NULL,
  `blocked` enum('N','Y') COLLATE utf8_unicode_ci NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_hp`, `password`, `role`, `blocked`, `last_login_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'owner@gmail.com', '', '$2y$10$4NfpilLJhqYEsgkqimZ29O.kgxbJGH1t4lNcmqB6sBu8wN4m7WjRu', 'U', 'N', NULL, 'lZkZkVWg5lddjKG6s3TuFniQphJ4O9SBht20w9BkZYyfvddW0Qm5IivC2wBY', '2019-11-08 03:20:21', '2020-07-28 23:37:42'),
(2, 'Admin', 'admin@gmail.com', '', '$2y$10$ZzDOGcRIoNVmUoCehYPY5OkV1yKfkyWK148rLREcaxopVKXoAApju', 'SU', 'N', NULL, 'iPm4XzJQTZsAfVySNOXU9XxpdK9AZByyOUK0Efxp6kBzPKso6V1CRr8uPSZd', '2019-11-08 03:20:21', '2020-08-03 17:33:44'),
(4, 'sdfsdfs', 'sdfsdf@gmail.com', '', '$2y$10$kFRrc7zPo2wWtjhUw8EbLekI2K/lnJt165y5o.BCmo3mx/rUQ9Q52', 'SU', 'N', NULL, 'Is6eWyessrhELKcuZKnS4Z60ThV3dhnqaKm5IWW3YXm5OYZPooqjOPG7NFNw', '2020-07-28 13:57:56', '2020-07-28 13:58:48'),
(3, 'sdfsdfs', 'sdfsfsf@gmail.com', '', '$2y$10$z2EXcF2qbgToddo1DbaEU.WHaZWFKG4g8WLcL92JCitzrS0xd1mp6', 'SU', 'N', NULL, 'nd2UI4Mwmpf24aK0K3KlXwZx30C0wIZo7VOXT3i6WpYEV52lqs7sh5C7QyqW', '2020-07-28 13:54:46', '2020-07-28 13:54:51'),
(5, 'hdfhdfghdfhfd', 'hdfhdfghdfhfd@gmail.com', '', '$2y$10$0xvO53E7P32wxi87B73YSuZKHBa.LMJLDUVPsR3BKWto8ojoI7bRG', 'SU', 'N', NULL, 'CgqJaLb2SMbn3OO0meubFUV6kYbl0prlRQ0VbBia6L5eZ9CISPhvyQ5vpGcO', '2020-07-28 13:59:07', '2020-07-28 13:59:40'),
(6, 'sdfdsfdsf', 'sdgssdgsgdsgsf@gmail.com', '', '$2y$10$VIUHMvdU7qTsU36ABZCpH.0v6Qqb9ygWqhZuGgkmMrcvcp6NTEDra', 'SU', 'N', NULL, 'yW2j8TzasYDpxLVhpsUiiACyuQBhyxvwm0wXpSx51sL2t3klsuBLFygunBiX', '2020-07-28 14:00:02', '2020-07-28 14:00:55'),
(7, 'sdfsdfsdf', 'pendaftar1@gmail.com', '', '$2y$10$tYGWjQvTbVEYW4e3ynI7FuNJjTs11HYCqemrUGHKoZPkuWaJzvbby', 'SU', 'N', NULL, '2CdRfQZMOkgMO1xYpoCKKMSf6i32GYxMsBDkjHEeJ4YU8uxE4P5Sgf52HoCV', '2020-07-28 14:01:08', '2020-07-28 14:04:16'),
(8, 'sdfssfsdfsd', 'fgdfhfdh@gmail.com', '', 'fgdfhfdh@gmail.com', 'SU', 'N', NULL, NULL, '2020-07-28 14:07:39', '2020-07-28 14:07:39'),
(9, 'sdfsdfsdfsdfsdfsdfsf', 'sdfsdfsdfsdfsdfsdfsdf@gmail.com', '', '$2y$10$VW13r2LP3NbhOwiC3yssFudwIWrZO0ACfBRGb/Qu0x00DsOTx8edC', 'SU', 'N', NULL, NULL, '2020-07-28 14:10:45', '2020-07-28 14:10:45'),
(10, 'gbbvxcbvxcbxcbx', 'xcbxcbxcbxcb@gmail.com', '', '$2y$10$wNc/R6PeuHOkCgswSk2SXOKRK0UwZO3N9ua78jdHmi0aOlEEK164W', 'SU', 'N', NULL, NULL, '2020-07-28 14:11:17', '2020-07-28 14:11:17'),
(11, 'gbbvxcbvxcbxcbxdfhdh', 'gbbvxcbvxcbxcbxdfhdh@gmail.com', '47363636345746456', '$2y$10$0qIh1W72aAYwB1PFZmxbj.NrKpe7ToWUzpG.EsZI0Hvv.AcsEdKXe', 'SU', 'N', NULL, NULL, '2020-07-28 14:13:11', '2020-07-28 14:13:11'),
(12, 'weaasdada', 'asdasdasdasd@gmail.com', '574746', '$2y$10$v.1TAkHTmOfit6WuRyg10OIKoqRgcu60r0ZHgHczHxpZYEjoV9UXu', 'SU', 'N', NULL, '2XHUT5R5H7eBWMhHQ3IdW5D9Ja1fX08c7dG5ZEE9xpyFbnaquLTsRag1fsbN', '2020-07-28 21:21:20', '2020-07-28 21:22:19'),
(13, 'lala', 'rehhannugraha20@gmail.com', '0895342681411', '$2y$10$W73bp8C0FhYp1rkj.s1eZuh1fZiuyT97l7y4c.SILRVJpi67MVD7C', 'SU', 'N', NULL, 'ps4XGkypeTzROJSDtqSfnG4Jdaz1qlKFzYITgCfUNqIP4MAYcNLbmmCTHHNY', '2020-07-28 23:13:16', '2020-07-28 23:16:56'),
(14, 'indah', '1234ayam@yahoo.com', '08218345678', '$2y$10$x2USf1x19Q/xkROMRxLvq.AFvDQ1UX5DKp0ackpF5bqZL/5yP6tva', 'SU', 'N', NULL, 'c2QtFEsnRDc0lb2g5MVDNeTqBBTwkS7zAUfc7bxbSU477LkuhZGPockmvoHK', '2020-07-28 23:54:23', '2020-07-31 10:51:05'),
(15, 'sdfsfsfsfsfsfsfs', 'sdfsdfsdfsdf@gmail.com', 'sdfsdfsdfsdf@gmail.c', '$2y$10$Qwsf106v5zhMg6wYZrqB7OD68DcWW8toiKNIWYLAjwMUkDygxu/di', 'SU', 'N', NULL, NULL, '2020-07-28 23:55:24', '2020-07-28 23:55:24'),
(16, 'ayam', '123ayam@yahoo.com', '080577662857', '$2y$10$WapXyVBYySeDbrlkXJWekO9jQ8Xe9MOuwvKzxJTOAUw2IQIVMFrOe', 'SU', 'N', NULL, '4H4NJCRaFcWu8MGQXgl5R6TXAIXQNC9bHqqfE12wrLNHELpNJocDZvzhuBXa', '2020-07-29 00:09:05', '2020-07-29 00:17:05'),
(17, 'Rani', 'eani@gmail.com', '09876462', '$2y$10$dC7K20HRUwwXR.U5tMcNZuZyUwaQwIBr9ymko3SyanOUgfMrXwOgC', 'SU', 'N', NULL, 'aZ1eT2vpJKG1YnvqlR2N5sm2BYhYPB3HY4nN6klpRClnsM7WG4iyAJYJCoNp', '2020-07-29 00:22:19', '2020-07-29 00:29:21'),
(18, 'Rani', 'rani@gmail.com', '098764623', '$2y$10$LffoB7.oTsyhyRJFAkh73evz046ExelCUJ9e8BjVNG.muiG07l1KS', 'SU', 'N', NULL, 'uKzP5Z0s4ERcgVSrBco5ZuCM51GlbRlQ8tc8kn4ImQofVK2g7Z6WTpJJcNAV', '2020-07-29 00:36:28', '2020-08-01 03:40:17'),
(19, 'indah', 'indah@gmail.com', '1234567', '$2y$10$BW.GF8aNFOkuvKUqLO8TTuVIPq60YO59U1Doeo/BYR2FTNBe9ltkO', 'SU', 'N', NULL, 'PK41v1f5FUEWiigCYElLDX47crtfW3nv0KjEGu4Y9yjTac1ocbxzt30ybrRB', '2020-07-29 02:04:09', '2020-08-03 00:26:25'),
(20, 'Ramdan Riawan', 'ramdanriawan3@gmail.com', '082273164206', '$2y$10$/FsNZLRFsqbljoWXQ1qIS.EzcpU01gnxDvYEZevxHcoe1A5W.eMSS', 'SU', 'N', NULL, 'TOO5bcW5dR901CCnUsibnnkI1M18k1t7INNqvR9cdVgeAlvQuwT3Zajo2rHs', '2020-07-31 10:58:15', '2020-08-03 09:44:33'),
(21, 'Lili', 'lili@gmail.com', '086869756', '$2y$10$dHRwOkHJdyAkhwrUro2oAeqlh.WuNsQhv2lB.FLXRXyIlpCpK6Vpi', 'SU', 'N', NULL, 'gnfhjotYlyyWlJ2T8wBsVki4Rvp26oekCZEeY7aQsiOgchnY5c36BzvAEXQ4', '2020-08-02 07:47:24', '2020-08-02 07:48:04'),
(22, 'safia', 'safia@gmail.com', '0896745624', '$2y$10$iwSh8udAYjGuTLycoxw8funsa/0.OSwilHBvgZ9cOEoGZCA1gTl36', 'SU', 'N', NULL, 'K7GebRXcR1xmHEVyYpkwLTcb8HUEjbEaXvelqjQAF9AoCWeFTExY2Uv2ULNr', '2020-08-02 23:34:12', '2020-08-03 00:17:47'),
(23, 'islamiyah', 'islamiyah@gmail.com', '08987656474', '$2y$10$/mLW8K1Yk3aMDPgBDzCIOubmrYgdXShD18TsnjWuCkAofJylsAAZi', 'SU', 'N', NULL, 'uGhYXNZWtABQrkPRhiWoqH37zVW5MBQ0MNOQVaC9E9HCIiljERL4379BjciX', '2020-08-03 00:27:17', '2020-08-03 02:13:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_unique` (`code`),
  ADD KEY `product_measure_id_foreign` (`measure_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_product_id_foreign` (`product_id`),
  ADD KEY `transaction_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
