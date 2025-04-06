-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 09:05 PM
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
  `Action ID` int(11) NOT NULL,
  `Action Type` varchar(255) NOT NULL,
  `Employee ID` int(11) NOT NULL,
  `License Plate` varchar(6) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking ID` int(8) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Car Code` varchar(32) NOT NULL,
  `Location` varchar(32) NOT NULL,
  `Start Date` date NOT NULL,
  `End Date` date NOT NULL,
  `Coverage` tinyint(4) NOT NULL,
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking ID`, `Email`, `Car Code`, `Location`, `Start Date`, `End Date`, `Coverage`, `payment_id`) VALUES
(17205775, 'michael@rental.com', '1', 'Vancouver International Airport', '2025-04-09', '2025-04-10', 0, 51874230),
(26255661, 'michael@gmail.com', '0', '1', '2025-03-14', '2025-03-15', 3, 68139990),
(28802784, 'owen@gmail.com', '0', '2', '2025-03-17', '2025-03-19', 0, 85077264),
(32124444, 'dog144@gmail.com', 'Ford_F150_2020', 'Vancouver International Airport ', '2025-04-12', '2025-04-14', 0, 30966354),
(34902448, 'dog144@gmail.com', 'Ford_F150_2020', 'Vancouver International Airport ', '2025-04-12', '2025-04-14', 0, 69599982),
(38618158, 'mj@gmail.com', 'Toyota_Corolla_2023', 'Vancouver Main Street Science Wo', '2025-04-06', '2025-04-08', 0, 79234676),
(55246941, 'michael@rental.com', '1', 'Vancouver International Airport', '2025-04-03', '2025-04-04', 0, 65100849),
(89826356, 'michael@rental.com', '1', 'Main Street Science World', '2025-04-07', '2025-04-09', 0, 16704305),
(90825175, '125@gmail.com', 'Dodge_Caravan_2023', 'Vancouver Main Street Science Wo', '2025-04-05', '2025-04-08', 0, 58218978),
(93390959, 'michael@rental.com', '1', 'Main Street Science World', '2025-04-07', '2025-04-09', 0, 50981980),
(97475730, 'michael@rental.com', '1', 'Vancouver International Airport', '2025-04-03', '2025-04-04', 0, 70252969);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `Car Code` varchar(64) NOT NULL,
  `Location` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `Car Code`, `Location`) VALUES
(1, 'Toyota_Corolla_2023', 'Vancouver International Airport (YVR)'),
(2, 'Toyota_Corolla_2023', 'Vancouver International Airport (YVR)'),
(3, 'Toyota_Corolla_2023', 'Vancouver International Airport (YVR)'),
(4, 'Toyota_Prius_2023', 'Vancouver International Airport (YVR)'),
(5, 'Toyota_Prius_2023', 'Vancouver International Airport (YVR)'),
(6, 'Toyota_Prius_2023', 'Vancouver International Airport (YVR)'),
(7, 'Toyota_Sienna_2023', 'Vancouver International Airport (YVR)'),
(8, 'Toyota_Sienna_2023', 'Vancouver International Airport (YVR)'),
(9, 'Toyota_Sienna_2023', 'Vancouver International Airport (YVR)'),
(10, 'Toyota_Corolla_2023', 'Vancouver Main Street Science World'),
(11, 'Toyota_Corolla_2023', 'Vancouver Main Street Science World'),
(13, 'Toyota_Prius_2023', 'Vancouver Main Street Science World'),
(14, 'Toyota_Prius_2023', 'Vancouver Main Street Science World'),
(16, 'Toyota_Sienna_2023', 'Vancouver Main Street Science World'),
(18, 'Toyota_Sienna_2023', 'Vancouver Main Street Science World'),
(19, 'Ford_EscapeHybrid_2025', 'Vancouver International Airport (YVR)'),
(20, 'Ford_Escape_2024', 'Vancouver International Airport (YVR)'),
(21, 'Ford_F150_2020', 'Vancouver International Airport (YVR)'),
(22, 'Ford_Mustang_2020', 'Vancouver International Airport (YVR)'),
(23, 'Ford_Transit_2023', 'Vancouver International Airport (YVR)'),
(24, 'Ford_EscapeHybrid_2025', 'Vancouver International Airport (YVR)'),
(25, 'Ford_Escape_2024', 'Vancouver International Airport (YVR)'),
(26, 'Ford_F150_2020', 'Vancouver International Airport (YVR)'),
(27, 'Ford_Mustang_2020', 'Vancouver International Airport (YVR)'),
(28, 'Ford_Transit_2023', 'Vancouver International Airport (YVR)'),
(29, 'Ford_EscapeHybrid_2025', 'Vancouver Main Street Science World'),
(30, 'Ford_Escape_2024', 'Vancouver Main Street Science World'),
(31, 'Ford_F150_2020', 'Vancouver Main Street Science World'),
(32, 'Ford_Mustang_2020', 'Vancouver Main Street Science World'),
(33, 'Ford_Transit_2023', 'Vancouver Main Street Science World'),
(34, 'Dodge_Caravan_2023', 'Vancouver International Airport (YVR)'),
(35, 'Dodge_Caravan_2023', 'Vancouver International Airport (YVR)'),
(36, 'Dodge_Caravan_2023', 'Vancouver Main Street Science World'),
(37, 'Volkswagen_Jetta_2022', 'Vancouver International Airport (YVR)'),
(38, 'Ford_Focus_2022', 'Vancouver International Airport (YVR)'),
(39, 'Volkswagen_Jetta_2022', 'Vancouver International Airport (YVR)'),
(40, 'Ford_Focus_2022', 'Vancouver International Airport (YVR)'),
(41, 'Volkswagen_Jetta_2022', 'Vancouver Main Street Science World'),
(42, 'Ford_Focus_2022', 'Vancouver Main Street Science World');

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
  `Seating` int(11) NOT NULL,
  `Mileage` varchar(255) NOT NULL,
  `daily_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car specifications`
--

INSERT INTO `car specifications` (`Car Code`, `Manufacturer`, `Model`, `Body Type`, `Drive Train`, `Fuel Type`, `Seating`, `Mileage`, `daily_price`) VALUES
('Dodge_Caravan_2023', 'Dodge', 'Caravan', 'Van', 'FWD', 'Gas', 7, '150', 75),
('Ford_EscapeHybrid_2025', 'Ford', 'Escape', 'SUV', 'AWD', 'Hybrid', 5, 'Unlimited', 84),
('Ford_Escape_2024', 'Ford', 'Escape', 'SUV', 'FWD', 'Hybrid', 5, 'Unlimited', 89),
('Ford_F150_2020', 'Ford', 'F150', 'Truck', 'AWD', 'Gas', 2, '150', 89),
('Ford_Focus_2022', 'Ford', 'Focus', 'Car', 'FWD', 'Gas', 4, 'Unlimited', 69),
('Ford_Mustang_2020', 'Ford', 'Mustang', 'Coupe', 'RWD', 'Gas', 4, '150', 80),
('Ford_Transit_2023', 'Ford', 'Transit', 'Van', 'RWD', 'Gas', 6, '200', 78),
('Toyota_Corolla_2023', 'Toyota', 'Corolla', 'Car', 'FWD', 'Gas', 5, 'Unlimited', 60),
('Toyota_Prius_2023', 'Toyota', 'Prius', 'Car', 'FWD', 'Hybrid', 5, 'Unlimited', 60),
('Toyota_Sienna_2023', 'Toyota', 'Sienna', 'Van', 'AWD', 'Hybrid', 7, 'Unlimited', 85),
('Volkswagen_Jetta_2022', 'Volkswagen', 'Jetta', 'Car', 'FWD', 'Gas', 5, 'Unlimited', 68);

-- --------------------------------------------------------

--
-- Table structure for table `coverage options`
--

CREATE TABLE `coverage options` (
  `Coverage_ID` int(11) NOT NULL,
  `Coverage_Type` varchar(64) NOT NULL,
  `Day Price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coverage options`
--

INSERT INTO `coverage options` (`Coverage_ID`, `Coverage_Type`, `Day Price`) VALUES
(0, 'No Coverage', 0.00),
(1, 'Basic Liability', 50.00),
(2, 'Liability + Collision', 100.00),
(3, 'Full Coverage', 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee ID` int(11) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `First Name` varchar(32) NOT NULL,
  `Last Name` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee ID`, `Password`, `First Name`, `Last Name`, `Email`, `Location`) VALUES
(1234, '1234', 'Michael', 'Su', 'MSu@rental.com', 1),
(4321, '1234', 'Owen', 'Chan', 'OChan@rental.com', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `office locations`
--

CREATE TABLE `office locations` (
  `Location Code` int(3) NOT NULL,
  `Office Name` varchar(255) NOT NULL,
  `City` varchar(32) NOT NULL,
  `Province` varchar(32) NOT NULL,
  `Address` varchar(64) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office locations`
