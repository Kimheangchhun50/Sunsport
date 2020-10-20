-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 08:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunsport`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `billing_number` int(11) NOT NULL,
  `price` double NOT NULL,
  `water` double DEFAULT NULL,
  `extra` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `booking_id`, `billing_number`, `price`, `water`, `extra`, `remark`, `user_id`, `date_created`) VALUES
(1, 27, 1, 5, 5, 10, NULL, 1, '2020-10-21 01:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `c_name` varchar(25) NOT NULL,
  `c_phone` varchar(15) NOT NULL,
  `the_date` date DEFAULT curdate(),
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `field_name` varchar(5) NOT NULL,
  `field_type` varchar(15) NOT NULL,
  `field_group` varchar(15) NOT NULL,
  `price` double NOT NULL,
  `remark` text DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  `water` decimal(10,0) DEFAULT NULL,
  `extra` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `c_name`, `c_phone`, `the_date`, `from_time`, `to_time`, `field_name`, `field_type`, `field_group`, `price`, `remark`, `status`, `user_id`, `date_created`, `water`, `extra`) VALUES
(1, 'Adam', '012246985', '2020-04-01', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(2, 'Samnang', '012365479', '2020-04-01', '18:00:00', '19:00:00', 'B', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(3, 'Sombath', '012563248', '2020-04-01', '19:00:00', '20:00:00', 'C', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(4, 'Mongkul', '0962354678', '2020-04-01', '19:00:00', '20:00:00', 'D', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(5, 'Vibol', '098263548', '2020-04-02', '19:00:00', '20:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(6, 'Socheat', '089248763', '2020-04-02', '19:00:00', '20:00:00', 'B', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(7, 'Vichet', '0235469871', '2020-04-02', '19:00:00', '20:00:00', 'C', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(8, 'Bunrith', '015236478', '2020-04-02', '20:00:00', '21:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(9, 'Vuthy', '095789654', '2020-04-04', '08:00:00', '09:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(10, 'Mony', '012365478', '2020-04-04', '08:00:00', '09:00:00', 'B', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(11, 'Rotha', '089456987', '2020-04-04', '08:00:00', '09:00:00', 'C', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(12, 'Bunheng', '012478965', '2020-04-04', '10:00:00', '11:00:00', 'E', 'big', 'S1', 10, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(13, 'Vireaksith', '023654792', '2020-04-04', '14:00:00', '15:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(14, 'Giva', '012222345', '2020-04-04', '14:00:00', '15:00:00', 'C', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(15, 'Malin', '023654789', '2020-04-04', '16:00:00', '17:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(16, 'Viroth', '085330320', '2020-04-05', '10:00:00', '11:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(17, 'Sovann', '012563214', '2020-04-05', '10:00:00', '11:00:00', 'B', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(18, 'Monyvann', '069875432', '2020-04-05', '10:00:00', '11:00:00', 'C', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(19, 'Sokchea', '0962546789', '2020-04-05', '10:00:00', '11:00:00', 'D', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(20, 'Sievly', '017892354', '2020-04-05', '18:00:00', '19:00:00', 'C', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(21, 'Vanda', '015348566', '2020-04-05', '18:00:00', '19:00:00', 'D', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(22, 'Rathana', '0972589631', '2020-04-07', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(23, 'Kimhong', '017456322', '2020-04-10', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(24, 'Lyfong', '078255635', '2020-04-11', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(25, 'David', '016325478', '2020-04-12', '20:00:00', '21:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(26, 'Vichai', '012455589', '2020-04-13', '20:00:00', '21:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 0, '2020-10-20 22:16:17', NULL, NULL),
(27, 'User', '12345678', '2020-10-21', '07:00:00', '08:00:00', 'A', 'small', 'S1', 5, '', NULL, 0, '2020-10-21 01:00:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `the_date` date DEFAULT curdate(),
  `item` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `qty` int(8) NOT NULL DEFAULT 1,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `the_date`, `item`, `price`, `qty`, `date_created`) VALUES
(1, '2020-10-21', 'Electricy', 10, 1, '2020-10-21 01:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `field_name` varchar(5) NOT NULL,
  `field_type` varchar(15) NOT NULL,
  `field_group` varchar(15) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `from_time`, `to_time`, `field_name`, `field_type`, `field_group`, `price`) VALUES
(1, '07:00:00', '17:00:00', 'A', 'small', 'S1', 5),
(2, '17:00:00', '22:00:00', 'A', 'small', 'S1', 10),
(3, '07:00:00', '17:00:00', 'B', 'small', 'S1', 5),
(4, '17:00:00', '22:00:00', 'B', 'small', 'S1', 10),
(5, '07:00:00', '17:00:00', 'C', 'small', 'S1', 5),
(6, '17:00:00', '22:00:00', 'C', 'small', 'S1', 10),
(7, '07:00:00', '17:00:00', 'D', 'small', 'S1', 5),
(8, '17:00:00', '22:00:00', 'D', 'small', 'S1', 10),
(9, '07:00:00', '17:00:00', 'E', 'big', 'S1', 10),
(10, '17:00:00', '22:00:00', 'E', 'big', 'S1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin', 'Administrator', '2020-10-20 22:16:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
