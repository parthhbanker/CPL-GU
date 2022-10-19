-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 07:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidding`
--
CREATE DATABASE IF NOT EXISTS `bidding` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bidding`;

-- --------------------------------------------------------

--
-- Table structure for table `batting_hand`
--

DROP TABLE IF EXISTS `batting_hand`;
CREATE TABLE IF NOT EXISTS `batting_hand` (
  `bth_id` int(11) NOT NULL AUTO_INCREMENT,
  `hand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `batting_hand`
--

TRUNCATE TABLE `batting_hand`;
--
-- Dumping data for table `batting_hand`
--

INSERT INTO `batting_hand` (`bth_id`, `hand`) VALUES
(1, 'Right Hand Batsman'),
(2, 'Left Hand Batsman'),
(3, 'Wicket Keeper');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
CREATE TABLE IF NOT EXISTS `bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` varchar(255) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `base_price` int(11) DEFAULT NULL,
  `bid_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `player_id` (`player_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `bids`
--

TRUNCATE TABLE `bids`;
-- --------------------------------------------------------

--
-- Table structure for table `bowling_style`
--

DROP TABLE IF EXISTS `bowling_style`;
CREATE TABLE IF NOT EXISTS `bowling_style` (
  `bs_id` int(11) NOT NULL AUTO_INCREMENT,
  `bowling_style` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `bowling_style`
--

TRUNCATE TABLE `bowling_style`;
--
-- Dumping data for table `bowling_style`
--

INSERT INTO `bowling_style` (`bs_id`, `bowling_style`) VALUES
(1, 'Right Arm Fast'),
(2, 'Right Arm Medium'),
(3, 'Right Arm Leg Break'),
(4, 'Right Arm'),
(5, 'Left Arm'),
(6, 'Right Arm Off Break'),
(7, 'Left Arm Fast'),
(8, 'Slow Left Arm Orthodox'),
(9, 'Right Arm Leg Spinner'),
(10, 'Left Arm Leg Spinner');

-- --------------------------------------------------------

--
-- Table structure for table `data_mapping`
--

DROP TABLE IF EXISTS `data_mapping`;
CREATE TABLE IF NOT EXISTS `data_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `player_id` (`player_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `data_mapping`
--

TRUNCATE TABLE `data_mapping`;
-- --------------------------------------------------------

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` varchar(255) NOT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `bth_id` int(11) DEFAULT NULL,
  `economy` decimal(10,2) DEFAULT NULL,
  `total_over` decimal(10,2) DEFAULT NULL,
  `total_wicket` int(11) DEFAULT NULL,
  `inning` int(11) DEFAULT NULL,
  `total_runs` int(11) DEFAULT NULL,
  `average` decimal(10,2) DEFAULT NULL,
  `strike_rate` decimal(10,2) DEFAULT NULL,
  `total_four` int(11) DEFAULT NULL,
  `total_six` int(11) DEFAULT NULL,
  `base_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`),
  KEY `pro_id` (`pro_id`),
  KEY `bs_id` (`bs_id`),
  KEY `bth_id` (`bth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `player`
--

TRUNCATE TABLE `player`;
--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `player_name`, `semester`, `team_id`, `pro_id`, `bs_id`, `bth_id`, `economy`, `total_over`, `total_wicket`, `inning`, `total_runs`, `average`, `strike_rate`, `total_four`, `total_six`, `base_price`) VALUES
('IM001', 'Prashant Purani', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 29, '14.50', '78.38', 2, NULL, 500),
('IM002', 'Harshil Chauhan', 7, NULL, 1, NULL, 1, NULL, NULL, NULL, 5, 29, '14.50', '100.00', 3, NULL, 500),
('IM003', 'Jainil Brahmkshatriya', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, 27, '27.00', '112.50', 2, NULL, 500),
('IM004', 'Sahil Makwana', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 26, NULL, '83.87', 2, NULL, 500),
('IM005', 'Khushil', 7, NULL, 1, NULL, 2, NULL, NULL, NULL, 2, 26, '13.00', '81.25', 2, NULL, 500),
('IM006', 'Brij Prajapati', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 4, 24, '6.00', '61.54', 2, NULL, 500),
('IM008', 'Karan Soni', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 21, '10.50', '91.30', 1, NULL, 500),
('IM009', 'Rushan Khan', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 19, NULL, '63.33', 2, NULL, 500),
('IM010', 'Smeet Soni', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 16, '8.00', '114.29', 3, NULL, 500),
('IM011', 'Ammar Malek', 5, NULL, 1, NULL, 2, NULL, NULL, NULL, 2, 16, '8.00', '80.00', 1, NULL, 300),
('IM014', 'Abdurrehman Risaldar', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, 12, '12.00', '92.31', NULL, NULL, 300),
('IM015', 'Pathan Hisban Khan', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, 12, '12.00', '85.71', 2, NULL, 500),
('IM016', 'Shubh Patel', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 12, '6.00', '60.00', 1, NULL, 300),
('IM017', 'Dhruvang Upadhyay', 5, NULL, 1, NULL, 2, NULL, NULL, NULL, 2, 11, '5.50', '78.57', NULL, NULL, 300),
('IM018', 'Y Vataliya', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 11, '5.50', '73.33', NULL, NULL, 300),
('IM019', 'Yashkumar Barot', 7, NULL, 1, NULL, 1, NULL, NULL, NULL, 3, 11, '11.00', '45.83', NULL, NULL, 300),
('IM020', 'Harsh Parmar', 3, NULL, 1, NULL, 2, NULL, NULL, NULL, 1, 9, '9.00', '90.00', NULL, NULL, 300),
('IM021', 'Shrimali Jay', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 9, '9.00', '56.25', 1, NULL, 300),
('IM022', 'Abhijeet', NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, 5, '5.00', '50.00', NULL, NULL, 300),
('IM024', 'Jaydeep Rathod', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 4, '4.00', '22.22', NULL, NULL, 300),
('IM025', 'Mann Shah', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, 3, NULL, '75.00', NULL, NULL, 300),
('IM026', 'Yash Thakkar', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 3, '3.00', '75.00', NULL, NULL, 300),
('IM027', 'Patel Kush', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 3, '3.00', '50.00', NULL, NULL, 300),
('IM028', 'Mistry Harsh', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 2, '1.00', '40.00', NULL, NULL, 300),
('IM029', 'Jeel Jadav', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 2, '1.00', '33.33', NULL, NULL, 300),
('IM030', 'Dave Megh', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 2, NULL, '66.67', NULL, NULL, 300),
('IM031', 'Kuldeep S', 3, NULL, 1, NULL, 2, NULL, NULL, NULL, 1, 1, '1.00', '33.33', NULL, NULL, 300),
('IM032', 'Dhanraj Bagul', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '50.00', NULL, NULL, 300),
('IM033', 'Vaishal Shah', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, 1, '1.00', '100.00', NULL, NULL, 300),
('IM034', 'Aadil', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 2, 1, '1.00', '100.00', NULL, NULL, 300),
('IM035', 'Samarth Shah', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 100),
('IM036', 'Malhar Bhatt', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 100),
('IM037', 'Janmesh Nashikkar', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 100),
('IM038', 'Arun Budhani', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 100),
('IM039', 'Shadab Akhunji', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 100),
('IM040', 'Yash', NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM041', 'Panchal Jaymin', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM042', 'Faizan Shaikh', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM043', 'Jeel Patel', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM044', 'Sagar Bhilocha', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM045', 'Bhargav Jariwala', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM046', 'Arshad K', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM047', 'Mohit Dave', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM048', 'Parmar Harsh', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM049', 'Thakor Devang Karsanji ', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM050', 'Aayush Kshatriya ', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM051', 'Tanna Krishna ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM052', 'Ansari Mohammadusaid', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM053', 'Ayan luhar ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM054', 'Parth Singh ', 1, NULL, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM055', 'Patel Utsav', 1, NULL, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM056', 'Nishant patel ', 1, NULL, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM057', 'Daksh', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM058', 'Anand Patel', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM059', 'Rami harsh ', 1, NULL, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM060', 'Ronak Taneja', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM061', 'Meet koshti ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM062', 'Krunal Bhatt ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM064', 'Rathod Aman', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM065', 'Shubham Bhavsar ', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM066', 'Aman Raj', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM067', 'Tanmay Ramdin', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM068', 'Jagdish', 3, NULL, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM069', 'Ansh Dodiya ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM070', 'Tanuj Prajapati', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM071', 'Varun Majmudar ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM072', 'Panchal dixit ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM073', 'Ghanchi ubed raza', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM074', 'Kathit bhavsar ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM075', 'Chirag Parmar ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM076', 'Kakshil m panchal ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM077', 'Shah Vraj Viralkumar', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM079', 'nishansh jain', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM080', 'Ansari Mohammad Fajal', 5, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM081', 'Sagar makwana', 1, NULL, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM082', 'KARAN SAKARIYA', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM083', 'Arth Dalwadi', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM084', 'Rajdeep Bhatiya ', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM085', 'HRISHIKESH MODI', 3, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM086', 'SURESH CHOUDHARY', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM087', 'Limbad aditya', 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM091', 'Mahir Mansuri', 7, NULL, 2, 1, 1, '7.00', '7.00', 7, 5, 85, '21.25', '114.86', 10, NULL, 1000),
('IM092', 'Malek Afzal', 3, NULL, 2, 2, 1, '3.16', NULL, 4, 5, 52, '13.00', '96.30', 5, NULL, 1000),
('IM093', 'Harshil Panchal', 3, NULL, 2, 2, 1, '10.83', NULL, 0, 2, 24, '12.00', '77.42', 3, NULL, 500),
('IM094', 'Mohit', 3, NULL, 2, 2, 1, '8.00', NULL, 0, 2, 17, '8.50', '100.00', NULL, NULL, 1000),
('IM096', 'Ayush Soni', 3, NULL, 2, 2, 1, '10.50', NULL, 0, 1, 1, '1.00', '50.00', NULL, NULL, 500),
('IM097', 'Paramveer Singh', 7, NULL, 2, 2, 1, '13.00', NULL, 0, 1, 8, '8.00', '88.89', NULL, NULL, 300),
('IM099', 'Soham', 3, NULL, 2, 2, 1, '6.67', NULL, 2, 1, 1, NULL, '100.00', NULL, NULL, 500),
('IM100', 'Kathan Chauhan', 5, NULL, 2, 2, 1, '8.00', NULL, 0, 2, 16, '8.00', '123.08', 1, NULL, 500),
('IM101', 'Darshil Patel', 3, NULL, 2, 2, 2, '8.25', NULL, 2, 4, 33, '16.50', '75.00', 1, NULL, 500),
('IM102', 'Manav Patel', 5, NULL, 2, 1, 1, '7.75', NULL, 0, 3, 16, '5.33', '84.21', 1, NULL, 300),
('IM103', 'Ronit Prasad', 3, NULL, 2, 3, 1, '11.00', NULL, 1, 1, 12, NULL, '57.14', 1, NULL, 300),
('IM104', 'Vraj Joshi', 5, NULL, 2, 2, 1, '4.80', NULL, 1, 1, 10, NULL, '100.00', NULL, NULL, 1000),
('IM105', 'Siddh Shah', 3, NULL, 2, 2, 1, '9.00', NULL, 5, 1, 9, '9.00', '75.00', 2, NULL, 1000),
('IM106', 'Navid Khanusiya', 5, NULL, 2, 1, 1, '4.67', NULL, 2, 2, 6, '6.00', '46.15', NULL, NULL, 500),
('IM107', 'Amar purohit', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM108', 'Herrin shah', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM109', 'Priyank Lutya ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM110', 'Chavda Yash Jayeshbhai', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM111', 'Shaikh Mo. Anas', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM112', 'Jakasaniya Parthiv Bharatbhai ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM113', 'ANSARI AAVESH', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM114', 'Mohit Suryavanshi', 1, NULL, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM115', 'Patel Hitarth ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM116', 'Chiron Rawal', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM117', 'Shah Jainam', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM118', 'Ridham Yadav ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM119', 'Supan Shah', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM120', 'Vyom Thakker', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM121', 'Parth kabira', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM122', 'Chandrachudsinh Vadhel', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM123', 'Harsh Gajjar', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM124', 'Manthan solanki ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM125', 'kaif mansuri', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM126', 'Jenil Patel', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM127', 'Akshat', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM128', 'Patel Sneh', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM129', 'Butani Rakshat Hiteshbhai ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM130', 'Patel Henil ', 1, NULL, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM131', 'Gohil Vivek ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM132', 'Dev kayasth ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM133', 'Vraj Upadhyay ', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM134', 'Sujal Mansuri ', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM135', 'Tejas Kushwaha', 5, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM136', 'Rudra Naik', 1, NULL, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM137', 'Sunil Ahuja', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM138', 'Mahendi Ali', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM139', 'Ansh Pandey', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM140', 'Devansh Dave', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM141', 'Vinamra Kaitra', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM142', 'NITYA DESAI', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM143', 'Padhiyar Shreyansh', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM144', 'Bhavesh pandya', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM145', 'Bhavesh Patil', 5, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM146', 'Ayushya Pandey', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM147', 'Harsh Khamar', 7, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM148', 'Abdulla Mansuri', 3, NULL, 3, 1, NULL, '6.31', NULL, 4, 5, NULL, NULL, NULL, NULL, NULL, 1000),
('IM149', 'Kirtan Soni', 3, NULL, 3, 2, NULL, '8.50', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, 300),
('IM150', 'Ritesh Vishwakarma', 7, NULL, 3, 1, NULL, '9.75', NULL, 0, 3, NULL, NULL, NULL, NULL, NULL, 300),
('IM152', 'Piyush Chauhan', 3, NULL, 3, 6, NULL, '7.67', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, 500),
('IM153', 'Trushil Sutariya', 5, NULL, 3, 7, NULL, '4.17', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, 1000),
('IM154', 'Rahul A Daiya', 3, NULL, 3, 2, NULL, '9.00', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 300),
('IM155', 'Aditya Amali', 5, NULL, 3, 2, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 300),
('IM156', 'Devansh Upadhyay', 7, NULL, 3, 8, NULL, '9.00', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, 500),
('IM157', 'Jay Jani', 3, NULL, 3, 2, NULL, '9.17', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, 500),
('IM158', 'Krish Patel', 3, NULL, 3, 1, NULL, '13.00', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, 300),
('IM160', 'Vatsal Dave', 3, NULL, 3, 2, NULL, '9.80', NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, 300),
('IM161', 'Devang Modi', 3, NULL, 3, 2, NULL, '15.00', NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, 300),
('IM163', 'Patel Tirth Chetankumar', 1, NULL, 3, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM164', 'Gogari Rutul kumar panishbhai', 1, NULL, 3, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM165', 'Ansh Sukhdevbhai Solanki ', 1, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM166', 'Vedant Gaikwad', 5, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM167', 'hritik Prajapati', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM168', 'Mavar Rahil Vishalbhai', 3, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM169', 'Kshitij Jadav', 5, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM170', 'Hasnain Puthawala', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
('IM171', 'Shailesh Makwana', 1, NULL, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `player_role`
--

DROP TABLE IF EXISTS `player_role`;
CREATE TABLE IF NOT EXISTS `player_role` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `player_role`
--

TRUNCATE TABLE `player_role`;
--
-- Dumping data for table `player_role`
--

INSERT INTO `player_role` (`pro_id`, `player_role`) VALUES
(1, 'Batsman'),
(2, 'All Rounder'),
(3, 'Bowlers');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `team`
--

TRUNCATE TABLE `team`;
--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`) VALUES
(1, 'Knights'),
(2, 'Hurricanes'),
(3, 'Empire'),
(4, 'Wolves XI'),
(5, 'Titans'),
(6, 'Falcons'),
(7, 'Panthers'),
(8, 'Blasters'),
(9, 'Strikers'),
(10, 'Royals'),
(11, 'Super Kings'),
(12, 'Stars');

-- --------------------------------------------------------

--
-- Table structure for table `team_login`
--

DROP TABLE IF EXISTS `team_login`;
CREATE TABLE IF NOT EXISTS `team_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `team_login`
--

TRUNCATE TABLE `team_login`;
--
-- Dumping data for table `team_login`
--

INSERT INTO `team_login` (`id`, `team_id`, `username`, `password`) VALUES
(1, 1, 'knights', 'a97f667c4c861a251d9cb39b686ab583'),
(2, 2, 'hurricanes', '8f5bdfbd36a5670bb03c159d9fd12585'),
(3, 3, 'empire', 'b8afe2216f26df2740900393ce547ed9'),
(4, 4, 'wolvesxi', 'a8ec7afc44b36d0a424da3aca214e977'),
(5, 5, 'titans', '5b07463ac9b6101ed460e1269e432f95'),
(6, 6, 'falcons', 'c081c5d179ed5c1f2f22048481bf0202'),
(7, 7, 'panthers', 'f307284e0baad259939ea23caa94c15c'),
(8, 8, 'blasters', 'd225651f00bcb89b1965cc13a1f30611'),
(9, 9, 'strikers', '62f7e54fe1e596b691ee28c01875f8b7'),
(10, 10, 'royals', 'cc28bd329b24bd8e6077b77d430fca06'),
(11, 11, 'superkings', 'd9d7cdac22436842aadd3841fc1c65e5'),
(12, 12, 'stars', '164a559e8745c69ca6bcd90477352b1e');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_Id`);

--
-- Constraints for table `data_mapping`
--
ALTER TABLE `data_mapping`
  ADD CONSTRAINT `data_mapping_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_Id`),
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `player_role` (`pro_Id`),
  ADD CONSTRAINT `player_ibfk_3` FOREIGN KEY (`bs_id`) REFERENCES `bowling_style` (`bs_id`),
  ADD CONSTRAINT `player_ibfk_4` FOREIGN KEY (`bth_id`) REFERENCES `batting_hand` (`bth_id`);

--
-- Constraints for table `team_login`
--
ALTER TABLE `team_login`
  ADD CONSTRAINT `team_login_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
