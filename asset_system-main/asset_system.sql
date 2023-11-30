-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 01:26 PM
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
-- Database: `asset_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(1) NOT NULL COMMENT 'ไอดีหมวดหมู่ครุภัณฑ์',
  `d_id` varchar(50) NOT NULL COMMENT 'ไอดีปรเภทครุภัณฑ์',
  `c_name` varchar(150) NOT NULL COMMENT 'ชื่อหมวดหมู่ครุภัณฑ์',
  `province_id` varchar(100) NOT NULL DEFAULT '0',
  `doc_file` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รูป'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `d_id`, `c_name`, `province_id`, `doc_file`) VALUES
(1, '01', 'สว่าน', '1', 'cat_65007283154bb.png'),
(2, '01', 'q', '1', 'cat_6500729843749.png'),
(3, '01', 'w', '1', 'cat_650072a9d5bb5.png'),
(4, '01', 'www', '1', 'cat_650072b336d12.png'),
(5, '01', '3333', '1', 'cat_650072c07af78.png'),
(6, '01', 'ttyty', '1', 'cat_6500a1f4aaa8b.png');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(1) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_name_s` varchar(100) NOT NULL,
  `com_date` date NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `line` varchar(100) NOT NULL,
  `address_c` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `com_name`, `com_name_s`, `com_date`, `tel`, `email`, `line`, `address_c`) VALUES
(1, 'บริษัท ยะลานํารุ่ง จํากัด', 'สาขายะลา', '2013-09-05', '0859479515', 'namrung@gmail.com', 'Namrung', 'จังหวัดยะลา');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(2) NOT NULL COMMENT 'ไอดีประเภทครุภัณฑ์',
  `d_code` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `d_name` varchar(150) NOT NULL COMMENT 'ชื่อประเภทครุภัณฑ์'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_code`, `code`, `d_name`) VALUES
(1, '01', '', 'ช่าง');

-- --------------------------------------------------------

--
-- Table structure for table `durable`
--

CREATE TABLE `durable` (
  `dur_id` int(1) NOT NULL COMMENT 'id',
  `date` date NOT NULL COMMENT 'วัน/เดือน/ปี ที่รับ',
  `dur_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'หมายเลขครุภัณฑ์',
  `dur_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายการ',
  `number` int(11) NOT NULL COMMENT 'จำนวน',
  `d_id` int(1) NOT NULL COMMENT 'ไอดีประเภท',
  `c_id` int(1) NOT NULL COMMENT 'ไอดีหมวดหมู่',
  `price` int(11) NOT NULL COMMENT 'ราคาต่อหน่วย',
  `dur_receive` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'วิธีการได้มา',
  `dur_position` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ใช้ประจำที่ ',
  `dur_change` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายการเปลี่ยนแปลง',
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'สภาพครุภัณฑ์',
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียด',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รูปภาพ\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d_order`
--

CREATE TABLE `d_order` (
  `orderID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `dur_id` int(1) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `total_price` float NOT NULL,
  `order_status` int(1) NOT NULL,
  `reg_date` date NOT NULL,
  `date_end` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `d_order`
--

INSERT INTO `d_order` (`orderID`, `dur_id`, `cus_name`, `telephone`, `total_price`, `order_status`, `reg_date`, `date_end`, `file`, `comment`, `status`) VALUES
(000001, 0, 'Nureeyah Yahrah', '087-030-8463', 111, 2, '0000-00-00', '2023-09-09', '', 'ชำรุด', ''),
(000002, 0, 'Nureeyah Yahrah', '087-030-8463', 14900, 4, '0000-00-00', '2023-09-09', '', 'ชำรุด', ''),
(000003, 0, 'Muyaheedeen Yahrah', '087-030-8463', 111, 2, '0000-00-00', '2023-09-11', '', '', ''),
(000004, 0, 'Nureeyah Yahrah', '087-030-8463', 1111, 3, '0000-00-00', '2023-09-11', '', 'ชำรุด', ''),
(000005, 0, 'test_2', '0877878788', 111, 2, '0000-00-00', '2023-09-12', '', '', ''),
(000006, 0, 'test_3', '0877788877', 14900, 2, '0000-00-00', '2023-09-12', '', '', ''),
(000007, 0, 'test_employee', '0778778787', 111, 2, '0000-00-00', '2023-09-12', '', 'ชำรุด', '');

-- --------------------------------------------------------

--
-- Table structure for table `d_order_detail`
--

CREATE TABLE `d_order_detail` (
  `id` int(6) NOT NULL,
  `orderID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `dur_id` int(1) NOT NULL,
  `orderPrice` float NOT NULL,
  `order_Qty` int(11) NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `d_order_detail`
--

INSERT INTO `d_order_detail` (`id`, `orderID`, `dur_id`, `orderPrice`, `order_Qty`, `Total`) VALUES
(1, 000001, 3, 111, 1, 111),
(2, 000002, 2, 14900, 1, 14900),
(3, 000003, 3, 111, 1, 111),
(4, 000004, 4, 1111, 1, 1111),
(5, 000005, 3, 111, 1, 111),
(6, 000006, 2, 14900, 1, 14900),
(7, 000007, 3, 111, 1, 111);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `m_num` varchar(20) NOT NULL COMMENT 'เลข 13 หลัก',
  `telephone` varchar(12) NOT NULL,
  `m_line` varchar(100) NOT NULL,
  `m_img` varchar(255) NOT NULL,
  `m_level` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `m_email`, `m_name`, `m_pass`, `address`, `m_num`, `telephone`, `m_line`, `m_img`, `m_level`, `date`) VALUES
