-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-12-10 22:41
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
(1, '어헝헝ㅜㅜㅜ', 'designer', 'designer', 1),
(1, '피드백\r\n', 'designer', 'customer', 0),
(1, '이건 피드백이란거에요', 'designer', 'customer', 0),
(1, '나도 좀 달아보자', 'designer', 'customer', 1),
(1, '오호라 신나는구만', 'designer', 'customer', 1);

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
('designer', 'designer', 1, '0', '색상: 검정\n사이즈: S\n요구사항: 아래 첨부한 사진도 넣어주실 수 있나요?', './images/1_designer.jpg', 1),
('customer', 'designer', 1, '0', '색상: 검정\n사이즈: S\n요구사항: 감사요', './images/1_customer.jpg', 1),
('customer', 'designer', 18, '0', '색상: 블루\n사이즈: S\n요구사항: 옷이 좀 크네요. S랑 M 중간정도의 사이즈도 주문 가능한가요?', '', 0);

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
(1, 'outer', '캘거리 오버핏 패딩 (후드,숏)', 39000, '검정,빨강,네이비', 'S,M,L', '오리털', 'designer', './images/1.jpg', './images/th1.jpg', 2),
(2, 'outer', '후드 배색 난로JP (누빔안감)', 26400, '베이지,블랙', 'S,M,L', '누빔', 'designer', './images/2.jpg', './images/th2.jpg', 0),
(3, 'outer', '뽀글뽀글 숏무스탕', 35100, '블랙,카키', 'M,L', '뽀글이', 'designer', './images/3.jpg', './images/th3.jpg', 0),
(4, 'outer', '도톰 후드집업JK (울20%)', 49500, '검정,네이비,챠콜', 'S,M,L', '울', 'designer', './images/4.jpg', './images/th4.jpg', 0),
(5, 'outer', '오리지널 스트링후드T (기모)', 16700, '블랙,그린,카키,챠콜,네이비,버건디', 'S,M,L,XL', '기모', 'designer', './images/5.jpg', './images/th5.jpg', 0),
(6, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/6.jpg', './images/th6.jpg', 0),
(7, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/7.jpg', './images/th7.jpg', 0),
(8, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/8.jpg', './images/th8.jpg', 0),
(9, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/9.jpg', './images/th9.jpg', 0),
(10, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/10.jpg', './images/th10.jpg', 0),
(11, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/11.jpg', './images/th11.jpg', 0),
(12, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/12.jpg', './images/th12.jpg', 0),
(13, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/13.jpg', './images/th13.jpg', 0),
(14, 'top', '토마토 박시MTM (기모)', 17300, '블랙,베이지', 'S,L', '기모', 'designer', './images/14.jpg', './images/th14.jpg', 0),
(15, 'top', '아가일 라운드한니트 (7게이지3합)', 39000, '블루,베이지,브라운', 'S,M,L,XL', '니트', 'designer', './images/15.jpg', './images/th15.jpg', 0),
(16, 'top', '아가일 라운드한니트 (7게이지3합)', 39000, '블루,베이지,브라운', 'S,M,L,XL', '니트', 'designer', './images/16.jpg', './images/th16.jpg', 0),
(17, 'top', '아가일 라운드한니트 (7게이지3합)', 39000, '블루,베이지,브라운', 'S,M,L,XL', '니트', 'designer', './images/17.jpg', './images/th17.jpg', 0),
(18, 'top', '아가일 라운드한니트 (7게이지3합)', 39000, '블루,베이지,브라운', 'S,M,L,XL', '니트', 'designer', './images/18.jpg', './images/th18.jpg', 1);

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
('customer', '*89C6B530AA78695E257E55D63C00A6EC9AD3E977', 'customer@gmai.com', '2018-12-10', 1, 'customer', '대구광역시 북구', '010-1010-1010', '김고객'),
('designer', '*89C6B530AA78695E257E55D63C00A6EC9AD3E977', 'designer@naver.com', '2018-12-10', 1, 'designer', '대구광역시 중구', '010-1472-1472', '박디자인');

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
  MODIFY `GoodsID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 테이블의 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `rownum` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
