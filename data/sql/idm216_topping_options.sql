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
-- Table structure for table `idm216_topping_options`
--

CREATE TABLE `idm216_topping_options` (
  `id` int NOT NULL,
  `topping_type` varchar(12) DEFAULT NULL,
  `extra_charge` decimal(3,2) DEFAULT NULL,
  `calories` int DEFAULT NULL,
  `topping_type_image_filename` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `idm216_topping_options`
--

INSERT INTO `idm216_topping_options` (`id`, `topping_type`, `extra_charge`, `calories`, `topping_type_image_filename`) VALUES
(1, 'Egg', 0.00, 90, 'egg.webp'),
(2, 'Bacon', 1.50, 90, 'bacon.webp'),
(3, 'Hot Pepper', 0.50, 5, 'hot_pepper.webp'),
(4, 'Sweet Pepper', 0.50, 10, 'sweet_pepper.webp'),
(5, 'Ham', 1.50, 60, 'ham.webp'),
(6, 'Turkey Bacon', 1.50, 70, 'turkey_bacon.webp'),
(7, 'Sausage', 1.50, 180, 'sausage.webp'),
(8, 'No Topping', 0.00, 0, 'no_topping.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm216_topping_options`
--
ALTER TABLE `idm216_topping_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm216_topping_options`
--
ALTER TABLE `idm216_topping_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
