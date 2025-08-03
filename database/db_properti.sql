-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 06:27 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_properti`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_akun`
--

CREATE TABLE `t_akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_akun`
--

INSERT INTO `t_akun` (`id_akun`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'costumer', 'costumer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_customer`
--

CREATE TABLE `t_customer` (
  `nik` int(16) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_marketing`
--

CREATE TABLE `t_marketing` (
  `kd_marketing` int(11) NOT NULL,
  `nm_marketing` varchar(25) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_marketing`
--

INSERT INTO `t_marketing` (`kd_marketing`, `nm_marketing`, `id_akun`) VALUES
(140101, 'Rudi Salim', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `kd_pembayaran` int(11) NOT NULL,
  `kd_marketing` int(11) NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE `t_pemesanan` (
  `kd_pemesanan` int(11) NOT NULL,
  `kd_pembayaran` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `kd_rumah` int(11) NOT NULL,
  `tanggal_waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_rumah`
--

CREATE TABLE `t_rumah` (
  `kd_rumah` int(11) NOT NULL,
  `jenis_rumah` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `unit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_rumah`
--

INSERT INTO `t_rumah` (`kd_rumah`, `jenis_rumah`, `harga`, `unit`) VALUES
(10010101, 'Cluster', 'Rp.450.000.000', '10'),
(10010102, 'Cluster', 'Rp.550.000.000', '10'),
(10010103, 'Cluster', 'Rp.650.000.000', '10'),
(10010104, 'Cluster', 'Rp.750.000.000', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_akun`
--
ALTER TABLE `t_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `t_marketing`
--
ALTER TABLE `t_marketing`
  ADD PRIMARY KEY (`kd_marketing`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`kd_pembayaran`),
  ADD KEY `kd_marketing` (`kd_marketing`);

--
-- Indexes for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD PRIMARY KEY (`kd_pemesanan`),
  ADD UNIQUE KEY `nik_2` (`nik`),
  ADD KEY `kd_rumah` (`kd_rumah`),
  ADD KEY `nik` (`nik`),
  ADD KEY `kd_pembayaran` (`kd_pembayaran`);

--
-- Indexes for table `t_rumah`
--
ALTER TABLE `t_rumah`
  ADD PRIMARY KEY (`kd_rumah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_akun`
--
ALTER TABLE `t_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `kd_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_marketing`
--
ALTER TABLE `t_marketing`
  ADD CONSTRAINT `t_marketing_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `t_akun` (`id_akun`);

--
-- Constraints for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD CONSTRAINT `t_pembayaran_ibfk_1` FOREIGN KEY (`kd_pembayaran`) REFERENCES `t_pemesanan` (`kd_pembayaran`),
  ADD CONSTRAINT `t_pembayaran_ibfk_2` FOREIGN KEY (`kd_marketing`) REFERENCES `t_marketing` (`kd_marketing`);

--
-- Constraints for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `t_customer` (`nik`),
  ADD CONSTRAINT `t_pemesanan_ibfk_3` FOREIGN KEY (`kd_rumah`) REFERENCES `t_rumah` (`kd_rumah`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
