-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 02:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_title`, `category`) VALUES
(1, 'SOLIDWORKS Essentials', 'SOLIDWORKS 3D CAD'),
(2, 'SOLIDWORKS Drawings ', 'SOLIDWORKS 3D CAD'),
(3, 'Assembly Modeling', 'SOLIDWORKS 3D CAD'),
(4, 'Advanced Part Modeling', 'SOLIDWORKS 3D CAD'),
(5, 'Surface Modeling', 'SOLIDWORKS 3D CAD'),
(6, 'Mold Design', 'SOLIDWORKS 3D CAD'),
(7, 'Sheet Metal', 'SOLIDWORKS 3D CAD'),
(8, ' Weldments', 'SOLIDWORKS 3D CAD'),
(9, 'SOLIDWORKS MBD', 'SOLIDWORKS 3D CAD'),
(10, 'SOLIDWORKS Inspection', 'SOLIDWORKS 3D CAD'),
(11, 'SOLIDWORKS Routing-Electrical', 'SOLIDWORKS 3D CAD'),
(12, 'SOLIDWORKS Routing- Piping and Tubing', 'SOLIDWORKS 3D CAD'),
(13, 'File Management', 'SOLIDWORKS 3D CAD'),
(14, 'API Fundamentals', 'SOLIDWORKS 3D CAD'),
(15, 'SOLIDWORKS CAM Standard', 'SOLIDWORKS 3D CAD'),
(16, 'SOLIDWORKS CAM Professional', 'SOLIDWORKS 3D CAD'),
(17, 'SOLIDWORKS Visualize', 'SOLIDWORKS 3D CAD'),
(18, 'SOLIDWORKS Plastics', 'SOLIDWORKS SIMULATION'),
(19, 'SOLIDWORKS Simulation', 'SOLIDWORKS SIMULATION'),
(20, 'SOLIDWORKS Simulation Professional', 'SOLIDWORKS SIMULATION'),
(21, 'SOLIDWORKS Simulation & SOLIDWORKS Simulation Professional', 'SOLIDWORKS SIMULATION'),
(22, 'SOLIDWORKS Simulation Premium: Nonlinear', 'SOLIDWORKS SIMULATION'),
(23, 'SOLIDWORKS Simulation Premium: Dynamics', 'SOLIDWORKS SIMULATION'),
(24, 'SOLIDWORKS Simulation Premium: Nonlinear & Dynamics', 'SOLIDWORKS SIMULATION'),
(25, 'SOLIDWORKS Motion', 'SOLIDWORKS SIMULATION'),
(26, 'SOLIDWORKS Flow Simulation', 'SOLIDWORKS SIMULATION'),
(27, 'Using SOLIDWORKS PDM', 'SOLIDWORKS PDM'),
(28, 'Administering SOLIDWORKS PDM', 'SOLIDWORKS PDM'),
(29, 'API Fundamentals of SOLIDWORKS PDM', 'SOLIDWORKS PDM');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`id`, `category`) VALUES
(2, 'SOLIDWORKS 3D CAD'),
(3, 'SOLIDWORKS SIMULATION'),
(4, 'SOLIDWORKS PDM '),
(5, 'Other Training');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(100) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `min_stock` int(100) NOT NULL,
  `stock_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `book_title`, `course_title`, `quantity`, `min_stock`, `stock_status`) VALUES
