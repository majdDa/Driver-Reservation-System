-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 10:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driver_requests`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_reqs`
--

CREATE TABLE `new_reqs` (
  `id` int(11) NOT NULL,
  `requester_name` varchar(50) NOT NULL,
  `requester_num` int(12) NOT NULL,
  `request_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `description` varchar(500) NOT NULL,
  `is_approve` tinyint(4) NOT NULL COMMENT 'request status',
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_reqs`
--

INSERT INTO `new_reqs` (`id`, `requester_name`, `requester_num`, `request_date`, `location`, `time_from`, `time_to`, `description`, `is_approve`, `status`) VALUES
(1, 'Rama Habash', 993333615, '2020-11-25', 'Mazzeh - Al Momayazon - To Mezzah West Villas', '14:00:00', '16:00:00', 'Syria store team  5 Employee', 1, 1),
(2, 'Renee Muarrawi', 993333634, '2020-11-26', 'West Villas- Rand', '11:00:00', '12:00:00', 'Transfer Canteen and Cleaning materials to Moumayazoun.', 1, 1),
(3, 'Bella Akel', 993333627, '2020-11-29', 'Mazah Al Moumayazoun', '14:00:00', '15:30:00', 'We have meeting with Mr. Mazen for 1 Hour', 1, 1),
(4, 'Renee Muarrawi', 993333634, '2020-11-29', 'Mazzeh - West Villas', '13:30:00', '14:00:00', 'Transfer Items to Moumayazoun', 1, 1),
(5, 'Majd Dahma', 993333649, '2020-12-02', 'Dwelaa', '19:30:00', '19:30:00', 'overtime hours.', 1, 1),
(10, 'Bella Akel', 993333627, '2020-12-20', 'من المميزون الى مزة غربية', '10:30:00', '11:00:00', '', 0, 1),
(11, 'أيهم الخوري', 993333637, '2021-01-12', 'دمشق - التجارة - إذاعة صوت الغد', '12:30:00', '14:00:00', 'meeting', 1, 1),
(12, 'أيهم الخوري', 993333637, '2021-01-27', 'المؤسسة العامة للإعلان', '07:30:00', '10:30:00', 'سحب مسابقة الراتب\nمن الدويلعة إلى المؤسسة العامة للإعلان ثم رند', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Gsm` varchar(12) NOT NULL,
  `EmpID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `User_type` int(11) NOT NULL COMMENT 'Identify User Group|Type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `Gsm`, `EmpID`, `Username`, `Password`, `Email`, `User_type`) VALUES
(1, 'Mazen Ali Sweid', '993333633', 1, 'd4aca49fcc37b53f2f84cd7ae08a0d45c8076bf5643e41aa12f9b3140f901eaf', '389e38653596a0c8948a9ccd4d4cf1e0d6bfe1617692aa276626429d22da5fcb', 'Mazen.Sweid@rand.sy', 0),
(2, 'Ayham Khoury', '993333637', 2, '594dd3dcdc5135f8b0755da62327f56459bff7f3703bc8993c24fcd28c8df3f0', '60dd882591963ca528c08f52e0d5972f12de0c4007353aaf353e95a7ce7d385f', 'Ayham.Khoury@rand.sy', 0),
(3, 'Heba Soulaiman', '993333632', 3, 'cdda46a52ebfc5c7abf6b8f18857adfb8c951a1377ee851bb35fcb35d58b0663', 'd8cc92d605400b78d9c49b0cc572a8d776eb896df5bd200bbe74020e6988cd95', 'Heba.Amir@rand.sy', 1),
(4, 'Majed Ghafir', '993333611', 4, 'd7b608f51c50cacec13e89026adb852d8671979bf885faec8ecb127423694d56', '9dc4c59698bd03a1ebebe3cd40a6afee268a53372bdafdabdca56daad4f1def2', 'Majed.Ghafir@rand.sy', 0),
(5, 'Tamara Khaddaj', '993333635', 5, 'd320a88214879d9a31e5a26d3bb2898adcd6c59432b88d068114077ee80b58c7', 'b0f16849dba9d4a377a0d134a8dddfc7fcbf7bf3b9e87b72885da9c74ddcafde', 'Tamara.Khaddaj@rand.sy', 0),
(6, 'Rama Habash', '993333615', 6, '7d09f791b7e38c511f92f3610ae1ae9396b08a99c32ad1f180e975099f2dfb9f', '2dee15ff34620a0445f814589dadf0db001b46d8e618b12dcd6399e76db78c10', 'RAMA.Habash@rand.sy', 0),
(7, 'Bella Akel', '993333627', 7, 'e30aeca2fd33f9b28ff3ee20e919d06115faefede6c3eb0788b193ae704b2911', 'c19b04da6667cc79fc063483f0afc80f8bcfdf9a58940832afc0d6c8a6a0674e', 'Bella.Akel@rand.sy', 0),
(8, 'Dima Mhd', '993333648', 8, '281649890d889e0e7690d6b7e48dd423e37911aaa6c17a2015bc74a25ccea11c', '228e63e78c43e8b2ef31a580a40d43338b0dc70b824191d9c3e192b4c084c20e', 'Dima.Mhd@rand.sy', 0),
(9, 'Renee Muarrawi', '993333634', 9, '70998feaf9270861216513fca0439ca0a9b50c7581619850feef7221a59c326e', '63492d81255c75a05912a8d9ee8410698c059b81ca09a85224675cc2ba7646ad', 'Renee.Muarrawi@rand.sy', 1),
(10, 'Majd Dahma', '993333649', 11015, '08de9c14bda11b6588363166f811316a6bc2621d6fc3e88d3df2b2db8bcc9766', '684f5c56e08d6f286aae6cd8c96cdd14b4160bad9330e1e5cef67665f818cc56', 'majd.dahma@rand.sy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_reqs`
--
ALTER TABLE `new_reqs`
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
-- AUTO_INCREMENT for table `new_reqs`
--
ALTER TABLE `new_reqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
