-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 09:50 AM
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

INSERT INTO `account` (`account_id`, `type_id`, `fname`, `lname`, `username`, `password`, `image_path`, `image`) VALUES
(1, 1, 'Chadric', 'Gotis', 'chad123', 'chad123', 'uploads/', 'do_you_feel_like_a_hero__yet__by_ncmares-d9n0jsl.jpg'),
(3, 2, 'Tab1', 'tab1', 'tab', 'tab', 'uploads/', '1173049-developer-wallpaper-hd-2560x1440-for-ios.jpg'),
(5, 3, 'okz', 'ken', 'cccc', '123456', '', ''),
(6, 3, 'Oke', 'n.', '123', '123', '', ''),
(9, 2, 'lala', 'LELE', 'lele', 'lili', 'uploads/', 'Configure alt 1.ico'),
(10, 0, 'claire', 'lapipg', '', '', 'uploads/', '2.jpg'),
(11, 0, 'Lala', 'Lele', '', '', 'uploads/', '7.jpg'),
(12, 0, 'hf', 'gdr', '', '', 'uploads/', '1.jpg'),
(13, 0, 'ew', 'ew', '', '', 'uploads/', '11.jpg');

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
(6, 5, 33, 'Brgy San Jose', 'claire', 'lapipg', 'Female', 21, '6.jpg', 'uploads/'),
(8, 1, 6, 'kjh', 'hf', 'gdr', 'Male', 22, '1.jpg', 'uploads/'),
(9, 5, 77, '44q', 'ew', 'ew', 'Male', 3, '11.jpg', 'uploads/');

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
(1, 'Mr. and Ms. Wup 2020', 'A competition where blah blah blah', 1, '2018-01-28 20:07:33'),
(5, 'Mr and Ms Wesleyan 2018', 'Mr and Ms wesleyan is the highlight of wesleyan anniversary', 1, '2018-01-29 07:06:33'),
(6, 'Miss gay 2018', 'blah blah blah', 1, '2018-01-31 10:04:54');

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
(1, 6, 'Talent', 25),
(2, 6, 'formal attire', 25),
(3, 6, 'sports wear', 25),
(4, 6, 'Question and Answer', 25),
(5, 1, 'Talent', 25),
(8, 6, 'Night Gown', 25),
(14, 1, 'Confidence', 25),
(15, 1, 'Attire', 25),
(16, 1, 'Q and A', 25);

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `judge_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`judge_id`, `competition_id`, `fname`, `lname`, `username`, `password`) VALUES
(23, 1, 'chass', 'cha', 'cha', 'cha'),
(24, 1, 'Foo', 'Bar', 'bar', 'bar');

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
(3, 'Judge');

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
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`judge_id`),
  ADD KEY `competition_id` (`competition_id`);

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `competition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `judge`
--
ALTER TABLE `judge`
  MODIFY `judge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
