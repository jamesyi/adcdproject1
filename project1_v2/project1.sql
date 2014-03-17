-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2014 at 10:22 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `album_picture`
--

CREATE TABLE `album_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`,`picture_id`),
  KEY `picture_id` (`picture_id`),
  KEY `album_id_2` (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `link`, `title`, `descr`) VALUES
(33, 'uploads/leo.jpg', 'Leo', 'So handsome!'),
(34, 'uploads/d3-last-supper.jpg', 'Much D3', 'Last supper with the Doge!'),
(35, 'uploads/lol.jpg', 'Hey yo!', 'LOLOLOL'),
(36, 'uploads/st.jpg', 'Stewie', 'Hmmmmm'),
(37, 'uploads/Screen Shot 2014-03-12 at 6.25.42 PM.png', 'Eat All the Food!', 'So hungry...'),
(38, 'uploads/Screen Shot 2014-01-28 at 8.41.00 PM.png', 'Dat pussy...', 'Much wine'),
(39, 'uploads/Screen Shot 2014-01-28 at 8.34.34 PM.png', 'Love le kittie ', 'Naked...'),
(40, 'uploads/Screen Shot 2014-03-15 at 12.05.46 AM.png', 'Green Onion Ice Cream with Soy Sauce', 'Who the hell would eat that sh!t?'),
(41, 'uploads/op.jpg', 'One Piece', 'WOWOWOOWOW');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `propic` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `propic`) VALUES
(1, 'admin', 'hahaha', 'leotse89@gmail.com', ''),
(2, 'henry', 'bcit', 'henry@bcit.ca', ''),
(3, '121212', '12121', '1212', ''),
(4, 'leo', '1111', '1111', ''),
(5, 'James Yi', '1111', 'jyi@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_album`
--

CREATE TABLE `user_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`album_id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_picture`
--
ALTER TABLE `album_picture`
  ADD CONSTRAINT `album_picture_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_picture_ibfk_2` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_album`
--
ALTER TABLE `user_album`
  ADD CONSTRAINT `user_album_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_album_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`);
