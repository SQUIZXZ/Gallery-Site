-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2019 at 02:25 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `Image`, `text`) VALUES
(118, 'tyler.jpg', 'This guy is great fun'),
(106, 'fish man.JPG', ''),
(107, 'monkey.jpg', ''),
(108, 'cod guy.png', ''),
(109, 'cs go man.png', 'This is an example of Matty uploading an image');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `type`) VALUES
(1, 'Finlay', 'Wallis', 'fin.test@hotmail.co.uk', 'fin', '$2y$10$JOFDSAC8qelpVCMMo6SVVeZhT/pYznN1k0y22aIhGaOIdQGZABBBK', 0),
(2, 'Ryan', 'Gosling', 'Goss.boss@gmail.com', 'Gossy', '$2y$10$pCAmoXpDvWNq788o/Ec.BOAacSPyO.aO8l/ski50MVqGS6yImIa.C', 0),
(3, 'Marcos', 'Rashford', 'Rashford@gmail.com', 'Trooper', '$2y$10$MO6omQhBCQ6vzCLv4ZK0l.3GWWIQOeLlJcdrv/MC4sVt0RuRc3CPC', 0),
(4, 'Ryan', 'Wallis', 'wallis@gmail.com', 'ryan1', '$2y$10$UANktBq7YhjWEjcK6meVzOK76jhaVL0nJPByqPg4Df0/jUcuzEWyy', 0),
(5, 'Bob', 'Wallis', 'Bob@gmail.com', 'Hunter', '$2y$10$JzfHXURg4qjpzRQLy.viWukgyCn2bxXcHZqN/gmskKC5YUB4bNpVC', 0),
(6, 'Toby', 'Moor', 'Moor@gmail.com', 'Test123', '$2y$10$gnUg8rsVaz/J29tr9nDSx.QeO4kjnG4wZC0AA2r27lK7aWZVlG.S6', 0),
(8, 'Dean', 'Bennett', 'Dean@gmail.com', 'Unitdean', '$2y$10$6RFok2TPQEHOgqnvDH/4eOWMDMrC7unHf2TdMTaLLkljQ2Z2.oLT2', 0),
(9, 'Matt', 'Will', 'meme@gmail.com', 'Matty', '$2y$10$jbjYYgquAMInsuZT14bMte.WkmWUljw0ahWGQavDz929ve3vO8vLK', 0),
(10, 'Finlay', 'Wallis', 'finlay.wallis@gmail.com', 'admin', '$2y$10$UkPs.kkAuNSRrDkSuAYSYeuyPrZGizLKb5OV4uLg5ALSJau3FKSCe', 1),
(11, 'user', 'name', 'username@gmail.com', 'userr', '$2y$10$K6Wup3hr6RYqMLx7eUL3QeZcM2iWuq3b59L0P634OS0mSiz/zT.xK', 1),
(12, 'admin', 'user', 'admin@gmail.com', 'admin1', '$2y$10$QSEiLjtvcJRg3oILwyt0wOkqn8Vm9I/F/JuHyVS/SZdSsRsEi11GG', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
