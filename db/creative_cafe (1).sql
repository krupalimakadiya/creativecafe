-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 05:32 PM
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
  `user_type` varchar(11) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `artist_master`
--

INSERT INTO `artist_master` (`artist_id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `artist_profile`, `country_id`, `state_id`, `city_id`, `pincode`, `artist_status`, `user_type`) VALUES
(135, 'krupali', 'makadiya', '8000167777', 'krupali@gmail.com', '123456', '1522128105c2d359657eeb468513f22138bd24cb15.jpg', 55, 31, 27, 394101, 1, 'artist'),
(136, 'kinu', 'makadiya', '8530225171', 'kinu.makadiya@gmail.com', '123456', '152213293813.jpg', 55, 31, 26, 394101, 0, 'artist'),
(137, 'mansi', 'kachchhi', '7405469477', 'mansikachchhi171@gmail.com', '123456', '', 55, 33, 240, 395006, 0, 'artist'),
(138, 'vidhi ', 'golakiya', '7604026105', 'vidhigolakiya@gmail.com', '123', '', 55, 31, 33, 394102, 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `art_category_master`
--

CREATE TABLE IF NOT EXISTS `art_category_master` (
  `art_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `art_category_name` varchar(50) NOT NULL,
  `art_category_status` int(10) NOT NULL,
  `art_sub_cat_id` int(10) NOT NULL,
  `art_category_leval` int(10) NOT NULL,
  `url_code` varchar(200) NOT NULL,
  PRIMARY KEY (`art_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `art_category_master`
--

INSERT INTO `art_category_master` (`art_category_id`, `art_category_name`, `art_category_status`, `art_sub_cat_id`, `art_category_leval`, `url_code`) VALUES
(59, 'photography', 1, 0, 1, 'gVZhtxpDOTR6AFk7'),
(63, 'animal', 1, 59, 2, 'wXVC9o1jNf8bWFQJ'),
(64, 'black&white', 1, 59, 2, 'meYVtsPK157hc8xj'),
(65, 'nature', 1, 59, 2, 'A2WzNp4I1ntj3Hwc'),
(66, 'novel', 1, 60, 2, 'LzBxi7YV0h8Wseuq'),
(67, 'music', 1, 0, 1, 'uqGD67kF4NCh583g'),
(68, 'rock', 1, 67, 2, '2kZ1ioLns4h9Ypfc'),
(69, 'hip hop', 1, 67, 2, 'slGyZOfxAItBcgv0'),
(70, 'pop', 1, 67, 2, 'htLukezVd6I1a7yQ'),
(71, 'Dance', 1, 0, 1, 'NMz95gDrufUs7oWT'),
(72, 'salsa', 1, 71, 2, 'd8vzk1H6utNnBr7m'),
(73, 'Break dance', 1, 71, 2, 'OkdXpgHQb9MKeF8n'),
(74, 'Art', 1, 0, 1, 'Ad2VloCJ8pYjnSRy'),
(75, 'design', 1, 74, 2, 'VsSjwDWo7OzNc1xM'),
(76, 'tatoo', 1, 74, 2, 'pQPXWaxjm7NE9Yy5'),
(77, 'cartoon', 1, 74, 2, 'E3guWZdrAvROh7iP'),
(78, 'sketch', 1, 74, 2, 'ACvnI194Fb8KVDmN'),
(79, 'Design', 1, 0, 1, '6RVrIUaOfiBq519Y'),
(80, 'Fabric paint', 1, 79, 2, 'bdAxtkq5c28SywGY'),
(81, 'Graphics Design', 1, 79, 2, 'YVzbDIvrJgOLCcRA'),
(82, 'Fashion', 1, 59, 2, 'u8hHGajFPJikOWTC'),
(83, 'Food', 1, 59, 2, 'abBHP1wj9YxUpG0E'),
(84, 'Aerial', 1, 59, 2, 'lsYmEdSyLI4K0bqG'),
(85, 'Pre-wedding', 1, 59, 2, 'lzFeHY9M1gIPRkJq');

-- --------------------------------------------------------

--
-- Table structure for table `bid_master`
--

CREATE TABLE IF NOT EXISTS `bid_master` (
  `bid_id` int(10) NOT NULL AUTO_INCREMENT,
  `exhibition_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bidamount` int(10) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `bid_status` int(10) NOT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=302 ;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`city_id`, `country_id`, `state_id`, `city_name`, `city_status`) VALUES
(26, 55, 31, 'Ahmedabad', 1),
(27, 55, 31, 'Surat', 1),
(28, 55, 31, 'Vadodara', 1),
(29, 55, 31, 'Rajkot', 1),
(30, 55, 31, 'Gandhinagar', 1),
(31, 55, 31, 'Jamnagar', 1),
(32, 55, 31, 'Junagadh', 1),
(33, 55, 31, 'Bhavnagar', 1),
(34, 55, 31, 'Bhuj', 1),
(35, 55, 31, 'Navsari', 1),
(36, 55, 31, 'Dwarka', 1),
(37, 55, 31, 'Anand', 1),
(38, 55, 31, 'Patan', 1),
(39, 55, 31, 'Gandhidham', 1),
(40, 55, 31, 'Nadiad', 1),
(41, 55, 31, 'Khambhat', 1),
(42, 55, 31, 'Ankleshwar', 1),
(43, 55, 31, 'Palitana', 1),
(44, 55, 31, 'Porbandar', 1),
(45, 55, 31, 'Veraval', 1),
(46, 55, 31, 'Morbi', 1),
(47, 55, 31, 'Vapi', 1),
(48, 55, 31, 'Godhra', 1),
(49, 55, 31, 'Gondal', 1),
(50, 55, 31, 'Palanpur', 1),
(51, 55, 31, 'Vyara', 1),
(52, 55, 31, 'Bharuch', 1),
(53, 55, 31, 'Mehsana', 1),
(54, 55, 31, 'Bardoli', 1),
(55, 55, 31, 'Jetpur', 1),
(56, 55, 31, 'Amreli', 1),
(57, 55, 44, 'New Delhi', 1),
(58, 55, 44, 'Gurgaon', 1),
(59, 55, 44, 'Connaught', 1),
(60, 55, 44, 'Karol Bagh', 1),
(61, 55, 44, 'Mehrauli', 1),
(62, 55, 44, 'Chanakyapuri', 1),
(63, 55, 44, 'Ghaziabad', 1),
(64, 55, 44, 'Dwarka', 1),
(65, 55, 44, 'Nangloi', 1),
(66, 55, 44, 'Faridabad', 1),
(67, 55, 44, 'Shahdara', 1),
(68, 55, 44, 'Najafgarh', 1),
(69, 55, 44, 'Rohini', 1),
(70, 55, 44, 'Shalimar Bagh', 1),
(71, 55, 38, 'Mumbai', 1),
(72, 55, 38, 'Nashik', 1),
(73, 55, 38, 'Aurangabad', 1),
(74, 55, 38, 'Nagpur', 1),
(75, 55, 38, 'Solapur', 1),
(76, 55, 38, 'Thane', 1),
(77, 55, 38, 'Kalyan', 1),
(78, 55, 38, 'Navi Mumbai', 1),
(79, 55, 38, 'Kolhapur', 1),
(80, 55, 38, 'Pimpri-Chinchwad', 1),
(81, 55, 38, 'Dombivli', 1),
(82, 55, 38, 'Malegaon', 1),
(83, 55, 38, 'Vasai-Virar', 1),
(84, 55, 38, 'Jalgaon', 1),
(85, 55, 38, 'Panvel', 1),
(86, 55, 38, 'Nagpur', 1),
(87, 55, 34, 'Jaipur', 1),
(88, 55, 34, 'Udaipur', 1),
(89, 55, 34, 'Jodhpur', 1),
(90, 55, 34, 'Kota', 1),
(91, 55, 34, 'Bikaner', 1),
(92, 55, 34, 'Ajmer', 1),
(93, 55, 34, 'Alwar', 1),
(94, 55, 34, 'Jaisalmer', 1),
(95, 55, 34, 'Chittorgarh', 1),
(96, 55, 34, 'Kishangarh', 1),
(97, 55, 34, 'Pushkar', 1),
(98, 55, 34, 'Beawar', 1),
(99, 55, 34, 'Bharatpur', 1),
(100, 55, 34, 'Amer', 1),
(101, 55, 34, 'Bundi', 1),
(102, 55, 34, 'Bilara', 1),
(103, 55, 34, 'Nathdwara', 1),
(104, 55, 34, 'Abu', 1),
(105, 55, 30, 'Bhopal', 1),
(106, 55, 30, 'Indore', 1),
(107, 55, 30, 'Jabalpur', 1),
(108, 55, 30, 'Ujjain', 1),
(109, 55, 30, 'Gwalior', 1),
(110, 55, 30, 'Satna', 1),
(111, 55, 30, 'Panna', 1),
(112, 55, 30, 'Rewa', 1),
(113, 55, 30, 'Hosangabad', 1),
(114, 55, 46, 'Jammu', 1),
(115, 55, 46, 'Srinagar', 1),
(116, 55, 46, 'Leh Ladakh', 1),
(117, 55, 46, 'Gulmarg', 1),
(118, 55, 46, 'Sonamarg', 1),
(119, 55, 46, 'Pahalgam', 1),
(120, 55, 43, 'Panaji', 1),
(121, 55, 43, 'Margao', 1),
(122, 55, 43, 'Calangute', 1),
(123, 55, 43, 'Mapusa', 1),
(124, 55, 43, 'Ponda', 1),
(125, 55, 43, 'Candolim', 1),
(126, 55, 43, 'Old Goa', 0),
(127, 55, 43, 'Anjuna', 0),
(128, 55, 43, 'Baga', 0),
(129, 55, 43, 'Canacona', 0),
(130, 55, 43, 'Bardez', 0),
(131, 55, 43, 'Mormugao', 0),
(132, 55, 43, 'Salcete', 0),
(133, 55, 43, 'Colva', 0),
(134, 55, 53, 'Gangtok', 0),
(135, 55, 53, 'Namchi', 0),
(136, 55, 53, 'Pelling', 0),
(137, 55, 53, 'Gyalshing', 0),
(138, 55, 53, 'Lachung', 0),
(139, 55, 53, 'Yuksom', 0),
(140, 55, 53, 'Ravangla', 0),
(141, 55, 53, 'Jorethang', 0),
(142, 55, 53, 'Singtam', 0),
(143, 55, 53, 'Rangpo', 0),
(144, 55, 53, 'Rinchenpong', 0),
(145, 55, 53, 'Zuluk', 0),
(146, 55, 28, 'Thiruvananthapuram', 0),
(147, 55, 28, 'Kochi', 0),
(148, 55, 28, 'Kozhikode', 0),
(149, 55, 28, 'Thrissur', 0),
(150, 55, 28, 'Alleppey', 0),
(151, 55, 28, 'Kollam', 0),
(152, 55, 28, 'Kannur', 0),
(153, 55, 28, 'Palakkad', 0),
(154, 55, 28, 'Kottayam', 0),
(155, 55, 28, 'Varkala', 0),
(156, 55, 28, 'Ernakulam', 0),
(157, 55, 28, 'Munnar', 0),
(158, 55, 29, 'Chennai', 0),
(159, 55, 29, 'Coimbatore', 0),
(160, 55, 29, 'Madurai', 0),
(161, 55, 29, 'Salem', 0),
(162, 55, 29, 'Thanjavur', 0),
(163, 55, 29, 'Vellore', 0),
(164, 55, 29, 'Tiruchirappalli', 0),
(165, 55, 29, 'Tirunelveli', 0),
(166, 55, 29, 'Erode', 0),
(167, 55, 29, 'Dindigul', 0),
(168, 55, 29, 'Kanchipuram', 0),
(169, 55, 56, 'Hyderabad', 0),
(170, 55, 56, 'Warangal', 0),
(171, 55, 56, 'Khammam', 0),
(172, 55, 56, 'Karimnagar', 0),
(173, 55, 56, 'Suryapet', 0),
(174, 55, 56, 'Siddipet', 0),
(175, 55, 56, 'Ramagundam', 0),
(176, 55, 56, 'Nalgonda', 0),
(177, 55, 56, 'Karimnagar', 0),
(178, 55, 56, 'Sangareddy', 0),
(179, 55, 56, 'Nizamabad', 0),
(180, 55, 56, 'Miryalaguda', 0),
(181, 55, 45, 'Shimla', 0),
(182, 55, 45, 'Mandi', 0),
(183, 55, 45, 'Dharamshala', 0),
(184, 55, 45, 'Manali', 0),
(185, 55, 45, 'Chamba', 0),
(186, 55, 45, 'Nahan', 0),
(187, 55, 45, 'Bilaspur', 0),
(188, 55, 45, 'Kasauli', 0),
(189, 55, 45, 'Dalhousie', 0),
(190, 55, 45, 'Solan', 0),
(191, 55, 45, 'Parwanoo', 0),
(192, 55, 45, 'Palampur', 0),
(193, 55, 45, 'Kullu', 0),
(194, 55, 54, 'Itanagar', 0),
(195, 55, 54, 'Basar', 0),
(196, 55, 54, 'Hawai', 0),
(197, 55, 54, 'Changlang', 0),
(198, 55, 54, 'Lumla', 0),
(199, 55, 54, 'Etalin', 0),
(200, 55, 54, 'Gandhigram', 0),
(201, 55, 47, 'Gurgaon', 0),
(202, 55, 47, 'Rewari', 0),
(203, 55, 47, 'Rohtak', 0),
(204, 55, 47, 'Chandigarh', 0),
(205, 55, 47, 'Hisar', 0),
(206, 55, 47, 'Karnal', 0),
(207, 55, 47, 'Faridabad', 0),
(208, 55, 47, 'Panchkula', 0),
(209, 55, 37, 'Jalandhar', 0),
(210, 55, 37, 'Amritsar', 0),
(211, 55, 37, 'Ludhiana', 0),
(212, 55, 37, 'Chandigarh', 0),
(213, 55, 37, 'Bathinda', 0),
(214, 55, 37, 'Patiala', 0),
(215, 55, 37, 'Hoshiarpur', 0),
(216, 55, 32, 'Lucknow', 0),
(217, 55, 32, 'Kanpur', 0),
(218, 55, 32, 'Allahabad', 0),
(219, 55, 32, 'Agra', 0),
(220, 55, 32, 'Varanasi', 0),
(221, 55, 32, 'Bareilly', 0),
(222, 55, 32, 'Meerut', 0),
(223, 55, 48, 'Raipur', 0),
(224, 55, 48, 'Bilaspur', 0),
(225, 55, 48, 'Bhilai', 0),
(226, 55, 48, 'Korba', 0),
(227, 55, 48, 'Jagdalpur', 0),
(228, 55, 48, 'Durg', 0),
(229, 55, 48, 'Ambikapur', 0),
(230, 55, 48, 'Raigarh', 0),
(231, 55, 42, 'Dehradun', 0),
(232, 55, 42, 'Haridwar', 0),
(233, 55, 42, 'Rishikesh', 0),
(234, 55, 42, 'Mussoorie', 0),
(235, 55, 42, 'Haldwani', 0),
(236, 55, 42, 'Pauri', 0),
(237, 55, 42, 'Roorkee', 0),
(238, 55, 42, 'Nainital', 0),
(239, 55, 42, 'Ranikhet', 0),
(240, 55, 33, 'Visakhapatnam', 0),
(241, 55, 33, 'Tirupati', 0),
(242, 55, 33, 'Vijayawada', 0),
(243, 55, 33, 'Kakinada', 0),
(244, 55, 33, 'Rajahmundry', 0),
(245, 55, 33, 'Guntur', 0),
(246, 55, 33, 'Eluru', 1),
(247, 55, 35, 'Bangalore', 1),
(248, 55, 35, 'Mangalore', 1),
(249, 55, 35, 'Hubli', 1),
(250, 55, 35, 'Gulbarga', 1),
(251, 55, 35, 'Bijapur', 1),
(252, 55, 35, 'Belgaum', 1),
(253, 55, 36, 'Bhubaneswar', 1),
(254, 55, 36, 'Sambalpur', 1),
(255, 55, 36, 'Cuttack', 1),
(256, 55, 36, 'Berhamur', 1),
(257, 55, 36, 'Roureka', 1),
(258, 53, 61, 'Yokohama', 1),
(259, 53, 61, 'Kawasaki', 1),
(260, 53, 61, 'Kamakura', 1),
(261, 53, 61, 'Yokosuka', 1),
(262, 53, 61, 'Odawara', 1),
(263, 53, 58, 'Kobe', 1),
(264, 53, 58, 'Himeji', 1),
(265, 53, 58, 'Nishinomiya', 1),
(266, 53, 58, 'Akashi', 1),
(267, 53, 58, 'Ashiya', 1),
(268, 53, 59, 'Daito', 1),
(269, 53, 59, 'Fuijidera', 1),
(270, 53, 59, 'Habijino', 1),
(271, 53, 59, 'Hannan', 1),
(272, 53, 59, 'Hirakata', 1),
(273, 53, 57, 'Nara', 1),
(274, 53, 57, 'Naha', 1),
(275, 53, 57, 'Yokohama', 1),
(276, 53, 57, 'Hiroshima', 1),
(277, 101, 62, 'Los Angeles', 1),
(278, 101, 62, 'San Francisco', 1),
(279, 101, 62, 'San Diego', 1),
(280, 101, 62, 'Sacramento', 1),
(281, 101, 62, 'San Jose', 1),
(282, 101, 63, 'Orlando', 1),
(283, 101, 63, 'Miami', 1),
(284, 101, 63, 'Jacksonvill', 1),
(285, 101, 63, 'Tampa', 1),
(286, 101, 63, 'Fort Lauderdale', 1),
(287, 101, 64, 'Boston', 1),
(288, 101, 64, 'Worcester', 1),
(289, 101, 64, 'Cambridge', 1),
(290, 101, 64, 'Springfield', 1),
(291, 101, 64, 'Salem', 1),
(292, 101, 65, 'Denver', 1),
(293, 101, 65, 'Colorado', 1),
(294, 101, 65, 'Boulder', 1),
(295, 101, 65, 'Aurora', 1),
(296, 101, 65, 'Fort Collins', 1),
(297, 101, 66, 'Chicago', 1),
(298, 101, 66, 'Springfield', 1),
(299, 101, 66, 'Peoria', 1),
(300, 101, 66, 'Rockford', 1),
(301, 101, 66, 'Champaign', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_master`
--

CREATE TABLE IF NOT EXISTS `comment_master` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) NOT NULL,
  `artist_id` int(10) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `comment_master`
--

INSERT INTO `comment_master` (`comment_id`, `comment`, `artist_id`, `post_id`, `user_name`, `comment_date`) VALUES
(29, 'superb click ', 136, 83, 'kinu makadiya', '2018-03-27 08:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_master`
--

CREATE TABLE IF NOT EXISTS `contactus_master` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `contact_status` int(10) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contactus_master`
--

INSERT INTO `contactus_master` (`contact_id`, `first_name`, `subject`, `email`, `mobile`, `message`, `contact_status`) VALUES
(3, 'krupali makadiya', 'greetings', 'krupalimakadiya123@gmail.com', 2147483647, 'this is superb website and provide different different art ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL,
  `country_status` int(5) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_name`, `country_status`) VALUES
(53, 'Japan', 1),
(54, 'China', 1),
(55, 'India', 1),
(56, 'Indonesia', 1),
(57, 'Vietnam', 1),
(58, 'Thailand', 1),
(59, 'Singapore', 1),
(60, 'Philippines', 1),
(61, 'Hong Kong', 1),
(62, 'North Korea', 1),
(63, 'Malaysia', 1),
(64, 'South Korea', 1),
(65, 'Iran', 1),
(66, 'Pakistan', 1),
(67, 'Israel', 1),
(68, 'Myanmar', 1),
(69, 'Sri Lanka', 1),
(70, 'Syria', 1),
(71, 'Cambodia', 1),
(72, 'Taiwan', 1),
(73, 'Maldives', 1),
(74, 'Saudi Arabia', 1),
(75, 'Bangladesh', 1),
(76, 'Qatar', 1),
(77, 'Iraq', 1),
(78, 'Yemen', 1),
(79, 'Afghanistan', 1),
(80, 'UAE', 1),
(81, 'Nepal', 1),
(82, 'Laos', 1),
(83, 'Lebanon', 1),
(84, 'Uzbekistan', 1),
(85, 'Oman', 1),
(86, 'Macau', 1),
(87, 'Jordan', 1),
(88, 'Armenia', 1),
(89, 'Azerbaijan', 1),
(90, 'Mongolia', 1),
(91, 'Kuwait', 1),
(92, 'Bhutan', 1),
(93, 'Bahrain', 1),
(94, 'Kyrgyzstan', 1),
(95, 'Brunei', 1),
(96, 'Turkmenistan', 1),
(97, 'Tajikistan', 1),
(98, 'Timor-Leste', 1),
(99, 'Christmas Island', 1),
(100, 'British Indian Ocean', 1),
(101, 'USA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_sc_master`
--

CREATE TABLE IF NOT EXISTS `email_sc_master` (
  `sc_id` int(100) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(200) NOT NULL,
  `sc_status` int(10) NOT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_master`
--

CREATE TABLE IF NOT EXISTS `exhibition_master` (
  `exhibition_id` int(50) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `exhibition_status` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`exhibition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_post_master`
--

CREATE TABLE IF NOT EXISTS `exhibition_post_master` (
  `exhibition_post_id` int(10) NOT NULL AUTO_INCREMENT,
  `exhibition_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `bidamount` int(10) NOT NULL,
  `exhibition_post_status` int(10) NOT NULL,
  PRIMARY KEY (`exhibition_post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `like_master`
--

CREATE TABLE IF NOT EXISTS `like_master` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `artist_id` int(10) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `like_master`
--

INSERT INTO `like_master` (`like_id`, `post_id`, `artist_id`) VALUES
(115, 83, 136),
(119, 81, 138),
(120, 82, 138),
(121, 83, 138),
(122, 89, 138),
(123, 91, 138);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`news_id`, `title`, `date`, `image`, `description`, `news_status`) VALUES
(27, 'Art event organ', '03/28/2018', '1522152939event1.png', '<p>this event for&nbsp;art for national and international artist can participate in this event&nbsp;</p>\r\n', ''),
(28, 'creative caltur', '03/26/2018', '1522153034event.jpg', '<p>creative calture cafe is an event for cultural art and all artist can participate in this event this is only one day event</p>\r\n', ''),
(29, '"tashan aap ka ', '03/31/2018', '1522153152event1.png', '<p>as title suggest a event . this event mainly for those people who show theire talent to all others. this is provide stage of new people&nbsp;</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_master`
--

CREATE TABLE IF NOT EXISTS `post_master` (
  `post_id` int(100) NOT NULL AUTO_INCREMENT,
  `art_category_id` int(100) NOT NULL,
  `art_sub_cat_id` int(100) DEFAULT NULL,
  `post_title` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `project_audio` varchar(1000) DEFAULT NULL,
  `project_video` varchar(1000) DEFAULT NULL,
  `Description` varchar(5000) NOT NULL,
  `artist_id` int(20) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `like_counter` bigint(20) NOT NULL,
  `comment_counter` bigint(20) NOT NULL,
  `post_status` int(20) NOT NULL,
  `ispublished` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `post_master`
--

INSERT INTO `post_master` (`post_id`, `art_category_id`, `art_sub_cat_id`, `post_title`, `file_type`, `image`, `project_audio`, `project_video`, `Description`, `artist_id`, `price`, `like_counter`, `comment_counter`, `post_status`, `ispublished`) VALUES
(81, 79, 80, 'This is an art made by me', 'image', '15221285911.jpg', '', '', 'this is an fabric paint design made by me for my friend                                                    ', 135, '150.00', 1, 0, 1, 1),
(82, 74, 78, 'this is an sketch', 'image', '1522128763royal_enfield_motorcycle_c5_military_2011_sketch_by_chrisrobinsonsart-d925xjc.jpg', '', '', 'this is an image of royal enfield draw by me an this is sketch                                                    ', 135, '120.00', 1, 0, 1, 1),
(83, 59, 85, 'pre wedding shoot of my friend', 'image', '1522128830A-couple-posing-in-Nandi-Hills-one-of-the-top-pre-wedding-shoot-locations-in-Bangalore-SS01052017.jpg', '', '', '                                                    ', 135, '10.00', 2, 1, 1, 1),
(85, 59, 83, '', 'image', '1522129000annie-spratt-96532-unsplash.jpg', '', '', '                                                    ', 135, '10.00', 0, 0, 1, 1),
(86, 74, 76, '', 'image', '152212909717795692_1659011937741069_3523758247645689012_n.jpg', '', '', '                                                    ', 135, '0.00', 0, 0, 1, 1),
(87, 59, 85, 'click by me', 'image', '15221302347.jpg', '', '', '                                                    ', 136, '0.00', 0, 0, 1, 1),
(88, 59, 85, 'Lens Queen  ', 'image', '15221306233.jpg', '', '', '                                          ', 136, '0.00', 0, 0, 1, 1),
(89, 59, 65, 'natural light', 'image', '15221309499.jpg', '', '', '#morning#click#village#time#glad#                                                     ', 136, '100.00', 1, 0, 1, 1),
(91, 71, 72, 'special moments ', 'video', '', '', 'https://www.youtube.com/embed/Um4LfMDMBu0', '                                                         SALSA / COUPLE GARBA | GORI RADHA NE KARO KAAN | CHOREOGRAPHED BY DD-The Dance Factory,SURAT,GUJARAT                                                     ', 136, '0.00', 1, 0, 1, 1),
(92, 79, 80, 'For my friend', 'image', '1522131933fabric-painting-on-churidar.png', '', '', '                                                    ', 136, '0.00', -1, 0, 1, 1),
(93, 59, 85, 'just shoot me pre wedding image', 'image', '152213359319.jpg', '', '', '                                                                                                                                                                ', 137, '0.00', 0, 0, 1, 1),
(94, 59, 65, 'morning time click ', 'image', '1522134005Desktop-Wallpaper-6.jpg', '', '', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', 137, '0.00', 0, 0, 1, 1),
(95, 71, 72, 'this is perform by me ', 'video', '', '', 'https://www.youtube.com/embed/a-92BSPoBGs', '                                                                                                                                                  Breakdance meets Classic - Full Show - Feuerwerk der Turnkunst | DDC Breakdance\r\n                                                                                                                          ', 137, '0.00', 0, 0, 1, 1),
(96, 59, 64, 'black and white picture click ', 'image', '152213462414.jpg', '', '', '                                                                                                                                                                ', 137, '0.00', 0, 0, 1, 1),
(97, 59, 85, 'pre wedding ', 'image', '1522152652main-qimg-17820fcb713cd354d93162812e71b8f7-c.jpg', '', '', '                                                    ', 135, '0.00', 0, 0, 1, 1),
(98, 59, 85, 'pre wedding at pink city', 'image', '15221527035a329a7e164dc_big.jpg', '', '', '                                                    ', 135, '0.00', 0, 0, 1, 1),
(99, 59, 83, 'unknown click', 'image', '1522154834eaters-collective-132773-unsplash.jpg', '', '', '                                                    ', 136, '0.00', 0, 0, 1, 1),
(100, 59, 63, 'click at last picnic', 'image', '15221549593.jpg', '', '', '                                              morning click click by me      ', 135, '0.00', 0, 0, 1, 1),
(101, 59, 65, '', 'image', '15221550325.jpg', '', '', '                                                    ', 135, '150.00', 0, 0, 1, 1),
(102, 59, 64, '', 'image', '152215511413.jpg', '', '', 'morning click #click at sajan nature park                                                    ', 135, '0.00', 0, 0, 0, 0),
(103, 79, 80, '#fabric #paint #gift #for #me', 'video', '', '', 'https://www.youtube.com/embed/vn-Ypsdk-sM', '                                                    ', 135, '50.00', 0, 0, 1, 1),
(104, 79, 80, '#cushion #cover #design #by #me', 'video', '', '', 'https://www.youtube.com/embed/JjlpOFuU_FY', '                                                    ', 135, '700.00', 0, 0, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `country_id`, `state_name`, `state_status`) VALUES
(28, 55, 'Kerala', 1),
(29, 55, 'Tamil Nadu', 1),
(30, 55, 'Madhya Pradesh', 1),
(31, 55, 'Gujarat', 1),
(32, 55, 'Uttar Pradesh', 1),
(33, 55, 'Andhra Pradesh', 1),
(34, 55, 'Rajasthan', 1),
(35, 55, 'Karnataka', 1),
(36, 55, 'Odisha', 1),
(37, 55, 'Punjab', 1),
(38, 55, 'Maharashtra', 1),
(39, 55, 'West Bengal', 1),
(40, 55, 'Bihar', 1),
(41, 55, 'Assam', 1),
(42, 55, 'Uttarakhand', 1),
(43, 55, 'Goa', 1),
(44, 55, 'Delhi', 1),
(45, 55, 'Himachal Pradesh', 1),
(46, 55, 'Jammu and Kashmir', 1),
(47, 55, 'Haryana', 1),
(48, 55, 'Chhattisgarh', 1),
(49, 55, 'Tripura', 1),
(50, 55, 'Manipur', 1),
(51, 55, 'Mizoram', 1),
(52, 55, 'Meghalaya', 1),
(53, 55, 'Sikkim', 1),
(54, 55, 'Arunachal Pradesh', 1),
(55, 55, 'Nagaland', 1),
(56, 55, 'Telangana', 1),
(57, 53, 'Tokyo', 1),
(58, 53, 'Hyogo', 1),
(59, 53, 'Osaka', 1),
(60, 53, 'Fukuoka', 1),
(61, 53, 'Kanagawa', 1),
(62, 101, 'California', 1),
(63, 101, 'Florida', 1),
(64, 101, 'Massachusetts', 1),
(65, 101, 'Colorado', 1),
(66, 101, 'Illinois', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
