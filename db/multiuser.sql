-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 10:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_login` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_login`, `username`, `password`) VALUES
(1, 'admin', '7488e331b8b64e5794da3fa4eb10ad5d'),
(2, 'user', '80ec08504af83331911f5882349af59d'),
(4, 'admin1', 'a66abb5684c45962d887564f08346e8d');

-- --------------------------------------------------------

--
-- Table structure for table `admin_akses`
--

CREATE TABLE `admin_akses` (
  `id_login` int(11) NOT NULL,
  `id_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_akses`
--

INSERT INTO `admin_akses` (`id_login`, `id_akses`) VALUES
(1, 'admin'),
(1, 'user'),
(2, 'user'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_akses`
--

CREATE TABLE `master_akses` (
  `id_akses` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_akses`
--

INSERT INTO `master_akses` (`id_akses`, `nama`) VALUES
('admin', 'Admin'),
('user', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD KEY `id_akses` (`id_akses`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `master_akses`
--
ALTER TABLE `master_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD CONSTRAINT `admin_akses_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `master_akses` (`id_akses`),
  ADD CONSTRAINT `admin_akses_ibfk_2` FOREIGN KEY (`id_login`) REFERENCES `admin` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
