-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 03:43 AM
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
