-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2018 at 03:25 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nova_airline_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE IF NOT EXISTS `admin_tb` (
  `ID` int(22) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(22) NOT NULL,
  `PASSWORD` varchar(22) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `book_tb`
--

CREATE TABLE IF NOT EXISTS `book_tb` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `BOOK_NO` varchar(100) NOT NULL,
  `FLY_NO` varchar(100) NOT NULL,
  `COSTUMER_ID` varchar(100) NOT NULL,
  `BOOK_LEVEL` varchar(100) NOT NULL,
  `BOOK_STATE` varchar(100) NOT NULL,
  `BOOK_DATE` varchar(100) NOT NULL,
  `AMOUNT` varchar(100) NOT NULL,
  `ACCOUNT` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `book_tb`
--

INSERT INTO `book_tb` (`ID`, `BOOK_NO`, `FLY_NO`, `COSTUMER_ID`, `BOOK_LEVEL`, `BOOK_STATE`, `BOOK_DATE`, `AMOUNT`, `ACCOUNT`) VALUES
(1, '3969', '5454', '54', 'Ø¯Ø±Ø¬Ø© Ø§ÙˆÙ„Ù‰', 'Ù…Ø¤ÙƒØ¯', '2018-10-31', 'Ø°Ù‡Ø§Ø¨', '6565'),
(2, '9849', '6565', '1692', 'Ø¯Ø±Ø¬Ø© Ø§ÙˆÙ„Ù‰', 'Ù…Ø¤ÙƒØ¯', '2018-10-23', 'Ø°Ù‡Ø§Ø¨', '65');

-- --------------------------------------------------------

--
-- Table structure for table `costumer_tb`
--

CREATE TABLE IF NOT EXISTS `costumer_tb` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `COSTUMER_ID` varchar(100) NOT NULL,
  `COSTUMER_NAME` varchar(100) NOT NULL,
  `NATIONALITY` varchar(100) NOT NULL,
  `NAT_TYPE` varchar(100) NOT NULL,
  `ID_NO` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `NATIONAL_ID` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(49) NOT NULL,
  `JOB` varchar(40) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `costumer_tb`
--

INSERT INTO `costumer_tb` (`id`, `COSTUMER_ID`, `COSTUMER_NAME`, `NATIONALITY`, `NAT_TYPE`, `ID_NO`, `ADDRESS`, `PHONE`, `NATIONAL_ID`, `EMAIL`, `JOB`, `USERNAME`, `PASSWORD`) VALUES
(1, '1692', 'aklsdhhasd', 'Ø³Ù…Ù†ÙŠØ§Ø¨', 'Ù…Ù†Ø³ØªØ¨', '73482', 'Ù…Ù†Ø³ØªÙŠØ¨Ù…ØªØ³ÙŠØ¨Ù…Ù†', '9432', NULL, 'jhasjk@jdkjhf', 'kdad', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destination_tb`
--

CREATE TABLE IF NOT EXISTS `destination_tb` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Destination_NAME` varchar(200) NOT NULL,
  `Destination_TYPE` varchar(200) DEFAULT NULL,
  `DESCRIPTION` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `destination_tb`
--

INSERT INTO `destination_tb` (`ID`, `Destination_NAME`, `Destination_TYPE`, `DESCRIPTION`) VALUES
(1, 'Ø§Ù„Ø§Ø¨ÙŠØ¶', NULL, 'ØªØºÙØªÙ'),
(2, 'Ø§Ù„Ø®Ø±Ø·ÙˆÙ…', NULL, 'ØªÙ…Ù†Ø³ØªÙ…Ø¨Ù†');

-- --------------------------------------------------------

--
-- Table structure for table `fly_tb`
--

CREATE TABLE IF NOT EXISTS `fly_tb` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `FLY_NO` varchar(100) NOT NULL,
  `FROM` varchar(100) NOT NULL,
  `TO` varchar(100) NOT NULL,
  `SITE_NO1` varchar(100) NOT NULL,
  `SITE_NO2` varchar(1000) NOT NULL,
  `SITE_NO3` varchar(100) NOT NULL,
  `PLANE_TYPE` varchar(100) NOT NULL,
  `AIRPORT_FROM` varchar(100) NOT NULL,
  `AIRPORT_TO` varchar(100) NOT NULL,
  `FLY_DATE` varchar(100) NOT NULL,
  `LINE` varchar(100) NOT NULL,
  `price_l1` int(100) NOT NULL,
  `price_l2` int(100) NOT NULL,
  `price_l3` int(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fly_tb`
--


-- --------------------------------------------------------

--
-- Table structure for table `line_tb`
--

CREATE TABLE IF NOT EXISTS `line_tb` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `LINE` varchar(100) NOT NULL,
  `FROM` varchar(100) NOT NULL,
  `TO` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `line_tb`
--

