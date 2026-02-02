-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 01, 2026 at 09:13 PM
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
-- Table structure for table `idm216_bread_options`
--

CREATE TABLE `idm216_bread_options` (
  `id` int NOT NULL,
  `bread_type` varchar(9) DEFAULT NULL,
  `extra_charge` decimal(3,2) DEFAULT NULL,
  `calories` int DEFAULT NULL,
  `bread_type_image_filename` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `idm216_bread_options`
--

INSERT INTO `idm216_bread_options` (`id`, `bread_type`, `extra_charge`, `calories`, `bread_type_image_filename`) VALUES
(1, 'Wheat', 0.00, 200, 'wheat_bread.webp'),
(2, 'White', 0.00, 200, 'white_bread.webp'),
(3, 'Roll', 0.00, 220, 'roll.webp'),
(4, 'Hoagie', 0.00, 300, 'hoagie.webp'),
(5, 'Wrap', 0.00, 260, 'wrap.webp'),
(6, 'Pita', 0.00, 200, 'pita.webp'),
(7, 'Bagel', 0.00, 280, 'plain_bagel.webp'),
(8, 'Croissant', 0.00, 340, 'croissant.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm216_bread_options`
--
ALTER TABLE `idm216_bread_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm216_bread_options`
--
ALTER TABLE `idm216_bread_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
