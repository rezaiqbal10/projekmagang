-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tabmes
CREATE DATABASE IF NOT EXISTS `tabmes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tabmes`;

-- Dumping structure for table tabmes.kontruksi
CREATE TABLE IF NOT EXISTS `kontruksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paket_pekerjaan` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `output` varchar(200) NOT NULL,
  `outcome` varchar(200) NOT NULL,
  `penyedia_jasa` varchar(200) NOT NULL,
  `tahun_anggaran` int(5) DEFAULT NULL,
  `lain` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table tabmes.kontruksi: ~1 rows (approximately)
/*!40000 ALTER TABLE `kontruksi` DISABLE KEYS */;
INSERT INTO `kontruksi` (`id`, `paket_pekerjaan`, `lokasi`, `output`, `outcome`, `penyedia_jasa`, `tahun_anggaran`, `lain`, `created_date`) VALUES
	(1, 'combo extra', 'jakarta', '2', '3', 'jne', 2019, '6', NULL);
/*!40000 ALTER TABLE `kontruksi` ENABLE KEYS */;

-- Dumping structure for table tabmes.sda
CREATE TABLE IF NOT EXISTS `sda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paket_pekerjaan` varchar(200) NOT NULL,
  `penyedia_jasa` varchar(200) NOT NULL,
  `tahun_anggaran` int(5) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table tabmes.sda: ~2 rows (approximately)
/*!40000 ALTER TABLE `sda` DISABLE KEYS */;
INSERT INTO `sda` (`id`, `paket_pekerjaan`, `penyedia_jasa`, `tahun_anggaran`, `created_date`) VALUES
	(1, 'combo extra 3', 'ninja 2', 2020, NULL),
	(3, '1', '2', 2015, NULL);
/*!40000 ALTER TABLE `sda` ENABLE KEYS */;

-- Dumping structure for table tabmes.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('gudang','admin','manager') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table tabmes.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
	(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, '2a2d3270fafa1034a8a81d0d0072fcdc.png', 1),
	(7, 'Arfan ID', 'gudang', 'arfandotid@gmail.com', '081221528805', 'gudang', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568691611, 'user.png', 1),
	(8, 'Muhammad Ghifari Arfananda', 'mghifariarfan', 'mghifariarfan@gmail.com', '085697442673', 'gudang', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568691629, 'user.png', 1),
	(13, 'Arfan Kashilukato', 'arfankashilukato', 'arfankashilukato@gmail.com', '081623123181', 'gudang', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1569192547, 'user.png', 1),
	(14, 'wolfine', 'manager', 'desta@gmail.com', '083891385543', 'manager', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1582252069, 'user.png', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
