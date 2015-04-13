-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 07, 2015 at 02:24 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `driving_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
`id_course` int(15) NOT NULL,
  `cost` float DEFAULT NULL,
  `duration` int(3) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `description` text,
  `course_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id_course`, `cost`, `duration`, `type`, `description`, `course_name`) VALUES
(6, 695.88, 10, 'CAR', 'Learn Car in 10 Hours', 'Class 5 GDL'),
(7, 1295.2, 12, 'TRUCK', 'Class hdhdj', 'Class 3'),
(8, 388.77, 6, 'MOTORCYCLE', 'jjhjh', 'Class 9');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `sincard` int(15) NOT NULL DEFAULT '0',
  `dl_number` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `sincard` int(15) NOT NULL,
  `id_course` int(15) NOT NULL,
  `balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
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
-- Dumping data for table `people`
--

INSERT INTO `people` (`sincard`, `date_birth`, `address`, `city`, `postal`, `phone_num`, `last_name`, `first_name`, `gender`) VALUES
(737783783, '1990-10-11', '7848 Marthas Haven PK', 'CG', 'T3J4H7', '403-561-2329', 'Kalia', 'Saransh', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `sincard` int(15) NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`sincard`, `username`, `password`) VALUES
(737783783, 'saransh', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sincard` int(15) NOT NULL DEFAULT '0',
  `dl_number` varchar(20) NOT NULL DEFAULT '0',
  `balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
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
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id_vehicle`, `model`, `make`, `vehicle_year`, `maintaince_date`, `maintaince_description`, `license_plate`, `km_count`, `history`) VALUES
(1, '1', '1', '1', '2015-04-15', '1', '1', 1, '12');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id_course` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`sincard`) REFERENCES `people` (`sincard`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`sincard`) REFERENCES `people` (`sincard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sincard`) REFERENCES `people` (`sincard`) ON DELETE CASCADE ON UPDATE CASCADE;