--

INSERT INTO `office locations` (`Location Code`, `Office Name`, `City`, `Province`, `Address`, `Phone`) VALUES
(1, 'Vancouver International Airport (YVR)', 'Richmond', 'British Columbia', '1234 Airport Road, Richmond, BC, V7B 0A1', '6045551234'),
(2, 'Vancouver Main Street Science World', 'Vancouver', 'British Columbia', '999 Burrard St., Vancouver, BC, V5R 1A1', '7781235555');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_total` decimal(10,0) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_date`, `payment_total`, `booking_id`) VALUES
(16704305, '0000-00-00', 222, 89826356),
(30966354, '0000-00-00', 178, 32124444),
(50981980, '0000-00-00', 222, 93390959),
(51874230, '0000-00-00', 111, 17205775),
(58218978, '0000-00-00', 225, 90825175),
(65100849, '0000-00-00', 123, 55246941),
(68139990, '0000-00-00', 123, 26255661),
(69599982, '0000-00-00', 178, 34902448),
(70252969, '0000-00-00', 321, 97475730),
(79234676, '2025-04-06', 120, 0),
(85077264, '0000-00-00', 222, 28802784);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `First Name` varchar(32) NOT NULL,
  `Last Name` varchar(32) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `First Name`, `Last Name`, `Password`, `Role`) VALUES
