-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table galuh.bikinaplikasi.dev.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.informasis
DROP TABLE IF EXISTS `informasis`;
CREATE TABLE IF NOT EXISTS `informasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `judul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `informasis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.informasis: ~2 rows (approximately)
DELETE FROM `informasis`;
/*!40000 ALTER TABLE `informasis` DISABLE KEYS */;
INSERT INTO `informasis` (`id`, `user_id`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 535, 'Gunakan masker', '<p>tetap gunakan masker ya anak anak, gejala covid dapat menular dengan cepat!</p>', '["foto\\/background1.png"]', '2021-02-09 21:18:08', '2021-02-09 21:19:50'),
	(2, 535, 'absen', '<p>Yang hadir hari ini, absen di ruang bawah ya anak anak.</p>', '["foto\\/background2.png"]', '2021-02-09 21:21:14', '2021-02-09 21:21:14');
/*!40000 ALTER TABLE `informasis` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.kelass
DROP TABLE IF EXISTS `kelass`;
CREATE TABLE IF NOT EXISTS `kelass` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `wali_kelas` bigint(20) unsigned DEFAULT NULL,
  `ketua_kelas` bigint(20) unsigned DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ruang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelass_wali_kelas_foreign` (`wali_kelas`),
  KEY `kelass_ketua_kelas_foreign` (`ketua_kelas`),
  CONSTRAINT `kelass_ketua_kelas_foreign` FOREIGN KEY (`ketua_kelas`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `kelass_wali_kelas_foreign` FOREIGN KEY (`wali_kelas`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.kelass: ~6 rows (approximately)
DELETE FROM `kelass`;
/*!40000 ALTER TABLE `kelass` DISABLE KEYS */;
INSERT INTO `kelass` (`id`, `wali_kelas`, `ketua_kelas`, `nama`, `ruang`, `created_at`, `updated_at`) VALUES
	(1, 545, NULL, 'X MIPA 1', 'R-1', '2020-08-28 17:37:51', '2021-02-09 20:39:01'),
	(4, 535, NULL, 'X IPS 1', 'R-2', '2020-08-28 17:39:39', '2021-02-09 20:39:20'),
	(7, 541, NULL, 'XI MIPA 1', 'R-3', '2020-08-28 17:41:10', '2021-02-09 20:39:44'),
	(11, 555, NULL, 'XI IPS 1', 'R-4', '2020-08-28 17:43:49', '2021-02-09 20:42:24'),
	(14, 560, NULL, 'XII MIPA 1', 'R-5', '2020-08-28 17:49:44', '2021-02-09 20:42:47'),
	(17, 543, NULL, 'XII IPS 1', 'R-6', '2020-08-28 17:51:19', '2021-02-09 20:43:02');
/*!40000 ALTER TABLE `kelass` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.komentars
DROP TABLE IF EXISTS `komentars`;
CREATE TABLE IF NOT EXISTS `komentars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `informasi_id` bigint(20) unsigned NOT NULL,
  `isi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `informasi_id` (`informasi_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `komentars_ibfk_1` FOREIGN KEY (`informasi_id`) REFERENCES `informasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `komentars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table galuh.bikinaplikasi.dev.komentars: ~0 rows (approximately)
DELETE FROM `komentars`;
/*!40000 ALTER TABLE `komentars` DISABLE KEYS */;
/*!40000 ALTER TABLE `komentars` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.kuiss
DROP TABLE IF EXISTS `kuiss`;
CREATE TABLE IF NOT EXISTS `kuiss` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `guru_id` bigint(20) unsigned NOT NULL,
  `mapel_detail_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `soal_ids` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_soal` tinyint(4) NOT NULL,
  `jumlah_menit` tinyint(4) NOT NULL,
  `jenis_soal` enum('Latihan','Ujian') COLLATE utf8_unicode_ci NOT NULL,
  `mode` enum('Essay Acak','Essay Normal','Pilgan Acak','Pilgan Normal') COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tests_guru_id_foreign` (`guru_id`),
  CONSTRAINT `tests_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.kuiss: ~9 rows (approximately)
DELETE FROM `kuiss`;
/*!40000 ALTER TABLE `kuiss` DISABLE KEYS */;
INSERT INTO `kuiss` (`id`, `guru_id`, `mapel_detail_ids`, `soal_ids`, `nama`, `jumlah_soal`, `jumlah_menit`, `jenis_soal`, `mode`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
	(3, 535, '["17"]', '["1","2","3","4","5"]', 'Kuis 1 Geografi', 5, 15, 'Ujian', 'Pilgan Normal', '2021-02-10 22:50:00', '2021-02-13 23:10:00', '2021-02-11 21:18:32', '2021-02-11 21:18:32'),
	(4, 536, '["18"]', '[6,7,8,9,10]', 'Kuis 1 Sosiologin', 5, 15, 'Ujian', 'Pilgan Acak', '2021-02-10 23:03:00', '2021-02-13 23:20:00', '2021-02-11 21:31:58', '2021-02-11 21:31:58'),
	(5, 539, '["20"]', '["11","12","13","14","15","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35"]', 'Kuis 1 PPKN', 20, 60, 'Ujian', 'Pilgan Normal', '2021-02-10 23:32:00', '2021-02-13 00:00:00', '2021-02-11 22:01:24', '2021-02-11 22:04:58'),
	(6, 540, '["21"]', '["16","17","18","19","20"]', 'Kuis 1 Bahasa Indonesia', 5, 15, 'Ujian', 'Pilgan Normal', '2021-02-09 11:28:50', '2021-02-13 00:00:00', '2021-02-11 22:12:39', '2021-02-11 22:12:39'),
	(7, 535, '["17"]', '["2","3","4","5","21"]', 'Kuis 1 Geografi - Essay', 5, 30, 'Latihan', 'Essay Normal', '2021-02-11 09:20:00', '2021-02-13 12:00:00', '2021-02-12 07:46:51', '2021-02-12 07:49:44'),
	(8, 536, '["18"]', '[11,12,13,14,15]', 'Kuis 1 Sosiologi - Essay', 5, 5, 'Latihan', 'Essay Acak', '2021-02-11 09:56:00', '2021-02-14 12:00:00', '2021-02-12 08:25:25', '2021-02-12 08:25:25'),
	(9, 539, '["20"]', '["6","7","8","9","10"]', 'Kuis 1 PPKN - Essay', 5, 20, 'Latihan', 'Essay Normal', '2021-02-11 10:41:00', '2021-02-14 12:00:00', '2021-02-12 08:34:18', '2021-02-12 09:10:58'),
	(10, 540, '["21"]', '[16,17,18,19,20]', 'Kuis 1 - Essay', 5, 20, 'Ujian', 'Essay Acak', '2021-02-11 10:47:00', '2021-02-14 12:00:00', '2021-02-12 09:17:18', '2021-02-12 09:17:18'),
	(13, 535, '["17"]', '[22]', 'Test 1', 1, 15, 'Ujian', 'Essay Acak', '2021-02-23 12:00:00', '2021-02-27 12:00:00', '2021-02-24 06:44:46', '2021-02-24 06:44:46');
/*!40000 ALTER TABLE `kuiss` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.kuis_details
DROP TABLE IF EXISTS `kuis_details`;
CREATE TABLE IF NOT EXISTS `kuis_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `list_tests` text COLLATE utf8_unicode_ci NOT NULL,
  `benar` text COLLATE utf8_unicode_ci NOT NULL,
  `salah` text COLLATE utf8_unicode_ci NOT NULL,
  `tidak_dijawab` text COLLATE utf8_unicode_ci NOT NULL,
  `nilai` float NOT NULL,
  `status` enum('Selesai','Belum Selesai','Dibatalkan') COLLATE utf8_unicode_ci NOT NULL,
  `sisa_waktu` tinyint(4) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_details_test_id_foreign` (`test_id`),
  KEY `test_details_user_id_foreign` (`user_id`),
  CONSTRAINT `test_details_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `kuiss` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.kuis_details: ~3 rows (approximately)
DELETE FROM `kuis_details`;
/*!40000 ALTER TABLE `kuis_details` DISABLE KEYS */;
INSERT INTO `kuis_details` (`id`, `test_id`, `user_id`, `list_tests`, `benar`, `salah`, `tidak_dijawab`, `nilai`, `status`, `sisa_waktu`, `created_at`, `updated_at`) VALUES
	(12, 6, 342, '[]', '0', '0', '0', 0, 'Belum Selesai', 15, '2021-02-12 10:00:31', '2021-02-12 10:00:31'),
	(13, 10, 342, '[]', '0', '0', '0', 0, 'Belum Selesai', 10, '2021-02-12 10:00:58', '2021-02-12 10:22:11'),
	(18, 13, 342, '[{"soal_id":"22","jawaban":"budi"}]', '0', '0', '0', 0, 'Selesai', 15, '2021-02-24 06:45:53', '2021-02-24 06:49:24');
/*!40000 ALTER TABLE `kuis_details` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.mapels
DROP TABLE IF EXISTS `mapels`;
CREATE TABLE IF NOT EXISTS `mapels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.mapels: ~5 rows (approximately)
DELETE FROM `mapels`;
/*!40000 ALTER TABLE `mapels` DISABLE KEYS */;
INSERT INTO `mapels` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(5, 'Geografi', '2021-02-09 20:26:27', '2021-02-09 20:26:27'),
	(6, 'Sosiologi', '2021-02-09 20:26:50', '2021-02-09 20:26:50'),
	(7, 'Bahasa Inggris', '2021-02-09 20:27:46', '2021-02-09 20:27:46'),
	(8, 'PPKN', '2021-02-09 20:28:35', '2021-02-09 20:28:35'),
	(9, 'BAHASA INDONESIA', '2021-02-09 20:28:54', '2021-02-10 19:04:45');
/*!40000 ALTER TABLE `mapels` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.mapel_details
DROP TABLE IF EXISTS `mapel_details`;
CREATE TABLE IF NOT EXISTS `mapel_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_id` bigint(20) unsigned DEFAULT NULL,
  `kelas_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mapel_details_ibfk_1` (`kelas_id`),
  KEY `mapel_id` (`mapel_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `mapel_details_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mapel_details_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mapel_details_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table galuh.bikinaplikasi.dev.mapel_details: ~5 rows (approximately)
DELETE FROM `mapel_details`;
/*!40000 ALTER TABLE `mapel_details` DISABLE KEYS */;
INSERT INTO `mapel_details` (`id`, `mapel_id`, `kelas_id`, `user_id`) VALUES
	(17, 5, 4, 535),
	(18, 6, 11, 536),
	(19, 7, 11, 537),
	(20, 8, 4, 539),
	(21, 9, 4, 540);
/*!40000 ALTER TABLE `mapel_details` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.materis
DROP TABLE IF EXISTS `materis`;
CREATE TABLE IF NOT EXISTS `materis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mapel_detail_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT '-',
  `files` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.materis: ~7 rows (approximately)
DELETE FROM `materis`;
/*!40000 ALTER TABLE `materis` DISABLE KEYS */;
INSERT INTO `materis` (`id`, `mapel_detail_ids`, `judul`, `link`, `files`, `created_at`, `updated_at`) VALUES
	(2, '["21"]', 'Observasi', '', '["file\\/Kelas_10_SMA_Bahasa_Indonesia_Guru_2017.pdf"]', '2021-02-10 21:20:21', '2021-02-10 21:20:21'),
	(3, '["17"]', 'Geografi awal', '', '["file\\/7. MODUL 1 Geografi-converted.docx"]', '2021-02-10 21:22:18', '2021-02-10 21:22:18'),
	(4, '["18"]', 'Sosiologi 1', '', '["file\\/Sosiologi_Kelas_12_Ruswanto_2009.pdf"]', '2021-02-10 21:24:36', '2021-02-10 21:24:36'),
	(5, '["20"]', 'Materi kewarganegaraan', '', '["file\\/Buku-Modul-Kuliah-Kewarganegaraan-converted.docx"]', '2021-02-10 21:28:37', '2021-02-10 21:28:37'),
	(7, '["17"]', 'Materi 1', NULL, '["file\\/APLIKASI PENCATATAN PESANAN.docx"]', '2021-03-09 21:39:53', '2021-03-09 21:39:53'),
	(8, '["17"]', 'materi 1b', 'http://google.drive', '[]', '2021-03-09 23:09:18', '2021-03-09 23:09:18'),
	(11, '["17"]', 'Materi 1c', NULL, '["file\\/anum-3 metode.xlsx"]', '2021-03-09 23:13:05', '2021-03-09 23:13:05');
/*!40000 ALTER TABLE `materis` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.sekolahs
DROP TABLE IF EXISTS `sekolahs`;
CREATE TABLE IF NOT EXISTS `sekolahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `misi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.sekolahs: ~1 rows (approximately)
DELETE FROM `sekolahs`;
/*!40000 ALTER TABLE `sekolahs` DISABLE KEYS */;
INSERT INTO `sekolahs` (`id`, `nama`, `no_telp`, `alamat`, `deskripsi`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
	(1, 'SMA Negeri 12 Kota Jambi', '085368739455', 'Jl. Hasanudin poros barat blok D, Kel. Pandan Jaya, Kec. Geragai, Tanjung Jabung Timur, Jambi, 36564', '<p>Adalah salah satu sekolah SMA di Kota Jambi</p>', '<p>Mewujudkan Sumber Daya Manusia yang Berakhlak Mulia yang Mampu Bersaing Dalam Dunia Kerja Secara Global</p>', '<p>1. Menciptakan suasana yang kondusif untuk mengembangkan potensi siswa melalui penekanan pada penguasaan kompetensi bidang ilmu pengetahuan dan teknologi serta Bahasa Inggris.</p>\r\n\r\n<p>2. Meningkatkan penguasaan Bahasa Inggris sebagai alat komunikasi dan alat untuk mempelajari pengetahuan yang lebih luas.</p>\r\n\r\n<p>3. Meningkatkan frekuensi dan kualitas kegiatan siswa yang lebih menekankan pada pengembangan ilmu pengetahuan dan teknologi serta keimanan dan ketakwaan yang menunjang proses belajar mengajar dan menumbuhkembangkan disiplin pribadi siswa.</p>\r\n\r\n<p>4. Menumbuhkembangkan nilai-nilai ketuhanan dan nilai-nilai kehidupan yang bersifat universal dan mengintegrasikannya dalam kehidupan</p>\r\n\r\n<p>5. Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah, Lembaga Swadaya Masyarakat, stake holders dan instansi serta institusi pendukung pendidikan lainnya.</p>', '2020-08-27 22:30:00', '2021-02-09 20:23:46');
/*!40000 ALTER TABLE `sekolahs` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.soal_essays
DROP TABLE IF EXISTS `soal_essays`;
CREATE TABLE IF NOT EXISTS `soal_essays` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mapel_id` bigint(20) unsigned NOT NULL,
  `soal` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis` enum('Latihan','Ujian') COLLATE utf8_unicode_ci NOT NULL,
  `bobot` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `soal_essays_mapel_id_foreign` (`mapel_id`),
  CONSTRAINT `soal_essays_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.soal_essays: ~45 rows (approximately)
DELETE FROM `soal_essays`;
/*!40000 ALTER TABLE `soal_essays` DISABLE KEYS */;
INSERT INTO `soal_essays` (`id`, `mapel_id`, `soal`, `gambar`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES
	(2, 5, '<p>Jelaskan karakteristik lapisan bumi!</p>', NULL, 'Latihan', 10, NULL, NULL),
	(3, 5, '<p>Apakah yang dimaksud dengan vulkanisme?</p>', NULL, 'Latihan', 10, NULL, NULL),
	(4, 5, '<p>Tuliskan lapisan - lapisan atmosfer</p>', NULL, 'Latihan', 10, NULL, NULL),
	(5, 5, '<p>Jelaskan perbedaan antara iklim dan cuaca</p>', NULL, 'Latihan', 10, NULL, NULL),
	(6, 8, '<p>Selain Bhinneka Tunggak Ika, negara kita juga memilik alat-alat pemersatu bangsa. Sebutkan!</p>', NULL, 'Latihan', 10, NULL, NULL),
	(7, 8, '<p>Dalam Pasal 27 ayat (3) UUD NRI Tahun 1945 dikatakan bahwa?</p>', NULL, 'Latihan', 10, NULL, NULL),
	(8, 8, '<p>Bhinneka Tunggal Ika adalah semboyan bagi bangsa Indonesia yang artinya?</p>', NULL, 'Latihan', 10, NULL, NULL),
	(9, 8, '<p>UU No. 34 Tahun 2004 tentang?</p>', NULL, 'Latihan', 10, NULL, NULL),
	(10, 8, '<p>Ancaman berdasarkan jenis nya dibagi atas? Sebutkan!</p>', NULL, 'Latihan', 10, NULL, NULL),
	(11, 6, '<p>Jelaskanlah ciri kelompok paguyuban dan patembayan!</p>', NULL, 'Latihan', 10, NULL, NULL),
	(12, 6, '<p>Jelaskanlah pengaruh diferesiasi sosial dan stratifikasi sosial!</p>', NULL, 'Latihan', 10, NULL, NULL),
	(13, 6, '<p>tuliskanlah 8 perbedaan anara konflik dan kekerasan!</p>', NULL, 'Latihan', 10, NULL, NULL),
	(14, 6, '<p>Tulis dan jelaskan bentuk - bentuk integrasi sosial!</p>', NULL, 'Latihan', 10, NULL, NULL),
	(15, 6, '<p>Menurut anda, bagaimana upaya untuk mencapai reintegrasi sosial?</p>', NULL, 'Latihan', 10, NULL, NULL),
	(16, 9, '<p>Apakah tujuan anda melakukan negosiasi?</p>', NULL, 'Ujian', 10, NULL, NULL),
	(17, 9, '<p>Ketika anda bernegosiasi diperlukan syarat-syarat yaitu!</p>', NULL, 'Ujian', 10, NULL, NULL),
	(18, 9, '<p>&quot;Ayah, doakan saja biar aku mudah meraih cita-cita&quot;, makna tersirat dari kalimat persuasif tersebut adalah?</p>', NULL, 'Ujian', 10, NULL, NULL),
	(19, 9, '<p>Buatlah satu contoh mosi dengan tema pendidikan!</p>', NULL, 'Ujian', 10, NULL, NULL),
	(20, 9, '<p>Diksi dalam puisi adalah...</p>', NULL, 'Ujian', 10, NULL, '2021-02-12 10:24:29'),
	(21, 5, '<p>geografi adalah</p>', NULL, 'Latihan', 10, NULL, NULL),
	(23, 5, '<p>Deskripsikan tentang planet jupiters</p>', NULL, 'Latihan', 10, NULL, NULL),
	(24, 5, '<p>Contoh lingkungan fisik adalah....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(25, 5, '<p>Varenius membagi geografi&nbsp; menjadi dua, yaitu....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(26, 5, '<p>Menurut aliran fisis determinis, kehidupan manusia ditentukan oleh....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(27, 5, '<p>Konsep esensial geografi yang berkaitan dengan bentuk muka bumi adalah....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(28, 5, '<p>Pendekatan keruangan menganalisis gejala atau fenomena geografi berdasarkan....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(29, 5, '<p>Fenomena atmosfer, hidrosfer, dan biosfer termasuk dalam objek kajian geografi, yaitu....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(30, 5, '<p>Ilmu yang mempelajari pembuatan peta disebut....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(31, 5, '<p>Prinsip geografi yang menyatakan hubungan antara gejala geografi yang satu dengan gejala geografi yang lain di muka bumi merupakan prinsip....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(32, 5, '<p>Istilah geografi berasal dari bahasa Yunani, yaitu kata....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(33, 5, '<p>Cabang geografi yang mempelajari suatu wilayah tertentu secara khusus adalah....</p>', NULL, 'Ujian', 10, NULL, NULL),
	(34, 5, '<p>Jelaskan pengertian konsep aglomerasi dan berikan contoh bentuk aglomerasi yang ada di perkotaan!</p>', NULL, 'Ujian', 10, NULL, NULL),
	(35, 5, '<p>Berikan contoh kajian geografi dengan menggunakan pendekatan keruangan, pendekatan ekologi, dan pendekatan kompleks wilayah!</p>', NULL, 'Ujian', 10, NULL, '2021-03-09 22:42:01'),
	(36, 5, '<p>Jelaskan yang dimaksud dengan geosfer! Berikan contoh gejala maupun fenomena dalam kehidupan sehari-hari yang berkaitan dengan geosfer!</p>', NULL, 'Ujian', 10, NULL, NULL),
	(37, 5, '<p>Sebutkan dan jelaskan empat prinsip geografi!</p>', NULL, 'Ujian', 10, NULL, NULL),
	(38, 5, '<p>Prinsip interrelasi</p>', NULL, 'Ujian', 10, NULL, NULL),
	(39, 5, '<p>Prinsip deskripsi</p>', NULL, 'Ujian', 10, NULL, NULL),
	(40, 5, '<p>Prinsip korologi</p>', NULL, 'Ujian', 10, NULL, NULL),
	(41, 5, '<p>elaskan ilmu geografi memerlukan ilmu penunjang lainnya!</p>', NULL, 'Ujian', 10, NULL, NULL),
	(42, 5, '<p>Variasi ketiggian tempat dalam suatu wilayah disebut....</p>', NULL, 'Ujian', 10, NULL, NULL),
	(43, 5, '<p>Jarak vertikal suatu tempat dari permukaan laut disebut....</p>', NULL, 'Ujian', 10, NULL, NULL),
	(44, 5, '<p>Peta yang digunakan sebagai dasar pembuatan peta disebut....</p>', NULL, 'Ujian', 10, NULL, NULL),
	(45, 5, '<p>Menurut bentuknya, simbol dapat dibedakan menjadi simbol....</p>', NULL, 'Latihan', 10, NULL, NULL),
	(46, 5, '<p>Tiga jenis proyeksi peta, yaitu....</p>', NULL, 'Ujian', 10, NULL, NULL),
	(47, 5, '<p>Gambaran permukaan bumi baik keseluruhan atau sebagian yang diperkecil dengan menggunakan skala disebut....</p>', NULL, 'Ujian', 10, NULL, NULL);
/*!40000 ALTER TABLE `soal_essays` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.soal_pilgans
DROP TABLE IF EXISTS `soal_pilgans`;
CREATE TABLE IF NOT EXISTS `soal_pilgans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mapel_id` bigint(20) unsigned NOT NULL,
  `soal` text COLLATE utf8_unicode_ci NOT NULL,
  `opsi_a` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opsi_b` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opsi_c` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opsi_d` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jawaban` enum('A','B','C','D') COLLATE utf8_unicode_ci NOT NULL,
  `jenis` enum('Latihan','Ujian') COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `soal_pilgans_mapel_id_foreign` (`mapel_id`),
  CONSTRAINT `soal_pilgans_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.soal_pilgans: ~55 rows (approximately)
DELETE FROM `soal_pilgans`;
/*!40000 ALTER TABLE `soal_pilgans` DISABLE KEYS */;
INSERT INTO `soal_pilgans` (`id`, `mapel_id`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`, `jenis`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, 5, '<p>Lapisan yang memisahkan kerak bumi dan inti bumi adalah</p>', '<p>Sial</p>', '<p>Sima</p>', '<p>Litosfer</p>', '<p>Astenosfer</p>', 'C', 'Ujian', NULL, '2021-02-09 21:44:26', '2021-02-10 20:41:55'),
	(2, 5, '<p>Patahan semangko di pulau Sumatra terbentuk karena peristiwa</p>\r\n\r\n<div id="gtx-trans" style="position: absolute; left: -32px; top: -5.77778px;">\r\n<div class="gtx-trans-icon">&nbsp;</div>\r\n</div>', '<p>Vulkanisme</p>', '<p>Seisme</p>', '<p>Endogen</p>', '<p>Tektonisme</p>', 'B', 'Ujian', NULL, '2021-02-09 21:45:24', '2021-02-10 20:40:34'),
	(3, 5, '<p>Letusan gunung berapi dapat mempengaruhi iklim karena</p>', '<p>Debu vulkanik dan gas di atmosfer menyerap radiasi matahari</p>', '<p>Letusan gunung api memanaskan atmosfer</p>', '<p>Debu vulkanik dan gas di atmosfer menyerap radiasi matahari</p>', '<p>Magma Cenderung mempunyai suhu yang tinggi</p>', 'C', 'Ujian', NULL, '2021-02-09 21:47:18', '2021-02-10 20:41:55'),
	(4, 5, '<p>Letusan gunung berapi terbesar yang pernah terjadi di Indonesia hingga saat ini adalah gunung...</p>', '<p>Pinatubo</p>', '<p>Krakatau</p>\r\n\r\n<p>&nbsp;</p>', '<p>Rainer</p>', '<p>Toba</p>', 'A', 'Ujian', NULL, '2021-02-09 21:48:59', '2021-02-10 20:41:55'),
	(5, 5, '<p>Salah satu dampak positif vulkanisme terhadap kehidupan adalah...</p>', '<p>Tanah menjadi subur</p>', '<p>Permukiman penduduk rusak</p>', '<p>Tanah tertutup abu vulkanik</p>', '<p>Tanah longsor terjadi</p>', 'C', 'Ujian', NULL, '2021-02-09 21:50:07', '2021-02-10 20:41:55'),
	(6, 6, '<p>Andi mengakui dirinya tergabung dan berperan aktif dalam kelompok karya ilmiah remaja yang diadakan disekolah tempat dia belajar. Hal tersebut sesuai dengan kriteria suatu kelompok, yaitu...</p>', '<p>Adanya keuntungan suatu kelompok</p>\r\n\r\n<div id="gtx-trans" style="position: absolute; left: -178px; top: 37.6667px;">\r\n<div class="gtx-trans-icon">&nbsp;</div>\r\n</div>', '<p>Adanya tujuan yang ingin dicapai oleh suatu kelompok</p>\r\n\r\n<div id="gtx-trans" style="position: absolute; left: -69px; top: -5.77778px;">\r\n<div class="gtx-trans-icon">&nbsp;</div>\r\n</div>', '<p>Memiliki pola interaksi antara anggota kelompok lainnya</p>', '<p>Pihak yang berinteraksi mendefenisikan dirinya sebagai anggota kelompok</p>', 'A', 'Ujian', NULL, '2021-02-09 21:58:34', '2021-02-10 20:41:55'),
	(7, 6, '<p>Karena adanya kebijakan mengurangi jumlah tenaga kerja, para buruh pabri bersatu melakukan unjuk rasa guna menuntut hak mereka sebagai buruh. Bentuk kelompok sosial yang sesuai dengan kasus tersebut adalah...</p>', '<p>Publik</p>', '<p>kerumunan</p>', '<p>Massa</p>', '<p>In-Group</p>', 'C', 'Ujian', NULL, '2021-02-09 22:01:18', '2021-02-10 20:41:55'),
	(8, 6, '<p>Kelompok sosial terkecil dalam masyarakat adalah</p>', '<p>EmTeman bermain</p>\r\n\r\n<div id="gtx-trans" style="position: absolute; left: 27px; top: 37.6667px;">\r\n<div class="gtx-trans-icon">&nbsp;</div>\r\n</div>', '<p>Keluarga</p>\r\n\r\n<div id="gtx-trans" style="position: absolute; left: -122px; top: 37.6667px;">\r\n<div class="gtx-trans-icon">&nbsp;</div>\r\n</div>', '<p>Lingkungan Rt\\Rw</p>', '<p>Kelompok Belajar</p>', 'C', 'Ujian', NULL, '2021-02-09 22:02:52', '2021-02-10 20:41:55'),
	(9, 6, '<p>Emile Durkheim membagi kelompok sosial menjadi dua, yakni...</p>', '<p>Ingroup dan out group</p>', '<p>Membership group dan refference group</p>', '<p>Paguyubuan dan patembayan</p>', '<p>Solidaritas organic dan solidaritas mekanik</p>', 'B', 'Ujian', NULL, '2021-02-09 22:04:24', '2021-02-10 20:40:34'),
	(10, 6, '<p>Suatu keadaan yang tidak sesuai dengan yang diharapkan dengan realita yang ada merupakan pengertian dari...</p>', '<p>masalah sosial</p>', '<p>masalah</p>', '<p>hambatan</p>', '<p>kecemburuan sosial</p>', 'D', 'Ujian', NULL, '2021-02-09 22:05:13', '2021-02-10 20:41:55'),
	(11, 8, '<p>Bhinneka Tunggal Ika mentpakan semboyan bagi bangsa indonesia.Semboyan tersebut mengandung makna...</p>', '<p>Persatuan dan kesejahteraan bangsa</p>', '<p>Persatuan dan kesatuan bangsa</p>', '<p>Persatuan dan kemakmuran bangsa</p>', '<p>Persatuan dan kemakmuran NKRI</p>', 'B', 'Ujian', NULL, '2021-02-10 18:47:07', '2021-02-11 22:00:08'),
	(12, 8, '<p>Berikut perwujudan nasionalisme yang dapat diterapkan dalam setiap aspek kehidupan adalah...</p>', '<p>Mengerti makna bhinneka tunggal ika</p>', '<p>Mengetahui kebhinekaan dan rasa nasionalime</p>', '<p>Pemahaman akan kebhinekaan bangsa</p>', '<p>Menjunjung nilai-nilai pancasila</p>', 'C', 'Ujian', NULL, '2021-02-10 18:47:59', '2021-02-10 20:41:55'),
	(13, 8, '<p>Perhatikan beberapa hal berikut 1) Pancasila 3) Bendera Merah Putih 2) UUD NRI 1945 4) Bahasa Indonesia Mat pemersatu bangsa yang dimiliki Indonesia ditunjukkan nomor...</p>', '<p>1, 2, dan 4</p>', '<p>1, 3, dan 4</p>', '<p>1, 3, dan 5</p>', '<p>2, 3 dan 5</p>', 'A', 'Ujian', NULL, '2021-02-10 18:49:40', '2021-02-11 21:59:04'),
	(14, 8, '<p>Utami mengikuti lomba gebyar tarian daerah yang diikuti oleh para pelajar dari berbagai daerah di indonesia. Tindakan tersebut merupakan salah satu implementasi dalam upaya...</p>', '<p>Mengenalkan tarian daerah terhadap masyarakat</p>', '<p>Mempersatukan masyarakat yang beragam</p>', '<p>Melestarikan budaya tarian daerah</p>', '<p>Mempromosikan budaya pada masyarakat</p>', 'B', 'Ujian', NULL, '2021-02-10 18:50:41', '2021-02-11 21:59:26'),
	(15, 8, '<p>Berikut yang termasuk dalam faktor penghambat integrasi nasional adalah...</p>', '<p>Munculnya jiwa dan semnagat gotong royong serta toleransi yang kuat</p>', '<p>Lepasnya wilayah negara yang terdiri dari ribuan pulau dan dikelilingi lautan</p>', '<p>Faktor sejarah yang mengakibatkan ras senasib dan seperjuangan d. Keinginan untuk bersatu sebagai tekad bangsa indonesia</p>', '<p>Adanya semangat rela berkorban dari seluruh bangsa indonesia</p>', 'C', 'Ujian', NULL, '2021-02-10 18:51:50', '2021-02-11 21:59:47'),
	(16, 9, '<p>Debat dibangun atas unusr dibawah ini, <em>kecuali</em></p>', '<p>Tema</p>', '<p>Mosi</p>', '<p>Tim Afirmatif</p>', '<p>Tim Oposisi</p>', 'B', 'Ujian', NULL, '2021-02-10 19:08:09', '2021-02-10 20:40:34'),
	(17, 9, '<p>Pihak yang menolak emosi dalam debat adalah</p>', '<p>Tim Afirmatif</p>', '<p>Tim Oposisi</p>', '<p>Tim Netral</p>', '<p>Penonton</p>', 'A', 'Ujian', NULL, '2021-02-10 19:08:56', '2021-02-10 20:41:55'),
	(18, 9, '<p>Unsur pertama dalam debat adalah</p>', '<p>Merumuskan mosi</p>', '<p>Menentukan tema debat</p>', '<p>Menentukan anggota debat</p>', '<p>Menyusun tata tertib</p>', 'C', 'Ujian', NULL, '2021-02-10 19:09:41', '2021-02-10 20:48:29'),
	(19, 9, '<p>Pola penyajian karakter tokoh dalam penulisan biografi dapat menggunakan cara</p>', '<p>Langsung dan tidak langsung</p>', '<p>Lama dan baru</p>', '<p>Konkret dan abstrak</p>', '<p>Deskripsi melalui penuturan tokoh dan tokoh lain</p>', 'B', 'Ujian', NULL, '2021-02-10 19:10:49', '2021-02-10 20:48:42'),
	(20, 9, '<p>Pernyataan perasaan hasil penhiwaan isi puisi disebut</p>', '<p>Vokal</p>', '<p>Ekspresi</p>', '<p>Intonasi</p>', '<p>Irama</p>', 'C', 'Ujian', NULL, '2021-02-10 19:11:57', '2021-02-10 20:41:55'),
	(21, 8, '<p>Penyebab masalah sosial antara masyarakat yang satu dengan masyarakat yang lain berbeda-beda. Perbendaaan ini antara lain dipengaruhi oleh...</p>', '<p>perbedaan nilai, keyakinan pengalaman hidup, dan periode sejarah</p>\r\n\r\n<div id="gtx-trans" style="position: absolute; left: -19px; top: 37.6667px;">\r\n<div class="gtx-trans-icon">&nbsp;</div>\r\n</div>', '<p>perbedaan nilai, keyakinan pengalaman hidup, dan periode sejarah</p>', '<p>keyakinan pengalaman hidup, perode sejarah, dan tingkat pendidikan</p>', '<p>latar belakang budaya, kehidupan ekonomi, dan tingkat pendidikan</p>', 'C', 'Ujian', NULL, '2021-02-10 20:07:43', '2021-02-10 20:41:55'),
	(22, 8, '<p>Syarat terbentuknya integrasi adalah...</p>', '<p>Masyarakat tidak mampu menciptakan konsensus</p>', '<p>Norma dan nilai berlaku sepanjang inasa</p>', '<p>Memiliki tujuan yang berbeda</p>', '<p>Adanya sikap etnosentrisme dalam diri masyarakat</p>', 'B', 'Ujian', NULL, '2021-02-10 20:11:08', '2021-02-10 20:40:34'),
	(23, 8, '<p>&nbsp;Perhatikan faktor-faktor berikut 1) Masih besamya ketimpangan dan ketidakmeratnan pembangunan 2) Munculnya paham etnosentrisme diberbagai suku bangsa 3) Adanya konsensus nasional dalam perwujudan proklamasi kemerdekaan 4) Rela berkorban untuk kepentingan bangsa dan negara 5). Faktor sejarah yang mengakitkan rasa senasib dan seperjuangan Faktor pendorong tercapainya integrasi nasional ditunjukkan nomor...</p>', '<p>1, 2, dan 4</p>', '<p>1, 3, dan 4</p>', '<p>1, 3, dan 5</p>', '<p>2, 3, dan 5</p>', 'A', 'Ujian', NULL, '2021-02-10 20:15:00', '2021-02-10 20:41:55'),
	(24, 8, '<p>Sebagai warga negara yang baik, kita harus berupaya membela negara. Berikut yang tidak termasuk contoh dari pelatihan dasar kemiliteran yang dilakukan oleh pelajar di sekolah adalah...</p>', '<p>Andy giat mengikuti latihan pramuka</p>', '<p>Wahyu mengikuti latihan rutin paskibra untuk persiapan lomba</p>', '<p>Khansa melakukan kewajibannya mengikuti latihan menwa</p>', '<p>Hidayat bersemangat dalam to &nbsp;as sebagai patroli keamanan sekolah</p>', 'D', 'Ujian', NULL, '2021-02-10 20:16:06', '2021-02-10 20:41:55'),
	(25, 8, '<p>Pak wahyudi sangat mencintai dunia pendidikan, is sudah mengabdi sebagai seorang guru selama 15 tahun dan berencana tents mengabdi untuk mencerdaskan anak-anak bangsa. Tindakan Pak Wahyudi tersebut merupakan salah satu upaya bela negara, yain</p>', '<p>Pendidikan kewarganegaraan</p>', '<p>Pelatih dasar kepemimpinan</p>', '<p>Mengabdi sebagai prajurit tentara</p>', '<p>Mengabdi sesuai dengan profesi</p>', 'B', 'Ujian', NULL, '2021-02-10 20:17:32', '2021-02-10 20:40:34'),
	(26, 8, '<p>Ancaman merupakan setiap usaha dan kegiatan, baik dari dalam negeri maupun mar negeri, yang dinilai dapat membahayakan...</p>', '<p>Kesatuan, keutuhan, dan keselamatan suatu negara</p>', '<p>Keutuhan, keamanan, dan kesatuan suatu negara</p>', '<p>Keselamatan, kedaulatan, dan keamanan suatu negara</p>', '<p>Kedaulatan, keutuhan, dan keselamatan suatu negara</p>', 'B', 'Ujian', NULL, '2021-02-10 20:18:33', '2021-02-10 20:40:34'),
	(27, 8, '<p>Segala bentuk ancaman yang dapat mengganggu ketahanan nasional suatu negara dan dilakukan dalam tataran pemikiran merupakan bentuk ancaman...</p>', '<p>Fisik</p>', '<p>Ideologis</p>', '<p>Politik</p>', '<p>Keamanan</p>', 'B', 'Ujian', NULL, '2021-02-10 20:19:24', '2021-02-10 20:40:34'),
	(28, 8, '<p>Tujuan bangsa indortesia tercatum dalam pembukaan UUD NRI Tahun 1945 alinea&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'A', 'Ujian', NULL, '2021-02-10 20:23:16', '2021-02-10 20:41:55'),
	(29, 8, '<p>Undang-Undang tentang Tentara Nasional Indonesia( TNI) yang menyebutkan ancaman dan gangguan terhadap keutuhan bangsa dan negara adalah...</p>', '<p>UU No. 32 Tahun 2004</p>', '<p>UU No. 32 Tahun 2002</p>', '<p>UU No. 33 Tabun 2004</p>', '<p>UU No. 34 Tahun 2004</p>', 'C', 'Ujian', NULL, '2021-02-10 20:24:01', '2021-02-10 20:41:55'),
	(30, 8, '<p>Berikut yang bukan termasuk contoh kasus pelanggaran wilayah yang pernah terjadi di Indonesia adalah...</p>', '<p>Pemindahan patok wilayah perbatasan di wilayah Kalimantan oleh Malaysia</p>', '<p>Kapal nelayan milik Malaysia pernah tertangkap karena mengambil ikan di wilayah perairan Indonesia</p>', '<p>Pesawat F-18 milik Amerika Serikat pernah terbang di wilayah udara Indonesia tanpa izin</p>', '<p>Kapal nelayan milik Jepang pernah tertangkap karena menangkap ikan di perairan Indonesia</p>', 'D', 'Ujian', NULL, '2021-02-10 20:25:02', '2021-02-10 20:41:55'),
	(31, 8, '<p>Kasus penyadapan telepon para pejabata Indonesia oleh Australia merupakan salah satu contoh kasus ancaman dan gangguan yang berupa...</p>', '<p>Sabotase</p>', '<p>Spionase</p>', '<p>Agresi</p>', '<p>Pelanggaran wilayah</p>', 'D', 'Ujian', NULL, '2021-02-10 20:25:52', '2021-02-10 20:41:55'),
	(32, 8, '<p>Globalisasi berdampak kepada kehidupan dari segi sikap, pandangan hidup, bahkan nilai-nilai budaya bangsa. Hal tersebut merupakan penjelasan ancaman globalisasi dalam bidang...</p>', '<p>Politik</p>', '<p>Ideologi</p>', '<p>Ekonomi</p>', '<p>Sosial budaya</p>', 'A', 'Ujian', NULL, '2021-02-10 20:26:35', '2021-02-10 20:41:55'),
	(33, 8, '<p>Pengaruh derasnya budaya global yag negatif menyebabkan kesadaran terhadap nilai-nilai budaya bangsa semakin memudar. Berikut tindakan yang tidak mecerminkan hal tersebut adalah...</p>', '<p>Menghargai budaya asing</p>', '<p>Pola hidup konsumtif</p>', '<p>Menghargai produk dalam negeri</p>', '<p>Pergaulan bebas</p>', 'D', 'Ujian', NULL, '2021-02-10 20:27:18', '2021-02-10 20:41:55'),
	(34, 8, '<p>Perhatikan bentuk ancaman berikut. 1) Perang informasi 4) Kekerasan politik 2) Perang tak terbatas 5) Pelanggaran wilayah 3) Konflik perbatasan Bentuk ancaman terhadap pertahanan nasional ditunjukkan nomor...</p>', '<p>1, 2, dan 3</p>', '<p>1, 2, dan 4</p>', '<p>1, 4 dan 5</p>', '<p>2, 3, dan 5</p>', 'B', 'Ujian', NULL, '2021-02-10 20:30:29', '2021-02-10 20:40:34'),
	(35, 8, '<p>Penyebaran virus atau penyakit berbahaya merupakan salah satu bentuk ancaman disintegrasi, yaitu ancaman...</p>', '<p>Bencana alam</p>', '<p>Perubahan iklim</p>', '<p>Teknologi</p>', '<p>Epidemi</p>', 'D', 'Ujian', NULL, '2021-02-10 20:31:19', '2021-02-10 20:41:55'),
	(36, 5, '<p>Karawang saat ini merupakan kawasan lumbung padi Jawa Barat, tetapi belum tentu untuk masa yang akan datang. Hal ini merupakan contoh dari konsep&hellip;.</p>', '<p>keunikan wilayah</p>', '<p>lokasi relatif</p>', '<p>relasi wilayah</p>', '<p>interaksi keuangan</p>', 'D', 'Ujian', NULL, '2021-03-09 22:46:36', '2021-03-09 22:46:36'),
	(37, 5, '<p>Sumbangan Eratosthenes dalam geografi adalah&hellip;.</p>', '<p>pendapatnya bahwa bumi itu bulat</p>', '<p>pendapatnya bahwa bumi itu datar</p>', '<p>pendapatnya bahwa bumi itu berlapis-lapis</p>', '<p>pendapatnya bahwa bumi itu diselimuti lapisan udara</p>', 'A', 'Ujian', NULL, '2021-03-09 22:47:32', '2021-03-09 22:47:32'),
	(38, 5, '<p>Menurut aliran fisis determinis, kehidupan manusia ditentukan oleh&hellip;.</p>', '<p>manusia itu sendiri</p>', '<p>ilmu pengetahuan</p>', '<p>budaya manusia</p>', '<p>teknologi</p>', 'D', 'Ujian', NULL, '2021-03-09 22:48:05', '2021-03-09 22:48:05'),
	(39, 5, '<p>Berikut ini dijelaskan beberapa contoh fenomena yang termasuk konsep lokasi adalah&hellip;.</p>', '<p>nilai tanah untuk permukiman menjadi murah apabila dekat tempat pembuangan sampah</p>', '<p>harga rumah semakin mahal apabila mendekati pusat kota dibandingkan dengan harga rumah di pedesaan</p>', '<p>permukiman khusus pegawai negeri</p>', '<p>semakin besar tingkat erosi maka kesuburan tanah semakin berkurang</p>', 'A', 'Ujian', NULL, '2021-03-09 22:48:35', '2021-03-09 22:48:35'),
	(40, 5, '<p>Suatu lokasi pengertiannya akan menjadi tempat apabila&hellip;.</p>', '<p>menunjukkan posisi suatu daerah</p>', '<p>memiliki informasi tertentu</p>', '<p>dapat menunjukkan kaitannya dengan daerah lain</p>', '<p>mudah dijangkau</p>', 'A', 'Ujian', NULL, '2021-03-09 22:49:10', '2021-03-09 22:49:10'),
	(41, 5, '<p>Perhatikan unsur-unsur dalam geografi berikut ini!<br />\r\n&ndash; Pola persebaran gejala ertentu permukaan bumi<br />\r\n&ndash; Keterkaitan atau hubungan sesama antargejala tersebut<br />\r\n&ndash; Perkembangan atau perubahan yang terjadi pada gejala tersebut</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unsur-unsur tersebut merupakan bagian dari organisasi keruangan&hellip;..</p>', '<p>objek formal</p>', '<p>objek material</p>', '<p>aspek geografi</p>', '<p>konsep geografi</p>', 'A', 'Ujian', NULL, '2021-03-09 22:49:56', '2021-03-09 22:49:56'),
	(42, 5, '<p>Konsep geografi yang akan muncul dalam mengkaji fenomena banjir adalah&hellip;..</p>', '<p>hujan, permukiman, lereng, dan hutan</p>', '<p>erosi, tebing, air, tanah, dan batuan</p>', '<p>kerusakan hutan, hujan, sungai, dan sampah</p>', '<p>sedimentasi, tanah, vegetasi, dan muara</p>', 'A', 'Ujian', NULL, '2021-03-09 22:50:24', '2021-03-09 22:53:49'),
	(43, 5, '<p>Penduduk dunia cenderung menempati wilayah-wilayah yang banyak memiliki cadangan air dengan topografi yang datar. Salah satu konsep esensial menurut J. Warman, yaitu&hellip;..</p>', '<p>jarak</p>', '<p>aglomerasi</p>', '<p>lokasi</p>', '<p>keterjangkauan</p>', 'A', 'Ujian', NULL, '2021-03-09 22:50:55', '2021-03-09 22:50:55'),
	(44, 5, '<p>Konsep esensial geografi yang berkaitan dengan bentuk muka bumi adalah&hellip;..</p>', '<p>morfologi</p>', '<p>aglomerasi</p>', '<p>aksesibilitas</p>', '<p>jarak</p>', 'A', 'Ujian', NULL, '2021-03-09 22:51:28', '2021-03-09 22:51:28'),
	(45, 5, '<p>Posisi Indonesia menjadikannya sangat strategis dalam bidang pelayaran dan perdagangan dunia. Hal ini merupakan dampak posisi Indonesia apabila dilihat secara ...</p>', '<p>geologis</p>', '<p>astronomis</p>\r\n\r\n<p>&nbsp;</p>', '<p>geomorfologis</p>', '<p>geografis</p>', 'D', 'Ujian', NULL, '2021-03-09 22:55:12', '2021-03-09 22:55:12'),
	(46, 5, '<p>Perairan laut di Indonesia memiliki karakteristik berbeda. Hal ini dapat dilihat dari kedalaman lautnya. Wilayah Indonesia bagian barat memiliki kedalaman laut yang lebih dangkal dibandingkan perairan laut di Indonesia bagian tengah dan timur, seperti Laut Banda. Faktor yang menyebabkan terjadinya hal ini adalah ...</p>', '<p>adanya sedimentasi yang besar di perairan Indonesia bagian barat</p>', '<p>adanya perbedaan proses pembentukan morfologi laut di Indonesia</p>', '<p>kedalaman laut di Indonesia bagian timur dipengaruhi oleh kuatnya arus Samudra Pasifik</p>', '<p>pergerakan lempeng tektonik di Indonesia bagian barat tidak terlalu berpengaruh besar</p>', 'B', 'Latihan', NULL, '2021-03-09 22:56:05', '2021-03-09 22:56:05'),
	(47, 5, '<p>Indonesia memiliki luas wilayah yang begitu besar dan memiliki topografi yang beragam. Hal ini menjadikan proses perencanaan dan pembangunan di Indonesia mengalami hambatan, terutama pada wilayah-wilayah yang berada di pedalaman dan sulit dijangkau. Oleh sebab itu, langkah yang bisa dilakukan oleh Indonesia untuk mengatasi permasalahan tersebut adalah ...</p>', '<p>meningkatkan kegiatan patroli keamanan di wilayah perbatasan negara</p>', '<p>memaksimalkan penggunaan SDA di lahan yang mudah dijangkau</p>', '<p>menggunakan teknologi pengindraan jauh untuk mendapatkan informasi wilayah yang sulit dijangkau</p>', '<p>meminta bantuan negara lain untuk membantu pembangunan di Indonesia</p>', 'C', 'Latihan', NULL, '2021-03-09 22:56:54', '2021-03-09 22:57:06'),
	(48, 5, '<p>Kebangkitan kekuatan maritim di Indonesia ditandai dengan adanya peristiwa ...</p>', '<p>Deklarasi Bangkok</p>', '<p>Deklarasi Djuanda</p>', '<p>UNCLOS 1978</p>', '<p>Proklamasi Kemerdekaan</p>', 'B', 'Latihan', NULL, '2021-03-09 22:57:45', '2021-03-09 22:57:45'),
	(49, 5, '<p>Indonesia memiliki potensi sumber daya laut yang sangat tinggi. Salah satu daerah di Indonesia yang memiliki potensi laut berupa terumbu karang adalah Kabupaten Wakatobi, Sulawesi Tenggara. Jenis kegiatan ekonomi yang cocok dikembangkan di daerah Wakatobi adalah ...</p>', '<p>perdagangan</p>', '<p>peternakan</p>', '<p>perikanan</p>', '<p>perindustrian</p>', 'D', 'Latihan', NULL, '2021-03-09 22:58:22', '2021-03-09 22:58:22'),
	(50, 5, '<p>Biosfer berasal dari dua suku kata, yaitu&nbsp;<em>bio&nbsp;</em>dan&nbsp;<em>sphere</em>. Kata&nbsp;<em>bio</em>&nbsp;memiliki arti ...</p>', '<p>tubuh</p>', '<p>lapisan</p>', '<p>bumi</p>', '<p>gambaran</p>', 'A', 'Latihan', NULL, '2021-03-09 22:59:03', '2021-03-09 23:02:27'),
	(51, 5, '<p>Perhatikan karakteristik bioma berikut ini:</p>\r\n\r\n<p>(1) Banyak ditemukan di wilayah tropis</p>\r\n\r\n<p>(2) Padang rumput yang diselingi pepohonan yang menyebar</p>\r\n\r\n<p>(3) Curah hujan sedang dan tidak teratur antara 100-150 mm/tahun</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bioma yang memiliki karakteristik yang disebutkan pada soal adalah ...</p>', '<p>tundra</p>', '<p>gurun</p>', '<p>sabana</p>', '<p>hutan musim</p>', 'C', 'Latihan', NULL, '2021-03-09 22:59:58', '2021-03-09 23:03:33'),
	(52, 5, '<p>Salah satu faktor yang memengaruhi persebaran flora dan fauna di dunia adalah faktor edafik. Berikut ini unsur-unsur dari faktor edafik yang berpengaruh terhadap persebaran tersebut adalah ...</p>', '<p>kelembaban udara</p>', '<p>kandungan humus</p>', '<p>ketinggian wilayah</p>', '<p>suhu udara</p>', 'B', 'Latihan', NULL, '2021-03-09 23:00:47', '2021-03-09 23:00:47'),
	(53, 5, '<p>Perhatikan gambar berikut ini:</p>\r\n\r\n<p><img alt="PAS Geografi kelas 11" src="https://www.ruangguru.com/hs-fs/hubfs/Latihan%20Soal%20Penilaian%20Akhir%20Semester%20Geografi%20Kelas%2011%20Tahun%202019.png?width=600&amp;name=Latihan%20Soal%20Penilaian%20Akhir%20Semester%20Geografi%20Kelas%2011%20Tahun%202019.png" style="height:150px; width:425px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tipe fauna yang bertempat tinggal pada wilayah X adalah ...</p>', '<p>australis</p>', '<p>peralihan</p>', '<p>oriental</p>', '<p>neotropik</p>', 'C', 'Latihan', NULL, '2021-03-09 23:02:17', '2021-03-09 23:02:17'),
	(54, 5, '<p>Sumber daya alam di dunia terbagi menjadi dua jenis, yaitu sumber daya alam yang dapat diperbarui dan yang tidak dapat diperbarui. Salah satu sumber daya alam yang dapat diperbarui adalah air. Hal ini disebabkan oleh ...</p>', '<p>air mengalami siklus hidrologi</p>', '<p>air dapat diciptakan oleh manusia</p>', '<p>air mengalir dari hulu ke hilir</p>', '<p>air dapat ditampung sehingga tidak akan pernah habis</p>', 'A', 'Latihan', NULL, '2021-03-09 23:03:14', '2021-03-09 23:03:14'),
	(55, 5, '<p>Luas terumbu karang di Indonesia mencapai sekitar 18% dari luas terumbu karang di dunia. Fungsi ekologis dari terumbu karang ini adalah ...</p>', '<p>sebagai sumber makanan bagi manusia</p>', '<p>sebagai objek wisata bahari</p>', '<p>sebagai bahan baku perhiasan</p>', '<p>mengurangi hempasan gelombang laut</p>', 'D', 'Latihan', NULL, '2021-03-09 23:04:23', '2021-03-09 23:04:23');
/*!40000 ALTER TABLE `soal_pilgans` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.tugass
DROP TABLE IF EXISTS `tugass`;
CREATE TABLE IF NOT EXISTS `tugass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mapel_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `mapel_id` (`mapel_id`),
  CONSTRAINT `tugass_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table galuh.bikinaplikasi.dev.tugass: ~5 rows (approximately)
DELETE FROM `tugass`;
/*!40000 ALTER TABLE `tugass` DISABLE KEYS */;
INSERT INTO `tugass` (`id`, `mapel_id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 5, 'Tugas 1', 'Cari pengertian dan penjelasan tentang kerak bumi', '2021-02-09 21:28:17', '2021-02-09 21:28:17'),
	(2, 6, 'Tugas 1', '-', '2021-02-10 21:25:52', '2021-02-10 21:25:52'),
	(3, 8, 'Tugas 1', 'Tugas kelompok memahami makna pancasila', '2021-02-10 21:29:07', '2021-02-10 21:29:07'),
	(4, 9, 'Tugas 1', 'Latihan membaca puisi', '2021-02-10 21:30:33', '2021-02-10 21:30:33'),
	(5, 5, 'Tugas 2', 'Kumpulkan data tugasnya disini', '2021-03-09 22:08:33', '2021-03-09 22:08:58');
/*!40000 ALTER TABLE `tugass` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.tugas_details
DROP TABLE IF EXISTS `tugas_details`;
CREATE TABLE IF NOT EXISTS `tugas_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tugas_id` int(11) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `tugas_id` (`tugas_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tugas_details_ibfk_1` FOREIGN KEY (`tugas_id`) REFERENCES `tugass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table galuh.bikinaplikasi.dev.tugas_details: ~5 rows (approximately)
DELETE FROM `tugas_details`;
/*!40000 ALTER TABLE `tugas_details` DISABLE KEYS */;
INSERT INTO `tugas_details` (`id`, `tugas_id`, `user_id`, `link`, `file`, `created_at`, `updated_at`) VALUES
	(1, 2, 400, NULL, 'file/absen x ips 1.jpg', '2021-02-11 18:11:33', '2021-02-11 18:11:33'),
	(2, 1, 342, NULL, 'file/struktur organisasi.jpg', '2021-02-11 18:15:25', '2021-02-11 18:15:25'),
	(3, 4, 342, NULL, 'file/background2.png', '2021-02-11 22:08:10', '2021-02-11 22:08:10'),
	(4, 5, 342, NULL, 'file/anum-3 metode.xlsx', '2021-03-09 22:13:47', '2021-03-09 22:13:47'),
	(5, 3, 342, NULL, 'file/anum-3 metode.xlsx', '2021-03-09 23:15:34', '2021-03-09 23:15:34');
/*!40000 ALTER TABLE `tugas_details` ENABLE KEYS */;

-- Dumping structure for table galuh.bikinaplikasi.dev.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_id` bigint(11) unsigned DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('admin','guru','siswa') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif','pindah') COLLATE utf8_unicode_ci NOT NULL,
  `no_identitas` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=575 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table galuh.bikinaplikasi.dev.users: ~234 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `kelas_id`, `nama`, `email`, `no_hp`, `password`, `level`, `status`, `no_identitas`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 7, 'admin', 'admin@gmail.com', '082282692489', '$2y$10$OKSISKSviAoX1v4NUx8OruPzibKy0sVzRjyDNcdonFrUo7UT1LmS.', 'admin', 'aktif', NULL, 'foto/man-3.png', '2020-08-28 19:17:03', '2021-02-09 17:39:12'),
	(342, 4, 'AGNES NOVITA ANGGRAJNI', 'siswa1@gmail.com', '000000000000', '$2y$10$8ISQxNsF1viKGtjwCbzqTOF85sh0/UnKlw/IOml8QNEeUjJK6kHqe', 'siswa', 'aktif', '0045254626', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(343, 4, 'ALIEF HAFIDZ ROBBANI', 'siswa2@gmail.com', '000000000000', '$2y$10$XxM2pGZxKD713AviftMR9uh2Uu/civ1mdfvo4eZqrdNbgLZIcOapy', 'siswa', 'aktif', '0044467976', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(344, 4, 'Andre Ardika', 'siswa3@gmail.com', '000000000000', '$2y$10$LtZGQY7yNRCSsjltdIVFnuhtWgxX9OAtlRFd/yunecjB1BjqMCEFO', 'siswa', 'aktif', '0054703813', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(345, 4, 'Chindy Maulia Vidiana', 'siswa4@gmail.com', '000000000000', '$2y$10$qYW/84CF56r6ql05kENGveywph2/civ4pgvDSZGLB1YGnHvJB0SuS', 'siswa', 'aktif', '0050991731', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(346, 4, 'DESMITA ANGELIN A', 'siswa5@gmail.com', '000000000000', '$2y$10$X1IkokSn0alvTkYtchPbf.G3CsppFGj/4ZeKVT8xAt1w13Z9oaMRS', 'siswa', 'aktif', '0061518692', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(347, 4, 'DIFA KHAIRUNNISA', 'siswa6@gmail.com', '000000000000', '$2y$10$USfke/HM4/XkAVQ5sXshLukCI.w7nxuq8AkK8KnRRCN8GkWOizToq', 'siswa', 'aktif', '0054610381', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(348, 4, 'Dimas Bagas Prasetyo', 'siswa7@gmail.com', '000000000000', '$2y$10$Pd16egYTBeOGO9YaXrjvCuTBBBLvNQsFk5LZdlCgLbPupF0dcyXA.', 'siswa', 'aktif', '0051029684', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(349, 4, 'EOO SAPUTRA', 'siswa8@gmail.com', '000000000000', '$2y$10$MK0J.gsXcJdYk4TbJYSWV.n4UlWNq3rCszotXCGIcDga7W77XB4ca', 'siswa', 'aktif', '0054031839', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(350, 4, 'Farhan Bayu Syafutra', 'siswa9@gmail.com', '000000000000', '$2y$10$hV/rSUKs6Lfqt43X5D3KA.o.Is/A8GLkWTVdZVdM1tefEN334L/qK', 'siswa', 'aktif', '0044317475', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(351, 4, 'Fikri Kamil', 'siswa10@gmail.com', '000000000000', '$2y$10$We.Kt3WnRJApMvD5319.8Oy9spiL4wh3JPivOk9f.COSFb9eurAe.', 'siswa', 'aktif', '0059392313', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(352, 4, 'Fiorenzi Natasya', 'siswa11@gmail.com', '000000000000', '$2y$10$7xk0xviwudXE1DKSqsgby.a5oGbeP4YVLxUYpe0.ujgQWmMc5JW2u', 'siswa', 'aktif', '0051950092', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(353, 4, 'Laura Sausan Lie', 'siswa12@gmail.com', '000000000000', '$2y$10$mPOK2az/KuRcPDOBJXU4x.cZeScasK5XAnXnpYZZQWn3ahM3Y1ZUi', 'siswa', 'aktif', '0051937748', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(354, 4, 'M Naufal Syahputra', 'siswa13@gmail.com', '000000000000', '$2y$10$eHe6hNPuefdmiRvdkt9eR.yQEqCqVG9CYHCYnMO5kohp07sxKG3fi', 'siswa', 'aktif', '0046059429', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(355, 4, 'M ROYHAN FEBRlANSYAH', 'siswa14@gmail.com', '000000000000', '$2y$10$CiITNc4usy31Q8L5cvW2Gefo5YJwiYOnCSG.hGO/WgextN5OCcilq', 'siswa', 'aktif', '0052756095', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(356, 4, 'MEYKY PUTRA UTAMA', 'siswa15@gmail.com', '000000000000', '$2y$10$kuN62Gh2QfKJCp8SdVNzmuFHyRKPGLB9Gu34RAhGMxzXYt.4wTpS6', 'siswa', 'aktif', '0063792994', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(357, 4, 'Nabila lndah Safitri', 'siswa16@gmail.com', '000000000000', '$2y$10$etlJO1ukunVuT3zHQQHjlOO3ueH6WUeJ73x8.74IxpKKiK133d1ES', 'siswa', 'aktif', '0059896697', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(358, 4, 'Michael Christofel Harungguan Sianipa', 'siswa17@gmail.com', '000000000000', '$2y$10$9Afls4f62EDT6M7kavPYL.0FiRULk5tkIw9hdikl7e8uEl2JwI5FW', 'siswa', 'aktif', '0052672121', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(359, 4, 'MOCHAMMAD RIVA FIRDAUS', 'siswa18@gmail.com', '000000000000', '$2y$10$Rqq4ajgJ8i6FQMw.y4TJZuxfhGHov.Nx7lTf74/Vcf3ejbIqK56Ta', 'siswa', 'aktif', '0066476430', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(360, 4, 'Muhammad Salman Afrizal', 'siswa19@gmail.com', '000000000000', '$2y$10$VIjQqp2457O1lGgq6Gl29ulBGlCVI34nVR/yf2m1uZeywfuxyZo7W', 'siswa', 'aktif', '003052280604', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(361, 4, 'Rahrni Priani', 'siswa20@gmail.com', '000000000000', '$2y$10$IG4MTv2YNEux/nWxeS5WNeac4IVwDEq8sbn8s1wxqENS.Q3kiT10y', 'siswa', 'aktif', '0057513793', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(362, 4, 'Rais Hakim Latifadran', 'siswa21@gmail.com', '000000000000', '$2y$10$fcSFB8HVcPX1hEqOz34pK.HxlSrFo5Y/qOouGBpQCfUCbzI5sfz9u', 'siswa', 'aktif', '0054645280', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(363, 4, 'RANGGA DERI FADILAH', 'siswa22@gmail.com', '000000000000', '$2y$10$i0pagH8I3ejeF5f6JfpPBOCVXC8/GcQbj0s2kmr7Y.9ZZErnUSXNe', 'siswa', 'aktif', '0043666646', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(364, 4, 'REVAN NOVERDI', 'siswa23@gmail.com', '000000000000', '$2y$10$Us7B6ED3TNMEaNTgE3cTBu7kWI.bLmiDGZToPZ3Dp0Xmx/LJMOT4O', 'siswa', 'aktif', '0051955249', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(365, 4, 'ROSA AMELIA', 'siswa24@gmail.com', '000000000000', '$2y$10$Z3G4Pq.V8fVhPTe7MTJcV.VKYNoOxhhA0hLNeRw3oOqR6.PPRzvxK', 'siswa', 'aktif', '0051471394', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(366, 4, 'Salwa Khairatunnisa', 'siswa25@gmail.com', '000000000000', '$2y$10$sngklUT5gtb0f/VyTjt4luFBrNfJyFfk/Vh1M25COJLMglN03KtpS', 'siswa', 'aktif', '003069843443', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(367, 4, 'Slamet Noven Vrediraya', 'siswa26@gmail.com', '000000000000', '$2y$10$JOWG08x.TwyrY0EiMax6M.DqBC2mLy1F9P6RTlAD7q/JtUX3MH1Hq', 'siswa', 'aktif', '0045720217', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(368, 4, 'Swasti Hanafiah Sukma', 'siswa27@gmail.com', '000000000000', '$2y$10$vC1zxN1O2/mswqrTDiIdrOD1.qp6WgVvs53UwMtv5MNGrAHeJEOBG', 'siswa', 'aktif', '0050991669', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(369, 4, 'TIURMA TAMBA', 'siswa28@gmail.com', '000000000000', '$2y$10$C33xPsuVq5o3mi463V6squLUu4gpNunOJSjiV3FGce11axXXt2Ur.', 'siswa', 'aktif', '0041238793', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(370, 1, 'ADAM ZUHRI RAMADHAN', 'siswa29@gmail.com', '000000000000', '$2y$10$ePq2SQdw24m8GwVE.8YyBuWU20iDKhMH.wBrPoAbntPhy7RQVsIqi', 'siswa', 'aktif', '0050932717', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(371, 1, 'Ade Putra', 'siswa30@gmail.com', '000000000000', '$2y$10$s36YUXx9X3kpADx560ovx.cgSHY47eoHgNcMMdhmyPdPd1keL0hLO', 'siswa', 'aktif', '0021086100', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(372, 1, 'AFlNA BETA ROSADA', 'siswa31@gmail.com', '000000000000', '$2y$10$q7n7g2BZd.qEmj5WNUfeguHw6F4DRKexbs.zrZCW/9rpct8ZwOyPi', 'siswa', 'aktif', '0051282882', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(373, 1, 'Ahmad Dz.akki Nafiis Naaifah', 'siswa32@gmail.com', '000000000000', '$2y$10$m4az16H49LiGnq0tH.b7POqGBf9MMsl1cX2mHdtyg9aVA0JvIhM1y', 'siswa', 'aktif', '0051366896', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(374, 1, 'Arif Ananda Budi Utama', 'siswa33@gmail.com', '000000000000', '$2y$10$cQoEgidubTOFV9yw56Hh2OJ21l3ozigIYWadoh6SiiBpopWcAH9CC', 'siswa', 'aktif', '0042676406', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(375, 1, 'BESSEK HAFIZOHTUL ADAWIYAH', 'siswa34@gmail.com', '000000000000', '$2y$10$abhfUsCZAqIk4dvRC.52Reu3V0JEjcp0GifXVPG0dTtes.H0K8K3.', 'siswa', 'aktif', '0050992020', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(376, 1, 'BETA THERESIA', 'siswa35@gmail.com', '000000000000', '$2y$10$cLtekEBdawXSbxYZiZs.C.2MmYU2h5lnso2Hjk/MqS7JJOTzvbXya', 'siswa', 'aktif', '0051591405', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(377, 1, 'DAWAR DIANA', 'siswa36@gmail.com', '000000000000', '$2y$10$USFlPRePktU3rT/ISnxY0OGFaGjUpbgJFV2k9CFUg.ELm1CrkChZq', 'siswa', 'aktif', '0058467652', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(378, 1, 'Defara Oda Raluna Aldora', 'siswa37@gmail.com', '000000000000', '$2y$10$elKVnmwR2W/p7E2wvFs3t.1ki1y2HuiQkn6OYrYi9umLZN21N4hH.', 'siswa', 'aktif', '0051254039', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(379, 1, 'Fauzil Adhim lnnaka Kunta Rahmadta', 'siswa38@gmail.com', '000000000000', '$2y$10$1XzCHR7OD9q6pIqNpsa9EeW.VpsaIv.fRau/2LhSfTUtITFUG2khS', 'siswa', 'aktif', '0058067135', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(380, 1, 'Ferdy Rahmatul Jannah', 'siswa39@gmail.com', '000000000000', '$2y$10$d46pSZn7UzTnHrJECt1wyePIekS35KBi1k8OyhnTYLprdmI.F0Nhm', 'siswa', 'aktif', '0060173347', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(381, 1, 'Gita Florensia Enjeli', 'siswa40@gmail.com', '000000000000', '$2y$10$Ft4LuuxQ8xRLnQgLcVS15OoxuiaywkXznWaFnC/2.d.Cnu3lnzt8K', 'siswa', 'aktif', '0052553351', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(382, 1, 'JENIKA HELENDA', 'siswa41@gmail.com', '000000000000', '$2y$10$vUuyhhCuIUcRxzYrTd8X9u2FXg3i6W61IY5Gd1He3PO.ZLTt8zB/a', 'siswa', 'aktif', '0051916714', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(383, 1, 'Jihan Naura', 'siswa42@gmail.com', '000000000000', '$2y$10$kwI1xnMQ8XfroOATHvtg6ezWOAmEuE6oJO0IsNtsPf21gPMCmfryO', 'siswa', 'aktif', '0051295500', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(384, 1, 'Joseph Dionysius Manullang', 'siswa43@gmail.com', '000000000000', '$2y$10$20GgVNlpB6HRb0IdOhoosuEQ9tKZt1FyVyNnaUyhezuy7iyCSvsFy', 'siswa', 'aktif', '0046195182', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(385, 1, 'Marselina Novianti', 'siswa44@gmail.com', '000000000000', '$2y$10$Nuil99zxM4BFHSDnnzP0v.uv75RkOrtSTczPY0iaMCE9mlSOYgOsa', 'siswa', 'aktif', '0057898037', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(386, 1, 'Muthiah Salma H', 'siswa45@gmail.com', '000000000000', '$2y$10$5FGpGQC4FlCkRUxgCmFRPewcKL6yu01913EPhp81X6Nie9SpgH2DW', 'siswa', 'aktif', '0053813678', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(387, 1, 'Nabila Saskia', 'siswa46@gmail.com', '000000000000', '$2y$10$fhJ83DrVcZMvmA7/20mG2elxf2aQ60euTRp.2RO0mcEEa1.6s0pWK', 'siswa', 'aktif', '0052878365', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(388, 1, 'NAYLA  SARI RAMADHANIA', 'siswa47@gmail.com', '000000000000', '$2y$10$5xpY4Lr8oCSJUc7dWnhkUOyqFjo.l12k77Y/KAxcwv9vLby/m/X6G', 'siswa', 'aktif', '0050992052', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(389, 1, 'NIKEN PEBRIANTI', 'siswa48@gmail.com', '000000000000', '$2y$10$1AKr1EiLnjmN2SHSacfrXOBaypD2defSfTZv5OUXaH1KjyMFM1FKm', 'siswa', 'aktif', '0052175856', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(390, 1, 'Pradinda Wulandari', 'siswa49@gmail.com', '000000000000', '$2y$10$m/H2SX0a8vWE7twkAVE1DuwaonANo/TtN99i6LxODvok/YARn67Ai', 'siswa', 'aktif', '0041776060', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(391, 1, 'PUTERI  AMANDA', 'siswa50@gmail.com', '000000000000', '$2y$10$SorAuPDKsCQ5HXoe43CpK.iIiE4taB2MFFL9CxL6L32ilqjnXYxei', 'siswa', 'aktif', '0050992066', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(392, 1, 'Radatul Mawardah', 'siswa51@gmail.com', '000000000000', '$2y$10$Mkv5QADqORZrZopGsR2kgeUANmxqMXqmSv3hn9BC8/YQW6DNHHmjy', 'siswa', 'aktif', '0052230570', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(393, 1, 'RAKA SHIWIE D\'AMORE FIRDAUS', 'siswa52@gmail.com', '000000000000', '$2y$10$uCF9tgDUWhwOho6oE59rpeFU8V3/P.onRLQPcSmfwqIRmG.H9nbT.', 'siswa', 'aktif', '0050992036', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(394, 1, 'Riski Febri Diana', 'siswa53@gmail.com', '000000000000', '$2y$10$NfXhfXrPR2RLox/t0XAose5XZ52mS6KJL5HSsJyUebY3jSC1dSmWa', 'siswa', 'aktif', '00-', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(395, 1, 'SALWA ANANDA', 'siswa54@gmail.com', '000000000000', '$2y$10$Pbu9ud6gGVdBuvFPhB8Wb.hyO2duKV05Wd7svdNlG3LEKqJn/EQAW', 'siswa', 'aktif', '0065822717', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(396, 1, 'Syifa Khoirunnisa', 'siswa55@gmail.com', '000000000000', '$2y$10$gBrdeLYxOk15LwUdzsuIUuOg5EnnmxV.McFOwCCVywzQ.OZVWgjGK', 'siswa', 'aktif', '0051472799', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(397, 1, 'Tiara Nabila Wijaya', 'siswa56@gmail.com', '000000000000', '$2y$10$bNXowHNy64unkXklpdolT.bREBOl8cjF0B5SdQQs0oRPTLNkS4Vd6', 'siswa', 'aktif', '0055306128', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(398, 1, 'WANDIANSYAH', 'siswa57@gmail.com', '000000000000', '$2y$10$oF0e8H8OXHNhf0pA.SBLX.z2mgR/4TprGkihfj/UskGI3eV8ynKRy', 'siswa', 'aktif', '0059329734', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(399, 1, 'Yesika Zennetti Simanjuntak', 'siswa58@gmail.com', '000000000000', '$2y$10$a8C0ulbXb0nRaQue6QHVXes2wyH0ETccnpHrZSukEF1mFtjcEtXC6', 'siswa', 'aktif', '0053547192', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(400, 11, 'Alya Gunawan', 'siswa59@gmail.com', '000000000000', '$2y$10$RJgfvPQ1JxdWjGM0xTAeouPFCHlFpHsTSQD.1uymbq6n/uvzEYOE2', 'siswa', 'aktif', '0043279103', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(401, 11, 'Amelia Stephani Marpaung', 'siswa60@gmail.com', '000000000000', '$2y$10$1kIGIYjV7ytX2EGUPHp7P.sVrpiWixIY0R.qS6Ytt4olX1Rgv5ll6', 'siswa', 'aktif', '0041276152', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(402, 11, 'ANDI HERAWATI', 'siswa61@gmail.com', '000000000000', '$2y$10$zpIJRyTyfnVSe0nL9bPkwOxkpxKEzogBHX/22a/kUqNMbYQZ/OPly', 'siswa', 'aktif', '0035117632', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(403, 11, 'ANGGIA JELITA', 'siswa62@gmail.com', '000000000000', '$2y$10$NuKvKKXXaR0r6kjrY.k4eOGfJF22/Iogs30Unl7vTWsKhFatA6VB6', 'siswa', 'aktif', '0040816678', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(404, 11, 'arya candra kanta iswandi', 'siswa63@gmail.com', '000000000000', '$2y$10$/nlWGzoBBs.y4gxaBgi/p.pbNNRhjaAmRvsqYKAU0X2.ASsug2NIW', 'siswa', 'aktif', '0057464283', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(405, 11, 'Azhi Ridho Al Qowi', 'siswa64@gmail.com', '000000000000', '$2y$10$lnxhQ9QN8zm.Eqk5dikSkuC13ECh0iCqUXOgE.2274dVyJYfqB7gS', 'siswa', 'aktif', '0027912421', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(406, 11, 'Dea Ananda Putri', 'siswa65@gmail.com', '000000000000', '$2y$10$WiJnPOA1uOnqlHH3cNuZ4OHpckEJJZYhJXzUQPRzxSegd/h0Ig2m2', 'siswa', 'aktif', '0040816767', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(407, 11, 'Deasy Triana', 'siswa66@gmail.com', '000000000000', '$2y$10$h/7Sjz2FwA1Igcr2YE3iMeDl.uPZhhdQjVpKjpcugyvkrJX41abXO', 'siswa', 'aktif', '0044492974', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(408, 11, 'Denada Aura', 'siswa67@gmail.com', '000000000000', '$2y$10$OWSkR.nkvDnHrJVt9qvT1uSX5HVvNk98cG1o4oA24fKY5Ujk/ZkUu', 'siswa', 'aktif', '0041733110', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(409, 11, 'Dini Amelia Puteri', 'siswa68@gmail.com', '000000000000', '$2y$10$nysnov0OftSR7bRddiF.auo0DD6kcgIzKfJQRzBDbWAgTof8bX.a2', 'siswa', 'aktif', '0042676234', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(410, 11, 'DOLI KURNIAWAN RAMBE', 'siswa69@gmail.com', '000000000000', '$2y$10$BgCZTTxH6f1OcUn22P75/eWNF1q9AKPR2tZRzzxyANNYlXx0jK5gG', 'siswa', 'aktif', '0042078571', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(411, 11, 'DWI PRIHATINI', 'siswa70@gmail.com', '000000000000', '$2y$10$li9oYn2TeM1pvw8Efhb4yOqkE1ILRZmsDMMBKCIcFfycpSRzqDVvG', 'siswa', 'aktif', '0043266274', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(412, 11, 'ENJELIKA', 'siswa71@gmail.com', '000000000000', '$2y$10$46RUrja5OuuFu90oouSG5.EuxjaCzDxaZh81OKfiJlV5lEqptN4Ci', 'siswa', 'aktif', '0036098481', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(413, 11, 'EVITA SARI', 'siswa72@gmail.com', '000000000000', '$2y$10$Y69jlTX7j4/ISt5mthyN5e1C5MhzIM4RDwZpBx7QhPoqJ/0FESb8q', 'siswa', 'aktif', '0040737596', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(414, 11, 'FADILA ANNAS APRIZA', 'siswa73@gmail.com', '000000000000', '$2y$10$iyZl9auYmjkViEknrJMh/uJQC7vbNsDYe7HGV3ptwOW2S8DalZmZe', 'siswa', 'aktif', '0040818300', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(415, 11, 'FEBY EMINATA SUKMA', 'siswa74@gmail.com', '000000000000', '$2y$10$JAPBt1nzIfQi/GUFhtKBf.M8BYPUtC1PsVlCbiKsCYDBAz5FbeXn6', 'siswa', 'aktif', '0040932275', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(416, 11, 'GLADYS TISHA SUSANTI LAIA', 'siswa75@gmail.com', '000000000000', '$2y$10$54EnHvbh1jEqq/VID.CLYuNmpnL4IdQLtyB3VMHzYZjbKF7o1F8Fq', 'siswa', 'aktif', '0044398320', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(417, 11, 'Haycal Zikri Ramdany', 'siswa76@gmail.com', '000000000000', '$2y$10$arcAVr5m7V6SlSwI1LQajuiwWtzuZ/8NmeNIMRpio4EE2r1Y6MsYu', 'siswa', 'aktif', '0031819228', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(418, 11, 'HEGEL SEPTI AJI KUSWOYO', 'siswa77@gmail.com', '000000000000', '$2y$10$ou1EKKujlrAo2YrPt1byAOsTrxspoXsZPCDGB7UZ2.u0pMxK9NubG', 'siswa', 'aktif', '0039922248', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(419, 11, 'HESTISIAHAAN', 'siswa78@gmail.com', '000000000000', '$2y$10$q5vhCmzGT.kDrMh0Ig/mrOvsC.EvDaI3ONqJS99Mk7ffosIyFJcoi', 'siswa', 'aktif', '0039662528', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(420, 11, 'Ica Septiani', 'siswa79@gmail.com', '000000000000', '$2y$10$cV7PBkWSFdzWDHhjSqFd8OMibpcwBNLL.ZFYrIssNNLMuLi/eBopq', 'siswa', 'aktif', '0041368570', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(421, 11, 'Indah Arum Sekar Wangi', 'siswa80@gmail.com', '000000000000', '$2y$10$hbguv4XiJKDMUBrOdusiauntBp3jA0ofkfcEGocliIZkmi41Re.em', 'siswa', 'aktif', '0036072759', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(422, 11, 'INDHANG AYU AGUSTINA', 'siswa81@gmail.com', '000000000000', '$2y$10$32snvZCrmwvhXatvmGC4se0JLSoSUFL2wIP74H4pYoQsLxmw24tbu', 'siswa', 'aktif', '0044420567', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(423, 11, 'IWAN DANIEL SIDABUTAR', 'siswa82@gmail.com', '000000000000', '$2y$10$ad36qvAicJXYGUUR5rgjDuAuo4VPG2t4lt0RmoUGDsybug53UcIJa', 'siswa', 'aktif', '0027384768', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(424, 11, 'M. AKBAR', 'siswa83@gmail.com', '000000000000', '$2y$10$IMO.Y7cq43TX2KpGOfeHde8SoZVACcLnScsLNGwJZFBPHBDDMVFf6', 'siswa', 'aktif', '0024036120', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(425, 11, 'M.Rifky Olanda Ramadhan', 'siswa84@gmail.com', '000000000000', '$2y$10$gZM5OJaSrquSkKJMKaYgWes3AbVh1Yb3r9YkzxYAgJp4dUkqDpYOy', 'siswa', 'aktif', '0043623978', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(426, 11, 'MARIA NAINGGOLAN', 'siswa85@gmail.com', '000000000000', '$2y$10$fdNsmHvIexH3VDuBsazjfOTgoMo4uigrv/5xUu.i.HDML6TGzLyMy', 'siswa', 'aktif', '0035385015', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(427, 11, 'MUHAMMAD FAHRI S', 'siswa86@gmail.com', '000000000000', '$2y$10$IBxNsXlhqJlq4/tQCK/EcOsABBfvfjI3lr0t6HChwt4j4vRFyFCeW', 'siswa', 'aktif', '0044432092', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(428, 11, 'Muhammad Haikal', 'siswa87@gmail.com', '000000000000', '$2y$10$sbfwc7QNpwHCEszTbd2z2.CUPkNmgoxeFiCnYW6h5eBdtwHNa5dzK', 'siswa', 'aktif', '0045368200', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(429, 11, 'Muhammad Lufhi Aldero', 'siswa88@gmail.com', '000000000000', '$2y$10$5O5HPfujZBA2W5NVWeSQseJSX3CQR59G9YlyBD67TvDhsAYZY1LpK', 'siswa', 'aktif', '0041515832', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(430, 11, 'MUHAMMAD ROMI ZALIANDRA', 'siswa89@gmail.com', '000000000000', '$2y$10$MFmdCb.qVHP2o9mPY.gK0OJEVIW/M6/k1uT/ue3Yzjv0mMuQxhqHC', 'siswa', 'aktif', '0046273169', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(431, 11, 'NANDO DIO SPINTE', 'siswa90@gmail.com', '000000000000', '$2y$10$BoUMml.TC5yIONbCLssmuejSzdBcw.0pn44KugvQQsR0KU0yF1qaq', 'siswa', 'aktif', '0046319880', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(432, 11, 'Putri Rahmadani Permata Sari', 'siswa91@gmail.com', '000000000000', '$2y$10$Pk7U9cZbnNjZI3p0Dx/MTuZndqhlopoqHzuiw/2ue05FCFyrg3jMC', 'siswa', 'aktif', '0042671992', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(433, 11, 'Rahmat Nur Ridho', 'siswa92@gmail.com', '000000000000', '$2y$10$DbxtYQ1hUyQJ/lsUVBjeu.LoXt95agvp..gz70pkJceECUpCI72ma', 'siswa', 'aktif', '0040459747', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(434, 11, 'Siti Ilhamiyah Damayanti', 'siswa93@gmail.com', '000000000000', '$2y$10$mxUfGX9/P6O.BAAhzLOhQOpqBp.nsPLgqaR0HrGZa/LhAcCpi9Gl.', 'siswa', 'aktif', '003038945171', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(435, 11, 'Vicky Frantino', 'siswa94@gmail.com', '000000000000', '$2y$10$hvGfuuYfShgS08RQY/29tek9iWWwA6pWTWoVSz2DLSHZfo0T87AXe', 'siswa', 'aktif', '0036454402', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(436, 7, 'ADELA RAHAYU', 'siswa95@gmail.com', '000000000000', '$2y$10$rwqHSDo4RvxP5gXEQxcUe.HKl8/HUxCw/36B41MDDP/BGvknXIbqO', 'siswa', 'aktif', '0042752793', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(437, 7, 'Alifa Indah Cahyani', 'siswa96@gmail.com', '000000000000', '$2y$10$9KU2gZPgztQ9z.eRWl/MmuwL3LNWGf29UuE4YkYDsUQ9RZhRdteXS', 'siswa', 'aktif', '0040995025', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(438, 7, 'Angelica', 'siswa97@gmail.com', '000000000000', '$2y$10$fq6XY4CxlCnw2TEr6IZIDuEqFcOl3EShuferbeFwNG40LCEAQzMHG', 'siswa', 'aktif', '0042676412', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(439, 7, 'Azratul Jannah', 'siswa98@gmail.com', '000000000000', '$2y$10$Dwk5Bkj4ANc4688FyDM5POpBZ5PT/zYKepPOjZ1vf1co2uTOrf01y', 'siswa', 'aktif', '0041174405', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(440, 7, 'Calvin Valentino Hariyanto', 'siswa99@gmail.com', '000000000000', '$2y$10$BUJg1jvtoEZA3D11QNc4Eek4y5QmOsgUpRpcw9FWgHth8FVCSWBOO', 'siswa', 'aktif', '0044273151', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(441, 7, 'DEVINDA INKA PUTRI', 'siswa100@gmail.com', '000000000000', '$2y$10$L31noDbhhhN21jMVv5wTaeH5J4JYej0bVLdgGtYsg2Zp/FEDcXjaW', 'siswa', 'aktif', '0042352407', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(442, 7, 'Dianty Ramadhanis Camarochmi', 'siswa101@gmail.com', '000000000000', '$2y$10$u76P6MW.pY7ipQnuJKfjq.qLtpYGDQ5XJCOT1hwZelzW9OXuwvuI.', 'siswa', 'aktif', '0041318905', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(443, 7, 'DIMAS PRASETIO ARDI', 'siswa102@gmail.com', '000000000000', '$2y$10$jUsSo5YUxu.SqjZE9aB46O6Q.lDhLLfljfgOyqR4DUeMMv7Ye2eUy', 'siswa', 'aktif', '0041319433', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(444, 7, 'Dinar Ramadhani', 'siswa103@gmail.com', '000000000000', '$2y$10$PtfHg7UShooS6/qk3TDOcug2eFfxV26w/986r8SAAHcNPRtNbWBc6', 'siswa', 'aktif', '0042352402', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(445, 7, 'ENDRU SILALAHI', 'siswa104@gmail.com', '000000000000', '$2y$10$WLEWNreKMpJL16vtwp4S/.Q5XXe86Ao/tsYn6n0mXOBAyC5o.8/ku', 'siswa', 'aktif', '0040816739', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(446, 7, 'Febrio Ardiansyah', 'siswa105@gmail.com', '000000000000', '$2y$10$IyLl/fa1N9IYxFL//Elc9eg7/ifpaGLF8lii2sQCVAM6vWbDyNZda', 'siswa', 'aktif', '0040994995', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(447, 7, 'Fidini Tasya Innaka Sianipar', 'siswa106@gmail.com', '000000000000', '$2y$10$1rYcOo6tuLyXCDfAw49u0uHf5UQ1jjHFen.TYhqugeVRwsL5v08uC', 'siswa', 'aktif', '0043431497', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(448, 7, 'Jessica Maranatha Tambun', 'siswa107@gmail.com', '000000000000', '$2y$10$XBmub/ChrZ6yDwkCV0QOM.AjnQqmg.a0GaYbrt7R5l35tGsmqANWm', 'siswa', 'aktif', '0042992921', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(449, 7, 'JUWITA SHINTA MORA SAGALA', 'siswa108@gmail.com', '000000000000', '$2y$10$dax5j33pzrkfmwfNorAh/OXuYhyykD6RkCQXJwk3VDV42u5UnPCy6', 'siswa', 'aktif', '0043569647', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(450, 7, 'Khaza Echy Fransiska', 'siswa109@gmail.com', '000000000000', '$2y$10$uGeUwIwKvhAri5rZcQeDGeLtbgUMORqsv9IwsMkahZbbSnLcHSL3O', 'siswa', 'aktif', '0043474459', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(451, 7, 'LATHIFA NAJWA', 'siswa110@gmail.com', '000000000000', '$2y$10$XhR96ZrTu.I9MvWKliOpvO1EHXX4p5vSF/EJGp9AEdBSqTLebYWd2', 'siswa', 'aktif', '0041033420', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(452, 7, 'M. Al-Fadli', 'siswa111@gmail.com', '000000000000', '$2y$10$wvU6hLG/E4O3tH.NmP6kb.fifiSAAz6dBRG2HFlkFqjiTn60uRMNK', 'siswa', 'aktif', '0040932301', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(453, 7, 'M.Surya Dharma Khazinatul Azror', 'siswa112@gmail.com', '000000000000', '$2y$10$uKP27vxP5cxNlKHrlEMDEuOLrdWLmKwuBMbOf/O6KrMg./fP4A56.', 'siswa', 'aktif', '0056032242', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(454, 7, 'Muhamad Farhan Ali', 'siswa113@gmail.com', '000000000000', '$2y$10$DGy0qzBKMqnSdz7XaF7zKOHxqmD9fOMkeMGLN1Psj8eDAK0pAvun2', 'siswa', 'aktif', '0041318609', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(455, 7, 'Muhammad Audrie Avandra', 'siswa114@gmail.com', '000000000000', '$2y$10$gV/ApWlyyszO4Rx2NKw8QuSGwA7moQOze4b7GjT.L8BMRSTHt2Ema', 'siswa', 'aktif', '0048705219', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(456, 7, 'Muhammad Irfan Trinugroho', 'siswa115@gmail.com', '000000000000', '$2y$10$LRSob9dOv6df9WNAd2R1N.m9/WhIf.qwNuuXgfFOjEi9k8rWVOp0m', 'siswa', 'aktif', '0035305520', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(457, 7, 'MUHAMMADSYAFIQ ABRAR HARAHAP', 'siswa116@gmail.com', '000000000000', '$2y$10$A52ynrWFuODXPXXo5USy1OScZYOWXIDt4muWYt5zdjEGUDzyBY2Du', 'siswa', 'aktif', '0043271378', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(458, 7, 'MUHAMMAD ZIDANUL IHSAN', 'siswa117@gmail.com', '000000000000', '$2y$10$9uPlFRUUHvQV/nvw7gyNreO.OLQDNWb5loz69h71dhAtyXEuZQOAq', 'siswa', 'aktif', '0044609074', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(459, 7, 'NANDA ARDANI HIDAYATULLAH', 'siswa118@gmail.com', '000000000000', '$2y$10$veT2WIzzUVRAi39FsSlwL.V2ouLCr0DjSUo6RQLyzwAF5hgu.zD5C', 'siswa', 'aktif', '0043416712', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(460, 7, 'RAFINAS SALSABILA NUR AZIZAH', 'siswa119@gmail.com', '000000000000', '$2y$10$HQu0HFIsFKtZ00IsiaY3weY1tUHEdyFXTSfo.q1tg1EuliFvZtojW', 'siswa', 'aktif', '0035270204', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(461, 7, 'Reyhan Hadi Putra', 'siswa120@gmail.com', '000000000000', '$2y$10$P0QZYa0.Sg1bqIloF2RdC.m5odKJsiMYiFzakho/pCPmQfaY2ag/u', 'siswa', 'aktif', '0038216379', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(462, 7, 'Tresia Br Tumorang', 'siswa121@gmail.com', '000000000000', '$2y$10$DcDzU18ZSjbgMDCscR2yZeFaff9HzJfdjFVDWT9cdWKc7otnbCb5a', 'siswa', 'aktif', '0043068767', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(463, 7, 'Vasya Falia Anandian', 'siswa122@gmail.com', '000000000000', '$2y$10$1hhJP3OkJ6CCzxMwpmbBY.OViJfYKgefqHUWEkCEnpljnVX95cJKS', 'siswa', 'aktif', '0041333730', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(464, 7, 'Vichra Yodza Iswenanda', 'siswa123@gmail.com', '000000000000', '$2y$10$mQhTMlxd.E4Yo0KlqFaU3eGCdQhWX//t8RpC7zvTuBBhw2aEJjhWO', 'siswa', 'aktif', '0041318270', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(465, 7, 'VIRA NINA LOLITA', 'siswa124@gmail.com', '000000000000', '$2y$10$8z5M8bOSdqHw.bnR2P8G1uKyEmZyirPzEpo34/gdobZV8dfF.lN/O', 'siswa', 'aktif', '0041611168', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(466, 17, 'ALFATH RISQULLAH', 'siswa125@gmail.com', '000000000000', '$2y$10$bCxNiAd7B3sjGbC1lT/tvePhh42Fte2LEQehaof88VeEGbq9IHKYa', 'siswa', 'aktif', '0040150131', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(467, 17, 'ANDREAN SEMBIRING', 'siswa126@gmail.com', '000000000000', '$2y$10$KLk99botqKInxO1dGrcfqeQRCzgJR2ImcgpiEeWia27fPnmUvws6O', 'siswa', 'aktif', '0031334416', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(468, 17, 'ANDREAS FAJAR SIMANUNGKALIT', 'siswa127@gmail.com', '000000000000', '$2y$10$KMN89Tdh71Lf.E5IQFH/YelI7X9h.weAGt8IpD5Q0aJXvqm86Iti6', 'siswa', 'aktif', '0036369773', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(469, 17, 'ANGGELINA SANTA SITANGGANG', 'siswa128@gmail.com', '000000000000', '$2y$10$FkePpTMR6y/9jla3hhArKeu84T.ETAPdPfXkdLFQeRHwO6sY2qWqy', 'siswa', 'aktif', '0023140003', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(470, 17, 'Angger Pratama', 'siswa129@gmail.com', '000000000000', '$2y$10$FCqGIZxl.FSpf8zkRS2m2OuFjZqSG7VdoqZOk6d6OiF/sS1TxkzTa', 'siswa', 'aktif', '0030815526', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(471, 17, 'Aryo Indra Syaputra', 'siswa130@gmail.com', '000000000000', '$2y$10$VrJW06lR8bi1yUr0n09kRudfWhPi4TN9TmbZOh3eA7sNorshHy65G', 'siswa', 'aktif', '0034434846', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(472, 17, 'BAYU SATRIA', 'siswa131@gmail.com', '000000000000', '$2y$10$Vm2PO/dx8hausxykKxJnCOU1RvnETj1fafIjEIISVoQPrMg9Y4Fdi', 'siswa', 'aktif', '0021153121', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(473, 17, 'Devi Aprianti', 'siswa132@gmail.com', '000000000000', '$2y$10$97ExieNkWXdGhobetBP6uuD4dtiPJqI2ccUUknlTaUsBdvddvd6HC', 'siswa', 'aktif', '0021038773', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(474, 17, 'DIO ANUGRAH', 'siswa133@gmail.com', '000000000000', '$2y$10$UOd1PMi7mKHPS9bIB0iXceLOe9Isgg.rmSptYIu402B0eVGxKbPCe', 'siswa', 'aktif', '0018097721', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(475, 17, 'Disriani', 'siswa134@gmail.com', '000000000000', '$2y$10$/Akrk7vOCk.EYoSELZUqyelgSCnpSQ2A/ro/FKBhMMVcS6VBdCey.', 'siswa', 'aktif', '0037549491', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(476, 17, 'DWI FEBRIAN PUTRA', 'siswa135@gmail.com', '000000000000', '$2y$10$7.JouNG.cofo/3xwjdlyq.aeImTgpNSj.vxjP9TzbVLXZVKhF7tcy', 'siswa', 'aktif', '0017548250', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(477, 17, 'ELVARA CHARANI', 'siswa136@gmail.com', '000000000000', '$2y$10$/b5PnzF.KPz5PdLAeWaFb.VSoQQfwWSSq87uUz.IAc88MxBY.PBcm', 'siswa', 'aktif', '0030996423', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(478, 17, 'Erhan Romadhan', 'siswa137@gmail.com', '000000000000', '$2y$10$nogfFWOrSSQ.uslLBUglLOoIIB96Z/goSC0WOeT3KgL9oXlAIu/s.', 'siswa', 'aktif', '0034650120', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(479, 17, 'ERIKA WAHYUNI', 'siswa138@gmail.com', '000000000000', '$2y$10$VexuPKWGh0hn2a3swEUpCuSS2p3L7zScU0hoOqd0CgMSbxE/ZyI0S', 'siswa', 'aktif', '0031731137', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(480, 17, 'FENI APRILLIANI', 'siswa139@gmail.com', '000000000000', '$2y$10$mg4AwQaXtSyLBjQf5fo86eE3xf.q.aAu0JvRGfSSdQcW0Td1wwBmK', 'siswa', 'aktif', '0032863997', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(481, 17, 'GALIH TRI SUTISNO', 'siswa140@gmail.com', '000000000000', '$2y$10$ATBbCymmdJyCFbRQ8zecbuFcVKmw2qpYjNV1LJvdZ6ulCTksAarsC', 'siswa', 'aktif', '0038728878', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(482, 17, 'Irfan Chandra', 'siswa141@gmail.com', '000000000000', '$2y$10$PwmnnZQKNvWO8OQ7LSipWOgva0q2C7jh.LJjYCYoFEFanPPyN/Kt6', 'siswa', 'aktif', '0032171603', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(483, 17, 'KANAYA THOHIRATUM MUAKHIRAH', 'siswa142@gmail.com', '000000000000', '$2y$10$.LHqIrloksKdfvliMlcVau4XXcpgJ3hz7FG6NGL/xSEMoJcOBWNU.', 'siswa', 'aktif', '0033567177', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(484, 17, 'Liska Oktaviani', 'siswa143@gmail.com', '000000000000', '$2y$10$Bx2/Vw4QmfRNVUyKClJOI.AzMX7RnmlcstapGlucLbJ4T7ahIPh0a', 'siswa', 'aktif', '0031651040', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(485, 17, 'LUSI PUTRI YANI SIHOMBING', 'siswa144@gmail.com', '000000000000', '$2y$10$HndbqU8gQCndqRinYoUg2.hMSqqhtOlR3ai38upIJoL9Oo9qZl7mO', 'siswa', 'aktif', '0025450403', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(486, 17, 'M. Al Fajri', 'siswa145@gmail.com', '000000000000', '$2y$10$KIkHb3JzD0l3oHvapMXsvuqi5uj6mAvIOTDPFkTzZ3S7iqNBBAV8e', 'siswa', 'aktif', '0023304980', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(487, 17, 'M. ALVIN AQBAR', 'siswa146@gmail.com', '000000000000', '$2y$10$Ioozy2hGXBFQawbpSZ3xGetHZJiqcjo3riwA1nwGvyHDgWNoEgmNy', 'siswa', 'aktif', '0031731110', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(488, 17, 'M. Fikry Irhaz', 'siswa147@gmail.com', '000000000000', '$2y$10$ZTq7500orBX66plHgj42zek9SFsxbupx6KgQ073CNUhwHpIKSc4LW', 'siswa', 'aktif', '0032019193', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(489, 17, 'MONA MARSI', 'siswa148@gmail.com', '000000000000', '$2y$10$9dly4ypx6xlfqYxwp5QaDuTtp/EU69s6r3JfHeOwxGgCGe.YwqIRy', 'siswa', 'aktif', '0020732879', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(490, 17, 'MUHAMMAD AFRIAN SAPUTRA', 'siswa149@gmail.com', '000000000000', '$2y$10$Bi19yey3Ccp/WzeSYKhpUeZUj5l2gB.vUoiz79doJEbFRaLDU7RQG', 'siswa', 'aktif', '0023014621', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(491, 17, 'Muhammad Arkan', 'siswa150@gmail.com', '000000000000', '$2y$10$ztAUmGj9MhtN6GkVwQUbVOKWW6orlfYUwNL9X.0Z3ddWE6nvpsxtC', 'siswa', 'aktif', '0037731584', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(492, 17, 'Muhammad Faisal', 'siswa151@gmail.com', '000000000000', '$2y$10$5dTN94nanPbiWaq1Kb5HsuQ5eJJa7JR/zyjH3xrNVkD1RVZ2gBU1u', 'siswa', 'aktif', '0040132462', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(493, 17, 'Nur Halim', 'siswa152@gmail.com', '000000000000', '$2y$10$AF2she4CC.4S65HgMyW8ne/JLEkZ7ZB9cn6zRbh7CuiabeDXyDkuu', 'siswa', 'aktif', '0030738092', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(494, 17, 'Rezki Ramadan', 'siswa153@gmail.com', '000000000000', '$2y$10$Ej6psXfiznb/b2XEl8ZzmukP/hp0CG0L444MPMpzA4JaQLNutpN2q', 'siswa', 'aktif', '004565460', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(495, 17, 'Rezqie Azzura', 'siswa154@gmail.com', '000000000000', '$2y$10$a1S1YOVwmvdNGAMLzXU7YeBlVQ9DpLQbq2KNSd2e2niSiZchtqdGe', 'siswa', 'aktif', '0033436121', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(496, 17, 'RIFKA CHAYA TITA INDAH', 'siswa155@gmail.com', '000000000000', '$2y$10$ShoyGBVKROhKj6KPjNxfBewgT6yslco3Haj7KLFhHreGkcJrNJIym', 'siswa', 'aktif', '007810740', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(497, 17, 'RIRIN APRILIA', 'siswa156@gmail.com', '000000000000', '$2y$10$83Ah/sUOKgoIo./fwXd7DO8fO8s5soI5q.nXsUb9GbLypZRmDlpKG', 'siswa', 'aktif', '0039692276', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(498, 17, 'SHAFFIYAH ZUHRA', 'siswa157@gmail.com', '000000000000', '$2y$10$NWgU3fWVChbKnMrN1gqiI.kGQN24Kb/XfH1WL2OZqbfO4ZG.q8Tlu', 'siswa', 'aktif', '0031891056', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(499, 17, 'Silvia Dwi Ariani', 'siswa158@gmail.com', '000000000000', '$2y$10$gX6oPcwugXAQmlJ3lC.SD.qIr4nrLhZ3b0EH2z7DMwH7PsQKkOFVm', 'siswa', 'aktif', '0021278342', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(500, 17, 'TEDDY DWI PRAYOGA', 'siswa159@gmail.com', '000000000000', '$2y$10$S0/njaed52nuZhv12G/Q/.O/z4HVU/eYLUiveq0hkMH9d07L29BGm', 'siswa', 'aktif', '0033632936', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(501, 17, 'Willvana Sibarani', 'siswa160@gmail.com', '000000000000', '$2y$10$i1o.f.MQSWWyRPyuZR5GtOj6pnbdaHIXqRRWcaTk6O9HSBGkt/HWq', 'siswa', 'aktif', '0032026924', '-', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(502, 14, 'Adieska Valensia Maharani', 'siswa161@gmail.com', '000000000000', '$2y$10$xJVz/0H7XDKcMbodpU2rVOq8EAcbb/yuZXaucFWpUyUhSpHEyXP5S', 'siswa', 'aktif', '0026112528', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(503, 14, 'Agum Wicaksana', 'siswa162@gmail.com', '000000000000', '$2y$10$F9einDrHKuHboteLlG7SUeWZxjRe/WIfY.Ik3d2O3xiXU8SVyjsZm', 'siswa', 'aktif', '0032170318', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(504, 14, 'Amir Dzaky', 'siswa163@gmail.com', '000000000000', '$2y$10$8qyP5DPrnR3A9lKSV9i6yuVXjwMCyMQ6gsoihzWRRvQ.XLeNFUjKi', 'siswa', 'aktif', '0036604030', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(505, 14, 'Arbiansyah Putra', 'siswa164@gmail.com', '000000000000', '$2y$10$Eqy9Uz.ftZugy79.inyR1u2N9YU8Sr8BPvCUYf3yzP6xvoxVOo0Cq', 'siswa', 'aktif', '0048576687', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(506, 14, 'ARMAN MAULANA', 'siswa165@gmail.com', '000000000000', '$2y$10$7.xghV5fo5aZtu3Jh1b6wuAqMbi62lsPkysrpjkCxoBkMjF2WGPMS', 'siswa', 'aktif', '0024438585', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(507, 14, 'Bulan Putri Lorena Jatmiko', 'siswa166@gmail.com', '000000000000', '$2y$10$6v/W.KzuuFNoUd0Sv.5OAe2ES8JIZMgO8Ure/nAqHNpvQWVm3BiS2', 'siswa', 'aktif', '0032170296', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(508, 14, 'DELFAN ANDRIANO', 'siswa167@gmail.com', '000000000000', '$2y$10$k8lxNqudm.b1WiKF9f8wU.CjAjyaypFf72nixP6hfZVUgzuvY7p0a', 'siswa', 'aktif', '0035365155', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(509, 14, 'DINDA RISKA WARDINTA', 'siswa168@gmail.com', '000000000000', '$2y$10$VD9n4U4ukXoZMs2BgJ5ofez2ZwmMtQo0PrvmMntyBtiodiBUGUTTS', 'siswa', 'aktif', '0040312066', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(510, 14, 'Gayuh Prabowo', 'siswa169@gmail.com', '000000000000', '$2y$10$pg73AFSldwvpCxsRrkx2iuyc.HdwkIVZHZo9knli1zr61eAN5xEPa', 'siswa', 'aktif', '0032170347', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(511, 14, 'GITA DESMAYATI', 'siswa170@gmail.com', '000000000000', '$2y$10$Zed0Go/vfq0F2AQ6dJcy2elYcXzDKeIYCkpZYkZk.6d4nuwAAaAd2', 'siswa', 'aktif', '0067693892', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(512, 14, 'GUSTIANI', 'siswa171@gmail.com', '000000000000', '$2y$10$Yf7Nn9tL5kcu5zN.WSPM4uZv35uTfmAfcEWBhLh757RTKyUQjHPPq', 'siswa', 'aktif', '0019018331', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(513, 14, 'HAIRUL AKBAR', 'siswa172@gmail.com', '000000000000', '$2y$10$6NddTsGHaLYxQUXxQrpw9eYoqXse7qzSfYaOg8hn2XCIfv1dpWfZ.', 'siswa', 'aktif', '0040119129', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(514, 14, 'Hendra Putra Utama', 'siswa173@gmail.com', '000000000000', '$2y$10$zMEeH3Pn66xRChOZWQwnDuLz7lY6PDSYdT73hQz/qLCZKIKqfdFSC', 'siswa', 'aktif', '0031690057', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(515, 14, 'INTAN', 'siswa174@gmail.com', '000000000000', '$2y$10$Gq0Py2NVzRuts.VArfRO2uClit70x33WVzZDTmismhq6ETsjX2Knu', 'siswa', 'aktif', '0032171620', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(516, 14, 'IRF FANSY MAULANA', 'siswa175@gmail.com', '000000000000', '$2y$10$fzdKLBWeoH6IhyKA0DFhO.kqeDz2shCJOvxwW3NJEqHejaxUJ2XxO', 'siswa', 'aktif', '0030676657', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(517, 14, 'JULIA SUSANTI', 'siswa176@gmail.com', '000000000000', '$2y$10$Bgw2p9MN5HHICBbAal96ieO.h7S32w0J4NTvZcoJxt5yygSp2YrMu', 'siswa', 'aktif', '0031891034', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(518, 14, 'KASWINATA', 'siswa177@gmail.com', '000000000000', '$2y$10$7NFAizL9dSyzZ7BAdgceX.SOll9ofywB0mfhsiYAKFZ96rV7UahO2', 'siswa', 'aktif', '0039504440', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(519, 14, 'LAILY DINDA SASKIA PUTRI', 'siswa178@gmail.com', '000000000000', '$2y$10$m7X34xLl2AasklzOH82QL.1WqvTE44lGMtS1nYZZht4EL42ZS7rpW', 'siswa', 'aktif', '0031297350', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(520, 14, 'MAULANA HARIN WICAKSONO', 'siswa179@gmail.com', '000000000000', '$2y$10$PmKDMwY.kYtrQQgusZ7Wjeul.AxzPuTRXWDLeuaW9Z3NjMAHb26Zq', 'siswa', 'aktif', '0032292504', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(521, 14, 'MEILYSA WINDI TRISILIAS', 'siswa180@gmail.com', '000000000000', '$2y$10$M/UwQxkpc6/58StCF9HjSOFTvXr9RfANOB4VfoPAzhLLAa92uk6Ni', 'siswa', 'aktif', '0031310821', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(522, 14, 'MERI HANDAYANI', 'siswa181@gmail.com', '000000000000', '$2y$10$NMorC0Y/zkm6iN4bXR/V9u.omWNpIuV14mhMk3kSBaqeKBUs1aX3K', 'siswa', 'aktif', '0025576656', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(523, 14, 'Miftahul Jannah', 'siswa182@gmail.com', '000000000000', '$2y$10$DLyoy7JkRs4RxPA7b2MowOE7mi7tEZNIK/KrWI2UAj3NkoEuAoIEC', 'siswa', 'aktif', '003025602604', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(524, 14, 'MIKHAEL FELIX PARULIAN SITUMORANG', 'siswa183@gmail.com', '000000000000', '$2y$10$EXU0i3VyBAndAZcY.vgn9uLvyScHVaKX2v6U200FaIpL71YyjkCtG', 'siswa', 'aktif', '0031513687', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(525, 14, 'Muhammad Fakhri Hamdi', 'siswa184@gmail.com', '000000000000', '$2y$10$eSRZLT5eDcKX647fN3Loke..6h/hKjykHvpYuyHtRXTGwBWMfNeoC', 'siswa', 'aktif', '0031937374', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(526, 14, 'Muhammad Naufal Risdianto', 'siswa185@gmail.com', '000000000000', '$2y$10$rWrqB/0BPsHIiyVTfAIYquRcvyBWx4whhx4YJgEbmDImp9o.7aBWa', 'siswa', 'aktif', '0038272631', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(527, 14, 'PITA EFRIYANTI', 'siswa186@gmail.com', '000000000000', '$2y$10$tstDOStLJejPi5SMc0LasOve6n7L5glrIq2au/QyyXPK7cGRCN90S', 'siswa', 'aktif', '003138977', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(528, 14, 'RISKY ANDRI PANGESTU', 'siswa187@gmail.com', '000000000000', '$2y$10$6ahVgufWgRE8tckMxTt5oO1hk7MgitLJ5XVQioTyrfzWT2G4ZPGLa', 'siswa', 'aktif', '0032413923', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(529, 14, 'Safna', 'siswa188@gmail.com', '000000000000', '$2y$10$41/FpwUrT/tshU5m/bJjOO7UxDXxou9ojF3vQXGJ138vRa4/h.4Je', 'siswa', 'aktif', '0034050258', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(530, 14, 'Septiriana', 'siswa189@gmail.com', '000000000000', '$2y$10$wgWv.zJu3tt4NYgTqnClqu6x2Q6wzqC4lbktpWy5IVF0KBnIahdqS', 'siswa', 'aktif', '0032133423', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(531, 14, 'SHELA SEPTIANA', 'siswa190@gmail.com', '000000000000', '$2y$10$45GHwZnsAAD1fn9mM3WzYudxwv.NJgn4eLVIAhhGpY/UaWMQ8PliC', 'siswa', 'aktif', '0028507094', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(532, 14, 'TARADIVA AURELLIA', 'siswa191@gmail.com', '000000000000', '$2y$10$la/.ZiUDBAH0.B5rN90xyuFOKAxoPyZeINp40fMtYJtq79Rzh9LJO', 'siswa', 'aktif', '0032214110', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(533, 14, 'TRI MALDINO, N', 'siswa192@gmail.com', '000000000000', '$2y$10$6Z6mhiISyy1awPbAn.L4fuV2TT1hAX7h3PsKBE6hpSM1aCx7poMm.', 'siswa', 'aktif', '0034297627', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(534, 14, 'Veriana Erfina Agale Pakpahan', 'siswa193@gmail.com', '000000000000', '$2y$10$SjcYv.i33kY3WMK1JtSjNeupWilXbqIJAossG9nicNhv87fwg/NwC', 'siswa', 'aktif', '0038403119', '', '2021-02-09 00:19:07', '2021-02-09 00:19:07'),
	(535, NULL, 'Dina Citra Resmi, S. Pd', 'guru1@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '-', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(536, NULL, 'Wahyuni Saputri', 'guru2@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '-', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(537, NULL, 'Aji Setiawan', 'guru3@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '-', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(538, NULL, 'Rawalsa Aguva', 'guru4@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '01547736741XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(539, NULL, 'Fitrianti.a', 'guru5@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '04387576593XXXXX', 'foto/woman.png', '2021-02-09 19:57:57', '2021-02-10 19:35:52'),
	(540, NULL, 'Esra Lumbantoruan', 'guru6@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '14367676681XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(541, NULL, 'Hendri', 'guru7@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '17367726731XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(542, NULL, 'Muhidin', 'guru8@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '17487516542XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(543, NULL, 'Widya Murba Ningsih', 'guru9@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '18637596612XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(544, NULL, 'Iqbal Fuady', 'guru10@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '23567706711XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(545, NULL, 'Syamsul', 'guru11@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '27597706721XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(546, NULL, 'Nurhasanah', 'guru12@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '28427576583XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(547, NULL, 'Desi Fitria', 'guru13@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '30557606613XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(548, NULL, 'Ema Handrianti', 'guru14@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '39347636642XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(549, NULL, 'Ali Sabri', 'guru15@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '41567546562XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(550, NULL, 'Dewi Okta Hendrisa', 'guru16@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '43537626633XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(551, NULL, 'Febrina', 'guru17@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '45357666671XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(552, NULL, 'Abdurrahman', 'guru18@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '46517616642XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(553, NULL, 'Candra Dwi Ayu Pangukir', 'guru19@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '47547716711XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(554, NULL, 'Zuriati', 'guru20@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '53597436443XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(555, NULL, 'Riri Dwi Ramadani', 'guru21@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '55497726721XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(556, NULL, 'Idhar Khaira', 'guru22@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '62587606612XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(557, NULL, 'Desi Gusdarti', 'guru23@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '65447626642XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(558, NULL, 'Rayuna', 'guru24@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '71387456483XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(559, NULL, 'Rini Artika', 'guru25@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '74407586593XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(560, NULL, 'Fhitrawati', 'guru26@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '75517466483XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(561, NULL, 'Ketaman Sihotang', 'guru27@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '78447476482XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(562, NULL, 'Sesillya Wardaningsih', 'guru28@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '79397606613XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(563, NULL, 'Rinaldy Putra Utama', 'guru29@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '80537716721XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(564, NULL, 'Agustarizal', 'guru30@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '81397476492XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(565, NULL, 'Nur Izzati Haq, S.pd.', 'guru31@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '81457746741XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(566, NULL, 'Anifaruzki Amalia', 'guru32@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '84367736741XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(567, NULL, 'Drs. Syaipudin', 'guru33@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '84407466482XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(568, NULL, 'Saipul Effendi', 'guru34@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '86597586592XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(569, NULL, 'Tasdik Husni Amri', 'guru35@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', '89487656661XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(570, NULL, 'Nurjanah', 'guru36@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(571, NULL, 'Nurul Efiza', 'guru37@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(572, NULL, 'Ardhi Muzammil', 'guru38@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(573, NULL, 'Muhamad Yusuf', 'guru39@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57'),
	(574, NULL, 'Amriadi', 'guru40@gmail.com', '000000000000', '$2y$10$Bih16o35h2oYNufHmsPE0.6zG3O8CLV6pqXLDh3iQjUEqrY1vQrsW', 'guru', 'aktif', ' XXXXX', '-', '2021-02-09 19:57:57', '2021-02-09 19:57:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
