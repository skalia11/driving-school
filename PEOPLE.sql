-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 02:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `driving_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `PEOPLE`
--

CREATE TABLE IF NOT EXISTS `people` (
  `sincard` int(15) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(15) NOT NULL,
  `postal` varchar(10) DEFAULT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `gender` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PEOPLE`
--

INSERT INTO `PEOPLE` (`sincard`, `date_birth`, `address`, `city`, `postal`, `phone_num`, `last_name`, `first_name`, `gender`) VALUES
(111, '1980-02-05', '82, Columbia Blvd W', 'Lethbridge', 'T3K6G8', '403-776-0909', 'Wilson', 'James', 'M'),
(111222333, '2015-03-12', '123, Martin Ridge Grove', 'Calgary', 'T1Y6G7', '403-561-2329', 'Kalia', 'Saransh', 'M'),
(222909088, '1988-07-16', '11, Coral Springs Drive', 'Lethbridge', 'T3S7JL', '403-112-2211', 'Smith', 'Sam', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PEOPLE`
--
ALTER TABLE `PEOPLE`
 ADD PRIMARY KEY (`sincard`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
