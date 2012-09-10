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
-- Table structure for table `member_detail`
--

CREATE TABLE IF NOT EXISTS `member_detail` (
  `student_id` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `department` varchar(30) NOT NULL,
  `grade` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `confirm_passwd` varchar(50) NOT NULL,
  `hp` int(15) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `plurk` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `msn` varchar(50) NOT NULL,
  `second_email` varchar(50) NOT NULL,
  `dorm` varchar(30) NOT NULL,
  `floor` int(3) NOT NULL,
  `room` int(5) NOT NULL,
  `food` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `club` varchar(30) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `id` varchar(15) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `transport` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='member detail';

--
-- Dumping data for table `member_detail`
--

INSERT INTO `member_detail` (`student_id`, `name`, `gender`, `department`, `grade`, `email`, `passwd`, `confirm_passwd`, `hp`, `fb`, `twitter`, `plurk`, `skype`, `msn`, `second_email`, `dorm`, `floor`, `room`, `food`, `address`, `club`, `club_id`, `id`, `hometown`, `transport`) VALUES
('B996060015', '郭宇軒', 'boy', '不知啥系', 105, 'maxwell_darknight@yahoo.com.tw', '123123', '123123', 975705499, '', '', '', '', '', '', 'wuling1', 1, 0, '', '', '基服社', '副會長', '', 'kaohsiung', ''),
('B996211115', '郭宇軒', 'boy', '劇藝系', 103, 'maxwell_darknight@yahoo.com.tw', '123123', '123123', 975705499, 'maxwell_darknight@yahoo.com.tw', 'maxwell_darknight@yahoo.com.tw', 'maxwell_darknight@yahoo.com.tw', 'maxwell_darknight@yahoo.com.tw', 'maxwell_darknight@yahoo.com.tw', 'maxwell_darknight@yahoo.com.tw', 'cuiheng_g', 5, 534, 'non_vegetarian, vegetarian, non_pork', 'address', '書法社', '副會長', 'A352243432', 'kaohsiung', 'ride_nocar, ride_gotcar'),
('w133433333', '郭宇軒', 'boy', 'business_administration', 103, 'maxwell_darknight@yahoo.com.tw', '123123', '123123', 975705499, '', '', '', '', '', '', 'wuling1', 1, 0, '', '', 'aiesec', '副會長', 'w333333333', 'kaohsiung', ''),
('w133436223', '郭宇軒', 'boy', 'business_administration', 103, 'maxwell_darknight@yahoo.com.tw', '123123', '123123', 975705499, '', '', '', '', '', '', 'wuling1', 1, 0, 'non_vegetarian, vegetarian, non_beef, non_pork', '', 'aiesec', '副會長', 'w343432222', 'kaohsiung', 'walk, ride_nocar, ride_gotcar, car'),
('w133436666', '郭宇軒', 'boy', 'business_administration', 103, 'maxwell_darknight@yahoo.com.tw', '123123', '123123', 975705499, '', '', '', '', '', '', 'wuling1', 1, 0, 'non_vegetarian, vegetarian, non_beef, non_pork', '', 'aiesec', '副會長', 'w333332222', 'kaohsiung', 'walk, ride_nocar, ride_gotcar, car');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
