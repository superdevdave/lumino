-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 03:12 AM
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
-- Table structure for table `acctable`
--

CREATE TABLE `acctable` (
  `PnNo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acctable`
--

INSERT INTO `acctable` (`PnNo`) VALUES
('53');

-- --------------------------------------------------------

--
-- Table structure for table `activties`
--

CREATE TABLE `activties` (
  `ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Description` varchar(150) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `ActivityType` varchar(50) NOT NULL,
  `SalesRep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activties`
--

INSERT INTO `activties` (`ID`, `Date`, `Description`, `Username`, `ActivityType`, `SalesRep`) VALUES
(1, '2018-02-27 20:02:44', 'Joy Napata has just edited a new opportunity called Musarara Primary', 'Joy Napata', '', ''),
(2, '2018-02-27 20:05:27', 'Joy Napata has just edited a new opportunity called Muchechetere High School 20 Desktops', 'Joy Napata', '', ''),
(3, '2018-02-27 20:06:35', 'Joy Napata has just created a new opportunity called Telecel Short Term', 'Joy Napata', '', ''),
(4, '2018-03-01 17:26:54', 'Joy Napata has just edited a new opportunity called CheziyaGokwe High', 'Joy Napata', '', ''),
(5, '2018-04-08 15:03:40', 'Joy Napata has just successfully closed an opportunity called ', 'Joy Napata', '', ''),
(6, '2018-04-23 19:55:05', 'Joy Napata has just successfully closed an opportunity called ', 'Joy Napata', '', ''),
(7, '2018-04-24 00:26:19', ' has just successfully closed an opportunity called ', '', '', ''),
(8, '2018-04-24 00:47:42', 'David Mandengenda has just successfully closed an opportunity called ', 'David Mandengenda', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ID` int(10) NOT NULL,
  `BranchName` varchar(60) NOT NULL,
  `BranchAddress` varchar(50) NOT NULL,
  `BranchAddress2` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `BranchBank` varchar(50) NOT NULL,
  `BankAccount` varchar(50) NOT NULL,
  `BranchTelephone` varchar(30) NOT NULL,
  `BranchEmail` varchar(50) NOT NULL,
  `BranchWebsite` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ID`, `BranchName`, `BranchAddress`, `BranchAddress2`, `City`, `BranchBank`, `BankAccount`, `BranchTelephone`, `BranchEmail`, `BranchWebsite`) VALUES
(1, 'Qrent Zimbabwe', '8 George Ave Msasa', 'Harare,Zimbabwe', 'Harare', 'Stanbic Bank Msasa', '9102020939303', '(242) 486030/098/091', 'info@qrent.co.zw', 'www.qrent.co.zw');

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
  `FileAs` varchar(30) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `address2` varchar(60) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(70) NOT NULL,
  `UserName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `website`, `sector`, `address`, `sales_rep`, `Date`, `mobile`, `OrganisationName`, `Title`, `FileAs`, `Telephone`, `address2`, `city`, `province`, `UserName`) VALUES
(1, 'Test Test', 'ijkjajsk@gmail.com', '', '', 'jdskjsjksjk', 'dave', '0000-00-00', '', 'Test', '', '', '', 'Harare', 'Harare', 'Manicaland Province', 'David Mandengenda'),
(6, 'Mr Rupiya', 'jrupiya@nebank.com', '', '', '99 Fortune Drive', 'dave', '0000-00-00', '0930293093209', 'Nedbank', '', '', '03909023902390', 'Milton Park', 'Harare', 'Harare Province', 'David Mandengenda'),
(7, 'Frank Edwards', 'frank@loveworld.co.ng', '', '', '87 Rememberance St', 'dave', '0000-00-00', '93092309209023', 'Rocktown Records', '', '', '030923092039', 'Mbare', '', 'Harare Province', 'David Mandengenda'),
(8, 'Mr Harris', 'tharris@toyota.co.zw', '', '', '99 Ellis Road', 'dave', '0000-00-00', '089303932929', 'Toyota Zimbabwe', '', '', '789323', 'Harare', 'Harare', 'Harare Province', 'David Mandengenda'),
(9, 'David', 'fatso@gmail.com', '', '', '99 Mutare Rd Msasa', 'dave', '0000-00-00', '939832982989898239239', 'Msasa Auctions', '', '', '389238932898393289', 'Msasa', 'Harare', 'Harare Province', 'David Mandengenda'),
(10, 'Jake White', 'jwhite@tandamanzi.co.za', '', '', '99 Enterprice Rd', '', '0000-00-00', '0765022020', 'Tandamanzi Drilling', '', '', '7759930', 'Eastlea', 'Harare', '', ''),
(11, 'Musa', 'hmusa@tongaat.com', '', '', '8 Granges Road ', '', '0000-00-00', '09318019029021', 'Tongaat hullet', '', '', '876345', 'Tongat Estate', 'Chiredzi', '', ''),
(12, 'Nesbert', 'nesbert@bitumenworld.co.zw', '', '', '88 George Drive ', '', '0000-00-00', '9309029023', 'Bitumen WOrld', '', '', '83832309230', 'Msasa', 'Harare', '', ''),
(13, 'Gareth', 'gareth@zc.com', '', '', '77 Josiah Chinamano road', '', '0000-00-00', '290190190', 'Zimbabwe Cricket', '', '', '9483494839438', 'Harare CBD', 'Harare', '', ''),
(14, 'Fana', 'admin@salvationarmy.co.zw', '', '', '99 Avondale road', '', '0000-00-00', '0939230290', 'The Salvation Army THQ', '', '', '8282329', 'Milton Park', 'Harare', '', ''),
(15, 'kjdkjskj', 'dsjhdsjhsj@gmail.com', '', '', 'ksjskj 1929', '', '0000-00-00', '9319139', 'Trichard', '', '', '29329239', 'kjdkjdkj', 'Harare', '', ''),
(16, 'Desmond', 'jshajhsj@gmail.com', '', '', '88 George Ave Msasa', 'David Mandengenda', '0000-00-00', '09109210910290', 'Supafit', '', '', '2823832823', '', 'Harare', '', ''),
(17, 'Jimmy', 'jimmy@gains.co.zw', '', '', '88 Robert Mugabe Way', 'David Mandengenda', '0000-00-00', '09102902910', 'Gain Cash and Carry', '', '', '732823823', 'Harare CBD', 'Harare', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invserialsheader`
--

CREATE TABLE `invserialsheader` (
  `ID` int(11) NOT NULL,
  `Docno` varchar(9) NOT NULL,
  `DDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CashName` varchar(30) NOT NULL,
  `Customer` varchar(30) NOT NULL,
  `Phone` varchar(22) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Address2` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DepositCash` double NOT NULL,
  `DepositPeriod` varchar(3) NOT NULL,
  `subtotal` double NOT NULL,
  `Tax` double NOT NULL,
  `Total` double NOT NULL,
  `CustID` varchar(30) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `RentalTerm` int(11) NOT NULL,
  `RentalDesc` varchar(10) NOT NULL,
  `Discount` double NOT NULL,
  `Description` varchar(100) NOT NULL,
  `sales_rep` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `Terms` varchar(30) NOT NULL,
  `MonthlyRental` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invserialsheader`
--

INSERT INTO `invserialsheader` (`ID`, `Docno`, `DDate`, `CashName`, `Customer`, `Phone`, `Address`, `Address2`, `City`, `Province`, `Email`, `DepositCash`, `DepositPeriod`, `subtotal`, `Tax`, `Total`, `CustID`, `Remarks`, `RentalTerm`, `RentalDesc`, `Discount`, `Description`, `sales_rep`, `telephone`, `username`, `Terms`, `MonthlyRental`) VALUES
(1, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(2, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(3, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(4, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(5, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(6, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(7, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(8, 'PF000000', '0000-00-00 00:00:00', 'Dave', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(9, 'PF000000', '0000-00-00 00:00:00', 'Divadolar', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(10, 'PF000000', '0000-00-00 00:00:00', 'Divadolar', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(11, 'PF000000', '0000-00-00 00:00:00', 'Divadolar', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(12, 'PF000000', '0000-00-00 00:00:00', 'Divadolar', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(13, 'PF000000', '0000-00-00 00:00:00', 'Divadolar', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(14, 'PF000000', '0000-00-00 00:00:00', 'Divadolar', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(15, 'PF000000', '0000-00-00 00:00:00', 'Description', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(16, 'PF000000', '0000-00-00 00:00:00', 'Description', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(17, 'PF000000', '0000-00-00 00:00:00', 'Description', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(18, 'PF000000', '0000-00-00 00:00:00', 'Description', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(19, 'PF000000', '0000-00-00 00:00:00', 'Description', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(20, 'PF000000', '0000-00-00 00:00:00', 'Description', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(21, 'PF000000', '0000-00-00 00:00:00', 'kdsjkdjk', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(22, 'PF000000', '0000-00-00 00:00:00', 'kdsjkdjk', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(23, 'PF000000', '0000-00-00 00:00:00', 'dsjhdsjsh', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(24, 'PF000000', '0000-00-00 00:00:00', 'dsjhdsjsh', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(25, 'PF000000', '0000-00-00 00:00:00', 'sjkajskj', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(26, 'PFundefin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(27, 'PFundefin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(28, 'PFundefin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(29, 'PFundefin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(30, 'PFundefin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(31, 'PFundefin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(32, 'PFundefin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(33, 'PF000016', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(34, 'PF000017', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, '', 0, 0, 0, '', '', 0, '', 0, '', '', '', '0', '', ''),
(35, 'PF000004', '2018-04-07 11:55:08', 'jkwkejkwjek', 'wqkjqwkjqkj', '07723923929', 'kjewjkwjk', 'kjkrjkerjk', 'kjkrjkrjwkj', 'Bulawayo Province', 'undefined', 1, '1', 0, 0, 0, '', 'jkj', 99, 'Days', 11, '90 jk', '', '', '0', '', ''),
(36, 'PF000005', '2018-04-07 11:59:50', 'kjkjjkjk', 'qwjwqkqwjkj', '09209109', 'kjkjkj', 'kjkjk', 'kjkjkj', 'Bulawayo Province', 'undefined', 111, '1', 0, 0, 0, '', '0dss', 33, 'Days', 200, 'kjkjkjk', '', '', '0', '', ''),
(37, 'PF000010', '2018-04-07 18:13:11', 'Test', 'Test', '2929812989189', 'HDJDSHJ', 'JDHJSDHJSDH', 'JDHJDHSJH', 'Manicaland Province', 'undefined', 100, '122', 0, 0, 0, '', 'JHDSJHSDJHJSDHJ', 200, 'Days', 0, 'JDSHJSHDJSHJ', '', '', '0', '', ''),
(38, 'PF000011', '2018-04-07 18:54:28', 'kjdkjksdjk', 'ekjwekjekwjk', 'kjdkdsjkjdsk', 'kjkdjskdsjk', 'kjdkjskdj', 'kdjkdsjksd', 'Midlands Province', 'kdjksdjk@kjkdksd.com', 1, '1', 0, 0, 0, '', 'jkjdkjsdkjsdk', 9, 'Days', 1, 'kjdkjsdkjk', '', '', '0', '', ''),
(39, 'PF000012', '2018-04-07 19:02:59', 'djhsjhdsjh', 'jdjhsjhjsdhj', '892932893829', 'dhjjkjdkjskjM', 'jhdjhsjdhj', 'Harare', 'Midlands Province', 'kdkjdskj@kjdsjksdj.com', 2, '2', 0, 0, 103.49999999999999, '', 'kajksjkj', 11, 'Days', 2, 'jehjwehjhwejh ', '', '', '0', '', ''),
(40, 'PF000013', '2018-04-07 19:29:21', 'kjkeqjkjewkj', '', '09310319013909', 'kjdkjskdjk', 'kdsjkjskdjk', 'ksdjkjdskjsdkj', 'Bulawayo Province', 'kdsskdjkdsj@gmail.com', 90, '9', 0, 0, 225, '', 'kdsjskdjksdj', 12, 'Days', 900, 'kdjksdjkj', '', '', '0', '', ''),
(41, 'PF000014', '2018-04-07 19:31:39', 'kejkjewkjk', 'kjdkjsdkj', '029012909120', 'kdjsksjdkj', 'kdjkjdskj', 'dsjdksjk', 'Midlands Province', 'kadjkdjk@kajkdjdk.com', 9, '11', 0, 0, 804.9999999999999, '', 'kdskjkdjskj', 89, 'Days', 9, 'kjsdkjsdkjk', '', '', '0', '', ''),
(42, 'PF000015', '2018-04-07 19:34:48', 'kjsdkjdskj', 'sdksdjjsdk', '012902910912', '87 kjkjdkjdk', 'kjdskjsdk', 'Harare', 'Manicaland Province', 'tetst@idiusid.com', 100, '11', 0, 0, 2378, '', 'jkdjksjksjdk', 99, 'Days', 22, 'jddsjksdjkjdk', '', '', '0', '', ''),
(43, 'PF000016', '2018-04-07 19:37:08', 'ldklsdlksd', 'salkaslkaslk', '398329893289', 'sdkjksdjkjsdk', 'jksdkjsdkjk', 'kjdskjsdk', 'Bulawayo Province', 'dkjksjksd@jskjdk.com', 90, '9', 0, 0, 335, '', 'kdjksdjksdj', 22, 'Days', 100, 'kdsjksdjksjk', '', '', '0', '', ''),
(44, 'PF000017', '2018-04-07 19:38:56', 'lkdlkdslksdl', 'lkaslkalklas', '83092090239', 'kdjkjsdkjsk', 'jdksjksdjk', 'sdkjsdkjsk', 'Harare Province', 'kjkjwekj@jadkjkd.com', 900, '9', 0, 0, 1605, '', 'jdskjsdkj', 12, 'Days', 100, 'kjksdjksdjkj', '', '', '0', '', ''),
(45, 'PF000018', '2018-04-07 20:04:04', 'jdkjksdjkj', 'kjkwjwkqjkqj', '909309310', 'kdjksdjksj', 'jsdkjskdjk', 'ksdkjsdjsk', 'Harare Province', 'ksksdjkjd', 9, '9', 0, 0, 896.9999999999999, '', 'jsdkjkdsjk', 22, 'Days', 9, 'ksjdkjksjkjsd', '', '', '0', '', ''),
(46, 'PF000019', '2018-04-07 20:09:36', 'kdkdsjkjdsk98389328', 'sakjaskjak', '3982938938', 'KDJKSJDKJSDK', 'KJDKJKDSJ', 'KJSDKJSKDJK', 'Bulawayo Province', 'KAJKASJKJ', 10000, '22', 11500, 0, 13225, '', 'KJDKJKSJ', 22, 'Days', 800, 'JDKJSDKJKS', '', '', '0', '', ''),
(47, 'PF000020', '2018-04-07 20:13:18', 'djsdksjkjsdk', 'kjjjskajksjk', '0193901930', 'ksdjkdsj', 'kjkdjkjsk', 'kjkjk', 'Harare Province', '92189@kjdkjdskjk', 1, '99', 22, 0, 25.299999999999997, '', 'kjkjk', 33, 'Days', 1, 'kjkjkk', '', '', '0', '', ''),
(48, 'PF000021', '2018-04-07 20:15:54', 'ksjaksjaksj98298938931', 'askaskjaskj', '9839823989', 'KDJKSDJKJ', 'KJDKJKSJ', 'KDJKSDJKSDJ', 'Harare Province', 'DJKJSDKJK@KDKJSD,.COM', 2, '2', 7800.000000000001, 0, 8970, '', 'KJDKSJKSDJK', 22, 'Days', 2, 'KDSJKJSKDJ', '', '', '0', '', ''),
(49, 'PF000022', '2018-04-08 01:39:03', 'kjkjkj', 'djkskjskj', 'jkjkjkjk', 'jkdjkjskj', 'jskjksdjk', 'ksjdkjskj', 'Harare Province', 'jjkkjkj@jkjk.com', 10, '22', 300, 0, 345, '', 'kjdkjdskj', 11, 'Days', 10, 'kjdskjdskj', '', '', '0', '', ''),
(50, 'PF000025', '2018-04-08 12:52:27', 'test', 'Test', '97226278889', 'hdihdiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'Harare', 'Harare', 'Harare Province', 'udjsudhu@gmail.con', 100, '11', 891.304347826087, 145, 1025, '', 'dsdggsdysdgyg', 7, 'Days', 110, 'hhsdghgsdhg', 'dave', '', '0', '', ''),
(51, 'PF000027', '2018-04-08 13:00:14', 'Test Test', 'Test Org', '09829829', '89829891 jdhjsdhj', 'Msasa', 'Harare', 'Harare Province', 'jsjsah@gmail.com', 300, '3', 5086.956521739131, 650, 5850, '', 'jkhkjkjk', 12, 'Days', 200, 'jhjhjh kjkjkj22', 'dave', '03902930932', 'Batsirayi  Maphosa', 'Monthly', '5000'),
(52, 'PF000028', '2018-04-08 15:00:54', 'Dave SOG', 'Delta Beverages', '0774435579', '99 Woolwich Road ,Workington', 'Harare', 'Harare', 'Harare Province', 'it@delta.co.zw', 3000, '2', 5797.826086956522, -2182.5000000000005, 6667.5, '', 'Test', 12, 'Months', 300, '10x Dell Latitude E7440 laptops', 'dave', '', 'Athuman Kapange', 'Termly', '7500'),
(53, 'PF000029', '2018-04-14 21:12:03', 'Mr Mutendi', 'Econet Wireless', '09320902390239', 'No 2 Old Mutare Rd ', 'Msasa', 'Harare', 'Harare Province', 'bmutendi@econet.co.zw', 540, '2', 2686.95652173913, 809.9999999999995, 3089.9999999999995, '', 'Long Term Rental', 12, 'Months', 900, '10x Dell Latitude E7440 ultrabook', 'dave', '', 'David Mandengenda', '', ''),
(54, 'PF000030', '2018-04-14 21:28:12', 'Mthandazo Mangena', 'Sytec Air', '0773299936', '10  Golden Road Sandton', '2146 Sandown', 'Johannesburg', 'Harare Province', 'info@sytecair.co.zw', 2500, '2', 37000, 2950, 42550, '', 'Deliver', 24, 'Months', 200, '22x Dell 780 Desktops', 'dave', '', 'David Mandengenda', '', ''),
(55, 'PF000031', '2018-04-14 21:41:13', 'Dennis Millionaire', 'Nedbank', '023032909320923', 'Block C Tendeseka Park ', 'Eastlea,Harare', 'Harare', 'Harare Province', 'kjkdjkjdsk@gmail.com', 900, '3', 1694.3478260869567, -661.5, 1948.5, '', 'Short Term Rental', 12, 'Weeks', 90, '11x Dell 6430u li5 laptops', 'dave', '', 'David Mandengenda', '', ''),
(56, 'PF000032', '2018-04-14 21:45:57', 'Joshua Caleb', 'Barclays Bank', '8498029-03903', '99 Enterprise Rd', 'Highlands', 'Harare', 'Harare Province', 'jc@barclays.co.za', 0, '0', 11000, 1649.9999999999982, 12649.999999999998, '', 'Done', 36, 'Months', 0, '22 Desktops', 'dave', '', 'David Mandengenda', '', ''),
(57, 'PF000033', '2018-04-14 21:50:14', 'Elon Musk', 'Tesla Motors Zimbabwe', '9309328239', '99 Enterprise Rd', 'Eastlea', 'Harare', 'Harare Province', 'emusk@spacex.com', 0, '2', 22500, 3374.9999999999964, 25874.999999999996, '', 'Initial Rollou', 24, 'Months', 0, '90x Laptop Dell i7', 'dave', '', 'David Mandengenda', '', ''),
(58, 'PF000034', '2018-04-14 21:51:34', 'Elon Musk', 'Tesla Motors Zimbabwe', '9309328239', '99 Enterprise Rd', 'Eastlea', 'Harare', 'Harare Province', 'emusk@spacex.com', 0, '2', 900.0000000000001, 135, 1035, '', 'Initial Rollou', 24, 'Months', 0, '90x Laptop Dell i7', 'dave', '', 'David Mandengenda', '', ''),
(59, 'PF000035', '2018-04-15 05:33:09', 'djkjsdkjskd', 'dkjdkjdskjk', '91219210210', 'KDJSKJDSKJDS', 'KJKDJKJKDJK', 'HK', 'Harare Province', 'ksdkjsdjdskj@DJJDK.COM', 900, '99', 83189.56521739131, 10464, 95668, '', 'KJKJKJK', 99, 'Days', 9, 'KJKJKJ', 'dave', '', 'David Mandengenda', '', ''),
(60, 'PF000038', '2018-04-15 10:02:07', 'KJEKJEKJKEJK', 'Test', '910910910910', 'ddjhdjhdjhdjh', 'jhjehjehj', 'hhejhje', 'Harare Province', 'KJKEJKE@gmail.ocm', 2, '12', 97991.30434782608, 14709.999999999985, 112689.99999999999, '', 'jhjhjhj', 90, 'Days', 12, 'jhjhjhj', 'dave', '', 'David Mandengenda', 'Monthly', ''),
(61, 'PF000041', '2018-04-15 11:44:09', 'David Mandengenda', 'Subaru City', '0930923092302903', '99 Sable Rd', 'Workington', 'Harare', 'Harare Province', 'dave@supersubaru.co.zw', 0, '1', 4269.130434782609, -970.5, 4909.5, '', 'Delivery plus collection', 36, 'Months', 100, '22x Dell Laptops', 'dave', '', 'David Mandengenda', 'Monthly', ''),
(62, 'PF000043', '2018-04-15 12:08:23', 'Mr Rupiya', 'Nedbank', '0930293093209', '99 Fortune Drive', 'Milton Park', 'Harare', 'Harare Province', 'jrupiya@nebank.com', 0, '3', 48678.260869565216, 1057.499999999999, 55979.99999999999, '', 'Once off Delivery Cost Included', 36, 'Months', 300, '20 Desktops', 'dave', '03909023902390', 'David Mandengenda', 'Monthly', '8107.499999999999'),
(63, 'PF000045', '2018-04-15 12:29:02', 'Frank Edwards', 'Rocktown Records', '93092309209023', '87 Rememberance St', 'Mbare', '', 'Harare Province', 'frank@loveworld.co.ng', 0, '1', 270099.99999999994, 13507.499999999985, 310614.99999999994, '', 'Music Academy Setup', 24, 'Months', 0, '100 Desktops', 'dave', '030923092039', 'David Mandengenda', 'Monthly', '103557.49999999999'),
(64, 'PF000047', '2018-04-15 13:11:13', 'Mr Harris', 'Toyota Zimbabwe', '089303932929', '99 Ellis Road', 'Harare', 'Harare', 'Harare Province', 'tharris@toyota.co.zw', 0, '2', 10050, 307.4999999999998, 11557.5, '', '25 Desktops plus delivery', 36, 'Months', 0, '25 Dell Desktops', 'dave', '789323', 'David Mandengenda', 'Monthly', '2300'),
(65, 'PF000053', '2018-04-16 13:14:32', 'David', 'Msasa Auctions', '939832982989898239239', '99 Mutare Rd Msasa', 'Msasa', 'Harare', 'Harare Province', 'fatso@gmail.com', 0, '2', 9000, 449.99999999999955, 10349.999999999998, '', 'Test', 36, 'Months', 0, '10x Dell E6430 i7 laptops', 'dave', '389238932898393289', 'David Mandengenda', 'Monthly', '3449.9999999999995');

-- --------------------------------------------------------

--
-- Table structure for table `invserialslines`
--

CREATE TABLE `invserialslines` (
  `Docno` varchar(30) NOT NULL,
  `Description` varchar(40) NOT NULL,
  `StoreCode` varchar(40) NOT NULL,
  `ItemCode` varchar(40) NOT NULL,
  `serialno` varchar(60) NOT NULL,
  `DDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Qty` double NOT NULL,
  `UnitCost` double NOT NULL,
  `Tax` double NOT NULL,
  `LnTotal` double NOT NULL,
  `ExtDescription` varchar(30) NOT NULL,
  `CustID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invserialslines`
--

INSERT INTO `invserialslines` (`Docno`, `Description`, `StoreCode`, `ItemCode`, `serialno`, `DDate`, `Qty`, `UnitCost`, `Tax`, `LnTotal`, `ExtDescription`, `CustID`) VALUES
('PF000000', 'dskisdjk', '001', '', '', '0000-00-00 00:00:00', 1, 900, 135, 1035, 'dskisdjk', ''),
('PF000000', 'SKSAKJAS', '001', '', '', '0000-00-00 00:00:00', 100, 90, 1350, 10350, 'SKSAKJAS', ''),
('PF000000', 'SKSAKJAS', '001', '', '', '0000-00-00 00:00:00', 10, 900, 1350, 10350, 'SKSAKJAS', ''),
('PF000000', 'shjahjj', '001', '', '', '0000-00-00 00:00:00', 100, 900, 13499.999999999985, 103499.99999999999, 'shjahjj', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 13:54:53', 10, 200, 300, 2300, 'Test', ''),
('PF000000', 'Test2', '001', '', '', '2018-03-27 13:55:44', 900, 100, 13499.999999999985, 103499.99999999999, 'Test2', ''),
('PF000000', 'kjsdkjsdk', '001', '', '', '2018-03-27 14:21:01', 10, 90, 135, 1035, 'kjsdkjsdk', ''),
('PF000000', 'akajskj', '001', '', '', '2018-03-27 14:33:10', 10, 900, 1350, 10350, 'akajskj', ''),
('PF000000', 'djhdsjhjs', '001', '', '', '2018-03-27 14:39:13', 1, 100, 14.999999999999986, 114.99999999999999, 'djhdsjhjs', ''),
('PF000000', 'dskjsdkjds', '001', '', '', '2018-03-27 14:46:20', 10, 100, 150, 1150, 'dskjsdkjds', ''),
('PF000000', 'akasjaskj', '001', '', '', '2018-03-27 14:48:52', 10, 100, 150, 1150, 'akasjaskj', ''),
('PF000000', 'Dell 780 Desktops', '001', '', '', '2018-03-27 14:52:14', 10, 13.48, 20.22, 155.02, 'Dell 780 Desktops', ''),
('PF000000', 'description', '001', '', '', '2018-03-27 14:52:41', 0, 0, 0, 0, 'description', ''),
('PF000000', 'sakasjka', '001', '', '', '2018-03-27 14:56:04', 1, 11, 1.6499999999999986, 12.649999999999999, 'sakasjka', ''),
('PF000000', 'description', '001', '', '', '2018-03-27 14:56:14', 0, 0, 0, 0, 'description', ''),
('PF000000', 'description', '001', '', '', '2018-03-27 14:56:34', 0, 0, -90, 0, 'description', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 14:56:54', 100, 90, -888740, 10350, 'Test', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 14:58:42', 1, 120, 18, 138, 'Test', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 14:59:19', 1, 100, 14.999999999999986, 114.99999999999999, 'Test', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 15:01:12', 100, 100, 1500, 11500, 'Test', ''),
('PF000000', 'Dell 780 Desktops', '001', '', '', '2018-03-27 15:01:52', 1, 100, 14.999999999999986, 114.99999999999999, 'Dell 780 Desktops', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 15:03:52', 2, 100, 29.99999999999997, 229.99999999999997, 'Test', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 15:04:17', 100, 90, 1350, 10350, 'Test', ''),
('PF000000', 'Tested', '001', '', '', '2018-03-27 15:04:41', 100, 90, 1350, 10350, 'Tested', ''),
('PF000000', 'Test', '001', '', '', '2018-03-27 15:05:06', 1, 200, -60.00000000000003, 229.99999999999997, 'Test', ''),
('PF000000', 'Tell', '001', '', '', '2018-03-27 15:17:25', 10, 100, 150, 1150, 'Tell', ''),
('PF000000', '', '001', '', '', '2018-03-29 12:59:14', 0, 0, 0, 0, '', ''),
('PF000000', 'Description', '001', '', '', '2018-03-29 12:59:18', 0, 0, 0, 0, 'Description', ''),
('PF000000', 'Description', '001', '', '', '2018-03-29 13:03:03', 0, 0, 0, 0, 'Description', ''),
('PF000000', 'jjj', '001', '', '', '2018-03-30 17:22:31', 10, 21, 31.49999999999997, 241.49999999999997, 'jjj', ''),
('PF000000', 'hghghg', '001', '', '', '2018-03-30 17:46:00', 1, 90, 13.499999999999986, 103.49999999999999, 'hghghg', ''),
('PF000000', 'jhjhj', '002', '', '', '2018-03-30 17:57:30', 9, 88, 118.79999999999995, 910.8, 'jhjhj', ''),
('PF000000', 'Test', '001', '', '', '2018-04-02 06:55:47', 10, 100, 150, 1150, 'Test', ''),
('undefined', 'Tesla', '001', '', '', '2018-04-02 07:11:32', 100, 900, 13499.999999999985, 103499.99999999999, 'Tesla', ''),
('undefined', 'Nikola', '001', '', '', '2018-04-02 07:13:41', 90, 900, 12150, 93150, 'Nikola', ''),
('undefined', 'qskqjkj`', '001', '', '', '2018-04-02 07:20:23', 100, 90, 1350, 10350, 'qskqjkj`', ''),
('undefined', 'Descriptiokasjkasjk`n', '001', '', '', '2018-04-02 07:20:43', 100, 90, 1350, 10350, 'Descriptiokasjkasjk`n', ''),
('undefined', 'qwkwqkjqk', '001', '', '', '2018-04-02 07:22:16', 1, 1001, 150.14999999999986, 1151.1499999999999, 'qwkwqkjqk', ''),
('undefined', 'ajasnj', '001', '', '', '2018-04-02 07:23:20', 10, 200, 0, 2300, 'ajasnj', ''),
('0', '', '001', '', '', '2018-04-02 07:24:04', 0, 0, 0, 0, '', ''),
('14849.999999999985', 'Descriptionajdjksdjkj', '001', '', '', '2018-04-02 07:24:18', 100, 990, 14849.999999999985, 113849.99999999999, 'Descriptionajdjksdjkj', ''),
('undefined', '', '001', '', '', '2018-04-02 07:32:30', 0, 0, 0, 0, '', ''),
('undefined', 'KDJKSDJKJ', '001', '', '', '2018-04-02 07:32:53', 100, 90, 1350, 10350, 'KDJKSDJKJ', ''),
('undefined', 'kdjkdjk', '001', '', '', '2018-04-02 07:38:49', 10, 90, 135, 1035, 'kdjkdjk', ''),
('undefined', 'kdjksdjk', '001', '', '', '2018-04-02 07:39:28', 1, 100, 14.999999999999986, 114.99999999999999, 'kdjksdjk', ''),
('undefined', 'jehjewhj', '001', '', '', '2018-04-02 07:44:22', 1, 88, 13.199999999999989, 101.19999999999999, 'jehjewhj', ''),
('undefined', 'asjashjahj', '001', '', '', '2018-04-02 07:45:06', 99, 90, 1336.5, 10246.5, 'asjashjahj', ''),
('undefined', 'Descriptionakjdakjdakjda', '001', '', '', '2018-04-02 07:46:02', 10, 100, 150, 1150, 'Descriptionakjdakjdakjda', ''),
('undefined', 'Descriptionckjkjsdkjskd', '001', '', '', '2018-04-02 08:10:35', 1, 200, 29.99999999999997, 229.99999999999997, 'Descriptionckjkjsdkjskd', ''),
('0', 'aksajkasj', '001', '', '', '2018-04-02 08:19:13', 1, 90, 13.499999999999986, 103.49999999999999, 'aksajkasj', ''),
('0', 'jqhqjjh', '001', '', '', '2018-04-02 08:20:07', 1, 100, 14.999999999999986, 114.99999999999999, 'jqhqjjh', ''),
('undefined', 'Tested', '001', '', '', '2018-04-02 09:07:07', 10, 100, 150, 1150, 'Tested', ''),
('0', 'kjaakjejk', '001', '', '', '2018-04-02 09:08:18', 100, 900, 13499.999999999985, 103499.99999999999, 'kjaakjejk', ''),
('0', '', '001', '', '', '2018-04-02 09:08:58', 0, 0, 0, 0, '', ''),
('undefined', 'Nest', '001', '', '', '2018-04-02 09:13:03', 1, 100, 14.999999999999986, 114.99999999999999, 'Nest', ''),
('', 'jdhdjhdj', '001', '', '', '2018-04-02 09:21:22', 10, 100, 150, 1150, 'jdhdjhdj', ''),
('', 'akadsjask', '001', '', '', '2018-04-02 09:21:52', 1, 200, 29.99999999999997, 229.99999999999997, 'akadsjask', ''),
('', 'askajskajk', '001', '', '', '2018-04-02 09:22:41', 20, 100, 300, 2300, 'askajskajk', ''),
('', 'QWKQWJKQJ', '001', '', '', '2018-04-02 09:23:28', 20, 200, 600, 4600, 'QWKQWJKQJ', ''),
('', 'AJKHAJSHJ', '001', '', '', '2018-04-02 09:23:57', 10, 200, 300, 2300, 'AJKHAJSHJ', ''),
('', 'EQKJEKJWEK', '001', '', '', '2018-04-02 09:24:56', 1, 200, 29.99999999999997, 229.99999999999997, 'EQKJEKJWEK', ''),
('undefined', 'kdsjksdjk', '001', '', '', '2018-04-02 09:26:53', 100, 90, 1350, 10350, 'kdsjksdjk', ''),
('0001', 'akajakj', '001', '', '', '2018-04-02 09:30:47', 100, 230, 3449.9999999999964, 26449.999999999996, 'akajakj', ''),
('PF0001', 'wkqjqkj', '001', '', '', '2018-04-02 09:34:00', 200, 200, 6000, 46000, 'wkqjqkj', ''),
('PF0001', 'Guest', '001', '', '', '2018-04-02 09:34:51', 200, 230, 6899.999999999993, 52899.99999999999, 'Guest', ''),
('PFundefined', 'kdjksdjkdsjk', '001', '', '', '2018-04-02 09:35:59', 200, 230, 6899.999999999993, 52899.99999999999, 'kdjksdjkdsjk', ''),
('PFundefined', 'Description', '001', '', '', '2018-04-02 09:36:05', 0, 0, 0, 0, 'Description', ''),
('PF0001', 'kdjkdjksj', '001', '', '', '2018-04-02 09:37:02', 1, 304, 45.599999999999966, 349.59999999999997, 'kdjkdjksj', ''),
('PF0001', 'ewdhewjh', '001', '', '', '2018-04-02 09:41:14', 100, 90, 1350, 10350, 'ewdhewjh', ''),
('PF0001', 'test', '001', '', '', '2018-04-02 09:49:46', 90, 900, 12150, 93150, 'test', ''),
('PFundefined', 'khdakjadk', '001', '', '', '2018-04-02 09:53:08', 10, 700, 1049.999999999999, 8049.999999999999, 'khdakjadk', ''),
('PFundefined', 'Description', '001', '', '', '2018-04-02 09:53:13', 0, 0, 0, 0, 'Description', ''),
('PF0001', '99', '001', '', '', '2018-04-02 09:53:47', 99, 99, 1470.1499999999996, 11271.15, '99', ''),
('PFundefined', 'ajsakjkaj', '001', '', '', '2018-04-02 09:59:54', 90, 900, 12150, 93150, 'ajsakjkaj', ''),
('PF0001', 'dsksjdkjs', '002', '', '', '2018-04-02 10:00:55', 300, 300, 13499.999999999985, 103499.99999999999, 'dsksjdkjs', ''),
('PF0001', 'alaslkla', '001', '', '', '2018-04-02 10:01:31', 10, 230, 345, 2645, 'alaslkla', ''),
('', 'kfjfkdjk', '', '', '', '2018-04-02 20:54:34', 0, 0, 0, 0, 'kfjfkdjk', ''),
('PF0001', 'dkdsjksdjk', '001', '', '', '2018-04-02 20:58:50', 99, 900, 13364.999999999985, 102464.99999999999, 'dkdsjksdjk', ''),
('PF0002', 'Descripkajksjkajstion', '001', '', '', '2018-04-02 20:59:13', 99, 89, 1321.6499999999996, 10132.65, 'Descripkajksjkajstion', ''),
('PF0002', 'leklkwel', '001', '', '', '2018-04-02 21:15:11', 100, 99, 1485, 11385, 'leklkwel', ''),
('PF0002', 'New', '001', '', '', '2018-04-02 21:15:37', 10, 300, 449.99999999999955, 3449.9999999999995, 'New', ''),
('PF0002', 'Newton', '001', '', '', '2018-04-02 21:16:00', 100, 90, 1350, 10350, 'Newton', ''),
('PF0002', 'lklsklkS', '001', '', '', '2018-04-02 21:16:55', 100, 90, 1350, 10350, 'lklsklkS', ''),
('PF0002', 'Test', '001', '', '', '2018-04-02 21:19:35', 900, 900, 121499.99999999988, 931499.9999999999, 'Test', ''),
('PF0002', 'Nestere', '001', '', '', '2018-04-02 21:19:52', 10, 100, 150, 1150, 'Nestere', ''),
('PF0002', 'Naspers', '001', '', '', '2018-04-02 21:21:47', 210, 200, 6299.999999999993, 48299.99999999999, 'Naspers', ''),
('PF0002', 'System Guru', '001', '', '', '2018-04-02 21:22:06', 122, 200, 3659.9999999999964, 28059.999999999996, 'System Guru', ''),
('PF0002', 'jshjsahj', '001', '', '', '2018-04-02 21:24:01', 88, 89, 1174.7999999999993, 9006.8, 'jshjsahj', ''),
('PF0002', 'ksajaksjakj', '001', '', '', '2018-04-02 21:24:20', 94, 87, 1226.699999999999, 9404.699999999999, 'ksajaksjakj', ''),
('PF0002', 'tenor', '001', '', '', '2018-04-02 21:35:36', 10, 400, 600, 4600, 'tenor', ''),
('PF0000', 'Descriptionkrjkerjk8`8', '001', '', '', '2018-04-02 21:35:55', 1, 88, 13.199999999999989, 101.19999999999999, 'Descriptionkrjkerjk8`8', ''),
('PF0002', 'kjkdsjk', '001', '', '', '2018-04-02 21:38:06', 100, 300, 4500, 34500, 'kjkdsjk', ''),
('PF0000', 'Descriptiodsoidosoidon', '001', '', '', '2018-04-02 21:38:21', 10, 120, 180, 1380, 'Descriptiodsoidosoidon', ''),
('PF0002', 'akasjkajk', '001', '', '', '2018-04-02 21:39:38', 100, 90, 1350, 10350, 'akasjkajk', ''),
('PF0002', 'ajkasjkj', '001', '', '', '2018-04-02 21:42:24', 99, 12, 178.19999999999982, 1366.1999999999998, 'ajkasjkj', ''),
('PF0000', 'Descjahqjhjription', '001', '', '', '2018-04-02 21:42:46', 10, 100, 150, 1150, 'Descjahqjhjription', ''),
('PF0002', 'xkkajkaj', '001', '', '', '2018-04-02 21:43:54', 10, 300, 449.99999999999955, 3449.9999999999995, 'xkkajkaj', ''),
('PF0000', 'Descriptionwejwkkwj', '001', '', '', '2018-04-02 21:44:14', 100, 99, 1485, 11385, 'Descriptionwejwkkwj', ''),
('PF0002', 'skasklakl', '001', '', '', '2018-04-02 21:45:58', 120, 500, 9000, 69000, 'skasklakl', ''),
('PF0000', 'Descriptionkskjsdkj', '001', '', '', '2018-04-02 21:46:16', 100, 90, 1350, 10350, 'Descriptionkskjsdkj', ''),
('PF0002', 'jmdsjshdj', '001', '', '', '2018-04-02 21:47:46', 1020, 900, 137700, 1055700, 'jmdsjshdj', ''),
('PF0002', 'ksdjkjsk', '001', '', '', '2018-04-02 21:48:54', 99, 230, 3415.4999999999964, 26185.499999999996, 'ksdjkjsk', ''),
('PF0000', 'DescriptEJNWWJion', '001', '', '', '2018-04-02 21:49:23', 300, 320, 14399.999999999985, 110399.99999999999, 'DescriptEJNWWJion', ''),
('PF0002 -', 'KDJKSDJK', '001', '', '', '2018-04-02 22:01:03', 400, 400, 24000, 184000, 'KDJKSDJK', ''),
('PF0002 -', 'laalskl', '001', '', '', '2018-04-02 22:02:17', 1, 450100, 67514.99999999994, 517614.99999999994, 'laalskl', ''),
('PF0002 -', 'DJSKDSJKS', '001', '', '', '2018-04-02 22:03:20', 345, 400, 20700, 158700, 'DJSKDSJKS', ''),
('PF0004 -', 'TaraJi', '001', '', '', '2018-04-02 22:05:08', 25, 900, 3374.9999999999964, 25874.999999999996, 'TaraJi', ''),
('PF0001', 'jkekewjk', '001', '', '', '2018-04-02 22:10:50', 100, 99, 1485, 11385, 'jkekewjk', ''),
('PF0000', 'Descriptionejkwkj600wkjk', '001', '', '', '2018-04-02 22:11:15', 100, 450, 6749.999999999993, 51749.99999999999, 'Descriptionejkwkj600wkjk', ''),
('PF0002', 'Test1', '001', '', '', '2018-04-02 22:12:34', 10, 100, 150, 1150, 'Test1', ''),
('PF0001', 'Test2', '001', '', '', '2018-04-02 22:12:55', 30, 100, 449.99999999999955, 3449.9999999999995, 'Test2', ''),
('PF0003', 'jhjhj', '002', '', '', '2018-04-02 22:22:21', 90, 700, 9450, 72450, 'jhjhj', ''),
('PF0002', 'Descriptionjhjhj', '002', '', '', '2018-04-02 22:22:43', 99, 99, 1470.1499999999996, 11271.15, 'Descriptionjhjhj', ''),
('PF0004', 'Nikola Tesla', '001', '', '', '2018-04-03 05:15:41', 10, 300, 449.99999999999955, 3449.9999999999995, 'Nikola Tesla', ''),
('PF0004', 'Elon Musk', '001', '', '', '2018-04-03 05:16:04', 10, 90, 135, 1035, 'Elon Musk', ''),
('PF0004', 'Thomas Edison', '001', '', '', '2018-04-03 05:16:33', 1, 500, 75, 575, 'Thomas Edison', ''),
('PF0005', 'Test', '001', '', '', '2018-04-03 05:20:17', 10, 900, 1350, 10350, 'Test', ''),
('PF0005', 'First', '001', '', '', '2018-04-03 05:20:35', 900, 60, 8099.999999999993, 62099.99999999999, 'First', ''),
('PF0006', 'Test', '001', '', '', '2018-04-03 16:15:29', 110, 100, 1649.9999999999982, 12649.999999999998, 'Test', ''),
('PF0006', 'Test 2', '001', '', '', '2018-04-03 16:15:51', 100, 900, 13499.999999999985, 103499.99999999999, 'Test 2', ''),
('PF0007', 'Descriptionjhjhjhj', '001', '', '', '2018-04-03 16:27:31', 100, 900, 13499.999999999985, 103499.99999999999, 'Descriptionjhjhjhj', ''),
('PF0008', 'Tester', '001', '', '', '2018-04-03 18:09:00', 10, 200, 300, 2300, 'Tester', ''),
('PF0008', 'DescriptionTest2', '001', '', '', '2018-04-03 18:09:17', 2, 250, 75, 575, 'DescriptionTest2', ''),
('PF0009', 'kjdkjskd', '001', '', '', '2018-04-05 22:41:19', 100, 90, 1350, 10350, 'kjdkjskd', ''),
('PF000010', '', '001', '', '', '2018-04-05 22:55:34', 0, 0, 0, 0, '', ''),
('PF000011', 'SDSDKJKSDJKJSD', '001', '', '', '2018-04-05 23:48:30', 10, 200, 300, 2300, 'SDSDKJKSDJKJSD', ''),
('PF000012', 'Dell 19 inch LCDs', '002', '', '', '2018-04-05 23:50:42', 1, 300, 45, 345, 'Dell 19 inch LCDs', ''),
('PF000013', 'sdss', '001', '', '', '2018-04-05 23:54:24', 1, 50, 7.499999999999993, 57.49999999999999, 'sdss', ''),
('PF000014', 'kjjdskjk', '001', '', '', '2018-04-05 23:56:01', 1, 11, 1.6499999999999986, 12.649999999999999, 'kjjdskjk', ''),
('PF000015', 'kkjkjk', '001', '', '', '2018-04-05 23:59:16', 1, 90, 13.499999999999986, 103.49999999999999, 'kkjkjk', ''),
('PF000016', 'KJKJK', '001', '', '', '2018-04-06 00:14:32', 10, 22, 32.99999999999997, 252.99999999999997, 'KJKJK', ''),
('PF000017', 'Test', '001', '', '', '2018-04-07 09:32:06', 10, 200, 300, 2300, 'Test', ''),
('PF000017', 'Test2', '003 Laptops', '', '', '2018-04-07 09:32:26', 100, 90, 1351, 10350, 'Test2', ''),
('PF000NaN', 'jhjhwejh', '001', '', '', '2018-04-07 11:45:34', 1, 120, 18, 138, 'jhjhwejh', ''),
('PF000NaN', 'dkjskjk', '001', '', '', '2018-04-07 11:46:40', 1, 22, 3.299999999999997, 25.299999999999997, 'dkjskjk', ''),
('PF000002', 'kjsjshaj', '001', '', '', '2018-04-07 11:50:24', 9, 98, 132.29999999999995, 1014.3, 'kjsjshaj', ''),
('PF000003', 'jsdjhsj', '001', '', '', '2018-04-07 11:53:02', 1, 22, 3.299999999999997, 25.299999999999997, 'jsdjhsj', ''),
('PF000004', 'kejwjkjwe', '001', '', '', '2018-04-07 11:54:48', 10, 200, 300, 2300, 'kejwjkjwe', ''),
('PF000005', 'kkjewkjwkj', '001', '', '', '2018-04-07 11:59:33', 10, 300, 449.99999999999955, 3449.9999999999995, 'kkjewkjwkj', ''),
('PF000006', 'kjkrjkrjW', '001', '', '', '2018-04-07 17:43:52', 10, 90, 135, 1035, 'kjkrjkrjW', ''),
('PF000007', 'KEJEKJKEWJ', '001', '', '', '2018-04-07 17:52:19', 1, 90, 13.499999999999986, 103.49999999999999, 'KEJEKJKEWJ', ''),
('PF000007', 'DescriptioKJDKJDn', '001', '', '', '2018-04-07 17:52:40', 1, 90, 913.5, 103.49999999999999, 'DescriptioKJDKJDn', ''),
('PF000007', 'DescriptiAKAKADJKAJon', '001', '', '', '2018-04-07 17:53:01', 1, 100, -85.00000000000001, 114.99999999999999, 'DescriptiAKAKADJKAJon', ''),
('PF000008', 'ddsjjhsdjhs', '001', '', '', '2018-04-07 17:54:11', 1, 10, 1.5, 11.5, 'ddsjjhsdjhs', ''),
('PF000009', 'TEST', '001', '', '', '2018-04-07 17:58:08', 1, 200, 29.99999999999997, 229.99999999999997, 'TEST', ''),
('PF000010', 'KJDKJKSDJK', '001', '', '', '2018-04-07 18:08:53', 100, 90, 1350, 10350, 'KJDKJKSDJK', ''),
('PF000011', 'KDJKSJKSJDK', '001', '', '', '2018-04-07 18:54:11', 10, 900, 1350, 10350, 'KDJKSJKSJDK', ''),
('PF000012', 'kdjksjksjdkjds', '001', '', '', '2018-04-07 19:02:49', 1, 90, 13.499999999999986, 103.49999999999999, 'kdjksjksjdkjds', ''),
('PF000013', 'jdksjkjsk', '001', '', '', '2018-04-07 19:28:57', 1, 900, 135, 1035, 'jdksjkjsk', ''),
('PF000014', 'kjdkjsdkjk', '001', '', '', '2018-04-07 19:31:21', 10, 70, 104.99999999999989, 804.9999999999999, 'kjdkjsdkjk', ''),
('PF000015', 'jajdshjsdhj', '001', '', '', '2018-04-07 19:34:33', 10, 200, 300, 2300, 'jajdshjsdhj', ''),
('PF000016', 'ksdjksjdkjsd', '001', '', '', '2018-04-07 19:36:55', 1, 300, 45, 345, 'ksdjksjdkjsd', ''),
('PF000017', 'jsksjdkjs', '001', '', '', '2018-04-07 19:38:43', 1, 700, 104.99999999999989, 804.9999999999999, 'jsksjdkjs', ''),
('PF000018', 'djkjdsjskj', '001', '', '', '2018-04-07 20:03:54', 10, 78, 116.99999999999989, 896.9999999999999, 'djkjdsjskj', ''),
('PF000019', 'ASKJASKJS', '001', '', '', '2018-04-07 20:09:19', 10, 350, 524.9999999999995, 4024.9999999999995, 'ASKJASKJS', ''),
('PF000020', 'ksksdjkj', '001', '', '', '2018-04-07 20:12:58', 1, 22, 3.299999999999997, 25.299999999999997, 'ksksdjkj', ''),
('PF000021', 'DSKJKSDJKSJDK', '001', '', '', '2018-04-07 20:15:46', 100, 78, 1170, 8970, 'DSKJKSDJKSJDK', ''),
('PF000022', 'lkdlkdlsk', '001', '', '', '2018-04-08 01:38:47', 1, 300, 45, 345, 'lkdlkdlsk', ''),
('PF000023', 'kleklkwel', '001', '', '', '2018-04-08 12:29:21', 1, 500, 75, 575, 'kleklkwel', ''),
('PF000024', 'Test', '001', '', '', '2018-04-08 12:49:02', 1, 100, 14.999999999999986, 114.99999999999999, 'Test', ''),
('PF000025', 'Test', '001', '', '', '2018-04-08 12:52:17', 10, 90, 135, 1035, 'Test', ''),
('PF000026', 'jhdjhsjh', '001', '', '', '2018-04-08 12:57:18', 1, 200, 29.99999999999997, 229.99999999999997, 'jhdjhsjh', ''),
('PF000027', 'jhsdjhdjh', '001', '', '', '2018-04-08 13:00:05', 10, 500, 750, 5750, 'jhsdjhdjh', ''),
('PF000028', 'Dell Latitude E6430 i5 laptops', '003 Laptops', '', '', '2018-04-08 15:00:43', 10, 345, 517.4999999999995, 3967.4999999999995, 'Dell Latitude E6430 i5 laptops', ''),
('PF000029', 'Dell 780 Desktops', '001', '', '', '2018-04-14 21:11:53', 10, 300, 449.99999999999955, 3449.9999999999995, 'Dell 780 Desktops', ''),
('PF000030', 'Dell E6430 i7 laptops', '003 Laptops', '', '', '2018-04-14 21:28:04', 100, 350, 5250, 40250, 'Dell E6430 i7 laptops', ''),
('PF000031', 'Dell 6430u i5 laptops', '003 Laptops', '', '', '2018-04-14 21:41:04', 11, 90, 148.5, 1138.5, 'Dell 6430u i5 laptops', ''),
('PF000032', 'Dell 780 Desktops', '001', '', '', '2018-04-14 21:45:49', 22, 500, 1649.9999999999982, 12649.999999999998, 'Dell 780 Desktops', ''),
('PF000033', 'Dell E6430 i7', '003 Laptops', '', '', '2018-04-14 21:50:07', 90, 250, 3374.9999999999964, 25874.999999999996, 'Dell E6430 i7', ''),
('PF000034', 'HP Probook 4530s', '003 Laptops', '', '', '2018-04-14 21:51:26', 1, 900, 135, 1035, 'HP Probook 4530s', ''),
('PF000035', 'KJDKJDK', '001', '', '', '2018-04-15 05:32:42', 90, 900, 12150, 93150, 'KJDKJDK', ''),
('PF000035', 'DescKSJSKJKSAJKription', '001', '', '', '2018-04-15 05:33:00', 10, 64, -795, 736, 'DescKSJSKJKSAJKription', ''),
('PF000036', 'Dell 780 Desktops', '001', '', '', '2018-04-15 09:53:11', 10, 350, 524.9999999999995, 4024.9999999999995, 'Dell 780 Desktops', ''),
('PF000037', 'Test', '001', '', '', '2018-04-15 10:00:16', 10, 9, 13.499999999999986, 103.49999999999999, 'Test', ''),
('PF000038', 'ejhejhejhj', '001', '', '', '2018-04-15 10:01:59', 100, 980, 14699.999999999985, 112699.99999999999, 'ejhejhejhj', ''),
('PF000039', 'Dell 780 Desktops', '001', '', '', '2018-04-15 11:18:21', 70, 150, 1574.9999999999982, 12074.999999999998, 'Dell 780 Desktops', ''),
('PF000040', 'Dell 755 Desktops', '001', '', '', '2018-04-15 11:23:47', 22, 100, 330, 2530, 'Dell 755 Desktops', ''),
('PF000041', 'Dell latitude E6430', '001', '', '', '2018-04-15 11:36:12', 22, 30, 98.99999999999989, 758.9999999999999, 'Dell latitude E6430', ''),
('PF000041', 'Delivery', '020', '', '', '2018-04-15 11:37:41', 1, 90, 13.499999999999986, 103.49999999999999, 'Delivery', ''),
('PF000041', 'Dell XPS 13', '003 Laptops', '', '', '2018-04-15 11:41:39', 1, 900, 134.9999999999999, 1035, 'Dell XPS 13', ''),
('PF000042', 'Apple Macbook pro 2009', '003 Laptops', '', '', '2018-04-15 11:47:46', 22, 300, 989.9999999999991, 7589.999999999999, 'Apple Macbook pro 2009', ''),
('PF000042', 'Delivery ', '020', '', '', '2018-04-15 11:49:29', 1, 300, 45, 345, 'Delivery ', ''),
('PF000043', 'Dell 755 Desktops', '001', '', '', '2018-04-15 12:05:47', 20, 350, 1049.999999999999, 8049.999999999999, 'Dell 755 Desktops', ''),
('PF000043', 'Delivery ', '001', '', '', '2018-04-15 12:06:15', 1, 50, 7.499999999999993, 57.49999999999999, 'Delivery ', ''),
('PF000044', 'eedjdjdjdj', '000', '', '', '2018-04-15 12:23:00', 100, 900, 13499.999999999985, 103499.99999999999, 'eedjdjdjdj', ''),
('PF000045', 'Dell 780 Desktops', '001', '', '', '2018-04-15 12:27:30', 100, 900, 13499.999999999985, 103499.99999999999, 'Dell 780 Desktops', ''),
('PF000045', 'Delivery ', 'null', '', '', '2018-04-15 12:28:45', 1, 50, 7.499999999999993, 57.49999999999999, 'Delivery ', ''),
('PF000046', 'Dell 780 Desktop', '001', '', '', '2018-04-15 12:33:04', 100, 900, 13499.999999999985, 103499.99999999999, 'Dell 780 Desktop', ''),
('PF000046', 'HP Proliant DL360', '004', '', '', '2018-04-15 12:33:46', 100, 89, 1335, 10235, 'HP Proliant DL360', ''),
('PF000046', 'Delivery', '020', '', '', '2018-04-15 12:34:04', 1, 90, 13.499999999999986, 103.49999999999999, 'Delivery', ''),
('PF000047', 'Dell', '001', '', '', '2018-04-15 13:09:21', 10, 200, 299.9999999999998, 2300, 'Dell', ''),
('PF000047', 'Delivery ', '020', '', '', '2018-04-15 13:10:13', 1, 50, 7.499999999999993, 57.49999999999999, 'Delivery ', ''),
('PF000048', 'HP Probook 6540b', '003 Laptops', '', '', '2018-04-15 13:19:00', 30, 300, 1350, 10350, 'HP Probook 6540b', ''),
('PF000049', 'Dell Latitude E7440 i5', '003 Laptops', '', '', '2018-04-15 13:24:29', 30, 300, 1350, 10350, 'Dell Latitude E7440 i5', ''),
('PF000049', 'Dell Latitude E7440 i5', '003 Laptops', '', '', '2018-04-15 13:24:52', 30, 300, 1350, 10350, 'Dell Latitude E7440 i5', ''),
('PF000049', 'Dell Latitude E7440 i5', '003 Laptops', '', '', '2018-04-15 13:25:03', 30, 300, 1350, 10350, 'Dell Latitude E7440 i5', ''),
('PF000050', 'Dell E7440 i5 machines', '003 Laptops', '', '', '2018-04-15 13:27:58', 30, 300, 1350, 10350, 'Dell E7440 i5 machines', ''),
('PF000050', 'Dell E7440 i5 machines', '003 Laptops', '', '', '2018-04-15 13:28:20', 30, 300, 1350, 10350, 'Dell E7440 i5 machines', ''),
('PF000050', 'Dell E7440 i5 machines', '003 Laptops', '', '', '2018-04-15 13:28:56', 30, 300, 1350, 10350, 'Dell E7440 i5 machines', ''),
('PF000050', 'Dell E7440 i5 machines', '003 Laptops', '', '', '2018-04-15 13:29:09', 300, 300, 13499.999999999985, 103499.99999999999, 'Dell E7440 i5 machines', ''),
('PF000051', 'Dell ', '003 Laptops', '', '', '2018-04-15 13:29:50', 30, 300, 1350, 10350, 'Dell ', ''),
('PF000052', 'Dell Latitude', '003 Laptops', '', '', '2018-04-15 13:30:56', 30, 300, 1350, 10350, 'Dell Latitude', ''),
('PF000052', 'Delivery ', '020', '', '', '2018-04-15 13:31:59', 1, 50, 7.499999999999993, 57.49999999999999, 'Delivery ', ''),
('PF000053', 'Dell 780 Desktops', '001', '', '', '2018-04-16 13:14:13', 10, 300, 449.99999999999955, 3449.9999999999995, 'Dell 780 Desktops', '');

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
  `leads_source` varchar(100) DEFAULT NULL,
  `laptops` varchar(30) NOT NULL,
  `projectors` varchar(30) NOT NULL,
  `desktops` varchar(30) NOT NULL,
  `printers` varchar(30) NOT NULL,
  `monitors` varchar(30) NOT NULL,
  `others` varchar(30) NOT NULL,
  `servers` varchar(30) NOT NULL,
  `networking` varchar(30) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `ContractSigned` varchar(30) NOT NULL,
  `GoodsServiceDelivered` varchar(30) NOT NULL,
  `MaturityDate` date NOT NULL,
  `DateInitiated` date NOT NULL,
  `Reason` varchar(150) NOT NULL,
  `DateClosed` date NOT NULL,
  `DateCancelled` date NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`id`, `opportunity_name`, `sales_rep`, `customer`, `sales_type`, `product`, `status`, `rental_amount`, `units_sold`, `description`, `email`, `mobile`, `leads_source`, `laptops`, `projectors`, `desktops`, `printers`, `monitors`, `others`, `servers`, `networking`, `contact_name`, `ContractSigned`, `GoodsServiceDelivered`, `MaturityDate`, `DateInitiated`, `Reason`, `DateClosed`, `DateCancelled`, `telephone`, `address`, `address2`, `city`, `province`, `username`) VALUES
(1, 'Test', 'dave', 'Fatso', 'Hire Purchase', 'Laptops', 'Closed', '2000', '20', 'Test', 'fmupfuti@innovent.co.za', '0774435779', 'Website', '0', '1', '2', '3', '4', '5', '6', '7', 'Contact Munhu', 'Yes', 'No', '2018-04-28', '2018-04-23', 'close', '0000-00-00', '0000-00-00', '486030', '8 George Ave', 'Msasa', 'Harare', 'Harare Province', ''),
(2, 'Test12', 'Fatso2', 'Fatso', 'Hire Purchase', 'Laptops', 'Closed', '2000', '20', 'Test', 'fmupfuti@innovent.co.za', '0774435779', 'facebook', '', '', '', '', '', '', '', '', 'someone', '', '', '0000-00-00', '2018-02-17', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(25, 'Muchechetere High School 20 Desktops', 'Joy Napata', 'Muchechetere', 'Daily Rental', '', 'Closed', '1500', '20', 'Test', 'mmumbaya@muchchetere.gmail.com', '0729292929191', '', '0', '0', '20', '', '', '', '0', '0', '', '', '', '0000-00-00', '2018-02-27', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(26, 'CheziyaGokwe High', 'Joy Napata', 'N1 Hotel', 'Weekly Rental', '', 'Cancelled', '2000', '35', 'Done', 'kdjkdsjk@gmail.com', '038328328', 'Television Ads', '11', '1', '10', '', '', '', '2', '11', '', '', '', '0000-00-00', '2018-03-01', 'Rejected By SDC', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(27, 'N1 Tender', 'dave', 'N1 Hotel', 'Termly Rental', '', 'Closed', '9000', '21', 'Test', 'mnd@kdjkdj.com', '0774427790', '0', '1', '0', '11', '', '', '', '9', '1', '', '', '', '0000-00-00', '2018-04-23', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(28, 'Musarara Primary', 'Joy Napata', 'Musarara Primary', 'Monthly Rental', '', 'Closed', '2000', '4', 'Test', 'dklsklk@gmail.com', '0', 'Online Classifieds', '1', '1', '1', '', '', '', '1', '1', 'Test', '', '', '0000-00-00', '2018-02-27', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(29, 'Ceasar Mine', 'Joy Napata', 'Ceasar Mine', 'Monthly Rental', '', 'Cancelled', '2000', '4', 'Test', 'dklsklk@gmail.com', '0', 'Newspaper Ads', '1', '1', '3', '', '', '', '1', '1', 'Test', '', '', '0000-00-00', '2018-02-27', 'Test', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(30, 'Semi Finals', 'Joy Napata', 'Semaphore Technology', 'Weekly Rental', '', 'Open', '4500', '215', 'Test', 'mandengenda@gmail.com', '07744435779', 'Online Ads', '101', '3', '101', '', '', '', '10', '101', 'Test', '', '', '0000-00-00', '2018-02-27', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(31, 'Semantics', 'Joy Napata', 'Semaphore Tech', 'Daily Rental', '', 'Open', '12000', '11', '', 'mandengenda@gmail.com', '0774435579', 'Conferences', '5', '1', '2', '', '1', '', '3', '11', 'Doug', '', '', '2018-02-23', '2018-02-27', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(32, 'Telecel Short Term', 'Joy Napata', 'Telecel', 'Daily Rental', '', 'Open', '9000', '36', '', 'mandengenda@gmail.com', '07744435579', 'Website', '9', '9', '9', '', '9', '', '9', '9', 'Fuller', '', '', '2018-02-23', '2018-02-27', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(33, 'Tandamanzi 30 laptops', '', 'Tandamanzi Drilling', 'Monthly Rental', '', 'Closed', '45000', '30', '', 'jwhite@tandamanzi.co.za', '0765022020', 'Social Media', '30', '0', '0', '', '0', '', '0', '0', 'Jake White', '', '', '2018-06-15', '0000-00-00', '', '0000-00-00', '0000-00-00', '7759930', '99 Enterprice Rd', 'Eastlea', 'Harare', '', ''),
(34, 'Tonga Hullet 100 Desktops', '', 'Tongaat hullet', 'Monthly Rental', '', 'Open', '300000', '100', '', 'hmusa@tongaat.com', '09318019029021', 'Tender Invitation', '0', '0', '100', '', '0', '', '0', '0', 'Musa', '', '', '2018-04-28', '0000-00-00', '', '0000-00-00', '0000-00-00', '876345', '8 Granges Road ', 'Tongat Estate', 'Chiredzi', '', ''),
(35, 'Bitumen World 20Desktops 30 laptops', '', 'Bitumen WOrld', 'Monthly Rental', '', 'Open', '35000', '50', '', 'nesbert@bitumenworld.co.zw', '9309029023', 'Refferal', '30', '0', '20', '', '0', '', '0', '0', 'Nesbert', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '83832309230', '88 George Drive ', 'Msasa', 'Harare', '', ''),
(36, 'ZC 10 laptops', '', 'Zimbabwe Cricket', 'Monthly Rental', '', 'Open', '3000', '10', '', 'gareth@zc.com', '290190190', 'Website', '10', '0', '0', '', '0', '', '0', '0', 'Gareth', '', '', '0000-00-00', '2018-04-24', '', '0000-00-00', '0000-00-00', '9483494839438', '77 Josiah Chinamano road', 'Harare CBD', 'Harare', '', ''),
(37, 'Salvation Army 30 computers', '', 'The Salvation Army THQ', 'Monthly Rental', '', 'Closed', '500', '30', '', 'admin@salvationarmy.co.zw', '0939230290', 'Email Marketing', '0', '0', '30', '', '0', '', '0', '0', 'Fana', '', '', '2018-04-28', '2018-04-24', '', '2018-04-24', '0000-00-00', '8282329', '99 Avondale road', 'Milton Park', 'Harare', '', ''),
(38, 'Trichard', '', 'Trichard', 'Quartely Rental', '', 'Open', '8999', '10', '', 'dsjhdsjhsj@gmail.com', '9319139', 'Website', '0', '0', '0', '', '0', '', '10', '0', 'kjdkjskj', '', '', '2018-04-27', '2018-04-24', '', '0000-00-00', '0000-00-00', '29329239', 'ksjskj 1929', 'kjdkjdkj', 'Harare', '', ''),
(39, 'SupaFit', 'dave', 'Supafit', 'Monthly Rental', '', 'Open', '35000', '100', '', 'jshajhsj@gmail.com', '09109210910290', 'Television Ads', '0', '0', '100', '', '0', '', '0', '0', 'Desmond', '', '', '2018-04-28', '2018-04-24', '', '0000-00-00', '0000-00-00', '2823832823', '88 George Ave Msasa', '', 'Harare', '', 'David Mandengenda'),
(40, 'Gains', 'dave', 'Gain Cash and Carry', 'Monthly Rental', '', 'Closed', '7800', '70', '', 'jimmy@gains.co.zw', '09102902910', 'Website', '20', '0', '50', '', '0', '', '0', '0', 'Jimmy', '', '', '2018-04-28', '2018-04-24', '', '2018-04-24', '0000-00-00', '732823823', '88 Robert Mugabe Way', 'Harare CBD', 'Harare', '', 'David Mandengenda');

-- --------------------------------------------------------

--
-- Table structure for table `proinstall`
--

CREATE TABLE `proinstall` (
  `Docno` varchar(40) NOT NULL,
  `Total` double NOT NULL,
  `VAT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `Role` varchar(30) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `Role`, `Title`, `FullName`, `Email`, `Status`) VALUES
(1, 'faraimupfuti', '$2y$10$5/p3LG85rnLm7JRo8LCARuGRq/J0GWTNaNkvHJ2wKmfOvrFW5VsxW', '2018-02-20 13:46:26', 'SalesRep', 'IT Guy', 'Farai Mupfuti', 'fmupfuti@innovent.co.za', 'Active'),
(2, 'dave', '$2y$10$8bF.qivofjywuUgYDlrFlObuHwY0iZVPFc55Ck6fAa9zKu6bCqbc6', '2018-02-20 14:17:05', 'Manager', 'IT Admin', 'David Mandengenda', 'mandengenda@gmail.com', 'Active'),
(3, 'Batsirayi', '$2y$10$.XeZXf4feqvs6g50KrfuhOxkAqdQZ1MLQOFlRJ6oLEoKbflcFSTN.', '2018-03-01 19:32:00', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acctable`
--
ALTER TABLE `acctable`
  ADD PRIMARY KEY (`PnNo`);

--
-- Indexes for table `activties`
--
ALTER TABLE `activties`
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `invserialsheader`
--
ALTER TABLE `invserialsheader`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activties`
--
ALTER TABLE `activties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invserialsheader`
--
ALTER TABLE `invserialsheader`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity`
--
ALTER TABLE `opportunity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sales_rep`
--
ALTER TABLE `sales_rep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