(1, 'admin@localhost.com', 'test_admin', '123456', 'sss', '1-2121-21212-21-2', '2121221-1112', '1', '', 'admin', '2023-11-19'),
(2, 'amc2@localhost.com', 'test_2', 'amc2', 'ss', '1999995595959', '0877878788', '1', '', 'boss', '2023-11-12'),
(3, 'amc3@localhost.com', 'test_3', 'amc3', '', '1989898989898', '0877788877', '', '', 'referee', '0000-00-00'),
(4, 'amc4@localhost.com', 'test_employee', 'amc4', '', '1998989898989', '0778778787', '', '', 'employee', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderID` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบเบิก',
  `cus_name` varchar(60) NOT NULL COMMENT 'ชื่อผู้เบิก',
  `telephone` varchar(12) NOT NULL COMMENT 'เบอร์โทร',
  `total_price` float NOT NULL COMMENT 'ราคา',
  `order_status` int(1) NOT NULL COMMENT 'สถานะการเบิก',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่เบิก',
  `file` varchar(255) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderID`, `cus_name`, `telephone`, `total_price`, `order_status`, `reg_date`, `file`, `comment`, `status`) VALUES
(000001, '', '', 10, 3, '2023-09-09 04:26:00', 's_640c7afd67cd8.pdf', '', '3'),
(000002, 'ซาการียา ยุเหล่', '092-256-6441', 104, 2, '2023-03-11 09:45:40', 's_640c4c937df6d.pdf', '', '1'),
(000003, 'นัจญมีน ยะระ', '065-025-4782', 3224, 2, '2023-03-22 08:19:24', 's_641ab9d7ac061.pdf', '', '1'),
(000004, 'ซาการียา ยุเหล่', '092-256-6441', 50, 2, '2023-03-11 13:00:58', 's_640c7b69db48a.pdf', '', '1'),
(000005, 'นัจญมีน ยะระ', '065-025-4782', 204, 1, '2023-03-13 15:33:31', '', '', ''),
(000006, 'นัจญมีน ยะระ', '065-025-4782', 104, 1, '2023-04-15 16:11:44', '', '', ''),
(000007, 'นัจญมีน ยะระ', '065-025-4782', 208, 1, '2023-04-15 16:14:41', '', '', ''),
(000008, 'นัจญมีน ยะระ', '065-025-4782', 208, 1, '2023-04-15 16:23:16', '', '', ''),
(000009, 'นัจญมีน ยะระ', '065-025-4782', 50, 1, '2023-04-15 16:23:29', '', '', ''),
(000010, 'นัจญมีน ยะระ', '065-025-4782', 104, 1, '2023-04-15 16:42:55', '', '', ''),
(000011, '', '', 104, 1, '2023-04-15 16:49:50', '', '', ''),
(000012, '', '', 104, 1, '2023-04-15 16:50:01', '', '', ''),
(000013, '', '', 104, 1, '2023-04-15 16:50:05', '', '', ''),
(000014, '', '', 104, 1, '2023-04-15 16:51:00', '', '', ''),
(000015, 'นัจญมีน ยะระ', '065-025-4782', 104, 1, '2023-04-15 16:52:25', '', '', ''),
(000016, '', '', 104, 1, '2023-04-15 17:09:44', '', '', ''),
(000017, '', '', 104, 1, '2023-04-15 17:09:47', '', '', ''),
(000018, '', '', 104, 1, '2023-04-15 17:49:14', '', '', ''),
(000019, '', '', 104, 1, '2023-04-15 17:49:17', '', '', ''),
(000020, '', '', 104, 1, '2023-05-16 01:45:48', '', '', ''),
(000021, 'ซาการียา ยุเหล่', '092-256-6441', 1258, 2, '2023-08-16 15:22:39', 's_64dce9366f7e8.pdf', '', '1'),
(000022, 'นัจญมีน ยะระ', '065-025-4782', 250, 1, '2023-09-04 02:34:33', '', '', ''),
(000023, 'นัจญมีน ยะระ', '065-025-4782', 0, 1, '2023-09-04 02:34:35', '', '', ''),
(000024, 'นูรียะ ยะระ', '065-556-5225', 208, 2, '2023-09-04 02:37:48', 's_64f5429a6f765.pdf', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`) USING BTREE;

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`) USING BTREE;

--
-- Indexes for table `durable`
--
ALTER TABLE `durable`
  ADD PRIMARY KEY (`dur_id`);

--
-- Indexes for table `d_order`
--
ALTER TABLE `d_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `d_order_detail`
--
ALTER TABLE `d_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(1) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีหมวดหมู่ครุภัณฑ์', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีประเภทครุภัณฑ์', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durable`
--
ALTER TABLE `durable`
  MODIFY `dur_id` int(1) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT for table `d_order`
--
ALTER TABLE `d_order`
  MODIFY `orderID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `d_order_detail`
--
ALTER TABLE `d_order_detail`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบเบิก', AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
