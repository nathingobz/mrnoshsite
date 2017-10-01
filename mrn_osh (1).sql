-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 11:18 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrn_osh`
--
CREATE DATABASE IF NOT EXISTS `mrn_osh` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mrn_osh`;
-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderID` varchar(20) NOT NULL,
  `productID` int(11) NOT NULL,
  `itemPrice` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderID`, `productID`, `itemPrice`, `quantity`) VALUES
('160522225522', 2, '1200.00', 1),
('160522225522', 3, '350.00', 2),
('160522225522', 4, '600.00', 1),
('160522234328', 2, '1200.00', 1),
('160522234328', 3, '350.00', 2),
('160522234328', 4, '600.00', 4),
('160522234328', 5, '700.00', 2),
('160522234328', 6, '1200.00', 1),
('160523121005', 2, '1200.00', 1),
('160523121005', 3, '350.00', 1),
('160523123653', 2, '1200.00', 2),
('160523183004', 3, '350.00', 1),
('160523203451', 2, '1200.00', 1),
('160523203451', 3, '350.00', 2),
('160524213134', 3, '350.00', 1),
('160524213134', 4, '600.00', 2),
('160524222935', 4, '600.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `phoneNum` varchar(15) NOT NULL,
  `streetAddress` varchar(50) NOT NULL,
  `suburb` varchar(20) NOT NULL,
  `town` varchar(20) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deliveryDate` varchar(20) NOT NULL,
  `collectionDate` varchar(20) NOT NULL,
  `orderTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userID`, `customerName`, `phoneNum`, `streetAddress`, `suburb`, `town`, `orderDate`, `deliveryDate`, `collectionDate`, `orderTotal`) VALUES
('160522225522', 2, 'Nathi', '', '90', 'Soweto', 'Jhb', '2016-05-22 22:56:44', '2016-05-02 00:00:00', '2016-05-14 00:00:00', 2500),
('160522234328', 2, 'New', '', '99', 'Saudi', 'GP', '2016-05-22 23:44:47', '2016-06-01 00:00:00', '2016-07-31 00:00:00', 6900),
('160523121005', 2, 'Nathi Testing with Spaces', '', '1 Space Road', 'Orlando west', 'Soweto central', '2016-05-23 12:11:01', '2016-05-23 00:00:00', '2016-05-29 00:00:00', 1550),
('160523123653', 2, 'Nathi Testing phone num', '23554252525', '1 Phone number', 'Test', 'Nothing', '2016-05-23 12:37:52', '2017-03-01 00:00:00', '2017-05-31 00:00:00', 2400),
('160523183004', 2, 'Nathi Mac test', '27837338975', '9792B Carr street', 'Orlando west 2', 'Soweto', '2016-05-23 18:30:49', '2016-05-19 00:00:00', '2016-05-28 00:00:00', 350),
('160523203451', 9, 'Ntiyiselo Ngobeni', '245224534', '9792B Carr street', 'Orlando west 2', 'Soweto', '2016-05-23 20:35:47', '2016-05-28 00:00:00', '2016-06-04 00:00:00', 1900),
('160524213134', 12, 'SOmeone', '234522345', '43 Address', 'test', '', '2016-05-24 21:37:28', '2016-05-04 00:00:00', '2016-05-28 00:00:00', 1550),
('160524222935', 12, 'Aother tester', '54245243', 'Adressete', '0 Lando', 'West', '2016-05-24 22:30:46', '2016-06-04 00:00:00', '2016-10-03 00:00:00', 600);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` text,
  `productPrice` decimal(10,2) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prodCategory` varchar(25) DEFAULT NULL,
  `totalStock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDescription`, `productPrice`, `dateAdded`, `prodCategory`, `totalStock`) VALUES
(1, 'Red Regular striped tent', 'Red and white striped tent, size 4mx6m ', '3100.00', '2016-04-19 22:28:55', 'Tents', NULL),
(2, '6x9', 'Blue and white strippe tent, size 6mx9m', '1200.00', '2016-04-19 22:28:55', 'Tents', 7),
(3, 'White Regular striped tent', 'Plain white tent, size 4mx6m', '350.00', '2016-04-19 22:50:03', 'Tents', 8),
(4, 'Blue Medium striped tent', 'Blue and white strippe tent, size 5mx7m', '600.00', '2016-04-19 22:50:03', 'Tents', NULL),
(5, 'White', 'Plain white tent, size 5mx7m', '700.00', '2016-04-19 22:50:03', 'Tents', 6),
(6, '6x9 white tent', 'Blue and white strippe tent, size 6mx9m', '1200.00', '2016-04-19 22:50:03', 'Tents', NULL),
(7, 'Rectangular table', '8 seating table', '30.00', '2016-04-19 22:50:03', 'Tables', NULL),
(8, 'Square', '4 seating table', '20.00', '2016-04-19 22:50:03', 'Tables', 989),
(9, 'Round table', '8 seating round tables', '40.00', '2016-04-19 22:50:03', 'Tables', NULL),
(10, 'Coloured childrens tables', 'Minature square tables for toddlers', '25.00', '2016-04-19 22:50:03', 'Tables', NULL),
(11, 'Childrens stackeble chairs', 'Minature chairs for todlers', '5.00', '2016-04-19 22:50:03', 'Chairs', NULL),
(12, 'Stackable chairs', 'White stackable chairs', '5.00', '2016-04-19 22:50:03', 'Chairs', 200),
(13, 'Stackable chairs', 'Red', '5.00', '2016-05-23 09:58:58', 'Chairs', 200),
(14, 'Stackable chairs', 'Black stackable chairs', '5.00', '2016-05-23 18:32:15', 'Chairs', 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userType` varchar(25) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `streetAddress` varchar(30) DEFAULT NULL,
  `suburb` varchar(30) DEFAULT NULL,
  `town` varchar(30) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userType`, `firstName`, `lastName`, `email`, `streetAddress`, `suburb`, `town`, `phone`, `password`) VALUES
(2, 'Admin', 'Mister', 'Ngobeni', 'ngobenifunctions@gmail.com', '92B Gayi Street', 'Orlando west', 'Soweto', 345678, 'Password1'),
(9, 'User', 'Ntiyiselo', 'Ngobeni', 'Ntiyiza@gmail.com', '9792B Carr street', 'Orlando west', 'Soweto', 2147483647, 'Password1'),
(11, 'User', 'Nkosinathi', 'Ngobeni', 'nathi@gmail.com', '202 Mzoni', 'Orlando', 'Soweto', 2147483647, 'Password1'),
(12, 'User', 'Testing ', 'User', 'user@me.com', '23 jhklh', 'sdfsdfgs', 'sdfgs', 2432435, 'Pasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `orderitems_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
