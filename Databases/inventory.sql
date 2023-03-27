-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 08:38 AM
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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `barcode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `allocation` int(11) NOT NULL DEFAULT 0,
  `sa_percentage` decimal(10,0) GENERATED ALWAYS AS (`stock` / `allocation` * 100) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`barcode`, `description`, `category`, `stock`, `allocation`) VALUES
('11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', 'GENERIC', 500, 1000),
('1212', 'Thermometer', 'MEDICAL DEVICE', 500, 1000),
('1544587', 'Efficascent ni nef', 'NON-PHARMA', 500, 0),
('22222', 'Salbutamol 2Mg Tab 100S (Ventomax)', 'GENERIC', 500, 1000),
('411254', 'Baygon', 'HOUSE BRANDS', 500, 0),
('4236325', 'Cosmo Cee', 'HEALTHY FIX', 500, 0),
('45454', 'Amlodipine 10Mg Tab 100s (Lodipex)', 'GENERIC', 500, 1000),
('4684122', 'Pink Phallic ni nefe', 'SPECIAL ORDER', 500, 1000),
('88888', 'Salicyclic Acid 50ml-12', 'BRANDED', 500, 800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`barcode`),
  ADD UNIQUE KEY `barcode` (`barcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
