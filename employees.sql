-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 08:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `department` varchar(25) NOT NULL,
  `target` varchar(25) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `department`, `target`) VALUES
(1, 'Sumit', 'HR', '1'),
(2, 'Rani', 'HR', '0'),
(3, 'Raj da', 'Development', '1'),
(4, 'Amit', 'DM', '1'),
(5, 'Sandeep', 'CRM', '0'),
(6, 'Neeraj', 'Support', '0'),
(7, 'John', 'HR', '0'),
(8, 'Alice', 'Development', '1'),
(9, 'Mary', 'DM', '0'),
(10, 'Paul', 'CRM', '1'),
(11, 'James', 'Support', '1'),
(12, 'Ravi', 'HR', '1'),
(13, 'Priya', 'Development', '0'),
(14, 'Anil', 'DM', '1'),
(15, 'Pooja', 'CRM', '0'),
(16, 'Karan', 'Support', '0'),
(17, 'Michael', 'HR', '0'),
(18, 'Sophia', 'Development', '1'),
(19, 'Daniel', 'DM', '0'),
(20, 'Jessica', 'CRM', '1'),
(21, 'George', 'Support', '1'),
(22, 'Vijay', 'HR', '0'),
(23, 'Kavita', 'Development', '0'),
(24, 'Deepak', 'DM', '0'),
(25, 'Shalini', 'CRM', '0'),
(26, 'Sushil', 'Support', '0'),
(27, 'Bharat Sasane', 'HR', '0'),
(28, 'azhar Shaikh', 'Development', '1'),
(29, 'ib', 'DM', '1'),
(60, '', 'Sales', '0'),
(61, 'Aashu', 'HR', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
