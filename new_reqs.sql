-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 10:46 AM
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
(1, 'Majd Dahma', 993333649, '2020-12-02', 'Dwelaa', '19:30:00', '19:30:00', 'overtime hours.', 1, 1),

-- Indexes for dumped tables
--

--
-- Indexes for table `new_reqs`
--
ALTER TABLE `new_reqs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_reqs`
--
ALTER TABLE `new_reqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
