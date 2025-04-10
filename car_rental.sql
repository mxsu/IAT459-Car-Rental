-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 09:39 AM
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
-- Database: `marine_drive_rental`
--

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
  `Coverage` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Mileage` varchar(32) NOT NULL,
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
  `Coverage_ID` tinyint(11) NOT NULL,
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
-- Table structure for table `members drivers license`
--

CREATE TABLE `members drivers license` (
  `Email` varchar(32) NOT NULL,
  `DL Number` int(8) NOT NULL,
  `Expiration Date` date NOT NULL,
  `Province` varchar(32) NOT NULL,
  `Age` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_total` decimal(10,2) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking ID`),
  ADD KEY `Car Code` (`Car Code`),
  ADD KEY `Coverage` (`Coverage`),
  ADD KEY `Booking ID` (`Booking ID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Car Code` (`Car Code`);

--
-- Indexes for table `car specifications`
--
ALTER TABLE `car specifications`
  ADD PRIMARY KEY (`Car Code`),
  ADD KEY `Car Code` (`Car Code`);

--
-- Indexes for table `coverage options`
--
ALTER TABLE `coverage options`
  ADD PRIMARY KEY (`Coverage_ID`),
  ADD KEY `Coverage_ID` (`Coverage_ID`);

--
-- Indexes for table `members drivers license`
--
ALTER TABLE `members drivers license`
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`email`),
  ADD KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Car Code`) REFERENCES `car` (`Car Code`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`Coverage`) REFERENCES `coverage options` (`Coverage_ID`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`Car Code`) REFERENCES `car specifications` (`Car Code`);

--
-- Constraints for table `members drivers license`
--
ALTER TABLE `members drivers license`
  ADD CONSTRAINT `members drivers license_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`email`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`Booking ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
