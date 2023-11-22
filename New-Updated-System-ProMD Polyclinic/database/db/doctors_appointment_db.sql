-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 03:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctors_appointment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL,
  `doctor_id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `a_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_time` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= for verification, 1=confirmed,2= reschedule,3=done',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `doctor_id`, `patient_id`, `a_date`, `a_time`, `status`, `date_created`) VALUES
(7, 15, 21, '2022-11-22', '08:00 AM - 09:00 AM', 2, '2022-03-08 12:48:50'),
(8, 16, 23, '2022-03-26', '10:00 AM - 11:00 AM', 0, '2022-03-08 12:50:07'),
(9, 15, 23, '2022-11-24', '11:00 AM - 12:00 PM', 1, '2022-03-09 23:05:06'),
(10, 2, 22, '2022-12-05', '09:30 AM - 10:30 AM', 1, '2022-03-09 23:05:37'),
(11, 15, 21, '2022-11-29', '09:00 AM - 10:00 AM', 0, '2022-03-21 00:16:02'),
(12, 1, 21, '2022-12-06', '09:00 AM - 10:00 AM', 1, '2022-10-09 14:08:01'),
(14, 2, 41, '2022-12-12', '09:30 AM - 10:30 AM', 0, '2022-10-09 14:40:52'),
(17, 1, 43, '2023-02-21', '09:00 AM - 10:00 AM', 0, '2022-10-21 14:01:36'),
(18, 2, 23, '2022-11-11', '', 0, '2022-11-08 07:30:50'),
(19, 1, 23, '2022-11-10', '', 1, '2022-11-08 07:32:01'),
(20, 2, 21, '2022-11-09', '', 0, '2022-11-08 07:34:43'),
(21, 23, 21, '2022-11-15', '', 0, '2022-11-08 07:36:19'),
(22, 23, 23, '2022-11-16', '', 0, '2022-11-08 07:40:13'),
(23, 15, 44, '2022-11-22', '', 1, '2022-11-08 14:10:18'),
(24, 1, 45, '2023-01-25', '10:00 AM - 11:00 AM', 3, '2022-11-08 14:14:50'),
(25, 1, 45, '2023-02-23', '', 1, '2022-11-08 14:15:28'),
(26, 23, 45, '2022-11-09', '', 0, '2022-11-08 15:38:23'),
(27, 2, 41, '2022-12-13', '01:30 PM - 02:30 PM', 0, '2022-12-07 13:17:56'),
(28, 15, 46, '2023-01-11', '09:00 AM - 10:00 AM', 1, '2023-01-09 17:20:42'),
(29, 1, 48, '2023-01-12', '10:00 AM - 11:00 AM', 1, '2023-01-10 13:14:13'),
(30, 15, 49, '2023-01-16', '08:00 AM - 09:00 AM', 1, '2023-01-10 20:22:39'),
(31, 2, 50, '2023-01-17', '12:30 PM - 01:30 PM', 1, '2023-01-11 09:30:51'),
(32, 15, 50, '2023-01-20', '10:00 AM - 11:00 AM', 3, '2023-01-11 12:03:39'),
(34, 15, 52, '2023-01-27', '10:00 AM - 11:00 AM', 0, '2023-01-27 13:26:35'),
(35, 2, 53, '2023-02-06', '', 0, '2023-02-01 14:12:55'),
(36, 1, 53, '2023-03-09', '', 1, '2023-02-01 14:16:19'),
(37, 1, 53, '2023-02-18', '', 2, '2023-02-01 14:18:02'),
(38, 1, 53, '2023-02-25', '', 2, '2023-02-01 14:19:49'),
(39, 1, 53, '2023-02-07', '', 1, '2023-02-01 14:21:04'),
(40, 1, 53, '2023-02-16', '', 1, '2023-02-01 14:21:45'),
(41, 2, 53, '2023-02-08', '', 1, '2023-02-01 14:24:12'),
(42, 15, 54, '2023-02-02', '', 3, '2023-02-01 17:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_list`
--

