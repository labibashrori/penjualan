-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 04:33 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `201553032`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `KodeBarang` varchar(10) NOT NULL DEFAULT '',
  `NamaBarang` varchar(50) DEFAULT NULL,
  `JenisBarang` varchar(20) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`KodeBarang`, `NamaBarang`, `JenisBarang`, `Harga`, `Jumlah`) VALUES
('BRG001', 'Indomie', 'Mie Instant', 2000, 50),
('BRG002', 'Sunsilk', 'Shampo', 14000, 100),
('BRG003', 'Pepsodent', 'Pasta Gigi', 7000, 75),
('BRG004', 'La Light', 'Rokok', 18000, 200),
('BRG005', 'SGM 5', 'Susu Bayi', 75000, 150);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `NomorNota` varchar(10) NOT NULL DEFAULT '',
  `KodeBarang` varchar(10) DEFAULT NULL,
  `KodeSupplier` varchar(10) DEFAULT NULL,
  `TanggalBeli` date DEFAULT NULL,
  `JumlahBeli` int(11) DEFAULT NULL,
  `HargaBeli` int(11) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`NomorNota`, `KodeBarang`, `KodeSupplier`, `TanggalBeli`, `JumlahBeli`, `HargaBeli`, `Total`) VALUES
('PBL002', 'BRG004', 'SUP002', '2017-01-02', 150, 3000, 450000),
('PBL003', 'BRG003', 'SUP001', '2017-01-02', 300, 4000, 1200000),
('PBL004', 'BRG004', 'SUP003', '2017-01-01', 150, 3000, 450000),
('PBL005', 'BRG003', 'SUP004', '2017-01-01', 300, 4000, 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `KodeSupplier` varchar(10) NOT NULL DEFAULT '',
  `NamaSupplier` varchar(50) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `AlamatKantor` varchar(50) DEFAULT NULL,
  `TeleponKantor` varchar(15) DEFAULT NULL,
  `JenisKelamin` varchar(10) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`KodeSupplier`, `NamaSupplier`, `TanggalLahir`, `AlamatKantor`, `TeleponKantor`, `JenisKelamin`, `Email`) VALUES
('SUP001', 'Firman Illahudin', '1980-04-12', 'Jl. Gondang Manis', '0291-5546738', 'Pria', 'firman001@gmail.com'),
('SUP002', 'Joko Waluyo', '1979-03-07', 'Jl. Bumi Wonosari', '024-889772', 'Pria', 'jwal@gmail.com'),
('SUP003', 'Ilham Wahid', '1982-08-19', 'Jl. Dersalam', '0291-889324', 'Pria', 'wahid@gmail.com'),
('SUP004', 'Labib Ashrori', '1996-01-01', 'Jl. Jeruk', '0291-553032', 'Pria', 'labib@outlook.com'),
('SUP005', 'Muhammad Ilham', '1996-02-02', 'Jl. Mangga', '0291-553027', 'Pria', 'ilham@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`NomorNota`),
  ADD KEY `KodeBarang` (`KodeBarang`),
  ADD KEY `KodeSupplier` (`KodeSupplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`KodeSupplier`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`KodeSupplier`) REFERENCES `supplier` (`KodeSupplier`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
