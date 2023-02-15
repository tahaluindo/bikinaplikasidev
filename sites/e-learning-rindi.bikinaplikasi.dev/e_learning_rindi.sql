-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 16, 2022 at 02:37 AM
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
-- Database: `e_learning_rindi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `mapel_detail_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `mapel_detail_id`, `tanggal`) VALUES
(1, 17, '2022-05-25'),
(3, 17, '2022-07-04'),
(4, 27, '2022-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_details`
--

CREATE TABLE `absensi_details` (
  `id` int(11) NOT NULL,
  `absensi_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Hadir','Tidak Hadir','Izin') NOT NULL DEFAULT 'Tidak Hadir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_details`
--

INSERT INTO `absensi_details` (`id`, `absensi_id`, `user_id`, `status`) VALUES
(1, 1, 342, 'Hadir'),
(2, 1, 343, 'Tidak Hadir'),
(3, 1, 344, 'Tidak Hadir'),
(4, 1, 345, 'Tidak Hadir'),
(5, 1, 346, 'Tidak Hadir'),
(6, 1, 347, 'Tidak Hadir'),
(7, 1, 348, 'Tidak Hadir'),
(8, 1, 349, 'Tidak Hadir'),
(9, 1, 350, 'Tidak Hadir'),
(10, 1, 351, 'Tidak Hadir'),
(11, 1, 352, 'Tidak Hadir'),
(12, 1, 353, 'Tidak Hadir'),
(13, 1, 354, 'Tidak Hadir'),
(14, 1, 355, 'Tidak Hadir'),
(15, 1, 356, 'Tidak Hadir'),
(16, 1, 357, 'Tidak Hadir'),
(17, 1, 358, 'Tidak Hadir'),
(18, 1, 359, 'Tidak Hadir'),
(19, 1, 360, 'Tidak Hadir'),
(20, 1, 361, 'Tidak Hadir'),
(21, 1, 362, 'Tidak Hadir'),
(22, 1, 363, 'Tidak Hadir'),
(23, 1, 364, 'Tidak Hadir'),
(24, 1, 365, 'Tidak Hadir'),
(25, 1, 366, 'Tidak Hadir'),
(26, 1, 367, 'Tidak Hadir'),
(27, 1, 368, 'Tidak Hadir'),
(28, 1, 369, 'Tidak Hadir'),
(57, 3, 342, 'Hadir'),
(58, 3, 343, 'Tidak Hadir'),
(59, 3, 344, 'Tidak Hadir'),
(60, 3, 345, 'Tidak Hadir'),
(61, 3, 346, 'Tidak Hadir'),
(62, 3, 347, 'Tidak Hadir'),
(63, 3, 348, 'Tidak Hadir'),
(64, 3, 349, 'Tidak Hadir'),
(65, 3, 350, 'Tidak Hadir'),
(66, 3, 351, 'Tidak Hadir'),
(67, 3, 352, 'Tidak Hadir'),
(68, 3, 353, 'Tidak Hadir'),
(69, 3, 354, 'Tidak Hadir'),
(70, 3, 355, 'Tidak Hadir'),
(71, 3, 356, 'Tidak Hadir'),
(72, 3, 357, 'Tidak Hadir'),
(73, 3, 358, 'Tidak Hadir'),
(74, 3, 359, 'Tidak Hadir'),
(75, 3, 360, 'Tidak Hadir'),
(76, 3, 361, 'Tidak Hadir'),
(77, 3, 362, 'Tidak Hadir'),
(78, 3, 363, 'Tidak Hadir'),
(79, 3, 364, 'Tidak Hadir'),
(80, 3, 365, 'Tidak Hadir'),
(81, 3, 366, 'Tidak Hadir'),
(82, 3, 367, 'Tidak Hadir'),
(83, 3, 368, 'Tidak Hadir'),
(84, 3, 369, 'Tidak Hadir'),
(85, 4, 342, 'Hadir'),
(86, 4, 343, 'Tidak Hadir'),
(87, 4, 344, 'Tidak Hadir'),
(88, 4, 345, 'Tidak Hadir'),
(89, 4, 346, 'Tidak Hadir'),
(90, 4, 347, 'Tidak Hadir'),
(91, 4, 348, 'Tidak Hadir'),
(92, 4, 349, 'Tidak Hadir'),
(93, 4, 350, 'Tidak Hadir'),
(94, 4, 351, 'Tidak Hadir'),
(95, 4, 352, 'Tidak Hadir'),
(96, 4, 353, 'Tidak Hadir'),
(97, 4, 354, 'Tidak Hadir'),
(98, 4, 355, 'Tidak Hadir'),
(99, 4, 356, 'Tidak Hadir'),
(100, 4, 357, 'Tidak Hadir'),
(101, 4, 358, 'Tidak Hadir'),
(102, 4, 359, 'Tidak Hadir'),
(103, 4, 360, 'Tidak Hadir'),
(104, 4, 361, 'Tidak Hadir'),
(105, 4, 362, 'Tidak Hadir'),
(106, 4, 363, 'Tidak Hadir'),
(107, 4, 364, 'Tidak Hadir'),
(108, 4, 365, 'Tidak Hadir'),
(109, 4, 366, 'Tidak Hadir'),
(110, 4, 367, 'Tidak Hadir'),
(111, 4, 368, 'Tidak Hadir'),
(112, 4, 369, 'Tidak Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `informasis`
--

INSERT INTO `informasis` (`id`, `user_id`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gunakan masker', '<p>Gunakan selalu masker</p>', '[\"foto\\/Screenshot (1).png\",\"foto\\/Screenshot (2).png\",\"foto\\/Screenshot (3).png\"]', '2021-02-09 14:18:08', '2022-07-23 19:55:10'),
(2, 1, 'absen', '<p>Yang hadir hari ini, absen ya anak anak.</p>', '[\"foto\\/Screenshot (23).png\"]', '2021-02-09 14:21:14', '2022-07-23 19:55:48'),
(3, 1, 'cuci muka sebelum masuk kelas', '<p>dirahapkeun cuci muka eaaa biar semangat</p>', '[\"foto\\/Screenshot (92).png\"]', '2022-07-23 21:44:05', '2022-07-23 21:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `kelass`
--

CREATE TABLE `kelass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wali_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `ketua_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ruang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelass`
--

INSERT INTO `kelass` (`id`, `wali_kelas`, `ketua_kelas`, `nama`, `ruang`, `created_at`, `updated_at`) VALUES
(4, 535, NULL, 'X IPS 1', 'R-2', '2020-08-28 10:39:39', '2021-02-09 13:39:20'),
(7, 541, NULL, 'XI MIPA 1', 'R-3', '2020-08-28 10:41:10', '2021-02-09 13:39:44'),
(11, 555, NULL, 'XI IPS 1', 'R-4', '2020-08-28 10:43:49', '2021-02-09 13:42:24'),
(14, 560, NULL, 'XII MIPA 1', 'R-5', '2020-08-28 10:49:44', '2021-02-09 13:42:47'),
(17, 543, NULL, 'XII IPS 1', 'R-6', '2020-08-28 10:51:19', '2021-02-09 13:43:02'),
(22, NULL, NULL, 'X MIPA 1', 'R6', '2022-07-24 11:18:24', '2022-07-24 11:18:24');

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
(1, 536, 1, 'jkkkjkjk', '2022-07-23 22:19:42', '2022-07-23 22:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `kuiss`
--

CREATE TABLE `kuiss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_detail_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `soal_ids` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_soal` tinyint(4) NOT NULL,
  `jumlah_menit` tinyint(4) NOT NULL,
  `jenis_soal` enum('Latihan','Ujian') COLLATE utf8_unicode_ci NOT NULL,
  `mode` enum('Essay Acak','Essay Normal','Pilgan Acak','Pilgan Normal') COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kuiss`
--

INSERT INTO `kuiss` (`id`, `guru_id`, `mapel_detail_ids`, `soal_ids`, `nama`, `jumlah_soal`, `jumlah_menit`, `jenis_soal`, `mode`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(3, 535, '[\"17\"]', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 'Kuis 1 Geografi', 5, 15, 'Ujian', 'Pilgan Normal', '2021-02-10 22:50:00', '2021-02-13 23:10:00', '2021-02-11 14:18:32', '2021-02-11 14:18:32'),
(4, 536, '[\"18\"]', '[6,7,8,9,10]', 'Kuis 1 Sosiologin', 5, 15, 'Ujian', 'Pilgan Acak', '2021-02-10 23:03:00', '2021-02-13 23:20:00', '2021-02-11 14:31:58', '2021-02-11 14:31:58'),
(5, 539, '[\"20\"]', '[\"11\",\"12\",\"13\",\"14\",\"15\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\"]', 'Kuis 1 PPKN', 20, 60, 'Ujian', 'Pilgan Normal', '2021-02-10 23:32:00', '2021-02-13 00:00:00', '2021-02-11 15:01:24', '2021-02-11 15:04:58'),
(6, 540, '[\"21\"]', '[\"16\",\"17\",\"18\",\"19\",\"20\"]', 'Kuis 1 Bahasa Indonesia', 5, 15, 'Ujian', 'Pilgan Normal', '2021-02-09 11:28:50', '2021-02-13 00:00:00', '2021-02-11 15:12:39', '2021-02-11 15:12:39'),
(7, 535, '[\"17\"]', '[\"2\",\"3\",\"4\",\"5\",\"21\"]', 'Kuis 1 Geografi - Essay', 5, 30, 'Latihan', 'Essay Normal', '2021-02-11 09:20:00', '2021-02-13 12:00:00', '2021-02-12 00:46:51', '2021-02-12 00:49:44'),
(8, 536, '[\"18\"]', '[11,12,13,14,15]', 'Kuis 1 Sosiologi - Essay', 5, 5, 'Latihan', 'Essay Acak', '2021-02-11 09:56:00', '2021-02-14 12:00:00', '2021-02-12 01:25:25', '2021-02-12 01:25:25'),
(9, 539, '[\"20\"]', '[\"6\",\"7\",\"8\",\"9\",\"10\"]', 'Kuis 1 PPKN - Essay', 5, 20, 'Latihan', 'Essay Normal', '2021-02-11 10:41:00', '2021-02-14 12:00:00', '2021-02-12 01:34:18', '2021-02-12 02:10:58'),
(10, 540, '[\"21\"]', '[16,17,18,19,20]', 'Kuis 1 - Essay', 5, 20, 'Ujian', 'Essay Acak', '2021-02-11 10:47:00', '2021-02-14 12:00:00', '2021-02-12 02:17:18', '2021-02-12 02:17:18'),
(13, 535, '[\"17\"]', '[47]', 'Test 1', 1, 15, 'Ujian', 'Essay Acak', '2021-02-23 12:00:00', '2022-09-09 12:00:00', '2021-02-23 23:44:46', '2022-08-11 22:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `kuis_details`
--

CREATE TABLE `kuis_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `list_tests` text COLLATE utf8_unicode_ci NOT NULL,
  `benar` text COLLATE utf8_unicode_ci NOT NULL,
  `salah` text COLLATE utf8_unicode_ci NOT NULL,
  `tidak_dijawab` text COLLATE utf8_unicode_ci NOT NULL,
  `nilai` float NOT NULL,
  `status` enum('Selesai','Belum Selesai','Dibatalkan') COLLATE utf8_unicode_ci NOT NULL,
  `sisa_waktu` tinyint(4) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kuis_details`
--

INSERT INTO `kuis_details` (`id`, `test_id`, `user_id`, `list_tests`, `benar`, `salah`, `tidak_dijawab`, `nilai`, `status`, `sisa_waktu`, `created_at`, `updated_at`) VALUES
(12, 6, 342, '[]', '0', '0', '0', 0, 'Belum Selesai', 15, '2021-02-12 03:00:31', '2021-02-12 03:00:31'),
(13, 10, 342, '[]', '0', '0', '0', 0, 'Belum Selesai', 10, '2021-02-12 03:00:58', '2021-02-12 03:22:11'),
(18, 13, 342, '[{\"soal_id\":\"22\",\"jawaban\":\"budi\"}]', '0', '0', '0', 0, 'Selesai', 15, '2021-02-23 23:45:53', '2021-02-23 23:49:24'),
(19, 13, 343, '[]', '0', '0', '0', 0, 'Belum Selesai', 13, '2022-08-11 22:55:01', '2022-08-11 22:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(5, 'Geografi', '2021-02-09 13:26:27', '2021-02-09 13:26:27'),
(6, 'Sosiologi', '2021-02-09 13:26:50', '2021-02-09 13:26:50'),
(7, 'Bahasa Inggris', '2021-02-09 13:27:46', '2021-02-09 13:27:46'),
(8, 'PPKN', '2021-02-09 13:28:35', '2021-02-09 13:28:35'),
(9, 'BAHASA INDONESIA', '2021-02-09 13:28:54', '2021-02-10 12:04:45'),
(10, 'PKN Pagi', '2022-07-23 10:20:53', '2022-07-23 10:20:53'),
(11, 'mtk peminatan', '2022-07-23 20:00:14', '2022-07-23 20:00:14');

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
(17, 5, 4, 535),
(18, 6, 11, 536),
(19, 7, 11, 537),
(20, 8, 4, 539),
(21, 9, 4, 540),
(22, 10, 11, 550),
(24, 11, 14, 541),
(25, 11, 4, 535),
(26, 7, 11, 536),
(27, 6, 4, 536),
(28, 6, 17, 536),
(29, 11, 22, 548);

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_detail_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT '-',
  `files` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materis`
--

INSERT INTO `materis` (`id`, `mapel_detail_ids`, `judul`, `link`, `files`, `created_at`, `updated_at`) VALUES
(2, '[\"21\"]', 'Observasi', '', '[\"file\\/Kelas_10_SMA_Bahasa_Indonesia_Guru_2017.pdf\"]', '2021-02-10 14:20:21', '2021-02-10 14:20:21'),
(3, '[\"17\"]', 'Geografi awal', '', '[\"file\\/7. MODUL 1 Geografi-converted.docx\"]', '2021-02-10 14:22:18', '2021-02-10 14:22:18'),
(4, '[\"27\"]', 'Sosiologi 1', NULL, '[\"file\\/Sosiologi_Kelas_12_Ruswanto_2009.pdf\"]', '2021-02-10 14:24:36', '2022-07-24 12:05:48'),
(5, '[\"20\"]', 'Materi kewarganegaraan', '', '[\"file\\/Buku-Modul-Kuliah-Kewarganegaraan-converted.docx\"]', '2021-02-10 14:28:37', '2021-02-10 14:28:37'),
(7, '[\"17\"]', 'Materi 1', NULL, '[\"file\\/APLIKASI PENCATATAN PESANAN.docx\"]', '2021-03-09 14:39:53', '2021-03-09 14:39:53'),
(8, '[\"17\"]', 'materi 1b', 'http://google.drive', '[]', '2021-03-09 16:09:18', '2021-03-09 16:09:18'),
(11, '[\"17\"]', 'Materi 1c', NULL, '[\"file\\/anum-3 metode.xlsx\"]', '2021-03-09 16:13:05', '2021-03-09 16:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `misi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `nama`, `no_telp`, `alamat`, `deskripsi`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'SMAN 8 TANJUNG JABUNG TIMUR', '085368739455', 'JL. WR. SUPRATMAN RT 4, Parit Culum I, Kec. Muara Sabak Barat, Kab. Tanjung Jabung Timur Prov. Jambi', '<p>Adalah salah satu sekolah SMA di Tanjung Jabung Timur</p>\r\n\r\n<p>&nbsp;</p>', '<p>Mewujudkan Sumber Daya Manusia yang Berakhlak Mulia yang Mampu Bersaing Dalam Dunia Kerja Secara Global</p>', '<p>1. Menciptakan suasana yang kondusif untuk mengembangkan potensi siswa melalui penekanan pada penguasaan kompetensi bidang ilmu pengetahuan dan teknologi serta Bahasa Inggris.</p>\r\n\r\n<p>2. Meningkatkan penguasaan Bahasa Inggris sebagai alat komunikasi dan alat untuk mempelajari pengetahuan yang lebih luas.</p>\r\n\r\n<p>3. Meningkatkan frekuensi dan kualitas kegiatan siswa yang lebih menekankan pada pengembangan ilmu pengetahuan dan teknologi serta keimanan dan ketakwaan yang menunjang proses belajar mengajar dan menumbuhkembangkan disiplin pribadi siswa.</p>\r\n\r\n<p>4. Menumbuhkembangkan nilai-nilai ketuhanan dan nilai-nilai kehidupan yang bersifat universal dan mengintegrasikannya dalam kehidupan</p>\r\n\r\n<p>5. Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah, Lembaga Swadaya Masyarakat, stake holders dan instansi serta institusi pendukung pendidikan lainnya.</p>', '2020-08-27 15:30:00', '2022-07-23 11:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `soal_essays`
--

CREATE TABLE `soal_essays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `soal` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis` enum('Latihan','Ujian') COLLATE utf8_unicode_ci NOT NULL,
  `bobot` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soal_essays`
--

INSERT INTO `soal_essays` (`id`, `mapel_id`, `soal`, `gambar`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES
(2, 5, '<p>Jelaskan karakteristik lapisan bumi!</p>', NULL, 'Latihan', 10, NULL, NULL),
(3, 5, '<p>Apakah yang dimaksud dengan vulkanisme?</p>', NULL, 'Latihan', 10, NULL, NULL),
(4, 5, '<p>Tuliskan lapisan - lapisan atmosfer</p>', NULL, 'Latihan', 10, NULL, NULL),
(5, 5, '<p>Jelaskan perbedaan antara iklim dan cuaca</p>', NULL, 'Latihan', 10, NULL, NULL),
(6, 8, '<p>Selain Bhinneka Tunggak Ika, negara kita juga memilik alat-alat pemersatu bangsa. Sebutkan!</p>', NULL, 'Latihan', 10, NULL, NULL),
(7, 8, '<p>Dalam Pasal 27 ayat (3) UUD NRI Tahun 1945 dikatakan bahwa?</p>', NULL, 'Latihan', 10, NULL, NULL),
(8, 8, '<p>Bhinneka Tunggal Ika adalah semboyan bagi bangsa Indonesia yang artinya?</p>', NULL, 'Latihan', 10, NULL, NULL),
(9, 8, '<p>UU No. 34 Tahun 2004 tentang?</p>', NULL, 'Latihan', 10, NULL, NULL),
(10, 8, '<p>Ancaman berdasarkan jenis nya dibagi atas? Sebutkan!</p>', NULL, 'Latihan', 10, NULL, NULL),
(11, 6, '<p>Jelaskanlah ciri kelompok paguyuban dan patembayan!</p>', NULL, 'Latihan', 10, NULL, NULL),
(12, 6, '<p>Jelaskanlah pengaruh diferesiasi sosial dan stratifikasi sosial!</p>', NULL, 'Latihan', 10, NULL, NULL),
(13, 6, '<p>tuliskanlah 8 perbedaan anara konflik dan kekerasan!</p>', NULL, 'Latihan', 10, NULL, NULL),
(14, 6, '<p>Tulis dan jelaskan bentuk - bentuk integrasi sosial!</p>', NULL, 'Latihan', 10, NULL, NULL),
(15, 6, '<p>Menurut anda, bagaimana upaya untuk mencapai reintegrasi sosial?</p>', NULL, 'Latihan', 10, NULL, NULL),
(16, 9, '<p>Apakah tujuan anda melakukan negosiasi?</p>', NULL, 'Ujian', 10, NULL, NULL),
(17, 9, '<p>Ketika anda bernegosiasi diperlukan syarat-syarat yaitu!</p>', NULL, 'Ujian', 10, NULL, NULL),
(18, 9, '<p>&quot;Ayah, doakan saja biar aku mudah meraih cita-cita&quot;, makna tersirat dari kalimat persuasif tersebut adalah?</p>', NULL, 'Ujian', 10, NULL, NULL),
(19, 9, '<p>Buatlah satu contoh mosi dengan tema pendidikan!</p>', NULL, 'Ujian', 10, NULL, NULL),
(20, 9, '<p>Diksi dalam puisi adalah...</p>', NULL, 'Ujian', 10, NULL, '2021-02-12 03:24:29'),
(21, 5, '<p>geografi adalah</p>', NULL, 'Latihan', 10, NULL, NULL),
(23, 5, '<p>Deskripsikan tentang planet jupiters</p>', NULL, 'Latihan', 10, NULL, NULL),
(24, 5, '<p>Contoh lingkungan fisik adalah....</p>', NULL, 'Latihan', 10, NULL, NULL),
(25, 5, '<p>Varenius membagi geografi&nbsp; menjadi dua, yaitu....</p>', NULL, 'Latihan', 10, NULL, NULL),
(26, 5, '<p>Menurut aliran fisis determinis, kehidupan manusia ditentukan oleh....</p>', NULL, 'Latihan', 10, NULL, NULL),
(27, 5, '<p>Konsep esensial geografi yang berkaitan dengan bentuk muka bumi adalah....</p>', NULL, 'Latihan', 10, NULL, NULL),
(28, 5, '<p>Pendekatan keruangan menganalisis gejala atau fenomena geografi berdasarkan....</p>', NULL, 'Latihan', 10, NULL, NULL),
(29, 5, '<p>Fenomena atmosfer, hidrosfer, dan biosfer termasuk dalam objek kajian geografi, yaitu....</p>', NULL, 'Latihan', 10, NULL, NULL),
(30, 5, '<p>Ilmu yang mempelajari pembuatan peta disebut....</p>', NULL, 'Latihan', 10, NULL, NULL),
(31, 5, '<p>Prinsip geografi yang menyatakan hubungan antara gejala geografi yang satu dengan gejala geografi yang lain di muka bumi merupakan prinsip....</p>', NULL, 'Latihan', 10, NULL, NULL),
(32, 5, '<p>Istilah geografi berasal dari bahasa Yunani, yaitu kata....</p>', NULL, 'Latihan', 10, NULL, NULL),
(33, 5, '<p>Cabang geografi yang mempelajari suatu wilayah tertentu secara khusus adalah....</p>', NULL, 'Ujian', 10, NULL, NULL),
(34, 5, '<p>Jelaskan pengertian konsep aglomerasi dan berikan contoh bentuk aglomerasi yang ada di perkotaan!</p>', NULL, 'Ujian', 10, NULL, NULL),
(35, 5, '<p>Berikan contoh kajian geografi dengan menggunakan pendekatan keruangan, pendekatan ekologi, dan pendekatan kompleks wilayah!</p>', NULL, 'Ujian', 10, NULL, '2021-03-09 15:42:01'),
(36, 5, '<p>Jelaskan yang dimaksud dengan geosfer! Berikan contoh gejala maupun fenomena dalam kehidupan sehari-hari yang berkaitan dengan geosfer!</p>', NULL, 'Ujian', 10, NULL, NULL),
(37, 5, '<p>Sebutkan dan jelaskan empat prinsip geografi!</p>', NULL, 'Ujian', 10, NULL, NULL),
(38, 5, '<p>Prinsip interrelasi</p>', NULL, 'Ujian', 10, NULL, NULL),
(39, 5, '<p>Prinsip deskripsi</p>', NULL, 'Ujian', 10, NULL, NULL),
(40, 5, '<p>Prinsip korologi</p>', NULL, 'Ujian', 10, NULL, NULL),
(41, 5, '<p>elaskan ilmu geografi memerlukan ilmu penunjang lainnya!</p>', NULL, 'Ujian', 10, NULL, NULL),
(42, 5, '<p>Variasi ketiggian tempat dalam suatu wilayah disebut....</p>', NULL, 'Ujian', 10, NULL, NULL),
(43, 5, '<p>Jarak vertikal suatu tempat dari permukaan laut disebut....</p>', NULL, 'Ujian', 10, NULL, NULL),
(44, 5, '<p>Peta yang digunakan sebagai dasar pembuatan peta disebut....</p>', NULL, 'Ujian', 10, NULL, NULL),
(45, 5, '<p>Menurut bentuknya, simbol dapat dibedakan menjadi simbol....</p>', NULL, 'Latihan', 10, NULL, NULL),
(46, 5, '<p>Tiga jenis proyeksi peta, yaitu....</p>', NULL, 'Ujian', 10, NULL, NULL),
(47, 5, '<p>Gambaran permukaan bumi baik keseluruhan atau sebagian yang diperkecil dengan menggunakan skala disebut....</p>', NULL, 'Ujian', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soal_pilgans`
--

CREATE TABLE `soal_pilgans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `soal` text COLLATE utf8_unicode_ci NOT NULL,
  `opsi_a` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opsi_b` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opsi_c` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opsi_d` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jawaban` enum('A','B','C','D') COLLATE utf8_unicode_ci NOT NULL,
  `jenis` enum('Latihan','Ujian') COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soal_pilgans`
--

INSERT INTO `soal_pilgans` (`id`, `mapel_id`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`, `jenis`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 5, '<p>Lapisan yang memisahkan kerak bumi dan inti bumi adalah</p>', '<p>Sial</p>', '<p>Sima</p>', '<p>Litosfer</p>', '<p>Astenosfer</p>', 'C', 'Ujian', NULL, '2021-02-09 14:44:26', '2021-02-10 13:41:55'),
(2, 5, '<p>Patahan semangko di pulau Sumatra terbentuk karena peristiwa</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -32px; top: -5.77778px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Vulkanisme</p>', '<p>Seisme</p>', '<p>Endogen</p>', '<p>Tektonisme</p>', 'B', 'Ujian', NULL, '2021-02-09 14:45:24', '2021-02-10 13:40:34'),
(3, 5, '<p>Letusan gunung berapi dapat mempengaruhi iklim karena</p>', '<p>Debu vulkanik dan gas di atmosfer menyerap radiasi matahari</p>', '<p>Letusan gunung api memanaskan atmosfer</p>', '<p>Debu vulkanik dan gas di atmosfer menyerap radiasi matahari</p>', '<p>Magma Cenderung mempunyai suhu yang tinggi</p>', 'C', 'Ujian', NULL, '2021-02-09 14:47:18', '2021-02-10 13:41:55'),
(4, 5, '<p>Letusan gunung berapi terbesar yang pernah terjadi di Indonesia hingga saat ini adalah gunung...</p>', '<p>Pinatubo</p>', '<p>Krakatau</p>\r\n\r\n<p>&nbsp;</p>', '<p>Rainer</p>', '<p>Toba</p>', 'A', 'Ujian', NULL, '2021-02-09 14:48:59', '2021-02-10 13:41:55'),
(5, 5, '<p>Salah satu dampak positif vulkanisme terhadap kehidupan adalah...</p>', '<p>Tanah menjadi subur</p>', '<p>Permukiman penduduk rusak</p>', '<p>Tanah tertutup abu vulkanik</p>', '<p>Tanah longsor terjadi</p>', 'C', 'Ujian', NULL, '2021-02-09 14:50:07', '2021-02-10 13:41:55'),
(6, 6, '<p>Andi mengakui dirinya tergabung dan berperan aktif dalam kelompok karya ilmiah remaja yang diadakan disekolah tempat dia belajar. Hal tersebut sesuai dengan kriteria suatu kelompok, yaitu...</p>', '<p>Adanya keuntungan suatu kelompok</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -178px; top: 37.6667px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Adanya tujuan yang ingin dicapai oleh suatu kelompok</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -69px; top: -5.77778px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Memiliki pola interaksi antara anggota kelompok lainnya</p>', '<p>Pihak yang berinteraksi mendefenisikan dirinya sebagai anggota kelompok</p>', 'A', 'Ujian', NULL, '2021-02-09 14:58:34', '2021-02-10 13:41:55'),
(7, 6, '<p>Karena adanya kebijakan mengurangi jumlah tenaga kerja, para buruh pabri bersatu melakukan unjuk rasa guna menuntut hak mereka sebagai buruh. Bentuk kelompok sosial yang sesuai dengan kasus tersebut adalah...</p>', '<p>Publik</p>', '<p>kerumunan</p>', '<p>Massa</p>', '<p>In-Group</p>', 'C', 'Ujian', NULL, '2021-02-09 15:01:18', '2021-02-10 13:41:55'),
(8, 6, '<p>Kelompok sosial terkecil dalam masyarakat adalah</p>', '<p>EmTeman bermain</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 27px; top: 37.6667px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Keluarga</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -122px; top: 37.6667px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Lingkungan Rt\\Rw</p>', '<p>Kelompok Belajar</p>', 'C', 'Ujian', NULL, '2021-02-09 15:02:52', '2021-02-10 13:41:55'),
(9, 6, '<p>Emile Durkheim membagi kelompok sosial menjadi dua, yakni...</p>', '<p>Ingroup dan out group</p>', '<p>Membership group dan refference group</p>', '<p>Paguyubuan dan patembayan</p>', '<p>Solidaritas organic dan solidaritas mekanik</p>', 'B', 'Ujian', NULL, '2021-02-09 15:04:24', '2021-02-10 13:40:34'),
(10, 6, '<p>Suatu keadaan yang tidak sesuai dengan yang diharapkan dengan realita yang ada merupakan pengertian dari...</p>', '<p>masalah sosial</p>', '<p>masalah</p>', '<p>hambatan</p>', '<p>kecemburuan sosial</p>', 'D', 'Ujian', NULL, '2021-02-09 15:05:13', '2021-02-10 13:41:55'),
(11, 8, '<p>Bhinneka Tunggal Ika mentpakan semboyan bagi bangsa indonesia.Semboyan tersebut mengandung makna...</p>', '<p>Persatuan dan kesejahteraan bangsa</p>', '<p>Persatuan dan kesatuan bangsa</p>', '<p>Persatuan dan kemakmuran bangsa</p>', '<p>Persatuan dan kemakmuran NKRI</p>', 'B', 'Ujian', NULL, '2021-02-10 11:47:07', '2021-02-11 15:00:08'),
(12, 8, '<p>Berikut perwujudan nasionalisme yang dapat diterapkan dalam setiap aspek kehidupan adalah...</p>', '<p>Mengerti makna bhinneka tunggal ika</p>', '<p>Mengetahui kebhinekaan dan rasa nasionalime</p>', '<p>Pemahaman akan kebhinekaan bangsa</p>', '<p>Menjunjung nilai-nilai pancasila</p>', 'C', 'Ujian', NULL, '2021-02-10 11:47:59', '2021-02-10 13:41:55'),
(13, 8, '<p>Perhatikan beberapa hal berikut 1) Pancasila 3) Bendera Merah Putih 2) UUD NRI 1945 4) Bahasa Indonesia Mat pemersatu bangsa yang dimiliki Indonesia ditunjukkan nomor...</p>', '<p>1, 2, dan 4</p>', '<p>1, 3, dan 4</p>', '<p>1, 3, dan 5</p>', '<p>2, 3 dan 5</p>', 'A', 'Ujian', NULL, '2021-02-10 11:49:40', '2021-02-11 14:59:04'),
(14, 8, '<p>Utami mengikuti lomba gebyar tarian daerah yang diikuti oleh para pelajar dari berbagai daerah di indonesia. Tindakan tersebut merupakan salah satu implementasi dalam upaya...</p>', '<p>Mengenalkan tarian daerah terhadap masyarakat</p>', '<p>Mempersatukan masyarakat yang beragam</p>', '<p>Melestarikan budaya tarian daerah</p>', '<p>Mempromosikan budaya pada masyarakat</p>', 'B', 'Ujian', NULL, '2021-02-10 11:50:41', '2021-02-11 14:59:26'),
(15, 8, '<p>Berikut yang termasuk dalam faktor penghambat integrasi nasional adalah...</p>', '<p>Munculnya jiwa dan semnagat gotong royong serta toleransi yang kuat</p>', '<p>Lepasnya wilayah negara yang terdiri dari ribuan pulau dan dikelilingi lautan</p>', '<p>Faktor sejarah yang mengakibatkan ras senasib dan seperjuangan d. Keinginan untuk bersatu sebagai tekad bangsa indonesia</p>', '<p>Adanya semangat rela berkorban dari seluruh bangsa indonesia</p>', 'C', 'Ujian', NULL, '2021-02-10 11:51:50', '2021-02-11 14:59:47'),
(16, 9, '<p>Debat dibangun atas unusr dibawah ini, <em>kecuali</em></p>', '<p>Tema</p>', '<p>Mosi</p>', '<p>Tim Afirmatif</p>', '<p>Tim Oposisi</p>', 'B', 'Ujian', NULL, '2021-02-10 12:08:09', '2021-02-10 13:40:34'),
(17, 9, '<p>Pihak yang menolak emosi dalam debat adalah</p>', '<p>Tim Afirmatif</p>', '<p>Tim Oposisi</p>', '<p>Tim Netral</p>', '<p>Penonton</p>', 'A', 'Ujian', NULL, '2021-02-10 12:08:56', '2021-02-10 13:41:55'),
(18, 9, '<p>Unsur pertama dalam debat adalah</p>', '<p>Merumuskan mosi</p>', '<p>Menentukan tema debat</p>', '<p>Menentukan anggota debat</p>', '<p>Menyusun tata tertib</p>', 'C', 'Ujian', NULL, '2021-02-10 12:09:41', '2021-02-10 13:48:29'),
(19, 9, '<p>Pola penyajian karakter tokoh dalam penulisan biografi dapat menggunakan cara</p>', '<p>Langsung dan tidak langsung</p>', '<p>Lama dan baru</p>', '<p>Konkret dan abstrak</p>', '<p>Deskripsi melalui penuturan tokoh dan tokoh lain</p>', 'B', 'Ujian', NULL, '2021-02-10 12:10:49', '2021-02-10 13:48:42'),
(20, 9, '<p>Pernyataan perasaan hasil penhiwaan isi puisi disebut</p>', '<p>Vokal</p>', '<p>Ekspresi</p>', '<p>Intonasi</p>', '<p>Irama</p>', 'C', 'Ujian', NULL, '2021-02-10 12:11:57', '2021-02-10 13:41:55'),
(21, 8, '<p>Penyebab masalah sosial antara masyarakat yang satu dengan masyarakat yang lain berbeda-beda. Perbendaaan ini antara lain dipengaruhi oleh...</p>', '<p>perbedaan nilai, keyakinan pengalaman hidup, dan periode sejarah</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -19px; top: 37.6667px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>perbedaan nilai, keyakinan pengalaman hidup, dan periode sejarah</p>', '<p>keyakinan pengalaman hidup, perode sejarah, dan tingkat pendidikan</p>', '<p>latar belakang budaya, kehidupan ekonomi, dan tingkat pendidikan</p>', 'C', 'Ujian', NULL, '2021-02-10 13:07:43', '2021-02-10 13:41:55'),
(22, 8, '<p>Syarat terbentuknya integrasi adalah...</p>', '<p>Masyarakat tidak mampu menciptakan konsensus</p>', '<p>Norma dan nilai berlaku sepanjang inasa</p>', '<p>Memiliki tujuan yang berbeda</p>', '<p>Adanya sikap etnosentrisme dalam diri masyarakat</p>', 'B', 'Ujian', NULL, '2021-02-10 13:11:08', '2021-02-10 13:40:34'),
(23, 8, '<p>&nbsp;Perhatikan faktor-faktor berikut 1) Masih besamya ketimpangan dan ketidakmeratnan pembangunan 2) Munculnya paham etnosentrisme diberbagai suku bangsa 3) Adanya konsensus nasional dalam perwujudan proklamasi kemerdekaan 4) Rela berkorban untuk kepentingan bangsa dan negara 5). Faktor sejarah yang mengakitkan rasa senasib dan seperjuangan Faktor pendorong tercapainya integrasi nasional ditunjukkan nomor...</p>', '<p>1, 2, dan 4</p>', '<p>1, 3, dan 4</p>', '<p>1, 3, dan 5</p>', '<p>2, 3, dan 5</p>', 'A', 'Ujian', NULL, '2021-02-10 13:15:00', '2021-02-10 13:41:55'),
(24, 8, '<p>Sebagai warga negara yang baik, kita harus berupaya membela negara. Berikut yang tidak termasuk contoh dari pelatihan dasar kemiliteran yang dilakukan oleh pelajar di sekolah adalah...</p>', '<p>Andy giat mengikuti latihan pramuka</p>', '<p>Wahyu mengikuti latihan rutin paskibra untuk persiapan lomba</p>', '<p>Khansa melakukan kewajibannya mengikuti latihan menwa</p>', '<p>Hidayat bersemangat dalam to &nbsp;as sebagai patroli keamanan sekolah</p>', 'D', 'Ujian', NULL, '2021-02-10 13:16:06', '2021-02-10 13:41:55'),
(25, 8, '<p>Pak wahyudi sangat mencintai dunia pendidikan, is sudah mengabdi sebagai seorang guru selama 15 tahun dan berencana tents mengabdi untuk mencerdaskan anak-anak bangsa. Tindakan Pak Wahyudi tersebut merupakan salah satu upaya bela negara, yain</p>', '<p>Pendidikan kewarganegaraan</p>', '<p>Pelatih dasar kepemimpinan</p>', '<p>Mengabdi sebagai prajurit tentara</p>', '<p>Mengabdi sesuai dengan profesi</p>', 'B', 'Ujian', NULL, '2021-02-10 13:17:32', '2021-02-10 13:40:34'),
(26, 8, '<p>Ancaman merupakan setiap usaha dan kegiatan, baik dari dalam negeri maupun mar negeri, yang dinilai dapat membahayakan...</p>', '<p>Kesatuan, keutuhan, dan keselamatan suatu negara</p>', '<p>Keutuhan, keamanan, dan kesatuan suatu negara</p>', '<p>Keselamatan, kedaulatan, dan keamanan suatu negara</p>', '<p>Kedaulatan, keutuhan, dan keselamatan suatu negara</p>', 'B', 'Ujian', NULL, '2021-02-10 13:18:33', '2021-02-10 13:40:34'),
(27, 8, '<p>Segala bentuk ancaman yang dapat mengganggu ketahanan nasional suatu negara dan dilakukan dalam tataran pemikiran merupakan bentuk ancaman...</p>', '<p>Fisik</p>', '<p>Ideologis</p>', '<p>Politik</p>', '<p>Keamanan</p>', 'B', 'Ujian', NULL, '2021-02-10 13:19:24', '2021-02-10 13:40:34'),
(28, 8, '<p>Tujuan bangsa indortesia tercatum dalam pembukaan UUD NRI Tahun 1945 alinea&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'A', 'Ujian', NULL, '2021-02-10 13:23:16', '2021-02-10 13:41:55'),
(29, 8, '<p>Undang-Undang tentang Tentara Nasional Indonesia( TNI) yang menyebutkan ancaman dan gangguan terhadap keutuhan bangsa dan negara adalah...</p>', '<p>UU No. 32 Tahun 2004</p>', '<p>UU No. 32 Tahun 2002</p>', '<p>UU No. 33 Tabun 2004</p>', '<p>UU No. 34 Tahun 2004</p>', 'C', 'Ujian', NULL, '2021-02-10 13:24:01', '2021-02-10 13:41:55'),
(30, 8, '<p>Berikut yang bukan termasuk contoh kasus pelanggaran wilayah yang pernah terjadi di Indonesia adalah...</p>', '<p>Pemindahan patok wilayah perbatasan di wilayah Kalimantan oleh Malaysia</p>', '<p>Kapal nelayan milik Malaysia pernah tertangkap karena mengambil ikan di wilayah perairan Indonesia</p>', '<p>Pesawat F-18 milik Amerika Serikat pernah terbang di wilayah udara Indonesia tanpa izin</p>', '<p>Kapal nelayan milik Jepang pernah tertangkap karena menangkap ikan di perairan Indonesia</p>', 'D', 'Ujian', NULL, '2021-02-10 13:25:02', '2021-02-10 13:41:55'),
(31, 8, '<p>Kasus penyadapan telepon para pejabata Indonesia oleh Australia merupakan salah satu contoh kasus ancaman dan gangguan yang berupa...</p>', '<p>Sabotase</p>', '<p>Spionase</p>', '<p>Agresi</p>', '<p>Pelanggaran wilayah</p>', 'D', 'Ujian', NULL, '2021-02-10 13:25:52', '2021-02-10 13:41:55'),
(32, 8, '<p>Globalisasi berdampak kepada kehidupan dari segi sikap, pandangan hidup, bahkan nilai-nilai budaya bangsa. Hal tersebut merupakan penjelasan ancaman globalisasi dalam bidang...</p>', '<p>Politik</p>', '<p>Ideologi</p>', '<p>Ekonomi</p>', '<p>Sosial budaya</p>', 'A', 'Ujian', NULL, '2021-02-10 13:26:35', '2021-02-10 13:41:55'),
(33, 8, '<p>Pengaruh derasnya budaya global yag negatif menyebabkan kesadaran terhadap nilai-nilai budaya bangsa semakin memudar. Berikut tindakan yang tidak mecerminkan hal tersebut adalah...</p>', '<p>Menghargai budaya asing</p>', '<p>Pola hidup konsumtif</p>', '<p>Menghargai produk dalam negeri</p>', '<p>Pergaulan bebas</p>', 'D', 'Ujian', NULL, '2021-02-10 13:27:18', '2021-02-10 13:41:55'),
(34, 8, '<p>Perhatikan bentuk ancaman berikut. 1) Perang informasi 4) Kekerasan politik 2) Perang tak terbatas 5) Pelanggaran wilayah 3) Konflik perbatasan Bentuk ancaman terhadap pertahanan nasional ditunjukkan nomor...</p>', '<p>1, 2, dan 3</p>', '<p>1, 2, dan 4</p>', '<p>1, 4 dan 5</p>', '<p>2, 3, dan 5</p>', 'B', 'Ujian', NULL, '2021-02-10 13:30:29', '2021-02-10 13:40:34'),
(35, 8, '<p>Penyebaran virus atau penyakit berbahaya merupakan salah satu bentuk ancaman disintegrasi, yaitu ancaman...</p>', '<p>Bencana alam</p>', '<p>Perubahan iklim</p>', '<p>Teknologi</p>', '<p>Epidemi</p>', 'D', 'Ujian', NULL, '2021-02-10 13:31:19', '2021-02-10 13:41:55'),
(36, 5, '<p>Karawang saat ini merupakan kawasan lumbung padi Jawa Barat, tetapi belum tentu untuk masa yang akan datang. Hal ini merupakan contoh dari konsep&hellip;.</p>', '<p>keunikan wilayah</p>', '<p>lokasi relatif</p>', '<p>relasi wilayah</p>', '<p>interaksi keuangan</p>', 'D', 'Ujian', NULL, '2021-03-09 15:46:36', '2021-03-09 15:46:36'),
(37, 5, '<p>Sumbangan Eratosthenes dalam geografi adalah&hellip;.</p>', '<p>pendapatnya bahwa bumi itu bulat</p>', '<p>pendapatnya bahwa bumi itu datar</p>', '<p>pendapatnya bahwa bumi itu berlapis-lapis</p>', '<p>pendapatnya bahwa bumi itu diselimuti lapisan udara</p>', 'A', 'Ujian', NULL, '2021-03-09 15:47:32', '2021-03-09 15:47:32'),
(38, 5, '<p>Menurut aliran fisis determinis, kehidupan manusia ditentukan oleh&hellip;.</p>', '<p>manusia itu sendiri</p>', '<p>ilmu pengetahuan</p>', '<p>budaya manusia</p>', '<p>teknologi</p>', 'D', 'Ujian', NULL, '2021-03-09 15:48:05', '2021-03-09 15:48:05'),
(39, 5, '<p>Berikut ini dijelaskan beberapa contoh fenomena yang termasuk konsep lokasi adalah&hellip;.</p>', '<p>nilai tanah untuk permukiman menjadi murah apabila dekat tempat pembuangan sampah</p>', '<p>harga rumah semakin mahal apabila mendekati pusat kota dibandingkan dengan harga rumah di pedesaan</p>', '<p>permukiman khusus pegawai negeri</p>', '<p>semakin besar tingkat erosi maka kesuburan tanah semakin berkurang</p>', 'A', 'Ujian', NULL, '2021-03-09 15:48:35', '2021-03-09 15:48:35'),
(40, 5, '<p>Suatu lokasi pengertiannya akan menjadi tempat apabila&hellip;.</p>', '<p>menunjukkan posisi suatu daerah</p>', '<p>memiliki informasi tertentu</p>', '<p>dapat menunjukkan kaitannya dengan daerah lain</p>', '<p>mudah dijangkau</p>', 'A', 'Ujian', NULL, '2021-03-09 15:49:10', '2021-03-09 15:49:10'),
(41, 5, '<p>Perhatikan unsur-unsur dalam geografi berikut ini!<br />\r\n&ndash; Pola persebaran gejala ertentu permukaan bumi<br />\r\n&ndash; Keterkaitan atau hubungan sesama antargejala tersebut<br />\r\n&ndash; Perkembangan atau perubahan yang terjadi pada gejala tersebut</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unsur-unsur tersebut merupakan bagian dari organisasi keruangan&hellip;..</p>', '<p>objek formal</p>', '<p>objek material</p>', '<p>aspek geografi</p>', '<p>konsep geografi</p>', 'A', 'Ujian', NULL, '2021-03-09 15:49:56', '2021-03-09 15:49:56'),
(42, 5, '<p>Konsep geografi yang akan muncul dalam mengkaji fenomena banjir adalah&hellip;..</p>', '<p>hujan, permukiman, lereng, dan hutan</p>', '<p>erosi, tebing, air, tanah, dan batuan</p>', '<p>kerusakan hutan, hujan, sungai, dan sampah</p>', '<p>sedimentasi, tanah, vegetasi, dan muara</p>', 'A', 'Ujian', NULL, '2021-03-09 15:50:24', '2021-03-09 15:53:49'),
(43, 5, '<p>Penduduk dunia cenderung menempati wilayah-wilayah yang banyak memiliki cadangan air dengan topografi yang datar. Salah satu konsep esensial menurut J. Warman, yaitu&hellip;..</p>', '<p>jarak</p>', '<p>aglomerasi</p>', '<p>lokasi</p>', '<p>keterjangkauan</p>', 'A', 'Ujian', NULL, '2021-03-09 15:50:55', '2021-03-09 15:50:55'),
(44, 5, '<p>Konsep esensial geografi yang berkaitan dengan bentuk muka bumi adalah&hellip;..</p>', '<p>morfologi</p>', '<p>aglomerasi</p>', '<p>aksesibilitas</p>', '<p>jarak</p>', 'A', 'Ujian', NULL, '2021-03-09 15:51:28', '2021-03-09 15:51:28'),
(45, 5, '<p>Posisi Indonesia menjadikannya sangat strategis dalam bidang pelayaran dan perdagangan dunia. Hal ini merupakan dampak posisi Indonesia apabila dilihat secara ...</p>', '<p>geologis</p>', '<p>astronomis</p>\r\n\r\n<p>&nbsp;</p>', '<p>geomorfologis</p>', '<p>geografis</p>', 'D', 'Ujian', NULL, '2021-03-09 15:55:12', '2021-03-09 15:55:12'),
(46, 5, '<p>Perairan laut di Indonesia memiliki karakteristik berbeda. Hal ini dapat dilihat dari kedalaman lautnya. Wilayah Indonesia bagian barat memiliki kedalaman laut yang lebih dangkal dibandingkan perairan laut di Indonesia bagian tengah dan timur, seperti Laut Banda. Faktor yang menyebabkan terjadinya hal ini adalah ...</p>', '<p>adanya sedimentasi yang besar di perairan Indonesia bagian barat</p>', '<p>adanya perbedaan proses pembentukan morfologi laut di Indonesia</p>', '<p>kedalaman laut di Indonesia bagian timur dipengaruhi oleh kuatnya arus Samudra Pasifik</p>', '<p>pergerakan lempeng tektonik di Indonesia bagian barat tidak terlalu berpengaruh besar</p>', 'B', 'Latihan', NULL, '2021-03-09 15:56:05', '2021-03-09 15:56:05'),
(47, 5, '<p>Indonesia memiliki luas wilayah yang begitu besar dan memiliki topografi yang beragam. Hal ini menjadikan proses perencanaan dan pembangunan di Indonesia mengalami hambatan, terutama pada wilayah-wilayah yang berada di pedalaman dan sulit dijangkau. Oleh sebab itu, langkah yang bisa dilakukan oleh Indonesia untuk mengatasi permasalahan tersebut adalah ...</p>', '<p>meningkatkan kegiatan patroli keamanan di wilayah perbatasan negara</p>', '<p>memaksimalkan penggunaan SDA di lahan yang mudah dijangkau</p>', '<p>menggunakan teknologi pengindraan jauh untuk mendapatkan informasi wilayah yang sulit dijangkau</p>', '<p>meminta bantuan negara lain untuk membantu pembangunan di Indonesia</p>', 'C', 'Latihan', NULL, '2021-03-09 15:56:54', '2021-03-09 15:57:06'),
(48, 5, '<p>Kebangkitan kekuatan maritim di Indonesia ditandai dengan adanya peristiwa ...</p>', '<p>Deklarasi Bangkok</p>', '<p>Deklarasi Djuanda</p>', '<p>UNCLOS 1978</p>', '<p>Proklamasi Kemerdekaan</p>', 'B', 'Latihan', NULL, '2021-03-09 15:57:45', '2021-03-09 15:57:45'),
(49, 5, '<p>Indonesia memiliki potensi sumber daya laut yang sangat tinggi. Salah satu daerah di Indonesia yang memiliki potensi laut berupa terumbu karang adalah Kabupaten Wakatobi, Sulawesi Tenggara. Jenis kegiatan ekonomi yang cocok dikembangkan di daerah Wakatobi adalah ...</p>', '<p>perdagangan</p>', '<p>peternakan</p>', '<p>perikanan</p>', '<p>perindustrian</p>', 'D', 'Latihan', NULL, '2021-03-09 15:58:22', '2021-03-09 15:58:22'),
(50, 5, '<p>Biosfer berasal dari dua suku kata, yaitu&nbsp;<em>bio&nbsp;</em>dan&nbsp;<em>sphere</em>. Kata&nbsp;<em>bio</em>&nbsp;memiliki arti ...</p>', '<p>tubuh</p>', '<p>lapisan</p>', '<p>bumi</p>', '<p>gambaran</p>', 'A', 'Latihan', NULL, '2021-03-09 15:59:03', '2021-03-09 16:02:27'),
(51, 5, '<p>Perhatikan karakteristik bioma berikut ini:</p>\r\n\r\n<p>(1) Banyak ditemukan di wilayah tropis</p>\r\n\r\n<p>(2) Padang rumput yang diselingi pepohonan yang menyebar</p>\r\n\r\n<p>(3) Curah hujan sedang dan tidak teratur antara 100-150 mm/tahun</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bioma yang memiliki karakteristik yang disebutkan pada soal adalah ...</p>', '<p>tundra</p>', '<p>gurun</p>', '<p>sabana</p>', '<p>hutan musim</p>', 'C', 'Latihan', NULL, '2021-03-09 15:59:58', '2021-03-09 16:03:33'),
(52, 5, '<p>Salah satu faktor yang memengaruhi persebaran flora dan fauna di dunia adalah faktor edafik. Berikut ini unsur-unsur dari faktor edafik yang berpengaruh terhadap persebaran tersebut adalah ...</p>', '<p>kelembaban udara</p>', '<p>kandungan humus</p>', '<p>ketinggian wilayah</p>', '<p>suhu udara</p>', 'B', 'Latihan', NULL, '2021-03-09 16:00:47', '2021-03-09 16:00:47'),
(53, 5, '<p>Perhatikan gambar berikut ini:</p>\r\n\r\n<p><img alt=\"PAS Geografi kelas 11\" src=\"https://www.ruangguru.com/hs-fs/hubfs/Latihan%20Soal%20Penilaian%20Akhir%20Semester%20Geografi%20Kelas%2011%20Tahun%202019.png?width=600&amp;name=Latihan%20Soal%20Penilaian%20Akhir%20Semester%20Geografi%20Kelas%2011%20Tahun%202019.png\" style=\"height:150px; width:425px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tipe fauna yang bertempat tinggal pada wilayah X adalah ...</p>', '<p>australis</p>', '<p>peralihan</p>', '<p>oriental</p>', '<p>neotropik</p>', 'C', 'Latihan', NULL, '2021-03-09 16:02:17', '2021-03-09 16:02:17'),
(54, 5, '<p>Sumber daya alam di dunia terbagi menjadi dua jenis, yaitu sumber daya alam yang dapat diperbarui dan yang tidak dapat diperbarui. Salah satu sumber daya alam yang dapat diperbarui adalah air. Hal ini disebabkan oleh ...</p>', '<p>air mengalami siklus hidrologi</p>', '<p>air dapat diciptakan oleh manusia</p>', '<p>air mengalir dari hulu ke hilir</p>', '<p>air dapat ditampung sehingga tidak akan pernah habis</p>', 'A', 'Latihan', NULL, '2021-03-09 16:03:14', '2021-03-09 16:03:14'),
(55, 5, '<p>Luas terumbu karang di Indonesia mencapai sekitar 18% dari luas terumbu karang di dunia. Fungsi ekologis dari terumbu karang ini adalah ...</p>', '<p>sebagai sumber makanan bagi manusia</p>', '<p>sebagai objek wisata bahari</p>', '<p>sebagai bahan baku perhiasan</p>', '<p>mengurangi hempasan gelombang laut</p>', 'D', 'Latihan', NULL, '2021-03-09 16:04:23', '2021-03-09 16:04:23'),
(56, 6, '<p>jelaskan arti kultur masyarakat</p>', '<p>mengapa</p>', '<p>bagaimana</p>', '<p>penyebab</p>', '<p>alasan</p>', 'B', 'Latihan', NULL, '2022-07-23 20:45:30', '2022-07-23 20:45:30'),
(57, 6, '<p>hjhvjhgh</p>', '<p>hfgr</p>', '<p>gh</p>', '<p>chf</p>', '<p>gyr</p>', 'D', 'Ujian', NULL, '2022-07-23 22:15:36', '2022-07-23 22:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `tugass`
--

CREATE TABLE `tugass` (
  `id` int(11) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugass`
--

INSERT INTO `tugass` (`id`, `mapel_id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 5, 'Tugas 1', 'Cari pengertian dan penjelasan tentang kerak bumi', '2021-02-09 14:28:17', '2021-02-09 14:28:17'),
(2, 6, 'Tugas 1', '-', '2021-02-10 14:25:52', '2021-02-10 14:25:52'),
(3, 8, 'Tugas 1', 'Tugas kelompok memahami makna pancasila', '2021-02-10 14:29:07', '2021-02-10 14:29:07'),
(4, 9, 'Tugas 1', 'Latihan membaca puisi', '2021-02-10 14:30:33', '2021-02-10 14:30:33'),
(5, 5, 'Tugas 2', 'Kumpulkan data tugasnya disini', '2021-03-09 15:08:33', '2021-03-09 15:08:58'),
(8, 6, 'Tugas 2', 'Kultur', '2022-07-23 20:50:55', '2022-07-23 22:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_details`
--

CREATE TABLE `tugas_details` (
  `id` int(11) NOT NULL,
  `tugas_id` int(11) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_details`
--

INSERT INTO `tugas_details` (`id`, `tugas_id`, `user_id`, `link`, `file`, `created_at`, `updated_at`) VALUES
(1, 2, 400, NULL, 'file/absen x ips 1.jpg', '2021-02-11 11:11:33', '2021-02-11 11:11:33'),
(2, 1, 342, NULL, 'file/struktur organisasi.jpg', '2021-02-11 11:15:25', '2021-02-11 11:15:25'),
(3, 4, 342, NULL, 'file/background2.png', '2021-02-11 15:08:10', '2021-02-11 15:08:10'),
(4, 5, 342, NULL, 'file/anum-3 metode.xlsx', '2021-03-09 15:13:47', '2021-03-09 15:13:47'),
(5, 3, 342, NULL, 'file/anum-3 metode.xlsx', '2021-03-09 16:15:34', '2021-03-09 16:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(11) UNSIGNED DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('admin','guru','siswa') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif','pindah') COLLATE utf8_unicode_ci NOT NULL,
  `no_identitas` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kelas_id`, `nama`, `email`, `no_hp`, `password`, `level`, `status`, `no_identitas`, `foto`, `created_at`, `updated_at`) VALUES
(1, 7, 'admin', 'admin@gmail.com', '082282692489', '$2y$10$w2bM/LrXjFGNj.kBflYXO.9YY/7Z9jmHV9CxtSx6uju.i0h5B5oUi', 'admin', 'aktif', NULL, 'foto/man-3.png', '2020-08-28 12:17:03', '2022-07-23 19:52:44'),
(342, 4, 'AGNES NOVITA ANGGRAJNI', 'agnes@gmail.com', '000000000000', '$2y$10$OGYT5zrvFgjccHhuS29NS.brQtbfvZgyIyFrTMrFi3.pYYMy8p9o.', 'siswa', 'aktif', '0045254626', 'foto/Screenshot (2).png', '2021-02-08 17:19:07', '2022-07-23 21:48:15'),
(343, 4, 'ALIEF HAFIDZ ROBBANI', 'siswa2@gmail.com', '000000000000', '$2y$10$Wt3vL2H96ThTpZzk2MlPR.1HU2f1ACQFqMXA7H0gj8fmxiaDdYRFq', 'siswa', 'aktif', '0044467976', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(344, 4, 'Andre Ardika', 'siswa3@gmail.com', '000000000000', '$2y$10$NiDzx8TzSx3upe/Q986zbeE.Tk6KfbICcw6Vu.b1sqI3j6ptNc1AW', 'siswa', 'aktif', '0054703813', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(345, 4, 'Chindy Maulia Vidiana', 'siswa4@gmail.com', '000000000000', '$2y$10$BVG4v8S5tfYlq62HhCm9oOkfHOTVe7j3KVTsbc9KtqFWegHJGHPJK', 'siswa', 'aktif', '0050991731', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(346, 4, 'DESMITA ANGELIN A', 'siswa5@gmail.com', '000000000000', '$2y$10$PvGdY.rPohzhWZLA.23a3OIpn4liwl4RzrDdxSU047Gsx/5SE8p9W', 'siswa', 'aktif', '0061518692', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(347, 4, 'DIFA KHAIRUNNISA', 'siswa6@gmail.com', '000000000000', '$2y$10$hs1zIr6gwzr2FR7A2RD71.UQkf59HguIwrXG.dqnZ7QCb09COaYeK', 'siswa', 'aktif', '0054610381', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(348, 4, 'Dimas Bagas Prasetyo', 'siswa7@gmail.com', '000000000000', '$2y$10$cwx3c1EUS2oyCZL7R8GWh.x3i2RWcUuz9EohnJVp1NJcz057FES3S', 'siswa', 'aktif', '0051029684', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(349, 4, 'EOO SAPUTRA', 'siswa8@gmail.com', '000000000000', '$2y$10$uGseTLrsMhgoDXw5SaEjJun2v48QSz2EcqkpZ0J9MUvZ/zaq3JcuC', 'siswa', 'aktif', '0054031839', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(350, 4, 'Farhan Bayu Syafutra', 'siswa9@gmail.com', '000000000000', '$2y$10$6fd9BDr34bAEcxE/h77KOuLF9EoA3I0w3sCM40OWReS3UeX6WnEka', 'siswa', 'aktif', '0044317475', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(351, 4, 'Fikri Kamil', 'siswa10@gmail.com', '000000000000', '$2y$10$j8wSLBuR/o1T4RW7n8U91.bPU37U6wd/aJ2Ytbs3T/p9TvIdjbNQi', 'siswa', 'aktif', '0059392313', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(352, 4, 'Fiorenzi Natasya', 'siswa11@gmail.com', '000000000000', '$2y$10$kMTlBLWld.PdiZK3yU6Rze.1kK0WzplloKVmP5kChvDQNPVNS7FZC', 'siswa', 'aktif', '0051950092', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(353, 4, 'Laura Sausan Lie', 'siswa12@gmail.com', '000000000000', '$2y$10$hBSKRJ8.7X5iLSviHBHg2efQCotcTGoWhaWP9o2SU.gtAtgIUBTlm', 'siswa', 'aktif', '0051937748', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(354, 4, 'M Naufal Syahputra', 'siswa13@gmail.com', '000000000000', '$2y$10$jw2zvS8R3TYhuYh3cmTF6ugB4zCEtZrgg6fLibZT6oPUCxDfrkDWG', 'siswa', 'aktif', '0046059429', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(355, 4, 'M ROYHAN FEBRlANSYAH', 'siswa14@gmail.com', '000000000000', '$2y$10$1F8LLKIhxM/FzeGbabq4NO889KdGu18RcGRQBLnFuUxkfcAhvDiZG', 'siswa', 'aktif', '0052756095', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(356, 4, 'MEYKY PUTRA UTAMA', 'siswa15@gmail.com', '000000000000', '$2y$10$A0hEwq26.F64ag7tkfuWyeckiexQ8YrOkmMClW5ZqVageJsFVJ7Gu', 'siswa', 'aktif', '0063792994', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(357, 4, 'Nabila lndah Safitri', 'siswa16@gmail.com', '000000000000', '$2y$10$D/8MDELGjQFYvU4.Ys9Xce7UBHSA95/1sdDlih//JVG4Jel80xRqe', 'siswa', 'aktif', '0059896697', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(358, 4, 'Michael Christofel Harungguan Sianipa', 'siswa17@gmail.com', '000000000000', '$2y$10$4yu9G9zVaPYR3PqXJyKpuunPV6HMDuPM862GuyPTpYkvj46KkbAia', 'siswa', 'aktif', '0052672121', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(359, 4, 'MOCHAMMAD RIVA FIRDAUS', 'siswa18@gmail.com', '000000000000', '$2y$10$t4azHRGAUzi80Rt5qSv7DOc4rkthnGs8Bgw.QPnfj0Oemq5D3qhBm', 'siswa', 'aktif', '0066476430', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(360, 4, 'Muhammad Salman Afrizal', 'siswa19@gmail.com', '000000000000', '$2y$10$8A.hrJNUpferhMzYCO/9xOmunHx5z4FCPekhRsuZ2TETrHSz4aJJO', 'siswa', 'aktif', '003052280604', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(361, 4, 'Rahrni Priani', 'siswa20@gmail.com', '000000000000', '$2y$10$Hu7wDayMbsWtiiZv99p9UudlKHxiQYPm.Fmrj8W9/IIXiLOBRV2Iq', 'siswa', 'aktif', '0057513793', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(362, 4, 'Rais Hakim Latifadran', 'siswa21@gmail.com', '000000000000', '$2y$10$KaXx8maQZEtFg3xmA6B2GuytF3fyahNQWtdwDy8I2VQZu8YqIeGAu', 'siswa', 'aktif', '0054645280', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(363, 4, 'RANGGA DERI FADILAH', 'siswa22@gmail.com', '000000000000', '$2y$10$ZhUL/CRxw9qUfzjrKm/a6eW/HymLTUQnX8tKmqW94DDwMqv1/i0Zm', 'siswa', 'aktif', '0043666646', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(364, 4, 'REVAN NOVERDI', 'siswa23@gmail.com', '000000000000', '$2y$10$R2FNmUbiUxiZDfg4zebbkOqQneWW/0.uFCRUNtVN5xjpzs686auo6', 'siswa', 'aktif', '0051955249', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(365, 4, 'ROSA AMELIA', 'siswa24@gmail.com', '000000000000', '$2y$10$3gAnBeXoz.i/c.NPbAO52etjsCGrr9dwk8LxArDVKzZkT8ekaABGC', 'siswa', 'aktif', '0051471394', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(366, 4, 'Salwa Khairatunnisa', 'siswa25@gmail.com', '000000000000', '$2y$10$Gm8Usj9NmuaioyBBFGX88eWtt8ZRMoaFk9JasIJ/fq3j.7mzQxSNa', 'siswa', 'aktif', '003069843443', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(367, 4, 'Slamet Noven Vrediraya', 'siswa26@gmail.com', '000000000000', '$2y$10$epZBRbESKsac8kerPlQEuOnQQ6CmUQ1TPZHS1A.MKF/DZNIkCN9Vy', 'siswa', 'aktif', '0045720217', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(368, 4, 'Swasti Hanafiah Sukma', 'siswa27@gmail.com', '000000000000', '$2y$10$5mhNvUgQKi2zSp2UG13baOmHdSeUvyYx4Ac1aAKWPxBXJY8zMtrme', 'siswa', 'aktif', '0050991669', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(369, 4, 'TIURMA TAMBA', 'siswa28@gmail.com', '000000000000', '$2y$10$UckdeZu62qklvPT2ci1XUejsVofi2Wtt0pEU2iX8MRhC5lHXe0Frq', 'siswa', 'aktif', '0041238793', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(370, NULL, 'ADAM ZUHRI RAMADHAN', 'siswa29@gmail.com', '000000000000', '$2y$10$9NKj15iy26TFIPmjh6rUEewYo.w7nLhxa.tItV4kPItNpCBUDCN06', 'siswa', 'aktif', '0050932717', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(371, NULL, 'Ade Putra', 'siswa30@gmail.com', '000000000000', '$2y$10$uIfJtCO/ifDcdJP2SorZ/eBStgF1bbSaUSfIoyx.65V7Ev83hQ3jG', 'siswa', 'aktif', '0021086100', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(372, NULL, 'AFlNA BETA ROSADA', 'siswa31@gmail.com', '000000000000', '$2y$10$sq4qGtMgVHKm66yA4lTsregUQKnxgNIyJ/R0DYOpi4Hx90hyhJU6i', 'siswa', 'aktif', '0051282882', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(373, NULL, 'Ahmad Dz.akki Nafiis Naaifah', 'siswa32@gmail.com', '000000000000', '$2y$10$g02d4Nej0PwBBNpIi4iyDO7itNK22VoYfjcx8bdGHLT5qTNaGEMNa', 'siswa', 'aktif', '0051366896', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(374, NULL, 'Arif Ananda Budi Utama', 'siswa33@gmail.com', '000000000000', '$2y$10$F2lYWonn0IaERLNlMt4gSedm9MfccUkZ8wWgSsmePdUs4m5cTCbIy', 'siswa', 'aktif', '0042676406', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(375, NULL, 'BESSEK HAFIZOHTUL ADAWIYAH', 'siswa34@gmail.com', '000000000000', '$2y$10$hm3rQMjKj0oaheoBvfySme3YkEbdeRqChZKiGTtydQlty7UoLzG6y', 'siswa', 'aktif', '0050992020', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(376, NULL, 'BETA THERESIA', 'siswa35@gmail.com', '000000000000', '$2y$10$ZXWRyRvI56A5i9psVpr.HO8aLzF7ATV/ear7UXCTK2X8IyGRdjiKm', 'siswa', 'aktif', '0051591405', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(377, NULL, 'DAWAR DIANA', 'siswa36@gmail.com', '000000000000', '$2y$10$oARUuIshBIZC0WwHPta0y.ybImSGVXa.bo/m2xxDgoeNHRw4/w0/C', 'siswa', 'aktif', '0058467652', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(378, NULL, 'Defara Oda Raluna Aldora', 'siswa37@gmail.com', '000000000000', '$2y$10$Dd2Kf3yISZxKg4sn2Y8yPemcmTYNbQHRPWlVtzToxZm2N7N9THo.e', 'siswa', 'aktif', '0051254039', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(379, NULL, 'Fauzil Adhim lnnaka Kunta Rahmadta', 'siswa38@gmail.com', '000000000000', '$2y$10$ZrwcyD/g3MM0zOvf.1Zm5utW/h/GqGuiKbJL.p5Q4RzSca9WQU4Ri', 'siswa', 'aktif', '0058067135', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(380, NULL, 'Ferdy Rahmatul Jannah', 'siswa39@gmail.com', '000000000000', '$2y$10$07NEgKmWEKHYVpM45EglC.n3182cSpuq2CEOtAqifx9uEWFdXQTMe', 'siswa', 'aktif', '0060173347', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(381, NULL, 'Gita Florensia Enjeli', 'siswa40@gmail.com', '000000000000', '$2y$10$KodH5l8zEzMAJQf2osaMcuxGzZIIs034fvI7P/hjZIijL8qg7GHh2', 'siswa', 'aktif', '0052553351', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(382, NULL, 'JENIKA HELENDA', 'siswa41@gmail.com', '000000000000', '$2y$10$Bu4v6VrwMlpWM6Jf.iP86.8NYTkpwAwrNUKXLVmPgh6lqssO0QPcW', 'siswa', 'aktif', '0051916714', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(383, NULL, 'Jihan Naura', 'siswa42@gmail.com', '000000000000', '$2y$10$gAlK2sRPZZooWIZjhlSq2.rIgHX2FiXYrwn00r1l5kolkB7SVj1le', 'siswa', 'aktif', '0051295500', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(384, NULL, 'Joseph Dionysius Manullang', 'siswa43@gmail.com', '000000000000', '$2y$10$CZQlB6hgbcKE6PPLXcjNq.flsuugWi0Z48gEy4xmXICuTiGocnvYW', 'siswa', 'aktif', '0046195182', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(385, NULL, 'Marselina Novianti', 'siswa44@gmail.com', '000000000000', '$2y$10$f48/5rxwVqOvRcj6iJZpuOPUQstqzrX4/WRQ75zCbxUCNF1DQgfZG', 'siswa', 'aktif', '0057898037', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(386, NULL, 'Muthiah Salma H', 'siswa45@gmail.com', '000000000000', '$2y$10$el4UVeWsZ6AYacOv2M/X8OL9MXgvfcf1IdjeX3lYgSPE7ShE9XmnC', 'siswa', 'aktif', '0053813678', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(387, NULL, 'Nabila Saskia', 'siswa46@gmail.com', '000000000000', '$2y$10$L7OhKPAkmSSQR/96dHUwwe1L7pAPqlcf24fw4nlHw4K/3HDQLwXz6', 'siswa', 'aktif', '0052878365', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(388, NULL, 'NAYLA  SARI RAMADHANIA', 'siswa47@gmail.com', '000000000000', '$2y$10$uZ1MDLGcySpIw.eSgynrM.q.1DadwCc6qon8hbn3B1UeqIpOM9c0W', 'siswa', 'aktif', '0050992052', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(389, NULL, 'NIKEN PEBRIANTI', 'siswa48@gmail.com', '000000000000', '$2y$10$ZHb9lO975juES/VlRiIfuuXrEc9m4LbBV5l0fq5vK/PWk245OMtaa', 'siswa', 'aktif', '0052175856', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(390, NULL, 'Pradinda Wulandari', 'siswa49@gmail.com', '000000000000', '$2y$10$s8ODupsaR3wJbn0c2O0yieluVYwiWrA9DMsB.H5ur809LbOQc8Kw2', 'siswa', 'aktif', '0041776060', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(391, NULL, 'PUTERI  AMANDA', 'siswa50@gmail.com', '000000000000', '$2y$10$wtYR6JTbBz1v.g6XJ39Y5epDbFRmnFJYV9fEioMCdtV/vgk1bRNKa', 'siswa', 'aktif', '0050992066', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(392, NULL, 'Radatul Mawardah', 'siswa51@gmail.com', '000000000000', '$2y$10$3jV/30LfezpSZVDAWVzSzOSMOt3d2hR8A9rXcvuoEv9VyvvMD5Kr6', 'siswa', 'aktif', '0052230570', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(393, NULL, 'RAKA SHIWIE D\'AMORE FIRDAUS', 'siswa52@gmail.com', '000000000000', '$2y$10$n5BbogMT5TZp6nLtHWzN1uKgcNyUYJVKsgpSd6qeYLK3RM4kzHvpG', 'siswa', 'aktif', '0050992036', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(394, NULL, 'Riski Febri Diana', 'siswa53@gmail.com', '000000000000', '$2y$10$C7sh3ENMR6yIad28pF6Y0OW2BWm91MzV4oksrm91C5kZYf51bTpx.', 'siswa', 'aktif', '00-', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(395, NULL, 'SALWA ANANDA', 'siswa54@gmail.com', '000000000000', '$2y$10$t/GpTKTfWbS4UaeITE/iJu7AB0spAfr.9S7cCGnyfWP4jSHTcsKX6', 'siswa', 'aktif', '0065822717', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(396, NULL, 'Syifa Khoirunnisa', 'siswa55@gmail.com', '000000000000', '$2y$10$SwQMMYc0A.PudQHvtV7KC.pi/SmeEe5No5sVdepK9sthFL6UZh6bC', 'siswa', 'aktif', '0051472799', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(397, NULL, 'Tiara Nabila Wijaya', 'siswa56@gmail.com', '000000000000', '$2y$10$Q1L16RpMOhLp1ZuyfpXpMuHbaEdNsjTzKJNKgXl05WEv7c5tTrIsC', 'siswa', 'aktif', '0055306128', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(398, NULL, 'WANDIANSYAH', 'siswa57@gmail.com', '000000000000', '$2y$10$qkMimcGYhqw7YpWCcP50EOSDP2pGrdgEoixR0ZZFE13aFZ1YiWXDS', 'siswa', 'aktif', '0059329734', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(399, NULL, 'Yesika Zennetti Simanjuntak', 'siswa58@gmail.com', '000000000000', '$2y$10$HHE6Xzgi2b65a5XgOeEK0.aThNuF9VmFiw./GiqbXtWVnYYn.kXFy', 'siswa', 'aktif', '0053547192', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(400, 11, 'Alya Gunawan', 'siswa59@gmail.com', '000000000000', '$2y$10$s6k1DSBC.k8XYJB0b8nrmuC5KNk1YYDGx6lTJXtT8CsWECqjaU.U2', 'siswa', 'aktif', '0043279103', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(401, 11, 'Amelia Stephani Marpaung', 'siswa60@gmail.com', '000000000000', '$2y$10$l5Tn38P33yDGF0UYAbb13uFwiov7W8BsR0BfpMR7ABDZukWEmW6rO', 'siswa', 'aktif', '0041276152', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(402, 11, 'ANDI HERAWATI', 'siswa61@gmail.com', '000000000000', '$2y$10$t8LqdVxtUNYCoYM9CVBVHe.KE4Q7uz6baX9f77faYkXflLS8uYhle', 'siswa', 'aktif', '0035117632', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(403, 11, 'ANGGIA JELITA', 'siswa62@gmail.com', '000000000000', '$2y$10$m0IM8Pfj1C8HewAcy8IhKe5Cp/lApyDVDmqAU.J6ogqlsUjemHnXm', 'siswa', 'aktif', '0040816678', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(404, 11, 'arya candra kanta iswandi', 'siswa63@gmail.com', '000000000000', '$2y$10$FjuROEZivsIUdRDDbvuOBOLLXJSc3Cq4mJtVvXTsMfUrOjWBzXDYC', 'siswa', 'aktif', '0057464283', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(405, 11, 'Azhi Ridho Al Qowi', 'siswa64@gmail.com', '000000000000', '$2y$10$od8d5jtwHGuxVt.chNyWoOPNKyD2M8SkDayNjbILpTKYaYrbbyIHe', 'siswa', 'aktif', '0027912421', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(406, 11, 'Dea Ananda Putri', 'siswa65@gmail.com', '000000000000', '$2y$10$lN0g4Bk/LLrzav8tR7NmC.3fa8wWbPwt3Sy76AoV2ACGzWMVhw01O', 'siswa', 'aktif', '0040816767', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(407, 11, 'Deasy Triana', 'siswa66@gmail.com', '000000000000', '$2y$10$o2LCBQENWPcUmP3K5UkrauM8DZPX0BMGFsHrYK.aC3u7f6SEkwDUK', 'siswa', 'aktif', '0044492974', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(408, 11, 'Denada Aura', 'siswa67@gmail.com', '000000000000', '$2y$10$hNIGOZ3DarbP/KJzp8BZWesbs.T02JlJsTb56fSXRSotOVUJ4OwxW', 'siswa', 'aktif', '0041733110', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(409, 11, 'Dini Amelia Puteri', 'siswa68@gmail.com', '000000000000', '$2y$10$YBVANq5JE2YXQEX3SafHmusQxHT1jN57xU8DyC5NVs9dyJnUfJ4ae', 'siswa', 'aktif', '0042676234', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(410, 11, 'DOLI KURNIAWAN RAMBE', 'siswa69@gmail.com', '000000000000', '$2y$10$9Fam/oxbD3TnioLCjH6ro.hKS6lyLLS5vO0S8.tiKaNj/u.NVtBcm', 'siswa', 'aktif', '0042078571', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(411, 11, 'DWI PRIHATINI', 'siswa70@gmail.com', '000000000000', '$2y$10$2dV8yOV1JFHiJLebmE8SlO0LC8FjggsZQuaYCoH6G2F9BBX.OvZfG', 'siswa', 'aktif', '0043266274', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(412, 11, 'ENJELIKA', 'siswa71@gmail.com', '000000000000', '$2y$10$mUQP/Oq76EgHft/C7hRJWec/jGQk/8GjzKENXnZYkkNJf9XKHKlj6', 'siswa', 'aktif', '0036098481', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(413, 11, 'EVITA SARI', 'siswa72@gmail.com', '000000000000', '$2y$10$4EzI4S7pXbMADWQyb4V5zubJcs7hyxJelLkEMy8cvIFjr9rvcHiXO', 'siswa', 'aktif', '0040737596', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(414, 11, 'FADILA ANNAS APRIZA', 'siswa73@gmail.com', '000000000000', '$2y$10$IfUViSUJlr1ii9.WX.kMUea5PyGc13WiLHoNEen5UlimVLRWxoplS', 'siswa', 'aktif', '0040818300', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(415, 11, 'FEBY EMINATA SUKMA', 'siswa74@gmail.com', '000000000000', '$2y$10$Jq5DoAdt4/.itT6ISk5NKeQVtTg4YVL3hSgB0XQf/sSEnR6uDvZtG', 'siswa', 'aktif', '0040932275', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(416, 11, 'GLADYS TISHA SUSANTI LAIA', 'siswa75@gmail.com', '000000000000', '$2y$10$cCshu7NPU3OmjMhUyb2.HOmXYIkLQkNVupukU2smkCstOlBVPPHxa', 'siswa', 'aktif', '0044398320', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(417, 11, 'Haycal Zikri Ramdany', 'siswa76@gmail.com', '000000000000', '$2y$10$5hEQJ2XUGdHqjDLY2D83eOABnInFVT4BA9Ll5NE2R06WOKR6vB/IS', 'siswa', 'aktif', '0031819228', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(418, 11, 'HEGEL SEPTI AJI KUSWOYO', 'siswa77@gmail.com', '000000000000', '$2y$10$YsX6NAoRJAgYLFoEAhfLMOGvM0qPRSJH9AnFdvTn.t1HYI0CCtN5u', 'siswa', 'aktif', '0039922248', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(419, 11, 'HESTISIAHAAN', 'siswa78@gmail.com', '000000000000', '$2y$10$6XpD.imrE.q5FVmh6TEERO4.4J02TkYTW51rW9evgXW36IwCfMw7u', 'siswa', 'aktif', '0039662528', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(420, 11, 'Ica Septiani', 'siswa79@gmail.com', '000000000000', '$2y$10$vEF89gvsWPuZpSG34zvLz.mRJaZpw2j8ywDVmH7J5hSD4rf2toqqi', 'siswa', 'aktif', '0041368570', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(421, 11, 'Indah Arum Sekar Wangi', 'siswa80@gmail.com', '000000000000', '$2y$10$ubM1gpHmiX0ldoxuoQe20.4qDYrA44Hksgdt65REnMSWaX5W.IfEe', 'siswa', 'aktif', '0036072759', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(422, 11, 'INDHANG AYU AGUSTINA', 'siswa81@gmail.com', '000000000000', '$2y$10$pTSIZYVzqZ8tWD7gGsJPKOZla3gYduJZzW0.0pmQZt6GvR1YLAE.C', 'siswa', 'aktif', '0044420567', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(423, 11, 'IWAN DANIEL SIDABUTAR', 'siswa82@gmail.com', '000000000000', '$2y$10$rEl6DdLQvpGGHUAgmn/OjewnPZ33AekC9UDP21f3gQXKCP4Hww1QW', 'siswa', 'aktif', '0027384768', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(424, 11, 'M. AKBAR', 'siswa83@gmail.com', '000000000000', '$2y$10$DDb7Z0wwz8WZw8SUPqxY8.CFagwAzH7nWVYVC7khBCgD6TaQUhDG.', 'siswa', 'aktif', '0024036120', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(425, 11, 'M.Rifky Olanda Ramadhan', 'siswa84@gmail.com', '000000000000', '$2y$10$tOsWKYRuFj2fVu/EHliVH.1dbiDeukuWvjIBfveIHhWLAfRmduFJS', 'siswa', 'aktif', '0043623978', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(426, 11, 'MARIA NAINGGOLAN', 'siswa85@gmail.com', '000000000000', '$2y$10$9.OU5kUC9dG1CusQxNeXke6G64fnQqRtdMdVHlU2k72GLz/gwvNWy', 'siswa', 'aktif', '0035385015', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(427, 11, 'MUHAMMAD FAHRI S', 'siswa86@gmail.com', '000000000000', '$2y$10$0q7hZAOPNORqNlEYwRMkCeFgZ0wdPDLDrP160RS2P/2WLEm/vsQjy', 'siswa', 'aktif', '0044432092', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(428, 11, 'Muhammad Haikal', 'siswa87@gmail.com', '000000000000', '$2y$10$BY9r5NJrt80l8UzwP2Bxt.vlxXRcMIdCQZtKg3nuectJHLdCPW3Si', 'siswa', 'aktif', '0045368200', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(429, 11, 'Muhammad Lufhi Aldero', 'siswa88@gmail.com', '000000000000', '$2y$10$816H1wbrbiFxxARaq6CV9ONOwKHz5RB28mLm2bwYrNWvYjEE9gjKC', 'siswa', 'aktif', '0041515832', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(430, 11, 'MUHAMMAD ROMI ZALIANDRA', 'siswa89@gmail.com', '000000000000', '$2y$10$TmiCUZKG0vXoF4s4Fp8qFu2S3S9BO.b9xTyY7NSmPDIECZOFnQjBG', 'siswa', 'aktif', '0046273169', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(431, 11, 'NANDO DIO SPINTE', 'siswa90@gmail.com', '000000000000', '$2y$10$2WB.vwiHzYv18EcF2yn2yepUoSYzoSWpUtVm7lc/CZQhl79qcpG4G', 'siswa', 'aktif', '0046319880', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(432, 11, 'Putri Rahmadani Permata Sari', 'siswa91@gmail.com', '000000000000', '$2y$10$OL0NY68t8C6AN/MioPSJHesqZwRLUmG0qVa2P333oYoPYo17jhLma', 'siswa', 'aktif', '0042671992', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(433, 11, 'Rahmat Nur Ridho', 'siswa92@gmail.com', '000000000000', '$2y$10$t948TTemNwMev/QBN6xgF.0xKI8s37HB/H7UmXI5rmCKRpKDF4Zjq', 'siswa', 'aktif', '0040459747', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(434, 11, 'Siti Ilhamiyah Damayanti', 'siswa93@gmail.com', '000000000000', '$2y$10$nriuUHb9kt033I8lhdeeMO1c3kfY.fljBzLfuBt82QvOjfTTOSp4W', 'siswa', 'aktif', '003038945171', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(435, 11, 'Vicky Frantino', 'siswa94@gmail.com', '000000000000', '$2y$10$w5ShhjN/g.WnfSIpmDDrfORtueKKEHH77hfaDdV6yGoDql0Y5z7Oi', 'siswa', 'aktif', '0036454402', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(436, 7, 'ADELA RAHAYU', 'siswa95@gmail.com', '000000000000', '$2y$10$XLXxFrYed64549O4Q9pM9OE5Ym3Ebysz7R8cVlPZ9XuqSSkSQdSIu', 'siswa', 'aktif', '0042752793', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(437, 7, 'Alifa Indah Cahyani', 'siswa96@gmail.com', '000000000000', '$2y$10$Qg26RqMJHeWG2GGfyzqz2ON4NKsb/N7odNJh7eOhfkyr.yu7wt1Gm', 'siswa', 'aktif', '0040995025', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(438, 7, 'Angelica', 'siswa97@gmail.com', '000000000000', '$2y$10$Tt9AHYPqUb1FVNew06gqveWAaMKbvJXSSqoiSgzYqTUWuEeJOagNe', 'siswa', 'aktif', '0042676412', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(439, 7, 'Azratul Jannah', 'siswa98@gmail.com', '000000000000', '$2y$10$fx7.RYyuFp4BPGQoqJjq5enJOckBBaBj7h5TOrdMAblxiRlT4nVdi', 'siswa', 'aktif', '0041174405', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(440, 7, 'Calvin Valentino Hariyanto', 'siswa99@gmail.com', '000000000000', '$2y$10$Kpz8.qe/JrDGhT92nQx/Ze0LXdFq8B7ftcTEOkqcARt9ZLSTkK2AW', 'siswa', 'aktif', '0044273151', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(441, 7, 'DEVINDA INKA PUTRI', 'siswa100@gmail.com', '000000000000', '$2y$10$yB556i26cxh/FGUQel5.teWCXYMNKcX7CX/.jWCcgzgyzh46X1elS', 'siswa', 'aktif', '0042352407', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(442, 7, 'Dianty Ramadhanis Camarochmi', 'siswa101@gmail.com', '000000000000', '$2y$10$dLZDt5daPmCLPF.dubP9mORtQHvmjvk1q/yIFzIeYvSZZJnXjmyAS', 'siswa', 'aktif', '0041318905', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(443, 7, 'DIMAS PRASETIO ARDI', 'siswa102@gmail.com', '000000000000', '$2y$10$iciU8h6x6KLVPzXPibqyt.MaovZhlFVlswL0SxO/HjiG9z7aylUAS', 'siswa', 'aktif', '0041319433', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(444, 7, 'Dinar Ramadhani', 'siswa103@gmail.com', '000000000000', '$2y$10$tGVraJIat2Y2733bDEu6JODxhguU/a5t22xuHOFtz4/uWMDZTqLai', 'siswa', 'aktif', '0042352402', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(445, 7, 'ENDRU SILALAHI', 'siswa104@gmail.com', '000000000000', '$2y$10$eM4d3BLSNRTs50gxQxvvBuzy1gVzg676NhehZnRRI5/gPd4XPZbJe', 'siswa', 'aktif', '0040816739', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(446, 7, 'Febrio Ardiansyah', 'siswa105@gmail.com', '000000000000', '$2y$10$z1hzD/vENhYCGnXsIeptYORKO7iV0auS9NXH0QMtx6rxAAoTGRpx.', 'siswa', 'aktif', '0040994995', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(447, 7, 'Fidini Tasya Innaka Sianipar', 'siswa106@gmail.com', '000000000000', '$2y$10$XGVPX75hKEpgcwWPXeb/auc53nZW3kKDPq3W2dFch/F97bOyDu9a2', 'siswa', 'aktif', '0043431497', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(448, 7, 'Jessica Maranatha Tambun', 'siswa107@gmail.com', '000000000000', '$2y$10$G5DBe0CtCBu1gOuQOfi2C.JFAdUF3HfN.rGW.eAhoiwlm7qOTBeWO', 'siswa', 'aktif', '0042992921', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(449, 7, 'JUWITA SHINTA MORA SAGALA', 'siswa108@gmail.com', '000000000000', '$2y$10$iqrayrih50gIdj/kulJhg.O049XoE5MbzDvwGV1QiEfreGwcYQebq', 'siswa', 'aktif', '0043569647', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(450, 7, 'Khaza Echy Fransiska', 'siswa109@gmail.com', '000000000000', '$2y$10$nnYYwnHUv21agXn7c0SsSeccB6KxsFayJTI.mn89kcwXjlUXdMYza', 'siswa', 'aktif', '0043474459', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(451, 7, 'LATHIFA NAJWA', 'siswa110@gmail.com', '000000000000', '$2y$10$dhQP5r6C9WbMHtECbNfDxO5KZqz0n2FtlPiNueNF3f34xKN3TzPZS', 'siswa', 'aktif', '0041033420', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(452, 7, 'M. Al-Fadli', 'siswa111@gmail.com', '000000000000', '$2y$10$IovYiKM/jD7DYJI5mcZT5ejFotVf/3BCFeHv23hNqmjC9ulMotvF2', 'siswa', 'aktif', '0040932301', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(453, 7, 'M.Surya Dharma Khazinatul Azror', 'siswa112@gmail.com', '000000000000', '$2y$10$Cr4TR/giKI9/etsGYABHlerif/4JHqgMcZrm43XBzHl1Gue6wXKTq', 'siswa', 'aktif', '0056032242', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(454, 7, 'Muhamad Farhan Ali', 'siswa113@gmail.com', '000000000000', '$2y$10$sjq3Mhxh87ua77BD0Rlgae2LLkds8pq1ZraNcYu8dj/iPFZnEWznW', 'siswa', 'aktif', '0041318609', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(455, 7, 'Muhammad Audrie Avandra', 'siswa114@gmail.com', '000000000000', '$2y$10$a7dYuSJvasT/BKSH0vkJwuSBeIkepKNxvfE/k3HWuSEx0ArD1PMKy', 'siswa', 'aktif', '0048705219', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(456, 7, 'Muhammad Irfan Trinugroho', 'siswa115@gmail.com', '000000000000', '$2y$10$ERRgYEkoo60Qpf.Wp/.y5.FsKnNF5DT9xpwB4OmjMWQgYi15NqRd.', 'siswa', 'aktif', '0035305520', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(457, 7, 'MUHAMMADSYAFIQ ABRAR HARAHAP', 'siswa116@gmail.com', '000000000000', '$2y$10$y5md7DyMwh.j4sV4xFYvfeyW4Sg1CaynlBzmV2sIHoTPws/2s94H.', 'siswa', 'aktif', '0043271378', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(458, 7, 'MUHAMMAD ZIDANUL IHSAN', 'siswa117@gmail.com', '000000000000', '$2y$10$KjBMVAEIoMoSTsCdo.VCcOEqRr0.UKBqFt85H9ExAZdyVIARaAXXu', 'siswa', 'aktif', '0044609074', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(459, 7, 'NANDA ARDANI HIDAYATULLAH', 'siswa118@gmail.com', '000000000000', '$2y$10$96M6lrb5MBeLX16cZPliWOLjfEhUz/TiqQrGjd6rixxm5MPuVwgmS', 'siswa', 'aktif', '0043416712', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(460, 7, 'RAFINAS SALSABILA NUR AZIZAH', 'siswa119@gmail.com', '000000000000', '$2y$10$YzgtRslL9Fw.pBGYn8iaeugkrWBj8zbUP8bXoKPnKftqiTVXn7QZm', 'siswa', 'aktif', '0035270204', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(461, 7, 'Reyhan Hadi Putra', 'siswa120@gmail.com', '000000000000', '$2y$10$PUrO6IufmK954lxQpH3uJOd7UgA0DAQblQTNFXgVpiQGiVGtEKVGa', 'siswa', 'aktif', '0038216379', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(462, 7, 'Tresia Br Tumorang', 'siswa121@gmail.com', '000000000000', '$2y$10$MOR4T9oc6GGwsIYL0jgmI.I2Op6TUmmZA6WqhKYCDGLsCc9COwMxm', 'siswa', 'aktif', '0043068767', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(463, 7, 'Vasya Falia Anandian', 'siswa122@gmail.com', '000000000000', '$2y$10$UAfIgp46g9dSg48MySW0eeab9/JSaGLQqCPYXyFTpqDpKxX92lgrO', 'siswa', 'aktif', '0041333730', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(464, 7, 'Vichra Yodza Iswenanda', 'siswa123@gmail.com', '000000000000', '$2y$10$DguVORChdtDtFkj.R6LthOAfQszDNPrQDMl.8OKEnQtWj8Sj8kmDy', 'siswa', 'aktif', '0041318270', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(465, 7, 'VIRA NINA LOLITA', 'siswa124@gmail.com', '000000000000', '$2y$10$do1uRiJjJ71IFpggZHY4te.EnicUY4mNbV1tYT1YE039BGKvRMvoS', 'siswa', 'aktif', '0041611168', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(466, 17, 'ALFATH RISQULLAH', 'siswa125@gmail.com', '000000000000', '$2y$10$spqPLdTBV4MqdU7/Lid1Zu7rRn4CYONu/mqtJDyHUQBB9uVPgMo7y', 'siswa', 'aktif', '0040150131', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(467, 17, 'ANDREAN SEMBIRING', 'siswa126@gmail.com', '000000000000', '$2y$10$X0UsTqI0Am2FRJFrTt/wzuNhAIHlhKQssc/oS7nXnUiukY9kfU6Ee', 'siswa', 'aktif', '0031334416', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(468, 17, 'ANDREAS FAJAR SIMANUNGKALIT', 'siswa127@gmail.com', '000000000000', '$2y$10$OtKi4e9gM84R9LTJjXszB.Vu2OHY.eScF9bspgP9ogpverTWx7Ky6', 'siswa', 'aktif', '0036369773', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(469, 17, 'ANGGELINA SANTA SITANGGANG', 'siswa128@gmail.com', '000000000000', '$2y$10$1CQKxfh/G6TfR58Y9QKCIeVX20R9TP30BQMkhmTCc1layc3jwIRWC', 'siswa', 'aktif', '0023140003', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(470, 17, 'Angger Pratama', 'siswa129@gmail.com', '000000000000', '$2y$10$jKHvmsausLz7trpBfwnAQONlAFwDC8R2DmDrwiKMWvFV9YEMzGyfy', 'siswa', 'aktif', '0030815526', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(471, 17, 'Aryo Indra Syaputra', 'siswa130@gmail.com', '000000000000', '$2y$10$3lh9YFAf1MEMkhiyHMlEcej3u4uTj7h3SdaCj0xaqXM4FRXEcXxqG', 'siswa', 'aktif', '0034434846', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(472, 17, 'BAYU SATRIA', 'siswa131@gmail.com', '000000000000', '$2y$10$0HgkYAjABOPgpPRT28Ceue7OToSTGYPW936QPdqBAiNmvNgnHgvzW', 'siswa', 'aktif', '0021153121', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(473, 17, 'Devi Aprianti', 'siswa132@gmail.com', '000000000000', '$2y$10$xcpMEM2ZOHJGarmgfx8..uc0AfxFlwvqD.nBfasqVWtlSHm6JFfWm', 'siswa', 'aktif', '0021038773', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(474, 17, 'DIO ANUGRAH', 'siswa133@gmail.com', '000000000000', '$2y$10$CMCjhA/WNPESdvyGMCgtsuw8wIfK5sUGtiuZnsPmWDdT6InKwyTKK', 'siswa', 'aktif', '0018097721', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(475, 17, 'Disriani', 'siswa134@gmail.com', '000000000000', '$2y$10$/0F5xW/HdZUq6nDuXc8R8e9UkkshWZekh26ElGbiAayM1MON3lzeK', 'siswa', 'aktif', '0037549491', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(476, 17, 'DWI FEBRIAN PUTRA', 'siswa135@gmail.com', '000000000000', '$2y$10$cpzilNoxnKdnQy17NYdJaOMhgk5COzfjftp7/RlzQ/xVKEG65CSqO', 'siswa', 'aktif', '0017548250', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(477, 17, 'ELVARA CHARANI', 'siswa136@gmail.com', '000000000000', '$2y$10$hU4RlYN7vK4x.yI7i9Dku.b/8/5QxXOM2Qpxxei1SL5XeOENtsK.O', 'siswa', 'aktif', '0030996423', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(478, 17, 'Erhan Romadhan', 'siswa137@gmail.com', '000000000000', '$2y$10$vCQ3Knws7.2x5h8GLBgo2un5tAuMHpMTcztj7Gnu6msXhGsntjDjq', 'siswa', 'aktif', '0034650120', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(479, 17, 'ERIKA WAHYUNI', 'siswa138@gmail.com', '000000000000', '$2y$10$ttaYll/zWyfxp4epW5KTDeh1El16w1dRB60t0vQGdBFlMO7Ze39DO', 'siswa', 'aktif', '0031731137', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(480, 17, 'FENI APRILLIANI', 'siswa139@gmail.com', '000000000000', '$2y$10$6uvJsO3fK/J/0ZJ5RB9yueiVUbpiBslWSMuiGbImSie92jm5oxeeO', 'siswa', 'aktif', '0032863997', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(481, 17, 'GALIH TRI SUTISNO', 'siswa140@gmail.com', '000000000000', '$2y$10$Bjo5ElUuvSJfM3/UIwR9oeuhB9xwUml1WyJFDZ9zHz85ewemMfmOS', 'siswa', 'aktif', '0038728878', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(482, 17, 'Irfan Chandra', 'siswa141@gmail.com', '000000000000', '$2y$10$lvuZesDpL6wWzh7ginkET.pmvwarrAwdQNk4Ns/j0ywtCxupPLg3S', 'siswa', 'aktif', '0032171603', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(483, 17, 'KANAYA THOHIRATUM MUAKHIRAH', 'siswa142@gmail.com', '000000000000', '$2y$10$7f4QSRO536OKIb5CCAiVeeuFGX60mZXyah4rk2x.JwPayFjls6r0C', 'siswa', 'aktif', '0033567177', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(484, 17, 'Liska Oktaviani', 'siswa143@gmail.com', '000000000000', '$2y$10$TCEe1WzN.Gquhz6qEeWOX.BwPkdAeo22PBdQ4xsW6DarAexEhtYyK', 'siswa', 'aktif', '0031651040', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(485, 17, 'LUSI PUTRI YANI SIHOMBING', 'siswa144@gmail.com', '000000000000', '$2y$10$qbHr1asFl1kpKXv35R4Vp.fuhwFJvVBap68eQrgrIWG2UfmNbVzwa', 'siswa', 'aktif', '0025450403', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(486, 17, 'M. Al Fajri', 'siswa145@gmail.com', '000000000000', '$2y$10$/BQT9yKHKxDZUS3nX1t2veGcenej/gqF/bZhmuT4cRQ4iFz8c.VGm', 'siswa', 'aktif', '0023304980', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(487, 17, 'M. ALVIN AQBAR', 'siswa146@gmail.com', '000000000000', '$2y$10$7NXiHySL9FpizXrVhrXzD.ulVu5kRPyj24aPDjbJO7Q5X0Yv150Ra', 'siswa', 'aktif', '0031731110', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(488, 17, 'M. Fikry Irhaz', 'siswa147@gmail.com', '000000000000', '$2y$10$L8NcFIc6825QG9vy6z1sAO4eXVDDhamwJPuUyNlETJ3OwlNLEljFy', 'siswa', 'aktif', '0032019193', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(489, 17, 'MONA MARSI', 'siswa148@gmail.com', '000000000000', '$2y$10$1psecV.G5.U7ENspGUUVouukreMgjV3EYVb8nJjp0owfDNP4WW79e', 'siswa', 'aktif', '0020732879', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(490, 17, 'MUHAMMAD AFRIAN SAPUTRA', 'siswa149@gmail.com', '000000000000', '$2y$10$NjNz8OlizGH5a4LVx5Ne/uLjZcIvbACI9Jd9lpo3Olz.nWf5Uxtm6', 'siswa', 'aktif', '0023014621', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(491, 17, 'Muhammad Arkan', 'siswa150@gmail.com', '000000000000', '$2y$10$yWkAKnrtn8QqbOzKecY52Od3VlOaSlw1djFZvs4AQkjHGS2pBdb.e', 'siswa', 'aktif', '0037731584', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(492, 17, 'Muhammad Faisal', 'siswa151@gmail.com', '000000000000', '$2y$10$SnQN1UkgWkhONDB1xPrNyOC.sRsgdcUWNx9OvVEMwyJdY3OPwxTdC', 'siswa', 'aktif', '0040132462', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(493, 17, 'Nur Halim', 'siswa152@gmail.com', '000000000000', '$2y$10$dd/fEjONsQxjmi5qgvjM9umTYrfI41cuT6fkAODafLpI0zvjX0gXG', 'siswa', 'aktif', '0030738092', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(494, 17, 'Rezki Ramadan', 'siswa153@gmail.com', '000000000000', '$2y$10$mP0ZQSShufrrvJe1Aw5DEeYtlL.dlydfU30rYYDDkDg/b1RUeHQ22', 'siswa', 'aktif', '004565460', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(495, 17, 'Rezqie Azzura', 'siswa154@gmail.com', '000000000000', '$2y$10$ft35S3ERAxjGdIG36ZrMJOVTPZ4ilM8/5kzt.fk8dg07gmjmROto.', 'siswa', 'aktif', '0033436121', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(496, 17, 'RIFKA CHAYA TITA INDAH', 'siswa155@gmail.com', '000000000000', '$2y$10$UUElIIsiG5AW1goXjIksYOEGWNIDR0av2K/Nr3uvRzh.MMklQ4UFW', 'siswa', 'aktif', '007810740', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(497, 17, 'RIRIN APRILIA', 'siswa156@gmail.com', '000000000000', '$2y$10$gxX/FB7GkUPZSYGV0GSeROKQVj.vgja5lN/Fy2W9cadQJ84uoFBTa', 'siswa', 'aktif', '0039692276', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(498, 17, 'SHAFFIYAH ZUHRA', 'siswa157@gmail.com', '000000000000', '$2y$10$XUcjsBxHhXNHj6wX2RqEuOxRNY94HrKy9gftFpTpLPm3GHbs9eaby', 'siswa', 'aktif', '0031891056', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(499, 17, 'Silvia Dwi Ariani', 'siswa158@gmail.com', '000000000000', '$2y$10$Gd4TUUdIRoSX8IleeFBH3eOH9vr8HP5fY0gPNDKJDdf2fZTE5JaoC', 'siswa', 'aktif', '0021278342', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(500, 17, 'TEDDY DWI PRAYOGA', 'siswa159@gmail.com', '000000000000', '$2y$10$RIuL4idjQ.oa1okgNVqS9OODCCaTeYcMW.exwuxuJ0sj5FeZ6x9S6', 'siswa', 'aktif', '0033632936', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(501, 17, 'Willvana Sibarani', 'siswa160@gmail.com', '000000000000', '$2y$10$4GcBHmFeDh5uPkRrC33rmem8P0nktMvB0AeRqA/S2ap0f6dr2Sqzi', 'siswa', 'aktif', '0032026924', '-', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(502, 14, 'Adieska Valensia Maharani', 'siswa161@gmail.com', '000000000000', '$2y$10$PIomr42fYFhZr95oEj0UVuokbaaqOIF8f71Y7hGabyS9ER1BAxmMi', 'siswa', 'aktif', '0026112528', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(503, 14, 'Agum Wicaksana', 'siswa162@gmail.com', '000000000000', '$2y$10$ee3dQzoIHYsoWJMuUR7Q6uxad2gh44isGFlSJwedlyVkpmIvN.4B.', 'siswa', 'aktif', '0032170318', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(504, 14, 'Amir Dzaky', 'siswa163@gmail.com', '000000000000', '$2y$10$KaB7QIfxiBelRSJ4U0nwO.GpqKY6OX9yIaowTPCMn5cCNgSyiAFtq', 'siswa', 'aktif', '0036604030', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(505, 14, 'Arbiansyah Putra', 'siswa164@gmail.com', '000000000000', '$2y$10$MLs6NMOUrgfN4YCsS4VMQ.RmRwGzJnlG1wozVK0H44shrmOfpuPju', 'siswa', 'aktif', '0048576687', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(506, 14, 'ARMAN MAULANA', 'siswa165@gmail.com', '000000000000', '$2y$10$ovEs7cEjG71hnqh3tPuOmOn1txOpqCFA8./29JLhnjWxJA0KJD.2e', 'siswa', 'aktif', '0024438585', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(507, 14, 'Bulan Putri Lorena Jatmiko', 'siswa166@gmail.com', '000000000000', '$2y$10$7PMRS33qfE42lPk21L8F5eNQIWNCj9KniHzmtwaoNxmT304jRlWUy', 'siswa', 'aktif', '0032170296', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(508, 14, 'DELFAN ANDRIANO', 'siswa167@gmail.com', '000000000000', '$2y$10$46lNnxhuO2W1RwGkfgiPEOfocTtK8gyREbJ.3EpsRm7vkZjfzcB4m', 'siswa', 'aktif', '0035365155', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(509, 14, 'DINDA RISKA WARDINTA', 'siswa168@gmail.com', '000000000000', '$2y$10$grbzr6rUJBcAfbr/c5Tele6iQ3oAvoluTydtsm9.2J4Tog6Hx0GzK', 'siswa', 'aktif', '0040312066', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(510, 14, 'Gayuh Prabowo', 'siswa169@gmail.com', '000000000000', '$2y$10$ExiQSKBy9DgCzSC.B0378ubNaRi9RTAab2lJ7EDNV61iVcZI4ud.2', 'siswa', 'aktif', '0032170347', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(511, 14, 'GITA DESMAYATI', 'siswa170@gmail.com', '000000000000', '$2y$10$XiikJsXY.cnMzmjWBMO9nOGhKMn3LEzJ2bTn2op56CRB.cZyTA5e2', 'siswa', 'aktif', '0067693892', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(512, 14, 'GUSTIANI', 'siswa171@gmail.com', '000000000000', '$2y$10$oJX3teMXH.tGlIz3q0oDmeKrsV6QKhvsqmfaN3Zo4iZFTqbQffxY2', 'siswa', 'aktif', '0019018331', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(513, 14, 'HAIRUL AKBAR', 'siswa172@gmail.com', '000000000000', '$2y$10$eEvuw/.tiwHJ69QTgMooouAvkdoxLN/MZkQ7pnp5j9qOtnWbg.Atq', 'siswa', 'aktif', '0040119129', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(514, 14, 'Hendra Putra Utama', 'siswa173@gmail.com', '000000000000', '$2y$10$3dVxaHQNRz2J7D4U6Xu.C.hTmsmwB4.bpTlz3zbZr9Xa6jb7EdH.i', 'siswa', 'aktif', '0031690057', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(515, 14, 'INTAN', 'siswa174@gmail.com', '000000000000', '$2y$10$IJR4r6NQOTM4YmaoofK/aO5AGy4s8V.fbnDinjXU4NJBx0TbkqI32', 'siswa', 'aktif', '0032171620', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(516, 14, 'IRF FANSY MAULANA', 'siswa175@gmail.com', '000000000000', '$2y$10$55F9jba3682QMGf9FTV0iuoWVdjGw3tSewJu02AXpNxcWiCopNncC', 'siswa', 'aktif', '0030676657', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(517, 14, 'JULIA SUSANTI', 'siswa176@gmail.com', '000000000000', '$2y$10$eSWPwu3eiBkPntiDsbmNeejS.oomrVSW8AfaIwuYwW6lBokLFhfCO', 'siswa', 'aktif', '0031891034', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(518, 14, 'KASWINATA', 'siswa177@gmail.com', '000000000000', '$2y$10$r2uPi9Z5ueRwWR/kra4DAeQIz.MYuwOBry4FxSzbTe0jWNaXwgWTa', 'siswa', 'aktif', '0039504440', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(519, 14, 'LAILY DINDA SASKIA PUTRI', 'siswa178@gmail.com', '000000000000', '$2y$10$KOg0GjVLQVQsr9Y0wgUfSut6vRDxQK68dLPJrOFnHaECBQ2ife7i.', 'siswa', 'aktif', '0031297350', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(520, 14, 'MAULANA HARIN WICAKSONO', 'siswa179@gmail.com', '000000000000', '$2y$10$JAEQDSFJm1E5wAEzIucAHezwBKt39D/fxq7LJO1fyRW7F6tz4UCFC', 'siswa', 'aktif', '0032292504', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(521, 14, 'MEILYSA WINDI TRISILIAS', 'siswa180@gmail.com', '000000000000', '$2y$10$SR9VvwDPzth1tSgA/WC9PuVhZg8qCHd2VedHwKZpUP51M8KGsEymK', 'siswa', 'aktif', '0031310821', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(522, 14, 'MERI HANDAYANI', 'siswa181@gmail.com', '000000000000', '$2y$10$iK628SoTSqhtSbocqBmSaeitdGHNRDk17OrcfRPu/29LzafW9m9X.', 'siswa', 'aktif', '0025576656', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(523, 14, 'Miftahul Jannah', 'siswa182@gmail.com', '000000000000', '$2y$10$k7rjWX/mef23ERz9x2mzu.Ok1ESiWwLcBBhy0iJJVqSIQnnmtFo46', 'siswa', 'aktif', '003025602604', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(524, 14, 'MIKHAEL FELIX PARULIAN SITUMORANG', 'siswa183@gmail.com', '000000000000', '$2y$10$up3W8Tu8AivnC2rSXV04wuu7HonJCj6Kby/ikalY4Wu85Q/Cd1wPy', 'siswa', 'aktif', '0031513687', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(525, 14, 'Muhammad Fakhri Hamdi', 'siswa184@gmail.com', '000000000000', '$2y$10$2lfBi0WPlpaW2nqs1EyvQ.ScuntFrVLlQEOWk08ybjlcKG9.g/jdG', 'siswa', 'aktif', '0031937374', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(526, 14, 'Muhammad Naufal Risdianto', 'siswa185@gmail.com', '000000000000', '$2y$10$JcKWxAG9EKhyTsasBVmSROBfNUmFtm08PAddBeC/v8qWctT/sO4IS', 'siswa', 'aktif', '0038272631', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(527, 14, 'PITA EFRIYANTI', 'siswa186@gmail.com', '000000000000', '$2y$10$r2/hVE1sRO9ei8qZaXS2JuqN9vgvgZ6OUdPM0hXKrtKubVy.j3tXS', 'siswa', 'aktif', '003138977', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(528, 14, 'RISKY ANDRI PANGESTU', 'siswa187@gmail.com', '000000000000', '$2y$10$mzwcAwwDh/mXFdWsTgjjK.tvuosRJfOy/XUSPtA/./Nil1C0/s5xq', 'siswa', 'aktif', '0032413923', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(529, 14, 'Safna', 'siswa188@gmail.com', '000000000000', '$2y$10$M2wEqiqq6L3AjWKo59KyvOc5OtJt5F/eUBi.gCSjKdtPed65Z64FW', 'siswa', 'aktif', '0034050258', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(530, 14, 'Septiriana', 'siswa189@gmail.com', '000000000000', '$2y$10$tsWiprNDAb7OmRYJ6Xz6u.wIxi67uInbeIUZ7kjLDk7t3rHQUJ3Ie', 'siswa', 'aktif', '0032133423', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(531, 14, 'SHELA SEPTIANA', 'siswa190@gmail.com', '000000000000', '$2y$10$IjQYPMuvuVh75o98uxd2JuYZJBvPc9Ne82mq1F3BJq7qAuKazJF4m', 'siswa', 'aktif', '0028507094', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(532, 14, 'TARADIVA AURELLIA', 'siswa191@gmail.com', '000000000000', '$2y$10$M9V/COmNfAGzcKDi/uSyZuUxw/FCN4u1u1h57X.3ylPXtaINaF/ge', 'siswa', 'aktif', '0032214110', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(533, 14, 'TRI MALDINO, N', 'siswa192@gmail.com', '000000000000', '$2y$10$6oolaZWKkHolSuvbnIrjT.rHOF3WTVsS/1q8x9u3QqqlfaoZQmN9q', 'siswa', 'aktif', '0034297627', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(534, 14, 'Veriana Erfina Agale Pakpahan', 'siswa193@gmail.com', '000000000000', '$2y$10$Eq6fnDDgqbtZ4rp.1JQ5aezcuxrPo392r5jFT6JsmXy9DqUj7OghK', 'siswa', 'aktif', '0038403119', '', '2021-02-08 17:19:07', '2021-02-08 17:19:07'),
(535, NULL, 'Dina Citra Resmi, S. Pd', 'guru1@gmail.com', '000000000000', '$2y$10$MfXly.nO40Q/FPbQNh/MM.tD4jA7L7knQiP.xk9fqVx6ej52XvquK', 'guru', 'aktif', '-', 'foto/casey-horner-9XRpNnTqdJE-unsplash.jpg', '2021-02-09 12:57:57', '2022-07-24 06:54:35'),
(536, NULL, 'Wahyuni Saputri', 'guru2@gmail.com', '000000000000', '$2y$10$Eoe.Mo0g6PbapuJ8gEHQIew8BCqZNdgPRZI52SPJ.7zy69hHunqvO', 'guru', 'aktif', '-', 'foto/Screenshot (15).png', '2021-02-09 12:57:57', '2022-07-23 22:25:07'),
(537, NULL, 'Aji Setiawan', 'guru3@gmail.com', '000000000000', '$2y$10$8rQpQSYO9sr2WoPYY5er2O3d/y18gbgfp5J8e/fa0s3oZr9GE.oJm', 'guru', 'aktif', '-', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(538, NULL, 'Rawalsa Aguva', 'guru4@gmail.com', '000000000000', '$2y$10$Cbkdvs/k/5t3qgXG.taZ/OxXhCcBxDON.TtLVvX0d8Tq7LR91V5OK', 'guru', 'aktif', '01547736741XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(539, NULL, 'Fitrianti.a', 'guru5@gmail.com', '000000000000', '$2y$10$fnggaFltX6GjIdGEgpQCy.IrB0CoI4s/lOK8Ue0lgcmeuU4n2oFFa', 'guru', 'aktif', '04387576593XXXXX', 'foto/woman.png', '2021-02-09 12:57:57', '2021-02-10 12:35:52'),
(540, NULL, 'Esra Lumbantoruan', 'guru6@gmail.com', '000000000000', '$2y$10$ioSdw0uxNdAhs4wOVaeSnOaK.EBMxofuS7JE1vV8h73ivHiCDJWna', 'guru', 'aktif', '14367676681XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(541, NULL, 'Hendri', 'guru7@gmail.com', '000000000000', '$2y$10$XheG1sSAFPB7naekyFov5uLKVTNTo3kznveRGc0Y9SuxIYK0V5e0W', 'guru', 'aktif', '17367726731XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(542, NULL, 'Muhidin', 'guru8@gmail.com', '000000000000', '$2y$10$H/eMId9KmzpqBmcDzBcTg.Ow/tUSAW595Fia8bVuR2yzgw.DvcHXm', 'guru', 'aktif', '17487516542XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(543, NULL, 'Widya Murba Ningsih', 'guru9@gmail.com', '000000000000', '$2y$10$uuLWtTgVJSDQy.VTY6Kz6.8gLBpAt52vJD4J3yiI2fz8WCpvp9pdK', 'guru', 'aktif', '18637596612XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(544, NULL, 'Iqbal Fuady', 'guru10@gmail.com', '000000000000', '$2y$10$80YLgNAc2r3eb2PVxBwVX.g64KZrye5C1LG7VtZ4dZma07X20jdc.', 'guru', 'aktif', '23567706711XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(545, NULL, 'Syamsul', 'guru11@gmail.com', '000000000000', '$2y$10$bseUFntfR6uzZLgiwaw63.eqfc8tj2ryJznznpqlXP36GQOxO7Y1u', 'guru', 'aktif', '27597706721XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(546, NULL, 'Nurhasanah', 'guru12@gmail.com', '000000000000', '$2y$10$L6ob/sIBQjmzHoNuntKysejSDwOTJVjMlhZ0WzRm8rEDWnAm5SpmG', 'guru', 'aktif', '28427576583XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(547, NULL, 'Desi Fitria', 'guru13@gmail.com', '000000000000', '$2y$10$E9AdXxcFRNVCTDMjWrzK7.6PT5gvQEHPiWBdj/7DEO4CB1YaaDU5W', 'guru', 'aktif', '30557606613XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(548, NULL, 'Ema Handrianti', 'guru14@gmail.com', '000000000000', '$2y$10$k1eT776N/i27WcVp8IrCEOtIMp569HNekX55V7LHip9iEf7XVuEY6', 'guru', 'aktif', '39347636642XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(549, NULL, 'Ali Sabri', 'guru15@gmail.com', '000000000000', '$2y$10$f1kvaZYsXXGSmEsWPxgM0OifGUyV7o1KApCS7Obxx0M.gxOLb/SXO', 'guru', 'aktif', '41567546562XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(550, NULL, 'Dewi Okta Hendrisa', 'guru16@gmail.com', '000000000000', '$2y$10$LzYfYmv3J7U/aQqOCC2SHeUtnNw/EPhVYEIDiD3zv6Iu0qtH/6YbC', 'guru', 'aktif', '43537626633XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(551, NULL, 'Febrina', 'guru17@gmail.com', '000000000000', '$2y$10$zIGWogjrnaYc7jmicZhaXOIb/IPOOzsUbvK2tWVpVpEvy4M9Ka/D.', 'guru', 'aktif', '45357666671XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(552, NULL, 'Abdurrahman', 'guru18@gmail.com', '000000000000', '$2y$10$VGvozB3pUDAQhzIrjd70NuyQGc6pKdbk8.T0gd6eiIKkbU42f5zhS', 'guru', 'aktif', '46517616642XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(553, NULL, 'Candra Dwi Ayu Pangukir', 'guru19@gmail.com', '000000000000', '$2y$10$.AlzKKVLgDjvPQlmNISpyeUgvH9SNSx.J0TxkV.8WDmOGRFkerCKC', 'guru', 'aktif', '47547716711XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(554, NULL, 'Zuriati', 'guru20@gmail.com', '000000000000', '$2y$10$10LFA3HqdXzfNa4q4xcB/O8SNGCT0UvD3XB3STBUu10pOChJqdrCS', 'guru', 'aktif', '53597436443XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(555, NULL, 'Riri Dwi Ramadani', 'guru21@gmail.com', '000000000000', '$2y$10$9PHZOv6VjIvkc3Rq9Tz4MOfjRWtuzVftkE3F2xwjczzd8jSrwg9ZS', 'guru', 'aktif', '55497726721XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(556, NULL, 'Idhar Khaira', 'guru22@gmail.com', '000000000000', '$2y$10$QaFMsd5tpeIXVyDRItwpp.w3lUoOKLwd8bDv.Y4YpPMZOtxgNzj0y', 'guru', 'aktif', '62587606612XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(557, NULL, 'Desi Gusdarti', 'guru23@gmail.com', '000000000000', '$2y$10$FokhWdKYsUHjlxFgc.tBtuLChStwrRdZmNV4fNv7pyq3xQhwR0IZW', 'guru', 'aktif', '65447626642XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(558, NULL, 'Rayuna', 'guru24@gmail.com', '000000000000', '$2y$10$AgD5DEr6RYY.7zUtoWPUqOhXBnuQnbGQSYXFZ/GQXKf43YzY21rUO', 'guru', 'aktif', '71387456483XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(559, NULL, 'Rini Artika', 'guru25@gmail.com', '000000000000', '$2y$10$3irph30NQ9eIoMfIC1fjMuVAbJEY86w2S4tHBFEEqHS7cnbpjufW6', 'guru', 'aktif', '74407586593XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(560, NULL, 'Fhitrawati', 'guru26@gmail.com', '000000000000', '$2y$10$T/W4JFQFE.j8CnPcXsaisO0sTVUpm1KO5dhNgzM7HQ93pRuUC72z.', 'guru', 'aktif', '75517466483XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(561, NULL, 'Ketaman Sihotang', 'guru27@gmail.com', '000000000000', '$2y$10$COOk1w1zki1c/75UtFDHa.FjuyZFuG.dEdTajghQFdwbCAVE/sRiu', 'guru', 'aktif', '78447476482XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(562, NULL, 'Sesillya Wardaningsih', 'guru28@gmail.com', '000000000000', '$2y$10$oZMJW8MyS4hikvScb3Qm.OaV2g282Wd2hKyGY8EqMYb9eB9Yhc/oK', 'guru', 'aktif', '79397606613XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(563, NULL, 'Rinaldy Putra Utama', 'guru29@gmail.com', '000000000000', '$2y$10$8W.wtFKu380ku72eWWyIcO8360bGDDSx7OoC2wPoxj5rY4WthD.TG', 'guru', 'aktif', '80537716721XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(564, NULL, 'Agustarizal', 'guru30@gmail.com', '000000000000', '$2y$10$dedJvFNcOaQhCychoVVOvucMSYYkBIfbpqLJobgcJO2Z0kIxewJLS', 'guru', 'aktif', '81397476492XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(565, NULL, 'Nur Izzati Haq, S.pd.', 'guru31@gmail.com', '000000000000', '$2y$10$hMK1n.cSEy0D8m8VXtcx2OdSaGDWlDuVEzzqeVM0/upo3wOPYdppe', 'guru', 'aktif', '81457746741XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(566, NULL, 'Anifaruzki Amalia', 'guru32@gmail.com', '000000000000', '$2y$10$8y8eoxPSFrhkBhk2lxOLMeeRLqzE8bBEIDSv8yxpJJiNE6RNKGHIq', 'guru', 'aktif', '84367736741XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(567, NULL, 'Drs. Syaipudin', 'guru33@gmail.com', '000000000000', '$2y$10$LKzIs0gmyhYkVmuyBrO2huJRx8MBfoKDXJldb48CvQhcWjjaC3/4W', 'guru', 'aktif', '84407466482XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(568, NULL, 'Saipul Effendi', 'guru34@gmail.com', '000000000000', '$2y$10$fQNm1l0.ih4RZBaWwkSu/ucTT7KZgR3zEp1PYDLKyAZrnbtTz052y', 'guru', 'aktif', '86597586592XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(569, NULL, 'Tasdik Husni Amri', 'guru35@gmail.com', '000000000000', '$2y$10$7kberSDiGAi4vrmxpbqHqOV7a1zEAbw263FoKsBJZMNxR2fC6REZu', 'guru', 'aktif', '89487656661XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(570, NULL, 'Nurjanah', 'guru36@gmail.com', '000000000000', '$2y$10$YKO/4Virnv0tMaGs3AkdA.me.hUEV0fTo2fJQbsBN3.yrvhDSl6ji', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(571, NULL, 'Nurul Efiza', 'guru37@gmail.com', '000000000000', '$2y$10$M9pr/Ca3weTcpbbLHoSmruvugrgpknVNWW03nfb62e.Ne2WxLtwci', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57');
INSERT INTO `users` (`id`, `kelas_id`, `nama`, `email`, `no_hp`, `password`, `level`, `status`, `no_identitas`, `foto`, `created_at`, `updated_at`) VALUES
(572, NULL, 'Ardhi Muzammil', 'guru38@gmail.com', '000000000000', '$2y$10$Uozq9Ipb8OMG.ygWQcA05uEvWoJ3QTU3XvbwBQNrtv9bpD2xiclky', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(573, NULL, 'Muhamad Yusuf', 'guru39@gmail.com', '000000000000', '$2y$10$mssLkY7i63Zq7mCPPO1Wz.DxL7sgYeDGvqwEPZQQDbCUugGjwBoUm', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57'),
(574, NULL, 'Amriadi', 'guru40@gmail.com', '000000000000', '$2y$10$r8M5TdNpp35IZZ69QBYc0O1UzUiOtzVjtH/GurCzSfKDU8MOa0D8O', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 12:57:57', '2021-02-09 12:57:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_detail_id` (`mapel_detail_id`);

--
-- Indexes for table `absensi_details`
--
ALTER TABLE `absensi_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_id` (`absensi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `kuiss`
--
ALTER TABLE `kuiss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `kuis_details`
--
ALTER TABLE `kuis_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_details_test_id_foreign` (`test_id`),
  ADD KEY `test_details_user_id_foreign` (`user_id`);

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
-- Indexes for table `materis`
--
ALTER TABLE `materis`
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
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_essays`
--
ALTER TABLE `soal_essays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_essays_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `soal_pilgans`
--
ALTER TABLE `soal_pilgans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_pilgans_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `tugass`
--
ALTER TABLE `tugass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indexes for table `tugas_details`
--
ALTER TABLE `tugas_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_id` (`tugas_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `absensi_details`
--
ALTER TABLE `absensi_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelass`
--
ALTER TABLE `kelass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kuiss`
--
ALTER TABLE `kuiss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kuis_details`
--
ALTER TABLE `kuis_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mapel_details`
--
ALTER TABLE `mapel_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soal_essays`
--
ALTER TABLE `soal_essays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `soal_pilgans`
--
ALTER TABLE `soal_pilgans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tugass`
--
ALTER TABLE `tugass`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tugas_details`
--
ALTER TABLE `tugas_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`mapel_detail_id`) REFERENCES `mapel_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `absensi_details`
--
ALTER TABLE `absensi_details`
  ADD CONSTRAINT `absensi_details_ibfk_1` FOREIGN KEY (`absensi_id`) REFERENCES `absensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informasis`
--
ALTER TABLE `informasis`
  ADD CONSTRAINT `informasis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelass`
--
ALTER TABLE `kelass`
  ADD CONSTRAINT `kelass_ketua_kelas_foreign` FOREIGN KEY (`ketua_kelas`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kelass_wali_kelas_foreign` FOREIGN KEY (`wali_kelas`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_ibfk_1` FOREIGN KEY (`informasi_id`) REFERENCES `informasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuiss`
--
ALTER TABLE `kuiss`
  ADD CONSTRAINT `tests_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kuis_details`
--
ALTER TABLE `kuis_details`
  ADD CONSTRAINT `test_details_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `kuiss` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mapel_details`
--
ALTER TABLE `mapel_details`
  ADD CONSTRAINT `mapel_details_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_details_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_details_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `soal_essays`
--
ALTER TABLE `soal_essays`
  ADD CONSTRAINT `soal_essays_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `soal_pilgans`
--
ALTER TABLE `soal_pilgans`
  ADD CONSTRAINT `soal_pilgans_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugass`
--
ALTER TABLE `tugass`
  ADD CONSTRAINT `tugass_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_details`
--
ALTER TABLE `tugas_details`
  ADD CONSTRAINT `tugas_details_ibfk_1` FOREIGN KEY (`tugas_id`) REFERENCES `tugass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
