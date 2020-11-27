-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2020 at 07:17 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dumaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `user_id`, `role_id`) VALUES
(1, 'admin', '$2y$12$3/KPXYAYylP6end1wcyJmeXLUrW/tLtA66wHJwZmE3XWj7zklmd7i', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(25) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(2) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(2) DEFAULT NULL,
  `del_flag` tinyint(1) DEFAULT 0 COMMENT '0:ON 1:OFF',
  `status` tinyint(1) DEFAULT 1 COMMENT '1:Active 0:Inactive',
  `role_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `dob`, `gender`, `address`, `contact_no`, `details`, `created_on`, `created_by`, `modified_on`, `modified_by`, `del_flag`, `status`, `role_id`) VALUES
(1, 'Sundar', 'Machamasi', 'admin', '$2y$12$3/KPXYAYylP6end1wcyJmeXLUrW/tLtA66wHJwZmE3XWj7zklmd7i', 'unimaxmacha@gmail.com', '1990-09-10', 'Male', 'Golmadi-6, Bhaktapur, Nepal', '9841042363', 'QA and Programmer', '2020-11-27 05:00:00', 1, NULL, NULL, 0, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
