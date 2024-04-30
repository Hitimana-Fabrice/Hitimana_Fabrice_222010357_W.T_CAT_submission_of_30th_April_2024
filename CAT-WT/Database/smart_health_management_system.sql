-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 08:17 AM
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
-- Database: `smart_health_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_id` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Doctor_name` varchar(255) NOT NULL,
  `Appointment_date` varchar(50) NOT NULL,
  `Appointment_time` varchar(30) NOT NULL,
  `Purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_id`, `User_id`, `Doctor_name`, `Appointment_date`, `Appointment_time`, `Purpose`) VALUES
(2, 1, 'Dr Damour', '2024-02-17', '09:00', 'Eye Examination'),
(4, 1, 'Dr. Patel', '2024-02-19', '15:30:00', 'Vaccination'),
(5, 2, 'Dr. Garcia', '2024-02-20', '16:45:00', 'Physical therapy'),
(7, 3, '2023-02-16', '2023-02-16', '10:00:00', 'General checkup'),
(8, 3, '2023-02-16', '2023-02-16', '10:00:00', 'General checkup'),
(9, 1, 'Dr Lydie N', '2024-04-27', '11:00', 'Eye Examination'),
(10, 1, 'Dr Lydie N', '2024-04-26', '23:12', 'Vaccination'),
(11, 2, 'Dr Damour', '2024-04-29', '18:05', 'Vaccination');

-- --------------------------------------------------------

--
-- Table structure for table `dietlog`
--

CREATE TABLE `dietlog` (
  `LogID` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Date` varchar(120) DEFAULT NULL,
  `MealType` varchar(110) DEFAULT NULL,
  `FoodItem` varchar(255) DEFAULT NULL,
  `Quantity` varchar(220) DEFAULT NULL,
  `CaloriesConsumed` int(170) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietlog`
--

INSERT INTO `dietlog` (`LogID`, `User_id`, `Date`, `MealType`, `FoodItem`, `Quantity`, `CaloriesConsumed`) VALUES
(2, 1, '2024-02-16', 'Lunch', 'Chicken Salad', '3', 10),
(3, 3, '2024-02-16', 'Dinner', 'Salmon with Vegetables', '1 plate', 400),
(4, 2, '2024-02-17', 'Breakfast', 'Scrambled Eggs', '2 eggs', 200),
(7, 1, '2024-04-27', 'Lunch', 'Cassava', '1KG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exerciselogs`
--

