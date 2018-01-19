-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 03:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `creative_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `artist_master`
--

CREATE TABLE IF NOT EXISTS `artist_master` (
  `artist_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `art_category_id` int(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `pincode` int(10) NOT NULL,
  `artist_status` int(10) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `artist_master`
--

INSERT INTO `artist_master` (`artist_id`, `first_name`, `last_name`, `art_category_id`, `mobile`, `email`, `password`, `country_id`, `state_id`, `city_id`, `pincode`, `artist_status`) VALUES
(6, 'mk', 'mk', 6, '7878827777', 'email@gmail.com', '12345', 25, 12, 11, 0, 0),
(8, 'krupi', 'makadiya', 25, '8000167777', 'krupi123@gmail.com', '124567', 25, 12, 11, 78965412, 0),
(10, 'sumita', 'patel', 21, '9876789087', 'sumita132@gmail.com', 'sumitak', 10, 8, 10, 12345, 0),
(11, 'aarya', 'maheta', 8, '98767890789', 'aarta123@gmail.com', '123456', 25, 12, 11, 1234567, 1);

-- --------------------------------------------------------

--
-- Table structure for table `art_category_master`
--

CREATE TABLE IF NOT EXISTS `art_category_master` (
  `art_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `art_category_name` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`art_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `art_category_master`
--

INSERT INTO `art_category_master` (`art_category_id`, `art_category_name`, `status`) VALUES
(6, 'wood print', 0),
(8, 'qwertyui', 1),
(18, 'Tatoo123', 1),
(20, 'metallllll', 0),
(21, 'jewellary', 0),
(22, 'design', 0),
(23, 'video', 0),
(24, 'metal', 0),
(25, 'digital art', 0),
(26, 'photos', 0),
(27, 'temp category', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`city_id`, `country_id`, `state_id`, `city_name`, `status`) VALUES
(2, 1, 2, 'mumbai', 1),
(3, 2, 1, 'aakkkiii', 1),
(4, 3, 1, 'lockargil', 0),
(5, 5, 1, 'akala', 0),
(6, 1, 2, 'changa', 1),
(7, 1, 1, 'surat', 0),
(8, 2, 2, 'niwkergjtmkl', 0),
(9, 7, 10, 'wedrtg', 0),
(10, 10, 8, '3erty', 1),
(11, 25, 12, 'tempcity', 1),
(12, 40, 20, 'kachchhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_master`
--

CREATE TABLE IF NOT EXISTS `comment_master` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comment_master`
--

INSERT INTO `comment_master` (`comment_id`, `user_id`, `comment`, `status`) VALUES
(1, 3, 'temp comment this is for practice', 0),
(2, 10, 'this is first comment from cretive click', 1),
(3, 10, 'this is first comment from cretive click', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_name`, `status`) VALUES
(10, 'usa', 1),
(18, 'Zafrabad...', 1),
(19, '12345678', 1),
(20, 'waerjkh', 1),
(21, 'mk123', 1),
(22, 'kerjnkm', 1),
(23, 'mk', 1),
(25, 'temp', 1),
(27, 'temp1234', 1),
(28, 'India', 1),
(29, 'afghansitan', 0),
(30, 'pakistan', 0),
(31, 'xyz', 0),
(32, 'abc', 0),
(33, 'qerert', 0),
(34, 'qwert', 0),
(35, 'China', 0),
(36, 'rasiya', 0),
(37, 'rashiya', 0),
(38, 'aafrica', 0),
(39, 'elkkkkkkkkkkkkk', 0),
(40, 'kachchhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_event_master`
--

CREATE TABLE IF NOT EXISTS `news_event_master` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `state_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL,
  `state_name` varchar(40) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `country_id`, `state_name`, `status`) VALUES
(8, 10, 'usa123', 1),
(12, 25, 'tempstate', 1),
(13, 36, 'R1', 0),
(14, 35, 'C1', 0),
(15, 30, 'p1', 0),
(16, 36, 'R1', 0),
(17, 35, 'C1', 1),
(18, 30, 'p1', 0),
(19, 38, 'aa1', 0),
(20, 40, 'kachchhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `country_id` varchar(10) NOT NULL,
  `state_id` varchar(10) NOT NULL,
  `city_id` varchar(10) NOT NULL,
  `pincode` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_status` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `first_name`, `last_name`, `country_id`, `state_id`, `city_id`, `pincode`, `email`, `mobile`, `password`, `user_status`) VALUES
(12, 'mk', 'mk', '25', '12', '11', '788222633', 'email@gmail.com', '7878827777', '', 1),
(13, 'Khushal123', 'Kachchhi', '25', '12', '11', '395006', 'khushal123@gmail.com', '7405469477', '', 0),
(14, 'ssdfg', 'sdft', '25', '12', '11', '12345', 'email@gmail.com', '123456789', '', 1),
(15, 'dfgh', 'sdfgfhyu', '25', '12', '11', '12345467', 'email@gmail.com', '1278789211', '1234567', 1),
(24, 'Khushal', 'kachchhi', '40', '20', '12', 'kachchhi', 'kachchhi', 'kachchhi', 'kachchhi', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
