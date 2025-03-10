-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 12:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(4) NOT NULL,
  `CustomerName` varchar(30) NOT NULL,
  `CustomerSurname` varchar(30) NOT NULL,
  `CustomerPhone` varchar(10) DEFAULT NULL,
  `CustomerMembers` varchar(10) DEFAULT NULL,
  `CustomerPoint` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerSurname`, `CustomerPhone`, `CustomerMembers`, `CustomerPoint`) VALUES
('c001', 'กชพรรณ', 'แสงอุทัย', '0659994171', '0659994171', 500),
('c002', 'มุกดา', 'มาลี', '0923320159', '0923320159', 233),
('c003', 'ณัฐวัฒน์', 'เพียงจันทร์', '0970102426', '0970102426', 86),
('c004', 'ชวิน', 'ปิยะ', '0671854967', '0671854967', 80),
('c005', 'เมทินี', 'ทองสมบูรณ์', '0624312090', '0624312090', 249),
('c006', 'มานี', 'สวยสม', '0974321680', '0974321680', 700);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` varchar(4) NOT NULL,
  `EmployeeName` varchar(30) NOT NULL,
  `EmployeeSurname` varchar(30) NOT NULL,
  `EmployeeGender` char(10) NOT NULL,
  `EmployeeBD` varchar(30) NOT NULL,
  `EmployeeAddr` varchar(60) DEFAULT NULL,
  `EmployeePhone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `EmployeeName`, `EmployeeSurname`, `EmployeeGender`, `EmployeeBD`, `EmployeeAddr`, `EmployeePhone`) VALUES
('e001', 'ชญานิศ', 'ขวัญมา', 'หญิง', '16-01-2000', 'สระแก้ว', '0851210303'),
('e002', 'จตุพล', 'เฉิดฉัน', 'ชาย', '03-11-1995', 'นนทบุรี', '0619273080'),
('e003', 'ผการัตน์', ' ทองสุข', 'หญิง', '18-09-1999', 'อยุธยา', '0926693021'),
('e004', 'นิธิชัย', 'เหินเวหา', 'ชาย', '03-06-1999', 'ลพบุรี', '0623456791'),
('e005', 'สายใจ', 'เกาะมหาสมุทร', 'หญิง', '19-05-2000', 'สมุทรปราการ', '0871642598'),
('e006', 'หรูหรา', 'ออมดอง', 'หญิง', '12-01-1991', 'กรุงเทพฯ', '0981670345');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(5) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductQuantity` varchar(10) NOT NULL,
  `ProductPrice` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `ProductName`, `ProductQuantity`, `ProductPrice`) VALUES
('q001', 'มาการอง', '2', 218),
('q002', 'ครัวซองค์, เอสเปรสโซ่', '2, 1', 119),
('q003', 'ครัวซองค์, อเมริกาโน่ร้อน', '1, 1', 89),
('q004', 'เอสเปรสโซ่', '1', 69),
('q005', 'ลาเต้, มาการอง, บัตเตอร์เตอร์', '1, 1, 1', 213),
('q006', 'ลาเต้, มาการอง', '1, 1', 168);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` varchar(4) NOT NULL,
  `ProductName` varchar(30) NOT NULL,
  `ProductPrice` int(4) NOT NULL,
  `ProductQuantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductPrice`, `ProductQuantity`) VALUES
('p001', 'มาการอง', 109, 50),
('p002', 'ครัวซองค์', 50, 200),
('p003', 'เอสเปรสโซ่', 69, 200),
('p004', 'อเมริกาโน่ร้อน', 39, 50),
('p005', 'ลาเต้', 59, 100),
('p006', 'บัตเตอร์เค้ก', 45, 100);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `QueueID` varchar(5) NOT NULL,
  `EmployeeID` varchar(4) NOT NULL,
  `EmployeeName` varchar(50) NOT NULL,
  `CustomerID` varchar(4) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `ProductID` varchar(4) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductQuantity` varchar(10) NOT NULL,
  `TotalPrice` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`QueueID`, `EmployeeID`, `EmployeeName`, `CustomerID`, `CustomerName`, `ProductID`, `ProductName`, `ProductQuantity`, `TotalPrice`) VALUES
('q001', 'e003', 'ผการัตน์ ทองสุข', 'c005', 'เมทินี ทองสมบูรณ์', 'p001', 'มาการอง', '2', 218),
('q002', 'e001', 'ชญานิศ ขวัญมา', 'c006', 'มานี สวยสม', 'p002', 'ครัวซองค์, เอสเปรสโซ่', '2, 1', 169),
('q003', 'e005', 'สายใจ เกาะมหาสมุทร', 'c004', 'ชวิน ปิยะ', 'p004', 'ครัวซองค์, อเมริกาโน่ร้อน', '1, 1', 89),
('q004', 'e004', 'นิธิชัย เหินเวหา', 'c002', 'มุกดา มาลี', 'p003', 'เอสเปรสโซ่', '1', 69),
('q005', 'e002', 'จตุพล เฉิดฉัน', 'c003', 'ณัฐวัฒน์ เพียงจันทร์', 'p005', 'ลาเต้, มาการอง, บัตเตอร์เค้ก', '1, 1, 1', 213),
('q006', 'e006', 'หรูหรา ออมดอง', 'c001', 'กชพรรณ แสงอุทัย', 'p001', 'ลาเต้, มาการอง', '1, 1', 168);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`QueueID`),
  ADD KEY `orders_ibfk_1` (`EmployeeID`),
  ADD KEY `orders_ibfk_2` (`CustomerID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
