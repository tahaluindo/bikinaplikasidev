-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2022 pada 03.06
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_permohonan` varchar(30) NOT NULL,
  `tanggal_mulai` varchar(11) NOT NULL,
  `tanggal_selesai` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id`, `karyawan_id`, `nomor_permohonan`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`) VALUES
(1005, 1028, '01', '02-Feb-2022', '04-Feb-2022', 'Keluar Kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gaji_pokok` mediumint(9) NOT NULL DEFAULT 0,
  `bpjs` mediumint(9) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `gaji_pokok`, `bpjs`) VALUES
(67, 'KHT', 2700000, 1000000),
(68, 'BHL', 2700000, 1000000),
(69, 'Mandor KHT', 3000000, 1000000),
(70, 'Mandor BHL', 3300000, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `lokasi` enum('Afdeling 1','Afdeling 2','Afdeling 3','Afdeling 4') NOT NULL,
  `nik` varchar(50) NOT NULL,
  `tempat_tanggal_lahir` varchar(50) NOT NULL,
  `pendidikan` enum('SD','SMP','SMA','D3','S1','S2','S3') NOT NULL,
  `agama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`, `jenis_kelamin`, `lokasi`, `nik`, `tempat_tanggal_lahir`, `pendidikan`, `agama`) VALUES
(1028, 'Waljinah', 'Suko Alwin', 'Laki - Laki', 'Afdeling 1', '1571070901980003', 'rantau benar, kuala tungkal', 'SMP', 'Islam'),
(1030, 'Imam Rohim', 'Suko Alwin', 'Laki - Laki', 'Afdeling 1', '1505022808650001', 'Jambi / 04-05-1970', 'SMP', 'Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `gaji` mediumint(9) NOT NULL,
  `bpjs` mediumint(9) NOT NULL,
  `bonus` mediumint(9) UNSIGNED NOT NULL,
  `hutang` int(11) NOT NULL DEFAULT 0,
  `periode` varchar(15) NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penggajian`
--

INSERT INTO `penggajian` (`id`, `karyawan_id`, `gaji`, `bpjs`, `bonus`, `hutang`, `periode`, `tahun`, `tanggal`, `catatan`) VALUES
(61, 1028, 2700000, 50000, 0, 0, 'Januari', 2022, '01-Feb-2022', 'sakit demam'),
(62, 1030, 3000000, 100000, 0, 50000, 'Januari', 2022, '03-Feb-2022', 'sakit tenggorokan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `gaji_pokok` mediumint(9) UNSIGNED NOT NULL,
  `bpjs` mediumint(9) UNSIGNED NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_jabatan`
--

INSERT INTO `riwayat_jabatan` (`id`, `karyawan_id`, `nama_jabatan`, `gaji_pokok`, `bpjs`, `tanggal`, `status`) VALUES
(29, 1028, 'KHT', 2700000, 1000000, '02-Feb-2022', 'Aktif'),
(30, 1030, 'Mandor KHT', 3000000, 1000000, '03-Feb-2022', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `session`
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
-- Dumping data untuk tabel `session`
--

INSERT INTO `session` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`, `created_at`, `updated_at`) VALUES
('u1u5z89PRfOKGTkNhZyHD5jjH9pyOwS1w2pekhIB', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibXhGTnNkM3hXb3FhS1B5WElwdWlMREc5ZUNNbFkzTlRkRzc2UnBpTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6MTAwMC9yaXdheWF0X2phYmF0YW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVGNYbzdaM25aMGxhTVlLZEZ3V2xyLnh3dEI3V0VaN29jN0VWaUg4N1M5RXgzSDlraTgvNFciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFRjWG83WjNuWjBsYU1ZS2RGd1dsci54d3RCN1dFWjdvYzdFVmlIODdTOUV4M0g5a2k4LzRXIjt9', 1643870814, '2022-02-03 06:46:36', '2022-02-03 06:46:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rancangan_upah_harian`
--

CREATE TABLE `rancangan_upah_harian` (
  `id` int(10) UNSIGNED NOT NULL,
  `karyawan_id` int(10) UNSIGNED NOT NULL,
  `jenis_pekerjaan` enum('Piringan') NOT NULL,
  `blok` enum('Afdeling 1','Afdeling 2','Afdeling 3') NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_satuan` smallint(6) NOT NULL,
  `jam_kerja` tinyint(4) NOT NULL,
  `total` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rancangan_upah_harian`
--

INSERT INTO `rancangan_upah_harian` (`id`, `karyawan_id`, `jenis_pekerjaan`, `blok`, `satuan`, `harga_satuan`, `jam_kerja`, `total`, `catatan`, `periode`) VALUES
(1, 1028, 'Piringan', 'Afdeling 1', '1.666 Pokok', 2500, 6, 4165000, NULL, '03-Feb-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$r9RuUY6LhVjZv1tFKcMPyecqmu4Qj78tm7UFUSt2okBwVXrscXCIm'),
(2, 'Personalia', 'personalia@gmail.com', '$2y$10$TcXo7Z3nZ0laMYKdFwWlr.xwtB7WEZ7oc7EViH87S9Ex3H9ki8/4W');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuti_ibfk_1` (`karyawan_id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indeks untuk tabel `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_jabatan_ibfk_1` (`karyawan_id`);

--
-- Indeks untuk tabel `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `rancangan_upah_harian`
--
ALTER TABLE `rancangan_upah_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `rancangan_upah_harian`
--
ALTER TABLE `rancangan_upah_harian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `riwayat_jabatan_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
