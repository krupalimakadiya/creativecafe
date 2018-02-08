-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 07:35 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `artist_master`
--

INSERT INTO `artist_master` (`artist_id`, `first_name`, `last_name`, `art_category_id`, `mobile`, `email`, `password`, `country_id`, `state_id`, `city_id`, `pincode`, `artist_status`) VALUES
(6, 'mk', 'mk', 6, '7878827777', 'email@gmail.com', '12345', 25, 12, 11, 0, 1),
(8, 'krupi', 'makadiya', 25, '8000167777', 'krupi123@gmail.com', '124567', 25, 12, 11, 78965412, 1),
(10, 'sumita', 'patel', 21, '9876789087', 'sumita132@gmail.com', 'sumitak', 10, 8, 10, 12345, 0),
(11, 'aarya', 'maheta', 8, '98767890789', 'aarta123@gmail.com', '123456', 25, 12, 11, 1234567, 1),
(42, 'mkgroup', 'makadiya', 21, '8000167777', 'email@gmail.com', '123456sdfg', 10, 8, 10, 3498088, 0),
(62, 'MISHA', 'pandit', 26, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(63, 'MISHA', 'pandit', 26, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(64, 'Mishti', 'bhalla', 27, '9874521360', 'anu.mk@gmail.com', '123', 25, 12, 11, 395006, 0),
(65, 'Ayaan', 'kachchhi', 26, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(66, 'Anjal', 'khueana', 23, '9874521360', 'anu.mk@gmail.com', '123', 25, 12, 11, 395006, 0),
(67, 'Atharv', 'podwal', 24, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(68, 'Asad', 'chhalar', 26, '9874521360', 'anu.mk@gmail.com', '123', 25, 12, 11, 395006, 0),
(69, 'aasdfj', 'ertykl', 8, 'qwerktyto', 'admin@gmail.com', 'qwerty', 10, 8, 10, 123454, 0),
(70, 'MISHA', 'pandit', 28, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(71, 'MISHA', 'pandit', 28, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(72, 'Mishti', 'bhalla', 27, '9874521360', 'anu.mk@gmail.com', '123', 25, 12, 11, 395006, 0),
(73, 'Ayaan', 'kachchhi', 23, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(74, 'Anjal', 'khueana', 25, '9874521360', 'anu.mk@gmail.com', '123', 25, 12, 11, 395006, 0),
(75, 'Atharv', 'podwal', 26, '7405469477', 'khushal1283@gmail.com', '123', 28, 21, 7, 395006, 0),
(76, 'Asad', 'chhalar', 24, '9874521360', 'anu.mk@gmail.com', '123', 25, 12, 11, 395006, 0),
(77, 'mk', 'mk', 6, '9874563210', 'email@gmail.com', '456321', 10, 8, 10, 785412, 0),
(78, 'asdfrk', 'jkdnfkjh', 6, '9879959790', 'admin@gmail.com', '1`234', 10, 8, 10, 541236, 0),
(79, 'dummy', 'dummy', 6, '9898989898', 'admin@gmail.com', '45621', 25, 12, 11, 785412, 0);

-- --------------------------------------------------------

--
-- Table structure for table `art_category_master`
--

CREATE TABLE IF NOT EXISTS `art_category_master` (
  `art_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `art_category_name` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`art_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

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
(27, 'temp category', 0),
(28, 'eating', 0),
(29, 'jewellary', 0),
(30, 'design', 0),
(31, 'video', 0),
(32, 'metal', 0),
(33, 'digital art', 0),
(34, 'photos', 0),
(35, 'jewellary', 0),
(36, 'design', 0),
(37, 'video', 0),
(38, 'metal', 0),
(39, 'digital art', 0),
(40, 'photos', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(12, 40, 20, 'kachchhi', 0),
(13, 28, 21, 'surat', 0),
(14, 25, 15, 'lahorcity', 0),
(15, 36, 13, 'kalu', 0),
(16, 35, 14, 'kabulcity', 0),
(17, 30, 15, 'MANCHURIAN', 0),
(18, 38, 19, 'pasta', 0),
(19, 28, 21, 'surat', 0),
(20, 25, 15, 'lahorcity', 0),
(21, 36, 13, 'kalu', 0),
(22, 35, 14, 'kabulcity', 0),
(23, 30, 15, 'MANCHURIAN', 0),
(24, 38, 19, 'pasta', 0);

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
(1, 3, 'temp comment this is for practice', 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_name`, `status`) VALUES
(10, 'usa', 0),
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
(40, 'kachchhi', 0),
(41, 'country', 0),
(42, 'kinu', 0),
(43, 'asgdbrftkm', 0),
(44, 'azsdfrnkn', 0),
(45, 'jsderoyk', 0),
(46, 'sdfrgtkyj', 0),
(47, 'c23', 0),
(48, 'c2', 0),
(49, 'c4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(800) NOT NULL,
  `file` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE IF NOT EXISTS `news_master` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(15) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `news_status` varchar(10) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`news_id`, `title`, `description`, `image`, `news_status`) VALUES
(2, '', 'krupi', '', ''),
(3, '', 'sandaesjkdn', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_review_master`
--

CREATE TABLE IF NOT EXISTS `site_review_master` (
  `site_review_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `review_message` varchar(800) NOT NULL,
  PRIMARY KEY (`site_review_id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
(20, 40, 'kachchhi', 0),
(21, 28, 'gujarat', 0),
(22, 36, 'R1', 0),
(23, 35, 'C1', 0),
(24, 30, 'p1', 0),
(25, 38, 'aa1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_master`
--

CREATE TABLE IF NOT EXISTS `suggestion_master` (
  `suggestion_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `suggestion_status` varchar(10) NOT NULL,
  PRIMARY KEY (`suggestion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `first_name`, `last_name`, `country_id`, `state_id`, `city_id`, `pincode`, `email`, `mobile`, `password`, `user_status`) VALUES
(12, 'mk', 'mk', '25', '12', '11', '788222633', 'email@gmail.com', '7878827777', '', 1),
(13, 'Khushal123', 'Kachchhi', '25', '12', '11', '395006', 'khushal123@gmail.com', '7405469477', '', 0),
(14, 'ssdfg', 'sdft', '25', '12', '11', '12345', 'email@gmail.com', '123456789', '', 1),
(15, 'dfgh', 'sdfgfhyu', '25', '12', '11', '12345467', 'email@gmail.com', '1278789211', '1234567', 1),
(26, 'Khushal', 'kachchhi', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '123', 0),
(27, 'Anvesha', 'khueana', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '123', 0),
(28, 'anuradha', 'podwal', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '123', 0),
(29, 'manushi', 'chhalar', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '123', 0),
(30, 'arjun', 'pandit', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '123', 0),
(31, 'mihika', 'bhalla', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '123', 0),
(32, 'mak', 'msdsnk', '10', '8', '10', '578866', 'email@gmail.com', '9879959790', '451235', 0),
(33, 'makadiya', 'krupi', '10', '8', '10', '2387768', 'krupalimakadiya123@gmail.com', '895499098', '1234567', 0),
(34, 'Khushal', 'kachchhi', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '', 0),
(35, 'Anvesha', 'khueana', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '', 0),
(36, 'anuradha', 'podwal', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '', 0),
(37, 'manushi', 'chhalar', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '', 0),
(38, 'arjun', 'pandit', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '', 0),
(39, 'mihika', 'bhalla', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '', 0),
(40, 'Khushal', 'kachchhi', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '123', 0),
(41, 'Anvesha', 'khueana', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '123', 0),
(42, 'anuradha', 'podwal', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '123', 0),
(43, 'manushi', 'chhalar', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '123', 0),
(44, 'arjun', 'pandit', '28', '21', '7', '395006', 'khushal1283@gmail.com', '7405469477', '123', 0),
(45, 'mihika', 'bhalla', '25', '12', '11', '395006', 'anu.mk@gmail.com', '9874521360', '123', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
