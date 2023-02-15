-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 07:23 PM
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
(1, 'Bagian Tata Usaha', 2000000, 500000, 800000),
(2, 'Seksi Pendidikan Madrasah', 2500000, 2000000, 1000000),
(3, 'Seksi Haji Dan Umroh', 3000000, 1500000, 2000000),
(66, 'Seksi Pendidikan Agama Islam', 3000000, 2500000, 1000000),
(67, 'Penyelenggara Zakat dan Wakaf', 1500000, 1500000, 2000000),
(69, 'kepala', 4000000, 3000000, 2500000);

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
(1009, '19651111 199603 1 001', 'H. Muslim, S.Ag, M,Sy', '13-Mar-1996', 'Tangkit Baru', 'Laki - Laki', 'Islam', 'jln syekh muh said', '082342134134', '01-Jan-2020', 'Aktif'),
(1010, '19680807 199303 1 003', 'Suyitno', '16-Apr-1997', 'Muara Bungo', 'Laki - Laki', 'Islam', 'jln. gajah mada', '085231615316', '01-Feb-2014', 'Aktif'),
(1011, '19820428 200501 2 003', 'Marfuah, S.Pd.I', '10-Sep-1996', 'Pijoan', 'Perempuan', 'Islam', 'jln jendral sudirman', '087832678828', '15-Feb-2014', 'Aktif'),
(1012, '19840904 201411 1 001', 'Paisal, S.Pd.I', '25-Okt-1989', 'muara jambi', 'Laki - Laki', 'Islam', 'jln agus salim', '085226739276', '04-Sep-2004', 'Aktif'),
(1013, '19720217 199802 2 002', 'Irsiana, A. Md', '15-Agu-1986', 'jambi', 'Perempuan', 'Islam', 'jln jendral sudirman', '085635342274', '07-Apr-2016', 'Aktif'),
(1014, '19720101199304 1 001', 'Mukhlis, S.Ag, M.Pd.I', '11-Mar-1999', 'terusan', 'Laki - Laki', 'Islam', 'terusan', '082281786373', '03-Jan-2008', 'Aktif'),
(1015, '19690319 200604 1 002', 'Suhaimi, A.Ma', '12-Des-1997', 'tembesi', 'Laki - Laki', 'Islam', 'tembesi', '085823721626', '03-Feb-2018', 'Aktif'),
(1016, '19771117 200112 2 001', 'Hj. Novikawati, S.Ag', '09-Jul-1987', 'jambi', 'Perempuan', 'Islam', 'muara bulian', '0857429328328', '20-Feb-2015', 'Aktif'),
(1017, '19800120 200501 1 007', 'Rasid Ridho Lubis, A.Ma', '04-Sep-1998', 'batang hari', 'Laki - Laki', 'Islam', 'muara bulian', '085237226373', '04-Feb-2017', 'Aktif'),
(1018, '19631231 199603 1 006', 'Raden Abdussomad, S.Ag', '11-Mar-1998', 'bukit tinggi', 'Laki - Laki', 'Islam', 'mayang mangurai, muara bulian', '081234828328', '03-Mei-2018', 'Aktif'),
(1019, '19830103 200901 1 009', 'Meky Ansori, S.Pd.I', '27-Mei-1989', 'jambi', 'Laki - Laki', 'Islam', 'jln jendral sudirman', '08127433496', '10-Feb-2017', 'Aktif'),
(1020, '19631231 200111 1 001', 'Drs. Mohd. Sayuti', '20-Jun-1990', 'Muara Bungo', 'Laki - Laki', 'Islam', 'muara bulian', '085238294268', '06-Apr-2017', 'Aktif'),
(1021, '19790320 199802 2 001', 'Maryulina, S.Pd.I', '21-Okt-1980', 'tenam', 'Laki - Laki', 'Islam', 'tenam', '082395283288', '30-Jul-2016', 'Aktif'),
(1022, '19850507 200901 1 003', 'Khairul Saleh, S.Pd.I', '04-Apr-1984', 'kuala tungkal', 'Laki - Laki', 'Islam', 'jln panglima h. saman', '085788004395', '11-Sep-2014', 'Aktif'),
(1023, '19690808 199103 1 003', 'Hudeli, S.Ag', '22-Okt-1998', 'batang hari', 'Perempuan', 'Islam', 'muara bulian', '082283335849', '13-Feb-2020', 'Aktif'),
(1025, '19740209 200012 1 001', 'Helmi, S.Ag', '11-Nov-1988', 'sabak', 'Laki - Laki', 'Islam', 'muara bulian', '081273746522', '07-Jun-2018', 'Aktif'),
(1026, '19801118 200901 2 007', 'Leniyati, S.Sos.I, M. Ud', '23-Agu-1980', 'muaro jambi', 'Laki - Laki', 'Islam', 'kota jambi', '081367714581', '01-Feb-2018', 'Aktif'),
(1027, '19750222 200112 2 002', 'Hj. Sri Ratni, S.ag', '24-Mei-2000', 'Bogor', 'Perempuan', 'Islam', 'jln. gajah mada', '08972818882312', '10-Mei-2014', 'Aktif'),
(1028, '19780808 201412 1 003', 'Akhmad Syargawi', '12-Jun-1998', 'tangkit', 'Laki - Laki', 'Islam', 'kampung tengah', '08955342342', '12-Mei-2017', 'Aktif');

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
(60, 1018, 1500000, 100000, 0, 300000, 'Januari', 2020, '23-Feb-2020', 't'),
(63, 1009, 1000000, 100000, 0, 1000000, 'Mei', 2020, '30-Mei-2022', NULL),
(65, 1022, 1000000, 100000, 0, 500000, 'Januari', 2018, '24-Jun-2022', 'y'),
(66, 1016, 1000000, 100000, 0, 0, 'April', 2017, '24-Jun-2022', NULL),
(68, 1028, 1000000, 100000, 500000, 1000000, 'Maret', 2022, '31-Mei-2022', 'te');

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
(10, 1009, 'Seksi Pendidikan Madrasah', 1000000, 100000, 0, 'SK-51/YPP-RM/VII/2020', '11-Jun-2021', 'Aktif'),
(13, 1010, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '-', '13-Sep-2019', 'Aktif'),
(14, 1011, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '-', '01-Feb-2019', 'Aktif'),
(15, 1012, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '-', '07-Mar-2019', 'Aktif'),
(16, 1013, 'Seksi Pendidikan Madrasah', 1000000, 100000, 0, '-', '04-Jul-2018', 'Aktif'),
(17, 1014, 'Penyelenggara Zakat dan Wakaf', 1500000, 100000, 0, '-', '22-Des-2021', 'Aktif'),
(18, 1015, 'Penyelenggara Zakat dan Wakaf', 1500000, 100000, 0, '-', '10-Mar-2017', 'Tidak Aktif'),
(19, 1016, 'Seksi Pendidikan Madrasah', 1000000, 100000, 0, '-', '14-Okt-2017', 'Aktif'),
(20, 1017, 'Bagian Tata Usaha', 1000000, 100000, 0, '-', '06-Feb-2016', 'Aktif'),
(21, 1018, 'Penyelenggara Zakat dan Wakaf', 1500000, 100000, 0, '-', '30-Agu-2018', 'Aktif'),
(22, 1019, 'Seksi Haji Dan Umroh', 1000000, 100000, 0, '-', '21-Jun-2019', 'Aktif'),
(23, 1020, 'Bagian Tata Usaha', 1000000, 100000, 0, '-', '02-Feb-2018', 'Tidak Aktif'),
(24, 1021, 'Bagian Tata Usaha', 1000000, 100000, 0, '420/YRM/MA//TB/2016', '01-Jul-2016', 'Aktif'),
(25, 1022, 'Seksi Pendidikan Madrasah', 1000000, 100000, 0, '-', '06-Jun-2019', 'Aktif'),
(26, 1023, 'Seksi Pendidikan Agama Islam', 10000, 10000, 0, '-', '20-Okt-2018', 'Aktif'),
(27, 1025, 'Bagian Tata Usaha', 1000000, 100000, 0, '-', '15-Feb-2018', 'Aktif'),
(28, 1026, 'Bagian Tata Usaha', 1000000, 100000, 0, '-', '01-Feb-2019', 'Aktif'),
(29, 1027, 'Seksi Pendidikan Agama Islam', 10000, 10000, 1000000, 'sk.01/003/9921', '17-Apr-2021', 'Aktif'),
(30, 1028, 'Seksi Haji Dan Umroh', 1000000, 100000, 500000, 'sk.01/003/39118', '20-Mei-2022', 'Aktif');

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
('p6MNZw1ZNMsY79JCGASfHxwU6DmlvvsLtVkS0mEQ', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36 Edg/104.0.1293.63', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicHlIUW4wT2FwRWVEWmpRMm42UjV2b0FOUFZjWTZQMkE2TDFZZGMwdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njc6Imh0dHA6Ly9sb2NhbGhvc3Qva2VwZWdhd2FpYW4temlxaW4uYmlraW5hcGxpa2FzaS5kZXYvcHVibGljL2phYmF0YW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMkJQL01xa2thNXBCa29uQ1oydFBiT0dLUzdTN0treEtzMmQyY0FzNjZ6YlRjZFJFSW9FeTYiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDJCUC9NcWtrYTVwQmtvbkNaMnRQYk9HS1M3UzdLa3hLczJkMmNBczY2emJUY2RSRUlvRXk2Ijt9', 1661291204, '2022-08-23 21:38:31', '2022-08-23 21:38:31'),
('PLryq3cLP2EXBd1pZwtraX29jG4hLSXM1VMJkQX0', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36 Edg/104.0.1293.63', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRHFpcUFtOElQVldLemdMUlFrTWJpZGZoMzZFNXJEWExwa0wyUU9wMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHA6Ly9sb2NhbGhvc3Qva2VwZWdhd2FpYW4temlxaW4uYmlraW5hcGxpa2FzaS5kZXYvcHVibGljL3R1Z2FzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGxXQWNMNmhhaWtoSHJBem1pM1hIL3VuTEdva0h6VVdMQmM2YWpaR2lldDMvVVlab284bk9LIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRsV0FjTDZoYWlraEhyQXptaTNYSC91bkxHb2tIelVXTEJjNmFqWkdpZXQzL1VZWm9vOG5PSyI7fQ==', 1661268625, '2022-08-23 15:30:20', '2022-08-23 15:30:20');

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
(5, 1018, 'sk001', 'tes', 'uploads/bg_zoom.jpg', 'b', '2022-06-24 17:04:27', '2022-08-22 21:18:32');

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
(3, 'KEPALA', 'kepala@gmail.com', '$2y$10$lWAcL6haikhHrAzmi3XH/unLGokHzUWLBc6ajZGiet3/UYZoo8nOK'),
(6, 'Guru08977664454', 'guru08977664454@gmail.com', '$2y$10$OJYUmrp3E2aXDdnA.VQeyOGS4AgSEYqR/6G51dyi4K6zjPth.CDxS');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
