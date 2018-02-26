-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 05:16 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `artist_master`
--

INSERT INTO `artist_master` (`artist_id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `artist_profile`, `country_id`, `state_id`, `city_id`, `pincode`, `artist_status`) VALUES
(118, 'krupi', 'makadiya', '8000167777', 'krupalimakadiya123@gmail.com', '123456', '1518876574OT-0465.JPG', 38, 19, 18, 789654123, 1),
(120, 'ruchi', 'patel', '9875214630', 'ruchi@gmail.com', '456321', '1518853017OT-0459.JPG', 10, 8, 10, 7896541, 0),
(121, 'tarun', 'vaishnani', '785412036', 'tarun@gmail.com', 'tarun', '311248695.jpg', 35, 14, 16, 987456, 0),
(122, 'poonam', 'patel', '7854120', 'email123@gmail.com', '123456', '1518851962images (1).jpg', 35, 14, 16, 123456, 0),
(123, 'priya', 'mk', '78541203', 'priya@gmail.com', 'priya', '1518852046images.jpg', 35, 14, 16, 123456, 0),
(124, 'arjun', 'shah123', '4563217890', 'arjun@gmail.com', '123456', '1518919946images.jpg', 35, 14, 16, 123654, 0);

-- --------------------------------------------------------

--
-- Table structure for table `art_category_master`
--

CREATE TABLE IF NOT EXISTS `art_category_master` (
  `art_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `art_category_name` varchar(50) NOT NULL,
  `art_category_status` int(10) NOT NULL,
  PRIMARY KEY (`art_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `art_category_master`
--

INSERT INTO `art_category_master` (`art_category_id`, `art_category_name`, `art_category_status`) VALUES
(6, 'wood print', 1),
(21, 'jewellary', 0),
(22, 'design', 0),
(23, 'video', 0),
(26, 'photos', 0),
(32, 'metal', 0),
(41, 'fabric paint', 0),
(42, 'dummy1', 0),
(43, 'xyz', 0),
(44, 'krupi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `art_subcategory2_master`
--

CREATE TABLE IF NOT EXISTS `art_subcategory2_master` (
  `art_subcategory2_id` int(20) NOT NULL AUTO_INCREMENT,
  `art_category_id` int(20) NOT NULL,
  `art_subcategory_id` int(20) NOT NULL,
  `art_subcategory2_name` varchar(50) NOT NULL,
  `art_subcategory2_status` int(11) NOT NULL,
  PRIMARY KEY (`art_subcategory2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `art_subcategory2_master`
--

INSERT INTO `art_subcategory2_master` (`art_subcategory2_id`, `art_category_id`, `art_subcategory_id`, `art_subcategory2_name`, `art_subcategory2_status`) VALUES
(1, 42, 0, '', 0),
(2, 42, 1, 'dummy111', 0),
(3, 6, 2, 'wood print11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `art_subcategory_master`
--

CREATE TABLE IF NOT EXISTS `art_subcategory_master` (
  `art_subcategory_id` int(20) NOT NULL AUTO_INCREMENT,
  `art_category_id` varchar(20) NOT NULL,
  `art_subcategory_name` varchar(50) NOT NULL,
  `art_subcategory_status` int(10) NOT NULL,
  PRIMARY KEY (`art_subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `art_subcategory_master`
--

INSERT INTO `art_subcategory_master` (`art_subcategory_id`, `art_category_id`, `art_subcategory_name`, `art_subcategory_status`) VALUES
(1, '42', 'dummy11', 1),
(2, '6', 'wood print1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_status` int(5) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`city_id`, `country_id`, `state_id`, `city_name`, `city_status`) VALUES
(2, 1, 2, 'mumbai', 1),
(3, 2, 1, 'aakkkiii', 1),
(4, 3, 1, 'lockargil', 0),
(5, 5, 1, 'akala', 0),
(6, 1, 2, 'changa', 1),
(7, 1, 1, 'surat', 0),
(8, 2, 2, 'niwkergjtmkl', 0),
(9, 7, 10, 'wedrtg', 0),
(10, 10, 8, '3erty', 1),
(11, 25, 12, 'tempcity', 0),
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
  `country_status` int(5) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_name`, `country_status`) VALUES
(10, 'usa123', 0),
(18, 'Zafrabad...', 1),
(19, 'usa', 1),
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
(49, 'c4', 0),
(50, 'raksh', 0),
(51, 'raksh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `file` varchar(2000) NOT NULL,
  `date` varchar(150) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `event_status` varchar(10) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`event_id`, `title`, `file`, `date`, `image`, `description`, `event_status`) VALUES
(132, 'krupi', 'eventfile-1518852096.pdf', '2018-02-19', 'eventimage-1518852096.jpg', '<p>This</p>\r\n\r\n<p>&nbsp;</p>\r\n', ''),
(134, 'jadioiuytfhgr', 'eventfile-1519116249.pdf', '2018-02-02', 'eventimage-1519116249.jpg', '<p>This ishuijhjhb</p>\r\n\r\n<p>&nbsp;</p>\r\n', ''),
(137, 'vfdev', 'eventfile-1519209767.pdf', '0000-00-00', 'eventimage-1519209767.jpg', '<p>This is m</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', ''),
(139, 'event title', '', '', '', '<p>This is my textarea to be replaced with CKEditor.wshergtjn</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_master`
--

CREATE TABLE IF NOT EXISTS `exhibition_master` (
  `exhibition_id` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `starting_time` varchar(250) NOT NULL,
  `end_time` varchar(250) NOT NULL,
  `date` varchar(100) NOT NULL,
  `fees` int(250) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `exhibition_status` varchar(10) NOT NULL,
  PRIMARY KEY (`exhibition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `exhibition_master`
--

INSERT INTO `exhibition_master` (`exhibition_id`, `title`, `description`, `starting_time`, `end_time`, `date`, `fees`, `address`, `exhibition_status`) VALUES
(1, 'art_formplatform', '<p>art is differnrt platform</p>\r\n', '12:00 AM', '10:00 AM', '02/06/2018 - 03/07/2018', 500785, 'mohbhjbnjn', '1'),
(4, 'nkjhgf', '<p>This is my textarea to be replaced with CKEditor.</p>\r\n', '03:45 PM', '06:15 PM', '02/06/2018 - 02/27/2018', 452, 'kjhgf', '1'),
(5, 'dummy exhibition', '<p>This is my textarea to be replaced with CKEditor.</p>\r\n', '01:00 PM', '11:00 AM', '02/25/2018 - 02/25/2018', 50, 'mota varachha,surat', '0');

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE IF NOT EXISTS `news_master` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(15) NOT NULL,
  `date` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `news_status` varchar(10) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`news_id`, `title`, `date`, `image`, `description`, `news_status`) VALUES
(18, 'krupiiiiiiiiiii', '2018-02-09', '1519106053images.jpg', '<p>This&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', ''),
(19, 'ytry', '2018-02-17', '1519106848images(4).jpg', '<p>This is my textarea to&nbsp;</p>\r\n', ''),
(20, 'fddg', '02/07/2018', '1519209973Penguins.jpg', '<p>This is my textarea to be replaced with CKEditor.</p>\r\n', '0'),
(21, 'dummmy', '02/25/2018', '21.JPG', '<p>sdncfgjnfmndf</p>\r\n', ''),
(22, 'raksh', '02/20/2018', '1519539349OT-0459.JPG', '<p>This is my textarea to be replaced with CKEditor.</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_master`
--

CREATE TABLE IF NOT EXISTS `post_master` (
  `post_id` int(100) NOT NULL AUTO_INCREMENT,
  `art_category_id` int(100) NOT NULL,
  `art_subcategory_id` int(100) NOT NULL,
  `art_subcategory2_id` int(100) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `project_audio` varchar(1000) DEFAULT NULL,
  `project_video` varchar(1000) DEFAULT NULL,
  `Description` varchar(5000) NOT NULL,
  `artist_id` int(20) NOT NULL,
  `post_status` int(20) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `post_master`
--

INSERT INTO `post_master` (`post_id`, `art_category_id`, `art_subcategory_id`, `art_subcategory2_id`, `file_type`, `image`, `project_audio`, `project_video`, `Description`, `artist_id`, `post_status`) VALUES
(31, 21, 1, 2, 'audio', NULL, 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/269943960&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true', '', 'wekrtjgyuklm                                        ', 118, 0),
(35, 22, 1, 2, 'video', NULL, '', 'https://www.youtube.com/embed/5gIpqS-Qpzw', ' ds,flghmkmds,.fm,                                       ', 118, 0),
(49, 22, 0, 0, '', NULL, NULL, 'https://www.youtube.com/embed/8NCdO7uTX_8', '', 118, 0),
(55, 44, 1, 0, 'image', '1519029636B612_20170429_104405.jpg', '', '', 'this is one of the my favrite pic                                        ', 118, 0),
(56, 42, 1, 2, 'image', '1519181039OT-0462.JPG', '', '', '                                        this is flover image', 118, 0),
(57, 6, 2, 3, 'image', '1519528879OT-0456.JPG', '', '', '     this is flower                                                   ', 118, 0),
(58, 6, 2, 3, 'image', '1519529090OT-0459.JPG', '', '', '                                 sdfjkgrt                        ', 118, 0),
(59, 42, 1, 2, 'image', '1519529132OT-0463.JPG', '', '', '     sdsfrgthyuji                                                   ', 118, 0);

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
  `state_status` int(5) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `country_id`, `state_name`, `state_status`) VALUES
(8, 10, 'usa123', 1),
(12, 25, 'tempstate', 1),
(13, 36, 'R1', 0),
(14, 35, 'r1', 0),
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
  `subject` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `suggestion_status` varchar(10) NOT NULL,
  PRIMARY KEY (`suggestion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suggestion_master`
--

INSERT INTO `suggestion_master` (`suggestion_id`, `first_name`, `subject`, `email`, `mobile`, `message`, `suggestion_status`) VALUES
(1, 'keval', 'dummy', 'dummy@gmail.com', 2147483647, 'dummy mesg', '');

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
(12, 'mk', 'mk', '25', '12', '11', '788222633', 'email@gmail.com', '7878827777', '', 0),
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
