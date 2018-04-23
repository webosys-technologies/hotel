-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 10:38 PM
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
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `left_room` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `hotel_description` varchar(200) NOT NULL,
  `isverified` varchar(45) NOT NULL,
  `hotel_price` bigint(100) NOT NULL,
  `availabel_room` int(20) NOT NULL,
  `temple_distance` text,
  `hotel_address` varchar(250) NOT NULL,
  `left_hotel` int(20) NOT NULL DEFAULT '0',
  `city` varchar(11) NOT NULL,
  `pincode` int(6) NOT NULL,
  `state` varchar(11) NOT NULL,
  `country` varchar(11) NOT NULL,
  `website` varchar(11) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `telephone_no` varchar(11) NOT NULL,
  `fax_no` int(11) NOT NULL,
  `checkin_checkout_time` varchar(20) NOT NULL,
  `star` int(2) NOT NULL,
  `near_airport` varchar(20) NOT NULL,
  `near_railway_st` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `owner_mobile_no` int(11) NOT NULL,
  `owner_telephone` int(11) NOT NULL,
  `owner_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_details`
--

INSERT INTO `hotel_details` (`hotel_id`, `hotel_name`, `hotel_pic`, `create_user`, `add_time`, `hotel_description`, `isverified`, `hotel_price`, `availabel_room`, `temple_distance`, `hotel_address`, `left_hotel`, `city`, `pincode`, `state`, `country`, `website`, `mobile_no`, `telephone_no`, `fax_no`, `checkin_checkout_time`, `star`, `near_airport`, `near_railway_st`, `owner_name`, `owner_mobile_no`, `owner_telephone`, `owner_email`) VALUES
(1, 'Taj hotel', 'download_(1)__21032018_203517__.jpg', 'admin', '2018-03-21 19:35:17', 'Delhi', '1', 0, 0, NULL, 'delhi', -2, 'Delhi', 226022, 'Delhi', 'india', 'www.cloth.c', 2147483647, '07289059869', 11111, '12:00/11:00', 2, 'dwaraka', 'dwaraka', 'anshulika verma', 2147483647, 2147483647, 'anshulika.v21@gmail.'),
(2, 'maharaja', '26993633_1609052402523305_346543771798037187_n__21032018_222235__.jpg', '44', '2018-03-21 21:22:35', 'jkhncjgngkdfjgdfkljgdd', '0', 0, 0, NULL, 'lucknow', -2, 'Lucknow ', 220022, 'up', 'India', 'www.saloon.', 2147483647, '07289059869', 25454, '12:00/11:00', 1, 'chaudhari charan sin', 'charbagh', 'anshulika verma', 2147483647, 98989, 'anbdsu@gmail.com'),
(3, 'nirula', '27541141_1622077771220768_3886641605238944597_n__22032018_192246__.jpg', 'admin', '2018-03-22 18:22:46', 'hjbgujrhbhb ', '0', 0, 0, NULL, 'delhi', 0, 'delhi', 110011, 'Delhi', 'india', 'ww.hahiyary', 2147483647, '07289059869', 132321, '12:00/11:00', 1, 'njkdvhskf', 'jhgjsb', 'jhnms', 2147483647, 2147483647, 'anbdsu@gmail.com'),
(4, 'manson', '27972885_967283860090731_7036037649422899372_n__22032018_194116__.jpg', 'admin', '2018-03-22 18:41:16', 'kkcuhndjfdk', '0', 0, 0, NULL, 'delhi', 0, 'delhi', 12222, 'delhi', 'india', 'www.saloon.', 2147483647, '989', 86868, '12:00/11:00', 1, 'dwarkajfhskjmn', 'dmfhjfdsbhn', 'kuhcykjn', 0, 2147483647, 'anbdsu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `hotel_room_id` int(20) NOT NULL,
  `hotel_id` int(20) NOT NULL,
  `bed_type` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ac_non_room` int(2) NOT NULL,
  `room_no` varchar(11) NOT NULL,
  `room_avalivality` int(2) NOT NULL,
  `room_pic` varchar(200) NOT NULL,
  `isverified` int(4) NOT NULL,
  `person_allowed` int(10) NOT NULL,
  `booking_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hotel_room_id`, `hotel_id`, `bed_type`, `price`, `ac_non_room`, `room_no`, `room_avalivality`, `room_pic`, `isverified`, `person_allowed`, `booking_status`) VALUES
(1, 1, 1, 100, 1, '100', 0, '', 0, 30, 0),
(2, 1, 1, 102, 1, '102', 0, '', 0, 2, 0),
(3, 1, 1, 101, 1, '101', 0, '', 0, 2, 0),
(55, 2, 1, 1928, 1, '222398', 0, '', 0, 989, 0),
(56, 3, 3, 23489829, 2, '893942', 0, '', 0, 2, 0),
(60, 4, 3, 1000, 2, '122', 0, '', 0, 1212, 0),
(61, 4, 2, 100, 1, '989', 0, '', 0, 1212, 0);

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
  `avl_room` int(11) NOT NULL,
  `status` int(20) NOT NULL,
  `total_room` int(20) NOT NULL,
  `room_nos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `customer_name`, `customer_email`, `customer_address`, `customer_mobile`, `city`, `pincode`, `amount_pay`, `created_At`, `transaction_id`, `checkin`, `checkout`, `bed_type`, `no_of_room`, `hotel_id`, `avl_room`, `status`, `total_room`, `room_nos`) VALUES
(1, 'iRqzw', 'anshulika verma', 'anshulika.v21@gmail.com', '', '7289059869', 'Delhi', '', 200, '2018-03-21 20:00:36', 'pay_9pj7fIPXtrl4t0', '2018-03-01', '2018-03-09', 1, 2, 1, -2, 1, 0, '1,2'),
(2, 'f0g5i', 'anshulika verma', 'anshulika.v21@gmail.com', '', '7289059869', 'Delhi', '', 200, '2018-03-21 22:02:10', 'pay_9plC4M4HQjE1jz', '2018-03-01', '2018-03-10', 1, 2, 2, -2, 1, 0, '4,5');

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
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_details`
--
ALTER TABLE `hotel_details`
  MODIFY `hotel_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hotel_room`
--
ALTER TABLE `hotel_room`
  MODIFY `hotel_room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `total_price`
--
ALTER TABLE `total_price`
  MODIFY `price_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