(1, 'michael@rental.com', 'Michael', 'Su', '$2y$10$8aLtrbh2MAwRMIsxomkYSum2lYwFQw3XtVwayV7mwwj7F7UGnHxc2', 'member'),
(16, 'michael2@rental.com', 'Michael', 'Su', '$2y$10$ZHiK9MaKu2hE/ejixoZ7S.qNtAkxSyOPB6V5N0HJqujvI58ti5mH6', 'member'),
(17, 'test@rental.com', 'test', 'ing', '$2y$10$u.k2N/oQtQ/3CK9Wn2ux/u43txcFLLGy9wyVgzFtPyjEoKsEECQUa', 'member'),
(18, '1@rental.com', 'asd', 'asd', '$2y$10$w7TyP35yDN/IBw1WiYwJge48rBS773TwATVw1izUqh0BrC5voSsg6', 'member');

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
  ADD PRIMARY KEY (`Booking ID`),
  ADD UNIQUE KEY `Booking ID` (`Booking ID`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car specifications`
--
ALTER TABLE `car specifications`
  ADD PRIMARY KEY (`Car Code`);

--
-- Indexes for table `coverage options`
--
ALTER TABLE `coverage options`
  ADD PRIMARY KEY (`Coverage_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee ID`);

--
-- Indexes for table `office locations`
--
ALTER TABLE `office locations`
  ADD PRIMARY KEY (`Location Code`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin history`
--
ALTER TABLE `admin history`
  MODIFY `Action ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85077265;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
