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
-- Table structure for table `member_check`
--

CREATE TABLE IF NOT EXISTS `member_check` (
  `student_id` varchar(15) NOT NULL,
  `student_id_check` varbinary(1) NOT NULL,
  `gender_check` varbinary(1) NOT NULL,
  `email_check` varbinary(1) NOT NULL,
  `hp_check` varbinary(1) NOT NULL,
  `fb_check` varbinary(1) NOT NULL,
  `twitter_check` varbinary(1) NOT NULL,
  `plurk_check` varbinary(1) NOT NULL,
  `skype_check` varbinary(1) NOT NULL,
  `msn_check` varbinary(1) NOT NULL,
  `second_email_check` varbinary(1) NOT NULL,
  `dorm_check` varbinary(1) NOT NULL,
  `food_check` varbinary(1) NOT NULL,
  `address_check` varbinary(1) NOT NULL,
  `club_check` varbinary(1) NOT NULL,
  `club_id_check` varbinary(1) NOT NULL,
  `hometown_check` varbinary(1) NOT NULL,
  `transport_check` varbinary(1) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='member check';

--
-- Dumping data for table `member_check`
--

INSERT INTO `member_check` (`student_id`, `student_id_check`, `gender_check`, `email_check`, `hp_check`, `fb_check`, `twitter_check`, `plurk_check`, `skype_check`, `msn_check`, `second_email_check`, `dorm_check`, `food_check`, `address_check`, `club_check`, `club_id_check`, `hometown_check`, `transport_check`) VALUES
('B996060015', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0'),
('B996211115', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1'),
('w133433333', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1'),
('w133436223', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1'),
('w133436666', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member_check`
--
ALTER TABLE `member_check`
  ADD CONSTRAINT `member_check_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `member_detail` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
