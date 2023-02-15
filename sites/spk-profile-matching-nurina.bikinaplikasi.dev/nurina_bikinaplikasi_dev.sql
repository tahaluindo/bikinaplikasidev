-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com
-- Generation Time: Aug 21, 2020 at 11:07 PM
-- Server version: 5.7.23-log
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oo9zfokleaozueh8`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Disetujui','Belum Disetujui','Dibatalkan') COLLATE utf8mb4_unicode_ci DEFAULT 'Disetujui'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `project_id`, `user_id`, `nama`, `no_identitas`, `alamat_siswa`, `tanggal_lahir`, `kelas_id`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `status`) VALUES
(39, 4, 8, 'Alkah Aqilansyah', '0041637075', 'JL. YUSUF NASRI NMO 50', '2007-08-01', 1, '081922897609', 'ALAMSYAH', 'Pegawai Swasta', 'Juriah', 'IRT', 'Disetujui'),
(41, 4, 10, 'Arya Naksyabandi Hutagalung', '0040459204', 'Kelurahan Talang Banjar Rt 11', '2007-06-02', 1, '083151092221', 'Mulyadi Hutagalung', 'Buruh', 'Normawati', 'IRT', 'Disetujui'),
(42, 4, 11, 'Daniel Almahdi Naptupulu', '0041238304', 'Talang Banjar Jambi Timur', '2007-08-21', 1, '082371611135', 'Cholid Maulana Hutagalung', 'Buruh', 'Sulastri', 'IRT', 'Disetujui'),
(43, 4, 12, 'Dian Ayu Anggraini', '0045259824', 'Jl. Fatahillah Lr. Mulyo', '2006-08-09', 8, '0897235968', 'Sutiman', 'Buruh', 'Siti Rahma', 'IRT', 'Disetujui'),
(44, 4, 13, 'Dwi Zaharnoningrum', '0042595828', 'Jl Sri Pakibuwono', '2007-04-16', 1, '085273121489', 'Peri Hendra', 'Pegawai Swasta', 'Marinda', 'IRT', 'Disetujui'),
(45, 4, 14, 'Eko Pratama', '0043172895', 'Jl. Majapahit', '2007-01-20', 1, '082376356880', 'Didi Juhadi', 'Buruh', 'Yani Maryani', 'IRT', 'Disetujui'),
(46, 4, 15, 'Fajar Kurniawan', '0042054603', 'Perum Mawar Putih Kasang Pudak', '2007-11-15', 8, '089604390555', 'Budiman', 'Tidak Ada', 'Odah', 'IRT', 'Disetujui'),
(47, 4, 16, 'Fatimah Azahra', '0040459238', 'Jl. Hm Yusuf Nasri Jambi Selatan', '2009-07-01', 1, '082265781012', 'Toni Hardi', 'Buruh', 'Lia Herlina', 'IRT', 'Disetujui'),
(48, 4, 17, 'Hadi Saputra', '0041871763', 'Jln Gunung Semeru Rt.21', '2007-03-27', 1, '081930232217', 'Tukino Hardiyanto', 'Buruh', 'Jumiati', 'IRT', 'Disetujui'),
(49, 4, 18, 'Icha Amelia', '0041872125', 'Kasang Kumpeh Muaro Jambi', '2007-03-14', 8, '082376479384', 'Erman', 'Buruh', 'Kodariyah', 'IRT', 'Disetujui'),
(50, 4, 19, 'Ikhsan Maulana', '0031838647', 'Lrg Ayam Kasang Kumpeh Muaro Jambi', '2006-11-11', 1, '087376477498', 'Pardamean Daulay', 'Buruh', 'Sunarti', 'Pedagang', 'Disetujui'),
(51, 4, 20, 'Kartini', '0041872124', 'Jl. Hm Yusuf Nasri Jambi Selatan', '2005-07-15', 8, '081274411611', 'Mamat', 'Petani', 'Parida', 'IRT', 'Disetujui'),
(52, 4, 21, 'Krisna Wijaya Kusuma', '0042553921', 'Jl Sentot Alibasa Payo Selincah', '2007-03-02', 1, '081270796923', 'Supadi Angka Wijaya', 'Pegawai Swasta', 'Suparmi', 'IRT', 'Disetujui'),
(53, 4, 22, 'Lilis Dian Rahayu', '0043447620', 'Lorong Mulyo 01 Jambi Selatan', '2007-08-23', 1, '08982047231', 'Rahaman', 'Buruh', 'Diana Kekasih', 'IRT', 'Disetujui'),
(54, 4, 23, 'M Ade Gilang Prasetyo', '0042054399', 'Jl Amd Iii Jambi Timur', '2007-03-30', 1, '085279267110', 'Maryatnto', 'Pegawai Swasta', 'Siti Baita', 'IRT', 'Disetujui'),
(55, 4, 24, 'M Deny Ardiansyah', '0042054480', 'Jl Letkol Ramli Lubis Lrg Mulia Ii Jambi Timur', '2007-08-31', 1, '0852307000407', 'Jarinam', 'Guru (Honorer)', 'Nurhasanah', 'IRT', 'Disetujui'),
(56, 4, 25, 'M.Rahmasyah', '0042612709', 'Lrg Telaga Biru Kumpeh Muaro Jambi', '2007-08-01', 1, '082182124001', 'Selamet', 'Pegawai Swasta', 'Rita', 'IRT', 'Disetujui'),
(57, 4, 26, 'M Ramadhan', '0041680992', 'Perum Graha Bumi Eka Jaya', '2007-09-07', 1, '083121428166', 'M Amin', 'Buruh', 'Mulyani', 'IRT', 'Disetujui'),
(58, 4, 27, 'M Ramzy Ramadhan', '0042054032', 'Jl Kapt Id Sunaryo Talang Bakung', '2007-11-11', 1, '085267747408', 'Yahya', 'Tidak Ada', 'Astriani Fitriani', 'IRT', 'Disetujui'),
(59, 4, 28, 'Marsella Alfitriani', '0049485777', 'Lr Gotong Royong Muaro Jambi', '2007-05-19', 1, '085268124415', 'Suwandi', 'Pegawai Swasta', 'Nur Yanah', 'IRT', 'Disetujui'),
(60, 4, 29, 'Miftahul Hidayah', '0046739922', 'Lrg Gotong Royong Muaro Jambi', '2007-08-29', 1, '083177057958', 'Muhaimin', 'Pegawai Swasta', 'Sunarti', 'IRT', 'Disetujui'),
(61, 4, 30, 'M Swiki Darmawan', '0044155618', 'Jl Majapahit Payo Selincah', '2007-06-11', 1, '0895335144545', 'Fredy Chandra', 'Pedagang', 'Komariah', 'Pegawai Swasta', 'Disetujui'),
(63, 4, 32, 'Nazzura Rihhadatul Jannah', '0041872137', 'Lrg Mahkamah 1 Talang Bakung', '2007-11-07', 1, '081288055508', 'Jumari', 'Buruh', 'Lismawati', 'IRT', 'Disetujui'),
(64, 4, 33, 'M Vicky Ryandra', '0042612748', 'Jl Majapahit Payo Selincah', '2007-06-11', 1, '0895335144545', 'Fredy Chandra', 'Pedagang', 'Komariah', 'Pegawai Swasta', 'Disetujui'),
(65, 4, 34, 'Muhammad Yusuf', '0047211616', 'Kasang Kumpeh Muaro Jambi', '2007-08-29', 1, '082373459031', 'Romi AS', 'Pegawai Swasta', 'Rahmawati', 'IRT', 'Disetujui'),
(66, 4, 35, 'Ramdan Riawan', '24252525', 'dsgfdsgsgagfagafagd', '2008-07-29', 1, '2426252624626', 'fsgsgsgsg', 'afafafafa', 'afafaf', 'afafafa', 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_details`
--

