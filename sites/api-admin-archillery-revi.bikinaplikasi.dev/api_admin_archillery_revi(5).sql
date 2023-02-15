-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 11:39 AM
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
-- Database: `api_admin_archillery_revi`
--

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` mediumtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lPGkz7BeivVt49sojmnJm7kfQMigRby47z3Ysqzm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibEFpZEVoRWJoY0tITFhGRmpmYUh6M0tGekdIZ29pU1dBeTRZbkVudSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHdKdHhIbDBISGxSZXN3Tkl3dWNIS2VGNUlDWjByY3gxLmwuUVN5dlVSSkhrWm9WSU04MnIyIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR3SnR4SGwwSEhsUmVzd05Jd3VjSEtlRjVJQ1owcmN4MS5sLlFTeXZVUkpIa1pvVklNODJyMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6MTAwMC91c2VyIjt9fQ==', 1676253783),
('4gHjnAIPrLjuZjE2ev3Kx4ATMZEP95ziCDdNc9Yh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSGcwSUNZbVY3Z1p5UGduSUJZMVZ5YzlicTBkZ2hoNzJhNW5qVklVVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdDoxMDAwL3VzZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdDoxMDAwL3Nwb3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkd0p0eEhsMEhIbFJlc3dOSXd1Y0hLZUY1SUNaMHJjeDEubC5RU3l2VVJKSGtab1ZJTTgycjIiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHdKdHhIbDBISGxSZXN3Tkl3dWNIS2VGNUlDWjByY3gxLmwuUVN5dlVSSkhrWm9WSU04MnIyIjt9', 1676253880);

-- --------------------------------------------------------

--
-- Table structure for table `spot`
--

CREATE TABLE `spot` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spot`
--

