-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 11:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doktor`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `subjek` varchar(40) DEFAULT NULL,
  `kegiatan` varchar(25) DEFAULT NULL,
  `detail` varchar(150) DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `wilayah` varchar(50) DEFAULT NULL,
  `nip` char(10) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `subjek`, `kegiatan`, `detail`, `tahun`, `wilayah`, `nip`, `gambar`) VALUES
(43, 'Sp2020', 'Pelayan', 'ZOOM Meeting BPS Kota Bandung Jumat/23 Juli 2021 pukul 10.00 wib s.d selesai dengan agenda &quot;Membacakan Teks Pancasila&quot; sebagai Implementasi ', '0000-00-00', 'Bandung', '1314115', '10.jpg'),
(55, 'Neraca Wilayah dan Analis', 'Pencatatan ', 'Pencatatan SP2020 di Kecamatan Lengkong kecil ', '2021-12-30', 'Bandung sadas ', '1245156341', '61cd29be0ebce.jpg '),
(56, 'SP2020', 'Pencatatan ', 'Pencatatan SP2020 di Kecamatan Lengkong kecil ', '2021-12-30', 'Bandung ', '1156711', '61cd2a38204e4.jpg '),
(57, 'IPDS', 'Pelayanan1', 'Pelayanan Kepala Di Batununggal ', '2022-01-03', 'Bandung', '18402131', '61d26c7503980.jpg'),
(64, 'Statistik Sosial', 'Pencatatan', 'Pelayanan Kepala Di Batununggal ', '2022-01-07', 'Subang', '1245156341', '61d2712be7957.jpg'),
(65, 'kepala', 'Pelayan', 'Pencatatan SP2020 di Kecamatan Lengkong kecil', '2022-01-03', 'Bandung', '123123', '61d29739846cc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$fKCJZW2Lok5cJbYqbNiQJ.2FPtWCR7yX8qiN1rSiKGZ1F1HftptnW'),
(2, 'viqi', '$2y$10$WBk7cIdwE2.CkH7A7KBsCOxlKKa9/Fhw0ur3AWVfTqKGtAskuwrEm'),
(3, 'adrian', '$2y$10$M8r3Pa8fzAsdFeXzA12uBOCgCCCjNvXQdw1ZdwzXKyLfVO87HBfv2'),
(4, 'fadel', '$2y$10$JMs4wDxqGoX2W7Z2i1yYpekArMpIN6ygpLQss6dDXJll4uis0KG5m'),
(5, 'adm', '$2y$10$dW1HrRCAc1yHCuzudIU.Yu6cMbDDJcclqcv3IizRNXSKW5nXNFGZu'),
(6, 'admin12', '$2y$10$82xu/NcW/UzV7H0i7hclJ.nVmUO..mL3YwZ0b5CQEhS0HYIzKzTFG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
