-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 08:21 AM
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
-- Table structure for table `admin action`
--

CREATE TABLE `admin action` (
  `Action ID` tinyint(4) NOT NULL,
  `Action Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin action`
--

INSERT INTO `admin action` (`Action ID`, `Action Type`) VALUES
(0, 'Remove Car from Fleet'),
(1, 'Add Car to Fleet'),
(2, 'Change Booking Car'),
(3, 'Change Car Location');

-- --------------------------------------------------------

--
-- Table structure for table `admin history`
--

CREATE TABLE `admin history` (
  `Action ID` int(11) NOT NULL,
  `Employee ID` int(11) NOT NULL,
  `License Plate` varchar(6) NOT NULL,
  `Action Type` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking ID` int(8) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `License Plate` varchar(6) NOT NULL,
  `Location` tinyint(4) NOT NULL,
  `Start Date` date NOT NULL,
  `End Date` date NOT NULL,
  `Coverage` tinyint(4) NOT NULL,
  `Total Price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking ID`, `Email`, `License Plate`, `Location`, `Start Date`, `End Date`, `Coverage`, `Total Price`) VALUES
(1, 'michael@gmail.com', 'AAA111', 1, '2025-03-14', '2025-03-15', 3, 123.44),
(2, 'owen@gmail.com', 'AAA111', 2, '2025-03-17', '2025-03-19', 0, 222.33);

-- --------------------------------------------------------

--
-- Table structure for table `booking history`
--

CREATE TABLE `booking history` (
  `Booking ID` int(8) NOT NULL,
  `member email` varchar(32) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking history`
--

INSERT INTO `booking history` (`Booking ID`, `member email`, `Status`) VALUES
(1, 'michael@gmail.com', 2),
(2, 'owen@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking status`
--

CREATE TABLE `booking status` (
  `status_id` tinyint(1) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking status`
--

INSERT INTO `booking status` (`status_id`, `status_name`) VALUES
(0, 'Awaiting pickup'),
(1, 'Rental in progress'),
(2, 'Rental returned');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `License Plate` varchar(6) NOT NULL,
  `Car Code` varchar(64) NOT NULL,
  `Location` int(11) NOT NULL,
  `Mileage` tinyint(1) NOT NULL,
  `Book Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`License Plate`, `Car Code`, `Location`, `Mileage`, `Book Status`) VALUES
('AAA111', 'Toyota_1234', 1, 0, 1),
('QQQ123', 'Toyota_Corolla_2023', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car mileage`
--

CREATE TABLE `car mileage` (
  `mileage ID` tinyint(4) NOT NULL,
  `mileage option` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car mileage`
--

INSERT INTO `car mileage` (`mileage ID`, `mileage option`) VALUES
(0, 'Unlimited Miles'),
(1, 'Limited Miles');

-- --------------------------------------------------------

--
-- Table structure for table `car specifications`
--

CREATE TABLE `car specifications` (
  `Car Code` varchar(64) NOT NULL,
  `Manufacturer` varchar(32) NOT NULL,
  `Model` varchar(32) NOT NULL,
  `Body Type` varchar(32) NOT NULL,
  `Drive Train` varchar(32) NOT NULL,
  `Fuel Type` varchar(32) NOT NULL,
  `Seating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car specifications`
--

INSERT INTO `car specifications` (`Car Code`, `Manufacturer`, `Model`, `Body Type`, `Drive Train`, `Fuel Type`, `Seating`) VALUES
('Toyota_Corolla_2023', 'Toyota', 'Corolla', 'Sedan', 'FWD', 'Gas', 5);

-- --------------------------------------------------------

--
-- Table structure for table `coverage options`
--

CREATE TABLE `coverage options` (
  `Coverage_ID` int(11) NOT NULL,
  `Coverage_Type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coverage options`
--

INSERT INTO `coverage options` (`Coverage_ID`, `Coverage_Type`) VALUES
(0, 'No Coverage'),
(1, 'Basic Liability'),
(3, 'Full Coverage'),
(2, 'Liability + Collision');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee ID` int(11) NOT NULL,
  `First Name` varchar(32) NOT NULL,
  `Last Name` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee ID`, `First Name`, `Last Name`, `Email`, `Location`) VALUES
(1234, 'Michael', 'Su', 'MSu@rental.com', 1),
(4321, 'Owen', 'Chan', 'OChan@rental.com', 2);
(6969, 'Admin', 'Person', 'admin@rental.com', 1);
(7777, 'John', 'Doe', 'JDoe@rental.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `Email` varchar(32) NOT NULL,
  `Phone Number` varchar(20) NOT NULL,
  `First Name` varchar(32) NOT NULL,
  `Last Name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Email`, `Phone Number`, `First Name`, `Last Name`) VALUES
('michael@gmail.com', '6041234321', 'Michael', 'Soo'),
('owen@gmail.com', '7781234321', 'Owen', 'Chen');

-- --------------------------------------------------------

--
-- Table structure for table `members credit card info`
--

CREATE TABLE `members credit card info` (
  `Email` varchar(32) NOT NULL,
  `CC Number` bigint(11) NOT NULL,
  `Expiration Date` date NOT NULL,
  `Billing Address` varchar(64) NOT NULL,
  `City` varchar(32) NOT NULL,
  `Country` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members credit card info`
--

INSERT INTO `members credit card info` (`Email`, `CC Number`, `Expiration Date`, `Billing Address`, `City`, `Country`) VALUES
('michael@gmail.com', 1111222233334444, '2028-03-01', '1234 Kingsway, Vancouver, BC, Canada, V5R 1A1', 'Vancouver', 'Canada'),
('owen@gmail.com', 4444333322221111, '2029-03-01', '1234 SW. Marine Drive, Vancouver, BC, Canada, V5R 1B1', 'Vancouver', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `members drivers license`
--

CREATE TABLE `members drivers license` (
  `Email` varchar(32) NOT NULL,
  `DL Number` int(7) NOT NULL,
  `Expiration Date` date NOT NULL,
  `Province` varchar(32) NOT NULL,
  `Age` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members drivers license`
--

INSERT INTO `members drivers license` (`Email`, `DL Number`, `Expiration Date`, `Province`, `Age`) VALUES
('michael@gmail.com', 1231231, '2025-03-28', 'British Columbia', 33),
('owen@gmail.com', 1122334, '2035-03-01', 'British Columbia', 22);

-- --------------------------------------------------------

--
-- Table structure for table `office locations`
--

CREATE TABLE `office locations` (
  `Location Code` int(3) NOT NULL,
  `City` varchar(32) NOT NULL,
  `Province` varchar(32) NOT NULL,
  `Address` text NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office locations`
--

INSERT INTO `office locations` (`Location Code`, `City`, `Province`, `Address`, `Phone`) VALUES
(1, 'Richmond', 'British Columbia', '1234 Airport Road, Richmond, BC, V7B 0A1', '6045551234'),
(2, 'Vancouver', 'British Columbia', '999 Burrard St., Vancouver, BC, V5R 1A1', '7781235555');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Member Email` varchar(32) NOT NULL,
  `Booking ID` varchar(8) NOT NULL,
  `Total Price` decimal(6,2) NOT NULL,
  `Payment Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Member Email`, `Booking ID`, `Total Price`, `Payment Date`) VALUES
('michael@gmail.com', '1', 123.44, '2025-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `Email` varchar(32) NOT NULL,
  `Phone Number` bigint(20) NOT NULL,
  `First Name` varchar(32) NOT NULL,
  `Last Name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`Email`, `Phone Number`, `First Name`, `Last Name`) VALUES
('guest@gmail.com', 6040009999, 'Guest', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin history`
--
ALTER TABLE `admin history`
  ADD PRIMARY KEY (`Action ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking ID`);

--
-- Indexes for table `booking history`
--
ALTER TABLE `booking history`
  ADD PRIMARY KEY (`Booking ID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`License Plate`);

--
-- Indexes for table `car specifications`
--
ALTER TABLE `car specifications`
  ADD PRIMARY KEY (`Car Code`);

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

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Booking ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin history`
--
ALTER TABLE `admin history`
  MODIFY `Action ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
