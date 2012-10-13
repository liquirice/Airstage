-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2012 年 10 月 13 日 15:30
-- 伺服器版本: 5.1.52
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `airstage`
--

-- --------------------------------------------------------

--
-- 表的結構 `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `payment_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `face` int(1) NOT NULL DEFAULT '-1',
  `post` int(1) NOT NULL DEFAULT '-1',
  `bank` int(1) NOT NULL DEFAULT '-1',
  `delivery` int(1) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `payment_type`
--

INSERT INTO `payment_type` (`payment_id`, `face`, `post`, `bank`, `delivery`) VALUES
('1', 1, 1, 1, 0),
('2', 1, 1, 0, -1),
('3', 0, 0, 1, 1),
('4', 1, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
