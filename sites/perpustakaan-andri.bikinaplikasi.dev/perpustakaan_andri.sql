-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 03:56 PM
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
-- Database: `perpustakaan_andri`
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
(3, 1156, '6666435', 'Nisa Winda', 'Perempuan', 'Merangin', '082261511853', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(4, 1157, '34228057', 'Parida putry', 'Perempuan', 'Merangin', '082261511858', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(5, 1158, '34088739', 'Paryan Nesfandiari', 'Laki - Laki', 'Merangin', '082261511851', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(6, 1159, '43416964', 'Putri Ayu', 'Perempuan', 'Merangin', '082261511852', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(7, 1160, '40733480', 'Rara Mutiara', 'Perempuan', 'Merangin', '082261511854', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(8, 1161, '55367593', 'Ronal Putra', 'Laki - Laki', 'Merangin', '082261511856', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(9, 1162, '46444893', 'Rosalia Anggun Sari', 'Perempuan', 'Merangin', '082261511859', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(10, 1163, '42015971', 'Safira Norila', 'Perempuan', 'Merangin', '082261511811', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(11, 1164, '50317785', 'Salsah Irfaniah', 'Perempuan', 'Merangin', '082261511821', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(12, 1165, '42153074', 'Shanju Ardian Putra', 'Laki - Laki', 'Merangin', '082261511812', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(13, 1166, '48971568', 'Silviani', 'Perempuan', 'Merangin', '082261511824', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(14, 1167, '42015972', 'Sinta Arianti', 'Perempuan', 'Merangin', '082261511826', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(15, 1168, '6782816', 'Siti Komah', 'Perempuan', 'Merangin', '082261511827', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(16, 1169, '9997783871', 'Siti Saudah', 'Perempuan', 'Merangin', '082261511829', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(17, 1170, '36076945', 'Suci Ramadani', 'Perempuan', 'Merangin', '082261511831', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(18, 1171, '42015970', 'Sumarni', 'Perempuan', 'Merangin', '082261511833', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(19, 1172, '47170266', 'Ulan Patmala Sari', 'Perempuan', 'Merangin', '082261511836', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(20, 1173, '46815782', 'Umira', 'Perempuan', 'Merangin', '082261511842', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(21, 1174, '45564897', 'Uswatun Hasanah', 'Perempuan', 'Merangin', '082261511841', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(22, 1175, '44099391', 'Aina Pitri Holiza', 'Perempuan', 'Merangin', '082261511845', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(23, 1176, '26223800', 'Alfi Syahrin', 'Laki - Laki', 'Merangin', '082261511897', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(24, 1177, '44099378', 'Ana Maryani', 'Perempuan', 'Merangin', '082261511879', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(25, 1178, '46985269', 'Ananda Saputra', 'Laki - Laki', 'Merangin', '082261511883', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
(31, 1183, '36076941', 'Egi Prayogi Pratama', 'Laki - Laki', 'Merangin', '082261511818', 'Aktif', '1-Feb-21', '2021-02-01 01:39:48', '2022-06-28 01:39:48'),
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
(543, 1405, '03030303', 'Aidil fitra', 'Laki - Laki', 'muara kibul', '082261511853', 'Aktif', '21-Aug-2022', '2022-08-21 11:06:32', '2022-08-21 11:06:32'),
(544, 1406, '8888888', 'patmawati', 'Perempuan', 'muara jernih', '-', 'Aktif', '21-Aug-2022', '2022-08-21 11:15:16', '2022-08-21 11:15:16'),
(554, 1416, '92972', 'husen', 'Laki - Laki', 'jambi', '082261511852', 'Aktif', '23-Aug-2022', '2022-08-23 06:41:28', '2022-08-23 06:41:28');

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
(19, '001.2018.001.01', 'Pendidikan Agama Islam (X SMA/MA | SMK/MAK)', 'Netry Khairiyah, Efendi Suhendri', 'Erlangga', 2018, 'Yogyakarta', 20, '16-Jun-2022', '2022-06-15 21:13:34', '2022-08-23 04:17:53'),
(21, '002.2015.001.01', 'Al-Qur\'an (X SMA/MA | SMK/MAK/Semester)', 'Toha Putra', 'Yudhistira', 2015, 'Jakarta', 2, '16-Jun-2022', '2022-06-16 05:47:39', '2022-08-23 06:42:42'),
(22, '003.2020.001.01', 'Pendidikan Agama Islam dan Budi Pekerti (X SMA/MA | SMK/MAK/Semester)', 'H. Abd. Rohman, Hj. Lim Halimah, Munawir, A.M.', 'Yudhistira', 2020, 'Yogyakarta', 14, '16-Jun-2022', '2022-06-16 06:13:36', '2022-08-23 01:56:33'),
(23, '051.2020.002.02', 'Ilmu Pengetahan Alam (X SMA/MA | SMK/MAK/Semester)', 'Make Miarsyah, Tia Mutiara, Dewi Luvfiati', 'Erlangga', 2020, 'Yogyakarta', 7, '16-Jun-2022', '2022-06-16 06:20:19', '2022-08-23 04:16:56'),
(24, '052.2021.002.02', 'Kimia (X SMA/MA | SMK/MAK/Semester)', 'Siswanto Djony, Siti Daniah', 'Erlangga', 2021, 'Bandung', 1, '16-Jun-2022', '2022-06-16 06:41:12', '2022-08-22 06:51:08'),
(29, '103.2019.002.02', 'bahasa iinggris(x sma/ma smk/mak)', 'utamiwidiati', 'Zuvita rahma', 2019, 'Jakarta', 20, '28-Jun-2022', '2022-06-28 15:05:46', '2022-07-06 13:42:10'),
(30, '104.2018.002.02', 'bahasa indonesia(xSMA MA/SMK MAK)', 'Suherli', 'Aji septiaji', 2018, 'Jakarta', 20, '28-Jun-2022', '2022-06-28 15:06:48', '2022-08-22 11:41:12'),
(31, '012.2019.002.02', 'Sejarah indonesia(XSMA MA/SMK/MAK)', 'Restu gunawan', 'Sardiman', 2019, 'yokyakarta', 20, '28-Jun-2022', '2022-06-28 15:12:54', '2022-06-28 15:12:54'),
(32, '014.2018.002.02', 'Seni budaya(x SMA MA/SMK MAK)', 'Zackana', 'Dwi suryati', 2018, 'yokyakarta', 19, '28-Jun-2022', '2022-06-28 15:14:23', '2022-06-28 15:14:23'),
(33, '017.2018.001.01', 'Pendidikan jasmani olahraga&kesehatan(x SMA/MA SMK/MAK)', 'Sudrajatwiradihardja', 'Syarifudin', 2018, 'Jakarta', 20, '28-Jun-2022', '2022-06-28 15:17:10', '2022-06-28 15:17:10'),
(34, '017.2019.001.01', 'Pendidikan pancasila(x SSMA MA/SMK/MAK)', 'Nuryadi', 'Tolib', 2019, 'Bandung', 20, '28-Jun-2022', '2022-06-28 15:18:44', '2022-06-28 15:18:44'),
(35, '022.2018.002.02', 'matematika(SMA MA/SMK/MAK', 'Andri kritianto', 'Sitanggang', 2018, 'yokyakarta', 20, '28-Jun-2022', '2022-06-28 15:21:28', '2022-06-28 15:21:28'),
(36, '026.2019.002.02', 'Prakarya dan kewirausahaan(x SMA MA/SMK MAK) semester 1', 'Rinrin jamrianti', 'Desta wirnas', 2019, 'Jakarta', 20, '28-Jun-2022', '2022-06-28 15:24:47', '2022-06-28 15:24:47'),
(37, '027.2019.002.02', 'Prakarya dan kewirausahaan(x SMA MA/SMK MAK)', 'Rinrin jamrianti', 'Desta wirnas', 2019, 'Jakarta', 20, '28-Jun-2022', '2022-06-28 15:25:56', '2022-06-28 15:25:56'),
(38, '031.207.002.01', 'Komputer dan jaringan dasar(XSMK MAK)', 'andi novinto S.kom.M.kom', 'Andi', 2017, 'Jakarta', 5, '28-Jun-2022', '2022-06-28 15:29:46', '2022-06-28 15:29:46'),
(39, '032.2017.002.02', 'Proram dasar(X SMK MAK/Semester 1)', 'Andi novinto S.kom.m.kom', 'andi', 2017, 'Jakarta', 5, '28-Jun-2022', '2022-06-28 15:30:49', '2022-06-28 15:30:49'),
(40, '033.2018.002.02', 'Simulasi dan komunikassi digital(x SMA MA/SMK MAK)', 'Andi novinto S.kom.m.kom', 'Andi', 2018, 'Jakarta', 5, '28-Jun-2022', '2022-06-28 15:32:09', '2022-06-28 15:32:09'),
(41, '034.2020.01.01', 'Sistem komputer(X SMK MAK/Semester)', 'Andi novinto S.kom.m.kom', 'Andi', 2020, 'Jakarta', 5, '28-Jun-2022', '2022-06-28 15:33:58', '2022-07-06 13:42:10'),
(42, '042.2020.002.02', 'Ekonomi  bisnis (X SMA MA/SMK MAK)', 'Alam s', 'Alam', 2020, 'Bandung', 15, '28-Jun-2022', '2022-06-28 15:38:57', '2022-06-28 15:38:57'),
(43, '053.2019.004.04', 'Fisika (xsmk)', 'Sudiman', 'Sudiman', 2019, 'Bandung', 25, '28-Jun-2022', '2022-06-28 15:42:43', '2022-06-28 15:42:43'),
(44, '047.2017.005.05', 'Pkn(x SMK)', 'Yuyus kurdiman', 'Yuyus', 2017, 'Bandung', 25, '28-Jun-2022', '2022-06-28 15:47:03', '2022-06-28 15:47:03'),
(45, 'o47.2017.005.05', 'Pkn(XI SMK)', 'Yuyus kurdiman', 'Yuyus', 2017, 'Bandung', 25, '28-Jun-2022', '2022-06-28 15:48:25', '2022-06-28 15:48:25'),
(46, '049.2017.005.05', 'Pkn(XIi SMK)', 'Yuyus kurdiman', 'Yuyus', 2017, 'Bandung', 25, '28-Jun-2022', '2022-06-28 15:49:43', '2022-06-28 15:49:43'),
(47, '062.2021.007.07', 'Otomatisasi tata kelola humas dan kepiotokolan(XII SMK/MAK)', 'Joko widodo', 'Dwi harti', 2021, 'Bandung', 10, '28-Jun-2022', '2022-06-28 15:54:14', '2022-06-28 15:54:14'),
(48, '063.2019.007.07', 'Adminisrasi umum(x smk/mak)', 'Sri endang', 'Endang', 2019, 'Bandung', 15, '28-Jun-2022', '2022-06-28 15:56:16', '2022-06-28 15:56:16'),
(49, '064.2021.007.07', 'Otata keuangan(XII SMK/MAK)', 'Dwi harti', 'Harti', 2021, 'Jakarta', 15, '28-Jun-2022', '2022-06-28 15:58:09', '2022-06-28 15:58:09'),
(50, '065.2019.007.07', 'Kearsipan(x SMK/MAK)', 'Sri mulyani', 'Mulyani', 2019, 'Jakarta', 15, '28-Jun-2022', '2022-06-28 16:00:49', '2022-06-28 16:00:49'),
(51, '082.2020.009.09', 'Teknik pengolahan audio dan video(XII SMK/MAK)', 'Sumantoro', 'Suman', 2020, 'Jakarta', 10, '28-Jun-2022', '2022-06-28 16:05:04', '2022-06-28 16:05:04'),
(52, '083.2020.009.09', 'Otomatisasi tata kelola saran dan prasarana(XII SMK/MAK)', 'Sri endang', 'M agus', 2020, 'Jakarta', 10, '28-Jun-2022', '2022-06-28 16:07:47', '2022-06-28 16:07:47'),
(53, '084.2019.009.09', 'Animasi 2D dan 3D(XII SMK/MAK)', 'Sumantoro', 'Kasdy', 2019, 'Jakarta', 10, '28-Jun-2022', '2022-06-28 16:09:50', '2022-06-28 16:09:50'),
(54, '069.2020.008.08', 'Teknologi perkantoran(x smk/mak)', 'Sri endang', 'sri mulyani', 2020, 'Jakarta', 10, '28-Jun-2022', '2022-06-28 16:12:23', '2022-06-28 16:12:23'),
(55, '087.2019.009.09', 'Otomatisasi tata kelola keuangan(XII SMK/MAK)', 'Dwi harti', 'Kusmayadi', 2019, 'Bandung', 10, '28-Jun-2022', '2022-06-28 16:14:52', '2022-06-28 16:14:52'),
(56, '090.2021.009.09', 'Otomasasi tata kelola kepegawaian(XII SMK/MAK)', 'Sri endang', 'sri mulyani', 2021, 'Jakarta', 10, '28-Jun-2022', '2022-06-28 16:17:11', '2022-06-28 16:17:11'),
(57, '091.2021.009.09', 'Korespondasi(x SMK/MAK)', 'Sri endang', 'sri mulyani', 2021, 'Jakarta', 10, '28-Jun-2022', '2022-06-28 16:18:28', '2022-06-28 16:18:28'),
(58, '092.2021.009.09', 'Otomatisasi tata kelola humas dan kepiotokolan(XI SMK/MAK)', 'Dwi harti', 'Agung kuswanto', 2021, 'Jakarta', 10, '28-Jun-2022', '2022-06-28 16:20:48', '2022-06-28 16:20:48'),
(64, '09.2019.000.09', 'bener', 'bonek', 'bintek', 2019, 'jambi', 22, '23-Aug-2022', '2022-08-23 04:15:18', '2022-08-23 04:15:52');

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
(51, 31, 21, 'Dikembalikan'),
(55, 31, 19, 'Dikembalikan'),
(57, 35, 21, 'Belum Dikembalikan'),
(58, 37, 23, 'Belum Dikembalikan'),
(59, 38, 19, 'Dikembalikan'),
(60, 38, 21, 'Dikembalikan'),
(61, 38, 23, 'Dikembalikan'),
(68, 34, 24, 'Belum Dikembalikan'),
(69, 40, 19, 'Dikembalikan'),
(70, 40, 21, 'Dikembalikan'),
(71, 37, 24, 'Belum Dikembalikan'),
(73, 42, 21, 'Belum Dikembalikan'),
(75, 43, 21, 'Belum Dikembalikan'),
(78, 45, 21, 'Belum Dikembalikan'),
(81, 48, 21, 'Belum Dikembalikan');

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
(11, '001.2015.001.01-010.2022.001.01', 'Agama', '01'),
(12, '051.2015.002.02-060.2022.002.02', 'IPA', '02'),
(13, '101.2015.002.02-110.2022.002.02', 'Bahasa', '03'),
(14, '011.2015.001.01-015.2022.001.01', 'seni/sejarah', '04'),
(15, '016.2015.001.01-020.2022.001.01', 'Pendidikan', '05'),
(16, '021.2015.001.01-025.2022.001.01', 'matematika', '06'),
(17, '026.2015.001.01-030.2022.001.01', 'kwh', '07'),
(18, '031.2015.001.01-040.2022.001.01', 'kop', '08'),
(19, '041.2015.001.01-045.2022.001.01', 'ekonomi/bisnis', '09'),
(20, '046.2015.001.01-050.2022.001.01', 'Pkn', '10'),
(21, '061.2015.002.02-080.2022.002.02', 'Adm', '11'),
(22, '081.2015.002.02-100.2022.002.02', 'mm', '12');

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
(8, 21, 1, '2022-08-01', '2022-08-10', 'Selesai', '2022-03-01 10:38:04', '2022-08-20 10:51:26'),
(11, 24, 1, '06-Jan-2022', '12-Jan-2022', 'Selesai', '2022-01-06 10:38:04', '2022-06-20 10:38:04'),
(14, 3, 1, '06-Jan-2022', '28-Jan-2022', 'Selesai', '2022-01-06 10:38:04', '2022-06-20 10:38:04'),
(16, 10, 1, '16-Jan-2022', '21-Jan-2022', 'Selesai', '2022-01-16 10:38:04', '2022-06-20 10:38:04'),
(28, 4, 1, '13-Jun-2022', '18-Jun-2022', 'Selesai', '2022-06-13 10:38:04', '2022-06-20 10:38:04'),
(29, 6, 1, '13-Jun-2022', '18-Jun-2022', 'Selesai', '2022-06-13 10:38:04', '2022-06-20 10:38:04'),
(31, 7, 1, '15-Jun-2022', '17-Jul-2022', 'Selesai', '2022-06-15 10:38:04', '2022-06-20 10:38:04'),
(34, 4, 1, '01-Jun-2022', '10-Jun-2022', 'Berlangsung', '2022-06-01 10:38:04', '2022-06-20 10:38:04'),
(35, 6, 1, '17-Jun-2022', '22-Jun-2022', 'Berlangsung', '2022-06-17 10:38:04', '2022-06-20 10:38:04'),
(37, 3, 1, '2022-01-01', '2022-01-07', 'Berlangsung', '2022-06-20 19:53:38', '2022-06-20 19:53:38'),
(38, 9, 1, '2022-01-01', '2022-07-04', 'Selesai', '2022-06-27 23:31:27', '2022-06-27 23:59:03'),
(40, 3, 1, '2022-08-01', '2022-08-07', 'Selesai', '2022-08-20 09:36:29', '2022-08-20 09:38:26'),
(42, 544, 1, '2022-08-01', '2022-08-10', 'Berlangsung', '2022-08-22 06:50:40', '2022-08-22 06:50:40'),
(43, 543, 1, '2022-08-10', '2022-08-21', 'Berlangsung', '2022-08-22 07:09:50', '2022-08-22 07:14:50'),
(45, 544, 1, '2022-08-01', '2022-08-15', 'Berlangsung', '2022-08-22 14:34:27', '2022-08-22 14:34:27'),
(48, 554, 1, '2022-08-11', '2022-08-22', 'Berlangsung', '2022-08-23 06:42:18', '2022-08-23 06:42:18');

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
(3, 8, '08-Mar-2021', 0, '2022-03-08 10:41:26', '2022-06-20 10:41:26'),
(7, 16, '16-Jan-2022', 0, '2022-01-16 10:41:26', '2022-06-20 10:41:26'),
(17, 28, '13-Jun-2022', 3000, '2022-06-13 10:41:26', '2022-06-20 10:41:26'),
(18, 29, '13-Jun-2022', 5000, '2022-06-13 10:41:26', '2022-06-20 10:41:26'),
(20, 14, '16-Jun-2022', 1000, '2022-06-16 10:41:26', '2022-06-20 10:41:26'),
(22, 11, '17-Jun-2022', 2000, '2022-06-17 10:41:26', '2022-06-20 10:41:26'),
(23, 31, '17-Jun-2022', 0, '2022-06-17 10:41:26', '2022-06-20 10:41:26'),
(25, 38, '2022-06-27', 0, '2022-06-27 23:59:03', '2022-06-27 23:59:03'),
(27, 40, '2022-08-20', 13000, '2022-08-20 09:38:26', '2022-08-20 09:38:26');

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
(1157, 'Parida putry', 'paridaputry@gmail.com', '$2y$10$KK55gX9yUD4HZUTI6ARJcOqq7Qa/S5Bmp3R5r8rRWDpFxJGKVb/mC', 'Siswa'),
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
(1405, 'Aidil fitra', 'aidilfitra@gmail.com', '$2y$10$sE4EDtlTXTPoerNqOqUdQuVOxpgJ0P3ds66avH49WcZxOLDM2Cxn6', 'Guru'),
(1406, 'patmawati', 'patmawati@gmail.com', '$2y$10$tIM67lltB.16tZUaateYDewsg4hhCcmEq6IToCh6kAVT0vgNELU96', 'Guru'),
(1416, 'husen', 'husen@gmail.com', '$2y$10$gk/rK0axxml4VtNnh/yXnOy/WB35LgYhbOeXbB3DSymvR9tp7DFO2', 'Guru');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kode_buku`
--
ALTER TABLE `kode_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1417;

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
