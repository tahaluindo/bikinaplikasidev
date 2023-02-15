-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: nnmeqdrilkem9ked.cbetxkdyhwsb.us-east-1.rds.amazonaws.com
-- Generation Time: Aug 17, 2020 at 09:54 AM
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
-- Database: `bppl6w4fw2q666as`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataagama`
--

CREATE TABLE `dataagama` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataagama`
--

INSERT INTO `dataagama` (`id`, `keterangan`) VALUES
(3, 'Kristen'),
(4, 'Hindu'),
(7, 'Budha'),
(8, 'Konguchu'),
(9, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `databerita`
--

CREATE TABLE `databerita` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databerita`
--

INSERT INTO `databerita` (`id`, `foto`, `judul`, `keterangan`, `created_at`) VALUES
(10, 'pencegahan_covid19.jpg', 'pencegahan covid 19 ', 'tahun 2020 ini, di berbagai tempat di seluruh belahan dunia, terimbas oleh sebuah penyakit yang amat berbahaya jika tidak dilakukan pencegahan. penyakit yang belum di ketahui apa obat, penyakit ini bisa di sbut dengan corona/ covid 19. oleh sebab itu, di desa lubuk terentang saat ini dalam mencegah penularan penyakit tersebut, maka pihak desa dan penduduk setempat kompak untuk membuka posko, dimana posko itu untuksebagian relawan melakukan pengecekan pada penduduk luar yang ingin memasuki kawasan tersebut, dan ada sebagian lagi relawannya melakukan penyemprotan di setiap rumah yang ada di desa guna untuk meminimalisis akan penyakit tersebut.', '2020-07-21 08:07:12'),
(11, 'lomba_melukis.jpg', 'lomba melukis', 'dalam kesempatan ini, desa lubuk terenntang yang bekerja sama dengan pihak posyandu setempat mengadakan lomba melukis bagi anak anak di bawah umur 5 tahun. hal itu dilakukan agar anak - anak dapat memiliki waktu di masa kecil nya dalam mengikuti lomba lomba di desa dan untuk melatih kecerdasan seni anak, dan dapat memberikan anak anak semangat pada hal yang lebih positif. selain itu, pihak yang menyelenggarakan pun menyediakan beberapa hadiah bagi anak anak yang memiliki jiwa seni melukis dengan baik. walaupun ada beberapa anak anak tidak mendapatkan hadiah utama, tapi mereka sangat menikmati akan proses perlombaan yang di jalani nya.', '2020-07-21 08:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `datagaleri`
--

CREATE TABLE `datagaleri` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datagaleri`
--

INSERT INTO `datagaleri` (`id`, `foto`, `keterangan`) VALUES
(15, 'pencegahan_covid191.jpg', 'pencegehan covid 19'),
(16, 'Ibu_ibu_pkk.jpg', 'ibu ibu pkk'),
(17, 'musyawah_desa.jpg', 'musyawarah desa'),
(18, 'lomba_melukis1.jpg', 'lomba melukis anak-anak'),
(19, 'kantor_desa.jpg', 'kantor desa lubuk terentang'),
(20, 'musyawarah.jpg', 'musyawarah');

-- --------------------------------------------------------

--
-- Table structure for table `datakk`
--

CREATE TABLE `datakk` (
  `id` int(11) NOT NULL,
  `nik_kepala_keluarga` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `hubungan_keluarga` enum('Istri','Anak','Kepala Keluarga') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datakk`
--

INSERT INTO `datakk` (`id`, `nik_kepala_keluarga`, `nik`, `hubungan_keluarga`) VALUES
(6, '1506043112550004', '1506043112550004', 'Kepala Keluarga'),
(9, '1505063012520004', '1505063012520004', 'Kepala Keluarga'),
(12, '1506041607070002', '1506041607070002', 'Kepala Keluarga'),
(13, '1506040105520002', '1506040105520002', 'Kepala Keluarga'),
(14, '1506040508850004', '1506040508850004', 'Kepala Keluarga'),
(15, '1506031234512345', '1506031234512345', 'Kepala Keluarga'),
(16, '1506041301960001', '1506041301960001', 'Kepala Keluarga'),
(17, '1506042908820001', '1506042908820001', 'Kepala Keluarga'),
(18, '1506043105620001', '1506043105620001', 'Kepala Keluarga'),
(19, '1506043192894298', '1506043192894298', 'Kepala Keluarga'),
(20, '1271042405730005', '1271042405730005', 'Kepala Keluarga'),
(21, '1506020301860002', '1506020301860002', 'Kepala Keluarga'),
(22, '1506040505910001', '1506040505910001', 'Kepala Keluarga'),
(23, '1506041102770002', '1506041102770002', 'Kepala Keluarga'),
(24, '1506041212730001', '1506041212730001', 'Kepala Keluarga'),
(25, '1506042512870001', '1506042512870001', 'Kepala Keluarga'),
(26, '1506043108810002', '1506043108810002', 'Kepala Keluarga'),
(27, '1506043112590012', '1506043112590012', 'Kepala Keluarga'),
(28, '1506044305760005', '1506044305760005', 'Kepala Keluarga'),
(29, '1506040511770003', '1506040511770003', 'Kepala Keluarga'),
(30, '1506040704939004', '1506040704939004', 'Kepala Keluarga'),
(31, '1506040708760004', '1506040708760004', 'Kepala Keluarga'),
(32, '1506042006920001', '1506042006920001', 'Kepala Keluarga'),
(33, '1506041007790002', '1506041007790002', 'Kepala Keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `datalurah`
--

CREATE TABLE `datalurah` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datalurah`
--

INSERT INTO `datalurah` (`id`, `keterangan`) VALUES
(5, 'lubuk terentang');

-- --------------------------------------------------------

--
-- Table structure for table `datapanduanlayanan`
--

CREATE TABLE `datapanduanlayanan` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapanduanlayanan`
--

INSERT INTO `datapanduanlayanan` (`id`, `judul`, `keterangan`) VALUES
(3, 'penduduk lahir', ' penduduk yang baru lahir wajib untuk di data di kantor desa yang bersangkutan. maka dari itu, pihak orangtua harus memberikan tanda bukti berisi pernyataan yang teramat sangat penting dan diperlukan guna mengatur dan menyimpan bahan keterangan tentang kelahiran seorang bayi dalam bentuk selembar kertas.\r\n\r\nSyarat :\r\n\r\n1. Copy Akta Perkawinan orang tua\r\n\r\n3. Copy KK dan KTP orang tua \r\n\r\n4. Formulir isian'),
(4, 'penduduk meninggal', 'Setiap ada penduduk meninggal wajib melaporkan oleh pihak keluarga yang bersangkutan dengan si penduduk meninggal kepada pelaksana setempat di kantor desa lubuk terentang. Pencatatan kependudukan meninggal  didasarkan pada keterangan kematian dari pihak yang berwenang atau Desa/Kelurahan.                 \r\n\r\nSyarat :\r\n\r\n1. KK asli\r\n\r\n2. Copy KK\r\n\r\n3. Copy KTP Pelapor\r\n\r\n4. Formulir isian Permohonan '),
(7, 'penduduk pindah', 'penduduk yang ingin pindah dari desa harus melaporkan pada pihak kantor desa setempat, guna untuk mendata kepindahan.\r\nSyarat :\r\n\r\n1. KK asli\r\n\r\n2. Surat Pengantar '),
(8, 'penduduk datang', 'penduduk yang ingin datang dari desa sebelumnya harus melaporkan pada pihak kantor desa setempat, guna untuk mendata kedatangan.\r\nSyarat :\r\n\r\n1. KK asli\r\n\r\n2. Surat Pengantar ');

-- --------------------------------------------------------

--
-- Table structure for table `datapekerjaan`
--

CREATE TABLE `datapekerjaan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapekerjaan`
--

INSERT INTO `datapekerjaan` (`id`, `keterangan`) VALUES
(7, 'wiraswasta'),
(8, 'Petani / Pekebun'),
(9, 'PNS'),
(10, 'Guru Honorer'),
(11, 'Pedagang'),
(12, 'Mengurus rumah tangga'),
(13, 'Karyawan Swasta'),
(14, 'Belum/ Tidak Bekerja'),
(15, 'Pelajar/Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `datapendidikan`
--

CREATE TABLE `datapendidikan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapendidikan`
--

INSERT INTO `datapendidikan` (`id`, `keterangan`) VALUES
(9, 'Diploma IV/ Stara 1'),
(10, 'Akademi / Diploma III'),
(11, 'SLTA / Sederajat'),
(12, 'SLTP / Sederajat'),
(13, 'TAMAT SD / Sederajat'),
(14, 'TIDAK / Belum Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `datapenduduk`
--

CREATE TABLE `datapenduduk` (
  `nik` varchar(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `rw` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `tempat_lahir` text,
  `tanggal_lahir` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapenduduk`
--

INSERT INTO `datapenduduk` (`nik`, `no_kk`, `nama_lengkap`, `alamat`, `rt`, `rw`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `agama`, `pendidikan`, `pekerjaan`, `status`, `hubungan_keluarga`, `dusun`, `lurah`, `kecamatan`, `kabupaten`, `provinsi`, `negara`, `golongan_darah`, `desa`, `created_at`) VALUES
('1206186508720001', '1506040203160002', 'Eni Nadeak', 'dusun simpang camat', 'RT 09', 1, 'Perempuan', 'Pematang Kerasahan', '1973-08-16', '082345761876', 'Kristen', 'SLTA / Sederajat', 'wiraswasta', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 04:43:08'),
('1271042405730005', '1506040203160002', 'Parulian Marbun', 'dusun simpang camat', 'RT 09', 1, 'Laki - Laki', 'Marihat', '1973-05-24', '082345761876', 'Kristen', 'SLTA / Sederajat', 'wiraswasta', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A-', 'lubuk terentang', '2020-07-28 04:40:39'),
('1504014905930002', '1506042302160003', 'Hernawati', 'dusun kampung baru', 'RT 03', 1, 'Perempuan', 'Pulai Kijang', '1993-05-09', '087721345413', 'Islam', 'SLTP / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-30 05:49:53'),
('1505063012520004', '1505062703120001', 'suhadi', 'dusun kampung baru', 'RT 03', 1, 'Laki - Laki', 'jambi', '1952-12-30', '085266800680', 'Kristen', 'SLTA / Sederajat', 'wiraswasta', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-21 05:55:27'),
('1505066912640003', '1505062703120001', 'zainab', 'dusun kampung baru', 'RT 03', 1, 'Perempuan', 'jambi', '1954-12-29', '085266800680', 'Islam', 'TIDAK / Belum Sekolah', 'Pelajar/Mahasiswa', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-21 05:47:46'),
('1506020301860002', '1506041109120006', 'Ahmad Taher', 'dusun gunung mas', 'RT 07', 1, 'Laki - Laki', 'Senyerang', '1986-01-03', '085245765434', 'Islam', 'TAMAT SD / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B-', 'lubuk terentang', '2020-07-28 03:38:56'),
('1506022610090001', '1506041109120006', 'Saputra', 'dusun gunung mas', 'RT 07', 1, 'Laki - Laki', 'Kuala Tungkal', '2009-10-26', '085245765434', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-28 03:56:50'),
('1506025502910009', '1506041109120006', 'Titin Sumiati Nur Cahaya R.M', 'dusun gunung mas', 'RT 07', 1, 'Perempuan', 'Parit Pudin', '1991-02-15', '085245765434', 'Islam', 'SLTP / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-28 03:43:23'),
('1506031234512345', '1506035432154321', 'ikhsan', 'dusun kampung baru', 'RT 02', 1, 'Laki - Laki', 'suak labu', '1987-12-02', '085266944323', 'Islam', 'SLTA / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B-', 'lubuk terentang', '2020-07-21 06:50:35'),
('1506034907910001', '1506042011140002', 'Aisah', 'dusun simpang camat', 'RT 05', 1, 'Perempuan', 'Parit Pudin', '1991-07-09', '085276982702', 'Islam', 'SLTA / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 05:27:14'),
('1506040105520002', '1506040503083208', 'Ahmad jailani', 'dusun kampung baru', 'RT 01', 1, 'Laki - Laki', 'pematang lumut', '1962-05-01', '085219872654', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-26 23:40:21'),
('1506040207150001', '1506040110150003', 'Ramadhani', 'dusun simpang camat', 'RT 05', 1, 'Laki - Laki', 'Tanjung Jabung Barat ', '2015-07-02', '082281458327', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-30 06:20:04'),
('1506040311990004', '1506042002140002', 'M. saparudin', 'Jl. bukit senyum', 'RT 08', 1, 'Laki - Laki', 'pematang lumut', '1999-11-03', '082345763412', 'Islam', 'TAMAT SD / Sederajat', 'Pelajar/Mahasiswa', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 04:30:32'),
('1506040505910001', '1506041209130005', 'Sudardi', 'dusun kampung baru', 'RT 03', 1, 'Laki - Laki', 'jambi', '1991-05-05', '087719871798', 'Islam', 'SLTA / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-28 05:04:56'),
('1506040508850004', '1506041603150001', 'M. Nasir', 'dusun kampung baru', 'RT 02', 1, 'Laki - Laki', 'Mendahara tengah', '1965-06-05', '082316864598', 'Islam', 'SLTA / Sederajat', 'wiraswasta', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-27 01:31:34'),
('1506040511770003', '1506041712110004', 'Sukani', 'dusun simpang camat', 'RT 09', 1, 'Laki - Laki', 'Lampung', '1977-11-05', '082313654576', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-30 04:35:04'),
('1506040704939004', '1506042302160003', 'Very', 'dusun kampung baru', 'RT 03', 1, 'Laki - Laki', 'Pulai Kijang', '1993-04-07', '087721345413', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A+', 'lubuk terentang', '2020-07-30 05:45:53'),
('1506040708760004', '1506041806190002', 'Sulanji', 'dusun kampung baru', 'RT 03', 1, 'Laki - Laki', 'Jawa timur', '1976-08-07', '085245651098', 'Islam', 'TAMAT SD / Sederajat', 'wiraswasta', 'Belum Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-30 05:42:19'),
('1506041007790002', '1506040503085232', 'Iskandar', 'dusun simpang camat', 'RT 04', 1, 'Laki - Laki', 'Teluk Nilau', '1978-07-10', '085279651998', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-30 05:56:48'),
('1506041102770002', '1506042002140002', 'Kaspul anwar', 'Jl. bukit senyum', 'RT 08', 1, 'Laki - Laki', 'Kuala Tungkal', '1977-02-11', '082345763412', 'Islam', 'TAMAT SD / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-28 04:09:30'),
('1506041212730001', '1506042011140002', 'Syafrudin', 'dusun simpang camat', 'RT 05', 1, 'Laki - Laki', 'Parit Pudin', '1973-12-12', '085276982702', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 05:25:02'),
('1506041301960001', '1506040508160005', 'M. Nasir', 'dusun simpang camat', 'RT 04', 1, 'Laki - Laki', 'pematang lumut', '1996-01-13', '085432187618', 'Islam', 'SLTP / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-27 01:59:47'),
('1506041607070002', '1506040503083216', 'Amprawansyah', 'dusun kampung baru', 'RT 01', 1, 'Laki - Laki', 'jambi', '1967-07-16', '085234189756', 'Islam', 'SLTA / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-26 23:29:35'),
('1506041607670002', '1506040503083216', 'susi', 'dusun kampung baru', 'RT 01', 1, 'Perempuan', 'pematang lumut', '1979-09-18', '085313873486', 'Islam', 'SLTP / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-26 23:59:21'),
('1506041803850006', '1506040503083183', 'mardi', 'dusun kampung baru', 'RT 01', 1, 'Laki - Laki', 'pematang lumut', '1985-03-18', '085366507260', 'Islam', 'SLTA / Sederajat', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-21 06:06:34'),
('1506041908910001', '1506041209130005', 'Jayanti', 'dusun kampung baru', 'RT 03', 1, 'Perempuan', 'pematang lumut', '1991-06-19', '087719871798', 'Islam', 'SLTA / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 05:07:11'),
('1506042006920001', '1506040110150003', 'Lingga Warman', 'dusun simpang camat', 'RT 05', 1, 'Laki - Laki', 'Sumut', '1992-05-20', '082281458327', 'Islam', 'SLTA / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A-', 'lubuk terentang', '2020-07-30 06:13:25'),
('1506042106150001', '1506041603150001', 'Ahmad Faris Maulana', 'dusun kampung baru', 'RT 02', 1, 'Laki - Laki', 'Tajung Jabung Barat', '2015-06-21', '085321345673', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-27 01:42:17'),
('1506042106990002', '1506040503083216', 'nanda saputra', 'dusun kampung baru', 'RT 01', 1, 'Laki - Laki', 'pematang lumut', '1999-08-21', '085234987656', 'Islam', 'SLTA / Sederajat', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-27 00:38:49'),
('1506042303060001', '1506040503085232', 'M. Rio Agana', 'dusun simpang camat', 'RT 04', 1, 'Laki - Laki', 'Teluk Nilau', '2006-03-23', '085279651998', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-30 06:04:55'),
('1506042306110002', '1506042002140002', 'Muhammad Rusly', 'Jl. bukit senyum', 'RT 08', 1, 'Laki - Laki', 'pematang lumut', '2011-05-23', '082345763412', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-28 04:34:27'),
('1506042512870001', '1506041303170001', 'Kristian Sitohang', 'dusun simpang camat', 'RT 09', 1, 'Laki - Laki', 'Palembang', '1987-12-25', '081234871543', 'Kristen', 'SLTA / Sederajat', 'wiraswasta', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 04:48:27'),
('1506042702990001', '1506040503081326', 'Irawan Saputra', 'dusun gunung mas', 'RT 06', 1, 'Laki - Laki', 'Gunung Mas', '1999-02-27', '082176542987', 'Islam', 'TAMAT SD / Sederajat', 'Pelajar/Mahasiswa', 'Belum Kawin', 'Anak Kandung', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 03:33:39'),
('1506042908820001', '1506040508110003', 'Kudianto', 'dusun simpang camat', 'RT 05', 1, 'Laki - Laki', 'Kuala Air Hitam', '1982-06-06', '082345618765', 'Islam', 'TAMAT SD / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-27 02:18:38'),
('1506043005090002', '1506040508110003', 'Mivo Rizki Ananda P.A', 'dusun simpang camat', 'RT 05', 1, 'Laki - Laki', 'Tanjung Jabung Barat ', '2009-05-30', '085345768719', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 03:24:01'),
('1506043009020003', '1506042110120001', 'M.Fahri', 'dusun kampung baru', 'RT 02', 1, 'Laki - Laki', 'pematang lumut', '2009-09-30', '087754346534', 'Islam', 'TAMAT SD / Sederajat', 'Pelajar/Mahasiswa', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 04:58:24'),
('1506043105620001', '1506041105110001', 'Trijoko', 'dusun kampung baru', 'RT 03', 1, 'Laki - Laki', 'Madiun', '1962-05-31', '085317876519', 'Islam', 'SLTA / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-27 01:49:13'),
('1506043108810002', '1506041706131003', 'Agus Suyono', 'dusun simpang camat', 'RT 04', 1, 'Laki - Laki', 'Kuala Tungkal', '1981-08-31', '082165457634', 'Islam', 'SLTA / Sederajat', 'Karyawan Swasta', 'Kawin', 'Kepala Keluarga', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 05:17:01'),
('1506043112550004', '1506040503083183', 'sucipto', 'dusun kampung baru', 'RT 01', 1, 'Laki - Laki', 'pematang lumut', '1955-12-31', '085287618716', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-21 03:40:09'),
('1506043112590012', '1506040503081326', 'Sapri', 'dusun gunung mas', 'RT 06', 1, 'Laki - Laki', 'Tungkal 1', '1959-12-31', '082176542987', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Kepala Keluarga', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 03:28:51'),
('150604312150001', '1506042302160003', 'Rena Destasya', 'dusun kampung baru', 'RT 03', 1, 'Perempuan', 'Tanjung Jabung Barat ', '2015-12-23', '087721345413', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-30 05:51:54'),
('1506043192894298', '1506049891878743', 'Sugimin', 'dusun kampung baru', 'RT 01', 1, 'Laki - Laki', 'pematang lumut', '1961-04-12', '086543218756', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Cerai Mati', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-21 03:50:49'),
('1506044101950003', '1506041603150001', 'Titin Rasidah', 'dusun kampung baru', 'RT 02', 1, 'Perempuan', 'Kuala Tungkal', '1995-01-01', '085214567876', 'Islam', 'SLTA / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-27 01:36:03'),
('1506044105980002', '1506040110150003', 'Maysarah', 'dusun simpang camat', 'RT 05', 1, 'Perempuan', 'Teluk Nilau', '1995-05-01', '082281458327', 'Islam', 'SLTP / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-30 06:17:36'),
('1506044211120001', '1506041105110001', 'Dewi Sekar Wulan', 'dusun kampung baru', 'RT 03', 1, 'Perempuan', 'Tanjung Jabung Barat ', '2012-11-02', '085244768717', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-27 01:54:44'),
('1506044302670002', '1506040503083208', 'Nurhayati', 'dusun kampung baru', 'RT 01', 1, 'Perempuan', 'pematang lumut', '1967-02-03', '085212348523', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-26 23:43:37'),
('1506044305760005', '1506042110120001', 'Rugayah', 'dusun kampung baru', 'RT 02', 1, 'Laki - Laki', 'Sei Gebar', '1976-05-03', '087754346534', 'Islam', 'TAMAT SD / Sederajat', 'Petani / Pekebun', 'Cerai Mati', 'Kepala Keluarga', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-28 04:54:31'),
('1506044305820006', '1506041712110004', 'Sugianti', 'dusun simpang camat', 'RT 09', 1, 'Perempuan', 'Lampung', '1982-05-03', '082313654576', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-30 05:30:43'),
('1506044503100001', '1506042110120001', 'Jumaiyah', 'dusun kampung baru', 'RT 02', 1, 'Perempuan', 'pematang lumut', '2010-03-05', '087754346534', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-28 05:01:37'),
('1506044603620001', '1506040503083183', 'siti maleha', 'dusun kampung baru', 'RT 01', 1, 'Perempuan', 'pematang lumut', '1962-03-06', '082391622466', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-21 06:01:43'),
('1506044606820004', '1506040508110003', 'Juniati BR Ginting', 'dusun simpang camat', 'RT 05', 1, 'Perempuan', 'Kuala Air Hitam', '1982-06-06', '085218761918', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 03:21:26'),
('1506044606891001', '1506041706131003', 'Parijen Riska Yanti', 'dusun simpang camat', 'RT 04', 1, 'Perempuan', 'Arga Makmur', '1989-06-06', '082165457634', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A+', 'lubuk terentang', '2020-07-28 05:19:49'),
('1506044610800002', '1506040503085232', 'Sarinah', 'dusun simpang camat', 'RT 04', 1, 'Perempuan', 'Teluk Nilau', '1980-10-06', '085279651998', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-30 05:59:31'),
('150604461080001', '1506041712110004', 'Rani Puspita sari', 'dusun simpang camat', 'RT 09', 1, 'Perempuan', 'Serdang Jaya', '2008-01-08', '082313654576', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-30 05:36:12'),
('1506044801110001', '1506041706131003', 'Chia Zalfa Salsabila', 'dusun simpang camat', 'RT 04', 1, 'Perempuan', 'Tanjung Jabung Barat ', '2011-01-08', '082165457634', 'Islam', 'TAMAT SD / Sederajat', 'Pelajar/Mahasiswa', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-28 05:22:03'),
('1506045008000005', '1506041712110004', 'Nina Marita', 'dusun simpang camat', 'RT 09', 1, 'Perempuan', 'Serdang Jaya', '2000-08-10', '082313654576', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-30 05:33:36'),
('1506045109680002', '1506040503083216', 'Siti Hamidah', 'dusun gunung mas', 'RT 06', 1, 'Perempuan', 'Parit 10 Sialang', '1968-09-11', '082176542987', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Famili Lain', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 03:31:15'),
('1506045705790003', '1506042002140002', 'Ratumas Surya Kelana', 'Jl. bukit senyum', 'RT 08', 1, 'Perempuan', 'pematang lumut', '1979-06-17', '082345763412', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 04:28:07'),
('1506045711971001', '1506040508160005', 'Reni Kartini', 'dusun simpang camat', 'RT 04', 1, 'Perempuan', 'pematang lumut', '1997-11-17', '085287654319', 'Islam', 'SLTA / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-27 02:02:22'),
('1506045801980001', '1506049891878743', 'siti ponirah', 'dusun kampung baru', 'RT 01', 1, 'Perempuan', 'pematang lumut', '1975-08-01', '082187871508', 'Islam', 'SLTP / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 05:33:38'),
('1506045809140001', '1506042011140002', 'Khairunnisa', 'dusun simpang camat', 'RT 05', 1, 'Perempuan', 'Tanjung Jabung Barat ', '2014-09-18', '085276982702', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-28 05:29:33'),
('1506045907920002', '1506041105110001', 'Istibariah', 'dusun kampung baru', 'RT 03', 1, 'Perempuan', 'Pangkal Duri', '1992-07-19', '085276876518', 'Islam', 'SLTP / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-27 01:51:49'),
('1506046110970002', '1506040503083183', 'artiyanti', 'dusun kampung baru', 'RT 01', 1, 'Perempuan', 'pematang lumut', '1997-10-21', '085267349639', 'Islam', 'SLTA / Sederajat', 'Pelajar/Mahasiswa', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-07-21 03:38:04'),
('1506046305160002', '1506040508160005', 'Azizah Atmarini', 'dusun simpang camat', 'RT 04', 1, 'Perempuan', 'Tanjung Jabung Barat ', '2018-05-13', '082345875418', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-27 02:11:17'),
('1506046307140003', '1506041209130005', 'Embun Pertiwi', 'dusun kampung baru', 'RT 03', 1, 'Perempuan', 'Tanjung Jabung Barat ', '2014-07-13', '087754346534', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB', 'lubuk terentang', '2020-07-28 05:10:28'),
('1506046501040001', '1506042002140002', 'Ina', 'Jl. bukit senyum', 'RT 08', 1, 'Perempuan', 'pematang lumut', '2004-01-25', '082345763412', 'Islam', 'TAMAT SD / Sederajat', 'Pelajar/Mahasiswa', 'Belum Kawin', 'Anak Kandung', 'kampung baru', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 04:32:42'),
('1506046502010001', '1506040503085232', 'Susilawati', 'dusun simpang camat', 'RT 04', 1, 'Perempuan', 'Teluk Nilau', '2001-02-25', '085279651998', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'B', 'lubuk terentang', '2020-07-30 06:02:23'),
('1506066612870001', '1506041303170001', 'Dede Karwati Harianja', 'dusun simpang camat', 'RT 09', 1, 'Perempuan', 'Cianjur', '1987-12-28', '081234871543', 'Kristen', 'Diploma IV/ Stara 1', 'wiraswasta', 'Kawin', 'Istri', 'simpang camat', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-07-28 04:50:42'),
('3207070107690049', '1506042709110004', 'muhrodin', 'dusun gunung mas', 'RT 06', 1, 'Laki - Laki', 'ciamis', '1966-07-01', '082387651819', 'Islam', 'TAMAT SD / Sederajat', 'wiraswasta', 'Kawin', 'Kepala Keluarga', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-08-03 08:15:41'),
('3207071705010001', '1506042709110004', 'rana mulyana', 'dusun gunung mas', 'RT 06', 1, 'Perempuan', 'ciamis', '2001-05-17', '082387651819', 'Islam', 'TIDAK / Belum Sekolah', 'Belum/ Tidak Bekerja', 'Belum Kawin', 'Anak Kandung', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'A', 'lubuk terentang', '2020-08-03 08:23:47'),
('3207074305700001', '1506042709110004', 'Nani suryani', 'dusun gunung mas', 'RT 06', 1, 'Perempuan', 'ciamis', '1970-05-03', '082387651819', 'Islam', 'TAMAT SD / Sederajat', 'Mengurus rumah tangga', 'Kawin', 'Istri', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'O', 'lubuk terentang', '2020-08-03 08:18:48'),
('3207074612960002', '1506042709110004', 'Rani sri mulyani', 'dusun gunung mas', 'RT 06', 1, 'Perempuan', 'ciamis', '1995-12-08', '082387651819', 'Islam', 'SLTP / Sederajat', 'Pelajar/Mahasiswa', 'Belum Kawin', 'Anak Kandung', 'gunung mas', 'lubuk terentang', 'betara', 'tanjung jabung barat', 'jambi', 'indonesia', 'AB+', 'lubuk terentang', '2020-08-03 08:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `datapendudukdatang`
--

CREATE TABLE `datapendudukdatang` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `desa_asal` varchar(30) NOT NULL,
  `kecamatan_asal` varchar(30) NOT NULL,
  `alamat_asal` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rt_asal` varchar(10) NOT NULL,
  `rw_asal` int(10) NOT NULL,
  `kode_pos_asal` int(10) NOT NULL,
  `no_telepon_asal` varchar(20) NOT NULL,
  `kabupaten_asal` varchar(30) NOT NULL,
  `provinsi_asal` int(30) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapendudukdatang`
--

INSERT INTO `datapendudukdatang` (`id`, `nik`, `tanggal`, `desa_asal`, `kecamatan_asal`, `alamat_asal`, `created_at`, `rt_asal`, `rw_asal`, `kode_pos_asal`, `no_telepon_asal`, `kabupaten_asal`, `provinsi_asal`, `alasan`, `dusun`, `rt`, `jenis_kelamin`) VALUES
(1, '1506031234512345', '2018-02-13', 'sungai gebar', 'mekar jaya', 'suak labu', '2020-07-21 06:59:13', '03', 1, 36555, '085266944323', 'tanjung jabung barat', 0, 'sadadasd', 'sdgsd', 'sdsf', 'Laki - Laki'),
(2, '1506039876598765', '2018-02-13', 'sungai gebar', 'mekar jaya', 'suak labu', '2020-07-21 07:00:28', '03', 1, 36555, '085266944323', 'tanjung jabung barat', 0, 'kerja', '', '', NULL),
(3, '1506046502010001', '2011-02-10', 'terjun gajah', 'betara', 'terjun baru', '2020-08-03 05:44:47', '01', 1, 36555, '085345765418', 'tanjung jabung barat', 0, 'ikut suami kerja', 'simpang camat', '04', 'Perempuan'),
(4, '1506044610800002', '2011-02-07', 'terjun gajah', 'betara', 'terjun baru', '2020-08-03 05:47:16', '01', 1, 36555, '085345765418', 'tanjung jabung barat', 0, 'ikut ayah pindah kerja', 'simpang camat', '04', 'Perempuan'),
(5, '1506042303060001', '2011-02-07', 'terjun gajah', 'betara', 'terjun baru', '2020-08-03 05:48:42', '01', 1, 36555, '085345765418', 'tanjung jabung barat', 0, 'ikut ayah pindah kerja', 'simpang camat', '04', 'Laki - Laki'),
(6, '1506041007790002', '2011-02-07', 'terjun gajah', 'betara', 'terjun baru', '2020-08-03 05:50:05', '01', 1, 36555, '085345765418', 'tanjung jabung barat', 0, 'pindah kerja', 'simpang camat', '04', 'Laki - Laki');

-- --------------------------------------------------------

--
-- Table structure for table `datapenduduklahir`
--

CREATE TABLE `datapenduduklahir` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_saksi` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `tempat_kelahiran` varchar(50) NOT NULL,
  `hari_kelahiran` varchar(50) NOT NULL,
  `tanggal_kelahiran` date NOT NULL,
  `jam_kelahiran` varchar(10) NOT NULL,
  `jenis_kelahiran` enum('Tunggal','kembar') NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `berat_bayi` varchar(10) NOT NULL,
  `panjang_bayi` varchar(10) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapenduduklahir`
--

INSERT INTO `datapenduduklahir` (`id`, `nama_lengkap`, `nama_ibu`, `nama_ayah`, `nama_saksi`, `jenis_kelamin`, `tempat_kelahiran`, `hari_kelahiran`, `tanggal_kelahiran`, `jam_kelahiran`, `jenis_kelahiran`, `anak_ke`, `berat_bayi`, `panjang_bayi`, `dusun`, `rt`, `created_at`) VALUES
(1, 'lili rozata', 'amita', 'kawil', 'khotim', 'Laki - Laki', 'jambi', 'Minggu', '2018-03-21', '08.21', 'Tunggal', 1, '3', '14', '', 'RT 01', '2020-07-21 04:06:30'),
(2, 'pusparani', 'siti', 'adam mahbub', 'rina', 'Perempuan', 'jambi', 'Senin', '2018-04-21', '01.49', 'Tunggal', 2, '4', '13', '', '', '2020-07-21 07:02:03'),
(3, 'Alifah Ayu', 'Yati', 'Fauzan', 'Rina', 'Perempuan', 'Tanjung Jabung Barat', 'Senin', '2018-12-10', '08.43', 'Tunggal', 1, '3', '34', '', '', '2020-07-28 05:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `datapendudukmeninggal`
--

CREATE TABLE `datapendudukmeninggal` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(30) NOT NULL,
  `penyebab_meninggal` text NOT NULL,
  `hari_meninggal_dunia` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_meninggal_dunia` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapendudukmeninggal`
--

INSERT INTO `datapendudukmeninggal` (`id`, `nik`, `tanggal_meninggal`, `tempat_meninggal`, `penyebab_meninggal`, `hari_meninggal_dunia`, `jam_meninggal_dunia`, `created_at`) VALUES
(1, '1506043192894298', '2018-01-21', 'dirumah', 'sakit lambung', 'Senin', '10.00', '2020-07-21 03:55:50'),
(2, '1506043112590012', '2019-01-21', 'dirumah', 'jantung', 'Senin', '16.00', '2020-08-03 05:58:54'),
(3, '1506045801980001', '2020-07-31', 'rumah sakit', 'gagal ginjal', 'Jumat', '08.00', '2020-08-03 05:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `datapendudukpindah`
--

CREATE TABLE `datapendudukpindah` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alasan_pindah` varchar(50) NOT NULL,
  `alamat_tujuan_pindah` varchar(255) NOT NULL,
  `rt_tujuan_pindah` varchar(10) NOT NULL,
  `rw_tujuan_pindah` varchar(10) NOT NULL,
  `desa_tujuan_pindah` varchar(50) NOT NULL,
  `kode_pos_tujuan_pindah` varchar(10) NOT NULL,
  `no_telepon_tujuan_pindah` varchar(20) NOT NULL,
  `kecamatan_tujuan_pindah` varchar(50) NOT NULL,
  `kabupaten_tujuan_pindah` varchar(50) NOT NULL,
  `provinsi_tujuan_pindah` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapendudukpindah`
--

INSERT INTO `datapendudukpindah` (`id`, `nik`, `alasan_pindah`, `alamat_tujuan_pindah`, `rt_tujuan_pindah`, `rw_tujuan_pindah`, `desa_tujuan_pindah`, `kode_pos_tujuan_pindah`, `no_telepon_tujuan_pindah`, `kecamatan_tujuan_pindah`, `kabupaten_tujuan_pindah`, `provinsi_tujuan_pindah`, `created_at`) VALUES
(1, '1505063012520004', 'kerja', 'marene', '01', '001', 'kasang kumpeh', '36373', '085266800680', 'kumpeh ulu', 'muaro jambi', 'jambi', '2020-07-21 06:27:57'),
(2, '1505066912640003', 'ikut suami pindah kerja', 'marene', '01', '001', 'kasang kumpeh', '36373', '085267825612', 'kumpeh ulu', 'muaro jambi', 'jambi', '2020-07-21 06:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `datapenduduktetap`
--

CREATE TABLE `datapenduduktetap` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapenduduktetap`
--

INSERT INTO `datapenduduktetap` (`id`, `nik`, `created_at`) VALUES
(1, '1506043112550004', '2020-07-21 03:47:02'),
(2, '1506044603620001', '2020-07-21 06:44:57'),
(3, '1506041803850006', '2020-07-21 06:45:34'),
(4, '1506046110970002', '2020-07-21 06:46:02'),
(5, '1506041607070002', '2020-07-28 05:53:28'),
(6, '1506045809140001', '2020-07-28 05:54:25'),
(7, '1506045801980001', '2020-07-28 05:54:59'),
(8, '1506042106990002', '2020-07-28 05:55:48'),
(9, '1506040105520002', '2020-07-28 05:57:05'),
(10, '1506044302670002', '2020-07-28 05:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `dataprofiledesa`
--

CREATE TABLE `dataprofiledesa` (
  `id` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `struktur_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataprofiledesa`
--

INSERT INTO `dataprofiledesa` (`id`, `sejarah`, `visi`, `misi`, `struktur_desa`) VALUES
(1, 'Desa Lubuk Terentang  terbentuk berdasarkan Peraturan Daerah Kabupaten Tanjung Jabung Barat Nomor 16 Tahun 2011 tentang Pembentukan Desa Terjun Gajah, Desa Lubuk Terentang, Desa Pematang Buluh, Desa Muntialo, Desa Teluk Kulbi, Desa Bunga Tanjung, Desa Sungai Terap dan Desa Mandala Jaya Kecamatan Betara, dan diresmikan pada tanggal 26 Agustus 2011.\r\nPemberian nama Lubuk Terentang berdasarkan dari hasil Musyawarah Tokoh-tokoh masyarakat seperti : Tokoh Agama, Tokoh Masyarakat, Tokoh Pemuda, Tokoh wanita dan unsur Pemerintahan Kecamatan Betara dan Pemerintahan Desa Pematang Lumut ( sebelum pemekaran Desa Lubuk Terentang) yang bertempat di Masjid Sabilal Muhtadin. Nama Lubuk terentang diambil dari kata:\r\nLubuk : bagian terdalam dari sungai\r\nTerentang : Merupakan nama kayu ( Kayu terentang )\r\n', '“Terwujudnya Masyarakat Desa Lubuk Terentang Yang Mandiri, Aman, Nyaman, Tertib, Asri dan Peduli”', '1.	Meningkatkan Tata kelola pemerintahan desa berdasarkan transparansi, berkeadilan, dan mengutamakan pelayanan masyarakat. <br>\r\n2.	Melaksanakan pembangunan desa secara merata, terencana, dan berkelanjutan <br>\r\n3.	Meningkatkan kesejahteraan masyarakat melalui Badan Usaha Milik Desa (BUMDES) dan mengembangkan potensi yang di Desa <br>\r\n4.	Melaksanakan pembinaan dan pengembangan kepada kelompok pengajian, yasinan, PKK, Kelompok Tani, Karang Taruna, pemuda dan Olahraga <br>\r\n5.	Melakukan control terhadap penyaluran tenaga kerja agar transparan adil dan merata <br>\r\n6.	Melaksanakan Pembinaan kepada masyarakat terhadap pentingnya kebersihan lingkungan <br>\r\n7.	Meningkatkan kemandirian masyarakat di bidang pertanian, perikanan, perkebunan dan Usaha Kecil Menengah (UKM) <br>\r\n8.	Melakukan pelatihan-pelatihan sesuai kebutuhan masyarakat\r\n\r\n', 'Struktur_Organisasi1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `datart`
--

CREATE TABLE `datart` (
  `id` int(11) NOT NULL,
  `nama_rt` varchar(50) NOT NULL,
  `ketua_rt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datart`
--

INSERT INTO `datart` (`id`, `nama_rt`, `ketua_rt`) VALUES
(10, 'RT 09', 'Iin Maisyaroh'),
(11, 'RT 08', 'Raden Samsudin'),
(12, 'RT 07', 'Marjoeky'),
(13, 'RT 06', 'Muhrodin'),
(14, 'RT 05', 'Marlena'),
(15, 'RT 04', 'M. Nurdin'),
(16, 'RT 03', 'Tulus'),
(17, 'RT 02', 'Kusnan Syahroni'),
(18, 'RT 01', 'Fahrul Isnan');

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
-- Indexes for table `dataagama`
--
ALTER TABLE `dataagama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `databerita`
--
ALTER TABLE `databerita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datagaleri`
--
ALTER TABLE `datagaleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datakk`
--
ALTER TABLE `datakk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datalurah`
--
ALTER TABLE `datalurah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapanduanlayanan`
--
ALTER TABLE `datapanduanlayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapekerjaan`
--
ALTER TABLE `datapekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapendidikan`
--
ALTER TABLE `datapendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapenduduk`
--
ALTER TABLE `datapenduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `datapendudukdatang`
--
ALTER TABLE `datapendudukdatang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datawarga_id` (`nik`);

--
-- Indexes for table `datapenduduklahir`
--
ALTER TABLE `datapenduduklahir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapendudukmeninggal`
--
ALTER TABLE `datapendudukmeninggal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datawarga_id` (`nik`);

--
-- Indexes for table `datapendudukpindah`
--
ALTER TABLE `datapendudukpindah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datawarga_id` (`nik`);

--
-- Indexes for table `datapenduduktetap`
--
ALTER TABLE `datapenduduktetap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `dataprofiledesa`
--
ALTER TABLE `dataprofiledesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datart`
--
ALTER TABLE `datart`
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
-- AUTO_INCREMENT for table `dataagama`
--
ALTER TABLE `dataagama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `databerita`
--
ALTER TABLE `databerita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `datagaleri`
--
ALTER TABLE `datagaleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `datakk`
--
ALTER TABLE `datakk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `datalurah`
--
ALTER TABLE `datalurah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datapanduanlayanan`
--
ALTER TABLE `datapanduanlayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `datapekerjaan`
--
ALTER TABLE `datapekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `datapendidikan`
--
ALTER TABLE `datapendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `datapendudukdatang`
--
ALTER TABLE `datapendudukdatang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `datapenduduklahir`
--
ALTER TABLE `datapenduduklahir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datapendudukmeninggal`
--
ALTER TABLE `datapendudukmeninggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datapendudukpindah`
--
ALTER TABLE `datapendudukpindah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datapenduduktetap`
--
ALTER TABLE `datapenduduktetap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dataprofiledesa`
--
ALTER TABLE `dataprofiledesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datart`
--
ALTER TABLE `datart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datapendudukmeninggal`
--
ALTER TABLE `datapendudukmeninggal`
  ADD CONSTRAINT `datapendudukmeninggal_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `datapenduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `datapendudukpindah`
--
ALTER TABLE `datapendudukpindah`
  ADD CONSTRAINT `datapendudukpindah_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `datapenduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `datapenduduktetap`
--
ALTER TABLE `datapenduduktetap`
  ADD CONSTRAINT `datapenduduktetap_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `datapenduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
