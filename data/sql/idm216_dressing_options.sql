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
-- Table structure for table `idm216_dressing_options`
--

CREATE TABLE `idm216_dressing_options` (
  `id` int NOT NULL,
  `dressing_type` varchar(13) DEFAULT NULL,
  `extra_charge` decimal(3,2) DEFAULT NULL,
  `calories` int DEFAULT NULL,
  `dressing_type_image_filename` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `idm216_dressing_options`
--

INSERT INTO `idm216_dressing_options` (`id`, `dressing_type`, `extra_charge`, `calories`, `dressing_type_image_filename`) VALUES
(1, 'Italian', 0.00, 90, 'italian_dressing.webp'),
(2, 'French', 0.00, 110, 'french_dressing.webp'),
(3, 'Ranch', 0.00, 140, 'ranch_dressing.webp'),
(4, 'Blue Cheese', 0.00, 150, 'blue_cheese_dressing.webp'),
(5, 'Caesar', 0.00, 160, 'caesar_dressing.webp'),
(6, 'Honey Mustard', 0.00, 130, 'honey_mustard_dressing.webp'),
(7, 'No Dressing', 0.00, 0, 'no_topping.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm216_dressing_options`
--
ALTER TABLE `idm216_dressing_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm216_dressing_options`
--
ALTER TABLE `idm216_dressing_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
