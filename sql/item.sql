-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-12-10 17:20
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
(1, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/1.jpg', './images/th1.jpg', 0),
(2, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/2.jpg', './images/th2.jpg', 0),
(3, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/3.jpg', './images/th3.jpg', 0),
(4, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/4.jpg', './images/th4.jpg', 0),
(5, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/5.jpg', './images/th5.jpg', 0),
(6, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/6.jpg', './images/th6.jpg', 0),
(7, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/7.jpg', './images/th7.jpg', 0),
(8, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/8.jpg', './images/th8.jpg', 0),
(9, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/9.jpg', './images/th9.jpg', 0),
(10, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/10.jpg', './images/th10.jpg', 0),
(11, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/11.jpg', './images/th11.jpg', 0),
(12, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'M,L,XL', '울', 'jino', './images/12.jpg', './images/th12.jpg', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `item`
--
ALTER TABLE `item`
  ADD UNIQUE KEY `GoodsID` (`GoodsID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `GoodsID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
