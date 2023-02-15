-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Sep 06, 2022 at 07:20 AM
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
-- Database: `pemesanan_advertising_alfatah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `harga_beli`, `stok`) VALUES
(2, 'baju', 80000, 6),
(4, 'spanduk', 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `user_id`, `nama`, `no_hp`) VALUES
(1, NULL, 'agus jr', '0896789444'),
(26, NULL, 'elda', '086272727'),
(27, NULL, 'x', '356467457'),
(28, 6, 'Pelanggan', '082282692492'),
(29, NULL, 'al', '6556667'),
(30, NULL, 'aal', '07282828');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `menjual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama`, `no_hp`, `alamat`, `menjual`) VALUES
(14, 'Pemasok baju', '08445566778899', 'alamat d mana saja', 'kaos polos\r\nbahan celana\r\ndll'),
(17, 'Pemasok Bahan Reklame', '082282692489', 'JL. H. Ibrahim Rt 19', 'bahan bahan untuk bikin reklame');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `pemasok_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','selesai','cancel','refund') NOT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `pemasok_id`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(30, 14, 'pending', 'hal hal', '2021-11-04 05:21:23', '2021-11-06 05:21:27'),
(31, 14, 'pending', NULL, NULL, NULL),
(32, 17, 'pending', NULL, NULL, NULL),
(33, 14, 'selesai', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembelian_id` int(10) UNSIGNED NOT NULL,
  `bahan_id` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `bahan_id`, `harga`, `jumlah`, `total`) VALUES
(45, 31, 2, 80000, 5, 400000),
(47, 33, 2, 80000, 1, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','selesai','cancel') NOT NULL DEFAULT 'pending',
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `pelanggan_id`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(22, 1, 'pending', '2', '2021-11-05 04:23:15', '2021-11-05 04:23:15'),
(28, 1, 'selesai', 'pelanggan super', '2021-11-05 04:23:15', '2021-11-05 04:23:15'),
(30, 1, 'pending', NULL, '2021-11-13 09:57:26', '2021-11-13 09:57:26'),
(32, 26, 'pending', 'baju futsal', '2022-07-25 03:04:32', '2022-07-25 03:04:32'),
(33, 26, 'pending', NULL, '2022-07-25 09:27:05', '2022-07-25 09:27:05'),
(34, 1, 'pending', NULL, '2022-07-26 14:44:42', '2022-07-26 14:44:42'),
(35, 28, 'selesai', 'sdx', '2022-09-03 08:39:56', '2022-09-03 08:39:56'),
(36, 29, 'pending', 'baju', '2022-09-03 09:00:46', '2022-09-03 09:00:46'),
(37, 28, 'pending', NULL, '2022-09-05 03:55:22', '2022-09-05 03:55:22'),
(38, 30, 'pending', 'baju', '2022-09-05 03:56:40', '2022-09-05 03:56:40'),
(39, 26, 'pending', 'baju bola', '2022-09-05 03:58:49', '2022-09-05 03:58:49');

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
  `total` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id`, `pemesanan_id`, `produk_id`, `harga`, `jumlah`, `total`, `catatan`) VALUES
