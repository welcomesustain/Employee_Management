-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 11:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `emp_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `emp_password` varchar(50) DEFAULT NULL,
  `income` decimal(10,0) NOT NULL,
  `leave_days` int(10) NOT NULL,
  `overtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`emp_id`, `first_name`, `last_name`, `email`, `job_title`, `emp_password`, `income`, `leave_days`, `overtime`) VALUES
(1, 'Admin', 'khoza', 'admin@ul.ac.za', 'accountant', '12345', '50000', 55, 3500),
(2, 'admin2', 'khoza', 'admin2@ul.ac.za', 'manager', '12345', '50000', 5, 13000),
(31, 'jack', 'mabaso', 'abc@gmail.com', 'ICT', '1234', '5000', 5, 0),
(32, 'sam', 'ndlovu', 'abc@gmail.com', '', '0000', '0', 18, 0),
(33, 'khoza', 'terrence', 'test@gmail.com', 'Lawyer', '1234', '6000', 85, 0),
(52, 'welz', 'shingange', 'something@gmail.com', 'ICT', '1ed189452876134a950b677373099cf67a16e83d', '5000', 100, 15000),
(53, 'whale', 'bev', 'qv@gmail.com', 'Lawyer', 'eeae822781500d481e9bc62568c00814d6046ad4', '6000', 100, 15000),
(54, 'test', 'test', 'test@gmail.com', 'ICT', '1ed189452876134a950b677373099cf67a16e83d', '5000', 100, 15000),
(55, 'test2', 'test2', 'test2@gmail.com', 'Lawyer', '1ed189452876134a950b677373099cf67a16e83d', '6000', 50, 15000),
(57, 'q', 'v', 'q@v.com', 'lawyer', '211111', '15000', 45, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `emp_message`
--

CREATE TABLE `emp_message` (
  `id` int(11) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `emp_name` varchar(90) NOT NULL,
  `emp_message` varchar(255) NOT NULL,
  `msg_status` int(2) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_message`
--

INSERT INTO `emp_message` (`id`, `emp_id`, `emp_name`, `emp_message`, `msg_status`, `created_date`) VALUES
(5, 0, 'v', 'c', 1, '2020-12-24 09:17:49'),
(8, 0, 'jack', 'something', 1, '2021-01-07 02:20:03'),
(9, 0, 'jack', 'reason', 1, '2021-01-07 02:20:42'),
(10, 0, 'admin2', 'I am not feeling well today', 1, '2021-01-07 05:27:18'),
(11, 0, 'Admin', 'Leave approved', 1, '2021-01-07 09:27:38'),
(12, 0, 'Admin', 'Leave approved', 1, '2021-01-07 09:29:30'),
(13, 0, 'Admin', 'Leave approved', 1, '2021-01-07 09:30:01'),
(14, 0, 'Admin', 'Leave approved', 1, '2021-01-07 09:30:16'),
(15, 0, 'Admin', 'Leave approved', 1, '2021-01-07 09:30:43'),
(16, 0, 'Admin', 'Leave approved', 1, '2021-01-07 09:39:13'),
(17, 0, 'Admin', 'Leave Denied', 1, '2021-01-08 05:43:11'),
(18, 0, 'Admin', 'Leave Denied', 1, '2021-01-08 06:15:33'),
(19, 0, 'Admin', 'ma', 1, '2021-01-08 06:25:03'),
(20, 0, 'Admin', 'something', 1, '2021-01-08 06:25:21'),
(21, 0, 'admin2', 'text', 1, '2021-01-08 11:42:49'),
(22, 0, 'Admin', 'kkk', 1, '2021-01-08 02:00:27'),
(23, 0, 'sam', 'something', 1, '2021-01-08 05:38:07'),
(24, 31, 'jack', 'something', 1, '2021-01-08 06:49:00'),
(26, 54, 'test', 'hy admin', 0, '2021-03-09 05:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `emp_message2`
--

CREATE TABLE `emp_message2` (
  `msg_id` int(11) NOT NULL,
  `emp_id` int(5) NOT NULL,
  `from_emp` varchar(50) NOT NULL,
  `to_emp_id` int(10) NOT NULL,
  `to_emp` varchar(50) NOT NULL,
  `msg_status` int(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL,
  `emp_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_message2`
--

INSERT INTO `emp_message2` (`msg_id`, `emp_id`, `from_emp`, `to_emp_id`, `to_emp`, `msg_status`, `date_created`, `emp_message`) VALUES
(2, 31, 'jack', 0, 'something', 1, '2021-01-05 11:05:40', 'example text'),
(4, 31, 'jack', 0, 'something', 0, '2021-01-07 02:00:52', 'sentence'),
(6, 31, 'jack', 0, 'pay', 0, '2021-01-07 02:03:05', 'sentence'),
(7, 31, 'jack', 0, 'pay', 0, '2021-01-07 02:13:48', 'sentence'),
(8, 31, 'jack', 0, 'something', 0, '2021-01-07 02:14:52', 'text here'),
(9, 31, 'jack', 0, 'gg', 0, '2021-01-07 02:15:02', 'ggg'),
(10, 31, 'jack', 0, 'something', 0, '2021-01-07 02:15:42', 'something'),
(11, 1, 'Admin', 0, 'admin2', 1, '2021-01-07 09:44:19', 'Leave approved'),
(12, 1, 'Admin', 0, 'admin2', 1, '2021-01-08 05:42:42', 'Leave approved'),
(13, 1, 'Admin', 0, 'admin2', 1, '2021-01-08 05:43:39', 'Leave approved'),
(14, 1, 'Admin', 0, 'admin2', 1, '2021-01-08 05:44:25', 'Leave approved'),
(15, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:46:38', 'Leave approved'),
(16, 1, 'Admin', 0, 'admin2', 1, '2021-01-08 05:50:11', 'Leave approved'),
(17, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:51:09', 'Leave approved'),
(18, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:51:14', 'Leave approved'),
(19, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:52:08', 'Leave approved'),
(20, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:52:55', 'Leave approved'),
(21, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:54:02', 'Leave approved'),
(22, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:55:24', 'Leave approved'),
(23, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:55:39', 'Leave approved'),
(24, 1, 'Admin', 0, 'admin2', 0, '2021-01-08 05:55:53', 'Leave approved'),
(25, 2, 'Admin', 0, 'admin2', 0, '2021-01-08 06:09:54', 'Leave approved'),
(26, 2, 'Admin', 0, 'admin2', 0, '2021-01-08 06:10:20', 'Leave approved'),
(27, 6, 'Admin', 0, 'admin2', 0, '2021-01-08 06:13:25', 'Leave approved'),
(28, 7, 'Admin', 0, 'admin2', 0, '2021-01-08 06:13:53', 'Leave approved'),
(29, 8, 'Admin', 0, 'admin2', 0, '2021-01-08 06:15:21', 'Leave approved'),
(30, 10, 'Admin', 0, 'admin2', 0, '2021-01-08 06:15:26', 'Leave approved'),
(31, 9, 'Admin', 0, 'admin2', 0, '2021-01-08 06:20:19', 'Leave approved'),
(32, 1, 'Admin', 0, 'something', 0, '2021-01-08 06:28:04', 'something'),
(33, 31, 'jack', 0, 'somethin', 0, '2021-01-08 10:12:21', 'text here'),
(34, 31, 'jack', 0, 'aa', 0, '2021-01-08 10:13:25', 'bb'),
(35, 31, 'jack', 0, 'aa', 0, '2021-01-08 10:14:28', 'bb'),
(36, 31, 'jack', 2, 'admin2', 1, '2021-01-08 10:38:28', 'som'),
(37, 2, 'admin2', 2, 'admin2', 1, '2021-01-08 11:09:12', 'please'),
(38, 2, 'admin2', 2, 'admin2', 1, '2021-01-08 11:18:26', 'tesing'),
(39, 31, 'jack', 2, 'admin2', 1, '2021-01-08 11:33:22', 'from jack'),
(40, 31, 'jack', 2, 'admin2', 1, '2021-01-08 11:35:20', 'from jack'),
(41, 2, 'admin2', 1, 'Admin', 1, '2021-01-08 11:41:10', 'text'),
(43, 1, 'Admin', 2, 'admin2', 1, '2021-01-08 01:54:13', 'text here'),
(44, 1, 'Admin', 45, 'jack', 0, '2021-01-08 02:07:33', 'ss'),
(45, 1, 'Admin', 45, 'jack', 0, '2021-01-08 02:08:05', 'ss'),
(46, 1, 'Admin', 45, 'jack', 0, '2021-01-08 02:09:00', 'ss'),
(47, 1, 'Admin', 45, 'jack', 0, '2021-01-08 02:09:18', 'ss'),
(48, 1, 'Admin', 45, 'jack', 0, '2021-01-08 02:09:29', 'ss'),
(49, 1, 'Admin', 45, 'jack', 0, '2021-01-08 02:10:23', 'ss'),
(50, 1, 'Admin', 40, 'jack', 0, '2021-01-08 02:10:45', 'text'),
(52, 1, 'Admin', 31, 'jack', 1, '2021-01-08 02:11:19', 'text'),
(54, 1, 'Admin', 31, 'jack', 1, '2021-01-08 02:11:48', 'text'),
(55, 1, 'Admin', 31, 'jack', 1, '2021-01-08 02:11:59', 'text'),
(65, 1, 'Admin', 31, 'jack', 1, '2021-01-08 02:20:45', 'text'),
(66, 1, 'Admin', 31, 'jack', 1, '2021-01-08 02:22:22', 'text'),
(67, 1, 'Admin', 31, 'jack', 0, '2021-01-08 02:22:31', 'text'),
(68, 1, 'Admin', 0, '', 0, '2021-01-08 02:32:44', ''),
(69, 1, 'Admin', 0, '', 0, '2021-01-08 02:32:57', ''),
(70, 1, 'Admin', 31, 'jack', 0, '2021-01-08 02:35:23', 'll'),
(71, 1, 'Admin', 31, 'jack', 0, '2021-01-08 02:36:24', 'now no'),
(72, 18, 'Admin', 0, 'sam', 0, '2021-01-08 03:52:34', 'Leave approved'),
(74, 21, 'Admin', 0, 'sam', 0, '2021-01-08 05:24:08', 'Leave Denied'),
(75, 21, 'Admin', 0, 'sam', 0, '2021-01-08 05:24:09', 'Leave Denied'),
(76, 21, 'Admin', 0, 'sam', 0, '2021-01-08 05:24:10', 'Leave Denied'),
(77, 22, 'Admin', 0, 'sam', 0, '2021-01-08 05:29:31', 'Leave Denied'),
(78, 22, 'Admin', 0, 'sam', 0, '2021-01-08 05:29:32', 'Leave Denied'),
(79, 22, 'Admin', 0, 'sam', 0, '2021-01-08 05:29:58', 'Leave Denied'),
(80, 22, 'Admin', 0, 'sam', 0, '2021-01-08 05:30:25', 'Leave Denied'),
(82, 22, 'Admin', 32, 'sam', 1, '2021-01-08 05:33:46', 'Leave Denied'),
(83, 22, 'Admin', 32, 'sam', 0, '2021-01-08 05:33:49', 'Leave Denied'),
(84, 22, 'Admin', 32, 'sam', 0, '2021-01-08 05:34:18', 'Leave Denied'),
(85, 22, 'Admin', 32, 'sam', 0, '2021-01-08 05:36:47', 'Leave Denied'),
(86, 24, 'Admin', 2, 'admin2', 0, '2021-01-09 04:55:40', 'Leave approved'),
(87, 27, 'Admin', 31, 'jack', 0, '2021-01-09 04:59:52', 'Leave approved'),
(88, 1, 'Admin', 54, 'test', 1, '2021-01-09 09:45:26', 'something'),
(89, 1, 'Admin', 55, 'test2', 1, '2021-01-09 09:59:06', 'something'),
(90, 55, 'test2', 54, 'test', 1, '2021-01-09 10:02:27', 'hey there'),
(91, 1, 'Admin', 33, 'khoza', 0, '2021-03-09 05:35:04', 'hy there');

-- --------------------------------------------------------

--
-- Table structure for table `leave_app`
--

CREATE TABLE `leave_app` (
  `leave_id` int(50) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `leave_days` int(11) NOT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_app`
--

INSERT INTO `leave_app` (`leave_id`, `emp_id`, `emp_name`, `leave_days`, `msg_status`, `date_created`) VALUES
(1, 2, 'admin2', 45, 1, '2021-01-07 05:21:41'),
(3, 2, 'admin2', 45, 1, '2021-01-08 06:07:27'),
(6, 2, 'admin2', 50, 1, '2021-01-08 06:12:38'),
(7, 2, 'admin2', 50, 1, '2021-01-08 06:12:45'),
(8, 2, 'admin2', 53, 1, '2021-01-08 06:12:50'),
(9, 2, 'admin2', 53, 1, '2021-01-08 06:12:55'),
(10, 2, 'admin2', 51, 1, '2021-01-08 06:12:59'),
(11, 2, 'admin2', 54, 1, '2021-01-08 06:13:06'),
(12, 2, 'admin2', 40, 1, '2021-01-08 11:18:56'),
(13, 2, 'admin2', 55, 1, '2021-01-08 01:38:47'),
(14, 2, 'admin2', 53, 1, '2021-01-08 01:39:15'),
(15, 2, 'admin2', 53, 1, '2021-01-08 01:39:20'),
(16, 2, 'admin2', 50, 1, '2021-01-08 01:48:57'),
(17, 2, 'admin2', 43, 1, '2021-01-08 01:49:27'),
(18, 32, 'sam', 28, 1, '2021-01-08 03:51:29'),
(19, 32, 'sam', 13, 1, '2021-01-08 04:32:12'),
(20, 32, 'sam', 11, 1, '2021-01-08 04:46:30'),
(21, 32, 'sam', 85, 1, '2021-01-08 04:52:02'),
(22, 32, 'sam', 78, 1, '2021-01-08 04:56:13'),
(24, 2, 'admin2', 5, 1, '2021-01-09 04:54:07'),
(25, 2, 'admin2', 1, 0, '2021-01-09 04:54:21'),
(27, 31, 'jack', 80, 1, '2021-01-09 04:58:39'),
(28, 54, 'test', 15, 0, '2021-01-09 10:51:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_message`
--
ALTER TABLE `emp_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_message2`
--
ALTER TABLE `emp_message2`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `leave_app`
--
ALTER TABLE `leave_app`
  ADD PRIMARY KEY (`leave_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `emp_message`
--
ALTER TABLE `emp_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `emp_message2`
--
ALTER TABLE `emp_message2`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `leave_app`
--
ALTER TABLE `leave_app`
  MODIFY `leave_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
