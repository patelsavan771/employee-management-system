-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 05:08 PM
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
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`) VALUES
(101, 'Management'),
(102, 'Development'),
(103, 'QA'),
(104, 'Design'),
(105, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE `emp_master` (
  `emp_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_master`
--

INSERT INTO `emp_master` (`emp_id`, `fname`, `lname`, `email`, `phone_no`, `dept_id`, `salary`, `joining_date`, `birth_date`, `password`) VALUES
(1, 'Savan', 'Patel', 'admin@ems.com', '9426212486', 101, 250000, '2022-07-15', '2002-01-25', 'asdf'),
(3, 'Harsh', 'Nishad', 'harsh@gmail.com', '6356942632', 103, 40000, '2022-07-01', '2001-06-12', 'asdf'),
(4, 'Visnu', 'Pareek', 'vishnu@ems.com', '8459623175', 101, 62000, '2022-06-01', '2001-11-26', 'vish'),
(5, 'Kevin', 'Vagdoda', 'kdbhau@gmail.com', '9624993519', 101, 100000, '2021-01-21', '2002-09-01', 'kd'),
(6, 'jeel', 'patel', 'jeel@gmail.com', '9265130433', 104, 50000, '2022-07-15', '2002-08-20', 'jeel'),
(9, 'Meet', 'Patel', 'meet@gmail.com', '9898256314', 105, 1253698, '0000-00-00', '2001-09-24', 'meet'),
(11, 'Lokesh', 'savlani', 'lokesh@gmail.com', '7456982312', 105, 30000, '2022-08-25', '2002-07-04', 'lokesh'),
(12, 'Jay', 'Prajapati', 'jay@gmail.com', '8200479632', 103, 60000, '2022-07-15', '2001-08-31', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  `assign_date` date NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `emp_id`, `title`, `description`, `assign_date`, `deadline`) VALUES
(5, 4, 'attend meeting at XYZ certification ', 'all the info about this meeting is follow:\r\nlink\r\ntime\r\nppt\r\nret\r\nea\r\nsdf\r\na', '2022-08-14', '2022-08-25'),
(12, 1, 'enable employees to view their tasks', 'blaaa blaaa blaaa updatedddd testing.........', '2022-08-14', '2022-08-16'),
(13, 11, 'Hire 3 developers with 2 years ex.', 'basjdfoa sdfj aosdcfioc qsiodfj qwiej fiwe', '2022-08-15', '2022-09-30'),
(14, 4, 'fix meeting with US client', 'fix meeting with US xyz client on or before 31st August. \r\nmake presentation and prepare one prototype too.\r\n', '2022-08-15', '2022-08-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `emp_master`
--
ALTER TABLE `emp_master`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD CONSTRAINT `emp_master_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `emp_master` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
