-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 12:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

CREATE TABLE `tasklist` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `TaskCode` varchar(10) NOT NULL,
  `TaskName` varchar(200) NOT NULL,
  `TaskDetail` varchar(200) NOT NULL,
  `TaskNote` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`id`, `UserId`, `TaskCode`, `TaskName`, `TaskDetail`, `TaskNote`, `Status`, `CreatedOn`) VALUES
(1, 1, 'S001', 'test1', 'testing', '', 0, '2017-07-18 07:45:58'),
(2, 1, 'S002', 'test2', 'test', 'hello', 0, '2017-07-18 07:36:42'),
(4, 2, 'S003', 'hello', 'hello..how r u', '', 0, '2017-07-17 16:39:35'),
(5, 2, 'S005', 'test', 'hi', 'done', 0, '2017-07-18 10:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `PassWord` varchar(50) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Name`, `UserName`, `PassWord`, `CreatedOn`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-07-18 10:44:37'),
(2, 'pooja', 'pooja', '9cbb6aebcf5ae14a9248b4c08165212e', '2017-07-18 10:43:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
