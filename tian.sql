-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2019 at 03:54 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

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
-- Table structure for table `tian`
--

DROP TABLE IF EXISTS `tian`;
CREATE TABLE IF NOT EXISTS `tian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `typeofroom` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `guest_phone` varchar(15) NOT NULL,
  `checkin` varchar(25) NOT NULL,
  `checkout` varchar(25) NOT NULL,
  `breakfast` varchar(5) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `guestnum` varchar(40) NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tian`
--

INSERT INTO `tian` (`id`, `firstname`, `lastname`, `typeofroom`, `address`, `guest_phone`, `checkin`, `checkout`, `breakfast`, `city`, `state`, `email`, `guestnum`, `zip`) VALUES
(18, 'hah', 'x', 'deluxe', '22', '2323223232', '2019-12-10', '2019-12-19', 'no', 'HU', 'IA', 'as@gmail.com', '2', 23222),
(19, 'asas', 'sds', 'deluxe', '22', '2323223232', '2019-12-12', '2019-12-21', 'no', 'HU', 'KS', 'as@gmail.com', '1', 23456),
(20, 'asa', 'sds', 'superior', '22', '2322322322', '2019-12-14', '2019-12-17', 'no', 'HU', 'KS', 'as@gmail.com', '2', 12345);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
