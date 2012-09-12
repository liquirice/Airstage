-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2012 at 11:59 PM
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
-- Table structure for table `display_check`
--

CREATE TABLE `display_check` (
  `stu_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stu_id_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `name_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `grade_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `msn_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `twitter_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plurk_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `home_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dorm_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `outAddr_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `car_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic_c` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_check`
--

INSERT INTO `display_check` VALUES('B993040017', 'on', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'on');
