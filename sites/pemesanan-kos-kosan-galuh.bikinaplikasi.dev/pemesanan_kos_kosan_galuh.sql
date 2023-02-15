-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 07:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyewaan_kos_kosan_galuh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `no_hp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '082282692489', 'admin@gmail.com', NULL, '$2y$10$iGXLVHqpMExqvbAtaXAtOuk.3wIU.6hzTvyrGtn/HvIVHFfq0J0p6', 'nFXQIXZL7gjLkk5GvcoUsgzrpLWTQyyXy69VenP5SG4Bzb38jXgsnZLlWloT', '2019-07-10 05:48:57', '2019-07-21 12:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `kamars`
--

CREATE TABLE `kamars` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `type_id` tinyint(3) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL,
  `jumlah_penghuni` int(11) DEFAULT 0,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Terisi','Kosong','Ditinggal','Rusak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamars`
--

INSERT INTO `kamars` (`id`, `type_id`, `nomor`, `jumlah_penghuni`, `keterangan`, `lokasi`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 6, 1, NULL, 'tengah', 'Terisi', '2022-07-22 15:57:26', '2022-08-21 11:58:19'),
(4, 3, 7, 1, 'kelas', 'ujung depan', 'Terisi', '2022-07-25 09:54:38', '2022-07-25 09:57:23'),
(6, 2, 8, 1, NULL, 'ujung', 'Terisi', '2022-08-21 08:27:32', '2022-08-21 08:30:10'),
(7, 1, 9, 0, NULL, 'samping tengah', 'Kosong', '2022-08-21 11:59:35', '2022-08-21 12:01:17'),
(8, 2, 10, 0, NULL, 'didekat kamar ujung', 'Kosong', '2022-08-21 12:02:19', '2022-08-21 12:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewas`
--

CREATE TABLE `penyewas` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `kamar_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `type_sewa` enum('Harian','Mingguan','Bulanan','Tahunan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Ada','Meninggalkan','Selesai Ngekos') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_identitas` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewas`
--

INSERT INTO `penyewas` (`id`, `kamar_id`, `type_sewa`, `nama`, `no_hp`, `status`, `foto_identitas`, `created_at`, `updated_at`) VALUES
(4, 3, 'Bulanan', 'Galuh', '085809018902', 'Ada', 'img/foto_identitas/1661079641_Screenshot (4).png', '2022-07-22 15:58:12', '2022-08-21 11:00:41'),
(5, 4, 'Harian', 'Haidir', '081254787737', 'Ada', 'img/foto_identitas/1661080493_Screenshot (10).png', '2022-07-25 09:57:23', '2022-08-21 11:14:53'),
(6, 6, 'Harian', 'Wendy', '082211238264', 'Ada', 'img/foto_identitas/1661080454_Screenshot (9).png', '2022-08-21 08:30:10', '2022-08-21 11:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `perpanjangan_sewas`
--

CREATE TABLE `perpanjangan_sewas` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `tagihan_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_perpanjangan` enum('Harian','Mingguan','Bulanan','Tahunan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_perpanjangan` tinyint(4) NOT NULL,
  `untuk_tempo` datetime NOT NULL,
  `biaya` int(11) NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `methode` enum('Bank','Cash','Bank Nyicil','Cash Nyicil') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Lunas','Belum Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perpanjangan_sewas`
--

INSERT INTO `perpanjangan_sewas` (`id`, `tagihan_id`, `jenis_perpanjangan`, `lama_perpanjangan`, `untuk_tempo`, `biaya`, `biaya_tambahan`, `total`, `methode`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 'Sederhana_Ditengah_Bulanan_3722741', 'Bulanan', 1, '2022-07-22 03:58:12', 450000, 0, 450000, 'Cash', 'Lunas', NULL, '2022-07-22 15:58:33', '2022-07-22 15:58:33'),
(4, 'sweet_ujungdepan_Harian_9450583', 'Harian', 1, '2022-07-25 09:57:23', 100000, 1800000, 1900000, 'Cash', 'Lunas', NULL, '2022-08-21 08:37:41', '2022-08-21 08:37:41'),
(6, 'Sederhana_ujung_Harian_6051436', 'Harian', 1, '2022-08-22 03:30:10', 50000, 0, 50000, 'Bank', 'Lunas', NULL, '2022-08-21 08:39:50', '2022-08-21 08:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `tagihans`
--

CREATE TABLE `tagihans` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyewa_id` tinyint(3) UNSIGNED NOT NULL,
  `terakhir_bayar` datetime DEFAULT NULL,
  `jatuh_tempo` datetime NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Menunggak','Nyicil') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihans`
--

INSERT INTO `tagihans` (`id`, `invoice_id`, `penyewa_id`, `terakhir_bayar`, `jatuh_tempo`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Sederhana_Ditengah_Bulanan_3722741', 4, '2022-07-22 03:58:33', '2022-08-22 03:58:12', 'Aktif', '2022-07-22 15:58:12', '2022-07-22 15:58:33'),
(5, 'sweet_ujungdepan_Harian_9450583', 5, '2022-08-21 03:38:56', '2022-07-27 09:57:23', 'Menunggak', '2022-07-25 09:57:23', '2022-08-21 08:39:16'),
(6, 'Sederhana_ujung_Harian_6051436', 6, '2022-08-21 03:39:50', '2022-08-23 03:30:10', 'Aktif', '2022-08-21 08:30:10', '2022-08-21 08:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `tggl` date NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` enum('Pemasukan','Pengeluaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `methode` enum('Cash','Bank','Nyicil') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `tggl`, `total`, `keterangan`, `jenis`, `methode`, `created_at`, `updated_at`) VALUES
(1, '2022-07-04', 50000, NULL, 'Pengeluaran', 'Cash', '2022-07-04 22:50:28', '2022-07-04 22:50:28'),
(3, '2022-07-22', 450000, NULL, 'Pemasukan', 'Cash', '2022-07-22 16:01:47', '2022-07-22 16:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_harian` int(11) DEFAULT NULL,
  `harga_mingguan` int(11) DEFAULT NULL,
  `harga_bulanan` int(11) DEFAULT NULL,
  `harga_tahunan` int(11) DEFAULT NULL,
  `harian_tambahan` int(11) DEFAULT 0,
  `mingguan_tambahan` int(11) DEFAULT 0,
  `bulanan_tambahan` int(11) DEFAULT 0,
  `tahunan_tambahan` int(11) DEFAULT 0,
  `fasilitas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `nama`, `harga_harian`, `harga_mingguan`, `harga_bulanan`, `harga_tahunan`, `harian_tambahan`, `mingguan_tambahan`, `bulanan_tambahan`, `tahunan_tambahan`, `fasilitas`, `created_at`, `updated_at`) VALUES
(1, 'VIP', 50000, 100000, 1000000, 10000000, 0, 0, 0, 0, 'sprey, lemari,kipas angin,', '2022-07-04 22:48:43', '2022-08-21 08:18:40'),
(2, 'Sederhana', 50000, 100000, 450000, 6000000, 0, 0, 0, 0, 'Springbed, lemari, kipas angin,', '2022-07-22 15:52:55', '2022-08-01 01:40:59'),
(3, 'sweet', 100000, 450000, 700000, 8400000, 50000, 50000, 50000, 50000, 'tv, ac, kulkas', '2022-07-25 09:53:26', '2022-07-25 09:53:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kamars_nomor_unique` (`nomor`),
  ADD KEY `kamars_type_id_foreign` (`type_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penyewas`
--
ALTER TABLE `penyewas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penyewas_no_hp_unique` (`no_hp`),
  ADD KEY `penyewas_kamar_id_foreign` (`kamar_id`);

--
-- Indexes for table `perpanjangan_sewas`
--
ALTER TABLE `perpanjangan_sewas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perpanjangan_sewas_tagihan_id_foreign` (`tagihan_id`);

--
-- Indexes for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tagihans_invoice_id_unique` (`invoice_id`),
  ADD KEY `tagihans_penyewa_id_foreign` (`penyewa_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penyewas`
--
ALTER TABLE `penyewas`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perpanjangan_sewas`
--
ALTER TABLE `perpanjangan_sewas`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kamars`
--
ALTER TABLE `kamars`
  ADD CONSTRAINT `kamars_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penyewas`
--
ALTER TABLE `penyewas`
  ADD CONSTRAINT `penyewas_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `kamars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perpanjangan_sewas`
--
ALTER TABLE `perpanjangan_sewas`
  ADD CONSTRAINT `perpanjangan_sewas_tagihan_id_foreign` FOREIGN KEY (`tagihan_id`) REFERENCES `tagihans` (`invoice_id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD CONSTRAINT `tagihans_penyewa_id_foreign` FOREIGN KEY (`penyewa_id`) REFERENCES `penyewas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