(35, 28, 24, 7000, 3, 21000, NULL),
(37, 30, 23, 50000, 2, 100000, NULL),
(38, 30, 24, 10000, 2, 20000, NULL),
(41, 32, 23, 130000, 30, 3900000, NULL),
(42, 35, 24, 10000, 3, 30000, NULL),
(43, 36, 23, 130000, 4, 520000, NULL),
(44, 38, 23, 130000, 5, 650000, NULL),
(45, 38, 23, 130000, 5, 0, NULL),
(46, 39, 23, 130000, 11, 1430000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `satuan` enum('Karung','Pcs','Kg') NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga_beli`, `harga_jual`, `stok`, `satuan`, `gambar`) VALUES
(23, 'Sablon Baju L', 100000, 130000, '20', 'Pcs', 'uploads\\php1C0F.tmp'),
(24, 'Reklame', 7000, 10000, '7', 'Pcs', 'uploads\\php91F1.tmp'),
(25, 'Spanduk A', 8000, 10000, '16', 'Pcs', 'uploads\\phpBB72.tmp'),
(27, 'Neon Box', 100000, 200000, '10', 'Pcs', 'uploads\\php603C.tmp');

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
('8f2gHCV9AlP32IqftRpg6zNLc5kg0z52R1gSyJJw', NULL, '172.70.93.8', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/105.0.5195.100 Mobile/15E148 Safari/604.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRjdUMTNjMENuUFRvRENnWGRyTUE5MXFERnQ0bkNGbVRPVnlpcVI1QSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1662385689),
('oC9RlfCptrL5u2KxXV36OB6jTx2fEHzCM0m5xU41', NULL, '172.70.92.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/105.0.5195.100 Mobile/15E148 Safari/604.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoid2x3OWMxTVNnUmlkMzRtYWxKUHR1cmIxeFVUVXY2YWZERHROTG44aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1662385689),
('yrLmbrYY3EH8QinLwGk8fNpnyj0cVqfnkVJoIJ5C', NULL, '162.158.162.148', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianIyN2VObXRsZnE2bnBQejFhWlA3V3Jzc05jQkxxckphWmM2c1loTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vcGVtZXNhbmFuLWFkdmVydGlzaW5nLWFsZmF0YWguYmlraW5hcGxpa2FzaS5kZXYvbG9naW4iO319', 1662350787);

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
  `level` enum('Admin','Pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `remember_token`, `level`) VALUES
(1, 'Titi Maryanti', 'titimaryanti@titimaryanti.com', '$2y$10$HDYtau1zUKFuJrG0Pgtbv.Vy/kDdzA3Uzbi2jHc.ZNmEQZIJ8eNPq', 'chgtdKwYMW3kzrsAvdl0jrho4Pmd4twwDiAKT4bnPKF3CqCXqz5kUdC2xSmS', 'Admin'),
(2, 'adalah', 'adalah@adalah.com', '$2y$10$xctB9WVP6G2Wlda4kq.k9e0sGXTloglpB3dBs6luvn33.5sHvVECK', 'QFTn19elTkPVMtq5PNXtjL2VAkQHMalJqLoWEkQIBD2i7tTzJn4Bq35FQ9jr', 'Admin'),
(3, 'dimana', 'dimana@dimana.com', '$2y$10$519k11ELsi9bKDDwUv.XVOiKco0f23nrX55tdMARolsGr2Opx2.ZG', '023ThsYdtOnvVxhr2AVU1FrYSjyO3D9t6fSYYT9ZZyaPgpg2Bx6A1IgtEqQg', 'Admin'),
(4, 'gak jelas', 'gakjelas@gakjelas.com', '$2y$10$MwGgjPJWDqPHRALXeQMU7.P9uFREAJ/Ro3wdpx2yVJGVdn6/O8U0i', NULL, 'Admin'),
(5, 'admin', 'admin@gmail.com', '$2y$10$vSCLT7FtebNkv5HMCk40K.5S811589HmJ8HRc2IYQK.zJi0mzbx5y', 'VmS32YWTl9kKzg81Jc8rvifWCO1ZQGAY1GWiUl7LSptjISrpltloz4kid8ZW', 'Admin'),
(6, 'pelanggan', 'pelanggan@gmail.com', '$2y$10$yVZDtt6inAfKYFFM4lLxqO8CnNnDGiDaFvqAvtoZoza.IClZa/BJq', 'jopcLCCiLHDW6SQPmvEA0S4KqcuU6h29zQ7AgZEZXmOutgRciRcfXbbXuHhp', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelians_pemasok_id_foreign` (`pemasok_id`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_details_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_pelanggan_id_foreign` (`pelanggan_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelians_pemasok_id_foreign` FOREIGN KEY (`pemasok_id`) REFERENCES `pemasok` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_details_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanans_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD CONSTRAINT `pemesanan_details_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_details_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
