-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 05:05 PM
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
-- Database: `curahub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `email`, `password`, `first_name`, `last_name`) VALUES
(1001, '', '', '', ''),
(1002, 'as@gmail.com', '$2y$10$AXw74bNs.PKEH5zI8CFu4eXvXOIJUZ63Ie6wZ/SSxdM3x57laYV32', 'Abdulla', 'Safar'),
(1003, 'cz@gmail.com', '$2y$10$HqrDpsOIwXTRvrEkmOdqkOxjLmb0nE8Vee6xl5YDLLGnJI1gg627S', 'Lim', 'ChuanZhe');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(20) NOT NULL,
  `slot_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `doctor_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `slot_id`, `user_id`, `doctor_id`, `date`, `status`) VALUES
(2002, 6002, 7002, 3002, '2024-07-01', 'completed'),
(2003, 6003, 7001, 3004, '2024-07-20', 'completed'),
(2004, 6006, 7001, 3004, '2024-07-20', 'Completed'),
(2005, 6006, 7001, 3004, '2024-07-20', 'completed'),
(2006, 6003, 7002, 3002, '2024-07-20', 'Pending'),
(2007, 6013, 7002, 3013, '2024-08-10', 'pending'),
(2008, 6014, 7004, 3002, '2024-07-26', 'pending'),
(2009, 6003, 7004, 3003, '2024-07-26', 'pending'),
(2010, 6002, 7002, 3002, '2024-07-10', 'pending'),
(2011, 6003, 7003, 3003, '2024-07-18', 'confirmed'),
(2012, 6004, 7004, 3004, '2023-12-25', 'completed'),
(2013, 6005, 7005, 3005, '2024-08-05', 'pending'),
(2014, 6006, 7006, 3006, '2024-06-12', 'confirmed'),
(2015, 6007, 7007, 3007, '2023-02-14', 'completed'),
(2016, 6008, 7008, 3008, '2024-09-03', 'pending'),
(2017, 6009, 7002, 3009, '2023-09-20', 'completed'),
(2018, 6010, 7003, 3010, '2024-10-15', 'pending'),
(2019, 6011, 7004, 3011, '2024-05-30', 'confirmed'),
(2020, 6012, 7005, 3012, '2023-01-01', 'completed'),
(2021, 6013, 7006, 3013, '2024-11-28', 'pending'),
(2022, 6014, 7007, 3014, '2023-06-30', 'completed'),
(2023, 6015, 7008, 3015, '2024-07-22', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `hospital_id` int(20) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `specialization`, `hospital_id`, `qualification`, `university`, `contact`) VALUES
(3002, 'Aisyah', 'Ibrahim', 'Cardiology', 4002, 'MBBS, MRCP', 'Universiti Malaya', '+60123456789'),
(3003, 'Lee', 'Chen', 'Dermatology', 4003, 'MD, FRCP', 'National University of Singapore (NUS)', '+60112233445'),
(3004, 'Mohamed', 'Razak', 'Gastroenterology', 4004, 'MBBS, MRCP (UK)', 'Universiti Kebangsaan Malaysia (UKM)', '+60198765432'),
(3005, 'Siti', 'Aminah', 'Obstetrics & Gynaecology', 4005, 'MBBS, M.Med (O&G)', 'Universiti Sains Malaysia (USM)', '+60167788990'),
(3006, 'Raj', 'Kumar', 'Orthopaedics', 4006, 'MBBS, MS (Ortho)', 'University of Edinburgh', '+60175566778'),
(3007, 'Tan', 'Mei Ling', 'Paediatrics', 4002, 'MBBS, MRCPCH', 'University of Melbourne', '+60184433221'),
(3008, 'Amin', 'Yusof', 'Psychiatry', 4003, 'MBBS, M.Med (Psych)', 'Monash University Malaysia', '+60139988776'),
(3009, 'Nurul', 'Huda', 'Family Medicine', 4004, 'MBBS, MRCGP', 'International Medical University (IMU)', '+60102211334'),
(3010, 'Wong', 'Wai Keong', 'General Surgery', 4005, 'MBBS, FRCS', 'University of Malaya', '+60168877665'),
(3011, 'Kavitha', 'Krishnan', 'Endocrinology', 4006, 'MBBS, MRCP (Endo)', 'University of Nottingham Malaysia Campus', '+60145544332'),
(3012, 'Adam', 'Tan', 'Neurology', 4002, 'MBBS, MRCP (Neuro)', 'University of Malaya', '+60198877665'),
(3013, 'Farah', 'Abdullah', 'Oncology', 4003, 'MBBS, M.Med (Oncology)', 'Universiti Kebangsaan Malaysia (UKM)', '+60164433221'),
(3014, 'Michael', 'Wong', 'Nephrology', 4004, 'MBBS, MRCP (Nephro)', 'University of Melbourne', '+60139988776'),
(3015, 'Priya', 'Nair', 'Ophthalmology', 4005, 'MBBS, MS (Ophth)', 'Universiti Sains Malaysia (USM)', '+60102211334');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospital_id` int(20) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_type` varchar(255) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `hospital_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospital_id`, `hospital_name`, `hospital_type`, `hospital_address`, `hospital_contact`) VALUES
(4002, 'Subang Jaya Medical Centre (SJMC)', 'Private', 'Persiaran Kewajipan, SS12, 47500 Subang Jaya, Selangor', '+603-5639 1212'),
(4003, 'Sunway Medical Centre', 'Private', 'No. 5, Jalan Lagoon Selatan, Bandar Sunway, 47500 Subang Jaya, Selangor', '+603-7491 9191'),
(4004, 'Hospital Shah Alam', 'Public', 'Persiaran Kayangan, Seksyen 7, 40000 Shah Alam, Selangor', '+603-5526 3000'),
(4005, 'KPJ Selangor Specialist Hospital', 'Private', 'Persiaran Kayangan, Seksyen 7, 40000 Shah Alam, Selangor', '+603-5543 1111'),
(4006, 'Avisena Specialist Hospital', 'Private', 'Jalan Kemajuan, Seksyen 13, 40100 Shah Alam, Selangor', '+603-5515 1888');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `record_id` int(20) NOT NULL,
  `treatment_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(20) NOT NULL,
  `doctor_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`record_id`, `treatment_type`, `description`, `date`, `user_id`, `doctor_id`) VALUES
(5003, 'Cardiology Consultation', 'Evaluation of chest pain and shortness of breath.', '2024-07-15', 7004, 3002),
(5004, 'Dermatology Examination', 'Diagnosis and treatment of acne vulgaris.', '2024-06-28', 7004, 3003),
(5005, 'Gastroenterology Check-up', 'Assessment of abdominal pain and indigestion.', '2024-05-10', 7004, 3004),
(5006, 'Prenatal Consultation', 'Routine check-up during pregnancy.', '2024-04-20', 7004, 3005),
(5007, 'Orthopaedic Consultation', 'Evaluation of knee pain and X-ray review.', '2024-03-05', 7004, 3006);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` int(20) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `start_time`, `end_time`) VALUES
(6002, '9.00a.m.', '9.30a.m.'),
(6003, '9.30a.m.', '10.00a.m.'),
(6004, '10.00a.m.', '10.30a.m.'),
(6005, '10.30a.m.', '11.00a.m.'),
(6006, '11.00a.m.', '11.30a.m.'),
(6007, '11.30a.m.', '12.00p.m.'),
(6008, '1.00p.m.', '1.30p.m.'),
(6009, '1.30p.m.', '2.00p.m.'),
(6010, '2.00p.m.', '2.30.p.m.'),
(6011, '2.30p.m.', '3.00p.m.'),
(6012, '3.00p.m.', '3.30p.m.'),
(6013, '3.30p.m.', '4.00p.m.'),
(6014, '4.00p.m.', '4.30p.m.'),
(6015, '4.30p.m.', '5.00p.m.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `identity_no` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'Selangor',
  `country` varchar(255) NOT NULL DEFAULT 'Malaysia',
  `address` varchar(255) NOT NULL DEFAULT 'Taylor''s University'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `date_of_birth`, `gender`, `identity_no`, `phone_no`, `state`, `country`, `address`) VALUES
