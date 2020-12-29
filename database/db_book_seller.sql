-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 07:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_book_seller`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_price`) VALUES
(1, 'John Travolta', 15000),
(2, 'John Titalee', 77500),
(3, 'L\'Arc n Ciel', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `books_come`
--

CREATE TABLE `books_come` (
  `id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `book_order_in` int(11) NOT NULL,
  `date_come` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_come`
--

INSERT INTO `books_come` (`id`, `id_book`, `book_order_in`, `date_come`) VALUES
(13, 1, 31, '2020-12-24 03:10:13'),
(14, 3, 19, '2020-12-24 03:21:21'),
(16, 1, 13, '2020-12-24 12:13:39'),
(17, 1, 14, '2020-12-24 12:13:41'),
(19, 1, 2, '2020-12-24 12:13:45'),
(20, 1, 3, '2020-12-24 12:13:47'),
(21, 2, 12, '2020-12-24 12:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `user_name`, `telephone`, `email`) VALUES
(1, 'anisa', '19817239126491', 'cont@gmail.com'),
(2, 'Anisa', '1231512312312', 'c@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_addresses`
--

CREATE TABLE `buyer_addresses` (
  `id` int(11) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `pos_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_addresses`
--

INSERT INTO `buyer_addresses` (`id`, `id_buyer`, `alias`, `address`, `city`, `province`, `pos_code`) VALUES
(1, 1, 'Perumahan', 'daerah sono', 'salatiga', 'jawa tengah', '51900'),
(2, 1, 'Kantor', 'Pekalongan', 'Semarang', 'Jawa Timur', '15123'),
(3, 2, 'Kos', 'Pattimura no 109', 'Salatiga', 'Jawa Tengah', '98171'),
(4, 2, 'Rumah', 'Ruko no 3', 'Jakarta', 'Jakarta', '12512');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `id_address` int(11) NOT NULL,
  `expedition` varchar(50) NOT NULL,
  `sending_price` int(11) NOT NULL,
  `weight_packet` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `date_send` date NOT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `buyer_status` varchar(100) DEFAULT NULL,
  `id_book` int(11) NOT NULL,
  `book_order_out` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `order_group` int(11) DEFAULT NULL,
  `date_history` datetime NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_buyer`, `id_address`, `expedition`, `sending_price`, `weight_packet`, `date_order`, `date_send`, `payment_status`, `buyer_status`, `id_book`, `book_order_out`, `id_group`, `order_group`, `date_history`, `description`) VALUES
(1, 2, 2, 'JNE', 15, 1, '2020-12-29', '2020-12-15', 'Lunas', 'Alpha', 2, 5, 2, NULL, '2020-12-29 10:55:30', 'Tidak ada'),
(2, 1, 1, 'POS', 14, 0, '2020-12-06', '2020-12-07', 'Telat', 'Kapan2', 2, 99, 11, NULL, '2020-12-29 11:02:16', 'Tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `description`) VALUES
('5cb90329d0f13', 'Anggrek', 134000, 'default.jpg', 'Angrek adalah bunga dengan'),
('5cb90737356f4', 'Melati', 412221, '5cb90737356f4.png', 'melati adalah bla bla bla'),
('5ddd677b524b5', 'asdadas', 14141242, '5ddd677b524b5.png', 'adasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'dian', '$2y$10$TpipIS3PDfeHTJWggvnFO.eT/dVBMyVKI5OcYV1avGMnt8wTqOt5O', 'dian@petanikode.com', 'Ahmad Muhardian', '08123456789', 'admin', '2019-12-10 16:17:02', 'user_no_image.jpg', '2019-12-10 15:46:40', 1),
(3, 'admin', '$2y$10$AcoGfRcoZvt5.ItaupBytu.dtlLQh.xyDel1Z2T1e4jn3LzVdrDtq', 'admin@gmail.com', 'chrono', '777', 'admin', '2020-12-29 05:36:28', 'user_no_image.jpg', '2020-09-25 13:49:10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_come`
--
ALTER TABLE `books_come`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_addresses`
--
ALTER TABLE `buyer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books_come`
--
ALTER TABLE `books_come`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyer_addresses`
--
ALTER TABLE `buyer_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
