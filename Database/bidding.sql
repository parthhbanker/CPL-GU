-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 07:22 AM
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
  `bth_Id` int(11) NOT NULL AUTO_INCREMENT,
  `hand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bth_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `batting_hand`
--

TRUNCATE TABLE `batting_hand`;
--
-- Dumping data for table `batting_hand`
--

INSERT INTO `batting_hand` (`bth_Id`, `hand`) VALUES
(1, 'RHB'),
(2, 'LHB');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `bids`
--

TRUNCATE TABLE `bids`;
--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `player_id`, `team_id`, `base_price`, `bid_price`) VALUES
(51, 'IM205', 1, 500, 600),
(52, 'IM213', 1, 500, 900);

-- --------------------------------------------------------

--
-- Table structure for table `bowling_style`
--

DROP TABLE IF EXISTS `bowling_style`;
CREATE TABLE IF NOT EXISTS `bowling_style` (
  `bs_Id` int(11) NOT NULL AUTO_INCREMENT,
  `bowling_style` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bs_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `bowling_style`
--

TRUNCATE TABLE `bowling_style`;
--
-- Dumping data for table `bowling_style`
--

INSERT INTO `bowling_style` (`bs_Id`, `bowling_style`) VALUES
(1, 'Right-arm fast'),
(2, 'Right-arm medium'),
(3, 'Slow left-arm orthodox'),
(4, 'Left-arm fast'),
(5, 'Right-arm Off Break'),
(6, 'Right-arm Leg Break'),
(7, 'Left-arm medium');

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
--
-- Dumping data for table `data_mapping`
--

INSERT INTO `data_mapping` (`id`, `player_id`) VALUES
(1, 'IM213');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` varchar(255) NOT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `bth_id` int(11) DEFAULT NULL,
  `matches` int(11) DEFAULT NULL,
  `batting` decimal(10,2) DEFAULT NULL,
  `bowling` decimal(10,2) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
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

