-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 02:14 PM
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
  `Email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Contact` int(10) NOT NULL,
  `Gender` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Booking Date` date NOT NULL,
  `Car Name` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `booking fees` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`ID`, `First Name`, `Email`, `Contact`, `Gender`, `Booking Date`, `Car Name`, `Address`, `booking fees`) VALUES
(1, 'Ashu', 'ashu1@gmail.com', 1245896226, 'Male', '2024-03-19', 'MG Comet EV', 'Ramnagar 6th lane, Kolhapur road, Sangli', '₹500'),
(2, 'Rakesh', 'rm@gmail.com', 15478965, 'Male', '2024-03-22', 'Tata Punch EV', 'Shamrao Nagar, Kolhapur road,Sangli', '₹500'),
(3, 'Prathamesh', 'prathameshkole@gmail', 2147483647, 'Male', '2024-03-29', 'BMW i7', 'Tung Maruti Mandir samor, Tung', '₹500'),
(4, 'Omkar', 'omkarmote@gmail.com', 2147483647, 'Male', '2024-03-21', 'Land Range Rover Spo', 'DMart Back Side, 100 Feet Rd, Pragati Colony, Sangli', '₹500'),
(5, 'Aditya', 'adityajagtap@gmail.c', 2147483647, 'Male', '2024-03-31', 'MG Comet EV', 'Laxmi temple, VH55+FPF, Gaon Bhag, Sangli', '₹500'),
(6, 'Mandar', 'mandar@gmail.com', 2147483647, 'Male', '2024-03-27', 'Jaguar I-Pace', 'SanjayNagar 11th Lane, Kolhapur road, Sangli', '₹500'),
(7, 'Sajid', 'sajidbagwan@gmail.co', 2147483647, 'Male', '2024-03-20', 'Tata Punch EV', 'near 11ft road, Sangli ', '₹500'),
(8, 'Sachin', 'sachin10@gmail.com', 2147483647, 'Male', '2024-03-06', 'Volvo XC40 Recharge', '122/12 Classic park, Vishrambagh, Sangli 416415\\r\\n', '₹500'),
(9, 'Ashu', 'ashu1@gmail.com', 1245896226, 'Male', '2024-03-27', 'Tata Nexon EV', 'Ramangar 6th Lane, Sangli', '₹500'),
(10, 'Ashu', 'ashu1@gmail.com', 1245896226, 'Male', '2024-03-27', 'Land Range Rover Spo', 'Ramnagar 6th lane,Sangli', '₹500'),
(11, 'Ashu', 'ashu1@gmail.com', 1245896226, 'Male', '2024-03-27', 'Land Range Rover Spo', 'Ramnagar 6th lane,Sangli', '₹500'),
(12, 'Ashu', 'ashu1@gmail.com', 1245896226, 'Male', '2024-03-27', 'Land Range Rover Spo', 'Ramnagar 6th lane,Sangli', '₹500'),
(13, 'Ashu', 'ashu1@gmail.com', 1245896226, 'Male', '2024-03-28', 'Tata Nexon EV', 'Ramnagar 6th lane, Sangli', '₹500');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Title` varchar(125) NOT NULL,
  `Price` int(30) NOT NULL,
  `ModelYear` int(5) NOT NULL,
  `Transmission` varchar(255) NOT NULL DEFAULT 'Automatic',
  `Fuel Type` varchar(255) NOT NULL DEFAULT 'Electric(Battery)',
  `Speed` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `Image`, `Title`, `Price`, `ModelYear`, `Transmission`, `Fuel Type`, `Speed`) VALUES
