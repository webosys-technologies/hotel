-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 03:58 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `admin_username` varchar(45) DEFAULT NULL,
  `admin_pass` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `admin_username`, `admin_pass`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `available_room`
--

CREATE TABLE `available_room` (
  `room_id` int(20) NOT NULL,
  `hotel_id` int(20) NOT NULL,
  `total_room` int(20) NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_room`
--

INSERT INTO `available_room` (`room_id`, `hotel_id`, `total_room`, `create_user`, `create_time`) VALUES
(28, 54, 79, 'admin', '2017-12-16 16:03:40'),
(29, 55, 90, 'admin', '2017-12-16 16:03:40'),
(54, 108, 27, 'admin', '2018-02-18 07:42:14'),
(55, 109, 2, 'admin', '2018-02-18 07:46:01'),
(57, 118, 12, '44', '2018-02-18 08:03:47'),
(58, 119, 23, '44', '2018-02-25 03:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_details`
--

CREATE TABLE `hotel_details` (
  `hotel_id` int(20) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hotel_pic` varchar(100) NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hotel_details` varchar(200) NOT NULL,
  `isverified` varchar(45) NOT NULL,
  `hotel_price` bigint(100) NOT NULL,
  `availabel_room` int(20) NOT NULL,
  `temple_distance` text,
  `hotel_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_details`
--

INSERT INTO `hotel_details` (`hotel_id`, `hotel_name`, `hotel_pic`, `create_user`, `add_time`, `hotel_details`, `isverified`, `hotel_price`, `availabel_room`, `temple_distance`, `hotel_address`) VALUES
(54, 'taj mahraj', 'download_(1)__17122017_065340__.jpg', 'admin', '2017-12-16 16:03:40', 'nice hotel bhj', '0', 780000, 79, '33 km', ''),
(55, 'taj mahraj', 'download_(2)__17122017_074057__.jpg', 'admin', '2017-12-16 16:03:40', 'nice hotel ', '', 9000000000, 90, NULL, ''),
(56, 'ram', 'download_(1)__17122017_083539__.jpg', '44', '2017-12-17 02:05:39', 'gd', '0', 10000, 50, NULL, ''),
(57, 'Taj HOtel', 'sidebar_04__18122017_143852__.png', '44', '2017-12-18 07:56:43', 'ssds', '0', 0, 120, NULL, ''),
(108, 'ankush  pg', '20708083_1661606723906123_8356002589027039837_n__18022018_084435__.png', 'admin', '2018-02-18 07:42:14', 'lucknow', '0', 170000, 27, '10km', ''),
(109, 'dbxd', '20708083_1661606723906123_8356002589027039837_n__18022018_084601__.png', 'admin', '2018-02-18 07:46:01', 'bv b', '0', 3, 2, '32', ''),
(118, 'mydream', '20708083_1661606723906123_8356002589027039837_n__18022018_090347__.png', '44', '2018-02-18 08:03:47', 'lucknow', '0', 122222, 12, '12', ''),
(119, 'maharakjakjaka', 'WIN_20180117_04_27_21_Pro__25022018_040746__.jpg', '44', '2018-02-25 03:07:46', 'jdsjhfksuedshkj', '0', 2111111, 23, '12', 'lko');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `hotel_room_id` int(20) NOT NULL,
  `hotel_id` int(20) NOT NULL,
  `bed_type` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `room_type` int(2) NOT NULL,
  `room_no` varchar(11) NOT NULL,
  `room_avalivality` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hotel_room_id`, `hotel_id`, `bed_type`, `price`, `room_type`, `room_no`, `room_avalivality`) VALUES
(91, 108, 1, 100, 1, '1', 2),
(92, 108, 4, 400, 2, '4', 1),
(93, 108, 2, 200, 2, '2', 2),
(94, 108, 3, 300, 1, '3', 1),
(95, 109, 1, 0, 1, '', 1),
(106, 118, 1, 100, 1, '1', 1),
(107, 118, 2, 200, 2, '2', 2),
(108, 119, 1, 1, 1, '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderid` varchar(45) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_address` varchar(45) DEFAULT NULL,
  `customer_mobile` varchar(45) NOT NULL,
  `city` varchar(45) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `amount_pay` float NOT NULL,
  `created_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_id` varchar(45) DEFAULT NULL,
  `checkin` varchar(45) DEFAULT NULL,
  `checkout` varchar(45) DEFAULT NULL,
  `bed_type` int(11) DEFAULT NULL,
  `no_of_room` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `avl_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `customer_name`, `customer_email`, `customer_address`, `customer_mobile`, `city`, `pincode`, `amount_pay`, `created_At`, `transaction_id`, `checkin`, `checkout`, `bed_type`, `no_of_room`, `hotel_id`, `avl_room`) VALUES
(12, 'XRqEJ', 'anshulika verma', 'anshulika.v21@gmail.com', '', '7289059869', 'Delhi', '', 2700000000, '2018-03-02 01:35:30', 'pay_9hu92HOtHwMk9X', '2018-03-28', '2018-03-27', 3, 3, 55, 87);

-- --------------------------------------------------------

--
-- Table structure for table `total_price`
--

CREATE TABLE `total_price` (
  `price_id` int(20) NOT NULL,
  `hotel_id` int(20) NOT NULL,
  `hotel_price` bigint(100) NOT NULL,
  `create_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_price`
--

INSERT INTO `total_price` (`price_id`, `hotel_id`, `hotel_price`, `create_user`) VALUES
(5, 54, 780000, 'admin'),
(6, 55, 9000000000, 'admin'),
(9, 56, 10000, '44'),
(10, 57, 0, '44'),
(13, 108, 170000, 'admin'),
(14, 109, 3, 'admin'),
(20, 118, 122222, '44'),
(21, 119, 2111111, '44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `isverified` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `dob`, `country`, `state`, `city`, `isverified`) VALUES
(44, 'anshulika', 'verma', '7289059869', 'anshulika.v21@gmail.com', '123', '12/06/2017', 'India', 'Delhi', 'Delhi', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `available_room`
--
ALTER TABLE `available_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `hotel_details`
--
ALTER TABLE `hotel_details`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD PRIMARY KEY (`hotel_room_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_price`
--
ALTER TABLE `total_price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `available_room`
--
ALTER TABLE `available_room`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `hotel_details`
--
ALTER TABLE `hotel_details`
  MODIFY `hotel_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `hotel_room`
--
ALTER TABLE `hotel_room`
  MODIFY `hotel_room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `total_price`
--
ALTER TABLE `total_price`
  MODIFY `price_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
