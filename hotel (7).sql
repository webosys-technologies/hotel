-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 04:33 AM
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

--
-- Dumping data for table `available_room`
--

INSERT INTO `available_room` (`room_id`, `hotel_id`, `total_room`, `create_user`, `create_time`, `left_room`) VALUES
(60, 121, 100, 'admin', '2018-03-02 03:49:16', 0),
(61, 122, 200, 'admin', '2018-03-02 03:52:38', 0),
(62, 123, 100, 'admin', '2018-03-02 03:53:34', 0);

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
(121, 'hotel taj', 'download_(3)__02032018_045357__.jpg', 'admin', '2018-03-02 03:49:16', 'Gomtinagar,lucknow', '0', 1200000, 100, '12km', 'Gomtinagar,lucknow'),
(122, 'obra', 'download_(1)__02032018_045238__.jpg', 'admin', '2018-03-02 03:52:38', 'delhi', '0', 20000, 200, '20km', 'delhi'),
(123, 'mahraja', 'download_(2)__02032018_045334__.jpg', 'admin', '2018-03-02 03:53:34', 'Delhi', '0', 100000, 100, '10km', 'delhi');

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
(111, 122, 1, 1000, 1, '100', 1),
(112, 123, 2, 2000, 1, '101', 1),
(113, 121, 1, 120, 1, '120', 2);

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
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `customer_name`, `customer_email`, `customer_address`, `customer_mobile`, `city`, `pincode`, `amount_pay`, `created_At`, `transaction_id`, `checkin`, `checkout`, `bed_type`, `no_of_room`, `hotel_id`, `avl_room`, `status`) VALUES
(15, 'IALqH', 'anshulika verma', 'anshulika.v21@gmail.com', '', '7289059869', 'Delhi', '', 30000, '2018-03-02 04:10:54', 'pay_9hwnC2E6ytLqME', '2018-03-21', '2018-03-24', 1, 2, 123, 98, 1),
(18, 'Hsu10', 'anshulika verma', 'anshulika.v21@gmail.com', '', '7289059869', 'Delhi', '', 360000, '2018-03-06 21:11:08', 'pay_9joJODgXR4OrAv', '2018-03-14', '2018-03-15', 1, 12, 121, 88, 1);

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
(23, 121, 1200000, 'admin'),
(24, 122, 20000, 'admin'),
(25, 123, 100000, 'admin');

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
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `hotel_details`
--
ALTER TABLE `hotel_details`
  MODIFY `hotel_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `hotel_room`
--
ALTER TABLE `hotel_room`
  MODIFY `hotel_room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `total_price`
--
ALTER TABLE `total_price`
  MODIFY `price_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
