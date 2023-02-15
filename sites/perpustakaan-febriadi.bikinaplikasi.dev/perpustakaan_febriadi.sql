-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Sep 07, 2022 at 06:06 AM
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
-- Database: `perpustakaan_febriadi`
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
  `dibuat` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `no_identitas`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`, `status`, `dibuat`) VALUES
(535, 1373, '001', 'Aristan Ginting', 'Laki - Laki', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(536, 1398, '002', 'Cindy Novelita Sitanggang', 'Perempuan', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(537, 1375, '003', 'Conni Manalu', 'Laki - Laki', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(538, 1400, '004', 'Daniel Panggabean', 'Laki - Laki', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(539, 1377, '005', 'Efrane Simanjuntak', 'Laki - Laki', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(545, 1378, '006', 'Maria luana capah', 'Perempuan', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(546, 1414, '007', 'Marta Laura Sanius', 'Perempuan', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(547, 1415, '008', 'Nopita Situmorang', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(548, 1416, '009', 'Nopri Anni Lumban Tobing', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(549, 1417, '010', 'Nova Romaito ART', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(550, 1418, '011', 'Nice Anjelin Gulo', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(551, 1419, '012', 'Rian Saputra Sitompul', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(552, 1420, '013', 'Setia Natalia Kristiani S.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(553, 1421, '014', 'Sortauli Sitorus', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(554, 1422, '015', 'Ade Siluiana', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(555, 1423, '016', 'Andreas Nerus', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(556, 1424, '017', 'Andreas Panggabean', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(557, 1425, '018', 'Berlianto', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(558, 1426, '019', 'Daniel Ananta Risky. S.', 'Laki - Laki', 'Jambi,', '.', 'Aktif', '13-Jul-2022'),
(559, 1427, '020', 'Doni Hutasoit', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(560, 1428, '021', 'Epa. Pro. H.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(561, 1429, '022', 'Elfrida Verawati Tobing', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(562, 1430, '023', 'Febby Khaen M. T.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(563, 1431, '024', 'Fernandes', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(564, 1432, '025', 'Harisman Juanda A.', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(565, 1433, '026', 'Karunia Natalia Tarigan', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(566, 1434, '027', 'Lilis Patricia P.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(567, 1435, '028', 'Maher Lumban Gaol', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(568, 1436, '029', 'Maria Desnitauli H.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(569, 1437, '030', 'Meisya Thalia S.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(570, 1438, '031', 'Mikhael Crisanta Sianipar', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(571, 1439, '032', 'Putri Pratiwi S.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(572, 1440, '033', 'Putri Fiona Lourent. T.', 'Perempuan', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(573, 1441, '034', 'Rhut Adelina S.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(574, 1442, '035', 'Rika Lusiana Siagian.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(575, 1443, '036', 'Rossa Aprilia', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(576, 1444, '037', 'Rusligon Mendrofa', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(577, 1445, '038', 'Yehezkiel S.', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(578, 1446, '039', 'Yohanes Mancini', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(579, 1447, '040', 'Yhoannes Saputra S.', 'Laki - Laki', 'JAMBI.', '.', 'Aktif', '13-Jul-2022'),
(580, 1449, '041', 'Corin Priskilla Tobing', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(581, 1450, '042', 'Daniel Adi Saputra S.', 'Laki - Laki', 'JAMBI.', '.', 'Aktif', '13-Jul-2022'),
(582, 1451, '043', 'Easter Kristina T.', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(583, 1452, '044', 'Eriko Bredi Natanael. S.', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(584, 1453, '045', 'Febry Valentino Manik', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(585, 1454, '046', 'Johannes Aditya S.', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(586, 1455, '047', 'Kevin Samuel Tampubolon', 'Laki - Laki', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(587, 1456, '048', 'Kristina Elisabelin Manalu', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(588, 1457, '049', 'Lisna Aritonang', 'Perempuan', 'Jambi.', '.', 'Aktif', '13-Jul-2022'),
(589, 1458, '050', 'Marta Gultom', 'Perempuan', 'Jambi', '.', 'Aktif', '13-Jul-2022'),
(597, 1470, '055', 'budiantoro', 'Laki - Laki', 'sdfsdfdsf', '-', 'Aktif', '18-Jul-2022'),
(598, 1474, '01', 'Nasly Silalahi', 'Perempuan', 'Jambi', '-', 'Aktif', '18-Jul-2022'),
(599, 1475, '02', 'Nexsi Panjaitan, S.Pd.', 'Perempuan', 'Jambi', '-', 'Aktif', '18-Jul-2022'),
(600, 1476, '03', 'Hoddiman Simalango,S.Pd.', 'Laki - Laki', 'Jambi', '-', 'Aktif', '18-Jul-2022'),
(601, 1477, '04', 'Salim Simatupang,A.Md', 'Laki - Laki', 'Jambi', '-', 'Aktif', '18-Jul-2022'),
(602, 1478, '05', 'Romauli Simarmata,S.Pd', 'Perempuan', 'Jambi', '-', 'Aktif', '18-Jul-2022'),
(603, 1479, '06', 'Christop Simangunsong,S.Pd', 'Laki - Laki', 'Jambi', '-', 'Aktif', '18-Jul-2022'),
(609, 1485, '07', 'Hosianna Lamtiur,M.kom', 'Perempuan', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(610, 1486, '08', 'Lasteria Sitepu,S.Pd', 'Perempuan', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(611, 1487, '09', 'Nurani Sitanggang,S.Pd', 'Perempuan', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(612, 1488, '10', 'Rotua Rama Simanjuntak, S.Pd', 'Laki - Laki', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(613, 1489, '11', 'Novita Sari Tambunan,S.Pd', 'Perempuan', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(614, 1490, '12', 'Susi Meinila Puteri,M.S.i', 'Perempuan', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(615, 1491, '13', 'Ruth Tarauli Pasaribu, S.Pd', 'Perempuan', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(616, 1492, '14', 'Hervan Rico Sigalingging,S.S', 'Laki - Laki', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(617, 1493, '15', 'Andry Anggiat Hutagaol,S.Hum', 'Laki - Laki', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(618, 1494, '16', 'Dede Novita Silaban, M.Pd', 'Laki - Laki', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(620, 1496, '17', 'Joky Ridwan Hutauruk,SPd', 'Laki - Laki', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(621, 1497, '18', 'Stephani Simatupang,S.Pd', 'Perempuan', 'Jambi', '-', 'Aktif', '19-Jul-2022'),
(622, 1498, '3425252345242', 'testing lsdflsdjfldskjfls', 'Laki - Laki', 'asdfasdasd', '-', 'Aktif', '19-Jul-2022');

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
  `tahun` smallint(4) NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` smallint(3) NOT NULL,
  `ditambahkan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` mediumint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `penulis`, `penerbit`, `tahun`, `kota`, `stok`, `ditambahkan`, `harga`, `created_at`, `updated_at`) VALUES
