-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2023 at 09:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(25,0) NOT NULL,
  `image` blob NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `name`, `price`, `image`, `quantity`) VALUES
(22, 'sandwitch1', '29', 0x666f6f642d342e706e67, '1'),
(23, 'chops', '30', 0x666f6f642d362e706e67, '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `subject`, `message`, `id`) VALUES
(1, 'Khurram Mughal', 'khurrammughal19@hotmail.com', 'aaa', 'aa', 13),
(2, 'Khurram Mughal', 'khurrammughal19@hotmail.com', 'aaa', 'jfj', 6),
(6, 'Khurram Mughal', 'khurrammughal19@hotmail.com', 'jl', 'kh', 8),
(7, 'Khurram Mughal', 'khurrammughal19@hotmail.com', 'as', 'hg', 13),
(8, 'Khurram Mughal', 'khurrammughal19@hotmail.com', 'aaa', 'e2', 13),
(9, 'Khurram Mughal', 'khurrammughal19@hotmail.com', 'j', 'bk', 13);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pin_code` int(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `ctime` datetime NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`oid`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `ctime`, `id`) VALUES
(1, 'Khurram Ali Mughal', '5127169023', 'khurrammughal19@hotmail.com', 'paypal', '951 Kirtomy Loop', 'Kirtomy ', 'Pflugerville', 'TX', 'United States', 78660, 'rtd (31) ', '2', '2023-03-29 14:59:59', 6),
(2, 'anna Mughal', '5127169023', 'khurrammughal19@hotmail.com', 'cash on delivery', '951 Kirtomy Loop', 'qq', 'Pflugerville', 'TX', 'United States', 78660, 'chips (1) , sandwitch1 (1) , chops (1) ', '72', '2023-03-29 15:02:33', 6),
(3, 'Khurram Mughal', '5127169023', 'khurrammughal19@hotmail.com', 'cash on delivery', '951 Kirtomy Loop', 'll', 'Pflugerville', 'TX', 'United States', 78660, 'chops (1) ', '30', '2023-03-29 21:34:33', 13),
(4, 'Khurram Mughal', '5127169023', 'khurrammughal19@hotmail.com', 'cash on delivery', '951 Kirtomy Loop', 'l', 'Pflugerville', 'TX', 'United States', 78660, 'chops (1) ', '30', '2023-03-30 00:41:29', 6),
(5, 'fayzz Mughal', '5167169056', 'fayzz1@hotmail.com', 'cash on delivery', '951 Kirtomy Loop', 'ff', 'Pflugerville', 'TX', 'United States', 78660, 'chops (1) ', '30', '2023-03-30 13:22:56', 13),
(6, 'fayaaz ali Mughal', '5127169023', 'khurrammughal19@hotmail.com', 'cash on delivery', '951 Kirtomy Loop', 'loop', 'Pflugerville', 'TX', 'United States', 78660, 'sandwitch1 (1) ', '20', '2023-03-31 06:06:09', 13),
(7, 'Khurram Mughal', '5127169023', 'khurrammughal19@hotmail.com', 'cash on delivery', '951 Kirtomy Loop', 'kh', 'Pflugerville', 'TX', 'United States', 78660, 'sandwitch1 (1) ', '29', '2023-03-31 16:27:39', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `price`, `image`) VALUES
(7, 'sandwitch1', 30, 'food-4.png'),
(9, 'chops', 30, 'food-6.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `ctime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `Password`, `role`, `ctime`) VALUES
(6, 'anna4', 'k@hotmail.com', 'IDEyMzQ1Njc4ICA=', 'user', '2023-03-21 21:09:57'),
(8, 'anna', 'anna1@hotmail.com', 'MTIzNDU2Nzg=', 'admin', '2023-03-21 21:33:03'),
(13, 'fayzz', 'khurrammughal19@hotmail.com', 'MTIzNDU2Nzg= ', 'user', '2023-03-30 02:26:12'),
(16, 'anna12', 'anna@hotmail.com', 'MTIzNDU2Nzg= ', 'user', '2023-04-01 19:34:10'),
(17, 'anna', 'kh19@hotmail.com', 'MTIzNDU2Nzg= ', 'user', '2023-04-01 20:42:09'),
(18, 'anna11', 'khurra19@hotmail.com', 'MTIzNDU2Nzg= ', 'user', '2023-04-01 20:42:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `fk` (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `fk` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
