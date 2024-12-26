-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2024 lúc 05:31 PM
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
-- Cơ sở dữ liệu: `doanupdate`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) NOT NULL,
  `image_manu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`, `image_manu`) VALUES
(1, 'Nike', 'logo-nike.jpg'),
(2, 'Adidas', 'adidas.jpg'),
(3, 'Puma', 'puma.jpg'),
(4, 'New Balance', 'New Balance.jpg'),
(5, 'Asics', 'Asics.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `feature` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Quantity` int(11) NOT NULL,
  `BestSellingProducts` tinyint(4) NOT NULL,
  `PriceDiscount` int(11) NOT NULL,
  `ALL` int(11) NOT NULL,
  `Quantilyshop` int(11) NOT NULL DEFAULT 0,
  `Total` int(11) NOT NULL DEFAULT 0,
  `heart` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`, `Quantity`, `BestSellingProducts`, `PriceDiscount`, `ALL`, `Quantilyshop`, `Total`, `heart`) VALUES
(3, 'Adidas Ultraboost', 2, 1, 180, 'Adidas Ultraboost.jpg', 'A premium running shoe with Boost technology', 1, '2024-12-25 16:25:05', 12, 1, 220, 0, 1, 180, 0),
(4, 'Adidas Superstar', 2, 3, 100, 'Adidas Superstar.jpg', 'Classic streetwear sneakers', 1, '2024-12-22 12:57:29', 15, 1, 140, 0, 1, 100, 0),
(5, 'Puma Suede', 3, 3, 80, 'Puma Suede.jpg', 'Iconic suede sneakers', 1, '2024-12-25 16:20:23', 22, 0, 130, 0, 1, 160, 1),
(6, 'Puma RS-X', 3, 1, 120, 'Puma RS-X.jpg', 'Chunky running-inspired sneakers', 1, '2024-12-25 16:16:52', 27, 0, 160, 0, 1, 240, 1),
(11, 'Nike React Infinity Run', 1, 1, 160, 'Nike React Infinity Run.jpg', 'Stability running shoe with React foam', 0, '2024-12-22 12:59:17', 6, 1, 200, 0, 1, 160, 0),
(12, 'Nike Pegasus', 1, 1, 140, 'Nike Pegasus.jpg', 'Versatile running shoe for everyday training', 0, '2024-11-27 15:21:40', 9, 1, 180, 0, 1, 0, 0),
(14, 'Adidas NMD R1', 2, 1, 140, 'Adidas NMD R1.jpg', 'Stylish sneaker with Boost midsole', 0, '2024-12-25 16:21:52', 14, 1, 185, 0, 1, 280, 0),
(16, 'Adidas Stan Smith', 2, 3, 95, 'Adidas Stan Smith.jpg', 'Timeless tennis-style sneaker', 0, '2024-11-27 15:22:59', 19, 1, 145, 0, 1, 0, 0),
(17, 'Puma Future Rider', 3, 1, 100, 'Puma Future Rider.jpg', 'Retro-inspired running shoe', 0, '2024-11-27 15:23:19', 21, 0, 125, 0, 1, 0, 0),
(18, 'Puma Cali', 3, 3, 90, 'Puma Cali.jpg', 'California-inspired casual sneaker', 0, '2024-11-27 15:23:36', 22, 0, 130, 0, 1, 0, 0),
(19, 'Puma Ignite', 3, 1, 110, 'Puma Ignite.jpg', 'High-performance running shoe', 0, '2024-11-27 15:23:49', 24, 0, 150, 0, 1, 0, 0),
(20, 'New Balance 997H', 4, 3, 110, 'New Balance 997H.jpg', 'Modern take on a classic running shoe', 0, '2024-12-25 16:04:42', 30, 0, 155, 0, 1, 440, 0),
(21, 'New Balance FuelCell Rebel', 4, 1, 150, 'New Balance FuelCell Rebel.jpg', 'Lightweight shoe for fast running', 0, '2024-12-25 13:17:38', 32, 0, 190, 0, 1, 450, 0),
(22, 'New Balance XC-72', 4, 3, 120, 'New Balance XC-72.jpg', 'Futuristic sneaker inspired by running heritage', 0, '2024-11-27 15:24:44', 36, 0, 145, 0, 1, 0, 0),
(23, 'Asics Novablast', 5, 1, 150, 'Asics Novablast.jpg', 'High-energy return running shoe', 0, '2024-11-27 15:25:00', 99, 0, 205, 0, 1, 0, 0),
(24, 'Asics Metaracer', 5, 1, 190, 'Asics Metaracer.jpg', 'Carbon-plated marathon racing shoe', 0, '2024-11-27 15:25:14', 98, 0, 225, 0, 1, 0, 0),
(25, 'Asics Gel-Venture 8', 5, 1, 90, 'Asics Gel-Venture 8.jpg', 'Trail running shoe for outdoor adventures', 0, '2024-11-27 15:25:35', 97, 0, 115, 0, 1, 0, 0),
(40, 'Adidas Superstar', 2, 3, 100, 'Adidas Superstar.jpg', 'Classic streetwear sneakers', 1, '2024-12-25 16:20:12', 15, 1, 140, 1, 12, 1200, 0),
(50, 'New Balance Fresh Foam', 4, 1, 130, 'New Balance Fresh Foam.jpg', 'High-performance cushioned running shoe', 1, '2024-12-25 15:44:24', 35, 0, 170, 1, 6, 780, 0),
(57, 'Asics Gel-Venture 8', 5, 1, 90, 'Asics Gel-Venture 8.jpg', 'Trail running shoe for outdoor adventures', 0, '2024-12-25 12:18:58', 97, 0, 115, 1, 10, 900, 0),
(104, 'New Balance 997H', 4, 3, 110, 'New Balance 997H.jpg', 'Modern take on a classic running shoe', 0, '2024-12-25 16:04:42', 30, 0, 155, 1, 4, 440, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

CREATE TABLE `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Sneakers'),
(2, 'Running Shoes'),
(3, 'Training Shoes'),
(4, 'Basketball Shoes'),
(5, 'Combat Boots');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL DEFAULT 'Editor',
  `ALL` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`User_Id`, `Username`, `Password`, `Role`, `ALL`) VALUES
(1, 'LeVanVu@gmail.com', '1234567890', 'Admin', 0),
(2, 'PhanDinhNgoc@gmail.com', '1234567890', 'Editor', 0),
(3, 'NguyenDanhPhat@gmail.com', '1234567890', 'Editor', 0),
(4, 'NguyenCongHieu@gmail.com', '1234567890', 'Editor', 0),
(5, 'VanThuat@gmail.com', '1234567890', 'Editor', 0),
(12, 'levanvu@gmail.com', '12345678900', '	Editor', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