INSERT INTO `spot` (`id`, `user_id`, `nama`, `gambar`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Spot 123', 'uploads/gambar ini dan gambar itu', 'location 1', '2022-12-29 05:08:12', '2022-12-29 05:08:12'),
(2, 1, 'Spot 123', 'uploads/gambar ini dan gambar itu', 'location 2', '2022-12-29 05:08:12', '2022-12-29 05:08:12'),
(3, 1, 'Spot 123', 'uploads/gambar ini dan gambar itu', 'location 3', '2022-12-29 05:08:12', '2022-12-29 05:08:12'),
(4, 148, 'ini adalah nama spot', 'uploads/1672463411.jpg', 'Unamar, Cabo Frio - State of Rio de Janeiro, Brazil', '2022-12-31 12:10:11', '2022-12-31 12:10:11'),
(5, 148, 'nama spotnya ada disini', 'uploads/1672463979.jpg', 'Jakarta, Indonesia', '2022-12-31 12:19:39', '2022-12-31 12:19:39'),
(6, 148, 'nama spotnya ada disini', 'uploads/1672464006.jpg', 'Jakarta, Indonesia', '2022-12-31 12:20:06', '2022-12-31 12:20:06'),
(7, 148, 'nama spotnya ada disini', 'uploads/1672464063.jpg', 'Jakarta, Indonesia', '2022-12-31 12:21:03', '2022-12-31 12:21:03'),
(8, 148, 'nama spotnya ada disini', 'uploads/1672464188.jpg', 'Jakarta, Indonesia', '2022-12-31 12:23:08', '2022-12-31 12:23:08'),
(9, 148, 'nama spotnya ada disini', 'uploads/1672464404.jpg', 'Jakarta, Indonesia', '2022-12-31 12:26:44', '2022-12-31 12:26:44'),
(10, 148, 'nama spot', 'uploads/1672465155.jpg', 'UNAMA (Kampus Kotabaru)', '2022-12-31 12:39:16', '2022-12-31 12:39:16'),
(11, 148, 'spot testing', 'uploads/1672469527.jpg', 'Jakarta', '2022-12-31 13:52:08', '2022-12-31 13:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `spot_comment`
--

CREATE TABLE `spot_comment` (
  `id` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spot_comment`
--

INSERT INTO `spot_comment` (`id`, `spot_id`, `user_id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'asdasdasdasda asda sddddddddddddddddddddddddddddddddddddddd    dasdasdasd asd asd asdas das dasd asdas dad', '2022-12-29 05:41:52', '2022-12-29 05:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `spot_like`
--

CREATE TABLE `spot_like` (
  `id` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_like` enum('Ya','Tidak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spot_like`
--

INSERT INTO `spot_like` (`id`, `spot_id`, `user_id`, `is_like`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Ya', '2022-12-31 19:14:09', '2022-12-31 19:26:11'),
(4, 11, 154, 'Ya', '2023-01-01 07:34:55', '2023-01-01 07:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `spot_review`
--

CREATE TABLE `spot_review` (
  `id` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` enum('1','2','3','4','5') NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spot_review`
--

INSERT INTO `spot_review` (`id`, `spot_id`, `user_id`, `rate`, `isi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4', '', '2022-12-29 05:43:18', '2022-12-29 05:43:18'),
(2, 2, 148, '4', 'bdfgdgdfg dfg dfg', '2022-12-29 06:20:43', '2022-12-29 06:20:43'),
(3, 3, 148, '4', 'bdfgdgdfg dfg dfgsdf sdf', '2022-12-29 06:20:43', '2022-12-29 06:20:43'),
(4, 4, 148, '5', 'ini adalah isi review yang sangat baguss sekaliii', '2022-12-31 12:10:11', '2022-12-31 12:10:11'),
(5, 5, 148, '4', 'tulis keterangan disini', '2022-12-31 12:19:39', '2022-12-31 12:19:39'),
(6, 6, 148, '4', 'tulis keterangan disini', '2022-12-31 12:20:06', '2022-12-31 12:20:06'),
(7, 7, 148, '4', 'tulis keterangan disini', '2022-12-31 12:21:03', '2022-12-31 12:21:03'),
(8, 8, 148, '4', 'tulis keterangan disini', '2022-12-31 12:23:08', '2022-12-31 12:23:08'),
(9, 9, 148, '4', 'tulis keterangan disini', '2022-12-31 12:26:44', '2022-12-31 12:26:44'),
(10, 10, 148, '4', 'tulis keterangan', '2022-12-31 12:39:16', '2022-12-31 12:39:16'),
(11, 11, 148, '5', 'ini adalah spot testing', '2022-12-31 13:52:08', '2022-12-31 13:52:08'),
(12, 8, 148, '3', 'wokelah ini adalah review saya, bahwa spot ini memang terenal lumayan bagus', '2022-12-31 14:45:30', '2022-12-31 14:45:30'),
(13, 11, 154, '5', 'ya oke jugalah emang', '2023-01-01 07:29:10', '2023-01-01 07:29:10'),
(14, 11, 154, '5', 'tulis keterangan', '2023-01-01 07:34:09', '2023-01-01 07:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noHp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Admin','Pengunjung') COLLATE utf8mb4_unicode_ci DEFAULT 'Pengunjung',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoProfile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `jenisKelamin`, `noHp`, `email`, `password`, `level`, `alamat`, `bio`, `fotoProfile`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Laki - Laki', '082282692480', 'admin@gmail.com', '$2y$10$wJtxHl0HHlReswNIwucHKeF5ICZ0rcx1.l.QSyvURJHkZoVIM82r2', 'Admin', 'Jl. h. ibrahim', '', 'uploads/fb5c3af7-d7b5-44cf-8974-64e43218a306.png', '2022-04-24 09:23:52', '2022-11-05 15:16:13'),
(148, 'Ramdan Riawan', 'Laki - Laki', '082282692481', 'ramdanriawan3@gmail.com', '$2y$10$KaIPjM.qPgte7nlpcJdG.eJfb5P2vYlPfzL9HjWXxTT/1YYBkWqW2', 'Pengunjung', 'dsfsfdsf', '', 'sdfsdf', '2022-12-29 09:30:22', '2022-12-29 09:30:22'),
(153, 'full name', NULL, '082282692489', 'ramdanriawan5@gmail.com', '$2y$10$ymOrbNj5o97HW7Y0bKFyAeSYqdX0zvLkqHzM/GQzX0oxLLt2Te8fq', 'Pengunjung', NULL, NULL, '', '2022-12-31 17:42:55', '2022-12-31 17:42:55'),
(154, 'Ramdan Riawan', NULL, NULL, 'ramdanriawan2@yahoo.co.id', '$2y$10$TC1YnsD64HyE9pBj.8QUCeMzwQ8KC1N0TUyv1Cj461FZxonQvTkWC', 'Pengunjung', NULL, NULL, NULL, '2023-01-01 07:22:08', '2023-01-01 07:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_location_history`
--

CREATE TABLE `user_location_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `addresses` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_location_history`
--

INSERT INTO `user_location_history` (`id`, `user_id`, `addresses`, `created_at`, `updated_at`) VALUES
(1, 148, '{coordinates: {latitude: -1.6248489, longitude: 103.5638161}, addressLine: Jl. Elang No.03, Kenali Besar, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: No.03, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Kenali Besar, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Jalan Elang, subThoroughfare: No.03}', '2023-01-17 01:17:05', '2023-01-17 01:17:05'),
(2, 148, '{coordinates: {latitude: -1.6248489, longitude: 103.5638161}, addressLine: Jl. Elang No.03, Kenali Besar, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: No.03, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Kenali Besar, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Jalan Elang, subThoroughfare: No.03}', '2023-01-17 01:18:01', '2023-01-17 01:18:01'),
(3, 148, '{coordinates: {latitude: -1.6239169999999998, longitude: 103.5512607}, addressLine: 9HG2+CFP, Kenali Besar, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HG2+CFP, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Kenali Besar, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: null, subThoroughfare: null}', '2023-01-17 01:19:01', '2023-01-17 01:19:01'),
(4, 148, '{coordinates: {latitude: -1.6272149, longitude: 103.565141}, addressLine: 9HF8+436, Lorong Darussalam II, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+436, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Darussalam II, subThoroughfare: null}', '2023-01-17 03:42:27', '2023-01-17 03:42:27'),
(5, 148, '{coordinates: {latitude: -1.6252353, longitude: 103.56506379999999}, addressLine: 9HF8+W24, Lorong Sinarantara, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+W24, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Sinarantara, subThoroughfare: null}', '2023-01-17 03:43:28', '2023-01-17 03:43:28'),
(6, 148, '{coordinates: {latitude: -1.6252353, longitude: 103.56506379999999}, addressLine: 9HF8+W24, Lorong Sinarantara, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+W24, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Sinarantara, subThoroughfare: null}', '2023-01-17 03:44:25', '2023-01-17 03:44:25'),
(7, 148, '{coordinates: {latitude: -1.6254091, longitude: 103.56734499999999}, addressLine: JL. M. Koko, No. 50, Kerinci, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: Rawa Sari, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: null, subThoroughfare: null}', '2023-01-17 03:46:26', '2023-01-17 03:46:26'),
(8, 148, '{coordinates: {latitude: -1.6254091, longitude: 103.56734499999999}, addressLine: JL. M. Koko, No. 50, Kerinci, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: Rawa Sari, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: null, subThoroughfare: null}', '2023-01-17 03:46:27', '2023-01-17 03:46:27'),
(9, 148, '{coordinates: {latitude: -1.6254091, longitude: 103.56734499999999}, addressLine: JL. M. Koko, No. 50, Kerinci, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: Rawa Sari, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: null, subThoroughfare: null}', '2023-01-17 03:46:41', '2023-01-17 03:46:41'),
(10, 148, '{coordinates: {latitude: -1.6272149, longitude: 103.565141}, addressLine: 9HF8+436, Lorong Darussalam II, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+436, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Darussalam II, subThoroughfare: null}', '2023-01-17 03:48:27', '2023-01-17 03:48:27'),
(11, 148, '{coordinates: {latitude: -1.6252353, longitude: 103.56506379999999}, addressLine: 9HF8+W24, Lorong Sinarantara, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+W24, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Sinarantara, subThoroughfare: null}', '2023-01-17 03:51:34', '2023-01-17 03:51:34'),
(12, 148, '{coordinates: {latitude: -1.6252353, longitude: 103.56506379999999}, addressLine: 9HF8+W24, Lorong Sinarantara, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+W24, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Sinarantara, subThoroughfare: null}', '2023-01-17 03:52:28', '2023-01-17 03:52:28'),
(13, 148, '{coordinates: {latitude: -1.6252353, longitude: 103.56506379999999}, addressLine: 9HF8+W24, Lorong Sinarantara, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+W24, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Sinarantara, subThoroughfare: null}', '2023-01-17 03:53:20', '2023-01-17 03:53:20'),
(14, 148, '{coordinates: {latitude: -1.6272149, longitude: 103.565141}, addressLine: 9HF8+436, Lorong Darussalam II, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+436, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Darussalam II, subThoroughfare: null}', '2023-01-17 03:58:32', '2023-01-17 03:58:32'),
(15, 148, '{coordinates: {latitude: -1.6272149, longitude: 103.565141}, addressLine: 9HF8+436, Lorong Darussalam II, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+436, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Darussalam II, subThoroughfare: null}', '2023-01-17 03:58:33', '2023-01-17 03:58:33'),
(16, 148, '{coordinates: {latitude: -1.6272149, longitude: 103.565141}, addressLine: 9HF8+436, Lorong Darussalam II, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+436, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Darussalam II, subThoroughfare: null}', '2023-01-17 03:58:35', '2023-01-17 03:58:35'),
(17, 148, '{coordinates: {latitude: -1.6272149, longitude: 103.565141}, addressLine: 9HF8+436, Lorong Darussalam II, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+436, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Darussalam II, subThoroughfare: null}', '2023-01-17 03:58:36', '2023-01-17 03:58:36'),
(18, 148, '{coordinates: {latitude: -1.6272149, longitude: 103.565141}, addressLine: 9HF8+436, Lorong Darussalam II, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: 9HF8+436, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Darussalam II, subThoroughfare: null}', '2023-01-17 03:58:37', '2023-01-17 03:58:37'),
(19, 148, '{coordinates: {latitude: -1.6256681, longitude: 103.5649998}, addressLine: Lorong Sinarantara No.158, Rw. Sari, Kec. Kota Baru, Kota Jambi, Jambi 36361, Indonesia, countryName: Indonesia, countryCode: ID, featureName: No 158, postalCode: 36361, locality: Kecamatan Kota Baru, subLocality: Rawa Sari, adminArea: Jambi, subAdminArea: Kota Jambi, thoroughfare: Lorong Sinarantara, subThoroughfare: No 158}', '2023-01-17 03:58:45', '2023-01-17 03:58:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spot`
--
ALTER TABLE `spot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `spot_comment`
--
ALTER TABLE `spot_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spot_id` (`spot_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `spot_like`
--
ALTER TABLE `spot_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spot_id` (`spot_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `spot_review`
--
ALTER TABLE `spot_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spot_id` (`spot_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`email`);

--
-- Indexes for table `user_location_history`
--
ALTER TABLE `user_location_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spot`
--
ALTER TABLE `spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `spot_comment`
--
ALTER TABLE `spot_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spot_like`
--
ALTER TABLE `spot_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spot_review`
--
ALTER TABLE `spot_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `user_location_history`
--
ALTER TABLE `user_location_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spot`
--
ALTER TABLE `spot`
  ADD CONSTRAINT `spot_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spot_comment`
--
ALTER TABLE `spot_comment`
  ADD CONSTRAINT `spot_comment_ibfk_1` FOREIGN KEY (`spot_id`) REFERENCES `spot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spot_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spot_like`
--
ALTER TABLE `spot_like`
  ADD CONSTRAINT `spot_like_ibfk_1` FOREIGN KEY (`spot_id`) REFERENCES `spot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spot_like_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spot_review`
--
ALTER TABLE `spot_review`
  ADD CONSTRAINT `spot_review_ibfk_1` FOREIGN KEY (`spot_id`) REFERENCES `spot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spot_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
