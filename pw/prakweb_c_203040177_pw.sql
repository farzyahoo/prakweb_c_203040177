-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 03:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_c_203040121_pw`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(16) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` varchar(64) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `jumlah_halaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `pengarang`, `tahun_terbit`, `gambar`, `jumlah_halaman`) VALUES
(2, 'Dilan ', 'Pidi Baiq', '2014', 'dilan.jpg', '600'),
(3, '11:11', 'Fiersa Besari', '2018', '11.jpg', '400'),
(4, 'Bumi Manusia', 'Pramoedya Ananta Toer', '1980', 'bumi.jpg', '400'),
(5, 'Cantik Itu Luka', 'Eka Kurniawan', '2002', 'cantik.jpg', '700'),
(6, 'Rindu', 'Tere Liye', '2008', 'rindu.jpg', '670'),
(7, 'Lelaki Harimau', 'Eka Kurniawan', '2007', 'lelaki.jpg', '890'),
(8, 'Bumi', 'Tere Liye\r\n', '2004', 'bumitere.jpg', '700'),
(9, 'Tujuh Kelana', 'Nellaneva', '2020', 'tujuh.jpg', '880'),
(10, 'Ubur-Ubur Lembur', 'Raditya Dika', '2018', 'ubur.jpg', '779');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
