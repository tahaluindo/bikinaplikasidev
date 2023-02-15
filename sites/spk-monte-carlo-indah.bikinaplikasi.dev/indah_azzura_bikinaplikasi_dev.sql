-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 04:04 AM
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
-- Database: `indah_azzura.bikinaplikasi.dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan_aktual`
--

CREATE TABLE `data_penjualan_aktual` (
  `id` int(11) NOT NULL,
  `produk_id` tinyint(4) NOT NULL DEFAULT 0,
  `tahun_id` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penjualan_aktual`
--

INSERT INTO `data_penjualan_aktual` (`id`, `produk_id`, `tahun_id`) VALUES
(6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan_aktual_detail`
--

CREATE TABLE `data_penjualan_aktual_detail` (
  `id` int(11) NOT NULL,
  `data_penjualan_aktual_id` int(11) DEFAULT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') DEFAULT NULL,
  `volume` double(15,2) DEFAULT NULL,
  `harga_per_kg` double(15,2) DEFAULT NULL,
  `nilai` double(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penjualan_aktual_detail`
--

INSERT INTO `data_penjualan_aktual_detail` (`id`, `data_penjualan_aktual_id`, `bulan`, `volume`, `harga_per_kg`, `nilai`) VALUES
(2, 6, 'Januari', 7468313.11, 1000.70, 7473540929.18),
(3, 6, 'Februari', 3426521.22, 2001.55, 6858353547.89),
(4, 6, 'Maret', 6072501.33, 3001.44, 18226248391.92),
(5, 6, 'April', 4217041.11, 4001.88, 16876092477.29),
(6, 6, 'Mei', 10108611.22, 5001.99, 50563172236.33),
(7, 6, 'Juni', 8638081.33, 6001.44, 51840926817.11),
(8, 6, 'Juli', 10484331.22, 7001.88, 73410029082.69),
(9, 6, 'Agustus', 5386491.22, 8001.55, 43100278821.39),
(10, 6, 'September', 8569052.22, 9002.77, 77145206254.65),
(11, 6, 'Oktober', 7045183.11, 10003.55, 70476841500.04),
(35, 6, 'November', 16440704.33, 11005.77, 180942610493.98),
(36, 6, 'Desember', 18000006.55, 12007.77, 216139938650.89);

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan_prediksi`
--

CREATE TABLE `data_penjualan_prediksi` (
  `id` int(11) NOT NULL,
  `produk_id` tinyint(4) NOT NULL DEFAULT 0,
  `tahun_id` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penjualan_prediksi`
--

INSERT INTO `data_penjualan_prediksi` (`id`, `produk_id`, `tahun_id`) VALUES
(14, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan_prediksi_detail`
--

CREATE TABLE `data_penjualan_prediksi_detail` (
  `id` int(11) NOT NULL,
  `data_penjualan_prediksi_id` int(11) DEFAULT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `harga_per_kg` double(10,2) DEFAULT NULL,
  `nilai` double(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penjualan_prediksi_detail`
--

INSERT INTO `data_penjualan_prediksi_detail` (`id`, `data_penjualan_prediksi_id`, `bulan`, `volume`, `harga_per_kg`, `nilai`) VALUES
(99, 14, 'Januari', 11088286, 11000.00, 121971146000.00),
(100, 14, 'Februari', 12228645, 11333.33, 138591271504.52),
(101, 14, 'Maret', 12960564, 11444.44, 148326397521.94),
(102, 14, 'April', 14143639, 11259.26, 159246909410.10),
(103, 14, 'Mei', 13684227, 11345.68, 155256859000.96),
(104, 14, 'Juni', 12821072, 11349.79, 145516477385.33),
(105, 14, 'Juli', 13167629, 8753.09, 115257445925.09),
(106, 14, 'Agustus', 13355426, 10482.85, 140002930903.44),
(107, 14, 'September', 13434399, 10195.24, 136966919919.76),
(108, 14, 'Oktober', 13292551, 9810.39, 130405106854.19),
(109, 14, 'November', 13214216, 10162.83, 134293825811.49),
(110, 14, 'Desember', 13292844, 7991.07, 106224048261.56);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`) VALUES
(1, 'Sawit');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6nJPTbzTANG3AAO3b5yYlc38KuHoq3xhk6zmnXT6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTm55MldrTWhSRmltMmMzRldlU1JRM0lHRm90c2ZwMWg4SEhONHN2bCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovL2xvY2FsaG9zdDoyMDAwL2RhdGEtcHJlZGlrc2kiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MzoiaHR0cDovL2xvY2FsaG9zdDoyMDAwL2RhdGFfcGVuanVhbGFuX2FrdHVhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQxdm0zRU5rUy53UHN1LmwuWG5aMDhPVnF3eFFIZnlnaW1IRkdWelloekVsRVYzUWV3VTBFMiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkMXZtM0VOa1Mud1BzdS5sLlhuWjA4T1Zxd3hRSGZ5Z2ltSEZHVnpZaHpFbEVWM1Fld1UwRTIiO30=', 1625788799);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` tinyint(4) NOT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `tahun`) VALUES
(3, 2019),
(4, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Unit Kerja') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unit Kerja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Admin 01', 'admin@gmail.com', '$2y$10$1vm3ENkS.wPsu.l.XnZ08OVqwxQHfygimHFGVzYhzElEV3QewU0E2', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penjualan_aktual`
--
ALTER TABLE `data_penjualan_aktual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penjualan_aktual_detail`
--
ALTER TABLE `data_penjualan_aktual_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penjualan_prediksi`
--
ALTER TABLE `data_penjualan_prediksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `tahun_id` (`tahun_id`);

--
-- Indexes for table `data_penjualan_prediksi_detail`
--
ALTER TABLE `data_penjualan_prediksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_penjualan_prediksi_id` (`data_penjualan_prediksi_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `data_penjualan_aktual`
--
ALTER TABLE `data_penjualan_aktual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_penjualan_aktual_detail`
--
ALTER TABLE `data_penjualan_aktual_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `data_penjualan_prediksi`
--
ALTER TABLE `data_penjualan_prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_penjualan_prediksi_detail`
--
ALTER TABLE `data_penjualan_prediksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_penjualan_prediksi`
--
ALTER TABLE `data_penjualan_prediksi`
  ADD CONSTRAINT `data_penjualan_prediksi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_penjualan_prediksi_ibfk_2` FOREIGN KEY (`tahun_id`) REFERENCES `tahun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_penjualan_prediksi_detail`
--
ALTER TABLE `data_penjualan_prediksi_detail`
  ADD CONSTRAINT `data_penjualan_prediksi_detail_ibfk_1` FOREIGN KEY (`data_penjualan_prediksi_id`) REFERENCES `data_penjualan_prediksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
