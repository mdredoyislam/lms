-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 05:48 AM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(50) DEFAULT NULL,
  `book_publication_name` varchar(50) DEFAULT NULL,
  `book_purchase_date` varchar(50) DEFAULT NULL,
  `book_price` varchar(10) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `librarian_username` varchar(70) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `datetime`) VALUES
(7, 'করোণা ', '20200503084540.png', 'মিজানুর রহমান', 'হাসান বুক হাউস', '2020-05-04', '450', 10, 10, 'redoyislam', '2020-05-03 06:45:40'),
(8, 'বলবো না ', '20200503090526.png', 'আজহারী', 'হাসান', '2020-04-28', '500', 10, 10, 'redoyislam', '2020-05-03 07:05:26'),
(9, 'PHP', '20200503090639.jpg', 'মিজানুর রহমান', 'ইহসান', '2020-05-11', '250', 10, 10, 'redoyislam', '2020-05-03 07:06:39'),
(10, 'বাংলা বই', '20200503094324.jpg', 'মো রিদয় ইসলাম', 'বাংলা ভিশন', '2020-05-05', '700', 10, 10, 'redoyislam', '2020-05-03 07:43:24'),
(11, 'মেডিকেল ', '20200503094555.jpg', 'শফিকুল ইসলাম', 'হক', '2020-05-06', '450', 10, 10, 'redoyislam', '2020-05-03 07:45:55'),
(12, 'আয়মান সাদিফ', '20200503094952.jpg', 'মিজানুর রহমান', 'ঙ্গানকোষ', '2020-05-06', '800', 10, 10, 'redoyislam', '2020-05-03 07:49:52'),
(13, 'java', '20200503095048.jpg', 'আজহারী', 'ইহসান', '2020-05-06', '500', 10, 10, 'redoyislam', '2020-05-03 07:50:48'),
(14, 'উপন্যাস', '20200503095134.jpg', 'মিজানুর রহমান', 'ঙ্গানকোষ', '2020-05-27', '100', 10, 10, 'redoyislam', '2020-05-03 07:51:34'),
(15, ' লাল সালু', '20200503103327.jpg', 'সামসুর রহমান', 'বাহার', '2020-05-06', '600', 10, 8, 'redoyislam', '2020-05-03 08:33:27'),
(17, 'কাকতাড়ুয়া', '20200503103552.jpg', 'লাবনী', 'তোতা', '2020-05-13', '500', 10, 10, 'redoyislam', '2020-05-03 08:35:52'),
(18, 'Md Redoy Islam', '20200524101754.PNG', 'Md Redoy', 'Ihsan', '2020-05-11', '249', 10, 10, 'redoyislam', '2020-05-24 08:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(50) NOT NULL,
  `book_return_date` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 6, 9, '04-05-2020', '11-05-20', '2020-05-04 05:43:26'),
