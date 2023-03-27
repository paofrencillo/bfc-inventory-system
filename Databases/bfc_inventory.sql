-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 10:38 AM
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
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `last_edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(150) NOT NULL,
  `is_enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `is_enabled`) VALUES
(1, 'John', 1),
(2, 'Smith', 1),
(3, 'Prisk', 1),
(4, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`id`, `emp_id`, `emp_name`, `email`, `phone`) VALUES
(1, 1, 'John', 'john@example.com', 234534322),
(2, 3, 'Priska', 'priska@example.com', 437777711),
(3, 2, 'Smith', 'smith@example.com', 332454277),
(4, 4, 'gaga', 'g@example.com', 229503990);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `endorse`
--

INSERT INTO `endorse` (`id`, `barcode`, `description`, `quantity`, `lot`, `branch`, `mrf`, `order_num`, `exp_date`, `remarks`, `endorsed_by`, `endorsed_date`) VALUES
(41, '99999', 'Mupirocin 20mg/g', 6, 'KB07', '23422', '3498', '10351', '10-2024', 'AI', 'qwerty is my name', '2023-03-17'),
(45, '99999', 'Mupirocin 20mg/g', 6, 'KB07', '23422', '3498', '10351', '10-2024', 'AI', 'qwerty is my name', '2023-03-17');

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
(76, '4444444444', 'Milcu Deo Powder 80g-12', 1, 'PO27012311', '21-004/Leo Mel Dennis B. Icalla', '4561', '23422', '01-2026', '', 'qwerty is my name', '2023-03-17'),
(146, '11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', 200, 'AS555SS', '21-003/Pierre Kevin Gascon', '2121', '121', '02-2023', '', 'admin accout to', '03-27-2023');

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
(16, '22222', 'Salbutamol 2Mg Tab 100S (Ventomax)', 200, 'SAL15145', '21-005/Creighton Mae B. Cavida', '1346', '1514', '02-2023', '', 'admin accout to', '03-27-2023');

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
('11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', 'GENERIC', 300, 1000),
('1212', 'Thermometer', 'MEDICAL DEVICE', 500, 0),
('1544587', 'Efficascent ni nef', 'NON-PHARMA', 500, 0),
('22222', 'Salbutamol 2Mg Tab 100S (Ventomax)', 'GENERIC', 500, 1000),
('411254', 'Baygon', 'HOUSE BRANDS', 500, 0),
('4236325', 'Cosmo Cee', 'HEALTHY FIX', 500, 0),
('45454', 'Amlodipine 10Mg Tab 100s (Lodipex)', 'GENERIC', 500, 1000),
('4684122', 'Pink Phallic ni nefe', 'SPECIAL ORDER', 500, 1000),
('88888', 'Salicyclic Acid 50ml-12', 'BRANDED', 500, 1000);

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
  `lot_no` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `in_quantity` int(11) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `last_edited_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_in`
--

