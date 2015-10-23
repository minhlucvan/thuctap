-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2015 at 06:35 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Thuctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_donvi`
--

CREATE TABLE IF NOT EXISTS `dm_donvi` (
  `code` int(10) NOT NULL,
  `dm_xaphuongcode` int(10) DEFAULT NULL,
  `stt` int(10) DEFAULT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `tendonvi` varchar(255) DEFAULT NULL,
  `sdt` varchar(11) DEFAULT NULL,
  `nguoidaidien` varchar(255) DEFAULT NULL,
  `ghichu` text
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_donvi`
--

INSERT INTO `dm_donvi` (`code`, `dm_xaphuongcode`, `stt`, `ma`, `tendonvi`, `sdt`, `nguoidaidien`, `ghichu`) VALUES
(28, 3, 2, 'QT', 'Tiểu Học Quang Trung', '0123456789', 'người đại diện 1', 'Tiểu Học Quang Trung'),
(26, 1, 2, 'jdasjdbj', 'bjbsjabjb', 'jbjsabjbj', '', ''),
(24, 1, 1, 'dkabs', 'babjsb', 'bsjabjb', 'bjsabjb', 'jbsjabjb'),
(27, 3, 1, 'HH', 'Mầm Non Hoa Hồng', '0123456789', 'Hoa Hồng', '');

-- --------------------------------------------------------

--
-- Table structure for table `dm_quanhuyen`
--

CREATE TABLE IF NOT EXISTS `dm_quanhuyen` (
  `code` int(10) NOT NULL,
  `dm_tinhthanhcode` int(10) DEFAULT NULL,
  `stt` int(10) DEFAULT NULL,
  `ma` varchar(10) DEFAULT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `kieu` tinyint(3) unsigned DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_quanhuyen`
--

INSERT INTO `dm_quanhuyen` (`code`, `dm_tinhthanhcode`, `stt`, `ma`, `ten`, `kieu`) VALUES
(1, 1, 1, 'HK', 'Hoàn Kiếm', 2),
(2, 1, 2, 'BD', 'Ba Đình', 2),
(3, 1, 4, 'TH', 'Tây Hồ', 2),
(4, 1, 5, 'LB', 'Long Biên', 2),
(5, 3, 1, 'ND', 'Nam Đông', 2),
(6, 3, 3, 'PL', 'Phú Lộc', 2),
(7, 3, 2, 'PD', 'Phong Điền', 2),
(9, 2, 1, 'Q1', 'Quận 1', 2),
(10, 2, 2, 'Q2', 'Quận 2', 2),
(11, 2, 3, 'Q3', 'Quận 3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dm_tinhthanh`
--

CREATE TABLE IF NOT EXISTS `dm_tinhthanh` (
  `code` int(10) NOT NULL,
  `stt` int(10) DEFAULT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `kieu` tinyint(3) unsigned DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_tinhthanh`
--

INSERT INTO `dm_tinhthanh` (`code`, `stt`, `ma`, `ten`, `kieu`) VALUES
(1, 1, 'HN', 'Hà Nội', 2),
(2, 2, 'TP.HCM', 'Thành Phố Hồ CHí Mình', 2),
(3, 3, 'TTH', 'Thừa Thiên Huế', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_xaphuong`
--

CREATE TABLE IF NOT EXISTS `dm_xaphuong` (
  `code` int(10) NOT NULL,
  `dm_quanhuyencode` int(10) DEFAULT NULL,
  `stt` int(10) DEFAULT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `kieu` tinyint(3) unsigned DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_xaphuong`
--

INSERT INTO `dm_xaphuong` (`code`, `dm_quanhuyencode`, `stt`, `ma`, `ten`, `kieu`) VALUES
(1, 1, 1, 'CDD', 'Chương Dương Độ', 2),
(2, 2, 1, 'DK', 'Đội Cấn', 2),
(3, 2, 2, 'GV', 'Giảng Võ', 2),
(4, 2, 3, 'KM', 'Kim Mã', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_donvi`
--
ALTER TABLE `dm_donvi`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dm_quanhuyen`
--
ALTER TABLE `dm_quanhuyen`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dm_tinhthanh`
--
ALTER TABLE `dm_tinhthanh`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dm_xaphuong`
--
ALTER TABLE `dm_xaphuong`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_donvi`
--
ALTER TABLE `dm_donvi`
  MODIFY `code` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `dm_quanhuyen`
--
ALTER TABLE `dm_quanhuyen`
  MODIFY `code` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dm_tinhthanh`
--
ALTER TABLE `dm_tinhthanh`
  MODIFY `code` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_xaphuong`
--
ALTER TABLE `dm_xaphuong`
  MODIFY `code` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
