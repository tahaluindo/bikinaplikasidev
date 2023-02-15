-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Sep 07, 2022 at 01:05 AM
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
-- Database: `akademik_agoy`
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
(1, 1, '2022-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_details`
--

CREATE TABLE `absensi_details` (
  `id` int(11) NOT NULL,
  `absensi_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Hadir','Tidak Hadir','Izin') NOT NULL DEFAULT 'Hadir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_details`
--

INSERT INTO `absensi_details` (`id`, `absensi_id`, `user_id`, `status`) VALUES
(1, 1, 713, 'Hadir'),
(2, 1, 714, 'Tidak Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `guru_detail`
--

CREATE TABLE `guru_detail` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `status_kepegawaian` varchar(20) NOT NULL,
  `jenis_ptk` varchar(20) NOT NULL,
  `gelar_depan` varchar(10) NOT NULL,
  `gelar_belakang` varchar(10) NOT NULL,
  `jenjang` enum('D3','S1','S2','S3') NOT NULL,
  `jurusan_prodi` varchar(20) NOT NULL,
  `sertifikasi` varchar(20) NOT NULL,
  `tamat_kerja` year(4) NOT NULL,
  `tugas_tambahan` varchar(20) NOT NULL,
  `mengajar` varchar(20) NOT NULL,
  `jam_tugas_tambahan` varchar(10) NOT NULL,
  `jjm` tinyint(10) NOT NULL,
  `total_jjm` varchar(10) NOT NULL,
  `siswa` varchar(40) NOT NULL,
  `kompetensi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru_detail`
--

INSERT INTO `guru_detail` (`id`, `user_id`, `nama`, `nuptk`, `status_kepegawaian`, `jenis_ptk`, `gelar_depan`, `gelar_belakang`, `jenjang`, `jurusan_prodi`, `sertifikasi`, `tamat_kerja`, `tugas_tambahan`, `mengajar`, `jam_tugas_tambahan`, `jjm`, `total_jjm`, `siswa`, `kompetensi`) VALUES
(1, 726, 'dahlan ahmad S.Pd', '21738392625', 'PNS', 'guru mapel', 'Dra', '', 'S1', 'sejarah', 'sejarah', 1997, '', 'sejarah', '', 24, '24', '', 'sejarah'),
(712, 712, 'susi susanti S.Pd', '14587965', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'sejarah indonesia', 'sejarah indonesia', 1997, '', 'sejarah indonesia', '', 24, '24', '', 'seajarah indonesia'),
(715, 715, 'Rika Apriani S.Pd', '254789652', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'matematika', 'matematika', 1998, '', 'matematika', '', 24, '24', '', 'matematika'),
(716, 716, 'darmawi S.Or', '1545848656', 'PNS', 'guru mapel', '', 'S.Or', 'S1', 'olahraga', 'olahraga', 1994, '', 'olahraga jasmani', '', 24, '24', '', 'penjasorkes'),
(717, 717, 'Joko Pramono S.Pd', '5245887995', '', 'guru mapel', '', 'S.Pd', 'S1', 'pendidikan agama isl', 'PAI', 1998, '', 'PAI', '', 24, '24', '', 'agama islam'),
(718, 718, 'dela fitrian', '856214125', 'PNS', 'Pkn', '', '', '', 'pendidikan kewargane', 'pkn', 2000, '', 'pkn', '', 24, '24', '', 'pkn'),
(719, 719, 'Sri Mulyono S.Pd', '14478956', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'bahasa indonesia', 'bahasa indonesia', 2000, '', 'bahasa indonesia', '', 24, '24', '', 'bahasa indonesia'),
(720, 720, 'herlin S.Pd', '58965412', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'bahasa inggris', 'bahasa inggris', 1997, '', 'bahasa inggris', '', 24, '', '', 'bahasa inggris'),
(721, 721, 'rike putri ani S.Pd', '557896541', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'seni budaya dan kete', 'seni budaya dan kete', 1996, '', 'sbk', '', 24, '24', '', 'sbk'),
(722, 722, 'iis damayanti S.Pd', '568741253', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'prakarya', 'prakarya', 1994, '', 'prakarya', '', 24, '24', '', 'parkayra'),
(723, 723, 'Nisna Wati S.Pd', '2588745214', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'ekonomi', 'ekonomi', 1997, '', 'ekonomi', '', 24, '24', '', 'ekonomi'),
(724, 724, 'dina aprilia S.Pd', '5478693226', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'sosiologi', 'sosiologi', 2000, '', 'sosiologi', '', 24, '24', '', 'sosiologi'),
(725, 725, 'Lia Marliana S.Pd', '547748621', 'PNS', 'guru mapel', '', 'S.Pd', 'S1', 'geografi', 'geografi', 2000, '', 'geografi', '', 24, '24', '', 'geografi');

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

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_detail_id` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum`at','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dari_jam` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampai_jam` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Incoming','On Schedule','Cancell') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'On Schedule',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `mapel_detail_id`, `hari`, `dari_jam`, `sampai_jam`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '8', '9', 'Incoming', '2022-07-23 06:05:00', '2022-07-23 06:05:15'),
(2, 2, 'Senin', '11', '12', 'Incoming', '2022-07-24 18:49:05', '2022-07-24 18:49:05'),
(3, 3, 'Selasa', '8', '10', 'Incoming', '2022-07-24 18:56:24', '2022-07-24 18:56:24');

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
(1, 712, 714, 'X IPA', '1', '2022-07-23 05:52:18', '2022-07-23 08:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `informasi_id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Sejarah Indonesia', 'A', '2022-07-23 06:03:16', '2022-08-03 22:24:58'),
(2, 'Matematika', 'A', '2022-07-24 18:46:02', '2022-07-24 18:46:02'),
(3, 'Penjasorkes', 'B', '2022-07-24 18:46:32', '2022-08-03 22:31:43'),
(10, 'Pendidikan Agama Islam', 'A', '2022-08-03 22:11:18', '2022-08-03 22:11:29'),
(11, 'pendidikan pancasila (PKN)', 'A', '2022-08-03 22:19:18', '2022-08-03 22:21:40'),
(12, 'Bahasa Indonesia', 'A', '2022-08-03 22:22:32', '2022-08-03 22:22:32'),
(13, 'Bahasa Inggris', 'A', '2022-08-03 22:26:08', '2022-08-03 22:26:08'),
(14, 'Seni Budaya dan Keterampilan', 'B', '2022-08-03 22:28:44', '2022-08-03 22:28:44'),
(15, 'Prakarya dan Kewirausahaan', 'B', '2022-08-03 22:32:48', '2022-08-03 22:32:48'),
(16, 'Ekonomi', 'C', '2022-08-03 22:35:08', '2022-08-03 22:35:08'),
(17, 'Sosiologi', 'C', '2022-08-03 22:37:37', '2022-08-03 22:37:37'),
(18, 'Geografi', 'C', '2022-08-03 22:41:39', '2022-08-03 22:41:39'),
(19, 'Sejarah', 'C', '2022-08-03 22:44:12', '2022-08-03 22:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_details`
--

CREATE TABLE `mapel_details` (
  `id` int(11) NOT NULL,
  `mapel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel_details`
--

INSERT INTO `mapel_details` (`id`, `mapel_id`, `kelas_id`, `user_id`) VALUES
(1, 1, 1, 712),
(2, 2, 1, 715),
(3, 3, 1, 716),
(5, 10, 1, 717),
(6, 11, 1, 718),
(7, 12, 1, 719),
(8, 13, 1, 720),
(9, 14, 1, 721),
(10, 15, 1, 722),
(11, 16, 1, 723),
(12, 17, 1, 724),
(13, 18, 1, 725),
(14, 19, 1, 726);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_detail_id` int(11) NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `mapel_detail_id`, `tahun`, `semester`) VALUES
(2, 2, 2022, '1'),
(3, 5, 2022, '1'),
(4, 6, 2022, '1'),
(5, 7, 2022, '1'),
(6, 8, 2022, '1'),
(7, 9, 2022, '1'),
(8, 10, 2022, '1'),
(9, 11, 2022, '1'),
(10, 12, 2022, '1'),
(11, 13, 2022, '1'),
(12, 14, 2022, '1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_details`
--

CREATE TABLE `nilai_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tugas` tinyint(4) DEFAULT NULL,
  `ulangan_harian` tinyint(4) NOT NULL,
  `mid_semester` tinyint(4) NOT NULL,
  `uas` tinyint(4) NOT NULL,
  `predikat_pengetahuan` enum('A','A-','B+','B','B-','C+','C','C-','D+','D') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rata_rata_pengetahuan` float NOT NULL,
  `deskripsi_pengetahuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterampilan` tinyint(4) DEFAULT NULL,
  `predikat_keterampilan` enum('A','A-','B+','B','B-','C+','C','C-','D+','D') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_keterampilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_details`
--

INSERT INTO `nilai_details` (`id`, `nilai_id`, `user_id`, `tugas`, `ulangan_harian`, `mid_semester`, `uas`, `predikat_pengetahuan`, `rata_rata_pengetahuan`, `deskripsi_pengetahuan`, `keterampilan`, `predikat_keterampilan`, `deskripsi_keterampilan`, `created_at`, `updated_at`) VALUES
(3, 2, 713, 80, 80, 80, 80, 'B', 80, 'sangat baik dalam penguasaan mata pelajaran matematika', 80, 'B', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:04:24', '2022-08-04 05:04:24'),
(4, 3, 713, 89, 89, 89, 89, 'A', 89, 'sangat baik dalam penguasaan mata pelajaran pendidikan agama islam', 90, 'A', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:14:00', '2022-08-04 05:14:00'),
(5, 4, 713, 80, 98, 90, 78, 'B', 86.5, 'sangat baik dalam penguasaan mata pelajaran Pendidikan pancasila dan kewarganegaraan', 80, 'B', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:20:47', '2022-08-04 05:20:47'),
(6, 5, 713, 80, 80, 98, 98, 'A', 89, 'sangat baik dalam penguasaan mata pelajaran bahasa indonesia', 89, 'A', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:23:53', '2022-08-04 05:23:53'),
(7, 6, 713, 80, 89, 89, 89, 'B', 86.75, 'sangat baik dalam penguasaan mata pelajaran Bahasa inggris', 87, 'B', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:27:13', '2022-08-04 05:27:13'),
(8, 7, 713, 89, 80, 80, 98, 'B', 86.75, 'sangat baik dalam penguasaan mata pelajaran seni budaya', 98, 'A', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:29:54', '2022-08-04 05:29:54'),
(9, 8, 713, 89, 78, 78, 79, 'B', 81, 'Memiliki pengetahuan yang ckup baik', 89, 'A', 'Memiliki keterampilan yang ckup baik', '2022-08-04 05:33:38', '2022-08-04 05:33:38'),
(10, 9, 713, 80, 89, 89, 87, 'B', 86.25, 'sangat baik dalam penguasaan mata pelajaran Ekonomi', 97, 'A', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:36:11', '2022-08-04 05:36:11'),
(11, 10, 713, 89, 87, 87, 87, 'B', 87.5, 'Memiliki pengetahuan yang ckup baik', 89, 'A', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:39:13', '2022-08-04 05:39:13'),
(12, 11, 713, 89, 87, 87, 87, 'B', 87.5, 'sangat baik dalam penguasaan mata pelajaran Geografi', 80, 'B', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:42:44', '2022-08-04 05:42:44'),
(13, 12, 713, 89, 87, 86, 89, 'B', 87.75, 'sangat baik dalam penguasaan mata pelajaran Sejarah', 89, 'A', 'sangat baik dan memamahi pelajaran', '2022-08-04 05:45:02', '2022-08-04 05:45:02');

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
  `status` enum('Sudah Diberikan','Belum Diberikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Diberikan',
  `hasil_nilai` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raports`
--

INSERT INTO `raports` (`id`, `user_id`, `tahun`, `semester`, `status`, `hasil_nilai`) VALUES
(1, 713, 2022, 1, 'Sudah Diberikan', '{\"predikat_sikap_spiritual\":\"A\",\"deskripsi_sikap_spiritual\":\"sangat baik dan sangat menghargai satu sama lain\",\"predikat_sikap_sosial\":\"A\",\"deskripsi_sikap_sosial\":\"sangat baik dan dengan teman saling menolong\",\"nama_ekstrakurikuler\":[\"Pramuka\",\"PMR\",null],\"predikat_ekstrakurikuler\":[\"A\",\"A\",\"A\"],\"keterangan_ekstrakurikuler\":[\"Mampu melakukan teknik dasar pramuka\",\"Dapat menggunakan bidai atau mitela untuk patah tulang\",null],\"jenis_prestasi\":[\"juara 3 lomba membuat video pendek tingkat kota jambi\",null,null,null,null,null],\"keterangan_jenis_prestasi\":[\"juara 3 lomba membuat video pendek di ditlantas polda jambi\",null,null,null,null,null],\"hadir\":\"28\",\"sakit\":\"3\",\"izin\":\"2\",\"tanpa_keterangan\":\"1\"}'),
(2, 714, 2022, 1, 'Belum Diberikan', '{\"predikat_sikap_spiritual\":\"A\",\"deskripsi_sikap_spiritual\":\"Deskripsi sikap spiritual\",\"predikat_sikap_sosial\":\"A\",\"deskripsi_sikap_sosial\":\"Deskripsi sikap sosial\",\"nama_ekstrakurikuler\":[\"Basket\",\"Renang\",null],\"predikat_ekstrakurikuler\":[\"A\",\"A\",\"A\"],\"keterangan_ekstrakurikuler\":[\"Selalu hadir\",\"Selalu Hadir\",null],\"jenis_prestasi\":[\"Juara 1\",\"Juara 2\",null,null,null,null],\"keterangan_jenis_prestasi\":[\"liga indonesia\",\"liga indonesia\",null,null,null,null],\"hadir\":\"10\",\"sakit\":\"3\",\"izin\":\"3\",\"tanpa_keterangan\":\"3\"}');

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
(1, 'SMAN 11 KOTA JAMBI', '082372618040', 'Jl. Sersan Anwar Bay, Bagan Pete, South Jambi, Kota Jambi, Jambi 36129', '<p>Adalah salah satu SMA terakreditasi A.</p>', '<p>Berprestasi berdasarkan iman dan taqwa dengan berbudaya lingkungan.</p>', '<ol>\r\n	<li>Menigkatkan disiplin dan kemampuan pribadi semua personil sekolah.</li>\r\n	<li>Bersungguh-sungguh dan ikhlas melaksanakan tugas.</li>\r\n	<li>Menjalin hubungan dan kerja sama yang harmonis antara kepala sekolah, guru, tenaga tata usaha, dan masyarakat serta instansi terkait.</li>\r\n	<li>Melengkapi sarana dan prasarana sekolah.</li>\r\n	<li>Menignkatkan pelaksanakan agama, etika dan tata tertib yang berlaku disekolah dan dalam lingkungan masyarakat.</li>\r\n	<li>Menciptakan lingkungan yang indah, bersih, nyaman dan kondusif.</li>\r\n</ol>', '2020-08-28 00:00:00', '2022-07-24 18:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('tu','guru','siswa','wakakurikulum','kepala sekolah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif','pindah','keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nipd` smallint(6) DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` enum('Islam','Kristen Protestan','Kristen Katolik','Hindu','Budha') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dusun` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_tinggal` enum('Bersama Orang Tua','Tidak Bersama Orang Tua') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alat_transportasi` enum('Mobil','Motor','Bus Antar Jemput','Lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skhun` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima_kps` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kps` tinyint(4) DEFAULT NULL,
  `nama_ayah` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir_ayah` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenjang_pendidikan_ayah` enum('SD','SMP','SMA','S1','S2','S3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` int(11) DEFAULT NULL,
  `nik_ayah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir_ibu` year(4) DEFAULT NULL,
  `jenjang_pendidikan_ibu` enum('SD','SMP','SMA','S1','S2','S3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` int(11) DEFAULT NULL,
  `nik_ibu` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_peserta_ujian_nasional` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_seri_ijazah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima_kip` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kip` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_di_kip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kks` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_registrasi_akta_lahir` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_rekening_bank` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekening_atas_nama` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layak_pip` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_layak_pip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kebutuhan_khusus` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolah_asal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke_berapa` tinyint(4) DEFAULT NULL,
  `lintang` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bujur` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kk` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` tinyint(4) DEFAULT NULL,
  `tinggi_badan` tinyint(4) DEFAULT NULL,
  `lingkar_kepala` tinyint(4) DEFAULT NULL,
  `jumlah_saudara_kandung` tinyint(4) DEFAULT NULL,
  `jarak_rumah_kesekolah` tinyint(4) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kelas_id`, `nama`, `email`, `no_hp`, `password`, `level`, `status`, `no_identitas`, `foto`, `nipd`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kode_pos`, `jenis_tinggal`, `alat_transportasi`, `skhun`, `penerima_kps`, `no_kps`, `nama_ayah`, `tahun_lahir_ayah`, `jenjang_pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nik_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `jenjang_pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nik_ibu`, `no_peserta_ujian_nasional`, `no_seri_ijazah`, `penerima_kip`, `nomor_kip`, `nama_di_kip`, `nomor_kks`, `no_registrasi_akta_lahir`, `bank`, `nomor_rekening_bank`, `rekening_atas_nama`, `layak_pip`, `alasan_layak_pip`, `kebutuhan_khusus`, `sekolah_asal`, `anak_ke_berapa`, `lintang`, `bujur`, `no_kk`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `jumlah_saudara_kandung`, `jarak_rumah_kesekolah`, `updated_at`, `created_at`) VALUES
(1, NULL, 'tu', 'tu@gmail.com', '082282692489', '$2y$10$Zf785oFQB/4ggRluIg.3sOIBsom9K7hPyn5YvXsEMdaeDHIOLPCIm', 'tu', 'aktif', NULL, 'foto/man-avatar-profile-round-icon_24640-14044.jpg', 0, NULL, '0000-00-00', '', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SMA', NULL, NULL, NULL, NULL, 0000, 'SMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 13:26:54', '2020-08-28 20:47:03'),
(710, NULL, 'wakakurikulum', 'wakakurikulum@gmail.com', '082282692489', '$2y$10$xa/yHGViN9GFeNTXB3D6w.mM1waDMz2GnwSJqJBl1FPnGkNlfN8e.', 'wakakurikulum', 'aktif', NULL, 'foto/man-avatar-profile-round-icon_24640-14044.jpg', NULL, NULL, '0000-00-00', '', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, NULL, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2021-02-05 13:26:54', '2020-08-28 20:47:03'),
(711, NULL, 'Kepala Sekolah', 'kepalasekolah@gmail.com', '082282692489', '$2y$10$27uSPFU4hsjqc4J/u5xHg.6fgJJyuDK7T/atVAQUFpzxdd8H5HWiq', 'kepala sekolah', 'aktif', NULL, 'foto/man-avatar-profile-round-icon_24640-14044.jpg', 0, NULL, '0000-00-00', '', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Ya', 0, NULL, NULL, 'SD', NULL, NULL, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2021-02-05 13:26:54', '2020-08-28 20:47:03'),
(712, NULL, 'susi susanti S.Pd', 'susi@gmail.com', '089765467890', '$2y$10$pYMRyB275mXBaM9fB9U7luuVc5D08B7.144XUQ1NhHBnIjrBf3A8u', 'guru', 'aktif', '46790098675432', 'foto/phoca_thumb_l_img_0136.jpg', 0, NULL, '0000-00-00', '', 'Islam', 'mayang', '01', '00', NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Ya', 0, NULL, NULL, 'SD', NULL, NULL, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-07-23 05:44:10', '2022-07-23 05:44:10'),
(713, 1, 'Iftita anugrah saputri', 'tita@gmai.com', '0897654738829', '$2y$10$uqBCagjLx/oOgDDKmGl1JOpYsoWJZrjFVKGouLgJWuyN2MtnKOlEK', 'siswa', 'aktif', '46790098675432', NULL, 0, 'jambi', '2000-05-23', '', 'Islam', 'bringin', '08', '01', NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Ya', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-07-23 05:54:38', '2022-07-23 05:54:38'),
(714, 1, 'rendi', 'rendi@gmail.com', '0897654738829', '$2y$10$CXYSdP3D1.8TkSGly5C5Tu1JbPgY/sHPR1.SHyNcR2CiPzd8Gnz62', 'siswa', 'aktif', '89087304820847', 'foto/WhatsApp_Image_2022-06-24_at_21.40.56-removebg-preview.png', 0, 'jambi', '0000-00-00', '', 'Islam', 'patimura kota jambi', '09', '05', NULL, 'kenali besar', '36361', 'Bersama Orang Tua', 'Motor', NULL, 'Ya', NULL, 'joko', '1987', 'SMA', 'swasta', 3000000, NULL, 'rita', 1990, 'SMA', 'irt', NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, 'tidak ada', 'smp 19 kota jambi', 2, NULL, NULL, NULL, 56, NULL, NULL, 3, NULL, '2022-07-23 06:06:58', '2022-07-23 06:06:58'),
(715, NULL, 'Rika Apriani S.Pd', 'rika@gmail.com', '089756536728', '$2y$10$UdQmsvkUcS8WcEx21FHaWumiVEjLpNHzD6vP1MITdHf0ETBAqmSEm', 'guru', 'aktif', '937493492802', NULL, 0, NULL, '0000-00-00', '', 'Islam', 'kota baru', '23', '32', NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-07-24 18:43:46', '2022-07-24 18:43:46'),
(716, NULL, 'darmawi  S.Or', 'darmawi@gmail.com', '089678987087', '$2y$10$.11ZhrBF0byz348jGBXVROZcA6eFmh9kzh8WCkww2OAAZQLQ42y6i', 'guru', 'aktif', '39459759301847', NULL, 0, NULL, '0000-00-00', '', 'Islam', 'jambi selatan', '23', '01', NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-07-24 18:45:37', '2022-07-24 18:45:37'),
(717, NULL, 'joko pramono S.Pd', 'joko@gmail.com', '0895338399500', '$2y$10$5esPiFyhSkCZ7tFr7YPxSOLhCFyrt5ZYsWoEt2ECgiaz3Orv5CzZK', 'guru', 'aktif', '90839748728742', NULL, 0, NULL, '0000-00-00', '', 'Islam', 'simpang rimbo', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', '', 0, '', '', 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:10:41', '2022-08-03 22:10:41'),
(718, NULL, 'dela fitrian', 'dela@gmail.com', '087667286354', '$2y$10$6655AwkRtYFPwZ4TOF0.7OVD8UGID6BhzlzvJIYhDObcthLwnuuYK', 'guru', 'aktif', '983972387823', NULL, 0, NULL, '0000-00-00', '', 'Islam', 'simpang rimbo', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:18:17', '2022-08-03 22:18:17'),
(719, NULL, 'sri mulyono S.Pd', 'sri@gmail.com', '089766546728', '$2y$10$/ztz1QHoLiaApRS4LDVnv.427YBGpnNOg92YdhGt9VGWr4mDDqAxO', 'guru', 'aktif', '02882627636536', NULL, 0, 'medan', '0000-00-00', '', 'Islam', 'kenali asam bawah', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:22:12', '2022-08-03 22:22:12'),
(720, NULL, 'herlin S.Pd', 'herlin@gmail.com', '08263537818', '$2y$10$iEyuRAZygoDiMEswjAiLjOqDEPapQniq5bTuUmdBVMlE0oEe1NLGy', 'guru', 'aktif', '02483974837537', NULL, 0, 'jawa tengah', '0000-00-00', '', 'Islam', 'kenali asam atas', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:25:45', '2022-08-03 22:25:45'),
(721, NULL, 'rike putri ani S.Pd', 'rike@gmail.com', '08363582827778', '$2y$10$M8YA7TFRv7Oa8A6C9Q9A6.ZsZW15U3M4R.D9i/iL1IHSRa5jLuCvq', 'guru', 'aktif', '834938394940', NULL, 0, 'gorontalo', '0000-00-00', '', 'Islam', 'kenali asam atas', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:28:14', '2022-08-03 22:28:14'),
(722, NULL, 'iis Damayanti S.Pd', 'iis@gmail.com', '0839768362762', '$2y$10$cOk8Ydhob7Vqu0/n5UHw3uSPqy3EcAV15tyMjdDhkZ3Uhgl9B8BBS', 'guru', 'aktif', '8908730482084798', NULL, 0, 'jambi', '0000-00-00', '', 'Islam', 'kenali asam atas', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:32:22', '2022-08-03 22:32:22'),
(723, NULL, 'Nisna Wati S.Pd', 'nisna@gmail.com', '089277363323', '$2y$10$5ClOJXfNJUGmCNQmC2UHUuX//J4PoLWS3K7PO1VvebANit/hbqYOe', 'guru', 'aktif', '8337637637', NULL, 0, 'jambi', '0000-00-00', '', 'Islam', 'jelutung', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:34:48', '2022-08-03 22:34:48'),
(724, NULL, 'dina aprilia S.Pd', 'dina@gmail.com', '099378378378', '$2y$10$HPXhWq.8ySHglI1H6PskjeKFCXBllEeFI8nNX9py5drgkxPo8bRRW', 'guru', 'aktif', '397387387', NULL, 0, 'jambi', '0000-00-00', '', 'Islam', 'bagan pete', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:38:19', '2022-08-03 22:37:16'),
(725, NULL, 'lia marlina S.Pd', 'lia@gmail.com', '0897867675646', '$2y$10$u.kSjp0yDdwUIJVdyHn0jeMh88RNwndqLrs7rDYvy6f727DXX.Kcu', 'guru', 'aktif', '837487597595', NULL, 0, 'jambi', '0000-00-00', '', 'Islam', 'bagan pete', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:41:24', '2022-08-03 22:41:24'),
(726, NULL, 'dahlan ahmad S.Pd', 'dahlan@gmail.com', '08978676897', '$2y$10$leee5zsYTC/I.W6AoxueE.FflcGDysDwSiZQkwDbBngJjX3CAP.h.', 'guru', 'aktif', '9782763563536', NULL, 0, 'jambi', '0000-00-00', '', 'Islam', 'sungai gelam', NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Tidak', 0, NULL, NULL, 'SD', NULL, 0, NULL, NULL, 0000, 'SD', NULL, 0, '', NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2022-08-03 22:43:46', '2022-08-03 22:43:46'),
(728, 1, 'andre', 'andre@gmail.com', '082234567879', '$2y$10$l.Ks4GcrUDb9dL2iuF2Toe.gUGlMsczRfjZTJJCAxk2Nrn2QdNh2S', 'siswa', 'aktif', '08997878', NULL, NULL, NULL, NULL, NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, 'Bersama Orang Tua', 'Mobil', NULL, 'Ya', NULL, NULL, NULL, 'SD', NULL, NULL, NULL, NULL, NULL, 'SD', NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-29 04:33:01', '2022-08-29 04:33:01'),
(729, 1, 'wati', 'wati@gmai.com', '089756536728', '$2y$10$HYm6RkrFMNJfNKQdpfJu4.0l.1ZXrHFxtAkdetfFev4tKQbffho4m', 'siswa', 'aktif', '9238747367', NULL, 0, 'jambi', '1998-12-31', '01287326376273627', 'Islam', 'jambi', '01', '01', 'jambi', 'jambi', '87675', 'Bersama Orang Tua', 'Mobil', '92739273827382', 'Tidak', NULL, 'adi', '1987', 'SD', 'swasta', 90, '10928398237', 'ira', 1989, 'SD', 'swasta', 90, '09393894787', '0129938989', '9108398287', 'Tidak', NULL, 'wati', '29347284787', NULL, 'bri', '9137847867', 'wati', 'Ya', 'ya', 'tidak', 'smp 10', 2, '90', '90', '9238924787', 76, NULL, 12, 3, 7, '2022-08-29 04:51:20', '2022-08-29 04:51:20');

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
  ADD KEY `absensi_id` (`absensi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `guru_detail`
--
ALTER TABLE `guru_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `informasi_id` (`informasi_id`);

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
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `mapel_details_ibfk_1` (`kelas_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `absensi_details`
--
ALTER TABLE `absensi_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru_detail`
--
ALTER TABLE `guru_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelass`
--
ALTER TABLE `kelass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mapel_details`
--
ALTER TABLE `mapel_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilai_details`
--
ALTER TABLE `nilai_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `raports`
--
ALTER TABLE `raports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=730;

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
  ADD CONSTRAINT `absensi_details_ibfk_1` FOREIGN KEY (`absensi_id`) REFERENCES `absensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_details_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_detail`
--
ALTER TABLE `guru_detail`
  ADD CONSTRAINT `guru_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
