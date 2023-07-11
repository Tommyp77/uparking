-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2023 at 01:45 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uparking`
--

-- --------------------------------------------------------

--
-- Table structure for table `parkinglot`
--

DROP TABLE IF EXISTS `parkinglot`;
CREATE TABLE IF NOT EXISTS `parkinglot` (
  `LotID` int NOT NULL AUTO_INCREMENT,
  `StreetAddress` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL,
  `Capacity` int DEFAULT NULL,
  PRIMARY KEY (`LotID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parkinglot`
--

INSERT INTO `parkinglot` (`LotID`, `StreetAddress`, `City`, `State`, `ZipCode`, `Capacity`) VALUES
(1, '123 Main St', 'Los Angeles', 'CA', '90001', 100),
(2, '456 Elm St', 'New York', 'NY', '10001', 80),
(3, '789 Oak St', 'Chicago', 'IL', '60601', 120),
(4, '321 Pine St', 'San Francisco', 'CA', '94101', 150),
(5, '654 Maple St', 'Houston', 'TX', '77001', 90),
(6, '987 Cedar St', 'Miami', 'FL', '33101', 110),
(7, '159 Walnut St', 'Seattle', 'WA', '98101', 70),
(8, '753 Birch St', 'Denver', 'CO', '80201', 80),
(9, '852 Willow St', 'Boston', 'MA', '02101', 100),
(10, '369 Cherry St', 'Phoenix', 'AZ', '85001', 120),
(11, '258 Cypress St', 'Atlanta', 'GA', '30301', 90),
(12, '147 Spruce St', 'Dallas', 'TX', '75201', 100),
(13, '369 Oak St', 'San Diego', 'CA', '92101', 110),
(14, '852 Elm St', 'Philadelphia', 'PA', '19101', 80),
(15, '753 Maple St', 'Las Vegas', 'NV', '89101', 90),
(16, '951 Pine St', 'Austin', 'TX', '78701', 120),
(17, '741 Cedar St', 'Orlando', 'FL', '32801', 100),
(18, '852 Walnut St', 'Nashville', 'TN', '37201', 80),
(19, '753 Cherry St', 'Portland', 'OR', '97201', 90),
(20, '963 Willow St', 'Charlotte', 'NC', '28201', 110);

-- --------------------------------------------------------

--
-- Table structure for table `parkingspace`
--

DROP TABLE IF EXISTS `parkingspace`;
CREATE TABLE IF NOT EXISTS `parkingspace` (
  `SpaceID` int NOT NULL AUTO_INCREMENT,
  `ParkingSpaceType` int DEFAULT NULL,
  `LotID` int DEFAULT NULL,
  PRIMARY KEY (`SpaceID`),
  KEY `LotID` (`LotID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parkingspace`
--

INSERT INTO `parkingspace` (`SpaceID`, `ParkingSpaceType`, `LotID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2),
(5, 2, 2),
(6, 3, 2),
(7, 1, 3),
(8, 2, 3),
(9, 3, 3),
(10, 1, 4),
(11, 2, 4),
(12, 3, 4),
(13, 1, 5),
(14, 2, 5),
(15, 3, 5),
(16, 1, 6),
(17, 2, 6),
(18, 3, 6),
(19, 1, 7),
(20, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentID` int NOT NULL AUTO_INCREMENT,
  `CardNo` varchar(16) DEFAULT NULL,
  `AmountPaid` decimal(10,2) DEFAULT NULL,
  `PermitID` int DEFAULT NULL,
  `UID` int DEFAULT NULL,
  `ViolationID` int DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `PermitID` (`PermitID`),
  KEY `UID` (`UID`),
  KEY `ViolationID` (`ViolationID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `CardNo`, `AmountPaid`, `PermitID`, `UID`, `ViolationID`) VALUES
