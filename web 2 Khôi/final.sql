-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2024 lúc 06:02 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
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
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `birthday`, `picture`, `email`, `password`, `phone`, `address`, `mssv`) VALUES
(1, 'Admin1', '1990-05-15', 'admin1.jpg', 'hung1@gmail.com', '123123123', '123456789', '123 Street, City', '123456'),
(2, 'Admin2', '1988-10-20', 'admin2.jpg', 'admin2@example.com', 'password2', '987654321', '456 Avenue, Town', '654321'),
(3, 'Admin3', '1995-03-25', 'admin3.jpg', 'admin3@example.com', 'password3', '111222333', '789 Road, Village', '987654');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(60) NOT NULL,
  `ctg_des` varchar(150) NOT NULL,
  `ctg_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
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
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(255) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `Shipping_mobile` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `day_delivered` date DEFAULT NULL
  `day_delivered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `payment_method`, `Shipping_mobile`, `total`, `product_id`, `quantity`, `day_delivered`) VALUES
(7, 'bank', 'chi chi van chuyen', 1999.00, 1, 5, '0000-00-00'),
(3, 'bank', 'chi chi van chuyen', 1999.00, 1, 5, '2024-05-01'),
(4, 'Direct Bank Transfer', '376640875', 1998.00, 1, 2, '2024-05-02'),
(5, 'Direct Bank Transfer', '376640875', 1998.00, 1, 2, '2024-05-04'),
(5, 'Direct Bank Transfer', '376640875', 1797.00, 3, 3, '2024-05-04'),
(6, 'Direct Bank Transfer', '921351232', 1598.00, 2, 2, '2024-05-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
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
  `total_bill` decimal(10,2) NOT NULL,
  `order_status` enum('Chưa xử lý','Đang xử lý','Đã giao','Hủy đơn') NOT NULL DEFAULT 'Chưa xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`id`, `user_id`, `amount`, `address`, `address_ward`, `address_district`, `address_city`, `order_time`, `total_bill`, `order_status`) VALUES
(3, 7, 12, 'address_value', 'quan 1 HCM', 'Quan 1', 'HCM', '0000-00-00 00:00:00', 1999.00, 'Đã giao'),
(4, 8, 2, 'phường 4 quận 5 ', '4', '5', 'Ho Chi Minh', '2024-05-06 17:38:33', 1998.00, ''),
(5, 8, 5, 'phường 4 quận 5 ', '4', '5', 'Ho Chi Minh', '2024-05-06 17:44:50', 3795.00, 'Đã giao'),
(6, 9, 2, 'Hai Ba Trưng', '11', 'Binh Chanh', 'Ho Chi Minh', '2024-05-06 17:52:47', 1598.00, 'Chưa xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pdt_id`, `pdt_name`, `pdt_price`, `pdt_des`, `pdt_ctg`, `pdt_img`, `pdt_stock`, `pdt_status`) VALUES
(1, 'Apple iPhone 13 Pro', 999, 'The latest iPhone with advanced camera features', 1, 'iPhone13pro.webp', 50, 1),
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
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `pdt_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `pdt_id`, `image_url`) VALUES
(1, 1, '1.webp'),
(2, 1, '2.jpg'),
(3, 1, '3.jpg'),
(4, 2, '4.jpg'),
(5, 2, '1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `product_info_ctg`
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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_firstname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_lastname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_locked` enum('active','banned') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`, `created_at`, `is_locked`) VALUES
(3, '', '', '', '123', '$2y$12$EYZxPxnI4spA8SgLIetwBOmjTsHgbwsB6B.ZS4Pvu1Bl/n5i4.GMO', 'lqkk@gmail.', '2024-05-03 09:34:11', 'active'),
(4, 'koki', '', '', 'lqk@gmail.com', '$2y$12$TNLsuDyMWKjTNu8e1uqhme7bL3sHdJA7YxBHBYK9XXDIwg3fF4ONa', '0909090900', '2024-05-03 09:37:48', 'active'),
(6, 'hohi', 'la', 'ki', 'lk@gmail.com', '$2y$12$7FybxqSd8kD2mP8l9KnuJuZzl23J5Da9FGgeTlGFgIQuhhmemN/46', '0909797540', '2024-05-03 09:52:26', 'active'),
(7, 'mmchouuu', 'Châu', 'Phạm Nguyễn Minh', 'cchauppham@gmail.com', '123', '0567301252', '2024-05-03 19:07:41', 'active'),
(8, 'SGUer', 'thành ', 'hưng', 'SGUer@gmail.com', '123', '0376640875', '2024-05-06 10:57:24', 'active'),
(9, 'hungthanh', 'Thành ', 'Hưng', 'thanhhungg123@gmail.com', '123', '0921351232', '2024-05-06 10:56:57', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_address`
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
-- Đang đổ dữ liệu cho bảng `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `user_address`, `user_ward`, `user_district`, `user_city`) VALUES
(0, 8, 'phường 4 quận 5 ', '4', '5', 'Ho Chi Minh'),
(1, 0, '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi'),
(2, 2, '34 Le Lai Street', 'Ward 4', 'Ben Thanh District', 'Ho Chi Minh City'),
(3, 3, '56 Chu Van An', 'Ward 2', 'Hai Chau District', 'Da Nang'),
(4, 4, '78 Lý Thường Kiệt', 'Ward 3', 'Hoan Kiem District', 'Hanoi'),
(6, 6, '123 Le Loi Street', 'Ward 6', '1 District', 'Ho Chi Minh City'),
(7, 7, '135 Nam Ky Khoi Nghia', 'Ward 7', '3 District', 'Ho Chi Minh City');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `product_info_ctg`
--
DROP TABLE IF EXISTS `product_info_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_info_ctg`  AS SELECT `products`.`pdt_id` AS `pdt_id`, `products`.`pdt_name` AS `pdt_name`, `products`.`pdt_price` AS `pdt_price`, `products`.`pdt_des` AS `pdt_des`, `products`.`pdt_img` AS `pdt_img`, `products`.`pdt_stock` AS `product_stock`, `products`.`pdt_status` AS `pdt_status`, `category`.`ctg_id` AS `ctg_id`, `category`.`ctg_name` AS `ctg_name` FROM (`products` join `category`) WHERE `products`.`pdt_ctg` = `category`.`ctg_id` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `fk_order_details_product_id` (`product_id`),
  ADD KEY `fk_order_details_order_id` (`order_id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_products_user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pdt_id`),
  ADD KEY `fk_products_category` (`pdt_ctg`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdt_id` (`pdt_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Chỉ mục cho bảng `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userid` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_order_id` FOREIGN KEY (`order_id`) REFERENCES `order_products` (`id`),
  ADD CONSTRAINT `fk_order_details_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`pdt_id`);

--
-- Các ràng buộc cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `fk_order_products_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`pdt_ctg`) REFERENCES `category` (`ctg_id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`pdt_id`) REFERENCES `products` (`pdt_id`);

--
-- Các ràng buộc cho bảng `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
