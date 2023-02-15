-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 07:24 PM
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
-- Database: `reservasi_dan_travel_zaky`
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
(1, 'Ac', NULL);

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
(6, 'Senin', '07.00', '07.30'),
(7, 'Senin', '09.00', '09.30'),
(8, 'Senin', '13.00', '13.30'),
(9, 'Senin', '16.30', '17.00'),
(10, 'Selasa', '07.00', '07.30'),
(11, 'Selasa', '09.00', '09.30'),
(12, 'Selasa', '13.00', '13.30'),
(13, 'Selasa', '16.30', '17.00'),
(14, 'Rabu', '07.00', '07.30'),
(15, 'Rabu', '09.00', '09.30'),
(16, 'Rabu', '13.00', '13.30'),
(17, 'Rabu', '16.30', '17.00'),
(18, 'Kamis', '07.00', '07.30'),
(19, 'Kamis', '09.00', '09.30'),
(20, 'Kamis', '13.00', '13.30'),
(21, 'Kamis', '16.30', '17.00'),
(22, 'Jum\'at', '07.00', '07.30'),
(23, 'Jum\'at', '09.00', '09.30'),
(24, 'Jum\'at', '13.00', '13.30'),
(25, 'Jum\'at', '16.30', '17.00'),
(26, 'Sabtu', '07.00', '07.30'),
(27, 'Sabtu', '09.00', '09.30'),
(28, 'Sabtu', '13.00', '13.30'),
(29, 'Sabtu', '16.30', '17.00'),
(30, 'Minggu', '07.00', '07.30'),
(31, 'Minggu', '09.00', '09.30'),
(32, 'Minggu', '13.00', '13.30'),
(33, 'Minggu', '16.30', '17.00');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama`, `foto`) VALUES
(1, 'Jambi', 0x75706c6f6164732f31313131313131313131313131313132333233312e77656270),
(2, 'Kuala Tungkal', 0x75706c6f6164732f30393033323031395f7766632d74756e676b616c2e6a7067),
(6, 'Palembang', 0x75706c6f6164732f7769736174612d70616c656d62616e672e6a7067),
(7, 'bukit tinggi', 0x75706c6f6164732f3136353833393132383774726176656c2d70616c656d62616e672d6c616861742d4c656d6174616e672d5769736174612d54726176656c2e6a7067),
(8, 'Bandar Lampung', 0x75706c6f6164732f313636303731393838383132333332312e6a706567),
(9, 'Lampung', 0x75706c6f6164732f3136363037313939393731323331323132332e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_tujuan`
--

CREATE TABLE `lokasi_tujuan` (
  `id` int(11) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_tujuan`
--

INSERT INTO `lokasi_tujuan` (`id`, `rute_id`, `nama`, `deskripsi`, `gambar`) VALUES
(6, 1, 'Pelabuhan', 'sep', 0x75706c6f6164732f31363630373231363130646f776e6c6f6164202834292e6a7067),
(7, 3, 'Simpang kawat', 'sep', 0x75706c6f6164732f3136363037323137333574726176656c2d63762d796f73692d6d616e646972692e6a7067),
(8, 5, 'Telanai', 'sep', 0x75706c6f6164732f3136363037373633393373696d70616e675f6b617761742e6a7067),
(9, 6, 'Pelabuhan kapal', 'sep', 0x75706c6f6164732f3136363037373634333730393033323031395f7766632d74756e676b616c2e6a7067),
(10, 7, 'Jam gadang', 'sep', 0x75706c6f6164732f31363630373736343835313132332e6a7067),
(11, 8, 'palembang', 'sep', 0x75706c6f6164732f31363630373736363033696d61676573202831292e6a7067),
(12, 9, 'palembang1', 'sep', 0x75706c6f6164732f31363630373736363337696d61676573202831292e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jumlah_kursi` tinyint(2) NOT NULL,
  `biaya_rental` int(11) NOT NULL,
  `biaya_supir` int(11) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','Rusak') NOT NULL,
  `gambar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `nama`, `jumlah_kursi`, `biaya_rental`, `biaya_supir`, `status`, `gambar`) VALUES
(5, 'Inova', 6, 250000, 150000, 'Tersedia', 0x75706c6f6164732f31363631313536343432496e6f76612e6a7067),
(6, 'HRV', 6, 300000, 150000, 'Tersedia', 0x75706c6f6164732f313636313135363431354852562e6a7067),
(7, 'Avanza', 6, 300000, 200000, 'Tersedia', 0x75706c6f6164732f313636313135363335324176616e7a612e6a7067),
(8, 'Xenia', 6, 2500000, 150000, 'Tersedia', 0x75706c6f6164732f3136363131353633383058656e69612e6a7067);

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
(19, 7, 1),
(20, 8, 1),
(21, 6, 1),
(22, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `reservasi_tiket_id` int(11) DEFAULT NULL,
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
  `harga` int(11) NOT NULL,
  `benefit` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `spesial_offer` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `off` tinyint(4) NOT NULL,
  `gambar` blob DEFAULT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`, `harga`, `benefit`, `deskripsi`, `spesial_offer`, `off`, `gambar`, `status`) VALUES
