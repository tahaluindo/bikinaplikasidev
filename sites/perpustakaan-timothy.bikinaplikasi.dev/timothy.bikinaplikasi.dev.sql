-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 01:03 AM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibuat` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `no_induk`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`, `status`, `dibuat`) VALUES
(3, '42138939', 'Nisa Winda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(4, '34228057', 'Parida', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(5, '34088739', 'Paryan Nesfandiari', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(6, '43416964', 'Putri Ayu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(7, '40733480', 'Rara Mutiara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(8, '55367593', 'Ronal Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(9, '46444893', 'Rosalia Anggun Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(10, '42015971', 'Safira Norila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(11, '50317785', 'Salsah Irfaniah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(12, '42153074', 'Shanju Ardian Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(13, '48971568', 'Silviani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(14, '42015972', 'Sinta Arianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(15, '6782816', 'Siti Komah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(16, '9997783871', 'Siti Saudah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(17, '36076945', 'Suci Ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(18, '42015970', 'Sumarni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(19, '47170266', 'Ulan Patmala Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(20, '46815782', 'Umira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(21, '45564897', 'Uswatun Hasanah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(22, '44099391', 'Aina Pitri Holiza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(23, '26223800', 'Alfi Syahrin', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(24, '44099378', 'Ana Maryani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(25, '46985269', 'Ananda Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(26, '42752799', 'Anisa Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(27, '47277650', 'Antoni Saputra Gunawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(28, '50453741', 'Arya Difarylla', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(29, '45447038', 'Denny Heriyanto', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(30, '42752130', 'Dira Dwi Aurafutri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(31, '36076941', 'Egi Prayogi Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(32, '49201539', 'Emilia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(33, '51425003', 'Fendlinalisa Nursyahrin', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(34, '49309358', 'Ina Sunarni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(35, '32672560', 'Mareta Nur Arudah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(36, '49231944', 'Mauly Anitia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(37, '41212651', 'Merry Yani Simangunsong', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(38, '43516653', 'Michael Parlindungan Samosir', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(39, '43516652', 'Muhammad Arif', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(40, '43416963', 'Muhammad Dito Valtian', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(41, '49077378', 'Muhammd Usman', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(42, '42153550', 'Neli Aini', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(43, '42392399', 'Nurul Hidayati Arifa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(44, '50494361', 'Ocie Syafni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(45, '42993708', 'Resi Septia Isra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(46, '43152220', 'Revo Muhamad Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(47, '22621210', 'Riki Sardiansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(48, '42132077', 'Riska Umariah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(49, '42993713', 'Riski Roma Dani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(50, '37798307', 'Ultira Dwi Rahayu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(51, '59483719', 'Zaqiyah Risky Fadilah Muis', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(52, '41637369', 'Adi Tegar Pambudi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(53, '43516766', 'Alifya Arna Darmawan', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(54, '43516723', 'Anita Zhahara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(55, '-', 'AZZALIA CHINTA SYAHFIDA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(56, '42253335', 'Ciko Intani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(57, '35196752', 'Denis Lyon Malau', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(58, '35444253', 'Deviatul Qotimah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(59, '43516648', 'Fahri Hidayat', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(60, '43416907', 'Febrio Valentino', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(61, '43516707', 'Happy Aura', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(62, '38096572', 'Icha Mognicah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(63, '45440541', 'Khoratun Najwa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(64, '49782710', 'Leo Agha Khusayra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(65, '32486586', 'M.pandu Wilantara', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(66, '43516661', 'Muhammad Farid', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(67, '50516459', 'Muhammad Nabil Alhafizh', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(68, '43416913', 'Muhammad Ridho Nugraha', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(69, '49887991', 'Muhammad Zain Frasetiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(70, '46115001', 'Nadya Sadini', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(71, '50494357', 'Najwa Fazhira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(72, '37193933', 'Nanda Devita Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(73, '42153069', 'Nessie Gusriyani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(74, '43595009', 'Puspandhari Ilsa Pinasty', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(75, '48538186', 'Qonita Hafiza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(76, '42752791', 'Raihan Naufal Muzakki', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(77, '41990107', 'Reva Gari Mustika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(78, '43516684', 'Sabrina Nurchalisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(79, '34529455', 'Syafira Salsa Ramadhinta', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(80, '44900657', 'Tanu Wijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(81, '41098325', 'Try Mutiara Insani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(82, '55498450', 'Tsania Nabila Izzatia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(83, '43516696', 'Yogi Kurniawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(84, '34743998', 'Agun Andika Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(85, '42250090', 'Aldi Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(86, '36072551', 'Anton Murdiansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(87, '36457149', 'Auzza Dhuha Wijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(88, '41277585', 'Bunga Pefrianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(89, '46477113', 'Chandra Firmansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(90, '47827512', 'Dea Amelia Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(91, '41293725', 'Dian Puspita Sari Br Sitepu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(92, '42635419', 'Dinda Melati Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(93, '41637372', 'Farhan Dwi Ramadan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(94, '37193936', 'Fiki Nuraqmal', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(95, '43152237', 'Fionika Yulianisya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(96, '34027969', 'Fitri Mayang Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(97, '35379832', 'Fuji Cantika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(98, '35936134', 'Glory Irene', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(99, '46506156', 'Hani Syakila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(100, '41028376', 'Iqbal Darmawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(101, '43416961', 'Jihan Azzahra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(102, '46618925', 'M. Daffa Surya Alamsyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(103, '43410680', 'Miftahul Ardiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(104, '43516770', 'Muhammad Abdizzikri Alfaj Diwi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(105, '50419036', 'MUHAMMAD AZKA ANDRIANO', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(106, '37418531', 'Nida Natriya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(107, '42813366', 'NOVALIA SARI PUTRI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(108, '41952021', 'Razin Rajma Anisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(109, '43152247', 'Reyhan Mirtovani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(110, '41637356', 'Risnayogi Dwi Syafitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(111, '43029886', 'Romi Wijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(112, '43109682', 'Siti Saadah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(113, '50579286', 'Al Musyowir Ilyas', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(114, '41696212', 'Andri Maulana Hisbullah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(115, '43516724', 'Azizah Wahyu Istiqomah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(116, '37099057', 'Bagas Andhika Candra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(117, '34183994', 'Bayu Hermawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(118, '47758039', 'Daffa Satrio Pamungkas', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(119, '42253316', 'Farrelio Dwi Fernando Foyi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(120, '43516674', 'Fauzan Tri Wanda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(121, '43433947', 'Ibna Itazhala Annur', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(122, '37193935', 'Ichfan Zikri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(123, '41952397', 'Irga Alpendi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(124, '43782968', 'Jefry Prasetya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(125, '42635472', 'Jihan Az Zahra Hazirin', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(126, '40691431', 'Krisna Surya Putra Wardana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(127, '43416929', 'Lia Permana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(128, '42253334', 'Lianda Agustina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(129, '36591532', 'Mesi Nosi Dearti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(130, '37193932', 'Morin Dwi Monisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(131, '36871582', 'Mouna Indo Minako', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(132, '43416940', 'Muhammad Wenddy Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(133, '42635477', 'Nayla Khansa Afdansyaharani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(134, '49732204', 'Pinkan Nuansa Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(135, '46168307', 'Putri Melati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(136, '41139766', 'Refal Juan Fernandes', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(137, '43516656', 'Regina Saidina Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(138, '43416903', 'Rinjani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(139, '43416945', 'Saqi Azizah Baroza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(140, '43416934', 'Setiya Huda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(141, '43416951', 'Sonia Dwi Yolanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(142, '42978343', 'Wahyu Diffa Kusuma', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(143, '37071173', 'Yedhil Nofrian Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(144, '43756976', 'Agnia Nurul Azizah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(145, '36482124', 'Agus Triwardini', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(146, '43516746', 'Alif Arya Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(147, '49803914', 'Amanda Yonira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(148, '46995369', 'Ana Widiyanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(149, '37099051', 'Angga Al Fitra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(150, '53069706', 'Anggi Helpita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(151, '44099385', 'Della Alzafirah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(152, '43416916', 'Dhea Muthia Anisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(153, '43516676', 'Edwin Apriliano', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(154, '35692047', 'Fitri Ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(155, '42635412', 'Gilang Kurniawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(156, '43378480', 'Kesi Desviza Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(157, '50519238', 'M. Hendy Setiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(158, '48571668', 'M. Ihsan Abil', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(159, '37193905', 'M. Nendi Ferdiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(160, '37099047', 'M. Rendi Arisky', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(161, '53398077', 'Muhammad Ilham Akbar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(162, '43516714', 'Muhammad Mirza Amrah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(163, '41952234', 'Muhammad Syafiq Alparizi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(164, '43516672', 'Nita Valeda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(165, '42806598', 'Noval Romadhan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(166, '43416917', 'Olivia Sandra Hanifah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(167, '42740035', 'Paramananda Aqiela', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(168, '37099048', 'Rakhmat Ramadhan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(169, '146605753', 'Sarah Mardiantika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(170, '47630554', 'SUCI LESTARI.MS', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(171, '43595013', 'Suci Mainta Waode', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(172, '50516460', 'Tita Aulya Nofira. Jk', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(173, '41637366', 'Ulfa Uli Yanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(174, '43516763', 'Zufandri Nuzra Syifaa', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(175, '48172212', 'Akbar Putra Perkasa', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(176, '43378477', 'Allgani Allbar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(177, '42682909', 'Amanda Shasika Devina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(178, '41750358', 'Amelia Damita Feodora', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(179, '42635652', 'Anys', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(180, '25380833', 'Aris Widodo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(181, '43594902', 'Aura Salsabila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(182, '43756952', 'Aurel Nabil Lubis', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(183, '59683083', 'Ayu Rizkiy Vernanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(184, '48735198', 'Cinta Gusriyanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(185, '43516730', 'Delia Rahmah Syarifah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(186, '50516462', 'Dila Yogi Pratama', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(187, '45066120', 'DIMAS ANDRIAN RAMADHAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(188, '41917622', 'Elsa Antoni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(189, '43416979', 'Fabiola Darma Ramadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(190, '42635716', 'Farhat Nofrian Latif Maulana', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(191, '43377765', 'Fira Dahlia Wulandari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(192, '43416953', 'Frisca Aulia Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(193, '43378470', 'Hegil Hidayatulah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(194, '43516697', 'Imelda Febrian', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(195, '44376196', 'Indra Kesuma', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(196, '9995279706', 'Junita Anggi Rahmawati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(197, '42635496', 'Khian Sandila Pamungkas', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(198, '21011781', 'M. Padil Arfandi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(199, '38096578', 'Mhd Wandri Nurdiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(200, '42635406', 'Muhammat Amara Al Dzikra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(201, '42012426', 'Putie Layun Apriani S', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(202, '43416947', 'Putri Aulia Rahmi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(203, '43152232', 'Putri Samapta', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(204, '32674702', 'Ridho Fahrul Rozi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(205, '43516688', 'Shavira Chandra Kirana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(206, '43416939', 'Agie Mustakim Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(207, '42635658', 'Alan Sodri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(208, '43601593', 'Alio Heptiansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(209, '43152253', 'Alvin Nofri Saputra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(210, '50410672', 'Anang Makruf', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(211, '42635444', 'Annisa Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(212, '42015921', 'Bunga Meisy Astrisia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(213, '43516646', 'Dela Dwi Amita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(214, '30653386', 'Delima Br. Nababan', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(215, '36154347', 'Dian Rahmadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(216, '42013986', 'Elsa Safitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(217, '49456791', 'Fachri Martianda Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(218, '47200951', 'Fadilla Holidra', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(219, '42792805', 'Lia Manjesna', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(220, '41538313', 'Lingga Yumike', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(221, '36455158', 'Meri Mustika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(222, '37193918', 'Muhammad Faqih', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(223, '42811270', 'Muhammad Fathan Faj', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(224, '46343461', 'Rabima Aulia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(225, '36971641', 'Rifki Alfarezi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(226, '43595010', 'Septian Reinaldi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(227, '35959256', 'Serly Oktavia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(228, '36457145', 'Sindi Permata Bunda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(229, '49937335', 'Taufik Hidayatullah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(230, '42253312', 'Yugo Tianvero.s', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(231, '-', 'A.Raihan Ashraff', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(232, '-', 'Alfan yenedi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(233, '-', 'Alfarit tyo pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(234, '-', 'Amanda Tasyawan M', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(235, '-', 'Andi Kurniawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(236, '-', 'ANDILAU', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(237, '-', 'Anisa Barokah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(238, '-', 'ANITA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(239, '-', 'Aprima Yolanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(240, '-', 'Arif Nur Setiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(241, '-', 'ASMA RITA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(242, '-', 'Azzahra Ramadhani R', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(243, '-', 'Bobi perdana jaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(244, '-', 'Camelia Nelsi Pasaribu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(245, '-', 'Cusan Hewa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(246, '-', 'Dara Marshania', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(247, '-', 'Desi Henida', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(248, '-', 'Diah Agustia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(249, '-', 'Dimas Sartama Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(250, '-', 'Dinda jovanka', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(251, '-', 'Dori Juliandi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(252, '-', 'Dwika Yanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(253, '-', 'Efi Aulyana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(254, '-', 'Farid ewaldo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(255, '-', 'Fitria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(256, '-', 'Hendri Saputra Utama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(257, '-', 'Indra Zulfikar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(258, '-', 'Jan Putra Meharta', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(259, '-', 'Jodi Alamsyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(260, '-', 'Kevin', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(261, '-', 'Nabilla Putri Ramadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(262, '-', 'Octavia putri ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(263, '-', 'Raihan maulana yusuf', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(264, '-', 'Rudi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(265, '-', 'SINDI PERTITA SARI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(266, '-', 'Tri Annisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(267, '-', 'Wesa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(268, '-', 'Zagi Franata', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(269, '-', 'ADHITYA RAMADHAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(270, '-', 'Afizoh Zikra Autrilizar', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(271, '-', 'Alvito Diaksa', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(272, '-', 'Juan Christiansen Nathan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(273, '-', 'Juwita rahma fitria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(274, '-', 'KENJO LEO APRIDO', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(275, '-', 'M. Abid Ihsan Ozzy', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(276, '-', 'M. Alvian Hidayat', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(277, '-', 'M. Fajar Ananda Rizki', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(278, '-', 'M. IKHSAN FAHENDRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(279, '-', 'M. Naufal Alfajri amin', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(280, '-', 'M. USMAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(281, '-', 'M. Zamrohni', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(282, '-', 'MARICKEL SAPUTRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(283, '-', 'Mariyani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(284, '-', 'Michellia Natasya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(285, '-', 'Muhammad Hival R', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(286, '-', 'Muhammad Ilham', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(287, '-', 'Muhammad Jafrian', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(288, '-', 'Nahrifah Risky Namira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(289, '-', 'Nazwa Rahman Yusni', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(290, '-', 'Niza Mufnah Ultia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(291, '-', 'Nopi sri hartati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(292, '-', 'Novel', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(293, '-', 'Olipia Yulianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(294, '-', 'Palda Tara Anggita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(295, '-', 'Puput adiyanti ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(296, '-', 'Puput Puji Lestari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(297, '-', 'RAHMAD DEZA S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(298, '-', 'RAMADHONI', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(299, '-', 'Rangga Ahmad Robelio', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(300, '-', 'Rexa apresha', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(301, '-', 'Rifqi maulana', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(302, '-', 'Riko Purdiansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(303, '-', 'Riko Yendra  Saputra ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(304, '-', 'Riski Yulianti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(305, '-', 'Sandia putri kusuma', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(306, '-', 'Seny damita', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(307, '-', 'Aretha Dyah Cahyaningtyas', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(308, '-', 'ARI SAPUTRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(309, '-', 'AUGIE SYAHIDA WANZA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(310, '-', 'Awindi Fehira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(311, '-', 'Bunga Rahmi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(312, '-', 'Callista Widyadhana ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(313, '-', 'DESINTA REVA ARTANEVIA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(314, '-', 'Evrillia Aurora Bilqis', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(315, '-', 'Ferdynand savva relo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(316, '-', 'Feruziakinta Syakira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(317, '-', 'FITRAH HAYATI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(318, '-', 'Fiyona Melati Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(319, '-', 'Hani Zulmeirita Rizki', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(320, '-', 'HAZEL EZRA ANANTASYA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(321, '-', 'KAMILAH KANAYA AZIES', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(322, '-', 'M. Agil Alghani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(323, '-', 'M.FAZRIAN HUSEIN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(324, '-', 'Maheza Novrayuda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(325, '-', 'Marshal Tsaniatu Jiddan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(326, '-', 'Marsyanda Aulia .S', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(327, '-', 'Muhammad Algi Fhari', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(328, '-', 'MUHAMMAD RAUSHAN ALFIKRI', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(329, '-', 'Mutiara Fadilah Rahmadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(330, '-', 'Najwa Fitri Desaspriya', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(331, '-', 'Novita permata sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(332, '-', 'Prima husairi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(333, '-', 'Ratu Aulia Guna', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(334, '-', 'Renaldi agustiyanjaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(335, '-', 'RENO FITO ADIPUTRA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(336, '-', 'REXY ANDREAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(337, '-', 'SALSABILA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(338, '-', 'Sarah Amelia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(339, '-', 'Sophie Dayang Pradila', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(340, '-', 'SYAPNA KISTI PRADANI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(341, '-', 'Wulan Septiani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(342, '-', 'Yolan Dewanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(343, '-', 'Yuchela Yushalyana D', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(344, '-', 'Aan Putri Oktaviani Pasaribu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(345, '-', 'Adhea Mustikaning Ayu', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(346, '-', 'Amelia Putri Kania', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(347, '-', 'Annisa salsahena', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(348, '-', 'Azizul hakim', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(349, '-', 'Bata Raja Rambe ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(350, '-', 'Chika adilla putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(351, '-', 'Egi Firmansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(352, '-', 'Fauziah Zakiyaturrahmah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(353, '-', 'Haydar Awalian Nesta', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(354, '-', 'HAZIM IZRA ANANTASYA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(355, '-', 'JEFFRI YULISTIANTO ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(356, '-', 'Kaira amara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(357, '-', 'Kania Rahma Aulia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(358, '-', 'Lintang Amanda Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(359, '-', 'M Rio alfajri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(360, '-', 'M. Frezi alfrok', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(361, '-', 'MAIZHA ALIFIA A\'YUN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(362, '-', 'MUHAMAD REZKI PRATAMA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(363, '-', 'Muhammad Arya Ghuna', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(364, '-', 'MUHAMMAD EXCEL ADISTYRA ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(365, '-', 'Muhammad Iqbal Rizq ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(366, '-', 'Nabila Anggun Chantika', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(367, '-', 'Naufal Akram', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(368, '-', 'NAWAL FARHAH', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(369, '-', 'Novan Darlind Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(370, '-', 'NURASYA QAZA DELBINA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(371, '-', 'Rachel Derisa Bintari Veliza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(372, '-', 'RAFI ARDAN FERDIAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(373, '-', 'RAHMI AZIMA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(374, '-', 'Salmia Ratu Linisma', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(375, '-', 'SELVIA LIYANI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(376, '-', 'SHOLIKHAH RISQI DWI ANGGRAINI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(377, '-', 'Sinta laura kasih', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(378, '-', 'Sonia mayang sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(379, '-', 'TAMARA ARDIAN RAMADHANTI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(380, '-', 'Allyo khamambel', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(381, '-', 'Amriansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(382, '-', 'Ana Maria Desica', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(383, '-', 'ANNISA JULIANA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(384, '-', 'Ariq trikuncoro', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(385, '-', 'Bagaskara', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(386, '-', 'Bunga Syawalia Elizabet', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(387, '-', 'Daniel Firmansyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(388, '-', 'Dhea fernanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(389, '-', 'Elsya mutiara', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(390, '-', 'Euis Dwi Permatasari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(391, '-', 'FAJAR NUGRAHA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(392, '-', 'Fauzan adzhin jauhari', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(393, '-', 'Ghulam Dzaky', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(394, '-', 'Gideon Paris tua.s', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(395, '-', 'HADI SEPTIAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(396, '-', 'INEZ AURA WIRDA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(397, '-', 'Khairina Aulia Suhanda', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(398, '-', 'M Satrio Hatmawijaya', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(399, '-', 'M. Bayu Maha Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(400, '-', 'M.Clario Alkhauri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(401, '-', 'M.FUAD ALFARID', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(402, '-', 'M.HAIKAL', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(403, '-', 'Mariska Kurnia Sofitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(404, '-', 'Miranti Novita sari ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(405, '-', 'Muhammad Mahdi Al R', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(406, '-', 'Mutia Readhatul J', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(407, '-', 'Na\'imahtul Zakiyah Dwi W', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(408, '-', 'Najwa Fadria Ramadhani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(409, '-', 'Rahma Aiskha Mirza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(410, '-', 'Sandra agustin', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(411, '-', 'SULIS TIANA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(412, '-', 'Swezty Luthfiyana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(413, '-', 'Syarlia Lulu Aisy', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(414, '-', 'WIDYA DWI ANGGRAENI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(415, '-', 'Yesi Gustina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(416, '-', 'Adi Raja ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(417, '-', 'Adinda Novria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(418, '-', 'Berman Nababan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(419, '-', 'CHELSEA SYILVIKAMELIA A', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(420, '-', 'Dimas Prasetyo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(421, '-', 'Farus Susanti', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(422, '-', 'Fernando Jawanda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(423, '-', 'FIKRI HIDAYATULLAH', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(424, '-', 'FIRANIKA MARSELA A', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(425, '-', 'FRENDI SETIAWAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(426, '-', 'Gilang Perdana Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(427, '-', 'HABIB RAMADHAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(428, '-', 'Jony Ardi Steviano', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(429, '-', 'Joy Jordan Simbolon', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(430, '-', 'Joyce ischak sinaga', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(431, '-', 'Kamilia Deandra Azies', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(432, '-', 'Lambok Dul Perin. S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(433, '-', 'Lintang Yoga Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(434, '-', 'M.RADITYA AL-HADID', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(435, '-', 'M.RIFKI TRI MANDALA P', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(436, '-', 'Muhammad Alfan Destio', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(437, '-', 'Nabila Dwi Fitri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(438, '-', 'Nandicho Naufal Riza', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(439, '-', 'Natasya Wulandari ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(440, '-', 'Preity Febrianis Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(441, '-', 'PRETY AUDY PUSPITA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(442, '-', 'Putri regina maharani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(443, '-', 'RAFLIANRI BRILLIAN P', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(444, '-', 'REYHAN ALWAFI', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(445, '-', 'Sai Maulana qori', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(446, '-', 'Sheila sutiawati', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(447, '-', 'STHEFANI BR SAGALA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(448, '-', 'Syabrina Baarcyha', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(449, '-', 'Tesa Dwi Rahmadia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(450, '-', 'WAHYU CANDRA T', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(451, '-', 'Zahrotil Wahidah ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(452, '-', 'Adelia yensi putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(453, '-', 'AGNAS ELFANZA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(454, '-', 'Ahmad Bayu Nugroho', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(455, '-', 'Anggun Vidia Sari', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(456, '-', 'Artita selmi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(457, '-', 'BREMA ANDIKA GINTING', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(458, '-', 'Devy zahra putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(459, '-', 'Dicky Hamdani', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(460, '-', 'Dion', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(461, '-', 'DWI WULANDARI', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(462, '-', 'Eggi Ardiansyah Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(463, '-', 'Fitriaisyah rantanu zevani put', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(464, '-', 'Gagah Prasetyo', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(465, '-', 'GIHAN NAYLA', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(466, '-', 'Helen Syahada', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(467, '-', 'IDRIS OKTAVIANUS SITEPU', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(468, '-', 'Julianti Putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(469, '-', 'Khairani Desita Ningsih', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(470, '-', 'Khairunisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(471, '-', 'M DAFFA CALZIFRI S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(472, '-', 'M.galang Rizki Winata', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(473, '-', 'M.zacky Defitra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(474, '-', 'MUHAMAD DAFFA F', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(475, '-', 'Muhammad Ryand Alfikri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(476, '-', 'Nadia kurnia putri', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(477, '-', 'NURHIDAYAT DWI ARJUNA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(478, '-', 'OKADWI PRATAMA', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(479, '-', 'Rahma kometri irana', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(480, '-', 'Ratu sarah jane', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(481, '-', 'Romi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(482, '-', 'Sagia vikta ziranda', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(483, '-', 'Try Jasmine Fathira', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(484, '-', 'Wildan Al Khairi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(485, '-', 'Willy Aldino', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(486, '-', 'Zaiyah Afifah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(487, '-', 'Zhulhan shayiba', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(488, '-', 'Ahmad Rendi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(489, '-', 'Aidil Dwi Putra', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(490, '-', 'Alvani Rahma Nisa', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(491, '-', 'Anggun Satya Meilina ', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(492, '-', 'ARI FEBRIAN', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(493, '-', 'Erik Alamsyah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(494, '-', 'Frisca Andriani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(495, '-', 'Ghufron Amal Ma\'ruf', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(496, '-', 'Helen Sabrina', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(497, '-', 'Hellen pratiwi', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(498, '-', 'Himmatul Alyah', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(499, '-', 'Ilhamhendryyansah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(500, '-', 'JEFFREY ARVIANIKO', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(501, '-', 'Kevin Agustin Pratama', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(502, '-', 'Krista angelica indria', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(503, '-', 'M. Azizur Rohim', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(504, '-', 'M. Ridho Habibi', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(505, '-', 'M.Bariq alfadilah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(506, '-', 'M.RASKHY ALGAZY', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(507, '-', 'Micha ramadani', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(508, '-', 'Muhammad Bagus Aji S', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(509, '-', 'Nabil Veriyera', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(510, '-', 'Nabila Queentania W', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(511, '-', 'Nadia Farhana ', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(512, '-', 'Nanda Farhan Maulana', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(513, '-', 'Parhan Andhika P', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(514, '-', 'Redi Setiawan', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(515, '-', 'Rifaldo Septian Syah', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(516, '-', 'Sarah Fairuza', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(517, '-', 'SUCI MARDIAH', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(518, '-', 'Zagi Franata', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(519, '-', 'Zecky Jupri', 'Laki - Laki', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(520, '-', 'Zizi Salsabillah Andia', 'Perempuan', 'Merangin', '-', 'Aktif', '1-Feb-21'),
(521, '123', 'tere', 'Perempuan', 'jambi', '0877', 'Aktif', '01-Mar-2021'),
(522, '1211', 'ahmad', 'Laki - Laki', 'jambi', '0888', 'Aktif', '01-Mar-2021');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` smallint(6) NOT NULL,
  `ditambahkan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `penulis`, `penerbit`, `tahun`, `kota`, `stok`, `ditambahkan`) VALUES
(4, '500.028', 'Fisika Kelas XI', 'Ketut Kamajaya', 'Grafindo Media Pratama', 2019, 'Bandung', 47, '20-Des-2020'),
(5, '900.128', 'Sejarah Kelas XI', 'Ririn Darini', 'Cempaka Putih', 2019, 'Klaten', 51, '20-Dec-2020'),
(6, '240.032', 'Kimia Kelas X', 'Unggul Sudarmo', 'Erlangga', 2018, 'Jakarta', 50, '09-Feb-2021'),
(7, '900.049', 'Geografi Kelas XI', 'Lili Somantri', 'Grafindo Media Pratama', 2019, 'Bandung', 49, '28-Feb-2021'),
(8, '574.27', 'Biologi Kelas XI', 'Irnaningtyas', 'Erlangga', 2019, 'Jakarta', 50, '28-Feb-2021'),
(9, '123', 'fisika', 'Lili Somantri', 'Grafindo Media Pratama', 2018, 'jambi', 20, '01-Mar-2021');

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
(4, 6, 4, 'Belum Dikembalikan'),
(5, 7, 4, 'Belum Dikembalikan'),
(6, 8, 5, 'Dikembalikan'),
(7, 9, 4, 'Dikembalikan'),
(8, 10, 7, 'Belum Dikembalikan');

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_02_06_171432_create_anggota_table', 1),
(2, '2021_02_06_171432_create_buku_table', 1),
(3, '2021_02_06_171432_create_detail_peminjaman_table', 1),
(4, '2021_02_06_171432_create_kelas_table', 1),
(5, '2021_02_06_171432_create_peminjaman_table', 1),
(6, '2021_02_06_171432_create_pengembalian_table', 1),
(7, '2021_02_06_171432_create_session_table', 1),
(8, '2021_02_06_171432_create_user_table', 1),
(9, '2021_02_06_171433_add_foreign_keys_to_detail_peminjaman_table', 1),
(10, '2021_02_06_171433_add_foreign_keys_to_peminjaman_table', 1),
(11, '2021_02_06_171433_add_foreign_keys_to_pengembalian_table', 1);

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
  `status` enum('Berlangsung','Selesai','Perpanjangan') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `anggota_id`, `user_petugas_id`, `tanggal`, `tanggal_pengembalian`, `status`) VALUES
(6, 3, 1, '01-Mar-2021', '06-Mar-2021', 'Selesai'),
(7, 7, 1, '01-Mar-2021', '06-Mar-2021', 'Berlangsung'),
(8, 522, 1, '01-Mar-2021', '06-Mar-2021', 'Selesai'),
(9, 464, 5, '01-Mar-2021', '07-Mar-2021', 'Selesai'),
(10, 10, 5, '24-Feb-2021', '28-Feb-2021', 'Berlangsung');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denda_terlambat` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `peminjaman_id`, `tanggal`, `denda_terlambat`) VALUES
(3, 8, '08-Mar-2021', 0),
(4, 9, '02-Mar-2021', 0);

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
  `level` enum('Admin','Petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Petugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Admin 01', 'admin@gmail.com', '$2y$10$3sVkZDhr515oV9oW2zd34.P9vlmBJ4NKh46Dqwa.JldwAb7fIYpiK', 'Admin'),
(5, 'Petugas', 'petugas@gmail.com', '$2y$10$uTzi/kKW4pxz00ZMKtJe.eX8J9lXEvNM3KuGuOyGFAVhhYFE3xBpe', 'Petugas'),
(6, 'Petugas 02', 'petugas02@gmail.com', '$2y$10$6EsMYOD4ohUToFH/yXRU6.bnx0F4X3qIRp2alKJfuQW8qMbNDtmdW', 'Petugas');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
