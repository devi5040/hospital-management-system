-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Feb 16, 2024 at 05:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--
USE hospital;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `dob` date NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `mobile`, `dob`, `doctor`, `gender`, `img`) VALUES
(1, 'Devi', 'dpraidola@gmail.com', 2147483647, '2024-02-23', 'ABCD', 'male', 'IMG-65cd056ff02359.78319424.jpg'),
(2, 'hjk', 'fghj@gmail.com', 453, '2024-02-23', 'wertyui', 'female', 'IMG-65cf8f09dd0ac2.14032781.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `doctor_ID` varchar(50) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `img` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `doctor_ID`, `hospital`, `img`) VALUES
(1, 'ABCD', 'abc@gmail.com', '2345', 'AH', 'IMG-65ccf8900deb88.91199599.webp'),
(2, 'sdfghj', 'ad@gmail.com', '7888', 'fgh', 'IMG-65cf8bc45d3532.23727299.jpg'),
(3, 'dfghj', 'dfghj@gmail.com', '2345', 'ghjk', 'IMG-65cf8c1d077097.21873774.jpg'),
(4, 'wertyui', 'dfgh@gmail.com', '445', 'dfghj', 'IMG-65cf8c4c689390.23564386.jpg'),
(5, 'fghj', 'ddd@gmail.com', '5878', 'ghjk', 'IMG-65cf8cb5a7d091.28896692.jpg'),
(6, 'ghjk', 'aaa@gmail.com', '911362', 'ghjk', 'IMG-65cf8d275e3259.89528785.jpg'),
(7, 'gh', 'fgh@gmail.com', '77', 'ghjk', 'IMG-65cf8d7bbfe6a1.28446929.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roompatient`
--

CREATE TABLE `roompatient` (
  `id` int(11) NOT NULL,
  `patientName` varchar(100) NOT NULL,
  `admitDate` date NOT NULL,
  `roomNumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roompatient`
--

INSERT INTO `roompatient` (`id`, `patientName`, `admitDate`, `roomNumber`) VALUES
(5, 'FFHJK', '2024-02-10', '200');

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `id` int(11) NOT NULL,
  `roomNumber` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`id`, `roomNumber`, `Status`) VALUES
(1, '123', 'free'),
(2, '200', 'occupied'),
(3, '124', 'free'),
(6, '125', 'free');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `mobile`, `password`) VALUES
(1, 'Deviprasad', 'admin', 'dpraidola@gmail.com', 2147483647, 'Devi5040'),
(2, 'Hello', 'admin', 'hd@gmail.com', 6256, 'admin123'),
(3, 'jknsjn', 'admin', 'ff@gmail.com', 558, 'admin123'),
(4, 'uhhhjhjbjkh', 'admin', 'dd@gmail.com', 5558, 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roompatient`
--
ALTER TABLE `roompatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roompatient`
--
ALTER TABLE `roompatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
