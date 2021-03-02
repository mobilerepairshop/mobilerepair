-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 12:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `admin_address` text DEFAULT NULL,
  `admin_role` varchar(100) NOT NULL,
  `admin_rights` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_address`, `admin_role`, `admin_rights`) VALUES
(0, 'Vinod Kumbhar', 'vk@gmail.com', '123', 'admin.jpg', '8421208111', 'Plot 34, NavVinayak Society, Jijai Nagar', 'super_admin', '0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16'),
(5, 'Atharva ', 'atharvadeshpande99@gmail.com', '123', 'bed-1-2.jpg', '7218340969', 'KESHAV NAGAR, NEAR GULMOHAR MARKET', 'system_manager', ''),
(6, 'Atharva Santosh Deshpande', 'AtharvaSD_admin_5', '111', 'Photograph.jpg', '7563210245', 'Pune', 'delivery_boy', ''),
(8, 'AAA', 'AAA_admin_6', '111', 'shivaji maharaj.jpg', '1111111111', '111', 'delivery_boy', ''),
(9, 'Sarang K Barshikar', 'SarangKB_admin_8', '123', 'Blank diagram (3).jpeg', '9654102348', 'Viman Nagar', 'admin', '1,3,5,'),
(13, 'asd', 'asd_admin_9', '123', 'da.jpg', 'aaa', 'aaa', 'admin', '0,1,'),
(14, 'ppp', 'ppp_admin_13', 'ppp', 'filter.png', 'ppp', 'ppp', 'delivery_boy', ''),
(17, 'Santosh B Deshpande', 'SantoshBD_admin_16', '123', 'logo.JPG', '123', '123', 'delivery_boy', '');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `image`) VALUES
(6, 'work-1.jpg'),
(7, 'work-3.jpg'),
(8, 'work-4.jpg'),
(10, 'abc.jpg');

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
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cid` int(10) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cid`, `cname`) VALUES
(1, 'Pune'),
(2, 'Mumbai'),
(3, 'Nagpur');

-- --------------------------------------------------------

--
-- Table structure for table `contactlocations`
--

CREATE TABLE `contactlocations` (
  `clid` int(20) NOT NULL,
  `ccity` varchar(20) NOT NULL,
  `cadmin` varchar(50) NOT NULL,
  `cnumber` varchar(20) NOT NULL,
  `cemail` varchar(20) NOT NULL,
  `caddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactlocations`
--

INSERT INTO `contactlocations` (`clid`, `ccity`, `cadmin`, `cnumber`, `cemail`, `caddress`) VALUES
(6, 'Pune', 'Vinod Kumbhar', '8421208111', 'vk@gmail.com', 'Plot 34, NavVinayak Society, Jijai Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`name`, `email`, `phone`, `subject`) VALUES
('a', 'a', 'a', 'a'),
('b', 'b', '1', 'b'),
('c', 'c', '2', 'c');

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
  `pincode` varchar(50) NOT NULL,
  `cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`pid`, `pincode`, `cid`) VALUES
(3, '411033', 1),
(4, '411032', 2),
(6, '411017', 1),
(7, '440001', 3);

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
  `note` varchar(255) NOT NULL,
  `repairperson` varchar(100) NOT NULL,
  `imeino` varchar(100) NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  `pay_status` varchar(5) NOT NULL,
  `warranty` varchar(10) NOT NULL,
  `inwarr` int(10) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `pickupdate` varchar(50) NOT NULL,
  `dropdate` varchar(50) NOT NULL,
  `creason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_request`
--

CREATE TABLE `scheduled_request` (
  `rid` int(10) NOT NULL,
  `admin_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `delivery_status` varchar(10) NOT NULL
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
('6abcf702fc79245b571f7dfd2bb28cdb', 1),
('732f69f0fd6bbbaee9212aa1a1ea570f', 6);

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
(0, '1094a1075e9bc99da8c953cc3c6e9720'),
(0, '1f1f26aa192c4b7307976cce4afba8f0'),
(0, '2c12b9d8c8397b4030ba4ed2d9a47c5f'),
(0, '4e5d083135131bcfbe525a85cc4b7853'),
(0, '4ff11a7d9cf3e4d7a6c1a6bf49d25568'),
(0, 'a8d6df810eb4ade05c27d96282ea2fca'),
(0, 'f70737950e1c5702ecd793ed9031285d');

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
  `address` varchar(500) NOT NULL,
  `logtype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `password`, `email`, `create_datetime`, `username`, `pincode`, `phonenum`, `address`, `logtype`) VALUES
(1, 'd15925ef9fd1e3ef2d37efc94e8273ac', 'atharvadeshpande99@gmail.com', '2021-01-30', 'Atharva Deshpande', '411033', '9922934464', 'sainath society pimpri', '1');

-- --------------------------------------------------------

--
-- Table structure for table `verificationqa`
--

CREATE TABLE `verificationqa` (
  `rid` int(10) NOT NULL,
  `q1` varchar(20) NOT NULL,
  `q2a` varchar(20) NOT NULL,
  `q2b` varchar(20) NOT NULL,
  `q2c` varchar(20) NOT NULL,
  `q2d` varchar(20) NOT NULL,
  `q2e` varchar(20) NOT NULL,
  `q2f` varchar(20) NOT NULL,
  `q2g` varchar(20) NOT NULL,
  `q2h` varchar(20) NOT NULL,
  `q2i` varchar(20) NOT NULL,
  `q2j` varchar(20) NOT NULL,
  `q2k` varchar(20) NOT NULL,
  `q2l` varchar(20) NOT NULL,
  `q2m` varchar(20) NOT NULL,
  `q2n` varchar(20) NOT NULL,
  `q3` varchar(20) NOT NULL,
  `q4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contactlocations`
--
ALTER TABLE `contactlocations`
  ADD PRIMARY KEY (`clid`);

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `contactlocations`
--
ALTER TABLE `contactlocations`
  MODIFY `clid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
