-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 06:55 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtm`
--

-- --------------------------------------------------------

--
-- Table structure for table `earn_expense`
--

CREATE TABLE `earn_expense` (
  `ee_id` int(11) NOT NULL,
  `action_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `earn_cat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earn_amount` int(11) NOT NULL,
  `expense_cat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `earn_expense`
--

INSERT INTO `earn_expense` (`ee_id`, `action_date`, `earn_cat`, `earn_amount`, `expense_cat`, `expense_amount`, `balance`, `u_id`) VALUES
(1, '04/Mar/2020', 'Shop sales', 2000, '', 0, 2000, 1),
(2, '04/Mar/2020', '', 0, 'Cigarate case', 500, 1500, 1),
(3, '07/Mar/2020', 'Shop sales', 2000, 'Cigarate case', 500, 3000, 1),
(4, '15/Mar/2020', 'Shop sales', 5000, 'Cigarate case', 500, 7500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `load_unload`
--

CREATE TABLE `load_unload` (
  `lu_id` int(11) NOT NULL,
  `car_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `load_l` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unload_l` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_fare` int(11) NOT NULL,
  `paid_fare` int(11) NOT NULL,
  `due_fare` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `load_unload`
--

INSERT INTO `load_unload` (`lu_id`, `car_number`, `load_l`, `unload_l`, `event_date`, `total_fare`, `paid_fare`, `due_fare`, `u_id`) VALUES
(1, 'dhaka 12345', 'dhaka', 'chittagong', '15/Mar/2020', 5000, 5000, 0, 1),
(2, 'dhaka 12345', 'dhaka', 'chittagong', '15/Mar/2020', 10000, 10000, 0, 1),
(3, 'khulna 123456', 'khulna', 'dhaka', '16/Mar/2020', 3000, 3000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `mobile`, `email`, `password`, `address`, `picture`) VALUES
(1, 'Tauhid Hasan edited', 1677163339, 'tauhid@softlooper.com', '4491e3be815743b1ed51a9f67dc538f5', 'Kamarpara, Uttara, Dhaka edited', 'truck-logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `earn_expense`
--
ALTER TABLE `earn_expense`
  ADD PRIMARY KEY (`ee_id`);

--
-- Indexes for table `load_unload`
--
ALTER TABLE `load_unload`
  ADD PRIMARY KEY (`lu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `earn_expense`
--
ALTER TABLE `earn_expense`
  MODIFY `ee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `load_unload`
--
ALTER TABLE `load_unload`
  MODIFY `lu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
