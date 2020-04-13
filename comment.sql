-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-12-11 02:10
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
