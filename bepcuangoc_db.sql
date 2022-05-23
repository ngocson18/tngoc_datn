-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2022 lúc 01:29 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bepcuangoc_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Đồ ăn vặt Việt Nam'),
(2, 'Đồ ăn vặt hàn quốc'),
(3, 'Đồ ăn vặt thái lan'),
(4, 'Đồ ăn vặt khác'),
(5, 'Đồ uống'),
(6, 'Bánh ngọt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `price_discount` float NOT NULL,
  `img` text CHARACTER SET utf8 NOT NULL,
  `category` enum('1','2','3','4','5','6') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `name`, `title`, `description`, `price`, `discount`, `price_discount`, `img`, `category`) VALUES
(1, 'Bánh trang trộn', 'Bánh tráng trộn: Món ăn vặt hấp dẫn “chưa ăn chưa đến” Sài Gòn', 'Bánh tráng trộn Sài Gòn từ lâu đã khiến cho nhiều người phải “thòm thèm”, “ứa nước miếng” mỗi khi nhắc đến. Vậy món ăn vặt này có gì mà đặc biệt đến vậy? Cùng khám phá ngay nhé!', 15000, 10, 12000, 'D:/MEDIA/Image/Hinh Nen', '1'),
(2, 'Bánh trang trộn', 'Bánh tráng trộn: Món ăn vặt hấp dẫn “chưa ăn chưa đến” Sài Gòn', 'Bánh tráng trộn Sài Gòn từ lâu đã khiến cho nhiều người phải “thòm thèm”, “ứa nước miếng” mỗi khi nhắc đến. Vậy món ăn vặt này có gì mà đặc biệt đến vậy? Cùng khám phá ngay nhé!', 16000, 10, 12000, 'HI', '4'),
(4, 'Đồ ăn đã sửa', 'Đồ ăn vặt hàn quốc nhé', '<p>Đồ ăn vặt h&agrave;n quốc ngon đ&atilde; sửa rồi nh&eacute; !</p>\r\n', 10000, 10, 0, '', '6'),
(5, 'Đồ ăn vặt việt nam ngon lắm', 'Đồ ăn vặt việt nam ngon lắm nhé', '<p>Đồ ăn vặt việt nam ngon lắm! Mại d&ocirc; mại d&ocirc;</p>\r\n', 1000000, 20, 100000, '', '4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `role_user` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_user`) VALUES
(1, 'Admin', '0'),
(2, 'User', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `role_user` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_address`, `password`, `role_user`) VALUES
(35, 'Tuan Ngoc Ng', '0968876944', 'gunkamevn@gmail.com', 'Ha Noi', '1111', '0'),
(36, 'Nguyen Tuan ngoc', '0865971861', 't.ngoc151@gmail.com', 'HN, BTL', '1998', '1'),
(47, 'Tuan Ngoc Nguyen 1', '0968876944', 't.ngoc1519@gmail.com', 'Ha noi', '123', '0'),
(48, 'Tuan Ngoc Nguyen Thu lan cuoi', '0865971861', 't.ngoc1519@gmail.com', 'HN', '10000', '1'),
(49, 'Tuan Ngoc Nguyen dep zai', '0968876944', 't.ngoc1519@gmail.commm', 'Ha noi', '123', '1'),
(50, 'NGUYEN TUAN NGOC', '0968876944', 'gunkamevn@gmail.com', 'Ha noi', '1511998', '1'),
(51, 'Ng Tuan Ngoc', '0968876944', 't.ngoc1519@gmail.com', 'Thuy Phuong, Bac Tu Liem, Ha Noi', 'tuanngoc98', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
