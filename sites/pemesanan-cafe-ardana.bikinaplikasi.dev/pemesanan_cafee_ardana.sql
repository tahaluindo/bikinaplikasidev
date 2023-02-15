-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Sep 06, 2022 at 08:26 AM
-- Server version: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan_cafee_ardana`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `satuan` enum('Kg','Karung','Pcs') NOT NULL,
  `stok` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `satuan`, `stok`) VALUES
(1, 'Biji Kopi', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Kategori 1');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pemesanan`
--

CREATE TABLE `laporan_pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `isi` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_pemesanan`
--

INSERT INTO `laporan_pemesanan` (`id`, `nama`, `isi`) VALUES
(2, 'Laporan bulan agustus', '{\"pemesanans\":[{\"id\":111,\"meja_id\":2,\"no_hp\":\"Fsdd\",\"nama_pelanggan\":\"Bsnzn\",\"status\":\"pending\",\"catatan\":\"Kskz\",\"created_at\":\"2022-08-02 07:35:46\",\"updated_at\":\"2022-08-02 07:35:46\",\"meja\":{\"id\":2,\"no_meja\":\"B1\"},\"pemesanan_details\":[{\"id\":82,\"pemesanan_id\":111,\"produk_id\":33,\"harga\":18000,\"jumlah\":3,\"total\":54000}]},{\"id\":112,\"meja_id\":2,\"no_hp\":\"gfff\",\"nama_pelanggan\":\"hgf\",\"status\":\"pending\",\"catatan\":\"vvcf\",\"created_at\":\"2022-08-03 11:11:37\",\"updated_at\":\"2022-08-03 11:11:37\",\"meja\":{\"id\":2,\"no_meja\":\"B1\"},\"pemesanan_details\":[{\"id\":83,\"pemesanan_id\":112,\"produk_id\":35,\"harga\":15000,\"jumlah\":2,\"total\":30000}]},{\"id\":113,\"meja_id\":2,\"no_hp\":\"6464646494\",\"nama_pelanggan\":\"Daus\",\"status\":\"selesai\",\"catatan\":\"Pedes bang\",\"created_at\":\"2022-08-05 14:09:42\",\"updated_at\":\"2022-08-05 14:09:42\",\"meja\":{\"id\":2,\"no_meja\":\"B1\"},\"pemesanan_details\":[{\"id\":84,\"pemesanan_id\":113,\"produk_id\":46,\"harga\":28000,\"jumlah\":2,\"total\":56000},{\"id\":85,\"pemesanan_id\":113,\"produk_id\":39,\"harga\":26000,\"jumlah\":2,\"total\":52000}]}]}');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `no_meja` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `no_meja`) VALUES
(2, 'B1'),
(3, 'B2'),
(1, 'D1'),
(4, 'D2');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `meja_id` int(11) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL,
  `status` enum('pending','selesai','cancel') NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `meja_id`, `no_hp`, `nama_pelanggan`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(38, 1, NULL, 'dila', 'pending', 'jhhvsxago', '2022-01-04 23:06:28', '2022-01-04 23:06:28'),
