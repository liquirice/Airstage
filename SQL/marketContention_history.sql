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
-- 表的結構 `marketContention_history`
--

CREATE TABLE IF NOT EXISTS `marketContention_history` (
  `trade_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'buyer',
  `end_price` int(5) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`trade_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `marketContention_history`
--

INSERT INTO `marketContention_history` (`trade_id`, `stu_id`, `end_price`, `time`) VALUES
('C20121012010020', 'B994020033', 3000, '2012-10-11 10:10:10'),
('C20121012010030', 'B994020033', 500, '2012-10-11 09:10:10'),
('C20121012010040', NULL, 100, '2012-10-10 10:10:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
