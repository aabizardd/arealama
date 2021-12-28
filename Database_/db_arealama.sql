-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 08:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arealama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `foto_profile` varchar(250) NOT NULL,
  `status_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `email`, `password`, `foto_profile`, `status_active`) VALUES
(1, 'Admin Arealama (Azhyra)', 'admin2', 'azhyra@gmail.com', '$2y$10$vX.ls95e59u559eOQOJyn.TLaMbjKs4idvn3RanxG5IEEqSUn4lQC', '60b780fd4ac13.jpg', 1),
(2, 'Admin Arealama (Azhyra)', 'admin1', 'azhyra2@gmail.com', '$2y$10$vX.ls95e59u559eOQOJyn.TLaMbjKs4idvn3RanxG5IEEqSUn4lQC', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `foto_barang` varchar(250) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `deskripsi_lainnya` text NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `foto_barang`, `nama_barang`, `harga`, `deskripsi_lainnya`, `link`) VALUES
(10, 'barang60c864c6d5459.jpeg', 'PAKET KEMEJA DAN BLOUSE PREMIUM', '508000', 'PAKET KEMEJA DAN BLOUSE PREMIUM\r\nBerisikan atasan wanita seperti kemeja dan blouse, bahan mix premium dan impor, campur lengan panjang dan pendek.\r\n-	Paket 1.000k berisikan 22pcs [BEST SELLER]\r\n-	Paket 508k berisikan 10pcs\r\nPaket berisikan kemeja dan blouse berlengan panjang dan pendek dengan berbagai warna model dan motif berbeda.', 'https://shopee.co.id/PAKET-KEMEJA-DAN-BLOUSE-PREMIUM-i.224838955.10811514984'),
(11, 'barang60c87bf83bafc.jpeg', 'PAKET MURAH BERKELAS [DAPAT 20pcs MIX]', '350000', 'PAKET MURAH BERKELAS\r\nBerisikan atasan wanita mix seperti kemeja dan blouse, turtlenec, sweater, cardigan, knitwear campur lengan panjang dan pendek dengan berbagai warna model dan motif berbeda.\r\nHARGA SESUAI KUALITAS', 'https://shopee.co.id/PAKET-MURAH-BERKELAS-DAPAT-20pcs-MIX--i.224838955.10011547398'),
(12, 'barang60c880db8cf12.jpeg', 'PAKET CARDIGAN', '1060000', 'Berisikan atasan wanita cardigan, bahan mix, campur lengan panjang dan pendek dengan berbagai warna model dan motif yang berbeda\r\n\r\n-	Paket 1.550k berisikan 50pcs [BEST SELLER]\r\n-	Paket 1.060k berisikan 30pcs', 'https://shopee.co.id/-50-Pcs-PAKET-CARDIGAN-i.224838955.9067160349');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
