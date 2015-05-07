-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 12:07 AM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inscription`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` char(40) NOT NULL,
  `user_level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` char(32) DEFAULT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `user_level`, `active`, `registration_date`) VALUES
(1, 'boevi', 'lawson', 'hetic@hetic.net', 'fc23764ac5b792f40bb1a00c0e3284e45f3f49c0', 0, '214223112', '2015-04-23 14:22:22'),
(2, 'local', 'localH', 'root@host.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '801ececf2489d5278e9d01ddd4fd41e8', '2015-05-06 18:36:20'),
(3, 'local', 'localH', 'root2555@host.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'aa1657fea984a3b798a560cc36bc99fc', '2015-05-06 18:37:03'),
(4, 'boevi', 'lawsom', 'lololo@live.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, NULL, '2015-05-06 18:47:44'),
(5, 'marc', 'duboc', 'root5@host.com', '265d02503a276c5afa972ce625bb012301220176', 0, NULL, '2015-05-07 13:16:12'),
(6, 'phrenel', 'lawson', 'ducdeswin@live.fr', 'ff7d1d02dd37dc3440165f41586f4f02224c36b1', 0, NULL, '2015-05-07 15:50:51'),
(7, 'sdf', 'asdv', 'lol@lol.fr', '8cb2237d0679ca88db6464eac60da96345513964', 0, 'e06ee5548c744550b1e10c1512b3907f', '2015-05-07 16:02:12'),
(8, 'leb', 'matt', 'mm@mm.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '8fcf2caf00147fc6da23def2a5fddffa', '2015-05-07 16:54:11'),
(9, 'ici', 'labas', 'ici@labas.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '1e7e243435cef1d5f6976f1630b16d6e', '2015-05-07 17:12:25'),
(10, 'toto', 'toto', 'toto@toto.fr', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 0, '37cc0843f7f7e77984518f78bacf9e39', '2015-05-07 17:21:15'),
(11, 'lol', 'lol2', 'lol@uu.fr', 'cbd111395270f83baf8c4c20f5507b1683298450', 0, 'cca33006464a30746e97172073e13881', '2015-05-07 17:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `login` (`email`,`pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
