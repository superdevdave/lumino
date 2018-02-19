-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 03:42 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innovent`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sales_rep` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `OrganisationName` varchar(30) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `FileAs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `leads_name` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `sales_rep` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `sales_type` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `leads_source` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `ID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Customer` varchar(30) NOT NULL,
  `User` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `DateTime` date NOT NULL,
  `ActionItems` varchar(100) NOT NULL,
  `Reminder` varchar(3) NOT NULL,
  `DueDate` date NOT NULL,
  `StartDate` int(11) NOT NULL,
  `Outcome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE `opportunity` (
  `id` int(11) NOT NULL,
  `opportunity_name` varchar(100) NOT NULL,
  `sales_rep` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `sales_type` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `rental_amount` varchar(100) NOT NULL,
  `units_sold` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `leads_source` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`id`, `opportunity_name`, `sales_rep`, `customer`, `sales_type`, `product`, `status`, `rental_amount`, `units_sold`, `description`, `email`, `mobile`, `leads_source`) VALUES
(1, 'Test', 'Fatso', 'Fatso', 'Hire Purchase', 'Laptops', 'Closed', '2000', '20', 'Test', 'fmupfuti@innovent.co.za', '0774435779', 'facebook'),
(2, 'Test12', 'Fatso2', 'Fatso', 'Hire Purchase', 'Laptops', 'Closed', '2000', '20', 'Test', 'fmupfuti@innovent.co.za', '0774435779', 'facebook');

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep`
--

CREATE TABLE `sales_rep` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MobilePhone` varchar(30) NOT NULL,
  `Branch` varchar(30) NOT NULL,
  `JobTitle` varchar(30) NOT NULL,
  `UserRole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_rep`
--
ALTER TABLE `sales_rep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity`
--
ALTER TABLE `opportunity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_rep`
--
ALTER TABLE `sales_rep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
