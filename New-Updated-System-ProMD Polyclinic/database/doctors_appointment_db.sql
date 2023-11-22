-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 10:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
(1, 'Nicole Chan', 'M.D.', 'Room 101', '09752160829', '[3,6]', '1641949980_doctor.jpg', 1, '2021-12-22 16:19:03'),
(2, 'Rea Jane', 'M.D.', 'Room 101', '09752160829', '[1]', '1641949980_doctor.jpg', 0, '2021-12-22 16:20:40'),
(15, 'Jalen Rose Adriano', 'M.D.', 'Room 102', '09752160829', '[8]', '1641234780_doctor.jpg', 0, '2021-12-28 15:28:21'),
(16, 'Robert Miles Padua', 'M.D', 'Room 1', '09752160829', '[8]', '1641234840_doctor.jpg', 0, '2022-01-01 14:08:22');

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
(64, 15, 'Monday', '08:00', '14:00', '08:00:00', '09:00:00'),
(65, 15, 'Monday', '08:00', '14:00', '09:00:00', '10:00:00'),
(66, 15, 'Monday', '08:00', '14:00', '10:00:00', '11:00:00'),
(67, 15, 'Monday', '08:00', '14:00', '11:00:00', '12:00:00'),
(68, 15, 'Monday', '08:00', '14:00', '12:00:00', '13:00:00'),
(69, 15, 'Monday', '08:00', '14:00', '13:00:00', '14:00:00'),
(70, 15, 'Wednesday', '08:00', '14:00', '08:00:00', '09:00:00'),
(71, 15, 'Wednesday', '08:00', '14:00', '09:00:00', '10:00:00'),
(72, 15, 'Wednesday', '08:00', '14:00', '10:00:00', '11:00:00'),
(73, 15, 'Wednesday', '08:00', '14:00', '11:00:00', '12:00:00'),
(74, 15, 'Wednesday', '08:00', '14:00', '12:00:00', '13:00:00'),
(75, 15, 'Wednesday', '08:00', '14:00', '13:00:00', '14:00:00'),
(76, 15, 'Friday', '08:00', '11:00', '08:00:00', '09:00:00'),
(77, 15, 'Friday', '08:00', '11:00', '09:00:00', '10:00:00'),
(78, 15, 'Friday', '08:00', '11:00', '10:00:00', '11:00:00');

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
(4, '2022-02-14', 'Valentine Day', '<span style=\"color: rgb(24, 24, 24); font-family: open-sans, sans-serif; font-size: 18px; letter-spacing: 0.8px;\">Valentine’s Day occurs every February 14. Across the United States and in other places around the world, candy, flowers and gifts are exchanged between loved ones, all in the name of St. Valentine. But who is this mysterious saint and where did these traditions come from? Find out about the history of Valentine’s Day, from the ancient Roman ritual of Lupercalia that welcomed spring to the card-giving customs of Victorian England.</span>', '1642065720_valin.jpg'),
(5, '2022-01-20', 'Libreng Tuli', 'This events will be conducted in Labuan General Hospital. Please Be early ', '1642066320_tuli1.jpg');

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
(1, 'Pediatrics', 'A pediatrician is a medical doctor who specializes in treating infants, children, adolescents, and young adults.', '1641234300_pediatrics.jpg'),
(3, 'Cardiology', 'Cardiologists diagnose, assess and treat patients with defects and diseases of the heart and the blood vessels, which are known as the cardiovascular system.', '1641234300_cardiology.jpg'),
(4, 'Orthopaedics', 'Orthopaedics is the medical specialty that focuses on injuries and deceases of your body musculoskeletal  system ', '1641234360_orthopedic.jpg'),
(5, 'Obstetrician', 'An obstetrician is  a doctor who specialize in pregnancy and child birth', '1641234420_obstertrician.jpg'),
(6, 'Neurologists', 'Neurology is the branch of medicine concerned with the study and treatment of disorders of the nervous system.', '1641234480_neurology.jpg'),
(8, 'Internal Medicine', 'Doctors of internal medicine focus on adult medicine and have had special study and training focusing on the prevention and treatment of adult diseases.', '1643041860_internal.png'),
(9, 'Dental', 'Dental or oral health is concerned with your teeth, gums and mouth. The goal is to prevent complications such as tooth decay (cavities) and gum disease and to maintain the overall health of your mouth.', '1641217140_Dental.jpg');

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
(1, 'ProMD Polyclinic', 'promd@gmail.com', '221', '1665897840_received_1462016850948029.jpeg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;font-size:18px;text-align: center; background: transparent; position: relative;&quot;&gt;About Us&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;History&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;Labuan Public Hospital was Created under&lt;/span&gt;&lt;span style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); line-height: normal;&quot;&gt;&amp;nbsp;&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254);&quot;&gt;Section 40 of PD 1177 as amended&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); text-indent: -0.25in;&quot;&gt;No. 29 dated December 5, 1975, BP Blg. 517 - Act Establishing 10 Bed Capacity Infirmary Hospital in Labuan, Z.C. Labuan Public Hospital is Extension Hospital of the Zamboanga Regional Hospital now known as Zamboanga City Medical Center, About 35KM along the West Coast of Zamboanga City.&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254);&quot;&gt;It has a land area&lt;/span&gt;&lt;span style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); line-height: normal;&quot;&gt;&amp;nbsp; of&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); text-indent: -0.25in;&quot;&gt;5,000 sq. meter and Floor area 602.25 sq. meter, the edipies was created on 1980&rsquo;s and formaly open to Public on Novermber 14, 1984.&lt;/span&gt;&lt;br style=&quot;text-align: left; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;span lang=&quot;EN-GB&quot; style=&quot;box-sizing: inherit; color: rgb(10, 10, 10); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; background-color: rgb(254, 254, 254); text-indent: -0.25in;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY0MTE4NDE4OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMjM5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.075s_YxKZIXSRbMSOuaAlhOfPMIFsRqBD3oJV5Pb8So', '126791');

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
(5, '', 'Secretary', '', '', '', 'Secretary', '123', 2),
(6, '', 'Cotelo, Arjoelyn B.', '1995-06-06', 'sinunuc', '09752160829', '123', '123', 3),
(12, '15', 'Jalen Rose Adriano', '', '', '', 'ads', 'ads1', 4),
(16, '', 'JC', '', '', '', 'ppp', 'ppp', 2),
(17, '1', 'Nicole Chan', '', '', '', 'ads1', 'ads1', 4),
(18, '2', 'Rea Jane', '', '', '', 'ads22', 'ads22', 4),
(20, '16', 'Robert Miles Padua', '', '', '', 'ads3', 'ads3', 4),
(21, '', 'nicole', '2022-01-03', 'Upper', '09974409963', 'Nikko', '123123', 3),
(22, '', 'Miles', '2022-01-03', 'Canelar', '09278255005', 'miles', '123', 3),
(23, '', 'Jalen', '2000-03-12', 'Labuan', '09758692965', 'Jalen', '123', 3),
(24, '', 'Chan', '', '', '', 'Chan', '123', 2),
(25, '', 'celso Lobree', '', 'labuanaaas', '09066654881', 'cels', '123456', 3),
(26, '', 'Rea', '', 'sinunuc', '09614583791', 'rea', '123', 3),
(27, '', 'nicole11', '', 'asskdjajdlasd', '091238123712', 'nii', '123', 3),
(28, '', 'Hello', '', 'Sinunuc', '091238123710', 'aa', 'aa', 3),
(36, '', 'pads', '', 'asdasd', '09238123122', 'gasf', '123123', 3),
(37, '', 'pads', '', 'askakjsdasdkjkjasd', '0123812389', '123123', '2313223', 3),
(40, '', 'ProMD Polyclinic', '', 'sfasdasda', '09066432376', 'test', 'test', 3);

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors_list`
--
ALTER TABLE `doctors_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medical_specialty`
--
ALTER TABLE `medical_specialty`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
