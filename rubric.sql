-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 02:27 AM
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
(1, 'SNMR_grade', 11),
(2, 'SE_grade', 12),
(3, 'SNMR_grade', 11),
(4, 'SE_grade', 12),
(5, 'SNMR_grade', 11),
(6, 'SNMR_grade', 11),
(7, 'SNMR_grade', 11),
(8, 'SNMR_grade', 11),
(9, 'SNMR_grade', 11),
(10, 'SNMR_grade', 11),
(11, 'SNMR_grade', 11),
(12, 'SNMR_grade', 11),
(13, 'SNMR_grade', 11),
(14, 'SNMR_grade', 11),
(15, 'SNMR_grade', 11),
(16, 'SNMR_grade', 11),
(17, 'SNMR_grade', 11),
(18, 'SNMR_grade', 11),
(19, 'SNMR_grade', 11),
(20, 'SNMR_grade', 11),
(21, 'SNMR_grade', 11),
(22, 'SNMR_grade', 11),
(23, 'SNMR_grade', 11),
(24, 'SNMR_grade', 11),
(25, 'SNMR_grade', 11),
(26, 'SNMR_grade', 11),
(27, 'SNMR_grade', 11),
(28, 'SNMR_grade', 11),
(29, 'SNMR_grade', 11),
(30, 'SNMR_grade', 11),
(31, 'SNMR_grade', 11),
(32, 'SNMR_grade', 11),
(33, 'SNMR_grade', 11),
(34, 'SNMR_grade', 11),
(35, 'SNMR_grade', 11),
(36, 'SE_grade', 12),
(37, 'SE_grade', 12),
(38, 'SE_grade', 12),
(39, 'SE_grade', 12),
(40, 'SE_grade', 12);

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
-- Table structure for table `assignmentlevel2`
--

CREATE TABLE `assignmentlevel2` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmentlevel2`
--

INSERT INTO `assignmentlevel2` (`level_id`, `name`, `minGrade`, `maxGrade`) VALUES
(1, 'excellent', 8, 10),
(2, 'Good', 5, 7),
(3, 'Poor', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `assignmentparameter2`
--

CREATE TABLE `assignmentparameter2` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmentparameter2`
--

INSERT INTO `assignmentparameter2` (`param_id`, `name`) VALUES
(1, 'aim'),
(2, 'observation'),
(3, 'result'),
(4, 'procedure');

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
-- Table structure for table `dbitlevel2`
--

CREATE TABLE `dbitlevel2` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `minGrade` int(11) DEFAULT NULL,
  `maxGrade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbitlevel2`
--

