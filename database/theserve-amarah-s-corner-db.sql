-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 11:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theserve-amarah-s-corner-db`
--
CREATE DATABASE IF NOT EXISTS `theserve-amarah-s-corner-db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `theserve-amarah-s-corner-db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'jovy', 'jovelyn.ocampo@cvsu.edu.ph', 'jovyyy');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `categoty_thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `categoty_thumbnail`) VALUES
(1, 'Pizza', '628d243bf079e.png'),
(2, 'Chicken Wings', '628655e6eb31f-wings.png'),
(3, 'Pasta ', '628d24768fdc2.png'),
(4, 'Cheesy Snacks', '628656d4224d5-cheesy.png'),
(5, 'Milk Tea', '62865c1cde79d-milktea.png'),
(6, 'Fruit Tea', '62865c8836ff7-fruit.png'),
(7, 'Lemonade', '62865e009307e-lemonade.png'),
(8, 'Cheesecake Series', '62865e4831149-cheesecake.png'),
(9, 'Milk Shake', '62865e78e81fe-milkshake.png'),
(10, 'Coffee', '62865e94d281a-hotCoffee.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'KayeB', 'kaye.billones@cvsu.edu.ph', 'kayeeeb'),
(2, 'untamed', 'untamedandromeda@gmail.com', 'untamed_jenn'),
(3, 'markyyy', 'markryan.jancorda@cvsu.edu.ph', 'markyyyboy');

-- --------------------------------------------------------

--
-- Table structure for table `default_product_variation`
--

CREATE TABLE `default_product_variation` (
  `default_variation_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_variation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `product_img1` varchar(255) DEFAULT NULL,
  `product_img2` varchar(255) DEFAULT NULL,
  `product_img3` varchar(255) DEFAULT NULL,
  `product_keyword` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_sale` varchar(255) DEFAULT NULL,
  `product_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`category_id`, `subcategory_id`, `product_id`, `product_title`, `product_slug`, `product_img1`, `product_img2`, `product_img3`, `product_keyword`, `product_price`, `product_sale`, `product_status`) VALUES
(1, 2, 7, 'Ham & Cheese', 'ham-cheese', '6292ebfd901ff.jpg', NULL, NULL, 'Ham & Cheese', '129.00', '', NULL),
(4, 0, 8, 'Cheesy Fries', 'cheesy-fries', '62937e2f83136.jpg', NULL, NULL, 'Cheesy Fries', '130.00', '', NULL),
(4, 0, 9, 'Cheesy Nachos', 'cheesy-nachos', '6293811ba42ed.jpg', NULL, NULL, 'Cheesy Nachos', '130.00', '', NULL),
(3, 0, 10, 'Saucy Spaghetti', 'saucy-spaghetti', '6293867d16ba1.jpg', NULL, NULL, 'Saucy Spaghetti', '119.00', '', NULL),
(3, 0, 11, 'Creamy Carbonara', 'creamy-carbonara', '6293870491837.jpg', NULL, NULL, 'Creamy Carbonara', '119.00', '', NULL),
(10, 4, 12, 'Espresso', 'espresso', '62941c17a648d.jpg', NULL, NULL, 'espresso', '145.00', '', NULL),
(5, 7, 13, 'Classic Milktea', 'classic-milktea', '6294534c7dff1.jpg', NULL, NULL, 'Classic Milktea', '90.00', '', NULL),
(5, 7, 14, 'Taro Milktea', 'taro-milktea', '629453b16d9a7.jpg', NULL, NULL, 'Taro Milktea', '90.00', '', NULL),
(5, 7, 15, 'Vanilla Milktea', 'vanilla-milktea', '629454397c7e9.jpg', NULL, NULL, 'Vanilla Milktea', '90.00', '', NULL),
(5, 7, 16, 'Okinawa Milktea', 'okinawa-milktea', '629454d6aacd9.jpg', NULL, NULL, 'Okinawa Milktea', '100.00', '', NULL),
(5, 7, 17, 'Wintermelon Milktea', 'wintermelon-milktea', '6294553abc77b.jpg', NULL, NULL, 'Wintermelon Milktea', '90.00', '', NULL),
(5, 7, 18, 'Dark Chocolate Milktea', 'dark-chocolate-milktea', '62945599ad0d0.jpg', NULL, NULL, 'Dark Chocolate Milktea', '95.00', '', NULL),
(5, 7, 19, 'Cookies & Cream Milktea', 'cookies-cream-milktea', '629462738203e.jpg', NULL, NULL, 'Cookies & Cream Milktea', '100.00', '', NULL),
(5, 7, 20, 'Double Dutch Milktea', 'double-dutch-milktea', '629462beee633.jpg', NULL, NULL, 'Double Dutch Milktea', '95.00', '', NULL),
(5, 8, 21, 'Red Velvet Cheesecake Milktea', 'red-velvet-cheesecake-milktea', '629462f7e59aa.jpg', NULL, NULL, 'Red Velvet Cheesecake Milktea', '125.00', '', NULL),
(5, 8, 22, 'Overload Oreo Cheesecake Milktea', 'overload-oreo-cheesecake-milktea', '62946330a7e62.jpg', NULL, NULL, 'Overload Oreo Cheesecake Milktea', '125.00', '', NULL),
(1, 2, 23, 'Dgdsg', 'dgdsg', '629464c0649ed.jpg', NULL, NULL, 'dgdsg', '123.00', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `variant_id` int(11) DEFAULT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant`
--

CREATE TABLE `product_variant` (
  `variant_id` int(11) NOT NULL,
  `variant_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_variant`
--

INSERT INTO `product_variant` (`variant_id`, `variant_title`) VALUES
(1, 'SIZE'),
(2, 'FLAVOR');

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `product_id` int(11) DEFAULT NULL,
  `product_variation_id` int(11) NOT NULL,
  `product_variation_code` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_sale` decimal(10,2) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `product_variation_status` varchar(255) DEFAULT NULL,
  `default_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subcategory_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`category_id`, `subcategory_id`, `subcategory_title`) VALUES
(1, 2, 'Classic Flavor'),
(1, 3, 'Special Flavor'),
(10, 4, 'Hot Coffee'),
(10, 5, 'Cold Coffee'),
(10, 6, 'Frappe'),
(5, 7, 'Classic Series'),
(5, 8, 'Special Series');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `default_product_variation`
--
ALTER TABLE `default_product_variation`
  ADD PRIMARY KEY (`default_variation_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`product_variation_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `default_product_variation`
--
ALTER TABLE `default_product_variation`
  MODIFY `default_variation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `product_variation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
