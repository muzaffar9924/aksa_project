-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 01:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iiijssmy_taskmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `added_on`) VALUES
(1, 'admin', 'admin123', '2023-11-24 08:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` int(11) NOT NULL,
  `e_name` text NOT NULL,
  `mobile` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `e_name`, `mobile`, `username`, `password`) VALUES
(1, 'test_emp1', '1234567890', 'test1', 'test1@123'),
(2, 'test_emp2', '2222222222', 'test2', 'test2@123'),
(3, 'test_emp3', '78945613132', 'test3', 'test3@123');

-- --------------------------------------------------------

--
-- Table structure for table `employee_task`
--

CREATE TABLE `employee_task` (
  `user_id` int(11) NOT NULL,
  `assign_by` text NOT NULL,
  `assign_to` text NOT NULL,
  `emp_name` text NOT NULL,
  `company_name` text NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `allocation_date` date DEFAULT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time NOT NULL,
  `deadline` date DEFAULT NULL,
  `work_status` text NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_task`
--

INSERT INTO `employee_task` (`user_id`, `assign_by`, `assign_to`, `emp_name`, `company_name`, `task_name`, `allocation_date`, `start_date`, `start_time`, `end_date`, `end_time`, `deadline`, `work_status`, `status`, `created_on`, `updated_on`) VALUES
(1, '', '', 'test_emp1', 'Coding Web', 'testing task', '2023-06-24', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', NULL, 'Pending', 1, '2023-06-24 10:12:04', '2023-06-24 10:12:04'),
(2, 'test_emp1', 'test_emp2', 'test_emp1', 'companie1', 'test task', '2023-06-24', '2023-06-24', '00:00:00', '2023-06-24', '15:46:00', '0000-00-00', 'Completed', 1, '2023-06-24 10:12:24', '2023-06-24 10:15:45'),
(3, 'test_emp2', 'test_emp3', 'test_emp1', 'Others', 'test', '2023-06-24', '2023-06-24', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', 'In-progress', 1, '2023-06-24 10:13:09', '2023-06-24 10:18:00'),
(4, '', '', 'test_emp1', 'companie2', 'test', '2023-06-24', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', NULL, 'Pending', 1, '2023-06-24 10:16:18', '2023-06-24 10:16:18'),
(5, 'test_emp3', 'test_emp2', 'test_emp2', 'companie6', 'task', '2023-06-24', '2023-06-24', '04:00:00', '0000-00-00', '00:00:00', '0000-00-00', 'In-progress', 1, '2023-06-24 10:19:11', '2023-06-24 10:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_task`
--
ALTER TABLE `employee_task`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_task`
--
ALTER TABLE `employee_task`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
