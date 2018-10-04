-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 09:32 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legendary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pno` varchar(15) NOT NULL,
  `pword` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`serial`, `fname`, `lname`, `email`, `pno`, `pword`) VALUES
(2, 'Abdulhhalim', 'Sanusi', 'ahalim.sunusi@gmail', '08098765431', 'Abdul'),
(3, 'Aisha ', 'Sunusi', 'aish@kdc.org.ng', '08074801186', 'Aish');

-- --------------------------------------------------------

--
-- Table structure for table `deco`
--

DROP TABLE IF EXISTS `deco`;
CREATE TABLE IF NOT EXISTS `deco` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deco`
--

INSERT INTO `deco` (`serial`, `name`, `price`) VALUES
(1, 'Elegant', 500000),
(2, 'Special', 300000),
(3, 'Ordinary', 150000),
(4, 'Lexus', 900000);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

DROP TABLE IF EXISTS `hall`;
CREATE TABLE IF NOT EXISTS `hall` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`serial`, `name`, `price`) VALUES
(1, 'Marquee', 1000000),
(2, 'Gold', 750000),
(3, 'Silver', 500000),
(4, 'Deluxe', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `h_reservation`
--

DROP TABLE IF EXISTS `h_reservation`;
CREATE TABLE IF NOT EXISTS `h_reservation` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `e_day` smallint(2) NOT NULL,
  `e_month` smallint(2) NOT NULL,
  `e_year` smallint(4) NOT NULL,
  `start_time` time NOT NULL,
  `close_time` time NOT NULL,
  `e_type` varchar(20) NOT NULL,
  `hall_type` int(11) NOT NULL,
  `deco_type` int(11) NOT NULL,
  `d_color` varchar(50) NOT NULL,
  `total_amount` double NOT NULL,
  `r_date` timestamp NOT NULL,
  `payment_status` varchar(3) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`serial`),
  KEY `customerid` (`customerid`),
  KEY `hall_type` (`hall_type`,`deco_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_reservation`
--

INSERT INTO `h_reservation` (`serial`, `customerid`, `e_day`, `e_month`, `e_year`, `start_time`, `close_time`, `e_type`, `hall_type`, `deco_type`, `d_color`, `total_amount`, `r_date`, `payment_status`) VALUES
(1, 2, 4, 2, 2017, '05:00:00', '10:00:00', 'Wedding', 1, 1, '   white', 1000000, '2016-04-19 23:51:26', 'No'),
(2, 2, 16, 4, 2017, '17:00:00', '22:00:00', 'Wedding', 2, 1, ' White', 1000000, '2016-04-20 18:53:10', 'No'),
(3, 2, 12, 2, 2018, '18:00:00', '21:00:00', 'Fair', 3, 3, ' Silver', 1000000, '2016-04-20 23:32:36', 'No'),
(4, 3, 15, 4, 2017, '14:00:00', '17:00:00', 'Wedding', 1, 1, ' Gold', 1500000, '2016-04-20 23:37:12', 'No'),
(5, 2, 12, 3, 2017, '13:00:00', '15:00:00', 'Conference', 1, 1, ' Blue', 1500000, '2016-04-21 07:36:13', 'No'),
(6, 2, 6, 3, 2018, '04:00:00', '05:00:00', 'Wedding', 1, 1, 'Blue', 1500000, '2016-04-21 12:27:31', 'No'),
(7, 3, 2, 2, 2017, '01:00:00', '03:00:00', 'Fair', 2, 2, 'Blue', 1500000, '2016-04-22 09:55:24', 'No'),
(8, 2, 15, 4, 2017, '14:00:00', '16:00:00', 'Wedding', 1, 1, 'Blue', 1500000, '2016-04-22 09:59:02', 'No'),
(9, 3, 4, 3, 2018, '19:00:00', '20:00:00', 'Wedding', 2, 1, 'Blue', 1500000, '2016-04-22 10:01:25', 'Yes'),
(10, 3, 8, 6, 2016, '03:00:00', '07:00:00', 'Conference', 1, 2, 'Blue', 1500000, '2016-04-24 12:55:30', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `card_no` varchar(16) NOT NULL,
  `exp_year` year(4) NOT NULL,
  `exp_month` int(2) NOT NULL,
  `csc` varchar(3) DEFAULT NULL,
  `reserv_id` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`serial`, `card_no`, `exp_year`, `exp_month`, `csc`, `reserv_id`, `date`) VALUES
(1, '4059387263567637', 2017, 3, NULL, 4, '2016-04-20 23:43:19'),
(2, '4059387263567637', 2017, 3, '234', 4, '2016-04-20 23:45:02'),
(3, '0897653412673475', 2016, 2, '764', 5, '2016-04-21 07:36:43'),
(4, '0897653412673475', 2016, 2, '764', 5, '2016-04-21 07:37:21'),
(5, '9087654314567265', 2018, 1, '764', 7, '2016-04-22 09:55:43'),
(6, '9857365267846524', 2030, 5, '567', 8, '2016-04-22 09:59:27'),
(7, '1928765167890198', 2017, 1, '764', 9, '2016-04-22 10:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `pword` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `uname`, `pword`) VALUES
(1, 'admin', 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
