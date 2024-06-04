-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 05:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

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
  `id_karyawan` int NOT NULL,
  `email_karyawan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_karyawan`, `email_karyawan`, `password`, `username`) VALUES
(1, 'galih@gmail.com', '$2y$10$nDrnelWdX.80LJzNVFuU9ODDxIEV3x0DiDCtMZyUa20LTEieGioQ2', 'galih'),
(2, 'admin@gmail.com', '$2y$10$.BK6www9dygH077gtyDZd.djrgdgPClUsEUUXyLkzKqTIhWUkUYPi', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_katalogkopi`
--

CREATE TABLE `tb_katalogkopi` (
  `id_kopi` int NOT NULL,
  `jenis_kopi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `grade_kopi` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_kopi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `asal_kopi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_kopi` int NOT NULL,
  `foto_kopi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_katalogkopi`
--

INSERT INTO `tb_katalogkopi` (`id_kopi`, `jenis_kopi`, `grade_kopi`, `nama_kopi`, `asal_kopi`, `harga_kopi`, `foto_kopi`) VALUES
(4, 'arabika', '5', 'Kopi arab', 'arab', 80000, '6656ccfa69c98.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayarankatalogkopi`
--

CREATE TABLE `tb_pembayarankatalogkopi` (
  `id_pembayaran` int NOT NULL,
  `id_kopi` int NOT NULL,
  `jenis_pembayaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pembayarankatalogkopi`
--

INSERT INTO `tb_pembayarankatalogkopi` (`id_pembayaran`, `id_kopi`, `jenis_pembayaran`, `tanggal_pembayaran`, `status_pembayaran`) VALUES
(4, 4, 'QRIS', '2024-05-29', 'Terbayar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_katalogkopi`
--
ALTER TABLE `tb_katalogkopi`
  ADD PRIMARY KEY (`id_kopi`);

--
-- Indexes for table `tb_pembayarankatalogkopi`
--
ALTER TABLE `tb_pembayarankatalogkopi`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `ID_Kopi` (`id_kopi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_katalogkopi`
--
ALTER TABLE `tb_katalogkopi`
  MODIFY `id_kopi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembayarankatalogkopi`
--
ALTER TABLE `tb_pembayarankatalogkopi`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayarankatalogkopi`
--
ALTER TABLE `tb_pembayarankatalogkopi`
  ADD CONSTRAINT `tb_pembayarankatalogkopi_ibfk_1` FOREIGN KEY (`id_kopi`) REFERENCES `tb_katalogkopi` (`id_kopi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
