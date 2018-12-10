-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-12-11 04:33
-- 서버 버전: 10.1.37-MariaDB
-- PHP 버전: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `GoodsID` int(16) NOT NULL,
  `memo` text CHARACTER SET utf8 NOT NULL,
  `DesignerID` char(16) NOT NULL,
  `CustomerID` char(16) NOT NULL,
  `co_num` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`GoodsID`, `memo`, `DesignerID`, `CustomerID`, `co_num`) VALUES
(24, 'test2', 'ABC', '1', 0),
(24, 'test3', 'ABC', '1', 0),
(24, '디자이너도 할래', 'ABC', '1', 1),
(25, '호롤롤롤로로', 'ABC', '1', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `feedback`
--

CREATE TABLE `feedback` (
  `CustomerID` char(16) DEFAULT NULL,
  `DesignerID` char(16) NOT NULL,
  `GoodsID` int(11) NOT NULL,
  `title` char(255) CHARACTER SET utf8 NOT NULL,
  `body` text CHARACTER SET utf8 NOT NULL,
  `link` char(30) DEFAULT NULL,
  `permit` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `feedback`
--

INSERT INTO `feedback` (`CustomerID`, `DesignerID`, `GoodsID`, `title`, `body`, `link`, `permit`) VALUES
('', 'ABC', 0, 'a', 'b', '0', 0),
('', '', 0, 'hi', 'hello', '0', 0),
('', '0', 0, 'A', 'ABC', '0', 0),
('', '0', 0, 'a', 'b', '0', 0),
('1', 'ABC', 0, '2', '3', '0', 0),
('wsr', 'ABC', 0, 'a', 'b', '0', 0),
('ww', 'ABC', 0, '1', '3', '0', 0),
('customer', 'ABC', 0, 's', 'v', '0', 0),
('1', 'ABC', 0, '2', '3', '0', 0),
('90', 'ABC', 0, 'a', 'b', '0', 0),
('1', 'ABC', 24, '0', '0', '0', 0),
('1', 'ABC', 0, '1', '1', '0', 0),
(NULL, 'ABC', 22, '', '', '0', 1),
('1', 'ABC', 24, 'title', 'body', '0', 1),
('1', 'ABC', 25, '0', '색상: #000000\n사이즈: XS\n요구사항: ', '0', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `item`
--

CREATE TABLE `item` (
  `GoodsID` int(16) NOT NULL,
  `CategoryID` char(20) CHARACTER SET utf8 NOT NULL,
  `ItemName` char(20) CHARACTER SET utf8 NOT NULL,
  `price` int(20) NOT NULL,
  `color` char(20) CHARACTER SET utf8 NOT NULL,
  `size` char(20) CHARACTER SET utf8 NOT NULL,
  `material` char(20) CHARACTER SET utf8 NOT NULL,
  `DesignerID` char(16) CHARACTER SET utf8 NOT NULL,
  `IMG` char(60) NOT NULL,
  `thumb` char(40) NOT NULL,
  `total_order` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `item`
--

INSERT INTO `item` (`GoodsID`, `CategoryID`, `ItemName`, `price`, `color`, `size`, `material`, `DesignerID`, `IMG`, `thumb`, `total_order`) VALUES
(1, 'outer', '1', 2, '#000000', '3', '4', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(2, 'outer', '진호', 123, '#000000', '123', '11114', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(3, 'Outer', '1', 1, '#000000', '1', '11114', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(4, 'Outer', '1', 4, '#000000', '6', '7', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(5, 'Outer', '124', 134155, '#000000', '3413', '2534', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(6, 'Outer', '11', 1, '#000000', '1', '1', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(8, 'Outer', '114', 0, '#000000', 'af', 'df', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(9, 'Outer', '1', 4, '#000000', '2345', '346', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(10, 'Outer', '111', 111, '#000000', '1110', '1110191', 'ABC', '/images/.jpg', '/images/th.jpg', 0),
(11, 'Outer', '1', 2, '#000000', '3', '5', '', '/images/.jpg', '/images/th.jpg', 0),
(12, 'Outer', '114', 2315, '#000000', '453214', '2351451', '', '/images/.jpg', '/images/th.jpg', 0),
(13, 'Outer', '123', 2134, '#000000', '23415', '2134', '', '/images/.jpg', '/images/th.jpg', 0),
(14, 'Outer', '123', 123, '#000000', '123', '123', '', '/images/.jpg', '/images/th.jpg', 0),
(15, 'Outer', 'asd', 0, '#000000', 'asdf', 'asdf', '', '/images/.jpg', '/images/th.jpg', 0),
(16, 'Outer', '123', 1234, '#000000', '1435234', '12345', '', '/images/.jpg', '/images/th.jpg', 0),
(17, 'Outer', '123', 135, '#000000', '1456', '2345', '', '/images/.jpg', '/images/th.jpg', 0),
(18, 'Outer', '1234', 1234, '#000000', '1234', '243', '', '/images/.jpg', '/images/th.jpg', 0),
(19, 'Outer', '123', 123, '#000000', '1234', '1234', '', '/images/.jpg', '/images/th.jpg', 0),
(20, 'Outer', '1234', 1234, '#000000', '1234', '1234', '', '/images/.jpg', '/images/th.jpg', 0),
(21, 'Outer', '31', 1234, '#000000', '125214', '1345', '', '/images/.jpg', '/images/th.jpg', 0),
(22, 'Outer', '123', 123, '#000000', '123', '123', '', '/images/21.jpg', '/images/th21.jpg', 0),
(23, 'Outer', '123', 123, '#000000', '123', '123', 'ABC', '/images/23.jpg', '/images/th23.jpg', 0),
(24, 'Outer', '1234', 134, '#000000', '1234', '1234', 'ABC', './images/24.jpg', './images/th24.jpg', 0),
(25, 'outer', 'a', 110, '#000000', 'XS,L', 'f', 'ABC', './images/25.jpg', './images/th25.jpg', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `id` char(16) DEFAULT NULL,
  `pass` char(41) DEFAULT NULL,
  `mail` char(40) DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `permit` tinyint(3) DEFAULT NULL,
  `regist_type` char(10) DEFAULT NULL,
  `address` char(30) CHARACTER SET utf8 NOT NULL,
  `phone` char(13) NOT NULL,
  `name` char(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`id`, `pass`, `mail`, `regdate`, `permit`, `regist_type`, `address`, `phone`, `name`) VALUES
('a', '*F33AE6DD04EF4C7C1D3105568E7FB7C1EE16C937', '', '2018-11-22', 1, 'customer', '', '', ''),
('1', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', '', '2018-11-30', 1, 'customer', '', '', ''),
('design', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', '', '2018-11-30', 1, 'designer', '', '', ''),
(NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
('2', '*12033B78389744F3F39AC4CE4CCFCAD6960D8EA0', '', '2018-12-01', 1, 'customer', '???', '010-1111-1111', '?????'),
('2', '*12033B78389744F3F39AC4CE4CCFCAD6960D8EA0', '', '2018-12-01', 1, 'designer', 'jino', '010-1234-1234', 'jino home'),
('a', '*F33AE6DD04EF4C7C1D3105568E7FB7C1EE16C937', '', '2018-12-01', 1, 'customer', 'jino', '010-1234-1234', 'jino home'),
('jino', '*BBDA821D54ECC11EE1428782C23BD0854D82BC4D', '', '2018-12-03', 1, 'designer', 'jino', '010-1111-1111', 'jiho home'),
('jinno', '*C196FA05F8C6D5CEA052CC8E0239B9ED708FAF26', '', '2018-12-03', 1, 'designer', '호류진', '010-1111-1111', '진호집'),
('jino1234', '*BBDA821D54ECC11EE1428782C23BD0854D82BC4D', '', '2018-12-03', 1, 'customer', '진호집', '010-1111-1111', '호류진'),
('ABC', '*26307F6B5CDB40C15C247B96C131CC1E0B3FFD1B', '', '2018-12-03', 1, 'designer', '진호집', '010-1111-1111', '호류진'),
('jimin', '*140B51DE6C6658173B1F3CD15626D2D3E1EE4281', 'jimin@travel.com', '2018-12-03', 1, 'designer', '아 휴대전화 구분자 넣어야될듯', '01014721472', '지민킴'),
('3', '*908BE2B7EB7D7567F7FF98716850F59BA69AA9DB', '5', '2018-12-08', 1, 'customer', '7', '6', '12'),
('rkd', '*A4B6157319038724E3560894F7F932C8886EBFCF', '', '2018-12-10', 1, 'designer', '', '', 'rkd');

-- --------------------------------------------------------

--
-- 테이블 구조 `message`
--

CREATE TABLE `message` (
  `rownum` int(30) NOT NULL,
  `DesignerID` char(16) NOT NULL,
  `CustomerID` char(16) NOT NULL,
  `title` char(255) CHARACTER SET utf8 NOT NULL,
  `body` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `message`
--

INSERT INTO `message` (`rownum`, `DesignerID`, `CustomerID`, `title`, `body`) VALUES
(1, 'a', '1', 'b', 'c'),
(2, 'ABC', '1', 'test', 'test');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `item`
--
ALTER TABLE `item`
  ADD UNIQUE KEY `GoodsID` (`GoodsID`);

--
-- 테이블의 인덱스 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`rownum`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `GoodsID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 테이블의 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `rownum` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