(1, '1234567812345678', '50.00', 1, 1, 1),
(2, '2345678923456789', '30.00', 2, 2, 2),
(3, '3456789034567890', '60.00', 3, 3, 3),
(4, '4567890145678901', '75.00', 4, 4, 4),
(5, '5678901256789012', '25.00', 5, 5, 5),
(6, '6789012367890123', '200.00', 6, 6, 6),
(7, '7890123478901234', '40.00', 7, 7, 7),
(8, '8901234589012345', '90.00', 8, 8, 8),
(9, '9012345690123456', '100.00', 9, 9, 9),
(10, '0123456701234567', '35.00', 10, 10, 10),
(11, '1234567812345678', '45.00', 11, 11, 11),
(12, '2345678923456789', '80.00', 12, 12, 12),
(13, '3456789034567890', '55.00', 13, 13, 13),
(14, '4567890145678901', '70.00', 14, 14, 14),
(15, '5678901256789012', '30.00', 15, 15, 15),
(16, '6789012367890123', '65.00', 16, 16, 16),
(17, '7890123478901234', '40.00', 17, 17, 17),
(18, '8901234589012345', '50.00', 18, 18, 18),
(19, '9012345690123456', '75.00', 19, 19, 19),
(20, '0123456701234567', '150.00', 20, 20, 20),
(21, '312321132', '50.00', NULL, 26, 22),
(22, '21312312', '321312.00', NULL, 26, 22),
(23, '3232', '3232.00', NULL, 26, 23),
(24, '321312', '50.00', 36, 26, NULL),
(25, '31232123', '32.00', 37, 26, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

DROP TABLE IF EXISTS `permit`;
CREATE TABLE IF NOT EXISTS `permit` (
  `PermitID` int NOT NULL AUTO_INCREMENT,
  `PurchaseDate` date DEFAULT NULL,
  `ExpirationDate` date DEFAULT NULL,
  `PermitType` int DEFAULT NULL,
  `VehicleID` int DEFAULT NULL,
  `LotID` int DEFAULT NULL,
  PRIMARY KEY (`PermitID`),
  KEY `VehicleID` (`VehicleID`),
  KEY `LotID` (`LotID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`PermitID`, `PurchaseDate`, `ExpirationDate`, `PermitType`, `VehicleID`, `LotID`) VALUES
(1, '2021-01-01', '2022-01-01', 1, 1, 1),
(2, '2021-02-04', '2022-02-04', 2, 2, 2),
(3, '2021-03-21', '2022-03-21', 3, 3, 3),
(4, '2021-04-07', '2022-04-07', 1, 4, 4),
(5, '2021-05-09', '2022-05-09', 2, 5, 5),
(22, '2023-07-05', '2023-07-07', 1, NULL, 3),
(7, '2021-07-15', '2022-07-15', 1, 7, 7),
(21, '2023-07-13', '2023-07-20', 1, NULL, 6),
(10, '2021-10-25', '2022-10-25', 1, 10, 11),
(11, '2021-11-28', '2022-11-28', 2, 11, 11),
(12, '2021-12-31', '2022-12-31', 3, 12, 12),
(13, '2022-01-12', '2023-01-12', 1, 13, 13),
(14, '2022-02-15', '2023-02-15', 2, 14, 14),
(15, '2022-03-20', '2023-03-20', 3, 15, 15),
(16, '2022-04-22', '2023-04-22', 1, 16, 16),
(17, '2022-05-24', '2023-05-24', 2, 17, 17),
(18, '2022-06-29', '2023-06-29', 3, 18, 18),
(19, '2022-07-30', '2023-07-30', 1, 19, 19),
(20, '2022-08-31', '2023-08-31', 2, 20, 20),
(23, '2023-07-21', '2023-07-07', 3, NULL, 6),
(24, '2023-06-26', '2023-07-04', 3, 0, 6),
(25, '2023-07-06', '2023-07-07', 3, 0, 6),
(26, '2023-07-05', '2023-07-13', 3, 0, 23),
(27, '2023-07-05', '2023-06-28', 3, 0, 6),
(28, '2023-06-28', '2023-07-07', 2, 0, 2),
(29, '2023-06-28', '2023-07-07', 2, 32, 2),
(30, '2023-07-12', '2023-07-07', 2, 6, 6),
(31, '2023-07-21', '2023-07-05', 2, 4, 122),
(35, '2023-07-05', '0000-00-00', 50, 26, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL,
  `Role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `FirstName`, `LastName`, `MiddleName`, `Email`, `Username`, `Password`, `Role`) VALUES
(32, 'testing', 'fdsfsdf', 'fsdfasd', 'fsd@c.cox', 'fsdfsd', '$2y$10$d5Z.FU5jwTo0pgHMjFjJg.0IOlQiaWotYR6QorUuS0.hh6I3AMiKO', 'Staff'),
(6, 'Olivia', 'Miller', 'F', 'oliviamiller@email.com', 'oliviamiller', 'password6', 'user'),
(8, 'Samantha', 'Taylor', 'H', 'samanthataylor@email.com', 'samanthataylor', 'password8', 'user'),
(9, 'Daniel', 'Anderson', 'I', 'danielanderson@email.com', 'danielanderson', 'password9', 'user'),
(10, 'Ava', 'Thomas', 'J', 'avathomas@email.com', 'avathomas', 'password10', 'user'),
(11, 'David', 'Jackson', 'K', 'davidjackson@email.com', 'davidjackson', 'password11', 'user'),
(12, 'Sophia', 'White', 'L', 'sophiawhite@email.com', 'sophiawhite', 'password12', 'user'),
(13, 'Joseph', 'Harris', 'M', 'josephharris@email.com', 'josephharris', 'password13', 'user'),
(14, 'Isabella', 'Martin', 'N', 'isabellamartin@email.com', 'isabellamartin', 'password14', 'user'),
(15, 'Andrew', 'Thompson', 'O', 'andrewthompson@email.com', 'andrewthompson', 'password15', 'user'),
(16, 'Mia', 'Garcia', 'P', 'miagarcia@email.com', 'miagarcia', 'password16', 'user'),
(17, 'Benjamin', 'Martinez', 'Q', 'benjaminmartinez@email.com', 'benjaminmartinez', 'password17', 'user'),
(18, 'Charlotte', 'Robinson', 'R', 'charlotterobinson@email.com', 'charlotterobinson', 'password18', 'user'),
(19, 'Samuel', 'Clark', 'S', 'samuelclark@email.com', 'samuelclark', 'password19', 'user'),
(29, 'fd', 'fsd', 'fds', 'f@c.x', 't', '$2y$10$gFtp6Cv8sFkn8ekvwBnhHOhFYwdwbbtCBFgvBMFBs6Ulrva1PvzSi', 'User'),
(21, 'Luke', 'LaVigne', 'Benjamin', 'lukelavigne9@gmail.com', 'llavi', '$2y$10$MNGcXotqr6Ad0q8PNoY0ROyMji4YSC4DWI5Yo5jSSQNYqDmkyd12u', 'user'),
(23, 'Seong Wook', 'Hong', '', 'u123456@utah.edu', 'swook', '$2y$10$XhJTmz5Vm0ezYsHag9vxaODwdQ7h3ksSrpm8kYrpt/7ucSAqDqqRe', 'staff'),
(24, 'dsadas', 'das', 'dasdas', 'dsadsa@email.com', 'dsasd', '$2y$10$XxLAgbDLOZ8laRMq3/3pMu76r5FdY.m/Kb2Hdapgx7Jp4hjePmL4C', 'User'),
(25, 'dsadas', 'dsadsa', 'dsadas', 'dsadas@cco.x', 'sads', '$2y$10$pMzyNUXlQLprdijD5zO25.MVIS6bXnHxJsorPBVg3vnRY/5iAODhK', 'Staff'),
(26, 'fdf', 'fsd', 'fds', 'f@c.xx', 't', '$2y$10$2Hz1jTaQrAaC/JF.8GEbL.G0ByF42dQlZqpXaIovXkgOEOea7gpTi', 'User'),
(27, 'sdffsd', 'fasdfsd', 'fas', 's@c.x', 'a', '$2y$10$UvhQZvDslla4N8cWgeODxeX6THq5CyWLt8aMpt4ekmitLsMnaTPsa', 'Staff'),
(28, 'sdf', 'fsd', 'fsd', 'f@c.c', 'fd', '$2y$10$yy.CTSYkqZu/McqsnsMaHOZ/u5/8ugRNw4V9iW/pyzcC42SXQtYqW', 'User'),
(30, 'John', 'Doe', 'A', 'johndoe@email.com', 'johndoe', '$2y$10$LZpKIhjQYTlFbsgLe78k5uvzbUPLfskEd6Ts4/Aul12i..zmxXV5m', 'User'),
(31, 'JohnB', 'Doe', 'A', 'johndoe@email.com', 'johndoe', '$2y$10$Htu9tkOmKKlDm6omQKt88urJ89y.dZYkvUm/uUGZ7ibowUX3SlLDC', 'User'),
(34, 'tesrting2', 'dfsdfsd', 'fsdf', 'fds@c.c', 'fdsfsd', '$2y$10$W/zNS1O7XgmSXxrHnZ6.2eya1.2qSb6cOiHN3PIWhGQ7plNc8f10K', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `VehicleID` int NOT NULL AUTO_INCREMENT,
  `LicensePlate` varchar(20) DEFAULT NULL,
  `Make` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Year` year DEFAULT NULL,
  `UID` int DEFAULT NULL,
  `PermitID` int DEFAULT NULL,
  PRIMARY KEY (`VehicleID`),
  KEY `UID` (`UID`),
  KEY `PermitID` (`PermitID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleID`, `LicensePlate`, `Make`, `Model`, `Color`, `Year`, `UID`, `PermitID`) VALUES
(1, 'ABC123', 'Toyotapo', 'Camry', 'Silver', 2018, 1, 1),
(2, 'DEF456', 'Honda', 'Accord', 'Red', 2019, 2, 2),
(3, 'GHI789', 'Ford', 'Mustang', 'Blue', 2020, 3, 3),
(4, 'JKL012', 'Chevrolet', 'Cruze', 'Black', 2017, 4, 4),
(5, 'MNO345', 'Nissan', 'Altima', 'White', 2016, 5, 5),
(6, 'PQR678', 'BMW', 'X5', 'Gray', 2021, 6, 6),
(7, 'STU901', 'Audi', 'A4', 'Silver', 2019, 7, 7),
(8, 'VWX234', 'Hyundai', 'Sonata', 'Red', 2020, 8, 8),
(9, 'YZA567', 'Toyota', 'Corolla', 'Blue', 2015, 9, 9),
(10, 'BCD890', 'Honda', 'Civic', 'White', 2017, 10, 10),
(11, 'EFG123', 'Ford', 'Escape', 'Black', 2018, 11, 11),
(12, 'HIJ456', 'Chevrolet', 'Malibu', 'Gray', 2021, 12, 12),
(13, 'KLM789', 'Nissan', 'Sentra', 'Silver', 2019, 13, 13),
(14, 'NOP012', 'BMW', '3 Series', 'Red', 2020, 14, 14),
(15, 'QRS345', 'Audi', 'Q5', 'Black', 2017, 15, 15),
(16, 'TUV678', 'Hyundai', 'Elantra', 'White', 2016, 16, 16),
(17, 'WXY901', 'Toyota', 'RAV4', 'Blue', 2021, 17, 17),
(18, 'ZAB234', 'Honda', 'Pilot', 'Gray', 2018, 18, 18),
(19, 'CDE567', 'Ford', 'F-150', 'Silver', 2019, 19, 19),
(20, 'FGH890', 'Chevrolet', 'Silverado', 'Black', 2020, 20, 20),
(21, 'fdsfsd', 'fdsf', 'fdsaf', 'fdsfsd', 0000, 0, NULL),
(22, 'fdsfsd', 'fdsf', 'fdsaf', 'fdsfsd', 0000, 0, NULL),
(26, '12312123', 'fdsfsd', 'fdsfsd', '321321fdsfsd', 0000, 26, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

DROP TABLE IF EXISTS `violation`;
CREATE TABLE IF NOT EXISTS `violation` (
  `ViolationID` int NOT NULL AUTO_INCREMENT,
  `DateIssued` date DEFAULT NULL,
  `ViolationType` varchar(255) DEFAULT NULL,
  `Fee` decimal(10,2) DEFAULT NULL,
  `VehicleID` int DEFAULT NULL,
  PRIMARY KEY (`ViolationID`),
  KEY `VehicleID` (`VehicleID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`ViolationID`, `DateIssued`, `ViolationType`, `Fee`, `VehicleID`) VALUES
(1, '2021-01-01', 'Speeding', '50.00', 1),
(2, '2021-02-04', 'Illegal Parking', '30.00', 2),
(3, '2021-03-21', 'Failure to Stop', '60.00', 3),
(4, '2021-04-07', 'Red Light Violation', '75.00', 4),
(5, '2021-05-09', 'Seat Belt Violation', '25.00', 5),
(6, '2021-06-12', 'DUI', '200.00', 6),
(7, '2021-07-15', 'Expired License', '40.00', 7),
(8, '2021-08-19', 'Wrong Way Driving', '90.00', 8),
(9, '2021-09-22', 'Reckless Driving', '100.00', 9),
(10, '2021-10-25', 'Improper Lane Change', '35.00', 10),
(11, '2021-11-28', 'Texting While Driving', '45.00', 11),
(12, '2021-12-31', 'Driving without Insurance', '80.00', 12),
(13, '2022-01-12', 'Running a Stop Sign', '55.00', 13),
(14, '2022-02-15', 'Unregistered Vehicle', '70.00', 14),
(15, '2022-03-20', 'Noise Violation', '30.00', 15),
(16, '2022-04-22', 'Failure to Yield', '65.00', 16),
(17, '2022-05-24', 'Following Too Closely', '40.00', 17),
(18, '2022-06-29', 'Expired Registration', '50.00', 18),
(19, '2022-07-30', 'Driving without a License', '75.00', 19),
(20, '2022-08-31', 'Hit and Run', '150.00', 20),
(21, '2023-07-12', 'fds', '32.00', 2),
(24, '2023-07-05', 'gfgf', '65.00', 26);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
