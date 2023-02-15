-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 05:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayu.bikinaplikasi.dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasis`
--

INSERT INTO `informasis` (`id`, `user_id`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 1, 'Informasi 1', '<p>Yaps Besok Ada Informasi ! Yaaaaa</p>', '[\"foto\\/freesnippingtool.com_capture_20200430152423.png\",\"foto\\/freesnippingtool.com_capture_20200502111233.png\",\"foto\\/freesnippingtool.com_capture_20200507003623.png\"]', '2020-12-11 22:11:15', '2020-12-11 22:11:32'),
(4, 1, 'Sangat Berinformasi Sekaliiiii', '<p>Yaaa Informasinya Gini Gini Ajaaaa</p>', '[\"foto\\/freesnippingtool.com_capture_20200430152423.png\",\"foto\\/freesnippingtool.com_capture_20200502111233.png\",\"foto\\/freesnippingtool.com_capture_20200507003623.png\"]', '2020-12-11 22:12:25', '2020-12-11 22:12:25'),
(5, 1, 'Libur nasional', '<p>karena mengingat kenadala virus corona yang tidak kunjueng henti maka sekolah diliburkan</p>', '[\"foto\\/background.png\",\"foto\\/background2.png\",\"foto\\/freesnippingtool.com_capture_20200507003623.png\"]', '2021-01-22 14:51:25', '2021-01-22 14:51:25'),
(6, 139, 'jadwal ditiadakan', '<p>jadwal saya ditiadakan karena saya besok mau pergi keluar kota</p>', '[\"foto\\/freesnippingtool.com_capture_20200905061106.png\",\"foto\\/freesnippingtool.com_capture_20200905063803.png\"]', '2021-01-22 15:06:11', '2021-01-22 15:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_detail_id` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum`at','Sabtu','Minggu') DEFAULT NULL,
  `dari_jam` tinyint(4) NOT NULL,
  `sampai_jam` tinyint(4) NOT NULL,
  `status` enum('Incoming','On Schedule','Cancell') NOT NULL DEFAULT 'On Schedule',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `mapel_detail_id`, `hari`, `dari_jam`, `sampai_jam`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'Senin', 8, 10, 'Incoming', '2020-12-09 08:10:17', '2020-12-09 08:11:36'),
(6, 1, 'Senin', 8, 9, 'On Schedule', '2021-01-22 14:57:55', '2021-01-22 14:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `kelass`
--

CREATE TABLE `kelass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wali_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `ketua_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelass`
--

