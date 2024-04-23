-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 09:19 AM
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
-- Database: `web2`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `bill_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `volume` int(11) NOT NULL,
  `price_each` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `bill_id` int(10) NOT NULL,
  `day_order` date NOT NULL DEFAULT current_timestamp(),
  `day_receive` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'done',
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `check_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `day_bought` date NOT NULL,
  `total_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `price` float NOT NULL,
  `CPU` varchar(255) NOT NULL,
  `VGA` varchar(255) NOT NULL,
  `screen` varchar(255) NOT NULL,
  `Memory` varchar(255) NOT NULL,
  `RAM` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `CPU_full` varchar(255) NOT NULL,
  `VGA_full` varchar(255) NOT NULL,
  `RAM_full` varchar(255) NOT NULL,
  `screen_full` varchar(255) NOT NULL,
  `Memory_full` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` 
(`product_id`, `product_name`, `volume`, `price`, `CPU`, `VGA`, `screen`, `Memory`, `RAM`, `brand`, `resolution`, `weight`, `CPU_full`, `VGA_full`, `screen_full`, `Memory_full`)
VALUES
(1, 'ASUS TUF Gaming A15 FA507NV LP046W', 60, 26990000, 'Ryzen 7-7735HS', 'RTX 4060 8GB', '16:9', '512GB', '16GB DDR5', 'Asus', '1920x1080', 2.0, 
'AMD Ryzen™ 7 7735HS Mobile Processor (8-core/16-thread, 16MB L3 cache, up to 4.7 GHz max boost)', 
'NVIDIA® GeForce RTX™ 4060 Laptop GPU 8GB GDDR6, 2420MHz* at 140W', 
'15.6" FHD (1920 x 1080) 16:9 IPS, 144Hz, Wide View, 250nits, Narrow Bezel, Non-Glare with 72% NTSC, 100% sRGB, G-Sync', 
'512GB PCIe® 4.0 NVMe™ M.2 SSD (Trống 1 khe SSD M2 PCIe®)'),
(2, 'ASUS ROG Zephyrus G14 GA402NJ L4056W', 12, 32990000, 'Ryzen 7-7735HS', 'RTX 3050 6GB', '16:9', '512GB', '16GB DDR5', 'Asus', '1920 x 1200', 1.72,
'AMD Ryzen™ 7 7735HS Mobile Processor (8-core/16-thread, 16MB L3 cache, up to 4.7 GHz max boost)',
'NVIDIA® GeForce RTX™ 3050 6GB GDDR6 With ROG Boost: 1782MHz* at 95W',
'14" WUXGA (1920 x 1200) 16:10, IPS, 144Hz', 
'512GB PCIe® 4.0 NVMe™ M.2 SSD (Trống 1 khe SSD M2 PCIe®)'),
(3, 'ASUS ROG Zephyrus G16 GU605MV QR196WS', 15, 66990000, 'Ultra 9-185H', 'RTX 4060 8GB', '16.9', '1024', '16', 'Brand C', '2560x1440', 2.0, 
'Intel Core i7 11th Gen', 'NVIDIA GeForce GTX 1660 Ti 6GB GDDR6', '2560x1440 Quad HD', '1TB SSD'),
(4, 'Laptop Model 20', 15, 1650.00, 'AMD Ryzen 9', 'NVIDIA GeForce RTX 3080', '16.9', '2048', '32', 'Brand E', '3840x2160', 2.2, 
'AMD Ryzen 9 5900HX', 'NVIDIA GeForce RTX 3080 16GB GDDR6', '3840x2160 4K UHD', '2TB SSD');


--
-- Table structure for table `taikhoannguoidung`
--

CREATE TABLE `taikhoannguoidung` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_status` enum('active','banned','non-active') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoannguoidung`
--

INSERT INTO `taikhoannguoidung` (`user_id`, `user_name`, `user_pwd`, `user_address`, `user_phone`, `user_email`, `user_status`, `created_at`) VALUES
(7, 'Lâm Quang Khôi', '123', NULL, '0909797540', 'lamquangkhoi2016@gmail.com', 'active', '2024-03-30 03:54:30'),
(8, 'Hồ Đắc Bằng', '123123', NULL, '0909090909', 'Bangbang@gmail.com', 'active', '2024-04-07 05:25:26'),
(9, 'Lâm Quang K', '$2y$12$PkNNzzb5KKEw3C5fDEMD5.eUywJ.Fn77QZ3EuSbwwfsRDxPrH.S.u', NULL, '0909797541', 'lamquangkhoi@gmail.com', 'active', '2024-04-09 03:44:52'),
(12, 'Kohi1', '$2y$12$qNIUyK8OasDr3Hgd.nEoYOATPt8FQK8yVKE6l1XJ6ZJwkkaammX..', NULL, '0908080842', 'am@gmail.com', 'active', '2024-04-15 16:43:35'),
(13, 'Kohi', '$2y$12$Ys630.eaDxInim02Xg0JOOjrC43dTBsjwxjzUVvYAYsXH1B5s8mB6', NULL, '0909797540', 'Lam@gmail.com', 'active', '2024-04-16 00:51:28'),
(14, 'K', '1', NULL, '0909797540', 'l@gmail.com', 'active', '2024-04-16 01:38:18'),
(15, 'L', '', NULL, '0487248722', 'K@gmail.com', 'active', '2024-04-16 01:45:30'),
(17, 'K12', '123456789', '32i2i2i2j2', '0909090909', 'la2a@gmail.com', 'active', '2024-04-15 22:15:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`bill_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`check_id`,`staff_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `taikhoannguoidung`
--
ALTER TABLE `taikhoannguoidung`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `check_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taikhoannguoidung`
--
ALTER TABLE `taikhoannguoidung`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `taikhoannguoidung` (`user_id`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `hoa_don` (`bill_id`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`product_id`);

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`product_id`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `taikhoannguoidung` (`user_id`);

--
-- Constraints for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD CONSTRAINT `phuongthucthanhtoan_ibfk_1` FOREIGN KEY (`staff_id`);
COMMIT;
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
