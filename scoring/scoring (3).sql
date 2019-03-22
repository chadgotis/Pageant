-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 07:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `type_id`, `logged_in`, `fname`, `lname`, `username`, `password`, `image_path`, `image`) VALUES
(10, 4, 1, 'Super', 'Admin', 'root', 'root', 'uploads/', 'anonymous-mask-digital-art_094866.jpg'),
(11, 1, 0, 'Lady', 'Supsup', 'lady', '12345', 'uploads/', 'chrome.exe'),
(12, 1, 0, 'Chardie', 'Gotis', '12345', '12345', 'uploads/', '2a4bc3df9bf56e2b43877bbc7df50286.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `candidate_number` int(11) NOT NULL,
  `representing` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `competition_id`, `candidate_number`, `representing`, `fname`, `lname`, `gender`, `age`, `image`, `image_path`) VALUES
(3, 5, 1, 'College of Computer Science', 'Maylanny', 'Balmonte', 'Female', 19, '495272006.jpg', 'uploads/'),
(4, 5, 2, 'College of Education', 'Jissa Belle', 'Uy', 'Female', 18, 'download.jpg', 'uploads/'),
(5, 5, 3, 'College of Criminal Justice Education', 'Jinniper', 'Lopez', 'Female', 17, 'u2Rw_o7I_400x400.jpg', 'uploads/'),
(7, 5, 4, 'College of Business and Accountancy', 'Armie', 'Santos', 'Female', 18, 'images.jpg', 'uploads/'),
(12, 5, 5, 'Senior High School', 'Diana', 'Santillan', 'Female', 16, '223884448-beautiful-girl-pic.jpg', 'uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `competition_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`competition_id`, `name`, `description`, `status`, `date_created`) VALUES
(5, 'Binibing WUP 2018', 'Tagisan ng Ganda', 1, '2018-03-13 10:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `criteria_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `max_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`criteria_id`, `competition_id`, `name`, `max_value`) VALUES
(1, 3, 'Figure of Fes', 50),
(2, 3, 'Performance', 50),
(3, 5, 'Beauty', 26),
(4, 5, 'Talent', 25),
(5, 5, 'Question and Answer', 30),
(6, 5, 'Audience Impact', 10),
(8, 6, 'talent', 25),
(9, 6, 'Q&A', 25),
(10, 6, 'beauty', 20),
(11, 6, 'audience impact', 15),
(12, 6, 'sports wear', 15),
(13, 5, 'Attire', 10);

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `judge_id` int(11) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`judge_id`, `logged_in`, `competition_id`, `fname`, `lname`, `username`, `password`, `availability`) VALUES
(5, 0, 5, 'Roman', 'Dimaculangan', 'qwe', 'qwe', 0),
(6, 0, 5, 'Adoracion', 'Salvacion', 'WUPJUDGE-6141', '2Uv6nv', 0),
(7, 0, 5, 'Dina', 'Dagdag', 'WUPJUDGE-3719', 'fPqVQL', 0),
(8, 0, 6, 'Johnny ', 'Torcil', 'WUPJUDGE-5443', 'A7D1X3', 0),
(9, 0, 6, 'Rigor', 'Rogir', 'WUPJUDGE-7568', 'se4y00', 0),
(10, 0, 6, 'Sheena', 'Natoto', 'WUPJUDGE-2811', 'HIXyiQ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `score` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabulator`
--

CREATE TABLE `tabulator` (
  `tabulator_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabulator`
--

INSERT INTO `tabulator` (`tabulator_id`, `competition_id`, `logged_in`, `username`, `password`, `fname`, `lname`) VALUES
(2, 5, 0, 'qwe', 'qwe', 'chad', 'chad');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`) VALUES
(1, 'Admin'),
(2, 'Tabulator'),
(3, 'Judge'),
(4, 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`),
  ADD KEY `competition_id` (`competition_id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`competition_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`criteria_id`),
  ADD KEY `competition_id` (`competition_id`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`judge_id`),
  ADD KEY `competition_id` (`competition_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `tabulator`
--
ALTER TABLE `tabulator`
  ADD PRIMARY KEY (`tabulator_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `competition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `judge`
--
ALTER TABLE `judge`
  MODIFY `judge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabulator`
--
ALTER TABLE `tabulator`
  MODIFY `tabulator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
