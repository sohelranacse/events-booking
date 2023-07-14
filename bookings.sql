-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 07:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grow`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `participation_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `participation_fee` decimal(10,2) NOT NULL,
  `event_date` date NOT NULL,
  `version` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `participation_id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `version`, `created_at`) VALUES
(1, '1', 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04', NULL, '2023-07-14 17:52:18'),
(2, '2', 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', '1485.99', '2019-10-21', NULL, '2023-07-14 17:52:18'),
(3, '3', 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21', NULL, '2023-07-14 17:52:18'),
(4, '4', 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04', NULL, '2023-07-14 17:52:18'),
(5, '5', 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04', NULL, '2023-07-14 17:52:18'),
(6, '6', 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21', '1.1.3', '2023-07-14 17:52:18'),
(7, '7', 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', '474.81', '2019-10-24', NULL, '2023-07-14 17:52:18'),
(8, '8', 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', '534.31', '2019-10-24', '1.1.3', '2023-07-14 17:52:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