CREATE TABLE `alternatif_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif_details`
--

INSERT INTO `alternatif_details` (`id`, `alternatif_id`, `kriteria_detail_id`) VALUES
(375, 39, 2),
(376, 39, 13),
(377, 39, 9),
(378, 39, 19),
(379, 39, 54),
(380, 39, 46),
(387, 41, 2),
(388, 41, 13),
(389, 41, 9),
(390, 41, 19),
(391, 41, 52),
(392, 41, 46),
(393, 42, 4),
(394, 42, 13),
(395, 42, 9),
(396, 42, 19),
(397, 42, 52),
(398, 42, 46),
(399, 43, 3),
(400, 43, 14),
(401, 43, 9),
(402, 43, 19),
(403, 43, 52),
(404, 43, 46),
(405, 44, 3),
(406, 44, 13),
(407, 44, 9),
(408, 44, 19),
(409, 44, 54),
(410, 44, 46),
(411, 45, 4),
(412, 45, 13),
(413, 45, 9),
(414, 45, 19),
(415, 45, 52),
(416, 45, 46),
(417, 46, 2),
(418, 46, 14),
(419, 46, 9),
(420, 46, 20),
(421, 46, 51),
(422, 46, 46),
(423, 47, 4),
(424, 47, 13),
(425, 47, 9),
(426, 47, 19),
(427, 47, 52),
(428, 47, 46),
(429, 48, 3),
(430, 48, 13),
(431, 48, 10),
(432, 48, 19),
(433, 48, 52),
(434, 48, 46),
(435, 49, 3),
(436, 49, 14),
(437, 49, 10),
(438, 49, 19),
(439, 49, 52),
(440, 49, 46),
(441, 50, 4),
(442, 50, 13),
(443, 50, 10),
(444, 50, 19),
(445, 50, 52),
(446, 50, 48),
(447, 51, 2),
(448, 51, 13),
(449, 51, 9),
(450, 51, 19),
(451, 51, 52),
(452, 51, 46),
(453, 52, 3),
(454, 52, 13),
(455, 52, 10),
(456, 52, 19),
(457, 52, 54),
(458, 52, 46),
(459, 53, 3),
(460, 53, 13),
(461, 53, 9),
(462, 53, 19),
(463, 53, 52),
(464, 53, 46),
(465, 54, 4),
(466, 54, 13),
(467, 54, 9),
(468, 54, 19),
(469, 54, 54),
(470, 54, 46),
(471, 55, 3),
(472, 55, 13),
(473, 55, 9),
(474, 55, 19),
(475, 55, 54),
(476, 55, 46),
(477, 56, 2),
(478, 56, 13),
(479, 56, 10),
(480, 56, 19),
(481, 56, 54),
(482, 56, 46),
(483, 57, 2),
(484, 57, 13),
(485, 57, 9),
(486, 57, 19),
(487, 57, 52),
(488, 57, 46),
(489, 58, 3),
(490, 58, 13),
(491, 58, 9),
(492, 58, 20),
(493, 58, 51),
(494, 58, 46),
(495, 59, 2),
(496, 59, 13),
(497, 59, 9),
(498, 59, 19),
(499, 59, 54),
(500, 59, 46),
(501, 60, 4),
(502, 60, 13),
(503, 60, 9),
(504, 60, 19),
(505, 60, 54),
(506, 60, 46),
(507, 61, 3),
(508, 61, 13),
(509, 61, 9),
(510, 61, 19),
(511, 61, 53),
(512, 61, 49),
(519, 63, 4),
(520, 63, 13),
(521, 63, 10),
(522, 63, 19),
(523, 63, 52),
(524, 63, 46),
(525, 64, 3),
(526, 64, 13),
(527, 64, 10),
(528, 64, 19),
(529, 64, 53),
(530, 64, 49),
(531, 65, 4),
(532, 65, 13),
(533, 65, 10),
(534, 65, 19),
(535, 65, 54),
(536, 65, 46),
(537, 66, 1),
(538, 66, 13),
(539, 66, 9),
(540, 66, 19),
(541, 66, 51),
(542, 66, 46);

