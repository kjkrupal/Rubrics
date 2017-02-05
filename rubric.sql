-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2017 at 03:12 AM
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
(1, 'Sushant ', 'su@gmail.com', '123456'),
(2, 'Deepesh', 'dg@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` int(10) NOT NULL,
  `classname` varchar(10) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `classname`, `tid`) VALUES
(11, 'seit', 2),
(10, 'beit', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `coid` int(11) NOT NULL,
  `coursename` text NOT NULL,
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`coid`, `coursename`, `cid`, `tid`) VALUES
(1, 'Big Data', 10, 2),
(2, 'SNMR', 10, 2),
(3, 'CN', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dbitlevel`
--

CREATE TABLE `dbitlevel` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dbitparameter`
--

CREATE TABLE `dbitparameter` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level2`
--

CREATE TABLE `level2` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mathslevel`
--

CREATE TABLE `mathslevel` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mathsparameter`
--

CREATE TABLE `mathsparameter` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parameter2`
--

CREATE TABLE `parameter2` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
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

--
-- Dumping data for table `rubrics`
--

INSERT INTO `rubrics` (`rid`, `rubricname`, `tid`) VALUES
(1, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `seit2`
--

CREATE TABLE `seit2` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seit2`
--

INSERT INTO `seit2` (`student_id`, `name`, `email`, `phone`) VALUES
(1, 'Sushant ', 'su@gmail.com', '123456'),
(2, 'Deepesh', 'dg@gmail.com', '123456');

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
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `dbitlevel`
--
ALTER TABLE `dbitlevel`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `dbitparameter`
--
ALTER TABLE `dbitparameter`
  ADD PRIMARY KEY (`param_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `level2`
--
ALTER TABLE `level2`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `mathslevel`
--
ALTER TABLE `mathslevel`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `mathsparameter`
--
ALTER TABLE `mathsparameter`
  ADD PRIMARY KEY (`param_id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`param_id`);

--
-- Indexes for table `parameter2`
--
ALTER TABLE `parameter2`
  ADD PRIMARY KEY (`param_id`);

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
-- Indexes for table `seit2`
--
ALTER TABLE `seit2`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbitlevel`
--
ALTER TABLE `dbitlevel`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbitparameter`
--
ALTER TABLE `dbitparameter`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level2`
--
ALTER TABLE `level2`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mathslevel`
--
ALTER TABLE `mathslevel`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mathsparameter`
--
ALTER TABLE `mathsparameter`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parameter2`
--
ALTER TABLE `parameter2`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seit2`
--
ALTER TABLE `seit2`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `teacher_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
