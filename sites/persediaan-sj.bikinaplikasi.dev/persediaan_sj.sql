-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2022 pada 08.43
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persediaan_sj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `expire_at` date NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `satuan` enum('Kg','Karung','Pcs') NOT NULL DEFAULT 'Pcs',
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `expire_at`, `harga_beli`, `harga_jual`, `stok`, `satuan`, `gambar`) VALUES
(27, 'busi senso', '2022-07-28', 10000, 15000, '99', 'Pcs', 'uploads/phpjuoM27'),
(28, 'busi GX', '2022-07-23', 15000, 15000, '0', 'Pcs', 'uploads/phpvEXNiv'),
(29, 'Carburator GX160', '2022-07-23', 40000, 60000, '7', 'Kg', 'uploads/phpjr6llv'),
(30, 'blok mesin 328', '2022-07-23', 90000, 90000, '5', 'Pcs', 'uploads/php0W6XH9'),
(31, 'carburator Mesin rumput 328', '2022-07-23', 60000, 80000, '70', 'Pcs', 'uploads/phphS3IOj'),
(32, 'carburator genset 1500', '2022-07-23', 40000, 60000, '60', 'Pcs', 'uploads/phphtFs3x'),
(33, 'manifold senso', '2022-07-23', 8000, 15000, '97', 'Pcs', 'uploads/php6NWE3j'),
(34, 'kuil GX 160', '2022-07-23', 50000, 80000, '80', 'Pcs', 'uploads/phpsEvO56'),
(35, 'kap star 328', '2022-07-23', 30000, 50000, '80', 'Pcs', 'uploads/php5jLv8w'),
(36, 'tali star senso', '2022-07-23', 5000, 10000, '188', 'Pcs', 'uploads/phpvCZn88'),
(37, 'kuil senso', '2022-07-23', 35000, 60000, '75', 'Pcs', 'uploads/phpB9Rbc6'),
(38, 'rantai senso', '2022-07-23', 135000, 165000, '76', 'Pcs', 'uploads/php6acOC8'),
(39, 'pisau mesin rumput', '2022-07-23', 25000, 35000, '100', 'Pcs', 'uploads/phpSkeLHg'),
(40, 'kap star senso', '2022-07-23', 25000, 50000, '95', 'Pcs', 'uploads/phpP3rvC9'),
(41, 'blok senso 5800', '2022-07-23', 135000, 180000, '99', 'Pcs', 'uploads/phpUF7bui'),
(42, 'senso Hotwind', '2022-07-23', 800000, 1300000, '58', 'Pcs', 'uploads/phpiFqZXi'),
(43, 'Bar senso 22', '2022-07-23', 100000, 140000, '60', 'Pcs', 'uploads/phpcdP3pa'),
(44, 'kap star GX160', '2022-07-23', 35000, 60000, '80', 'Pcs', 'uploads/phpbw1J3y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `no_hp`) VALUES
(1, 'yuda', '082278944412'),
(26, 'rafi', '082282692482'),
(27, 'raju', '082282692482'),
(28, 'dodi', '085243675859'),
(29, 'riski', '082223242526'),
(30, 'bujang', '085287356789'),
(31, 'pendi', '082278564716'),
(32, 'riyan', '082311876498'),
(33, 'silvan', '085289398989'),
(34, 'yoga', '082287469789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `menjual` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama`, `no_hp`, `alamat`, `menjual`) VALUES
(14, 'ajon sales', '082255667788', 'pasar bawah muara bungo', 'sparepart senso dan spare part GX,DLL...'),
(19, 'silvan', '082214875878', 'jambi,simpang kawat', 'spare part mesin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `pemasok_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','selesai','cancel','refund') NOT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `pemasok_id`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(30, 14, 'pending', 'hal hal', '2021-11-04 05:21:23', '2021-11-06 05:21:27'),
(31, 14, 'selesai', NULL, '2022-07-26 18:58:13', '2022-07-26 00:00:00'),
(32, 14, 'selesai', NULL, '2022-07-26 18:58:34', '2022-07-26 00:00:00'),
(33, 14, 'selesai', NULL, '2022-07-26 18:58:49', '2022-07-26 00:00:00'),
(34, 14, 'pending', NULL, '2022-07-26 12:42:54', '2022-07-26 12:42:54'),
(35, 19, 'pending', NULL, '2022-07-26 12:46:18', '2022-07-26 12:46:18'),
(36, 14, 'pending', NULL, '2022-07-27 04:21:24', '2022-07-27 04:21:24'),
(37, 14, 'pending', NULL, '2022-08-21 17:39:32', '2022-08-21 17:39:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembelian_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `barang_id`, `harga`, `jumlah`, `total`) VALUES
(45, 31, 27, 10000, 50, 500000),
(46, 31, 33, 8000, 50, 400000),
(47, 31, 28, 10000, 50, 500000),
(48, 31, 29, 40000, 40, 1600000),
(49, 31, 30, 90000, 40, 3600000),
(50, 31, 31, 60000, 40, 2400000),
(51, 31, 32, 40000, 30, 1200000),
(52, 31, 34, 50000, 40, 2000000),
(53, 31, 35, 30000, 40, 1200000),
(54, 31, 36, 5000, 100, 500000),
(55, 31, 37, 35000, 40, 1400000),
(56, 31, 38, 135000, 40, 5400000),
(57, 31, 39, 25000, 50, 1250000),
(58, 31, 40, 25000, 50, 1250000),
(59, 31, 41, 135000, 50, 6750000),
(60, 31, 42, 800000, 30, 24000000),
(61, 31, 43, 100000, 30, 3000000),
(62, 31, 44, 35000, 40, 1400000),
(63, 32, 27, 15000, 50, 750000),
(64, 33, 27, 20000, 5, 100000),
(65, 34, 30, 90000, 4, 360000),
(66, 35, 29, 40000, 8, 320000),
(67, 36, 30, 90000, 5, 450000),
(68, 37, 28, 15000, 7, 105000),
(69, 37, 28, 15000, 5, 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','selesai','cancel') NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `pelanggan_id`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(22, 1, 'pending', '2', '2021-11-05 04:23:15', '2021-11-05 04:23:15'),
(28, 1, 'selesai', 'menjual barang aa', '2021-11-05 04:23:15', '2021-11-05 04:23:15'),
(30, 1, 'pending', NULL, '2021-11-13 09:57:26', '2021-11-13 09:57:26'),
(31, 1, 'selesai', NULL, '2022-07-21 23:00:54', '2022-07-21 23:00:54'),
(32, 1, 'selesai', NULL, '2022-07-23 12:40:44', '2022-07-23 12:40:44'),
(33, 28, 'selesai', NULL, '2022-07-23 12:41:38', '2022-07-23 12:41:38'),
(34, 29, 'selesai', NULL, '2022-07-23 12:42:48', '2022-07-23 12:42:48'),
(35, 32, 'selesai', NULL, '2022-07-23 12:43:22', '2022-07-23 12:43:22'),
(36, 27, 'selesai', NULL, '2022-07-23 12:44:34', '2022-07-23 12:44:34'),
(37, 31, 'selesai', NULL, '2022-07-23 12:48:25', '2022-07-23 12:48:25'),
(38, 1, 'pending', NULL, '2022-07-25 09:50:19', '2022-07-25 09:50:19'),
(39, 1, 'pending', NULL, '2022-07-26 03:39:21', '2022-07-26 03:39:21'),
(40, 33, 'pending', NULL, '2022-07-26 03:40:20', '2022-07-26 03:40:20'),
(41, 33, 'pending', NULL, '2022-07-26 03:40:47', '2022-07-26 03:40:47'),
(42, 1, 'pending', NULL, '2022-07-26 11:04:13', '2022-07-26 11:04:13'),
(43, 27, 'pending', NULL, '2022-07-26 12:42:23', '2022-07-26 12:42:23'),
(44, 27, 'pending', NULL, '2022-07-27 04:22:38', '2022-07-27 04:22:38'),
(45, 33, 'selesai', NULL, '2022-07-27 04:25:58', '2022-07-27 04:25:58'),
(46, 1, 'selesai', NULL, '2022-08-21 17:48:19', '2022-08-21 17:48:19'),
(47, 1, 'selesai', NULL, '2022-08-22 04:08:33', '2022-08-22 04:08:33'),
(48, 34, 'selesai', NULL, '2022-08-22 06:32:29', '2022-08-22 06:32:29'),
(49, 28, 'selesai', NULL, '2022-08-22 07:25:56', '2022-08-22 07:25:56'),
(50, 27, 'pending', NULL, '2022-08-22 07:48:37', '2022-08-22 07:48:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `penjualan_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `total`) VALUES
(40, 32, 29, 60000, 1, 60000),
(41, 33, 38, 165000, 1, 165000),
(42, 34, 42, 1300000, 1, 1300000),
(43, 35, 42, 1300000, 1, 1300000),
(44, 35, 27, 15000, 5, 75000),
(45, 35, 38, 165000, 1, 165000),
(46, 36, 38, 165000, 1, 165000),
(47, 36, 27, 15000, 2, 30000),
(49, 37, 37, 60000, 1, 60000),
(50, 37, 38, 165000, 1, 165000),
(51, 36, 28, 15000, 2, 30000),
(52, 36, 29, 60000, 1, 60000),
(53, 38, 30, 140000, 3, 420000),
(54, 41, 41, 180000, 1, 180000),
(55, 41, 36, 10000, 2, 20000),
(56, 41, 28, 500000, 3, 1500000),
(57, 41, 28, 50000, 3, 150000),
(58, 42, 33, 15000, 3, 45000),
(59, 43, 29, 60000, 5, 300000),
(60, 44, 31, 80000, 10, 800000),
(61, 45, 29, 70000, 1, 70000),
(62, 46, 28, 15000, 5, 75000),
(63, 47, 27, 15000, 6, 90000),
(64, 47, 36, 10000, 10, 100000),
(65, 48, 40, 50000, 5, 250000),
(66, 49, 37, 60000, 4, 240000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `session`
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
-- Dumping data untuk tabel `session`
--

INSERT INTO `session` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mB3OSFqydQRkn3HhIQRkTLCByYlhCevNdYSHqlzx', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidlI3UVBZZGJydVNFc3RvdmN1cDJOV2hkVjdVSkZjOEZaZmxnY1IxYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6MTAwMC9wZWxhbmdnYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkd2M0VWNEU2VZN2hnQXh1a3ZLd2djdS5GcHhCL3Y0b0R2eTBjc0REeUtGTnhlejAzOFF4eE8iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHdjNFVjRFNlWTdoZ0F4dWt2S3dnY3UuRnB4Qi92NG9EdnkwY3NERHlLRk54ZXowMzhReHhPIjt9', 1661155330);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `level` enum('Admin','Karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `remember_token`, `level`) VALUES
(1, 'Karyawan', 'karyawan@gmail.com', '$2y$10$0q2QqYgS9r9BfnGFS6b0POGeq7G0LucyaeQwv1ar5iVzKO8VKnBTW', 'qrySZOYtp776SJr1pySRB8IkMIBthDgIu6FNUJYwVNK7oIfJpXzhVkkoNWDV', 'Karyawan'),
(5, 'admin', 'admin@gmail.com', '$2y$10$wc4UcDSeY7hgAxukvKwgcu.FpxB/v4oDvy0csDDyKFNxez038QxxO', 'WWWiqE8AhtvxCWwRLVtQt9LOxWGtIy3iZlrNbJMtDy7Lvm9S1HrrmCNsnhJf', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelians_pemasok_id_foreign` (`pemasok_id`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_details_pembelian_id_foreign` (`pembelian_id`),
  ADD KEY `pembelian_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualans_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_details_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `penjualan_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelians_pemasok_id_foreign` FOREIGN KEY (`pemasok_id`) REFERENCES `pemasok` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembelian_details_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualans_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penjualan_details_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
