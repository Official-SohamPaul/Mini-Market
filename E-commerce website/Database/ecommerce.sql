-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 07:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `FirstName`, `LastName`, `email`, `phone`, `password`) VALUES
(1, 'Soham', 'Paul', 'sohampaul6289@gmail.com', '6289722349', '12345'),
(2, 'Utpal', 'Paul', 'utpalpaul032@gmail.com', '9674507474', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Cart` varchar(50) DEFAULT NULL,
  `Ordered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `FirstName`, `LastName`, `email`, `Address`, `password`, `Cart`, `Ordered`) VALUES
(1, 'Soham', 'Paul', 'sohampaul6289@gmail.com', 'Paschim Dasnagar , Nobojibon Samity, Howrah -711105', '12345', '', '18,20'),
(3, 'Bipasha', 'Roy', 'ray.bipasha2001@gmail.com', 'Balichak , Purba Mednipur ', '12345', NULL, ''),
(32, 'Utpal', 'Paul', 'utpalpaul032@gmail.com', 'Paschim Dasnagar', '12345', '18,20,5,27', '18,7,27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `productID` varchar(30) NOT NULL,
  `adminID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `orderdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `productID`, `adminID`, `clientID`, `orderdate`) VALUES
(2, '7,18,20,27', 1, 1, '2022/08/25-21:35:08'),
(3, '18,7,27', 1, 32, '2022/08/25-21:37:58'),
(4, '18,20', 1, 1, '2022/08/25-22:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `adminID` int(30) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `Description` text NOT NULL,
  `ImageProduct` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `adminID`, `Category`, `ProductName`, `Price`, `Description`, `ImageProduct`) VALUES
(5, 1, 'Fruits', 'Oranges', 10, 'Fresh and sweet', '../img/Product/2022_08_20_18_20_32.jpg'),
(7, 1, 'Fruits', 'Banana', 12, 'Perfect ripe', '../img/Product/2022_08_21_11_00_23.jpg'),
(18, 1, 'Grocery', 'Refined Oil', 269, 'Fortune refined oil', '../img/Product/2022_08_22_00_18_00.jpg'),
(20, 1, 'Fruits', 'Mangoes', 80, 'Ripe And sweet', '../img/Product/2022_08_22_00_21_30.jpg'),
(27, 1, 'Sweets', 'Doi', 15, 'Sweet curd', '../img/Product/2022_08_24_15_54_38.jpg'),
(29, 1, 'Sweets', 'Rasagola', 10, 'Sweet and soft', '../img/Product/2022_08_24_15_57_06.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
