-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2016 at 02:25 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `username` char(15) NOT NULL,
  `password` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`username`, `password`) VALUES
('admin1', 'pass1'),
('admin2', 'pass2');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `username` char(15) NOT NULL,
  `password` char(30) DEFAULT NULL,
  `sirname` char(15) DEFAULT NULL,
  `name` char(15) DEFAULT NULL,
  `address` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`username`, `password`, `sirname`, `name`, `address`) VALUES
('a', 'a', 'a', 'a', ''),
('aggg', '', '', '', ''),
('b', 'b', 'b', 'b', 'b'),
('client66', '66', 'Cli', 'Ent', '66, Client str'),
('d', 'd', 'd', 'd', 'd'),
('hgfhgf', '', '', '', ''),
('Î±', 'Î±', 'Î±', 'Î±', 'Î±'),
('Î³Î·Ï†Î³Ï†Î·Î³Ï', '', '', '', ''),
('jhghgjhg', '', '', '', ''),
('jhkjhjhkjh', '', '', '', ''),
('jhkjhkjh', '', '', '', ''),
('jkhkjh', '', '', '', ''),
('test1', 'test1', 'gfhgf', 'gfghf', 'gjhghg'),
('test2', 'test2', 'gfhgf', 'gfghf', 'gjhghg'),
('user1', 'pass1', 'sir1', 'name1', 'odos1'),
('user2', 'pass2', '2', 'user', 'gdg'),
('user3', '*35B5E90BC4F5AE5D02ED515DF6B61', 'user', '3', 'user 3 str'),
('uy', 'a', 'a', 'a', 'a'),
('y', 'a', 'a', 'a', 'a'),
('yfghf', 'a', 'a', 'a', 'a'),
('z', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `id` int(10) NOT NULL,
  `customer` char(15) DEFAULT NULL,
  `product` text,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`id`, `customer`, `product`, `quantity`) VALUES
(1, 'user1', 'test', 1),
(2, 'user1', 'ÎµÎºÏ„Ï…Ï€Ï‰Ï„Î®Ï‚', 1),
(3, '', 'test', 1),
(4, '', 'Î¿Î¸ÏŒÎ½Î·', 1),
(5, '', 'Î›Î¬Ï€Ï„Î¿Ï€', 1),
(6, '', 'ggg', 2),
(7, 'user1', 'ggg', 4),
(8, 'user1', 'ggg', 1),
(9, 'user1', 'Î»Î¬Ï€Ï„Î¿Ï€', 1),
(10, 'user2', 'ggg', 10),
(11, 'user2', 'Î›Î¬Ï€Ï„Î¿Ï€', 12);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `id` int(10) NOT NULL,
  `product` char(30) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `product`, `stock`) VALUES
(1, 'ggg', 21),
(2, 'test2a', 1),
(3, 'Î¿Î¸ÏŒÎ½Î· LG', 1),
(4, 'Î¿Î¸ÏŒÎ½Î· SAMSUNG', 12),
(5, 'Ï€Î»Î·ÎºÏ„ÏÎ¿Î»ÏŒÎ³Î¹Î¿ Micro', 18),
(7, 'test', 16),
(8, 'test2', -81),
(9, 'ÎµÎºÏ„Ï…Ï€Ï‰Ï„Î®Ï‚ HP', 19),
(10, 'ÎµÎºÏ„Ï…Ï€Ï‰Ï„Î®Ï‚ Canon', 19),
(11, 'ÎµÎºÏ„Ï…Ï€Ï‰Ï„Î®Ï‚ Canon 874', 132),
(12, 'ÎµÎºÏ„Ï…Ï€Ï‰Ï„Î®Ï‚ Canon 875', 12),
(13, 'Î»Î¬Ï€Ï„Î¿Ï€ Aser 6876', 12),
(14, 'Î›Î¬Ï€Ï„Î¿Ï€ Aser 4300', 111),
(15, 'Î›Î¬Ï€Ï„Î¿Ï€ Aser 4301', 111),
(16, 'usb stick DataTraveler 100G2', 4),
(17, 'DVD player LG 6876', 2),
(18, 'test76', 1),
(19, 'Ï„Î·Î»ÎµÏ‡ÎµÎ¹ÏÎ¹ÏƒÏ„Î®ÏÎ¹Î¿', 2),
(20, 'Ï€Î¿Î½Ï„Î¯ÎºÎ¹ microsoft 67685', 3),
(21, 'ÎºÎ¹Î½Î·Ï„ÏŒ Î‘123', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
