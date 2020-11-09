-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 05:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
  `admin_address` text,
  `admin_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_address`, `admin_role`) VALUES
(0, 'Vinod Kumbhar', 'vk@gmail.com', '123', 'admin.jpg', '8421208111', 'Plot 34, NavVinayak Society, Jijai Nagar', 'super_admin'),
(5, 'Atharva ', 'atharvadeshpande99@gmail.com', '123', 'bed-1-2.jpg', '7218340969', 'KESHAV NAGAR, NEAR GULMOHAR MARKET', 'system_manager'),
(6, 'Atharva Santosh Deshpande', 'AtharvaSD_admin_5', '123', 'Photograph.jpg', '7563210245', 'Pune', 'delivery_boy'),
(7, 'Pragati Shamrao Gaikwad', 'PragatiSG_admin_6', '123', 'shivaji maharaj.jpg', '8652103245', 'Bhosari, Pune', 'delivery_boy');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `work` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` int(20) NOT NULL,
  `mobile` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 'Apple');

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
(6, 'Galaxy M30s', 6),
(7, 'Guru', 6);

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
(3, '411033');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_allocation`
--

CREATE TABLE `pricing_allocation` (
  `paid` int(255) NOT NULL,
  `mmid` int(50) NOT NULL,
  `subproblem_code` int(50) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing_allocation`
--

INSERT INTO `pricing_allocation` (`paid`, `mmid`, `subproblem_code`, `price`) VALUES
(1, 1, 1, '1200'),
(2, 1, 4, '1200'),
(3, 6, 1, '1000'),
(4, 6, 2, '2000');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `rid` int(100) NOT NULL,
  `problem` int(10) NOT NULL,
  `subproblem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`rid`, `problem`, `subproblem`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `problem_master`
--

CREATE TABLE `problem_master` (
  `problem_code` int(11) NOT NULL,
  `main_problem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem_master`
--

INSERT INTO `problem_master` (`problem_code`, `main_problem`) VALUES
(2, 'Damage Problem'),
(3, 'Touch &amp; Display Problem'),
(5, 'Common Hardware Problem'),
(6, 'Battery Problem'),
(7, 'Network Related Problem'),
(8, 'Memory Card Problem'),
(9, 'Other Problems');

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

CREATE TABLE `req` (
  `rid` int(11) NOT NULL,
  `mmid` int(11) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  `estprice` varchar(100) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `calprice` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_request`
--

CREATE TABLE `scheduled_request` (
  `rid` int(10) NOT NULL,
  `admin_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('4dc10bdebfbbe8d9e5383de48324cffc', 6),
('27093d6e762d1ce7a1e272c6321e85e0', 14),
('5119918a8496e900f431ff8b12ba547f', 14);

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
(0, '1a37ca65319336fd9c8fd70cdd018e0d'),
(0, '28393781e4aeab3ff0be23faedeac6c6'),
(0, '3dd77484350bbeed4711fc865d087fde'),
(0, '4b5b54ef1fc3344bb24ebf06bd9e90e1'),
(0, '57c6fd096e78b2c24f6c49a9a3bd1b07'),
(0, '57d1e123641c8e9c5efb152cc5c3756d'),
(0, '57dd6d10303abad4b80cfbc5f333cb4a'),
(0, '79bba4ba3d0913878c7775527ac95f2f'),
(0, 'ce5cc8682656c72e0872efaf39cc01ac'),
(0, 'd97acae31d606b38a498d5e32368303e'),
(0, 'dd4d28375c51b97b0e559db89f6c79f0'),
(0, 'e81863437dec2c1b189de3b52b56e1b8'),
(0, 'fc64838637b86e6bbe6f8893569d65a0');

-- --------------------------------------------------------

--
-- Table structure for table `subproblem_master`
--

CREATE TABLE `subproblem_master` (
  `subproblem_code` int(11) NOT NULL,
  `problem_code` int(11) NOT NULL,
  `sub_problem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subproblem_master`
--

INSERT INTO `subproblem_master` (`subproblem_code`, `problem_code`, `sub_problem`) VALUES
(1, 2, 'Water Damage'),
(2, 2, 'Mobile is Dead'),
(4, 3, 'Display is OK but partial/full touch not working'),
(5, 3, 'Touch is OK display damaged'),
(6, 3, 'Touch and display both not working'),
(7, 5, 'Mic problem'),
(8, 5, 'Speaker problem'),
(9, 5, 'Loud speaker problem'),
(10, 5, 'Ringer/Vibrator problem'),
(11, 6, 'Battery is faulty'),
(12, 6, 'Mobile is not charging'),
(13, 7, 'Network not showing'),
(14, 7, 'Only 1-2 tower showing in mobile'),
(15, 7, 'SIM not detecting'),
(16, 8, 'Memory card not detecting'),
(17, 9, 'Power ON button not working'),
(18, 9, 'Volume buttons are not working'),
(19, 9, 'Camera not working'),
(20, 9, 'Forgot screen lock/Password'),
(21, 9, 'Flash new software');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `create_datetime` date NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pincode` varchar(50) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `password`, `email`, `create_datetime`, `username`, `pincode`, `phonenum`, `address`) VALUES
(8, '202cb962ac59075b964b07152d234b70', 'skbarshikar@mitaoe.ac.in', '2020-09-12', 'Sarang Barshikar', '', '', ''),
(9, '202cb962ac59075b964b07152d234b70', 'ss@gmail.com', '2020-10-15', 'Swati Barshikar', '', '', ''),
(11, '0acff50219f19374cc9f5c63ee8b76b7', 'sarang.barshikar123@gmail.com', '2020-10-17', 'Sarang Barshikar', '', '', ''),
(12, 'da4c0997c1d9ca360671294a41769b68', 'barshikarswati@gmail.com', '2020-10-18', 'Swati Barshikar', '', '', ''),
(13, 'bd7b470fe545c8a3d9d73f91afdb42b2', 'skbarshikar@mitaoe.ac.in', '2020-10-18', 'sarang kumar barshikar', '', '', ''),
(14, 'd15925ef9fd1e3ef2d37efc94e8273ac', 'atharvadeshpande99@gmail.com', '2020-10-31', 'Atharva Deshpande', '411033', '7218340969', 'Chinchwadgaon, Pune 33'),
(16, 'a370453431cea129c9fcf1778c79e9a1', 'asdeshpande@mitaoe.ac.in', '2020-10-31', 'atharva deshpande', '', '', ''),
(17, '202cb962ac59075b964b07152d234b70', 'aa@gmail.com', '2020-11-04', 'qweryuioihgf', '', '', ''),
(18, '202cb962ac59075b964b07152d234b70', 'ad@gmail.com', '2020-11-05', 'AD', '', '', '');

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
-- Indexes for table `pricing_allocation`
--
ALTER TABLE `pricing_allocation`
  ADD PRIMARY KEY (`paid`);

--
-- Indexes for table `problem_master`
--
ALTER TABLE `problem_master`
  ADD PRIMARY KEY (`problem_code`);

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`rid`);

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
-- Indexes for table `subproblem_master`
--
ALTER TABLE `subproblem_master`
  ADD PRIMARY KEY (`subproblem_code`);

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mobilecompany`
--
ALTER TABLE `mobilecompany`
  MODIFY `mcid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobilemodel`
--
ALTER TABLE `mobilemodel`
  MODIFY `mmid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pricing_allocation`
--
ALTER TABLE `pricing_allocation`
  MODIFY `paid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `problem_master`
--
ALTER TABLE `problem_master`
  MODIFY `problem_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subproblem_master`
--
ALTER TABLE `subproblem_master`
  MODIFY `subproblem_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
