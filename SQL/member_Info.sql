-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2012 at 01:41 PM
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
-- Table structure for table `member_Info`
--

CREATE TABLE `member_Info` (
  `stu_id` varchar(10) NOT NULL,
  `facebook` varchar(64) NOT NULL,
  `msn` varchar(64) NOT NULL,
  `twitter` varchar(64) NOT NULL,
  `plurk` varchar(64) NOT NULL,
  `skype` varchar(64) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `food` tinyint(1) NOT NULL,
  `home` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `dorm` char(1) NOT NULL,
  `room` smallint(3) NOT NULL,
  `outAddr` varchar(64) NOT NULL,
  `car` tinyint(1) NOT NULL,
  `profile_pic` varchar(64) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_Info`
--

INSERT INTO `member_Info` VALUES('B993040017', 'http://www.facebook.com/weichen.chiang.39', '', '', '', '', '0989858692', 0, 'Taipei', 'A127479868', 'E', 307, '', 2, '');
