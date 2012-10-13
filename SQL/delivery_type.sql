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
-- 表的結構 `delivery_type`
--

CREATE TABLE IF NOT EXISTS `delivery_type` (
  `delivery_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `inside_campus` int(3) NOT NULL DEFAULT '-1' COMMENT '校內面交',
  `outside_campus` int(3) NOT NULL DEFAULT '-1' COMMENT '校外面交',
  `post` int(3) NOT NULL DEFAULT '-1' COMMENT '郵寄',
  `cvs` int(3) NOT NULL DEFAULT '-1' COMMENT '便利商店店對店',
  `express` int(3) NOT NULL DEFAULT '-1' COMMENT '宅配',
  `payOnDelivery` int(3) NOT NULL DEFAULT '-1' COMMENT '貨到付款',
  `other` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '其他方式',
  PRIMARY KEY (`delivery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `delivery_type`
--

INSERT INTO `delivery_type` (`delivery_id`, `inside_campus`, `outside_campus`, `post`, `cvs`, `express`, `payOnDelivery`, `other`) VALUES
('1', 0, 0, 40, 49, 120, -1, NULL),
('2', 0, -1, 55, 49, 80, -1, NULL),
('3', -1, -1, 80, 49, 80, 120, '可寄國外'),
('4', 0, -1, -1, -1, -1, -1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