(2, 7, 15, '04-05-2020', '11-05-20', '2020-05-04 05:50:03'),
(3, 6, 8, '08-05-2020', '11-05-20', '2020-05-08 07:24:01'),
(4, 6, 9, '08-05-2020', '12-05-20', '2020-05-08 07:27:37'),
(5, 6, 11, '09-05-2020', '11-05-20', '2020-05-09 05:09:58'),
(6, 6, 13, '12-05-2020', '12-05-20', '2020-05-12 03:57:39'),
(7, 6, 13, '12-05-2020', '12-05-20', '2020-05-12 03:57:44'),
(8, 7, 13, '12-05-2020', '12-05-20', '2020-05-12 03:58:23'),
(9, 6, 13, '12-05-2020', '12-05-20', '2020-05-12 04:10:53'),
(10, 6, 9, '12-05-2020', '12-05-20', '2020-05-12 04:15:25'),
(11, 7, 9, '12-05-2020', '12-05-20', '2020-05-12 04:15:49'),
(12, 6, 9, '12-05-2020', '12-05-20', '2020-05-12 04:16:10'),
(13, 6, 9, '12-05-2020', '12-05-20', '2020-05-12 04:16:15'),
(14, 6, 9, '12-05-2020', '12-05-20', '2020-05-12 04:16:20'),
(15, 6, 9, '12-05-2020', '12-05-20', '2020-05-12 04:16:24'),
(16, 6, 9, '12-05-2020', '12-05-20', '2020-05-12 04:17:28'),
(17, 6, 9, '12-05-2020', '12-05-20', '2020-05-12 04:17:35'),
(18, 6, 9, '12-05-2020', '24-05-20', '2020-05-12 04:17:39'),
(19, 6, 9, '24-06-2022', '24-06-22', '2022-06-24 03:30:47'),
(20, 7, 15, '24-06-2022', '', '2022-06-24 03:32:32'),
(21, 7, 15, '24-06-2022', '', '2022-06-24 03:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `libratian`
--

CREATE TABLE `libratian` (
  `id` int(3) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libratian`
--

INSERT INTO `libratian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'MD', 'REDOY ISLAM', 'mdredoyislam84@gmail.com', 'redoyislam', '123456', '2020-04-29 17:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(6, 'MD', 'REDOY ISLAM', 308280, 291705, 'mdredoyislam84@gmail.com', 'MDREDOYISLAM', '$2y$10$G9kERPjhZkVbpOgBWv76Cuh4JU.qMNcUqE2IBaL8qOTBR2k3.F2be', '01770930936', NULL, 1, '2020-04-30 02:11:43'),
(7, 'MD ', 'ABDUL MAJID', 165620, 168205, 'mdabdulmajid@gmail.com', 'ABDULMAJID', '$2y$10$aIx0YbJkVV2Xk7NIpH7rluE22nKocL15mMRskeXemYIHkUDNzolH6', '01750886069', NULL, 1, '2020-04-30 04:37:20'),
(8, 'md', 'Rayhan', 1, 2, 'rayhan@gmail.com', 'rayhan', '123456', '01770930936', NULL, 0, '2020-05-12 03:13:12'),
(11, 'md', 'Rayhan', 1, 2, 'rayha@gmail.com', 'rayha', '123456', '01770930936', NULL, 0, '2020-05-12 03:13:43'),
(12, 'md', 'Rayhan', 1, 2, 'rayhan1@gmail.com', 'rayhan1', '123456', '01770930936', NULL, 0, '2020-05-12 03:14:04'),
(13, 'md', 'Rayhan', 1, 2, 'rayhan2@gmail.com', 'rayhan2', '123456', '01770930936', NULL, 0, '2020-05-12 03:14:52'),
(14, 'md', 'Rayhan', 1, 2, 'rayhan3@gmail.com', 'rayhan3', '123456', '01770930936', NULL, 0, '2020-05-12 03:14:52'),
(15, 'md', 'Rayhan', 1, 2, 'rayhan11@gmail.com', 'rayhan11', '123456', '01770930936', NULL, 0, '2020-05-12 03:14:52'),
(16, 'md', 'Rayhan', 1, 2, 'rayhan111@gmail.com', 'rayhan111', '123456', '01770930936', NULL, 0, '2020-05-12 03:14:52'),
(17, 'md', 'Rayhan', 1, 2, 'rayhan222@gmail.com', 'rayhan222', '123456', '01770930936', NULL, 0, '2020-05-12 03:14:52'),
(19, 'md', 'Rayhan', 1, 2, 'rayhan12@gmail.com', 'rayhan12', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:54'),
(20, 'md', 'Rayhan', 1, 2, 'rayhan23@gmail.com', 'rayhan23', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:54'),
(21, 'md', 'Rayhan', 1, 2, 'rayhan34@gmail.com', 'rayhan34', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(22, 'md', 'Rayhan', 1, 2, 'rayhan45@gmail.com', 'rayhan45', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(23, 'md', 'Rayhan', 1, 2, 'rayhan56@gmail.com', 'rayhan56', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(24, 'md', 'Rayhan', 1, 2, 'rayhan67@gmail.com', 'rayhan67', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(25, 'md', 'Rayhan', 1, 2, 'rayhan7@gmail.com', 'rayhan7', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(26, 'md', 'Rayhan', 1, 2, 'rayhan8@gmail.com', 'rayha8n', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(27, 'md', 'Rayhan', 1, 2, 'rayhan9@gmail.com', 'rayhan9', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(28, 'md', 'Rayhan', 1, 2, 'rayhan99@gmail.com', 'rayhan99', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(29, 'md', 'Rayhan', 1, 2, 'rayhan88@gmail.com', 'rayhan88', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(30, 'md', 'Rayhan', 1, 2, 'rayhan77@gmail.com', 'rayhan77', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(31, 'md', 'Rayhan', 1, 2, 'rayhan66@gmail.com', 'rayhan66', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:55'),
(32, 'md', 'Rayhan', 1, 2, 'rayhan55@gmail.com', 'rayhan55', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:56'),
(33, 'md', 'Rayhan', 1, 2, 'rayhan44@gmail.com', 'rayhan44', '123456', '01770930936', NULL, 0, '2020-05-12 03:18:56'),
(34, 'REDOY', 'ISLAM', 308280, 291705, 'mdredoyislam.web@gmail.com', 'devredoy', '$2y$10$9fCM4ecEAeFMpoUwL1YQFecqv9OuIVLlPepV18jHDsEEtzEkXppBq', '01772734462', NULL, 1, '2022-06-22 07:15:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libratian`
--
ALTER TABLE `libratian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `libratian`
--
ALTER TABLE `libratian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
