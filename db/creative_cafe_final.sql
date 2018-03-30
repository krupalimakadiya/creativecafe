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


DROP TABLE IF EXISTS `bid_master`;
CREATE TABLE `bid_master` (
  `bid_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
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


DROP TABLE IF EXISTS `comment_master`;
CREATE TABLE `comment_master` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) NOT NULL,
  `artist_id` int(10) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `comment_master_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist_master` (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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


DROP TABLE IF EXISTS `country_master`;
CREATE TABLE `country_master` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL,
  `country_status` int(5) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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


DROP TABLE IF EXISTS `exhibition_master`;
CREATE TABLE `exhibition_master` (
  `exhibition_id` int(50) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `exhibition_status` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`exhibition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `exhibition_post_master`;
CREATE TABLE `exhibition_post_master` (
  `exhibition_post_id` int(10) NOT NULL AUTO_INCREMENT,
  `exhibition_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `exhibition_post_status` int(10) NOT NULL,
  PRIMARY KEY (`exhibition_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `exhibition_post_master` (`exhibition_post_id`, `exhibition_id`, `post_id`, `exhibition_post_status`) VALUES
(23,	10,	64,	0),
(24,	10,	65,	0),
(25,	10,	71,	0);

DROP TABLE IF EXISTS `like_master`;
CREATE TABLE `like_master` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `artist_id` int(10) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `like_master_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist_master` (`artist_id`)
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


DROP TABLE IF EXISTS `post_master`;
CREATE TABLE `post_master` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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


-- 2018-03-30 19:46:33
