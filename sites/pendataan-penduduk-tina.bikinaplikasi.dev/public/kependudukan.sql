-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 09:30 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kependudukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `keterangan`) VALUES
(3, 'Kristen'),
(4, 'Hindu'),
(7, 'Budha'),
(8, 'Konguchu'),
(9, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `foto`, `judul`, `keterangan`, `created_at`) VALUES
(10, 'pencegahan_covid19.jpg', 'pencegahan covid 19 ', 'tahun 2020 ini, di berbagai tempat di seluruh belahan dunia, terimbas oleh sebuah penyakit yang amat berbahaya jika tidak dilakukan pencegahan. penyakit yang belum di ketahui apa obat, penyakit ini bisa di sbut dengan corona/ covid 19. oleh sebab itu, di desa lubuk terentang saat ini dalam mencegah penularan penyakit tersebut, maka pihak desa dan penduduk setempat kompak untuk membuka posko, dimana posko itu untuksebagian relawan melakukan pengecekan pada penduduk luar yang ingin memasuki kawasan tersebut, dan ada sebagian lagi relawannya melakukan penyemprotan di setiap rumah yang ada di desa guna untuk meminimalisis akan penyakit tersebut.', '2020-07-21 08:07:12'),
(11, '', 'lomba melukis', 'dalam kesempatan ini, desa kota raja yang bekerja sama dengan pihak posyandu setempat mengadakan lomba melukis bagi anak anak di bawah umur 5 tahun. hal itu dilakukan agar anak - anak dapat memiliki waktu di masa kecil nya dalam mengikuti lomba lomba di desa dan untuk melatih kecerdasan seni anak, dan dapat memberikan anak anak semangat pada hal yang lebih positif. selain itu, pihak yang menyelenggarakan pun menyediakan beberapa hadiah bagi anak anak yang memiliki jiwa seni melukis dengan baik. walaupun ada beberapa anak anak tidak mendapatkan hadiah utama, tapi mereka sangat menikmati akan proses perlombaan yang di jalani nya.', '2020-07-21 08:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `keterangan`) VALUES
(15, 'pencegahan_covid191.jpg', 'pencegehan covid 19'),
(16, 'Ibu_ibu_pkk.jpg', 'ibu ibu pkk'),
(17, 'musyawah_desa.jpg', 'musyawarah desa'),
(18, 'lomba_melukis1.jpg', 'lomba melukis anak-anak'),
(19, 'kantor_desa.jpg', 'kantor desa lubuk terentang'),
(20, 'musyawarah.jpg', 'musyawarah');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id` int(11) NOT NULL,
  `nik_kepala_keluarga` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `hubungan_keluarga` enum('Istri','Anak','Kepala Keluarga') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id`, `nik_kepala_keluarga`, `nik`, `hubungan_keluarga`) VALUES
