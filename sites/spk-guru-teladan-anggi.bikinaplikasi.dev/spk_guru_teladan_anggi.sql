-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 15, 2022 at 10:30 AM
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
-- Database: `spk_guru_teladan_anggi`
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
(5, 2, 'Achmadi, S.Pd', '1471091003993640', 'Kelurahan Kasang Jaya', '0808080808'),
(6, 2, 'Cahyono Subiyanto, S.Pd', '1571032005690000', 'Kelurahan Kasang Jaya', '080808080808'),
(7, 2, 'Neti Helnawati, S.Sos', '8020160186', 'jambi', '082282692481'),
(8, 2, 'Kurniawan, S.Pd', '1571070901980001', 'telanai', '082282692482'),
(9, 2, 'Mirza Elania, S.Pd', '5634564646456456', 'muaro bulian', '08334455667766'),
(10, 2, 'Emi Yuliyana, S.Pd', '8020160187', 'palembang', '083344556677'),
(11, 2, 'Meri Lismayanti, S.Pd', '1234568789', 'dfghfdh', '083344556999'),
(12, 2, 'Muhdarin, S.Pd', '56756756', 'fdhdfhfd hdfhd', '08334455667788'),
(13, 2, 'Ryzka Prihartini, S.Pd', '678678678', 'ibrahim', '6282282692489'),
(14, 2, 'Androy, S.Pd', '802016018645', 'jalan raya', '12345678901');

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
(17, 5, 7),
(18, 5, 19),
(19, 5, 13),
(20, 5, 24),
(21, 5, 31),
(22, 6, 6),
(23, 6, 15),
(24, 6, 18),
(25, 6, 24),
(26, 6, 28),
(27, 7, 5),
(28, 7, 14),
(29, 7, 20),
(30, 7, 24),
(31, 7, 28),
(32, 8, 6),
(33, 8, 18),
(34, 8, 13),
(35, 8, 24),
(36, 8, 29),
(37, 9, 5),
(38, 9, 19),
(39, 9, 14),
(40, 9, 23),
(41, 9, 29),
(42, 10, 5),
(43, 10, 20),
(44, 10, 14),
(45, 10, 23),
(46, 10, 28),
(47, 11, 18),
(48, 11, 6),
(49, 11, 14),
(50, 11, 23),
(51, 11, 31),
(52, 12, 5),
(53, 12, 19),
(54, 12, 15),
(55, 12, 25),
(56, 12, 29),
(57, 13, 6),
(58, 13, 19),
(59, 13, 14),
(60, 13, 24),
(61, 13, 29),
(62, 14, 6),
(63, 14, 20),
(64, 14, 15),
(65, 14, 24),
(66, 14, 29);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `nilai`) VALUES
(1, 'Kemampuan Bidang Studi', 8),
(2, 'Kepribadian', 9),
(3, 'Kedisiplinan', 8),
(10, 'Kemampuan Mengajar', 8),
(11, 'Kemampuan bekerja sama', 7);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_detail`
--

CREATE TABLE `kriteria_detail` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_detail`
--

INSERT INTO `kriteria_detail` (`id`, `kriteria_id`, `keterangan`, `nilai`) VALUES
(5, 2, 'Cukup', 3),
(6, 2, 'Baik', 4),
(7, 2, 'Sangat Baik', 5),
(11, 2, 'Kurang', 2),
(12, 2, 'Sangat Kurang', 1),
(13, 1, 'Cukup', 3),
(14, 1, 'Baik', 4),
(15, 1, 'Sangat Baik', 5),
(16, 1, 'Kurang', 2),
(17, 1, 'Sangat Kurang', 1),
(18, 3, 'Cukup', 3),
(19, 3, 'Baik', 4),
(20, 3, 'Sangat Baik', 5),
(21, 3, 'Kurang', 2),
(22, 3, 'Sangat Kurang', 1),
(23, 10, 'Cukup', 3),
(24, 10, 'Baik', 4),
(25, 10, 'Sangat Baik', 5),
(26, 10, 'Kurang', 2),
(27, 10, 'Sangat Kurang', 1),
(28, 11, 'Cukup', 3),
(29, 11, 'Baik', 4),
(30, 11, 'Sangat Baik', 5),
(31, 11, 'Kurang', 2),
(32, 11, 'Sangat Kurang', 1);

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
(2, 'Guru Teladan SMP N 26', 'Pemilihan guru teladan 2022', '2022-06-28 16:56:01', '2022-07-04 22:22:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `alternatif_detail`
--
ALTER TABLE `alternatif_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
