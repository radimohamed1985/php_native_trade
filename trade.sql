-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 02:37 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trade`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `client_id`, `dept`, `credit`, `balance`, `date`) VALUES
(3, 2, 380, 0, 829, '2021-12-13'),
(4, 1, 210, 210, 0, '2021-12-13'),
(9, 1, 228, 228, 0, '2021-12-13'),
(10, 2, 198, 0, 1027, '2021-12-13'),
(11, 2, 210, 0, 1237, '2021-12-13'),
(12, 5, 230, 0, 230, '2021-12-13'),
(13, 8, 230, 0, 230, '2021-12-13'),
(14, 1, 230, 230, 0, '2021-12-13'),
(15, 1, 230, 230, 0, '2021-12-13'),
(16, 1, 230, 230, 0, '2021-12-13'),
(27, 1, 270, 270, 0, '2021-12-14'),
(29, 1, 0, 500, -500, '2021-12-14'),
(30, 2, 0, 500, 737, '2021-12-14'),
(31, 1, 230, 230, -500, '2021-12-14'),
(32, 2, 196, 0, 933, '2021-12-14'),
(33, 10, 360, 0, 360, '2022-01-02'),
(34, 10, 0, 100, 260, '2022-01-02'),
(35, 12, 230, 0, 230, '2022-01-02'),
(36, 12, 0, 100, 130, '2022-01-03'),
(37, 1, 1150, 1150, -500, '2022-01-02'),
(38, 10, 430, 0, 690, '2022-01-02'),
(39, 10, 0, 100, 590, '2022-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_name`) VALUES
(1, 'نقدى'),
(2, 'ناصرالهدايا'),
(3, 'بينو'),
(4, 'قهوة_بلدى'),
(5, 'عبادالرحمن'),
(6, 'عم_سعد'),
(7, 'نور_البدر'),
(8, 'السما_ماركت'),
(9, 'اولاد رجب'),
(10, 'بازار الهالة '),
(11, 'مسعد ماركت'),
(12, 'قهوة فاروق');

-- --------------------------------------------------------

--
-- Table structure for table `fatora`
--

