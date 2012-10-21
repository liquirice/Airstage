-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2012 at 03:34 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Airstage`
--

-- --------------------------------------------------------

--
-- Table structure for table `marketSecondHand_chasingList`
--

CREATE TABLE `marketSecondHand_chasingList` (
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `markTime` datetime NOT NULL,
  `star` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketSecondHand_chasingList`
--

INSERT INTO `marketSecondHand_chasingList` VALUES('B993040017', '1', '2012-10-25 00:00:00', 0);
INSERT INTO `marketSecondHand_chasingList` VALUES('B993040017', '3', '2012-10-06 00:00:00', 1);
INSERT INTO `marketSecondHand_chasingList` VALUES('B993040017', '4', '2012-10-20 23:56:21', 1);
INSERT INTO `marketSecondHand_chasingList` VALUES('B993040017', '2', '2012-12-25 00:00:00', 0);
