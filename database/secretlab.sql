-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 02:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secretlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `secretdata`
--

CREATE TABLE `secretdata` (
  `id` int(11) NOT NULL,
  `value1` varchar(255) NOT NULL,
  `value2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `secretdata`
--

INSERT INTO `secretdata` (`id`, `value1`, `value2`) VALUES
(1, 'testval1', 'testval2');

-- --------------------------------------------------------

--
-- Table structure for table `secrettable`
--

CREATE TABLE `secrettable` (
  `id` int(11) NOT NULL,
  `objectkey` varchar(255) NOT NULL,
  `time_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `secrettable`
--

INSERT INTO `secrettable` (`id`, `objectkey`, `time_created`) VALUES
(1, 'testkey', '2020-06-01 14:27:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `secretdata`
--
ALTER TABLE `secretdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secrettable`
--
ALTER TABLE `secrettable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `secretdata`
--
ALTER TABLE `secretdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `secrettable`
--
ALTER TABLE `secrettable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
