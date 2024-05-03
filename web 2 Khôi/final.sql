-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 12:57 PM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mssv` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `birthday`, `picture`, `email`, `password`, `phone`, `address`, `mssv`) VALUES
(1, 'Admin1', '1990-05-15', 'admin1.jpg', 'hung1@gmail.com', '123123123', '123456789', '123 Street, City', '123456'),
(2, 'Admin2', '1988-10-20', 'admin2.jpg', 'admin2@example.com', 'password2', '987654321', '456 Avenue, Town', '654321'),
(3, 'Admin3', '1995-03-25', 'admin3.jpg', 'admin3@example.com', 'password3', '111222333', '789 Road, Village', '987654');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(60) NOT NULL,
  `ctg_des` varchar(150) NOT NULL,
  `ctg_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `ctg_name`, `ctg_des`, `ctg_status`) VALUES
(1, 'Phones', '', 1),
(2, 'Tablets', '', 1),
(3, 'Laptop', '', 1),
(4, 'Gaming Laptop', '', 1),
(5, 'Office Laptop', '', 1),
(6, 'Workstation Laptop', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` int(3) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `Shipping_mobile` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `amount` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_ward` varchar(50) NOT NULL,
  `address_district` varchar(50) NOT NULL,
  `address_city` varchar(50) NOT NULL,
  `order_time` datetime NOT NULL,
  `total_bill` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pdt_id` int(11) NOT NULL,
  `pdt_name` varchar(200) NOT NULL,
  `pdt_price` int(255) NOT NULL,
  `pdt_des` varchar(250) NOT NULL,
  `pdt_ctg` int(200) NOT NULL,
  `pdt_img` varchar(250) NOT NULL,
  `pdt_stock` int(5) NOT NULL,
  `pdt_status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pdt_id`, `pdt_name`, `pdt_price`, `pdt_des`, `pdt_ctg`, `pdt_img`, `pdt_stock`, `pdt_status`) VALUES
(1, 'Apple iPhone 13 Pro', 999, 'The latest iPhone with advanced camera features', 1, 'product-3.jpg', 50, 1),
(2, 'Samsung Galaxy S21', 799, 'Flagship Android smartphone with 5G capabilities', 1, 'product-3.jpg', 30, 1),
(3, 'Apple iPad Air', 599, 'Powerful and slim tablet for productivity and entertainment', 2, 'product-3.jpg', 25, 1),
(4, 'Microsoft Surface Pro', 999, 'Versatile 2-in-1 laptop and tablet combo', 3, 'product-3.jpg', 15, 1),
(5, 'Asus ROG Zephyrus', 1499, 'High-performance gaming laptop with cutting-edge graphics', 4, 'product-3.jpg', 10, 1),
(6, 'Dell XPS 13', 1299, 'Premium ultrabook with a stunning display', 5, 'product-3.jpg', 20, 1),
(7, 'Lenovo ThinkPad X1 Carbon', 1399, 'Durable and lightweight business laptop', 6, 'product-3.jpg', 12, 1),
(8, 'Samsung Galaxy Z Fold4', 1799, 'Innovative foldable smartphone with a 7.6-inch dynamic AMOLED display', 1, 'product-3.jpg', 10, 1),
(9, 'Google Pixel 6a', 449, 'Affordable Google phone with Tensor chip and exceptional camera', 1, 'product-3.jpg', 16, 1),
(10, 'Sony Xperia 1 IV', 1299, 'Flagship smartphone with 4K display and pro-level camera', 1, 'product-3.jpg', 18, 1),
(11, 'Apple iPad Pro', 1099, 'Top-of-the-line tablet with M1 chip, designed for professionals', 2, 'product-3.jpg', 12, 1),
(12, 'Samsung Galaxy Tab S8', 699, 'High-performance tablet with large display and S Pen support', 2, 'product-3.jpg', 17, 1),
(13, 'Lenovo Tab P11 Pro', 499, 'Affordable Android tablet with OLED display for entertainment and work', 2, 'product-3.jpg', 19, 1),
(14, 'Dell XPS 15', 2399, 'High-end laptop with OLED touch display and up to Intel Core i9 processor', 3, 'product-3.jpg', 14, 1),
(15, 'HP Spectre x360', 1599, 'Versatile 2-in-1 laptop with 4K OLED display and Intel Evo platform', 3, 'product-3.jpg', 11, 1),
(16, 'Asus TUF Dash F15', 1099, 'Robust gaming laptop with RTX 3060 and 144Hz display', 4, 'product-3.jpg', 18, 1),
(17, 'MSI Stealth 15M', 1499, 'Ultra-thin gaming laptop with RTX 3070 and 11th Gen Intel CPU', 4, 'product-3.jpg', 12, 1),
(18, 'Alienware x14', 1799, 'Portable gaming powerhouse with RTX 3050 Ti and 14-inch screen', 4, 'product-3.jpg', 19, 1),
(19, 'MacBook Air M2', 1199, 'Lightweight and powerful, with the new M2 chip for enhanced performance', 5, 'product-3.jpg', 15, 1),
(20, 'Lenovo ThinkBook 13s', 850, 'Business laptop with AMD Ryzen processors and AI-based noise cancellation', 5, 'product-3.jpg', 19, 1),
(21, 'ThinkPad X1 Extreme Gen 4', 2500, 'Top-tier workstation with 4K OLED touch display and Nvidia RTX 3080', 6, 'product-3.jpg', 20, 1),
(22, 'HP ZBook Fury 17 G8', 3100, 'Professional workstation with Nvidia RTX A5000 graphics and 11th Gen Intel CPUs', 6, 'product-3.jpg', 12, 1),
(23, 'Dell Precision 5560', 2000, 'Workstation-grade performance in a sleek and light chassis', 6, 'product-3.jpg', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `pdt_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `pdt_id`, `image_url`) VALUES
(1, 1, '1.jpg'),
(2, 1, '2.jpg'),
(3, 1, '3.jpg'),
(4, 2, '4.jpg'),
(5, 2, '1.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_info_ctg`
-- (See below for the actual view)
--
CREATE TABLE `product_info_ctg` (
`pdt_id` int(11)
,`pdt_name` varchar(200)
,`pdt_price` int(255)
,`pdt_des` varchar(250)
,`pdt_img` varchar(250)
,`product_stock` int(5)
,`pdt_status` tinyint(5)
,`ctg_id` int(11)
,`ctg_name` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_firstname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_lastname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` varchar(11) NOT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`, `is_locked`, `created_at`) VALUES
(3, '', '', '', '123', '$2y$12$EYZxPxnI4spA8SgLIetwBOmjTsHgbwsB6B.ZS4Pvu1Bl/n5i4.GMO', 'lqkk@gmail.', 0, '2024-05-03 09:34:11'),
(4, 'koki', '', '', 'lqk@gmail.com', '$2y$12$TNLsuDyMWKjTNu8e1uqhme7bL3sHdJA7YxBHBYK9XXDIwg3fF4ONa', '0909090900', 0, '2024-05-03 09:37:48'),
(5, 'kohi', '', '', 'Lam@gmail.com', '$2y$12$IVtvvQu4DjcK26VB0tpVEuCeVqcM1oZDNrTnYxFfpi6sDtK5GVXP6', '0909090900', 0, '2024-05-03 09:43:26'),
(6, 'hohi', 'la', 'ki', 'lk@gmail.com', '$2y$12$7FybxqSd8kD2mP8l9KnuJuZzl23J5Da9FGgeTlGFgIQuhhmemN/46', '0909797540', 0, '2024-05-03 09:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_ward` varchar(20) NOT NULL,
  `user_district` varchar(20) NOT NULL,
  `user_city` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `user_address`, `user_ward`, `user_district`, `user_city`) VALUES
(1, 0, '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi'),
(2, 2, '34 Le Lai Street', 'Ward 4', 'Ben Thanh District', 'Ho Chi Minh City'),
(3, 3, '56 Chu Van An', 'Ward 2', 'Hai Chau District', 'Da Nang'),
(4, 4, '78 Lý Thường Kiệt', 'Ward 3', 'Hoan Kiem District', 'Hanoi'),
(5, 5, '90 Nguyen Hue', 'Ward 5', '1 District', 'Ho Chi Minh City'),
(6, 6, '123 Le Loi Street', 'Ward 6', '1 District', 'Ho Chi Minh City'),
(7, 7, '135 Nam Ky Khoi Nghia', 'Ward 7', '3 District', 'Ho Chi Minh City');

-- --------------------------------------------------------

--
-- Structure for view `product_info_ctg`
--
DROP TABLE IF EXISTS `product_info_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_info_ctg`  AS SELECT `products`.`pdt_id` AS `pdt_id`, `products`.`pdt_name` AS `pdt_name`, `products`.`pdt_price` AS `pdt_price`, `products`.`pdt_des` AS `pdt_des`, `products`.`pdt_img` AS `pdt_img`, `products`.`pdt_stock` AS `product_stock`, `products`.`pdt_status` AS `pdt_status`, `category`.`ctg_id` AS `ctg_id`, `category`.`ctg_name` AS `ctg_name` FROM (`products` join `category`) WHERE `products`.`pdt_ctg` = `category`.`ctg_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_order_details_product_id` (`product_id`),
  ADD KEY `fk_order_details_order_id` (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_products_user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pdt_id`),
  ADD KEY `fk_products_category` (`pdt_ctg`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdt_id` (`pdt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userid` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_order_id` FOREIGN KEY (`order_id`) REFERENCES `order_products` (`id`),
  ADD CONSTRAINT `fk_order_details_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`pdt_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `fk_order_products_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`pdt_ctg`) REFERENCES `category` (`ctg_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`pdt_id`) REFERENCES `products` (`pdt_id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