(1, 'SOLIDWORKS Essentials ', 'SOLIDWORKS Essentials ', 30, 10, 'Available'),
(2, 'SOLIDWORKS Drawings ', 'SOLIDWORKS Drawings', 30, 5, 'Available'),
(3, 'Assembly Modeling ', 'Assembly Modeling', 40, 5, 'Available'),
(4, 'Advanced Part Modeling ', 'Advanced Part Modeling', 30, 5, 'Available'),
(5, 'Surface Modeling', 'Surface Modeling', 30, 5, 'Available'),
(6, 'Mold Design ', 'Mold Design', 30, 5, 'Available'),
(7, 'Sheet Metal ', 'Sheet Metal', 30, 5, 'Available'),
(8, 'Weldments', 'Weldments', 30, 5, 'Available'),
(9, 'SOLIDWORKS MBD', 'SOLIDWORKS MBD', 30, 5, 'Available'),
(10, 'SOLIDWORKS Inspection ', 'SOLIDWORKS Inspection', 30, 5, 'Available'),
(11, 'SOLIDWORKS Routing- Electrical ', 'SOLIDWORKS Routing- Electrical', 30, 5, 'Available'),
(12, 'SOLIDWORKS Routing- Piping and Tubing ', 'SOLIDWORKS Routing- Piping and Tubing', 30, 5, 'Available'),
(13, 'FIle Management', 'File Management', 30, 5, 'Available'),
(14, 'API Fundamentals', 'API Fundamentals', 30, 5, 'Available'),
(15, 'SOLIDWORKS CAM Standard ', 'SOLIDWORKS CAM Standard', 30, 5, 'Available'),
(16, 'SOLIDWORKS CAM Professional ', 'SOLDIWORKS CAM Professional', 30, 5, 'Available'),
(17, 'SOLIDWORKS Visualize ', 'SOLIDWORKS Visualize', 30, 5, 'Available'),
(18, 'SOLIDWORKS Plastics ', 'SOLIDWORKS Plastics', 30, 5, 'Available'),
(19, 'SOLIDWORKS Simulation', 'SOLIDWORKS Simulation', 30, 5, 'Available'),
(20, 'SOLIDWORKS Simulation Professional', 'SOLIDWORKS Simulation Professional', 30, 5, 'Available'),
(21, 'SOLIDWORKS Simulation & SOLIDWORKS Simulation Professional', 'SOLIDWORKS Simulation & SOLIDWORKS Simulation Professional', 30, 5, 'Available'),
(22, 'SOLIDWORKS Simulation Premium: Nonlinear', 'SOLIDWORKS Simulation Premium: Nonlinear', 30, 5, 'Available'),
(23, 'SOLIDWORKS Simulation Premium: Dynamics', 'SOLIDWORKS Simulation Premium: Dynamics', 30, 5, 'Available'),
(24, 'SOLIDWORKS Simulation Premium: Nonlinear & Dynamics', 'SOLIDWORKS Simulation Premium: Nonlinear & Dynamics', 30, 5, 'Available'),
(25, 'SOLIDWORKS Motion', 'SOLIDWORKS Motion', 30, 5, 'Available'),
(26, 'SOLIDWORKS Flow Simulation', 'SOLIDWORKS Flow Simulation', 30, 5, 'Available'),
(27, 'Using SOLIDWORKS PDM ', 'Using SOLIDWORKS PDM ', 30, 10, 'Available'),
(28, 'Administering SOLIDWORKS PDM ', 'Administering SOLIDWORKS PDM ', 40, 5, 'Available'),
(29, 'API Fundamentals of SOLIDWORKS PDM', 'API Fundamentals of SOLIDWORKS PDM', 160, 5, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `trainer` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `course` varchar(100) NOT NULL,
  `room` varchar(50) NOT NULL,
  `totalpax` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `lastChangedOn` datetime NOT NULL,
  `lastChangedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `username`, `trainer`, `start_date`, `end_date`, `start_time`, `end_time`, `course`, `room`, `totalpax`, `status`, `lastChangedOn`, `lastChangedBy`) VALUES
(1, 'admin', 'Trainer 1', '2020-01-17', '2020-01-24', '10:00:00', '23:00:00', 'SOLIDWORKS CAM', 'room1', 2, 'Approved', '2020-01-16 09:08:35', 'admin'),
(2, 'admin', 'Trainer 2', '2020-01-18', '2020-01-20', '09:00:00', '22:00:00', 'Assembly Modeling', 'room2', 3, 'Approved', '2020-01-16 09:12:35', 'admin'),
(3, 'admin', 'Trainer 3', '2020-01-17', '2020-01-18', '11:00:00', '12:00:00', 'SOLIDWORKS', 'room1', 2, 'Approved', '2020-01-16 09:14:55', 'admin'),
(5, 'manager', 'Trainer 6', '2020-01-18', '2020-01-20', '10:00:00', '06:00:00', 'SOLIDWORKS', 'room1', 3, 'Approved', '2020-01-16 09:38:11', 'manager'),
(7, 'trainer', 'Trainer 7', '2020-01-28', '2020-01-29', '17:00:00', '16:00:00', 'Simulation', 'room1', 1, 'Pending for approval', '2020-01-21 10:45:22', 'trainer'),
(9, 'admin', 'trainer 8', '2020-01-17', '2020-01-23', '12:00:00', '12:00:00', 'SOLIDWORKS PDM', 'room1', 5, 'Approved', '2020-01-16 10:50:57', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager'),
(6, 'trainer', '2c065aae9fcb37b49043a5a2012b3dbf', 'trainer'),
(9, 'test', '098f6bcd4621d373cade4e832627b4f6', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
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
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
