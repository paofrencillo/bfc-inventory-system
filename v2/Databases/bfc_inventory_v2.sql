-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 12:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `last_edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`code`, `name`, `company`, `address`, `last_edited_by`) VALUES
('21-001', 'ValueMed (Company Owned)', 'Company Owned', '#153 Francisco Tagaytay City', 2),
('21-002', 'Rodelle Joy G. Lucion', '4R PHARMACY', 'B3 Lot 1, Unit 4 Merc Commercial Space Rental , Verdant Acres Subd Pamplona Tres Las PInas City', 2),
('21-003', 'Pierre Kevin Gascon', 'CKLG PHARMACY', '#28 Brgy Pinaglabanan Lingunan Valenzuela', 2),
('21-004', 'Leo Mel Dennis B. Icalla', '', 'C/o Health H2O water Refilling Station 220 Rizal St. Brgy Sinasajan Penaranda Nueva Ecija', 2),
('21-005', 'Creighton Mae B. Cavida', 'C.R.V PHARMACY', '39 Quezon Avenue Lucban Quezon', 2),
('21-006', 'Alyssa Andra Dolor Ting', 'AT PHARMACY', 'Unit E Essel Park Commercial Complex Essel Park Subd Telebastagan San Fernando Pampanga', 2),
('21-007', 'Evelyn B. Ilocto', 'EVVA PHARMACY', 'U101B Ril Bldg cecilio J Santos Drive Malinta Valenzuela', 2),
('21-008', 'Danielle Alivar', 'MERDANI PHARMACY', '228 S. De Guzman St Parada Valenzuela', 2),
('21-009', 'Joanna Marie Sumampong', 'HEMS PHARMACY', 'Lot 9 B1 Greenhills Arcade Center Marcos Alvarez Ave Talon 5 Las Pinas', 2),
('21-010', 'Christian Abellaneda', 'C.S.A DRUGSTORE', 'Apartment Unit 1C #848 Block 30 Lot 15 Kabisig East Bank Road  (floodway) Brgy San Andres Cainta Rizal', 2),
('21-011', 'Kena Keziah Asejo', 'BERNIEPHARMA PHARMACY', '108 M. Leonor St  San Pablo City Laguna', 2),
('21-012', 'Jimmy Alberto', 'PROACTIVE PHARMACY', '17 A Panorama St SSS Village Concepcion Dos Marikina City', 2),
('21-013', 'John Richard Perez', 'EZ SOUTH DRUG DISTRIBUTION SERVICES', 'Malvar St Cor Manabat St San Antonio Binan Laguna', 2),
('21-014', 'Djay Omila', 'OMILA MED PHARMACY', 'Maharlika Highway, Brgy. San Policarpo, Calbayog City, Western Samar', 2),
('21-015', 'Jonus Yu', 'TIM PHARMACY', 'Lot 3 B 6 San Lorenzo Ruiz Bldg Gloria Diaz St BF Resort Village Talon II Las Pinas', 2),
('21-016', 'Khristopher Paul Pasag', 'PASAG PHARMACY', 'B32 L6 Purok 7 Brgy. Sta. Cruz IV, District 2, San Jose Del Monte City, Bulacan', 2),
('21-017', 'STP Pili', 'PTL DRUGSTORE', 'Cuison Bldg., Cor Gatuslao-San Sebastian, Barangay 15, Bacolod City', 2),
('21-018', 'Mark Joseph Rivera', 'COSMIAN PHARMACY', 'Unit 5 & 6 Ligaya Bldg. Barangay Sabang, Dasmariñas City, Cavite', 2),
('21-019', 'Ashley Ong', 'VFC PHARMA AND MEDICAL SUPPLIES TRADING', 'UNIT 9 #1229 MAHARLIKA HI WAY BRGY ISABANG LUCENA CITY', 2),
('21-020', 'Bernadette Barlao', 'LM GENERIX PHARMACY', 'Purok 1 JP Rizal Blvd., Tagapo, Sta. Rosa, Laguna', 2),
('21-021', 'Apolonio Castillo', 'CASTILLO PHARMACY', 'Lipa, Batangas', 2),
('21-022', 'Escalicas, Mary Jhune', 'MGV DRUGSTORE', 'B2 L6 Shelterville, Bagumbong, Caloocan City', 2),
('21-023', 'Alberto, Norina ', 'MASINAG PHARMACY', 'Masinag, Antipolo City', 2),
('21-024', 'Jamyra Magat Mercado', 'CCMV VALUEMED PHARMACY', 'Eltanal bldg., Pedro Permites Rd., Brgy. San Miguel, Iligan City, Lanao Del Norte', 2),
('21-025', 'Gian Villanueva', 'MRSV PHARMACY', 'Alabang, Muntinlupa', 2),
('21-026', 'Kem Paulo Torres', 'CAREFIRST DRUGSTORE', 'Blk 111 Lot 9 Phase 2, Mabuhay, Brgy. Mamatid, Cabuyao, Laguna', 2),
('21-027', 'Feesca Menken', 'EXIMIA VENTURUS INC.', '101 L&R Bldg., Daang-Hari, Verdana Vill. Center, Molino IV, Bacoor City, Cavite', 2),
('21-028', 'Ivy Suzanne Manulat', 'MANULAT PHARMACY', 'Goyena Bldg., T. Cabiles St., San Juan, Tabaco City, Albay', 2),
('21-029', 'John Amor Paguio', 'JMJ MEDZONE DRUGSTORE', 'Morong Bataan', 2),
('21-030', 'Allan Ajero', 'AMMED MEDICAL SUPPLIES', 'Blk 11 Lot 13 Camella Grenville Subdivision, Tuktukan, Taguig City, Metro Manila', 2),
('21-031', 'Jhenina Dionisio', 'POSEIDON MEGA TRADING INC,', 'Lot1-E Aguinaldo st. Clark Freeport zone, Mabalacat City, Pampanga', 2),
('21-032', 'Josh Monreal', 'JCM PHARM DRUGSTORE', 'Purok 1 Brgy. Manaol, Nagcarlan, Laguna', 2),
('21-033', 'Janet Salvanera', 'MEDERI PHARMACY', 'Damilag, Manolo Fortich, Bukidnon', 2),
('21-034', 'Richard Chua', 'LRL PHARMACY', 'Caloocan', 2),
('21-035', 'Arman Babiera', 'APB DRUGSTORE', '434 A. Sandoval Ave, Pinagbuhatan, Pasig City', 2),
('21-036', 'Melodie Angeles', 'ANGELS PHARMACY', '9003 Gov. Drive, Sitio Gugo, Malainen Bago Naic, Cavite', 2),
('21-037', 'Tracy Torres', 'QUALIMED PHARMACY', 'San Fernando, Pampanga', 2),
('21-038', 'Leizel David', 'CUREXPRESS DRUGSTORE', 'Pandan, Angeles,Pampanga', 2),
('21-039', 'Ryan Haw', 'SOPHIX DRUGSTORE', 'Pasay City', 2),
('21-040', 'Marlito Feliciano', 'M.S.F PHARMACY', 'BURGOS ST., BRGY. POB. SUR, PANIQUI, TARLAC', 2),
('21-041', 'Diane Wesley Garza', 'G-PHRM DRUGSTORE', 'NAGA CAMARINES SUR', 2),
('21-042', 'Ralph Christopher Mangon', 'SRCM DRUGSTORE', 'CABANATUAN CITY', 2),
('21-043', 'Rodel Cudiamat', 'RODEL GC PHARMACY', 'GAPAN NUEVA ECIJA', 2),
('21-044', 'John Cedrick Mendoza', 'TIMELINE VALUEMED', 'SAMPALOC MANILA', 2),
('21-045', 'Faye Kimberly Pelayo', 'PELAYO PHARMACY', 'DAVAO DEL SUR', 2),
('21-046', 'Ricky Javier', 'ERINKATE PHARMACY', 'SAN ANTONIO ZAMBALES', 2),
('21-047', 'Lisa Relles', 'SR5LH PHARMACY', 'SAN JUAN', 2),
('21-048', 'Brandon Deposoy', '3A PHARMACY', 'NEGROS ORIENTAL', 2),
('21-049', 'Frederick Capili', 'F&C CAPILI PHARMACY', 'Lipa Batangas', 2),
('21-050', 'Nikki Normel Satsatin', 'QUALICARE PHARMACY', 'Imus, Cavite', 2),
('21-051', 'Josie Mae Acopio', 'ARJ PHARMACY', 'Cagayan De Oro', 2),
('21-052', 'Madel Asis', 'KABOTIKA CONSUMER GOODS TRADING', '#019 UNIT A2 TANCHE BLDG. F. DULALIA ST., BRGY. LINGUNAN, VALENZUELA', 2),
('21-053', 'Renz Nollase', 'RENZ MARIE DAILY DRUGSTORE', 'Naga Camarines Sur', 2),
('21-054', 'Jennifer Parahile', 'D&J PHARMACEUTICAL PRODUCTS DISTRIBUTION', 'Iligan City', 2),
('21-055', 'Glyn De Guzman Crisostomo', 'DRUGSTORE TRI3G', 'BLK6 LOT28 MARCOS ALVARES EXT., SAN NICOLAS III, BACOOR CITY, CAVITE', 2),
('21-057', 'Myla Castillo', 'NVMC Drugstore', 'B17 L17 #9, Acacia st, Brgy. Calendola, San Pedro Laguna', 2),
('21-058', 'Reygin Tan', 'HEALTHBEST PHARMACEUTICAL VENTURES CORP.', 'Tayuman Cor. Severino Reyes St. Sta Cruz, 036, Brgy.353 Manila', 2),
('21-059', 'Hanna Grace Amarga', 'HEALING GRACE PHARMACY', 'G/FLR GONZALO GO BLDG. MAX SUNIEL St. CARMEN KAGAYAN DE ORO', 2),
('21-060', 'Berly Balita', 'QUADB MEDICAL & DIAGNOSTIC CLINIC', '746 Santiago St. Penafrancia Avenue, Naga City', 2),
('21-061', 'Titus Levi P. Barona II', 'RX MED PHARMACY', 'Unit 2 Roxasville Subdivision, Brgy Pasong Tamo, Quezon City, Metro Manila', 2),
('21-062', 'Mike B. Mingoy', 'C & M PHARMACY', '326 GOV. PASCUAL AVE. COR. HERNANDEZ ST. CATMON, MALABON CITY', 2),
('21-064', 'Chris P. Villanueva', '1010PENA PHARMACY', 'TERMINAL BLDG. 2 JUSTINA PINEDA PROPERTY, F.IMPERIAL ST., LEGAZPI CITY', 2),
('21-065', 'Grace Pantaleon Sy', 'SYZYGY PHARMACY', 'Divimart National Road Cutcot, Pulilan Bulacan', 2),
('21-066', 'John Joseph Barreno', 'JOHN & JONNA PHARMACY', 'Brgy. Lalaguna, Lopez, Quezon', 2),
('21-067', 'Celeste Jao Dimaquibo', 'G.M.D PHARMACY', 'Purok 4 Tarlac Road, Taugtog Botolan, Zambales', 2),
('21-068', 'Fernando Tayag', 'RF Pampanga Modern Solutions Venture Inc.', 'Sto. Cristo, Guagua, Pampanga', 2),
('21-069', 'Diana Rica Martal', 'RxSunday Pharmacy', '#83 Usis BLDG. Sabang', 2),
('21-070', 'Evelyn M. Delgado', 'SAVEMART PHARMACY', 'Blk 15 Lot 34 Llano Road, Sunriser Village, Brgy. 167, District 1, Caloocan City', 2),
('21-071', 'Matt Kelvin Doratan', 'LUCKY CROWN HEALTH CORP.', 'Zeta Tower, Bridgetowne, C-5 Road, Ugong Norte Quezon City', 2),
('21-072', 'William Sy', 'WILLABELLA COMPANY', '14D Wack Wack Heights, Lee St., Mandaluyong City', 2),
('21-073', 'Krizelle Ann Ildefonso', 'UNODOS PHARMACY', '240/D M. Concepcion Avenue, San Joaquin, Pasig City', 2),
('21-074', 'Maria Sacha Nepomuceno', 'JNS PHARMACY', 'Palico Balayan Batangas Rd. San Antonio San Pascual Batangas', 2),
('21-075', 'Kristoffer De Guia', 'SEVENSTAR ENTERPRISES', 'Reis Real Estate Lessor, San Jose st. Dunao, Ligao City, Albay', 2),
('21-076', 'Jeannie Uy & Kathleen Nicole Uy', 'Brightmoon Pharmacy', 'Unit 6 Guillermo Bldg Arellano St. Koronodal City South Cotabato', 2),
('21-077', 'Marlon Feliciano', 'MCF PHARMACY', '#146 Purok 1 Brgy Labuin Pila Laguna', 2),
('21-078', 'Jamyra Magat Mercado', 'CCMV VALUEMED PHARMACY', 'Purok Apitong, Brgy. Maranding, Lala Lanao Del Norte', 2),
('21-079', 'Ruby Chanchico', 'WIKIMED PHARMACY', 'Unit A1 Amadeo Royale Town Center, Crisanto Delos Reyes Avenue Brgy. Poblacion 6, Amadeo, Cavite', 2),
('21-080', 'Arlene Draeger', '', '397 San Juan Avenue, Brgy. North Centro, Sipocot, Camarines Sur', 2),
('21-081', 'Almira Amihan Galit', 'VINMED PHARMACY', '055 General Luna St. Brgy Liwayway Odiongan Romblon', 2),
('21-082', 'Jennifer Tan', 'J TAN PHARMACY', 'Lot1 A&B Capitol Village, Brgy Granada, Bacolod City Negros Occidental', 2),
('21-083', 'Ma. Corazon Wong', '', 'Blk 1 Lot 1 Ma. Paz St. Sanvesco 7, Las Piñas City', 2),
('21-084', 'Juvelyn Garcia', 'QUESTAR DRUG CORPORATION', '9003 Maria Cecilia Bldg. Gen. Malvar St. San Vicente Binan, Laguna', 2),
('21-085', 'Nelinda Catherine Pangilinan', 'PEREZ-PANGILINAN SPECIALTY CLINICS INC.', '215B National Rd. Urbiztondo, San Juan, La Union', 2),
('21-086', 'Aaron Simasanti', 'MEDSHOPPE DRUGSTORE', '19 San Vicente St., Brgy. Damayan, San Francisco Del Monte Quezon City', 2),
('21-087', 'Neil Patrick Maguikay', 'MAGUIKAY PHARMACY', '84 M.H. Del Pilar St., Palatiw, Pasig City, Metro Manila', 2),
('21-088', 'Angelica Jane Domalanta', 'DOMALANTA VALUEMED DRUGSTORE', '1st Floor, DBD Building, Burgos St. Cor Gomez St. Dagupan City, Pangasinan', 2),
('21-089', 'Jessa Espinosa', '', 'Km 37 Pulong Buhangin, Santa Maria, Bulacan', 2),
('21-090', 'Marlene Chua Cruz', 'PHARMAV PHARMACY', '#29 Mindanao Street, Brgy. Talipapa, Quezon City', 2),
('21-091', 'Ellen Lydia Bañez', 'EB PHARMACY', '3 JP Rizal St. Tuazon Subdivision, Pamplona Uno Las Piñas City, 1750 Metro Manila', 2),
('21-092', 'Nelson Bitong', 'NELBITS PHARMACY', '014 Papaya Road Mabini Extension, Cabanatuan City, Nueva Ecija', 2),
('21-093', 'John Mark Villena', '', 'One East Building Unit 1E-1, 001 General Ordonez Avenue Marikina Heights, Marikina City', 2),
('21-094', 'Aldous Ambal & Ryan Her Solis', '', 'Plaridel Street, Poblacion 38, 4336 Infanta, Quezon', 2),
('21-095', 'Remedios Picayo', 'FIT TO SERVE PHARMACY', 'Block 65 Lot 4 Confederation Drive, Cityhomes Subdivision, Sampaloc IV, Dasmariñas City', 2),
('21-096', 'Ericson Anglo', 'VALUEMED GENTRI PHARMACY', 'ALFAMART- LOT 7 BROOKESIDE LANE, BRGY SAN FRANSICO GENERAL TRIAS, CAVITE', 2),
('21-097', 'Angelyn Amador', 'Andriel Pharmacy', 'Block 4 Lot 21A-20B Susana Exe Village Mangan-Vaca, Subic, Zambales', 2),
('21-098', 'Rafael Lorenzo Noel', 'RAFAEL LORENZO NOEL PHARMACY', 'B42 L7 Sta. Escolastica Street Sav 1, San Antonio, Paranaque City, Metro Manila', 2),
('21-099', 'Krizelle Ramos De Leon', '', 'Plaza Building 2 Rizal Extension Brgy. Sto. Rosario, Angeles City, Pampanga', 2),
('21-100', 'Katrina Yuko Pabila Loristo', '', 'B1 Lot 14 Phase 2 Filinvest West Ave., Paradahan 1, Tanza, Cavite', 2),
('21-101', 'Noralie Agustin', '', 'Blk 9 Lot 3 Nottingham Villas Highway 2000 II Sta. Ana, Taytay, Rizal', 2),
('21-102', 'Joyce Rogado', '', 'KM 39 Aguinaldo High way Biga 2, Silang Cavite', 2),
('21-103', 'Sarah Castillo', '3s MedExpress Pharmacy and Gen. Merchandise Co.', 'SGVC Bldg. Brgy Purok 3 Brgy Conchu Trece Martires Cavite', 2),
('21-104', 'Leonalyn C. Merin', 'Lemerin Pharmacy', 'Purok 5, Bulanao, Tabuk City, Kalinga Province', 2),
('21-105', 'Lahaina Crucillo', '', '055 Trece-Indang Road, Brgy. Luciano, Trece Martires City, Cavite 4109', 2),
('21-106', 'Ma. Carolina Viernes', '', 'Unit 1-1 6 Anonas Street Project 3, Quezon City', 2),
('21-107', 'Emerita Tampipig', '', '18 Kessing Street, Olongapo, Zambales', 2),
('21-108', 'Francisco Ferdinand Lagman', '', 'Flores Commercial Building, Duhat Street, Barangay Market View, Lucena City', 2);

-- --------------------------------------------------------

--
-- Table structure for table `endorse`
--

CREATE TABLE `endorse` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `barcode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` decimal(10,0) GENERATED ALWAYS AS (`rack_in` + `rack_out`) VIRTUAL,
  `allocation` int(11) NOT NULL DEFAULT 0,
  `sa_percentage` decimal(10,0) GENERATED ALWAYS AS (`stock` / `allocation` * 100) VIRTUAL,
  `rack` varchar(255) NOT NULL,
  `rack_in` int(11) NOT NULL DEFAULT 0,
  `rack_out` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_in`