INSERT INTO `player` (`id`, `player_name`, `team_id`, `pro_id`, `bs_id`, `bth_id`, `matches`, `batting`, `bowling`, `semester`, `base_price`) VALUES
('IM201', 'Mahir Mansuri', NULL, NULL, 4, 1, 5, '85.00', '7.00', 7, 1000),
('IM202', 'Malek Afzal', NULL, NULL, 7, 1, 5, '52.00', '4.00', 3, 1000),
('IM203', 'Siddh shah', NULL, NULL, 7, 1, 4, '9.00', '5.00', 3, 1000),
('IM204', 'Darshil patel', NULL, NULL, 7, NULL, 4, '33.00', '2.00', 3, 1000),
('IM205', 'Abdulla Mansuri', 1, 1, 4, 1, 5, '4.00', '4.00', 3, 500),
('IM206', 'Jainil Brahmkshatriya', NULL, 6, 4, 1, 2, '2.95', '0.00', NULL, NULL),
('IM207', 'Devansh Upadhyay', NULL, 3, 7, NULL, 3, '0.00', '3.63', NULL, NULL),
('IM208', 'Trushil Sutariya', NULL, NULL, 4, NULL, 2, '0.09', '4.20', NULL, NULL),
('IM209', 'Jay Jani', NULL, NULL, 7, NULL, 2, '0.00', '4.22', NULL, NULL),
('IM210', 'Piyush Chauhan', NULL, 4, 7, 1, 2, '2.00', '2.00', 3, 500),
('IM211', 'Manav Patel', NULL, 3, 4, 1, 4, '1.49', '0.06', NULL, NULL),
('IM212', 'Navid khanusiya', NULL, 1, 4, 1, 4, '6.00', '2.00', 5, 500),
('IM213', 'Vraj Joshi', 1, 1, 7, 1, 2, '10.00', '2.00', 5, 500),
('IM214', 'Harshil Chauhan', NULL, NULL, NULL, 1, 5, '2.73', '0.00', NULL, NULL),
('IM215', 'Khushil', NULL, NULL, 4, NULL, 2, '2.44', '0.00', NULL, NULL),
('IM216', 'Soham', NULL, NULL, 7, 1, 2, '1.00', '1.00', 3, 500),
('IM217', 'Prashant Purani', NULL, 4, 4, 1, 2, '2.74', '0.00', NULL, NULL),
('IM218', 'Sahil Makwana', NULL, NULL, NULL, 1, 2, '2.73', '0.00', NULL, NULL),
('IM219', 'Vansh Vp', NULL, 1, 4, 1, 4, '2.14', '0.00', NULL, NULL),
('IM220', 'Brij Prajapati', NULL, 5, 4, 1, 4, '2.49', '0.00', NULL, NULL),
('IM221', 'Ronit prasad', NULL, 1, 6, 1, 2, '12.00', '1.00', 3, 300),
('IM222', 'Harshil panchal', NULL, NULL, 7, 1, 2, '24.00', '1.00', 3, 300),
('IM223', 'Ritesh Vishwakarma', NULL, 6, 4, 1, 3, '3.00', '1.00', 7, 300),
('IM224', 'Mohit', NULL, 4, 7, 1, 2, '0.00', '1.00', 3, 300),
('IM225', 'Karan Soni', NULL, NULL, NULL, 1, 2, '1.95', '0.00', NULL, NULL),
('IM226', 'Kirtan soni', NULL, NULL, 7, 1, 2, '3.00', '1.00', 3, 300),
('IM227', 'Aditya Amali', NULL, NULL, 7, 1, 2, '0.00', '1.44', NULL, NULL),
('IM228', 'Abdurrehman Risaldar', NULL, 5, 4, 1, 1, '1.13', '0.00', NULL, NULL),
('IM229', 'Rushan Khan', NULL, NULL, NULL, 1, 2, '1.82', '0.00', NULL, NULL),
('IM230', 'Kathan Chauhan', NULL, NULL, 7, 1, 2, '16.00', '1.00', 5, 300),
('IM231', 'Aarsh desai', NULL, NULL, NULL, 1, 1, '1.51', '0.00', NULL, NULL),
('IM232', 'Smeet soni', NULL, 5, 4, 1, 2, '1.48', '0.00', NULL, NULL),
('IM233', 'Ammar Malek', NULL, 5, 4, NULL, 2, '1.51', '0.00', NULL, NULL),
('IM234', 'Mistry Harsh', NULL, 4, 4, 1, 1, '0.19', '0.00', NULL, NULL),
('IM235', 'Rahul A Daiya', NULL, NULL, 7, NULL, 2, '0.00', '1.28', NULL, NULL),
('IM236', 'Y Vataliya', NULL, NULL, NULL, 1, 2, '1.04', '0.00', NULL, NULL),
('IM237', 'Justin Parmar', NULL, NULL, NULL, 1, 1, '1.21', '0.00', NULL, NULL),
('IM238', 'Shubh Patel', NULL, NULL, NULL, 1, 2, '1.15', '0.00', NULL, NULL),
('IM239', 'Pathan Hisban Khan', NULL, 3, 4, 1, 1, '1.11', '0.00', NULL, NULL),
('IM240', 'Yashkumar Barot', NULL, NULL, NULL, 1, 2, '1.07', '0.00', NULL, NULL),
('IM241', 'Dhruvang Upadhyay ', NULL, NULL, NULL, NULL, 1, '1.04', '0.00', NULL, NULL),
('IM242', 'Shrimali Jay', NULL, NULL, NULL, 1, 1, '0.85', '0.00', NULL, NULL),
('IM243', 'Harsh Parmar', NULL, 4, 4, NULL, 1, '0.85', '0.00', NULL, NULL),
('IM244', 'Panchal Jaymin', NULL, NULL, NULL, NULL, 1, '0.00', '0.00', NULL, NULL),
('IM245', 'Paramveer Singh', NULL, 1, 7, 1, 1, '0.74', '-0.05', NULL, NULL),
('IM246', 'Aadil', NULL, NULL, NULL, 1, 2, '0.10', '0.00', NULL, NULL),
('IM247', 'Jaydeep rathod', NULL, NULL, NULL, 1, 1, '0.39', '0.00', NULL, NULL),
('IM248', 'Abhijeet', NULL, NULL, NULL, 1, 1, '0.48', '0.00', NULL, NULL),
('IM249', 'Ayush Soni', NULL, NULL, 7, 1, 2, '0.10', '0.02', NULL, NULL),
('IM250', 'Hit Khant', NULL, 1, 4, 1, 1, '0.43', '-0.05', NULL, NULL),
('IM251', 'Yash Thakkar', NULL, 1, 6, 1, 1, '0.33', '0.00', NULL, NULL),
('IM252', 'Faizan Shaikh', NULL, 6, 7, 1, 2, '0.00', '0.00', NULL, NULL),
('IM253', 'Patel Kush', NULL, NULL, NULL, 1, 2, '0.29', '0.00', NULL, NULL),
('IM254', 'Mann Shah', NULL, NULL, NULL, 1, 1, '0.29', '0.00', NULL, NULL),
('IM255', 'Bhargav Jariwala', NULL, NULL, NULL, NULL, 1, '0.00', '0.00', NULL, NULL),
('IM256', 'jeel jadav', NULL, NULL, NULL, 1, 2, '0.20', '0.00', NULL, NULL),
('IM257', 'Dave Megh', NULL, NULL, NULL, 1, 1, '0.19', '0.00', NULL, NULL),
('IM258', 'Sagar Bhilocha', NULL, NULL, NULL, NULL, 1, '0.00', '0.00', NULL, NULL),
('IM259', 'Kuldeep S', NULL, 3, 4, NULL, 1, '0.10', '0.00', NULL, NULL),
('IM260', 'Dhanraj Bagul', NULL, NULL, NULL, 1, 1, '0.10', '0.00', NULL, NULL),
('IM261', 'Vaishal Shah', NULL, 4, 4, 1, 1, '0.09', '0.00', NULL, NULL),
('IM262', 'Vatsal', NULL, 1, 7, 1, 2, '0.00', '-0.13', NULL, NULL),
('IM263', 'Lay Joshi', NULL, 1, 7, 1, 1, '0.00', '-0.04', NULL, NULL),
('IM264', 'Dhairya Dave', NULL, 4, 4, 1, 1, '0.00', '-0.04', NULL, NULL),
('IM265', 'Krish patel', NULL, 1, 4, 1, 1, '0.00', '-0.05', NULL, NULL),
('IM266', 'devang Modi', NULL, 4, 4, 1, 2, '0.00', '-0.11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_role`
--

DROP TABLE IF EXISTS `player_role`;
CREATE TABLE IF NOT EXISTS `player_role` (
  `pro_Id` int(11) NOT NULL AUTO_INCREMENT,
  `player_role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pro_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `player_role`
--

TRUNCATE TABLE `player_role`;
--
-- Dumping data for table `player_role`
--

INSERT INTO `player_role` (`pro_Id`, `player_role`) VALUES
(1, 'All-Rounder'),
(2, 'Wicket-keeper batsman'),
(3, 'Middle-order batsman'),
(4, 'Bowler'),
(5, 'Top-order batsman'),
(6, 'Lower-order batsman');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

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
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Subscriber',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `contact`, `address`, `type`, `date_created`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', '+123456789', '', 1, '2020-10-27 09:19:59'),
(0, 'Het Parekh', 'het', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', 1, '2022-10-14 17:16:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);

--
-- Constraints for table `data_mapping`
--
ALTER TABLE `data_mapping`
  ADD CONSTRAINT `data_mapping_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `player_role` (`pro_Id`),
  ADD CONSTRAINT `player_ibfk_3` FOREIGN KEY (`bs_id`) REFERENCES `bowling_style` (`bs_Id`),
  ADD CONSTRAINT `player_ibfk_4` FOREIGN KEY (`bth_id`) REFERENCES `batting_hand` (`bth_Id`);

--
-- Constraints for table `team_login`
--
ALTER TABLE `team_login`
  ADD CONSTRAINT `team_login_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