INSERT INTO `product_in` (`id`, `barcode`, `description`, `prf`, `supplier`, `lot_no`, `entry_date`, `exp_date`, `in_quantity`, `added_by`, `last_edited_by`, `last_edited_on`) VALUES
(1, '11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', '', '', '100', '2023-03-24', '03-2025', 5, '', 'admin accout to', '2023-03-24 00:00:00'),
(2, '22222', 'Salbutamol 2Mg Tab 100S (Ventomax)', '', '', '100', '2023-03-24', '03-2025', 10, '', 'admin accout to', '2023-03-24 00:00:00'),
(3, '33333', 'Losartan Potassium 100mg tab 100s', '', '', '100', '2023-03-24', '03-2025', 15, '', 'admin accout to', '2023-03-24 00:00:00'),
(4, '44444', 'Betadine 2Mg Tab 100S (Ventomax)', '', '', '100', '2023-03-24', '03-2025', 15, '', 'admin accout to', '2023-03-24 00:00:00'),
(5, '55555', 'Mefenamic Acid ', '', '', '100', '2023-03-24', '03-2025', 20, '', 'admin accout to', '2023-03-24 00:00:00'),
(6, '66666', 'salbubu 25mg', '', '', '100', '2023-03-24', '03-2025', 9, '', 'admin accout to', '2023-03-24 00:00:00'),
(7, '77777', 'Sebo De Macho 10g-24', '', '', '100', '2023-03-24', '03-2025', 14, '', 'admin accout to', '2023-03-24 00:00:00'),
(8, '88888', 'Salicyclic Acid 50ml-12', '', '', '100', '2023-03-24', '03-2025', 19, '', 'admin accout to', '2023-03-24 00:00:00'),
(10, '12121', 'Robust Ni Miole', '', '', '100', '2023-03-24', '03-2023', 8, '', 'admin accout to', '2023-03-24 00:00:00'),
(12, '19191', 'Atorvastatin 20mg Tab 50s (H-Ator)', '', '', '100', '2023-03-24', '02-2023', 6, '', 'admin accout to', '2023-03-24 00:00:00'),
(13, '78787', 'Digoxin 250Mcg Tab 100S (Inoxin)', '', '', '100', '2023-03-24', '02-2023', 11, '', 'admin accout to', '2023-03-24 00:00:00'),
(14, '45454', 'Amlodipine 10Mg Tab 100s (Lodipex)', '', '', '100', '2023-03-24', '02-2023', 7, '', 'admin accout to', '2023-03-24 00:00:00'),
(16, '13498', 'Gamot 4', '', '', '100', '2023-03-24', '02-2023', 12, '', 'admin accout to', '2023-03-24 00:00:00'),
(17, '13194', 'Gamot 3', '', '', '100', '2023-03-24', '02-2023', 8, '', 'admin accout to', '2023-03-24 00:00:00'),
(18, '13492', 'Gamot 2', '', '', '100', '2023-03-24', '02-2023', 13, '', 'admin accout to', '2023-03-24 00:00:00'),
(19, '43168', 'Gamot 1', '', '', '100', '2023-03-24', '02-2023', 7, '', 'admin accout to', '2023-03-24 00:00:00'),
(20, '55555', 'Mefenamic Acid ', '', '', '1', '2023-03-24', '02-2023', 1, '', 'admin accout to', '2023-03-24 00:00:00');

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
  `lot_no` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `in_quantity` int(11) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_edited_by` varchar(255) NOT NULL,
  `last_edited_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_masterlist`
--

INSERT INTO `product_masterlist` (`barcode`, `description`, `generic_name`, `category`, `supplier`, `image`, `last_edited_by`, `last_edited_on`) VALUES
('11111', 'Mupirocin 20mg/g (2%w/w) 5g (Kaptroban)', 'test1', 'GENERIC', 'wazzup', 'dist/img/valuemed-logo.png', 2, '2023-03-21 13:47:34'),
('12121', 'Robust Ni Miole', 'Acid', 'BRANDED', 'Supplier Number Four', 'dist/img/valuemed-logo.png', 2, '2023-03-23 16:38:16'),
('13194', 'Gamot 3', 'wawawa', 'BRANDED', 'Supplier Number Two', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:44:40'),
('13492', 'Gamot 2', 'wawa', 'GENERIC', 'Supplier Number Two', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:44:26'),
('13498', 'Gamot 4', 'za', 'BRANDED', 'Supplier Number Two', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:45:05'),
('19191', 'Atorvastatin 20mg Tab 50s (H-Ator)', 'H-Ator', 'BRANDED', 'Supplier Number One', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:36:23'),
('22222', 'Salbutamol 2Mg Tab 100S (Ventomax)', 'test2', 'GENERIC', 'wazzup', 'dist/img/valuemed-logo.png', 2, '2023-03-21 13:48:08'),
('33333', 'Losartan Potassium 100mg tab 100s', 'LostPot', 'GENERIC', 'fsdfsdfsdsfd', 'product-imgs/LOSARTAN POTASSIUM 100mg tab 100s.png', 2, '2023-03-21 13:47:22'),
('43168', 'Gamot 1', 'wa', 'BRANDED', 'Supplier Number Three', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:44:14'),
('44444', 'Betadine 2Mg Tab 100S (Ventomax)', '516', 'GENERIC', '', 'product-imgs/616.png', 2, '2023-03-21 14:56:45'),
('45454', 'Amlodipine 10Mg Tab 100s (Lodipex)', 'Lodipex', 'GENERIC', 'Supplier Number Three', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:32:59'),
('55555', 'Mefenamic Acid ', 'Mefenamic', 'BRANDED', 'Supplier Number Two', 'dist/img/valuemed-logo.png', 2, '2023-03-23 10:53:54'),
('66666', 'salbubu 25mg', 'salbutamol', 'GENERIC', 'Supplier Number Two', 'product-imgs/salbubu 25mg.png', 2, '2023-03-23 15:52:05'),
('77777', 'Sebo De Macho 10g-24', 'gamot', 'HEALTHY FIX', '', 'product-imgs/Gamot 5.png', 2, '2023-03-21 14:56:21'),
('78787', 'Digoxin 250Mcg Tab 100S (Inoxin)', 'Inoxin', 'GENERIC', 'Supplier Number Two', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:35:30'),
('88888', 'Salicyclic Acid 50ml-12', 'ewan ko lang', 'MEDICAL DEVICE', '', 'dist/img/valuemed-logo.png', 2, '2023-03-21 13:47:07'),
('99999', 'Prednisone 20Mg Tab 100S (Prend)', 'Prend', 'GENERIC', 'Supplier Number Two', 'dist/img/valuemed-logo.png', 2, '2023-03-24 11:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `last_edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `last_edited_by`) VALUES
(2, 'Supplier Number Two', 2),
(6, 'Supplier Number Three', 8),
(7, 'Supplier Number Four', 6),
(9, 'Supplier Number One', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `is_superuser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `employee_name`, `user`, `pass`, `is_superuser`) VALUES
(2, 'admin accout to', 'admin', '$2y$10$zTe.yL5AXz.wxlf65FgP/eQQhow87ExWquDHyU2gZR.RpRE3Evisi', '1'),
(6, 'david goliath', 'david', '$2y$10$Ul0J/7aXm0uV0cVdLia.zuydTceXi5fkm5Rjok3mdNmBE22MJPZUS', '0'),
(8, 'qwerty is my name', 'qwerty', '$2y$10$PzA2TiRJgjO20bxljBxkO.mQT8Dt31ctbJxfQtzwwhaUAFZHFu/8O', '0'),
(9, 'sean monacillo', 'sean', '$2y$10$/HYzFdmteAF8jn/FsSO9iuUA4lj4Yclm3gNhJNbC6zvqbcZ12MWj6', '0'),
(10, 'asdfgh is my name', 'asdfgh', '$2y$10$oDPnV89tpHMINMnSLao.8OenWDnj/FClJWj/2117LEhSzLjJI4YTm', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `endorse`
--
ALTER TABLE `endorse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `endorse_final`
--
ALTER TABLE `endorse_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `endorse_history`
--
ALTER TABLE `endorse_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_in`
--
ALTER TABLE `product_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_in_final`
--
ALTER TABLE `product_in_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
