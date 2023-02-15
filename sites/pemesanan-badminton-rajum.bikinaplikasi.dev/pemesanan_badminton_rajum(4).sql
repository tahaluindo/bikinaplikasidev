-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 08:48 AM
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
-- Database: `pemesanan_badminton_rajum`
--

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'lapangan 2', '2023-01-09 20:29:19', '2023-01-09 20:29:19'),
(4, 'lapangan 3', '2023-01-09 20:29:19', '2023-01-09 20:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `lapangan_id` int(11) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `waktu_mulai` varchar(20) NOT NULL,
  `jumlah_jam` tinyint(4) NOT NULL,
  `bukti_transfer` varchar(100) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `status` enum('Diterima','Dibatalkan','Pending') NOT NULL DEFAULT 'Pending',
  `metode_pembayaran` enum('COD','Transfer','-') DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `lapangan_id`, `atas_nama`, `no_hp`, `waktu_mulai`, `jumlah_jam`, `bukti_transfer`, `catatan`, `status`, `metode_pembayaran`, `created_at`, `updated_at`) VALUES
(4, 2, 'atas nama ini itu', '082282692269', '2023-01-11T11:00', 3, NULL, 'catatan', 'Diterima', '-', '2023-01-11 04:54:50', '2023-01-11 04:54:50'),
(5, 2, 'tidak tahu', 'no hpnya d mana', '2023-01-11T08:00', 2, NULL, 'catatan', 'Diterima', '-', '2023-01-11 04:55:55', '2023-01-11 04:55:55'),
(6, 2, 'atas nama ini itu', '082282692482', '2023-01-11T17:00', 2, NULL, 'dsfsdf', 'Diterima', '-', '2023-01-11 06:10:26', '2023-01-11 06:10:26'),
(7, 4, 'tidak tahu', 'no hpnya d mana', '2023-01-11T08:00', 2, NULL, 'catatan', 'Diterima', '-', '2023-01-11 04:55:55', '2023-01-11 04:55:55'),
(8, 4, 'atas nama ini itu', '082282692482', '2023-01-11T17:00', 2, NULL, 'dsfsdf', 'Diterima', '-', '2023-01-11 06:10:26', '2023-01-11 06:10:26');

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
(8, 'Admin', 'admin@gmail.com', '$2y$10$vSCLT7FtebNkv5HMCk40K.5S811589HmJ8HRc2IYQK.zJi0mzbx5y', 's4OlHqCx1DzTzI5dt49MUejh2VgbCkhDeikALM5TdTRUAv5Gs3qH5e9JOpwE', 'Admin', '2022-08-29 12:19:52', '2022-08-29 12:19:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lapangan_id` (`lapangan_id`);

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
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
