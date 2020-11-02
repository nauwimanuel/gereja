-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 05:09 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `psn_id` int(11) NOT NULL,
  `psn_nama` varchar(100) NOT NULL,
  `psn_nohp` varchar(15) NOT NULL,
  `psn_email` varchar(100) NOT NULL,
  `psn_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_kata_sandi` varchar(255) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_nohp` varchar(15) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_status`, `user_name`, `user_kata_sandi`, `user_nama`, `user_nohp`, `user_email`) VALUES
(1, 1, 'admin', '$2y$10$DqNiaDBVcDEBUT1yjU7AZueRIaD7.r8ip74l8RSRyKjo2nXswsUmC', 'Admin SOrong Wisata', '0812 xxxx xxxx', 'SorongWisata@gmail.com'),
(2, 0, 'arni', '$2y$10$V1vmBT8jqdmGkzzDhbA.1eevATbYJFCB0YD51TiRaMXAC5axkv1Q2', 'suharni', '081247721352', 'arni@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `wst_id` int(11) NOT NULL,
  `wst_nama` varchar(100) NOT NULL,
  `wst_gambar` varchar(100) NOT NULL,
  `wst_deskripsi` text NOT NULL,
  `wst_alamat` varchar(150) NOT NULL,
  `wst_maps` text NOT NULL,
  `wst_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`wst_id`, `wst_nama`, `wst_gambar`, `wst_deskripsi`, `wst_alamat`, `wst_maps`, `wst_kategori`) VALUES
(1, 'Pantai Dosa', 'Pantai_1585642567.jpg', 'kjkj', 'Ransiki', 'https://www.google.com/maps/place/Pantai+Pasir+Putih/@-0.8706109,134.1065689,21z/data=!4m12!1m6!3m5!1s0x2d538aa7f3348717:0xe77fe53f27490180!2sPantai+Pasir+Putih!8m2!3d-0.8707101!4d134.1067164!3m4!1s0x2d538aa7f3348717:0xe77fe53f27490180!8m2!3d-0.8707101!4d', 'Pantai'),
(2, 'Gunung Botak', 'Gunung_1585658663.jpg', 'nklkm ko kapoai aw apoka pk ;kp od kappa', 'jl. ransiki', 'https://goo.gl/maps/CoFFpRn6G67P91st6', 'Gunung'),
(10, 'Pulau Lemon Gunung', 'Pulau_1585736456.png', 'nkml', 'pulau lemon', 'https://www.google.com/maps/place/Pasar+Ikan+Sanggeng/@-0.8669071,134.067982,21z/data=!4m5!3m4!1s0x2d540a9b45fbc6e7:0x37d434d135fc81a5!8m2!3d-0.8669125!4d134.0681188', 'Pulau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`psn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`wst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `psn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `wst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
