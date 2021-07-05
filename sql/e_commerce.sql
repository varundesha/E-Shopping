-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 03:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `viewcat` ()  NO SQL
select * from category$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `Card_No` bigint(20) NOT NULL,
  `CVV` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`Card_No`, `CVV`) VALUES
(1111111111111111, 111),
(2222222222222222, 222),
(3333333333333333, 333),
(4444444444444444, 444);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `Ca_Id` int(10) NOT NULL,
  `Ca_Name` varchar(50) NOT NULL,
  `Ca_Price` double(9,2) NOT NULL,
  `Image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Ca_Id` int(11) NOT NULL,
  `Ca_Name` varchar(50) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `Ca_Details` varchar(200) NOT NULL,
  `Ca_Price` double(9,2) DEFAULT NULL,
  `Image` varchar(355) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Ca_Id`, `Ca_Name`, `code`, `Ca_Details`, `Ca_Price`, `Image`) VALUES
(1, 'Watch', 'a', 'Samsung Galaxy Watch Active 2 (Bluetooth, 44 mm) - Black, Aluminium Dial, Silicon Straps', 19000.00, 'Images/61uej9efKYL._SL1500_.jpg'),
(2, 'Watch', 'b', 'Apple Watch Series 3 (GPS, 38mm) - Space Grey Aluminium Case with Black Sport Band', 20900.00, 'Images/71EoGntO5bL._SL1500_.jpg'),
(3, 'Tab', 'c', 'Samsung Galaxy Tab S3 24.58 cm (9.7 inch) Tablet 4 GB RAM, 32 GB, Black SM-T825NZKAINS\r\n', 38990.00, 'Images/71FSRXaNZaL._SX466_.jpg'),
(4, 'Earbuds', 'd', 'Samsung True Wireless Bluetooth Galaxy Buds, Black', 9990.00, 'Images/71nrZHQMZ7L._SL1500_.jpg'),
(5, 'Earbuds', 'e', 'Apple AirPods Pro', 20999.00, 'Images/71zny7BTRlL._SL1500_.jpg'),
(6, 'Laptop', 'f', 'Lenovo IdeaPad S340 10th Gen Intel Core i3 14 inch Full HD IPS Thin and Light Laptop', 42490.00, 'Images/81KPX1bxKrL._SL1500_.jpg'),
(7, 'Mobile Phone', 'g', 'Apple iPhone Xs Max (64GB) - Black', 99315.00, 'Images/apple-iphone-x-new-1.jpg'),
(8, 'Laptop', 'h', 'Apple MacBook Air (13-inch, 8GB RAM, 128GB Storage, 1.8GHz Intel Core i5) - Silver', 67990.00, 'Images/images.jpg'),
(9, 'Tab', 'i', 'Apple iPad Air (10.5-inch, Wi-Fi, 64GB) - Space Grey (3rd Generation)', 40900.00, 'Images/ipad.jpg'),
(10, 'Gaming', 'j', 'Play Station-5', 50000.00, 'Images/ps5.jpg'),
(11, 'Mobile Phone', 'k', 'Samsung Galaxy Note10 Lite (Aura Glow, 8GB RAM, 128GB Storage)', 39680.00, 'Images/samsung-galaxy-note-8-7754.jpg'),
(12, 'Gaming', 'l', 'XBOX Series-X', 50000.00, 'Images/xbox.jpg'),
(13, 'Mobile Phone', 'm', 'Google Pixel 5 5G 128GB - Just Black', 75000.00, 'Images/pixel.jpg'),
(14, 'Mobile Phone', 'n', 'OnePlus Nord 5G (Gray Onyx, 8GB RAM, 128GB Storage)', 25000.00, 'Images/oneplus.jpeg'),
(15, 'Gaming', 'o', 'Sony PS4 1TB Slim Console with Additional Dualshock Controller (Black)', 25000.00, 'Images/ps4.jpg'),
(16, 'Gaming', 'p', 'Xbox One S Special Edition(1TB)', 20000.00, 'Images/xboxone.jpg'),
(17, 'Watch', 'q', 'Fitbit Versa 3 Health & Fitness Smartwatch', 27000.00, 'Images/fitbit.jpg'),
(18, 'Watch', 'r', 'Fossil Gen 5 Carlyle Touchscreen Men\'s Smartwatch', 22000.00, 'Images/fossil.jpg'),
(19, 'Tab', 's', 'Samsung Galaxy Tab A7 (10.4 inch, RAM 3 GB, ROM 32 GB, Wi-Fi-only), Grey', 17000.00, 'Images/taba7.jpg'),
(20, 'Tab', 't', 'Apple iPad Mini (Wi-Fi + Cellular, 64GB) - Gold', 40000.00, 'Images/mini.jpg'),
(21, 'Laptop', 'u', 'DELL Inspiron 3583 15.6inch HD Laptop (Pentium Gold 5405U/4GB/1TB HDD)', 30000.00, 'Images/dell.jpg'),
(22, 'Laptop', 'v', 'HP 14 Ultra Thin & Light 14-inch Laptop (10th Gen i3-1005G1/8GB/256GB SSD)', 35000.00, 'Images/hp.jpg'),
(23, 'Earbuds', 'w', 'Sony WF-1000XM3 Truly Wireless Bluetooth Earbuds', 15000.00, 'Images/sony.jpg'),
(24, 'Earbuds', 'x', 'Powerbeats Pro - Totally Wireless Earphones - Black', 22000.00, 'Images/beats.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `F_Name` varchar(15) DEFAULT NULL,
  `L_Name` varchar(15) DEFAULT NULL,
  `C_Email` varchar(30) NOT NULL,
  `C_Password` varchar(20) DEFAULT NULL,
  `C_Phone` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`F_Name`, `L_Name`, `C_Email`, `C_Password`, `C_Phone`) VALUES
('vinayaka', 'adiga', 'adiga@gmail.com', 'vina', 3456789012),
('nischal', 'n', 'nischal@gmail.com', 'nischal', 987654321),
('preethan', 'jain', 'preethan@gmail.com', 'jain', 8765432109),
('efg', 'tyu', 'tyu@gmail.com', 'qwer', 123456789),
('ullas', 's', 'ullas@gmail.com', 'ullas', 987654321),
('vikas', 's', 'vikas@gmail.com', 'vikas', 5678901234);

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `cusdetails` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO details (F_Name,L_Name,C_Email,C_Password,C_Phone,DateTimes)  VALUES(new.F_Name,new.L_Name,new.C_Email,new.C_Password,new.C_Phone,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cvv`
--

