-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2024 lúc 02:44 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `payment_method`, `Shipping_mobile`, `total`, `product_id`, `quantity`, `day_delivered`) VALUES
(7, 'bank', 'chi chi van chuyen', 1999.00, 1, 5, '2024-05-01'),
(3, 'bank', 'chi chi van chuyen', 1999.00, 1, 5, '2024-05-01'),
(4, 'Direct Bank Transfer', '376640875', 1998.00, 1, 2, '2024-05-02'),
(5, 'Direct Bank Transfer', '376640875', 1998.00, 1, 2, '2024-05-04'),
(5, 'Direct Bank Transfer', '376640875', 1797.00, 3, 3, '2024-05-04'),
(6, 'Direct Bank Transfer', '921351232', 1598.00, 2, 2, '2024-05-05'),
(7, 'Direct Bank Transfer', '376640875', 5994.00, 1, 6, '2024-05-01'),
(8, 'Direct Bank Transfer', '376640875', 1598.00, 2, 2, '2024-05-14'),
(9, 'Direct Bank Transfer', '376640875', 1998.00, 1, 2, '2024-05-09'),
(10, 'Direct Bank Transfer', '376640875', 599.00, 3, 1, '2024-05-10'),
(11, 'Check Payments', '376640875', 7184.00, 9, 16, '2024-05-12'),
(12, 'Direct Bank Transfer', '376640875', 999.00, 4, 1, '2024-05-01'),
(13, 'Direct Bank Transfer', '376640875', 1299.00, 6, 1, '2024-05-02'),
(14, 'Direct Bank Transfer', '376640875', 599.00, 3, 1, NULL),
(15, 'Direct Bank Transfer', '585123954', 3995.00, 2, 5, NULL),
(16, 'Direct Bank Transfer', '389123459', 449.00, 9, 1, NULL),
(17, 'Direct Bank Transfer', '922113196', 23990.00, 14, 10, NULL),
(18, 'Cash on Delivery', '909797540', 3800.00, 30, 2, '2024-05-08'),
(19, 'Cash on Delivery', '909797540', 999.00, 1, 1, '2024-05-07'),
(19, 'Cash on Delivery', '909797540', 1099.00, 11, 1, '2024-05-07');

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
(6, 9, 2, 'Hai Ba Trưng', '11', 'Binh Chanh', 'Ho Chi Minh', '2024-05-06 17:52:47', 1598.00, 'Chưa xử lý'),
(8, 8, 2, 'phường 4 quận 5 ', '4', '5', 'Ho Chi Minh', '2024-05-07 02:51:52', 1598.00, 'Chưa xử lý'),
(9, 18, 2, '32 Quận 5', '1', '5', 'Ho Chi Minh', '2024-05-07 03:25:00', 1998.00, 'Chưa xử lý'),
(10, 18, 1, '32 Quận 5', '1', '5', 'Ho Chi Minh', '2024-05-07 03:25:10', 599.00, 'Chưa xử lý'),
(11, 18, 16, '32 Quận 5', '1', '5', 'Ho Chi Minh', '2024-05-07 03:25:25', 7184.00, 'Chưa xử lý'),
(12, 18, 1, '32 Quận 5', '1', '5', 'Ho Chi Minh', '2024-05-07 03:30:12', 999.00, 'Đang xử lý'),
(13, 18, 1, '32 Quận 5', '1', '5', 'Ho Chi Minh', '2024-05-07 03:30:20', 1299.00, 'Chưa xử lý'),
(14, 18, 1, '32 Quận 5', '1', '5', 'Ho Chi Minh', '2024-05-07 03:35:44', 599.00, 'Chưa xử lý'),
(15, 19, 5, '123 nguyễn huệ', '14', 'quận 1', 'hồ chí minh ', '2024-05-07 04:01:05', 3995.00, 'Chưa xử lý'),
(16, 20, 1, '12 hoàng diệu', '12', 'quận1', 'hcm', '2024-05-07 04:05:43', 449.00, 'Chưa xử lý'),
(17, 21, 10, '1 tôn đức thắng', '1', '1', 'hcm', '2024-05-07 04:11:32', 23990.00, 'Chưa xử lý'),
(18, 22, 2, '123 an dương vương', '3', '5', 'hồ chí minh', '2024-05-07 05:06:12', 3820.00, 'Đang xử lý'),
(19, 22, 2, 'an dương vương', '3', '5', 'hồ chí minh', '2024-05-07 05:06:46', 2098.00, 'Đã giao');

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
(2, 'Samsung Galaxy S21', 799, 'Flagship Android smartphone with 5G capabilities', 1, '2_thumbnail.jpg', 30, 1),
(3, 'Apple iPad Air', 599, 'Powerful and slim tablet for productivity and entertainment', 2, '3_thumbnail.jpg', 25, 1),
(4, 'Microsoft Surface Pro', 999, 'Versatile 2-in-1 laptop and tablet combo', 3, '4_thumbnail.jpg', 15, 1),
(5, 'Asus ROG Zephyrus', 1499, 'High-performance gaming laptop with cutting-edge graphics', 4, '5_thumbnail.jpg', 10, 1),
(6, 'Dell XPS 13', 1299, 'Premium ultrabook with a stunning display', 5, 'xps13_thumbnail.webp', 20, 1),
(7, 'Lenovo ThinkPad X1 Carbon', 1399, 'Durable and lightweight business laptop', 6, 'thinkpadx1_thumbnail.webp', 12, 1),
(8, 'Samsung Galaxy Z Fold4', 1799, 'Innovative foldable smartphone with a 7.6-inch dynamic AMOLED display', 1, 'zfold4_thumbnail.webp', 10, 1),
(9, 'Google Pixel 6a', 449, 'Affordable Google phone with Tensor chip and exceptional camera', 1, 'pixel6a_thumbnail.webp', 16, 1),
(10, 'Sony Xperia 1 IV', 1299, 'Flagship smartphone with 4K display and pro-level camera', 1, 'xperia1iv_thumbnail.webp', 18, 1),
(11, 'Apple iPad Pro', 1099, 'Top-of-the-line tablet with M1 chip, designed for professionals', 2, 'ipadpro_thumbnail.webp', 12, 1),
(12, 'Samsung Galaxy Tab S8', 699, 'High-performance tablet with large display and S Pen support', 2, 'galaxytabs8_thumbnail.webp', 17, 1),
(13, 'Lenovo Tab P11 Pro', 499, 'Affordable Android tablet with OLED display for entertainment and work', 2, 'lenovop11pro_thumbnail.jpg', 19, 1),
(14, 'Dell XPS 15', 2399, 'High-end laptop with OLED touch display and up to Intel Core i9 processor', 3, 'xps15_thumbnail.jpg', 14, 1),
(15, 'HP Spectre x360', 1599, 'Versatile 2-in-1 laptop with 4K OLED display and Intel Evo platform', 3, 'hpx360_thumbnail.jpg', 11, 1),
(16, 'Asus TUF Dash F15', 1099, 'Robust gaming laptop with RTX 3060 and 144Hz display', 4, 'tufdashf15_thumbnail.webp', 18, 1),
(17, 'MSI Stealth 15M', 1499, 'Ultra-thin gaming laptop with RTX 3070 and 11th Gen Intel CPU', 4, 'msi15m_thumbnail.webp', 12, 1),
(18, 'Alienware x14', 1799, 'Portable gaming powerhouse with RTX 3050 Ti and 14-inch screen', 4, '\nalienwarex14_thumbnail.jpg', 19, 1),
(19, 'MacBook Air M2', 1199, 'Lightweight and powerful, with the new M2 chip for enhanced performance', 5, 'macairm2_thumbnail.webp', 15, 1),
(20, 'Lenovo ThinkBook 13s', 850, 'Business laptop with AMD Ryzen processors and AI-based noise cancellation', 5, 'lenovo13s_thumbnail.webp', 19, 1),
(21, 'ThinkPad X1 Extreme Gen 4', 2500, 'Top-tier workstation with 4K OLED touch display and Nvidia RTX 3080', 6, 'thinkpadextremegen4.webp', 20, 1),
(22, 'HP ZBook Fury 17 G8', 3100, 'Professional workstation with Nvidia RTX A5000 graphics and 11th Gen Intel CPUs', 6, 'hpzbook_thumbnail.jpg', 12, 1),
(23, 'Dell Precision 5560', 2000, 'Workstation-grade performance in a sleek and light chassis', 6, 'dellprecision5560_thumbnail.jpeg', 11, 1),
(29, 'iphone 13promax', 12452, 'Ngon Bổ rẻ', 1, 'iphone_13_thumbnail.webp', 123, 1),
(30, 'áo len', 1900, 'ngon bo re', 3, '3.jpg', 123, 1);

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
(1, 1, 'iphone_13_thumbnail.webp'),
(2, 1, 'iphone13_detail2.jpg'),
(3, 1, 'iphone13_detail3.jpg\n'),
(4, 2, '2_detail1.png'),
(5, 2, '2_detail2.png'),
(6, 2, '2_detail3.jpg'),
(7, 3, '3_detail1.jpg'),
(8, 3, '3_detail2.jpg'),
(9, 3, '3_detail3.jpg'),
(10, 4, '4_detail1.webp'),
(11, 4, '4_detail2.jpg'),
(12, 4, '4_detail3.jpg'),
(13, 5, '5_detail1.jpg'),
(14, 5, '5_detail2.jpg'),
(15, 5, '5_detail3.jpg'),
(16, 6, 'xps13_detail1.webp'),
(17, 6, 'xps13_detail2.webp'),
(18, 6, 'xps13_detail3.webp'),
(19, 7, 'thinkpadx1_detail1.webp'),
(20, 7, 'thinkpadx1_detail2.webp'),
(21, 7, 'thinkpadx1_detail3.webp'),
(22, 8, 'zfold4_detail1.jpg'),
(23, 8, 'zfold4_detail2.webp'),
(24, 8, 'zfold_detail3.jpg'),
(25, 9, 'pixel6a_detail1.jpg'),
(26, 9, 'pixel6a_detail2.png'),
(27, 9, 'pixel6a_detail3.jpg'),
(28, 10, 'xperia1iv_detail1.webp'),
(29, 10, 'xperia1iv_detail2.webp'),
(30, 10, 'xperia1iv_detail3.webp'),
(31, 11, 'ipadpro_detail1.jpg'),
(32, 11, 'ipadpro_detail2.jpg'),
(33, 11, 'ipadpro_detail3.jpg'),
(34, 12, 'galaxytabs8_thumbnail.webp'),
(35, 12, 'samsungs8tab_detail1.jpg'),
(36, 12, 'samsungs8tab_detail2.jpg'),
(37, 13, 'lenovop11pro_detail1.webp'),
(38, 13, 'lenovop11pro_detail2.png'),
(39, 13, 'lenovop11pro_detail3.jpg'),
(40, 14, 'xps15_detail1.jpg'),
(41, 14, 'xps15_detail2.jpg'),
(42, 14, 'xps15_detail3.jpg'),
(43, 15, 'hpx360_detail1.jpg'),
(44, 15, 'hpx360_detail2.jpg'),
(45, 15, 'hpx360_detail3.jpg'),
(46, 16, 'asustufdashf15_detail1.webp'),
(47, 16, 'asustufdashf15_detail2.webp'),
(48, 16, 'asustufdashf15_detail3.webp'),
(49, 17, 'msi15m_detail1.webp'),
(50, 17, 'msi15m_detail2.webp'),
(51, 17, 'msi15m_detail3.webp'),
(52, 18, 'alienwarex14_detail1.webp'),
(53, 18, 'alienwarex14_detail2.webp'),
(54, 18, 'alienwarex14_detail3.webp'),
(55, 19, 'macairm2_detail1.webp'),
(56, 19, 'macairm2_detail2.webp'),
(57, 19, 'macairm2_detail3.webp'),
(58, 20, 'lenovo13s_detail1.webp'),
(59, 20, 'lenovo13s_detail2.webp'),
(60, 20, 'lenovo13s_detail3.webp'),
(61, 21, 'thinkpadextremegen4_detail1.webp'),
(62, 21, 'thinkpadextremegen4_detail2.webp'),
(63, 21, 'thinkpadextremegen4_detail3.webp'),
(64, 22, 'hpzbook_detail3.jpg'),
(65, 22, 'hpzbook_detail2.jpg'),
(66, 22, 'hpzbook_detail1.jpg'),
(67, 23, 'dellprecision5560_detail1.jpg'),
(68, 23, 'dellprecision5560_detail2.jpg'),
(69, 23, 'dellprecision5560_detail3.jpg');

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
(7, 'mmchouuu', 'Châu', 'Phạm Nguyễn Minh', 'cchauppham@gmail.com', '123', '0567301252', '2024-05-03 19:07:41', 'active'),
(8, 'SGUer', 'thành ', 'hưng', 'SGUer@gmail.com', '123', '0376640875', '2024-05-06 10:57:24', 'active'),
(9, 'unitreet', 'Thành ', 'Hưng', 'thanhhungg123@gmail.com', '123', '0921351232', '2024-05-06 19:50:16', 'active'),
(12, 'unitreet1', 'Nguyễn ', 'Thành Hưng', 'thanhhungg82041@gmail.com', '123', '0376640875', '2024-05-06 19:50:26', 'active'),
(14, 'unitreet4', 'Hoang', 'Ton', 'unitreet4@gmail.com', '123', '0376640875', '2024-05-06 20:36:19', 'active'),
(15, 'unitreet5', '', '', 'unitreet5@gmail.com', '$2y$12$VxTCPwYJ6aUWvVuPQczd1ulXeS3aIcUoYVob.S2EGPMgqjIe60HHe', '0376640876', '2024-05-07 01:06:07', 'active'),
(16, 'sgu', 'Hoang', 'Huy', 'sgu@gmail.com', '123', '0909090909', '2024-05-06 20:36:07', 'active'),
(17, 'sgu123', 'Hoang', 'Nam', 'sgu123@gmail.com', '$2y$12$6.I32gQitL19L//4SzxvI.e/JHHmbHYty.9QzBXZ4CwuRCgmjQkOO', '0376640875', '2024-05-07 01:11:37', 'active'),
(18, 'unitreet12', 'Hoang', 'Nam', 'unitreet12@gmail.com', '123', '0376640875', '2024-05-06 20:43:23', 'active'),
(19, 'quan@gmail.com', 'hoang', 'quan', 'quan@gmail.com', '123123', '0585123954', '2024-05-06 20:59:36', 'active'),
(20, 'minhtuan', 'Minh ', 'Tuấn', 'minhquan@gmail.com', '123123', '0389123459', '2024-05-06 21:03:32', 'active'),
(21, 'minhkhoi', 'MINH', 'KHOI', 'tuantu@gmail.com', '123123', '0922113196', '2024-05-06 21:10:21', 'active'),
(22, 'khoi', 'k', 'h', 'khoi@gmail.com', '123', '0909797540', '2024-05-06 22:22:29', 'active'),
(23, 'lamquangkhoi', 'quang', 'khôi', 'lamquangkhoi@gmail.com', '123', '0376640875', '2024-05-06 22:09:46', 'active');

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
(1, 0, '12 Tran Phu Street', 'Ward 1', 'Ba Dinh District', 'Hanoi'),
(2, 2, '34 Le Lai Street', 'Ward 4', 'Ben Thanh District', 'Ho Chi Minh City'),
(7, 7, '135 Nam Ky Khoi Nghia', 'Ward 7', '3 District', 'Ho Chi Minh City'),
(10, 17, '32 Quận 5', '2', '2', 'Ho Chi Minh'),
(12, 8, 'phường 4 quận 5 ', '4', '5', 'Ho Chi Minh'),
(15, 18, '32 Quận 5', '1', '5', 'Ho Chi Minh'),
(16, 21, '118 Lý Tự Trọng', 'Bến Nghé', 'quận 1', 'Hồ Chí Minh'),
(17, 19, '52/21E/đường số 4', 'Hiệp Bình Phước', 'Thủ Đức', 'Hồ Chí Minh'),
(18, 22, 'an dương vương', '3', '5', 'hồ chí minh');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
