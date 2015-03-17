-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2015 at 06:36 PM
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id_course` int(15) NOT NULL,
  `cost` float DEFAULT NULL,
  `duration` int(3) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `description` text,
  `course_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `sincard` int(15) NOT NULL DEFAULT '0',
  `dl_number` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `sincard` int(15) NOT NULL,
  `id_course` int(15) NOT NULL,
  `balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `sincard` int(15) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `address` varchar(25) DEFAULT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `gender` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`sincard`, `date_birth`, `address`, `phone_num`, `last_name`, `first_name`, `gender`) VALUES
(111222333, '2015-03-12', '123, Martin Ridge Grove', '403-561-2329', 'Kalia', 'Saransh', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE IF NOT EXISTS `receptionist` (
  `sincard` int(15) NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`sincard`, `username`, `password`) VALUES
(111222333, 'saransh', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sincard` int(15) NOT NULL DEFAULT '0',
  `dl_number` int(20) NOT NULL DEFAULT '0',
  `balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id_vehicle` int(15) NOT NULL,
  `model` varchar(15) DEFAULT NULL,
  `make` varchar(15) DEFAULT NULL,
  `vehicle_year` varchar(15) DEFAULT NULL,
  `maintaince_date` date DEFAULT NULL,
  `maintaince_description` text,
  `license_plate` varchar(15) DEFAULT NULL,
  `km_count` int(10) DEFAULT NULL,
  `history` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
 ADD PRIMARY KEY (`sincard`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`sincard`,`id_course`), ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
 ADD PRIMARY KEY (`sincard`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
 ADD PRIMARY KEY (`sincard`,`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`sincard`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
 ADD PRIMARY KEY (`id_vehicle`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`sincard`) REFERENCES `people` (`sincard`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`sincard`) REFERENCES `people` (`sincard`),
ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`sincard`) REFERENCES `people` (`sincard`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sincard`) REFERENCES `people` (`sincard`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