(34, '3509264205780004', '3502202403150002', 'Kepala Keluarga'),
(35, '7403030405790001', '7403032001110001', 'Kepala Keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `lurah`
--

CREATE TABLE `lurah` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lurah`
--

INSERT INTO `lurah` (`id`, `keterangan`) VALUES
(7, 'Muara Sabak Timur'),
(8, 'Kota Raja'),
(9, 'prt cacok');

-- --------------------------------------------------------

--
-- Table structure for table `panduanlayanan`
--

CREATE TABLE `panduanlayanan` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panduanlayanan`
--

INSERT INTO `panduanlayanan` (`id`, `judul`, `keterangan`) VALUES
(3, 'penduduk lahir', ' penduduk yang baru lahir wajib untuk di data di kantor desa yang bersangkutan. maka dari itu, pihak orangtua harus memberikan tanda bukti berisi pernyataan yang teramat sangat penting dan diperlukan guna mengatur dan menyimpan bahan keterangan tentang kelahiran seorang bayi dalam bentuk selembar kertas.\r\n\r\nSyarat :\r\n\r\n1. Copy Akta Perkawinan orang tua\r\n\r\n3. Copy KK dan KTP orang tua \r\n\r\n4. Formulir isian'),
(4, 'penduduk meninggal', 'Setiap ada penduduk meninggal wajib melaporkan oleh pihak keluarga yang bersangkutan dengan si penduduk meninggal kepada pelaksana setempat di kantor desa lubuk terentang. Pencatatan kependudukan meninggal  didasarkan pada keterangan kematian dari pihak yang berwenang atau Desa/Kelurahan.                 \r\n\r\nSyarat :\r\n\r\n1. KK asli\r\n\r\n2. Copy KK\r\n\r\n3. Copy KTP Pelapor\r\n\r\n4. Formulir isian Permohonan '),
(7, 'penduduk pindah', 'penduduk yang ingin pindah dari desa harus melaporkan pada pihak kantor desa setempat, guna untuk mendata kepindahan.\r\nSyarat :\r\n\r\n1. KK asli\r\n\r\n2. Surat Pengantar '),
(8, 'penduduk datang', 'penduduk yang ingin datang dari desa sebelumnya harus melaporkan pada pihak kantor desa setempat, guna untuk mendata kedatangan.\r\nSyarat :\r\n\r\n1. KK asli\r\n\r\n2. Surat Pengantar ');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `keterangan`) VALUES
(8, 'Petani / Pekebun'),
(10, 'Guru Honorer'),
(11, 'Pedagang'),
(12, 'Mengurus rumah tangga'),
(13, 'Karyawan Swasta'),
(14, 'Belum/ Tidak Bekerja'),
(15, 'Pelajar/Mahasiswa'),
(16, 'SD Sederajat'),
(17, 'Tidak Sekolah'),
(19, 'wiraswasta');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `keterangan`) VALUES
(9, 'Diploma IV/ Stara 1'),
(10, 'Akademi / Diploma III'),
(11, 'SLTA / Sederajat'),
(12, 'SLTP / Sederajat'),
(13, 'TAMAT SD / Sederajat'),
(14, 'TIDAK / Belum Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` tinyint(4) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Kawin','Belum Kawin','Cerai Hidup','Cerai Mati') NOT NULL,
  `hubungan_keluarga` varchar(20) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `lurah` varchar(50) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `golongan_darah` enum('A','B','AB','O','A+','A-','B+','B-','AB+','AB-','O+','0-','TIDAK TAHU') NOT NULL,
  `desa` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `no_kk`, `nama_lengkap`, `alamat`, `rt`, `rw`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `agama`, `pendidikan`, `pekerjaan`, `status`, `hubungan_keluarga`, `dusun`, `lurah`, `kecamatan`, `kabupaten`, `provinsi`, `negara`, `golongan_darah`, `desa`, `created_at`) VALUES
