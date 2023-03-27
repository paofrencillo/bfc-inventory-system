-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 10:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfc_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `endorse_history`
--

CREATE TABLE `endorse_history` (
  `id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `lot` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `mrf` varchar(255) NOT NULL,
  `order_num` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `endorsed_by` varchar(255) NOT NULL,
  `endorsed_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `endorse_history`
--

INSERT INTO `endorse_history` (`id`, `barcode`, `description`, `quantity`, `lot`, `branch`, `mrf`, `order_num`, `exp_date`, `remarks`, `endorsed_by`, `endorsed_date`) VALUES
(10, '11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', 11, 'L0123', '21-007/Evelyn B. Ilocto', '5563', '1403', '03-25-13', '', 'admin accout to', '03-23-2023'),
(11, '22222', 'Salbutamol 2Mg Tab 100S (Ventomax)', 74, 'L0987', '21-007/Evelyn B. Ilocto', '5563', '1403', '0325456', '', 'admin accout to', '03-23-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endorse_history`
--
ALTER TABLE `endorse_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endorse_history`
--
ALTER TABLE `endorse_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;