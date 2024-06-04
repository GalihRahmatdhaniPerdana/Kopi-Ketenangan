-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2024 at 06:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopiketenangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `ID_Karyawan` int NOT NULL,
  `Email_Karyawan` varchar(50) NOT NULL,
  `No_Telepon` int NOT NULL,
  `Alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_katalogkopi`
--

CREATE TABLE `tb_katalogkopi` (
  `ID_Kopi` int NOT NULL,
  `Jenis_Kopi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Grade_Kopi` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nama_Kopi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Asal_Kopi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Harga_Kopi` int NOT NULL,
  `Foto_Kopi` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayarankatalogkopi`
--

CREATE TABLE `tb_pembayarankatalogkopi` (
  `ID_Pembayaran` int NOT NULL,
  `ID_Kopi` int NOT NULL,
  `Jenis_Pembayaran` varchar(20) NOT NULL,
  `Tanggal_Pembayaran` datetime NOT NULL,
  `Status_Pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`ID_Karyawan`);

--
-- Indexes for table `tb_katalogkopi`
--
ALTER TABLE `tb_katalogkopi`
  ADD PRIMARY KEY (`ID_Kopi`);

--
-- Indexes for table `tb_pembayarankatalogkopi`
--
ALTER TABLE `tb_pembayarankatalogkopi`
  ADD PRIMARY KEY (`ID_Pembayaran`),
  ADD KEY `ID_Kopi` (`ID_Kopi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_katalogkopi`
--
ALTER TABLE `tb_katalogkopi`
  ADD CONSTRAINT `tb_katalogkopi_ibfk_1` FOREIGN KEY (`ID_Kopi`) REFERENCES `tb_pembayarankatalogkopi` (`ID_Kopi`);

--
-- Constraints for table `tb_pembayarankatalogkopi`
--
ALTER TABLE `tb_pembayarankatalogkopi`
  ADD CONSTRAINT `tb_pembayarankatalogkopi_ibfk_1` FOREIGN KEY (`ID_Kopi`) REFERENCES `tb_katalogkopi` (`ID_Kopi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
