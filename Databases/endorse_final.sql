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
-- Table structure for table `endorse_final`
--

CREATE TABLE `endorse_final` (
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
-- Dumping data for table `endorse_final`
--

INSERT INTO `endorse_final` (`id`, `barcode`, `description`, `quantity`, `lot`, `branch`, `mrf`, `order_num`, `exp_date`, `remarks`, `endorsed_by`, `endorsed_date`) VALUES
(74, '22222', 'Salbutamol 2Mg Tab 100S (Ventomax)', 2, '2H121', '21-004/Leo Mel Dennis B. Icalla', '8745', '10351', '02-2025', 'AI', 'admin accout to', '2023-03-17'),
(76, '4444444444', 'Milcu Deo Powder 80g-12', 1, 'PO27012311', '21-004/Leo Mel Dennis B. Icalla', '4561', '23422', '01-2026', '', 'qwerty is my name', '2023-03-17'),
(81, '77777', 'Sebo De Macho 10g', 20, '2515541', '21-004/Leo Mel Dennis B. Icalla', '8745', '2222', '02-2023', '', 'admin accout to', '2023-03-17'),
(113, '11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', 5, '454SDA', '21-004/Leo Mel Dennis B. Icalla', '4563', '4563', '02-2023', '', 'admin accout to', '2023-03-23'),
(114, '88888', 'Salicyclic Acid 50ml-12', 4, '015ASAA', '21-004/Leo Mel Dennis B. Icalla', '4563', '4563', '02-2023', 'AI', 'admin accout to', '2023-03-23'),
(115, '77777', 'Sebo De Macho 10g-24', 12, '154SDA', '21-004/Leo Mel Dennis B. Icalla', '4563', '4563', '02-2023', '', 'admin accout to', '2023-03-23'),
(116, '44444', 'Betadine 2Mg Tab 100S (Ventomax)', 3, 'SDAA1144', '21-004/Leo Mel Dennis B. Icalla', '4563', '4563', '04-2023', '', 'admin accout to', '2023-03-23'),
(117, '33333', 'Losartan Potassium 100mg tab 100s', 4, 'ASD4545', '21-004/Leo Mel Dennis B. Icalla', '4563', '4563', '04-2023', '', 'admin accout to', '2023-03-23'),
(124, '55555', 'Mefenamic Acid ', 7, 'SADAS4', '21-004/Leo Mel Dennis B. Icalla', 'IS', 'IS', '02-2023', '', 'admin accout to', '03-23-2023'),
(125, '55555', 'Mefenamic Acid ', 45, '1871SS', '21-002/Rodelle Joy G. Lucion', '123', '123', '02-2023', '', 'admin accout to', '03-23-2023'),
(128, '11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', 89, '855SS', '21-004/Leo Mel Dennis B. Icalla', '4563', '4563', '02-2023', '', 'admin accout to', '03-23-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endorse_final`
--
ALTER TABLE `endorse_final`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endorse_final`
--
ALTER TABLE `endorse_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
