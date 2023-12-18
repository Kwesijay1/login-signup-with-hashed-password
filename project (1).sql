-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 11:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs_table`
--

CREATE TABLE `logs_table` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `event_type` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs_table`
--

INSERT INTO `logs_table` (`id`, `timestamp`, `event_type`, `details`) VALUES
(1, '2023-12-13 13:43:19', 'Failed login', '{\"user_id\":10}'),
(2, '2023-12-13 13:48:33', ' invalidUserAttempt', '{\"user_id\":null}'),
(3, '2023-12-13 13:56:04', 'InvalidEmail', '{\"user_id\":null}'),
(4, '2023-12-13 16:32:25', 'SuccessfulLogin', '{\"user_id\":10}'),
(5, '2023-12-13 16:46:03', 'SuccessfulLogin', '{\"user_id\":10}'),
(6, '2023-12-14 01:43:04', 'SuccessfulLogin', '{\"user_id\":10}'),
(7, '2023-12-14 01:51:11', 'SuccessfulLogin', '{\"user_id\":10}'),
(8, '2023-12-15 02:59:14', 'weakPassword', '{\"user_id\":null}'),
(9, '2023-12-15 03:28:52', 'SuccessfulLogin', '{\"user_id\":10}'),
(10, '2023-12-15 03:29:11', 'SuccessfulLogin', '{\"user_id\":10}'),
(11, '2023-12-15 04:36:08', 'SuccessfulLogin', '{\"user_id\":10}'),
(12, '2023-12-15 04:36:08', 'SuccessfulLogin', '{\"user_id\":10}'),
(13, '2023-12-15 16:08:56', 'SuccessfulLogin', '{\"user_id\":10}'),
(14, '2023-12-15 23:14:56', 'SuccessfulLogin', '{\"user_id\":10}'),
(15, '2023-12-16 22:04:02', 'SuccessfulLogin', '{\"user_id\":10}'),
(16, '2023-12-16 22:06:05', 'SuccessfulLogin', '{\"user_id\":10}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_credentials`
--

CREATE TABLE `tb_credentials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_credentials`
--

INSERT INTO `tb_credentials` (`id`, `name`, `username`, `email`, `password`) VALUES
(10, 'kwam', 'kwam909', 'kwam@gmail.com', '$2y$10$y/0uNiigzEm6zHauD5QTbuecWGiNHPqPcy4o4KGehwqTB07d4CXtK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs_table`
--
ALTER TABLE `logs_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_credentials`
--
ALTER TABLE `tb_credentials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs_table`
--
ALTER TABLE `logs_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_credentials`
--
ALTER TABLE `tb_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
