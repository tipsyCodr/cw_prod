-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2024 at 06:42 AM
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
  `caste` int DEFAULT '0',
  `dob` datetime NOT NULL,
  `job_occupation` text NOT NULL,
  `images` text NOT NULL,
  `height` text NOT NULL,
  `weight` text NOT NULL,
  `mother_tongue_id` int NOT NULL,
  `gotram` text NOT NULL,
  `zodiac` text NOT NULL,
  `education_id` int NOT NULL,
  `employee_in_id` int NOT NULL,
  `salary` text NOT NULL,
  `gender` text NOT NULL,
  `description` text NOT NULL,
  `flag` int NOT NULL DEFAULT '1',
  `flag_admin` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`matrimonial_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matrimonial`
--

INSERT INTO `matrimonial` (`matrimonial_id`, `user_id`, `caste`, `dob`, `job_occupation`, `images`, `height`, `weight`, `mother_tongue_id`, `gotram`, `zodiac`, `education_id`, `employee_in_id`, `salary`, `gender`, `description`, `flag`, `flag_admin`, `created_at`, `updated_at`) VALUES
(6, 1, 0, '2005-09-19 00:00:00', 'Laboriosam ipsam qu', '1723271652_A4_Myobill_From2.png', '5.10', '5.10', 1, 'Esse cumque repudia', 'Veritatis incidunt ', 1, 0, 'In placeat alias in', 'M', 'Adipisci aliqua Ten', 1, 0, '2024-08-10 12:04:12', '0000-00-00 00:00:00'),
(7, 1, 0, '1992-02-03 00:00:00', 'Qui dolores velit cu', '1723441902_delievery_boy.jpg', 'Deserunt asperiores ', 'Deserunt asperiores ', 1, 'Unde velit quia quo ', 'Suscipit sed tempore', 1, 1, 'Nisi cumque voluptat', 'F', 'Aut id Nam et nesciu', 1, 0, '2024-08-12 11:21:42', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
