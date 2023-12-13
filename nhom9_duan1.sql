-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2023 lúc 07:58 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom9_duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `order_name` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `quantity`, `user_id`, `variant_id`, `order_name`) VALUES
(148, 1, 3, 25, '202312120116423'),
(150, 2, 3, 74, '202312120148493'),
(151, 2, 3, 77, '202312120151153');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Áo phông', 'áo phông.jpeg'),
(2, 'Áo polo', 'áo polo.jpeg'),
(3, 'Áo sơ mi', 'áo sơ mi.jpeg'),
(4, 'Áo len', 'áo len.jpeg'),
(5, 'Áo khoác', 'áo khoác.jpeg'),
(6, 'Áo nỉ', 'áo nỉ.jpeg'),
(7, 'Áo chống nắng', 'áo chống nắng.jpeg'),
(8, 'Áo vest', 'áo vest.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`color_id`, `color`) VALUES
(1, 'Đỏ'),
(2, 'Vàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  `star` float NOT NULL DEFAULT 0,
  `comment_role` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `username`, `content`, `time`, `star`, `comment_role`, `product_id`) VALUES
(32, 'ducngoc', 'Áo rất đẹp, chất liệu tốt', '2023-12-12', 5, 0, 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `payment` int(1) NOT NULL COMMENT '1. Thanh toán khi nhận hàng\r\n2. thanh toán online',
  `timeorder` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `order_role` int(1) NOT NULL DEFAULT 0 COMMENT '0. chờ xác nhận\r\n1. đang vận chuyển\r\n2. thành công\r\n3. đã hủy',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `payment`, `timeorder`, `total`, `order_role`, `user_id`) VALUES
(82, '202312120116423', 1, '01:16:42 - 12:12:2023', 280000, 2, 3),
(83, '202312120148493', 2, '01:48:49 - 12:12:2023', 590000, 1, 3),
(84, '202312120151153', 1, '01:51:15 - 12:12:2023', 590000, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `product_role` int(1) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_image`, `price`, `description`, `view`, `product_role`, `category_id`) VALUES
(21, 'Áo Phông Oversized Vintage', '202312121258081', 'áo phông(1).jpeg', 250000, 'Áo phông kiểu oversize với kiểu dáng vintage, tạo nên phong cách cá nhân và hiện đại.', 10, 0, 1),
(22, 'Áo Sơ Mi Elegant Business', '202312120100253', 'áo sơ mi(1).jpeg', 290000, '', 0, 0, 3),
(23, 'Áo Khoác Bomber Street Style', '202312120101005', 'áo khoác(1).jpeg', 390000, '', 0, 0, 5),
(24, 'Áo Vest Formal Classic', '202312120101408', 'áo vest(1).jpeg', 500000, '', 0, 0, 8),
(25, 'Áo Chống Nắng Outdoor Adventure', '202312120102007', 'áo chống nắng(1).jpeg', 150000, '', 0, 0, 7),
(26, 'Áo Nỉ Cozy Lounge', '202312120102316', 'áo nỉ(1).jpeg', 250000, '', 0, 0, 6),
(27, 'Áo Polo Sporty Performance', '202312120102482', 'áo polo(1).jpeg', 250000, '', 1, 0, 2),
(28, 'Áo Polo Classic Piqué', '202312120103122', 'áo polo(2).jpeg', 180000, '', 5, 0, 2),
(29, 'Áo Len Cozy Turtleneck', '202312120103504', 'áo len(1).jpeg', 250000, '', 1, 0, 4),
(30, 'Áo Len Oversized Chunky Knit', '202312120104304', 'áo len(2).jpeg', 180000, '', 1, 0, 4),
(31, 'Áo Phông Classic Cotton', '202312120109231', 'áo phông(5).jpeg', 245000, '', 1, 0, 1),
(32, 'Áo Sơ Mi Striped Weekend', '202312120110593', 'áo sơ mi(3).jpeg', 350000, '', 1, 0, 3),
(33, 'Áo Khoác Denim Trucker', '202312120111375', 'áo khoác(13).jpeg', 280000, '', 2, 0, 5),
(34, 'Áo Vest Velvet Luxury', '202312120112518', 'áo vest(2).jpeg', 280000, '', 7, 0, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`) VALUES
(2, 'M'),
(3, 'L');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `phone`, `address`, `user_role`) VALUES
(2, 'admin', '1234567', 'a', 123, 'a', 1),
(3, 'ducngoc', '1234567', 'phungducngoc1@gmail.com', 987654322, 'hà nam', 0),
(4, 'ducngoc1', '1234567', '1233555@gmail.com', 987654324, 'ha noi', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `variant_id` int(11) NOT NULL,
  `quantity_variants` int(11) NOT NULL DEFAULT 0,
  `product_code` varchar(50) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`variant_id`, `quantity_variants`, `product_code`, `size_id`, `color_id`) VALUES
