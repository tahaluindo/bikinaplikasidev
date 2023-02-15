-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2020 at 05:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nisa.bikinaplikasi.dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_kelas_table', 1),
(2, '2014_10_12_000001_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_04_28_213835_create_sekolahs_table', 1),
(5, '2020_04_28_224446_create_pembayaran_santris_table', 1),
(6, '2020_04_28_225948_create_pembayaran_santri_bulans_table', 1),
(7, '2020_04_28_230717_create_pembayaran_santri_details_table', 1),
(8, '2020_04_28_234351_create_transaksi_lainnyas_table', 1),
(9, '2020_04_29_001518_create_transaksi_lainnya_details_table', 1),
(13, '2020_05_02_132706_create_pembayaran_gedungs_table', 2),
(15, '2020_05_02_140430_create_pembayaran_gedung_details_table', 3);

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
-- Table structure for table `pembayaran_infaqs`
--

CREATE TABLE `pembayaran_infaqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `nominal` mediumint(9) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_infaqs`
--

INSERT INTO `pembayaran_infaqs` (`id`, `tahun`, `nominal`, `keterangan`) VALUES
(3, 2020, 100000, '234234');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_infaq_details`
--

CREATE TABLE `pembayaran_infaq_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_gedung_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Lunas','Belum Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `nominal_dibayar` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_santris`
--

CREATE TABLE `pembayaran_santris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `nominal_spp_default` mediumint(9) NOT NULL,
  `nominal_uang_makan_default` mediumint(9) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_santris`
--

INSERT INTO `pembayaran_santris` (`id`, `tahun`, `nominal_spp_default`, `nominal_uang_makan_default`, `keterangan`) VALUES
(1, 2018, 100000, 100000, 'SPP Angkatan 2018'),
(2, 2019, 200000, 200000, 'SPP Angkatan 2019'),
(3, 2020, 300000, 300000, 'SPP Angkatan 2020');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_santri_bulans`
--

CREATE TABLE `pembayaran_santri_bulans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_santri_id` bigint(20) UNSIGNED NOT NULL,
  `nama` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_santri_bulans`
--

INSERT INTO `pembayaran_santri_bulans` (`id`, `pembayaran_santri_id`, `nama`) VALUES
(18, 1, 'Januari'),
(19, 1, 'Februari'),
(20, 1, 'Maret'),
(21, 1, 'April'),
(22, 1, 'Mei'),
(23, 1, 'Juni'),
(24, 1, 'Juli'),
(25, 1, 'Agustus'),
(26, 1, 'September');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_santri_details`
--

