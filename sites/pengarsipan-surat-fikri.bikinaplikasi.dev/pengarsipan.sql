-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 03:31 PM
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
-- Database: `pengarsipan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`) VALUES
(1, 'Sekretariat');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar_depan` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surat_masuk_id` bigint(20) UNSIGNED NOT NULL,
  `unit_kerja_sub_bagian_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rekrutmen_jabatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `waktu_disposisi` varchar(18) NOT NULL,
  `status` enum('Belum Ditindak Lanjuti','Sudah Ditindak Lanjuti') DEFAULT 'Belum Ditindak Lanjuti'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `surat_masuk_id`, `unit_kerja_sub_bagian_id`, `rekrutmen_jabatan_id`, `waktu_disposisi`, `status`) VALUES
(11, 12, 9, NULL, '07-Jul-2021 14:21', 'Belum Ditindak Lanjuti'),
(17, 20, 10, NULL, '14-Jul-2021 15:06', 'Sudah Ditindak Lanjuti');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(95, 'Outsoarching'),
(96, 'ADHOC');

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen`
--

CREATE TABLE `rekrutmen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `no_pendaftar` varchar(7) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha') NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `status` enum('Muara Bulian','Maro Sebo Ilir','Bajubang','Pemayung','Muara Tembesi','Batin XXIV','Mersam','Maro Sebo Ulu') NOT NULL,
  `dibuat` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('km6YSkLkCY7dKhpmx4JISMPD5A1JI1C5GI12ebEc', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV3R6MmtzekJEM3J6WWliQnJ1dnB6ZTRUeFJhdHczUmp0MVNZWE04ViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kaXNwb3Npc2kiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMXZtM0VOa1Mud1BzdS5sLlhuWjA4T1Zxd3hRSGZ5Z2ltSEZHVnpZaHpFbEVWM1Fld1UwRTIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDF2bTNFTmtTLndQc3UubC5YblowOE9WcXd4UUhmeWdpbUhGR1Z6WWh6RWxFVjNRZXdVMEUyIjt9', 1631021425);

-- --------------------------------------------------------

--
-- Table structure for table `sub_bagian`
--

CREATE TABLE `sub_bagian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bagian_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_bagian`
--

INSERT INTO `sub_bagian` (`id`, `bagian_id`, `nama`) VALUES
(3, 1, 'Sub Bagian Umum'),
(9, 1, 'Sub Bagian Program & Data'),
(10, 1, 'Sub Bagian Teknis'),
(12, 1, 'Sub Bagian Hukum'),
(13, 1, 'Sekretaris');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sifat_surat` varchar(30) NOT NULL,
  `user_unit_kerja_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_keluar` varchar(18) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `kepada` varchar(30) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `isi_ringkas` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `sifat_surat`, `user_unit_kerja_id`, `waktu_keluar`, `nomor`, `pengirim`, `perihal`, `kepada`, `bagian`, `isi_ringkas`, `lampiran`) VALUES
