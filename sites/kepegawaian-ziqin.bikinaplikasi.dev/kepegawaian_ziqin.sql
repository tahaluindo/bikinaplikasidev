-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 20, 2022 at 07:14 AM
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
-- Database: `kepegawaian_ziqin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gaji` mediumint(9) NOT NULL DEFAULT 0,
  `tunjangan` mediumint(9) NOT NULL DEFAULT 0,
  `bonus` mediumint(9) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `gaji`, `tunjangan`, `bonus`) VALUES
(1, 'Bagian Tata Usaha', 1000000, 100000, 1000000),
(2, 'Seksi Pendidikan Madrasah', 1000000, 100000, 100000),
(3, 'Seksi Haji Dan Umroh', 1000000, 100000, 100000),
(66, 'Seksi Pendidikan Agama Islam', 10000, 10000, 1000000),
(67, 'Penyelenggara Zakat dan Wakaf', 1500000, 100000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_mulai_kerja` varchar(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_telp`, `tgl_mulai_kerja`, `status`) VALUES
(1009, '', 'Andi Izzul Haq, S.Kom', '13-Mar-1996', 'Tangkit Baru', 'Laki - Laki', 'Islam', 'jln syekh muh said II RT 04', '082342134134', '01-Jan-2020', 'Aktif'),
(1010, '', 'Besse Aisyah, S.E', '16-Apr-1997', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 03', '085731615314', '01-Feb-2014', 'Aktif'),
(1011, '', 'Baso Sidik', '10-Sep-1996', 'Tangkit Baru', 'Laki - Laki', 'Islam', 'jln syekh muh said II RT 04', '08572625315', '15-Feb-2014', 'Aktif'),
(1012, '', 'Drs. Andi Pajung', '25-Okt-1989', 'Tangkit Baru', 'Laki - Laki', 'Islam', 'jln syekh muh said II RT 04', '085728316418', '10-Feb-2013', 'Aktif'),
(1013, '', 'Masturi,S.Ag', '31-Agu-1990', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 07', '0856353422', '04-Feb-2016', 'Aktif'),
(1014, '', 'Nur Aida', '16-Mar-1999', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 02', '081542637262', '10-Feb-2018', 'Aktif'),
(1015, '', 'Nur Atifa,S.Pd.I', '25-Des-1997', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 03', '085823721626', '03-Feb-2018', 'Aktif'),
(1016, '', 'Ratnawati,S.Pd', '10-Mar-1998', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 05', '0857429328328', '05-Feb-2016', 'Aktif'),
(1017, '', 'Dahlia, S.Pd', '07-Mar-1998', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 03', '085237283272', '02-Feb-2018', 'Aktif'),
(1018, '', 'Siti Sainab', '11-Mar-1998', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 06', '081234828328', '18-Feb-2018', 'Aktif'),
(1019, '', 'Hermawati,S.Fil.I', '18-Mei-1989', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 06', '08127433496', '08-Feb-2017', 'Aktif'),
(1020, '', 'Andi Nur Auliyyah,S.Pd', '20-Jun-1990', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 04', '085728323212', '16-Feb-2017', 'Aktif'),
(1021, '', 'Ahmad, S.Pd.I', '25-Okt-1980', 'Tangkit Baru', 'Laki - Laki', 'Islam', 'jln syekh muh said II RT 06', '082395283288', '06-Feb-2016', 'Aktif'),
(1022, '', 'Siti Juhria', '15-Jul-1999', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 07', '085788004395', '01-Feb-2020', 'Aktif'),
(1023, '', 'Rizki Indah Oktalia', '10-Okt-1998', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 06', '082283335849', '01-Feb-2020', 'Aktif'),
(1025, '', 'Andi Nur Wahidiah, S.Mat', '24-Nov-1988', 'Tangkit Baru', 'Perempuan', 'Islam', 'jln syekh muh said II RT 06', '08127364271', '15-Feb-2018', 'Aktif'),
(1026, '', 'Muhammad Ashari, S.Sos', '23-Agu-1980', 'muaro jambi', 'Laki - Laki', 'Islam', 'kota jambi', '081367714581', '01-Feb-2018', 'Aktif'),
(1027, '118200928881', 'Syakila Melodhy', '10-Mei-2000', 'Bogor', 'Perempuan', 'Islam', 'Jl. Amirudin Tanjab Barat No. 10 Kel. Medan Kec. Parit Rantang Mudiak, Kota Lubuk Basung, Sumatra Barat', '08972818882312', '14-Mei-2021', 'Aktif'),
(1028, '255234111', 'Jerremy Firdaus', '12-Jun-1998', 'Jambi', 'Laki - Laki', 'Islam', 'Jl. Tanjakan no.15 Kel. Pasir', '08955342342', '01-Mei-2022', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `gaji` mediumint(9) NOT NULL,
  `tunjangan` mediumint(9) NOT NULL,
  `bonus` mediumint(9) UNSIGNED NOT NULL,
  `potongan` mediumint(9) UNSIGNED NOT NULL,
  `periode` varchar(15) NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id`, `pegawai_id`, `gaji`, `tunjangan`, `bonus`, `potongan`, `periode`, `tahun`, `tanggal`, `catatan`) VALUES
(60, 1010, 0, 100000, 0, 300000, 'Januari', 2020, '23-Feb-2020', 'tttttt'),
(63, 1027, 0, 10000, 1000000, 0, 'Mei', 2022, '30-Mei-2022', 'sip absensi full'),
(65, 1021, 0, 100000, 0, 0, 'Januari', 2018, '24-Jun-2022', 'te'),
(66, 1027, 0, 10000, 1000000, 0, 'April', 2017, '24-Jun-2022', 'ddd'),
(68, 1028, 1500000, 100000, 500000, 200000, 'Maret', 2022, '31-Mei-2022', 'te');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `gaji_jabatan` mediumint(9) UNSIGNED NOT NULL,
  `tunjangan_jabatan` mediumint(9) UNSIGNED NOT NULL,
  `bonus_jabatan` mediumint(9) UNSIGNED NOT NULL,
  `nomor_sk` varchar(30) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_jabatan`
--

INSERT INTO `riwayat_jabatan` (`id`, `pegawai_id`, `nama_jabatan`, `gaji_jabatan`, `tunjangan_jabatan`, `bonus_jabatan`, `nomor_sk`, `tanggal`, `status`) VALUES
(10, 1009, 'Bagian Tata Usaha', 1000000, 100000, 0, 'SK-51/YPP-RM/VII/2020', '03-Feb-2020', 'Tidak Aktif'),
(13, 1010, 'Penyelenggara Zakat dan Wakaf', 1500000, 100000, 0, '-', '01-Feb-2020', 'Tidak Aktif'),
(14, 1011, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '-', '01-Feb-2019', 'Tidak Aktif'),
(15, 1012, 'Seksi Pendidikan Agama Islam', 10000, 10000, 0, '-', '02-Feb-2019', 'Tidak Aktif'),
(16, 1013, 'Seksi Pendidikan Agama Islam', 10000, 10000, 0, '-', '03-Feb-2017', 'Tidak Aktif'),
(17, 1014, 'Penyelenggara Zakat dan Wakaf', 1500000, 100000, 0, '-', '02-Feb-2019', 'Tidak Aktif'),
(18, 1015, 'Seksi Pendidikan Agama Islam', 10000, 10000, 0, '-', '01-Feb-2018', 'Tidak Aktif'),
(19, 1016, 'Seksi Pendidikan Agama Islam', 10000, 10000, 0, '-', '03-Feb-2017', 'Tidak Aktif'),
(20, 1017, 'Seksi Pendidikan Madrasah', 1000000, 100000, 0, '-', '06-Feb-2016', 'Tidak Aktif'),
(21, 1018, 'Seksi Pendidikan Madrasah', 1000000, 100000, 0, '-', '02-Feb-2018', 'Tidak Aktif'),
(22, 1019, 'Bagian Tata Usaha', 1000000, 100000, 0, '-', '02-Feb-2018', 'Tidak Aktif'),
(23, 1020, 'Seksi Pendidikan Madrasah', 1000000, 100000, 0, '-', '02-Feb-2018', 'Tidak Aktif'),
(24, 1021, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '420/YRM/MA//TB/2016', '01-Jul-2016', 'Tidak Aktif'),
(25, 1022, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '-', '01-Feb-2020', 'Tidak Aktif'),
(26, 1023, 'Bagian Tata Usaha', 1000000, 100000, 0, '-', '02-Feb-2020', 'Tidak Aktif'),
(27, 1025, 'Penyelenggara Zakat dan Wakaf', 1500000, 100000, 0, '-', '02-Feb-2018', 'Tidak Aktif'),
(28, 1026, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '-', '01-Feb-2019', 'Tidak Aktif'),
(29, 1027, 'Bagian Tata Usaha', 1000000, 100000, 1000000, 'sk.01/003/9921', '03-Apr-2021', 'Tidak Aktif'),
(30, 1028, 'Seksi Pendidikan Agama Islam', 10000, 10000, 500000, 'sk.01/003/39118', '31-Mei-2022', 'Tidak Aktif');

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
  `last_activity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`, `created_at`, `updated_at`) VALUES
('fknPEhIUsUN94p2FT44mhEZkGuSNoeqx11Inf0ML', 1, '172.68.153.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36 Edg/103.0.1264.71', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoic1Jnc3dRaFVjMVpRVWtDZGpac3IwaWhINlNQQnFQakZ1T3lXYm5tcCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUxOiJodHRwczovL2tlcGVnYXdhaWFuLXppcWluLmJpa2luYXBsaWthc2kuZGV2L3BlZ2F3YWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMkJQL01xa2thNXBCa29uQ1oydFBiT0dLUzdTN0treEtzMmQyY0FzNjZ6YlRjZFJFSW9FeTYiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDJCUC9NcWtrYTVwQmtvbkNaMnRQYk9HS1M3UzdLa3hLczJkMmNBczY2emJUY2RSRUlvRXk2Ijt9', 1658810062, '2022-07-26 04:30:49', '2022-07-26 04:30:49'),
('J4IJfFff1coinH1oW7pyAT4nwbKE4Qh2h1QP8daf', NULL, '172.68.153.147', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWRKaVJ2dVBhdm0zVzdEQTdoUU9qWGtvb2xpSWVGU2t2UEZaZHNNRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8va2VwZWdhd2FpYW4temlxaW4uYmlraW5hcGxpa2FzaS5kZXYvbG9naW4iO319', 1658795989, '2022-07-26 00:39:19', '2022-07-26 00:39:19'),
('kwfQlm3DSvzRJnOqzkwT4yob7MhEriTtjKdGrp9Z', 1, '162.158.170.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36 Edg/103.0.1264.71', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZzRQSkdqOTJkWjR5dGVxUGkyZlhEMFp5RU9hZ2ttVmNla2J2ZUJQTiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwczovL2tlcGVnYXdhaWFuLXppcWluLmJpa2luYXBsaWthc2kuZGV2L3R1Z2FzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDJCUC9NcWtrYTVwQmtvbkNaMnRQYk9HS1M3UzdLa3hLczJkMmNBczY2emJUY2RSRUlvRXk2IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQyQlAvTXFra2E1cEJrb25DWjJ0UGJPR0tTN1M3S2t4S3MyZDJjQXM2NnpiVGNkUkVJb0V5NiI7fQ==', 1658889996, '2022-07-27 02:31:03', '2022-07-27 02:31:03'),
('mCaW40WdJ1apc16MkRKDx6yOMSPADErybWo5cn6Z', NULL, '162.158.43.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36 Edg/103.0.1264.71', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR0RVSnVpaHQ5UlpaM2NESW44M1FFcDFUTDJBbXZKQlduTnZkQnF3OSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cHM6Ly9rZXBlZ2F3YWlhbi16aXFpbi5iaWtpbmFwbGlrYXNpLmRldi90dWdhcyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwczovL2tlcGVnYXdhaWFuLXppcWluLmJpa2luYXBsaWthc2kuZGV2L3R1Z2FzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658809814, '2022-07-26 04:30:14', '2022-07-26 04:30:14'),
('P7Oz6wbPAin7fUP8LpgWPUOGxlxEvi6SAnALrcpM', 1, '172.68.153.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieGplekdpRFdGZllqdU9hNGRhSTFnRGtDbFVabUJ1U2RQV0oxZ3VkViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8va2VwZWdhd2FpYW4temlxaW4uYmlraW5hcGxpa2FzaS5kZXYvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDJCUC9NcWtrYTVwQmtvbkNaMnRQYk9HS1M3UzdLa3hLczJkMmNBczY2emJUY2RSRUlvRXk2IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQyQlAvTXFra2E1cEJrb25DWjJ0UGJPR0tTN1M3S2t4S3MyZDJjQXM2NnpiVGNkUkVJb0V5NiI7fQ==', 1658764177, '2022-07-25 15:49:37', '2022-07-25 15:49:37'),
('q6vU0T6YF86GcTSCGJ6DJ2kQgymd7QmvzpYjIKjb', NULL, '172.68.153.175', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVJtdDNzSFczdGJVUnRMclBCekFua010eEdtRVRuZjFYZHhORkpIRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8va2VwZWdhd2FpYW4temlxaW4uYmlraW5hcGxpa2FzaS5kZXYvbG9naW4iO319', 1658757967, '2022-07-25 14:04:21', '2022-07-25 14:04:21'),
('TYzz8KFg0qSYZU0UsTt9afe9HIrQ9AEju09W6IHz', NULL, '172.70.147.52', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUFpWnFFb3ZabEttTjJoY1dNbDJjR2owWEloRUF6dEZxak1mNjNDUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8va2VwZWdhd2FpYW4temlxaW4uYmlraW5hcGxpa2FzaS5kZXYvbGlzdGluZy1wcm9ncmFtIjt9fQ==', 1658895207, '2022-07-27 04:13:20', '2022-07-27 04:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) NOT NULL,
  `pegawai_id` int(20) DEFAULT NULL,
  `nomor_st` varchar(50) DEFAULT NULL,
  `tugas` varchar(50) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `pegawai_id`, `nomor_st`, `tugas`, `file`, `catatan`, `created_at`, `updated_at`) VALUES
(4, 1013, 'sk0192', 'tes', 'uploads/1656063573modern-colored-poster-sports.zip', 'RRR', '2022-06-24 16:39:33', '2022-06-24 16:39:33'),
(5, 1018, 'sk001', 'tes', 'C:\\xampp7326\\tmp\\php2EA9.tmp', 'b', '2022-06-24 17:04:27', '2022-06-26 07:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin1', 'admin@gmail.com', '$2y$10$2BP/Mqkka5pBkonCZ2tPbOGKS7S7KkxKs2d2cAs66zbTcdREIoEy6'),
(2, 'STAF', 'staf@gmail.com', '$2y$10$DJJud7t6/2QGlAmkvtj15eaAyD68Xhxchj/5EqM6AFeBNTLW5iOAG'),
(3, 'KEPALA', 'kepala@gmail.com', '$2y$10$lWAcL6haikhHrAzmi3XH/unLGokHzUWLBc6ajZGiet3/UYZoo8nOK'),
(4, 'Guru08972818882312', 'staf1@gmail.com', '$2y$10$DJJud7t6/2QGlAmkvtj15eaAyD68Xhxchj/5EqM6AFeBNTLW5iOAG'),
(5, 'Guru08955342342', 'guru08955342342@gmail.com', '$2y$10$IhcUgxK8/DcYpOwH1WbgsenIdVI3Bu5.5CmD5/XRPRClJmPckjf2W');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_jabatan_ibfk_1` (`pegawai_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `riwayat_jabatan_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
