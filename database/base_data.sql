-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2017 at 10:07 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twotunics`
--

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `value`) VALUES
(1, 'Charity Partner'),
(2, 'Fashion  Partner'),
(3, 'Administrator');

--
-- Dumping data for table `donation_status`
--

INSERT INTO `donation_status` (`id`, `value`) VALUES
(1, 'Available'),
(2, 'Reserved'),
(3, 'Accepted');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
