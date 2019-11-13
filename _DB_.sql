-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 13, 2019 at 01:46 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanplan`
--
CREATE DATABASE IF NOT EXISTS `lanplan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lanplan`;

-- --------------------------------------------------------

--
-- Table structure for table `LanParties`
--

DROP TABLE IF EXISTS `LanParties`;
CREATE TABLE `LanParties` (
  `PartyID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LocationID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LanParties`
--

INSERT INTO `LanParties` (`PartyID`, `Name`, `LocationID`, `Date`) VALUES
(1, 'GEENLEVEN/ENKELGAMEN', 2, '2019-11-22'),
(2, 'KojimaIsOurLordAndSaviour', 1, '2019-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `PartyLocation`
--

DROP TABLE IF EXISTS `PartyLocation`;
CREATE TABLE `PartyLocation` (
  `LocationID` int(11) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Streetnumber` varchar(3) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Postal number` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PartyLocation`
--

INSERT INTO `PartyLocation` (`LocationID`, `Street`, `Streetnumber`, `City`, `Postal number`) VALUES
(1, 'ditiseenteststraat', '46', 'resetcity', '6969'),
(2, 'battlefield', '1', 'Normandy', '5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `LanParties`
--
ALTER TABLE `LanParties`
  ADD PRIMARY KEY (`PartyID`);

--
-- Indexes for table `PartyLocation`
--
ALTER TABLE `PartyLocation`
  ADD PRIMARY KEY (`LocationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `LanParties`
--
ALTER TABLE `LanParties`
  MODIFY `PartyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PartyLocation`
--
ALTER TABLE `PartyLocation`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
