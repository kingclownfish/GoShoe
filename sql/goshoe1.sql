-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 06:36 PM
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
-- Database: `goshoe1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kod_Admin` varchar(4) NOT NULL,
  `nama_Admin` varchar(50) DEFAULT NULL,
  `katalaluan_Admin` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kod_Admin`, `nama_Admin`, `katalaluan_Admin`) VALUES
('A001', 'Daniel', 'Daniel123');

-- --------------------------------------------------------

--
-- Table structure for table `jenama`
--

CREATE TABLE `jenama` (
  `kod_jenama` varchar(4) NOT NULL,
  `jenama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenama`
--

INSERT INTO `jenama` (`kod_jenama`, `jenama`) VALUES
('J221', 'Nike'),
('J222', 'Adidas'),
('J223', 'Skechers');

-- --------------------------------------------------------

--
-- Table structure for table `kasut`
--

CREATE TABLE `kasut` (
  `id_Kasut` int(11) NOT NULL,
  `namaKasut` varchar(60) DEFAULT NULL,
  `kod_jenama` varchar(4) DEFAULT NULL,
  `warna` varchar(15) DEFAULT NULL,
  `saiz` int(2) DEFAULT NULL,
  `harga_Seunit` int(3) DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasut`
--

INSERT INTO `kasut` (`id_Kasut`, `namaKasut`, `kod_jenama`, `warna`, `saiz`, `harga_Seunit`, `gambar`) VALUES
(31, 'Nike Mens Trainers Shoes', 'J221', 'Putih', 12, 357, '2023-09-22-164039.jpg'),
(35, 'Adidas Mens Running Shoes', 'J222', 'Hitam', 9, 257, '2023-09-22-172225.jpg'),
(36, 'Skechers Men Glide Shoes', 'J223', 'Biru', 7, 260, '2023-09-22-172316.jpg'),
(37, 'Skechers White Sport Shoes', 'J223', 'Putih', 12, 249, '2023-09-22-172737.jpg'),
(38, 'Adidas Womens Sport Shoes', 'J222', 'Merah jambu', 7, 200, '2023-09-22-172849.jpg'),
(39, 'Adidas Mens Running Shoes', 'J222', 'Jingga', 8, 240, '2023-09-22-173411.jpg'),
(75, 'Adidas Men Spikeless Shoe', 'J222', 'Perang', 9, 279, '2023-09-22-165821.jpg'),
(76, 'Skechers Women Athletic Shoes', 'J223', 'Kuning', 10, 237, '2023-09-22-164822.jpg'),
(81, 'Nike Men Running Shoe', 'J221', 'Hitam', 8, 371, '2023-09-22-164540.jpg'),
(93, 'Nike Men Low-top Sneakers', 'J221', 'Hitam', 8, 199, '2023-09-22-163936.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `nokpPembeli` varchar(12) NOT NULL,
  `notel` varchar(11) DEFAULT NULL,
  `katalaluan_Pembeli` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`nokpPembeli`, `notel`, `katalaluan_Pembeli`) VALUES
('060102030405', '0162345678', 'zamrud123'),
('060304050607', '0169876543', 'ali298'),
('060504030201', '01157241802', 'abu157');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_Kasut` int(11) NOT NULL,
  `nokpPembeli` varchar(12) NOT NULL,
  `kuantiti` int(2) DEFAULT NULL,
  `jum_Harga` int(3) DEFAULT NULL,
  `tarikh_Pesan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_Kasut`, `nokpPembeli`, `kuantiti`, `jum_Harga`, `tarikh_Pesan`) VALUES
(75, '060304050607', 2, 558, '2023-05-13'),
(76, '060504030201', 1, 237, '2023-05-13'),
(81, '060102030405', 1, 371, '2023-05-13'),
(93, '060102030405', 1, 199, '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `telefon`
--

CREATE TABLE `telefon` (
  `notel` varchar(11) NOT NULL,
  `namaPembeli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telefon`
--

INSERT INTO `telefon` (`notel`, `namaPembeli`) VALUES
('01157241802', 'SYARIFAH'),
('0162345678', 'ZAMRUD'),
('0169876543', 'ALI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kod_Admin`);

--
-- Indexes for table `jenama`
--
ALTER TABLE `jenama`
  ADD PRIMARY KEY (`kod_jenama`);

--
-- Indexes for table `kasut`
--
ALTER TABLE `kasut`
  ADD PRIMARY KEY (`id_Kasut`),
  ADD KEY `kod_jenama` (`kod_jenama`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`nokpPembeli`),
  ADD KEY `notel` (`notel`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_Kasut`,`nokpPembeli`),
  ADD KEY `nokpPembeli` (`nokpPembeli`);

--
-- Indexes for table `telefon`
--
ALTER TABLE `telefon`
  ADD PRIMARY KEY (`notel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kasut`
--
ALTER TABLE `kasut`
  MODIFY `id_Kasut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kasut`
--
ALTER TABLE `kasut`
  ADD CONSTRAINT `kasut_ibfk_1` FOREIGN KEY (`kod_jenama`) REFERENCES `jenama` (`kod_jenama`);

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`notel`) REFERENCES `telefon` (`notel`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_Kasut`) REFERENCES `kasut` (`id_Kasut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`nokpPembeli`) REFERENCES `pembeli` (`nokpPembeli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
