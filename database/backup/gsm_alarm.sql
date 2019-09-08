-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2016 at 01:02 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gsm_alarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

drop table areas;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `is_deleted` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` decimal(10, 8) NULL DEFAULT NULL,
  `lng` decimal(11, 8) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `project_id`, `name`, `status`, `is_deleted`, `created_at`, `updated_at`, `lat`, `lng`) VALUES
(1, 1, 'Khu vui chơi giải trí Thỏ Trắng', '1', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7850667', '106.6625991'),
(2, 1, 'Ga Sài Gòn', '2', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7823911', '106.6749492'),
(3, 1, 'Trường Đại học Bách khoa TP.HCM', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7733223', '106.657566'),
(4, 1, 'Trường đại học tài nguyên và môi trường TP.HCM', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7964373', '106.664608'),
(5, 1, 'Học viện Hành chính Quốc gia', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7733667', '106.6740792'),
(6, 1, 'Chùa Giác Minh', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7733929', '106.6675131'),
(7, 1, 'Đại Học Sài Gòn', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7599224', '106.6800696'),
(8, 1, 'Trường Dự bị đại học TP.HCM', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7601119', '106.6683234'),
(9, 1, 'Big C Miền Đông', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.77872', '106.6629276'),
(10, 1, 'Chợ An Đông', '0', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00', '10.7580385', '106.6700035');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_07_31_171939_create_database', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'GSM-Vinh Hy', '', '0', '2016-07-31 17:00:00', '2016-07-31 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `str` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tokens_str_unique` (`str`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `project_id`, `str`, `created_at`, `updated_at`) VALUES
(1, 1, '7ASBF901', '2016-07-31 17:00:00', '2016-07-31 17:00:00'),
(2, 1, '8DFWMMQ9', '2016-07-31 17:00:00', '2016-07-31 17:00:00'),
(3, 1, 'H70ASDFN', '2016-07-31 17:00:00', '2016-07-31 17:00:00'),
(4, 1, '8AND7MSS', '2016-07-31 17:00:00', '2016-07-31 17:00:00'),
(5, 1, 'LADF21MM', '2016-07-31 17:00:00', '2016-07-31 17:00:00'),
(6, 1, '00AWE5JN', '2016-07-31 17:00:00', '2016-07-31 17:00:00'),
(7, 1, '99SDFNNQ', '2016-07-31 17:00:00', '2016-07-31 17:00:00'),
(8, 1, '9AWDFP12', '2016-07-31 17:00:00', '2016-07-31 17:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
