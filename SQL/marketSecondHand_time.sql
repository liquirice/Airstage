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
-- Table structure for table `marketSecondHand_time`
--

CREATE TABLE IF NOT EXISTS `marketSecondHand_time` (
  `time_id` int(10) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `marketSecondHand_time`
--

INSERT INTO `marketSecondHand_time` (`time_id`, `start_date`, `start_time`, `end_date`, `end_time`) VALUES
(1, '2012-10-10', '00:00:00', '2012-12-26', '00:00:00'),
(2, '2012-10-10', '00:00:00', '2012-11-20', '00:00:00'),
(3, '2012-10-01', '00:00:00', '2012-11-20', '00:00:00'),
(4, '2012-10-01', '00:00:00', '2012-10-02', '00:00:00'),
(5, '2012-10-01', '00:00:00', '2012-10-18', '00:00:00'),
(6, '2012-10-01', '00:00:00', '2012-10-18', '00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