(27, 'KD0001', 'Besaran, Satuan dan pengukuran', 'Ghabibah', 'CV.Ghiyas Putra', 0, '-', 26, '13-Jul-2022', 10000, '2022-07-13 14:34:15', '2022-07-13 14:34:15'),
(28, 'KD0002', 'Gaya dan Hukum Newton', 'I.N.Perwita', 'CV.Ghiyas Putra', 0, '-', 23, '13-Jul-2022', 0, '2022-07-13 14:35:39', '2022-07-13 14:35:39'),
(29, 'KD0003', 'Gerak dalam Fisika', 'Khoironi', 'CV.Ghiyas Putra', 0, '-', 30, '13-Jul-2022', 0, '2022-07-13 14:39:16', '2022-07-13 14:39:16'),
(30, 'KD0004', 'Listrik Statis', 'Khoironi', 'CV.Ghiyas Putra', 0, '-', 35, '13-Jul-2022', 0, '2022-07-13 14:40:27', '2022-07-13 14:40:27'),
(31, 'KD0005', 'Memahami Tekanan Gas', 'Khoironi', 'CV.Ghiyas Putra', 0, '-', 15, '13-Jul-2022', 0, '2022-07-13 14:41:55', '2022-07-13 14:41:55'),
(32, 'KD0006', 'Parasit', 'Heri Widodo', 'CV.Ghiyas Putra', 0, '-', 13, '13-Jul-2022', 0, '2022-07-13 14:43:50', '2022-07-13 14:43:50'),
(33, 'KD0007', 'Pemuliaan Hewan', 'Edi Suwisiono', 'CV.Ghiyas Putra', 0, '-', 11, '13-Jul-2022', 0, '2022-07-13 14:44:48', '2022-07-13 14:44:48'),
(34, 'KD0008', 'Seluk Beluk Darah', 'Tri Prasetyo', 'CV.Ghiyas Putra', 0, '-', 8, '13-Jul-2022', 0, '2022-07-13 14:46:47', '2022-07-13 14:46:47'),
(35, 'KD0009', 'Sistem Saraf Manusia', 'Heri Widodo', 'CV.Ghiyas Putra', 0, '-', 10, '13-Jul-2022', 0, '2022-07-13 14:47:56', '2022-07-13 14:47:56'),
(36, 'KD00010', 'Suhu dan Pemuaian Zat', 'Yuli R', 'CV.Ghiyas Putra', 0, '-', 6, '13-Jul-2022', 0, '2022-07-13 14:49:13', '2022-07-13 14:49:13'),
(37, 'KD00011', 'Tekanan Dalam Zat Cair', 'Yuli R', 'CV.Ghiyas Putra', 0, '-', 11, '13-Jul-2022', 0, '2022-07-13 14:50:19', '2022-07-13 14:50:19'),
(38, 'KD00013', 'Aneka Ragam Ikan di Laut', 'Edi Suwasno', 'CV.Pamularsih', 0, '-', 5, '13-Jul-2022', 0, '2022-07-13 14:51:32', '2022-07-13 14:51:32'),
(39, 'KD00014', 'Asal Mula Roket Dan Manfaatnya', 'Agus Riyadi', 'CV.Pamularsih', 0, '-', 17, '13-Jul-2022', 0, '2022-07-13 14:52:46', '2022-07-13 14:52:46'),
(40, 'KD00015', 'Atmosfer dan pengaruhny terhadap kehidupan', 'Suparti', 'CV.Pamularsih', 0, '-', 12, '13-Jul-2022', 0, '2022-07-13 14:54:14', '2022-07-13 14:54:14'),
(41, 'KD00012', 'Adaptasi Makhluk Hidup', 'Sudarti', 'CV.Pamularsih', 0, '-', 7, '13-Jul-2022', 0, '2022-07-13 14:55:45', '2022-07-13 14:55:45'),
(42, 'KD00016', 'Dampak Rumah Kaca', 'Sutono,IR', 'CV.Pamularsih', 0, '-', 15, '13-Jul-2022', 0, '2022-07-13 14:57:08', '2022-07-13 14:57:08'),
(43, 'KD00017', 'Dasar Dasar Pengindraan Jauh', 'Insyani R.S', 'CV.Pamularsih', 0, '-', 8, '13-Jul-2022', 0, '2022-07-13 14:59:08', '2022-07-13 14:59:08'),
(44, 'KD00018', 'Energi Dan Aplikasinya Dalam Kehidupan Sehari Hari', 'Zuhaida M', 'CV.Pamularsih', 0, '-', 15, '13-Jul-2022', 0, '2022-07-13 15:01:08', '2022-07-13 15:01:08'),
(45, 'KD00019', 'Flora Lima Benua', 'Tri Yulianto', 'CV.Pamularsih', 0, '-', 12, '13-Jul-2022', 0, '2022-07-13 15:02:32', '2022-07-13 15:02:32'),
(46, 'KD00020', 'Hewan Berbahaya Disekitar kita', 'Widi Handoro', 'CV.Pamularsih', 0, '-', 12, '13-Jul-2022', 0, '2022-07-13 15:05:23', '2022-07-13 15:05:23'),
(47, 'KD00021', 'Mengenal Gulma', 'Sri Winarsih', 'CV.Pamularsih', 0, '-', 15, '13-Jul-2022', 0, '2022-07-13 15:07:04', '2022-07-13 15:07:04'),
(48, 'KD00022', 'Mengenal Hewan Benua Eropa', 'Tri Yulianto', 'CV.Pamularsih', 0, '-', 10, '13-Jul-2022', 0, '2022-07-13 15:08:51', '2022-07-13 15:08:51'),
(49, 'KD00023', 'Mengenai Jenis Jenis Kayu di Indonesia', 'Zuhaida M', 'CV.Pamularsih', 0, '-', 15, '13-Jul-2022', 0, '2022-07-13 15:10:17', '2022-07-13 15:10:17'),
(50, 'KD00024', 'Mengenal Musim Di Dunia', 'M.Noor Said', 'CV.Pamularsih', 0, '-', 10, '13-Jul-2022', 0, '2022-07-13 15:11:50', '2022-07-13 15:11:50'),
(51, 'KD00025', 'Mengenal Pupuk Pestisida', 'Agus Riyadi', 'CV.Pamularsih', 0, '-', 5, '13-Jul-2022', 0, '2022-07-13 15:12:47', '2022-07-13 15:12:47'),
(52, 'KD00026', 'Mengenal Rumput Laut', 'Ulan Nikmah', 'CV.Pamularsih', 0, '-', 3, '13-Jul-2022', 0, '2022-07-13 15:13:57', '2022-07-13 15:13:57'),
(53, 'KD00027', 'Mengenal Tanaman Makanan Pokok', 'Lilik Nur S', 'CV.Pamularsih', 0, '-', 5, '13-Jul-2022', 0, '2022-07-13 15:15:34', '2022-07-13 15:15:34'),
(54, 'KD00028', 'Menjelajah Perut Bumi', 'Agung K', 'CV.Pamularsih', 0, '-', 3, '13-Jul-2022', 0, '2022-07-13 15:17:16', '2022-07-13 15:17:16'),
(55, 'KD00029', 'Pelestarian flora dan fauna', 'Daryanto', 'CV.Pamularsih', 0, '-', 3, '13-Jul-2022', 0, '2022-07-13 15:18:32', '2022-07-13 15:18:32'),
(56, 'KD00030', 'Pelestarian Lingkungan Hidup', 'Sabatriyah', 'CV.Pamularsih', 0, '-', 5, '13-Jul-2022', 0, '2022-07-13 15:19:27', '2022-07-13 15:19:27');

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
(13, 'KD0001-KD00015', 'Pengetahuan', '01'),
(14, 'KD00016-KD00030', 'Pengetahuan', '02');

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
  `status` enum('Berlangsung','Selesai','Perpanjangan','Hilang','Diganti Buku','Diganti Uang','Rusak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diganti_pada` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `anggota_id`, `user_petugas_id`, `tanggal`, `tanggal_pengembalian`, `status`, `keterangan`, `diganti_pada`, `created_at`, `updated_at`) VALUES
(45, 535, 1, '2022-08-25', '2022-08-30', 'Berlangsung', '-', NULL, '2022-08-30 11:47:00', '2022-08-30 11:47:00');

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
(1, 'Admin', 'admin@gmail.com', '$2y$10$BTSiqy54Pc73OXDeHrXMZOcD5RquDBvbGrQR8IwkVlI2CN/IAAyUm', 'Admin'),
(1373, 'Aristan Ginting', 'Aristan@gmail.com', '$2y$10$xQ53caPVM7CpbVQ6KZfGEevcvsxNdOl8j8EmPE374TCC00FFjKVZ.', 'Siswa'),
(1375, 'Conni Manalu', 'conny@gmail.com', '$2y$10$Y.8xkaAr01yPiE6m0mcjeegG8dgHDh8.e2DPFNcwyW1HWju8qMeeS', 'Siswa'),
(1377, 'Efrane Simanjuntak', 'efrane@gmail.com', '$2y$10$hyugaX6GYXnZEUVT8Pv0OeoldeM0N5m.8tX2piDDYhV0wv7KtW2T2', 'Siswa'),
(1378, 'Maria Luana Capah', 'maria@gmail.com', '$2y$10$iVBVwJcNQzXh92WVis0ase05O.MmqPYS2Z9qdzy.JOlO5PyH0rnOy', 'Siswa'),
(1398, 'Cindy Novelita Sitanggang', 'cindynovelitasitanggang@gmail.com', '$2y$10$8G/mdZrXeZiAOgK0BkfNnuzgQUcaJiyR/HwX7ZNaL575is.Y1FDvm', 'Siswa'),
(1400, 'Daniel Panggabean', 'danielpanggabean@gmail.com', '$2y$10$NFLFoQqP9MEpIa0o3Q6TpuGwuWXk7aWaU/uNzaFs/o6glVs/t8Kji', 'Siswa'),
(1414, 'Marta Laura Sanius', 'martalaurasanius@gmail.com', '$2y$10$JkGKL3GQmj5ptTol8Ji83e8VMFjyKdsWSeYH8IPHGf3MqoxUSz4Wi', 'Siswa'),
(1415, 'Nopita Situmorang', 'nopitasitumorang@gmail.com', '$2y$10$tVWE3n5ysvhIaoM58ckf7uR134b0qIoEMAetg1WTKejfwJmGLbu46', 'Siswa'),
(1416, 'Nopri Anni Lumban Tobing', 'nopriannilumbantobing@gmail.com', '$2y$10$j7BUN4LF8e9I9.rJI54t8uZ7016CyJ7Qsp3P/c2g5Vd0YvpXvX2WS', 'Siswa'),
(1417, 'Nova Romaito ART', 'novaromaitoart@gmail.com', '$2y$10$sOrf0fxJ/Cbz8MUN.nyIYeP03Ofj2o.2ThQ5OcMS3ydsz6otqCj5K', 'Siswa'),
(1418, 'Nice Anjelin Gulo', 'niceanjelingulo@gmail.com', '$2y$10$x5BNDm1jbxJHYO0UFWqirOfN0beqiXK.XLW1Ei8yt41ST4JHaInk6', 'Siswa'),
(1419, 'Rian Saputra Sitompul', 'riansaputrasitompul@gmail.com', '$2y$10$1n2DWANr.wM69cKYTAlNfucA45DNMUo26X51a8Ox5t9jkmgDLlAO.', 'Siswa'),
(1420, 'Setia Natalia Kristiani S.', 'setianataliakristianis@gmail.com', '$2y$10$Ansi81A9hvqeVA.Ta94Mc.I/Svx2qPwlCUEIfOesp.QA35AwLIEfe', 'Siswa'),
(1421, 'Sortauli Sitorus', 'sortaulisitorus@gmail.com', '$2y$10$49XJpOPwJ9vAIDnsfmqfJeT7z2rMbuEds9fwRm6M3nSbTI8YB3Ar.', 'Siswa'),
(1422, 'Ade Siluiana', 'adesiluiana@gmail.com', '$2y$10$.Y5tpEi3y2q1ERAoB/hhjuOHEHRsHWkMzLdHadeJjd2z7KoVCInWW', 'Siswa'),
(1423, 'Andreas Nerus', 'andreasnerus@gmail.com', '$2y$10$ucyJNMYWUTOaz8llWMp6A.aGUcylEE4k8z4F8d8k3/BZRnZ.11Dru', 'Siswa'),
(1424, 'Andreas Panggabean', 'andreaspanggabean@gmail.com', '$2y$10$arOn5pXq4yMAYLjhP25j0.auCJ4VPWW4mqGlaFmWnl9DpMTn2FgHa', 'Siswa'),
(1425, 'Berlianto', 'berlianto@gmail.com', '$2y$10$HH75q2YkzaAi4qhLldPYsOrKvCVDQVyHGdIoMo.vRWf/a4blGaBqC', 'Siswa'),
(1426, 'Daniel Ananta Risky. S.', 'danielanantariskys@gmail.com', '$2y$10$fXqGHnT8lB.VmVmy4wJlpek2rjie0qDU8elkhUlBqxfQlCDwYwyxO', 'Siswa'),
(1427, 'Doni Hutasoit', 'donihutasoit@gmail.com', '$2y$10$aQkY1YJ9pyoIp1Glmt4nj.Ac2Lb5ZRBis6fN7GwO6gYqzyWjVwvl6', 'Siswa'),
(1428, 'Epa. Pro. H.', 'epaproh@gmail.com', '$2y$10$DRnqJtJbgt5APlsEL4wS/eyl149ZD/qR8VlKVpJgRB4QE8yfkmOLa', 'Siswa'),
(1429, 'Elfrida Verawati Tobing', 'elfridaverawatitobing@gmail.com', '$2y$10$Rfbn8A9co0/bYSMpXJkjR.yZt0V0cKD/M8hlQ5vFk8sK0VG7hH9Ru', 'Siswa'),
(1430, 'Febby Khaen M. T.', 'febbykhaenmt@gmail.com', '$2y$10$zOHw0aSF/3ZMzaJ4AshUVu9YX0/ISqvKD02X4VXa/GVN8OgZmfy7W', 'Siswa'),
(1431, 'Fernandes', 'fernandes@gmail.com', '$2y$10$d.Ibb9XLdIASm.V4WdRHJ.65MvWoXmIP9RoM2K2EfU72YR6z9of9.', 'Siswa'),
(1432, 'Harisman Juanda A.', 'harismanjuandaa@gmail.com', '$2y$10$2lgfoKmKuZ0zlCMmjn61d.SHDtde9WpsB7/Z7OID6G04GfidyAFTe', 'Siswa'),
(1433, 'Karunia Natalia Tarigan', 'karunianataliatarigan@gmail.com', '$2y$10$WDCozmQUSJc1so4X4SgKS.W4npVEMnxwCyLukPNn/BNDYWbUi.pja', 'Siswa'),
(1434, 'Lilis Patricia P.', 'lilispatriciap@gmail.com', '$2y$10$8XcHpP6wDHoV8afNXgGMCu8qD0co.JZdd0KLdx5K1ej0KcxfT1bZy', 'Siswa'),
(1435, 'Maher Lumban Gaol', 'maherlumbangaol@gmail.com', '$2y$10$YRvhfaYXZRTd2MiQPB/L3OlLNfwktYd6kW39bA.wqEbW8vtzXOhgC', 'Siswa'),
(1436, 'Maria Desnitauli H.', 'mariadesnitaulih@gmail.com', '$2y$10$Vzr9jatn974Tpbv16b5rHO7WFkjLeMXc7MjmPv47Atmu4gjVSluge', 'Siswa'),
(1437, 'Meisya Thalia S.', 'meisyathalias@gmail.com', '$2y$10$1fbsf7xEJ75fPiU58JRqguDUH.FV2mfTlqv3d710kxNka6He6R1JW', 'Siswa'),
(1438, 'Mikhael Crisanta Sianipar', 'mikhaelcrisantasianipar@gmail.com', '$2y$10$xu9N8uc/h3HPKCq7c78mDuuVRnP7zbzEl0ZkP/iDQpqBg96RkMFG2', 'Siswa'),
(1439, 'Putri Pratiwi S.', 'putripratiwis@gmail.com', '$2y$10$j8aAfw/M2s5k8VNgSbaeeu7UHSe5GKF9jCQx7/v52sLIgcPaSNHGC', 'Siswa'),
(1440, 'Putri Fiona Lourent. T.', 'putrifionalourentt@gmail.com', '$2y$10$sFhCHijyHXKHMdGlzsRCau1COusBsd.4JrWbVMQOEptGx/rsgjB2q', 'Siswa'),
(1441, 'Rhut Adelina S.', 'rhutadelinas@gmail.com', '$2y$10$6xh..tOryVeJCi3BKAPiEu4TIvV.5oWq.viOUYvIDhIyABC6CVymy', 'Siswa'),
(1442, 'Rika Lusiana Siagian.', 'rikalusianasiagian@gmail.com', '$2y$10$Z3CcNK589eXI4xoPMjvHquo.fAdh0Ow6Zj67BG4G7tyJJg3D8QSeC', 'Siswa'),
(1443, 'Rossa Aprilia', 'rossaaprilia@gmail.com', '$2y$10$.BF65JHyLi1vIaT6uf8b0Oc1/lCWtZ9fHePcfZK9/MCgm4JPu1Bvm', 'Siswa'),
(1444, 'Rusligon Mendrofa', 'rusligonmendrofa@gmail.com', '$2y$10$0BZW7Mdp0QppiWWFPRC5huDMLy7wM91bZ5LRQCg4RddEmM8RKsyK2', 'Siswa'),
(1445, 'Yehezkiel S.', 'yehezkiels@gmail.com', '$2y$10$EdeQK9i4M369U30DoYAJKOw7ug1fZ97vr8sOfY4sPNSEMQZUAqF/2', 'Siswa'),
(1446, 'Yohanes Mancini', 'yohanesmancini@gmail.com', '$2y$10$ifB2XELtPO0QgvFa.HFL7urON6M91m4Q2bJGTXeZVVh69mnElOXHS', 'Siswa'),
(1447, 'Yhoannes Saputra S.', 'yhoannessaputras@gmail.com', '$2y$10$3VlN9pm1jGWIBAruoGo7Yuw4MzGqAQpTXLFvkxJoqiTK2HUdP.7Pa', 'Siswa'),
(1449, 'Corin Priskilla Tobing', 'corinpriskillatobing@gmail.com', '$2y$10$xnhtXnEUOvyLPT14gYoJNepznJsNGxRKfJnAMgvfWwd89tY1AHUVm', 'Siswa'),
(1450, 'Daniel Adi Saputra S.', 'danieladisaputras@gmail.com', '$2y$10$JDdXAkuQ3qysW0mhLfOGOerBa9BXqR4mai8YfBhXcj0.gSVKZXSei', 'Siswa'),
(1451, 'Easter Kristina T.', 'easterkristinat@gmail.com', '$2y$10$94YluzpHcVcizDtFIG.OB.Lo6h3W3LSt.Fg5JbBISCZ2DARR54seq', 'Siswa'),
(1452, 'Eriko Bredi Natanael. S.', 'erikobredinatanaels@gmail.com', '$2y$10$kHFulo1c4RMDt0J1DPamN.zXz2zt9omOapTjKwAPQ4X1pk4Ni45Fe', 'Siswa'),
(1453, 'Febry Valentino Manik', 'febryvalentinomanik@gmail.com', '$2y$10$udt8zANG7WHmzK.KJytGvOJLrXpemjBpj0iRsf9VB4sbhsqVXyiSe', 'Siswa'),
(1454, 'Johannes Aditya S.', 'johannesadityas@gmail.com', '$2y$10$hYtqO2FGTHlV83jHJwgHFOggESaDIeyGuPATPcfGZtrfsXMGCrJS6', 'Siswa'),
(1455, 'Kevin Samuel Tampubolon', 'kevinsamueltampubolon@gmail.com', '$2y$10$zF3pctZNTasmzvpUX4O5a.QcGZseeEIGStUH3DodchBkfE3gWZDym', 'Siswa'),
(1456, 'Kristina Elisabelin Manalu', 'kristinaelisabelinmanalu@gmail.com', '$2y$10$r9572clgzWF9SK4/yGaY.uEgG5h2iIj/8lFQeU/v5IlYq7INkLQ2S', 'Siswa'),
(1457, 'Lisna Aritonang', 'lisnaaritonang@gmail.com', '$2y$10$Fhy47/YrDEvx06qOO0daOObfmbsPHzjGlNAR7Y7GYbaThpbnR5aUq', 'Siswa'),
(1458, 'Marta Gultom', 'martagultom@gmail.com', '$2y$10$WtNQSQO52E1VtkuNFL0er.kOIkE5ymVR8cPWMmcA9Ipe7E32gV8DO', 'Siswa'),
(1470, 'budiantoro', 'budiantoro@gmail.com', '$2y$10$6KcDBX2lxO3xyG8sWaD93./uBNiKT9G8A8VoDaD6Zvqotkzue5CuK', 'Siswa'),
(1474, 'Nasly Silalahi', 'naslysilalahi@gmail.com', '$2y$10$BYnzBMEyGNY6x4/MVFltHOrV/yr72dQmYJKyDZfeVExgi9E7A.952', 'Guru'),
(1475, 'Nexsi Panjaitan, S.Pd.', 'nexsipanjaitanspd@gmail.com', '$2y$10$DCawZfN3KRjN/Uk6wRLyru6M.mu19yTqBNCDZzy5yc844x0mnD/AK', 'Guru'),
(1476, 'Hoddiman Simalango,S.Pd.', 'hoddimansimalangospd@gmail.com', '$2y$10$nil4XiBkZGxZMtjT6045MO/FcQl6Ni3BZ5KEPRAQaQ816MV5vEZq6', 'Guru'),
(1477, 'Salim Simatupang,A.Md', 'salimsimatupangamd@gmail.com', '$2y$10$LseSyZUpfztoHAzPozCmeek/sL9b116Sn8HWRv9ZKEoAZSTAJFqWq', 'Guru'),
(1478, 'Romauli Simarmata,S.Pd', 'romaulisimarmataspd@gmail.com', '$2y$10$HL.t.3xb/09mmwqetj9ST.DOZYHcJ/zTtbtUeuxDaqJNguuHOE5LG', 'Guru'),
(1479, 'Christop Simangunsong,S.Pd', 'christopsimangunsongspd@gmail.com', '$2y$10$tDGH3QrAAwzIYQjKhQAorOx4Xj4.4QPZo28MNr6ztplvdzJs4IskG', 'Guru'),
(1485, 'Hosianna Lamtiur,M.kom', 'hosiannalamtiurmkom@gmail.com', '$2y$10$yvTdHIbsoArqwHulo3JKnOn2w8Q40r.Bvl46OClTvuiDd8qLXkpLy', 'Guru'),
(1486, 'Lasteria Sitepu,S.Pd', 'lasteriasitepuspd@gmail.com', '$2y$10$.Qr/H7Bv7ugpu5PRhqKI4O5WZjM8MxOXZB6GTiO/3rCEolbiSJ/ji', 'Guru'),
(1487, 'Nurani Sitanggang,S.Pd', 'nuranisitanggangspd@gmail.com', '$2y$10$.L3Sl4/KGLE0PZtiHxP8g.ED/MtKHTOY8JGg2SZCRIp/dFBjqtsf6', 'Guru'),
(1488, 'Rotua Rama Simanjuntak, S.Pd', 'rotuaramasimanjuntakspd@gmail.com', '$2y$10$2yrhzcdoQ493BKqlijDVs.m.auevOvJANsGqExkAur/AnAwH.BFxu', 'Guru'),
(1489, 'Novita Sari Tambunan,S.Pd', 'novitasaritambunanspd@gmail.com', '$2y$10$9nqOj68488sdywFxHfqz4e8KHAkMGt2dXdBs8FK5fFP5.5bK.s8Le', 'Guru'),
(1490, 'Susi Meinila Puteri,M.S.i', 'susimeinilaputerimsi@gmail.com', '$2y$10$jWDcEp16QpRBL9cclbnAHOXusFGjx..rfLH3GEVkBt/EwUaFVRj7K', 'Guru'),
(1491, 'Ruth Tarauli Pasaribu, S.Pd', 'ruthtaraulipasaribuspd@gmail.com', '$2y$10$jF3aAWHKj8ZBrqUiz7FtNO0BAqVhH7IsDss6MlQ3HCmVKyNT1I.I.', 'Guru'),
(1492, 'Hervan Rico Sigalingging,S.S', 'hervanricosigalinggingss@gmail.com', '$2y$10$DYDNtvYImvcpfE.dd4cRS.a0K4Vq.qRP8dATPZQpnnrkwQ/5X8zne', 'Guru'),
(1493, 'Andry Anggiat Hutagaol,S.Hum', 'andryanggiathutagaolshum@gmail.com', '$2y$10$NKP7GCBK8gYhnlblGszDUevp12X9vI8eR.FiGWYTDl2055E8BsGPW', 'Guru'),
(1494, 'Dede Novita Silaban, M.Pd', 'dedenovitasilabanmpd@gmail.com', '$2y$10$p6DeyAYuZZXU5Q.w9lDnzestB7dDN4nSCzjoNcugAeAIJUZ1Y99eW', 'Guru'),
(1496, 'Joky Ridwan Hutauruk,SPd', 'jokyridwanhutaurukspd@gmail.com', '$2y$10$OIuNwCXqzryAoSZcaYhQpeRRYzX59mvMcyZwfysjy.2niqL8rq.zi', 'Guru'),
(1497, 'Stephani Simatupang,S.Pd', 'stephanisimatupangspd@gmail.com', '$2y$10$DjnThuFCuzUl4kasrqconuf.5uiF67lnj7FDQH/VHTBNrxM9bQ8cS', 'Guru'),
(1498, 'testing lsdflsdjfldskjfls', 'testinglsdflsdjfldskjfls@gmail.com', '$2y$10$542hN6YjWvx53rnxcURFoOCUYfGlU1DAQjPopH5M2C2aHpjxIC/LG', 'Guru');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kode_buku`
--
ALTER TABLE `kode_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1499;

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