CREATE TABLE `fatora` (
  `serial` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `fatora_date` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fatora`
--

INSERT INTO `fatora` (`serial`, `client_id`, `fatora_date`, `total`) VALUES
(2, 2, '2021-12-13', 44),
(3, 1, '2021-12-14', 270),
(4, 1, '2021-12-14', 230),
(5, 2, '2021-12-14', 196),
(6, 10, '2022-01-02', 360),
(7, 12, '2022-01-02', 230),
(8, 1, '2022-01-02', 1150),
(9, 10, '2022-01-02', 430);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `qty`, `cost`, `total`) VALUES
(1, 'سكر', 230, 69, 200, 15870),
(2, 'neslta ', 40, 75, 38, 3000),
(3, 'شيبسي 5', 44, 90, 43, 3960),
(4, 'لبن جهينة', 170, 10, 160, 1700),
(5, 'هوهوز', 20, 22, 19, 440),
(6, 'لبن لامار', 180, 36, 175, 6480),
(8, 'مولتو', 100, 11, 95, 1100),
(9, 'مياه بركة', 35, 85, 31, 2975),
(10, 'شيبسي 3ج', 33, 90, 30, 2805),
(13, 'شيتوس 5ج', 38, 90, 35, 3230),
(14, 'دوريتوس 2ج', 25, 96, 23, 2275),
(15, 'شاى ليبتون', 95, 22, 90, 2090),
(16, 'شاى العروسة ', 75, 7, 70, 450),
(18, 'اندومى', 90, 36, 83, 3240),
(19, 'بن فكاكس', 90, 29, 86, 2520),
(20, 'عصير جهينة', 75, 30, 71, 2250),
(26, 'لبن جهينة 200ملى', 110, 20, 100, 2200),
(27, 'توينكز', 20, 50, 18, 1000),
(28, 'هوهوز احمر', 30, 100, 27, 3000),
(29, 'هوهوز اصفر', 30, 100, 27, 3000),
(30, 'لوكس', 20, 100, 17, 2000),
(31, 'عصيربيور', 170, 20, 160, 3400),
(32, 'عصير بيور', 177, 10, 160, 1770),
(33, 'بن احمد الشيخ ', 100, 20, 93, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `serialnumber` int(11) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `s_price` int(11) DEFAULT NULL,
  `s_qty` int(11) DEFAULT NULL,
  `s_cost` int(11) DEFAULT NULL,
  `s_total` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `serialnumber`, `product`, `s_price`, `s_qty`, `s_cost`, `s_total`, `client_id`, `date`) VALUES
(3, 2, '3', 44, 1, 43, 44, 2, '2021-12-13'),
(64, 3, '1', 230, 1, 205, 230, 1, '2021-12-14'),
(65, 3, '2', 40, 1, 38, 40, 1, '2021-12-14'),
(68, 4, '1', 230, 1, 200, 230, 1, '2021-12-14'),
(69, 5, '5', 20, 1, 19, 20, 2, '2021-12-14'),
(70, 5, '3', 44, 4, 43, 176, 2, '2021-12-14'),
(71, 6, '2', 40, 9, 38, 360, 10, '2022-01-02'),
(72, 7, '1', 230, 1, 200, 230, 12, '2022-01-02'),
(73, 8, '1', 230, 5, 200, 1150, 1, '2022-01-02'),
(74, 9, '1', 230, 1, 200, 230, 10, '2022-01-02'),
(75, 9, '2', 40, 5, 38, 200, 10, '2022-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `supplieraccount`
--

CREATE TABLE `supplieraccount` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplieraccount`
--

INSERT INTO `supplieraccount` (`id`, `supplier_id`, `dept`, `credit`, `balance`, `date`) VALUES
(2, 1, 2000, 0, 2000, '2021-12-14'),
(3, 1, 900, 0, 2000, '2021-12-14'),
(4, 1, 2700, 0, 2000, '2021-12-14'),
(5, 1, 2700, 0, 4700, '2021-12-14'),
(6, 1, 1600, 0, 6300, '2021-12-14'),
(7, 1, 1290, 0, 7590, '2021-12-14'),
(8, 1, 180, 0, 7770, '2021-12-14'),
(9, 1, 1700, 0, 9470, '2021-12-14'),
(10, 1, 830, 0, 10300, '2021-12-14'),
(11, 1, 0, 400, 9900, '2021-12-14'),
(12, 1, 0, 100, 9800, '2021-12-14'),
(13, 1, 1600, 0, 11400, '2021-12-14'),
(14, 2, 205, 0, 205, '2021-12-14'),
(15, 2, 760, 0, 965, '2021-12-14'),
(16, 2, 0, 100, 865, '2021-12-14'),
(17, 1, 3240, 0, 14640, '2021-12-14'),
(18, 2, 0, 430, 435, '2021-12-16'),
(19, 2, 100, 0, 435, '2021-12-16'),
(20, 1, 0, 380, 14260, '2021-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`) VALUES
(1, 'الشيخ اشرف'),
(2, 'السلامة'),
(3, 'الحج كامل الصافى'),
(4, 'العسال للتوريدات');

-- --------------------------------------------------------

--
-- Table structure for table `tregery`
--

CREATE TABLE `tregery` (
  `id` int(11) NOT NULL,
  `income` int(11) DEFAULT 0,
  `expenses` int(11) DEFAULT 0,
  `balance` int(11) DEFAULT 0,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tregery`
--

INSERT INTO `tregery` (`id`, `income`, `expenses`, `balance`, `date`) VALUES
(1, 210, 0, 210, '2021-12-13'),
(2, 215, 0, 425, '2021-12-13'),
(3, 84, 0, 509, '2021-12-13'),
(4, 317, 0, 826, '2021-12-13'),
(5, 518, 0, 1344, '2021-12-13'),
(6, 0, 3500, -2156, '2021-12-13'),
(7, 753, 0, -1403, '2021-12-13'),
(8, 230, 0, -1173, '2021-12-13'),
(9, 0, 4100, -5273, '2021-12-13'),
(10, 230, 0, -5043, '2021-12-13'),
(11, 230, 0, -4813, '2021-12-13'),
(12, 270, 0, -4543, '2021-12-13'),
(13, 290, 0, -4253, '2021-12-14'),
(14, 190, 0, -4063, '2021-12-14'),
(15, 0, 100, -4163, '2021-12-14'),
(17, 0, 3200, -7363, '0000-00-00'),
(18, 0, 2255, -9618, '2021-12-14'),
(19, 0, 1900, -11518, '2021-12-14'),
(20, 0, 1600, -13118, '2021-12-14'),
(21, 0, 860, -13978, '2021-12-14'),
(22, 0, 1290, -15268, '2021-12-14'),
(23, 0, 180, -15448, '2021-12-14'),
(24, 0, 1700, -17148, '2021-12-14'),
(25, 500, 0, -16648, '2021-12-14'),
(26, 0, 400, -17048, '2021-12-14'),
(27, 500, 0, -16548, '2021-12-14'),
(28, 0, 100, -16648, '2021-12-14'),
(29, 0, 205, -16853, '2021-12-14'),
(30, 0, 100, -16953, '2021-12-14'),
(31, 0, 5460, -22413, '2021-12-14'),
(32, 230, 0, -22183, '2021-12-14'),
(33, 0, 2000, -24183, '2021-12-16'),
(34, 0, 430, -24613, '2021-12-16'),
(35, 0, 100, -24713, '2021-12-16'),
(36, 0, 2000, -26713, '2021-12-26'),
(37, 100, 0, -26613, '2022-01-02'),
(38, 0, 0, -26613, '2022-01-03'),
(39, 100, 0, -26513, '2022-01-03'),
(40, 1150, 0, -25363, '2022-01-02'),
(41, 100, 0, -25263, '2022-01-03'),
(42, 0, 900, -26163, '2022-01-03'),
(43, 0, 960, -27123, '2022-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `stat`) VALUES
(1, 'radi', '1234', 1),
(2, 'ahmed', 'ahmed2000', 0),
(3, 'abdelrahman', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fatora`
--
ALTER TABLE `fatora`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `supplieraccount`
--
ALTER TABLE `supplieraccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tregery`
--
ALTER TABLE `tregery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fatora`
--
ALTER TABLE `fatora`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `supplieraccount`
--
ALTER TABLE `supplieraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tregery`
--
ALTER TABLE `tregery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `fatora`
--
ALTER TABLE `fatora`
  ADD CONSTRAINT `fatora_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `supplieraccount`
--
ALTER TABLE `supplieraccount`
  ADD CONSTRAINT `supplieraccount_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
