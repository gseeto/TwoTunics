-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2017 at 11:55 PM
-- Server version: 5.5.54
-- PHP Version: 5.3.10-1ubuntu3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twotunics`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE IF NOT EXISTS `access_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `value`) VALUES
(1, 'Charity Partner'),
(2, 'Fashion  Partner'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `charity_partner`
--

CREATE TABLE IF NOT EXISTS `charity_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `charity_partner`
--

INSERT INTO `charity_partner` (`id`, `name`, `description`, `street`, `city`, `state`, `zipcode`, `phone`, `email`, `contact_person`) VALUES
(1, 'Compassion International', 'We focus on orphans', '234 Thunder Way', 'Santa Clara', 'CA', '94043', '6502245075', 'compassion@yahoo.com', 'Billy Bingo'),
(2, 'World Vision', 'We do everything', '234 Lightning  Way', 'Santa Clara', 'CA', '94043', '6502245075', 'vision@yahoo.com', 'Naomi Watts');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `quantity_given` int(11) DEFAULT NULL,
  `unit_type_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cost_per_unit` int(11) DEFAULT NULL,
  `fashion_partner_id` int(11) DEFAULT NULL,
  `date_donated` date DEFAULT NULL,
  `quantity_remaining` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `unit_type_id_idxfk` (`unit_type_id`),
  KEY `size_id_idxfk` (`size_id`),
  KEY `status_idxfk` (`status`),
  KEY `fashion_partner_id_idxfk` (`fashion_partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donation_status`
--

CREATE TABLE IF NOT EXISTS `donation_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `donation_status`
--

INSERT INTO `donation_status` (`id`, `value`) VALUES
(1, 'Available'),
(2, 'Reserved'),
(3, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `fashion_partner`
--

CREATE TABLE IF NOT EXISTS `fashion_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fashion_partner`
--

INSERT INTO `fashion_partner` (`id`, `name`, `description`, `street`, `city`, `state`, `zipcode`, `phone`, `email`, `contact_person`) VALUES
(1, 'Old Navy', 'Mid range clothing store', '653 Great Mall Parkway', 'San Jose', 'CA', '95131', '', '', 'Melinda Gates'),
(2, 'Gap', 'Mid level clothing', '980 Great Mall Drive', 'San Jose', 'CA', '95132', '222333456', 'contact@gap.com', 'Bill Gates');

-- --------------------------------------------------------

--
-- Table structure for table `need`
--

CREATE TABLE IF NOT EXISTS `need` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `quantity_requested` int(11) DEFAULT NULL,
  `unit_type_id` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `date_requested` date DEFAULT NULL,
  `charity_id` int(11) DEFAULT NULL,
  `quantity_still_required` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `unit_type_id_idxfk_1` (`unit_type_id`),
  KEY `charity_id_idxfk` (`charity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `value`, `category`) VALUES
(1, '3 mos', 'Infant & Toddler Sizes'),
(2, '6 mos', 'Infant & Toddler Sizes'),
(3, '12 mos', 'Infant & Toddler Sizes'),
(4, '18 mos', 'Infant & Toddler Sizes'),
(5, '24 mos', 'Infant & Toddler Sizes'),
(6, '2T', 'Infant & Toddler Sizes'),
(7, '3T', 'Infant & Toddler Sizes'),
(8, '4T', 'Infant & Toddler Sizes'),
(9, '2', 'Boy''s Sizes'),
(10, '3', 'Boy''s Sizes'),
(11, '4', 'Boy''s Sizes'),
(12, '5', 'Boy''s Sizes'),
(13, '6', 'Boy''s Sizes'),
(14, '7', 'Boy''s Sizes'),
(15, '8', 'Boy''s Sizes'),
(16, '10', 'Boy''s Sizes'),
(17, '12', 'Boy''s Sizes'),
(18, 'XS', 'Men''s Sizes'),
(19, 'S', 'Men''s Sizes'),
(20, 'M', 'Men''s Sizes'),
(21, 'L', 'Men''s Sizes'),
(22, 'XL', 'Men''s Sizes'),
(23, 'XXL', 'Men''s Sizes'),
(24, '3XL', 'Men''s Sizes'),
(25, '4XL', 'Men''s Sizes'),
(26, '2', 'Girl''s Sizes'),
(27, '3', 'Girl''s Sizes'),
(28, '4', 'Girl''s Sizes'),
(29, '5', 'Girl''s Sizes'),
(30, '6', 'Girl''s Sizes'),
(31, '7', 'Girl''s Sizes'),
(32, '8', 'Girl''s Sizes'),
(33, '10', 'Girl''s Sizes'),
(34, '12', 'Girl''s Sizes'),
(35, '0', 'Women''s Sizes'),
(36, '2', 'Women''s Sizes'),
(37, '4', 'Women''s Sizes'),
(38, '6', 'Women''s Sizes'),
(39, '8', 'Women''s Sizes'),
(40, '10', 'Women''s Sizes'),
(41, '12', 'Women''s Sizes'),
(42, '14', 'Women''s Sizes'),
(43, '14W', 'Women''s Plus Sizes'),
(44, '16W (1X)', 'Women''s Plus Sizes'),
(45, '18W (2X)', 'Women''s Plus Sizes'),
(46, '20W (2X)', 'Women''s Plus Sizes'),
(47, '22W (3X)', 'Women''s Plus Sizes'),
(48, '24W (3X)', 'Women''s Plus Sizes'),
(49, '26W (4X)', 'Women''s Plus Sizes'),
(50, '28W (4X)', 'Women''s Plus Sizes'),
(51, '30W (5X)', 'Women''s Plus Sizes'),
(52, '32W (5X)', 'Women''s Plus Sizes'),
(53, '0.5', 'Infant 0-24 Mos'),
(54, '1', ' Infant 0-24 Mos'),
(55, '1.5', 'Infant 0-24 Mos'),
(56, '2', 'Infant 0-24 Mos'),
(57, '2.5', 'Infant 0-24 Mos'),
(58, '3', 'Infant 0-24 Mos'),
(59, '3.5', 'Infant 0-24 Mos'),
(60, '4', 'Infant 0-24 Mos'),
(61, '4.5', 'Infant 0-24 Mos'),
(62, '5', 'Infant 0-24 Mos'),
(63, '5.5', 'Infant 0-24 Mos'),
(64, '6', 'Infant 0-24 Mos'),
(65, '6.5', 'Infant 0-24 Mos'),
(66, '7', 'Infant 0-24 Mos'),
(67, '7.5', 'Toddler 2-4 Yrs'),
(68, '8', 'Toddler 2-4 Yrs'),
(69, '8.5', 'Toddler 2-4 Yrs'),
(70, '9', 'Toddler 2-4 Yrs'),
(71, '9.5', 'Toddler 2-4 Yrs'),
(72, '10', 'Toddler 2-4 Yrs'),
(73, '10.5', 'Toddler 2-4 Yrs'),
(74, '11', 'Toddler 2-4 Yrs'),
(75, '11.5', 'Toddler 2-4 Yrs'),
(76, '12', 'Toddler 2-4 Yrs'),
(77, '12.5', 'Youth 4-12 Yrs'),
(78, '13', 'Youth 4-12 Yrs'),
(79, '13.5', 'Youth 4-12 Yrs'),
(80, '1', 'Youth 4-12 Yrs'),
(81, '1.5', 'Youth 4-12 Yrs'),
(82, '2', 'Youth 4-12 Yrs'),
(83, '2.5', 'Youth 4-12 Yrs'),
(84, '3', 'Youth 4-12 Yrs'),
(85, '3.5', 'Youth 4-12 Yrs'),
(86, '4', 'Youth 4-12 Yrs'),
(87, '4.5', 'Youth 4-12 Yrs'),
(88, '5', 'Youth 4-12 Yrs'),
(89, '5.5', 'Youth 4-12 Yrs'),
(90, '6', 'Youth 4-12 Yrs'),
(91, '6.5', 'Youth 4-12 Yrs'),
(92, '7', 'Youth 4-12 Yrs'),
(93, '6', 'Men''s/Women''s'),
(94, '7', 'Men''s/Women''s'),
(95, '7.5', 'Men''s/Women''s'),
(96, '8', 'Men''s/Women''s'),
(97, '8.5', 'Men''s/Women''s'),
(98, '9', 'Men''s/Women''s'),
(99, '9.5', 'Men''s/Women''s'),
(100, '10', 'Men''s/Women''s'),
(101, '10.5', 'Men''s/Women''s'),
(102, '11', 'Men''s/Women''s'),
(103, '11.5', 'Men''s/Women''s'),
(104, '12', 'Men''s/Women''s'),
(105, '12.5', 'Men''s/Women''s'),
(106, '13', 'Men''s/Women''s'),
(107, '14', 'Men''s/Women''s');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) DEFAULT NULL,
  `need_id` int(11) DEFAULT NULL,
  `date_initiated` date DEFAULT NULL,
  `number_of_units` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `donation_id_idxfk` (`donation_id`),
  KEY `need_id_idxfk` (`need_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

CREATE TABLE IF NOT EXISTS `unit_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `unit_type`
--

INSERT INTO `unit_type` (`id`, `name`, `category`) VALUES
(1, 'Male Clothing', 'Infant & Toddler Sizes'),
(2, 'Male Clothing', 'Boy''s Sizes'),
(3, 'Male Clothing', 'Men''s Sizes'),
(4, 'Female Clothlng', 'Infant & Toddler Sizes'),
(5, 'Female Clothing', 'Girl''s Sizes'),
(6, 'Female Clothlng', 'Women''s Sizes'),
(7, 'Female Clothing', 'Women''s Plus Sizes'),
(8, 'Shoes', 'Infants 0-24 Mos.'),
(9, 'Shoes', 'Toddler 2-4 Yrs'),
(10, 'Shoes', 'Youth 4-12 Yrs '),
(11, 'Shoes', 'Men''s/Wonen''s');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `access_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `access_level_idxfk` (`access_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `access_level`) VALUES
(1, 'gseeto', 'gseeto', 'gareth.seeto@gmail.com', 'Gareth', 'Seeto', 3),
(2, 'charity', 'charity', 'charity@gmail.com', 'Charity', 'Partner', 1),
(3, 'fashion', 'fashion', 'fashion@gmail.com', 'Fashion', 'Partner', 2),
(4, 'batman2', 'robin', 'batman@gmail.com', 'Bruce', 'Wayne', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_charity_assn`
--

CREATE TABLE IF NOT EXISTS `user_charity_assn` (
  `user_id` int(11) NOT NULL,
  `charity_id` int(11) NOT NULL,
  KEY `user_id_idxfk` (`user_id`),
  KEY `charity_id_idxfk_1` (`charity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_charity_assn`
--

INSERT INTO `user_charity_assn` (`user_id`, `charity_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_fashion_assn`
--

CREATE TABLE IF NOT EXISTS `user_fashion_assn` (
  `user_id` int(11) NOT NULL,
  `fashion_id` int(11) NOT NULL,
  KEY `user_id_idxfk_1` (`user_id`),
  KEY `fashion_id_idxfk` (`fashion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_fashion_assn`
--

INSERT INTO `user_fashion_assn` (`user_id`, `fashion_id`) VALUES
(3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`id`),
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `donation_ibfk_3` FOREIGN KEY (`status`) REFERENCES `donation_status` (`id`),
  ADD CONSTRAINT `donation_ibfk_4` FOREIGN KEY (`fashion_partner_id`) REFERENCES `fashion_partner` (`id`);

--
-- Constraints for table `need`
--
ALTER TABLE `need`
  ADD CONSTRAINT `need_ibfk_1` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`id`),
  ADD CONSTRAINT `need_ibfk_2` FOREIGN KEY (`charity_id`) REFERENCES `charity_partner` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`need_id`) REFERENCES `need` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`access_level`) REFERENCES `access_level` (`id`);

--
-- Constraints for table `user_charity_assn`
--
ALTER TABLE `user_charity_assn`
  ADD CONSTRAINT `user_charity_assn_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_charity_assn_ibfk_2` FOREIGN KEY (`charity_id`) REFERENCES `charity_partner` (`id`);

--
-- Constraints for table `user_fashion_assn`
--
ALTER TABLE `user_fashion_assn`
  ADD CONSTRAINT `user_fashion_assn_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_fashion_assn_ibfk_2` FOREIGN KEY (`fashion_id`) REFERENCES `fashion_partner` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
