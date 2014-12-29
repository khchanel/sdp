-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2012 at 04:43 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:21 AM
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) NOT NULL,
  `ParentName` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `ParentName`) VALUES
(1, 'Un-Allocated', ''),
(2, 'Air conditioning', 'Electrical'),
(3, 'Light bulb', 'Electrical'),
(4, 'Power point', 'Electrical'),
(5, 'Other electrical', 'Electrical'),
(6, 'Carpet shampooing', 'Miscellaneous'),
(7, 'Filters', 'Miscellaneous'),
(8, 'Lounges', 'Miscellaneous'),
(9, 'Mattress', 'Miscellaneous'),
(10, 'Painting', 'Miscellaneous'),
(12, 'Shower screen', 'Miscellaneous'),
(13, 'Bed', 'Furniture'),
(14, 'Chair', 'Furniture'),
(15, 'Coffee table', 'Furniture'),
(16, 'Couch', 'Furniture'),
(17, 'Door', 'Furniture'),
(18, 'Table', 'Furniture'),
(19, 'Wardrobe', 'Furniture'),
(20, 'Other furniture', 'Furniture'),
(21, 'Iron', 'General Items'),
(22, 'Ironing board', 'General Items'),
(23, 'Vacuum cleaner', 'General Items'),
(24, 'Other items', 'General Items'),
(25, 'Battery', 'Locks'),
(26, 'Other lock issue', 'Locks'),
(27, 'Cockroach', 'Pest control'),
(28, 'Other pests', 'Pest control'),
(29, 'Shower', 'Plumbing'),
(30, 'Sink', 'Plumbing'),
(31, 'Toilet', 'Plumbing'),
(32, 'Other plumbing', 'Plumbing'),
(33, 'Dishwasher', 'White Goods'),
(34, 'Fridge', 'White Goods'),
(35, 'Kettle', 'White Goods'),
(36, 'Microwave', 'White Goods'),
(37, 'Toaster', 'White Goods'),
(38, 'Other white goods', 'White Goods');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:19 AM
--

CREATE TABLE IF NOT EXISTS `comments` (
  `CommentID` int(11) NOT NULL AUTO_INCREMENT,
  `JobID` int(11) NOT NULL,
  `Body` varchar(200) NOT NULL,
  `Author` varchar(40) NOT NULL,
  `DateSubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:18 AM
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Staff'),
(2, 'members', 'Tenants');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:21 AM
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `JobId` int(11) NOT NULL AUTO_INCREMENT,
  `DateReported` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CategoryID` int(11) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL,
  `TenantID` int(11) DEFAULT NULL,
  `ImageName` text,
  PRIMARY KEY (`JobId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:18 AM
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:18 AM
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(100) DEFAULT NULL,
  `Urgency` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`StatusId`, `StatusName`, `Urgency`) VALUES
(2, 'Requires more user information', 'red'),
(3, 'Pending repair', 'yellow'),
(4, 'Awaiting confirmation', 'yellow'),
(5, 'Completed', 'green'),
(1, 'Closed', 'green');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:20 AM
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `room_num` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `room_num`) VALUES
(1, '\0\0', 'administrator', '971765c7296a22ef500ecaef90b145865cd1b422', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 'd48d54f592a87ae76be8cc1cff02aad685c48de3', 1268889823, 1352434795, 1, 'SDP', 'MASTER!', 'ADMIN', '0425455602', '300'),
(8, '\0\0', 'sdp', '881361f67cb5e510ce0820a1e75d0870cf158302', NULL, 'sdp@sdp.com', NULL, NULL, NULL, NULL, 1352434818, 1352434818, 1, 'sdp', 'uts', NULL, '04123123123', 'NNNN00');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--
-- Creation: Nov 09, 2012 at 04:18 AM
-- Last update: Nov 09, 2012 at 04:20 AM
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(9, 8, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
