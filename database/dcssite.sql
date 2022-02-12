-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 02:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcssite`
--

-- --------------------------------------------------------

--
-- Table structure for table `anounce`
--

CREATE TABLE `anounce` (
  `Id` int(11) NOT NULL,
  `Anouncement` varchar(200) NOT NULL,
  `H` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `D` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `Id` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`Id`, `Name`, `Msg`) VALUES
(NULL, 'sacheera', 'sasasasa'),
(NULL, '', 'sassaa');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `Id` int(11) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Mon` varchar(50) NOT NULL,
  `Tue` varchar(50) NOT NULL,
  `Wed` varchar(50) NOT NULL,
  `Thur` varchar(50) NOT NULL,
  `Fry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`Id`, `Time`, `Mon`, `Tue`, `Wed`, `Thur`, `Fry`) VALUES
(1, '08:30 - 09:30', '', 'CO1224', 'CO1224', 'CO1214', 'CO1221'),
(3, '09:30 - 10:30', 'CO1223', 'CO1224', 'CO1224', 'CO1214', 'CO1221'),
(4, '10:30 - 11:30', 'CO1222', 'CO1212', 'CO1213', 'CO1223', ''),
(5, '11:30 - 12:30', 'CO1222', 'CO1212', 'CO1213', 'CO1223', ' '),
(6, '13:30 - 14:30', 'CO1226', '', 'CO1226', 'CO1222', ' '),
(7, '14:30 - 15:30', 'CO1221', 'CO1221', 'CO1225', '', ' '),
(8, '15:30 - 16:30', 'CO1221', 'CO1221', 'CO1225', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anounce`
--
ALTER TABLE `anounce`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anounce`
--
ALTER TABLE `anounce`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