(1, 'Paket a', 500000, 'jalan ke mana saja#pergi ke mana saja#minum apa saja#makan apa saja#gratiss', 'hanya di 1 menit pertama saja.', 'Tidak', 0, 0x75706c6f6164732f3136353832363837303674696d7468756d622e6a7067, 'Tersedia'),
(2, 'Paket b', 300000, 'jalan ke mana saja#pergi ke mana saja#minum apa saja#makan apa saja#gratiss', 'hanya di 1 menit pertama saja.', 'Ya', 0, 0x75706c6f6164732f3136353832363837313774617269662d7769736174612d363030783333392e6a7067, 'Tersedia'),
(3, 'paket c', 600000, 'benefit1#benefit2#benefit3', 'deskripsi ini adalah disini', 'Tidak', 20, 0x75706c6f6164732f3136353832363837323854726176656c2d426172616e672d42616e797577616e67692e6a7067, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_paket`
--

CREATE TABLE `pemesanan_paket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `bukti_transfer` blob DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `refund` int(11) NOT NULL DEFAULT 0,
  `status` enum('Baru','Dikonfirmasi','Dibatalkan','Refund') NOT NULL DEFAULT 'Dikonfirmasi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan_paket`
--

INSERT INTO `pemesanan_paket` (`id`, `user_id`, `paket_id`, `bukti_transfer`, `total_bayar`, `refund`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 0x75706c6f6164732f31363536323433393534576861747341707020496d61676520323032322d30362d31372061742032302e31352e31382e6a706567, 500000, 0, 'Baru', '2022-06-26 11:45:54', '2022-06-26 11:45:54'),
(10, 1396, 1, 0x75706c6f6164732f3136353632343730323873646673332e706e67, 500000, 0, 'Baru', '2022-06-26 12:37:08', '2022-06-26 12:37:08'),
(11, NULL, 1, 0x75706c6f6164732f31363536323535323739576861747341707020496d61676520323032322d30362d31372061742032302e31352e31382e6a706567, 480000, 200000, 'Baru', '2022-06-26 14:54:39', '2022-06-26 14:56:03'),
(12, 1402, 1, 0x75706c6f6164732f313635383735383037394a414d5f474144414e472c5f42554b49545f54494e4747492c5f53554d41544552415f42415241542e6a7067, 500000, 0, 'Baru', '2022-07-25 14:07:59', '2022-07-25 14:07:59'),
(13, 1402, 2, 0x75706c6f6164732f313635383735383239304a414d5f474144414e472c5f42554b49545f54494e4747492c5f53554d41544552415f42415241542e6a7067, 300000, 0, 'Baru', '2022-07-25 14:11:30', '2022-07-25 14:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `nama_penyedia` varchar(40) NOT NULL,
  `atas_nama` varchar(40) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `nama_penyedia`, `atas_nama`, `nomor_rekening`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DANA', 'Ramdan Riawan', '082282692489', 'Tersedia', '2022-06-19 22:14:33', '2022-06-19 22:14:33'),
(3, 'Bank BRI', 'ramdan riawan', '563201026697530', 'Tersedia', '2022-06-19 15:16:04', '2022-06-19 15:16:04'),
(4, 'Oppo', 'ramdan riawan', '082282692485', 'Tersedia', '2022-06-26 15:26:14', '2022-06-26 15:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `rental_mobil`
--

CREATE TABLE `rental_mobil` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobil_id` int(11) NOT NULL,
  `supir_id` int(11) DEFAULT NULL,
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `biaya_supir` int(11) DEFAULT 0,
  `total_bayar` int(11) NOT NULL,
  `bukti_transfer` varchar(100) DEFAULT NULL,
  `refund` int(11) DEFAULT 0,
  `status` enum('Baru','Dikonfirmasi','Refund','Dibatalkan') NOT NULL DEFAULT 'Dikonfirmasi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental_mobil`
--

INSERT INTO `rental_mobil` (`id`, `user_id`, `mobil_id`, `supir_id`, `dari_tanggal`, `sampai_tanggal`, `biaya_supir`, `total_bayar`, `bukti_transfer`, `refund`, `status`, `created_at`, `updated_at`) VALUES
(10, 1, 5, NULL, '2022-07-25', '2022-08-01', 150000, 8050000, 'uploads/1658758540JAM_GADANG,_BUKIT_TINGGI,_SUMATERA_BARAT.jpg', 0, 'Baru', '2022-07-25 14:15:40', '2022-07-25 14:15:40'),
(11, 1402, 5, NULL, '2022-07-25', '2022-08-01', 150000, 8050000, 'uploads/1658758713JAM_GADANG,_BUKIT_TINGGI,_SUMATERA_BARAT.jpg', 0, 'Baru', '2022-07-25 14:18:33', '2022-07-25 14:18:33'),
(12, 1402, 5, NULL, '2022-08-22', '2022-08-24', 150000, 400000, 'uploads/1660992734IMG_0209.JPG', 0, 'Baru', '2022-08-20 10:52:14', '2022-08-20 10:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_tiket`
--

CREATE TABLE `reservasi_tiket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tiket_id` int(11) NOT NULL,
  `jumlah` tinyint(2) NOT NULL,
  `berakhir_pada` date NOT NULL,
  `bukti_transfer` blob DEFAULT NULL,
  `pulang_pergi` enum('Ya','Tidak') NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `refund` int(11) NOT NULL DEFAULT 0,
  `status` enum('Baru','Dikonfirmasi','Dibatalkan','Refund') NOT NULL DEFAULT 'Dikonfirmasi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi_tiket`
--

INSERT INTO `reservasi_tiket` (`id`, `user_id`, `tiket_id`, `jumlah`, `berakhir_pada`, `bukti_transfer`, `pulang_pergi`, `total_bayar`, `refund`, `status`, `created_at`, `updated_at`) VALUES
(11, 1402, 7, 3, '2022-08-31', 0x75706c6f6164732f31363631303639333132576861747341707020496d61676520323032322d30382d32312061742031352e30302e33342e6a706567, 'Tidak', 180000, 0, 'Baru', '2022-08-21 01:08:32', '2022-08-21 01:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `ke` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `diskon_pulang_pergi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `dari`, `ke`, `biaya`, `diskon_pulang_pergi`) VALUES
(1, 1, 2, 70000, 10000),
(3, 2, 1, 70000, 20000),
(5, 6, 1, 150000, NULL),
(6, 9, 2, 420000, NULL),
(7, 1, 7, 250000, NULL),
(8, 8, 6, 250000, NULL),
(9, 7, 6, 350000, NULL);

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
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `jumlah` tinyint(4) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `supir_id` int(11) NOT NULL,
  `dimulai_pada` date NOT NULL DEFAULT current_timestamp(),
  `berakhir_pada` date NOT NULL,
  `pulang_pergi` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `nama`, `status`, `jumlah`, `mobil_id`, `rute_id`, `jadwal_id`, `supir_id`, `dimulai_pada`, `berakhir_pada`, `pulang_pergi`, `created_at`, `updated_at`) VALUES
(6, 'Senin Pagi', 'Tersedia', 6, 5, 1, 6, 1401, '2022-08-24', '2022-08-31', 'Ya', '2022-08-19 06:05:47', '2022-08-21 04:41:22'),
(7, 'Senin Jam 9', 'Tersedia', 6, 5, 1, 7, 1401, '2022-08-24', '2022-08-31', 'Ya', '2022-08-19 06:07:04', '2022-08-21 04:41:46'),
(8, 'Senin Siang', 'Tersedia', 6, 5, 1, 8, 1401, '2022-08-24', '2022-08-31', 'Ya', '2022-08-19 06:07:51', '2022-08-21 04:42:22'),
(10, 'Senin Sore', 'Tersedia', 6, 8, 1, 9, 1401, '2022-08-24', '2022-08-31', 'Ya', '2022-08-21 04:40:17', '2022-08-21 04:40:17'),
(11, 'Selasa Pagi', 'Tersedia', 6, 6, 3, 6, 1401, '2022-08-24', '2022-08-31', 'Ya', '2022-08-21 04:43:38', '2022-08-21 04:43:38'),
(13, 'Tungkal', 'Tersedia', 6, 5, 6, 7, 1401, '2022-01-24', '2022-01-24', 'Ya', '2022-08-21 04:46:25', '2022-08-21 04:46:25'),
(14, 'bukit tinggi', 'Tersedia', 6, 6, 7, 8, 1401, '2022-08-24', '2022-08-31', 'Ya', '2022-08-21 04:47:37', '2022-08-21 04:47:37'),
(15, 'Palembagn Jambi', 'Tersedia', 6, 5, 5, 7, 1401, '2022-01-24', '2022-08-31', 'Ya', '2022-08-22 01:23:32', '2022-08-22 01:23:32'),
(16, 'Lampung Kuala tungkal', 'Tersedia', 6, 5, 6, 9, 1401, '2022-01-24', '2022-08-24', 'Ya', '2022-08-22 01:24:30', '2022-08-22 01:24:30');

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
(1, 'Admin', 'admin@gmail.com', '082282692488', '$2y$10$w2bM/LrXjFGNj.kBflYXO.9YY/7Z9jmHV9CxtSx6uju.i0h5B5oUi', 'Admin', 0x75706c6f6164732f313635363233333935386c6f676f2e6a706567, NULL),
(1396, 'ramdan riawan', 'ramdanriawan3@gmail.com', '082282692486', '$2y$10$fxvgjNL/iOdOf./IrVRXsO5pyuplSCeOo2.zNNayOwT/QQt1fWfM.', 'Pelanggan', 0x75706c6f6164732f31363536323436343138576861747341707020496d61676520323032322d30362d31372061742032302e31352e31382e6a706567, NULL),
(1401, 'supir', 'supir@gmail.com', '082282692485', '$2y$10$JjZLJ0n8NeA8Sjgn3CPgk.72BVfnvzUO3GTC3zrrkGUhKenzdfLvm', 'Supir', NULL, NULL),
(1402, 'zaki', '1234@gmail.com', '082131230123', '$2y$10$yJpjoCW9DFFPlWXQX265UuUAluGTfTk.pYT.bgGKd2b7YJTiPCeHC', 'Pelanggan', NULL, NULL);

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
-- Indexes for table `lokasi_tujuan`
--
ALTER TABLE `lokasi_tujuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rute_id` (`rute_id`);

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
  ADD KEY `reservasi_tiket_id` (`reservasi_tiket_id`),
  ADD KEY `rental_mobil_id` (`rental_mobil_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_mobil`
--
ALTER TABLE `rental_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobil_id` (`mobil_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `supir_id` (`supir_id`);

--
-- Indexes for table `reservasi_tiket`
--
ALTER TABLE `reservasi_tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiket_id` (`tiket_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobil_id` (`mobil_id`),
  ADD KEY `rute_id` (`rute_id`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `supir_id` (`supir_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lokasi_tujuan`
--
ALTER TABLE `lokasi_tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobil_fasilitas`
--
ALTER TABLE `mobil_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rental_mobil`
--
ALTER TABLE `rental_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservasi_tiket`
--
ALTER TABLE `reservasi_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1403;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lokasi_tujuan`
--
ALTER TABLE `lokasi_tujuan`
  ADD CONSTRAINT `lokasi_tujuan_ibfk_1` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`reservasi_tiket_id`) REFERENCES `reservasi_tiket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`rental_mobil_id`) REFERENCES `rental_mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  ADD CONSTRAINT `pemesanan_paket_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_paket_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rental_mobil`
--
ALTER TABLE `rental_mobil`
  ADD CONSTRAINT `rental_mobil_ibfk_1` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_mobil_ibfk_2` FOREIGN KEY (`supir_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_mobil_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi_tiket`
--
ALTER TABLE `reservasi_tiket`
  ADD CONSTRAINT `reservasi_tiket_ibfk_1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_tiket_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`dari`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`ke`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`supir_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