INSERT INTO `dbitlevel2` (`level_id`, `name`, `minGrade`, `maxGrade`) VALUES
(1, 'Good', 5, 8),
(2, 'Poor', 8, 8),
(3, 'Very poor', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dbitparameter2`
--

CREATE TABLE `dbitparameter2` (
  `param_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbitparameter2`
--

INSERT INTO `dbitparameter2` (`param_id`, `name`) VALUES
(1, 'observation'),
(2, 'aim'),
(16, '');

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
(26, 'practical', 2),
(28, 'ASSIGNMENT', 2),
(29, 'dbit', 2);

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

--
-- Dumping data for table `se_grade`
--

INSERT INTO `se_grade` (`coursegrade_id`, `assignment_name`, `assignment_id`) VALUES
(1, 'practical 1', 1),
(2, 'practical 1', 1),
(3, 'practical 1', 1),
(4, 'practical 1', 1),
(5, 'practical 1', 1),
(6, 'practical 1', 1),
(7, 'practical 1', 1),
(8, 'practical 1', 1);

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
-- Table structure for table `snmr_grade`
--

CREATE TABLE `snmr_grade` (
  `coursegrade_id` int(11) NOT NULL,
  `assignment_name` varchar(100) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snmr_grade`
--

INSERT INTO `snmr_grade` (`coursegrade_id`, `assignment_name`, `assignment_id`) VALUES
(1, 'CBS', 1),
(2, 'CBS', 1),
(3, 'CBS', 1),
(4, 'CBS', 1),
(5, 'CBS', 1),
(6, 'CBS', 1),
(7, 'CBS', 1),
(8, 'CBS', 1),
(9, 'CBS', 1),
(10, 'CBS', 1),
(11, 'CBS', 1),
(12, 'CBS', 1),
(13, 'CBS', 1),
(14, 'CBS', 1),
(15, 'CBS', 1),
(16, 'CBS', 1),
(17, 'CBS', 1),
(18, 'CBS', 1),
(19, 'CBS', 1),
(20, 'CBS', 1),
(21, 'CBS', 1),
(22, 'CBS', 1),
(23, 'CBS', 1),
(24, 'CBS', 1),
(25, 'CBS', 1),
(26, 'CBS', 1),
(27, 'CBS', 1),
(28, 'CBS', 1),
(29, 'CBS', 1),
(30, 'CBS', 1),
(31, 'CBS', 1),
(32, 'CBS', 1),
(33, 'CBS', 1);

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
(53, '2_grade'),
(52, '2_grade'),
(51, '2_grade'),
(50, '2_grade'),
(49, '2_grade'),
(48, '2_grade'),
(47, '2_grade'),
(46, '2_grade'),
(54, '2_grade'),
(55, '2_grade'),
(56, '2_grade'),
(57, '2_grade'),
(58, '2_grade'),
(59, '2_grade'),
(60, '2_grade'),
(61, '2_grade'),
(62, '2_grade'),
(63, '2_grade'),
(64, '2_grade'),
(65, '2_grade'),
(66, '2_grade'),
(67, '2_grade'),
(68, '2_grade'),
(69, '2_grade'),
(70, '2_grade'),
(71, '2_grade'),
(72, '2_grade'),
(73, '2_grade'),
(74, '2_grade'),
(75, '2_grade'),
(76, '2_grade'),
(77, '2_grade'),
(78, '2_grade'),
(79, '2_grade'),
(80, '2_grade'),
(81, '2_grade'),
(82, '2_grade'),
(83, '2_grade'),
(84, '2_grade'),
(85, '2_grade');

-- --------------------------------------------------------

--
-- Table structure for table `studnetgrade_6111`
--

CREATE TABLE `studnetgrade_6111` (
  `stgrade_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `Aim` int(11) DEFAULT NULL,
  `Theory` int(11) DEFAULT NULL,
  `Result` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studnetgrade_8121`
--

CREATE TABLE `studnetgrade_8121` (
  `stgrade_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `Aim` int(11) DEFAULT NULL,
  `Theory` int(11) DEFAULT NULL,
  `Result` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studnetgrade_8121`
--

INSERT INTO `studnetgrade_8121` (`stgrade_id`, `student_id`, `Aim`, `Theory`, `Result`, `total`) VALUES
(1, 1, 5, 5, 5, 15),
(2, 2, 3, 4, 5, 12),
(3, 3, 2, 6, 1, 9),
(4, 4, 2, 4, 4, 10),
(5, 5, 3, 3, 5, 11);

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
-- Indexes for table `assignmentlevel2`
--
ALTER TABLE `assignmentlevel2`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `assignmentparameter2`
--
ALTER TABLE `assignmentparameter2`
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
-- Indexes for table `dbitlevel2`
--
ALTER TABLE `dbitlevel2`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `dbitparameter2`
--
ALTER TABLE `dbitparameter2`
  ADD PRIMARY KEY (`param_id`);

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
-- Indexes for table `snmr_grade`
--
ALTER TABLE `snmr_grade`
  ADD PRIMARY KEY (`coursegrade_id`);

--
-- Indexes for table `startgrading`
--
ALTER TABLE `startgrading`
  ADD PRIMARY KEY (`grading_id`);

--
-- Indexes for table `studnetgrade_6111`
--
ALTER TABLE `studnetgrade_6111`
  ADD PRIMARY KEY (`stgrade_id`);

--
-- Indexes for table `studnetgrade_8121`
--
ALTER TABLE `studnetgrade_8121`
  ADD PRIMARY KEY (`stgrade_id`);

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
  MODIFY `tablegrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
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
-- AUTO_INCREMENT for table `assignmentlevel2`
--
ALTER TABLE `assignmentlevel2`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assignmentparameter2`
--
ALTER TABLE `assignmentparameter2`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `dbitlevel2`
--
ALTER TABLE `dbitlevel2`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dbitparameter2`
--
ALTER TABLE `dbitparameter2`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `se2`
--
ALTER TABLE `se2`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `se_grade`
--
ALTER TABLE `se_grade`
  MODIFY `coursegrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `snmr2`
--
ALTER TABLE `snmr2`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `snmr_grade`
--
ALTER TABLE `snmr_grade`
  MODIFY `coursegrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `startgrading`
--
ALTER TABLE `startgrading`
  MODIFY `grading_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `studnetgrade_6111`
--
ALTER TABLE `studnetgrade_6111`
  MODIFY `stgrade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studnetgrade_8121`
--
ALTER TABLE `studnetgrade_8121`
  MODIFY `stgrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
