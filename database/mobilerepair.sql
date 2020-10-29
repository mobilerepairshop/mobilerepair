-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 04:17 PM
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
  `admin_address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.admins: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`admins`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `mobilecompany`
--

CREATE TABLE `mobilecompany` (
  `mcid` int(50) NOT NULL,
  `mcname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.mobilecompany: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`mobilecompany`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `mobilemodel`
--

CREATE TABLE `mobilemodel` (
  `mmid` int(50) NOT NULL,
  `mmname` varchar(500) NOT NULL,
  `mcid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.mobilemodel: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`mobilemodel`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `pid` int(50) NOT NULL,
  `pincode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.pincode: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`pincode`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `rid` int(100) NOT NULL,
  `problem` varchar(500) NOT NULL,
  `subproblem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.problems: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`problems`' at line 1

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
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.requests: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`requests`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sesid` varchar(100) NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.session: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`session`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `session_admin`
--

CREATE TABLE `session_admin` (
  `uid` int(10) NOT NULL,
  `sesid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table mobilerepair.session_admin: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`session_admin`' at line 1

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
-- Error reading data for table mobilerepair.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mobilerepair`.`users`' at line 1

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
