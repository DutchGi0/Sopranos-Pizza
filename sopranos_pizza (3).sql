-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 09:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sopranos_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `acties`
--

CREATE TABLE `acties` (
  `ID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acties`
--

INSERT INTO `acties` (`ID`, `name`, `description`, `datetime`) VALUES
(6, '1+1 gratis', 'Alle medium pizza\'s <strong>1 +1 gratis</strong>. <br> Geledig t/m 20-04-2022', '2022-03-16 13:37:58'),
(7, 'Test', 'Test', '2022-03-16 13:38:14'),
(8, 'test 1', 'Hoi', '2022-03-16 13:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `message` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `img` blob NOT NULL,
  `size` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `name`, `email`, `comment`, `datetime`) VALUES
(10, 'Anoniem', 'test2@test.nl', 'Mooie website', '2022-03-16 09:22:06'),
(11, 'Giovanni Vreeling', 'giovannixrsx@gmail.com', 'Hoi', '2022-03-16 12:33:47'),
(12, 'Anoniem', 'test@test.nl', 'Hoi klas', '2022-03-17 09:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `straat` varchar(60) NOT NULL,
  `stad` varchar(60) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `telefoon` int(12) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `straat`, `stad`, `postcode`, `telefoon`, `created`) VALUES
(4, 'Giovanni Vreeling', 'giovannixrsx@gmail.com', '$2y$10$h6EwWPue2kVAArxcSfgHsehhrPhDxwdgYveh41j3okdSvQPMRsb5i', 'Voorofscheweg 36', 'Boskoop', '2771MD', 682773943, '2022-02-19 20:51:36'),
(11, 'Test Test', 'test@test.nl', '$2y$10$ZpdOF1A6zWp8aPoUpLUYN./p4cdRvEcyD9FKP1dwZJXLViEXQoNRS', 'Een Straat', 'Een Stad', '2771MD', 682773941, '2022-02-21 09:02:01'),
(12, 'test test', 'test2@test.nl', '$2y$10$cC4LX6IyrURrL7E2VZyXkugKXU9A/cLRaR.9jqtYlIA3jvAacRk.2', 'test', 'test', '1234 AA', 612345678, '2022-03-07 19:52:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acties`
--
ALTER TABLE `acties`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acties`
--
ALTER TABLE `acties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
