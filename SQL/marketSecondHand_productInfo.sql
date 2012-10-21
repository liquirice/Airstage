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
-- Table structure for table `marketSecondHand_productInfo`
--

CREATE TABLE IF NOT EXISTS `marketSecondHand_productInfo` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_pic` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `marketSecondHand_productInfo`
--

INSERT INTO `marketSecondHand_productInfo` (`product_id`, `title`, `description`, `product_pic`) VALUES
(1, '腳踏車', '出清一台捷安特腳踏車~\r\n\r\n無法變速~\r\n\r\n不影響騎乘\r\n\r\n狀況還OK', 'http://ppt.cc/dz38'),
(2, 'Costco 無穀鮭魚馬鈴薯狗飼料', '一大包15.87公斤 售價1199元，1公斤平均75.55元\r\n   收單每單位為2公斤，加上夾鏈袋雜費一包 每一單位共75.55*2+5 = 156元', 'http://www.naturesdomainpetfood.com/about-natures-domain'),
(3, '二手大創鵝黃色圓盤', '二手大創鵝黃色圓盤，欲售$10\r\n**可於翠亨L棟或圖書館前面交，請回站內信，謝謝**', 'http://dl.dropbox.com/u/46956923/2012-07-30%2020.55.04.jpg'),
(4, '全新3M口紅膠(大)，欲售$20', '全新3M口紅膠(大)，欲售$20', 'http://dl.dropbox.com/u/46956923/2012-07-01%2017.05.52.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
