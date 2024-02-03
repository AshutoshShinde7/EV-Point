-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 05:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conn`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `ID` int(11) NOT NULL,
  `First Name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Last Name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Contact` int(10) NOT NULL,
  `Gender` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Booking Date` date NOT NULL,
  `Car Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`ID`, `First Name`, `Last Name`, `Email`, `Contact`, `Gender`, `Booking Date`, `Car Name`) VALUES
(1, 'Ashutosh', 'Shinde', 'a@gmail.com', 1245788956, 'Male', '2024-01-24', 'TATA Nexon'),
(2, 'Ashu', 'Shinde', 'acsd@gmail.com', 152423685, 'male', '2024-01-31', 'nexon');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Title` varchar(125) NOT NULL,
  `Price` int(30) NOT NULL,
  `Model-Year` int(5) NOT NULL,
  `Transmission` varchar(255) NOT NULL DEFAULT 'Automatic',
  `Fuel Type` varchar(255) NOT NULL DEFAULT 'Electric(Battery)',
  `Speed` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `Image`, `Title`, `Price`, `Model-Year`, `Transmission`, `Fuel Type`, `Speed`) VALUES
(1, '../img/nexonevnexonevrightfrontthreequarter.jpeg', 'Tata Nexon EV', 14, 2023, 'Automatic', 'Electric', 150),
(2, '../img/punch-ev.webp', 'Tata Punch EV', 11, 2024, 'Automatic', 'Electric', 150),
(3, '../img/xc40.webp', 'Volvo XC40 Recharge', 58, 2023, 'Automatic', 'Electric', 180),
(4, '../img/car1.jpg', 'Volvo XC60', 69, 0, 'Automatic', 'Electric', 180),
(5, '../img/car06.png', 'Land Range Rover Sport', 169, 2024, 'Automatic', 'Electric', 180),
(6, '../img/front-left-side-47.webp', 'BMW i7', 213, 2024, 'Automatic', 'Electric', 250),
(7, '../img/about2.png', 'Jaguar I-Pace', 126, 2024, 'Automatic', 'Electric', 200),
(8, '../img/Mahindra XUV400 EV.webp', 'Mahindra XUV400 EV', 16, 2023, 'Automatic', 'Electric', 150);

-- --------------------------------------------------------

--
-- Table structure for table `parts_sells`
--

CREATE TABLE `parts_sells` (
  `ID` int(11) NOT NULL,
  `Part Name` varchar(20) NOT NULL,
  `Part Price` int(10) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Address` text NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts_sells`
--

INSERT INTO `parts_sells` (`ID`, `Part Name`, `Part Price`, `Quantity`, `Email`, `Name`, `Contact`, `Address`, `Date`) VALUES
(1, 'ajk', 10, 1, 'a@gmail.com', 'as', 1224625, 'hs', '2024-01-23'),
(10, 'mm', 20, 20, 'A@mail.com', 'eeww', 23123, 'fwefefe', '2024-02-01'),
(11, 'mm', 20, 20, 'A@mail.com', 'eeww', 23123, 'fwefefe', '2024-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Password` int(10) NOT NULL,
  `user_type` varchar(6) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `user_name`, `Email`, `Contact`, `Password`, `user_type`) VALUES
(1, 'Ashutosh', 'ash', 'ash@gmail.com', 984578546, 123, 'admin'),
(2, 'Ashu', 'ashu', 'ashu1@gmail.com', 1245896226, 123, 'user'),
(3, 'Ashutosh', 'demon', 'd@gmail.com', 1246326845, 123, 'user'),
(4, 'anup', 'anp', 'anp@gmail.com', 1246389, 123, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parts_sells`
--
ALTER TABLE `parts_sells`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parts_sells`
--
ALTER TABLE `parts_sells`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
