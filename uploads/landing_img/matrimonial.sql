-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 08, 2024 at 06:58 AM
-- Server version: 8.3.0
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community_site_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `matrimonial`
--

DROP TABLE IF EXISTS `matrimonial`;
CREATE TABLE IF NOT EXISTS `matrimonial` (
  `matrimonial_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `dob` datetime NOT NULL,
  `job_occupation` text NOT NULL,
  `images` text NOT NULL,
  `height` text NOT NULL,
  `weight` text NOT NULL,
  `mother_tongue` text NOT NULL,
  `gotram` text NOT NULL,
  `zodiac` text NOT NULL,
  `education` text NOT NULL,
  `salary` text NOT NULL,
  `gender` text NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`matrimonial_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
