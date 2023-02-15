
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anggota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_induk` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `dibuat` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` VALUES (15,'6919','Aditia Avriza Pramudita','Laki - Laki','Jln. loteng Kota jambi','082189482812','Aktif','25-Feb-2021'),(16,'6920','Aditya Maryofa','Laki - Laki','Jln. Kaki Lima Kota Jambi','081356212211','Aktif','25-Feb-2021'),(17,'6968','Adrian','Laki - Laki','Jln. indah permai, Bulian','081321432165','Aktif','25-Feb-2021');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `stok` smallint(4) NOT NULL,
  `ditambahkan` varchar(12) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (7,'PHT003','Photoshop 3','Adobe Inc','Cakram Media',2010,'Jambi',50,'13-Jan-2021'),(11,'SRSM001','Sistem Rem Dan Suspensi Sepeda Motor','Joko Sriyanto','Saka Mitra Kompetensi',2010,'Bandung',13,'25-Feb-2021'),(12,'SRKR002','Sistem Rem Kendaraan Ringan','M. Yusron Raliman S.pd','PT Citra Aji Parama',2010,'Bandung',13,'25-Feb-2021'),(13,'MKE003','Mesin Konversi Energi','Budi maryono S.pd. ST. M.par','Mentari Pustaka',2010,'Bandung',20,'25-Feb-2021'),(14,'SRSSM004','Service Roda dan Suspensi Sepeda Motor','Arif Hidayatullah S.pd','Insania',2009,'Jakarta',13,'25-Feb-2021'),(15,'SEKSM005','Service Engine dan Komponen pada Sepeda Motor','Arif Hidayatullah S.pd','Mentari Pustaka',2009,'Jakarta',21,'25-Feb-2021'),(16,'SHSM006','Sistem Hidrolik Sepeda Motor','Arif Hidayatullah S.pd','PT Citra Aji Parama',2012,'Bandung',13,'25-Feb-2021'),(17,'K3LH007','Keselamatan Kesehatan Kerja Dan Lingkungan Hidup','Budi maryono S.pd. ST. M.par','Saka Mitra Kompetensi',2010,'Bandung',13,'25-Feb-2021'),(18,'SRS008','Air Bag Dan Safety Belt (SRS)','Budi maryono S.pd. ST. M.par','Saka Mitra Kompetensi',2012,'Jakarta',14,'25-Feb-2021'),(19,'SKKR009','Sistem Kopling Pada Kendaraan Ringan','Mohammad Tri Wahyudi S.pd','Skripta',2011,'Bandung',21,'25-Feb-2021'),(20,'SACLPWK010','Sistem Alarm Central Lock dan Power Windows Pada Kendaraan','Arif Hidayatullah S.pd','Insania',2010,'Bandung',13,'25-Feb-2021'),(21,'SAVK011','Sistem Audio Video Kendaraan','Arif Hidayatullah S.pd','Insania',2011,'Jakarta',14,'25-Feb-2021'),(22,'PPBK012','Perapat dan Peredam Body Kendaraan','Arif Hidayatullah S.pd','PT Citra Aji Parama',2011,'Bandung',14,'25-Feb-2021');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `detail_peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint(20) unsigned NOT NULL,
  `buku_id` bigint(20) unsigned NOT NULL,
  `status` enum('Dikembalikan','Belum Dikembalikan') NOT NULL DEFAULT 'Belum Dikembalikan',
  PRIMARY KEY (`id`),
  KEY `buku_id` (`buku_id`),
  KEY `peminjaman_id` (`peminjaman_id`),
  CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `detail_peminjaman` WRITE;
/*!40000 ALTER TABLE `detail_peminjaman` DISABLE KEYS */;
INSERT INTO `detail_peminjaman` VALUES (20,18,12,'Belum Dikembalikan'),(23,21,17,'Belum Dikembalikan');
/*!40000 ALTER TABLE `detail_peminjaman` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (2,'XI'),(7,'XII');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjaman` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint(20) unsigned NOT NULL,
  `user_petugas_id` bigint(20) unsigned NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `tanggal_pengembalian` varchar(12) NOT NULL,
  `status` enum('Berlangsung','Selesai') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `anggota_id` (`anggota_id`),
  KEY `user_petugas_id` (`user_petugas_id`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`user_petugas_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (18,15,1,'27-Feb-2021','06-Mar-2021','Berlangsung'),(21,16,1,'19-Feb-2021','26-Feb-2021','Berlangsung'),(22,17,1,'27-Feb-2021','06-Mar-2021','Berlangsung');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pengembalian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengembalian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint(20) unsigned NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `denda_terlambat` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_id` (`peminjaman_id`),
  CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pengembalian` WRITE;
/*!40000 ALTER TABLE `pengembalian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengembalian` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES ('G0JF2wxFj5muHdjZfwUkzIhmEn9vnI0afetfyEfZ',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36 OPR/74.0.3911.107 (Edition Campaign 34)','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU2lNM3A3dGlZTWpDYU1UekYxdHhERERXTkpiOXpiQ3J0YTk2Q254VyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvU0lNUFVTRGlwby9wdWJsaWMvcGVtaW5qYW1hbi9sYXBvcmFuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDNzVmtaRGhyNTE1b1Y5b1cyemQzNC5QOXZsbUJKNE5LaDQ2RHF3YS5KbGR3QWI3ZklZcGlLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQzc1ZrWkRocjUxNW9WOW9XMnpkMzQuUDl2bG1CSjROS2g0NkRxd2EuSmxkd0FiN2ZJWXBpSyI7fQ==',1614402304),('lr0fhDzHAcWJkuviaMhhg17pGNAPxovj6QdHwKgr',1,'10.35.248.100','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36 OPR/74.0.3911.107 (Edition Campaign 34)','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYVBHd1l6ZWs0NEFNaEtOVkVjNzZqQXJsVDFYVTlwTU9OUzhlSEkxUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9kaXBvLWNyaXN2YW5kb2xpLmhlcm9rdWFwcC5jb20vcGVtaW5qYW1hbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQzc1ZrWkRocjUxNW9WOW9XMnpkMzQuUDl2bG1CSjROS2g0NkRxd2EuSmxkd0FiN2ZJWXBpSyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkM3NWa1pEaHI1MTVvVjlvVzJ6ZDM0LlA5dmxtQko0TktoNDZEcXdhLkpsZHdBYjdmSVlwaUsiO30=',1614403159);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Petugas',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin 01','admin@gmail.com','$2y$10$3sVkZDhr515oV9oW2zd34.P9vlmBJ4NKh46Dqwa.JldwAb7fIYpiK','Admin'),(5,'Petugas','petugas@gmail.com','$2y$10$uTzi/kKW4pxz00ZMKtJe.eX8J9lXEvNM3KuGuOyGFAVhhYFE3xBpe','Petugas'),(6,'Petugas 02','petugas02@gmail.com','$2y$10$6EsMYOD4ohUToFH/yXRU6.bnx0F4X3qIRp2alKJfuQW8qMbNDtmdW','Petugas');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

