-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 07:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabmes`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontruksi`
--

CREATE TABLE `kontruksi` (
  `id` int(11) NOT NULL,
  `paket_pekerjaan` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `output` varchar(200) NOT NULL,
  `outcome` varchar(200) NOT NULL,
  `penyedia_jasa` varchar(200) NOT NULL,
  `tahun_anggaran` int(5) DEFAULT NULL,
  `biaya` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontruksi`
--

INSERT INTO `kontruksi` (`id`, `paket_pekerjaan`, `lokasi`, `output`, `outcome`, `penyedia_jasa`, `tahun_anggaran`, `biaya`, `created_date`) VALUES
(1, 'combo extra', 'jakarta', '2', '3', 'jne', 2019, '6', NULL),
(3, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', 'JAMBI', '1', '2', 'g', 2019, '12', NULL),
(4, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', 'Kab. Boyolali', '1', '2', 'Km', 2012, '12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sda`
--

CREATE TABLE `sda` (
  `id` int(11) NOT NULL,
  `paket_pekerjaan` varchar(200) NOT NULL,
  `penyedia_jasa` varchar(200) NOT NULL,
  `tahun_anggaran` int(5) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sda`
--

INSERT INTO `sda` (`id`, `paket_pekerjaan`, `penyedia_jasa`, `tahun_anggaran`, `created_date`) VALUES
(4, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi irigasi dan rawa', 'Dokumen', 2020, NULL),
(8, 'Bendung irigasi kewenangan Daerah yang dibangun', 'Bendung', 2020, NULL),
(9, 'Jaringan irigasi rawa yang dibangun', 'km', 2020, NULL),
(10, 'Jaringan irigasi tambak yang dibangun', 'km', 2020, NULL),
(11, 'Jaringan irigasi permukaan kewenangan Pusat yang direhabilitasi/ditingkatkan', 'km', 2020, NULL),
(12, 'Bendung irigasi kewenangan Pusat yang direhabilitasi/ditingkatkan', 'Bendung', 2020, NULL),
(13, 'Jaringan irigasi permukaan kewenangan Daerah yang direhabilitasi/ditingkatkan', 'Km', 2020, NULL),
(14, 'Bendung irigasi kewenangan Daerah yang direhabilitasi/ditingkatkan', 'Bendung', 2020, NULL),
(15, 'Jaringan irigasi rawa yang direhabilitasi/ditingkatkan', 'Km', 2020, NULL),
(16, 'Jaringan irigasi tambak yang direhabilitasi/ditingkatkan', 'Km', 2020, NULL),
(17, 'Kawasan rawa yang dikonservasi', 'Km', 2020, NULL),
(18, 'Layanan Sarana dan Prasarana Internal', 'Layanan', 2020, NULL),
(19, 'Layanan Dukungan Manajemen Satker', 'Layanan', 2020, NULL),
(20, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi pengendali banjir, lahar, drainase utama perkotaan, dan pengaman pantai', 'Dokumen', 2020, NULL),
(21, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', 'Dokumen', 2020, NULL),
(22, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi air tanah dan air baku', 'Dokumen', 2020, NULL),
(23, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi irigasi dan rawa', '200.0003 Dokumen', 2015, NULL),
(24, 'Jaringan irigasi permukaan kewenangan Pusat yang dibangun', '436.7611 Km', 2015, NULL),
(25, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi pengendali banjir, lahar, drainase utama perkotaan, dan pengaman pantai', '61.0001 Dokumen', 2015, NULL),
(26, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', '132.0002 Dokumen', 2015, NULL),
(27, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi air tanah dan air baku', '68.0005 Dokumen', 2017, NULL),
(28, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi irigasi dan rawa', '200.0003 Dokumen', 2016, NULL),
(29, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi pengendali banjir, lahar, drainase utama perkotaan, dan pengaman pantai', '61.0001 Dokumen', 2016, NULL),
(30, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', '132.0002 Dokumen', 2016, NULL),
(31, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi air tanah dan air baku', '68.0005 Dokumen', 2016, NULL),
(32, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi irigasi dan rawa', '200.0003 Dokumen', 2017, NULL),
(33, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi pengendali banjir, lahar, drainase utama perkotaan, dan pengaman pantai', '61.0001 Dokumen', 2017, NULL),
(34, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', '132.0002 Dokumen', 2017, NULL),
(35, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi air tanah dan air baku', '68.0005 Dokumen', 2017, NULL),
(36, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi irigasi dan rawa', '200.0003 Dokumen', 2018, NULL),
(37, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi pengendali banjir, lahar, drainase utama perkotaan, dan pengaman pantai', '61.0001 Dokumen', 2018, NULL),
(38, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', '132.0002 Dokumen', 2018, NULL),
(39, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi air tanah dan air baku', '68.0005 Dokumen', 2018, NULL),
(40, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi irigasi dan rawa', '200.0003 Dokumen', 2019, NULL),
(41, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi pengendali banjir, lahar, drainase utama perkotaan, dan pengaman pantai', '61.0001 Dokumen', 2019, NULL),
(42, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi bendungan dan bangunan penampung air lainnya', '132.0002 Dokumen', 2019, NULL),
(43, 'Rencana teknis dan dokumen lingkungan hidup untuk konstruksi air tanah dan air baku', '68.0005 Dokumen', 2019, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('gudang','admin','manager') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, '2a2d3270fafa1034a8a81d0d0072fcdc.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontruksi`
--
ALTER TABLE `kontruksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sda`
--
ALTER TABLE `sda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontruksi`
--
ALTER TABLE `kontruksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sda`
--
ALTER TABLE `sda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
