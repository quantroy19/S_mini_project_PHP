-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 08:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_php_sun`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'trà sữa', 100000, '625fb0047f35b-sp4.jpg', ''),
(2, 'trà đào', 120000, '625fb01354c9d-sp3.jpg', '111111'),
(3, 'trà sữa 2', 130000, '625fb02bb6088-sp6.jpg', 'qqq'),
(4, 'Trà đào 2', 110000, '625fb04de3980-sp5.jpg', 'yyyy'),
(5, '33333', 44, '625ed44aac030-sp1.jpg', 'â'),
(8, 'trà đào11qq', 443311, '625fa3846214b-sp3.jpg', 'đẹp22aa'),
(12, 'tả331', 555511, '625fc793e446d-sp5.jpg', 'bbb1'),
(28, '33333&lt;&gt;&lt;&gt;', 333, '626612d9626da-sp9.jpg', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `expires_time` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `token`, `expires_time`) VALUES
(35, 'quantroy', 'do.minh.quan@sun-asterisk.com', '$2y$10$Po73LfIXhJeD9erhDImldudl3QSbtMuscEHjr1mZpEtgfOVHzTe9S', NULL, 'e7663d3f2eb801d3ba11271a883a0fe2063176f1', 1650953123),
(36, 'do.minh.quan', '111do.minh.quan@sun-asterisk.com', '$2y$10$dCwYpmE8uVDo7hrb5.fq9.hOv6uGRiGXbqgnMnl/V5LNzYjNV/WE.', NULL, NULL, NULL),
(37, 'do.minh.quan', '333do.minh.quan@sun-asterisk.com', '$2y$10$xDcTvkPz1nHYlsWh6asTZ.CiDfCRGC3a2/R0mKBEN55chu5ikImgS', NULL, NULL, NULL),
(38, 'do.minh.quan111', '11do.minh.quan@sun-asterisk.com', '$2y$10$LoBYDnTTdK3TLxoXMrlNBOkwok/1lzs9Bd2wEqOZJLgwhn32bhd72', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
