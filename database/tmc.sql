-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 12:41 PM
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
-- Database: `tokobuah`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `nama`, `harga`, `jumlah`) VALUES
(0, 'Albathroz of Nemesis', 889, 99),
(1, 'Buku Harry Potter Azkhaban', 19000, 89),
(2, 'Zonk', 0, -7),
(4, 'hell boys', 77, 88),
(5, 'Do', 1, 3),
(6, 'Dont War', 1, 44),
(7, 'PO', 1, 1),
(8, 'aa', 11, 123);

-- --------------------------------------------------------

--
-- Table structure for table `books_history`
--

CREATE TABLE `books_history` (
  `id` bigint(20) NOT NULL,
  `id_buku` bigint(20) NOT NULL,
  `jml_masuk` int(11) DEFAULT NULL,
  `jml_keluar` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `ekspedisi` varchar(100) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL,
  `berat_kiriman` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `telepone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `id_buku` bigint(20) NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `nama`, `alamat`, `kota`, `provinsi`, `kode_pos`, `ekspedisi`, `ongkos_kirim`, `berat_kiriman`, `tanggal`, `telepone`, `email`, `status`, `id_buku`, `jumlah_order`, `total`) VALUES
(1, 'dd', 'kemana aja', 'Bandung', 'Bandung', 123, 'JNE', 15000, 1, '2020-10-05 00:00:00', '1445', 'cont@gmail.com', 'pelajar', 2, 2, 50000),
(2, 'dd', 'kemana aja', 'Bandung', 'Bandung', 541, 'JNE', 12000, 13, '2020-10-05 00:00:00', '777', 'cont@gmail.com', 'pelajar', 2, 4, 82000),
(3, 'dd', 'kemana aja', 'Bandung', 'Bandung', 501, 'JNE', 15000, 1, '2020-10-05 00:00:00', '77', 'cont@gmail.com', 'pelajar', 2, 4, 85000),
(4, 'dd', 'kemana aja', 'Bandung', 'Bandung', 501, 'JNE', 15000, 1, '2020-10-05 00:00:00', '77', 'cont@gmail.com', 'pelajar', 2, 4, 15000);

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
(3, 'admin', '$2y$10$AcoGfRcoZvt5.ItaupBytu.dtlLQh.xyDel1Z2T1e4jn3LzVdrDtq', 'admin@gmail.com', 'chrono', '777', 'admin', '2020-10-25 06:03:01', 'user_no_image.jpg', '2020-09-25 13:49:10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_history`
--
ALTER TABLE `books_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books_history`
--
ALTER TABLE `books_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