--

CREATE TABLE `product_in` (
  `id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prf` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `rack` varchar(255) NOT NULL,
  `lot_no` varchar(255) NOT NULL,
  `entry_date` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `in_quantity` int(11) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `last_edited_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_in_final`
--

CREATE TABLE `product_in_final` (
  `id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prf` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `rack` varchar(255) NOT NULL,
  `lot_no` varchar(255) NOT NULL,
  `entry_date` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `in_quantity` int(11) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `last_edited_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_masterlist`
--

CREATE TABLE `product_masterlist` (
  `barcode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `last_edited_by` int(11) NOT NULL,
  `last_edited_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sku_code` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `last_edited_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sku_code`, `supplier_name`, `last_edited_by`, `last_edited_on`) VALUES
('VG88001', 'HOUSEBRANDS', 'Admin Account', '2023-03-29 08:46:06'),
('VG88002', 'MEED PHARMA', 'Admin Account', '2023-03-29 08:46:37'),
('VG88003', 'DYNA PASIG', 'Admin Account', '2023-03-29 08:46:44'),
('VG88004', 'DYNA BINONDO', 'Admin Account', '2023-03-29 08:46:49'),
('VG88006', 'BIOCARE LIFESCIENCES', 'Admin Account', '2023-03-29 08:46:55'),
('VG88007', 'ABBOTT LABORATORIES', 'Admin Account', '2023-03-29 08:47:01'),
('VG88009', 'SPECIAL ORDER', 'Admin Account', '2023-03-29 08:47:07'),
('VG88010', 'REGIMED', 'Admin Account', '2023-03-29 08:47:14'),
('VG88011', 'APL', 'Admin Account', '2023-03-29 08:47:20'),
('VG88012', 'HEALTHYFIX', 'Admin Account', '2023-03-29 08:47:25'),
('VG88015', 'PASCUAL', 'Admin Account', '2023-03-29 08:47:35'),
('VG88016', 'TRIANON', 'Admin Account', '2023-03-29 08:47:42'),
('VG88017', 'IPI', 'Admin Account', '2023-03-29 08:47:49'),
('VG88018', 'JR&R', 'Admin Account', '2023-03-29 08:47:55'),
('VG88019', 'OCSI', 'Admin Account', '2023-03-29 08:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `is_superuser` varchar(10) NOT NULL,
  `is_logged_in` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `employee_name`, `user`, `pass`, `is_superuser`, `is_logged_in`) VALUES
(2, 'Admin Account', 'admin', '$2y$10$zTe.yL5AXz.wxlf65FgP/eQQhow87ExWquDHyU2gZR.RpRE3Evisi', '1', 1),
(12, 'name is qwe', 'qwe', '$2y$10$4JVZu0Y2XILqNQofCmuXaet7Z2N82VHtUf7ITtMx7FWtN2GSrkVdq', '0', 0),
(13, 'nedz', 'nedz321', '$2y$10$vPRg7yBkIO1OvIbzXwMzaetWs.knOo9MbQHbPY9GBZsqTw0YIzQn.', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `endorse`
--
ALTER TABLE `endorse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endorse_final`
--
ALTER TABLE `endorse_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endorse_history`
--
ALTER TABLE `endorse_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`barcode`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- Indexes for table `product_in`
--
ALTER TABLE `product_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_in_final`
--
ALTER TABLE `product_in_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_masterlist`
--
ALTER TABLE `product_masterlist`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sku_code`),
  ADD UNIQUE KEY `supplier_id` (`sku_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endorse`
--
ALTER TABLE `endorse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endorse_final`
--
ALTER TABLE `endorse_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endorse_history`
--
ALTER TABLE `endorse_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_in`
--
ALTER TABLE `product_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_in_final`
--
ALTER TABLE `product_in_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
