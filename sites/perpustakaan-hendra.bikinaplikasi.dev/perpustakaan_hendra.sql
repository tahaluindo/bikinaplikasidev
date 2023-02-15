-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 20, 2022 at 07:04 AM
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
-- Database: `perpustakaan_hendra`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `no_identitas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibuat` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `no_identitas`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`, `status`, `dibuat`, `created_at`, `updated_at`) VALUES
(3, 1156, '42138939', 'Nisa Winda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(4, 1157, '34228057', 'Parida', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(5, 1158, '34088739', 'Paryan Nesfandiari', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(6, 1159, '43416964', 'Putri Ayu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(7, 1160, '40733480', 'Rara Mutiara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(8, 1161, '55367593', 'Ronal Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(9, 1162, '46444893', 'Rosalia Anggun Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(10, 1163, '42015971', 'Safira Norila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(11, 1164, '50317785', 'Salsah Irfaniah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(12, 1165, '42153074', 'Shanju Ardian Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(13, 1166, '48971568', 'Silviani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(14, 1167, '42015972', 'Sinta Arianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(15, 1168, '6782816', 'Siti Komah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(16, 1169, '9997783871', 'Siti Saudah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(17, 1170, '36076945', 'Suci Ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(18, 1171, '42015970', 'Sumarni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(19, 1172, '47170266', 'Ulan Patmala Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(20, 1173, '46815782', 'Umira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(21, 1174, '45564897', 'Uswatun Hasanah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(22, 1175, '44099391', 'Aina Pitri Holiza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(23, 1176, '26223800', 'Alfi Syahrin', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(24, 1177, '44099378', 'Ana Maryani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(25, 1178, '46985269', 'Ananda Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(27, 1179, '47277650', 'Antoni Saputra Gunawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(31, 1183, '36076941', 'Egi Prayogi Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(32, 1184, '49201539', 'Emilia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(33, 1185, '51425003', 'Fendlinalisa Nursyahrin', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(34, 1186, '49309358', 'Ina Sunarni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(35, 1187, '32672560', 'Mareta Nur Arudah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(36, 1188, '49231944', 'Mauly Anitia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(37, 1189, '41212651', 'Merry Yani Simangunsong', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(38, 1190, '43516653', 'Michael Parlindungan Samosir', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(39, 1191, '43516652', 'Muhammad Arif', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(40, 1192, '43416963', 'Muhammad Dito Valtian', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(41, 1193, '49077378', 'Muhammd Usman', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(42, 1194, '42153550', 'Neli Aini', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(43, 1195, '42392399', 'Nurul Hidayati Arifa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(44, 1196, '50494361', 'Ocie Syafni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(45, 1197, '42993708', 'Resi Septia Isra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(46, 1198, '43152220', 'Revo Muhamad Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(47, 1199, '22621210', 'Riki Sardiansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(48, 1200, '42132077', 'Riska Umariah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(49, 1201, '42993713', 'Riski Roma Dani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(50, 1202, '37798307', 'Ultira Dwi Rahayu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(51, 1203, '59483719', 'Zaqiyah Risky Fadilah Muis', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(52, 1204, '41637369', 'Adi Tegar Pambudi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(53, 1205, '43516766', 'Alifya Arna Darmawan', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(54, 1206, '43516723', 'Anita Zhahara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(55, 1207, '-', 'AZZALIA CHINTA SYAHFIDA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(56, 1208, '42253335', 'Ciko Intani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(57, 1209, '35196752', 'Denis Lyon Malau', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(58, 1210, '35444253', 'Deviatul Qotimah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(59, 1211, '43516648', 'Fahri Hidayat', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(60, 1212, '43416907', 'Febrio Valentino', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(61, 1213, '43516707', 'Happy Aura', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(62, 1214, '38096572', 'Icha Mognicah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(63, 1215, '45440541', 'Khoratun Najwa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(64, 1216, '49782710', 'Leo Agha Khusayra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(65, 1217, '32486586', 'M.pandu Wilantara', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(66, 1218, '43516661', 'Muhammad Farid', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(67, 1219, '50516459', 'Muhammad Nabil Alhafizh', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(68, 1220, '43416913', 'Muhammad Ridho Nugraha', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(69, 1221, '49887991', 'Muhammad Zain Frasetiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(70, 1222, '46115001', 'Nadya Sadini', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(71, 1223, '50494357', 'Najwa Fazhira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(72, 1224, '37193933', 'Nanda Devita Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(73, 1225, '42153069', 'Nessie Gusriyani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(74, 1226, '43595009', 'Puspandhari Ilsa Pinasty', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(75, 1227, '48538186', 'Qonita Hafiza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(76, 1228, '42752791', 'Raihan Naufal Muzakki', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(77, 1229, '41990107', 'Reva Gari Mustika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(78, 1230, '43516684', 'Sabrina Nurchalisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(79, 1231, '34529455', 'Syafira Salsa Ramadhinta', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(80, 1232, '44900657', 'Tanu Wijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(81, 1233, '41098325', 'Try Mutiara Insani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(82, 1234, '55498450', 'Tsania Nabila Izzatia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(83, 1235, '43516696', 'Yogi Kurniawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(84, 1236, '34743998', 'Agun Andika Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(85, 1237, '42250090', 'Aldi Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(86, 1238, '36072551', 'Anton Murdiansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(87, 1239, '36457149', 'Auzza Dhuha Wijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(88, 1240, '41277585', 'Bunga Pefrianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(89, 1241, '46477113', 'Chandra Firmansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(90, 1242, '47827512', 'Dea Amelia Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(91, 1243, '41293725', 'Dian Puspita Sari Br Sitepu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(92, 1244, '42635419', 'Dinda Melati Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(93, 1245, '41637372', 'Farhan Dwi Ramadan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(94, 1246, '37193936', 'Fiki Nuraqmal', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(95, 1247, '43152237', 'Fionika Yulianisya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(96, 1248, '34027969', 'Fitri Mayang Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(97, 1249, '35379832', 'Fuji Cantika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(98, 1250, '35936134', 'Glory Irene', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(99, 1251, '46506156', 'Hani Syakila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(100, 1252, '41028376', 'Iqbal Darmawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(101, 1253, '43416961', 'Jihan Azzahra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(102, 1254, '46618925', 'M. Daffa Surya Alamsyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(103, 1255, '43410680', 'Miftahul Ardiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(104, 1256, '43516770', 'Muhammad Abdizzikri Alfaj Diwi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(105, 1257, '50419036', 'MUHAMMAD AZKA ANDRIANO', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(106, 1258, '37418531', 'Nida Natriya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(107, 1259, '42813366', 'NOVALIA SARI PUTRI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(108, 1260, '41952021', 'Razin Rajma Anisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(109, 1261, '43152247', 'Reyhan Mirtovani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(110, 1262, '41637356', 'Risnayogi Dwi Syafitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(111, 1263, '43029886', 'Romi Wijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(112, 1264, '43109682', 'Siti Saadah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(113, 1265, '50579286', 'Al Musyowir Ilyas', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(114, 1266, '41696212', 'Andri Maulana Hisbullah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(115, 1267, '43516724', 'Azizah Wahyu Istiqomah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(116, 1268, '37099057', 'Bagas Andhika Candra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(117, 1269, '34183994', 'Bayu Hermawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(118, 1270, '47758039', 'Daffa Satrio Pamungkas', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(119, 1271, '42253316', 'Farrelio Dwi Fernando Foyi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(120, 1272, '43516674', 'Fauzan Tri Wanda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(121, 1273, '43433947', 'Ibna Itazhala Annur', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(122, 1274, '37193935', 'Ichfan Zikri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(123, 1275, '41952397', 'Irga Alpendi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(124, 1276, '43782968', 'Jefry Prasetya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(125, 1277, '42635472', 'Jihan Az Zahra Hazirin', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(126, 1278, '40691431', 'Krisna Surya Putra Wardana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(127, 1279, '43416929', 'Lia Permana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(128, 1280, '42253334', 'Lianda Agustina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(129, 1281, '36591532', 'Mesi Nosi Dearti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(130, 1282, '37193932', 'Morin Dwi Monisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(131, 1283, '36871582', 'Mouna Indo Minako', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(132, 1284, '43416940', 'Muhammad Wenddy Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(133, 1285, '42635477', 'Nayla Khansa Afdansyaharani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(134, 1286, '49732204', 'Pinkan Nuansa Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(135, 1287, '46168307', 'Putri Melati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(136, 1288, '41139766', 'Refal Juan Fernandes', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(137, 1289, '43516656', 'Regina Saidina Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(138, 1290, '43416903', 'Rinjani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(139, 1291, '43416945', 'Saqi Azizah Baroza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(140, 1292, '43416934', 'Setiya Huda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(141, 1293, '43416951', 'Sonia Dwi Yolanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(142, 1294, '42978343', 'Wahyu Diffa Kusuma', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(143, 1295, '37071173', 'Yedhil Nofrian Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(144, 1296, '43756976', 'Agnia Nurul Azizah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(145, 1297, '36482124', 'Agus Triwardini', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(146, 1298, '43516746', 'Alif Arya Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(147, 1299, '49803914', 'Amanda Yonira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(148, 1300, '46995369', 'Ana Widiyanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(149, 1301, '37099051', 'Angga Al Fitra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(150, 1302, '53069706', 'Anggi Helpita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(151, 1303, '44099385', 'Della Alzafirah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(152, 1304, '43416916', 'Dhea Muthia Anisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(153, 1305, '43516676', 'Edwin Apriliano', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(154, 1306, '35692047', 'Fitri Ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(155, 1307, '42635412', 'Gilang Kurniawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(156, 1308, '43378480', 'Kesi Desviza Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(157, 1309, '50519238', 'M. Hendy Setiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(158, 1310, '48571668', 'M. Ihsan Abil', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(159, 1311, '37193905', 'M. Nendi Ferdiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(160, 1312, '37099047', 'M. Rendi Arisky', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(161, 1313, '53398077', 'Muhammad Ilham Akbar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(162, 1314, '43516714', 'Muhammad Mirza Amrah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(163, 1315, '41952234', 'Muhammad Syafiq Alparizi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(164, 1316, '43516672', 'Nita Valeda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(165, 1317, '42806598', 'Noval Romadhan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(166, 1318, '43416917', 'Olivia Sandra Hanifah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(167, 1319, '42740035', 'Paramananda Aqiela', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(168, 1320, '37099048', 'Rakhmat Ramadhan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(169, 1321, '146605753', 'Sarah Mardiantika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(170, 1322, '47630554', 'SUCI LESTARI.MS', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(171, 1323, '43595013', 'Suci Mainta Waode', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(172, 1324, '50516460', 'Tita Aulya Nofira. Jk', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(173, 1325, '41637366', 'Ulfa Uli Yanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(174, 1326, '43516763', 'Zufandri Nuzra Syifaa', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(175, 1327, '48172212', 'Akbar Putra Perkasa', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(176, 1328, '43378477', 'Allgani Allbar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(177, 1329, '42682909', 'Amanda Shasika Devina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(178, 1330, '41750358', 'Amelia Damita Feodora', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(179, 1331, '42635652', 'Anys', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(180, 1332, '25380833', 'Aris Widodo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(181, 1333, '43594902', 'Aura Salsabila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(182, 1334, '43756952', 'Aurel Nabil Lubis', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(183, 1335, '59683083', 'Ayu Rizkiy Vernanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(184, 1336, '48735198', 'Cinta Gusriyanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(185, 1337, '43516730', 'Delia Rahmah Syarifah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(186, 1338, '50516462', 'Dila Yogi Pratama', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(187, 1339, '45066120', 'DIMAS ANDRIAN RAMADHAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(188, 1340, '41917622', 'Elsa Antoni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(189, 1341, '43416979', 'Fabiola Darma Ramadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(190, 1342, '42635716', 'Farhat Nofrian Latif Maulana', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(191, 1343, '43377765', 'Fira Dahlia Wulandari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(192, 1344, '43416953', 'Frisca Aulia Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(193, 1345, '43378470', 'Hegil Hidayatulah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(194, 1346, '43516697', 'Imelda Febrian', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(195, 1347, '44376196', 'Indra Kesuma', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(196, 1348, '9995279706', 'Junita Anggi Rahmawati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(197, 1349, '42635496', 'Khian Sandila Pamungkas', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(198, 1350, '21011781', 'M. Padil Arfandi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(199, 1351, '38096578', 'Mhd Wandri Nurdiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(200, 1352, '42635406', 'Muhammat Amara Al Dzikra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(201, 1353, '42012426', 'Putie Layun Apriani S', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(202, 1354, '43416947', 'Putri Aulia Rahmi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(203, 1355, '43152232', 'Putri Samapta', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(204, 1356, '32674702', 'Ridho Fahrul Rozi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(205, 1357, '43516688', 'Shavira Chandra Kirana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(206, 1358, '43416939', 'Agie Mustakim Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(207, 1359, '42635658', 'Alan Sodri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(208, 1360, '43601593', 'Alio Heptiansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(209, 1361, '43152253', 'Alvin Nofri Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(210, 1362, '50410672', 'Anang Makruf', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(211, 1363, '42635444', 'Annisa Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(212, 1364, '42015921', 'Bunga Meisy Astrisia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(213, 1365, '43516646', 'Dela Dwi Amita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(214, 1366, '30653386', 'Delima Br. Nababan', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(215, 1367, '36154347', 'Dian Rahmadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(216, 1368, '42013986', 'Elsa Safitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(217, 1369, '49456791', 'Fachri Martianda Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(218, 1370, '47200951', 'Fadilla Holidra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(219, 1371, '42792805', 'Lia Manjesna', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(220, 1372, '41538313', 'Lingga Yumike', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(221, 1373, '36455158', 'Meri Mustika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(222, 1374, '37193918', 'Muhammad Faqih', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(223, 1375, '42811270', 'Muhammad Fathan Faj', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(224, 1376, '46343461', 'Rabima Aulia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(225, 1377, '36971641', 'Rifki Alfarezi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(226, 1378, '43595010', 'Septian Reinaldi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(227, 1379, '35959256', 'Serly Oktavia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(228, 1380, '36457145', 'Sindi Permata Bunda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(229, 1381, '49937335', 'Taufik Hidayatullah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(230, 1382, '42253312', 'Yugo Tianvero.s', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(231, 0, '-', 'A.Raihan Ashraff', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(232, 0, '-', 'Alfan yenedi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(233, 0, '-', 'Alfarit tyo pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(234, 0, '-', 'Amanda Tasyawan M', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(235, 0, '-', 'Andi Kurniawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(236, 0, '-', 'ANDILAU', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(237, 0, '-', 'Anisa Barokah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(238, 0, '-', 'ANITA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(239, 0, '-', 'Aprima Yolanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(240, 0, '-', 'Arif Nur Setiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(241, 0, '-', 'ASMA RITA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(242, 0, '-', 'Azzahra Ramadhani R', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(243, 0, '-', 'Bobi perdana jaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(244, 0, '-', 'Camelia Nelsi Pasaribu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(245, 0, '-', 'Cusan Hewa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(246, 0, '-', 'Dara Marshania', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(247, 0, '-', 'Desi Henida', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(248, 0, '-', 'Diah Agustia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(249, 0, '-', 'Dimas Sartama Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(250, 0, '-', 'Dinda jovanka', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(251, 0, '-', 'Dori Juliandi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(252, 0, '-', 'Dwika Yanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(253, 0, '-', 'Efi Aulyana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(254, 0, '-', 'Farid ewaldo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(255, 0, '-', 'Fitria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(256, 0, '-', 'Hendri Saputra Utama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(257, 0, '-', 'Indra Zulfikar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(258, 0, '-', 'Jan Putra Meharta', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(259, 0, '-', 'Jodi Alamsyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(260, 0, '-', 'Kevin', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(261, 0, '-', 'Nabilla Putri Ramadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(262, 0, '-', 'Octavia putri ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(263, 0, '-', 'Raihan maulana yusuf', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(264, 0, '-', 'Rudi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(265, 0, '-', 'SINDI PERTITA SARI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(266, 0, '-', 'Tri Annisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(267, 0, '-', 'Wesa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(268, 0, '-', 'Zagi Franata', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(269, 0, '-', 'ADHITYA RAMADHAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(270, 0, '-', 'Afizoh Zikra Autrilizar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(271, 0, '-', 'Alvito Diaksa', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(272, 0, '-', 'Juan Christiansen Nathan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(273, 0, '-', 'Juwita rahma fitria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(274, 0, '-', 'KENJO LEO APRIDO', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(275, 0, '-', 'M. Abid Ihsan Ozzy', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(276, 0, '-', 'M. Alvian Hidayat', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(277, 0, '-', 'M. Fajar Ananda Rizki', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(278, 0, '-', 'M. IKHSAN FAHENDRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(279, 0, '-', 'M. Naufal Alfajri amin', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(280, 0, '-', 'M. USMAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(281, 0, '-', 'M. Zamrohni', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(282, 0, '-', 'MARICKEL SAPUTRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(283, 0, '-', 'Mariyani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(284, 0, '-', 'Michellia Natasya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(285, 0, '-', 'Muhammad Hival R', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(286, 0, '-', 'Muhammad Ilham', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(287, 0, '-', 'Muhammad Jafrian', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(288, 0, '-', 'Nahrifah Risky Namira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(289, 0, '-', 'Nazwa Rahman Yusni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(290, 0, '-', 'Niza Mufnah Ultia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(291, 0, '-', 'Nopi sri hartati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(292, 0, '-', 'Novel', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(293, 0, '-', 'Olipia Yulianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(294, 0, '-', 'Palda Tara Anggita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(295, 0, '-', 'Puput adiyanti ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(296, 0, '-', 'Puput Puji Lestari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(297, 0, '-', 'RAHMAD DEZA S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(298, 0, '-', 'RAMADHONI', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(299, 0, '-', 'Rangga Ahmad Robelio', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(300, 0, '-', 'Rexa apresha', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(301, 0, '-', 'Rifqi maulana', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(302, 0, '-', 'Riko Purdiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(303, 0, '-', 'Riko Yendra  Saputra ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(304, 0, '-', 'Riski Yulianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(305, 0, '-', 'Sandia putri kusuma', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(306, 0, '-', 'Seny damita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(307, 0, '-', 'Aretha Dyah Cahyaningtyas', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(308, 0, '-', 'ARI SAPUTRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(309, 0, '-', 'AUGIE SYAHIDA WANZA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(310, 0, '-', 'Awindi Fehira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(311, 0, '-', 'Bunga Rahmi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(312, 0, '-', 'Callista Widyadhana ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(313, 0, '-', 'DESINTA REVA ARTANEVIA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(314, 0, '-', 'Evrillia Aurora Bilqis', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(315, 0, '-', 'Ferdynand savva relo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(316, 0, '-', 'Feruziakinta Syakira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(317, 0, '-', 'FITRAH HAYATI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(318, 0, '-', 'Fiyona Melati Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(319, 0, '-', 'Hani Zulmeirita Rizki', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(320, 0, '-', 'HAZEL EZRA ANANTASYA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(321, 0, '-', 'KAMILAH KANAYA AZIES', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(322, 0, '-', 'M. Agil Alghani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(323, 0, '-', 'M.FAZRIAN HUSEIN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(324, 0, '-', 'Maheza Novrayuda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(325, 0, '-', 'Marshal Tsaniatu Jiddan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(326, 0, '-', 'Marsyanda Aulia .S', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(327, 0, '-', 'Muhammad Algi Fhari', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(328, 0, '-', 'MUHAMMAD RAUSHAN ALFIKRI', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(329, 0, '-', 'Mutiara Fadilah Rahmadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(330, 0, '-', 'Najwa Fitri Desaspriya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(331, 0, '-', 'Novita permata sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(332, 0, '-', 'Prima husairi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(333, 0, '-', 'Ratu Aulia Guna', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(334, 0, '-', 'Renaldi agustiyanjaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(335, 0, '-', 'RENO FITO ADIPUTRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(336, 0, '-', 'REXY ANDREAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(337, 0, '-', 'SALSABILA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(338, 0, '-', 'Sarah Amelia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(339, 0, '-', 'Sophie Dayang Pradila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(340, 0, '-', 'SYAPNA KISTI PRADANI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(341, 0, '-', 'Wulan Septiani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(342, 0, '-', 'Yolan Dewanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(343, 0, '-', 'Yuchela Yushalyana D', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(344, 0, '-', 'Aan Putri Oktaviani Pasaribu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(345, 0, '-', 'Adhea Mustikaning Ayu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(346, 0, '-', 'Amelia Putri Kania', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(347, 0, '-', 'Annisa salsahena', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(348, 0, '-', 'Azizul hakim', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(349, 0, '-', 'Bata Raja Rambe ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(350, 0, '-', 'Chika adilla putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(351, 0, '-', 'Egi Firmansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(352, 0, '-', 'Fauziah Zakiyaturrahmah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(353, 0, '-', 'Haydar Awalian Nesta', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(354, 0, '-', 'HAZIM IZRA ANANTASYA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(355, 0, '-', 'JEFFRI YULISTIANTO ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(356, 0, '-', 'Kaira amara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(357, 0, '-', 'Kania Rahma Aulia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(358, 0, '-', 'Lintang Amanda Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(359, 0, '-', 'M Rio alfajri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(360, 0, '-', 'M. Frezi alfrok', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(361, 0, '-', 'MAIZHA ALIFIA A\'YUN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(362, 0, '-', 'MUHAMAD REZKI PRATAMA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(363, 0, '-', 'Muhammad Arya Ghuna', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(364, 0, '-', 'MUHAMMAD EXCEL ADISTYRA ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(365, 0, '-', 'Muhammad Iqbal Rizq ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(366, 0, '-', 'Nabila Anggun Chantika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(367, 0, '-', 'Naufal Akram', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(368, 0, '-', 'NAWAL FARHAH', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(369, 0, '-', 'Novan Darlind Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48');
INSERT INTO `anggota` (`id`, `user_id`, `no_identitas`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`, `status`, `dibuat`, `created_at`, `updated_at`) VALUES
(370, 0, '-', 'NURASYA QAZA DELBINA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(371, 0, '-', 'Rachel Derisa Bintari Veliza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(372, 0, '-', 'RAFI ARDAN FERDIAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(373, 0, '-', 'RAHMI AZIMA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(374, 0, '-', 'Salmia Ratu Linisma', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(375, 0, '-', 'SELVIA LIYANI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(376, 0, '-', 'SHOLIKHAH RISQI DWI ANGGRAINI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(377, 0, '-', 'Sinta laura kasih', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(378, 0, '-', 'Sonia mayang sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(379, 0, '-', 'TAMARA ARDIAN RAMADHANTI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(380, 0, '-', 'Allyo khamambel', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(381, 0, '-', 'Amriansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(382, 0, '-', 'Ana Maria Desica', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(383, 0, '-', 'ANNISA JULIANA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(384, 0, '-', 'Ariq trikuncoro', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(385, 0, '-', 'Bagaskara', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(386, 0, '-', 'Bunga Syawalia Elizabet', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(387, 0, '-', 'Daniel Firmansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(388, 0, '-', 'Dhea fernanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(389, 0, '-', 'Elsya mutiara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(390, 0, '-', 'Euis Dwi Permatasari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(391, 0, '-', 'FAJAR NUGRAHA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(392, 0, '-', 'Fauzan adzhin jauhari', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(393, 0, '-', 'Ghulam Dzaky', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(394, 0, '-', 'Gideon Paris tua.s', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(395, 0, '-', 'HADI SEPTIAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(396, 0, '-', 'INEZ AURA WIRDA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(397, 0, '-', 'Khairina Aulia Suhanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(398, 0, '-', 'M Satrio Hatmawijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(399, 0, '-', 'M. Bayu Maha Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(400, 0, '-', 'M.Clario Alkhauri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(401, 0, '-', 'M.FUAD ALFARID', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(402, 0, '-', 'M.HAIKAL', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(403, 0, '-', 'Mariska Kurnia Sofitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(404, 0, '-', 'Miranti Novita sari ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(405, 0, '-', 'Muhammad Mahdi Al R', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(406, 0, '-', 'Mutia Readhatul J', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(407, 0, '-', 'Na\'imahtul Zakiyah Dwi W', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(408, 0, '-', 'Najwa Fadria Ramadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(409, 0, '-', 'Rahma Aiskha Mirza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(410, 0, '-', 'Sandra agustin', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(411, 0, '-', 'SULIS TIANA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(412, 0, '-', 'Swezty Luthfiyana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(413, 0, '-', 'Syarlia Lulu Aisy', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(414, 0, '-', 'WIDYA DWI ANGGRAENI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(415, 0, '-', 'Yesi Gustina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(416, 0, '-', 'Adi Raja ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(417, 0, '-', 'Adinda Novria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(418, 0, '-', 'Berman Nababan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(419, 0, '-', 'CHELSEA SYILVIKAMELIA A', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(420, 0, '-', 'Dimas Prasetyo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(421, 0, '-', 'Farus Susanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(422, 0, '-', 'Fernando Jawanda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(423, 0, '-', 'FIKRI HIDAYATULLAH', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(424, 0, '-', 'FIRANIKA MARSELA A', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(425, 0, '-', 'FRENDI SETIAWAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(426, 0, '-', 'Gilang Perdana Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(427, 0, '-', 'HABIB RAMADHAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(428, 0, '-', 'Jony Ardi Steviano', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(429, 0, '-', 'Joy Jordan Simbolon', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(430, 0, '-', 'Joyce ischak sinaga', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(431, 0, '-', 'Kamilia Deandra Azies', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(432, 0, '-', 'Lambok Dul Perin. S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(433, 0, '-', 'Lintang Yoga Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(434, 0, '-', 'M.RADITYA AL-HADID', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(435, 0, '-', 'M.RIFKI TRI MANDALA P', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(436, 0, '-', 'Muhammad Alfan Destio', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(437, 0, '-', 'Nabila Dwi Fitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(438, 0, '-', 'Nandicho Naufal Riza', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(439, 0, '-', 'Natasya Wulandari ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(440, 0, '-', 'Preity Febrianis Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(441, 0, '-', 'PRETY AUDY PUSPITA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(442, 0, '-', 'Putri regina maharani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(443, 0, '-', 'RAFLIANRI BRILLIAN P', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(444, 0, '-', 'REYHAN ALWAFI', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(445, 0, '-', 'Sai Maulana qori', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(446, 0, '-', 'Sheila sutiawati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(447, 0, '-', 'STHEFANI BR SAGALA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(448, 0, '-', 'Syabrina Baarcyha', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(449, 0, '-', 'Tesa Dwi Rahmadia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(450, 0, '-', 'WAHYU CANDRA T', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(451, 0, '-', 'Zahrotil Wahidah ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(452, 0, '-', 'Adelia yensi putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(453, 0, '-', 'AGNAS ELFANZA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(454, 0, '-', 'Ahmad Bayu Nugroho', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(455, 0, '-', 'Anggun Vidia Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(456, 0, '-', 'Artita selmi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(457, 0, '-', 'BREMA ANDIKA GINTING', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(458, 0, '-', 'Devy zahra putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(459, 0, '-', 'Dicky Hamdani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(460, 0, '-', 'Dion', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(461, 0, '-', 'DWI WULANDARI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(462, 0, '-', 'Eggi Ardiansyah Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(463, 0, '-', 'Fitriaisyah rantanu zevani put', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(464, 0, '-', 'Gagah Prasetyo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(465, 0, '-', 'GIHAN NAYLA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(466, 0, '-', 'Helen Syahada', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(467, 0, '-', 'IDRIS OKTAVIANUS SITEPU', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(468, 0, '-', 'Julianti Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(469, 0, '-', 'Khairani Desita Ningsih', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(470, 0, '-', 'Khairunisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(471, 0, '-', 'M DAFFA CALZIFRI S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(472, 0, '-', 'M.galang Rizki Winata', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(473, 0, '-', 'M.zacky Defitra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(474, 0, '-', 'MUHAMAD DAFFA F', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(475, 0, '-', 'Muhammad Ryand Alfikri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(476, 0, '-', 'Nadia kurnia putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(477, 0, '-', 'NURHIDAYAT DWI ARJUNA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(478, 0, '-', 'OKADWI PRATAMA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(479, 0, '-', 'Rahma kometri irana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(480, 0, '-', 'Ratu sarah jane', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(481, 0, '-', 'Romi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(482, 0, '-', 'Sagia vikta ziranda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(483, 0, '-', 'Try Jasmine Fathira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(484, 0, '-', 'Wildan Al Khairi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(485, 0, '-', 'Willy Aldino', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(486, 0, '-', 'Zaiyah Afifah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(487, 0, '-', 'Zhulhan shayiba', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(488, 0, '-', 'Ahmad Rendi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(489, 0, '-', 'Aidil Dwi Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(490, 0, '-', 'Alvani Rahma Nisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(491, 0, '-', 'Anggun Satya Meilina ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(492, 0, '-', 'ARI FEBRIAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(493, 0, '-', 'Erik Alamsyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(494, 0, '-', 'Frisca Andriani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(495, 0, '-', 'Ghufron Amal Ma\'ruf', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(496, 0, '-', 'Helen Sabrina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(497, 0, '-', 'Hellen pratiwi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(498, 0, '-', 'Himmatul Alyah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(499, 0, '-', 'Ilhamhendryyansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(500, 0, '-', 'JEFFREY ARVIANIKO', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(501, 0, '-', 'Kevin Agustin Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(502, 0, '-', 'Krista angelica indria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(503, 0, '-', 'M. Azizur Rohim', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(504, 0, '-', 'M. Ridho Habibi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(505, 0, '-', 'M.Bariq alfadilah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(506, 0, '-', 'M.RASKHY ALGAZY', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(507, 0, '-', 'Micha ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(508, 0, '-', 'Muhammad Bagus Aji S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(509, 0, '-', 'Nabil Veriyera', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(510, 0, '-', 'Nabila Queentania W', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(511, 0, '-', 'Nadia Farhana ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(512, 0, '-', 'Nanda Farhan Maulana', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(513, 0, '-', 'Parhan Andhika P', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(514, 0, '-', 'Redi Setiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(515, 0, '-', 'Rifaldo Septian Syah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(516, 0, '-', 'Sarah Fairuza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(517, 0, '-', 'SUCI MARDIAH', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(518, 0, '-', 'Zagi Franata', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(519, 0, '-', 'Zecky Jupri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(520, 0, '-', 'Zizi Salsabillah Andia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(521, 1383, '123', 'tere', 'Perempuan', 'jambi', '0877', 'Aktif', '01-Mar-2021', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(522, 1384, '1211', 'ahmad', 'Laki - Laki', 'jambi', '0888', 'Aktif', '01-Mar-2021', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(523, 1385, '12345678', 'Budi sartono', 'Laki - Laki', 'jambi', '083344556677', 'Aktif', '16-Jan-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(524, 1386, '3456789', 'Budi artino', 'Laki - Laki', 'xx', '082282692489', 'Aktif', '16-Jan-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(525, 1387, '154556677', 'budi suratno2', 'Laki - Laki', 'lalasulala', '5646456', 'Aktif', '18-Jan-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(526, 1388, '56756756', 'gfhgfjfgj', 'Laki - Laki', 'fghjgfh', '56464563', 'Aktif', '18-Jan-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(527, 1389, '12345', 'qwerty', 'Perempuan', 'xyz', '0811', 'Aktif', '02-Jun-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(528, 1390, '7777777777', 'qqqqqqqqqqq', 'Perempuan', 'wwwwwwwwwwwwwww', '55555555555555', 'Aktif', '03-Jun-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(529, 1391, '11111', 'aaaaa', 'Laki - Laki', 'aaaaa', '11111', 'Aktif', '04-Jun-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(530, 1392, '33333', 'bbbbbbbb', 'Laki - Laki', 'bbbbb', '343434343', 'Aktif', '04-Jun-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(532, 1394, '563276', 'andri', 'Laki - Laki', 'kibul', '085366892357', 'Aktif', '13-Jun-2022', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(541, 1403, '0020', 'pengky', 'Laki - Laki', 'kerinci', '-', 'Aktif', '06-Jul-2022', '2022-07-06 12:36:45', '2022-07-06 12:36:45'),
(542, 1404, '1111112', 'leo', 'Laki - Laki', 'kerinci', '-', 'Aktif', '06-Jul-2022', '2022-07-06 12:44:39', '2022-07-06 12:44:39'),
(543, 1405, '121212', 'halyd', 'Laki - Laki', 'jambi', '-', 'Aktif', '07-Jul-2022', '2022-07-07 09:07:33', '2022-07-07 09:07:33'),
(544, 1406, '111123', 'pandi', 'Laki - Laki', 'kerinci', '-', 'Aktif', '14-Jul-2022', '2022-07-14 03:27:47', '2022-07-14 03:27:47'),
(545, 1407, '45678', 'kenbo', 'Laki - Laki', 'kerinci', '-', 'Aktif', '14-Jul-2022', '2022-07-14 09:24:52', '2022-07-14 09:24:52'),
(546, 1408, '6666666', 'kintani', 'Laki - Laki', 'kkkkkkk', '-', 'Aktif', '14-Jul-2022', '2022-07-14 09:42:09', '2022-07-14 09:42:09'),
(547, 1409, '4447', 'beno', 'Laki - Laki', 'kkkkk', '-', 'Aktif', '15-Jul-2022', '2022-07-15 17:34:47', '2022-07-15 17:34:47'),
(548, 1410, '44477755', 'bennno', 'Laki - Laki', 'kerinci', '-', 'Aktif', '16-Jul-2022', '2022-07-16 03:29:03', '2022-07-16 03:29:03'),
(549, 1411, '55555550', 'kholil ikhsan', 'Laki - Laki', 'kerinci', '-', 'Aktif', '16-Jul-2022', '2022-07-16 08:21:49', '2022-07-16 08:21:49'),
(550, 1412, '086666', 'hendra amaldi', 'Laki - Laki', 'kerinci', '-', 'Aktif', '26-Jul-2022', '2022-07-26 04:12:34', '2022-07-26 04:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` smallint(6) NOT NULL,
  `ditambahkan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `penulis`, `penerbit`, `tahun`, `kota`, `stok`, `ditambahkan`, `created_at`, `updated_at`) VALUES
(19, '001.2018.001.01', 'Pendidikan Agama Islam (X SMA/MA | SMK/MAK)', 'Netry Khairiyah, Efendi Suhendri', 'Erlangga', 2018, 'Yogyakarta', 14, '16-Jun-2022', '2022-06-15 21:13:34', '2022-07-20 07:18:26'),
(21, '002.2015.001.01', 'Al-Qur\'an (X SMA/MA | SMK/MAK/Semester)', 'Toha Putra', 'Yudhistira', 2015, 'Jakarta', 5, '16-Jun-2022', '2022-06-16 05:47:39', '2022-07-20 06:29:57'),
(22, '003.2020.001.01', 'Pendidikan Agama Islam dan Budi Pekerti (X SMA/MA | SMK/MAK/Semester)', 'H. Abd. Rohman, Hj. Lim Halimah, Munawir, A.M.', 'Yudhistira', 2020, 'Yogyakarta', 13, '16-Jun-2022', '2022-06-16 06:13:36', '2022-07-21 01:46:49'),
(23, '051.2020.002.02', 'Ilmu Pengetahan Alam (X SMA/MA | SMK/MAK/Semester)', 'Make Miarsyah, Tia Mutiara, Dewi Luvfiati', 'Erlangga', 2020, 'Yogyakarta', 8, '16-Jun-2022', '2022-06-16 06:20:19', '2022-07-06 12:46:06'),
(24, '052.2021.002.02', 'Kimia (X SMA/MA | SMK/MAK/Semester)', 'Siswanto Djony, Siti Daniah', 'Erlangga', 2021, 'Bandung', 3, '16-Jun-2022', '2022-06-16 06:41:12', '2022-07-16 08:29:03'),
(27, '102.2016.002.02', 'bahasa jepang', 'kyoto', 'putra media jakarta', 2016, 'jambi', 17, '27-Jun-2022', '2022-06-27 23:30:12', '2022-07-16 08:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Dikembalikan','Belum Dikembalikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `peminjaman_id`, `buku_id`, `status`) VALUES
(49, 11, 19, 'Dikembalikan'),
(50, 17, 19, 'Dikembalikan'),
(51, 31, 21, 'Dikembalikan'),
(55, 31, 19, 'Dikembalikan'),
(57, 35, 21, 'Belum Dikembalikan'),
(58, 37, 19, 'Belum Dikembalikan'),
(59, 38, 19, 'Dikembalikan'),
(60, 38, 21, 'Dikembalikan'),
(61, 38, 23, 'Dikembalikan'),
(69, 43, 19, 'Belum Dikembalikan'),
(73, 48, 24, 'Belum Dikembalikan'),
(74, 49, 19, 'Dikembalikan'),
(75, 49, 21, 'Dikembalikan'),
(76, 49, 27, 'Dikembalikan'),
(77, 50, 19, 'Belum Dikembalikan'),
(78, 50, 21, 'Belum Dikembalikan'),
(79, 50, 27, 'Belum Dikembalikan'),
(84, 53, 22, 'Dikembalikan'),
(85, 53, 19, 'Dikembalikan'),
(86, 53, 24, 'Dikembalikan'),
(87, 54, 19, 'Dikembalikan'),
(88, 54, 22, 'Dikembalikan'),
(89, 54, 24, 'Dikembalikan'),
(90, 55, 19, 'Dikembalikan'),
(91, 55, 27, 'Dikembalikan'),
(92, 57, 21, 'Dikembalikan'),
(93, 58, 19, 'Belum Dikembalikan'),
(94, 56, 22, 'Belum Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(2, 'XI'),
(7, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `kode_buku`
--

CREATE TABLE `kode_buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(40) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `lokasi_rak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_buku`
--

INSERT INTO `kode_buku` (`id`, `kode_buku`, `keterangan`, `lokasi_rak`) VALUES
(11, '001.2015.001.01-050.2022.001.01', 'Agama', '01'),
(12, '051.2015.002.02-100.2022.002.02', 'IPA', '02'),
(13, '101.2015.002.02-150.2022.002.02', 'Bahasa', '03');

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `user_petugas_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengembalian` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Berlangsung','Selesai','Perpanjangan','Tidak Dikembalikan','Diganti') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `anggota_id`, `user_petugas_id`, `tanggal`, `tanggal_pengembalian`, `status`, `created_at`, `updated_at`) VALUES
(11, 24, 1, '06-Jan-2022', '12-Jan-2022', 'Selesai', '2022-01-06 10:38:04', '2022-06-20 10:38:04'),
(14, 3, 1, '06-Jan-2022', '28-Jan-2022', 'Selesai', '2022-01-06 10:38:04', '2022-06-20 10:38:04'),
(16, 10, 1, '16-Jan-2022', '21-Jan-2022', 'Selesai', '2022-01-16 10:38:04', '2022-06-20 10:38:04'),
(17, 523, 1, '01-Jan-2022', '18-Jan-2022', 'Selesai', '2022-01-01 10:38:04', '2022-06-20 10:38:04'),
(28, 4, 1, '13-Jun-2022', '18-Jun-2022', 'Selesai', '2022-06-13 10:38:04', '2022-06-20 10:38:04'),
(29, 6, 1, '13-Jun-2022', '18-Jun-2022', 'Selesai', '2022-06-13 10:38:04', '2022-06-20 10:38:04'),
(31, 7, 1, '15-Jun-2022', '17-Jul-2022', 'Selesai', '2022-06-15 10:38:04', '2022-06-20 10:38:04'),
(33, 473, 1, '16-Jun-2022', '17-Jun-2022', 'Selesai', '2022-06-16 10:38:04', '2022-06-20 10:38:04'),
(34, 4, 1, '01-Jun-2022', '10-Jun-2022', 'Berlangsung', '2022-06-01 10:38:04', '2022-06-20 10:38:04'),
(35, 6, 1, '17-Jun-2022', '22-Jun-2022', 'Berlangsung', '2022-06-17 10:38:04', '2022-06-20 10:38:04'),
(37, 3, 1, '2022-01-01', '2022-01-07', 'Berlangsung', '2022-06-20 19:53:38', '2022-06-20 19:53:38'),
(38, 9, 1, '2022-01-01', '2022-07-04', 'Selesai', '2022-06-27 23:31:27', '2022-06-27 23:59:03'),
(43, 19, 1, '2022-01-01', '2022-06-01', 'Berlangsung', '2022-07-06 12:42:05', '2022-07-06 12:42:05'),
(48, 543, 1, '2022-01-01', '2022-06-03', 'Berlangsung', '2022-07-07 09:23:12', '2022-07-07 09:23:12'),
(49, 544, 1, '2022-07-14', '2022-07-28', 'Selesai', '2022-07-14 03:33:51', '2022-07-14 04:02:10'),
(50, 546, 1, '2022-07-14', '2022-07-21', 'Berlangsung', '2022-07-14 09:44:32', '2022-07-14 09:44:32'),
(53, 548, 1, '2022-07-16', '2022-07-28', 'Selesai', '2022-07-16 03:30:44', '2022-07-16 03:34:49'),
(54, 549, 1, '2022-07-16', '2022-07-30', 'Selesai', '2022-07-16 08:23:19', '2022-07-16 08:29:03'),
(55, 549, 1, '2022-07-16', '2022-07-23', 'Selesai', '2022-07-16 08:30:26', '2022-07-16 08:42:41'),
(56, 549, 1, '2022-07-20', '2022-07-27', 'Berlangsung', '2022-07-20 06:24:03', '2022-07-20 06:24:03'),
(57, 549, 1, '2022-07-20', '2022-07-27', 'Selesai', '2022-07-20 06:26:00', '2022-07-20 06:29:57'),
(58, 549, 1, '2022-07-20', '2022-08-01', 'Perpanjangan', '2022-07-20 07:18:16', '2022-07-20 07:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denda_terlambat` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `peminjaman_id`, `tanggal`, `denda_terlambat`, `created_at`, `updated_at`) VALUES
(7, 16, '16-Jan-2022', 0, '2022-01-16 10:41:26', '2022-06-20 10:41:26'),
(17, 28, '13-Jun-2022', 3000, '2022-06-13 10:41:26', '2022-06-20 10:41:26'),
(18, 29, '13-Jun-2022', 5000, '2022-06-13 10:41:26', '2022-06-20 10:41:26'),
(19, 33, '16-Jun-2022', 1000, '2022-06-16 10:41:26', '2022-06-20 10:41:26'),
(20, 14, '16-Jun-2022', 1000, '2022-06-16 10:41:26', '2022-06-20 10:41:26'),
(21, 17, '16-Jun-2022', 10000, '2022-06-16 10:41:26', '2022-06-20 10:41:26'),
(22, 11, '17-Jun-2022', 2000, '2022-06-17 10:41:26', '2022-06-20 10:41:26'),
(23, 31, '17-Jun-2022', 0, '2022-06-17 10:41:26', '2022-06-20 10:41:26'),
(25, 38, '2022-06-27', 0, '2022-06-27 23:59:03', '2022-06-27 23:59:03'),
(28, 49, '2022-01-01', 0, '2022-07-14 04:02:10', '2022-07-14 04:02:10'),
(30, 53, '2022-07-16', 0, '2022-07-16 03:34:49', '2022-07-16 03:34:49'),
(31, 54, '2022-07-16', 0, '2022-07-16 08:29:03', '2022-07-16 08:29:03'),
(32, 55, '2022-07-16', 0, '2022-07-16 08:42:41', '2022-07-16 08:42:41'),
(33, 57, '2022-07-20', 0, '2022-07-20 06:29:57', '2022-07-20 06:29:57');

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
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Guru','Siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$SQ7or2rOxdAve9n41yYNMOonpT3P3Z0x6Btjs7bTAQM5yT/9ylhKy', 'Admin'),
(1156, 'Nisa Winda', 'nisawinda@gmail.com', '$2y$10$hQtrsLLWjumQmfafKW36MOBRmK5mQPzD8eS/d0GAUqAb5WfNQku2a', 'Siswa'),
(1157, 'Parida', 'parida@gmail.com', '$2y$10$KK55gX9yUD4HZUTI6ARJcOqq7Qa/S5Bmp3R5r8rRWDpFxJGKVb/mC', 'Siswa'),
(1158, 'Paryan Nesfandiari', 'paryannesfandiari@gmail.com', '$2y$10$UCHVHO8rShTGLVX5Ozd6Ou7aruGyw3rC0RKR5b0Hm0VAsGJI2vzmu', 'Siswa'),
(1159, 'Putri Ayu', 'putriayu@gmail.com', '$2y$10$W9KJuuopm6o.8tomGILkS.yc3MIaAUMJmyzbuXWzBsTvwftl73G0S', 'Siswa'),
(1160, 'Rara Mutiara', 'raramutiara@gmail.com', '$2y$10$xmsj4bsdpHMC8d9ENOzIledxmMeVxOzf9YQSAo5ABwBVoR.HS7tD2', 'Siswa'),
(1161, 'Ronal Putra', 'ronalputra@gmail.com', '$2y$10$WZHhp8DZkCeG8LOUmfB1ZesJ9.eJExxDXP2/nM7Ce06aG0CbWCVsW', 'Siswa'),
(1162, 'Rosalia Anggun Sari', 'rosaliaanggunsari@gmail.com', '$2y$10$d2hFuMmBTUIO6BRe31fc9.b/nHWgd9j/50dto/N9OIGP9H/A2Iv6K', 'Siswa'),
(1163, 'Safira Norila', 'safiranorila@gmail.com', '$2y$10$tShR1sTqc1.PPeJpVEzdsOaHPYPYUxzNtcnmRt0vbp/fyhqYgx4sq', 'Siswa'),
(1164, 'Salsah Irfaniah', 'salsahirfaniah@gmail.com', '$2y$10$7UI9w5bIkyKTuNw.0dKjyOxCmJjiwm3ugLgh2ory6xaE8rL4Zscs6', 'Siswa'),
(1165, 'Shanju Ardian Putra', 'shanjuardianputra@gmail.com', '$2y$10$vcGZDYhKcNj/3yG5xfhvAeH8/EupDFROLjirApaq70LFFBFTNuexW', 'Siswa'),
(1166, 'Silviani', 'silviani@gmail.com', '$2y$10$rmhbvj/6y79js.sC3pbxG.DfwAeee87Q.kqqA1RLKKnaGzzh/ekNm', 'Siswa'),
(1167, 'Sinta Arianti', 'sintaarianti@gmail.com', '$2y$10$0MwfLLIEUk.YWfEFSAhePeSlAu0E.qhhE0v29kde5YlUXIaJt9bOi', 'Siswa'),
(1168, 'Siti Komah', 'sitikomah@gmail.com', '$2y$10$NE7E7o1dS003OIMELoOtwOtx0D99VJEiC8IDZfYuwyMPdTdrCXN3S', 'Siswa'),
(1169, 'Siti Saudah', 'sitisaudah@gmail.com', '$2y$10$QXceD0o7ZcYgQtPsOvphpeg1iCinaQCanpmAL8K9MCDwDJoeb9qdK', 'Siswa'),
(1170, 'Suci Ramadani', 'suciramadani@gmail.com', '$2y$10$f.x3rTWZn6uG4.jRSG26JOjLZcQKfsnWAstiM6uFdDPvBHFilz37.', 'Siswa'),
(1171, 'Sumarni', 'sumarni@gmail.com', '$2y$10$haI7wlcC8afcptIRKwhbUewqEqkLmKYl2U.zJyhMHR7Flbg/enjVy', 'Siswa'),
(1172, 'Ulan Patmala Sari', 'ulanpatmalasari@gmail.com', '$2y$10$e3gG7V2Ga8zu6T8mOqwaIeu0ufBgX9LRgYqL93voznbttXGtxNiZu', 'Siswa'),
(1173, 'Umira', 'umira@gmail.com', '$2y$10$EboGyU1xlbB9uauLanlYjeS9L0pnUAEvToJsr/QtHu6MXZ8R9kGZ.', 'Siswa'),
(1174, 'Uswatun Hasanah', 'uswatunhasanah@gmail.com', '$2y$10$qGtsUi8sA08mByOzv9PNCel9ei1SKmvZF42rxu9VaOxnLMyPCXQA6', 'Siswa'),
(1175, 'Aina Pitri Holiza', 'ainapitriholiza@gmail.com', '$2y$10$iIxTByOarRRcjn/6edkuaeQrs87E9mzsOdYiM8ayfvA4YCL2lABYC', 'Siswa'),
(1176, 'Alfi Syahrin', 'alfisyahrin@gmail.com', '$2y$10$mnZC2.bHLedD6nnusnNu6u83h9NIKGuCWPfHqN.xWRl9i/dcKj2zq', 'Siswa'),
(1177, 'Ana Maryani', 'anamaryani@gmail.com', '$2y$10$bpTx9BpveWMsjACjp6jCkubNUe3fQE/y2w00AThGViDi8Hv2s5YHe', 'Siswa'),
(1178, 'Ananda Saputra', 'anandasaputra@gmail.com', '$2y$10$CBU1MMykT6qX4rLKJjh66.C4mYLLTzl6gNlSXJEcsedFsYUzjb64O', 'Siswa'),
(1179, 'Antoni Saputra Gunawan', 'antonisaputragunawan@gmail.com', '$2y$10$I/lKD5QhsvOsTFuIBDDTi.bKqMdo6RrmI0PkGjps9CxTIAqd.YzKy', 'Siswa'),
(1183, 'Egi Prayogi Pratama', 'egiprayogipratama@gmail.com', '$2y$10$2rfoZIQskA5faMabqNUhf.QmTfAJAjPZFLvM30S8HisRhYphpwOMW', 'Siswa'),
(1184, 'Emilia', 'emilia@gmail.com', '$2y$10$1ZjAC9YyMYW/4SdYCRtLo.XE1/olC0YFpITwzEJqzr5lbVojUrikS', 'Siswa'),
(1185, 'Fendlinalisa Nursyahrin', 'fendlinalisanursyahrin@gmail.com', '$2y$10$oJ9sFZ.vWZe4MiLiRmpYbORpDeYOF43v3GV6dmQ20vmkBa/lINDjC', 'Siswa'),
(1186, 'Ina Sunarni', 'inasunarni@gmail.com', '$2y$10$Rmg10p4qTubwxKNxCG83Fefun5ib/dnpiXRKohwP8DlHUU.c3ZvOe', 'Siswa'),
(1187, 'Mareta Nur Arudah', 'maretanurarudah@gmail.com', '$2y$10$y9vGqRaVCc0lKmBrkFfc9OFy63OS.y0FtCQnqk6jhVn6RTcDK58tS', 'Siswa'),
(1188, 'Mauly Anitia', 'maulyanitia@gmail.com', '$2y$10$ddumsYeG72Df3Gz6UJzyouT.ZGOE2LeY.CdVtnN.4E0bDKyHCFR9G', 'Siswa'),
(1189, 'Merry Yani Simangunsong', 'merryyanisimangunsong@gmail.com', '$2y$10$NcM3eapM7Nl/YR1/OcT4tulU5ZhLXDetOW4yP5f5fZ/BxfrAWX9.i', 'Siswa'),
(1190, 'Michael Parlindungan Samosir', 'michaelparlindungansamosir@gmail.com', '$2y$10$y/EIwgv8fIqB3Nv8NfGkS.kqCRSCxJT8sxnGhiTvBUgyDR9gRdHTu', 'Siswa'),
(1191, 'Muhammad Arif', 'muhammadarif@gmail.com', '$2y$10$RjrqkX4ASj4nT5iH1Ol9Cuj0BV5LfiGkDT1uXN/WjkxBzYjQgW6sS', 'Siswa'),
(1192, 'Muhammad Dito Valtian', 'muhammadditovaltian@gmail.com', '$2y$10$ugkIZ5Li0nPL.CcFlwyq2eKD/T7OiSpHceVKgMCLrMPHduPsJgshq', 'Siswa'),
(1193, 'Muhammd Usman', 'muhammdusman@gmail.com', '$2y$10$ZRHX98x36DoN3tEk6UitWusOt4tt56s1oRW1u3fBUzFBTWPgDywN2', 'Siswa'),
(1194, 'Neli Aini', 'neliaini@gmail.com', '$2y$10$gmKgXEKWk4uE/Y4siQCPveJ/T4oJXyP27vD0DteYcocs9sjgXQjvW', 'Siswa'),
(1195, 'Nurul Hidayati Arifa', 'nurulhidayatiarifa@gmail.com', '$2y$10$Mlc4qP7y4JBYAlmGoYvcBO0fRnDRFJX59YnaizfNQ/rq7s7jczAx2', 'Siswa'),
(1196, 'Ocie Syafni', 'ociesyafni@gmail.com', '$2y$10$.yZaYnylUwjv2IbP815xbOs1L.sr9SKgw7HMDLTgqG52Gu1Rctcd2', 'Siswa'),
(1197, 'Resi Septia Isra', 'resiseptiaisra@gmail.com', '$2y$10$gJkRvKsiMseqLG2I4PXgU.gfMJBw9aVH5ZTFqAw9Zeu27XdyJFL8m', 'Siswa'),
(1198, 'Revo Muhamad Saputra', 'revomuhamadsaputra@gmail.com', '$2y$10$iPXryEHJZszireeQUMpAauBWpyYqXXq5KUaAN4kAH7V2mUZiPRz42', 'Siswa'),
(1199, 'Riki Sardiansah', 'rikisardiansah@gmail.com', '$2y$10$1rYj4O3kboz7ag8z5d32TuBw03LNkqgtSvYqfB1v8ZFo4Q9hWILsi', 'Siswa'),
(1200, 'Riska Umariah', 'riskaumariah@gmail.com', '$2y$10$E6/QvpTu3h07jem4dLtz9OiaksJzyAegvZJYHTQ5ys/njgcgD9wjG', 'Siswa'),
(1201, 'Riski Roma Dani', 'riskiromadani@gmail.com', '$2y$10$15Rk5VQpw30jOw0nA4fzwedS5eqNh3.PCeoYIEbIWvBvb6vmkVIoe', 'Siswa'),
(1202, 'Ultira Dwi Rahayu', 'ultiradwirahayu@gmail.com', '$2y$10$yUXSv/oVdUjwIR4NhSZu4e1agE6xP7SZ3jJsqf5LcN5aTWyRlNcCK', 'Siswa'),
(1203, 'Zaqiyah Risky Fadilah Muis', 'zaqiyahriskyfadilahmuis@gmail.com', '$2y$10$8wem.GJZIuwX5GZhrNpEsOOl5Tlaq7fB8w8tjtyEsQHtlvfIz64Na', 'Siswa'),
(1204, 'Adi Tegar Pambudi', 'aditegarpambudi@gmail.com', '$2y$10$wQFnhUl3m3oXdqtaj/m0/.iKlXMVNzHNPADfBRmWAG6j.0uOqj2re', 'Siswa'),
(1205, 'Alifya Arna Darmawan', 'alifyaarnadarmawan@gmail.com', '$2y$10$IItqUMULHCo7QisCBpEfbuz4HIcftjYw8m5Nb.Rd0BFm.3R29D06e', 'Siswa'),
(1206, 'Anita Zhahara', 'anitazhahara@gmail.com', '$2y$10$Nms04nf7oJRBtS1Gu4dmze4PnVCjTwSwqxZbJK0DClOwmLhqipSHa', 'Siswa'),
(1207, 'AZZALIA CHINTA SYAHFIDA', 'azzaliachintasyahfida@gmail.com', '$2y$10$zaQyKJFdCvo3rlYGFOqR0O2BsjdZHlM2lD.GrovdEcQbH2A/yR60W', 'Siswa'),
(1208, 'Ciko Intani', 'cikointani@gmail.com', '$2y$10$4lyTw6JvHW7pBR5qJT1KdOpVgL8u/Ue/utDVv4FdjRwA0MHn.kHP.', 'Siswa'),
(1209, 'Denis Lyon Malau', 'denislyonmalau@gmail.com', '$2y$10$o9p9Zt9U4ibQmIU5pyatouNBBaIq6WtX6qXfWuM3AzieRP2BAs3RG', 'Siswa'),
(1210, 'Deviatul Qotimah', 'deviatulqotimah@gmail.com', '$2y$10$4t4ElN.SSv2YXxYnuPll1e60zEJH.2GmO7s/d1xHBMbjZiO5ua9Py', 'Siswa'),
(1211, 'Fahri Hidayat', 'fahrihidayat@gmail.com', '$2y$10$FuWK6mn0y3.3XXk6u9qFh.tuTb0Ta8W.Dij3kho8MzA7AZojvlxDa', 'Siswa'),
(1212, 'Febrio Valentino', 'febriovalentino@gmail.com', '$2y$10$ZLgVSjgGceCmlXwBaJsOG.b2gbS3CKETciXfKnu1bzKvrEpI.bVDy', 'Siswa'),
(1213, 'Happy Aura', 'happyaura@gmail.com', '$2y$10$nPj5.nvbMcIuyFSMl6atu.RYHLaVJyE40OLwZAJeuMK3uSmXhOVlO', 'Siswa'),
(1214, 'Icha Mognicah', 'ichamognicah@gmail.com', '$2y$10$R4So7Ok/Hxs5q/PGspHuCOlfirO1bVTrwYpNI2mHxxNvSsuemysu.', 'Siswa'),
(1215, 'Khoratun Najwa', 'khoratunnajwa@gmail.com', '$2y$10$aymL9jaRTodi2OnY9aWDzuUUgvhgerAE8sJX49MA0DRuakgc95ef6', 'Siswa'),
(1216, 'Leo Agha Khusayra', 'leoaghakhusayra@gmail.com', '$2y$10$GDLP0V6.dXXie75z8R5kn.8ssjFswZL5nr71ZqRkyZc63MCk8h3w.', 'Siswa'),
(1217, 'M.pandu Wilantara', 'mpanduwilantara@gmail.com', '$2y$10$qjSY2lwKuQimqcj9YI6Sk.G0tu3/MGcZ0EQqfs0trr2oTABt5YIb6', 'Siswa'),
(1218, 'Muhammad Farid', 'muhammadfarid@gmail.com', '$2y$10$lv.Apyn.UbmbV2d0XH9l5O3SqoOTREwuo0Na0oYPlYn7IftX.7fLa', 'Siswa'),
(1219, 'Muhammad Nabil Alhafizh', 'muhammadnabilalhafizh@gmail.com', '$2y$10$CDz5/9bfYebeQaekOT9W4uvnyJR2i.1r68wa7tFFvyFwXgVDFToNq', 'Siswa'),
(1220, 'Muhammad Ridho Nugraha', 'muhammadridhonugraha@gmail.com', '$2y$10$g9rJDUj3jBqVUFJuqfY3pe1yEV8XIHwS/27ad/T1g1NxguqIcyFMO', 'Siswa'),
(1221, 'Muhammad Zain Frasetiawan', 'muhammadzainfrasetiawan@gmail.com', '$2y$10$Wdt1yj3r8bWO2sEifLh90ed0ZMrfYoRXgYE/LsxAWNQXJ0ZF8m2Oq', 'Siswa'),
(1222, 'Nadya Sadini', 'nadyasadini@gmail.com', '$2y$10$QVrOD9LnGJW.YOCpJEDLSep730LGqNPiyx7CTDkuTy5dRNSyokfuS', 'Siswa'),
(1223, 'Najwa Fazhira', 'najwafazhira@gmail.com', '$2y$10$mwPbLBX.6XyaKhDYar9K3.Fj/8KTNpS33GpNfgsR1ZLI0pMokfLRq', 'Siswa'),
(1224, 'Nanda Devita Sari', 'nandadevitasari@gmail.com', '$2y$10$yEauDuxYKzMdTZDcu88RnOPXZZYZtZi2SEcMbj3EOhkDhuZBAWWp.', 'Siswa'),
(1225, 'Nessie Gusriyani', 'nessiegusriyani@gmail.com', '$2y$10$KcTfi94qYi74N7a/beRkjuMIwxBoPKOPBz7jyWCQFmkjSr5PZwmHe', 'Siswa'),
(1226, 'Puspandhari Ilsa Pinasty', 'puspandhariilsapinasty@gmail.com', '$2y$10$9BN/u.5rCXirNzOGZbqdcerT0AIJT.ar1nGTFCVqNv2rAtbi53FFi', 'Siswa'),
(1227, 'Qonita Hafiza', 'qonitahafiza@gmail.com', '$2y$10$PCCYVgP7Hk5tkjhe.WgwG.jNCxXNGn6.rvZsgVzcQQ.RfdZh7tdtC', 'Siswa'),
(1228, 'Raihan Naufal Muzakki', 'raihannaufalmuzakki@gmail.com', '$2y$10$ksHk4Zc.BkGtKlsrUqpS5u4j3zm0iGmpt3uD/jvUfS2nMQ3Par/hu', 'Siswa'),
(1229, 'Reva Gari Mustika', 'revagarimustika@gmail.com', '$2y$10$YlKRvrduhjS28AXhVfpChe7m33zYb63YsebiKUUhZTiLKIqJru3MK', 'Siswa'),
(1230, 'Sabrina Nurchalisa', 'sabrinanurchalisa@gmail.com', '$2y$10$cNPzwN6ZgG8YJOOVNNrpOOF.HsNAqvDC.BhONVnxiVFYrr46U0/hi', 'Siswa'),
(1231, 'Syafira Salsa Ramadhinta', 'syafirasalsaramadhinta@gmail.com', '$2y$10$QYWvm.8QiAeNpG6O2l4lTudL09PLMo8Ab9.J1/E.ade8rbNYFBf9y', 'Siswa'),
(1232, 'Tanu Wijaya', 'tanuwijaya@gmail.com', '$2y$10$g7yCxhz2wRkbM/leOf3h5e4Snl5GVMoPBmBrfd7JJfMXoBPyP5URS', 'Siswa'),
(1233, 'Try Mutiara Insani', 'trymutiarainsani@gmail.com', '$2y$10$XjK7OG5XLB.jfED.rp9fdeVrE6iUFIw8ZwHfG/P4hdXd7gOD5DPhK', 'Siswa'),
(1234, 'Tsania Nabila Izzatia', 'tsanianabilaizzatia@gmail.com', '$2y$10$zWnaT1USyzzSttWDWh7n0ecMRMbv.4fDNZTXDr38jqVxI9KYuTvnG', 'Siswa'),
(1235, 'Yogi Kurniawan', 'yogikurniawan@gmail.com', '$2y$10$o0w4qieuFnLfTM8uamfFb.7wcD7t75ONg9UTJpykRWFrE8wpWnX0O', 'Siswa'),
(1236, 'Agun Andika Saputra', 'agunandikasaputra@gmail.com', '$2y$10$cdyYZgNxMHpNrf4AnygIMetUzFBgjMrB538q2ikEL8PAAvcfstta.', 'Siswa'),
(1237, 'Aldi Saputra', 'aldisaputra@gmail.com', '$2y$10$/4NxtlwHLogn7IeGq7902.v01y8sxZAVfV/0mth2K.aEoLhPpg5Xm', 'Siswa'),
(1238, 'Anton Murdiansah', 'antonmurdiansah@gmail.com', '$2y$10$oWgGFU.n3dv3LDAaMhfjiuCh3dEj5bhD3p9RYHIn3ppv4nrWJw/FK', 'Siswa'),
(1239, 'Auzza Dhuha Wijaya', 'auzzadhuhawijaya@gmail.com', '$2y$10$ZA0F9qZwqjlJisFjBUdbWeMMvF5S3Nvv7YRdRjRfmD6hiUu5h/0FS', 'Siswa'),
(1240, 'Bunga Pefrianti', 'bungapefrianti@gmail.com', '$2y$10$epZmsVVVaVmC1W0ECq4wmuyfwjRKQw87cJtcImRgZKCriVkCB8Owq', 'Siswa'),
(1241, 'Chandra Firmansyah', 'chandrafirmansyah@gmail.com', '$2y$10$/ZtZH0o08DsPSfNFHJUFkufECQPeAmbDyZhh2kJc68n3NJlYU8nMi', 'Siswa'),
(1242, 'Dea Amelia Putri', 'deaameliaputri@gmail.com', '$2y$10$N6Pa2xrz9X0OAKfsKJkkhewb/mhMMCwMVBlB6E63/yqQGmOILLBd2', 'Siswa'),
(1243, 'Dian Puspita Sari Br Sitepu', 'dianpuspitasaribrsitepu@gmail.com', '$2y$10$ow89DrEMcsy2oU1QOOoKauMf8g8Fmh1eq.r2JcSPp/MRXHRyJNlsm', 'Siswa'),
(1244, 'Dinda Melati Putri', 'dindamelatiputri@gmail.com', '$2y$10$yDB5dE9rtjKaOXWoQK3m2.gbhdD.txmX5vZeJVDTucborckoFUV3.', 'Siswa'),
(1245, 'Farhan Dwi Ramadan', 'farhandwiramadan@gmail.com', '$2y$10$6lki5L6KbZOPdQ2rjFjQ8uLzzjUTeDuj8QA4Sa95bqiJddwOgkJ.G', 'Siswa'),
(1246, 'Fiki Nuraqmal', 'fikinuraqmal@gmail.com', '$2y$10$EVYazt9zCZNGwcBoYK7VHeYQL4wez7SiW.oMAj8hAzZMeOWQfknvy', 'Siswa'),
(1247, 'Fionika Yulianisya', 'fionikayulianisya@gmail.com', '$2y$10$v6j1o5uD9GMTFMskstExo.cMndZAbQzm0NiK6/.1EtjqzGY22ewbO', 'Siswa'),
(1248, 'Fitri Mayang Sari', 'fitrimayangsari@gmail.com', '$2y$10$V7t2UU9YP4ntDPmvujKrRuvMWZUZ5P43P.pOE1Am1.A3h2pmmCIji', 'Siswa'),
(1249, 'Fuji Cantika', 'fujicantika@gmail.com', '$2y$10$RDNIXr6wObgv8ShV/AbJD.fNdT0qHoZhMd6Fp96ilqglxzqd763Du', 'Siswa'),
(1250, 'Glory Irene', 'gloryirene@gmail.com', '$2y$10$HPkIUw2UtJdgTTuZnSuT7ulNwTDLMzGJ/Sexskw/w9nIsIb.p6wBi', 'Siswa'),
(1251, 'Hani Syakila', 'hanisyakila@gmail.com', '$2y$10$3ChI.jgdqDXh1xPgFCtvredYtjB94saZ18aJq.qBJaqY0EbYS3s3a', 'Siswa'),
(1252, 'Iqbal Darmawan', 'iqbaldarmawan@gmail.com', '$2y$10$DDUM31D8L8iiiyXs6ylzd.GS3Bi0CkSO0xw.r6vGNBPM0u9hizDN2', 'Siswa'),
(1253, 'Jihan Azzahra', 'jihanazzahra@gmail.com', '$2y$10$HdRo4I.jzWVQt5L3CS0Ydu8Miej/28EM4FZZx7zgByZm3sLKCq5hm', 'Siswa'),
(1254, 'M. Daffa Surya Alamsyah', 'mdaffasuryaalamsyah@gmail.com', '$2y$10$O9CkTURsUynmYUWeZCkOAulOYEqwKuoEWJISsWzaWMWPS29A1P6P2', 'Siswa'),
(1255, 'Miftahul Ardiansyah', 'miftahulardiansyah@gmail.com', '$2y$10$XIQ5bRNoRnpWMVELvBk8eOcVq/feNXL24Fj7KcdTuhFPbfZJVcZFm', 'Siswa'),
(1256, 'Muhammad Abdizzikri Alfaj Diwi', 'muhammadabdizzikrialfajdiwi@gmail.com', '$2y$10$40zh6DlLc1SM4VsY0sin4eNzOKLuXonVpPZreP1MVVSSlmx/r2QMy', 'Siswa'),
(1257, 'MUHAMMAD AZKA ANDRIANO', 'muhammadazkaandriano@gmail.com', '$2y$10$bX2wd9sX2L29AYp9u2CXlurd1FZJmGygeyvSYVXUUNN2X7SpYNwdK', 'Siswa'),
(1258, 'Nida Natriya', 'nidanatriya@gmail.com', '$2y$10$GnF8uj9xtqbCP968xDgm/eVCJ/S9hoPE/K1bMHvPjWrqr1ZYqKbnu', 'Siswa'),
(1259, 'NOVALIA SARI PUTRI', 'novaliasariputri@gmail.com', '$2y$10$Drpdqr9wTerRxFXHA9PoL.iG7JEMi0.NR9FdIHnLILpJj6DlEBH0O', 'Siswa'),
(1260, 'Razin Rajma Anisa', 'razinrajmaanisa@gmail.com', '$2y$10$gnOcAiKwlu44yA6bxa7HuulwEx36LvZt5q4DHXNxkI84.FsuMc9w6', 'Siswa'),
(1261, 'Reyhan Mirtovani', 'reyhanmirtovani@gmail.com', '$2y$10$98.28dVMkG3JAwMZsPQABuGGhrZTusdgQcSfn4XlyfrhrhEKxf3Aq', 'Siswa'),
(1262, 'Risnayogi Dwi Syafitri', 'risnayogidwisyafitri@gmail.com', '$2y$10$D95SZVmlw3L1XwbDhVftU.3fbqXwswA8ruw5WwbELBPta5T3ApjA.', 'Siswa'),
(1263, 'Romi Wijaya', 'romiwijaya@gmail.com', '$2y$10$popH6lptNV0ieJMBBvHvCeSHvs/Hbx6MWg0Ge5DVLWGOruP45o5l2', 'Siswa'),
(1264, 'Siti Saadah', 'sitisaadah@gmail.com', '$2y$10$q8882ut8i5vihXe2wteOEOywFt2frsVIcnqzhKoxgaudcbV8YaBP.', 'Siswa'),
(1265, 'Al Musyowir Ilyas', 'almusyowirilyas@gmail.com', '$2y$10$n/LEOo8lwA/tE29GUq9HXe3BbhfmhEIzujh91nV6YYDWzygtDbwCW', 'Siswa'),
(1266, 'Andri Maulana Hisbullah', 'andrimaulanahisbullah@gmail.com', '$2y$10$7x/89vov9sAIDM1.xZEjC.sXD0h/0sFzFHA6iidOvUIgU//2T44Qa', 'Siswa'),
(1267, 'Azizah Wahyu Istiqomah', 'azizahwahyuistiqomah@gmail.com', '$2y$10$74gO9QS6bF7I/UGgwf2N8.06/2Ld9OcXQjLAVVmistvExnSGM02PS', 'Siswa'),
(1268, 'Bagas Andhika Candra', 'bagasandhikacandra@gmail.com', '$2y$10$Au0.yOAEB5e7zncFniXBROwse7THqHJBqG6XuTen07Ohc5utDScMC', 'Siswa'),
(1269, 'Bayu Hermawan', 'bayuhermawan@gmail.com', '$2y$10$Xh.a0lwZ5z1BoP4LdkSE7u5ACJVGOxNVeJix4gqJN2KfGFGKzP/MS', 'Siswa'),
(1270, 'Daffa Satrio Pamungkas', 'daffasatriopamungkas@gmail.com', '$2y$10$GDIbZJPY3j9JhgwCq1Zo0OONDtwagh1/D8pY394OI5N8XXIkXVCsC', 'Siswa'),
(1271, 'Farrelio Dwi Fernando Foyi', 'farreliodwifernandofoyi@gmail.com', '$2y$10$IZUWpJdQW.BHToCtAfs9v.R44MvGHsFUyEJH.bH.SqmL65/wQdQje', 'Siswa'),
(1272, 'Fauzan Tri Wanda', 'fauzantriwanda@gmail.com', '$2y$10$lSwItfB6XbhNZ/v8Untipe9Fds3qH8L8K52X/SvwSrJlxB5.DPG6C', 'Siswa'),
(1273, 'Ibna Itazhala Annur', 'ibnaitazhalaannur@gmail.com', '$2y$10$sDkLEDZDlHuDzHhxwcOAmO/RmPtR7Qep8NKSJl7en/abGnXeq/Yni', 'Siswa'),
(1274, 'Ichfan Zikri', 'ichfanzikri@gmail.com', '$2y$10$d1Leb5VpZknHcr5UbWrdaO7zhERsNW1tW0GV1CgxXnC0gjGBK5tUK', 'Siswa'),
(1275, 'Irga Alpendi', 'irgaalpendi@gmail.com', '$2y$10$D.k8V5LbUbMMoyE/Mka/Juf.i4pnJOSxidphkqbjIH8GqVmhesqby', 'Siswa'),
(1276, 'Jefry Prasetya', 'jefryprasetya@gmail.com', '$2y$10$POi8Wkjh.OTMztBLr0cMSOyRggeUnaUUveFI8SVT3pX5SlYbBzIxG', 'Siswa'),
(1277, 'Jihan Az Zahra Hazirin', 'jihanazzahrahazirin@gmail.com', '$2y$10$w2Na6PJfN.kh68aGqnkzq.mNV/O1xXxDUfsaBtrt7P98ISpq0ukpy', 'Siswa'),
(1278, 'Krisna Surya Putra Wardana', 'krisnasuryaputrawardana@gmail.com', '$2y$10$y1D2xsRg1JNgRNZgsA.68.g1f1GXvp3ab2UFetdP0sHaO9AWWVLua', 'Siswa'),
(1279, 'Lia Permana', 'liapermana@gmail.com', '$2y$10$q43fvb7mOguJu2oA.orxJOn/knmvWlUKbSeuNyhGCcnpCEwb61SlC', 'Siswa'),
(1280, 'Lianda Agustina', 'liandaagustina@gmail.com', '$2y$10$hIslH4BhdL6iHEH3DwkvFeHi.aiikAutgt/bjpCEjSLpoU7HPbLEO', 'Siswa'),
(1281, 'Mesi Nosi Dearti', 'mesinosidearti@gmail.com', '$2y$10$UhIkKU/wl2d1119fVK.lSeP3YsA2IfSIlgOlKD3rm0.JxeA/9.yKq', 'Siswa'),
(1282, 'Morin Dwi Monisa', 'morindwimonisa@gmail.com', '$2y$10$QrYd56rjRjZCY8.vVnVqEuXYZpkNwyJeM1oSlTqSAPWoTWqOsuXLa', 'Siswa'),
(1283, 'Mouna Indo Minako', 'mounaindominako@gmail.com', '$2y$10$J.heEWWt.eMaec.pcVBdputLH8RDWg33qhlu1uMKwEPhCBBwRX8ae', 'Siswa'),
(1284, 'Muhammad Wenddy Pratama', 'muhammadwenddypratama@gmail.com', '$2y$10$nLN5asGrl37mwYdomrpJq.su7JkRxrlLXqbg/jvfGxX6jmxC.p8Mu', 'Siswa'),
(1285, 'Nayla Khansa Afdansyaharani', 'naylakhansaafdansyaharani@gmail.com', '$2y$10$B/EneS4V80u.dRlGIL6EXumW9XNyNOUVLR9eJES5Q7vWiG2wJNI3K', 'Siswa'),
(1286, 'Pinkan Nuansa Putri', 'pinkannuansaputri@gmail.com', '$2y$10$IQdLA6eNzvRoWLDhe2W52enUclhDYoHaFUpZIH.sOLAqMJ6/hKZzG', 'Siswa'),
(1287, 'Putri Melati', 'putrimelati@gmail.com', '$2y$10$yRAwbuSaGRZ2wAyqE7LY2u.i9xLNbxwnA3mS/aRn0CHor1fwbazMy', 'Siswa'),
(1288, 'Refal Juan Fernandes', 'refaljuanfernandes@gmail.com', '$2y$10$D/yp0TfGY5hYBHZY2JsDbepy5tAt4oG96SnXmojmX1G4oF51LyGCi', 'Siswa'),
(1289, 'Regina Saidina Putri', 'reginasaidinaputri@gmail.com', '$2y$10$h6.9EeJR7zXKwhC.zyLeF.atyxN1u4xJhnteUvXiG6ve3MlT7yRUq', 'Siswa'),
(1290, 'Rinjani', 'rinjani@gmail.com', '$2y$10$KeUItx.QF3IQRdw7C5uNd.G4rvezXG1KY26U07ZKhU9if8x07lDdO', 'Siswa'),
(1291, 'Saqi Azizah Baroza', 'saqiazizahbaroza@gmail.com', '$2y$10$B1zz7p7MCPqecsmd1N/Ra./qRYC6D.oucXOBQkVK8sfaPVUB6kq2W', 'Siswa'),
(1292, 'Setiya Huda', 'setiyahuda@gmail.com', '$2y$10$oSg9QvWK9W.4wDhipCn78uy0uRUzMOpkS2JuqynG5EcqSSh6q5OHq', 'Siswa'),
(1293, 'Sonia Dwi Yolanda', 'soniadwiyolanda@gmail.com', '$2y$10$Z2.V8LZ67NaAiPghwcfsiOiUG7OYxqXg.yVjlzt/S8YcviVMDgoyy', 'Siswa'),
(1294, 'Wahyu Diffa Kusuma', 'wahyudiffakusuma@gmail.com', '$2y$10$U8lvKBKNQL6hoYjKwGWvUekckjBh7BbvOh90J.Ro3TSDrpVySOgZa', 'Siswa'),
(1295, 'Yedhil Nofrian Saputra', 'yedhilnofriansaputra@gmail.com', '$2y$10$/5UEPsYWAOl7OyZqdl.MgubgPuKv9o2XDjk7Mi6TCUuNZHs3bUAdS', 'Siswa'),
(1296, 'Agnia Nurul Azizah', 'agnianurulazizah@gmail.com', '$2y$10$w088YWdQaRkVkmNApdHWZOuWRhIZl2.WLugb4zCWcOt7nDROCEszy', 'Siswa'),
(1297, 'Agus Triwardini', 'agustriwardini@gmail.com', '$2y$10$BZIjPYi54B/EsZGz2g62QOZvPt1k5Lh9dBaUb46KbSjYWMmePwB3O', 'Siswa'),
(1298, 'Alif Arya Putra', 'alifaryaputra@gmail.com', '$2y$10$z8bwPfBwWW8HcDZa0bcWB.R9xITfCNG/ZIvYKMkRgDLJJk8s.ga1a', 'Siswa'),
(1299, 'Amanda Yonira', 'amandayonira@gmail.com', '$2y$10$1mGq/hjj2TnT6DQ2Nbsg/eIwxs0uUkUXnrercnZUKt8Hh/nCp2vWK', 'Siswa'),
(1300, 'Ana Widiyanti', 'anawidiyanti@gmail.com', '$2y$10$6ZHXurkws.qxBEYCmlcjCuk.IeWL5wEsf6lvxy7lQ9J6sl9xCVaKm', 'Siswa'),
(1301, 'Angga Al Fitra', 'anggaalfitra@gmail.com', '$2y$10$NsEgfnhkb.1inmHi4wqfGe5Eyf4Ph.1p4i26lxEDynBKNezv4uR2W', 'Siswa'),
(1302, 'Anggi Helpita', 'anggihelpita@gmail.com', '$2y$10$bQSMFQVdpDYJT2ALw91eZOEZCJU08ZsRwXMGWUVkPdA4rZco4fVTe', 'Siswa'),
(1303, 'Della Alzafirah', 'dellaalzafirah@gmail.com', '$2y$10$gnp0Iz73Pt5Ck/iDPytfC.OC.R8S.eNIuXlnQZ58TxbU4zqp4pK8u', 'Siswa'),
(1304, 'Dhea Muthia Anisa', 'dheamuthiaanisa@gmail.com', '$2y$10$LumkGXVQtNFnKRu5/a6VeeMmae1okEuZMWMSH1x9bdNWbgzFsg6Xm', 'Siswa'),
(1305, 'Edwin Apriliano', 'edwinapriliano@gmail.com', '$2y$10$sh7vmca85rRVafJEghWVkeuO0YSCpnuvAVpZ8XmJnQW9B28E1g/sW', 'Siswa'),
(1306, 'Fitri Ramadani', 'fitriramadani@gmail.com', '$2y$10$4YBoKoCNNJK89njAgVhm0.LUohUaYbRTLpTVhv/xYyTCLMqDyq5mS', 'Siswa'),
(1307, 'Gilang Kurniawan', 'gilangkurniawan@gmail.com', '$2y$10$91dNJgbIrkTOZP1cHt61SO1Lub7yNivniP.F6CY9UgVNz5CPZfNba', 'Siswa'),
(1308, 'Kesi Desviza Putri', 'kesidesvizaputri@gmail.com', '$2y$10$HR17FeVKxgvY7bA1sT.FTesBZ4Yu.sNJdNtxnMjzcBE4MiQMAZxvO', 'Siswa'),
(1309, 'M. Hendy Setiawan', 'mhendysetiawan@gmail.com', '$2y$10$VBW3W3UjnErmWeMx25D0qewgO5GSCSmOWUYv2SE.aEO1iC4Tii//K', 'Siswa'),
(1310, 'M. Ihsan Abil', 'mihsanabil@gmail.com', '$2y$10$V/nS1q3a1K9a4uZ.VxJyOuyW6f3SveRsjYIhwrr6m/Ou43BkBF9ge', 'Siswa'),
(1311, 'M. Nendi Ferdiansyah', 'mnendiferdiansyah@gmail.com', '$2y$10$yvE9ZRAX5DqCuMfI3EekiOUHquauNvw/tCa.7Bw1f9cssCTXWEBLS', 'Siswa'),
(1312, 'M. Rendi Arisky', 'mrendiarisky@gmail.com', '$2y$10$XTQHBc8RVp.K7uGyhurGAeNj/FWwWzTi/LRn5Mri45Plg3yHPi2v2', 'Siswa'),
(1313, 'Muhammad Ilham Akbar', 'muhammadilhamakbar@gmail.com', '$2y$10$nmlDKR0uNKK/q3sd.khf7.GJcyeJapWWpEonqt9RniRKdpFFpsggK', 'Siswa'),
(1314, 'Muhammad Mirza Amrah', 'muhammadmirzaamrah@gmail.com', '$2y$10$HPK0qcrYZt2AkGhLKsMLNeN/2Cje6oHviti2pYsm0U7m7rl26IEwS', 'Siswa'),
(1315, 'Muhammad Syafiq Alparizi', 'muhammadsyafiqalparizi@gmail.com', '$2y$10$l3fZxhgKu/1/.ovE8XkkKuXx9udYEl96zoNi5WzdG4LtXO2vFZEgq', 'Siswa'),
(1316, 'Nita Valeda', 'nitavaleda@gmail.com', '$2y$10$NFU5Lpig39KJRRdXUCYjReIh2BTHeINKlkRsy4pu5I05ZfjmrI8Ka', 'Siswa'),
(1317, 'Noval Romadhan', 'novalromadhan@gmail.com', '$2y$10$WO4WcqVGMiHjxvyy2iGSae2eaxa0PbDsm3V0SnSOKUDPfpnWPFNHG', 'Siswa'),
(1318, 'Olivia Sandra Hanifah', 'oliviasandrahanifah@gmail.com', '$2y$10$s.LDR8HUeDS33bvQVx1lquMeODAPY4ips9C9S9BCSGvZLlZMBNFN6', 'Siswa'),
(1319, 'Paramananda Aqiela', 'paramanandaaqiela@gmail.com', '$2y$10$NODyHPD/meve/r4bNqvaiOODNag0bTVis.qk.WAxCNBofOT2xjNX6', 'Siswa'),
(1320, 'Rakhmat Ramadhan', 'rakhmatramadhan@gmail.com', '$2y$10$Rc44rrqZHTBXG5CXp24pO.r2ZfHpwcDHnqLA34eRl.rXzKVHCIu1m', 'Siswa'),
(1321, 'Sarah Mardiantika', 'sarahmardiantika@gmail.com', '$2y$10$Cm8l3ZTstzBT49VAGt4OLejLhr8AR7UFWKp/I3OU4VH6IWwZsHTym', 'Siswa'),
(1322, 'SUCI LESTARI.MS', 'sucilestarims@gmail.com', '$2y$10$Ve5TzxIqBjjsrltna9bBW.MWrYBq.pCXZuXUeNUvLERrQX3tfpyiy', 'Siswa'),
(1323, 'Suci Mainta Waode', 'sucimaintawaode@gmail.com', '$2y$10$Yk.1IlV7auz2bquCwOMLFOAud/nBWvU5dl1I1NYh.04mXBJddCGlm', 'Siswa'),
(1324, 'Tita Aulya Nofira. Jk', 'titaaulyanofirajk@gmail.com', '$2y$10$kM0kOPOXcJ/lpMek2ZB//uGXjzPl5LCMFJb6ARAGfi0/9CWPAaNZ6', 'Siswa'),
(1325, 'Ulfa Uli Yanti', 'ulfauliyanti@gmail.com', '$2y$10$PPnIDjzWPY3oflnbQWdAWu/NMjo8PNsgsqFLmErKFhE/Uw9GbLjV6', 'Siswa'),
(1326, 'Zufandri Nuzra Syifaa', 'zufandrinuzrasyifaa@gmail.com', '$2y$10$vA2vV/wKGlMSMFRIXByaF.388Wn6IltBLQOw16Yy2R0n21fbKwvSi', 'Siswa'),
(1327, 'Akbar Putra Perkasa', 'akbarputraperkasa@gmail.com', '$2y$10$gTlva775mrrFRoGlpsvS9.J7LAIwOThL2ocx.XjQZ0hVmVEmJjpuO', 'Siswa'),
(1328, 'Allgani Allbar', 'allganiallbar@gmail.com', '$2y$10$lgBOT18aPHApBe6jRO.OYuBi5LEjg.tHsSXSC12NudyTQrYNADlNG', 'Siswa'),
(1329, 'Amanda Shasika Devina', 'amandashasikadevina@gmail.com', '$2y$10$4gmoZjR91kNC7XrQoUIREeme/jeIJZqsciu0HNj/l304rIgCymJDS', 'Siswa'),
(1330, 'Amelia Damita Feodora', 'ameliadamitafeodora@gmail.com', '$2y$10$EHYWgZO5hGCZZwuTtgtG3OrG8.mVhHrvQ3xZmrbkEW6d.Gjf3/Huy', 'Siswa'),
(1331, 'Anys', 'anys@gmail.com', '$2y$10$QgDVRAGM2X443GOy3jcchO4n5mS8Kk9cT8NUSYjqLBCZC1xOrve.C', 'Siswa'),
(1332, 'Aris Widodo', 'ariswidodo@gmail.com', '$2y$10$plm8JSwr9OElH3t1YctJse./wzT5nGO.jDU4WVRsGWxVCjB3sQUPC', 'Siswa'),
(1333, 'Aura Salsabila', 'aurasalsabila@gmail.com', '$2y$10$E7eXgR4tQWu5AiqaNuCN6uUULZqhXiI9Jyr8zCbmYim6JvFAAexMO', 'Siswa'),
(1334, 'Aurel Nabil Lubis', 'aurelnabillubis@gmail.com', '$2y$10$NbQx1.bvjb2U0Xukg3Td8OPCjbu4rO7dBCs1dd32bUx/EInhIumN6', 'Siswa'),
(1335, 'Ayu Rizkiy Vernanda', 'ayurizkiyvernanda@gmail.com', '$2y$10$ICyFPovDDbkn0F1wx0W3vOSkOD1yyh.QoO/f324/iV4ZjzOd9orT6', 'Siswa'),
(1336, 'Cinta Gusriyanti', 'cintagusriyanti@gmail.com', '$2y$10$YLG4m7cq8RsBCDAN2HfT0uvdo0M2jZ8FHntXHN9ruzc.QxaIR9jES', 'Siswa'),
(1337, 'Delia Rahmah Syarifah', 'deliarahmahsyarifah@gmail.com', '$2y$10$MNw1uM4rOYM7c8s/DIpB0.oeaLU2Y4DhN6CD5pY14zSVvAlff0/bS', 'Siswa'),
(1338, 'Dila Yogi Pratama', 'dilayogipratama@gmail.com', '$2y$10$k2iY4.as5YZLqSTTmPPeeOsUmxpjcTHnbCso1ZfUEX7AVIISlGc3e', 'Siswa'),
(1339, 'DIMAS ANDRIAN RAMADHAN', 'dimasandrianramadhan@gmail.com', '$2y$10$RCA47Jn9kSMu8PQY4vIXeOUFOTO9FtLKZ7hhNlc3FiiqxAS2mcy4O', 'Siswa'),
(1340, 'Elsa Antoni', 'elsaantoni@gmail.com', '$2y$10$o7xPfTRMEC9nEjW8fv3hh.6vrlOy3oEjiNu4KlWDt.3ksDMLa1s9y', 'Siswa'),
(1341, 'Fabiola Darma Ramadhani', 'fabioladarmaramadhani@gmail.com', '$2y$10$N4ir.5J4QOvDEd7oPo3SiuXQdh3MGiFgD470EUnlWdBeT6z4VJ5gy', 'Siswa'),
(1342, 'Farhat Nofrian Latif Maulana', 'farhatnofrianlatifmaulana@gmail.com', '$2y$10$5aaRN5Xv5XInNhZFrnpaUO9emaFvyfATxSwwtoD.Bo5djvM7QInGK', 'Siswa'),
(1343, 'Fira Dahlia Wulandari', 'firadahliawulandari@gmail.com', '$2y$10$t9RltjZY5z6.0I12Rh0YXO.BHetlYiiNe6ZfmJyXdZyFrN0.7r9Ii', 'Siswa'),
(1344, 'Frisca Aulia Putri', 'friscaauliaputri@gmail.com', '$2y$10$7I6TYgV..aXughdOUDqjUOrdjWOMMRG5cbFsSRmrtepbD6bqf4dL2', 'Siswa'),
(1345, 'Hegil Hidayatulah', 'hegilhidayatulah@gmail.com', '$2y$10$UylJY1MdrT0srF3zeFU/Fu7Dzvbj9bwo0WMMReNA28tBNMYr8xJjW', 'Siswa'),
(1346, 'Imelda Febrian', 'imeldafebrian@gmail.com', '$2y$10$twn5wJsM1d0NFHAG4KqrqO76QyEQNf0ZiUgwRVVC1wVGpF32utFTG', 'Siswa'),
(1347, 'Indra Kesuma', 'indrakesuma@gmail.com', '$2y$10$Ae3CznEbAOTSinrbjFV0JOio7aBYdSItBQmAb2trRVh4JrqlI7XpK', 'Siswa'),
(1348, 'Junita Anggi Rahmawati', 'junitaanggirahmawati@gmail.com', '$2y$10$VkPZPiCDHUReddEFLjHnledOG/Ctck.pvzwFgvZ4E96oooOgBvTA.', 'Siswa'),
(1349, 'Khian Sandila Pamungkas', 'khiansandilapamungkas@gmail.com', '$2y$10$ukOLxf./aFUi4HEG3s2zEOzsx3xsRcJaQZYm/yH5zyA52xue8sX16', 'Siswa'),
(1350, 'M. Padil Arfandi', 'mpadilarfandi@gmail.com', '$2y$10$yhc3P6kst2boBza7X51K9uCHhunC82.CqZoHMPPtphaZwcOMF6T7e', 'Siswa'),
(1351, 'Mhd Wandri Nurdiansyah', 'mhdwandrinurdiansyah@gmail.com', '$2y$10$Cau4Tnh2wXaM1KjxOnx7yu/nr49W7jDQVmqZo2Eojd.Q4oZcoM9Ra', 'Guru'),
(1352, 'Muhammat Amara Al Dzikra', 'muhammatamaraaldzikra@gmail.com', '$2y$10$FwWjKcQgNwZNJIiubjvy4umxwat5O9ne.drU2p6Hml0KRpOJqlUkK', 'Guru'),
(1353, 'Putie Layun Apriani S', 'putielayunaprianis@gmail.com', '$2y$10$/qIfbpXz8j7lOQP.a5nHOOf5WPmmuKMK6617U8rcSYoQ5IMoqVNj2', 'Guru'),
(1354, 'Putri Aulia Rahmi', 'putriauliarahmi@gmail.com', '$2y$10$2mDPzw7RKNX9vTR7xP4qmuQ2SmZlbaDBoJ9RcwDPkOJPIcoyQ0PxS', 'Siswa'),
(1355, 'Putri Samapta', 'putrisamapta@gmail.com', '$2y$10$Any9579.ripoIWmJJo.7C.odPKyZkLEAfaYkrdMeM0BDVIjiQGE0.', 'Siswa'),
(1356, 'Ridho Fahrul Rozi', 'ridhofahrulrozi@gmail.com', '$2y$10$/OKOI5F/7oGQIEWUecfi/egGV9uVJZoe/aCSmur1WRCXtg2umUK7.', 'Siswa'),
(1357, 'Shavira Chandra Kirana', 'shavirachandrakirana@gmail.com', '$2y$10$Udfss.meLpmBub6cgLEBju.f0F8db3elT.bZiijfPjQUom5M6xnYy', 'Siswa'),
(1358, 'Agie Mustakim Saputra', 'agiemustakimsaputra@gmail.com', '$2y$10$MohW3rQy4P7T3ESb.l83nOY1wVQuMAQ/LzQFDUc/4w2phIx8MDIUy', 'Siswa'),
(1359, 'Alan Sodri', 'alansodri@gmail.com', '$2y$10$VggH/V0jTEIntM1MkFsad.i8PPFEyoRHTC.TuvKfyYSgCvpvZTSke', 'Siswa'),
(1360, 'Alio Heptiansah', 'alioheptiansah@gmail.com', '$2y$10$WQjlQnC1V9UcOh/TqhL0luDdHvByuNI0DfysGHeoicdm9MXIkceGy', 'Siswa'),
(1361, 'Alvin Nofri Saputra', 'alvinnofrisaputra@gmail.com', '$2y$10$EfW.1i2rx6kuIAWFo6wdOumGHYfKCjYhrapHh8aJOa8Ve5YJ0XW7W', 'Siswa'),
(1362, 'Anang Makruf', 'anangmakruf@gmail.com', '$2y$10$RDlhH/GZe8yg4LPYzqHE3Ogf2Q/nEmR3gkyPQsnMk8JDPiq/28I/e', 'Siswa'),
(1363, 'Annisa Putri', 'annisaputri@gmail.com', '$2y$10$jySWSbIBKC5HmvWvqGePqe.AUeSK0FwQbw9jlcpRjNpj4LrqrpyPm', 'Siswa'),
(1364, 'Bunga Meisy Astrisia', 'bungameisyastrisia@gmail.com', '$2y$10$IRGzJmnrfQYna4VK6Gkc.e6e8v1nm0Oq2Nw11Qrzm/BgqG2lmWGTu', 'Siswa'),
(1365, 'Dela Dwi Amita', 'deladwiamita@gmail.com', '$2y$10$3XDCfc9r1xY2v1c9nO5MW.6asgKeCvv.86w5GcBTQKgmurS4OMTnW', 'Siswa'),
(1366, 'Delima Br. Nababan', 'delimabrnababan@gmail.com', '$2y$10$hkHR/qTmYz/rwsAIQhCkPOpr0twfZ9RsMQHfUCDob87PG9rC5Yo.O', 'Siswa'),
(1367, 'Dian Rahmadhani', 'dianrahmadhani@gmail.com', '$2y$10$fRbWm5si0783VsVRpMWK0eFK1Ij/sOrZVq/sQzTh./ba9tBhbKgva', 'Siswa'),
(1368, 'Elsa Safitri', 'elsasafitri@gmail.com', '$2y$10$5jIeUcH2pLjEmiGEpsoPL.lTMqdvUhZLCBtFi8J5NEOxue/zq659K', 'Siswa'),
(1369, 'Fachri Martianda Putra', 'fachrimartiandaputra@gmail.com', '$2y$10$hdcP2k/shproWmZjVERyEOCIV6Irbbf1NN/9hikNLtw6b2jQ1sFIa', 'Siswa'),
(1370, 'Fadilla Holidra', 'fadillaholidra@gmail.com', '$2y$10$42qF4tB7yVWZtZE0lHIDhORIrfkolF2GHEBA5CM683uzFd5bM4hSK', 'Siswa'),
(1371, 'Lia Manjesna', 'liamanjesna@gmail.com', '$2y$10$2s7uXrmG6PiOHGsbUFx42uyXqD/i7ldYizoO.qJxYPccAoAUOe2ZC', 'Siswa'),
(1372, 'Lingga Yumike', 'linggayumike@gmail.com', '$2y$10$ewFA8nJcV/zPZd6/Kl5No./5G8bvDq6Y/k2HCu1ZvhH44OSYJagmS', 'Siswa'),
(1373, 'Meri Mustika', 'merimustika@gmail.com', '$2y$10$gIoBFY/s2geO3FciHXMXke2p3dwRKGhssx0/3JCEwySZtzLR1DgD2', 'Siswa'),
(1374, 'Muhammad Faqih', 'muhammadfaqih@gmail.com', '$2y$10$wQEsXAjW.ZDjiDJXISbJwOnQF.luNg7RSAxpLKSnRBu5/YAGTanDO', 'Siswa'),
(1375, 'Muhammad Fathan Faj', 'muhammadfathanfaj@gmail.com', '$2y$10$OAmtt9mQMxLrJ2DM.9JxXuN7EIp0WAA2jGF9Kw.nGaaFiQ.ByDjNK', 'Siswa'),
(1376, 'Rabima Aulia', 'rabimaaulia@gmail.com', '$2y$10$hRU86H0TNTFqeZDVStz5l.0XfXZtlXY6Q7xAC15qlr.EKGzrWwQDi', 'Siswa'),
(1377, 'Rifki Alfarezi', 'rifkialfarezi@gmail.com', '$2y$10$uyp2MjvLOl5cv63dAJp3nuIMg/XKh0slyKv3k4B34ePYbRrt2m7cK', 'Siswa'),
(1378, 'Septian Reinaldi', 'septianreinaldi@gmail.com', '$2y$10$4fiAV8KVg6SX8FwVDYV7TuVQK8m1egWd9oNRR/WQyY1S4OrbdVMCW', 'Siswa'),
(1379, 'Serly Oktavia', 'serlyoktavia@gmail.com', '$2y$10$Dr/Mw1bxyv815XcXCJGpvemyaOUL1I9RtKJ3IkRf1ijT6wHvHhXBK', 'Siswa'),
(1380, 'Sindi Permata Bunda', 'sindipermatabunda@gmail.com', '$2y$10$fhwOtc4yd7bxZ8d6amlzc.d2ZcYfb1eIj9AN4eTthmyw7IlaCgr7e', 'Siswa'),
(1381, 'Taufik Hidayatullah', 'taufikhidayatullah@gmail.com', '$2y$10$vJlP7c0EJZHvAlUaxxBRW.Jp6vViBfs1CJLUH9m/9OOcv30OIovvq', 'Siswa'),
(1382, 'Yugo Tianvero.s', 'yugotianveros@gmail.com', '$2y$10$5mhYGuLsgrCme1nFwlY2EupenUUDOOMNeJqJZlPaViEzgVM6Om.8W', 'Siswa'),
(1383, 'tere', 'tere@gmail.com', '$2y$10$25PTnYOxluQ2MjfenVid7uJs.omKdwnW6N0p5M7gRxATb/UZOGI9y', 'Siswa'),
(1384, 'ahmad', 'ahmad@gmail.com', '$2y$10$Cm4eLEfIsJBQDeeomg8rj.tk0YquwGIKS0OaelvSdro3Z//zukH6S', 'Siswa'),
(1385, 'Budi sartono', 'budisartono@gmail.com', '$2y$10$cv44NllHEtV0ONFLqUctwek2RE38wxFKqwHWxXjKhw73bl3XD4qZe', 'Siswa'),
(1386, 'Budi artino', 'budiartino@gmail.com', '$2y$10$MhGA6pB.pMrv5h1L.nVv.OdZAVP5RVpc0fuVr4AaHycZIXAyUMx2a', 'Siswa'),
(1387, 'budi suratnoo', 'budisuratnoo@gmail.com', '$2y$10$xVvOTgLFYPxtXB0AbYY6FO1urJU0qaTbIjMQ1Y08H8z6zvkqXN.Ce', 'Siswa'),
(1403, 'pengky', 'pengky@gmail.com', '$2y$10$KGs0Ki2xRBJOIOEHVvXWhO665L5sRONgmCuRyehUEM0js5qgHGxcK', 'Siswa'),
(1404, 'leo', 'leo@gmail.com', '$2y$10$cQahC8D7eSX7P323JSCcrefAH1GctFZKqZem/YuswXJnzoEAn3h/u', 'Siswa'),
(1405, 'halyd', 'halyd@gmail.com', '$2y$10$fsr3FMNzRUnnVeqouwABxOXOkbqxwTJcFA8GmlLymA.g9VRJzrCTC', 'Siswa'),
(1406, 'pandi', 'pandi@gmail.com', '$2y$10$yN41JyxE/rqz4qGbfDZ4fuwHdSquRZZpRLkt37mevEAKGl6LUEDqK', 'Siswa'),
(1407, 'kenbo', 'kenbo@gmail.com', '$2y$10$UFptKP4wlq3uk8LYrTrcHOGeNeLaL3HPBctIJqjIfCGiZtAmkCXqG', 'Siswa'),
(1408, 'kintani', 'kintani@gmail.com', '$2y$10$Wmft75CqLg/IeYcZzRY8bOd3/s2f0E5aUYP7WLmBYw9xdKpH5KOPe', 'Siswa'),
(1409, 'beno', 'beno@gmail.com', '$2y$10$lyYMV65kungjkazRwvUWqOVHA9.UfxVPq2ZZXmDuGazM.IjyHn.0G', 'Siswa'),
(1410, 'bennno', 'bennno@gmail.com', '$2y$10$ypvScuanvi9FSMmA6se2zOO.Up7osGrcgApZbiDmpLmL/7QjEAxSq', 'Siswa'),
(1411, 'kholil ikhsan', 'kholilikhsan@gmail.com', '$2y$10$S4cMNAxjyVOnjuJdZo3XoeV./d6JyIC2ik6dQT1Z7STIeHeHhmEVG', 'Siswa'),
(1412, 'hendra amaldi', 'hendraamaldi@gmail.com', '$2y$10$EvamU7vhNRYmjmq5pNbIPOevDuDKRphSfG0eT9qqsueoPcFCM.LYq', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id` (`peminjaman_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_buku`
--
ALTER TABLE `kode_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `user_petugas_id` (`user_petugas_id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id` (`peminjaman_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kode_buku`
--
ALTER TABLE `kode_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1413;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`user_petugas_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
