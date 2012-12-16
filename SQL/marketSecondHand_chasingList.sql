-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Dec 09, 2012, 10:30 AM
-- 伺服器版本: 5.1.53
-- PHP 版本: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `airstage`
--

-- --------------------------------------------------------

--
-- 資料表格式： `marketsecondhand_chasinglist`
--

CREATE TABLE IF NOT EXISTS `marketsecondhand_chasinglist` (
  `stu_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trade_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `markTime` datetime NOT NULL,
  `star` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 列出以下資料庫的數據： `marketsecondhand_chasinglist`
--

INSERT INTO `marketsecondhand_chasinglist` (`stu_id`, `trade_id`, `markTime`, `star`) VALUES
('B993040017', '3', '2012-10-25 00:00:00', 0),
('B996060015', '3', '2012-10-06 00:00:00', 1),
('B996060015', '4', '2012-10-20 23:56:21', 1),
('B993040017', '2', '2012-12-25 00:00:00', 1);
