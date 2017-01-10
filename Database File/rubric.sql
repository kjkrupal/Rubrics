-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 09:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rubric`
--

-- --------------------------------------------------------

--
-- Table structure for table `beit2`
--

CREATE TABLE `beit2` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beit2`
--

INSERT INTO `beit2` (`student_id`, `name`, `email`, `phone`) VALUES
(1, 'Manish', 'mj@gmail.com', '8286616577'),
(2, 'Krupal', 'kj@gmail.com', '8767622007'),
(3, 'Vishal', 'vj@gmail.com', '9223474776');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` varchar(10) NOT NULL,
  `classname` varchar(10) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `name` text NOT NULL,
  `coid` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `classname` text NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `tfname` varchar(20) NOT NULL,
  `tlname` varchar(20) NOT NULL,
  `emailid` varchar(20) NOT NULL,
  `id` varchar(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `phone` int(11) NOT NULL,
  `Organization` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rubrics`
--

CREATE TABLE `rubrics` (
  `rid` int(10) NOT NULL,
  `rubricname` varchar(100) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_data`
--

CREATE TABLE `temp_data` (
  `temp_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_data`
--

INSERT INTO `temp_data` (`temp_id`, `name`, `email`, `phone`, `teacher_id`) VALUES
(36, 'Krupal', 'kj@gmail.com', '8767622007', 2),
(37, 'Vishal', 'vj@gmail.com', '9223474776', 2),
(38, 'Manish', 'mj@gmail.com', '8286616577', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `teacher_id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`teacher_id`, `name`, `email`, `password`) VALUES
(1, 'Krupal Jadhav', 'kjkrupal@gmail.com', 'd0d4b4be7733d2709ff9b1894013d2d7'),
(2, 'Deepesh', 'dg@gmail.com', 'aa6d49d134cbee8e0e7b0b9c5e00e53c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beit2`
--
ALTER TABLE `beit2`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`emailid`);

--
-- Indexes for table `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `temp_data`
--
ALTER TABLE `temp_data`
  ADD PRIMARY KEY (`temp_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beit2`
--
ALTER TABLE `beit2`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `teacher_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