CREATE TABLE `exerciselogs` (
  `Log_id` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `ExerciseType` varchar(50) DEFAULT NULL,
  `DurationMinutes` int(11) DEFAULT NULL,
  `CaloriesBurned` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exerciselogs`
--

INSERT INTO `exerciselogs` (`Log_id`, `User_id`, `Date`, `ExerciseType`, `DurationMinutes`, `CaloriesBurned`) VALUES
(2, 2, '2024-04-29', 'Joging', 45, 400.50),
(3, 3, '2023-11-03', 'Playing', 50, 500.00),
(5, 1, '2023-09-03', 'Running', 45, 350.00),
(8, 2, '2024-02-16', 'Running', 30, 200.00),
(9, 1, '2024-02-16', 'Cycling', 45, 300.00),
(10, 2, '2024-02-16', 'Running', 30, 200.00),
(11, 1, '2024-02-16', 'Cycling', 45, 300.00),
(12, 4, '2024-04-29', 'Boxing', 1, NULL),
(15, 3, '2024-04-28', 'Running', 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `healthyrecords`
--

CREATE TABLE `healthyrecords` (
  `RecordID` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Date` varchar(150) DEFAULT NULL,
  `Height` varchar(5) DEFAULT NULL,
  `Weight` varchar(150) DEFAULT NULL,
  `BloodPressureSystolic` int(11) DEFAULT NULL,
  `BloodPressureDiastolic` int(11) DEFAULT NULL,
  `HeartRate` int(11) DEFAULT NULL,
  `BloodSugarLevel` varchar(10) DEFAULT NULL,
  `CholesterolLevel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthyrecords`
--

INSERT INTO `healthyrecords` (`RecordID`, `User_id`, `Date`, `Height`, `Weight`, `BloodPressureSystolic`, `BloodPressureDiastolic`, `HeartRate`, `BloodSugarLevel`, `CholesterolLevel`) VALUES
(2, 2, '2024-04-29', '15', '50', 140, 70, 60, '90', '180.50'),
(5, 2, '2024-02-17', '165.0', '65.00', 130, 85, 75, '95', '160.00'),
(6, 1, '2024-02-17', '180.0', '80.00', 125, 82, 72, '88', '155.00'),
(8, 3, '2024-04-28', '18', '58', 450, 300, 60, '450', '500');

-- --------------------------------------------------------

--
-- Table structure for table `medicationlogs`
--

CREATE TABLE `medicationlogs` (
  `Medical_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `MedicationName` varchar(255) NOT NULL,
  `Dosage` varchar(120) NOT NULL,
  `Frequency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicationlogs`
--

INSERT INTO `medicationlogs` (`Medical_id`, `User_id`, `Date`, `MedicationName`, `Dosage`, `Frequency`) VALUES
(2, 2, '2024-02-17', 'Medicine B', '2 pills', 'Twice a day'),
(3, 3, '2024-02-17', 'Medicine C', '1 tablet', 'Once every two days'),
(4, 5, '2024-04-28', 'Medicine C', '5mg', 'Once daily'),
(5, 1, '2024-04-28', 'Medicine B', '5mg', 'Once daily');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patients_ID` int(11) NOT NULL,
  `Patient_F_Name` varchar(40) DEFAULT NULL,
  `Patient_l_Name` varchar(40) DEFAULT NULL,
  `Patient_BOB_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patients_ID`, `Patient_F_Name`, `Patient_l_Name`, `Patient_BOB_Date`) VALUES
(2, 'Aline', 'Uwera', '0000-00-00'),
(3, 'Cesal', 'Uwacu', '0000-00-00'),
(4, 'Dominique', 'Nzayisenga', '0000-00-00'),
(5, 'Aline', 'Uwera', '2021-05-20'),
(6, 'Aline', 'Uwera', '2021-05-20'),
(7, 'Aline', 'Uwera', '2021-05-20'),
(8, 'Aline', 'Uwera', '2021-05-20'),
(9, 'Christian', 'Shema', '2024-04-28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userinsertview`
-- (See below for the actual view)
--
CREATE TABLE `userinsertview` (
`UserID` binary(0)
,`Username` binary(0)
,`Password` binary(0)
,`Email` binary(0)
,`Name` binary(0)
,`Age` binary(0)
,`Gender` binary(0)
,`ContactNumber` binary(0)
,`Address``Address` binary(0)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Username`, `Password`, `Email`, `Age`, `Gender`, `ContactNumber`, `Address`) VALUES
(1, 'user1@example.com', 'user1@example.com', 'user1@example.com', 0, '', '', ''),
(2, 'user2', 'hashed_password2', 'jshema01@gmail.com', 0, '', '', ''),
(3, 'user3', 'hashed_password', 'rukundo04@gmail.com', 0, '', '', ''),
(4, 'user4', 'hashed_password6', 'alice12@gmail.com', 0, '', '', ''),
(6, 'hashed_password1', 'user1@example.com', 'user1@example.com', 0, '', '', ''),
(7, 'user1@example.com', 'user1@example.com', 'user1@example.com', 0, '', '', ''),
(9, 'Niyonizeye lydie', '$2y$10$gbBttkIG9T9eIToUDgo.KOhCBtUmBvOTNODfLHbs/nFhWJIc65v3u', 'lydieniyonizeye01@gmail.com', 21, 'Female', '0784567856', 'kigali');

-- --------------------------------------------------------

--
-- Structure for view `userinsertview`
--
DROP TABLE IF EXISTS `userinsertview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userinsertview`  AS SELECT NULL AS `UserID`, NULL AS `Username`, NULL AS `Password`, NULL AS `Email`, NULL AS `Name`, NULL AS `Age`, NULL AS `Gender`, NULL AS `ContactNumber`, NULL AS `Address``Address` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_id`),
  ADD KEY `fk_appointment_users` (`User_id`);

--
-- Indexes for table `dietlog`
--
ALTER TABLE `dietlog`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `fk_dietlog_users` (`User_id`);

--
-- Indexes for table `exerciselogs`
--
ALTER TABLE `exerciselogs`
  ADD PRIMARY KEY (`Log_id`),
  ADD KEY `UserID` (`User_id`);

--
-- Indexes for table `healthyrecords`
--
ALTER TABLE `healthyrecords`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `UserID` (`User_id`);

--
-- Indexes for table `medicationlogs`
--
ALTER TABLE `medicationlogs`
  ADD PRIMARY KEY (`Medical_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Patients_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dietlog`
--
ALTER TABLE `dietlog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exerciselogs`
--
ALTER TABLE `exerciselogs`
  MODIFY `Log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `healthyrecords`
--
ALTER TABLE `healthyrecords`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicationlogs`
--
ALTER TABLE `medicationlogs`
  MODIFY `Medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Patients_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_user` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `fk_appointment_users` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `dietlog`
--
ALTER TABLE `dietlog`
  ADD CONSTRAINT `fk_dietlog_users` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `exerciselogs`
--
ALTER TABLE `exerciselogs`
  ADD CONSTRAINT `exerciselogs_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `fk_exerciselogs_users` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `healthyrecords`
--
ALTER TABLE `healthyrecords`
  ADD CONSTRAINT `fk_healthyrecords_users` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `healthyrecords_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