(1, '../img/nexonevnexonevrightfrontthreequarter-removebg-preview.png', 'Tata Nexon EV', 14, 2023, 'Automatic', 'Electric', 150),
(2, '../img/punch-ev.webp', 'Tata Punch EV', 12, 2024, 'Automatic', 'Electric', 150),
(3, '../img/xc40-removebg-preview.png', 'Volvo XC40 Recharge', 58, 2023, 'Automatic', 'Electric', 180),
(4, '../img/car01.png', 'Volvo XC60', 68, 2023, 'Automatic', 'Electric', 180),
(5, '../img/car06.png', 'Land Range Rover Sport', 169, 2024, 'Automatic', 'Electric', 180),
(6, '../img/front-left-side-47__1_-removebg-preview.png', 'BMW i7', 213, 2024, 'Automatic', 'Electric', 250),
(7, '../img/about2.png', 'Jaguar I-Pace', 126, 2024, 'Automatic', 'Electric', 200),
(8, '../img/Mahindra_XUV400_EV-removebg-preview.png', 'Mahindra XUV400 EV', 16, 2023, 'Automatic', 'Electric', 150),
(9, '../img/MG ZS.png', 'MG ZS', 19, 2022, 'Automatic', 'Electric', 140),
(10, '../img/MG COMET.png', 'MG Comet EV', 8, 2024, 'Automatic', 'Electric', 100);

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
(1, 'Ashutosh', 'ashutosh@gmail.com', 124578, 'Offer multiple channels for customer support, such as live chat, email, and phone support. This ensures that customers can easily reach out for assistance if they encounter any issues or have questions about the test drive booking process or accessories.'),
(2, 'Ashutosh Shinde', 'ashushinde@gmail.com', 1248569, 'Implement a feedback collection mechanism to gather input from customers about their experience with the website, booking process, test drives, and accessory purchases. Use this feedback to identify areas for improvement and make necessary adjustments to enhance the overall user experience.'),
(3, 'Sachin Satpute', 'sachin@gmail.com', 2147483647, 'Prioritize the security of user data and payment information. Ensure that the website employs robust security measures, such as encryption and secure payment gateways, to protect sensitive information and build trust with customers.'),
(4, 'Mukesh Kumar', 'mk@gmail.com', 2147483647, 'Provide detailed information about available accessories, including descriptions, pricing, compatibility with different car models, and installation instructions. This helps customers make informed decisions about which accessories to purchase.'),
(5, 'Prathamesh Kole', 'prathameshkole@gmail.com', 568974589, 'Implement a system to send booking confirmations and reminders to users who have scheduled test drives. This helps reduce the likelihood of no-shows and ensures a smoother experience for both customers and dealership staff.'),
(6, 'Aditya Jagtap', 'adityajagtap@gmail.com', 2147483647, 'With many users browsing the internet on mobile devices, it\'s crucial that the website is optimized for mobile responsiveness. Ensure that all features and functionalities work seamlessly on mobile devices to provide a consistent user experience across different platforms.'),
(7, 'Mandar Shinde', 'mandar@gmail.com', 658978548, 'Evaluate the website\'s navigation to ensure it is user-friendly and intuitive. Users should be able to easily find the information they need, whether it\'s about booking a test drive, purchasing accessories, or learning more about specific car models.'),
(8, 'Onkar Mote', 'omkarmote@gmail.com', 87648569, 'Ensure that all necessary details about available car models, including specifications, features, and pricing, are clearly presented. This helps potential customers make informed decisions about which cars they want to test drive.'),
(9, 'Sachin Patil', 'sachin10@gmail.com', 152457854, 'The website should ensure a seamless and intuitive booking process for test drives. Simplify the steps required to book a test drive, minimizing any unnecessary information fields to expedite the process.'),
(10, 'Sajid Bagwan', 'sajid007@gmail.com', 45785689, 'Enhance engagement and appeal by incorporating high-quality images, videos, and interactive features showcasing cars for test drives and accessories. Including customer-generated content fosters a sense of community and trust among potential buyers.');

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
(1, 'Tyers', 5999, 10, '../img/tyer 2.png'),
(2, 'Seat Cover', 5199, 4, '../img/seat cover.png'),
(3, 'Alloy Wheels', 99999, 0, '../img/alloy1.png'),
(4, 'Puncture Tool Kit', 999, 9, '../img/kit 2.png'),
(5, 'Car Body Cover', 3499, 2, '../img/cover 1.png'),
(6, 'Car Fresheners', 249, 7, '../img/freshner.png'),
(7, 'EV Charger', 6199, 0, '../img/c-removebg-preview.png'),
(8, 'TPMS', 1999, 7, '../img/tpms-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `parts_sells`
--

CREATE TABLE `parts_sells` (
  `ID` int(11) NOT NULL,
  `Part Name` varchar(20) NOT NULL,
  `Part Price` int(10) NOT NULL,
  `Total` int(125) NOT NULL,
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

INSERT INTO `parts_sells` (`ID`, `Part Name`, `Part Price`, `Total`, `Quantity`, `Email`, `Name`, `Contact`, `Address`, `Date`) VALUES
(1, 'Seat Cover', 5199, 5349, 1, 'ashu1@gmail.com', 'Ashu', 1245896226, 'Ramnagar 6th lane, Kolhapur road, Sangli', '2024-03-03'),
(2, 'EV Charger', 6199, 6349, 1, 'mk@gmail.com', 'Mukesh', 45876985, 'Vishrambhag Chauk Samor, Sangli\r\n', '2024-03-04'),
(3, 'Car Body Cover', 3499, 3649, 1, 'prathameshkole@gmail', 'Prathamesh', 2147483647, 'Tung Maruti Mandir samor, Tung', '2024-03-05'),
(4, 'TPMS', 1999, 2149, 1, 'prathameshkole@gmail', 'Prathamesh', 2147483647, 'Tung Maruti Mandir samor, Tung', '2024-03-07'),
(5, 'EV Charger', 6199, 6349, 1, 'omkarmote@gmail.com', 'Omkar', 2147483647, 'DMart Back Side, 100 Feet Rd, Pragati Colony, Sangli', '2024-03-08'),
(6, 'Tyers', 5999, 12298, 2, 'adityajagtap@gmail.c', 'Aditya', 2147483647, 'Laxmi temple, VH55+FPF, Gaon Bhag, Sangli', '2024-03-08'),
(7, 'Puncture Tool Kit', 999, 1149, 1, 'mandar@gmail.com', 'Mandar', 2147483647, 'SanjayNagar 11th Lane, Kolhapur road, Sangli', '2024-03-09'),
(8, 'Seat Cover', 5199, 10698, 2, 'mandar@gmail.com', 'Mandar', 2147483647, 'SanjayNagar 11th Lane, Kolhapur road, Sangli', '2024-03-09'),
(9, 'Car Body Cover', 3499, 7298, 2, 'sajidbagwan@gmail.co', 'Sajid', 2147483647, 'Near 100ft road, Sangli', '2024-03-10'),
(10, 'Seat Cover', 5199, 5349, 1, 'sachin10@gmail.com', 'Sachin', 2147483647, '122/12 Classsic park, Vishrambagh, Sangli. 416415', '2024-03-11'),
(11, 'Puncture Tool Kit', 999, 1149, 1, 'sachin10@gmail.com', 'Sachin', 2147483647, '122/12 Classic park, Vishrambagh, Sangli 416415', '2024-03-12'),
(12, 'Car Body Cover', 3499, 3649, 1, 'ashu1@gmail.com', 'Ashu', 1245896226, 'Ramnagar 6th lane, Sangli', '2024-03-19');

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
(3, 'Ashutosh', 'ashu07', 'd@gmail.com', 1246326845, 123, 'user'),
(4, 'anup', 'anp', 'anp@gmail.com', 1246389, 123, 'user'),
(5, 'Sajid Bagwan', 'sajid', 'sajid@gmail.com', 6546, 123, 'admin'),
(6, 'bot', 'bot', 'bot@gmail.com', 452489, 123, 'user'),
(7, 'Mukesh', 'mukesh', 'mk@gmail.com', 45876985, 123, 'user'),
(8, 'Rakesh', 'rakesh', 'rm@gmail.com', 15478965, 123, 'user'),
(9, 'Prathamesh', 'prathamesh', 'prathameshkole@gmail.com', 2147483647, 123, 'user'),
(10, 'Omkar', 'ommii', 'omkarmote@gmail.com', 2147483647, 123, 'user'),
(11, 'Aditya', 'adu', 'adityajagtap@gmail.com', 2147483647, 123, 'user'),
(12, 'Mandar', 'mandar', 'mandar@gmail.com', 2147483647, 123, 'user'),
(13, 'Sajid', 'sajid007', 'sajidbagwan@gmail.com', 2147483647, 123, 'user'),
(14, 'Sachin', 'sachin10', 'sachin10@gmail.com', 2147483647, 123, 'user'),
(15, 'Jack', 'jack', 'jack@gmail.com', 489658748, 123, 'user'),
(17, 'Ashutosh Shinde', 'ashutosh', 'ashutoshshinde7@gmail.com', 2147483647, 123, 'admin');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parts_sells`
--
ALTER TABLE `parts_sells`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
