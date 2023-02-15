-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 04:27 AM
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
-- Database: `spk_roc_makanan_aldi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `comunale_id` int(11) NOT NULL DEFAULT 1,
  `genre_id` int(11) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `comunale_id`, `genre_id`, `nama`, `instagram`, `created_at`, `updated_at`) VALUES
(13, 5, 1, 'Dabothaitea', 'https://www.instagram.com/dabothaitea/?hl=id', '2023-01-30 12:32:39', '2023-01-30 12:32:39'),
(14, 5, 1, 'Daidokoro', 'https://www.instagram.com/daidokorosushikiosk/?hl=id', '2023-01-30 12:49:20', '2023-01-30 12:49:20'),
(15, 5, 1, 'Dailybox', 'https://www.instagram.com/dailybox.id/?hl=id', '2023-01-30 13:02:11', '2023-01-30 13:02:11'),
(20, 5, 1, 'Dak Nalgae', 'https://instagram.com', '2023-01-31 02:18:17', '2023-01-31 02:18:17'),
(21, 5, 1, 'D\'Crepes', 'https://instagram.com', '2023-01-31 03:28:26', '2023-01-31 03:28:26'),
(22, 5, 1, 'Dimsum Mbeledos', 'https://instagram.com', '2023-01-31 03:29:02', '2023-01-31 03:29:02'),
(23, 8, 1, 'Diskuupi', 'https://instagram.com', '2023-01-31 03:29:44', '2023-01-31 03:29:44'),
(24, 5, 1, 'D\'Krezz', 'https://instagram.com', '2023-01-31 03:30:17', '2023-01-31 03:30:17'),
(25, 5, 1, 'A7', 'https://instagram.com', '2023-01-31 23:13:46', '2023-01-31 23:13:46'),
(26, 5, 1, 'siswa', 'https://instagram.com', '2023-01-31 23:14:05', '2023-01-31 23:14:05'),
(27, 5, 1, 'lapangan 4', 'https://instagram.com', '2023-01-31 23:14:21', '2023-01-31 23:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_detail`
--

CREATE TABLE `alternatif_detail` (
  `id` int(11) NOT NULL,
  `alternatif_id` int(11) NOT NULL,
  `kriteria_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif_detail`
--

INSERT INTO `alternatif_detail` (`id`, `alternatif_id`, `kriteria_detail_id`) VALUES
(49, 14, 26),
(50, 14, 31),
(51, 14, 34),
(52, 14, 38),
(53, 14, 40),
(54, 14, 44),
(55, 14, 46),
(56, 15, 27),
(57, 15, 30),
(58, 15, 34),
(59, 15, 36),
(60, 15, 40),
(61, 15, 44),
(62, 15, 46),
(115, 13, 28),
(116, 13, 31),
(117, 13, 34),
(118, 13, 37),
(119, 13, 40),
(120, 13, 44),
(121, 13, 47),
(129, 20, 26),
(130, 20, 31),
(131, 20, 34),
(132, 20, 38),
(133, 20, 40),
(134, 20, 43),
(135, 20, 46),
(136, 21, 26),
(137, 21, 30),
(138, 21, 33),
(139, 21, 36),
(140, 21, 40),
(141, 21, 43),
(142, 21, 46),
(143, 22, 26),
(144, 22, 30),
(145, 22, 34),
(146, 22, 38),
(147, 22, 40),
(148, 22, 42),
(149, 22, 46),
(157, 24, 27),
(158, 24, 30),
(159, 24, 33),
(160, 24, 36),
(161, 24, 41),
(162, 24, 43),
(163, 24, 46),
(164, 23, 28),
(165, 23, 30),
(166, 23, 34),
(167, 23, 37),
(168, 23, 40),
(169, 23, 44),
(170, 23, 47),
(171, 25, 26),
(172, 25, 29),
(173, 25, 32),
(174, 25, 36),
(175, 25, 40),
(176, 25, 42),
(177, 25, 45),
(178, 26, 26),
(179, 26, 29),
(180, 26, 32),
(181, 26, 36),
(182, 26, 40),
(183, 26, 42),
(184, 26, 45),
(185, 27, 26),
(186, 27, 29),
(187, 27, 32),
(188, 27, 36),
(189, 27, 40),
(190, 27, 42),
(191, 27, 45);

-- --------------------------------------------------------

--
-- Table structure for table `comunale`
--

CREATE TABLE `comunale` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comunale`
--

INSERT INTO `comunale` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(5, 'COM-1', 'Comunale Mastrip', '2023-01-30 12:15:10', '2023-01-30 12:15:10'),
(6, 'COM-2', 'Comunale Tegalsari', '2023-01-30 12:15:30', '2023-01-30 12:15:30'),
(7, 'COM-3', 'Comunale Opak', '2023-01-30 12:16:00', '2023-01-30 12:16:00'),
(8, 'COM-4', 'Comunale Tenggilis', '2023-01-30 12:16:58', '2023-01-30 12:16:58'),
(9, 'COM-5', 'Comunale Tambaksari', '2023-01-30 12:17:15', '2023-01-30 12:17:15'),
(10, 'COM-6', 'Comunale Wiyung', '2023-01-30 12:17:37', '2023-01-30 12:17:37'),
(11, 'COM-7', 'Comunale Kenjeran', '2023-01-30 12:17:55', '2023-01-30 12:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Genre Brand 1', '2023-01-28 14:35:23', '2023-01-28 14:35:23'),
(2, 'Genre Brand 2', '2023-01-28 14:35:23', '2023-01-28 14:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `urutan_prioritas` tinyint(4) NOT NULL,
  `kode` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_bobot` enum('Benefit','Cost') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `urutan_prioritas`, `kode`, `nama`, `nilai_bobot`) VALUES
