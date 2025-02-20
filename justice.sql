-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2025 at 06:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `bid_amount` decimal(10,0) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `problem` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`ID`, `user_id`, `name`, `email`, `address`, `phone`, `bid_amount`, `time`, `problem`) VALUES
(1, 1, 'Ansariareeb', 'areeb123@gmail.com', 'ansari', '123456785', 1000, '2025-02-17 20:18:39', '            var_dump($address);');

-- --------------------------------------------------------

--
-- Table structure for table `client_profile`
--

CREATE TABLE `client_profile` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `cnic_no` varchar(20) NOT NULL,
  `work` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_profile`
--

INSERT INTO `client_profile` (`ID`, `user_id`, `phone_no`, `address`, `DOB`, `gender`, `cnic_no`, `work`) VALUES
(1, 1, '1234567', 'ansari', '2024-12-10', 'male', '', '123');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_profile`
--

CREATE TABLE `lawyer_profile` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL,
  `language` varchar(15) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `education` varchar(50) NOT NULL,
  `CNIC` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer_profile`
--

INSERT INTO `lawyer_profile` (`ID`, `user_ID`, `availability`, `specialty`, `bio`, `DOB`, `gender`, `contact`, `address`, `experience`, `language`, `fee`, `photo`, `education`, `CNIC`) VALUES
(1, 3, '123', '1231', '2311', '2024-12-24', 'male', '132132', '313', 132, '23211', 232123.00, 'ANSARi’s.jpg', '12331', '3213');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Lawyer','Client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `name`, `email`, `password`, `role`) VALUES
(1, 'Areeb', 'areeb@gmail.com', '12345', 'Client'),
(2, 'Arsal', 'arsal@gmail.com', '12345', 'Lawyer'),
(3, 'Areeb', 'ansariareeb567@gmail.com', '12345', 'Lawyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `client_profile`
--
ALTER TABLE `client_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lawyer_profile`
--
ALTER TABLE `lawyer_profile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `lawyer` (`user_ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_profile`
--
ALTER TABLE `client_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lawyer_profile`
--
ALTER TABLE `lawyer_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `client_profile` (`ID`);

--
-- Constraints for table `lawyer_profile`
--
ALTER TABLE `lawyer_profile`
  ADD CONSTRAINT `lawyer` FOREIGN KEY (`user_ID`) REFERENCES `register` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
