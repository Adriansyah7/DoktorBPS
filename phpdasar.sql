-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 03:47 AM
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
-- Database: `phpdasar`
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
(4, 'Kepala   ', 'Dokumentasi   ', 'Dokumentasi kegiatan Survei pendapatan daerah sekitar Kecamatan Batununggal   ', '2021-12-17', 'Bandung   ', '18420123', '61caabe9b8f4b.jpg'),
(43, 'Sp2020', 'Pelayan', 'ZOOM Meeting BPS Kota Bandung Jumat/23 Juli 2021 pukul 10.00 wib s.d selesai dengan agenda &quot;Membacakan Teks Pancasila&quot; sebagai Implementasi ', '0000-00-00', 'Bandung', '1314115', '10.jpg'),
(50, 'LALALA', 'Pelayan       ', 'LALALALALALA', '2021-12-22', 'Cimahi       ', '1156711', '61caac9b086c0.jpg '),
(52, 'SP2021', 'Pelayan', 'Pelayanan Kepala Di Batununggal ', '2021-12-28', 'cinmha', '1245156341', '61cab131b4379.png'),
(53, 'SP2021', 'Pelayan', 'Pelayanan Kepala Di Batununggal ', '2021-12-28', 'cinmha', '1245156341', '61cab1507815f.png');

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
(4, 'fadel', '$2y$10$JMs4wDxqGoX2W7Z2i1yYpekArMpIN6ygpLQss6dDXJll4uis0KG5m');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
