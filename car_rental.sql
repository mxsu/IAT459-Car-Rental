-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 07:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin history`
--

CREATE TABLE `admin history` (
  `Employee ID` int(11) NOT NULL,
  `License Plate` int(11) NOT NULL,
  `Action ID` int(11) NOT NULL,
  `Action Type` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking ID` varchar(8) NOT NULL,
  `Email` text NOT NULL,
  `License Plate` text NOT NULL,
  `Location` int(11) NOT NULL,
  `Start Date` date NOT NULL,
  `End Date` date NOT NULL,
  `Coverage` text NOT NULL,
  `Total Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking history`
--

CREATE TABLE `booking history` (
  `Booking ID` int(11) NOT NULL,
  `member email` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `License Plate` varchar(6) NOT NULL,
  `Car Code` text NOT NULL,
  `Location` int(11) NOT NULL,
  `Mileage` binary(1) NOT NULL,
  `Book Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car specifications`
--

CREATE TABLE `car specifications` (
  `Manufacturer` int(11) NOT NULL,
  `Model` int(11) NOT NULL,
  `Body Type` varchar(12) NOT NULL,
  `Drive Train` varchar(12) NOT NULL,
  `Fuel Type` varchar(8) NOT NULL,
  `Seating` int(11) NOT NULL,
  `Car Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee ID` int(11) NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL,
  `Email` text NOT NULL,
  `Location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `Email` varchar(32) NOT NULL,
  `Phone Number` int(11) NOT NULL,
  `First Name` int(11) NOT NULL,
  `Last Name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members credit card info`
--

CREATE TABLE `members credit card info` (
  `Email` text NOT NULL,
  `CC Number` int(11) NOT NULL,
  `Expiration Date` int(11) NOT NULL,
  `Billing Address` int(11) NOT NULL,
  `City` text NOT NULL,
  `Country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members drivers license`
--

CREATE TABLE `members drivers license` (
  `Email` text NOT NULL,
  `DL Number` int(7) NOT NULL,
  `Expiration Date` date NOT NULL,
  `Province` text NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office locations`
--

CREATE TABLE `office locations` (
  `Location Code` int(3) NOT NULL,
  `City` text NOT NULL,
  `Address` text NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Member Email` text NOT NULL,
  `Booking ID` varchar(8) NOT NULL,
  `Total Price` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `Email` text NOT NULL,
  `Phone Number` int(11) NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking ID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`License Plate`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `office locations`
--
ALTER TABLE `office locations`
  ADD PRIMARY KEY (`Location Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
