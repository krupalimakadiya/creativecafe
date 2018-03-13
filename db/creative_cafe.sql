-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin_master`;
CREATE TABLE `admin_master` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin_master` (`admin_id`, `email`, `password`) VALUES
(1,	'admin@gmail.com',	'21232f297a57a5a743894a0e4a801fc3');

DROP TABLE IF EXISTS `artist_master`;
CREATE TABLE `artist_master` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `artist_master` (`artist_id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `artist_profile`, `country_id`, `state_id`, `city_id`, `pincode`, `artist_status`, `user_type`) VALUES
(118,	'keval',	'patel',	'7878827777',	'krupalimakadiya123@gmail.com',	'123456',	'1520942771IMG-20180117-WA0022.jpg',	36,	13,	15,	394101,	0,	'artist'),
(127,	'krupali',	'makadiya',	'8000167777',	'krupali@gmail.com',	'123',	'',	28,	21,	13,	394101,	0,	'artist'),
(128,	'vidhi',	'golakiya',	'9876543210',	'vidhi@gmail.com',	'123',	'',	28,	21,	13,	365214,	0,	'user');

DROP TABLE IF EXISTS `art_category_master`;
CREATE TABLE `art_category_master` (
  `art_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `art_category_name` varchar(50) NOT NULL,
  `art_category_status` int(10) NOT NULL,
  `art_sub_cat_id` int(10) NOT NULL,
  `art_category_leval` int(10) NOT NULL,
  `url_code` varchar(200) NOT NULL,
  PRIMARY KEY (`art_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `art_category_master` (`art_category_id`, `art_category_name`, `art_category_status`, `art_sub_cat_id`, `art_category_leval`, `url_code`) VALUES
(56,	'krupali',	1,	0,	1,	'3Koq7cs5xjgIBytlm'),
(57,	'krupali123',	1,	56,	2,	'AnfLpRo9gqrbSa7y'),
(59,	'photography',	1,	0,	1,	'gVZhtxpDOTR6AFk7'),
(63,	'animal',	1,	59,	2,	'wXVC9o1jNf8bWFQJ'),
(64,	'black&white',	1,	59,	2,	'meYVtsPK157hc8xj'),
(65,	'nature',	1,	59,	2,	'A2WzNp4I1ntj3Hwc'),
(66,	'novel',	1,	60,	2,	'LzBxi7YV0h8Wseuq'),
(67,	'music',	1,	0,	1,	'uqGD67kF4NCh583g'),
(68,	'rock',	1,	67,	2,	'2kZ1ioLns4h9Ypfc'),
(69,	'hip hop',	1,	67,	2,	'slGyZOfxAItBcgv0'),
(70,	'pop',	0,	67,	2,	'htLukezVd6I1a7yQ'),
(71,	'Dance',	0,	0,	1,	'NMz95gDrufUs7oWT'),
(72,	'salsa',	0,	71,	2,	'd8vzk1H6utNnBr7m'),
(73,	'Break dance',	0,	71,	2,	'OkdXpgHQb9MKeF8n'),
(74,	'Art',	0,	0,	1,	'Ad2VloCJ8pYjnSRy'),
(75,	'design',	0,	74,	2,	'VsSjwDWo7OzNc1xM'),
(76,	'tatoo',	0,	74,	2,	'pQPXWaxjm7NE9Yy5'),
(77,	'cartoon',	0,	74,	2,	'E3guWZdrAvROh7iP'),
(78,	'sketch',	0,	74,	2,	'ACvnI194Fb8KVDmN'),
(79,	'Design',	0,	0,	1,	'6RVrIUaOfiBq519Y'),
(80,	'Fabric paint',	0,	79,	2,	'bdAxtkq5c28SywGY'),
(81,	'Graphics Design',	0,	79,	2,	'YVzbDIvrJgOLCcRA');

DROP TABLE IF EXISTS `bid_master`;
CREATE TABLE `bid_master` (
  `bid_id` int(10) NOT NULL AUTO_INCREMENT,
  `exhibition_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bidamount` int(10) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `bid_status` int(10) NOT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `city_master`;
CREATE TABLE `city_master` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_status` int(5) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `city_master` (`city_id`, `country_id`, `state_id`, `city_name`, `city_status`) VALUES
(2,	1,	2,	'mumbai',	1),
(3,	2,	1,	'aakkkiii',	1),
(4,	3,	1,	'lockargil',	0),
(5,	5,	1,	'akala',	0),
(6,	1,	2,	'changa',	1),
(7,	1,	1,	'surat',	0),
(8,	2,	2,	'niwkergjtmkl',	0),
(9,	7,	10,	'wedrtg',	0),
(10,	10,	8,	'erty',	1),
(11,	25,	12,	'tempcity',	0),
(12,	40,	20,	'kachchhi',	0),
(13,	28,	21,	'surat',	0),
(14,	25,	15,	'lahorcity',	0),
(15,	36,	13,	'kalu',	0),
(16,	35,	14,	'kabulcity',	0),
(17,	30,	15,	'MANCHURIAN',	0),
(18,	38,	19,	'pasta',	0),
(19,	28,	21,	'surat',	0),
(20,	25,	15,	'lahorcity',	0),
(21,	36,	13,	'kalu',	0),
(22,	35,	14,	'kabulcity',	0),
(23,	30,	15,	'MANCHURIAN',	0),
(24,	38,	19,	'pasta',	0),
(25,	10,	8,	'usacity',	0);

DROP TABLE IF EXISTS `comment_master`;
CREATE TABLE `comment_master` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comment_master` (`comment_id`, `user_id`, `comment`, `status`) VALUES
(1,	3,	'temp comment this is for practice',	1),
(2,	10,	'this is first comment from cretive click',	1),
(3,	10,	'this is first comment from cretive click',	0);

DROP TABLE IF EXISTS `contactus_master`;
CREATE TABLE `contactus_master` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `contact_status` int(10) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `contactus_master` (`contact_id`, `first_name`, `subject`, `email`, `mobile`, `message`, `contact_status`) VALUES
(1,	'keval',	'dummy',	'dummy@gmail.com',	2147483647,	'dummy mesg',	0),
(2,	'xyz',	'xyz',	'xyz@gmail.com',	2147483647,	'wedmjknkdm',	0);

DROP TABLE IF EXISTS `country_master`;
CREATE TABLE `country_master` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL,
  `country_status` int(5) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `country_master` (`country_id`, `country_name`, `country_status`) VALUES
(10,	'usa123',	0),
(18,	'Zafrabad...123',	0),
(19,	'usa',	0),
(21,	'mk123',	0),
(23,	'mk',	0),
(25,	'temp',	0),
(27,	'temp1234',	0),
(28,	'India',	0),
(32,	'abc',	0),
(33,	'qerert',	0),
(34,	'qwert',	0),
(35,	'China',	0),
(36,	'rasiya',	0),
(37,	'rashiya',	0),
(38,	'aafrica',	0),
(42,	'kinu',	0),
(47,	'c23',	0),
(48,	'c2',	0),
(49,	'c4',	0),
(51,	'raksh',	1),
(52,	'krupali',	0);

DROP TABLE IF EXISTS `email_sc_master`;
CREATE TABLE `email_sc_master` (
  `sc_id` int(100) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(200) NOT NULL,
  `sc_status` int(10) NOT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `event_master`;
CREATE TABLE `event_master` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `file` varchar(2000) NOT NULL,
  `date` varchar(150) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `event_status` varchar(10) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `event_master` (`event_id`, `title`, `file`, `date`, `image`, `description`, `event_status`) VALUES
(132,	'krupi',	'eventfile-1518852096.pdf',	'2018-02-19',	'eventimage-1518852096.jpg',	'<p>This</p>\r\n\r\n<p>&nbsp;</p>\r\n',	''),
(134,	'jadioiuytfhgr',	'eventfile-1519116249.pdf',	'2018-02-02',	'eventimage-1519116249.jpg',	'<p>This ishuijhjhb</p>\r\n\r\n<p>&nbsp;</p>\r\n',	''),
(137,	'vfdev',	'eventfile-1519209767.pdf',	'0000-00-00',	'eventimage-1519209767.jpg',	'<p>This is m</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n',	''),
(139,	'event title',	'',	'',	'',	'<p>This is my textarea to be replaced with CKEditor.wshergtjn</p>\r\n',	'');

DROP TABLE IF EXISTS `exhibition_master`;
CREATE TABLE `exhibition_master` (
  `exhibition_id` int(50) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `exhibition_status` varchar(10) NOT NULL,
  PRIMARY KEY (`exhibition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `exhibition_master` (`exhibition_id`, `artist_id`, `title`, `description`, `date`, `exhibition_status`) VALUES
(4,	0,	'nkjhgf',	'<p>This is my textarea to be replaced with CKEditor.</p>\r\n',	'02/06/2018 - 02/27/2018',	'1'),
(5,	0,	'dummy exhibition',	'<p>This is my textarea to be replaced with CKEditor.</p>\r\n',	'02/25/2018 - 02/25/2018',	'0'),
(6,	118,	'dummy',	'dummy',	'78/1/2018',	''),
(7,	118,	'today',	'today',	'2018-03-09',	'');

DROP TABLE IF EXISTS `exhibition_post_master`;
CREATE TABLE `exhibition_post_master` (
  `exhibition_post_id` int(10) NOT NULL AUTO_INCREMENT,
  `exhibition_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `bidamount` int(10) NOT NULL,
  `exhibition_post_status` int(10) NOT NULL,
  PRIMARY KEY (`exhibition_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `news_master`;
CREATE TABLE `news_master` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(15) NOT NULL,
  `date` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `news_status` varchar(10) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `news_master` (`news_id`, `title`, `date`, `image`, `description`, `news_status`) VALUES
(18,	'krupiiiiiiiiiii',	'2018-02-09',	'1519106053images.jpg',	'<p>This&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n',	''),
(19,	'ytry',	'2018-02-17',	'1519106848images(4).jpg',	'<p>This is my textarea to&nbsp;</p>\r\n',	''),
(20,	'fddg',	'02/07/2018',	'1519209973Penguins.jpg',	'<p>This is my textarea to be replaced with CKEditor.</p>\r\n',	'0'),
(21,	'dummmy',	'02/25/2018',	'21.JPG',	'<p>sdncfgjnfmndf</p>\r\n',	''),
(22,	'raksh',	'02/20/2018',	'1519539349OT-0459.JPG',	'<p>This is my textarea to be replaced with CKEditor.</p>\r\n',	'');

DROP TABLE IF EXISTS `post_master`;
CREATE TABLE `post_master` (
  `post_id` int(100) NOT NULL AUTO_INCREMENT,
  `art_category_id` int(100) NOT NULL,
  `art_sub_cat_id` int(100) DEFAULT NULL,
  `file_type` varchar(100) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `project_audio` varchar(1000) DEFAULT NULL,
  `project_video` varchar(1000) DEFAULT NULL,
  `Description` varchar(5000) NOT NULL,
  `artist_id` int(20) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `post_status` int(20) NOT NULL,
  `ispublished` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `post_master` (`post_id`, `art_category_id`, `art_sub_cat_id`, `file_type`, `image`, `project_audio`, `project_video`, `Description`, `artist_id`, `price`, `post_status`, `ispublished`) VALUES
(64,	59,	63,	'audio',	NULL,	'https://www.youtube.com/embed/xu3BK23OdOw',	'',	' rjtgfjkndfnkns                           ',	118,	0.00,	1,	1),
(65,	59,	63,	'audio',	NULL,	'https://www.youtube.com/embed/xu3BK23OdOw',	'',	' rjtgfjkndfnkns                           ',	118,	0.00,	1,	1),
(66,	71,	72,	'video',	NULL,	'',	'https://www.youtube.com/embed/0SZigTb-iqo',	'  this is video                          ',	118,	0.00,	0,	0),
(68,	59,	63,	'image',	'1520682534recent-godrej-logo-design.png',	'',	'',	'logo id                            ',	118,	0.00,	0,	0),
(69,	67,	70,	'video',	NULL,	'',	'https://www.youtube.com/embed/-JOAqkm5ieQ',	'polampol movie song ',	118,	0.00,	0,	0),
(71,	59,	63,	'image',	'1520738505images (2).jpg',	'',	'',	'erfnjknsd,mnm ',	118,	0.00,	0,	0),
(72,	59,	64,	'audio',	'',	'https://www.youtube.com/watch?v=z9b1Ei-TF4E',	'',	'                     ssdasd                               ',	127,	5000.00,	1,	1);

DROP TABLE IF EXISTS `site_review_master`;
CREATE TABLE `site_review_master` (
  `site_review_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `review_message` varchar(800) NOT NULL,
  PRIMARY KEY (`site_review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `state_master`;
CREATE TABLE `state_master` (
  `state_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL,
  `state_name` varchar(40) NOT NULL,
  `state_status` int(5) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `state_master` (`state_id`, `country_id`, `state_name`, `state_status`) VALUES
(8,	10,	'usa',	1),
(12,	25,	'tempstate',	1),
(13,	36,	'R1',	0),
(14,	35,	'r1',	0),
(15,	30,	'p1',	0),
(16,	36,	'R1',	0),
(17,	35,	'C1',	1),
(18,	30,	'p1',	0),
(19,	38,	'aa1',	0),
(20,	40,	'kachchhi',	0),
(21,	28,	'gujarat',	0),
(22,	36,	'R1',	0),
(23,	35,	'C1',	0),
(24,	30,	'p1',	0),
(25,	38,	'aa1',	0),
(26,	28,	'gfhn',	0),
(27,	28,	'sxdfnks',	0);

-- 2018-03-13 18:36:26
