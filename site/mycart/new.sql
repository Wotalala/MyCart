-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 09:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `couponcode` varchar(255) NOT NULL,
  `discount` float NOT NULL,
  `ispercent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponcode`, `discount`, `ispercent`) VALUES
(1, 'GO2018', 0.1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`item_id`, `order_id`, `order_name`, `order_qty`, `order_price`, `total`) VALUES
(1, 1, 'Hotdog', 3, 49, 147);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bev`
--

CREATE TABLE `tbl_bev` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `order_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bev`
--

INSERT INTO `tbl_bev` (`id`, `name`, `image`, `price`, `order_type`) VALUES
(21, 'Coke', 'coke.jpg', 40, 'Beverages'),
(22, 'Sprite', 'sprite.jpg', 40, 'Beverages'),
(23, 'Tea', 'tea.jpg', 30, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_combo`
--

CREATE TABLE `tbl_combo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `order_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_combo`
--

INSERT INTO `tbl_combo` (`id`, `name`, `image`, `price`, `order_type`) VALUES
(31, 'Chicken Combo Meal', 'cmb.jpg', 79, 'Combo Meals'),
(32, 'Pork Combo Meal', 'pork.jpg', 89, 'Combo Meals'),
(33, 'Fish Combo Meal', 'fish.png', 85, 'Combo Meals');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `order_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `image`, `price`, `order_type`) VALUES
(1, 'Hotdog', 'hotdog.jpg', 49, 'Burgers'),
(2, 'Cheeseburger', 'burgers.jpg', 65, 'Burgers'),
(3, 'Fries', 'fries.jpg', 40, 'Burgers');

-- --------------------------------------------------------

--
-- Table structure for table `totalorder`
--

CREATE TABLE `totalorder` (
  `order_id` int(11) NOT NULL,
  `vatsales` float NOT NULL,
  `vat` float NOT NULL,
  `subtotal` float NOT NULL,
  `discount` float NOT NULL,
  `amountdue` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalorder`
--

INSERT INTO `totalorder` (`order_id`, `vatsales`, `vat`, `subtotal`, `discount`, `amountdue`) VALUES
(699, 560.56, 76.44, 637, 0, 637);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_bev`
--
ALTER TABLE `tbl_bev`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_combo`
--
ALTER TABLE `tbl_combo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totalorder`
--
ALTER TABLE `totalorder`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bev`
--
ALTER TABLE `tbl_bev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_combo`
--
ALTER TABLE `tbl_combo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