(7002, 'ab@gm.com', '$2y$10$K8Rs.49Z9V/NQsffAmkndOMSZTJ4m3iU1uY3IBdCKdWE9sykFxltC', 'ab', 'sad', '2024-07-04', 'male', '121', '31231', 'Selangor', 'Malaysia', 'Taylor\'s University'),
(7003, 'ok@gm.com', '$2y$10$Frqo1RG..BM8MpIDClTk5eX08CkzNAqbvdufSKA6dCYVMibSmZvcS', 'abd', 'safa', '2024-07-04', 'male', '2131', '31231', 'Selangoradsd', 'Malaysia', 'Taylor\'s University'),
(7004, 'limcz0208@gmail.com', '$2y$10$Px26qeXMjvduYpWsvVPre.rarhy1dpJpLmcHDRPV.HxyUC226TbCi', 'Lim', 'CuanZe', '2001-02-08', 'Male', '1111111', '0122222222', 'Selangor', 'Malaysia', 'Taylor\'s University'),
(7005, 'uc@ch.com', '$2y$10$y7Y/97oKZJ250i11x2/4.e9o7x4v1.f.0w5r2eJ9nD8q27eJ9nD8', 'John', 'Doe', '1990-05-15', 'Male', '900515123456', '+60123456789', 'Selangor', 'Malaysia', 'Taylor\'s University'),
(7006, 'uq@ch.com', '$2y$10$y7Y/97oKZJ250i11x2/4.e9o7x4v1.f.0w5r2eJ9nD8q27eJ9nD8', 'Jane', 'Smith', '1985-11-22', 'Female', '851122098765', '+601198765432', 'Selangor', 'Malaysia', 'Taylor\'s University'),
(7007, 'uz@ch.com', '$2y$10$y7Y/97oKZJ250i11x2/4.e9o7x4v1.f.0w5r2eJ9nD8q27eJ9nD8', 'Alice', 'Johnson', '1992-03-08', 'Female', '920308112233', '+601655443322', 'Selangor', 'Malaysia', 'Taylor\'s University'),
(7008, 'uh@ch.com', '$2y$10$y7Y/97oKZJ250i11x2/4.e9o7x4v1.f.0w5r2eJ9nD8q27eJ9nD8', 'Bob', 'Williams', '1988-09-12', 'Male', '880912445566', '+601922113344', 'Selangor', 'Malaysia', 'Taylor\'s University');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3016;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospital_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4007;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `record_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5008;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6016;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7009;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
