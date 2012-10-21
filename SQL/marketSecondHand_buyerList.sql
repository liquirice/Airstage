-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2012 at 10:53 PM
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
-- Table structure for table `marketSecondHand_buyerList`
--

CREATE TABLE IF NOT EXISTS `marketSecondHand_buyerList` (
  `trade_id` int(10) NOT NULL,
  `buyer_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `buy_number` int(2) NOT NULL,
  PRIMARY KEY (`trade_id`,`buyer_id`),
  KEY `trade_id` (`trade_id`),
  KEY `trade_id_2` (`trade_id`),
  KEY `trade_id_3` (`trade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketSecondHand_buyerList`
--

INSERT INTO `marketSecondHand_buyerList` (`trade_id`, `buyer_id`, `buy_number`) VALUES
(6, 'test03', 2),
(3, 'test02', 2),
(3, 'test03', 1),
(3, 'test04', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
