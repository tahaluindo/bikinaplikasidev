-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 20, 2022 at 07:30 AM
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
-- Database: `pengiriman_paket_yandi`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Box 9x9', 'bisa muat barang besar'),
(2, 'Box 4x4', 'hanya muat barang sedang saja'),
(4, 'Uu', 'Te');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum''at','Sabtu','Minggu') NOT NULL,
  `jam_mulai` varchar(5) NOT NULL,
  `jam_akhir` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `jam_mulai`, `jam_akhir`) VALUES
(1, 'Senin', '8:00', '9:00'),
(2, 'Selasa', '9:00', '13:00'),
(4, 'Senin', '9:00', '10:00');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama`) VALUES
(1, 'Bandung'),
(2, 'Madura'),
(4, 'Jakarta'),
(5, 'Palembang'),
(6, 'Jambi');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','Rusak') NOT NULL,
  `gambar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `nama`, `status`, `gambar`) VALUES
(1, 'Canter', 'Tersedia', 0x75706c6f6164732f313635383134363736376d6974737562697368695f63616e7465725f323031375f6d6974737562697368695f63616e7465725f73757065725f6864785f74686e5f323031375f6872675f3237355f6e65676f5f73616d7061695f6a6164695f313138303036353536353730313631393233362e6a7067),
(5, 'Hiace', 'Tersedia', 0x75706c6f6164732f3136353731393030313373616d70696e672d62696173612e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `mobil_fasilitas`
--

CREATE TABLE `mobil_fasilitas` (
  `id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `fasilitas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil_fasilitas`
--

INSERT INTO `mobil_fasilitas` (`id`, `mobil_id`, `fasilitas_id`) VALUES
(18, 5, 2),
(19, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `pengiriman_paket_id` int(11) DEFAULT NULL,
  `rental_mobil_id` int(11) DEFAULT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('Transaksi Baru','Refund') NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kenaikan_harga` int(11) NOT NULL,
  `benefit` varchar(255) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`, `kenaikan_harga`, `benefit`, `status`) VALUES
(1, 'Paket reguler', 0, '3 hari sampai', 'Tersedia'),
(2, 'Paket Express', 20000, '1 hari sampai', 'Tersedia'),
(3, 'paket kilat', 30000, '2 hari sampai', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_paket`
--

CREATE TABLE `pengiriman_paket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `paket_id` int(11) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `jumlah` tinyint(2) NOT NULL,
  `diantar_pada` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `refund` int(11) NOT NULL DEFAULT 0,
  `status` enum('Baru','Dikirim','Dibatalkan','Refund','Diterima') NOT NULL DEFAULT 'Dikirim',
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman_paket`
--

INSERT INTO `pengiriman_paket` (`id`, `user_id`, `paket_id`, `rute_id`, `jadwal_id`, `jumlah`, `diantar_pada`, `total_bayar`, `refund`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(16, 1396, 1, 4, 1, 2, '2022-02-05', 700000, 0, 'Baru', '-', '2022-07-18 12:07:01', '2022-07-18 12:07:01'),
(17, 1396, 2, 3, 4, 4, '2022-01-30', 480000, 0, 'Diterima', '-', '2022-07-18 12:07:37', '2022-07-18 12:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `ke` int(11) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `dari`, `ke`, `biaya`) VALUES
(1, 1, 2, 150000),
(3, 2, 1, 100000),
(4, 5, 4, 350000);

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Pelanggan','Supir') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pelanggan',
  `foto` blob DEFAULT NULL,
  `dokumen_penting` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_hp`, `password`, `level`, `foto`, `dokumen_penting`) VALUES
(1, 'Admin', 'admin@gmail.com', '082282692488', '$2y$10$w2bM/LrXjFGNj.kBflYXO.9YY/7Z9jmHV9CxtSx6uju.i0h5B5oUi', 'Admin', NULL, NULL),
(1396, 'ramdan riawan', 'ramdanriawan3@gmail.com', '082282692486', '$2y$10$fxvgjNL/iOdOf./IrVRXsO5pyuplSCeOo2.zNNayOwT/QQt1fWfM.', 'Pelanggan', 0x75706c6f6164732f6c6f676f2e706e67, NULL),
(1401, 'supir', 'supir@gmail.com', '082282692485', '$2y$10$JjZLJ0n8NeA8Sjgn3CPgk.72BVfnvzUO3GTC3zrrkGUhKenzdfLvm', 'Supir', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil_fasilitas`
--
ALTER TABLE `mobil_fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobil_id` (`mobil_id`),
  ADD KEY `fasilitas_id` (`fasilitas_id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_paket_id` (`pengiriman_paket_id`),
  ADD KEY `rental_mobil_id` (`rental_mobil_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman_paket`
--
ALTER TABLE `pengiriman_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiket_id` (`paket_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rute_id` (`rute_id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dari` (`dari`),
  ADD KEY `ke` (`ke`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil_fasilitas`
--
ALTER TABLE `mobil_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman_paket`
--
ALTER TABLE `pengiriman_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1402;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil_fasilitas`
--
ALTER TABLE `mobil_fasilitas`
  ADD CONSTRAINT `mobil_fasilitas_ibfk_2` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobil_fasilitas_ibfk_3` FOREIGN KEY (`fasilitas_id`) REFERENCES `fasilitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`pengiriman_paket_id`) REFERENCES `pengiriman_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman_paket`
--
ALTER TABLE `pengiriman_paket`
  ADD CONSTRAINT `pengiriman_paket_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_paket_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_paket_ibfk_3` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_paket_ibfk_4` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`dari`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`ke`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
