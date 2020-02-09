-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2020 at 08:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10953717_voterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` set('Male','Female','Others','') DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`sno`, `name`, `email`, `password`, `dob`, `gender`, `fathername`, `address`, `state`, `pincode`, `photo`, `completed`) VALUES
(7, 'adsf', 'adsfaf@adsfa.com', 'asdf', '1992-03-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'adfagvads', 'abhishekbinay@gmail.com', 'asdf', '1998-03-11', 'Female', 'adfadf', 'ghdfghd', 'Karnataka', 123456, '8.jpg', 1),
(14, 'abcd', 'abcd@abcdl.com', 'asdf', '1986-09-14', 'Female', 'adfafa', 'adfafafdwrr', 'Arunachal Pradesh', 123452, '14.jpg', 1),
(15, 'qwer', 'qwer@qwer.com', 'qwer', '1975-12-15', 'Female', 'qerqtqwreqwr', 'qtgsfg sfg ssdfgs', 'Bihar', 453123, '15.jpg', 1),
(16, 'asdfjkl', 'adsfj@kaldjf.com', '1234', '2001-05-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'abcdefgh', 'asdfhajdf@gklajdsfj.com', 'qwer', '1993-09-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'aklfjasj', 'ajhsdfjah@gjal.com', '1234', '1996-11-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'abcd efgh', 'adsjfak@ourli.com', 'asdf', '1994-09-19', 'Female', 'adfadsf', 'gasdfadsf', 'Himachal Pradesh', 234567, '21.jpg', 1),
(24, 'Test Singh', 'testing@test.com', '1234', '1966-09-14', 'Male', 'Tester Singh', 'Testing, adfa, adfjaljf', 'Himachal Pradesh', 123456, '24.jpg', 1),
(25, 'Sudha', 'testsudha@gmail.com', 'asdf', '1996-08-16', 'Female', 'Papa', 'address', 'Jharkhand', 234251, '25.jpg', 1),
(26, 'adsfa', 'abhishekbinady@gmail.com', 'asdf', '1997-03-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'test', 'test@test.com', 'test', '1984-01-21', 'Male', 'test', 'test', 'Karnataka', 400089, '27.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
