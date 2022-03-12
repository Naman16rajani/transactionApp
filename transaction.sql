-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql310.epizy.com
-- Generation Time: Mar 12, 2022 at 04:05 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31202597_transaction`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `ItemName` text NOT NULL,
  `credit` float NOT NULL DEFAULT 0,
  `debit` float NOT NULL DEFAULT 0,
  `total` float NOT NULL DEFAULT 0,
  `lastDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `UserName`, `ItemName`, `credit`, `debit`, `total`, `lastDate`) VALUES
(18, '36919cb4d4f288601896d6b08b5f6d13', 'Jiooo', 45, 0, 45, '2022-03-03 11:12:32'),
(19, '8aa1ef9afbb2e0799af4c96103a078e1', 'Jiooo', 0, 0, 0, '2022-03-03 15:40:14'),
(20, '8aa1ef9afbb2e0799af4c96103a078e1', 'Lol', 90, 0, 90, '2022-03-03 11:12:20'),
(21, '36919cb4d4f288601896d6b08b5f6d13', 'Pop', 0, 0, 0, '2022-03-03 15:42:08'),
(26, '8d81c56c0c2da9e19b79a1c7abd441ca', 'January', 20, 0, 20, '2022-03-03 21:39:16'),
(46, 'b2da5be3d48055ffbd157e5b53df0473', 'Jio', 0, 0, 0, '2022-03-04 05:09:48'),
(47, 'b2da5be3d48055ffbd157e5b53df0473', 'Ji', 0, 0, 0, '2022-03-04 05:14:01'),
(48, 'b2da5be3d48055ffbd157e5b53df0473', 'Njin', 0, 0, 0, '2022-03-04 05:14:58'),
(63, 'b90eff4e05391e9f7a3859be51de40c1', 'Ankit', 220, 0, 220, '2022-03-12 04:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `UserData`
--

CREATE TABLE `UserData` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `UserData`
--

INSERT INTO `UserData` (`id`, `username`, `password`) VALUES
(12, 'b90eff4e05391e9f7a3859be51de40c1', '202cb962ac59075b964b07152d234b70'),
(15, '257749c32c9e8bb4444b823e9e5f480f', '202cb962ac59075b964b07152d234b70'),
(16, '3c8ad85af15773ad413b5149ff1c7731', '202cb962ac59075b964b07152d234b70'),
(17, '8d81c56c0c2da9e19b79a1c7abd441ca', '25d55ad283aa400af464c76d713c07ad'),
(18, 'b2da5be3d48055ffbd157e5b53df0473', '202cb962ac59075b964b07152d234b70'),
(19, '19258d2e267bcb9331aa8e4690ec432d', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserData`
--
ALTER TABLE `UserData`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `UserData`
--
ALTER TABLE `UserData`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
