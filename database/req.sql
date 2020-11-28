-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 02:26 PM
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
  `warranty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req`
--

INSERT INTO `req` (`rid`, `mmid`, `uid`, `estprice`, `status`, `calprice`, `created_date`, `note`, `repairperson`, `imeino`, `pay_method`, `pay_status`, `warranty`) VALUES
(1, 6, 14, '0', 0, '0', '2020-11-28', 'NA', '', '', '', '0', ''),
(2, 6, 14, '0', 0, '0', '2020-11-28', 'NA', '', '', '', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
