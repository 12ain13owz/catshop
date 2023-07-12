-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 06:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_thai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `firstname`, `lastname`, `type`) VALUES
(5, 'dryst', '81dc9bdb52d04dc20036', 'Phaiboon', 'Withanthamrong', 0),
(8, 'root', '81dc9bdb52d04dc20036', 'Administrator', '001', 0),
(9, '1234', '81dc9bdb52d04dc20036', '1234', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_thai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(13, 'ของเล่น'),
(12, 'อาหาร'),
(14, 'อุปกรณ์');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proId` int(11) NOT NULL,
  `proName` varchar(30) NOT NULL,
  `proDesc` varchar(500) NOT NULL,
  `proPrice` decimal(10,0) NOT NULL,
  `proAmount` decimal(10,0) NOT NULL,
  `proView` int(11) NOT NULL,
  `proPhoto` varchar(30) NOT NULL,
  `catId` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_thai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proId`, `proName`, `proDesc`, `proPrice`, `proAmount`, `proView`, `proPhoto`, `catId`, `createDate`) VALUES
(13, 'PRO PLAN KITTEN', 'ลูกแมว หลังหย่านม อายุ 6 สัปดาห์ ถึง 1 ปี', 990, 30, 0, 'proplan-1.png', 12, '2020-12-16 14:34:57'),
(14, 'PRO PLAN Adult chicken with OP', 'สำหรับ แมวโตอายุ 1 ปีขึ้นไป สูตรไก่', 1260, 30, 5, 'proplan-2.png', 12, '2020-12-16 14:36:47'),
(15, 'PRO PLAN Adult salmon with OPT', 'สำหรับ แมวโตอายุ 1 ปีขึ้นไป สูตรปลาแซลมอน', 1550, 30, 1, 'proplan-3.png', 12, '2020-12-16 14:38:04'),
(16, 'PRO PLAN Adult 7+', 'สำหรับแมวโตอายุ 7 ปีขึ้นไป', 1390, 30, 0, 'proplan-4.png', 12, '2020-12-16 14:38:33'),
(17, 'PRO PLAN Sterilised/Weight Los', 'แมวทำหมัน อายุ 1 ปีขึ้นไป/ แมวโตที่ต้องการควบคุมน้ำหนัก', 1090, 30, 0, 'proplan-5.png', 12, '2020-12-16 14:39:17'),
(18, 'PRO PLAN House Cat', 'แมวโตเลี้ยงในบ้าน อายุ 1 ปีขึ้นไป', 1170, 20, 0, 'proplan-6.png', 12, '2020-12-16 14:39:51'),
(19, 'PRO PLAN Derma Plus', 'สูตรควบคุมการเกิดก้อนขนและบำรุงผิวหนัง', 1290, 20, 0, 'proplan-7.png', 12, '2020-12-16 14:40:24'),
(20, 'Ragdoll', 'ของเล่นแมว', 40, 100, 0, 'carrot.png', 13, '2020-12-16 14:59:41'),
(21, 'ไม้ตกแมว', 'ของเล่นแมว', 20, 200, 1, 'cat.png', 13, '2020-12-16 15:00:24'),
(22, 'คอนโดแมว', 'คอนโดแมวพร้อมสไลด์เดอร์ 3 ชั้น', 5690, 10, 3, 'condo.png', 14, '2020-12-16 15:01:16'),
(23, 'ที่ฝนเล็บแมว', 'ใช้ฝนเล็บแมวเพื่อคลายเครียด', 50, 40, 0, 'crown.png', 14, '2020-12-16 15:01:55'),
(24, 'ปลาทู catnip', 'ของเล่น', 100, 40, 0, 'fish.png', 13, '2020-12-16 15:02:17'),
(25, 'น้ำพุแมว', '- ดีไซน์อัจฉริยะระดับโลก การันตีจากสถาบันระดับโลก\r\nอย่าง Red dot design, Germany\r\n- ถังเก็บน้ำเกรด ABS แข็งแรง ถอดล้างได้ง่าย\r\n- มีช่องบอกระดับน้ำคงเหลือ\r\n- มีระบบไฟเตือนเมื่อไส้กรองน้ำหมดอายุ\r\n- แผ่นกรองพิเศษ สามชั้น (ถอดเปลี่ยนได้) ซื้อเพิ่มเติมได้', 1390, 15, 3, 'petkit.png', 14, '2020-12-16 15:02:58'),
(26, 'กระบะทรายแมว', 'กระบะทรายแมว พร้อมที่ตัก ห้องน้ำแมว ฝาครอบสีขาวมีตะแกรงในตัว', 190, 70, 1, 'toilet.png', 14, '2020-12-16 15:03:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`),
  ADD UNIQUE KEY `catName` (`catName`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proId`),
  ADD KEY `catId` (`catId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
