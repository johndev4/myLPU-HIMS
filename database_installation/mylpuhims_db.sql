-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 08:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `admin_id` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `locked` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `username`, `password`, `admin_name`, `locked`) VALUES
('202100001', 'admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
CREATE TABLE `batches` (
  `batch_id` varchar(45) NOT NULL,
  `product_id` varchar(45) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
CREATE TABLE `consultations` (
  `consultation_no` varchar(16) NOT NULL,
  `status` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `personnel_id_no` varchar(45) DEFAULT NULL,
  `lycean_id_no` varchar(45) NOT NULL,
  `meeting_schedule` datetime DEFAULT NULL,
  `meeting_link` varchar(2048) DEFAULT NULL,
  `rejection_message` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE `equipments` (
  `product_id` varchar(45) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
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
  `gender` varchar(45) NOT NULL,
  `designation` varchar(45) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health_personnels`
--

INSERT INTO `health_personnels` (`id_no`, `first_name`, `middle_name`, `last_name`, `gender`, `designation`, `department`) VALUES
('2016-3-1234', 'Krizel', 'Dollen', 'Luna', 'Female', 'Doctor', 'HSD'),
('2016-3-3456', 'Adam', 'Brunsden', 'Smith', 'Male', 'Guidance Counselor', 'GCD'),
('2016-3-5678', 'Willy', 'Adcock', 'Ong', 'Male', 'Doctor', 'HSD'),
('2016-3-7890', 'Liezel', 'Vasilchenko', 'Sabucadalao', 'Female', 'Nurse', 'HSD'),
('2016-3-9012', 'Kwak', 'Shee', 'Kwak', 'Male', 'Guidance Counselor', 'GCD'),
('2017-3-02736', 'Johnny', 'Vampouille', 'Sins', 'Male', 'Guidance Counselor', 'HSD'),
('2021-1-01625', 'Farrah', 'Klimczak', 'Bunch', 'Female', 'Doctor', 'HSD'),
('2021-1-01827', 'John', 'Du Plantier', 'Doe', 'Male', 'Doctor', 'HSD'),
('2021-1-03276', 'Juan', 'Yurkevich', 'Dela Cruz', 'Male', 'Guidance Counselor', 'HSD'),
('2021-1-28736', 'Nympha', 'Geerling', 'Leyva', 'Female', 'Guidance Counselor', 'HSD');

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
('2016-3-1234', 'krizel.luna@lpu.edu.ph', '3f06e128201f277dbceb5e2b5865319210aad0be21bf3b919a7541a96cc8924c', 0, '2021-12-10 03:36:00'),
('2016-3-3456', 'adam.smith@lpu.edu.ph', '51dafe477f5677b7a6eb0f4de13cb6984d65074787399c33a2448e9a55fdbb0f', 0, '0000-00-00 00:00:00'),
('2016-3-5678', 'willy.ong@lpu.edu.ph', '385df8f5e89ff308a97bf848af40560763d6a17fd1b8701687c26fe4ac179ba8', 0, '2021-11-27 10:08:00'),
('2016-3-7890', 'liezel.sabucadalao@lpu.edu.ph', 'd473be41a44df8b7df725e1b81dcaedcaada57b9c977d36ad958c5e8c20bb839', 0, '2021-11-26 12:08:00'),
('2016-3-9012', 'kwak.kwak@lpu.edu.ph', '9e166b2660994213ac25eb570995d53aca1736c2cda1e36f7342991f9423cdfc', 0, '2021-11-18 08:01:00'),
('2017-3-02736', 'johnny.sins@lpu.edu.ph', '31fdef858dfff6ce48fe2a5171419099d7a0dd921a7f4e3214f29b1cf1a77b79', 0, NULL),
('2021-1-01625', 'farrah.bunch@lpu.edu.ph', '61e48677279514417849f8f5763c6339e945f9a9260c07f354c48cac9c2b9113', 0, NULL),
('2021-1-01827', 'john.doe@lpu.edu.ph', '3505b39200e0f76d90b9c8d13deadd7ff561936e317984d00be28604f4b02f48', 0, '2021-11-30 06:53:00'),
('2021-1-03276', 'juan.delacruz@lpu.edu.ph', '32c0230638a1a851c38d5f223e94a0e9ac9b55bae7747233b6edc358aa72c23a', 0, NULL),
('2021-1-28736', 'nympha.leyva@lpu.edu.ph', '10d5323b838d639ea9deeb28496447f99620972b99b9b4590dd43d34c8b95f76', 0, '2021-11-26 04:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `health_personnels_notification`
--

DROP TABLE IF EXISTS `health_personnels_notification`;
CREATE TABLE `health_personnels_notification` (
  `notification_id` int(11) NOT NULL,
  `id_no` varchar(45) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  `link` varchar(2048) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `department` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `height` varchar(25) DEFAULT NULL,
  `weight` varchar(25) DEFAULT NULL,
  `blood_type` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyceans`
--

INSERT INTO `lyceans` (`id_no`, `first_name`, `middle_name`, `last_name`, `role`, `department`, `birth_date`, `gender`, `height`, `weight`, `blood_type`) VALUES
('2014-1-62735', 'Elizabeth', 'S', 'Nsubuga', 'faculty', 'College of Engineering, Computer Studies and Architecture', '1989-06-17', 'Female', '', '', ''),
('2014-1-72634', 'Amanda', 'n/a', 'Menta', 'faculty', 'College of Engineering, Computer Studies and Architecture', '1991-10-12', 'Female', '', '', ''),
('2015-2-06969', 'Ji-eun', 'n/a', 'Lee', 'staff', 'Accounting Department', '1993-05-16', 'Female', '', '', ''),
('2015-2-09696', 'Momo', 'n/a', 'Hirai', 'staff', 'Student Affairs Office', '1996-11-09', 'Female', NULL, NULL, NULL),
('2015-2-11725', 'Arnel', 'P', 'Mag-usara', 'faculty', 'College of Arts and Sciences', '1983-06-07', 'Male', '', '', ''),
('2016-4-72653', 'Rothessa', 'G', 'Caringal', 'faculty', 'College of Allied Medical Sciences', '1978-05-17', 'Female', '', '', ''),
('2018-2-00837', 'Ara Joyce', 'n/a', 'Arinque', 'student', 'College of Engineering, Computer Studies and Architecture', '1999-02-02', 'Female', '', '', ''),
('2018-2-01509', 'Chris Jover', 'A', 'De Leon', 'student', 'College of Engineering, Computer Studies and Architecture', '1999-11-06', 'Male', '', '', ''),
('2018-2-01601', 'Airon', 'M', 'Guilleno', 'student', 'College of International Tourism and Hospitality Management', '1998-11-02', 'Male', '', '', ''),
('2018-2-01763', 'Rick Vincent Jeffrey', 'P', 'Dela Cruz', 'student', 'College of Engineering, Computer Studies and Architecture', '1999-10-19', 'Male', '', '', ''),
('2018-2-01940', 'Daniel', 'T', 'Maquiling', 'student', 'College of Fine Arts and Design', '1999-05-03', 'Male', '', '', ''),
('2018-2-02181', 'John Rafael', 'P', 'Mistica', 'student', 'College of Engineering, Computer Studies and Architecture', '1998-07-04', 'Male', '', '', ''),
('2018-2-02361', 'Corinthian Angel', 'E', 'Namuag', 'student', 'College of Business Administration', '2000-03-05', 'Female', '', '', ''),
('2018-2-02456', 'Mary', 'n/a', 'Donguines', 'student', 'College of Arts and Sciences', '1998-03-23', 'Female', '5\'2', '99', 'A+'),
('2018-2-02710', 'Ian Patrick', 'P', 'Lapara', 'student', 'College of Arts and Sciences', '1998-11-09', 'Male', '', '', ''),
('2018-2-03248', 'Jade Anne Kristel', 'J', 'Vale', 'student', 'College of Engineering, Computer Studies and Architecture', '2000-10-14', 'Female', '', '', ''),
('2019-2-00852', 'Mikaela Ashley', 'M', 'Perlado', 'student', 'College of Engineering, Computer Studies and Architecture', '2001-02-16', 'Female', '5', '105.82', 'O-'),
('2019-2-01026', 'Felix Jerome', 'P', 'Dela Fuente', 'student', 'College of Engineering, Computer Studies and Architecture', '2000-09-09', 'Male', '5\'5', '179', 'A+'),
('2019-2-01542', 'Jan Paul', 'O', 'Prudenciado', 'student', 'College of Engineering, Computer Studies and Architecture', '2000-07-02', 'Male', '5\'6', '141', 'O+'),
('2019-2-01947', 'Laarni Marie', 'n/a', 'Lalic', 'student', 'College of Engineering, Computer Studies and Architecture', '2000-10-23', 'Female', '5\'9', '123.45', 'B+'),
('2019-2-03010', 'Piere Marjun', 'D', 'Sibug', 'student', 'College of Arts and Sciences', '2001-03-10', 'Male', '5\'4', '165.35', 'A+'),
('2019-2-03621', 'Michelle', 'I', 'Allam', 'student', 'College of Arts and Sciences', '2000-12-27', 'Female', '', '', ''),
('2313-1-15021', 'Mark', 'n/a', 'Guinto', 'staff', 'Information and Communication Technology Department', '1976-03-02', 'Male', '', '', ''),
('3239-9-82430', 'Danny', 'n/a', 'Layug', 'staff', 'Information and Communication Technology Department', '1976-07-07', 'Male', '', '', ''),
('5971-9-60572', 'Jericho ', 'n/a', 'Guinto', 'staff', 'Information and Communication Technology Department', '1976-04-30', 'Male', '', '', ''),
('8659-7-63374', 'Jira', 'n/a', 'Latagan', 'staff', 'Information and Communication Technology Department', '1976-03-02', 'Male', '', '', '');

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
('2014-1-62735', 'elizabeth.nsubuga@lpunetwork.edu.ph', '4c7605926f2d78cee892e9c14edc28cdc50d02655910f54aaf501efc11e50185', 0),
('2014-1-72634', 'amanda.menta@lpunetwork.edu.ph', '760e2c08813b3ace8cdfe79e8db2fcfb00337cc2364f827466b0544de5cf07d6', 0),
('2015-2-06969', 'jieun.lee@lpunetwork.edu.ph', '5eda95ce0649e173966bf5026880d15fb1cbef6d2bc33533db879082d05c26aa', 0),
('2015-2-09696', 'momo.hirai@lpunetwork.edu.ph', '00bd50b4eead991214bef23eb367a8837fd062bc657c5c74b8f24c095f91875a', 0),
('2015-2-11725', 'arnel.magusara@lpunetwork.edu.ph', '76790811db873e829e699539bebebcf6205fca16c46fc8fd69f85e5c5cbb7ccc', 0),
('2016-4-72653', 'rothessa.caringal@lpunetwork.edu.ph', '9db7e02150333a6f5a8fa3a76599427cb6c71b9d3e2ca0fd598bb61b57fb1db3', 0),
('2018-2-00837', 'ara.arinque@lpunetwork.edu.ph', '8df10443a6c940ecaf26a28f64283dac95d74ee98e3fb37ca793f7cadce672ff', 0),
('2018-2-01509', 'chris.deleon@lpunetwork.edu.ph', '15b3530e61aa540e86b8f9b4f3d88245fd4fe81ea411cdbb84a5da52f75255b6', 0),
('2018-2-01601', 'airon.guilleno@lpunetwork.edu.ph', '8a76314762fea0def27ec68ee8ddc3805e4d323ca213020e07ab60306244e9bf', 0),
('2018-2-01763', 'rick.delacruz@lpunetwork.edu.ph', '32c0230638a1a851c38d5f223e94a0e9ac9b55bae7747233b6edc358aa72c23a', 0),
('2018-2-01940', 'daniel.maquiling@lpunetwork.edu.ph', '540669937a513b1abcaccebeb392771d4940af853b121694fd61ab8f3165f25d', 0),
('2018-2-02181', 'john.mistica@lpunetwork.edu.ph', '918f24ab2bacdffde0f9cc096f5d02d37a5b89d68a8bed1320cf4868f16d2301', 0),
('2018-2-02361', 'corinthian.namuag@lpunetwork.edu.ph', 'f07b23434ebfad19c6a13076f381b9c196e4aa3f98980015a5d1bc70a9ddc924', 0),
('2018-2-02456', 'mary.donguines@lpunetwork.edu.ph', '8794a19ad87ab515b90ef609b44ffb7d41ae4b8231d2cceaa85841ac8cefe4be', 0),
('2018-2-02710', 'ian.lapara@lpunetwork.edu.ph', '0771cd301a85745cf5389079687dccb367fdc9d1fe2c6fc16d81f467b385d2a4', 0),
('2018-2-03248', 'jade.vale@lpunetwork.edu.ph', '278d3872d86a41fd8ea83b5ef0c7118ecc6a445e6d0da818b08ac7c689d53f6d', 0),
('2019-2-00852', 'mikaela.perlado@lpunetwork.edu.ph', 'f5fa0c95df3017ba87faf93a23a4626d083319f492ea6e42180ce3264e1414e5', 0),
('2019-2-01026', 'felix.delafuente@lpunetwork.edu.ph', '1564ed9c21afd3df4b028591172f87fbe5c7ba5fa233e673584da38e2d6d6e7e', 0),
('2019-2-01542', 'jan.prudenciado@lpunetwork.edu.ph', '342883302e329414c0d61e2b20e30ff3c212ed0640b9d188348ec0cc0dee52c8', 0),
('2019-2-01947', 'laarni.lalic@lpunetwork.edu.ph', 'c497d863329f1d8e76e35825e0536f834f5ebb4e139d3e548a41db3e368e0fab', 0),
('2019-2-03010', 'piere.sibug@lpunetwork.edu.ph', '670bcebe208b52d7d71025b7e7ed7e0b6a2d7e06f0cbd907ea2b07083ad9a089', 0),
('2019-2-03621', 'michelle.allam@lpunetwork.edu.ph', '985664870b46e57b81eb1ceae3a005147efd91b234fc38d6f494f8301fedd0ca', 0),
('2313-1-15021', 'mark.guinto@lpunetwork.edu.ph', 'd787fce5d33972def28c0d0c65d88b20269a639df62f0d7ce31671bab9b9332a', 0),
('3239-9-82430', 'danny.layug@lpunetwork.edu.ph', '83491807ca75319d745dd9fd4a3e33bd3cb17817bac4d1438c90bb30b2480834', 0),
('5971-9-60572', 'jericho.guinto@lpunetwork.edu.ph', 'd787fce5d33972def28c0d0c65d88b20269a639df62f0d7ce31671bab9b9332a', 0),
('8659-7-63374', 'jira.latagan@lpunetwork.edu.ph', '36d75ff62e45149179e75ddeb08943e1253b68b87232dcb4a1c450f53676da81', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lyceans_notification`
--

DROP TABLE IF EXISTS `lyceans_notification`;
CREATE TABLE `lyceans_notification` (
  `notification_id` int(11) NOT NULL,
  `id_no` varchar(45) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  `link` varchar(2048) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `product_id` varchar(45) NOT NULL,
  `manufacturer` varchar(45) NOT NULL,
  `generic_name` varchar(100) NOT NULL,
  `brand_name` varchar(45) NOT NULL,
  `drug_class` varchar(100) NOT NULL,
  `dosage` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

DROP TABLE IF EXISTS `system_logs`;
CREATE TABLE `system_logs` (
  `log_id` int(11) NOT NULL,
  `admin_id` varchar(45) DEFAULT NULL,
  `healthpersonnel_id_no` varchar(45) DEFAULT NULL,
  `lycean_id_no` varchar(45) DEFAULT NULL,
  `app_type` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `sub_type` varchar(45) NOT NULL,
  `action` varchar(300) NOT NULL,
  `http_referer` varchar(100) NOT NULL,
  `remote_address` varchar(45) NOT NULL,
  `server_address` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
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
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `fk_batches_medicines1_idx` (`product_id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`consultation_no`),
  ADD KEY `fk_consultations_clinic_personnels1_idx` (`personnel_id_no`),
  ADD KEY `fk_consultations_lyceans1_idx` (`lycean_id_no`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `health_personnels`
--
ALTER TABLE `health_personnels`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `health_personnels_account`
--
ALTER TABLE `health_personnels_account`
  ADD PRIMARY KEY (`id_no`),
  ADD KEY `fk_clinic_personnels_credentials_clinic_personnels_idx` (`id_no`);

--
-- Indexes for table `health_personnels_notification`
--
ALTER TABLE `health_personnels_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_notifications_copy1_health_personnels1_idx` (`id_no`);

--
-- Indexes for table `health_records`
--
ALTER TABLE `health_records`
  ADD PRIMARY KEY (`record_id`,`id_no`),
  ADD UNIQUE KEY `file_path_UNIQUE` (`file_path`),
  ADD KEY `fk_health_record_lyceans1_idx` (`id_no`);

--
-- Indexes for table `lyceans`
--
ALTER TABLE `lyceans`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `lyceans_account`
--
ALTER TABLE `lyceans_account`
  ADD PRIMARY KEY (`id_no`),
  ADD KEY `fk_lycean_credentials_lyceans1_idx` (`id_no`);

--
-- Indexes for table `lyceans_notification`
--
ALTER TABLE `lyceans_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_notifications_copy1_lyceans1_idx` (`id_no`);

--
-- Indexes for table `medical_files`
--
ALTER TABLE `medical_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `fk_medical_files_consultations1_idx` (`consultation_no`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `system_logs`
--
ALTER TABLE `system_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_system_logs_lyceans1_idx` (`lycean_id_no`),
  ADD KEY `fk_system_logs_health_personnels1_idx` (`healthpersonnel_id_no`),
  ADD KEY `fk_system_logs_administrators1_idx` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `health_personnels_notification`
--
ALTER TABLE `health_personnels_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_records`
--
ALTER TABLE `health_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lyceans_notification`
--
ALTER TABLE `lyceans_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_files`
--
ALTER TABLE `medical_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `fk_batches_medicines1` FOREIGN KEY (`product_id`) REFERENCES `medicines` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Constraints for table `system_logs`
--
ALTER TABLE `system_logs`
  ADD CONSTRAINT `fk_system_logs_administrators1` FOREIGN KEY (`admin_id`) REFERENCES `administrators` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_system_logs_health_personnels1` FOREIGN KEY (`healthpersonnel_id_no`) REFERENCES `health_personnels` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_system_logs_lyceans1` FOREIGN KEY (`lycean_id_no`) REFERENCES `lyceans` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
