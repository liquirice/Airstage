-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2012 年 10 月 13 日 15:31
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
-- 表的結構 `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
  `product_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `delivery_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_pic` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `delivery_id` (`delivery_id`,`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `product_info`
--

INSERT INTO `product_info` (`product_id`, `title`, `delivery_id`, `payment_id`, `product_pic`, `description`) VALUES
('1', '轉賣 - 英文高級課本(American Headway 5) ', '1', '1', NULL, 'test1'),
('2', 'kiss me 睫毛膏', '2', '2', 'http://ppt.cc/aDm8', 'test2'),
('3', '二手小冰箱', '3', '3', 'http://imgur.com/9O0g1', 'test3'),
('4', '轉賣日貨 透膚細腿菱格愛心絲襪', '4', '4', NULL, 'test4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
