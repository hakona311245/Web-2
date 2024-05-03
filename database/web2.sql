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
    `Memory_full` varchar(255) NOT NULL,
    `usage` varchar(255) NOT NULL,

  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Dumping data for table `sanpham`
  --

  INSERT INTO `sanpham` 
  (`product_id`, `product_name`, `volume`, `price`, `CPU`, `VGA`, `screen`, `Memory`, `RAM`, `brand`, `resolution`, `weight`, `CPU_full`, `VGA_full`, `screen_full`, `Memory_full`,)
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
  (4, 'Dell XPS 15 9500', 40, 55990000, 'Intel i7-10750H', 'GTX 1650 Ti 4GB', '15.6:9', '1TB', '16GB DDR4', 'Dell', '3840x2400', 1.83, '10th Generation Intel® Core™ i7-10750H (12MB Cache, up to 5.0 GHz, 6 cores)', 'NVIDIA® GeForce® GTX 1650 Ti 4GB GDDR6', '15.6" UHD+ (3840 x 2400) InfinityEdge Non-Touch Anti-Glare 500-Nit Display', '1TB M.2 PCIe NVMe SSD'),
  (5, 'HP Spectre x360 14', 30, 45990000, 'Intel i7-1165G7', 'Iris Xe Graphics', '13.5', '512GB', '16GB DDR4', 'HP', '3000x2000', 1.34, 'Intel® Core™ i7-1165G7 (up to 4.7 GHz, 12 MB L3 cache, 4 cores)', 'Intel® Iris® Xe Graphics', '13.5" diagonal 3K2K OLED touch', '512GB PCIe® NVMe™ M.2 SSD'),
  (6, 'Apple MacBook Pro 16', 20, 98990000, 'M1 Pro', 'Integrated 16-core GPU', '16:10', '1TB', '16GB Unified', 'Apple', '3456x2234', 2.1, 'Apple M1 Pro chip with 10-core CPU, 16-core GPU, 16-core Neural Engine', 'Integrated 16-core GPU', '16-inch Liquid Retina XDR display', '1TB SSD'),
  (7, 'Lenovo ThinkPad X1 Carbon Gen 9', 50, 62990000, 'Intel i7-1165G7', 'Iris Xe Graphics', '16:10', '1TB', '16GB DDR4', 'Lenovo', '3840x2400', 1.13, '11th Generation Intel® Core™ i7-1165G7 Processor (2.80 GHz, up to 4.70 GHz with Turbo Boost, 4 Cores, 8 Threads, 12 MB Cache)', 'Integrated Intel® Iris® Xe Graphics', '14.0" UHD+ (3840 x 2400) IPS, anti-glare, 500 nits', '1TB SSD PCIe'),
  (8, 'Acer Predator Helios 300', 25, 46990000, 'Intel i7-11800H', 'RTX 3060 6GB', '16:9', '512GB', '16GB DDR4', 'Acer', '1920x1080', 2.5, '11th Generation Intel® Core™ i7-11800H Processor (up to 4.6GHz)', 'NVIDIA® GeForce RTX™ 3060 6GB', '15.6" Full HD (1920 x 1080) 144Hz IPS Display', '512GB NVMe SSD'),
  (9, 'MSI GF65 Thin', 35, 39990000, 'Intel i7-10750H', 'RTX 3060 6GB', '15.6', '512GB', '16GB DDR4', 'MSI', '1920x1080', 1.86, 'Intel Core i7-10750H 6-Core Processor', 'NVIDIA GeForce RTX 3060 Laptop GPU', '15.6" FHD, IPS-Level 144Hz Panel', '512GB NVMe SSD'),
  (10, 'Asus VivoBook 15', 45, 23990000, 'Ryzen 5 3500U', 'Vega 8 Graphics', '15.6', '256GB', '8GB DDR4', 'Asus', '1920x1080', 1.75, 'AMD Ryzen 5 3500U Processor (2.1 GHz base clock, up to 3.7 GHz max boost clock)', 'Integrated AMD Radeon Vega 8 Graphics', '15.6" (16:9) LED-backlit FHD (1920x1080) 60Hz Anti-Glare Panel with 45% NTSC', '256GB PCIe® NVMe™ M.2 SSD'),
  (11, 'Razer Blade 14', 55, 75990000, 'AMD Ryzen 9 5900HX', 'RTX 3080 8GB', '14', '1TB', '16GB DDR4', 'Razer', '2560x1440', 1.78, 'AMD Ryzen 9 5900HX (8 Cores, up to 4.6GHz)', 'NVIDIA GeForce RTX 3080 Laptop GPU', '14" QHD 165Hz', '1TB SSD'),
  (12, 'Samsung Galaxy Book Pro 360', 22, 32990000, 'Intel i7-1165G7', 'Iris Xe Graphics', '13.3', '512GB', '8GB DDR4', 'Samsung', '1920x1080', 1.04, '11th Generation Intel Core i7-1165G7 Processor', 'Intel Iris Xe Graphics', '13.3-inch FHD AMOLED touch screen', '512GB NVMe SSD'),
  (13, 'LG Gram 17', 18, 49990000, 'Intel i7-1065G7', 'Iris Plus Graphics', '17', '1TB', '16GB DDR4', 'LG', '2560x1600', 1.35, 'Intel Core i7-1065G7 Processor (1.3 GHz)', 'Intel Iris Plus Graphics', '17" WQXGA (2560 x 1600) IPS LCD Screen', '1TB SSD'),
  (14, 'Toshiba Portege X30L-G', 33, 25990000, 'Intel i5-10210U', 'UHD Graphics', '13.3', '512GB', '8GB DDR4', 'Toshiba', '1920x1080', 0.87, '10th Generation Intel Core i5-10210U Processor (1.60 GHz, up to 4.20 GHz with Turbo Boost, 4 cores)', 'Integrated Intel UHD Graphics', '13.3" Full HD TFT non-reflective High Brightness display', '512GB M.2 PCIe SSD'),
  (15, 'Alienware m15 R4', 28, 68990000, 'Intel i9-10980HK', 'RTX 3070 8GB', '15.6', '1TB', '32GB DDR4', 'Dell', '3840x2160', 2.5, '10th Generation Intel Core i9-10980HK (8-Core, up to 5.3GHz w/ Turbo Boost 2.0)', 'NVIDIA GeForce RTX 3070 8GB GDDR6', '15.6" UHD (3840 x 2160) 60Hz 25ms 500-nits display', '1TB (2x 512GB PCIe M.2 SSDs) RAID0'),
  (16, 'Microsoft Surface Laptop 4', 38, 45990000, 'AMD Ryzen 7 Surface Edition', 'Radeon Graphics', '13.5', '512GB', '16GB DDR4', 'Microsoft', '2256x1504', 1.31, 'AMD Ryzen 7 Surface Edition Processor', 'AMD Radeon Graphics', '13.5” PixelSense™ Display', '512GB SSD'),
  (17, 'Huawei MateBook X Pro', 24, 53990000, 'Intel i7-10510U', 'GeForce MX250', '13.9', '1TB', '16GB DDR4', 'Huawei', '3000x2000', 1.33, '10th Generation Intel Core i7-10510U Processor', 'NVIDIA GeForce MX250', '13.9-inch 3K LTPS touchscreen', '1TB NVMe PCIe SSD'),
  (18, 'Asus ZenBook Duo', 42, 62990000, 'Intel i7-10510U', 'GeForce MX250', '14', '1TB', '16GB DDR4', 'Asus', '1920x1080', 1.5, '10th Generation Intel Core i7-10510U Processor', 'NVIDIA GeForce MX250', '14” FHD NanoEdge Bezel Touch Display', '1TB PCIe SSD'),
  (19, 'Acer Swift 3', 31, 34990000, 'Ryzen 7 4700U', 'Radeon Graphics', '14', '512GB', '8GB DDR4', 'Acer', '1920x1080', 1.2, 'AMD Ryzen 7 4700U Octa-Core Processor (up to 4.1GHz)', 'Integrated AMD Radeon Graphics', '14" Full HD Widescreen IPS LED-backlit Display', '512GB NVMe SSD'),
  (20, 'Dell Inspiron 15 7000', 26, 31990000, 'Intel i5-1135G7', 'Iris Xe Graphics', '15.6', '512GB', '8GB DDR4', 'Dell', '1920x1080', 1.9, '11th Generation Intel Core i5-1135G7 Processor (up to 4.2GHz)', 'Intel Iris Xe Graphics', '15.6-inch FHD (1920 x 1080) Anti-glare LED Backlight Non-Touch Narrow Border WVA Display', '512GB SSD');
    ;


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
    ADD PRIMARY KEY (`check_id`);


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
    ADD CONSTRAINT `phuongthucthanhtoan_ibfk_1`;
  COMMIT;
    
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
