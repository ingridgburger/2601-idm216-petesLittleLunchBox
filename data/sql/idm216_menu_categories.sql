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
-- Table structure for table `idm216_menu_categories`
--

CREATE TABLE `idm216_menu_categories` (
  `id` int NOT NULL,
  `category_name` varchar(24) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_image_filename` varchar(46) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `idm216_menu_categories`
--

INSERT INTO `idm216_menu_categories` (`id`, `category_name`, `category_image_filename`, `category_order`) VALUES
(1, 'Breakfast Sandwiches', 'breakfast_sandwiches_category_image.webp', 1),
(2, 'Breakfast Platters', 'breakfast_platters_category_image.webp', 2),
(3, 'Pastries & Sides', 'pastries_and_sides_category_image.webp', 3),
(4, 'Drinks', 'drinks_category_image.webp', 4),
(5, 'Fresh Salads', 'fresh_salad_category_image.webp', 5),
(6, 'Lunch Sandwiches', 'lunch_sandwiches_category_image.webp', 6),
(7, 'Hoagies', 'hoagies_category_image.webp', 7),
(8, 'Burgers & Hot Sandwiches', 'burgers_and_hot_sandwiches_category_image.webp', 8),
(9, 'Club Sandwiches', 'club_sandwiches_category_image.webp', 9),
(10, 'Cheesesteaks', 'cheesesteaks_category_image.webp', 10),
(11, 'Gyros', 'gyros_category_image.webp', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm216_menu_categories`
--
ALTER TABLE `idm216_menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm216_menu_categories`
--
ALTER TABLE `idm216_menu_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