INSERT INTO `kelass` (`id`, `wali_kelas`, `ketua_kelas`, `nama`, `ruang`, `created_at`, `updated_at`) VALUES
(1, 139, 11, 'X MIPA 1', 'R-1', '2020-08-28 12:06:51', '2020-08-28 20:59:35'),
(2, 140, NULL, 'X MIPA 2', 'R-2', '2020-08-28 12:07:51', '2020-12-11 12:03:36'),
(3, NULL, NULL, 'X MIPA 3', 'R-3', '2020-08-28 12:08:40', '2020-08-28 12:08:40'),
(4, NULL, NULL, 'X IPS 1', 'R-4', '2020-08-28 12:09:39', '2020-08-28 12:09:39'),
(5, NULL, NULL, 'X IPS 2', 'R-5', '2020-08-28 12:10:11', '2020-08-28 12:10:11'),
(6, NULL, NULL, 'X IPS 3', 'R-6', '2020-08-28 12:10:37', '2020-08-28 12:10:37'),
(7, NULL, NULL, 'XI MIPA 1', 'R-7', '2020-08-28 12:11:10', '2020-08-28 12:11:10'),
(8, NULL, NULL, 'XI MIPA 2', 'R-8', '2020-08-28 12:11:42', '2020-08-28 12:11:42'),
(9, NULL, NULL, 'XI MIPA 3', 'R-9', '2020-08-28 12:12:20', '2020-08-28 12:12:20'),
(11, NULL, NULL, 'XI IPS 1', 'R-11', '2020-08-28 12:13:49', '2020-08-28 12:13:49'),
(12, NULL, NULL, 'XI IPS 2', 'R-12', '2020-08-28 12:14:20', '2020-08-28 12:14:20'),
(13, NULL, NULL, 'XI IPS 3', 'R-13', '2020-08-28 12:14:48', '2020-08-28 12:14:48'),
(14, NULL, NULL, 'XII MIPA 1', 'R-14', '2020-08-28 12:19:44', '2020-08-28 12:19:44'),
(15, NULL, NULL, 'XII MIPA 2', 'R-15', '2020-08-28 12:20:21', '2020-08-28 12:20:21'),
(16, NULL, NULL, 'XII MIPA 3', 'R-16', '2020-08-28 12:20:47', '2020-08-28 12:20:47'),
(17, NULL, NULL, 'XII IPS 1', 'R-17', '2020-08-28 12:21:19', '2020-08-28 12:21:19'),
(18, NULL, NULL, 'XII IPS 2', 'R-18', '2020-08-28 12:22:01', '2020-08-28 12:22:01'),
(19, NULL, NULL, 'XII IPS 3', 'R-19', '2020-08-28 12:22:27', '2020-08-28 12:22:27'),
(20, NULL, NULL, 'X MIPA 4', 'R 4', '2021-01-22 14:55:38', '2021-01-22 14:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `informasi_id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentars`
--

INSERT INTO `komentars` (`id`, `user_id`, `informasi_id`, `isi`, `created_at`, `updated_at`) VALUES
(2, 140, 3, 'Informasi Ini Sangat Menarik', '2020-12-11 22:35:57', '2020-12-11 22:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok` enum('A','B','C','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `nama`, `kelompok`, `created_at`, `updated_at`) VALUES
(1, 'Biologi', 'B', '2020-08-28 16:35:09', '2020-12-11 16:03:46'),
(2, 'Fisika', 'A', '2020-08-28 16:36:07', '2020-08-28 16:36:07'),
(3, 'Bahasa Indonesia', 'A', '2020-08-28 16:38:09', '2020-08-28 16:38:09'),
(4, 'Seni Budaya', 'A', '2020-08-29 00:20:59', '2020-08-29 00:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_details`
--

CREATE TABLE `mapel_details` (
  `id` int(11) NOT NULL,
  `mapel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_details`
--

INSERT INTO `mapel_details` (`id`, `mapel_id`, `kelas_id`, `user_id`) VALUES
(1, 1, 1, 139),
(2, 1, 2, 142),
(3, 1, 3, 143),
(4, 2, 1, 139),
(5, 2, 1, 144),
(6, 3, 1, 139),
(7, 3, 2, 140),
(8, 3, 3, 139),
(9, 3, 4, 147),
(10, 3, 5, 144),
(11, 3, 6, 148),
(13, 4, 2, 140),
(14, 4, 3, 142),
(15, 4, 4, 143),
(16, 4, 5, 144);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_detail_id` int(11) NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `semester` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `mapel_detail_id`, `tahun`, `semester`) VALUES
(1, 10, 2020, '1'),
(2, 1, 2020, '1'),
(3, 7, 2020, '1'),
(4, 1, 2021, '1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_details`
--

CREATE TABLE `nilai_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `angka_kl_3` float DEFAULT NULL,
  `predikat_kl_3` enum('A','A-','B+','B','B-','C+','C','C-','D+','D') DEFAULT NULL,
  `angka_kl_4` float DEFAULT NULL,
  `predikat_kl_4` enum('A','A-','B+','B','B-','C+','C','C-','D+','D') DEFAULT NULL,
  `dalam_mapel_kl_1_kl_2` enum('SB','B','C','K') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_details`
--

INSERT INTO `nilai_details` (`id`, `nilai_id`, `user_id`, `angka_kl_3`, `predikat_kl_3`, `angka_kl_4`, `predikat_kl_4`, `dalam_mapel_kl_1_kl_2`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3.5, 'B+', 3.5, 'B+', 'SB', '2020-12-10 14:49:09', '2020-12-10 14:49:09'),
(8, 2, 10, 4, 'B+', 4, 'B+', 'SB', '2020-12-10 23:24:15', '2020-12-10 23:24:15'),
(9, 3, 45, 1, 'B+', 2, '', 'SB', '2020-12-11 20:52:41', '2020-12-11 20:52:41'),
(10, 4, 10, 2.5, 'B-', 2.6, 'B-', 'SB', '2021-01-22 15:28:25', '2021-01-22 15:28:25'),
(11, 4, 11, 2.69, 'B', 4, 'A', 'SB', '2021-01-22 15:49:53', '2021-01-22 15:49:53');

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
-- Table structure for table `raports`
--

CREATE TABLE `raports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `status` enum('Sudah Diberikan','Belum Diberikan') NOT NULL DEFAULT 'Belum Diberikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raports`
--

INSERT INTO `raports` (`id`, `user_id`, `tahun`, `semester`, `status`) VALUES
(1, 45, 2020, 1, 'Sudah Diberikan'),
(2, 46, 2020, 1, 'Belum Diberikan'),
(3, 47, 2020, 1, 'Belum Diberikan'),
(4, 48, 2020, 1, 'Belum Diberikan'),
(5, 49, 2020, 1, 'Belum Diberikan'),
(6, 50, 2020, 1, 'Belum Diberikan'),
(7, 51, 2020, 1, 'Belum Diberikan'),
(8, 52, 2020, 1, 'Belum Diberikan'),
(9, 53, 2020, 1, 'Belum Diberikan'),
(10, 54, 2020, 1, 'Belum Diberikan'),
(11, 55, 2020, 1, 'Belum Diberikan'),
(12, 56, 2020, 1, 'Belum Diberikan'),
(13, 57, 2020, 1, 'Belum Diberikan'),
(14, 58, 2020, 1, 'Belum Diberikan'),
(15, 59, 2020, 1, 'Belum Diberikan'),
(16, 60, 2020, 1, 'Belum Diberikan'),
(17, 61, 2020, 1, 'Belum Diberikan'),
(18, 62, 2020, 1, 'Belum Diberikan'),
(19, 63, 2020, 1, 'Belum Diberikan'),
(20, 64, 2020, 1, 'Belum Diberikan'),
(21, 65, 2020, 1, 'Belum Diberikan'),
(22, 66, 2020, 1, 'Belum Diberikan'),
(23, 67, 2020, 1, 'Belum Diberikan'),
(24, 68, 2020, 1, 'Belum Diberikan'),
(25, 69, 2020, 1, 'Belum Diberikan'),
(26, 70, 2020, 1, 'Belum Diberikan'),
(27, 71, 2020, 1, 'Belum Diberikan'),
(28, 72, 2020, 1, 'Belum Diberikan'),
(29, 73, 2020, 1, 'Belum Diberikan'),
(30, 74, 2020, 1, 'Belum Diberikan'),
(31, 75, 2020, 1, 'Belum Diberikan'),
(32, 76, 2020, 1, 'Belum Diberikan'),
(33, 77, 2020, 1, 'Belum Diberikan'),
(34, 10, 2020, 1, 'Belum Diberikan'),
(35, 11, 2020, 1, 'Belum Diberikan'),
(36, 12, 2020, 1, 'Belum Diberikan'),
(37, 13, 2020, 1, 'Belum Diberikan'),
(38, 14, 2020, 1, 'Belum Diberikan'),
(39, 15, 2020, 1, 'Belum Diberikan'),
(40, 16, 2020, 1, 'Belum Diberikan'),
(41, 17, 2020, 1, 'Belum Diberikan'),
(42, 18, 2020, 1, 'Belum Diberikan'),
(43, 19, 2020, 1, 'Belum Diberikan'),
(44, 20, 2020, 1, 'Belum Diberikan'),
(45, 21, 2020, 1, 'Belum Diberikan'),
(46, 22, 2020, 1, 'Belum Diberikan'),
(47, 23, 2020, 1, 'Belum Diberikan'),
(48, 24, 2020, 1, 'Belum Diberikan'),
(49, 25, 2020, 1, 'Belum Diberikan'),
(50, 26, 2020, 1, 'Belum Diberikan'),
(51, 27, 2020, 1, 'Belum Diberikan'),
(52, 28, 2020, 1, 'Belum Diberikan'),
(53, 29, 2020, 1, 'Belum Diberikan'),
(54, 30, 2020, 1, 'Belum Diberikan'),
(55, 31, 2020, 1, 'Belum Diberikan'),
(56, 32, 2020, 1, 'Belum Diberikan'),
(57, 33, 2020, 1, 'Belum Diberikan'),
(58, 34, 2020, 1, 'Belum Diberikan'),
(59, 35, 2020, 1, 'Belum Diberikan'),
(60, 36, 2020, 1, 'Belum Diberikan'),
(61, 37, 2020, 1, 'Belum Diberikan'),
(62, 38, 2020, 1, 'Belum Diberikan'),
(63, 39, 2020, 1, 'Belum Diberikan'),
(64, 40, 2020, 1, 'Belum Diberikan'),
(65, 41, 2020, 1, 'Belum Diberikan'),
(66, 42, 2020, 1, 'Belum Diberikan'),
(67, 43, 2020, 1, 'Belum Diberikan'),
(68, 44, 2020, 1, 'Belum Diberikan');

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `nama`, `no_telp`, `alamat`, `deskripsi`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'SMK NEGERI 1 MUARO JAMBI', '085368739455', 'Jl. Hasanudin poros barat blok D, Kel. Pandan Jaya, Kec. Geragai, Tanjung Jabung Timur, Jambi, 36564Jl. Lintas Timur Sumatera KM. 28, RT.02, Tunas Mudo, Sekernan, Tunas Mudo, Sekernan, Kabupaten Muaro Jambi, Jambi 36657', '<p>Adalah salah satu sekolah SMK favorit di Muaro jambi.</p>', '<p>Mewujudkan Sumber Daya Manusia yang Berakhlak Mulia yang Mampu Bersaing Dalam Dunia Kerja Secara Global</p>', '<p>1. Menciptakan suasana yang kondusif untuk mengembangkan potensi siswa melalui penekanan pada penguasaan kompetensi bidang ilmu pengetahuan dan teknologi serta Bahasa Inggris.</p>\r\n\r\n<p>2. Meningkatkan penguasaan Bahasa Inggris sebagai alat komunikasi dan alat untuk mempelajari pengetahuan yang lebih luas.</p>\r\n\r\n<p>3. Meningkatkan frekuensi dan kualitas kegiatan siswa yang lebih menekankan pada pengembangan ilmu pengetahuan dan teknologi serta keimanan dan ketakwaan yang menunjang proses belajar mengajar dan menumbuhkembangkan disiplin pribadi siswa.</p>\r\n\r\n<p>4. Menumbuhkembangkan nilai-nilai ketuhanan dan nilai-nilai kehidupan yang bersifat universal dan mengintegrasikannya dalam kehidupan</p>\r\n\r\n<p>5. Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah, Lembaga Swadaya Masyarakat, stake holders dan instansi serta institusi pendukung pendidikan lainnya.</p>', '2020-08-27 17:00:00', '2020-08-28 16:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(11) UNSIGNED DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','guru','siswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif','pindah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kelas_id`, `nama`, `email`, `no_hp`, `password`, `level`, `status`, `no_identitas`, `foto`, `created_at`, `updated_at`) VALUES
(1, 7, 'admin', 'admin@gmail.com', '082282692489', '$2y$10$TfXreRFtJfEcXne1QM5GWuDaOCu9FDm4S.ccyBDLSx5MY9smcvrti', 'admin', 'aktif', NULL, 'foto/avatar.png', '2020-08-28 13:47:03', '2021-01-22 14:30:51'),
(10, 1, 'AMANDA MUTHMAINAH', 'amanda@gmail.com', '085377533018', '$2y$10$hixf8YZ.bVOZZYrJkCfEGutn9Wfm1fZFv.yg26hcea9U/wUfIas4O', 'siswa', 'aktif', '9301834010481', 'foto/aa.jpg', '2020-08-28 13:47:03', '2021-01-22 14:34:39'),
(11, 1, 'Ambok Tang', 'ambok@gmail.com', '085377802831', '$2y$10$iVQS4v04aFQ.0OYP09uZCu38OrdS.As86mZZBGbHyzp9vInafg3A.', 'siswa', 'aktif', '937863729273', 'foto/aa.jpg', '2020-08-28 13:47:03', '2021-01-22 14:34:39'),
(12, 1, 'ANDI PRATAMA PUTRA', 'andi@gmail.com', '81256897635', '$2y$10$xRbs1zjTSE7FVHp2ALW3sOwNTiXjXbhB2xCxdWmSiNX4eTejDctKq', 'siswa', 'aktif', '997483927456', '', '2020-08-28 13:47:03', '2021-01-22 14:32:41'),
(13, 1, 'ANISA', 'anisa@gmail.com', '85770846282', '$2y$10$TSQkJPvyVGOXbn/cNtkubuhR18oEnhTKGx/jQHHVWM9bhEALz21F.', 'siswa', 'aktif', '937593485023', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(14, 1, 'Besse Eliyana', 'eliyana@gmail.com', '85770957393', '$2y$10$W1T66KSaeDkZ.efhlMN3F.wQWBouGiSbpQI5LvnKysPWgmd5u72m6', 'siswa', 'aktif', '987583950342', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(15, 1, 'CAHAYA ANISTIA', 'anistia@gmail.com', '85771068504', '$2y$10$6P0Nl5HlyshIGBLbFS8V9eb.kWURAJFwrjO6kcl4gDs291L22/l7u', 'siswa', 'aktif', '7834829459230', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(16, 1, 'DAVID OKTAVIAN PASARIBU', 'ovtafia@gmail.com', '85771179615', '$2y$10$IULA2RTwZjiziE1kclw0WuehtDxKOvJb8mQ3vtMQ7VY7YZaukodty', 'siswa', 'aktif', '568394029573', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(17, 1, 'DELLILA SUKMA AGUSTIANA', 'agustiana@gmail.com', '85771290726', '$2y$10$.5razdfbhu5uYq9RKmYL2u4t8WPl1eLJdUwPXqWEngjam4usOBc6i', 'siswa', 'aktif', '678392013846', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(18, 1, 'Desvania Aulia Putri', 'putri@gmail.com', '85771401837', '$2y$10$NLy80iTIRre1DDM5ajNbeOGj.Jb4v13gKbUsiDkSFysLccB7dxj.G', 'siswa', 'aktif', '669373947503', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(19, 1, 'Dihan Arafah', 'arafah@gmail.com', '85771512948', '$2y$10$N3unVYQ3kmrvC7shMrHcGeRz74c2lS5sZurdouLOjSUCYoEKTrHFO', 'siswa', 'aktif', '897493475620', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(20, 1, 'Ernita', 'ernita@gmail.com', '85771624059', '$2y$10$BaEcVn6thmGnawpKHGiHEOtB7kAYe7yOjnLrt2eJjRyXAf8bNkAjO', 'siswa', 'aktif', '934657293475', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(21, 1, 'Fahmy', 'fahmy@gmail.com', '85771735170', '$2y$10$SPctd2RNp7tnpL5x7llSyO3yo/BfKfz5nUsTHX8gni2Egal54i8fe', 'siswa', 'aktif', '279349572394', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(22, 1, 'FATMA PUSPITA', 'fatma@gmail.com', '85771846281', '$2y$10$QX2nnr54P2xlkFngf76vv.NnajFVX/UiBwMmvgz8e0ovc8mBkJG26', 'siswa', 'aktif', '672384920423', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(23, 1, 'FEBRI YANSYAH', 'febri@gmail.com', '85771957392', '$2y$10$T.xkqJvhE1au7HC/XI71CujUlcJZHqgzWzEkyBvcw92.1GMqia2eW', 'siswa', 'aktif', '764930084234', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(24, 1, 'Firda Zulfia Azmi', 'firda@gmail.com', '85772068503', '$2y$10$OVgV4Hq5kZYSF41cGMYotuDs6uC3Xiie3fFA6TvS4hBsGeTOzCjIu', 'siswa', 'aktif', '983472349520', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(25, 1, 'FITRI', 'fitri@gmail.com', '85772179614', '$2y$10$IJIVgDAjhDpOpTSyteh7u.ENzM6DlzgQX0wuyhWzMvnLWGCSwfHgq', 'siswa', 'aktif', '983457234752', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(26, 1, 'Lasmi Kurnia Sari', 'lasmi@gmail.com', '85772290725', '$2y$10$3V9yxSxvgcHrXV2MLtpoZOxnZSLfYvLzblAGrU..oMI4pC1hEx802', 'siswa', 'aktif', '983457342745', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(27, 1, 'Megawati Ananda Putri', 'megawati@gmail.com', '85772401836', '$2y$10$7YUxPKkadTHw46xd4FNFW.uSSTjyJXHYFarWaIG/vVoPNgE13iGRG', 'siswa', 'aktif', '923423475839', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(28, 1, 'Muhamad Ali Imron', 'muhamad@gmail.com', '81233879342', '$2y$10$/jprAZIS1mHwBuKRuhC5pOKNcAl4MIi/Ge44eo3IhyzgKx4dhbC5q', 'siswa', 'aktif', '127364537283', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(29, 1, 'MUHAMMAD HARIS', 'haris@gmail.com', '81234980353', '$2y$10$DotuV0TkKx6O2fQKk/SxH.lyyNr.IFjajR9PjvObjEOko.q3l/y5m', 'siswa', 'aktif', '238475648394', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(30, 1, 'MUHAMMAD JUMADIL AWAL', 'muhammad@gmail.com', '81236081364', '$2y$10$QiPe.HiFE8fyDbpvAuSNQ.7jwKoxjgparQiNZd0LJnYpNHzIcjTmm', 'siswa', 'aktif', '349586759505', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(31, 1, 'Muhammad Ridwan', 'ridwan@gmail.com', '81237182375', '$2y$10$KSCTRzohEx9.1SaeB.FLzemYD1wsuBk77VyqWN6Sssm0cMwMZoyA.', 'siswa', 'aktif', '460697870616', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(32, 1, 'Nanda Lestari', 'nanda@gmail.com', '81238283386', '$2y$10$vUHlnT8W94IruwzCptJOVeNzFvkvkxWlsvIjZzV7Q4DGEXFrV0l3.', 'siswa', 'aktif', '571808981727', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(33, 1, 'Pelangi Septia Wardani', 'pelangi@gmail.com', '81239384397', '$2y$10$jMqV7qvpcagNZv9NjFpcquS9PGAQEel../C/rz2XmTYTpsI3/rq/m', 'siswa', 'aktif', '682920092838', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(34, 1, 'PUJAWATI WULAN SAFITRI', 'pujawati@gmail.com', '81240485408', '$2y$10$ufb9JBrn4WW5J8loAiIvI.nm/BgLZKsoyijqgJmKJmLEaEayG3Ukm', 'siswa', 'aktif', '794031203949', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(35, 1, 'Rian Riardi Saputra', 'rian@gmail.com', '81241586419', '$2y$10$j4y6CchYdU2HxfjEkqSCveIbIqV13pWTflLtqFeaqNwuCjD0heIOK', 'siswa', 'aktif', '905142315060', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(36, 1, 'Ridho Anugrah', 'ridho@gmail.com', '81242687430', '$2y$10$LJ5Za5llAU6nfcJ0sTPFCuCGAFotd4jVCzD41D5Pm5spsobHpsM4K', 'siswa', 'aktif', '101625342617', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(37, 1, 'Riski Alfarezi', 'riski@gmail.com', '81243788441', '$2y$10$lGdhrTiDGpOJS907uDxZlOO7keNjrN0wX1Fb9IM6axfidX8x9cwZG', 'siswa', 'aktif', '112736453728', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(38, 1, 'SELVIA WULANDARI', 'selvia@gmail.com', '81244889452', '$2y$10$DtSF2wwQUDtJhs.SnGDRFeYOompYmpU00/jcoOIHvpTULt90NM9Ha', 'siswa', 'aktif', '123847564839', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(39, 1, 'SITI FATIMAH', 'siti@gmail.com', '81245990463', '$2y$10$bcywifhPlHsUanmSoexF9O/ilPqBB/F5JQlqXpc1lOGHcOelZDZYy', 'siswa', 'aktif', '134958675950', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(40, 1, 'Tenri Anisa', 'tenri@gmail.com', '81247091474', '$2y$10$1yk2Jnu8sUB88iaLTjqeaOeHWUtaYtm7sJH8e5EM34J.h.IMtB.HS', 'siswa', 'aktif', '146069787061', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(41, 1, 'YATI PEBRIYANTI', 'yati@gmail.com', '81248192485', '$2y$10$Q0DTuZ7zofNox4xhTOD.AO2vAUT/uVRzQV07Sp/hLtzMt6Wm9XSHO', 'siswa', 'aktif', '157180898172', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(42, 1, 'YEMIMA HELENTINA SIBARANI', 'yemima@gmail.com', '81249293496', '$2y$10$bk7tX3H3hp.1j7xD79kh3.ObPclzs4MsoiRCYHYffFA8NEYlKbXHy', 'siswa', 'aktif', '168292009283', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(43, 1, 'Yuni Herliana', 'yuni@gmail.com', '81250394507', '$2y$10$TO7rYlmwv4PtuQlrnSsmzuRY6sQJ1n1/.Z6x5Ib7t9tsTeOnwJbti', 'siswa', 'aktif', '179403120394', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(44, 1, 'YUNITA JUMAINI', 'yunita@gmail.com', '81251495518', '$2y$10$me8H4pwnkTdG5zBxukM9Huo2REydCLSnSyNnaAuebkTF8buJ2cgQy', 'siswa', 'aktif', '190514231505', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(45, 2, 'A.M.ARIFUDDIN AMALROS', 'amarifudin@gmail.com', '85356776542', '$2y$10$MI.ZpAL0Eg87KAlV/4tTf.6TcTjGcDWubHBkm0U1jQBYsWHVC9BrG', 'siswa', 'aktif', '345263718312', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(46, 2, 'AMBO ESAK', 'ambo@gmail.com', '85357887653', '$2y$10$jzSfXKDv0T3HtCClh7xESOIFC6oWVHnsce7F4mb0joX9hb0eYBj8e', 'siswa', 'aktif', '456374829423', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(47, 2, 'Anisa Alif Salsabilla', 'anisa12@gmail.com', '85358998764', '$2y$10$IejqLJp1Cvd.KPvWJbtNKeX0nKvbIb9Sp9Ypx/cJE28XLZhw4Ntd6', 'siswa', 'aktif', '567485940534', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(48, 2, 'BASO ZAINUL ABIDIN', 'baso@gmail.com', '85360109875', '$2y$10$aT86xt25leOMp7ArRqee5ekXnmen53xuncNCdYXz63EsJwcyKBkQm', 'siswa', 'aktif', '678597051645', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(49, 2, 'Cahaya Putri Seviani', 'cahaya@gmail.com', '85361220986', '$2y$10$AuU2zH58qUD12pY51jAVVeXTZ0qOqX2aZCIWdxJLSAOELAbtkjWM2', 'siswa', 'aktif', '781708162756', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(50, 2, 'DELLA AMANDA SARI SIHOMBING', 'della@gmail.com', '85362332097', '$2y$10$.MT3Hj6hQ2taj65DwMF4neIQoK.cESnP5gQqFU/R/2UBSZskGHasO', 'siswa', 'aktif', '902819273867', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(51, 2, 'DESI PERMATA SARI', 'desi@gmail.com', '85363443208', '$2y$10$gONgAhzUr3wvbx8y244CXer/F5Qp8mMnzQ41B41xt5G2qBuXTV.nW', 'siswa', 'aktif', '102393038497', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(52, 2, 'Dewi Agustina Pendawi', 'dewi@gmail.com', '85364554319', '$2y$10$Xh4Rhf7vACGloTJNJ8GZb.B8hi/.hr7odkpYcgLDl1yxIznbw/Iya', 'siswa', 'aktif', '114504149608', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(53, 2, 'DINDA MAYA SALSHABILLA', 'dinda@gmail.com', '85365665430', '$2y$10$2KZdd.l5/NJAxlLweM5/7uVO.cjXX4nVDHoikhZg4G5Dgt2f51gSe', 'siswa', 'aktif', '126615260720', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(54, 2, 'El Syifa Choirunisa', 'el@gmail.com', '85366776541', '$2y$10$7l6W9gNr9zWXAvN/.F5C9Odommw53oViPO8g8QXklVkgnnaxLazwi', 'siswa', 'aktif', '138726371831', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(55, 2, 'Fredy Triyanto', 'fredy@gmail.com', '85367887652', '$2y$10$Zm2cf02nUCqjU0OQhxYIk.L1sOYiUGBSf18ve63EiU21CJY6rcmNG', 'siswa', 'aktif', '150837482942', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(56, 2, 'Hesti Agustiani', 'hesti@gmail.com', '85368998763', '$2y$10$VRxTpsV/T4ZSUnkxzsWmeOUXJT7sev51a4uXmW3kcl.uKZcIEqW/i', 'siswa', 'aktif', '162948594053', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(57, 2, 'ILA ASTUTI', 'ila@gmail.com', '85370109874', '$2y$10$dn/Ez6wOzJWmmpIbdhOn8uQf5zCC81HbQ2iqOQrVlNivWyqlnLK4S', 'siswa', 'aktif', '175059705164', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(58, 2, 'Lisa Afriani', 'lisa@gmail.com', '85371220985', '$2y$10$c0A2kYR0Vkyuqohr7VzTBuvK690JfyRFZDOfG45D1D2NLSse4NJ16', 'siswa', 'aktif', '187170816275', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(59, 2, 'M. Fadli Adha', 'mfadil@gmail.com', '85372332096', '$2y$10$4F.qTflkI7VWqdyU6mdSD.6T3F5ud598KLjdWRmrWabHb9adqw1Ym', 'siswa', 'aktif', '199281927386', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(60, 2, 'M.sahrul Gunawan', 'msahrulgdil@gmail.com', '85373443207', '$2y$10$8H6i1DAru/Dia0oqeLJ8PuuWkM05tAH6D0Xx3ywsA3yfIxgayMqba', 'siswa', 'aktif', '211393038497', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(61, 2, 'Maya Dwi Astuti', 'maya@gmail.com', '85374554318', '$2y$10$ADz.CXTRlXMpBXjD77rg7OtAxZbFkQwe3XfbIFA/fpRNyUudz3qfW', 'siswa', 'aktif', '223504149608', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(62, 2, 'MAYANG SOSIA LESTARI', 'mayang@gmail.com', '85375665429', '$2y$10$AF.CldsjzP5xcnwhf46WpeXcWQn1KXeqIHomE1qHqQe04vVPO4FK.', 'siswa', 'aktif', '235615260719', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(63, 2, 'MUHAMMAD RIDWAN', 'ridwancc@gmail.com', '85376776540', '$2y$10$9Nci873118Ush1hEY0yUEehzbQnprue.s6kFH24TtpZvT.HCPsjnK', 'siswa', 'aktif', '247726371830', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(64, 2, 'Nabela Dwi Susilo Putri', 'nabela@gmail.com', '85377887651', '$2y$10$o1ybypq4vYjwNrfs3MGdP.iqZ0jIyqcisqEjdZyrjIZliXHbWkpoW', 'siswa', 'aktif', '259837482941', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(65, 2, 'Nur Permata Intan', 'nur@gmail.com', '85378998762', '$2y$10$rejzDqfdjOIuiGjzVMu78OwdKmNM09v1PgkP0S5qGAqBPDkCwTO.2', 'siswa', 'aktif', '271948594052', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(66, 2, 'NURAINI', 'nuraini@gmail.com', '85380109873', '$2y$10$WdsarNcc78gcbbCYLvWon.1wditiebpKuqvA7kxYjxZ90yp7CwOHe', 'siswa', 'aktif', '284059705163', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(67, 2, 'Ovtafia Yulia Ningsih', 'ningsih@gmail.com', '85381220984', '$2y$10$wZpfG69bEz.ywLovfOrju.4eBCFqh0ubfEFL9HhEjMIGZPseAcS9C', 'siswa', 'aktif', '296170816274', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(68, 2, 'Rafi Brata Alfanus', 'rafi@gmail.com', '85382332095', '$2y$10$7doYsaKD1ggzUFqewM16H.ACWBCGFRgs9u8hp/EPAnThL10cNji66', 'siswa', 'aktif', '308281927385', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(69, 2, 'RENI NOVITA SARI', 'reni@gmail.com', '85383443206', '$2y$10$EDgh8EQa/eC4IzUlZrFE5e8ZzBOMLQMaflc7tyTqGPQBOB6xIFhFa', 'siswa', 'aktif', '320393038496', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(70, 2, 'Retno Yunia Ayu Wulandari', 'retno@gmail.com', '85384554317', '$2y$10$DQJGd2KuRQm8khtp8BOjQeBUy.HDZDK2LqEMyy7Zmmc3v1ptwmpsq', 'siswa', 'aktif', '332504149607', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(71, 2, 'Rini Afrita', 'rini@gmail.com', '85385665428', '$2y$10$ppzBIz2/3BSFWIWYUBllTeHMWkvqQqP6ftNL35EKlD7zjDZB0goNW', 'siswa', 'aktif', '344615260718', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(72, 2, 'Rita Anggraini', 'rita@gmail.com', '85386776539', '$2y$10$1TdRjqfsExeZ/D1TzgC1BOJuQbfIDLD1m0gnkBKr4lrDONCIgM9DS', 'siswa', 'aktif', '356726371829', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(73, 2, 'SELA SEPTIANI PUTRI', 'sela@gmail.com', '85387887650', '$2y$10$ZwW11r4vdyKHj0kfXMexDewdfHVzc7EsQwbQDA4H3ZYIctsexwXoG', 'siswa', 'aktif', '368837482940', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(74, 2, 'Sepina Indriani', 'sepina@gmail.com', '85388998761', '$2y$10$YGPvo.ElLbH9mMRjC47cyOmk5iDN4ZqVBJIqH.OrHSRePlMCIDyMq', 'siswa', 'aktif', '380948594051', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(75, 2, 'Septi Laeli Rahmah', 'septi@gmail.com', '85390109872', '$2y$10$2kmcUQC8f2MLctzrckY5tecPyJmBiIfmypRVs5a28lRPm1D42.slS', 'siswa', 'aktif', '393059705162', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(76, 2, 'Vera Aprilia', 'vera@gmail.com', '85391220983', '$2y$10$ebskLqZL9PqPC4UbzAt2E.oG0hXQIBQifLjIJdvS2bSs10CpLInVG', 'siswa', 'aktif', '405170816273', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(77, 2, 'Yogi Risnanto', 'yogi@gmail.com', '85392332094', '$2y$10$4105s/enupy6etPsdV/mxeFM98.uQy8W8CZTUkd5DT.GdTk87XpjS', 'siswa', 'aktif', '417281927384', '', '2020-08-28 13:47:03', '2020-08-28 13:47:03'),
(139, NULL, 'AMERUDDIN, S. Pd', 'ameruddin@gmail.com', '081373579800', '$2y$10$em0dX4rNu0EkaoNAuU/Lo.UtKAJL0cyvIi.G.hbdX2zGvWQ.THQPm', 'guru', 'aktif', '196103201993031000', 'foto/man-avatar-profile-round-icon_24640-14044.jpg', '2020-08-28 16:08:59', '2021-01-22 14:59:47'),
(140, NULL, 'ADI AKHIAR, S. Pd', 'adi@gmail.com', '081373680911', '$2y$10$nXrkWqhg/jYteN5WuRpCK.kLunU6g8WCtBNBvjskSnBQvYfAJm1ZS', 'guru', 'aktif', '195808241989021000', '', '2020-08-28 16:08:59', '2020-11-25 20:52:06'),
(141, NULL, 'ING RUSTAM, S.Pd', 'ing@gmail.com', '081373782022', '$2y$10$jZ8rCk9j6oyJv4bnRw/65O6J3i7m6tA.Hl1PZfdf6vdkDkvYLVFe6', 'guru', 'aktif', '196010211990021000', '', '2020-08-28 16:08:59', '2020-08-28 16:08:59'),
(142, NULL, 'NURMISNELI, S.Pd', 'nurmisneli@gmail.com', '81373883133', '$2y$10$HvkqT2BLByF3VRkkU1tWZeq7tBDjsx/PapP5/dpUwzPYSa1Xv96WW', 'guru', 'aktif', '196604241992032000', '', '2020-08-28 16:08:59', '2021-01-22 16:13:31'),
(143, NULL, 'WILDA ANGGRAINI, S.E', 'wilda@gmail.com', '81373984244', '$2y$10$EiImA5O8180t/tGDl7XUMOV/MzGzQOYeECPHHZqkCYzt7slJtB2zq', 'guru', 'aktif', '196504061991032000', '', '2020-08-28 16:08:59', '2020-08-28 16:08:59'),
(144, NULL, 'YESI KHOVIRIZA, S.P', 'yesi@gmail.com', '81374085355', '$2y$10$WkL2Qu9GxSHs19PBN1FmmupO8ZHS2WqhG1FgUStLYHAhxCvITyV3W', 'guru', 'aktif', '196301231992031000', '', '2020-08-28 16:08:59', '2020-08-28 16:08:59'),
(145, NULL, 'SYAFEI, S.Ag', 'syafei@gmail.com', '81374287577', '$2y$10$glWQrD2T3ydslat2WbhhzO9uMAb1gtXBYSvSbKYu7yiizwJXKD4TK', 'guru', 'aktif', '196012031986031000', '', '2020-08-28 16:08:59', '2020-08-28 16:08:59'),
(146, NULL, 'PARMOKO, S.Ag', 'parmoko@gmail.com', '85374638902', '$2y$10$iFriA9eL1ddmmlNsb8d2tOBxv3nxV9ZZZhCBXec4NtrUFEEJADzGe', 'guru', 'aktif', '196811171998021000', '', '2020-08-28 16:08:59', '2020-08-28 16:08:59'),
(147, NULL, 'AHMAD.PERIANSYAH, S.Pd', 'ahmad@gmail.com', '85365748047', '$2y$10$zN4MH3Ip.LCOxmgKcg6UUOKX7b/9BjDh44/CwM4vj5s4xdlvh5zEa', 'guru', 'aktif', '196508201993031000', '', '2020-08-28 16:08:59', '2020-08-28 16:08:59'),
(148, NULL, 'ASRIFAL FADLI, S. OR', 'asrifal@gmail.com', '83173848392', '$2y$10$tOVsfyLXDkdACSMuoVSm0uq6lPOuD798Eupj6sb67csIY3kRB8Qwe', 'guru', 'aktif', '195811171979031000', '', '2020-08-28 16:08:59', '2020-08-28 16:08:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_detail_id` (`mapel_detail_id`);

--
-- Indexes for table `kelass`
--
ALTER TABLE `kelass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelass_wali_kelas_foreign` (`wali_kelas`),
  ADD KEY `kelass_ketua_kelas_foreign` (`ketua_kelas`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_id` (`informasi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_details`
--
ALTER TABLE `mapel_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_details_ibfk_1` (`kelas_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_detail_id` (`mapel_detail_id`);

--
-- Indexes for table `nilai_details`
--
ALTER TABLE `nilai_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_id` (`nilai_id`),
  ADD KEY `nilai_details_ibfk_2` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `raports`
--
ALTER TABLE `raports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelass`
--
ALTER TABLE `kelass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mapel_details`
--
ALTER TABLE `mapel_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_details`
--
ALTER TABLE `nilai_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `raports`
--
ALTER TABLE `raports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `informasis`
--
ALTER TABLE `informasis`
  ADD CONSTRAINT `informasis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_ibfk_1` FOREIGN KEY (`mapel_detail_id`) REFERENCES `mapel_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelass`
--
ALTER TABLE `kelass`
  ADD CONSTRAINT `kelass_ketua_kelas_foreign` FOREIGN KEY (`ketua_kelas`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelass_wali_kelas_foreign` FOREIGN KEY (`wali_kelas`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_ibfk_1` FOREIGN KEY (`informasi_id`) REFERENCES `informasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel_details`
--
ALTER TABLE `mapel_details`
  ADD CONSTRAINT `mapel_details_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_details_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_details_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_ibfk_1` FOREIGN KEY (`mapel_detail_id`) REFERENCES `mapel_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_details`
--
ALTER TABLE `nilai_details`
  ADD CONSTRAINT `nilai_details_ibfk_1` FOREIGN KEY (`nilai_id`) REFERENCES `nilais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_details_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raports`
--
ALTER TABLE `raports`
  ADD CONSTRAINT `raports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
