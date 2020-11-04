-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 07:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(5) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Password`) VALUES
('KA', 'lol');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `Artist_ID` varchar(5) NOT NULL,
  `F_Name` varchar(20) DEFAULT NULL,
  `L_Name` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `PhNo` bigint(10) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `ImageName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`Artist_ID`, `F_Name`, `L_Name`, `DOB`, `PhNo`, `Email`, `ImageName`) VALUES
('A1', 'Hoa', 'Hong', '2000-02-29', 9876543210, 'hoah@gmail.com', 'a1_1.jpg'),
('A2', 'Akiko', 'Hiromoto', '1995-07-18', 2147483647, 'akikoh@gmail.com', 'a2_2.jpg'),
('A3', 'Mishri', 'Parekh', '1999-06-27', 7873409032, 'mparekh@yahoo.com', 'a3_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `Art_ID` varchar(5) NOT NULL,
  `Artist_ID` varchar(5) DEFAULT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Year` int(4) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `ImageName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`Art_ID`, `Artist_ID`, `Title`, `Year`, `Description`, `ImageName`) VALUES
('Art1', 'A1', 'FKA Twigs', 2020, 'English singer-songwriter and dancer', 'a1_4.jpeg'),
('Art2', 'A1', 'Rihanna', 2019, 'Inspired by Fenty x Vogue collaboration', 'a1_3.jpeg'),
('Art3', 'A1', 'Sade Adu', 2018, 'Flower of the Universe', 'a1_2.jpeg'),
('Art4', 'A2', 'Find your way', 2020, 'Zone-2', 'a2_1.jpg'),
('Art5', 'A2', 'Triangular Configurations', 2019, 'Pattern Painting', 'a2_3.jpg'),
('Art6', 'A2', 'Here and There', 2020, 'Abstract Painting', 'a2_5.jpg'),
('Art7', 'A3', 'Reflection', 2020, 'Spring Day', 'a3_1.jpeg'),
('Art8', 'A3', 'Flowers', 2019, 'Pattern Painting', 'a3_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `E_ID` varchar(5) NOT NULL,
  `G_ID` varchar(5) DEFAULT NULL,
  `Artist_ID` varchar(5) DEFAULT NULL,
  `E_Name` varchar(20) DEFAULT NULL,
  `E_StartDate` date DEFAULT NULL,
  `E_EndDate` date DEFAULT NULL,
  `ImageName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`E_ID`, `G_ID`, `Artist_ID`, `E_Name`, `E_StartDate`, `E_EndDate`, `ImageName`) VALUES
('E1', 'G1', 'A1', 'Hip-Hop Artists', '2020-10-31', '2020-11-07', 'a1_e.jpg'),
('E2', 'G2', 'A2', 'Abstract and Us', '2020-11-03', '2020-11-07', 'a2_e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `G_ID` varchar(5) NOT NULL,
  `G_NAME` varchar(30) DEFAULT NULL,
  `G_Location` varchar(50) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Admin_ID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`G_ID`, `G_NAME`, `G_Location`, `Email`, `Admin_ID`) VALUES
('G1', 'Euphoria Chelsea', '531 WEST 24TH STREET, NEW YORK, NY 10011', 'chelsea@euphoriagalleries.com', 'KA'),
('G2', 'Euphoria Bushwick', '25 KNICKERBOCKER AVE, BROOKLYN, NY 11237', 'bushwick@euphoriagalleries.com', 'KA'),
('G3', 'Euphoria Tribeca', '17 WHITE STREET, NEW YORK, NY 10013', 'tribeca@euphoriagalleries.com', 'KA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`Artist_ID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`Art_ID`),
  ADD KEY `Artwork_ibfk_1` (`Artist_ID`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `Exhibition_ibfk_1` (`G_ID`),
  ADD KEY `Exhibition_ibfk_2` (`Artist_ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`G_ID`),
  ADD KEY `Gallery_ibfk_1` (`Admin_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `Artwork_ibfk_1` FOREIGN KEY (`Artist_ID`) REFERENCES `artist` (`Artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD CONSTRAINT `Exhibition_ibfk_1` FOREIGN KEY (`G_ID`) REFERENCES `gallery` (`G_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Exhibition_ibfk_2` FOREIGN KEY (`Artist_ID`) REFERENCES `artist` (`Artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `Gallery_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
