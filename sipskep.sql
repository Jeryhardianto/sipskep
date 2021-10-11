-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2021 at 01:33 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipskep`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `verify_email` int(1) DEFAULT NULL,
  `token` varchar(60) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `password`, `verify_email`, `token`, `level`, `image`, `date_created`) VALUES
(46, 'Jery Hardianto', 'hardiantojr29@gmail.com', '$2y$10$ZosjNgnKd9SLsmBoTnHfH.ism/ZUXp1kOturub94q76u2GDTbkLVq', 1, 'b073677c08c3db799f1f8ed494d347f4', 1, NULL, '2021-09-22 16:27:34'),
(47, 'Jery Hardianto', 'jery@intelove.com', '$2y$10$aNeCu61CBISwKtLriZfXXud6yOzPt0Iuen3dogpeq0j41f87KXS7m', 1, '9461adf51281881e9a1632cc045a4b94', 5, NULL, '2021-09-22 20:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'kelurahan'),
(3, 'kecamatan'),
(4, 'camat'),
(5, 'warga');

-- --------------------------------------------------------

--
-- Table structure for table `suratnikah`
--

CREATE TABLE `suratnikah` (
  `id` int(5) NOT NULL,
  `nomorsurat` varchar(30) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jeniskelamin` varchar(50) DEFAULT NULL,
  `tempatlahir` varchar(128) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `perkerjaan` varchar(100) DEFAULT NULL,
  `warganegara1` varchar(50) DEFAULT NULL,
  `alamat` text,
  `namapasangan` varchar(128) DEFAULT NULL,
  `warganegara2` varchar(50) DEFAULT NULL,
  `idpengguna` int(10) DEFAULT NULL,
  `tanggal_buat` datetime DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL,
  `tanggal_verifikasi` date DEFAULT NULL,
  `statussurat` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_surat`
--

CREATE TABLE `verifikasi_surat` (
  `id` int(11) NOT NULL,
  `nama_verifiaksi` varchar(128) DEFAULT NULL,
  `jabatan` varchar(128) DEFAULT NULL,
  `tanggal_buat` datetime DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratnikah`
--
ALTER TABLE `suratnikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasi_surat`
--
ALTER TABLE `verifikasi_surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suratnikah`
--
ALTER TABLE `suratnikah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifikasi_surat`
--
ALTER TABLE `verifikasi_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
