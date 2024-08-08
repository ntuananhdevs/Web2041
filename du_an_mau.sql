-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2024 at 03:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_mau`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`) VALUES
(1, 'LapTop\r\n', '', NULL),
(2, 'Phone\r\n', '', NULL),
(10, 'Tuan Anh', '   Tún AnhDep zaiiii qua\r\n\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `created_at`) VALUES
(331, 1, 60, 'dsfdf', '2024-08-04 17:16:13'),
(332, 1, 60, 'dsfdf', '2024-08-04 17:16:14'),
(333, 34, 60, 'ssss', '2024-08-04 17:38:24'),
(334, 34, 60, 'ssss', '2024-08-04 17:38:24'),
(335, 34, 60, 'sss', '2024-08-04 17:41:18'),
(336, 34, 60, 'A', '2024-08-04 17:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','processing','completed','canceled') DEFAULT 'pending',
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `name_product` varchar(100) NOT NULL,
  `screen_size` varchar(6) NOT NULL,
  `description_1` text NOT NULL,
  `description_2` text NOT NULL,
  `description_3` text,
  `description_4` text,
  `description_5` text,
  `description_6` text,
  `description_7` text,
  `quantity` int NOT NULL,
  `price` varchar(20) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sale` varchar(255) NOT NULL,
  `views` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name_product`, `screen_size`, `description_1`, `description_2`, `description_3`, `description_4`, `description_5`, `description_6`, `description_7`, `quantity`, `price`, `img`, `sale`, `views`) VALUES
(2, 1, 'ASUS ROG STRIK GAMING', '', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', '', 201, '35.000.000', './uploads/1721244587IMG_7235.JPG', '25.000.000', 917),
(60, 1, 'ROG Strix G16 (2023) G614', '15', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', NULL, 500, '22.000.000', './uploads/1721158378IMG_7308.JPG', '15.000.000', 495),
(62, NULL, 'ASUS ROG STRIK GAMING', '15.00', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Pin 90W', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus\r\n', 20, '19.00', './uploads/1721242147IMG_7230.JPG', '', 0),
(63, NULL, 'ASUS ROG STRIK GAMING', '15.00', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Pin 90W', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus\r\n', 55, '19.00', './uploads/1721242164IMG_7230.JPG', '', 0),
(64, NULL, 'ASUS ROG STRIK GAMING', '15,6', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', '', '', '', '', 66, '19.000.000', './uploads/1721242284IMG_7230.JPG', '', 0),
(65, NULL, 'Asus Vivobook', '', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 34, '25.000.000', './uploads/1721242353IMG_7301.JPG', '20.000.000', 0),
(66, NULL, 'ASUS ROG STRIK GAMING', '15.00', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Pin 90W', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus\r\n', 20, '19.00', './uploads/1721242488IMG_7229.JPG', '', 0),
(67, NULL, 'Asus Vivobook', '', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 34, '25.000.000', './uploads/1721242601IMG_7230.JPG', '20.000.000', 0),
(68, NULL, 'Asus Vivobook', '', 'Windows 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 434, '25.000.000', './uploads/1721242611IMG_7230.JPG', '20.000.000', 0),
(71, 1, 'MSI', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 12, '22000000', './uploads/1721660159IMG_7306.JPG', '17000000', 5),
(72, 2, 'MSI', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 12, '22000000', './uploads/1721660168IMG_7307.JPG', '17000000', 3),
(73, 1, 'ROG Strix G16 (2023) G614', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', NULL, 12, '22000000', './uploads/1721660174IMG_7317.JPG', '17000000', 89),
(74, 1, 'MSI', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 12, '22000000', './uploads/1721660181IMG_7321.JPG', '17000000', 53),
(75, 1, 'MSI', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 12, '22000000', './uploads/1721660188IMG_7307.JPG', '17000000', 0),
(77, 1, 'MSI', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 12, '22000000', './uploads/1721661238IMG_7380.JPG', '17000000', 2),
(78, 1, 'MSI', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 12, '22000000', './uploads/1721661254IMG_7475.JPG', '17000000', 1),
(79, 1, 'MSI', '15', 'Window 11 Home', 'GPU lên đến NVIDIA® GeForce RTX™ 4070', 'CPU AMD Ryzen™ 7040 Series', 'Sạc PD Type-C', 'Quạt Arc Flow 84 cánh & 4 khe thoát nhiệt', 'MUX Switch và NVIDIA® Advanced Optimus', '', 12, '22000000', './uploads/1721661264IMG_7379.JPG', '17000000', 2),
(80, 2, 'IPhone 11 Pro', '6', 'IOS', 'Apple A15 Bionic 6 nhân', '6 GB', '255', '', '', '', 12, '23.000.000', './uploads/1721723750IMG_7455.JPG', '18.000.000', 16),
(81, 2, 'IPhone 11 Pro Max', '6', 'IOS', 'Apple A16 Bionic 6 nhân', '6 GB', '255', '21', '', '', 23, '29.000.000', './uploads/1722065535IMG_7300.JPG', '25.000.000', 2),
(82, 2, 'Iphone 12', '6', 'IOS', 'Apple A14 Bionic', '2815 mAh20 W', '255', '', '', '', 23, '29.000.000', './uploads/1722068147IMG_7231.JPG', '25.000.000', 0),
(83, 2, 'Iphone 12 Pro', '6', 'IOS', 'Apple A14 Bionic', '2815 mAh20 W', '255', '', '', '', 23, '22000000', './uploads/1722068845IMG_7234.JPG', '17000000', 1),
(84, 2, 'Iphone 12 Pro', '6', 'IOS', 'Apple A14 Bionic', '2815 mAh20 W', '255', '', '', '', 23, '22000000', './uploads/1722068855IMG_7312.JPG', '17000000', 0),
(85, 2, 'Iphone 12 Pro', '6', 'IOS', 'Apple A14 Bionic', '2815 mAh20 W', '255', '', '', '', 23, '22000000', './uploads/1722068863IMG_7324.JPG', '17000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '../public/img/avt-default.png',
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `avatar`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '0987654321', './public/img/avt-default.png	', 'admin', 'Admin'),
(31, 'ntuananh', 'nguyentuananh.ndta@gmail.com', '0981714620', './uploads/1722766503avtgit.jpg', 'asasas', 'Customer'),
(34, 'ntuananhhhhh', 'admin2@gmail.com', '0981714622', './public/img/avt-default.png	', 'Anh123456789', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
