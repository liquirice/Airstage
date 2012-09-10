-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2012 at 02:58 PM
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
-- Table structure for table `Member`
--

CREATE TABLE IF NOT EXISTS `Member` (
  `rno` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `psw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grade` enum('100','101','102','103','104','105') COLLATE utf8_unicode_ci NOT NULL,
  `department` enum('中文系','外文系','音樂系','劇藝系','應數系','物理系','化學系','生科系','財管系','企管系','資管系','社會系') COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dorm` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `fb` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Member`
--

INSERT INTO `Member` (`rno`, `username`, `psw`, `grade`, `department`, `stu_id`, `name`, `email`, `bday`, `gender`, `country`, `address`, `dorm`, `fb`) VALUES
(1, '2saki', '0146139775a', '103', '應數系', 'B992040061', '甘忠禾', 'two_saki@hotmail.com', '', '男', '', '', '', ''),
(2, '黑崎', '291339', '103', '企管系', 'b996060015', '郭宇軒', 'shdowwings@gmail.com', '', '男', '', '', '', ''),
(3, 'adachua90', 'chua19905309', '103', '財管系', 'b994030050', '蔡昆達', 'dada_chua_90@hotmail.com', '', '男', '', '', '', ''),
(4, 'Michael', '006215', '100', '中文系', 'b984000133', '陳冠勳', 'goalmichael100000@gmail.com', '', '男', '', '', '', ''),
(5, 'simba', 'simba130', '100', '中文系', 'B983100041', '石萬里', 'simba08130@gmail.com', '', '男', '', '', '', ''),
(6, 'B993100001', '1111', '100', '中文系', 'B993100001', '不清楚', 'l204130@rtrtr.com', '', '男', '', '', '', ''),
(7, 'HUNG', '811128', '100', '中文系', 'B003022011', '陳浤', 'jimhung.chen@gmail.com', '', '男', '', '', '', ''),
(8, '叮噹', 'lovefang', '100', '中文系', 'B985040037', '邱章傑', 'masakiq@hotmail.com', '', '男', '', '', '', ''),
(9, 'archerwind', 'Archerwind13', '100', '中文系', 'B993040017', '江緯宸', 'archerwindy@gmail.com', '', '男', '', '', '', ''),
(10, 'Yes.yu79', '2310203', '100', '中文系', 'b001020039', '葉士瑜', 'Yes.yu79@gmail.com', '', '女', '', '', '', ''),
(12, '開發者', '89756232', '100', '中文系', 'b000000000', '開發者', 'airstageforstudio@gmail.com', '', '男', '', '', '', ''),
(13, 'hv42002', 's123456', '100', '中文系', 'b996060044', '蘇柏昀', 'b996060044@student.nsysu.edu.tw', '', '男', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