CREATE TABLE `pembayaran_santri_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_santri_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_santri_bulan_id` bigint(20) UNSIGNED NOT NULL,
  `nominal_spp_dibayar` mediumint(9) NOT NULL,
  `nominal_uang_makan_dibayar` mediumint(9) NOT NULL,
  `nominal_belum_dibayar` mediumint(9) NOT NULL,
  `potongan` mediumint(9) NOT NULL DEFAULT '0',
  `status` enum('Lunas','Belum Lunas','Bebas SPP','Bebas Makan','Santri Baru','Santri Keluar','Bebas SPP dan Uang Makan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `tanggal_bayar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_santri_details`
--

INSERT INTO `pembayaran_santri_details` (`id`, `pembayaran_santri_id`, `user_id`, `pembayaran_santri_bulan_id`, `nominal_spp_dibayar`, `nominal_uang_makan_dibayar`, `nominal_belum_dibayar`, `potongan`, `status`, `catatan`, `tanggal_bayar`, `created_at`, `updated_at`) VALUES
(63, 1, 26, 18, 100000, 100000, 0, 0, 'Lunas', '-', '2020-05-05', '2020-05-04 21:32:25', '2020-05-04 21:32:25'),
(64, 1, 26, 19, 100000, 100000, 0, 0, 'Lunas', '-', '2020-05-05', '2020-05-04 21:32:25', '2020-05-04 21:32:25'),
(65, 1, 26, 21, 100000, 100000, 0, 0, 'Lunas', '-', '2020-05-05', '2020-05-04 21:32:25', '2020-05-04 21:32:25'),
(66, 1, 26, 22, 100000, 100000, 0, 0, 'Lunas', '-', '2020-05-05', '2020-05-04 21:32:25', '2020-05-04 21:32:25'),
(75, 1, 5, 18, 100000, 100000, 0, 0, 'Lunas', '-', '2020-05-05', '2020-05-04 21:36:49', '2020-05-04 21:36:49'),
(76, 1, 5, 21, 100000, 100000, 0, 0, 'Lunas', '-', '2020-05-05', '2020-05-04 21:36:49', '2020-05-04 21:36:49'),
(77, 1, 5, 22, 100000, 100000, 0, 0, 'Lunas', '-', '2020-05-05', '2020-05-04 21:36:49', '2020-05-04 21:36:49'),
(78, 1, 4, 18, 500000, 100000, 0, 0, 'Lunas', '-', '2020-05-01', NULL, NULL),
(79, 1, 4, 18, 100000, 0, 0, 0, 'Lunas', '-', '2020-10-31', NULL, NULL),
(109, 1, 534, 25, 75000, 100000, 25000, 25, 'Lunas', '- sdfsdfsdfsdf', '2020-09-06', '2020-10-16 01:09:05', '2020-10-16 01:09:05'),
(110, 1, 534, 26, 75000, 100000, 25000, 25, 'Lunas', '- sdfsdfsdfsdf', '2020-09-06', '2020-10-16 01:09:05', '2020-10-16 01:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `nama`, `logo`) VALUES
(1, 'Pondok Pesantren Al-Qosim', 'img/img.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_lainnyas`
--

CREATE TABLE `transaksi_lainnyas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Pengeluaran','Pemasukan') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_lainnyas`
--

INSERT INTO `transaksi_lainnyas` (`id`, `nama`, `jenis`) VALUES
(1, 'Air Galon', 'Pengeluaran'),
(2, 'Beban Listrik Mat\'am', 'Pengeluaran'),
(3, 'Pembelian ATK', 'Pengeluaran'),
(7, 'Pembelian gajelas', 'Pemasukan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_lainnya_details`
--

CREATE TABLE `transaksi_lainnya_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_lainnya_id` bigint(20) UNSIGNED NOT NULL,
  `nominal_dibayar` mediumint(8) UNSIGNED NOT NULL,
  `status` enum('Lunas','Belum Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_lainnya_details`
--

INSERT INTO `transaksi_lainnya_details` (`id`, `transaksi_lainnya_id`, `nominal_dibayar`, `status`, `tanggal_bayar`, `created_at`, `updated_at`) VALUES
(1, 1, 100000, 'Lunas', '2020-05-21', '2020-05-02 00:34:55', '2020-05-02 00:34:55'),
(5, 1, 100000, 'Lunas', '2020-05-21', NULL, NULL),
(6, 7, 100000, 'Belum Lunas', '2020-05-21', NULL, NULL),
(8, 1, 200000, 'Lunas', '2020-05-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('siswa','admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` smallint(4) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kelas_id`, `nama`, `email`, `password`, `level`, `angkatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', '$2y$10$4KBClzerYVdqNRezIMzjSeBmHh7ndKf9b7bIl5Xst3kT/K5RwUMt.', 'admin', 0, 'NkOAJnAAXmpXEQ3Bk3CbxBnaMbRuDc7QxvmCEwmMHgof323YrBZOJflzjPll', '2020-04-29 15:02:41', '2020-09-28 16:17:03'),
(2, NULL, 'Wawan Firmansyah2', 'lazuardi.ilsa@example.com2', '$2y$10$6osWLhgfVk1g7IOS/xghOO379Uc9O.eVtZZN4Wmq1X1oda/PMdReO', 'admin', 0, NULL, '2020-04-29 15:02:41', '2020-05-04 03:56:37'),
(3, 1, 'harjo04@example.net', 'harjo04@example.net', '$2y$10$pWuAIpgiaG593fjsIarN0OE6iGrhGRWFxixnZNZjB2RIdQ6P370Pu', 'admin', 0, NULL, '2020-04-29 15:02:41', '2020-05-04 04:17:40'),
(4, 1, 'Kezia Halimah', 'tri.pradana@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:41', '2020-04-29 15:02:41'),
(5, 1, 'Ida Tari Andriani', 'farah94@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:41', '2020-04-29 15:02:41'),
(6, 3, 'Irfan Wahyudin', 'prastuti.karen@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:41', '2020-04-29 15:02:41'),
(7, 1, 'Banara Kusumo', 'asamosir@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:42', '2020-04-29 15:02:42'),
(8, 3, 'Tania Padmasari', 'saptono.jaiman@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:42', '2020-04-29 15:02:42'),
(9, 3, 'Kania Laksmiwati S.E.I', 'kmelani@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:42', '2020-04-29 15:02:42'),
(10, 2, 'Hardi Wasita', 'xhariyah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:42', '2020-04-29 15:02:42'),
(14, 3, 'Dimas Darsirah Saefullah', 'malika.mayasari@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:42', '2020-04-29 15:02:42'),
(19, 2, 'Candra Utama', 'vivi76@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:42', '2020-04-29 15:02:42'),
(20, 2, 'Jumari Prayitna Hidayat', 'laras.pangestu@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:42', '2020-04-29 15:02:42'),
(21, 1, 'Jatmiko Rafid Saragih', 'esafitri@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(22, 1, 'Ganep Gaiman Nashiruddin S.H.', 'nilam43@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(23, 2, 'Darman Habibi', 'pangestu51@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(24, 2, 'Farah Vivi Hastuti', 'uyainah.rahmi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(25, 2, 'Unjani Namaga', 'uwais.tina@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(26, 3, 'Vanya Laksita', 'januar.humaira@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(27, 2, 'Pranata Prayoga', 'citra.rahmawati@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(28, 2, 'Cinthia Najwa Purnawati', 'saragih.saiful@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(29, 3, 'Aisyah Pudjiastuti', 'maya.hutagalung@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(30, 2, 'Eli Najwa Utami', 'puspa.hariyah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(31, 1, 'Wadi Hidayat', 'tnajmudin@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(32, 3, 'Yance Anggraini M.Pd', 'fnainggolan@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:43', '2020-04-29 15:02:43'),
(33, 3, 'Langgeng Ramadan', 'utami.maya@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(34, 3, 'Perkasa Widodo', 'jarwa.laksmiwati@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(35, 3, 'Bahuwarna Maryadi', 'gabriella.pertiwi@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(36, 2, 'Ulva Pratiwi', 'isimbolon@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(37, 1, 'Zizi Namaga M.Farm', 'lestari.mustofa@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(38, 1, 'Winda Carla Nuraini', 'eva.wulandari@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(39, 3, 'Dodo Cengkal Sihombing', 'khardiansyah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(40, 1, 'Opan Hakim', 'bahuwarna46@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(41, 3, 'Elma Juli Anggraini S.Psi', 'mprakasa@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(42, 2, 'Raden Mangunsong', 'maya29@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(43, 1, 'Banawi Situmorang', 'palastri.pia@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(44, 3, 'Calista Hartati', 'novitasari.harjo@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(45, 3, 'Daliman Kajen Januar S.Kom', 'yprastuti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(46, 3, 'Ghani Waskita M.M.', 'laksmiwati.wahyu@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:44', '2020-04-29 15:02:44'),
(47, 1, 'Jagaraga Firgantoro S.Kom', 'waskita.kadir@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(48, 1, 'Rangga Cahya Marpaung S.E.I', 'handayani.janet@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(49, 1, 'Embuh Nashiruddin', 'gadang.budiman@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(50, 2, 'Cakrabuana Dadap Manullang', 'uchita.hartati@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(51, 2, 'Hasim Saptono', 'novi.maryati@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(52, 3, 'Bakda Hidayanto', 'laksita.atma@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(53, 2, 'Legawa Balamantri Wijaya S.Sos', 'yani.laksmiwati@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(54, 1, 'Hilda Safitri', 'empluk00@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(55, 3, 'Gasti Wastuti S.H.', 'vharyanto@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(56, 1, 'Amelia Elma Andriani', 'uyainah.cornelia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(57, 3, 'Cinthia Iriana Yuniar S.Pt', 'ozulaika@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(58, 2, 'Digdaya Prasasta S.Gz', 'teddy.nababan@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(59, 1, 'Yuliana Oktaviani M.Ak', 'jamil.oktaviani@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(60, 1, 'Gawati Riyanti', 'carub78@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(61, 1, 'Prabawa Cahyanto Natsir', 'eka.suartini@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:45', '2020-04-29 15:02:45'),
(62, 2, 'Garda Wibisono', 'novitasari.teguh@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(63, 3, 'Adinata Perkasa Najmudin', 'luluh76@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(64, 1, 'Rahayu Pratiwi', 'kania86@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(65, 1, 'Jelita Fujiati', 'umaryadi@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(66, 3, 'Banawa Banara Kurniawan S.Ked', 'mulyani.jefri@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(67, 3, 'Janet Rahayu', 'jane23@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(68, 1, 'Bahuwarna Uda Hutapea S.Farm', 'opan.mahendra@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(69, 1, 'Tira Gina Yuniar', 'nyana13@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(70, 2, 'Kalim Jail Dongoran', 'siregar.jamal@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(71, 3, 'Nilam Nurdiyanti', 'safina.nababan@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(72, 2, 'Pandu Pangestu S.Farm', 'imandala@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(73, 3, 'Michelle Cici Oktaviani', 'jailani.nasrullah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(74, 2, 'Kiandra Hasanah', 'wani.nasyiah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(75, 2, 'Maya Wastuti S.Sos', 'among.mayasari@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:46', '2020-04-29 15:02:46'),
(76, 3, 'Ratna Hasanah S.Pt', 'soleh78@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(77, 3, 'Samiah Pudjiastuti', 'gabriella.natsir@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(78, 2, 'Hardana Uda Kuswoyo', 'hastuti.nadia@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(79, 1, 'Leo Prabowo S.IP', 'whalim@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(80, 2, 'Gilang Sidiq Siregar S.Psi', 'pardianto@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(81, 1, 'Rahmi Yuniar S.Pt', 'oprasetyo@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(82, 2, 'Rudi Wijaya', 'genta.hasanah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(83, 3, 'Dadap Haryanto', 'chandra24@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(84, 1, 'Caket Edison Mandala M.Farm', 'cmulyani@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(85, 2, 'Rahmi Bella Mayasari S.IP', 'lasmanto10@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(86, 2, 'Kacung Maryadi', 'hartati.darmaji@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(87, 3, 'Restu Hasanah', 'phariyah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(88, 2, 'Edward Thamrin', 'nashiruddin.malika@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(89, 1, 'Karimah Cinta Wulandari', 'suryatmi.ciaobella@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(90, 1, 'Kawaca Mustofa', 'ibrahim75@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(91, 1, 'Jane Dian Padmasari M.Ak', 'lamar38@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:47', '2020-04-29 15:02:47'),
(92, 2, 'Humaira Vanesa Utami M.Pd', 'hpertiwi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(93, 1, 'Gamani Rajasa M.Kom.', 'paiman68@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(94, 2, 'Hafshah Wastuti M.Ak', 'cici64@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(95, 2, 'Ganjaran Zulkarnain', 'jmangunsong@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(96, 2, 'Vero Darimin Maheswara S.Ked', 'jessica97@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(97, 3, 'Kiandra Hartati', 'umandasari@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(98, 2, 'Dina Anita Hartati S.H.', 'akarsana.maryati@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(99, 2, 'Gaduh Luhung Samosir', 'qrahayu@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(100, 1, 'Karta Sinaga S.T.', 'mardhiyah.karta@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(101, 3, 'Xanana Radika Tamba', 'airawan@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(102, 3, 'Rini Jelita Sudiati', 'qlaksmiwati@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(103, 2, 'Respati Surya Najmudin S.Ked', 'gprakasa@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(104, 1, 'Nalar Kemal Halim S.Gz', 'bambang94@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(105, 1, 'Oliva Maida Zulaika S.E.', 'yusuf.permata@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(106, 1, 'Humaira Puspasari', 'erik54@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(107, 2, 'Hardana Sitompul', 'estiawan13@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:48', '2020-04-29 15:02:48'),
(108, 1, 'Yance Farida', 'zwijayanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(109, 3, 'Rina Nasyiah', 'jyolanda@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(110, 2, 'Gilda Suryatmi', 'asmuni.nasyidah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(111, 2, 'Tari Puspasari', 'novi11@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(112, 3, 'Hardana Maheswara', 'waluyo.melani@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(113, 3, 'Jaka Mansur', 'nababan.nasim@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(114, 3, 'Luwes Lukita Prabowo M.M.', 'anggraini.mutia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(115, 3, 'Irma Palastri', 'kartika.habibi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(116, 1, 'Jelita Wastuti', 'astuti.olivia@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(117, 3, 'Marwata Karsa Mandala', 'ihidayat@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(118, 2, 'Mutia Padmasari', 'ciaobella59@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(119, 1, 'Gilda Purwanti', 'azalea.saefullah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(120, 3, 'Limar Sirait', 'hendra06@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(121, 2, 'Caket Caket Marpaung', 'cpuspita@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:49', '2020-04-29 15:02:49'),
(122, 3, 'Imam Maheswara M.Pd', 'ofujiati@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(123, 2, 'Anita Kamila Prastuti S.Pt', 'fitria.wijaya@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(124, 3, 'Sabri Rajasa', 'yani41@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(125, 2, 'Salimah Pertiwi', 'prasetya.ifa@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(126, 1, 'Nadine Agustina', 'purwanto.namaga@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(127, 3, 'Rina Fujiati', 'cornelia05@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(128, 1, 'Hasna Riyanti', 'kadriansyah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(129, 3, 'Prasetyo Prasetyo', 'wulan47@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(130, 2, 'Bakti Jarwa Irawan M.Ak', 'cici.mustofa@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(131, 2, 'Endra Utama', 'najam.saefullah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(132, 1, 'Yuni Yuniar', 'bpermata@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:50', '2020-04-29 15:02:50'),
(133, 2, 'Bahuraksa Sihotang', 'puspita.hasna@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(134, 3, 'Citra Safitri', 'zhariyah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(135, 1, 'Zaenab Ami Widiastuti S.T.', 'wawan26@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(136, 3, 'Olivia Gabriella Nuraini', 'tmelani@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(137, 1, 'Hartaka Jinawi Mangunsong', 'ida67@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(138, 3, 'Kairav Candrakanta Ardianto', 'jefri.hidayanto@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(139, 3, 'Alambana Nardi Pradipta M.Farm', 'arta16@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(140, 1, 'Elma Yolanda S.I.Kom', 'ramadan.harto@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(141, 2, 'Tedi Waluyo', 'hidayanto.baktiadi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(142, 2, 'Ella Febi Puspasari S.Sos', 'pertiwi.shania@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(143, 2, 'Salimah Mardhiyah', 'simanjuntak.puput@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(144, 1, 'Kartika Belinda Fujiati S.Ked', 'qnuraini@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(145, 3, 'Makara Wasita', 'opuspasari@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:51', '2020-04-29 15:02:51'),
(146, 3, 'Nasim Hakim', 'dewi.mayasari@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(147, 2, 'Uli Kani Sudiati S.Sos', 'kamila25@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(148, 2, 'Muni Prabowo M.Farm', 'vino12@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(149, 2, 'Nyoman Pranowo', 'handayani.elon@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(150, 1, 'Slamet Sitorus', 'hasta.lailasari@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(151, 1, 'Paris Titin Wastuti', 'kusmawati.silvia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(152, 2, 'Jaeman Prabowo S.E.I', 'bajragin40@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(153, 2, 'Fathonah Yolanda', 'puspita.tirtayasa@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(154, 1, 'Kayun Sitorus', 'priyanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(155, 1, 'Jaeman Prayoga', 'raden11@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:52', '2020-04-29 15:02:52'),
(156, 2, 'Utama Galar Gunarto', 'dasa49@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(157, 2, 'Lega Martana Mahendra', 'yprabowo@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(158, 3, 'Dalimin Martani Habibi', 'mutia40@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(159, 3, 'Ibun Santoso S.Psi', 'maulana.murti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(160, 3, 'Dalima Anggraini', 'candra.mulyani@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(161, 2, 'Ajimat Karman Putra', 'pangestu.kala@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(162, 3, 'Najwa Laksmiwati', 'uprasetyo@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(163, 2, 'Lintang Sarah Farida', 'shakila.saragih@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(164, 1, 'Ani Suryatmi', 'maida22@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(165, 2, 'Intan Usada', 'bwidodo@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(166, 2, 'Pangeran Tampubolon', 'nashiruddin.erik@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(167, 1, 'Eli Zulaika', 'rahman.tarihoran@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(168, 2, 'Yahya Manullang', 'artanto.riyanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:53', '2020-04-29 15:02:53'),
(169, 1, 'Bancar Prasetyo S.Gz', 'rini.puspita@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(170, 2, 'Luthfi Hasim Hutagalung', 'emaheswara@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(171, 1, 'Carla Suryatmi M.Kom.', 'dmaulana@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(172, 3, 'Oni Rahimah', 'setiawan.yessi@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(173, 3, 'Mila Wahyuni', 'purwa.natsir@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(174, 3, 'Tugiman Permadi M.Pd', 'vero78@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(175, 3, 'Gamblang Megantara', 'maya.jailani@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(176, 2, 'Vinsen Irawan S.Ked', 'oprasetya@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(177, 1, 'Nadia Clara Uyainah', 'eyuliarti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(178, 1, 'Yunita Maimunah Palastri', 'bancar.hasanah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(179, 2, 'Najwa Endah Susanti', 'qprastuti@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(180, 3, 'Atma Embuh Mansur M.Kom.', 'mlestari@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(181, 1, 'Farhunnisa Kuswandari M.TI.', 'ismail.situmorang@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(182, 2, 'Ifa Purnawati S.Gz', 'okto77@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(183, 1, 'Banawa Siregar', 'kuswandari.lintang@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:54', '2020-04-29 15:02:54'),
(184, 2, 'Pia Genta Anggraini S.Gz', 'rudi.mustofa@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(185, 1, 'Kadir Situmorang', 'pangeran.thamrin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(186, 1, 'Vivi Nurul Lailasari S.Gz', 'waluyo.pranowo@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(187, 3, 'Hilda Ami Utami M.Ak', 'niyaga98@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(188, 2, 'Fitriani Yulianti', 'jindra.melani@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(189, 1, 'Caraka Sinaga', 'kardi69@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(190, 2, 'Ozy Mariadi Mangunsong S.Psi', 'michelle55@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(191, 1, 'Queen Purwanti', 'eli.wijayanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(192, 1, 'Almira Wijayanti', 'qusada@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(193, 2, 'Halima Safitri', 'laksmiwati.victoria@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(194, 2, 'Suci Hastuti', 'zelaya.rahimah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(195, 1, 'Gara Maheswara', 'melani.melinda@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(196, 2, 'Kadir Daruna Mansur', 'mayasari.ilsa@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(197, 1, 'Yani Pertiwi', 'samiah.hutapea@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(198, 3, 'Wadi Prasetyo S.Ked', 'apadmasari@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:55', '2020-04-29 15:02:55'),
(199, 3, 'Rahmi Zelaya Wastuti M.Kom.', 'bpratama@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(200, 2, 'Adikara Sihombing S.I.Kom', 'ulya.budiyanto@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(201, 3, 'Jamil Nashiruddin M.M.', 'tarihoran.rahmi@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(202, 2, 'Jono Gatot Manullang S.Ked', 'rendy.thamrin@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(203, 1, 'Adhiarja Wibowo', 'januar.aswani@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(204, 1, 'Harjasa Wibowo', 'jelita48@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(205, 1, 'Yuliana Riyanti', 'zulkarnain.jasmin@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(206, 1, 'Johan Asirwada Putra S.Psi', 'lili.putra@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(207, 2, 'Qori Hasanah', 'jaryani@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(208, 2, 'Ratih Mandasari', 'wasita.hartana@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(209, 3, 'Ibun Balangga Maryadi', 'bwidiastuti@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(210, 1, 'Michelle Maryati M.Ak', 'ophelia.habibi@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(211, 3, 'Zamira Usamah', 'intan69@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(212, 3, 'Dalima Utami M.Farm', 'ifa37@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(213, 3, 'Virman Wahyu Latupono S.Pd', 'akarsana.marpaung@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:56', '2020-04-29 15:02:56'),
(214, 2, 'Carla Umi Kuswandari', 'hidayanto.salwa@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(215, 1, 'Kayun Galih Prasasta S.Psi', 'belinda28@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(216, 2, 'Violet Violet Mardhiyah M.Farm', 'safitri.dina@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(217, 1, 'Opan Mustofa', 'lailasari.praba@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(218, 2, 'Chelsea Rahayu', 'vhalim@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(219, 2, 'Titin Tira Kuswandari S.IP', 'rafi.wasita@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(220, 2, 'Harja Mansur', 'saefullah.ratih@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(221, 2, 'Hasan Tarihoran', 'mlatupono@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(222, 3, 'Elvina Nuraini', 'atarihoran@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(223, 2, 'Citra Wahyuni M.Ak', 'kala62@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(224, 1, 'Gangsar Jailani', 'carla79@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(225, 3, 'Mila Puspasari', 'bala.wahyudin@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(226, 2, 'Cahya Siregar', 'waskita.ratna@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(227, 1, 'Jaswadi Simanjuntak S.E.I', 'handayani.ulva@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(228, 3, 'Mustofa Garang Hakim', 'simanjuntak.jaka@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(229, 3, 'Puput Namaga M.Pd', 'jsuryono@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(230, 2, 'Carub Luwar Lazuardi', 'iyulianti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:57', '2020-04-29 15:02:57'),
(231, 2, 'Lutfan Pradana', 'asman11@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(232, 2, 'Rahmi Laksmiwati', 'cakrawala69@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(233, 2, 'Hasna Sakura Nasyiah S.Sos', 'garan.laksita@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(234, 3, 'Jamalia Pudjiastuti', 'karen85@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(235, 2, 'Diana Azalea Melani S.T.', 'kartika99@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(236, 3, 'Nova Zalindra Puspasari M.TI.', 'jelita54@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(237, 2, 'Dewi Kusmawati', 'wakiman.dabukke@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(238, 3, 'Asirwada Napitupulu', 'sakura.samosir@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(239, 3, 'Septi Salwa Kusmawati S.Ked', 'nasyiah.sari@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(240, 1, 'Slamet Firmansyah', 'ugunawan@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(241, 1, 'Unjani Fujiati', 'lidya.sitompul@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(242, 1, 'Raina Mayasari', 'baktianto.permadi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(243, 2, 'Uda Nababan', 'laksmiwati.titi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(244, 2, 'Maryadi Halim', 'gabriella.puspita@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(245, 2, 'Kajen Sitorus M.Farm', 'pandu44@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(246, 2, 'Martani Ganda Januar', 'siti43@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:58', '2020-04-29 15:02:58'),
(247, 1, 'Raina Latika Lestari S.Psi', 'dpratama@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:59', '2020-04-29 15:02:59'),
(248, 2, 'Cinthia Mulyani', 'pangestu.rachel@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:59', '2020-04-29 15:02:59'),
(249, 2, 'Cakrabuana Maryadi', 'caturangga.suwarno@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:59', '2020-04-29 15:02:59'),
(250, 1, 'Salsabila Agnes Haryanti', 'dmaryati@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:59', '2020-04-29 15:02:59'),
(251, 2, 'Anggabaya Kayun Gunarto', 'panji45@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 0, NULL, '2020-04-29 15:02:59', '2020-04-29 15:02:59'),
(252, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(253, 1, 'Satya Hartana Mandala S.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(254, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(255, 1, 'Satya Hartana Mandala S.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(256, 1, 'bambang', 'yahsdfsdfsdf@mail.com', '$2y$10$BQbEl5gQURDud6UxvEUD.OxhUtTPQa7ewVn9548lSspMBbCFtEaoy', 'siswa', 0, NULL, '2020-05-04 01:13:26', '2020-05-04 01:13:26'),
(257, NULL, 'yudi', 'yudi@gmail.com', '$2y$10$pudhe.gpw8mjD4BTk/S2H.Re7uOdJs2WNm3mhFsKt2DZj2gGOoMr.', 'admin', 0, NULL, '2020-05-04 01:20:18', '2020-05-04 01:20:18'),
(258, 2, 'dsfsdf', 'nganu@gmail.com', '$2y$10$Z7mbzVROt0c4kZUK0QL1fOLFd.zqzz.WFvxSgxkEOOwvPxyLHYnM.', 'siswa', 0, NULL, '2020-05-04 01:40:31', '2020-05-04 01:40:31'),
(259, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(260, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(261, 1, 'budianto', NULL, '$2y$10$OFwSdif23BUW72V.aZvPDO9Son4bnwZzusLJLZczKjbBoMthrxazu', 'siswa', 0, NULL, '2020-05-04 03:07:23', '2020-05-04 03:07:23'),
(262, 3, 'bambang', NULL, '$2y$10$H7TySuu/TXsvAPgShiLNPO17rACf8ceG9YyjaXRUJqBkK8426UPUe', 'siswa', 0, NULL, '2020-05-04 03:27:35', '2020-05-04 03:27:48'),
(263, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(264, 1, 'Satya Hartana Mandala S.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(265, 1, 'Kezia Halimah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(266, 1, 'Ida Tari Andriani', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(267, 3, 'Irfan Wahyudin', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(268, 1, 'Banara Kusumo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(269, 3, 'Tania Padmasari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(270, 3, 'Kania Laksmiwati S.E.I', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(271, 2, 'Hardi Wasita', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(272, 1, 'Prabu Drajat Gunawan', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(273, 2, 'Dadap Permadi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(274, 3, 'Warsa Gadang Tamba', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(275, 3, 'Dimas Darsirah Saefullah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(276, 3, 'Queen Yessi Nasyidah S.E.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(277, 2, 'Anastasia Kusmawati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(278, 2, 'Titi Putri Nasyidah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(279, 1, 'Unjani Hassanah S.Kom', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(280, 2, 'Candra Utama', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(281, 2, 'Jumari Prayitna Hidayat', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(282, 1, 'Jatmiko Rafid Saragih', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(283, 1, 'Ganep Gaiman Nashiruddin S.H.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(284, 2, 'Darman Habibi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(285, 2, 'Farah Vivi Hastuti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(286, 2, 'Unjani Namaga', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(287, 3, 'Vanya Laksita', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(288, 2, 'Pranata Prayoga', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(289, 2, 'Cinthia Najwa Purnawati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(290, 3, 'Aisyah Pudjiastuti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(291, 2, 'Eli Najwa Utami', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(292, 1, 'Wadi Hidayat', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(293, 3, 'Yance Anggraini M.Pd', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(294, 3, 'Langgeng Ramadan', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(295, 3, 'Perkasa Widodo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(296, 3, 'Bahuwarna Maryadi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(297, 2, 'Ulva Pratiwi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(298, 1, 'Zizi Namaga M.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(299, 1, 'Winda Carla Nuraini', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(300, 3, 'Dodo Cengkal Sihombing', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(301, 1, 'Opan Hakim', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(302, 3, 'Elma Juli Anggraini S.Psi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(303, 2, 'Raden Mangunsong', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(304, 1, 'Banawi Situmorang', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(305, 3, 'Calista Hartati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(306, 3, 'Daliman Kajen Januar S.Kom', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(307, 3, 'Ghani Waskita M.M.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(308, 1, 'Jagaraga Firgantoro S.Kom', NULL, NULL, 'siswa', 0, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `kelas_id`, `nama`, `email`, `password`, `level`, `angkatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(309, 1, 'Rangga Cahya Marpaung S.E.I', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(310, 1, 'Embuh Nashiruddin', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(311, 2, 'Cakrabuana Dadap Manullang', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(312, 2, 'Hasim Saptono', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(313, 3, 'Bakda Hidayanto', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(314, 2, 'Legawa Balamantri Wijaya S.Sos', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(315, 1, 'Hilda Safitri', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(316, 3, 'Gasti Wastuti S.H.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(317, 1, 'Amelia Elma Andriani', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(318, 3, 'Cinthia Iriana Yuniar S.Pt', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(319, 2, 'Digdaya Prasasta S.Gz', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(320, 1, 'Yuliana Oktaviani M.Ak', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(321, 1, 'Gawati Riyanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(322, 1, 'Prabawa Cahyanto Natsir', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(323, 2, 'Garda Wibisono', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(324, 3, 'Adinata Perkasa Najmudin', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(325, 1, 'Rahayu Pratiwi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(326, 1, 'Jelita Fujiati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(327, 3, 'Banawa Banara Kurniawan S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(328, 3, 'Janet Rahayu', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(329, 1, 'Bahuwarna Uda Hutapea S.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(330, 1, 'Tira Gina Yuniar', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(331, 2, 'Kalim Jail Dongoran', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(332, 3, 'Nilam Nurdiyanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(333, 2, 'Pandu Pangestu S.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(334, 3, 'Michelle Cici Oktaviani', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(335, 2, 'Kiandra Hasanah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(336, 2, 'Maya Wastuti S.Sos', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(337, 3, 'Ratna Hasanah S.Pt', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(338, 3, 'Samiah Pudjiastuti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(339, 2, 'Hardana Uda Kuswoyo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(340, 1, 'Leo Prabowo S.IP', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(341, 2, 'Gilang Sidiq Siregar S.Psi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(342, 1, 'Rahmi Yuniar S.Pt', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(343, 2, 'Rudi Wijaya', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(344, 3, 'Dadap Haryanto', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(345, 1, 'Caket Edison Mandala M.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(346, 2, 'Rahmi Bella Mayasari S.IP', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(347, 2, 'Kacung Maryadi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(348, 3, 'Restu Hasanah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(349, 2, 'Edward Thamrin', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(350, 1, 'Karimah Cinta Wulandari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(351, 1, 'Kawaca Mustofa', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(352, 1, 'Jane Dian Padmasari M.Ak', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(353, 2, 'Humaira Vanesa Utami M.Pd', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(354, 1, 'Gamani Rajasa M.Kom.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(355, 2, 'Hafshah Wastuti M.Ak', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(356, 2, 'Ganjaran Zulkarnain', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(357, 2, 'Vero Darimin Maheswara S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(358, 3, 'Kiandra Hartati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(359, 2, 'Dina Anita Hartati S.H.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(360, 2, 'Gaduh Luhung Samosir', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(361, 1, 'Karta Sinaga S.T.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(362, 3, 'Xanana Radika Tamba', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(363, 3, 'Rini Jelita Sudiati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(364, 2, 'Respati Surya Najmudin S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(365, 1, 'Nalar Kemal Halim S.Gz', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(366, 1, 'Oliva Maida Zulaika S.E.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(367, 1, 'Humaira Puspasari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(368, 2, 'Hardana Sitompul', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(369, 1, 'Yance Farida', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(370, 3, 'Rina Nasyiah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(371, 2, 'Gilda Suryatmi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(372, 2, 'Tari Puspasari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(373, 3, 'Hardana Maheswara', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(374, 3, 'Jaka Mansur', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(375, 3, 'Luwes Lukita Prabowo M.M.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(376, 3, 'Irma Palastri', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(377, 1, 'Jelita Wastuti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(378, 3, 'Marwata Karsa Mandala', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(379, 2, 'Mutia Padmasari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(380, 1, 'Gilda Purwanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(381, 3, 'Limar Sirait', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(382, 2, 'Caket Caket Marpaung', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(383, 3, 'Imam Maheswara M.Pd', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(384, 2, 'Anita Kamila Prastuti S.Pt', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(385, 3, 'Sabri Rajasa', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(386, 2, 'Salimah Pertiwi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(387, 1, 'Nadine Agustina', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(388, 3, 'Rina Fujiati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(389, 1, 'Hasna Riyanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(390, 3, 'Prasetyo Prasetyo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(391, 2, 'Bakti Jarwa Irawan M.Ak', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(392, 2, 'Endra Utama', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(393, 1, 'Yuni Yuniar', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(394, 2, 'Bahuraksa Sihotang', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(395, 3, 'Citra Safitri', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(396, 1, 'Zaenab Ami Widiastuti S.T.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(397, 3, 'Olivia Gabriella Nuraini', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(398, 1, 'Hartaka Jinawi Mangunsong', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(399, 3, 'Kairav Candrakanta Ardianto', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(400, 3, 'Alambana Nardi Pradipta M.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(401, 1, 'Elma Yolanda S.I.Kom', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(402, 2, 'Tedi Waluyo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(403, 2, 'Ella Febi Puspasari S.Sos', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(404, 2, 'Salimah Mardhiyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(405, 1, 'Kartika Belinda Fujiati S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(406, 3, 'Makara Wasita', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(407, 3, 'Nasim Hakim', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(408, 2, 'Uli Kani Sudiati S.Sos', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(409, 2, 'Muni Prabowo M.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(410, 2, 'Nyoman Pranowo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(411, 1, 'Slamet Sitorus', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(412, 1, 'Paris Titin Wastuti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(413, 2, 'Jaeman Prabowo S.E.I', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(414, 2, 'Fathonah Yolanda', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(415, 1, 'Kayun Sitorus', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(416, 1, 'Jaeman Prayoga', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(417, 2, 'Utama Galar Gunarto', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(418, 2, 'Lega Martana Mahendra', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(419, 3, 'Dalimin Martani Habibi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(420, 3, 'Ibun Santoso S.Psi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(421, 3, 'Dalima Anggraini', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(422, 2, 'Ajimat Karman Putra', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(423, 3, 'Najwa Laksmiwati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(424, 2, 'Lintang Sarah Farida', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(425, 1, 'Ani Suryatmi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(426, 2, 'Intan Usada', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(427, 2, 'Pangeran Tampubolon', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(428, 1, 'Eli Zulaika', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(429, 2, 'Yahya Manullang', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(430, 1, 'Bancar Prasetyo S.Gz', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(431, 2, 'Luthfi Hasim Hutagalung', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(432, 1, 'Carla Suryatmi M.Kom.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(433, 3, 'Oni Rahimah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(434, 3, 'Mila Wahyuni', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(435, 3, 'Tugiman Permadi M.Pd', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(436, 3, 'Gamblang Megantara', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(437, 2, 'Vinsen Irawan S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(438, 1, 'Nadia Clara Uyainah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(439, 1, 'Yunita Maimunah Palastri', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(440, 2, 'Najwa Endah Susanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(441, 3, 'Atma Embuh Mansur M.Kom.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(442, 1, 'Farhunnisa Kuswandari M.TI.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(443, 2, 'Ifa Purnawati S.Gz', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(444, 1, 'Banawa Siregar', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(445, 2, 'Pia Genta Anggraini S.Gz', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(446, 1, 'Kadir Situmorang', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(447, 1, 'Vivi Nurul Lailasari S.Gz', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(448, 3, 'Hilda Ami Utami M.Ak', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(449, 2, 'Fitriani Yulianti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(450, 1, 'Caraka Sinaga', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(451, 2, 'Ozy Mariadi Mangunsong S.Psi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(452, 1, 'Queen Purwanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(453, 1, 'Almira Wijayanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(454, 2, 'Halima Safitri', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(455, 2, 'Suci Hastuti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(456, 1, 'Gara Maheswara', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(457, 2, 'Kadir Daruna Mansur', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(458, 1, 'Yani Pertiwi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(459, 3, 'Wadi Prasetyo S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(460, 3, 'Rahmi Zelaya Wastuti M.Kom.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(461, 2, 'Adikara Sihombing S.I.Kom', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(462, 3, 'Jamil Nashiruddin M.M.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(463, 2, 'Jono Gatot Manullang S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(464, 1, 'Adhiarja Wibowo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(465, 1, 'Harjasa Wibowo', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(466, 1, 'Yuliana Riyanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(467, 1, 'Johan Asirwada Putra S.Psi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(468, 2, 'Qori Hasanah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(469, 2, 'Ratih Mandasari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(470, 3, 'Ibun Balangga Maryadi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(471, 1, 'Michelle Maryati M.Ak', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(472, 3, 'Zamira Usamah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(473, 3, 'Dalima Utami M.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(474, 3, 'Virman Wahyu Latupono S.Pd', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(475, 2, 'Carla Umi Kuswandari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(476, 1, 'Kayun Galih Prasasta S.Psi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(477, 2, 'Violet Violet Mardhiyah M.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(478, 1, 'Opan Mustofa', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(479, 2, 'Chelsea Rahayu', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(480, 2, 'Titin Tira Kuswandari S.IP', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(481, 2, 'Harja Mansur', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(482, 2, 'Hasan Tarihoran', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(483, 3, 'Elvina Nuraini', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(484, 2, 'Citra Wahyuni M.Ak', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(485, 1, 'Gangsar Jailani', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(486, 3, 'Mila Puspasari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(487, 2, 'Cahya Siregar', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(488, 1, 'Jaswadi Simanjuntak S.E.I', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(489, 3, 'Mustofa Garang Hakim', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(490, 3, 'Puput Namaga M.Pd', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(491, 2, 'Carub Luwar Lazuardi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(492, 2, 'Lutfan Pradana', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(493, 2, 'Rahmi Laksmiwati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(494, 2, 'Hasna Sakura Nasyiah S.Sos', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(495, 3, 'Jamalia Pudjiastuti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(496, 2, 'Diana Azalea Melani S.T.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(497, 3, 'Nova Zalindra Puspasari M.TI.', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(498, 2, 'Dewi Kusmawati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(499, 3, 'Asirwada Napitupulu', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(500, 3, 'Septi Salwa Kusmawati S.Ked', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(501, 1, 'Slamet Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(502, 1, 'Unjani Fujiati', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(503, 1, 'Raina Mayasari', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(504, 2, 'Uda Nababan', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(505, 2, 'Maryadi Halim', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(506, 2, 'Kajen Sitorus M.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(507, 2, 'Martani Ganda Januar', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(508, 1, 'Raina Latika Lestari S.Psi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(509, 2, 'Cinthia Mulyani', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(510, 2, 'Cakrabuana Maryadi', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(511, 1, 'Salsabila Agnes Haryanti', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(512, 2, 'Anggabaya Kayun Gunarto', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(513, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(514, 1, 'Satya Hartana Mandala S.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(515, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(516, 1, 'Satya Hartana Mandala S.Farm', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(517, 1, 'bambang', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(518, 2, 'dsfsdf', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(519, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(520, 1, 'Wawan Firmansyah', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(521, 1, 'budianto', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(522, 3, 'bambang', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(524, NULL, 'nganu23@gmail.com', 'nganu23@gmail.com', '$2y$10$/I3hLM885m1a1oy3nxx8xO8vfB81AA/vS.qIV68kvoFD13Rr3XHIa', 'admin', 0, NULL, '2020-05-04 03:42:00', '2020-05-04 03:42:25'),
(525, NULL, 'ramdanriawan', 'ramdanriawan3@gmail.com', '$2y$10$qArs9LQEg5dOFGsxw.cvaOATC0fTN16I96O8MqX680eGQgPM3kFEu', 'admin', 0, NULL, NULL, NULL),
(527, 1, 'fsdfsdf', NULL, '$2y$10$jC2nAtrkUdI0bQsVZ2e2KOdaAjvNauU/Kok8TT.COJXcEkUa8comq', 'siswa', 0, NULL, '2020-05-04 04:18:01', '2020-05-04 04:18:01'),
(528, 1, 'qerewrwrwer', NULL, '$2y$10$8khM1rcH7wxnl5hPRLtny.PQ6Ywd4xV69bY.4L9N98EOYeawTdKGy', 'siswa', 0, NULL, '2020-05-04 04:18:14', '2020-05-04 04:18:26'),
(529, 1, 'sdsfsdfsdf', NULL, NULL, 'siswa', 0, NULL, NULL, NULL),
(530, 1, 'sfsdfsf', NULL, '$2y$10$Z8wxjHitjwW9vKi9q2NJC.qdnmmMZlZDjDzQcdp3HEbnDYqelsge2', 'siswa', 0, NULL, '2020-05-04 20:59:35', '2020-09-05 17:15:19'),
(532, 1, 'sdfsdfsdf', NULL, '', 'siswa', 0, NULL, NULL, '2020-09-05 17:15:19'),
(534, 1, 'budi', NULL, NULL, 'siswa', 2020, NULL, NULL, '2020-09-05 17:39:04'),
(535, NULL, 'Super Admin', 'superadmin@gmail.com', '$2y$10$2u58edmzxKdyd2XE1nSYzey0aLPaofuY8D4HO8IGkgdChsNNhlZea', 'superadmin', 0, 'uPx86fspLIfdCYeuaHAciKczYMm3LF8KhzbdLr5WcIMGjkniwFISbBtmGo0R', '2020-04-29 15:02:41', '2020-09-28 16:13:28'),
(536, 1, 'Ramdan Riawan x', 'ramdanriawanx@gmail.com', '$2y$10$CFlIrYn38KVHX6jfkiI8de2nsrDK5fQqoE2IH6UyuuP/3sIaPHSBG', 'admin', 2020, NULL, '2020-09-08 01:00:42', '2020-09-08 01:00:42'),
(537, NULL, 'Ramdan Riawan 4', 'ramdanriawan4@gmail.com', '$2y$10$bQQ6GajhClaZ7.kfYoeWyOrIEn697F9FH8.keZtUhqXQlMTrAOXYO', 'admin', 2020, NULL, '2020-09-08 01:05:10', '2020-09-08 01:05:10'),
(538, NULL, 'ramdan riawan 5', 'ramdanriawan5@gmail.com', '$2y$10$tUvqanO42dQZNE2QzD3QhuV0q3fkkF9KrKkQSQWuKFF9ltynGgzAe', 'admin', NULL, NULL, '2020-09-08 01:08:16', '2020-09-08 01:08:16'),
(541, 3, 'budi', 'budi@gmail.com', '', 'siswa', 2020, NULL, NULL, NULL),
(542, 1, 'adasd', 'sdf@gmail.com', '', 'siswa', 2020, NULL, NULL, NULL),
(543, 1, 'sgdgsdg', NULL, '', 'siswa', 2020, NULL, NULL, NULL),
(544, 3, 'sdfsdfs', '', '', 'siswa', 2020, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran_infaqs`
--
ALTER TABLE `pembayaran_infaqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_infaq_details`
--
ALTER TABLE `pembayaran_infaq_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_gedung_details_pembayaran_gedung_id_foreign` (`pembayaran_gedung_id`),
  ADD KEY `pembayaran_gedung_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `pembayaran_santris`
--
ALTER TABLE `pembayaran_santris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_santri_bulans`
--
ALTER TABLE `pembayaran_santri_bulans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_santri_bulans_pembayaran_santri_id_foreign` (`pembayaran_santri_id`);

--
-- Indexes for table `pembayaran_santri_details`
--
ALTER TABLE `pembayaran_santri_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_santri_details_pembayaran_santri_id_foreign` (`pembayaran_santri_id`),
  ADD KEY `pembayaran_santri_details_user_id_foreign` (`user_id`),
  ADD KEY `pembayaran_santri_details_pembayaran_santri_bulan_id_foreign` (`pembayaran_santri_bulan_id`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_lainnyas`
--
ALTER TABLE `transaksi_lainnyas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_lainnya_details`
--
ALTER TABLE `transaksi_lainnya_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_lainnya_details_transaksi_lainnya_id_foreign` (`transaksi_lainnya_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_kelas_id_foreign` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran_infaqs`
--
ALTER TABLE `pembayaran_infaqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran_infaq_details`
--
ALTER TABLE `pembayaran_infaq_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_santris`
--
ALTER TABLE `pembayaran_santris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran_santri_bulans`
--
ALTER TABLE `pembayaran_santri_bulans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran_santri_details`
--
ALTER TABLE `pembayaran_santri_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_lainnyas`
--
ALTER TABLE `transaksi_lainnyas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi_lainnya_details`
--
ALTER TABLE `transaksi_lainnya_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran_infaq_details`
--
ALTER TABLE `pembayaran_infaq_details`
  ADD CONSTRAINT `pembayaran_gedung_details_pembayaran_gedung_id_foreign` FOREIGN KEY (`pembayaran_gedung_id`) REFERENCES `pembayaran_infaqs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_gedung_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran_santri_bulans`
--
ALTER TABLE `pembayaran_santri_bulans`
  ADD CONSTRAINT `pembayaran_santri_bulans_pembayaran_santri_id_foreign` FOREIGN KEY (`pembayaran_santri_id`) REFERENCES `pembayaran_santris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran_santri_details`
--
ALTER TABLE `pembayaran_santri_details`
  ADD CONSTRAINT `pembayaran_santri_details_pembayaran_santri_bulan_id_foreign` FOREIGN KEY (`pembayaran_santri_bulan_id`) REFERENCES `pembayaran_santri_bulans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_santri_details_pembayaran_santri_id_foreign` FOREIGN KEY (`pembayaran_santri_id`) REFERENCES `pembayaran_santris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_santri_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_lainnya_details`
--
ALTER TABLE `transaksi_lainnya_details`
  ADD CONSTRAINT `transaksi_lainnya_details_transaksi_lainnya_id_foreign` FOREIGN KEY (`transaksi_lainnya_id`) REFERENCES `transaksi_lainnyas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
