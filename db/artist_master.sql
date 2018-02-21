-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2018 at 05:06 PM
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
-- Table structure for table `artist_master`
--

CREATE TABLE IF NOT EXISTS `artist_master` (
  `artist_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `artist_profile` varchar(80) NOT NULL,
  `country_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `pincode` int(10) NOT NULL,
  `artist_status` int(10) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `artist_master`
--

INSERT INTO `artist_master` (`artist_id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `artist_profile`, `country_id`, `state_id`, `city_id`, `pincode`, `artist_status`) VALUES
(6, '', '', '', '', '12345', '', 28, 21, 19, 0, 1),
(10, 'sumita', 'patel', '9876789087', 'sumita132@gmail.com', 'sumitak', '', 10, 8, 10, 12345, 0),
(78, 'asdfrk', 'jkdnfkjh', '9879959790', 'admin@gmail.com', '1`234', '', 10, 8, 10, 541236, 0),
(79, 'dummy', 'dummy', '9898989898', 'admin@gmail.com', '45621', '', 25, 12, 11, 785412, 0),
(80, 'temp', 'temp', '7845213652', 'temp@gmail.com', 'temp', '', 45, 12, 15, 785412, 0),
(82, 'krupali makadiya', 'makadiya', ' 7878827777', 'krupalimakadiya123@gmail.com', '12345', '', 38, 19, 18, 394101, 0),
(85, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(86, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(87, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(88, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(89, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(90, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(91, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(92, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0),
(93, 'dummy', 'dummy', '7854123690', 'dummy@gmail.com', 'dummy', '', 28, 21, 13, 394101, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
