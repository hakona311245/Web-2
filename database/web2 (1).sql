-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 09:17 AM
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
  `screen_ratio` decimal(5,2) NOT NULL,
  `Memory` bigint(20) NOT NULL,
  `RAM` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `CPU_full` varchar(255) NOT NULL,
  `VGA_full` varchar(255) NOT NULL,
  `resolution_full` varchar(255) NOT NULL,
  `Memory_full` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`product_id`, `product_name`, `volume`, `price`, `CPU`, `VGA`, `screen_ratio`, `Memory`, `RAM`, `brand`, `resolution`, `weight`, `hinhanh`, `CPU_full`, `VGA_full`, `resolution_full`, `Memory_full`) VALUES
(1, 'Asus ROG Zephyrus G15 GA503RM', 15, 28.89, 'Ryzen 9-6900HS', 'Nvidia - RTX 3060 6GB', 15.60, 512, 16, 'Asus', 'màn hình 16:9 2K 240Hz', 2, NULL, '', '', '', ''),
(2, 'Asus ROG Zephyrus G14 GA402NU', 15, 26.89, 'Ryzen 7-7735HS', 'RTX 4050', 14.00, 512, 16, 'Asus', 'HD 2k', 1.7, NULL, '', '', '', '');

-- --------------------------------------------------------

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
(16, 'Q', '$2y$12$yFv0gejyCg/2IGpjg2y1oOStDv60/jfmxdniOokw0eHXgLsz9Limi', NULL, '0997975393', 'Q@gmail.com', 'active', '2024-04-16 01:48:12'),
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
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `taikhoannguoidung` (`user_id`);

--
-- Constraints for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD CONSTRAINT `phuongthucthanhtoan_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `taikhoannhanvien` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
