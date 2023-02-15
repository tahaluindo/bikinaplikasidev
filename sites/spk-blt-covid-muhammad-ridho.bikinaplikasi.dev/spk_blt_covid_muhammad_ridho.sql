-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Jul 19, 2022 at 07:10 AM
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
-- Database: `spk_blt_covid_muhammad_ridho`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `perhitungan_id` int(11) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `perhitungan_id`, `nama`, `no_identitas`, `alamat`, `no_hp`) VALUES
(5, 2, 'Riyan Riyadi', '1471091003993640', 'Kelurahan Kasang Jaya', '085755676789'),
(7, 2, 'Sairul', '1571081708660021', 'Kelurahan Kasang Jaya', '081381809561'),
(8, 2, 'Heri Afrizal', '1571030704800161', 'Kelurahan Kasang Jaya', '085238766354'),
(9, 2, 'A. Latief', '1571032606560021', 'Kelurahan Kasang Jaya', '092334355079'),
(10, 2, 'Tobing', '1571030708770061', 'Keluraha Kasang Jaya', '085350498979'),
(11, 2, 'Rudi Hartono', '1571030311700081', 'Kelurahan Karang Jaya', '081318947906');

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
(11, 5, 5),
(12, 5, 3),
(13, 5, 10),
(17, 11, 6),
(18, 11, 4),
(19, 11, 9),
(20, 7, 6),
(21, 7, 3),
(22, 7, 9),
(23, 8, 6),
(24, 8, 4),
(25, 8, 10),
(26, 9, 6),
(27, 9, 4),
(28, 9, 8),
(29, 10, 7),
(30, 10, 3),
(31, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan_prioritas` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `urutan_prioritas`) VALUES
(1, 'Penghasilan', 2),
(2, 'Jumlah Tanggungan', 1),
(3, 'Usia', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_detail`
--

CREATE TABLE `kriteria_detail` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan_prioritas` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_detail`
--

INSERT INTO `kriteria_detail` (`id`, `kriteria_id`, `keterangan`, `urutan_prioritas`) VALUES
(2, 1, '<= Rp1.500.000', 1),
(3, 1, '<= Rp2.000.000', 2),
(4, 1, '<= Rp2.500.000', 3),
(5, 2, '>= 4 Orang', 1),
(6, 2, '2-3 Orang', 2),
(7, 2, '1 Orang', 3),
(8, 3, '> 60', 1),
(9, 3, '> 50', 2),
(10, 3, '> 40', 3);

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'BLT Covid', 'Untuk orang yang kurang mampu saat covid', '2022-06-28 16:56:01', '2022-06-28 16:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `password`, `foto`, `level`) VALUES
(1, 'admin@gmail.com', 'Admin', '$2y$10$vrKrXN.vt/4crK.D79RA5.Q3C4fbDso5FUKtZ5yBIir2nfP4e1PKq', 'foto/man-avatar-profile-round-icon_24640-14044.jpg', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perhitungan_id` (`perhitungan_id`);

--
-- Indexes for table `alternatif_detail`
--
ALTER TABLE `alternatif_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id` (`alternatif_id`),
  ADD KEY `kriteria_detail_id` (`kriteria_detail_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `alternatif_detail`
--
ALTER TABLE `alternatif_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`perhitungan_id`) REFERENCES `perhitungan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