(4, 'resmi', 22, '07-Sep-2021 12:00', 'Nomor 1', 'asdasd', 'asdsad', 'Kepada 1', 'Bagian 1', 'asdasd', 'public/lampiran/ISN0iVZ3uiXBiIoSGj5mk64l7xQdO3NKXYsok8PS.txt');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sifat_surat` varchar(30) NOT NULL,
  `user_unit_kerja_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_masuk` varchar(18) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `isi_ringkas` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `sifat_surat`, `user_unit_kerja_id`, `waktu_masuk`, `nomor`, `pengirim`, `perihal`, `isi_ringkas`, `lampiran`) VALUES
(12, 'Penting', 1, '07-Jul-2021 12:00', '180/BAWASLU-PROV.JA-01/PM.00.01/I/2020', 'Bawaslu Kab. Batanghari', 'Himbauan Kepada Kepala Daerah', 'Himbauan Kepada Kepala Daerah Yang Melaksanakan Pemilihan Tahun 2020', 'public/lampiran/yEScEPaDbIib0udekTMOSOU8F2Xo0DTy3D05ivkn.pdf'),
(18, '-', 1, '08-Jul-2021 12:00', '019/0016/Bpem', 'Bupati Batanghari', 'Himbauan', 'Himbauan Kepala Daerah', 'public/lampiran/shc4Vs33j3DNpy9hWK6M2UuICQsRmDeciuHu5LwW.pdf'),
(19, '-', 1, '08-Jul-2021 12:00', '019/0016/Bpem.', 'Bupati Batanghari', 'Himbauan', 'Himbauan Kepala Daerah', 'public/lampiran/4pTsHemodY2RUKL9zhj3pv9S1nbRFHiACYTr3A0p.pdf'),
(20, '-', 22, '14-Jul-2021 12:00', '019.1/0016/Bpem', 'Bupati Batanghari', 'Himbauan', 'Himbauan Kepala Daerah', 'public/lampiran/Do115g9b2UCyEdxVea91d4zJulwXtbrBS1E9tcs4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sub_bagian_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `dibuat` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `user_id`, `sub_bagian_id`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`, `status`, `dibuat`) VALUES
(11, 22, 3, 'Murniati Ningsih, S.Pd., S.E', 'Perempuan', 'Muara Bulian', '+620', 'Aktif', '05-Jul-2021'),
(12, 23, 12, 'Ritonga Muchammad Annas, S.IP', 'Laki - Laki', 'Muara Bulian', '+6201', 'Aktif', '05-Jul-2021'),
(13, 24, 12, 'Mahyudin', 'Laki - Laki', 'Batin XXIV', '+6202', 'Aktif', '05-Jul-2021'),
(14, 25, 12, 'Zeto Wijaya Simanjuntak,', 'Laki - Laki', 'Jambi', '+6203', 'Aktif', '05-Jul-2021'),
(15, 26, 10, 'Febriansyah Kurniawan, S.E.', 'Laki - Laki', 'Muara Bulian', '+6217', 'Aktif', '05-Jul-2021'),
(16, 27, 10, 'Retno Sari Handayani, S.I.Kom', 'Laki - Laki', 'Muara Bulian', '+6271', 'Aktif', '05-Jul-2021'),
(17, 28, 10, 'Fadilah, A.Md', 'Laki - Laki', 'Muara Bulian', '-', 'Aktif', '05-Jul-2021'),
(18, 29, 10, 'Dwi Putri Sirait', 'Laki - Laki', 'Muara Bulian', '--', 'Aktif', '05-Jul-2021'),
(19, 30, 9, 'Febriyenti, S.E, M.M.', 'Perempuan', 'Muara Bulian', '+662', 'Aktif', '05-Jul-2021'),
(20, 31, 9, 'Asmaboti', 'Laki - Laki', 'Muara Bulian', '+63', 'Aktif', '05-Jul-2021'),
(21, 32, 3, 'Nilawati Agustin, S.Kom, M.M.', 'Laki - Laki', 'Muara Bulian', '+64', 'Aktif', '05-Jul-2021'),
(23, 33, 9, 'Fikri Alfrido', 'Laki - Laki', 'Bajubang', '083616', 'Aktif', '07-Jul-2021'),
(24, 35, 3, 'Muhammad Asfihani, S.E., M.E', 'Laki - Laki', 'Jambi', '3198921083', 'Aktif', '07-Jul-2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('Admin','Unit Kerja','Ketua','Rekrutmen') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unit Kerja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Admin 01', 'admin@gmail.com', '$2y$10$1vm3ENkS.wPsu.l.XnZ08OVqwxQHfygimHFGVzYhzElEV3QewU0E2', 'Admin'),
(20, 'Ketua', 'ketua@gmail.com', '$2y$10$FH.mWDusNQSjeiUAEVBZPuX2vJLDVibjATwNCwhsE9ZKsFpTTSQiK', 'Ketua'),
(22, 'Murniati Ningsih', 'murniatiningsih@gmail.com', '$2y$10$NI5MvZHzRCQx/Gzrmtfw4upujU5qY4hGbsvZVuWmZQNtxBpfIxQBa', 'Unit Kerja'),
(23, 'Ritonga Muchammad Annas, S.IP', 'anas@gmail.com', '$2y$10$bzhIu/hhMkWhGnz9o9F.U.IvcjxRie83WvGX.Lp/Rj20D7MGHH85u', 'Unit Kerja'),
(24, 'Mahyudin', 'mahyudin@gmail.com', '$2y$10$8gQ8MccYzwzcdpYp96bF/e3yhnnWjBcKbyo/PfVIWAPbxMKzk0NNy', 'Unit Kerja'),
(25, 'Zeto Wijaya Simanjuntak', 'zeto@gmail.com', '$2y$10$1hGjnbKG2db0tw2yHA8/9OVc8MZwexyHqbLpb4qrJPNbjkBVxiw16', 'Unit Kerja'),
(26, 'Febriansyah Kurrniawan', 'ferbriansyah@gmail.com', '$2y$10$yC/S55f.iO/3QJrv3hVHxe28Z4DDjkLo2PavaIFxzLJS3cN13w1U6', 'Unit Kerja'),
(27, 'Retno Sari Handayani', 'retno@gmail.com', '$2y$10$jlVP/mQMdV79bp5bEK3sQegY2O10GtBX11bqyrOq/PSDKeO8OZUCO', 'Unit Kerja'),
(28, 'Fadilah', 'fadilah@gmail.com', '$2y$10$1T/8Lav/OPRrCWGwYYzcA.7IQDgXxLCIBLP5J30S2fnAv/4JzkbpG', 'Unit Kerja'),
(29, 'Dwi Putri Sirait', 'dwi@gmail.com', '$2y$10$u3pmYqVPKMx8gaiqFiYAZOuiG7xmczCujBiLYY7l22.1QJhWvlD5e', 'Unit Kerja'),
(30, 'Febriyenti', 'febriyenti@gmail.com', '$2y$10$mCYqGNYwP0wG2mSjGCdFBudArlnVIOrZTzID60k11Kqe7RTYTdyE.', 'Unit Kerja'),
(31, 'Asmaboti', 'asmaboti@gmail.com', '$2y$10$5dEQUvfHdeLkgR6QqmiVNen6afTuDwV.Cf4OQ8n6ALr8FEDCr1ptO', 'Unit Kerja'),
(32, 'Nilawati Agustin', 'nilawati@gmail.com', '$2y$10$3FDV3wWl9ak9HM9sUovQZOB6b5t5zzeP.KiwKFH5b3c2skcJPu2Vm', 'Unit Kerja'),
(33, 'fikri alfrido', 'fikri@gmail.com', '$2y$10$B0QxSv17Cs.x/lL836gcpe0by6Ng/iRdq1x2D0nQRGIsHR7h6ta4m', 'Unit Kerja'),
(35, 'Muhammad Asfihani', 'asfihani@gmail.com', '$2y$10$zgYr4QBbD/h0qx83BAelcOahLI7Y7AvfoRfdbzFe0ZifnpwlgMknm', 'Unit Kerja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_jabatan_id` (`rekrutmen_jabatan_id`),
  ADD KEY `surat_masuk_id` (`surat_masuk_id`),
  ADD KEY `unit_kerja_sub_bagian_id` (`unit_kerja_sub_bagian_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_bagian`
--
ALTER TABLE `sub_bagian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bagian_id` (`bagian_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_unit_kerja_id` (`user_unit_kerja_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_unit_kerja_id` (`user_unit_kerja_id`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sub_bagian_id` (`sub_bagian_id`);

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
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_bagian`
--
ALTER TABLE `sub_bagian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`rekrutmen_jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`surat_masuk_id`) REFERENCES `surat_masuk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_ibfk_3` FOREIGN KEY (`unit_kerja_sub_bagian_id`) REFERENCES `sub_bagian` (`id`);

--
-- Constraints for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  ADD CONSTRAINT `rekrutmen_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_bagian`
--
ALTER TABLE `sub_bagian`
  ADD CONSTRAINT `sub_bagian_ibfk_1` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_2` FOREIGN KEY (`user_unit_kerja_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_2` FOREIGN KEY (`user_unit_kerja_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD CONSTRAINT `unit_kerja_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_kerja_ibfk_3` FOREIGN KEY (`sub_bagian_id`) REFERENCES `sub_bagian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
