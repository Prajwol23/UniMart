-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 03:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(26, 10, 14, 1, '2024-12-07 07:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(7, 'Phones', 'mobile', 'All kinds of phones are available here', 0, 0, '1731500667.jpg', 'phn', 'Here you will get all kinds of phones all cases', 'Here you will get all kinds of phones', '2024-11-12 16:35:41'),
(9, 'Electronics', 'electric ', 'Hello Electronic devices here', 0, 0, '1731500565.jpg', 'Hello Electronic devices here', 'Hello Electronic devices here', 'Hello Electronic devices here', '2024-11-13 12:22:45'),
(10, 'Fashion', 'Fashion Wear', 'All kinds of fashion wear', 0, 0, '1731500762.jpg', 'All kinds of fashion wear', 'All kinds of fashion wear', 'All kinds of fashion wear', '2024-11-13 12:26:02'),
(11, 'Laptops', 'All kinds of laptops', 'All kinds of laptops', 0, 0, '1731500828.jpg', 'All kinds of laptops', 'All kinds of laptops', 'All kinds of laptops', '2024-11-13 12:27:08'),
(12, 'FootWear', 'All kinds of Footwear', 'All kinds of laptops', 0, 0, '1731500997.jpg', 'All kinds of footwear', 'All kinds of footwear', 'All kinds of footwear', '2024-11-13 12:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`, `payment_status`) VALUES
(4, 'unicart171742871011', 7, 'Prajwol Mishra', 'mishraprajwol23@gmail.com', '9742871011', 'Kathmandu - Nepal', 45600, 935000, 'COD', '', 1, NULL, '2024-11-16 18:35:23', 'Pending'),
(5, 'unicart264508505541', 7, 'nike jordan', 'mishraprazzan@gmail.com', '9808505541', 'qqqqq', 4500, 935000, 'COD', '', 1, NULL, '2024-11-16 18:39:11', 'Pending'),
(6, 'unicart672108505541', 7, 'Sophan Adhikari', 'sophan@gmail.com', '9808505541', 'Sorakhutte Kathmandu', 45667, 120000, 'COD', '', 0, NULL, '2024-11-17 17:00:04', 'Pending'),
(7, 'unicart896208505541', 7, 'Sophan Adhikari', 'sophan@gmail.com', '9808505541', 'Sorakhutte Kathmandu', 45667, 120000, 'COD', '', 0, NULL, '2024-11-17 17:04:53', 'Pending'),
(8, 'unicart855334567', 9, 'ame', 'amemishra3@gmail.com', '1234567', 'kathmandu', 45600, 150000, 'COD', '', 0, NULL, '2024-11-19 06:50:50', 'Pending'),
(9, 'unicart88483456789', 9, 'Ame Mishra', 'amemishra3@gmail.com', '123456789', 'Kathmandu ', 45600, 175000, 'COD', '', 0, NULL, '2024-11-19 06:53:03', 'Pending'),
(10, 'unicart86314643134', 9, 'Ame Mishra', 'amemishra3@gmail.com', '974643134', 'kathmandu', 45600, 14500, 'COD', '', 0, NULL, '2024-11-19 06:54:40', 'Pending'),
(11, 'unicart818146431349', 9, 'Praman Mishra', 'amemishra3@gmail.com', '9746431349', 'kathmandu', 45600, 190000, 'COD', '', 0, NULL, '2024-11-19 06:57:45', 'Pending'),
(12, 'unicart430342871011', 7, 'Prajwol Mishra', 'mishrapraman61@gmail.com', '9742871011', 'ssksks', 45600, 14500, 'COD', '', 0, NULL, '2024-11-19 08:29:13', 'Pending'),
(13, 'unicart857146431349', 7, 'pfgfg', 'cxxc@gmail.com', '9746431349', 'ktm', 45600, 175000, 'COD', '', 0, NULL, '2024-11-19 15:31:39', 'Pending'),
(14, 'unicart975234567890', 7, 'praman', 'mishraprajwol23@gmail.com', '1234567890', 'ktm', 4560, 14500, 'esewa', '', 0, NULL, '2024-11-21 07:28:32', 'Pending'),
(15, 'unicart312142871011', 7, 'Praman Mishra', 'mishrapraman61@gmail.com', '9742871011', 'ktm', 45600, 14500, 'COD', '', 0, NULL, '2024-11-21 08:56:38', 'Pending'),
(16, 'unicart948846431349', 10, 'Prazan', 'mishraprazzan@gmail.com', '9746431349', 'Kathmandu', 0, 175000, 'COD', '', 1, NULL, '2024-12-07 06:53:34', 'Pending'),
(17, 'unicart899408505541', 10, 'Prazan', 'mishraprazzan@gmail.com', '9808505541', 'kathmandu', 45600, 14500, 'COD', '', 0, NULL, '2024-12-07 06:58:44', 'Pending'),
(18, 'unicart598942871011', 10, 'Praman Mishra', 'mishraprazzan@gmail.com', '9742871011', 'ktm', 45600, 8500, 'COD', '', 0, NULL, '2024-12-07 07:38:28', 'Pending'),
(19, 'unicart626608505541', 7, 'Prajwol', 'mishrapraman61@gmail.com', '9808505541', 'kathmandu', 45600, 8500, 'Esewa', '', 0, NULL, '2024-12-08 06:41:00', 'Pending'),
(20, 'unicart929142871011', 7, 'Prajwol Dangol', 'mishraprajwol@gmail.com', '9742871011', 'Kathmandu', 45600, 500, 'Esewa', '', 1, NULL, '2024-12-08 06:58:41', 'Pending'),
(21, 'unicart937542871011', 7, 'abcdef', 'abc@gmail.com', '9742871011', 'ktm', 45600, 500, 'Esewa', '', 1, NULL, '2024-12-08 07:09:32', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(5, 4, 8, 2, 30000, '2024-11-16 18:35:23'),
(6, 4, 9, 5, 175000, '2024-11-16 18:35:23'),
(7, 5, 8, 2, 30000, '2024-11-16 18:39:11'),
(8, 5, 9, 5, 175000, '2024-11-16 18:39:11'),
(9, 6, 8, 4, 30000, '2024-11-17 17:00:04'),
(10, 7, 8, 4, 30000, '2024-11-17 17:04:53'),
(11, 8, 15, 1, 150000, '2024-11-19 06:50:50'),
(12, 9, 9, 1, 175000, '2024-11-19 06:53:03'),
(13, 10, 14, 1, 14500, '2024-11-19 06:54:40'),
(14, 11, 10, 1, 190000, '2024-11-19 06:57:45'),
(15, 12, 14, 1, 14500, '2024-11-19 08:29:13'),
(16, 13, 9, 1, 175000, '2024-11-19 15:31:39'),
(17, 14, 14, 1, 14500, '2024-11-21 07:28:32'),
(18, 15, 14, 1, 14500, '2024-11-21 08:56:38'),
(19, 16, 9, 1, 175000, '2024-12-07 06:53:34'),
(20, 17, 14, 1, 14500, '2024-12-07 06:58:44'),
(21, 18, 13, 1, 8500, '2024-12-07 07:38:28'),
(22, 19, 13, 1, 8500, '2024-12-08 06:41:00'),
(23, 20, 14, 1, 500, '2024-12-08 06:58:41'),
(24, 21, 14, 1, 500, '2024-12-08 07:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `orginal_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `orginal_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(9, 7, 'Iphone 15 Pro Max', 'Iphone is great', 'Black Titanium, White Titanium, Blue Titanium, Natural Titanium\r\n\r\nTitanium design\r\nCeramic Shield front\r\nTextured matte glass back\r\nSuper Retina XDR display\r\n6.7‑inch (diagonal) all‑screen OLED display\r\n2796‑by‑1290-pixel resolution at 460 ppi', 'The iPhone 15 Pro Max display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.69 inches diagonally (actual viewable area is less).', 200000, 175000, '1731520123.jpg', 2, 0, 1, 'Iphone is great', 'Iphone is great', 'Iphone is great', '2024-11-13 17:48:43'),
(10, 9, 'Samsung QLED 4K', 'tv', 'The Samsung QLED 4K Q60C (2023 model) offers a brilliant viewing experience with its Quantum Processor Lite 4K, which enhances clarity and upscales content to near-4K quality. Available in sizes ranging from 43 to 85 inches, this TV delivers vibrant colors, deep contrast, and sharp details thanks to its Quantum Dot technology. With Object Tracking Sound Lite, audio feels immersive and dynamic, following the on-screen action. Equipped with Samsung’s Tizen OS, it provides easy access to streaming apps, voice control, and a seamless gaming experience with low latency. Its sleek, bezel-free design makes it a stylish centerpiece in any room.\r\n', 'With the QLED 4K Q60C, you get a lifelike viewing experience with bright colors, deep contrast, and detailed clarity. The Quantum Processor Lite works efficiently to upscale non-4K content, providing a near-4K experience. The Object Tracking Sound Lite feature immerses you in audio that flows with the on-screen action, making it great for movie nights or intense gaming sessions. The slim design and virtually bezel-free display make it an attractive addition to any room, giving you an expansive viewing area without distractions.\r\n\r\nThis Samsung QLED model combines high performance and smart functionality, offering a premium viewing experience for streaming, gaming, and everyday use.', 200000, 190000, '1731576241.jpg', 9, 0, 1, 'all kinds of tv', 'all kinds of tv', 'all kinds of tv', '2024-11-14 09:24:01'),
(13, 9, 'CG mixer grind', 'mixer', 'The mixer is constructed with a stainless steel body, ensuring durability and resistance to corrosion, making it long-lasting and easy to clean. The control knobs are made of durable plastic, offering an ergonomic feel and easy functionality. Non-slip rubber feet are used at the base to ensure stability and prevent the mixer from moving during operation. The mixing bowl is large enough to handle various ingredients, and the beaters are designed to efficiently mix, beat, and whip.', 'This high-quality kitchen mixer is designed for a range of culinary tasks such as whipping, blending, and mixing various ingredients. Equipped with multiple speed settings, it allows for versatility depending on the desired mixing intensity. The large mixing bowl provides ample space for preparing batters, doughs, and more. The mixer includes ergonomic handles for comfortable use, making it ideal for both experienced cooks and beginners. Its compact design ensures it can be conveniently stored when not in use, making it perfect for kitchens with limited space. This mixer is an excellent tool for home bakers, cooks, or anyone needing reliable equipment for everyday food preparation.', 10000, 8500, '1731577951.jpg', 8, 0, 1, 'Mixer', 'mixer', 'mixer', '2024-11-14 09:52:31'),
(14, 10, 'Nike Shoes', 'Shoes', ' Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world', 'Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world Hello World Hello world hello world hello world', 1000, 500, '1731646309.jpg', 3, 0, 1, 'shoes', 'shoes', 'HShoes', '2024-11-15 04:51:49'),
(15, 11, ' ASUS VivoBook 15 (M515) ', 'Laptop', ' Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World ', 'Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World\r\nHello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World\r\nHello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World\r\nHello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World\r\nHello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World', 200000, 150000, '1731915190.jpg', 19, 0, 0, 'Laptop', 'Laptop', 'Laptop', '2024-11-18 07:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'Praman', 'mishrapraman61@gmail.com', 2147483647, 'praman123', 1, '2024-11-10 13:27:57'),
(7, 'Prajwol', 'mishraprajwol23@gmail.com', 2147483647, 'prajwol123', 0, '2024-11-10 17:22:05'),
(8, 'Hy123', '', 0, '', 0, '2024-11-19 06:36:22'),
(9, 'ame', 'amemishra3@gmail.com', 2147483647, 'ame123', 0, '2024-11-19 06:46:22'),
(10, 'Prazan', 'mishraprazzan@gmail.com', 2147483647, 'prazan123', 0, '2024-12-07 06:52:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
