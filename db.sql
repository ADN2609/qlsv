-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2018 lúc 02:44 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `paysystem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `id` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `detail` text NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`id`, `branch`, `address`, `detail`, `delete_status`) VALUES
(1, 'K8E', 'ThÃ nh Phá»‘ ThÃ¡i NguyÃªn', 'Äá»“ng Quang', '1'),
(2, 'K8A', 'ThÃ nh Phá»‘ ThÃ¡i NguyÃªn', 'ThÃ¡i NguyÃªn', '1'),
(3, 'K8B', 'ThÃ nh Phá»‘ ThÃ¡i NguyÃªn', 'ThÃ¡i NguyÃªn', '1'),
(4, 'K8A', 'Thanh HÃ³a', 'Triá»‡u SÆ¡n', '0'),
(5, 'K8B', 'Thanh HÃ³a', 'Thiá»‡u HÃ³a', '0'),
(6, 'K8C', 'Thanh HÃ³a', 'Hoáº±ng HÃ³a', '0'),
(7, 'K8D', 'ThÃ¡i NguyÃªn', 'Äá»“ng Quang', '0'),
(8, 'K8E', 'ThÃ¡i NguyÃªn', 'TÃ¢n Láº­p', '0'),
(9, 'K8F', 'ThÃ¡i NguyÃªn', 'HoÃ ng VÄƒn Thá»¥', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fees_transaction`
--

CREATE TABLE `fees_transaction` (
  `id` int(255) NOT NULL,
  `stdid` varchar(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `submitdate` datetime NOT NULL,
  `transcation_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `fees_transaction`
--

INSERT INTO `fees_transaction` (`id`, `stdid`, `paid`, `submitdate`, `transcation_remark`) VALUES
(1, '1', 1500000, '2018-12-12 00:00:00', 'NamIT Test'),
(2, '1', 100000, '2018-12-15 00:00:00', 'Ko thanh toÃ¡n cáº¯t');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `joindate` datetime NOT NULL,
  `about` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `fees` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `emailid`, `sname`, `joindate`, `about`, `contact`, `fees`, `branch`, `balance`, `delete_status`) VALUES
(1, 'levana@gmail.com', 'LÃª VÄƒn A', '2018-12-12 00:00:00', 'Sinh viÃªn Æ°u tÃº', '012345678', 2000000, '1', 400000, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `emailid`, `lastlogin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lewa', 'lewa@gmail.com', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `fees_transaction`
--
ALTER TABLE `fees_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `fees_transaction`
--
ALTER TABLE `fees_transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
