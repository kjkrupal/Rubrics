-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 04:23 AM
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
-- Table structure for table `2_grade`
--

CREATE TABLE `2_grade` (
  `tablegrade_id` int(11) NOT NULL,
  `coursename` varchar(100) DEFAULT NULL,
  `coid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2_grade`
--

INSERT INTO `2_grade` (`tablegrade_id`, `coursename`, `coid`) VALUES
(1, 'SE_grade', 12),
(2, 'SE_grade', 12);

-- --------------------------------------------------------

--
-- Table structure for table `assignment2level2`
--

CREATE TABLE `assignment2level2` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment2level2`
--

INSERT INTO `assignment2level2` (`level_id`, `name`, `minGrade`, `maxGrade`) VALUES
(1, 'excellent', 8, 10),
(2, 'Good', 7, 5),
(3, 'Poor', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `assignment2parameter2`
--

CREATE TABLE `assignment2parameter2` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment2parameter2`
--

INSERT INTO `assignment2parameter2` (`param_id`, `name`) VALUES
(1, 'Aim'),
(2, 'Theory'),
(3, 'Result');

-- --------------------------------------------------------

--
-- Table structure for table `be_it2`
--

CREATE TABLE `be_it2` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `be_it2`
--

INSERT INTO `be_it2` (`student_id`, `name`, `email`, `phone`) VALUES
(1, 'Vishal', 'vishal@gmail.com', '123456789'),
(2, 'Manish', 'manish@gmail.com', '123456789'),
(3, 'Deepesh', 'deepesh@gmail.com', '123456789'),
(4, 'Krupal', 'krupal@gmail.com', '123456789'),
(5, 'Kaustub', 'kaustubh@gmail.com', '123456789'),
(6, 'Sushant', 'sushant@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` int(11) NOT NULL,
  `classname` varchar(10) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `classname`, `tid`) VALUES
(8, 'TE_IT', 2),
(6, 'BE_IT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `coid` int(11) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `coursetable` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`coid`, `coursename`, `cid`, `tid`, `coursetable`) VALUES
(12, 'SE', 8, 2, 'SE2'),
(11, 'SNMR', 6, 2, 'SNMR2');

-- --------------------------------------------------------

--
-- Table structure for table `practicallevel2`
--

CREATE TABLE `practicallevel2` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicallevel2`
--

INSERT INTO `practicallevel2` (`level_id`, `name`, `minGrade`, `maxGrade`) VALUES
(1, 'excellent', 8, 10),
(2, 'Good', 7, 5),
(3, 'Bad', 2, 4),
(4, 'Poor', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `practicalparameter2`
--

CREATE TABLE `practicalparameter2` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicalparameter2`
--

INSERT INTO `practicalparameter2` (`param_id`, `name`) VALUES
(1, 'Aim'),
(2, 'Theory'),
(3, 'Procedure'),
(4, 'Result');

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
(27, 'assignment2', 2),
(26, 'practical', 2);

-- --------------------------------------------------------

--
-- Table structure for table `se2`
--

CREATE TABLE `se2` (
  `assignment_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `Deadline` varchar(100) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se2`
--

INSERT INTO `se2` (`assignment_id`, `name`, `Deadline`, `grade`) VALUES
(1, 'practical 1', '2017-03-12', 10);

-- --------------------------------------------------------

--
-- Table structure for table `se_grade`
--

CREATE TABLE `se_grade` (
  `coursegrade_id` int(11) NOT NULL,
  `assignment_name` varchar(100) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `snmr2`
--

CREATE TABLE `snmr2` (
  `assignment_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `Deadline` varchar(100) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snmr2`
--

INSERT INTO `snmr2` (`assignment_id`, `name`, `Deadline`, `grade`) VALUES
(1, 'CBS', '2017-03-15', 10);

-- --------------------------------------------------------

--
-- Table structure for table `startgrading`
--

CREATE TABLE `startgrading` (
  `grading_id` int(100) NOT NULL,
  `tid_grade` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `startgrading`
--

INSERT INTO `startgrading` (`grading_id`, `tid_grade`) VALUES
(40, '2_grade'),
(39, '2_grade'),
(38, '2_grade');

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
-- Table structure for table `te_it2`
--

CREATE TABLE `te_it2` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `te_it2`
--

INSERT INTO `te_it2` (`student_id`, `name`, `email`, `phone`) VALUES
(1, 'leo', 'leo@gmail.com', '123456789'),
(2, 'kunal', 'kunal@gmail.com', '123456789'),
(3, 'Deven', 'deven@gmail.com', '123456789');

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
(2, 'Deepesh', 'dg@gmail.com', 'aa6d49d134cbee8e0e7b0b9c5e00e53c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2_grade`
--
ALTER TABLE `2_grade`
  ADD PRIMARY KEY (`tablegrade_id`);

--
-- Indexes for table `assignment2level2`
--
ALTER TABLE `assignment2level2`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `assignment2parameter2`
--
ALTER TABLE `assignment2parameter2`
  ADD PRIMARY KEY (`param_id`);

--
-- Indexes for table `be_it2`
--
ALTER TABLE `be_it2`
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
-- Indexes for table `practicallevel2`
--
ALTER TABLE `practicallevel2`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `practicalparameter2`
--
ALTER TABLE `practicalparameter2`
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
-- Indexes for table `se2`
--
ALTER TABLE `se2`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `se_grade`
--
ALTER TABLE `se_grade`
  ADD PRIMARY KEY (`coursegrade_id`);

--
-- Indexes for table `snmr2`
--
ALTER TABLE `snmr2`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `startgrading`
--
ALTER TABLE `startgrading`
  ADD PRIMARY KEY (`grading_id`);

--
-- Indexes for table `temp_data`
--
ALTER TABLE `temp_data`
  ADD PRIMARY KEY (`temp_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `te_it2`
--
ALTER TABLE `te_it2`
  ADD PRIMARY KEY (`student_id`),
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
-- AUTO_INCREMENT for table `2_grade`
--
ALTER TABLE `2_grade`
  MODIFY `tablegrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assignment2level2`
--
ALTER TABLE `assignment2level2`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assignment2parameter2`
--
ALTER TABLE `assignment2parameter2`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `be_it2`
--
ALTER TABLE `be_it2`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `practicallevel2`
--
ALTER TABLE `practicallevel2`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `practicalparameter2`
--
ALTER TABLE `practicalparameter2`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `se2`
--
ALTER TABLE `se2`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `se_grade`
--
ALTER TABLE `se_grade`
  MODIFY `coursegrade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `snmr2`
--
ALTER TABLE `snmr2`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `startgrading`
--
ALTER TABLE `startgrading`
  MODIFY `grading_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `te_it2`
--
ALTER TABLE `te_it2`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `teacher_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