(25, 100, '202312121258081', 2, 1),
(26, 100, '202312121258081', 3, 1),
(27, 100, '202312121258081', 2, 2),
(28, 100, '202312121258081', 3, 2),
(29, 100, '202312120100253', 2, 1),
(30, 100, '202312120100253', 3, 1),
(31, 100, '202312120100253', 2, 2),
(32, 100, '202312120100253', 3, 2),
(33, 100, '202312120101005', 2, 1),
(34, 100, '202312120101005', 3, 1),
(35, 100, '202312120101005', 2, 2),
(36, 100, '202312120101005', 3, 2),
(37, 100, '202312120101408', 2, 1),
(38, 100, '202312120101408', 3, 1),
(39, 100, '202312120101408', 2, 2),
(40, 100, '202312120101408', 3, 2),
(41, 100, '202312120102007', 2, 1),
(42, 100, '202312120102007', 3, 1),
(43, 100, '202312120102007', 2, 2),
(44, 100, '202312120102007', 3, 2),
(45, 100, '202312120102316', 2, 1),
(46, 100, '202312120102316', 3, 1),
(47, 100, '202312120102316', 2, 2),
(48, 100, '202312120102316', 3, 2),
(49, 100, '202312120102482', 2, 1),
(50, 100, '202312120102482', 3, 1),
(51, 100, '202312120102482', 2, 2),
(52, 100, '202312120102482', 3, 2),
(53, 100, '202312120103122', 2, 1),
(54, 100, '202312120103122', 3, 1),
(55, 100, '202312120103122', 2, 2),
(56, 100, '202312120103122', 3, 2),
(57, 100, '202312120103504', 2, 1),
(58, 100, '202312120103504', 3, 1),
(59, 100, '202312120103504', 2, 2),
(60, 100, '202312120103504', 3, 2),
(61, 100, '202312120104304', 2, 1),
(62, 100, '202312120104304', 3, 1),
(63, 100, '202312120104304', 2, 2),
(64, 100, '202312120104304', 3, 2),
(65, 100, '202312120109231', 2, 1),
(66, 100, '202312120109231', 3, 1),
(67, 100, '202312120109231', 2, 2),
(68, 100, '202312120109231', 3, 2),
(69, 100, '202312120110593', 2, 1),
(70, 100, '202312120110593', 3, 1),
(71, 100, '202312120110593', 2, 2),
(72, 100, '202312120110593', 3, 2),
(73, 100, '202312120111375', 2, 1),
(74, 98, '202312120111375', 3, 1),
(75, 100, '202312120111375', 2, 2),
(76, 100, '202312120111375', 3, 2),
(77, 98, '202312120112518', 2, 1),
(78, 100, '202312120112518', 3, 1),
(79, 100, '202312120112518', 2, 2),
(80, 100, '202312120112518', 3, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pk_cart_users` (`user_id`),
  ADD KEY `pk_cart_variants` (`variant_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `pk_comments_products` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `pk_orders_users` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `pk_products_categories` (`category_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `pk_vatiants_colors` (`color_id`),
  ADD KEY `pk_vatiants_sizes` (`size_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `pk_cart_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pk_cart_variants` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`variant_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `pk_comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `pk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `pk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `pk_vatiants_colors` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`),
  ADD CONSTRAINT `pk_vatiants_sizes` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
