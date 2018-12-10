-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-12-11 04:27
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
-- 테이블의 인덱스 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`rownum`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `rownum` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
