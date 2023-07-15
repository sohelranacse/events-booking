-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2023 at 11:50 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `participation_id` int(11) NOT NULL,
  `employee_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `participation_fee` decimal(10,2) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  PRIMARY KEY (`participation_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`participation_id`, `employee_name`, `employee_mail`, `event_id`, `participation_fee`, `event_date`) VALUES
(1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, '0.00', '2019-09-04'),
(2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, '1485.99', '2019-10-21'),
(3, 'Leandro BuÃŸmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, '657.50', '2019-10-21'),
(4, 'Hans SchÃ¤fer', 'hans.schaefer@no-reply.rexx-systems.com', 1, '0.00', '2019-09-04'),
(5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, '0.00', '2019-09-04'),
(6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, '657.50', '2019-10-21'),
(7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, '474.81', '2019-10-24'),
(8, 'Hans SchÃ¤fer', 'hans.schaefer@no-reply.rexx-systems.com', 3, '534.31', '2019-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`) VALUES
(1, 'PHP 7 crash course'),
(2, 'International PHP Conference'),
(3, 'code.talks');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
