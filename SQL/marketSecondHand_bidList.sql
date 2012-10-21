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
-- Table structure for table `marketSecondHand_bidList`
--

CREATE TABLE IF NOT EXISTS `marketSecondHand_bidList` (
  `bidder_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` int(10) NOT NULL,
  `exchange_type` int(1) NOT NULL COMMENT '0=錢, 1=物, 2=錢+物',
  `exchange_info` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wanted_number` int(2) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  KEY `buyer_id` (`bidder_id`,`trade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketSecondHand_bidList`
--

INSERT INTO `marketSecondHand_bidList` (`bidder_id`, `trade_id`, `exchange_type`, `exchange_info`, `wanted_number`, `update_time`) VALUES
('test01', 5, 3, 'ttt+ttt', 1, '0000-00-00 00:00:00'),
('test05', 3, 1, '500', 2, '2012-10-17 16:58:34'),
('test06', 3, 1, '600', 6, '2012-10-17 16:58:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
