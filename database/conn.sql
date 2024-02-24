-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 09:22 AM
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
  `Car Name` varchar(20) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`ID`, `First Name`, `Last Name`, `Email`, `Contact`, `Gender`, `Booking Date`, `Car Name`, `Address`) VALUES
(1, 'Ashutosh', 'Shinde', 'a@gmail.com', 1245788956, 'Male', '2024-01-24', 'TATA Nexon', ''),
(2, 'Ashu', 'Shinde', 'acsd@gmail.com', 152423685, 'male', '2024-01-31', 'nexon', ''),
(28, 'c', 'j', 'cj@gmail.com', 12452145, 'Male', '2024-02-29', 'bjsnd', ''),
(29, 'ash', 'ash', 'ash@gmail.com', 154623, 'Male', '2024-03-01', 'dskjln', ''),
(30, 'Ashu', '', 'ashu1@gmail.com', 1245896226, 'Male', '2024-03-06', 'Volvo XC60', 'lknl');

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
(4, '../img/car01.png', 'Volvo XC60', 68, 2023, 'Automatic', 'Electric', 180),
(5, '../img/car06.png', 'Land Range Rover Sport', 169, 2024, 'Automatic', 'Electric', 180),
(6, '../img/front-left-side-47.webp', 'BMW i7', 213, 2024, 'Automatic', 'Electric', 250),
(7, '../img/about2.png', 'Jaguar I-Pace', 126, 2024, 'Automatic', 'Electric', 200),
(8, '../img/Mahindra XUV400 EV.webp', 'Mahindra XUV400 EV', 16, 2023, 'Automatic', 'Electric', 150),
(13, '../img/MG ZS.png', 'MG ZS', 19, 2022, 'Automatic', 'Electric', 140);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `Full Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` int(12) NOT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `Full Name`, `Email`, `Contact`, `Feedback`) VALUES
(1, 'Ashutosh', 'ashutosh@gmail.com', 124578, 'I wanted to share some quick feedback on your website. Overall, I appreciate the wide selection of cars and accessories. However, I found the checkout process a bit cumbersome and the website could be faster, especially on mobile. Improving these areas would enhance the user experience significantly.'),
(2, 'Ashutosh Shinde', 'ashushinde@gmail.com', 1248569, 'I wanted to share some quick feedback on your website. Overall, I appreciate the wide selection of cars and accessories. However, I found the checkout process a bit cumbersome and the website could be faster, especially on mobile. Improving these areas would enhance the user experience significantly.');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `ID` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` int(20) NOT NULL,
  `p_quantity` int(20) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`ID`, `p_name`, `p_price`, `p_quantity`, `Image`) VALUES
(1, 'Tyers', 4999, 11, '../img/part6.png'),
(2, 'Engine', 70000, 2, '../img/part1.png'),
(3, 'Engine and Piston', 80000, 2, '../img/part2.png'),
(4, 'Fiber Oil Filter', 1900, 5, '../img/part4.png'),
(5, 'Alternator', 5999, 3, '../img/part5.png'),
(6, 'Battery', 450000, 1, '../img/part7.png'),
(7, 'Car Spares', 5000, 0, '../img/part3.png'),
(8, 'Tyres', 3000, 8, '../img/part6.png');

-- --------------------------------------------------------

--
-- Table structure for table `parts_sells`
--

CREATE TABLE `parts_sells` (
  `ID` int(11) NOT NULL,
  `Part Name` varchar(20) NOT NULL,
  `Part Price` int(10) NOT NULL,
  `Quantity` int(20) NOT NULL DEFAULT 1,
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
(11, 'mm', 20, 20, 'A@mail.com', 'eeww', 23123, 'fwefefe', '2024-02-01'),
(12, '', 0, 1, 'a@gmail.com', 'aa', 353, 'kajd', '2024-02-06'),
(13, 'Car Spares', 5000, 1, 'a@gmail.com', 'as', 65, 'iugi', '2024-02-12'),
(14, 'Engine and Piston', 80000, 1, 'sd@sdf.com', 'asf', 66546, 'jn', '2024-02-12'),
(23, 'Engine and Piston', 80000, 1, 'a@gmail.com', 'Ashutosh', 124525, 'zdkjb kjsbdf kjabsc', '2024-02-15'),
(45, 'Car Spares', 5000, 1, 'sldmc@sdkn.com', 'wldfm', 76876, 'alskmc', '2024-02-17'),
(46, 'Tyers', 4999, 1, 'v@gmail.com', 'v', 54, 'wkjdn', '2024-02-17'),
(47, 'Tyres', 3000, 2, 'b@gmail.com', 'b', 56455, 'kdjn kdnc', '2024-02-17');

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
(4, 'anup', 'anp', 'anp@gmail.com', 1246389, 123, 'user'),
(5, 'Sajid Bagwan', 'sajid', 'sajid@gmail.com', 6546, 123, 'admin');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parts_sells`
--
ALTER TABLE `parts_sells`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
