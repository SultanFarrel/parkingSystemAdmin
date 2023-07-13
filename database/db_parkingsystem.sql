-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 04:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` varchar(7) NOT NULL,
  `jenis_kendaraan` varchar(30) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `tarif`) VALUES
('JK-0001', 'Mobil', 4000),
('JK-0002', 'Motor', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `parkir_keluar`
--

CREATE TABLE `parkir_keluar` (
  `kode_parkir` varchar(6) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `lama_parkir` varchar(11) NOT NULL,
  `tarif` varchar(11) NOT NULL,
  `total_bayar` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkir_keluar`
--

INSERT INTO `parkir_keluar` (`kode_parkir`, `tanggal_masuk`, `tanggal_keluar`, `lama_parkir`, `tarif`, `total_bayar`) VALUES
('P-0001', '2023-06-25 18:08:44', '2023-06-25 18:10:20', '0.1', '4000', '4000'),
('P-0002', '2023-06-25 18:08:56', '2023-07-04 21:31:17', '219.22', '2000', '438000'),
('P-0003', '2023-06-25 18:10:17', '2023-07-07 15:20:01', '285.9', '4000', '1140000'),
('P-0004', '2023-07-04 21:30:47', '2023-07-07 15:43:48', '66.13', '4000', '264000'),
('P-0005', '2023-07-06 19:17:41', '2023-07-07 15:46:52', '20.29', '2000', '40000'),
('P-0006', '2023-07-06 19:18:00', '2023-07-07 15:49:12', '20.31', '2000', '40000'),
('P-0010', '2023-07-07 15:53:25', '2023-07-07 16:08:41', '0.15', '4000', '4000'),
('P-0011', '2023-07-07 15:53:31', '2023-07-07 16:09:41', '0.16', '2000', '2000'),
('P-0012', '2023-07-07 15:53:40', '2023-07-07 16:10:50', '0.17', '2000', '2000'),
('P-0013', '2023-07-07 15:53:46', '2023-07-07 16:11:34', '0.17', '4000', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `parkir_masuk`
--

CREATE TABLE `parkir_masuk` (
  `kode_parkir` varchar(6) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nomor_plat` varchar(10) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkir_masuk`
--

INSERT INTO `parkir_masuk` (`kode_parkir`, `tanggal`, `nomor_plat`, `jenis_kendaraan`, `status`) VALUES
('P-0010', '2023-07-07 15:53:25', 'RI2', 'Mobil', 1),
('P-0011', '2023-07-07 15:53:31', 'B390LO', 'Motor', 1),
('P-0012', '2023-07-07 15:53:40', 'B1224ASL', 'Motor', 1),
('P-0013', '2023-07-07 15:53:46', 'F0203LSD', 'Mobil', 1),
('P-0014', '2023-07-07 15:53:53', 'D3049DKS', 'Motor', 0),
('P-0015', '2023-07-07 15:54:01', 'AB2391MCN', 'Mobil', 0),
('P-0016', '2023-07-07 15:54:13', 'F2031MKS', 'Motor', 0),
('P-0017', '2023-07-07 15:58:57', 'BK1029SKA', 'Mobil', 0),
('P-0018', '2023-07-07 15:59:43', 'D2039SKA', 'Motor', 0),
('P-0019', '2023-07-07 16:03:49', 'F120YO', 'Mobil', 0),
('P-0020', '2023-07-07 16:08:57', 'AD3940KDJ', 'Mobil', 0),
('P-0021', '2023-07-07 16:10:33', 'F2837DJK', 'Motor', 0),
('P-0022', '2023-07-07 16:11:14', 'AD2183KJS', 'Motor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(7) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`) VALUES
('US-0001', 'Elon Mark', 'ElonM', '4567'),
('US-0004', 'Sultan Farrel', 'SultanF', '1234'),
('US-0005', 'admin', 'admin', 'admin'),
('US-0006', 'Mark Zuckerberg', 'MarkZ', '789456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `parkir_keluar`
--
ALTER TABLE `parkir_keluar`
  ADD PRIMARY KEY (`kode_parkir`);

--
-- Indexes for table `parkir_masuk`
--
ALTER TABLE `parkir_masuk`
  ADD PRIMARY KEY (`kode_parkir`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