(16, 1, 'K1', 'Jenis Brand', 'Benefit'),
(17, 2, 'K2', 'Personal Brand', 'Benefit'),
(18, 3, 'K3', 'Range Harga', 'Cost'),
(19, 4, 'K4', 'Kategori', 'Benefit'),
(20, 5, 'K5', 'Target Pasar', 'Benefit'),
(21, 6, 'K6', 'Periode Sewa', 'Benefit'),
(22, 7, 'K7', 'Tempat Sewa', 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_detail`
--

CREATE TABLE `kriteria_detail` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_bobot` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_detail`
--

INSERT INTO `kriteria_detail` (`id`, `kriteria_id`, `keterangan`, `nilai_bobot`) VALUES
(26, 16, 'Makanan Ringan', 3),
(27, 16, 'Makanan Pokok', 2),
(28, 16, 'Minuman', 1),
(29, 17, 'Sangat Terkenal', 3),
(30, 17, 'Terkenal', 2),
(31, 17, 'Tidak Terkenal', 1),
(32, 18, 'Sangat Murah', 4),
(33, 18, 'Murah', 3),
(34, 18, 'Mahal', 2),
(35, 18, 'Sangat Mahal', 1),
(36, 19, 'Makanan Indonesia', 4),
(37, 19, 'Minuman Indonesia', 3),
(38, 19, 'Makanan Luar Negeri', 2),
(39, 19, 'Minuman Luar Negeri', 1),
(40, 20, 'Anak Muda', 2),
(41, 20, 'Orang Tua', 1),
(42, 21, '4 Tahun', 3),
(43, 21, '3 Tahun', 2),
(44, 21, '2 Tahun', 1),
(45, 22, 'Tenant Besar', 3),
(46, 22, 'Tenant Sedang', 2),
(47, 22, 'Tenant Kecil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_hitung` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`id`, `nama`, `keterangan`, `hasil_hitung`, `created_at`, `updated_at`) VALUES
(7, 'Perhitungan 1', 'Test Perhitungan 1', NULL, '2023-01-28 03:26:07', '2023-01-28 03:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Pengguna') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pengguna'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `password`, `level`) VALUES
(1, 'admin@gmail.com', 'Admin', '$2y$10$vrKrXN.vt/4crK.D79RA5.Q3C4fbDso5FUKtZ5yBIir2nfP4e1PKq', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `comunale_id` (`comunale_id`);

--
-- Indexes for table `alternatif_detail`
--
ALTER TABLE `alternatif_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id` (`alternatif_id`),
  ADD KEY `kriteria_detail_id` (`kriteria_detail_id`);

--
-- Indexes for table `comunale`
--
ALTER TABLE `comunale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `alternatif_detail`
--
ALTER TABLE `alternatif_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `comunale`
--
ALTER TABLE `comunale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_ibfk_2` FOREIGN KEY (`comunale_id`) REFERENCES `comunale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alternatif_detail`
--
ALTER TABLE `alternatif_detail`
  ADD CONSTRAINT `alternatif_detail_ibfk_1` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_detail_ibfk_2` FOREIGN KEY (`kriteria_detail_id`) REFERENCES `kriteria_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  ADD CONSTRAINT `kriteria_detail_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
