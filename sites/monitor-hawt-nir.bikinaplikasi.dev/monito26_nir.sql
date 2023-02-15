-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2021 at 10:35 AM
-- Server version: 10.3.29-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monito26_nir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '180.243.210.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'e4ccfdbb7e990efdc9414d5a284efa26', '2021-04-29 02:04:47'),
(2, '103.11.28.133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'e4ccfdbb7e990efdc9414d5a284efa26', '2021-04-29 02:06:53'),
(3, '180.243.210.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'e4ccfdbb7e990efdc9414d5a284efa26', '2021-04-29 02:06:58'),
(4, '180.243.210.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '27aa5384bfd4a31ead92a4219a006715', '2021-04-29 02:07:58'),
(5, '114.4.4.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'e4ccfdbb7e990efdc9414d5a284efa26', '2021-04-29 02:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin', 2, '2021-04-26 02:38:02', 0),
(2, '::1', 'ramdanriawan3@gmail.com', 2, '2021-04-26 02:40:10', 1),
(3, '::1', 'ramdanriawan3@gmail.com', 3, '2021-04-26 02:55:41', 1),
(4, '::1', 'ramdanriawan3@gmail.com', 3, '2021-04-26 02:56:29', 1),
(5, '::1', 'ramdanriawan3@gmail.com', 3, '2021-04-26 21:15:37', 1),
(6, '::1', 'ramdanriawan3@gmail.com', 3, '2021-04-27 21:46:21', 1),
(7, '::1', 'ramdanriawan3@gmail.com', 3, '2021-04-27 23:18:40', 1),
(8, '::1', 'ramdanriawan3@gmail.com', 1, '2021-04-28 03:12:54', 1),
(9, '::1', 'ramdanriawan4', 4, '2021-04-28 03:20:06', 0),
(10, '::1', 'ramdanriawan3@gmail.com', 1, '2021-04-28 03:20:16', 1),
(11, '::1', 'coderindo2', 5, '2021-04-28 03:39:33', 0),
(12, '::1', 'coderindo2', 5, '2021-04-28 03:58:05', 0),
(13, '::1', 'ramdanriawan3@gmail.com', 1, '2021-04-28 04:11:44', 1),
(14, '::1', 'coderindo5', 6, '2021-04-28 04:13:18', 0),
(15, '::1', 'ramdanriawan3@gmail.com', 1, '2021-04-28 04:28:25', 1),
(16, '::1', 'coderindo5', 6, '2021-04-28 04:38:05', 0),
(17, '::1', 'ramdanriawan3@gmail.com', 1, '2021-04-28 04:40:59', 1),
(18, '180.243.210.22', 'coderindo2', 7, '2021-04-28 23:11:13', 0),
(19, '180.243.210.22', 'coderindo2', 8, '2021-04-28 23:21:36', 0),
(20, '180.243.210.22', 'coderindo2', 8, '2021-04-28 23:25:23', 0),
(21, '180.243.210.22', 'coderindo2', 8, '2021-04-28 23:41:17', 0),
(22, '180.243.210.22', 'coderindo2', 8, '2021-04-28 23:41:25', 0),
(23, '180.243.210.22', 'coderindo2', 8, '2021-04-28 23:54:40', 0),
(24, '180.243.210.22', 'coderindo2', 8, '2021-04-29 00:04:46', 0),
(25, '180.243.210.22', 'coderindo2', 8, '2021-04-29 00:13:57', 0),
(26, '180.243.210.22', 'coderindo2', 8, '2021-04-29 00:47:08', 0),
(27, '180.243.210.22', 'coderindo2', 8, '2021-04-29 02:02:41', 0),
(28, '180.243.210.22', 'coderindo2', 8, '2021-04-29 02:04:22', 0),
(29, '180.243.210.22', 'coderindo2', 8, '2021-04-29 02:05:00', 0),
(30, '180.243.210.22', 'coderindo2', 8, '2021-04-29 02:06:38', 0),
(31, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:08:04', 1),
(32, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:12:07', 1),
(33, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:18:14', 1),
(34, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:19:56', 1),
(35, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:20:32', 1),
(36, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:22:45', 1),
(37, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:23:04', 1),
(38, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:23:09', 1),
(39, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:23:28', 1),
(40, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:23:40', 1),
(41, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:23:52', 1),
(42, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:24:32', 1),
(43, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:25:18', 1),
(44, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 02:26:49', 1),
(45, '180.243.210.22', 'ramdanriawan3@gmail.com', 1, '2021-04-29 02:34:40', 1),
(46, '180.243.210.22', 'ramdanriawan3@gmail.com', 1, '2021-04-29 02:44:45', 1),
(47, '180.243.210.22', 'coderindo2@gmail.com', 9, '2021-04-29 03:20:42', 1),
(48, '36.77.94.46', 'ramdanriawan3@gmail.com', 1, '2021-04-29 22:06:22', 1),
(49, '36.77.94.46', 'ramdanriawan3@gmail.com', 1, '2021-04-29 22:12:49', 1),
(50, '::1', 'adminss', NULL, '2021-05-01 01:22:57', 0),
(51, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-01 01:23:06', 1),
(52, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-01 02:53:04', 1),
(53, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-01 03:00:49', 1),
(54, '10.138.212.108', 'ramdanriawan3@gmail.com', 1, '2021-05-01 03:41:29', 1),
(55, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-01 04:18:20', 1),
(56, '::1', 'coderindo2@gmail.com', 14, '2021-05-01 04:59:50', 1),
(57, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-01 05:01:47', 1),
(58, '10.30.127.22', 'ramdanriawan3@gmail.com', 1, '2021-05-01 07:12:24', 1),
(59, '10.51.248.89', 'rivalheriyan@gmail.com', 15, '2021-05-01 07:17:57', 1),
(60, '10.51.235.186', 'ramdanriawan3@gmail.com', 1, '2021-05-01 07:20:19', 1),
(61, '10.179.106.85', 'ramdanriawan3@gmail.com', 1, '2021-05-01 07:20:30', 1),
(62, '10.63.235.92', 'rivalheriyan@gmail.com', 15, '2021-05-01 07:25:24', 1),
(63, '10.16.194.154', 'admin', NULL, '2021-05-01 08:16:44', 0),
(64, '10.71.137.172', 'ramdanriawan3@gmail.com', 1, '2021-05-01 08:16:59', 1),
(65, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-01 10:53:52', 1),
(66, '10.47.129.242', 'ramdanriawan3@gmail.com', 1, '2021-05-01 11:13:39', 1),
(67, '::1', 'coderindo2@gmail.com', 14, '2021-05-01 17:01:26', 1),
(68, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-01 17:05:45', 1),
(69, '10.11.185.34', 'rivalheriyan@gmail.com', 15, '2021-05-02 01:58:56', 1),
(70, '10.47.219.91', 'ramdanriawan3@gmail.com', 1, '2021-05-02 01:59:26', 1),
(71, '10.31.64.150', 'ramdanriawan3@gmail.com', 1, '2021-05-02 03:33:49', 1),
(72, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-02 03:35:30', 1),
(73, '10.5.161.216', 'rivalheriyan@gmail.com', 15, '2021-05-02 03:40:34', 1),
(74, '10.13.148.247', 'ramdanriawan3@gmail.com', 1, '2021-05-02 03:41:04', 1),
(75, '10.31.231.8', 'ramdanriawan3@gmail.com', 1, '2021-05-02 06:44:35', 1),
(76, '10.138.162.166', 'rivalheriyan@gmail.com', 15, '2021-05-02 08:44:22', 1),
(77, '10.33.232.252', 'ramdanriawan3@gmail.com', 1, '2021-05-02 12:46:25', 1),
(78, '10.69.178.208', 'ramdanriawan3@gmail.com', 1, '2021-05-02 13:04:52', 1),
(79, '10.30.108.123', 'ramdanriawan3@gmail.com', 1, '2021-05-02 13:08:36', 1),
(80, '10.5.201.229', 'ramdanriawan3@gmail.com', 1, '2021-05-02 23:39:48', 1),
(81, '10.30.214.102', 'ramdanriawan3@gmail.com', 1, '2021-05-02 23:40:47', 1),
(82, '10.9.247.118', 'rivalheriyan@gmail.com', 15, '2021-05-02 23:41:29', 1),
(83, '10.69.178.208', 'ramdanriawan3@gmail.com', 1, '2021-05-02 23:41:50', 1),
(84, '10.41.200.163', 'ramdanriawan3@gmail.com', 1, '2021-05-03 08:40:35', 1),
(85, '10.43.252.33', 'ramdanriawan3@gmail.com', 1, '2021-05-04 07:06:46', 1),
(86, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-04 14:32:42', 1),
(87, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:10:26', 1),
(88, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:12:04', 1),
(89, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:14:27', 1),
(90, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:28:12', 1),
(91, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:28:22', 1),
(92, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:29:12', 1),
(93, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:30:54', 1),
(94, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:34:43', 1),
(95, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:35:48', 1),
(96, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:36:01', 1),
(97, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:36:38', 1),
(98, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:37:03', 1),
(99, '::1', 'coderindo2@gmail.com', 14, '2021-05-04 15:39:19', 1),
(100, '::1', 'ramdanriawan3@gmail.com', 1, '2021-05-04 15:40:19', 1),
(101, '10.41.200.163', 'ramdanriawan3@gmail.com', 1, '2021-05-04 22:26:11', 1),
(102, '10.63.242.13', 'ramdanriawan3@gmail.com', 1, '2021-05-05 07:05:24', 1),
(103, '10.63.70.187', 'ramdanriawan3@gmail.com', 1, '2021-05-05 07:39:02', 1),
(104, '10.9.234.244', 'ramdanriawan3@gmail.com', 1, '2021-05-05 10:14:02', 1),
(105, '10.30.127.22', 'ramdanriawan3@gmail.com', 1, '2021-05-06 00:53:53', 1),
(106, '10.43.252.33', 'ramdanriawan3@gmail.com', 1, '2021-05-10 08:34:17', 1),
(107, '::1', 'ramdanriawan3@gmail.com', 1, '2021-06-03 00:52:23', 1),
(108, '::1', 'ramdanriawan3@gmail.com', 1, '2021-06-03 02:47:50', 1),
(109, '::1', 'ramdanriawan3@gmail.com', 1, '2021-06-03 03:06:27', 1),
(110, '::1', 'ramdanriawan3@gmail.com', 1, '2021-06-03 03:39:40', 1),
(111, '::1', 'ramdanriawan3@gmail.com', 1, '2021-06-03 04:20:41', 1),
(112, '::1', 'ramdanriawan3@gmail.com', 1, '2021-06-03 19:18:00', 1),
(113, '::1', 'ramdanriawan3@gmail.com', 1, '2021-06-03 21:51:54', 1),
(114, '::1', 'admin1', NULL, '2021-06-03 21:52:19', 0),
(115, '::1', 'admin', NULL, '2021-06-03 21:54:36', 0),
(116, '::1', 'admin', NULL, '2021-06-03 21:55:08', 0),
(117, '::1', 'admin', NULL, '2021-06-03 21:55:14', 0),
(118, '::1', 'admin', NULL, '2021-06-03 21:56:33', 0),
(119, '::1', 'admin1@gmail.com', 16, '2021-06-03 22:00:06', 1),
(120, '::1', 'admin', NULL, '2021-06-03 22:08:55', 0),
(121, '::1', 'admin1@gmail.com', 18, '2021-06-03 22:08:59', 1),
(122, '::1', 'admin1', NULL, '2021-06-03 22:15:10', 0),
(123, '::1', 'admin1', NULL, '2021-06-03 22:15:16', 0),
(124, '::1', 'admin@gmail.com', 1, '2021-06-03 22:15:40', 1),
(125, '::1', 'admin1@gmail.com', 1, '2021-06-03 22:16:11', 1),
(126, '10.63.206.220', 'admin', NULL, '2021-06-10 22:54:44', 0),
(127, '10.63.122.84', 'admin1', NULL, '2021-06-10 22:54:54', 0),
(128, '10.91.248.175', 'admin@admin.com', 19, '2021-06-10 22:56:30', 1),
(129, '10.41.219.5', 'admin@admin.com', 1, '2021-06-10 22:56:50', 1),
(130, '10.45.84.124', 'admin@admin.com', 1, '2021-06-10 23:09:55', 1),
(131, '10.9.234.244', 'admin@admin.com', 1, '2021-06-10 23:16:08', 1),
(132, '10.9.209.104', 'admin@admin.com', 1, '2021-06-11 00:53:20', 1),
(133, '10.52.12.58', 'admin@admin.com', 1, '2021-06-17 21:06:21', 1),
(134, '10.63.152.20', 'admin@admin.com', 1, '2021-06-17 21:17:30', 1),
(135, '10.97.246.9', 'admin@admin.com', 1, '2021-06-17 21:25:04', 1),
(136, '10.51.229.22', 'admin@admin.com', 1, '2021-06-17 21:40:45', 1),
(137, '10.13.235.87', 'admin@admin.com', 1, '2021-06-29 05:22:51', 1),
(138, '::1', 'admin@admin.com', 1, '2021-06-29 00:39:57', 1),
(139, '::1', 'admin@admin.com', 1, '2021-06-29 00:42:14', 1),
(140, '10.5.196.194', 'admin@admin.com', 1, '2021-06-29 05:48:14', 1),
(141, '10.16.218.30', 'admin@admin.com', 1, '2021-06-29 06:02:22', 1),
(142, '10.41.150.123', 'admin@admin.com', 1, '2021-06-29 06:16:13', 1),
(143, '10.52.3.211', 'admin@admin.com', 1, '2021-06-29 06:18:04', 1),
(144, '115.178.195.32', 'admin@admin.com', 1, '2021-06-30 22:31:54', 1),
(145, '103.140.188.234', 'admin@admin.com', 1, '2021-06-30 22:33:22', 1),
(146, '103.140.188.234', 'admin@admin.com', 1, '2021-06-30 22:34:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_penanda_tangan` varchar(30) DEFAULT NULL,
  `judul_dokumen` varchar(30) DEFAULT NULL,
  `lampiran_dokumen_asli` varchar(100) DEFAULT NULL,
  `lampiran_tanda_tangan_asli` varchar(100) DEFAULT NULL,
  `lampiran_dokumen_qrcode` varchar(100) DEFAULT NULL,
  `dokumen_hash` varchar(100) DEFAULT NULL,
  `waktu_penanda_tangan` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `user_id`, `nama_penanda_tangan`, `judul_dokumen`, `lampiran_dokumen_asli`, `lampiran_tanda_tangan_asli`, `lampiran_dokumen_qrcode`, `dokumen_hash`, `waktu_penanda_tangan`) VALUES
(5, 3, 'Ramdan Riawan', 'Judul Dokumen', '1619588435_a297af1d4ea4dd1ff3c5.pdf', '1619588435_aacb51299d6c0d72d6c9.png', '1619588435_a297af1d4ea4dd1ff3c5.pdf', '1619588435_y297yv1q4gy4qq1vv3k5.tqv', '2021-04-27 22:40:36'),
(6, 9, 'Ramdan Riawan', 'Judul Dokumen', '1619685644_b753c069b9e2922f7769.pdf', '1619685644_4a5c226cba92a71ac830.png', '1619685644_b753c069b9e2922f7769.pdf', '1619685644_h753k069h9g2922v7769.tqv', '2021-04-29 01:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1619420356, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `kecepatan_angin` float NOT NULL DEFAULT 0,
  `arus_wind_turbine` float NOT NULL,
  `arus_ats` float NOT NULL,
  `tegangan_wind_turbine` float NOT NULL,
  `tegangan_ats` float NOT NULL,
  `daya_wind_turbine` float DEFAULT NULL,
  `tanggal_dan_waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `kecepatan_angin`, `arus_wind_turbine`, `arus_ats`, `tegangan_wind_turbine`, `tegangan_ats`, `daya_wind_turbine`, `tanggal_dan_waktu`, `created_at`) VALUES
(1630, 10, 9, 8, 7, 6, 4, '2021-06-03 20:23:54', '2021-06-03 06:23:54'),
(1631, 9, 8, 7, 6, 5, 5, '2021-06-03 20:23:54', '2021-06-03 06:23:54'),
(1632, 8, 7, 6, 5, 4, 6, '2021-06-03 20:23:54', '2021-06-03 06:23:54'),
(1633, 7, 6, 5, 4, 3, 8, '2021-06-03 20:23:54', '2021-06-03 06:23:54'),
(1634, 6, 5, 4, 3, 2, 8, '2021-06-03 20:23:54', '2021-06-03 06:23:54'),
(1635, 5, 4, 3, 2, 1, 4, '2021-06-04 08:23:59', '2021-06-03 18:23:59'),
(1636, 5, 4, 3, 2, 1, 6, '2021-06-04 08:24:18', '2021-06-03 18:24:18'),
(1638, 10, 20, 30, 40, 50, 60, '2021-06-11 10:42:01', '2021-06-10 20:42:01'),
(1639, 10, 20, 30, 40, 50, 60, '2021-06-11 04:17:28', '2021-06-10 21:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `confirm` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `confirm`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$SLZdb4dj/JS/R/VYaPJ6xOJEi7o.E1ksE/vMfRlBcHGpQQo7fhahm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2021-06-10 22:56:25', '2021-06-10 22:56:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1640;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