('1472011610760001', '1472013103100001', 'SAMSUDEN', 'Kota Raja', '04', 4, 'Laki - Laki', 'RIAU', '1976-10-16', '081276880621', 'Islam', 'SD Sederajat', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', '04', 'prt cacok', 'Muara Sabak Timur', 'Tanjung Jabung Timur', 'Jambi', 'Indonesia', 'TIDAK TAHU', 'Kota Raja', '2021-08-30 06:11:46'),
('1571020603900101', '1571022806110008', 'KAMARUDIN', 'Kota Raja', 'RT 01', 1, 'Laki - Laki', 'KOTA RAJA', '1990-03-06', '081276806621', 'Islam', 'Tidak Sekolah', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', '2', 'prt cacok', 'Muara Sabak Timur', 'Tanjung Jabung Timur', 'Jambi', 'Indonesia', 'TIDAK TAHU', 'Kota Raja', '2021-08-29 23:06:09'),
('3502200907870005', '3502202403150002', 'SUGIONO', 'Kota Raja', '03', 3, 'Laki - Laki', 'JAMBI', '1987-07-09', '087824435524', 'Islam', 'SD Sederajat', 'wiraswasta', 'Kawin', 'Kepala Keluarga', '3', 'prt cacok', 'Muara Sabak Timur', 'Tanjung Jabung Timur', 'Jambi', 'Indonesia', 'TIDAK TAHU', 'Kota Raja', '2021-08-30 05:45:09'),
('3509264205780004', '3502202403150002', 'MARTINAH', 'Kota Raja', '03', 3, 'Perempuan', 'Ponorogo', '1978-05-02', '087824435524', 'Islam', 'Tidak Sekolah', 'Mengurus rumah tangga', 'Kawin', 'Istri', '3', 'prt cacok', 'Muara Sabak Timur', 'Tanjung Jabung Timur', 'Jambi', 'Indonesia', 'TIDAK TAHU', 'Kota Raja', '2021-08-29 23:14:55'),
('7403030405790001', '7403032001110001', 'ABRES HIDAYANTO', 'Kota Raja', '02', 2, 'Laki - Laki', 'KOTA RAJA', '1979-05-04', '082397668022', 'Islam', 'SD Sederajat', 'wiraswasta', 'Kawin', 'Kepala Keluarga', '2', 'prt cacok', 'Muara Sabak Timur', 'Tanjung Jabung Timur', 'Jambi', 'Indonesia', 'TIDAK TAHU', 'Kota Raja', '2021-08-29 23:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `pendudukdatang`
--

CREATE TABLE `pendudukdatang` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `desa_asal` varchar(30) NOT NULL,
  `kecamatan_asal` varchar(30) NOT NULL,
  `alamat_asal` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `rt_asal` varchar(10) NOT NULL,
  `rw_asal` tinyint(4) NOT NULL,
  `kode_pos_asal` int(6) NOT NULL,
  `no_telepon_asal` varchar(20) NOT NULL,
  `kabupaten_asal` varchar(30) NOT NULL,
  `provinsi_asal` int(30) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendudukdatang`
--

INSERT INTO `pendudukdatang` (`id`, `nik`, `tanggal`, `desa_asal`, `kecamatan_asal`, `alamat_asal`, `created_at`, `rt_asal`, `rw_asal`, `kode_pos_asal`, `no_telepon_asal`, `kabupaten_asal`, `provinsi_asal`, `alasan`, `dusun`, `rt`, `jenis_kelamin`) VALUES
(1, '1506031234512345', '2018-02-13', 'sungai gebar', 'mekar jaya', 'suak labu', '2020-07-21 06:59:13', '03', 1, 36555, '085266944323', 'tanjung jabung barat', 0, 'sadadasd', 'sdgsd', 'sds', 'Laki - Laki'),
(2, '1506039876598765', '2018-02-13', 'sungai gebar', 'mekar jaya', 'suak labu', '2020-07-21 07:00:28', '03', 1, 36555, '085266944323', 'tanjung jabung barat', 0, 'kerja', '', '', NULL),
(3, '1506046502010001', '2011-02-10', 'terjun gajah', 'betara', 'terjun baru', '2020-08-03 05:44:47', '01', 1, 36555, '085345765418', 'tanjung jabung barat', 0, 'ikut suami kerja', 'simpang camat', '04', 'Perempuan'),
(4, '1506044610800002', '2011-02-07', 'terjun gajah', 'betara', 'terjun baru', '2020-08-03 05:47:16', '01', 1, 36555, '085345765418', 'tanjung jabung barat', 0, 'ikut ayah pindah kerja', 'simpang camat', '04', 'Perempuan'),
(5, '1506042303060001', '2011-02-07', 'terjun gajah', 'betara', 'terjun baru', '2020-08-03 05:48:42', '01', 1, 36555, '085345765418', 'tanjung jabung barat', 0, 'ikut ayah pindah kerja', 'simpang camat', '04', 'Laki - Laki'),
(8, '3207071705010001', '2001-05-17', 'dusun gunung mas', 'sungai gelam', 'jambi', '2021-08-20 09:41:07', '07', 4, 36366, '082387651819', 'muaro jambi', 0, 'pindah', 'makmur bahagia', '07', 'Perempuan'),
(9, '1505066912640003', '2018-02-06', 'Bengkulu', 'Bahari', 'Bahari', '2021-08-20 10:26:04', '05', 3, 38113, '082376839022', 'Bengkulu', 0, 'pindah', '4', '4', 'Perempuan'),
(10, '3207074612960002', '2010-02-11', 'Simbur Naik', 'Sabak Timur', 'Simbur Naik', '2021-08-26 07:01:21', '05', 1, 36561, '087792318076', 'Tanjung Jabung Timur', 0, 'Keluarga', 'Prt Cacok', '02', 'Laki - Laki'),
(11, '7403030405790001', '2016-02-02', 'Simbur Naik', 'Sabak Timur', 'Simbur Naik', '2021-08-30 05:52:26', '02', 2, 36561, '081276895587', 'Tanjung Jabung Timur', 0, 'Keluarga', '02', '02', 'Laki - Laki');

-- --------------------------------------------------------

--
-- Table structure for table `penduduklahir`
--

CREATE TABLE `penduduklahir` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_saksi` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `tempat_kelahiran` varchar(50) NOT NULL,
  `hari_kelahiran` varchar(10) NOT NULL,
  `tanggal_kelahiran` date NOT NULL,
  `jam_kelahiran` varchar(10) NOT NULL,
  `jenis_kelahiran` enum('Tunggal','kembar') NOT NULL,
  `anak_ke` tinyint(2) NOT NULL,
  `berat_bayi` tinyint(4) NOT NULL,
  `panjang_bayi` tinyint(4) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` tinyint(4) NOT NULL,
  `surat_keterangan_lahir` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendudukmeninggal`
--

CREATE TABLE `pendudukmeninggal` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(30) NOT NULL,
  `penyebab_meninggal` text NOT NULL,
  `hari_meninggal_dunia` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_meninggal_dunia` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendudukmeninggal`
--

INSERT INTO `pendudukmeninggal` (`id`, `nik`, `tanggal_meninggal`, `tempat_meninggal`, `penyebab_meninggal`, `hari_meninggal_dunia`, `jam_meninggal_dunia`, `created_at`) VALUES
(6, '1472011610760001', '2016-02-02', 'Kota Raja', 'Kecelakaan', 'Senin', '14:54', '2021-08-30 09:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `pendudukmiskin`
--

CREATE TABLE `pendudukmiskin` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(30) NOT NULL,
  `penyebab_meninggal` text NOT NULL,
  `hari_meninggal_dunia` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_meninggal_dunia` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendudukmiskin`
--

INSERT INTO `pendudukmiskin` (`id`, `nik`, `tanggal_meninggal`, `tempat_meninggal`, `penyebab_meninggal`, `hari_meninggal_dunia`, `jam_meninggal_dunia`, `created_at`) VALUES
(6, '1472011610760001', '0000-00-00', '', '', 'Senin', '', '2021-08-30 06:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `pendudukpindah`
--

CREATE TABLE `pendudukpindah` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alasan_pindah` varchar(50) NOT NULL,
  `alamat_tujuan_pindah` varchar(255) NOT NULL,
  `rt_tujuan_pindah` tinyint(4) NOT NULL,
  `rw_tujuan_pindah` tinyint(4) NOT NULL,
  `desa_tujuan_pindah` varchar(50) NOT NULL,
  `kode_pos_tujuan_pindah` mediumint(6) NOT NULL,
  `no_telepon_tujuan_pindah` varchar(15) NOT NULL,
  `kecamatan_tujuan_pindah` varchar(50) NOT NULL,
  `kabupaten_tujuan_pindah` varchar(50) NOT NULL,
  `provinsi_tujuan_pindah` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendudukpindah`
--

INSERT INTO `pendudukpindah` (`id`, `nik`, `alasan_pindah`, `alamat_tujuan_pindah`, `rt_tujuan_pindah`, `rw_tujuan_pindah`, `desa_tujuan_pindah`, `kode_pos_tujuan_pindah`, `no_telepon_tujuan_pindah`, `kecamatan_tujuan_pindah`, `kabupaten_tujuan_pindah`, `provinsi_tujuan_pindah`, `created_at`) VALUES
(7, '7403030405790001', 'PEKERJAAN', 'KOTA RAJA PRT CACUK', 2, 2, 'KOTA RAJA', 36561, '082378946686', 'Muara Sabak Timur', 'Tanjung Jabung Timur', 'Jambi', '2021-08-29 23:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `penduduktetap`
--

CREATE TABLE `penduduktetap` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduktetap`
--

INSERT INTO `penduduktetap` (`id`, `nik`, `created_at`) VALUES
(30, '1571020603900101', '2021-08-30 04:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `profiledesa`
--

CREATE TABLE `profiledesa` (
  `id` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `struktur_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiledesa`
--

INSERT INTO `profiledesa` (`id`, `sejarah`, `visi`, `misi`, `struktur_desa`) VALUES
(1, 'Desa Lubuk Terentang  terbentuk berdasarkan Peraturan Daerah Kabupaten Tanjung Jabung Barat Nomor 16 Tahun 2011 tentang Pembentukan Desa Terjun Gajah, Desa Lubuk Terentang, Desa Pematang Buluh, Desa Muntialo, Desa Teluk Kulbi, Desa Bunga Tanjung, Desa Sungai Terap dan Desa Mandala Jaya Kecamatan Betara, dan diresmikan pada tanggal 26 Agustus 2011.\r\nPemberian nama Lubuk Terentang berdasarkan dari hasil Musyawarah Tokoh-tokoh masyarakat seperti : Tokoh Agama, Tokoh Masyarakat, Tokoh Pemuda, Tokoh wanita dan unsur Pemerintahan Kecamatan Betara dan Pemerintahan Desa Pematang Lumut ( sebelum pemekaran Desa Lubuk Terentang) yang bertempat di Masjid Sabilal Muhtadin. Nama Lubuk terentang diambil dari kata:\r\nLubuk : bagian terdalam dari sungai\r\nTerentang : Merupakan nama kayu ( Kayu terentang )\r\n', '“Terwujudnya Masyarakat Desa Lubuk Terentang Yang Mandiri, Aman, Nyaman, Tertib, Asri dan Peduli”', '1.	Meningkatkan Tata kelola pemerintahan desa berdasarkan transparansi, berkeadilan, dan mengutamakan pelayanan masyarakat. <br>\r\n2.	Melaksanakan pembangunan desa secara merata, terencana, dan berkelanjutan <br>\r\n3.	Meningkatkan kesejahteraan masyarakat melalui Badan Usaha Milik Desa (BUMDES) dan mengembangkan potensi yang di Desa <br>\r\n4.	Melaksanakan pembinaan dan pengembangan kepada kelompok pengajian, yasinan, PKK, Kelompok Tani, Karang Taruna, pemuda dan Olahraga <br>\r\n5.	Melakukan control terhadap penyaluran tenaga kerja agar transparan adil dan merata <br>\r\n6.	Melaksanakan Pembinaan kepada masyarakat terhadap pentingnya kebersihan lingkungan <br>\r\n7.	Meningkatkan kemandirian masyarakat di bidang pertanian, perikanan, perkebunan dan Usaha Kecil Menengah (UKM) <br>\r\n8.	Melakukan pelatihan-pelatihan sesuai kebutuhan masyarakat\r\n\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id` int(11) NOT NULL,
  `nama_rt` varchar(10) NOT NULL,
  `ketua_rt` varchar(50) NOT NULL,
  `dusun` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id`, `nama_rt`, `ketua_rt`, `dusun`) VALUES
(22, '04', 'JAFAR', '4'),
(24, '03', 'KAMARUDUN', '03'),
(25, '02', 'MARZUKI', '02'),
(26, '01', 'RUDI', '01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('kepaladesa', 'dabacc3bca86c8e5120e33bc112363b6', 'Kepala Desa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lurah`
--
ALTER TABLE `lurah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panduanlayanan`
--
ALTER TABLE `panduanlayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pendudukdatang`
--
ALTER TABLE `pendudukdatang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`nik`);

--
-- Indexes for table `penduduklahir`
--
ALTER TABLE `penduduklahir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendudukmeninggal`
--
ALTER TABLE `pendudukmeninggal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`nik`);

--
-- Indexes for table `pendudukmiskin`
--
ALTER TABLE `pendudukmiskin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`nik`);

--
-- Indexes for table `pendudukpindah`
--
ALTER TABLE `pendudukpindah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`nik`);

--
-- Indexes for table `penduduktetap`
--
ALTER TABLE `penduduktetap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `profiledesa`
--
ALTER TABLE `profiledesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `lurah`
--
ALTER TABLE `lurah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `panduanlayanan`
--
ALTER TABLE `panduanlayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pendudukdatang`
--
ALTER TABLE `pendudukdatang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penduduklahir`
--
ALTER TABLE `penduduklahir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendudukmeninggal`
--
ALTER TABLE `pendudukmeninggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendudukmiskin`
--
ALTER TABLE `pendudukmiskin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendudukpindah`
--
ALTER TABLE `pendudukpindah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penduduktetap`
--
ALTER TABLE `penduduktetap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `profiledesa`
--
ALTER TABLE `profiledesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendudukmeninggal`
--
ALTER TABLE `pendudukmeninggal`
  ADD CONSTRAINT `pendudukmeninggal_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendudukmiskin`
--
ALTER TABLE `pendudukmiskin`
  ADD CONSTRAINT `pendudukmiskin_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendudukpindah`
--
ALTER TABLE `pendudukpindah`
  ADD CONSTRAINT `pendudukpindah_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penduduktetap`
--
ALTER TABLE `penduduktetap`
  ADD CONSTRAINT `penduduktetap_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