CREATE TABLE `doctors_list` (
  `id` int(30) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_pref` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_roomno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(25) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors_list`
--

INSERT INTO `doctors_list` (`id`, `name`, `name_pref`, `clinic_roomno`, `contact`, `specialty_ids`, `img_path`, `status`, `date_created`) VALUES
(1, 'Kimberly Sucuajil', 'M.D.', 'Room 101', '09654251798', '[8]', '1665964860_274328842_478759197171619_4545047242948647784_n.jpg', 0, '2021-12-22 16:19:03'),
(2, 'Ladylyn Napat', 'M.D.', 'Room 115', '09659874562', '[5]', '1665965100_napat.jpg', 0, '2021-12-22 16:20:40'),
(15, 'Loricharna Ugay', 'M.D.', 'Room 103', '09066432376', '[8,5]', '1665964800_287502825_799730014330208_8243885197319510617_n.jpg', 0, '2021-12-28 15:28:21'),
(23, 'Mary Joy De Paz', 'M.D', 'Room 206', '09456987132', '[17]', '1665965160_depaz.jpg', 0, '2022-10-17 08:06:55'),
(24, 'Adrian Martin', '', '211', 'asdf', '[17]', '1673326680_1641217140_Dental.jpg', 0, '2023-01-10 12:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_schedule`
--

CREATE TABLE `doctors_schedule` (
  `id` int(30) NOT NULL,
  `doctor_id` int(30) NOT NULL,
  `day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_time_frame` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_time_frame` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors_schedule`
--

INSERT INTO `doctors_schedule` (`id`, `doctor_id`, `day`, `f_time_frame`, `t_time_frame`, `time_from`, `time_to`) VALUES
(94, 1, 'Monday', '08:00', '16:00', '08:00:00', '09:00:00'),
(95, 1, 'Monday', '08:00', '16:00', '09:00:00', '10:00:00'),
(96, 1, 'Monday', '08:00', '16:00', '10:00:00', '11:00:00'),
(97, 1, 'Monday', '08:00', '16:00', '11:00:00', '12:00:00'),
(98, 1, 'Monday', '08:00', '16:00', '12:00:00', '13:00:00'),
(99, 1, 'Monday', '08:00', '16:00', '13:00:00', '14:00:00'),
(100, 1, 'Monday', '08:00', '16:00', '14:00:00', '15:00:00'),
(101, 1, 'Monday', '08:00', '16:00', '15:00:00', '16:00:00'),
(102, 1, 'Wednesday', '09:00', '15:30', '09:00:00', '10:00:00'),
(103, 1, 'Wednesday', '09:00', '15:30', '10:00:00', '11:00:00'),
(104, 1, 'Wednesday', '09:00', '15:30', '11:00:00', '12:00:00'),
(105, 1, 'Wednesday', '09:00', '15:30', '12:00:00', '13:00:00'),
(106, 1, 'Wednesday', '09:00', '15:30', '13:00:00', '14:00:00'),
(107, 1, 'Wednesday', '09:00', '15:30', '14:00:00', '15:00:00'),
(108, 1, 'Wednesday', '09:00', '15:30', '15:00:00', '16:00:00'),
(109, 1, 'Friday', '07:00', '17:00', '07:00:00', '08:00:00'),
(110, 1, 'Friday', '07:00', '17:00', '08:00:00', '09:00:00'),
(111, 1, 'Friday', '07:00', '17:00', '09:00:00', '10:00:00'),
(112, 1, 'Friday', '07:00', '17:00', '10:00:00', '11:00:00'),
(113, 1, 'Friday', '07:00', '17:00', '11:00:00', '12:00:00'),
(114, 1, 'Friday', '07:00', '17:00', '12:00:00', '13:00:00'),
(115, 1, 'Friday', '07:00', '17:00', '13:00:00', '14:00:00'),
(116, 1, 'Friday', '07:00', '17:00', '14:00:00', '15:00:00'),
(117, 1, 'Friday', '07:00', '17:00', '15:00:00', '16:00:00'),
(118, 1, 'Friday', '07:00', '17:00', '16:00:00', '17:00:00'),
(149, 16, 'Monday', '09:00', '16:00', '09:00:00', '10:00:00'),
(150, 16, 'Monday', '09:00', '16:00', '10:00:00', '11:00:00'),
(151, 16, 'Monday', '09:00', '16:00', '11:00:00', '12:00:00'),
(152, 16, 'Monday', '09:00', '16:00', '12:00:00', '13:00:00'),
(153, 16, 'Monday', '09:00', '16:00', '13:00:00', '14:00:00'),
(154, 16, 'Monday', '09:00', '16:00', '14:00:00', '15:00:00'),
(155, 16, 'Monday', '09:00', '16:00', '15:00:00', '16:00:00'),
(156, 16, 'Thursday', '08:30', '16:00', '08:30:00', '09:30:00'),
(157, 16, 'Thursday', '08:30', '16:00', '09:30:00', '10:30:00'),
(158, 16, 'Thursday', '08:30', '16:00', '10:30:00', '11:30:00'),
(159, 16, 'Thursday', '08:30', '16:00', '11:30:00', '12:30:00'),
(160, 16, 'Thursday', '08:30', '16:00', '12:30:00', '13:30:00'),
(161, 16, 'Thursday', '08:30', '16:00', '13:30:00', '14:30:00'),
(162, 16, 'Thursday', '08:30', '16:00', '14:30:00', '15:30:00'),
(163, 16, 'Thursday', '08:30', '16:00', '15:30:00', '16:30:00'),
(164, 16, 'Saturday', '09:00', '16:00', '09:00:00', '10:00:00'),
(165, 16, 'Saturday', '09:00', '16:00', '10:00:00', '11:00:00'),
(166, 16, 'Saturday', '09:00', '16:00', '11:00:00', '12:00:00'),
(167, 16, 'Saturday', '09:00', '16:00', '12:00:00', '13:00:00'),
(168, 16, 'Saturday', '09:00', '16:00', '13:00:00', '14:00:00'),
(169, 16, 'Saturday', '09:00', '16:00', '14:00:00', '15:00:00'),
(170, 16, 'Saturday', '09:00', '16:00', '15:00:00', '16:00:00'),
(196, 15, 'Monday', '08:00', '15:00', '08:00:00', '09:00:00'),
(197, 15, 'Monday', '08:00', '15:00', '09:00:00', '10:00:00'),
(198, 15, 'Monday', '08:00', '15:00', '10:00:00', '11:00:00'),
(199, 15, 'Monday', '08:00', '15:00', '11:00:00', '12:00:00'),
(200, 15, 'Monday', '08:00', '15:00', '12:00:00', '13:00:00'),
(201, 15, 'Monday', '08:00', '15:00', '13:00:00', '14:00:00'),
(202, 15, 'Monday', '08:00', '15:00', '14:00:00', '15:00:00'),
(203, 15, 'Wednesday', '08:00', '14:00', '08:00:00', '09:00:00'),
(204, 15, 'Wednesday', '08:00', '14:00', '09:00:00', '10:00:00'),
(205, 15, 'Wednesday', '08:00', '14:00', '10:00:00', '11:00:00'),
(206, 15, 'Wednesday', '08:00', '14:00', '11:00:00', '12:00:00'),
(207, 15, 'Wednesday', '08:00', '14:00', '12:00:00', '13:00:00'),
(208, 15, 'Wednesday', '08:00', '14:00', '13:00:00', '14:00:00'),
(209, 15, 'Friday', '08:00', '11:00', '08:00:00', '09:00:00'),
(210, 15, 'Friday', '08:00', '11:00', '09:00:00', '10:00:00'),
(211, 15, 'Friday', '08:00', '11:00', '10:00:00', '11:00:00'),
(212, 23, 'Tuesday', '09:00', '13:00', '09:00:00', '10:00:00'),
(213, 23, 'Tuesday', '09:00', '13:00', '10:00:00', '11:00:00'),
(214, 23, 'Tuesday', '09:00', '13:00', '11:00:00', '12:00:00'),
(215, 23, 'Tuesday', '09:00', '13:00', '12:00:00', '13:00:00'),
(216, 23, 'Thursday', '10:00', '12:00', '10:00:00', '11:00:00'),
(217, 23, 'Thursday', '10:00', '12:00', '11:00:00', '12:00:00'),
(218, 23, 'Friday', '09:00', '13:00', '09:00:00', '10:00:00'),
(219, 23, 'Friday', '09:00', '13:00', '10:00:00', '11:00:00'),
(220, 23, 'Friday', '09:00', '13:00', '11:00:00', '12:00:00'),
(221, 23, 'Friday', '09:00', '13:00', '12:00:00', '13:00:00'),
(244, 2, 'Tuesday', '08:30', '16:00', '08:30:00', '09:30:00'),
(245, 2, 'Tuesday', '08:30', '16:00', '09:30:00', '10:30:00'),
(246, 2, 'Tuesday', '08:30', '16:00', '10:30:00', '11:30:00'),
(247, 2, 'Tuesday', '08:30', '16:00', '11:30:00', '12:30:00'),
(248, 2, 'Tuesday', '08:30', '16:00', '12:30:00', '13:30:00'),
(249, 2, 'Tuesday', '08:30', '16:00', '13:30:00', '14:30:00'),
(250, 2, 'Tuesday', '08:30', '16:00', '14:30:00', '15:30:00'),
(251, 2, 'Tuesday', '08:30', '16:00', '15:30:00', '16:30:00'),
(252, 2, 'Thursday', '07:30', '21:00', '07:30:00', '08:30:00'),
(253, 2, 'Thursday', '07:30', '21:00', '08:30:00', '09:30:00'),
(254, 2, 'Thursday', '07:30', '21:00', '09:30:00', '10:30:00'),
(255, 2, 'Thursday', '07:30', '21:00', '10:30:00', '11:30:00'),
(256, 2, 'Thursday', '07:30', '21:00', '11:30:00', '12:30:00'),
(257, 2, 'Thursday', '07:30', '21:00', '12:30:00', '13:30:00'),
(258, 2, 'Thursday', '07:30', '21:00', '13:30:00', '14:30:00'),
(259, 2, 'Thursday', '07:30', '21:00', '14:30:00', '15:30:00'),
(260, 2, 'Thursday', '07:30', '21:00', '15:30:00', '16:30:00'),
(261, 2, 'Thursday', '07:30', '21:00', '16:30:00', '17:30:00'),
(262, 2, 'Thursday', '07:30', '21:00', '17:30:00', '18:30:00'),
(263, 2, 'Thursday', '07:30', '21:00', '18:30:00', '19:30:00'),
(264, 2, 'Thursday', '07:30', '21:00', '19:30:00', '20:30:00'),
(265, 2, 'Thursday', '07:30', '21:00', '20:30:00', '21:30:00'),
(266, 2, 'Saturday', '07:30', '15:30', '07:30:00', '08:30:00'),
(267, 2, 'Saturday', '07:30', '15:30', '08:30:00', '09:30:00'),
(268, 2, 'Saturday', '07:30', '15:30', '09:30:00', '10:30:00'),
(269, 2, 'Saturday', '07:30', '15:30', '10:30:00', '11:30:00'),
(270, 2, 'Saturday', '07:30', '15:30', '11:30:00', '12:30:00'),
(271, 2, 'Saturday', '07:30', '15:30', '12:30:00', '13:30:00'),
(272, 2, 'Saturday', '07:30', '15:30', '13:30:00', '14:30:00'),
(273, 2, 'Saturday', '07:30', '15:30', '14:30:00', '15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(255) NOT NULL,
  `event_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_date`, `title`, `content`, `img_path`) VALUES
(6, '2023-01-22', 'free check up', '', '1673326800_1641234300_cardiology.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medical_specialty`
--

CREATE TABLE `medical_specialty` (
  `id` int(30) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_specialty`
--

INSERT INTO `medical_specialty` (`id`, `name`, `description`, `img_path`) VALUES
(5, 'Obstetrician', 'An obstetrician is  a doctor who specialize in pregnancy and child birth', '1641234420_obstertrician.jpg'),
(8, 'Internal Medicine', 'Doctors of internal medicine focus on adult medicine and have had special study and training focusing on the prevention and treatment of adult diseases.', '1665970020_best-internal-medicine-doctors-in-las-vegas-1536x1022.jpg'),
(17, 'Pediatrician', 'A pediatrician is a doctor who focuses on the health of infants, children, adolescents and young adults. Pediatric care starts at birth and lasts through a child’s 21st birthday or longer. Pediatricians prevent, detect and manage physical, behavioral and developmental issues that affect children.', '1665970020_Pediatrician.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`, `token`, `device_id`) VALUES
(1, 'ProMD Polyclinic', 'promd@gmail.com', '*223', '1667888340_1667823660_1665966600_310596961_2223796141161345_1198972886419738186_n.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;font-size:18px;text-align: center; background: transparent; position: relative;&quot;&gt;About Us&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;History&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY0MTE4NDE4OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMjM5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.075s_YxKZIXSRbMSOuaAlhOfPMIFsRqBD3oJV5Pb8So', '126791');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = secretary, 3 = patient, 4 = doctor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `doctor_id`, `name`, `birthdate`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, '', 'Administrator', '', '', '', 'admin', 'admin123', 1),
(2, '', 'Husin, Haidhar S', '1995-06-09', 'Sinunuc', '09752160829', 'ching', 'ching', 3),
(3, '', 'Nurshela B. Omar', '1995-10-12', 'Sinunuc', '09559956119', 'shelang', 'shelang', 3),
(4, '', 'Nurhaida Canaria', '1995-06-27', 'Mampang', '09274725672', 'jams', 'jams', 3),
(5, '', 'beast', '', '', '', 'beast', '123', 2),
(6, '', 'Cotelo, Arjoelyn B.', '1995-06-06', 'sinunuc', '09752160829', '123', '123', 3),
(12, '15', 'Loricharna Ugay', '', '', '', 'ads', '1234', 4),
(16, '', 'belle', '', '', '', 'belle', '123', 2),
(17, '1', 'Kimberly Sucuajil', '', '', '', 'ads1', '1234', 4),
(18, '2', 'Ladylyn Napat', '', '', '', 'ads22', '1234', 4),
(21, '', 'amada', '2022-01-03', 'Sinunuc', '09659874563', 'amada', '123', 3),
(22, '', 'Antonie ', '2022-01-03', 'Putik', '09356987454', 'antonie', '123', 3),
(23, '', 'intet', '2000-03-12', 'Ayala', '09879564123', 'intet', '123', 3),
(24, '', 'de paz', '', '', '', 'de paz', '123', 2),
(26, '', 'Rea', '', 'sinunuc', '09614583791', 'rea', '123', 3),
(27, '', 'nicole11', '', 'asskdjajdlasd', '091238123712', 'nii', '123', 3),
(28, '', 'Hello', '', 'Sinunuc', '091238123710', 'aa', 'aa', 3),
(36, '', 'pads', '', 'asdasd', '09238123122', 'gasf', '123123', 3),
(37, '', 'pads', '', 'askakjsdasdkjkjasd', '0123812389', '123123', '2313223', 3),
(41, '', 'depas', '', 'boalan', '09069614618', 'depaz', '123', 3),
(42, '23', 'Mary Joy De Paz', '', '', '', 'ads123', 'admin123', 4),
(43, '', 'jhay', '', 'sangali', '0987451258', 'depaz123', '123', 3),
(44, '', 'kim', '', 'san roque', '0987456231', 'kim', '123', 3),
(45, '', 'Santos', '', 'sangali', '09263394576', 'santos', '123', 3),
(46, '', 'charna', '', 'ayala', '09066432376', 'char', '1234', 3),
(47, '24', 'Adrian Martin', '', '', '', 'adsr', '1234', 4),
(48, '', 'adrian', '', 'recodo', '09576462', 'adrian', '1234', 3),
(49, '', 'marco', '', 'ayala', '1233456', 'marc', '1234', 3),
(50, '', 'john', '', 'recodo', '55885', 'john', '123', 3),
(51, '', 'jhay', '', 'sangali', '09094711351', 'jhay', '1234', 3),
(52, '', 'charna', '', 'ayala', '09973864361', 'charna', '1234', 3),
(53, '', 'Celso', '', 'recodo', '09066654881', 'celso', '123', 3),
(54, '', 'arvin', '', 'calarian', '09354884836', 'arvin', '123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_list`
--
ALTER TABLE `doctors_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_specialty`
--
ALTER TABLE `medical_specialty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `doctors_list`
--
ALTER TABLE `doctors_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medical_specialty`
--
ALTER TABLE `medical_specialty`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD CONSTRAINT `system_settings_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
