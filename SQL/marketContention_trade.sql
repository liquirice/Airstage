-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2012 年 10 月 13 日 15:29
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
-- 表的結構 `marketContention_trade`
--

CREATE TABLE IF NOT EXISTS `marketContention_trade` (
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `initial_price` int(5) NOT NULL,
  `current_price` int(5) NOT NULL,
  `product_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `feedback_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exist` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trade_id`),
  KEY `trade_id` (`trade_id`),
  KEY `stu_id` (`stu_id`,`product_id`,`feedback_id`,`time_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `marketContention_trade`
--

INSERT INTO `marketContention_trade` (`stu_id`, `trade_id`, `initial_price`, `current_price`, `product_id`, `feedback_id`, `time_id`, `category_id`, `exist`) VALUES
('B993040017', 'C20121012010010', 100, 110, '1', NULL, '1', '1', 1),
('B993040017', 'C20121012010020', 1000, 3000, '2', NULL, '2', '2', 0),
('B993040017', 'C20121012010030', 100, 500, '3', '3', '3', '3', 0),
('B993040017', 'C20121012010040', 100, 100, '4', NULL, '4', '4', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
