-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 04:48 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilerepair`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_address`) VALUES
(0, 'Vinod Kumbhar', 'vk@gmail.com', '123', 'admin.jpg', '8421208111', 'Plot 34, NavVinayak Society, Jijai Nagar'),
(5, 'Atharva ', 'atharvadeshpande99@gmail.com', '123', 'bed-1-2.jpg', '7218340969', 'KESHAV NAGAR, NEAR GULMOHAR MARKET');

-- --------------------------------------------------------

--
-- Table structure for table `mobilecompany`
--

CREATE TABLE `mobilecompany` (
  `mcid` int(50) NOT NULL,
  `mcname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobilecompany`
--

INSERT INTO `mobilecompany` (`mcid`, `mcname`) VALUES
(6, 'Samsung'),
(7, 'Nokia'),
(8, 'MI'),
(9, 'Apple'),
(10, 'LG'),
(11, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `mobilemodel`
--

CREATE TABLE `mobilemodel` (
  `mmid` int(50) NOT NULL,
  `mmname` varchar(500) NOT NULL,
  `mcid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobilemodel`
--

INSERT INTO `mobilemodel` (`mmid`, `mmname`, `mcid`) VALUES
(1, 'Galaxy M30s', 6),
(2, '6.1', 7),
(3, 'One Plus 6T', 8),
(5, 'iPhone 12 pro', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `pid` int(50) NOT NULL,
  `pincode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`pid`, `pincode`) VALUES
(1, '411033'),
(2, '411017');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `rid` int(100) NOT NULL,
  `problem` varchar(500) NOT NULL,
  `subproblem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`rid`, `problem`, `subproblem`) VALUES
(1, 'Damage Problem', 'waterdamage'),
(1, 'Memory Card Problem', 'detectionerror'),
(2, 'Specify Own Problem', ''),
(3, 'Network Related Problem', 'networkerror'),
(3, 'Common Hardware Problem', 'micerror');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `rid` int(100) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `mcname` varchar(50) NOT NULL,
  `mmodel` varchar(100) NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `estprice` varchar(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `calprice` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`rid`, `pincode`, `mcname`, `mmodel`, `uid`, `estprice`, `status`, `calprice`, `created_date`, `note`) VALUES
(1, '411033', 'Samsung', 'Galaxy M30s', 13, '1200', 0, '1200', '0000-00-00', 'NA'),
(2, '411017', 'Nokia', '6.1', 13, '1300', 0, '0', '0000-00-00', 'NA'),
(3, '411017', 'Apple', 'iPhone 12 pro', 12, '500', 0, '600', '0000-00-00', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sesid` varchar(100) NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sesid`, `uid`) VALUES
('0b0b8346a7dce3087b22611ef6aca01c', 13),
('1b3c38e1750ee8c2f26153653f00c06b', 13),
('303a0123bfd52d744192ce9ee1b55ee4', 13),
('97f45a691e6d058f9ffde46a9fad76e2', 13);

-- --------------------------------------------------------

--
-- Table structure for table `session_admin`
--

CREATE TABLE `session_admin` (
  `uid` int(10) NOT NULL,
  `sesid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_admin`
--

INSERT INTO `session_admin` (`uid`, `sesid`) VALUES
(0, '0f5af3a7ba1e021970a5c1e41dec83ec'),
(0, '3dd77484350bbeed4711fc865d087fde'),
(0, '4b5b54ef1fc3344bb24ebf06bd9e90e1'),
(0, '79bba4ba3d0913878c7775527ac95f2f'),
(0, 'ce5cc8682656c72e0872efaf39cc01ac'),
(0, 'd97acae31d606b38a498d5e32368303e'),
(0, 'dd4d28375c51b97b0e559db89f6c79f0'),
(0, 'e81863437dec2c1b189de3b52b56e1b8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `create_datetime` date NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `password`, `email`, `create_datetime`, `username`) VALUES
(7, '202cb962ac59075b964b07152d234b70', 'asdeshpande@mitaoe.ac.in', '2020-09-09', 'Atharva Deshpande'),
(8, '202cb962ac59075b964b07152d234b70', 'skbarshikar@mitaoe.ac.in', '2020-09-12', 'Sarang Barshikar'),
(9, '202cb962ac59075b964b07152d234b70', 'ss@gmail.com', '2020-10-15', 'Swati Barshikar'),
(11, '0acff50219f19374cc9f5c63ee8b76b7', 'sarang.barshikar123@gmail.com', '2020-10-17', 'Sarang Barshikar'),
(12, 'da4c0997c1d9ca360671294a41769b68', 'barshikarswati@gmail.com', '2020-10-18', 'Swati Barshikar'),
(13, 'bd7b470fe545c8a3d9d73f91afdb42b2', 'skbarshikar@mitaoe.ac.in', '2020-10-18', 'sarang kumar barshikar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `mobilecompany`
--
ALTER TABLE `mobilecompany`
  ADD PRIMARY KEY (`mcid`);

--
-- Indexes for table `mobilemodel`
--
ALTER TABLE `mobilemodel`
  ADD PRIMARY KEY (`mmid`),
  ADD KEY `mcid` (`mcid`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sesid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `session_admin`
--
ALTER TABLE `session_admin`
  ADD PRIMARY KEY (`sesid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobilecompany`
--
ALTER TABLE `mobilecompany`
  MODIFY `mcid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mobilemodel`
--
ALTER TABLE `mobilemodel`
  MODIFY `mmid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobilemodel`
--
ALTER TABLE `mobilemodel`
  ADD CONSTRAINT `mobilemodel_ibfk_1` FOREIGN KEY (`mcid`) REFERENCES `mobilecompany` (`mcid`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
