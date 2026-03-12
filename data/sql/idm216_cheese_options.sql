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
-- Table structure for table `idm216_cheese_options`
--

CREATE TABLE `idm216_cheese_options` (
  `id` int NOT NULL,
  `cheese_type` varchar(9) DEFAULT NULL,
  `extra_charge` decimal(3,2) DEFAULT NULL,
  `calories` int DEFAULT NULL,
  `cheese_type_image_filename` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `idm216_cheese_options`
--

INSERT INTO `idm216_cheese_options` (`id`, `cheese_type`, `extra_charge`, `calories`, `cheese_type_image_filename`) VALUES
(1, 'American', 0.00, 70, 'american_cheese.webp'),
(2, 'Cheddar', 0.00, 120, 'cheddar_cheese.webp'),
(3, 'Swiss', 0.00, 110, 'swiss_cheese.webp'),
(4, 'No Cheese', 0.00, 0, 'no_topping.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm216_cheese_options`
--
ALTER TABLE `idm216_cheese_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm216_cheese_options`
--
ALTER TABLE `idm216_cheese_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
