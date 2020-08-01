-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 05:50 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `booking_id`, `billing_number`, `price`, `water`, `extra`, `remark`, `user_id`, `date_created`) VALUES
(1, 62, 1, 5, NULL, NULL, NULL, 1, '2020-04-26 18:54:39'),
(2, 62, 2, 5, NULL, NULL, NULL, 1, '2020-04-26 18:57:27'),
(3, 62, 3, 5, NULL, NULL, NULL, 1, '2020-04-26 18:57:46'),
(4, 74, 4, 5, NULL, NULL, NULL, 2, '2020-06-23 20:39:41'),
(5, 73, 5, 5, NULL, NULL, NULL, 2, '2020-06-23 21:01:01'),
(6, 79, 6, 5, NULL, NULL, NULL, 1, '2020-07-05 17:06:17'),
(7, 81, 7, 5, NULL, NULL, NULL, 1, '2020-07-05 17:06:36'),
(8, 82, 8, 5, NULL, NULL, NULL, 1, '2020-07-05 17:07:23'),
(9, 83, 9, 5, NULL, NULL, NULL, 1, '2020-07-05 17:07:43'),
(10, 84, 10, 5, NULL, NULL, NULL, 1, '2020-07-05 17:19:01'),
(11, 85, 11, 5, 10, NULL, NULL, 1, '2020-07-05 17:31:22'),
(12, 86, 12, 5, 10, 12, NULL, 1, '2020-07-05 17:47:15'),
(13, 77, 13, 10, NULL, NULL, NULL, 1, '2020-07-05 17:47:55'),
(14, 80, 14, 10, NULL, NULL, NULL, 1, '2020-07-05 17:48:10'),
(15, 87, 15, 5, 23, 8, NULL, 1, '2020-07-05 17:49:23');

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
  `water` double DEFAULT NULL,
  `extra` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `c_name`, `c_phone`, `the_date`, `from_time`, `to_time`, `field_name`, `field_type`, `field_group`, `price`, `water`, `extra`, `remark`, `status`, `date_created`) VALUES
(46, 'Vichai', '012455589', '0000-00-00', '20:00:00', '21:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:50:53'),
(47, 'Adam', '012246985', '2020-04-01', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(48, 'Samnang', '012365479', '2020-04-01', '18:00:00', '19:00:00', 'B', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(49, 'Sombath', '012563248', '2020-04-01', '19:00:00', '20:00:00', 'C', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(50, 'Mongkul', '0962354678', '2020-04-01', '19:00:00', '20:00:00', 'D', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(51, 'Vibol', '098263548', '2020-04-02', '19:00:00', '20:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(52, 'Socheat', '089248763', '2020-04-02', '19:00:00', '20:00:00', 'B', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(53, 'Vichet', '0235469871', '2020-04-02', '19:00:00', '20:00:00', 'C', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(54, 'Bunrith', '015236478', '2020-04-02', '20:00:00', '21:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(55, 'Vuthy', '095789654', '2020-04-04', '08:00:00', '09:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(56, 'Mony', '012365478', '2020-04-04', '08:00:00', '09:00:00', 'B', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(57, 'Rotha', '089456987', '2020-04-04', '08:00:00', '09:00:00', 'C', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(58, 'Bunheng', '012478965', '2020-04-04', '10:00:00', '11:00:00', 'E', 'big', 'S1', 10, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(59, 'Vireaksith', '023654792', '2020-04-04', '14:00:00', '15:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(60, 'Giva', '012222345', '2020-04-04', '14:00:00', '15:00:00', 'C', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(61, 'Malin', '023654789', '2020-04-04', '16:00:00', '17:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(62, 'Viroth', '085330320', '2020-04-05', '10:00:00', '11:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(63, 'Sovann', '012563214', '2020-04-05', '10:00:00', '11:00:00', 'B', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(64, 'Monyvann', '069875432', '2020-04-05', '10:00:00', '11:00:00', 'C', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(65, 'Sokchea', '0962546789', '2020-04-05', '10:00:00', '11:00:00', 'D', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(66, 'Sievly', '017892354', '2020-04-05', '18:00:00', '19:00:00', 'C', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(67, 'Vanda', '015348566', '2020-04-05', '18:00:00', '19:00:00', 'D', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(68, 'Rathana', '0972589631', '2020-04-07', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(69, 'Kimhong', '017456322', '2020-04-10', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(70, 'Lyfong', '078255635', '2020-04-11', '18:00:00', '19:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(71, 'David', '016325478', '2020-04-12', '20:00:00', '21:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(72, 'Vichai', '012455589', '2020-04-13', '20:00:00', '21:00:00', 'A', 'small', 'S1', 5, NULL, NULL, NULL, NULL, '2020-04-25 20:52:10'),
(73, 'Vireak', '0967104297', '2020-06-22', '07:00:00', '08:00:00', 'A', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-06-22 20:07:44'),
(74, 'Ek vireak', '0967104297', '2020-06-22', '08:00:00', '09:00:00', 'A', 'small', 'S1', 5, NULL, NULL, 'asdf', NULL, '2020-06-23 19:50:30'),
(75, 'Ek vireak', '0967104297', '2020-07-06', '12:00:00', '13:00:00', 'B', 'small', 'S1', 5, NULL, NULL, 'aetqq', NULL, '2020-07-05 15:02:34'),
(77, 'adsf', 'asdf', '2020-07-05', '11:00:00', '12:00:00', 'E', 'big', 'S1', 10, NULL, NULL, 'asdasf', NULL, '2020-07-05 16:41:57'),
(79, 'Ek vireak', '0967104297', '2020-07-05', '12:00:00', '13:00:00', 'A', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 16:55:21'),
(80, 'Ek vireak', '0967104297', '2020-07-05', '13:00:00', '14:00:00', 'E', 'big', 'S1', 10, NULL, NULL, '', NULL, '2020-07-05 16:55:27'),
(81, 'Ek vireak', '0967104297', '2020-07-05', '14:00:00', '15:00:00', 'A', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 16:55:34'),
(82, 'Ek vireak', '0967104297', '2020-07-05', '14:00:00', '15:00:00', 'B', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 16:55:40'),
(83, 'Ek vireak', '0967104297', '2020-07-05', '14:00:00', '15:00:00', 'C', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 16:55:46'),
(84, 'Ek vireak', '0967104297', '2020-07-05', '14:00:00', '15:00:00', 'D', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 16:55:54'),
(85, 'Ek vireak', '0967104297', '2020-07-05', '15:00:00', '16:00:00', 'A', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 17:22:28'),
(86, 'Ek vireak', '0967104297', '2020-07-05', '09:00:00', '10:00:00', 'B', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 17:39:52'),
(88, 'sadfasdf', 'asdf', '2020-07-05', '09:00:00', '10:00:00', 'C', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 17:50:23'),
(89, 'adsf', 'asdf', '2020-07-05', '15:00:00', '16:00:00', 'B', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-05 17:50:31'),
(90, 'bbb', '0967104297', '2020-07-29', '07:00:00', '08:00:00', 'A', 'small', 'S1', 5, NULL, NULL, '', NULL, '2020-07-29 18:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `field_name` varchar(5) DEFAULT NULL,
  `field_type` varchar(15) DEFAULT NULL,
  `field_group` varchar(15) DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin', 'Administrator', '2020-04-04 14:54:32'),
(2, 'user', 'user', 'admin', 'User', '2020-04-20 17:57:41'),
(3, 'vireak', 'pppp', 'admin', 'Ek vireak', '2020-06-22 21:14:35');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
