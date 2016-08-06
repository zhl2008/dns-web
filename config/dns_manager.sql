-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 07 月 17 日 05:53
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dns_manager`
--
CREATE DATABASE IF NOT EXISTS `dns_manager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dns_manager`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uname` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`uname`, `passwd`, `qq`, `email`) VALUES
('haozi', 'haishihaozigegechuti', 'do not tell you', 'zhl2008vvvss@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `dns`
--

CREATE TABLE IF NOT EXISTS `dns` (
  `domain` varchar(100) NOT NULL,
  `server` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dns`
--

INSERT INTO `dns` (`domain`, `server`, `ip`) VALUES
('example.com', '10.0.0.10', '1.1.1.1'),
('example.com', '10.0.0.10', '1.1.1.2'),
('example.com', '10.0.0.10', '1.1.1.3'),
('example.com', '10.0.0.10', '1.1.1.4'),
('example.com', '10.0.0.10', '1.1.1.5'),
('example.com', '10.0.0.10', '1.1.1.6'),
('example.com', '10.0.0.10', '1.1.1.7'),
('example.com', '10.0.0.10', '1.1.1.8'),
('example.com', '10.0.0.10', '1.1.1.9'),
('example.com', '10.0.0.10', '1.1.1.10'),
('example.com', '10.0.0.10', '1.1.1.11'),
('example.com', '10.0.0.10', '1.1.1.12'),
('example.com', '10.0.0.10', '1.1.1.14');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `send_time` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`mid`, `nickname`, `message`, `send_time`) VALUES
(6, 'haozi', 'holyshit', '111212169'),
(7, 'haozi', 'holyshit', '1112121621'),
(8, 'haozi', 'holyshit', '111212151'),
(9, 'haozi', 'holyshit', '1113232'),
(10, 'haozi', 'holyshit', '111232'),
(11, 'haozi', 'holyshit', '11123234434'),
(12, 'haozi', 'holyshit', '11123234434'),
(13, 'haozi', 'holyshit', '11123234334'),
(14, 'haozi', 'holyshit', '11123254334'),
(15, 'haozi', 'holyshit', '11173254334'),
(16, 'haozi', 'holyshit', '11178254334'),
(17, 'haozi', 'holyshit', '11178254434'),
(18, '游客', '啊啊啊', '1468572990'),
(19, '游客', '啊啊啊', '1468573028'),
(20, '游客', '啊啊啊', '1468573203'),
(21, '游客', 'test', '1468573210'),
(22, '游客', 'alert(''xss'')', '1468573221'),
(24, 'haozi', 'haozihaozi', '1468722294'),
(25, 'haozi', 'ISCC is password', '1468722313'),
(26, 'haozi', 'that''s impossible', '1468722330');

-- --------------------------------------------------------

--
-- 表的结构 `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_name` varchar(35) NOT NULL,
  `add_time` varchar(20) NOT NULL DEFAULT '0',
  `domain` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `modules`
--

INSERT INTO `modules` (`module_name`, `add_time`, `domain`) VALUES
('e618f5dd757c5575af2a995a5c9e7b95.py', '121322323', 'example.com'),
('e618f5dd757c5575af2a995a5c9e7b95.py', '121322323', 'example2.com'),
('f2d9cadd625c686eadd333a09603d0d2.py', '1468732445', 'example.com'),
('b248d0aaf847b27626cc71b972ded48d.py', '1468733205', 'haozige.cn'),
('d1c9017baea39e065afe731711b664fb.py', '1468733361', 'haozige.cn');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
