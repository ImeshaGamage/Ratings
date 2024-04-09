-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 03:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratings`
--

-- --------------------------------------------------------

--
-- Table structure for table `childrens`
--

CREATE TABLE `childrens` (
  `C_id` varchar(100) NOT NULL,
  `T_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `childrens`
--

INSERT INTO `childrens` (`C_id`, `T_id`) VALUES
('C101', 'T101'),
('C102', 'T102'),
('C103', 'T102'),
('C103', 'T103'),
('C104', 'T101'),
('C104', 'T103');

-- --------------------------------------------------------

--
-- Table structure for table `child_login`
--

CREATE TABLE `child_login` (
  `C_id` varchar(100) NOT NULL,
  `C_password` varchar(20) NOT NULL,
  `Cnew_password` varchar(20) NOT NULL,
  `C_name` varchar(100) NOT NULL,
  `grade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_login`
--

INSERT INTO `child_login` (`C_id`, `C_password`, `Cnew_password`, `C_name`, `grade`) VALUES
('C101', '', '2w3e4r', 'Nuwan', 10),
('C102', '', '4r5t6y', 'Imesha', 11),
('C103', '', '67890', 'Kasun', 9),
('C104', '23456', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `T_id` int(100) NOT NULL,
  `rate_no` int(200) NOT NULL,
  `rate` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` varchar(50) NOT NULL,
  `sub_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`) VALUES
('S12', 'Science'),
('S13', 'Mathematics'),
('S15', 'English'),
('S16', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `T_id` varchar(100) NOT NULL,
  `T_name` varchar(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `class_date` varchar(20) NOT NULL,
  `class_time` varchar(20) NOT NULL,
  `class_no` varchar(100) NOT NULL,
  `rate_no` int(200) NOT NULL,
  `rate` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`T_id`, `T_name`, `subject`, `qualification`, `phone_no`, `class_date`, `class_time`, `class_no`, `rate_no`, `rate`) VALUES
('T101', 'sunil', 'S12', 'University of Wayamba ', 713467283, 'monday', '10.00 am-12.00pm', 'B05', 3, 70),
('T102', 'H.U.M.Perera', 'S13', 'University of colombo', 713467439, 'friday', '1.00 pm-4.00pm', 'B04', 2, 57),
('T103', 'L.D.M.Ranasinhe', 'S15', 'University of Kalaniya', 725698273, 'sunday', '2.00pm-4.30pm', 'B01', 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tealogin`
--

CREATE TABLE `tealogin` (
  `T_id` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `new_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tealogin`
--

INSERT INTO `tealogin` (`T_id`, `password`, `new_password`) VALUES
('T101', '', '1q2w3e'),
('T102', '', '0p9o8i'),
('T103', '', '5t6y7u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `childrens`
--
ALTER TABLE `childrens`
  ADD PRIMARY KEY (`C_id`,`T_id`);

--
-- Indexes for table `child_login`
--
ALTER TABLE `child_login`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `tealogin`
--
ALTER TABLE `tealogin`
  ADD PRIMARY KEY (`T_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
