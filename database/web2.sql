-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 10:25 AM
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

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `noidung`) VALUES
(1, 1, 'Số 1, Phố Hàng Bài, Quận Hoàn Kiếm, Hà Nội'),
(2, 2, 'Số 15, Đường Lê Lợi, Quận 1, Thành phố Hồ Chí Minh'),
(3, 3, 'Số 78, Đường Nguyễn Huệ, Quận 1, Thành phố Hồ Chí Minh'),
(4, 4, 'Số 5, Đường Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội'),
(5, 5, 'Số 22, Đường Lý Tự Trọng, Quận 1, Thành phố Hồ Chí Minh'),
(6, 6, 'Số 35, Phố Hàng Đào, Quận Hoàn Kiếm, Hà Nội'),
(7, 7, 'Số 48, Đường Lê Thánh Tôn, Quận 1, Thành phố Hồ Chí Minh'),
(8, 8, 'Số 88, Đường Bạch Đằng, Thành phố Đà Nẵng'),
(9, 9, 'Số 102, Đường Lê Lợi, Thành phố Huế'),
(10, 10, 'Số 56, Phố Tràng Tiền, Quận Hoàn Kiếm, Hà Nội'),
(11, 11, 'Số 23, Đường Đồng Khởi, Quận 1, Thành phố Hồ Chí Minh'),
(12, 12, 'Số 34, Đường Hai Bà Trưng, Quận Hoàn Kiếm, Hà Nội'),
(13, 13, 'Số 90, Đường Nguyễn Huệ, Quận 1, Thành phố Hồ Chí Minh'),
(14, 14, 'Số 77, Đường Lê Duẩn, Quận 1, Thành phố Hồ Chí Minh'),
(15, 15, 'Số 59, Phố Đinh Tiên Hoàng, Quận Hoàn Kiếm, Hà Nội'),
(16, 16, 'Số 41, Đường Trần Phú, Thành phố Nha Trang, Khánh Hòa'),
(17, 17, 'Số 28, Đường Lý Thái Tổ, Quận Hoàn Kiếm, Hà Nội'),
(18, 18, 'Số 66, Đường Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh'),
(19, 19, 'Số 85, Đường Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội'),
(20, 20, 'Số 99, Đường Bùi Viện, Quận 1, Thành phố Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `bill_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `volume` int(11) NOT NULL,
  `price_each` float(10,2) NOT NULL,
  `phuongthucthanhtoan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`bill_id`, `product_id`, `volume`, `price_each`, `phuongthucthanhtoan`) VALUES
(1, 1, 1, 1000000.00, ''),
(2, 1, 2, 1500000.00, ''),
(3, 2, 3, 2000000.00, ''),
(4, 2, 4, 2500000.00, ''),
(5, 3, 5, 3000000.00, ''),
(6, 3, 6, 3500000.00, ''),
(7, 4, 7, 4000000.00, ''),
(8, 4, 8, 4500000.00, ''),
(9, 5, 9, 5000000.00, ''),
(10, 5, 10, 5500000.00, ''),
(11, 6, 1, 6000000.00, ''),
(12, 6, 2, 6500000.00, ''),
(13, 7, 3, 7000000.00, ''),
(14, 7, 4, 7500000.00, ''),
(15, 8, 5, 8000000.00, ''),
(16, 8, 6, 8500000.00, ''),
(17, 9, 7, 9000000.00, ''),
(18, 9, 8, 9500000.00, ''),
(19, 10, 9, 10000000.00, ''),
(20, 10, 10, 10500000.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`img_id`, `product_id`, `link`) VALUES
(1, 1, 'http://example.com/image1.jpg'),
(2, 2, 'http://example.com/image2.jpg'),
(3, 3, 'http://example.com/image3.jpg'),
(4, 4, 'http://example.com/image4.jpg'),
(5, 5, 'http://example.com/image5.jpg'),
(6, 6, 'http://example.com/image6.jpg'),
(7, 7, 'http://example.com/image7.jpg'),
(8, 8, 'http://example.com/image8.jpg'),
(9, 9, 'http://example.com/image9.jpg'),
(10, 10, 'http://example.com/image10.jpg'),
(11, 11, 'http://example.com/image11.jpg'),
(12, 12, 'http://example.com/image12.jpg'),
(13, 13, 'http://example.com/image13.jpg'),
(14, 14, 'http://example.com/image14.jpg'),
(15, 15, 'http://example.com/image15.jpg'),
(16, 16, 'http://example.com/image16.jpg'),
(17, 17, 'http://example.com/image17.jpg'),
(18, 18, 'http://example.com/image18.jpg'),
(19, 19, 'http://example.com/image19.jpg'),
(20, 20, 'http://example.com/image20.jpg');

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

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`bill_id`, `day_order`, `day_receive`, `status`, `user_id`) VALUES
(1, '2024-04-01', '2024-04-05', 'done', 1),
(2, '2024-04-02', '2024-04-06', 'pending', 2),
(3, '2024-04-03', '2024-04-07', 'done', 3),
(4, '2024-04-04', '2024-04-08', 'cancelled', 4),
(5, '2024-04-05', '2024-04-09', 'done', 5),
(6, '2024-04-06', '2024-04-10', 'pending', 6),
(7, '2024-04-07', '2024-04-11', 'done', 7),
(8, '2024-04-08', '2024-04-12', 'pending', 8),
(9, '2024-04-09', '2024-04-13', 'done', 9),
(10, '2024-04-10', '2024-04-14', 'cancelled', 10),
(11, '2024-04-11', '2024-04-15', 'done', 11),
(12, '2024-04-12', '2024-04-16', 'pending', 12),
(13, '2024-04-13', '2024-04-17', 'done', 13),
(14, '2024-04-14', '2024-04-18', 'cancelled', 14),
(15, '2024-04-15', '2024-04-19', 'done', 15),
(16, '2024-04-16', '2024-04-20', 'pending', 16),
(17, '2024-04-17', '2024-04-21', 'done', 17),
(18, '2024-04-18', '2024-04-22', 'cancelled', 18),
(19, '2024-04-19', '2024-04-23', 'done', 19),
(20, '2024-04-20', '2024-04-24', 'pending', 20);

-- --------------------------------------------------------


--bảng tài khoản admin
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

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `volume` int(255) NOT NULL,
  `price` float NOT NULL,
  `CPU` varchar(255) NOT NULL,
  `VGA` varchar(255) NOT NULL,
  `screen_size` varchar(50) NOT NULL,
  `Memory` bigint(20) NOT NULL,
  `RAM` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `hinhanh` varchar(1000) DEFAULT NULL
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

INSERT INTO `taikhoannguoidung` (`user_id`, `user_name`, `user_pwd`, `user_address`, `user_phone`, `user_email`, `user_status`, `created_at`) 
VALUES
(18, 'datco123', '123123123', 'HCM city Tan Binh', '0376653241', 'thanhhung232@gmail.com', 'active', '2024-04-27 03:48:31'),
(19, 'Thanh Hung', 'pass123', '123 Main St', '0376640875', 'thanhhung1@gmail.com', 'active', '2024-04-27 09:27:34'),
(20, 'Nguyen Van Hoang', 'password', '456 Elm St', '0376640876', 'nguyenvana@gmail.com', 'active', '2024-04-27 04:27:57'),
(21, 'Le Thi Bo', 'securepwd', '789 Oak St', '0376640877', 'lethib@gmail.com', 'active', '2024-04-27 04:28:04'),
(22, 'Tran Van Cu', 'browny', '321 Pine St', '0376640878', 'tranvanc@gmail.com', 'banned', '2024-04-27 04:29:37'),
(23, 'Pham Thi Dang', 'davies', '654 Cedar St', '0376640879', 'phamthid@gmail.com', 'banned', '2024-04-27 04:29:48'),
(24, 'Hoang Van Thu', 'wilsonm', '987 Birch St', '0376640880', 'hoangvane@gmail.com', 'active', '2024-04-27 04:28:35'),
(25, 'Nguyen Thi Thu', 'taylors', '234 Maple St', '0376640881', 'nguyenthif@gmail.com', 'active', '2024-04-27 04:28:47'),
(26, 'Le Van Gia', 'marty', '567 Walnut St', '0376640882', 'levang@gmail.com', 'active', '2024-04-27 04:28:53'),
(27, 'Man Thi Ham', 'jess123', '890 Ash St', '0376640883', 'tranthih@gmail.com', 'active', '2024-04-27 04:29:09'),
(28, 'Hoang Van Nam', 'mattt', '432 Cherry St', '0376640884', 'hoangvani@gmail.com', 'active', '2024-04-27 04:29:19');

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoannguoidung`
--
ALTER TABLE `taikhoannguoidung`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