CREATE TABLE `cvv` (
  `CVV` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvv`
--

INSERT INTO `cvv` (`CVV`) VALUES
(111),
(222),
(333),
(444);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `D_Id` int(11) NOT NULL,
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `C_Email` varchar(30) NOT NULL,
  `C_Password` varchar(30) NOT NULL,
  `C_Phone` bigint(15) NOT NULL,
  `DateTimes` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`D_Id`, `F_Name`, `L_Name`, `C_Email`, `C_Password`, `C_Phone`, `DateTimes`) VALUES
(12, 'ullas', 's', 'ullas@gmail.com', 'ullas', 987654321, '2020-12-19 00:41:59'),
(13, 'vinayaka', 'adiga', 'adiga@gmail.com', 'vina', 3456789012, '2020-12-19 01:00:27'),
(14, 'vikas', 's', 'vikas@gmail.com', 'vikas', 5678901234, '2020-12-19 01:02:36'),
(15, 'preethan', 'jain', 'preethan@gmail.com', 'jain', 8765432109, '2020-12-19 01:33:20'),
(16, 'nischal', 'n', 'nischal@gmail.com', 'nischal', 987654321, '2020-12-20 18:20:09'),
(19, 'efg', 'tyu', 'tyu@gmail.com', 'qwer', 123456789, '2020-12-24 19:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `O_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `C_Email` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Card_Name` varchar(30) NOT NULL,
  `Card_No` bigint(20) NOT NULL,
  `Exp_Date` varchar(10) NOT NULL,
  `CVV` int(5) NOT NULL,
  `Phone` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`O_Id`, `Name`, `C_Email`, `Address`, `Card_Name`, `Card_No`, `Exp_Date`, `CVV`, `Phone`) VALUES
(36, 'gfbrdfcedfcsc', 'tyu@gmail.com', 'fcrgfv', 'ajdsd', 1111111111111111, '10/21', 111, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_Id` int(11) NOT NULL,
  `P_Name` varchar(20) DEFAULT NULL,
  `Ca_Id` int(11) DEFAULT NULL,
  `S_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `S_Id` int(11) NOT NULL,
  `S_Password` varchar(20) NOT NULL,
  `S_Name` varchar(20) DEFAULT NULL,
  `S_Phone` bigint(15) DEFAULT NULL,
  `S_Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`S_Id`, `S_Password`, `S_Name`, `S_Phone`, `S_Address`) VALUES
(1020, 'gadgethub', 'Ramesh Gowda', 9812568432, '#76,10th A Cross, 5th Main Road, Vijayanagar, Bangalore-560040');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`Card_No`),
  ADD KEY `CVV` (`CVV`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `Ca_Id` (`Ca_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Ca_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_Email`);

--
-- Indexes for table `cvv`
--
ALTER TABLE `cvv`
  ADD PRIMARY KEY (`CVV`) USING BTREE;

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`D_Id`),
  ADD KEY `C_Email` (`C_Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_Id`),
  ADD KEY `C_Email` (`C_Email`),
  ADD KEY `CVV` (`CVV`),
  ADD KEY `Card_No` (`Card_No`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_Id`),
  ADD KEY `Ca_Id` (`Ca_Id`),
  ADD KEY `S_Id` (`S_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`S_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `D_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `O_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`CVV`) REFERENCES `cvv` (`CVV`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Ca_Id`) REFERENCES `category` (`Ca_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`C_Email`) REFERENCES `customer` (`C_Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`CVV`) REFERENCES `cvv` (`CVV`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Card_No`) REFERENCES `card` (`Card_No`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Ca_Id`) REFERENCES `category` (`Ca_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`S_Id`) REFERENCES `supplier` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`S_Id`) REFERENCES `supplier` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