-- --------------------------------------------------------

--
-- Table structure for table `aspeks`
--

CREATE TABLE `aspeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persen` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspeks`
--

INSERT INTO `aspeks` (`id`, `nama`, `persen`) VALUES
(1, 'Akademi (BSM)', 20),
(2, 'Financial (BSM)', 80);

-- --------------------------------------------------------

--
-- Table structure for table `bobots`
--

CREATE TABLE `bobots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `selisih` tinyint(4) NOT NULL,
  `nilai` double(5,1) NOT NULL,
  `keterangan` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobots`
--

INSERT INTO `bobots` (`id`, `selisih`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 0, 5.0, 'Tidak ada selisih(kompetensi sesuai dengan yang dibutuhkan)', NULL, NULL),
(2, 1, 4.5, 'Kompetensi individu kelebihan 1 tingkat/level', NULL, NULL),
(3, -1, 4.0, 'Kompetensi individu kekurangan 1 tingkat/level', NULL, NULL),
(4, 2, 3.5, 'Kompetensi individu kelebihan 2 tingkat/level', NULL, NULL),
(5, -2, 3.0, 'Kompetensi individu kekurangan 2 tingkat/level', NULL, NULL),
(6, 3, 2.5, 'Kompetensi individu kelebihan 3 tingkat/level', NULL, NULL),
(7, -3, 2.0, 'Kompetensi individu kelebihan 3 tingkat/level', NULL, NULL),
(8, 4, 1.5, 'Kompetensi individu kelebihan 4 tingkat/level', NULL, NULL),
(9, -4, 1.0, 'Kompetensi individu kekurangan 4 tingkat/level', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gaps`
--

