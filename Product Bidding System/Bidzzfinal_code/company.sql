-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 06:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidinfo`
--

CREATE TABLE `bidinfo` (
  `product_id` int(4) NOT NULL,
  `product_name` varchar(35) NOT NULL,
  `seller_id` varchar(25) NOT NULL,
  `bidder_id` varchar(25) NOT NULL,
  `bid_amount` int(6) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'not sold'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidinfo`
--

INSERT INTO `bidinfo` (`product_id`, `product_name`, `seller_id`, `bidder_id`, `bid_amount`, `status`) VALUES
(2, 'Jeans', 'user1', 'user3', 400, 'not sold'),
(3, 'Harry potter- All 7 volumes', 'user2', 'user3', 801, 'not sold'),
(5, 'headphones', 'user3', 'user4', 1000, 'not sold'),
(4, 'Dining table', 'user2', 'user4', 7500, 'not sold'),
(1, 'HP Laptop', 'user1', 'user5', 36000, 'not sold'),
(6, 'Rings of fire', 'user3', 'user5', 350, 'not sold');

-- --------------------------------------------------------

--
-- Table structure for table `proinfo`
--

CREATE TABLE `proinfo` (
  `id` int(4) NOT NULL,
  `name` varchar(35) NOT NULL,
  `description` varchar(100) NOT NULL,
  `seller_id` varchar(20) NOT NULL,
  `amount` int(6) NOT NULL,
  `category` varchar(15) NOT NULL,
  `image` varbinary(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'not sold',
  `sold_to` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proinfo`
--

INSERT INTO `proinfo` (`id`, `name`, `description`, `seller_id`, `amount`, `category`, `image`, `status`, `sold_to`) VALUES
(1, 'HP Laptop', '11th Gen Intel Core i5-1135G7, 8GB DDR4, 256GB SSD + 1TB HDD, Win 10 Home, MS Office, 2GB MX350 Grap', 'user1', 35000, 'electronics', 0x6c6170746f702e6a7067, 'not sold', ''),
(2, 'Jeans', 'Regular fit\r\nButton and zip fastening\r\nUnlined', 'user1', 300, 'clothing', 0x6a65616e732e6a666966, 'not sold', ''),
(3, 'Harry potter- All 7 volumes', 'A beautiful boxed set containing all seven Harry Potter novels in paperback. ', 'user2', 800, 'books', 0x6861727279706f747465722e6a7067, 'not sold', ''),
(4, 'Dining table', 'Table dimensions are 33.5 x 33.5 inches with a 14 inch height\r\nStool dimensions are 15.4 x 15.4 inch', 'user2', 7000, 'furniture', 0x64696e696e672e6a666966, 'not sold', ''),
(5, 'headphones', 'boAt Rockerz 370 Wireless Headphone with Bluetooth 5.0, Immersive Audio', 'user3', 900, 'electronics', 0x6865616470686f6e652e6a7067, 'not sold', ''),
(6, 'Rings of fire', 'This is a benchmark book from a seminal leader of the modern evangelical movement.', 'user3', 250, 'books', 0x72696e676f66666972652e6a7067, 'not sold', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `s_no` int(3) UNSIGNED NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`s_no`, `username`, `password`, `name`, `email`, `contact`, `gender`, `address`) VALUES
(1, 'user1', 'user01', 'User01', 'user1@gmail.com', '9632587412', 'male', 'india'),
(2, 'user2', 'user02', 'User02', 'user2@gmail.com', '7899654223', 'female', 'chennai india'),
(3, 'user3', 'user03', 'User03', 'user3@gmail.com', '4789651230', 'male', 'andhra pradhesh'),
(4, 'user4', 'user04', 'User04', 'user4@gmail.com', '7896541230', 'female', 'telangana india'),
(5, 'user5', 'user05', 'User05', 'user5@gmail.com', '5874123690', 'female', 'karur india');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proinfo`
--
ALTER TABLE `proinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proinfo`
--
ALTER TABLE `proinfo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `s_no` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
