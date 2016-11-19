-- phpMyAdmin SQL Dump
-- version 4.0.10.17
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2016 at 05:51 AM
-- Server version: 5.5.51
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `debateplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, ' Technology'),
(2, 'Sports'),
(3, 'Animals'),
(9, 'Fun'),
(10, 'People'),
(11, 'Food '),
(12, 'Talent');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `user_name`, `password`) VALUES
(1, 'admin', 'admin', 'adminprabhu');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file_name` text NOT NULL,
  `video_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `thumbnail` text,
  `link_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `file_name`, `video_name`, `description`, `category`, `thumbnail`, `link_type`) VALUES
(69, 'The Best Karate Student.mp4', 'The Best Karate Student', 'The Best Karate Student', '["Talent"]', 'thumb_The Best Karate Student.png', NULL),
(70, '14578273_778827968926547_6058386301147676672_n.mp4', 'Best Team work Ever', '', '["Sports"]', 'thumb_Best Team work Ever.png', NULL),
(84, '13822069_502031773335905_204537101_n.mp4', 'This Robot will grow the Food you need', '', '[" Technology"]', 'thumb_This Robot will grow the Food you need.png', 'file'),
(88, 'Synthetic Baby Companion.mp4', 'Synthetic Baby Companion', '', '[" Technology"]', 'thumb_Synthetic_Baby_Companion.png', 'file'),
(90, 'Every accomplishment starts with the decision to try.mp4', 'every accomplishment starts with the decision to try', '', '["Talent"]', 'thumb_every_accomplishment_starts_with_the_decision_to_try.png', 'file'),
(92, 'Technology That Has Changed The World.mp4', 'Technology That Has Changed The World', 'Technology That Has Changed The World', '[" Technology"]', 'thumb_Technology_That_Has_Changed_The_World.png', 'file'),
(93, 'Cute Baby with Puppy playing.mp4', 'Adorable Cute Baby with Puppy playing', 'Adorable Cute Baby with Puppy playing', '["Fun"]', 'thumb_Adorable_Cute_Baby_with_Puppy_playing.png', 'file'),
(94, 'Play time with Butterfly Cute Moments.mp4', 'Play time with Butterfly Cute Moments', 'Play time with Butterfly Cute Moments', '["Animals"]', 'thumb_Play_time_with_Butterfly_Cute_Moments.png', 'file'),
(95, 'NASA released a time-lapse from space showing a year on Earth..mp4', 'NASA released a time-lapse from space showing a year on Earth.', 'NASA released a time-lapse from space showing a year on Earth.\r\n', '[" Technology"]', 'thumb_NASA_released_a_time-lapse_from_space_showing_a_year_on_Earth..png', 'file'),
(97, 'Mothers Love.mp4', 'Mothers Love', '', '["Animals"]', 'thumb_Mothers_Love.png', 'file'),
(98, 'Mysuru Celebrate Traditional Dussehra.mp4', 'Mysuru Celebrate Traditional Dussehra', 'Mysuru Celebrate Traditional Dussehra', '["People"]', 'thumb_Mysuru_Celebrate_Traditional_Dussehra.png', 'file'),
(99, 'KATSU IKA ODORI-DON is a dish from Northern Japan.mp4', 'KATSU IKA ODORI-DON is a dish from Northern Japan', 'KATSU IKA ODORI-DON is a dish from Northern Japan', '["Food "]', 'thumb_KATSU_IKA_ODORI-DON_is_a_dish_from_Northern_Japan.png', 'file'),
(100, 'The best way to Honey.mp4', 'The Best Way to HONEY', 'The Best Way to HONEY', '["Food "]', 'thumb_The_Best_Way_to_HONEY.png', 'file'),
(101, 'People wait lines to taste this spicy Korean fried chicken.mp4', 'People wait lines to taste this spicy Korean fried chicken', 'People wait lines to taste this spicy Korean fried chicken', '["Food "]', 'thumb_People_wait_lines_to_taste_this_spicy_Korean_fried_chicken.png', 'file'),
(102, 'never seen a kid do this! Amazing talented little boy.mp4', 'never seen a kid do this! Amazing talented little boy', 'never seen a kid do this! Amazing talented little boy', '["Fun"]', 'thumb_never_seen_a_kid_do_this!_Amazing_talented_little_boy.png', 'file');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
