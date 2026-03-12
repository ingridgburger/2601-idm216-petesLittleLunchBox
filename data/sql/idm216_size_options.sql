-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 01, 2026 at 09:14 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sej84_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `idm216_size_options`
--

CREATE TABLE `idm216_size_options` (
  `id` int NOT NULL,
  `size_type` varchar(5) DEFAULT NULL,
  `extra_charge` decimal(3,2) DEFAULT NULL,
  `calories` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `idm216_size_options`
--

INSERT INTO `idm216_size_options` (`id`, `size_type`, `extra_charge`, `calories`) VALUES
(1, 'Small', 0.00, 0),
(2, 'Large', 0.50, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm216_size_options`
--
ALTER TABLE `idm216_size_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm216_size_options`
--
ALTER TABLE `idm216_size_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