CREATE TABLE `gaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gaps`
--

INSERT INTO `gaps` (`id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 2, 3, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelass`
--

CREATE TABLE `kelass` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelass`
--

INSERT INTO `kelass` (`id`, `nama`) VALUES
(1, 'kelas 7'),
(8, 'Kelas 8');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aspek_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` tinyint(3) UNSIGNED NOT NULL,
  `jenis` enum('Core Factor','Secondary Factor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gap` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `aspek_id`, `nama`, `target`, `jenis`, `gap`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nilai Rata-Rata', 2, 'Core Factor', 2, NULL, NULL),
(3, 2, 'Jumlah Tanggungan Orang Tua', 3, 'Core Factor', 3, NULL, NULL),
(4, 1, 'Semester', 3, 'Secondary Factor', 3, NULL, NULL),
(5, 2, 'Status Anak', 3, 'Core Factor', 3, NULL, NULL),
(13, 2, 'Pekerjaan Ayah', 3, 'Secondary Factor', 3, NULL, NULL),
(14, 2, 'Pekerjaan Ibu', 4, 'Secondary Factor', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_details`
--

CREATE TABLE `kriteria_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_details`
--

INSERT INTO `kriteria_details` (`id`, `kriteria_id`, `keterangan`, `nilai`) VALUES
(1, 1, '<75', 1),
(2, 1, '75.00 – 80.00', 2),
(3, 1, '80.00 –85.00', 3),
(4, 1, '85.00 - 89.00', 4),
(9, 3, '>2 Anak', 5),
(10, 3, '2 Anak', 3),
(11, 3, '1 Anak', 1),
(13, 4, 'Semester 2', 2),
(14, 4, 'Semester 4', 5),
(19, 5, 'Lengkap', 1),
(20, 5, 'Yatim / Piatu', 3),
(21, 5, 'Yatim Piatu', 5),
(46, 14, 'Tidak Bekerja/ IRT', 5),
(47, 14, 'Petani/Nelayan/Buruh', 4),
(48, 14, 'Wirausaha', 3),
(49, 14, 'Pegawai Swasta/Honorer', 2),
(50, 14, 'PNS/Polisi/TNI', 1),
(51, 13, 'Tidak Bekerja/RT', 5),
(52, 13, 'Petani/Nelayan/Buruh', 4),
(53, 13, 'Wirausaha', 3),
(54, 13, 'Pegawai Swasta/Honorer', 2),
(55, 13, 'PNS/Polisi/TNI', 1),
(56, 1, '>90', 5);

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
(100, '2014_10_12_000000_create_users_table', 1),
(101, '2014_10_12_100000_create_password_resets_table', 1),
(102, '2019_08_19_000000_create_failed_jobs_table', 1),
(103, '2020_04_21_065754_create_aspeks_table', 1),
(104, '2020_04_21_070622_create_bobots_table', 1),
(105, '2020_04_21_072931_create_kriterias_table', 1),
(106, '2020_04_21_075628_create_kriteria_details_table', 1),
(107, '2020_04_21_083426_create_gaps_table', 1),
(108, '2020_04_21_084039_create_projects_table', 1),
(109, '2020_04_21_084820_create_alternatifs_table', 1),
(110, '2020_04_21_090438_create_alternatif_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai_daftar` date NOT NULL,
  `tanggal_akhir_daftar` date NOT NULL,
  `tanggal_akhir_perubahan_profile` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `nama`, `keterangan`, `tanggal_mulai_daftar`, `tanggal_akhir_daftar`, `tanggal_akhir_perubahan_profile`, `created_at`, `updated_at`) VALUES
(4, 'Beasiswa Siswa Miskin', 'Beasiswa untuk siswa yaang kurang mampu', '2020-07-01', '2020-08-30', '2020-08-09', '2020-05-05 23:06:21', '2020-07-26 21:13:43'),
(7, 'Beasiswa Siswa Miskin 2021', 'Beasiswa Siswa Miskin 2021', '2020-06-04', '2020-11-04', '2020-06-14', '2020-08-04 02:17:40', '2020-08-04 02:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `aspek_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `project_id`, `aspek_id`) VALUES
(51, 4, 1),
(52, 4, 2),
(59, 7, 1),
(60, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Siswa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `password`, `foto`, `level`, `remember_token`) VALUES
(1, 'admin@gmail.com', 'Hallo Admin', '$2y$10$6FY/HIkagMQnqUk9Ov4a9uR4ptiJy8fSi72CRXtLgwMvI.84Z956q', 'foto/man-avatar-profile-round-icon_24640-14044.jpg', 'Admin', 'RAHUOQFJtKJs2kd16Baqd70TCbzrMtAWiVM3LR3el5EPgONbRoBeQ7UHUPmK'),
(2, 'user@gmail.com', 'sdfsdfsf', '$2y$10$zcelIn67Sq/Y54AW1iOzW.pMePh8Jtuatc7rUMvQHCmFbt3s1kLI.', 'foto/avatar.jpg', 'Siswa', NULL),
(3, 'pendaftar1@gmail.com', 'Pendaftar 1', '$2y$10$K2T9QUaRf4Val7Dl7nGnt.4.OmmLKvwsPBL5GyqtKe0RoW9m9Lpmu', '', 'Siswa', NULL),
(4, 'fagagdsgag@gmail.com', 'sfsdsgsgsg', '$2y$10$IwrqskMBhD4DmV1znQ2ftuW46k7Y5R.zZohXW.XmdQuNiWkI5LRSq', '', 'Siswa', NULL),
(5, 'Alkah Aqilansyah@gmail.com', 'Alkah Aqilansyah', '$2y$10$0.GFJlMhIbtxvdTJr4UOHe3SAnYnyfImqKUSFWR0ajc6pSlqquvte', '', 'Siswa', NULL),
(6, 'Alkah Aqilansyah@gmail.com', 'Alkah Aqilansyah', '$2y$10$JmdfXI.6HFDj3yOozecWUu9dv76SlmhHZCcSP22icT4c31OMkBMx2', '', 'Siswa', NULL),
(7, 'sdfsdfdsf@gmail.com', 'sdfsfdsgsg', '$2y$10$UKPYRDMB7OqenU86qcC7YucaxoNZwycv7KFTkE6FHeN3lKoQ4/9Z2', '', 'Siswa', NULL),
(8, 'AlkahAqilansyah@gmail.com', 'Alkah Aqilansyah', '$2y$10$JV8FdH.T9TUKAyegS6D3gu0WviLu3eIyEd7uy31snkRmCMId2mWhO', '', 'Siswa', NULL),
(9, 'AryaNaksyabandi@gmail.com', 'Arya Naksyabandi Hutagalung', '$2y$10$8HM2cCVHRYshHzqZTkFAZOd8bDwX.jPzrNAl.VYxn1crf2Inls4WS', '', 'Siswa', NULL),
(10, 'Hutagalung@gmail.com', 'Arya Naksyabandi Hutagalung', '$2y$10$0WWaKYzcgwU08wFEV3WY3uPdmYu5TXXAhJaJFxO9rFBTa7eQbOSxO', '', 'Siswa', NULL),
(11, 'Danie Almahdi@gmail.com', 'Daniel Almahdi Naptupulu', '$2y$10$gAjLPKAOnlbT25NiZqT5tOXWCympFdM/HVh73fOsE9IHQyvq5eEyW', '', 'Siswa', NULL),
(12, 'DianAyu @gmail.com', 'Dian Ayu Anggraini', '$2y$10$IYnrINUmfGxS6OB9vQ2jguwAkcUUUXmCA7ERjOcGmaVr0fue4Egea', '', 'Siswa', NULL),
(13, 'Dwi@gmail.com', 'Dwi Zaharnoningrum', '$2y$10$DgCsfM.YPHZV9Vu88hAsJOw.Ae3EvpeTfYD/uCIiWtjyRQFUdHqp.', '', 'Siswa', NULL),
(14, 'EkoPratama@gmail.com', 'Eko Pratama', '$2y$10$6dYMItPPc1UMENo21BheYehaOj2jwdxd9Q2bXIOvg9UCsSKjNUHj2', '', 'Siswa', NULL),
(15, 'FajarKurniawan@gmail.com', 'Fajar Kurniawan', '$2y$10$G7Dzjcw3Rdo/hE.W.k0PdO1Pptqv.X3dx68oSVvRHPmuD6NWPcixO', '', 'Siswa', NULL),
(16, 'FatimahAzahra@gmail.com', 'Fatimah Azahra', '$2y$10$SZN.Yv7r92HVVg/dhjMcB.UIAyhPazT0rCfXJkO0kxw7xNOXCj9V6', '', 'Siswa', NULL),
(17, 'HadiSaputra@gmail.com', 'Hadi Saputra', '$2y$10$tah0etIS0iy08H1s8lBUH.v68xn/PkCGvaiLieL/7OVIkXRrdVAr6', '', 'Siswa', NULL),
(18, 'ichaamelia@gmail.com', 'Icha Amelia', '$2y$10$j9XipxmKO.NMILiP4tjhA.YJgz1vUakLZJA3NiBhe/wKkfa7KIT8W', '', 'Siswa', NULL),
(19, 'ikhsanmaulana@gmail.com', 'Ikhsan Maulana', '$2y$10$L6WRoIECWWmnjxVT6C1noOTkymsFIV0zOghWFCzr4/tUIItLyi0m6', '', 'Siswa', NULL),
(20, 'Kartini123@gmail.com', 'Kartini', '$2y$10$vdMAiUU9QY44.ntRmThU4uNV2fliUk4X880jHTlFq1KZGZiIDz1em', '', 'Siswa', NULL),
(21, 'KrisnaWijay Kusuma@gmail.com', 'Krisna Wijaya Kusuma', '$2y$10$R8SpkYhHrFfcKTe2KgOLx.qCpW24id/PNVn27FeMs/8bnnuD7kZ6G', '', 'Siswa', NULL),
(22, 'LilisDianRahayu@gmail.com', 'Lilis Dian Rahayu', '$2y$10$F8JugPIiR8kCBBMBuvcdQeUFvrh7u2Dq38OhekobUDIlJX14OcFBm', '', 'Siswa', NULL),
(23, 'GilangPrasetyo@gmail.com', 'M Ade Gilang Prasetyo', '$2y$10$vQKjDDNqr6iPIoxrpuMFMuXUau6pKSBTtuZctnQJnrCdBXUcjSpPy', '', 'Siswa', NULL),
(24, 'DenyArdiansyah@gmail.com', 'M Deny Ardiansyah', '$2y$10$Du7/Ii8Bos/xc3zhAG6y/.xrm0kHG7LD.mq9f6rsNW3OvVr.bVR1W', '', 'Siswa', NULL),
(25, 'M.Rahmasyah@gmail.com', 'M.Rahmasyah', '$2y$10$3e2kZ0/0L72m7jlCXB2KtOnXllcFa4EdcH6o0Xcb3plq.o7/HZD2K', '', 'Siswa', NULL),
(26, 'Ramadhan@gmail.com', 'M Ramadhan', '$2y$10$4CCOySJWujR02rCptzr12u849xn5UV/EvC3enEdyXX/2e8I8Mj0cm', '', 'Siswa', NULL),
(27, 'Ramzy@gmail.com', 'M Ramzy Ramadhan', '$2y$10$.5DPXNXaIzgwUMJj5tqK/.MMR4Nx.72Ur8fprn4j9QJA2LUHMc98C', '', 'Siswa', NULL),
(28, 'Marsella@gmail.com', 'Marsella Alfitriani', '$2y$10$K6UQbU8fPFQsCIsdUipvFePEkkR2WWFJ4Cs.m661npRIuC39/taAq', '', 'Siswa', NULL),
(29, 'Miftahul@gmail,com', 'Miftahul Hidayah', '$2y$10$FCc333Q0sO6x/JJwaw/D8uhmEKLEh15FPMRqSwdmaeVDF7EMienzC', '', 'Siswa', NULL),
(30, 'Swiki@gmail.com', 'M Swiki Darmawan', '$2y$10$7J08r12JzYoLbsZBiLjwmeLp92EeLNfVCZuNZuqZOJ/nRTqCW49Bm', '', 'Siswa', NULL),
(31, 'MuhammadYusuf@gmail.com', 'Muhammad Yusuf', '$2y$10$I2YV78S7U9VNbO3yjKO43eZ9cMPygzjl642QCfjvpLPFGlGsDE3AW', '', 'Siswa', NULL),
(32, 'Nazzura@gmail.com', 'Nazzura Rihhadatul Jannah', '$2y$10$BLThF1T9Bq6/JhUwN5yJc.9apdlO8OV8Y6ZLE0ppHFykTV5Cjd.oa', '', 'Siswa', NULL),
(33, 'VickyRyandra@gmail.com', 'M Vicky Ryandra', '$2y$10$ZCyLYQ31vpmxSAYETk/iR.dcFPbnLJePkgvzV/W2rcGeyK54oc4bK', '', 'Siswa', NULL),
(34, 'MuhammadYusuf@gmail.com', 'Muhammad Yusuf', '$2y$10$ZeSYinmr/FgqZ3.1JUi0P.jnEIFkgvdCHuNqQqBU9Wvdckhcd6p0G', '', 'Siswa', NULL),
(35, 'ramdanriawan3@gmail.com', 'Ramdan Riawan', '$2y$10$rTyWnEm1bOR6Ew4h1wEeRudFXX0ng8uJ6R3xiN5Hk8JbDGI8dF.J.', '', 'Siswa', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatifs_nisn_unique` (`no_identitas`),
  ADD KEY `alternatifs_project_id_foreign` (`project_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `alternatif_details`
--
ALTER TABLE `alternatif_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_details_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `alternatif_details_kriteria_detail_id_foreign` (`kriteria_detail_id`);

--
-- Indexes for table `aspeks`
--
ALTER TABLE `aspeks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobots`
--
ALTER TABLE `bobots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaps`
--
ALTER TABLE `gaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelass`
--
ALTER TABLE `kelass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriterias_aspek_id_foreign` (`aspek_id`);

--
-- Indexes for table `kriteria_details`
--
ALTER TABLE `kriteria_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_details_kriteria_id_foreign` (`kriteria_id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aspek_ibfk_1` (`aspek_id`),
  ADD KEY `project_ibfk_2` (`project_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `alternatif_details`
--
ALTER TABLE `alternatif_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT for table `aspeks`
--
ALTER TABLE `aspeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bobots`
--
ALTER TABLE `bobots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaps`
--
ALTER TABLE `gaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelass`
--
ALTER TABLE `kelass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria_details`
--
ALTER TABLE `kriteria_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD CONSTRAINT `alternatifs_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatifs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatifs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `alternatif_details`
--
ALTER TABLE `alternatif_details`
  ADD CONSTRAINT `alternatif_details_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatif_details_kriteria_detail_id_foreign` FOREIGN KEY (`kriteria_detail_id`) REFERENCES `kriteria_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD CONSTRAINT `kriterias_aspek_id_foreign` FOREIGN KEY (`aspek_id`) REFERENCES `aspeks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kriteria_details`
--
ALTER TABLE `kriteria_details`
  ADD CONSTRAINT `kriteria_details_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_details`
--
ALTER TABLE `project_details`
  ADD CONSTRAINT `aspek_ibfk_1` FOREIGN KEY (`aspek_id`) REFERENCES `aspeks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
