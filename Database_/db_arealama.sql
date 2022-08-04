-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 03:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `id_petugas` varchar(250) DEFAULT NULL,
  `nama_admin` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `foto_profile` varchar(250) NOT NULL DEFAULT 'default.jpg',
  `status_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_petugas`, `nama_admin`, `username`, `email`, `password`, `foto_profile`, `status_active`) VALUES
(1, 'ADM-asdas12312', 'Admin', 'admin', 'azhyra2@gmail.com', '$2y$10$0R0r5Ux/4RAqRwqoUl1ozON/0ukWpjuVReyVnDpfhePMkLbLLSOVC', '62d698a30a149.jpg', 1),
(2, 'ADM-asdasd11111', 'Admin 1', 'admin1', 'azhyra2@gmail.com', '$2y$10$vX.ls95e59u559eOQOJyn.TLaMbjKs4idvn3RanxG5IEEqSUn4lQC', '62d6999d63eac.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(250) NOT NULL,
  `foto_barang` varchar(250) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi_lainnya` text NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `foto_barang`, `nama_barang`, `harga`, `stok`, `deskripsi_lainnya`, `link`) VALUES
(10, '', 'barang60c864c6d5459.jpeg', 'PAKET KEMEJA DAN BLOUSE PREMIUM', '508000', 2, 'PAKET KEMEJA DAN BLOUSE PREMIUM\r\nBerisikan atasan wanita seperti kemeja dan blouse, bahan mix premium dan impor, campur lengan panjang dan pendek.\r\n-	Paket 1.000k berisikan 22pcs [BEST SELLER]\r\n-	Paket 508k berisikan 10pcs\r\nPaket berisikan kemeja dan blouse berlengan panjang dan pendek dengan berbagai warna model dan motif berbeda.', 'https://shopee.co.id/PAKET-KEMEJA-DAN-BLOUSE-PREMIUM-i.224838955.10811514984'),
(11, '', 'barang60c87bf83bafc.jpeg', 'PAKET MURAH BERKELAS [DAPAT 20pcs MIX]', '350000', 2, 'PAKET MURAH BERKELAS\r\nBerisikan atasan wanita mix seperti kemeja dan blouse, turtlenec, sweater, cardigan, knitwear campur lengan panjang dan pendek dengan berbagai warna model dan motif berbeda.\r\nHARGA SESUAI KUALITAS', 'https://shopee.co.id/PAKET-MURAH-BERKELAS-DAPAT-20pcs-MIX--i.224838955.10011547398'),
(12, '', 'barang60c880db8cf12.jpeg', 'PAKET CARDIGAN', '1060000', 1, 'Berisikan atasan wanita cardigan, bahan mix, campur lengan panjang dan pendek dengan berbagai warna model dan motif yang berbeda\r\n\r\n-	Paket 1.550k berisikan 50pcs [BEST SELLER]\r\n-	Paket 1.060k berisikan 30pcs', 'https://shopee.co.id/-50-Pcs-PAKET-CARDIGAN-i.224838955.9067160349');

-- --------------------------------------------------------

--
-- Table structure for table `barang_checkout`
--

CREATE TABLE `barang_checkout` (
  `id_barang_checkout` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_checkout`
--

INSERT INTO `barang_checkout` (`id_barang_checkout`, `id_barang`, `qty`, `id_transaksi`) VALUES
(3, 10, 1, 4),
(4, 11, 1, 4),
(5, 10, 1, 5),
(6, 10, 1, 6),
(7, 10, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `no_telp` varchar(250) DEFAULT NULL,
  `foto` varchar(250) NOT NULL DEFAULT 'user_default.png',
  `password` varchar(250) NOT NULL,
  `status_aktif` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `username`, `nama`, `email`, `no_telp`, `foto`, `password`, `status_aktif`) VALUES
(9, 'test', 'Muhammad Abizard', 'abizard@student.telkomuniversity.ac.id', '081386397855', '62070b374d0b5.jpg', '$2y$10$0R0r5Ux/4RAqRwqoUl1ozON/0ukWpjuVReyVnDpfhePMkLbLLSOVC', 1),
(12, 'test2', NULL, 'm.test@gmail.com', NULL, 'user_default.png', '$2y$10$0R0r5Ux/4RAqRwqoUl1ozON/0ukWpjuVReyVnDpfhePMkLbLLSOVC', 1),
(15, 'test123', NULL, 'haitsam03@gmail.com', NULL, 'user_default.png', '$2y$10$i08xYZpP77IbtXQpOmFw6.vaDGgrw9PrE32zO194yTxz40pDUNrKO', 1),
(17, 'test11', NULL, 'test11@gmail.com', NULL, 'user_default.png', '$2y$10$Oc54AxkRXa2EYCvPWJujHujQzxL23g3/LlYkc9sIq.CS3R9AsbjvC', 1),
(18, 'konsumen', NULL, 'm.abizard1123@gmail.com', NULL, 'user_default.png', '$2y$10$TN48ja2r9DFEXVdC1QMBgOBPy2QtXFPRsW2JtHOiPy7pgi4KKiK8K', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(250) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id`, `provinsi`, `ongkir`) VALUES
(2, 'Jawa Barat', 12000),
(3, 'Jawa Timur', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id` int(11) NOT NULL,
  `nama_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id`, `nama_status`) VALUES
(0, 'Pesanan sedang diperiksa'),
(1, 'Pesanan Disetujui'),
(2, 'Pesanan Dikirim'),
(3, 'Pesanan Diterima'),
(4, 'Pesanan ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `nama_depan` varchar(250) NOT NULL,
  `nama_belakang` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(250) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `jasa_pengiriman` varchar(250) DEFAULT NULL,
  `nomor_resi` varchar(250) DEFAULT NULL,
  `total` int(250) NOT NULL,
  `bukti_bayar` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_konsumen`, `nama_depan`, `nama_belakang`, `alamat`, `no_hp`, `tgl_transaksi`, `jasa_pengiriman`, `nomor_resi`, `total`, `bukti_bayar`, `status`) VALUES
(4, 9, 'Azhyra', 'Rana', 'asdfasd', '1312312', '2022-02-27 03:34:32', NULL, NULL, 1312312, 'materi62011a9b7784b.jpg', 0),
(5, 9, 'Muhammad', 'Abizard', 'Taman Sari Persada, Cluster Lotus B4/12A', '081386397855', '2022-04-13 14:10:48', NULL, NULL, 2147483647, 'materi6256d9e80a328.png', 3),
(7, 9, 'Azhyra Rana', 'asdas', 'Bogor', '081386397855', '2022-08-04 13:21:22', NULL, NULL, 508000, 'materi62ebc7d295b1b.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `date_created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'abizard@student.telkomuniversity.ac.id', '859gfw6n/I2ckojtM2u3hijiVpF/PuKOE50czhEFDdk=', '1642910724'),
(11, 'haitsam03@gmail.com', '2irNjJMjQDfiFbEnfd705+z644XDNKuC+upKF4mJbSs=', '1649945849'),
(12, 'test11@gmail.com', 'stmVL4PqeNqXwxeogYNy4ZL4VbbIguuaLvJXCx7n8F4=', '1657420031'),
(14, 'm.abizard1123@gmail.com', 'NE2oczNCLNiV8vD2BWibDShs74RXnPvva+EpEg47WzU=', '1659617974'),
(15, 'm.abizard1123@gmail.com', 'h2P6l1PrFSpg4vabHI5LuIvuLJtfPHArweGWaZwRFug=', '1659618034');

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
-- Indexes for table `barang_checkout`
--
ALTER TABLE `barang_checkout`
  ADD PRIMARY KEY (`id_barang_checkout`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `barang_checkout`
--
ALTER TABLE `barang_checkout`
  MODIFY `id_barang_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
