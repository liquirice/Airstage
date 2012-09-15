-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Sep 15, 2012, 04:35 PM
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
-- 資料表格式： `online_list`
--

CREATE TABLE IF NOT EXISTS `online_list` (
  `stu_id` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `online_time` datetime NOT NULL,
  `last_time` datetime NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 列出以下資料庫的數據： `online_list`
--

INSERT INTO `online_list` (`stu_id`, `user_ip`, `online_time`, `last_time`) VALUES
('B993040017', '', '0000-00-00 00:00:00', '2012-09-16 00:33:18');
