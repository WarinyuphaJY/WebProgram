-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for book_store
CREATE DATABASE IF NOT EXISTS `book_store` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `book_store`;

-- Dumping structure for table book_store.book
CREATE TABLE IF NOT EXISTS `book` (
  `bookID` varchar(5) NOT NULL,
  `bookName` varchar(50) NOT NULL,
  `typeID` char(3) NOT NULL,
  `statusID` char(2) NOT NULL,
  `publish` varchar(20) DEFAULT NULL,
  `unitPrice` int(4) NOT NULL,
  `unitRent` int(2) NOT NULL,
  `dayAmount` int(2) DEFAULT NULL,
  `picture` varchar(30) DEFAULT NULL,
  `bookDate` date NOT NULL,
  PRIMARY KEY (`bookID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table book_store.book: ~5 rows (approximately)
DELETE FROM `book`;
INSERT INTO `book` (`bookID`, `bookName`, `typeID`, `statusID`, `publish`, `unitPrice`, `unitRent`, `dayAmount`, `picture`, `bookDate`) VALUES
	('00001', 'Doremon', '001', '01', 'Kpn', 150, 3, 2, '-', '2025-02-03'),
	('00002', 'เก็บตะวัน', '002', '03', 'WRP', 250, 5, 3, '-', '2025-02-03'),
	('00003', 'สิ่งมีชีวต', '002', '01', 'YPR', 185, 3, 3, '-', '2025-02-03'),
	('00004', 'คู่สร้างคู่สม', '003', '01', 'DDR', 20, 1, 2, '-', '2025-02-03'),
	('00005', 'Konan', '001', '02', 'Kpn', 80, 2, 2, '-', '2025-02-03');

-- Dumping structure for table book_store.book_status
CREATE TABLE IF NOT EXISTS `book_status` (
  `statusID` char(2) NOT NULL,
  `statusName` varchar(20) NOT NULL,
  PRIMARY KEY (`statusID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table book_store.book_status: ~3 rows (approximately)
DELETE FROM `book_status`;
INSERT INTO `book_status` (`statusID`, `statusName`) VALUES
	('01', 'ปกติ'),
	('02', 'ชำรุด'),
	('03', 'ส่งซ่อม');

-- Dumping structure for table book_store.book_type
CREATE TABLE IF NOT EXISTS `book_type` (
  `typeID` char(3) NOT NULL,
  `typeName` varchar(50) NOT NULL,
  PRIMARY KEY (`typeID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table book_store.book_type: ~3 rows (approximately)
DELETE FROM `book_type`;
INSERT INTO `book_type` (`typeID`, `typeName`) VALUES
	('001', 'การ์ตูน'),
	('002', 'นิยาย'),
	('003', 'นิตยสาร');

-- Dumping structure for table book_store.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` char(4) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table book_store.customer: ~2 rows (approximately)
DELETE FROM `customer`;
INSERT INTO `customer` (`CustomerID`, `Name`, `Surname`, `Address`, `Phone`) VALUES
	('0001', 'สมชัย', 'เชียงพงศ์พันธุ์', 'ปราจีนบุรี', '037213219'),
	('0002', 'Jone', 'Smith', 'กรุงเทพ', '027341293');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
