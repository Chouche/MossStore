-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2018 at 06:21 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mossstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `steamkeys`
--

DROP TABLE IF EXISTS `steamkeys`;
CREATE TABLE IF NOT EXISTS `steamkeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(16) NOT NULL,
  `steam_key` varchar(20) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `buying_date` datetime DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steamkeys`
--

INSERT INTO `steamkeys` (`id`, `title`, `steam_key`, `id_owner`, `buying_date`, `price`) VALUES
(3, 'gangsta', '5456-rt89-er85-a45s', NULL, NULL, 400),
(2, 'miniaturetd', '5546-8589-5586-5852', NULL, NULL, 400);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'testtest@yopmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(2, 'Jerome', 'jerome.hernandez@rr.cool', 'c93b8accf0080d4211a1d8c84722add158c7448064b680ee59f0d6fd719d372c'),
(3, 'Sean', 'sean@rr.cool', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578'),
(4, 'toto', 'toto@gmail.com', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66'),
(5, 'toto2', 'toto2@gmail.com', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66'),
(6, 'toto3', 'toto3@gmail.com', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66'),
(7, 'toto4', 'toto4@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(8, 'bob', 'bob@rr.cool', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(9, 'Wooram', 'wooram.son@rr.cool', '1be2e452b46d7a0d9656bbb1f768e8248eba1b75baed65f5d99eafa948899a6a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
