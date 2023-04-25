-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 07:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `lvl` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `username`, `pwd`, `lvl`) VALUES
(0, 'Admin', '$2y$10$jeEoL7TtSyT6ImP0OTUw8uBlM.RtpxJj6AFqKNNyBifzyx5K4H.Le', 'Admin'),
(1, 'HaidharJ', '$2y$10$IUm3z7.WVwBrv3gA6U6rYuH6XkiG/D5z.g2Yjc290yXF4uvzvDmEm', 'User'),
(2, 'AbdulH', '$2y$10$GPOPxc7on6T4jZbgM2cj/Oy.HsfQUSGn3iwOcKYkBDmwGrJ50ezwC', 'User'),
(3, 'Tester', '$2y$10$bXsBDLUjefRXVRLD8bcXk.lSHBzFmkY/felqTHgvDg1C5QEXevI6G', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `team` varchar(20) NOT NULL,
  `dt` date NOT NULL,
  `time_st` time NOT NULL,
  `time_ed` time NOT NULL,
  `gk` int(11) NOT NULL,
  `pvt` int(11) NOT NULL,
  `lw` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `fixo` int(11) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `sub3` int(11) NOT NULL,
  `sub4` int(11) NOT NULL,
  `sub5` int(11) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `team`, `dt`, `time_st`, `time_ed`, `gk`, `pvt`, `lw`, `rw`, `fixo`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `stat`, `comment`) VALUES
(1, '1', '2023-02-09', '20:41:24', '16:41:24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Pending', ''),
(2, '1', '2023-02-15', '22:30:00', '12:30:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Rejected', 'Trying'),
(3, '1', '2023-02-15', '22:30:00', '12:30:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Rejected', 'Try'),
(4, '1', '2023-02-09', '22:33:00', '23:33:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Approved', ''),
(5, '1', '2023-02-16', '13:33:00', '22:39:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Rejected', 'Test'),
(6, '1', '2023-02-15', '10:34:00', '12:34:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Pending', ''),
(7, '2', '2023-02-17', '11:34:00', '22:39:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Rejected', 'Too many people\r\n'),
(8, '3', '2023-02-07', '00:11:00', '14:11:00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Approved', ''),
(190, '2', '2023-04-21', '16:08:00', '16:12:00', 2, 9, 12, 3, 5, 10, 7, 6, 8, 4, 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pos` varchar(20) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `pos`, `team`) VALUES
(0, 'None', '0', 0),
(1, 'Ronaldo', '1', 1),
(2, 'Kuuga', '1', 2),
(3, 'Book', '3', 2),
(4, 'Test', '3', 2),
(5, 'Realme', '4', 2),
(6, 'Ryzer', '1', 2),
(7, 'Galaxy', '4', 2),
(8, 'Mcdodo', '1', 2),
(9, 'Cover', '2', 2),
(10, 'Asus', '2', 2),
(11, 'Samsung', '1', 2),
(12, 'Xiaomi', '3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `roles` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `roles`, `description`) VALUES
(0, 'NULL', 'Universal'),
(1, 'GK', 'Goalkeeper'),
(2, 'PIVOT', 'Pivot'),
(3, 'WING', 'Winger'),
(4, 'FIXO', 'Fixed Defender');

-- --------------------------------------------------------

--
-- Table structure for table `profile_user`
--

CREATE TABLE `profile_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tel` varchar(20) NOT NULL,
  `team` varchar(100) NOT NULL,
  `photo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_user`
--

INSERT INTO `profile_user` (`id`, `username`, `name`, `email`, `no_tel`, `team`, `photo`) VALUES
(0, 'Admin', 'Bulin', 'test@gmail.com', 'Unknown', '0', 'uploads/blank.png'),
(1, 'HaidharJ', 'Haidhar', 'abc@gmail.com', '0139568264', '1', 'uploads/blank.png'),
(2, 'AbdulH', 'Abdul Hakim', 'def@gmail.com', '0167098410', '2', 'uploads/blank.png'),
(3, 'Tester', 'Habib', 'hij@gmai;.com', 'pkqqpq', '3', 'uploads/blank.png');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `team` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `username`, `team`) VALUES
(0, 'Admin', 'Universal\r\n'),
(1, 'HaidharJ', 'Isami Gucci'),
(2, 'AbdulH', 'Kamen Rider'),
(3, 'Tester', 'oikik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile_user`
--
ALTER TABLE `profile_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
