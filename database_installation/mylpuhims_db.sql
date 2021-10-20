-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 06:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylpuhims_db`
--
CREATE DATABASE IF NOT EXISTS `mylpuhims_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mylpuhims_db`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `admin_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `username`, `password`, `admin_name`) VALUES
(1, 'admin', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
CREATE TABLE `consultations` (
  `consultation_no` varchar(16) NOT NULL,
  `queue_no` int(11) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `personnel_id_no` varchar(45) NOT NULL,
  `lycean_id_no` varchar(45) NOT NULL,
  `meeting_schedule` datetime DEFAULT NULL,
  `meeting_link` varchar(2048) DEFAULT NULL,
  `rejection_message` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`consultation_no`, `queue_no`, `status`, `category`, `message`, `personnel_id_no`, `lycean_id_no`, `meeting_schedule`, `meeting_link`, `rejection_message`, `created_at`, `updated_at`) VALUES
('agEI9m0vJAbkhUq5', NULL, 'pending', 'Mental Wellness', 'Doc, capstone is killing me. what should i do? UwU', '2016-3-3456', '2018-2-02181', NULL, NULL, NULL, '2021-09-29 14:46:00', '2021-09-29 14:46:00'),
('iJgG7t3uy5d01vp6', 2, 'active', 'Consultation', 'Doc, I have dry cough. ough ough ough!!!', '2016-3-1234', '2015-2-06969', '2021-10-13 10:15:00', 'https://www.facebook.com/', NULL, '2021-09-29 14:46:00', '2021-09-29 14:46:00'),
('jYUVg7t3uyw201vp', 1, 'active', 'Mental Wellness', 'Doc, capstone is killing me. what should i do? UwU', '2016-3-3456', '2018-2-01763', '2021-10-30 11:00:00', 'https://www.facebook.com/', NULL, '2021-09-29 14:46:00', '2021-09-29 14:46:00'),
('KPUxE6RgFp1eYWzr', NULL, 'pending', 'Consultation', 'Doc, I have dry cough. ough ough ough!!!', '2016-3-1234', '2018-2-03248', NULL, NULL, NULL, '2021-09-29 14:46:00', '2021-09-29 14:46:00'),
('RJugrqo1NmsYEdht', 1, 'active', 'Consultation', 'Doc, I have dry cough. ough ough ough!!!', '2016-3-1234', '2018-2-01509', '2021-10-30 11:00:00', 'https://www.facebook.com/', NULL, '2021-09-29 14:46:00', '2021-09-29 14:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `health_personnels`
--

DROP TABLE IF EXISTS `health_personnels`;
CREATE TABLE `health_personnels` (
  `id_no` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `designation` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_personnels`
--

INSERT INTO `health_personnels` (`id_no`, `first_name`, `middle_name`, `last_name`, `designation`, `department`) VALUES
('2016-3-1234', 'Krizel', 'N', 'Luna', 'Doctor', 'HSD'),
('2016-3-3456', 'Johnny ', 'N', 'Sins', 'Guidance Counselor', 'GCD'),
('2016-3-5678', 'Willy', 'C', 'Ong', 'Doctor', 'HSD'),
('2016-3-7890', 'Liezel', 'N', 'Sabucadalao', 'Doctor', 'HSD'),
('2016-3-9012', 'Kwak', 'N', 'Kwak', 'Guidance Counselor', 'GCD');

-- --------------------------------------------------------

--
-- Table structure for table `health_personnels_account`
--

DROP TABLE IF EXISTS `health_personnels_account`;
CREATE TABLE `health_personnels_account` (
  `id_no` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `locked` int(1) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_personnels_account`
--

INSERT INTO `health_personnels_account` (`id_no`, `username`, `password`, `locked`, `last_activity`) VALUES
('2016-3-1234', 'krizel.luna@lpu.edu.ph', '66f7c3f38607d52236f747252c8feba4866900d6c174ecfd2e0dffbc608b1623', NULL, NULL),
('2016-3-3456', 'johnny.sins@lpu.edu.ph', '31fdef858dfff6ce48fe2a5171419099d7a0dd921a7f4e3214f29b1cf1a77b79', NULL, '2021-10-20 12:52:00'),
('2016-3-5678', 'willy.ong@lpu.edu.ph', '385df8f5e89ff308a97bf848af40560763d6a17fd1b8701687c26fe4ac179ba8', NULL, NULL),
('2016-3-7890', 'liezel.sabucadalao@lpu.edu.ph', 'd473be41a44df8b7df725e1b81dcaedcaada57b9c977d36ad958c5e8c20bb839', NULL, NULL),
('2016-3-9012', 'kwak.kwak@lpu.edu.ph', '9e166b2660994213ac25eb570995d53aca1736c2cda1e36f7342991f9423cdfc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `health_personnels_notification`
--

DROP TABLE IF EXISTS `health_personnels_notification`;
CREATE TABLE `health_personnels_notification` (
  `notification_id` int(11) NOT NULL,
  `id_no` varchar(45) NOT NULL,
  `info` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `link` varchar(2048) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_personnels_notification`
--

INSERT INTO `health_personnels_notification` (`notification_id`, `id_no`, `info`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, '2016-3-1234', 'New request from lycean', 'unread', 'http://localhost/myLPU-HIMS/lycean/public/consultation/details/RJugrqo1NmsYEdht', '2021-10-16 21:31', '2021-10-16 21:31');

-- --------------------------------------------------------

--
-- Table structure for table `health_records`
--

DROP TABLE IF EXISTS `health_records`;
CREATE TABLE `health_records` (
  `record_id` int(11) NOT NULL,
  `id_no` varchar(45) NOT NULL,
  `file_path` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lyceans`
--

DROP TABLE IF EXISTS `lyceans`;
CREATE TABLE `lyceans` (
  `id_no` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `height` varchar(3) DEFAULT NULL,
  `weight` varchar(3) DEFAULT NULL,
  `blood_type` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyceans`
--

INSERT INTO `lyceans` (`id_no`, `first_name`, `middle_name`, `last_name`, `role`, `department`, `birth_date`, `gender`, `height`, `weight`, `blood_type`) VALUES
('2014-1-72634', 'Amanda', 'N', 'Menta', 'faculty', 'COECSA', '1991-10-12', 'Female', NULL, NULL, NULL),
('2015-2-06969', 'Ji-eun', 'N', 'Lee', 'staff', 'CITHM', '1993-05-16', 'Female', NULL, NULL, NULL),
('2015-2-09696', 'Momo', 'N', 'Hirai', 'staff', 'CAMS', '1996-11-09', 'Female', NULL, NULL, NULL),
('2018-2-01509', 'Chris Jover', 'A', 'De Leon', 'student', 'COECSA', '1999-11-06', 'Male', NULL, NULL, NULL),
('2018-2-01763', 'Rick Vincent Jeffrey', 'P', 'Dela Cruz', 'student', 'COECSA', '1999-10-19', 'Male', NULL, NULL, NULL),
('2018-2-02181', 'John Rafael', 'P', 'Mistica', 'student', 'COECSA', '1998-07-04', 'Male', NULL, NULL, NULL),
('2018-2-03248', 'Jade Anne Kristel', 'J', 'Vale', 'student', 'COECSA', '2000-10-14', 'Female', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lyceans_account`
--

DROP TABLE IF EXISTS `lyceans_account`;
CREATE TABLE `lyceans_account` (
  `id_no` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `locked` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyceans_account`
--

INSERT INTO `lyceans_account` (`id_no`, `username`, `password`, `locked`) VALUES
('2014-1-72634', 'amanda.menta@lpunetwork.edu.ph', '760e2c08813b3ace8cdfe79e8db2fcfb00337cc2364f827466b0544de5cf07d6', NULL),
('2015-2-06969', 'jieun.lee@lpunetwork.edu.ph', '5eda95ce0649e173966bf5026880d15fb1cbef6d2bc33533db879082d05c26aa', NULL),
('2015-2-09696', 'momo.hirai@lpunetwork.edu.ph', '00bd50b4eead991214bef23eb367a8837fd062bc657c5c74b8f24c095f91875a', NULL),
('2018-2-01509', 'chris.deleon@lpunetwork.edu.ph', '15b3530e61aa540e86b8f9b4f3d88245fd4fe81ea411cdbb84a5da52f75255b6', NULL),
('2018-2-01763', 'rick.delacruz@lpunetwork.edu.ph', '32c0230638a1a851c38d5f223e94a0e9ac9b55bae7747233b6edc358aa72c23a', NULL),
('2018-2-02181', 'john.mistica@lpunetwork.edu.ph', '918f24ab2bacdffde0f9cc096f5d02d37a5b89d68a8bed1320cf4868f16d2301', NULL),
('2018-2-03248', 'jade.vale@lpunetwork.edu.ph', '278d3872d86a41fd8ea83b5ef0c7118ecc6a445e6d0da818b08ac7c689d53f6d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lyceans_notification`
--

DROP TABLE IF EXISTS `lyceans_notification`;
CREATE TABLE `lyceans_notification` (
  `notification_id` int(11) NOT NULL,
  `id_no` varchar(45) NOT NULL,
  `info` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `link` varchar(2048) DEFAULT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyceans_notification`
--

INSERT INTO `lyceans_notification` (`notification_id`, `id_no`, `info`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, '2018-2-01509', 'The doctor accepted your request', 'unread', 'http://localhost/myLPU-HIMS/lycean/public/consultation/details/RJugrqo1NmsYEdht', '2021-10-12 18:41', '2021-10-12 18:41');

-- --------------------------------------------------------

--
-- Table structure for table `medical_files`
--

DROP TABLE IF EXISTS `medical_files`;
CREATE TABLE `medical_files` (
  `file_id` int(11) NOT NULL,
  `consultation_no` varchar(16) NOT NULL,
  `file_path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`consultation_no`),
  ADD KEY `fk_consultations_clinic_personnels1` (`personnel_id_no`),
  ADD KEY `fk_consultations_lyceans1` (`lycean_id_no`);

--
-- Indexes for table `health_personnels`
--
ALTER TABLE `health_personnels`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `health_personnels_account`
--
ALTER TABLE `health_personnels_account`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `health_personnels_notification`
--
ALTER TABLE `health_personnels_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_notifications_copy1_health_personnels1` (`id_no`);

--
-- Indexes for table `health_records`
--
ALTER TABLE `health_records`
  ADD PRIMARY KEY (`record_id`,`id_no`),
  ADD KEY `fk_health_record_lyceans1` (`id_no`);

--
-- Indexes for table `lyceans`
--
ALTER TABLE `lyceans`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `lyceans_account`
--
ALTER TABLE `lyceans_account`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `lyceans_notification`
--
ALTER TABLE `lyceans_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_notifications_copy1_lyceans1` (`id_no`);

--
-- Indexes for table `medical_files`
--
ALTER TABLE `medical_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `fk_medical_files_consultations1` (`consultation_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health_personnels_notification`
--
ALTER TABLE `health_personnels_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health_records`
--
ALTER TABLE `health_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lyceans_notification`
--
ALTER TABLE `lyceans_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_files`
--
ALTER TABLE `medical_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `fk_consultations_clinic_personnels1` FOREIGN KEY (`personnel_id_no`) REFERENCES `health_personnels` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consultations_lyceans1` FOREIGN KEY (`lycean_id_no`) REFERENCES `lyceans` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `health_personnels_account`
--
ALTER TABLE `health_personnels_account`
  ADD CONSTRAINT `fk_clinic_personnels_credentials_clinic_personnels` FOREIGN KEY (`id_no`) REFERENCES `health_personnels` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `health_personnels_notification`
--
ALTER TABLE `health_personnels_notification`
  ADD CONSTRAINT `fk_notifications_copy1_health_personnels1` FOREIGN KEY (`id_no`) REFERENCES `health_personnels` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `health_records`
--
ALTER TABLE `health_records`
  ADD CONSTRAINT `fk_health_record_lyceans1` FOREIGN KEY (`id_no`) REFERENCES `lyceans` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lyceans_account`
--
ALTER TABLE `lyceans_account`
  ADD CONSTRAINT `fk_lycean_credentials_lyceans1` FOREIGN KEY (`id_no`) REFERENCES `lyceans` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lyceans_notification`
--
ALTER TABLE `lyceans_notification`
  ADD CONSTRAINT `fk_notifications_copy1_lyceans1` FOREIGN KEY (`id_no`) REFERENCES `lyceans` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_files`
--
ALTER TABLE `medical_files`
  ADD CONSTRAINT `fk_medical_files_consultations1` FOREIGN KEY (`consultation_no`) REFERENCES `consultations` (`consultation_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
