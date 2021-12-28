-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 04:54 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(250) DEFAULT 'Asprak Praktikum',
  `foto_profile` varchar(250) NOT NULL DEFAULT 'default.jpg',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `foto_profile`, `id_user`) VALUES
(1, 'Asprak Praktikum', 'default.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_praktikum`
--

CREATE TABLE `tb_bahan_praktikum` (
  `id_bahan` int(11) NOT NULL,
  `judul_bahan` varchar(250) NOT NULL,
  `keterangan_bahan` text NOT NULL,
  `foto_bahan` varchar(250) NOT NULL,
  `id_praktikum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `date_created`) VALUES
(1, 'D3SI-42-01', '2021-05-08 21:49:01'),
(2, 'D3SI-42-02', '2021-05-08 21:49:08'),
(3, 'D3SI-42-03', '2021-05-08 21:49:14'),
(4, 'D3SI-42-04', '2021-05-08 21:49:19'),
(5, 'D3MM-42-01', '2021-05-08 21:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumpulan_tugas`
--

CREATE TABLE `tb_pengumpulan_tugas` (
  `id_pengumpulan` int(11) NOT NULL,
  `file` varchar(250) NOT NULL,
  `tanggal_pengumpulan` datetime NOT NULL DEFAULT current_timestamp(),
  `id_praktikum` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikan`
--

CREATE TABLE `tb_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `nama_lengkap` varchar(250) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `kelompok` varchar(250) DEFAULT NULL,
  `foto_profile` varchar(250) NOT NULL DEFAULT 'default.jpg',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikum`
--

CREATE TABLE `tb_praktikum` (
  `id_praktikum` int(11) NOT NULL,
  `judul_praktikum` varchar(250) NOT NULL,
  `praktikum_ke` int(11) NOT NULL,
  `tujuan_praktikum` varchar(250) NOT NULL,
  `materi_praktikum` text NOT NULL,
  `deadline_tanggal` date DEFAULT current_timestamp(),
  `deadline_jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nim` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `id_role` int(11) NOT NULL,
  `status_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nim`, `email`, `password`, `date_created`, `id_role`, `status_active`) VALUES
(2, '0', 'admin@gmail.com', '$2y$10$F8Gz4Da2IaKIofSeV7jRR.D5h8jrLLsX2Gd6JcR727Gzo9gaiatD.', '2021-05-08 21:44:26', 2, 1);

--
-- Triggers `tb_user`
--
DELIMITER $$
CREATE TRIGGER `after_admin_regist` AFTER INSERT ON `tb_user` FOR EACH ROW BEGIN
IF NEW.id_role = 2
then

    INSERT INTO tb_admin
    SET id_user = NEW.id_user;

END IF;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_praktikan_regist` AFTER INSERT ON `tb_user` FOR EACH ROW BEGIN
IF NEW.id_role = 1
then

    INSERT INTO tb_praktikan
    SET id_user = NEW.id_user;

END IF;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id_role`, `role`) VALUES
(1, 'praktikan'),
(2, 'asprak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_token`
--

CREATE TABLE `tb_user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `date_created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `FK_admin_id_user` (`id_user`);

--
-- Indexes for table `tb_bahan_praktikum`
--
ALTER TABLE `tb_bahan_praktikum`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `FK_bahan_praktikum` (`id_praktikum`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pengumpulan_tugas`
--
ALTER TABLE `tb_pengumpulan_tugas`
  ADD PRIMARY KEY (`id_pengumpulan`),
  ADD KEY `FK_pengumpulan_modul` (`id_praktikum`),
  ADD KEY `FK_pengumpulan_praktikan` (`id_praktikan`);

--
-- Indexes for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  ADD PRIMARY KEY (`id_praktikan`),
  ADD KEY `FK_praktikan_id_user` (`id_user`),
  ADD KEY `FK_praktikan_kelas` (`id_kelas`);

--
-- Indexes for table `tb_praktikum`
--
ALTER TABLE `tb_praktikum`
  ADD PRIMARY KEY (`id_praktikum`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_role_user` (`id_role`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bahan_praktikum`
--
ALTER TABLE `tb_bahan_praktikum`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengumpulan_tugas`
--
ALTER TABLE `tb_pengumpulan_tugas`
  MODIFY `id_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_praktikum`
--
ALTER TABLE `tb_praktikum`
  MODIFY `id_praktikum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `FK_admin_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_bahan_praktikum`
--
ALTER TABLE `tb_bahan_praktikum`
  ADD CONSTRAINT `FK_bahan_praktikum` FOREIGN KEY (`id_praktikum`) REFERENCES `tb_praktikum` (`id_praktikum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengumpulan_tugas`
--
ALTER TABLE `tb_pengumpulan_tugas`
  ADD CONSTRAINT `FK_pengumpulan_modul` FOREIGN KEY (`id_praktikum`) REFERENCES `tb_praktikum` (`id_praktikum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pengumpulan_praktikan` FOREIGN KEY (`id_praktikan`) REFERENCES `tb_praktikan` (`id_praktikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  ADD CONSTRAINT `FK_praktikan_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_praktikan_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `FK_role_user` FOREIGN KEY (`id_role`) REFERENCES `tb_user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