(39, 1, NULL, NULL, 'pending', NULL, '2022-01-08 13:39:43', '2022-01-08 13:39:43'),
(40, 1, NULL, NULL, 'pending', NULL, '2022-01-08 13:41:12', '2022-01-08 13:41:12'),
(41, 1, NULL, 'lala', 'pending', 'asdfm', '2022-01-08 13:43:15', '2022-01-08 13:43:15'),
(42, 1, NULL, NULL, 'pending', NULL, '2022-01-11 22:17:30', '2022-01-11 22:17:30'),
(43, 1, NULL, 'Galuh', 'pending', NULL, '2022-01-19 12:00:11', '2022-01-19 12:00:11'),
(49, 1, NULL, 'ziqin', 'selesai', 'asdfhjl', '2022-01-22 16:41:44', '2022-01-22 16:41:44'),
(50, 1, NULL, 'dila', 'selesai', NULL, '2022-01-22 16:42:47', '2022-01-22 16:42:47'),
(51, 1, NULL, NULL, 'pending', NULL, '2022-01-22 16:43:54', '2022-01-22 16:43:54'),
(52, 1, NULL, 'zaki', 'pending', NULL, '2022-01-22 16:44:41', '2022-01-22 16:44:41'),
(53, 1, NULL, NULL, 'pending', NULL, '2022-01-23 01:46:01', '2022-01-23 01:46:01'),
(54, 1, NULL, 'pak budi', 'pending', 'antara', '2022-01-23 12:03:05', '2022-01-23 12:03:05'),
(55, 1, NULL, 'Pak yanto', 'pending', 'tarok depan', '2022-01-23 12:04:33', '2022-01-23 12:04:33'),
(56, 1, NULL, 'Pak yanto', 'pending', 'catatan', '2022-01-23 12:07:32', '2022-01-23 12:07:32'),
(57, 1, NULL, 'Pak yanto', 'pending', 'ctt', '2022-01-23 12:08:58', '2022-01-23 12:08:58'),
(58, 1, NULL, 'Pak yanto', 'pending', 'ctt', '2022-01-23 12:09:57', '2022-01-23 12:09:57'),
(59, 1, NULL, 'Pak yanto', 'pending', 'ctt', '2022-01-23 12:10:20', '2022-01-23 12:10:20'),
(60, 1, NULL, 'Pak yanto', 'pending', 'ctt', '2022-01-23 12:10:27', '2022-01-23 12:10:27'),
(61, 1, NULL, 'Pak yanto', 'pending', 'ctt', '2022-01-23 12:10:51', '2022-01-23 12:10:51'),
(62, 1, NULL, 'Pak yanto', 'pending', 'ctt', '2022-01-23 12:11:05', '2022-01-23 12:11:05'),
(63, 1, NULL, 'Pak yanto', 'pending', 'ctt', '2022-01-23 12:11:12', '2022-01-23 12:11:12'),
(64, 1, NULL, 'Pak yanto', 'pending', 'catatan', '2022-01-23 12:13:23', '2022-01-23 12:13:23'),
(65, 1, NULL, 'asd', 'pending', 'sdfs', '2022-01-23 12:14:21', '2022-01-23 12:14:21'),
(66, 1, NULL, 'Pak yanto', 'pending', 'dfg', '2022-01-23 12:16:00', '2022-01-23 12:16:00'),
(67, 1, NULL, 'Pak yanto', 'pending', 'catatan', '2022-01-23 12:17:29', '2022-01-23 12:17:29'),
(68, 1, NULL, 'Pak yanto', 'pending', 'sgsg', '2022-01-23 12:18:41', '2022-01-23 12:18:41'),
(69, 1, NULL, NULL, 'pending', NULL, '2022-01-23 17:09:53', '2022-01-23 17:09:53'),
(70, 1, NULL, NULL, 'selesai', NULL, '2022-01-23 21:45:50', '2022-01-23 21:45:50'),
(71, 1, NULL, 'galuh', 'pending', NULL, '2022-01-23 22:08:23', '2022-01-23 22:08:23'),
(72, 1, NULL, 'galuh', 'selesai', 'roti', '2022-01-23 22:08:42', '2022-01-23 22:08:42'),
(73, 1, NULL, 'galuh', 'selesai', 'aman', '2022-01-23 22:11:34', '2022-01-23 22:11:34'),
(74, 1, NULL, 'zaaaaa', 'selesai', 'roti', '2022-01-23 22:15:15', '2022-01-23 22:15:15'),
(75, 1, NULL, 'zaki', 'pending', 'ok', '2022-01-23 22:23:32', '2022-01-23 22:23:32'),
(76, 1, NULL, 'soni', 'pending', 'selesai', '2022-01-23 22:34:32', '2022-01-23 22:34:32'),
(77, 1, NULL, 'soni', 'pending', 'selesai', '2022-01-23 22:34:51', '2022-01-23 22:34:51'),
(78, 1, NULL, 'soni', 'pending', 'selesai', '2022-01-23 22:35:26', '2022-01-23 22:35:26'),
(79, 1, NULL, 'soni', 'pending', 'selesai', '2022-01-23 22:36:19', '2022-01-23 22:36:19'),
(80, 1, NULL, 'soni', 'pending', 'selesai', '2022-01-23 22:36:48', '2022-01-23 22:36:48'),
(81, 1, NULL, 'soni', 'pending', 'ok', '2022-01-23 22:37:46', '2022-01-23 22:37:46'),
(82, 1, NULL, 'sitek', 'pending', 'aa', '2022-01-23 22:40:15', '2022-01-23 22:40:15'),
(83, 1, NULL, 'suga', 'pending', 'asa', '2022-01-23 22:51:02', '2022-01-23 22:51:02'),
(84, 1, NULL, 'lembeng', 'pending', 'ss', '2022-01-23 22:56:46', '2022-01-23 22:56:46'),
(85, 1, NULL, 'soni', 'pending', 'mntap', '2022-01-23 22:57:45', '2022-01-23 22:57:45'),
(86, 1, NULL, 'soni', 'pending', 'mntap', '2022-01-23 22:58:18', '2022-01-23 22:58:18'),
(87, 1, NULL, 'soni', 'pending', 'mntap', '2022-01-23 23:00:49', '2022-01-23 23:00:49'),
(88, 1, NULL, 'soni', 'pending', 'mntap', '2022-01-23 23:00:57', '2022-01-23 23:00:57'),
(89, 1, NULL, 'soni', 'pending', 'mantap', '2022-01-23 23:02:39', '2022-01-23 23:02:39'),
(90, 1, NULL, 'zak', 'pending', 'za', '2022-01-23 23:09:20', '2022-01-23 23:09:20'),
(91, 1, NULL, 'zak', 'pending', 'zaki', '2022-01-23 23:09:53', '2022-01-23 23:09:53'),
(92, 1, NULL, 'sulaiman', 'pending', 'okeee', '2022-01-23 23:11:04', '2022-01-23 23:11:04'),
(93, 1, NULL, 'sulaiman', 'pending', 'okeee', '2022-01-23 23:11:04', '2022-01-23 23:11:04'),
(94, 1, NULL, 'sulaiman', 'pending', 'okeee', '2022-01-23 23:11:05', '2022-01-23 23:11:05'),
(95, 1, NULL, 'sulaiman', 'pending', 'Okee', '2022-01-23 23:12:04', '2022-01-23 23:12:04'),
(96, 1, NULL, 'sulaiman', 'pending', 'okeee', '2022-01-23 23:12:19', '2022-01-23 23:12:19'),
(97, 1, NULL, 'sulaiman', 'pending', 'okeee', '2022-01-23 23:12:32', '2022-01-23 23:12:32'),
(98, 1, NULL, 'roni', 'pending', 'Sip', '2022-01-23 23:13:55', '2022-01-23 23:13:55'),
(99, 1, NULL, 'soni', 'pending', 'ajaj', '2022-01-23 23:21:35', '2022-01-23 23:21:35'),
(100, 1, NULL, 'suga', 'selesai', 'pas', '2022-01-23 23:24:42', '2022-01-23 23:24:42'),
(101, 1, NULL, 'zzaki', 'selesai', NULL, '2022-01-24 00:20:09', '2022-01-24 00:20:09'),
(102, 1, NULL, 'sulaiman', 'pending', 'siip', '2022-01-24 00:22:43', '2022-01-24 00:22:43'),
(103, 1, NULL, 'langsung beli', 'pending', 'dfgdfg', '2022-07-02 08:44:28', '2022-07-02 08:44:28'),
(104, 2, NULL, 'contoh pelanggan', 'pending', 'hh', '2022-07-27 12:05:23', '2022-07-27 12:05:23'),
(105, 2, '082282692488', 'Bambang', 'pending', 'jangan pedas', '2022-07-27 12:14:08', '2022-07-27 12:14:08'),
(106, 2, '082282692488', 'Bambang', 'pending', 'jangan pedas', '2022-07-27 12:16:25', '2022-07-27 12:16:25'),
(107, 2, '082282692481', 'Bambang', 'pending', 'jangan pedas', '2022-07-27 12:17:20', '2022-07-27 12:17:20'),
(108, 2, '082282692481', 'Bambang', 'pending', 'jangan pedas', '2022-07-27 12:17:44', '2022-07-27 12:17:44'),
(109, 2, '082282692481', 'Bambang', 'pending', 'jangan pedas', '2022-07-27 12:19:17', '2022-07-27 12:19:17'),
(110, 2, NULL, NULL, 'pending', NULL, '2022-07-30 15:15:38', '2022-07-30 15:15:38'),
(111, 2, 'Fsdd', 'Bsnzn', 'pending', 'Kskz', '2022-08-02 07:35:46', '2022-08-02 07:35:46'),
(112, 2, 'gfff', 'hgf', 'pending', 'vvcf', '2022-08-03 11:11:37', '2022-08-03 11:11:37'),
(113, 2, '6464646494', 'Daus', 'selesai', 'Pedes bang', '2022-08-05 14:09:42', '2022-08-05 14:09:42'),
(114, 2, NULL, NULL, 'pending', NULL, '2022-09-04 22:30:13', '2022-09-04 22:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `pemesanan_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id`, `pemesanan_id`, `produk_id`, `harga`, `jumlah`, `total`) VALUES
(35, 28, 24, 7000, 3, 21000),
(37, 30, 23, 50000, 2, 100000),
(38, 30, 24, 10000, 2, 20000),
(40, 32, 24, 10000, 5, 50000),
(41, 32, 25, 10000, 7, 70000),
(42, 32, 30, 17000, 2, 34000),
(43, 33, 24, 10000, 5, 50000),
(44, 33, 25, 10000, 7, 70000),
(45, 33, 30, 17000, 2, 34000),
(46, 33, 23, 5000, 1, 5000),
(47, 34, 24, 10000, 5, 50000),
(48, 34, 25, 10000, 7, 70000),
(49, 34, 30, 17000, 2, 34000),
(50, 34, 23, 5000, 1, 5000),
(52, 36, 23, 5000, 1, 5000),
(53, 37, 23, 50000, 2, 100000),
(54, 37, 26, 15000, 3, 45000),
(55, 44, 25, 10000, 5, 50000),
(56, 45, 25, 10000, 5, 50000),
(57, 45, 26, 15000, 5, 75000),
(58, 46, 29, 40000, 5, 200000),
(59, 47, 26, 15000, 2, 30000),
(60, 48, 29, 40000, 1, 40000),
(61, 49, 32, 16000, 3, 48000),
(62, 50, 34, 18000, 1, 18000),
(63, 50, 33, 18000, 3, 54000),
(64, 52, 31, 16000, 2, 32000),
(65, 54, 31, 16000, 2, 32000),
(66, 64, 31, 16000, 1, 16000),
(67, 68, 31, 16000, 1, 16000),
(68, 74, 32, 20000, 1, 20000),
(69, 74, 32, 20000, 1, 20000),
(70, 74, 32, 20000, 7, 140000),
(71, 82, 33, 18000, 2, 36000),
(72, 83, 35, 15000, 2, 30000),
(73, 99, 35, 15000, 2, 30000),
(74, 100, 34, 18000, 3, 54000),
(75, 101, 32, 16000, 2, 32000),
(76, 102, 32, 16000, 4, 64000),
(77, 103, 32, 16000, 1, 16000),
(78, 103, 34, 18000, 1, 18000),
(79, 104, 32, 16000, 1, 16000),
(80, 104, 34, 18000, 1, 16000),
(81, 109, 32, 16000, 1, 16000),
(82, 111, 33, 18000, 3, 54000),
(83, 112, 35, 15000, 2, 30000),
(84, 113, 46, 28000, 2, 56000),
(85, 113, 39, 26000, 2, 52000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `expire_at` date NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `expire_at`, `harga_jual`, `stok`, `gambar`) VALUES
(38, 1, 'Coffe latte', '2022-08-31', 22000, '20', 'gambar/phpNsbhOh'),
(39, 1, 'Oranda no nasu', '2022-08-17', 26000, '6', 'gambar/php546icI'),
(40, 1, 'Rozuti', '2022-08-16', 20000, '10', 'gambar/phpWFHWux'),
(41, 1, 'Remonti', '2022-08-13', 22000, '10', 'gambar/phpciStdD'),
(42, 1, 'Taruno_shi', '2022-08-18', 26000, '10', 'gambar/phpQVgQ6G'),
(43, 1, 'Sutafurutsu', '2022-08-17', 26000, '10', 'gambar/phpC0Egxg'),
(44, 1, 'Pizza tortila', '2022-08-11', 28000, '3', 'gambar/php4puVIw'),
(45, 1, 'Rice bowl spicy katsu', '2022-08-11', 28000, '5', 'gambar/phpesxlKy'),
(46, 1, 'Rice bowl katsu teriyaki', '2022-08-10', 28000, '3', 'gambar/phpOEZ8Ex'),
(47, 1, 'Kohi', '2022-08-10', 25000, '8', 'gambar/phpZhwEPF'),
(48, 1, 'Pamushuga', '2022-08-24', 22000, '5', 'gambar/phpVJE9XE');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JNbwjbQq54fLI61kH7uGo7arxbX0XXHV3avXVZsg', 6, '172.70.92.210', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicmx0OUptYTgzUDhlYU5GeFVJVEFPUHNVMmVZUTJrb2FTbXpUeGtNNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHBzOi8vcGVtZXNhbmFuLWNhZmUtYXJkYW5hLmJpa2luYXBsaWthc2kuZGV2L3BlbWVzYW5hbi80OS9lZGl0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGhxc2hnU0JUbFhTR3RveE8uTWtMcE9rWW54Sk94ZEpKTldyQldOWjV2bjhUcDF2L25qZ2RTIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRocXNoZ1NCVGxYU0d0b3hPLk1rTHBPa1lueEpPeGRKSk5XckJXTlo1dm44VHAxdi9uamdkUyI7fQ==', 1662330673);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `level` enum('Admin','Karyawan','Pemilik') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(6, 'Karyawan', 'karyawan@gmail.com', '$2y$10$hqshgSBTlXSGtoxO.MkLpOkYnxJOxdJJNWrBWNZ5vn8Tp1v/njgdS', 'aI7Nz67U9ryRNhLxftw8oRt1Zcbdps7kWzVL1zI2TE7ifdljH7dhyjE6Zz9X', 'Karyawan', '2022-08-29 19:19:52', '2022-08-29 19:19:52'),
(7, 'Pemilik', 'pemilik@gmail.com', '$2y$10$IeGY95X5OjOB3w2eTlLf6OD3h.0sXpbWHPQ5S..ZGuJbrPREOugEa', 'VAiUdBhZSxlH1jzCexiAxC9RAAZnrZ7I4uVwejVHgwRKFmZNS2pihT80my3A', 'Pemilik', '2022-08-29 19:19:52', '2022-08-29 19:19:52'),
(8, 'Ardana Priska Surya', 'karyawan12@gmail.com', '$2y$10$O24e..M96Pfr9YxnrlcW4uKeUSpG.V7Mwu9JK/XQeowe0UqH9ldmS', NULL, 'Karyawan', '2022-09-02 17:11:45', '2022-09-02 17:11:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_pemesanan`
--
ALTER TABLE `laporan_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_meja` (`no_meja`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meja_id` (`meja_id`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_details_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `pemesanan_details_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_pemesanan`
--
ALTER TABLE `laporan_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`meja_id`) REFERENCES `meja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
