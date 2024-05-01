-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2024 lúc 05:17 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- .
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
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
-- Cấu trúc bảng cho bảng `admin`
--


--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `birthday`, `picture`, `email`, `password`, `phone`, `address`, `mssv`) VALUES
(1, 'Admin1', '1990-05-15', 'admin1.jpg', 'hung1@gmail.com', '123123123', '123456789', '123 Street, City', '123456'),
(2, 'Admin2', '1988-10-20', 'admin2.jpg', 'admin2@example.com', 'password2', '987654321', '456 Avenue, Town', '654321'),
(3, 'Admin3', '1995-03-25', 'admin3.jpg', 'admin3@example.com', 'password3', '111222333', '789 Road, Village', '987654');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `bill_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `volume` int(11) NOT NULL,
  `price_each` float(10,2) NOT NULL,
  `phuongthucthanhtoan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
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
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
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
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `bill_id` int(10) NOT NULL,
  `day_order` date NOT NULL DEFAULT current_timestamp(),
  `day_receive` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'done',
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
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

--
-- Cấu trúc bảng cho bảng `sanpham`
--
CREATE TABLE sanpham (
  product_id int(10) NOT NULL AUTO_INCREMENT,
  product_name varchar(255) NOT NULL,
  hinhanh varchar(255) NOT NULL,
  volume int(11) NOT NULL,
  price float NOT NULL,
  CPU varchar(255) NOT NULL,
  VGA varchar(255) NOT NULL,
  screen_size varchar(255) NOT NULL,
  Memory varchar(255) NOT NULL,
  RAM varchar(255) NOT NULL,
  brand varchar(50) NOT NULL,
  resolution varchar(255) NOT NULL,
  weight float NOT NULL,
  description text NOT NULL,
    PRIMARY KEY (product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng sanpham
--

  INSERT INTO sanpham ( product_name, hinhanh, volume, price, CPU, VGA, screen_size, Memory, RAM, brand, resolution, weight, description) 
  VALUES 
  ('ASUS Vivobook 14 OLED A1405VA KM257W','img\productimg\randomimg\10.webp', 100, 17490000, 'i5-13500H', 'Iris Xe', '14"', '512GB', '16GB', 'Asus', '2880x1800', 1.4, '
  - CPU: Intel® Core™ i5-13500H 2,6 GHz (Bộ nhớ đệm 18 MB, tối đa 4,7 GHz, 12 lõi, 16 luồng)\n
  - GPU:  Intel Iris Xe\n
  - RAM: 16GB DDR4 3200MHz (8GB tích hợp + 8GB Sodimm)\n
  - Ổ Cứng: SSD 512GB M.2 NVMe™ PCIe® 3.0 \n
  - Màn hình: OLED 14" 2,8K (2880 x 1800) 16:10\n
  - Cân nặng: 1.6 kg'),
  ('ASUS Vivobook 15 OLED A1505VA L1491W','img\productimg\randomimg\2.webp', 150, 19490000, 'i7-13700H', 'Iris Xe', '15.6"', '512GB', '16GB', 'Asus', '1920x1080', 1.7, '
  - CPU: Intel® Core™ i7-13700H 2,4 GHz (Bộ nhớ đệm 24 MB, tối đa 5,0 GHz, 14 lõi, 20 luồng)\n
  - GPU:  Intel Iris Xe\n
  - RAM: 16GB DDR4 3200MHz (8GB tích hợp + 8GB Sodimm)\n
  - Ổ Cứng: SSD 512GB M.2 NVMe™ PCIe® 3.0 \n
  - Màn hình: OLED 15,6" FHD (1920 x 1080) 16:9\n
  - Cân nặng: 1.7 kg'),
  ('ASUS Zenbook 14 OLED UM3402YA KM405W','img\productimg\randomimg\11.webp', 150, 19490000, 'R5-7530U', 'Vega 7', '14"', '512GB', '16GB', 'Asus', '2880x1800', 1.39, '
  - CPU: AMD Ryzen™ R5-7530U 2.0GHz (6-core/12-thread, 16MB cache, up to 4.5 GHz max boost)\n
  - GPU: AMD Raedon RX Vega 7\n
  - RAM: 16GB LPDDR4X on board (Không nâng cấp)\n
  - Ổ Cứng: SSD 512GB M.2 NVMe™ PCIe® 3.0 \n
  - Màn hình: OLED 15,6" FHD (1920 x 1080) 16:9\n
  - Cân nặng: 1.7 kg'),
  ('ASUS Vivobook 16 M1605YA MB303W','img\productimg\randomimg\9.webp', 52, 14490000, 'R7-7730U', 'Vega 8', '16"', '512GB', '16GB', 'Asus', '1920x1200', 1.88, '
  - CPU: AMD Ryzen™ R7-7730U 2.0GHz (8-core/16-thread, 16MB cache, up to 4.5 GHz max boost)\n
  - GPU: AMD Raedon RX Vega 8\n
  - RAM: 16GB DDR4 3200Mhz (8GB Onboard + 8GB Sodimm)\n
  - Ổ Cứng: SSD 512GB M.2 NVMe™ PCIe® 3.0 \n
  - Màn hình: 16 inch WUXGA (1920 x 1200) 16:10\n
  - Cân nặng: 1.88 kg'),
  ('Asus ZenBook Flip OLED UP3404VA KN038W','img\productimg\zenbookflip\grandeview.webp', 36, 25990000, 'i5-1340P', ' Iris Xe', '16"', '512GB', '16GB', 'Asus', '1920x1200', 1.88, '
  - CPU: AMD Ryzen™ R7-7730U 2.0GHz (8-core/16-thread, 16MB cache, up to 4.5 GHz max boost)\n
  - GPU: AMD Raedon RX Vega 8\n
  - RAM: 16GB DDR4 3200Mhz (8GB Onboard + 8GB Sodimm)\n
  - Ổ Cứng: SSD 512GB M.2 NVMe™ PCIe® 3.0 \n
  - Màn hình: 16 inch WUXGA (1920 x 1200) 16:10\n
  - Cân nặng: 1.88 kg'),
  -- Dell Products
  ('Dell XPS 13','img\productimg\dellxps13\frontview.jpg', 85, 23990000, 'Intel Core i7-1185G7', 'Iris Xe Graphics', '13.4"', '1TB', '16GB', 'Dell', '3840x2400', 1.2, '
  - CPU: Intel Core i7-1185G7 up to 4.8 GHz\n
  - GPU: Intel Iris Xe Graphics\n
  - RAM: 16GB LPDDR4x\n
  - Ổ cứng: 1TB SSD\n
  - Màn hình: 13.4 inch UHD+ Touch\n
  - Cân nặng: 1.2 kg'),
  ('Dell Inspiron 15','img\productimg\inspiron15\grandeview.webp', 100, 15990000, 'Intel Core i5-11320H', 'Intel Iris Xe', '15.6"', '512GB', '16GB', 'Dell', '1920x1080', 1.78, '
  - CPU: Intel Core i5-11320H up to 4.5 GHz\n
  - GPU: Intel Iris Xe\n
  - RAM: 16GB DDR4\n
  - Ổ cứng: 512GB SSD\n
  - Màn hình: 15.6 inch FHD\n
  - Cân nặng: 1.78 kg'),
  ('Dell G5 15','img\productimg\dellg5\grande.webp', 75, 24990000, 'AMD Ryzen 7 4800H', 'NVIDIA GTX 1660 Ti', '15.6"', '1TB', '16GB', 'Dell', '1920x1080', 2.3, '
  - CPU: AMD Ryzen 7 4800H up to 4.2 GHz\n
  - GPU: NVIDIA GTX 1660 Ti\n
  - RAM: 16GB DDR4\n
  - Ổ cứng: 1TB SSD\n
  - Màn hình: 15.6 inch FHD\n
  - Cân nặng: 2.3 kg'),

  -- Asus Products (Additional)
  ('ASUS TUF Gaming A15', 80, 21990000, 'AMD Ryzen 7 4800H', 'NVIDIA GTX 1660 Ti', '15.6"', '512GB', '16GB', 'Asus', '1920x1080', 2.3, '
  - CPU: AMD Ryzen 7 4800H up to 4.2 GHz\n
  - GPU: NVIDIA GTX 1660 Ti\n
  - RAM: 16GB DDR4\n
  - Ổ cứng: 512GB SSD\n
  - Màn hình: 15.6 inch FHD\n
  - Cân nặng: 2.3 kg'),
  ('ASUS ROG Zephyrus G14', 50, 28990000, 'AMD Ryzen 9 5900HS', 'NVIDIA RTX 3060', '14"', '1TB', '32GB', 'Asus', '2560x1440', 1.7, '
  - CPU: AMD Ryzen 9 5900HS up to 4.6 GHz\n
  - GPU: NVIDIA RTX 3060\n
  - RAM: 32GB DDR4\n
  - Ổ cứng: 1TB SSD\n
  - Màn hình: 14 inch QHD\n
  - Cân nặng: 1.7 kg'),
  ('ASUS ZenBook Duo', 40, 34990000, 'Intel Core i7-10750H', 'NVIDIA RTX 2060', '14"', '1TB', '32GB', 'Asus', '1920x1080', 2.0, '
  - CPU: Intel Core i7-10750H up to 5.0 GHz\n
  - GPU: NVIDIA RTX 2060\n
  - RAM: 32GB DDR4\n
  - Ổ cứng: 1TB SSD\n
  - Màn hình: 14 inch FHD dual screen\n
  - Cân nặng: 2.0 kg');


  

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoannguoidung`
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
-- Đang đổ dữ liệu cho bảng `taikhoannguoidung`
--

INSERT INTO `taikhoannguoidung` (`user_id`, `user_name`, `user_pwd`, `user_address`, `user_phone`, `user_email`, `user_status`, `created_at`) VALUES
(1, 'Nguyễn Văn A', '123', 'Số 1, Phố Hàng Bài, Hà Nội', '0905123456', 'nguyenvana@example.com', 'active', '2024-04-01 01:00:00'),
(2, 'Trần Thị B', '123', 'Số 2, Đường Trần Hưng Đạo, Hà Nội', '0905123457', 'tranthib@example.com', 'active', '2024-04-02 01:00:00'),
(3, 'Lê Văn C', '123', 'Số 3, Phố Hàng Mã, Hà Nội', '0905123458', 'levanc@example.com', 'active', '2024-04-03 01:00:00'),
(4, 'Phạm Thị D', '123', 'Số 4, Đường Lê Lợi, Sài Gòn', '0905123459', 'phamthid@example.com', 'active', '2024-04-04 01:00:00'),
(5, 'Hoàng Văn E', '123', 'Số 5, Phố Bà Triệu, Hà Nội', '0905123460', 'hoangvane@example.com', 'active', '2024-04-05 01:00:00'),
(6, 'Đặng Thị F', '123', 'Số 6, Đường 3/2, Sài Gòn', '0905123461', 'dangthif@example.com', 'active', '2024-04-06 01:00:00'),
(7, 'Bùi Văn G', '123', 'Số 7, Phố Đinh Tiên Hoàng, Hà Nội', '0905123462', 'buivang@example.com', 'active', '2024-04-07 01:00:00'),
(8, 'Ngô Thị H', '123', 'Số 8, Đường Nguyễn Du, Sài Gòn', '0905123463', 'ngothih@example.com', 'active', '2024-04-08 01:00:00'),
(9, 'Vũ Văn I', '123', 'Số 9, Phố Lý Thái Tổ, Hà Nội', '0905123464', 'vuvani@example.com', 'active', '2024-04-09 01:00:00'),
(10, 'Đỗ Thị J', '123', 'Số 10, Đường Phạm Ngũ Lão, Sài Gòn', '0905123465', 'dothij@example.com', 'active', '2024-04-10 01:00:00'),
(11, 'Nguyễn Văn K', '123', 'Số 11, Phố Trần Quang Khải, Hà Nội', '0905123466', 'nguyenvank@example.com', 'active', '2024-04-11 01:00:00'),
(12, 'Trần Thị L', '123', 'Số 12, Đường Lê Thánh Tôn, Sài Gòn', '0905123467', 'tranthil@example.com', 'active', '2024-04-12 01:00:00'),
(13, 'Lê Văn M', '123', 'Số 13, Phố Hàng Bông, Hà Nội', '0905123468', 'levanm@example.com', 'active', '2024-04-13 01:00:00'),
(14, 'Phạm Thị N', '123', 'Số 14, Đường Trần Hưng Đạo, Sài Gòn', '0905123469', 'phamthinn@example.com', 'active', '2024-04-14 01:00:00'),
(15, 'Hoàng Văn O', '123', 'Số 15, Phố Hàng Gai, Hà Nội', '0905123470', 'hoangvano@example.com', 'active', '2024-04-15 01:00:00'),
(16, 'Đặng Thị P', '123', 'Số 16, Đường Nguyễn Thái Học, Sài Gòn', '0905123471', 'dangthip@example.com', 'active', '2024-04-16 01:00:00'),
(17, 'Bùi Văn Q', '123', 'Số 17, Phố Tràng Thi, Hà Nội', '0905123472', 'buivanq@example.com', 'active', '2024-04-17 01:00:00'),
(18, 'Ngô Thị R', '123', 'Số 18, Đường Bùi Viện, Sài Gòn', '0905123473', 'ngothir@example.com', 'active', '2024-04-18 01:00:00'),
(19, 'Vũ Văn S', '123', 'Số 19, Phố Hàng Đào, Hà Nội', '0905123474', 'vuvans@example.com', 'active', '2024-04-19 01:00:00'),
(20, 'Đỗ Thị Tê Tê', '123', 'Số 20, Đường Đồng Khởi, Sài Gòn', '0905123475', 'dothit@example.com', 'active', '2024-04-29 10:10:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`bill_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `taikhoannguoidung`
--
ALTER TABLE `taikhoannguoidung`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `taikhoannguoidung`
--
ALTER TABLE `taikhoannguoidung`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `taikhoannguoidung` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
