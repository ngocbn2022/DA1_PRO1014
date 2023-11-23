-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2023 lúc 01:03 PM
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
  `variant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `quantity`, `user_id`, `variant_id`) VALUES
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `category_role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`, `category_role`) VALUES
(1, 'Áo phông', 'áo phông.jpeg', 0),
(2, 'Áo polo', 'áo polo.jpeg', 0),
(3, 'Áo sơ mi', 'áo sơ mi.jpeg', 0),
(4, 'Áo len', 'áo len.jpeg', 0),
(5, 'Áo khoác', 'áo khoác.jpeg', 0),
(6, 'Áo nỉ', 'áo nỉ.jpeg', 0),
(7, 'Áo chóng nắng', 'áo chống nắng.jpeg', 0),
(8, 'Áo vest', 'áo vest.jpeg', 0);

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
(4, 'User1', 'This is the first comment', '2023-11-12', 4, 0, 3),
(5, 'User2', 'Another comment here', '2023-11-12', 3, 0, 4),
(6, 'User3', 'A different comment', '2023-11-12', 2, 0, 5),
(7, 'User3', 'A different comment', '2023-11-12', 3, 0, 6),
(8, 'User3', 'A different comment', '2023-11-12', 4, 0, 7),
(10, 'User3', 'A different comment', '2023-11-12', 6, 0, 4),
(11, 'ducngoc', 'sản phẩm oke', '2001-08-02', 5, 0, 7),
(14, 'ducngoc', 'sản phẩm quá đẹp', '2023-11-21', 5, 0, 7),
(15, 'ducngoc', 'sản phẩm đẹp', '2023-11-21', 0, 0, 7),
(16, 'ducngoc', 'cho hỏi sản phẩm còn không ạ\r\n', '2023-11-21', 0, 0, 7),
(17, 'ducngoc', 'sản phẩm oke\r\n', '2023-11-21', 0, 0, 8),
(18, 'ducngoc', 'sản phẩm còn không ạ', '2023-11-21', 0, 0, 6),
(19, 'ducngoc', 'sản phẩm tuyệt với', '2023-11-21', 5, 0, 6),
(20, 'ducngoc', 'sản phẩm còn không shop', '2023-11-21', 0, 0, 1),
(21, 'ducngoc', 'sản phẩm còn khong ạ', '2023-11-21', 0, 0, 1),
(22, 'ducngoc', 'sản phẩm còn khong ạ', '2023-11-21', 0, 0, 1),
(23, 'ducngoc', 'san prha', '2023-11-21', 0, 0, 1),
(24, 'ducngoc', 'sản phẩm đẹp', '2023-11-21', 5, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailorders`
--

CREATE TABLE `detailorders` (
  `detailorder_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_role` int(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
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

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `price`, `description`, `view`, `product_role`, `category_id`) VALUES
(1, 'Áo polo 1', 'áo polo(1).jpeg', 150000, 'Description 1', 1, 0, 2),
(2, 'Áo khoác 1', 'áo khoác(1).jpeg', 250000, 'Description 2', 2, 0, 5),
(3, 'Áo nỉ 1', 'áo nỉ(1).jpeg', 350000, 'Description 3', 0, 0, 6),
(4, 'Áo sơ mi 1', 'áo sơ mi(1).jpeg', 450000, 'Description 4', 0, 0, 3),
(5, 'Áo phông 1', 'áo phông(1).jpeg', 180000, 'Description 5', 3, 0, 1),
(6, 'Áo len 1', 'áo len(1).jpeg', 280000, 'Description 6', 0, 0, 4),
(7, 'Áo chống nắng 1', 'áo chống nắng(1).jpeg', 380000, 'Description 7', 0, 0, 7),
(8, 'Áo vest 1', 'áo vest(1).jpeg', 480000, 'Description 9', 0, 0, 8),
(9, 'Áo nỉ 2', 'áo nỉ(2).jpeg', 123000, 'đẹp quá shop ơi', 0, 0, 6);

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
(3, 'ducngoc', '1234567', 'phungducngoc1@gmail.com', 987654322, 'hà nam', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `variant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`variant_id`, `quantity`, `product_id`, `size_id`, `color_id`) VALUES
(2, 50, 3, 3, 2),
(3, 100, 6, 2, 2),
(4, 50, 5, 2, 1),
(5, 100, 5, 3, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pk_detailoders_variant` (`variant_id`),
  ADD KEY `pk_cart_user` (`user_id`);

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
-- Chỉ mục cho bảng `detailorders`
--
ALTER TABLE `detailorders`
  ADD PRIMARY KEY (`detailorder_id`),
  ADD KEY `pk_detailoders_cart` (`cart_id`),
  ADD KEY `pk_detailoders_orders` (`order_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
  ADD KEY `pk_vatiants_sizes` (`size_id`),
  ADD KEY `pk_vatiants_products` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `detailorders`
--
ALTER TABLE `detailorders`
  MODIFY `detailorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `pk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pk_detailoders_variant` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`variant_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `pk_comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `detailorders`
--
ALTER TABLE `detailorders`
  ADD CONSTRAINT `pk_detailoders_cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `pk_detailoders_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

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
  ADD CONSTRAINT `pk_vatiants_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `pk_vatiants_sizes` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
