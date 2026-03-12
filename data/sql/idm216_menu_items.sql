-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 02, 2026 at 08:42 PM
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
-- Table structure for table `idm216_menu_items`
--

CREATE TABLE `idm216_menu_items` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `item_name` varchar(58) DEFAULT NULL,
  `description` varchar(88) DEFAULT NULL,
  `base_price` decimal(3,2) DEFAULT NULL,
  `calories` int DEFAULT NULL,
  `menu_item_image_filename` varchar(50) DEFAULT NULL,
  `bagel_options` varchar(17) DEFAULT NULL,
  `bread_options` varchar(30) DEFAULT NULL,
  `cheese_options` varchar(35) DEFAULT NULL,
  `topping_options` varchar(36) DEFAULT NULL,
  `dressing_options` varchar(58) DEFAULT NULL,
  `size_options` varchar(12) DEFAULT NULL,
  `filter_by` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `idm216_menu_items`
--

INSERT INTO `idm216_menu_items` (`id`, `category_id`, `item_name`, `description`, `base_price`, `calories`, `menu_item_image_filename`, `bagel_options`, `bread_options`, `cheese_options`, `topping_options`, `dressing_options`, `size_options`, `filter_by`) VALUES
(1, 1, 'Egg & Cheese', 'Fluffy eggs and melted cheese on a toasted bagel.', 4.50, 400, 'egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'V'),
(2, 1, 'Bacon, Egg & Cheese', 'Crispy bacon, fluffy eggs, and melted cheese on a toasted bagel.', 6.00, 520, 'bacon_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(3, 1, 'Turkey Bacon, Egg & Cheese', 'Savory turkey bacon with fluffy eggs and melted cheese on a toasted bagel.', 6.00, 500, 'turkey_bacon_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(4, 1, 'Ham, Egg, & Cheese', 'Warm ham, fluffy eggs, and melted cheese on a toasted bagel.', 6.00, 520, 'ham_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(5, 1, 'Sausage, Egg, & Cheese', 'Juicy sausage, fluffy eggs, and melted cheese on a toasted bagel.', 6.00, 580, 'sausage_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(6, 1, 'Pork Roll, Egg, & Cheese', 'Classic pork roll with fluffy eggs and melted cheese on a toasted bagel.', 6.00, 600, 'pork_roll_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(7, 1, 'Scrapple, Egg, & Cheese', 'Crispy scrapple, fluffy eggs, and melted cheese on a toasted bagel.', 6.00, 550, 'scrapple_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', ''),
(8, 1, 'Steak, Egg, & Cheese', 'Tender steak, fluffy eggs, and melted cheese on a toasted bagel.', 8.00, 650, 'steak_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(9, 1, 'Hot Sausage, Egg, & Cheese', 'Spicy sausage, fluffy eggs, and melted cheese on a toasted bagel.', 7.00, 620, 'hot_sausage_egg_and_cheese.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(10, 1, 'B.L.T. (Wheat/White)', 'Crispy bacon, fresh lettuce, and ripe tomatoes on wheat or white toast.', 6.00, 350, 'blt_wheat_white.webp', '', 'Wheat, White', '', '', '', '', ''),
(11, 1, 'B.L.T. (Roll/Wrap/Pita)', 'Crispy bacon, fresh lettuce, and ripe tomatoes in your choice of roll, wrap, or pita.', 7.00, 400, 'blt_roll_wrap_pita.webp', '', 'Roll, Wrap, Pita', '', '', '', '', ''),
(12, 1, 'Grilled Cheese', 'Melted cheese between perfectly toasted bread.', 3.50, 300, 'grilled_cheese.webp', '', 'Wheat, White', 'American, Cheddar, Swiss', '', '', '', 'V'),
(13, 1, 'Grilled Cheese w/ Tomatoes', 'Melted cheese and fresh tomatoes on perfectly toasted bread.', 4.00, 350, 'grilled_cheese_with_tomatoes.webp', '', 'Wheat, White', 'American, Cheddar, Swiss', '', '', '', 'V'),
(14, 1, 'Grilled Cheese w/ Ham, Bacon, or Turkey Bacon', 'Melted cheese with your choice of ham, bacon, or turkey bacon on toasted bread.', 6.00, 450, 'grilled_cheese_with_ham_bacon_or_turkey_bacon.webp', '', 'Wheat, White', 'American, Cheddar, Swiss', 'Ham, Bacon, Turkey Bacon, No Topping', '', '', 'HP'),
(15, 1, 'Western Omelette', 'Fluffy omelette with ham, peppers, onions, and melted cheese.', 7.00, 500, 'western_omelette.webp', '', '', 'American, Cheddar, Swiss', '', '', '', 'GF, HP, LC'),
(16, 1, 'Bacon, Egg, & Cheese w/ Hash Brown', 'Crispy bacon, fluffy eggs, melted cheese, and a golden hash brown on a toasted bagel.', 7.00, 650, 'bacon_egg_and_cheese_with_hash_brown.webp', 'Plain, Everything', '', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(17, 2, 'Egg & Cheese', 'Fluffy eggs served with melted cheese.', 4.50, 400, 'egg_and_cheese_platter.webp', '', '', 'American, Cheddar, Swiss', '', '', '', 'V, GF, LC'),
(18, 2, 'Egg w/ Breakfast Meat (Bacon, Sausage, Ham, Turkey, Bacon)', 'Fluffy eggs served with your choice of bacon, sausage, ham, or turkey bacon.', 6.00, 500, 'egg_with_breakfast_meat.webp', '', '', '', 'Bacon, Sausage, Ham, Turkey Bacon', '', '', 'GF, HP, LC'),
(19, 2, 'Western', 'Fluffy eggs with ham, peppers, onions, and melted cheese.', 7.00, 500, 'western.webp', '', '', 'American, Cheddar, Swiss', '', '', '', 'GF, HP, LC'),
(20, 3, 'Bagel w/ Cream Cheese', 'A toasted bagel spread with smooth, creamy cream cheese.', 2.50, 350, 'bagel_with_cream_cheese.webp', 'Plain, Everything', '', '', '', '', '', 'V'),
(21, 3, 'Muffin', 'A soft, freshly baked muffin with a lightly sweet crumb.', 2.50, 400, 'muffin.webp', '', '', '', '', '', '', 'V'),
(22, 3, 'Jelly Toast', 'Toasted bread topped with butter and sweet fruit jelly.', 3.00, 300, 'jelly_toast.webp', '', '', '', '', '', '', 'V'),
(23, 3, 'Hash Brown', 'A golden, crispy hash brown with a soft center.', 1.50, 200, 'hash_brown.webp', '', '', '', '', '', '', 'GF, DF, V'),
(24, 3, 'Chips', 'Crunchy, classic chips perfect on the side.', 0.75, 150, 'chips.webp', '', '', '', '', '', '', 'GF, DF, V'),
(25, 4, 'Hot Coffee', 'Freshly brewed coffee served hot and smooth.', 1.00, 5, 'hot_coffee.webp', '', '', '', '', '', 'Small, Large', 'GF, DF, LC, LS'),
(26, 4, 'Iced Coffee', 'Chilled brewed coffee poured over ice.', 3.00, 10, 'iced_coffee.webp', '', '', '', '', '', 'Small, Large', 'GF, DF, LC, LS'),
(27, 4, 'Hot Tea', 'Steeped tea served hot and soothing.', 1.00, 5, 'hot_tea.webp', '', '', '', '', '', 'Small, Large', 'GF, DF, LC, LS'),
(28, 4, 'Reg. Iced Tea', 'Freshly brewed tea served cold over ice.', 2.50, 5, 'reg_iced_tea.webp', '', '', '', '', '', 'Small, Large', 'GF, DF, LC, LS'),
(29, 4, 'Iced Green Tea', 'Light green tea served cold and refreshing.', 2.50, 5, 'iced_green_tea.webp', '', '', '', '', '', 'Small, Large', 'GF, DF, LC, LS'),
(30, 4, 'Thai Iced Tea', 'Sweet, creamy spiced tea served over ice.', 3.00, 180, 'thai_iced_tea.webp', '', '', '', '', '', 'Small, Large', 'GF'),
(31, 4, 'Hot Chocolate', 'Rich chocolate drink served hot and cozy.', 1.00, 200, 'hot_chocolate.webp', '', '', '', '', '', 'Small, Large', 'GF'),
(32, 4, 'Soda (Can)', 'A chilled can of your favorite soda.', 1.50, 150, 'soda_can.webp', '', '', '', '', '', '', 'GF, DF '),
(33, 4, 'Soda (Bottle)', 'A cold bottle of your favorite soda.', 2.50, 200, 'soda_bottle.webp', '', '', '', '', '', '', 'GF, DF '),
(34, 4, 'Juice', 'Refreshing fruit juice served cold.', 2.75, 120, 'juice.webp', '', '', '', '', '', '', 'GF, DF '),
(35, 4, 'Pink Lemonade', 'Sweet and tangy pink lemonade served cold.', 2.50, 120, 'pink_lemonade.webp', '', '', '', '', '', '', 'GF, DF '),
(36, 4, 'Vitamin Water', 'Flavored vitamin-enhanced water served cold.', 2.75, 80, 'vitamin_water.webp', '', '', '', '', '', '', 'GF, DF, LC, LS'),
(37, 4, 'Snapple', 'A chilled bottle of classic Snapple tea or juice.', 2.50, 120, 'snapple.webp', '', '', '', '', '', '', 'GF, DF '),
(38, 4, 'Gatorade', 'A cold sports drink for quick refreshment.', 2.50, 100, 'gatorade.webp', '', '', '', '', '', '', 'GF, DF '),
(39, 4, 'Water', 'Crisp bottled water served cold.', 1.50, 0, 'water.webp', '', '', '', '', '', '', 'GF, DF, LC, LS'),
(40, 5, 'Garden Salad', 'Fresh mixed greens with crisp vegetables.', 4.50, 150, 'garden_salad.webp', '', '', '', '', 'Italian, French, Ranch, Blue Cheese, Caesar, Honey Mustard', '', 'GF, DF, V, LC, LS'),
(41, 5, 'Grilled Chicken Salad', 'Grilled chicken served over fresh mixed greens.', 7.50, 350, 'grilled_chicken_salad.webp', '', '', '', '', 'Italian, French, Ranch, Blue Cheese, Caesar, Honey Mustard', '', 'GF, DF, HP, LC'),
(42, 5, 'Chef Salad', 'Mixed greens topped with ham, turkey, cheese, and fresh vegetables.', 7.50, 400, 'chef_salad.webp', '', '', '', '', 'Italian, French, Ranch, Blue Cheese, Caesar, Honey Mustard', '', 'GF, HP'),
(43, 5, 'Tuna Salad', 'House-made tuna salad served over fresh mixed greens.', 7.50, 350, 'tuna_salad.webp', '', '', '', '', 'Italian, French, Ranch, Blue Cheese, Caesar, Honey Mustard', '', 'GF, HP'),
(44, 5, 'Chicken Salad', 'Creamy chicken salad served over fresh mixed greens.', 7.50, 350, 'chicken_salad.webp', '', '', '', '', 'Italian, French, Ranch, Blue Cheese, Caesar, Honey Mustard', '', 'GF, HP'),
(45, 6, 'Turkey & Cheese', 'Sliced turkey and melted cheese on your choice of fresh bread.', 6.00, 450, 'turkey_and_cheese.webp', '', 'Wheat, White, Bagel, Croissant', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(46, 6, 'Ham & Cheese', 'Sliced ham and melted cheese on your choice of fresh bread.', 6.00, 450, 'ham_and_cheese.webp', '', 'Wheat, White, Bagel, Croissant', 'American, Cheddar, Swiss', '', '', '', 'HP'),
(47, 6, 'Chicken Salad', 'Creamy chicken salad on your choice of fresh bread.', 6.00, 350, 'chicken_salad_sandwich.webp', '', 'Wheat, White, Bagel, Croissant', '', '', '', '', 'HP'),
(48, 6, 'Tuna Salad', 'House-made tuna salad on your choice of fresh bread.', 6.00, 350, 'tuna_salad_sandwich.webp', '', 'Wheat, White, Bagel, Croissant', '', '', '', '', 'HP'),
(49, 6, 'Grilled Chicken', 'Grilled chicken served on your choice of fresh bread.', 6.00, 400, 'grilled_chicken_sandwich.webp', '', 'Wheat, White, Bagel, Croissant', '', '', '', '', 'HP'),
(50, 7, 'Turkey & Cheese', 'Sliced turkey and melted cheese on a fresh hoagie roll.', 8.00, 500, 'turkey_and_cheese_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(51, 7, 'Cheese Hoagie', 'Melted cheese layered on a fresh hoagie roll.', 5.00, 400, 'cheese_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'V'),
(52, 7, 'Ham & Cheese', 'Sliced ham and melted cheese on a fresh hoagie roll.', 8.00, 500, 'ham_and_cheese_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(53, 7, 'Grilled Chicken', 'Grilled chicken served on a fresh hoagie roll.', 8.00, 500, 'grilled_chicken_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(54, 7, 'Tuna (lettuce, tomato onion)', 'House-made tuna with lettuce, tomato, and onion on a fresh hoagie roll.', 8.00, 450, 'tuna_salad_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(55, 7, 'Chicken Salad', 'Creamy chicken salad on a fresh hoagie roll.', 8.00, 450, 'chicken_salad_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(56, 8, 'Hot Dog', 'A grilled hot dog served on a soft bun.', 2.00, 250, 'hot_dog.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', ''),
(57, 8, 'Cheese Burger', 'A juicy beef patty topped with melted cheese on a fresh bun.', 6.00, 550, 'cheese_burger.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(58, 8, 'Bacon Cheeseburger', 'A juicy beef patty topped with crispy bacon and melted cheese on a fresh bun.', 7.00, 650, 'bacon_cheese_burger.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(59, 8, 'Hot Sausage', 'A spicy sausage served on a fresh roll.', 4.50, 450, 'hot_sausage.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', ''),
(60, 9, 'Turkey Club', 'Sliced turkey layered with bacon, lettuce, and tomato on toasted bread.', 8.00, 600, 'turkey_club.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(61, 9, 'Tuna Club', 'House-made tuna layered with bacon, lettuce, and tomato on toasted bread.', 8.00, 600, 'tuna_club.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(62, 9, 'Chicken Salad Club', 'Creamy chicken salad layered with bacon, lettuce, and tomato on toasted bread.', 8.00, 600, 'chicken_salad_club.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(63, 9, 'Ham Club', 'Sliced ham layered with bacon, lettuce, and tomato on toasted bread.', 8.00, 600, 'ham_club.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(64, 9, 'Grilled Chicken Club', 'Grilled chicken layered with bacon, lettuce, and tomato on toasted bread.', 8.00, 600, 'grilled_chicken_club.webp', '', 'Wheat, White', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(65, 10, 'Cheese Steak', 'Thinly sliced steak with melted cheese on a fresh hoagie roll.', 7.00, 650, 'cheese_steak_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(66, 10, 'Pizza Steak', 'Thinly sliced steak with marinara and melted cheese on a fresh hoagie roll.', 8.00, 700, 'pizza_cheese_steak.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(67, 10, 'Mushroom Cheese Steak', 'Thinly sliced steak with sautéed mushrooms and melted cheese on a fresh hoagie roll.', 8.00, 700, 'mushroom_cheese_steak.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(68, 10, 'Green Pepper Cheese Steak', 'Thinly sliced steak with sautéed green peppers and melted cheese on a fresh hoagie roll.', 8.00, 700, 'green_pepper_cheese_steak.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(69, 10, 'Cheese Steak Hoagie', 'Thinly sliced steak with melted cheese and fresh veggies on a hoagie roll.', 8.00, 700, 'cheese_steak_hoagie.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(70, 10, 'Buffalo Chicken Cheese Steak', 'Spicy buffalo chicken with melted cheese on a fresh hoagie roll.', 7.50, 650, 'buffalo_chicken_cheese_steak.webp', '', 'Hoagie, Pita, Wrap', 'American, Cheddar, Swiss, No Cheese', 'Hot Pepper, Sweet Pepper, No Topping', '', '', 'HP'),
(71, 11, 'Lamb Gyro', 'Tender lamb with fresh veggies and sauce wrapped in warm pita.', 6.50, 550, 'lamb_gyro.webp', '', '', '', '', '', '', 'HP'),
(72, 11, 'Vegetarian', 'Fresh vegetables with creamy sauce wrapped in warm pita.', 5.50, 450, 'vegetarian_gyro.webp', '', '', '', '', '', '', 'V');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm216_menu_items`
--
ALTER TABLE `idm216_menu_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm216_menu_items`
--
ALTER TABLE `idm216_menu_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
