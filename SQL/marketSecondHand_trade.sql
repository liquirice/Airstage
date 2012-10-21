-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2012 at 10:52 PM
-- Server version: 5.1.52
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airstage`
--

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_trade`
--

CREATE TABLE IF NOT EXISTS `marketSecondHand_trade` (
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` int(10) NOT NULL AUTO_INCREMENT,
  `least_price` int(5) NOT NULL,
  `number` int(2) NOT NULL,
  `product_id` int(10) NOT NULL,
  `time_id` int(10) NOT NULL,
  `category` int(20) NOT NULL,
  `exist` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trade_id`),
  KEY `stu_id` (`stu_id`,`product_id`,`time_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `marketSecondHand_trade`
--

INSERT INTO `marketSecondHand_trade` (`stu_id`, `trade_id`, `least_price`, `number`, `product_id`, `time_id`, `category`, `exist`) VALUES
('test01', 1, 100, 1, 1, 1, 20304, 1),
('test01', 2, 100, 5, 2, 2, 20401, 1),
('test01', 3, 100, 5, 3, 3, 20305, 1),
('test01', 4, 120, 7, 4, 4, 20401, 0),
('test02', 5, 500, 10, 5, 5, 20304, 0),
('test02', 6, 100, 1, 6, 6, 20305, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
