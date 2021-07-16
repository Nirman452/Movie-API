-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2021 at 11:09 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_movies`
--

DROP TABLE IF EXISTS `all_movies`;
CREATE TABLE IF NOT EXISTS `all_movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_created` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `all_movies`
--

INSERT INTO `all_movies` (`id`, `reference_code`, `title`, `category`, `image`, `year_created`) VALUES
(1, '123456789', 'Joker', 'drama', '/images/joker.jpg', '2019'),
(2, '765432', 'Batman', 'action', '/images/batman.jpg', '2015'),
(3, '123453', 'Spiderman', 'action', '/images/spiderman.jpg', '2012'),
(4, '123453', 'Dead Silence', 'horror', '/images/deadsilence.jpg', '2005'),
(5, '123453', 'Requiem For a Dream', 'drama', '/images/requiem.jpg', '1998'),
(6, '123453', 'Star Wars', 'scifi', '/images/starwars.jpg', '1999'),
(7, '23423', 'Interstellar', 'scifi', '/images/interstellar.jpg', '2014'),
(8, '12458574', 'Ironman', 'action', '/images/ironman.jpg', '2010'),
(9, '76543262', 'The Hulk', 'action', '/images/hulk.jpg', '2009'),
(10, '8374684', 'Shutter Island', 'drama', '/images/shutterisland.jpg', '2012'),
(11, '7856452', 'Inception', 'scifi', '/images/inception.jpg', '2016'),
(12, '9847524', 'Now You See Me', 'action', '/images/nowyouseemee.jpg', '2013'),
(13, '965362', 'Hitman', 'drama', '/images/hitman.jpg', '2010'),
(14, '62345264', 'Butterfly Effect', 'drama', '/images/butterfly.jpg', '1999'),
(15, '657642', 'Mother', 'drama', '/images/mother.jpg', '2010');

-- --------------------------------------------------------

--
-- Table structure for table `token_info`
--

DROP TABLE IF EXISTS `token_info`;
CREATE TABLE IF NOT EXISTS `token_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `hit_count` int(11) NOT NULL,
  `hit_limit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token_info`
--

INSERT INTO `token_info` (`id`, `token`, `status`, `hit_count`, `hit_limit`) VALUES
(1, 'jW27N5bd5IliWveJlimQEJ3sbCCpE3Bv', 1, 245, 1000),
(2, '8K5gW0QhaOkfiSgrs45HZO1W43hpYO9u', 1, 990, 1000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
