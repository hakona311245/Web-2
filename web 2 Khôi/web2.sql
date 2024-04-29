-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 02:15 AM
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
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_pass` varchar(60) NOT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `address_name` varchar(255) DEFAULT NULL,
  `address_ward` varchar(50) DEFAULT NULL,
  `address_district` varchar(50) DEFAULT NULL,
  `address_city` varchar(50) DEFAULT NULL,
  `order_time` timestamp NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `order_status`, `payment_method`, `Shipping_mobile`, `address_name`, `address_ward`, `address_district`, `address_city`, `order_time`, `total_amount`) VALUES
(0, 0, 1, 'Direct Bank Transfer', '0909090900', '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi', '0000-00-00 00:00:00', 2997.00),
(0, 0, 1, 'Direct Bank Transfer', '0909090900', '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi', '0000-00-00 00:00:00', 799.00),
(0, 0, 1, 'Direct Bank Transfer', '0909090900', '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi', '0000-00-00 00:00:00', 799.00),
(0, 0, 1, 'Direct Bank Transfer', '0909090900', '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi', '0000-00-00 00:00:00', 799.00),
(0, 0, 1, 'Direct Bank Transfer', '0909090900', '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi', '0000-00-00 00:00:00', 799.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(99) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `subtotal`) VALUES
(1, 0, 1, 'Apple iPhone 13 Pro', 999.00, 3, 2997.00),
(2, 0, 2, 'Samsung Galaxy S21', 799.00, 1, 799.00);

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
(0, 'kohi', 'ko', 'hi', 'Lam@gmail.com', '$2y$12$t2uJtA7BSxih28FWPeJEKe26VX2LNNpez6Zb2zBHEsvV/Z9xRiGU2', '0909090900', 0, '2024-04-28 21:49:00'),
(1, 'anhhuỳnhhữu88', 'Anh', 'Huỳnh Hữu', 'anhhuynhhuuu88@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01238704728', 1, '2024-04-25 05:50:52'),
(2, 'nhungnguyễnquốc99', 'Nhung', 'Nguyễn Quốc', 'nhungnguyenquoc99@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01253284309', 1, '2023-05-07 05:50:52'),
(3, 'duyđặngvăn75', 'Duy', 'Đặng Văn', 'duydangvan75@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0919011800', 0, '2023-06-23 05:50:52'),
(4, 'hùngđặngcông84', 'Hùng', 'Đặng Công', 'hungdangcong84@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0983539011', 1, '2023-09-17 05:50:52'),
(5, 'hoaphanthanh19', 'Hoa', 'Phan Thanh', 'hoaphanthanh19@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0983413872', 1, '2023-09-06 05:50:52'),
(6, 'trườngvũminh38', 'Trường', 'Vũ Minh', 'truongvuminh38@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01271770590', 0, '2023-12-18 05:50:52'),
(7, 'duyvõthanh36', 'Duy', 'Võ Thanh', 'duyvothanh36@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0984246455', 1, '2023-09-19 05:50:52'),
(8, 'hùngtrầnvăn18', 'Hùng', 'Trần Văn', 'hungtranvan18@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01254718822', 0, '2024-04-24 05:50:52'),
(9, 'anhhoàngquốc68', 'Anh', 'Hoàng Quốc', 'anhhoangquoc68@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01291189160', 0, '2023-11-15 05:50:52'),
(10, 'trườngvũvăn30', 'Trường', 'Vũ Văn', 'truongvuvan30@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01299978984', 0, '2024-04-03 05:50:52'),
(11, 'hùngphanvăn84', 'Hùng', 'Phan Văn', 'hungphanvan84@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01235251428', 0, '2023-11-13 05:50:52'),
(12, 'nhunghuỳnhthị80', 'Nhung', 'Huỳnh Thị', 'nhunghuynhthi80@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0989089002', 1, '2024-03-18 05:50:52'),
(13, 'duyvũhữu44', 'Duy', 'Vũ Hữu', 'duyvuhuu44@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01291743055', 0, '2024-01-09 05:50:52'),
(14, 'lannguyễnminh28', 'Lan', 'Nguyễn Minh', 'lannguyenminh28@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0901895922', 0, '2023-08-04 05:50:52'),
(15, 'trườngvõhữu28', 'Trường', 'Võ Hữu', 'truongvohuu28@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0986722416', 1, '2023-10-15 05:50:52'),
(16, 'trườnghuỳnhhữu34', 'Trường', 'Huỳnh Hữu', 'truonghuynhhuu34@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01236996253', 1, '2024-04-17 05:50:52'),
(17, 'trườnghoàngcông84', 'Trường', 'Hoàng Công', 'truonghoangcong84@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0933553634', 0, '2023-05-27 05:50:52'),
(18, 'hoavõhữu84', 'Hoa', 'Võ Hữu', 'hoavohuu84@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '0988523819', 0, '2024-02-16 05:50:52'),
(19, 'phươngnguyễnminh15', 'Phương', 'Nguyễn Minh', 'phuongnguyenminh15@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01290728726', 1, '2024-03-22 05:50:52'),
(20, 'trườngvũthanh1', 'Trường', 'Vũ Thanh', 'truongvuthanh1@example.com', '$2b$12$1NBbfoAw28h7SG7Wt.w8FOSipw4m5lvwWHb/c.TnroJsSVgIJrJhC', '01239658602', 1, '2024-03-04 05:50:52');

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
(4, 4, '78 Ly Thuong Kiet', 'Ward 3', 'Hoan Kiem District', 'Hanoi'),
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
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `FK_product_id` (`product_id`);

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
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `order_products` (`order_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
