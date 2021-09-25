-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 10:48 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
  `consultation_no` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `personnels_id_no` varchar(45) NOT NULL,
  `lyceans_id_no` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('2016-3-1234', 'Krizel', 'N', 'Luna', 'Nurse', 'HSD'),
('2016-3-3456', 'Johnny ', 'N', 'Sins', 'Doctor', 'HSD'),
('2016-3-5678', 'Willy', 'C', 'Ong', 'Doctor', 'HSD'),
('2016-3-7890', 'Liezel', 'N', 'Sabucadalao', 'Doctor', 'HSD'),
('2016-3-9012', 'Kwak', 'N', 'Kwak', 'Doctor', 'HSD');

-- --------------------------------------------------------

--
-- Table structure for table `health_personnels_account`
--

DROP TABLE IF EXISTS `health_personnels_account`;
CREATE TABLE `health_personnels_account` (
  `id_no` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_personnels_account`
--

INSERT INTO `health_personnels_account` (`id_no`, `username`, `password`) VALUES
('2016-3-1234', 'krizel.luna@lpu.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2016-3-3456', 'johnny.sins@lpu.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2016-3-5678', 'willy.ong@lpu.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2016-3-7890', 'liezel.sabucadalao@lpu.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2016-3-9012', 'kwak.kwak@lpu.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4');

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
('2014-1-72634', 'Amanda', 'N', 'Menta', 'faculty', 'COECSA', '1991-10-12', 'Female', '', '', ''),
('2015-2-06969', 'Ji-eun', 'Lee', 'Mistica', 'staff', 'CITHM', '1993-05-16', 'Female', '', '', ''),
('2015-2-09696', 'Momo', 'N', 'Hirai', 'staff', 'CAMS', '1996-11-09', 'Female', NULL, NULL, NULL),
('2018-2-01509', 'Chris Jover', 'A', 'De Leon', 'student', 'COECSA', '1999-11-06', 'Male', '', '', ''),
('2018-2-01763', 'Rick Vincent Jeffrey', 'P', 'Dela Cruz', 'student', 'COECSA', '1999-10-19', 'Male', '5\'8', '50', 'O+'),
('2018-2-02181', 'John Rafael', 'Pineda', 'Mistica', 'student', 'COECSA', '1998-07-04', 'Male', '', '', ''),
('2018-2-03248', 'Jade Anne Kristel', 'J', 'Vale', 'student', 'COECSA', '2000-10-14', 'Female', NULL, NULL, NULL),
('dsa', 'ds', 'ds', 'das', 'student', 'CITHM', '2021-09-01', 'Male', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lyceans_account`
--

DROP TABLE IF EXISTS `lyceans_account`;
CREATE TABLE `lyceans_account` (
  `id_no` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyceans_account`
--

INSERT INTO `lyceans_account` (`id_no`, `username`, `password`) VALUES
('2014-1-72634', 'amanda.menta@lpunetwork.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2015-2-06969', 'jieun.lee@lpunetwork.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2015-2-09696', 'momo.hirai@lpunetwork.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2018-2-01509', 'chris.deleon@lpunetwork.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4'),
('2018-2-01763', 'rick.delacruz@lpunetwork.edu.ph', '17b68c72ec60978f5333b82882db8197e236288b0ac424a77e64dc633cd6d0b6'),
('2018-2-02181', 'john.mistica@lpunetwork.edu.ph', '918f24ab2bacdffde0f9cc096f5d02d37a5b89d68a8bed1320cf4868f16d2301'),
('2018-2-03248', 'jade.vale@lpunetwork.edu.ph', '03AC674216F3E15C761EE1A5E255F067953623C8B388B4459E13F978D7C846F4');

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
  ADD KEY `fk_consultations_clinic_personnels1` (`personnels_id_no`),
  ADD KEY `fk_consultations_lyceans1` (`lyceans_id_no`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `consultation_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_records`
--
ALTER TABLE `health_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `fk_consultations_clinic_personnels1` FOREIGN KEY (`personnels_id_no`) REFERENCES `health_personnels` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consultations_lyceans1` FOREIGN KEY (`lyceans_id_no`) REFERENCES `lyceans` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `health_personnels_account`
--
ALTER TABLE `health_personnels_account`
  ADD CONSTRAINT `fk_clinic_personnels_credentials_clinic_personnels` FOREIGN KEY (`id_no`) REFERENCES `health_personnels` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
