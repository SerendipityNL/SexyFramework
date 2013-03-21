-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2013 at 10:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sexyframework_weblog`
--
CREATE DATABASE `sexyframework_weblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sexyframework_weblog`;

-- --------------------------------------------------------

--
-- Table structure for table `weblog`
--

CREATE TABLE IF NOT EXISTS `weblog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `weblog`
--

INSERT INTO `weblog` (`id`, `author`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Vincent Bremer', 'My first weblog entry', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sem dui, ultricies ut pharetra sed, molestie ut mi. Suspendisse ut lacus vitae turpis commodo tempor. \r\n\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque accumsan tempor mattis. Duis nulla mi, scelerisque congue sodales quis, adipiscing vel urna. Donec eget mi orci, vitae suscipit dolor. Maecenas eu augue sit amet metus auctor ornare in a tellus. \r\n\r\nQuisque suscipit, nibh non porttitor viverra, lectus risus dapibus nisl, sed posuere augue justo eu leo. Aliquam ligula quam, tristique a pellentesque et, mollis sit amet urna. Suspendisse accumsan aliquet mi vestibulum accumsan. \r\n\r\nSed vitae magna mi, aliquet cursus nibh. Proin placerat erat ac justo sagittis sit amet semper nisi condimentum. Nam in rhoncus mi. Proin ullamcorper interdum varius. Aliquam ut tortor mi, accumsan dignissim purus.\r\n', '2013-03-21 12:11:17', '2013-03-21 12:11:17'),
(2, 'Douwe de Haan', 'This is another weblog item', 'Sed laoreet ultrices nunc eu aliquam. Fusce venenatis risus vel massa laoreet et ullamcorper dolor tempus. Mauris urna magna, accumsan sed cursus et, mollis vel augue. Cras sed augue quis enim dignissim luctus quis a libero. Cras at nisl non lorem tempus dignissim bibendum quis nisi. Vestibulum non euismod nisi. Nunc condimentum lorem quis felis auctor ac mollis enim ultricies. Quisque accumsan orci vel mauris consectetur dignissim. Nam dolor orci, interdum vitae dignissim mollis, mollis quis sapien. Fusce scelerisque, augue eget pellentesque bibendum, lectus nisl fringilla urna, eget aliquam orci nulla vel erat. Aliquam erat volutpat. Nunc sed arcu velit.\r\n', '2013-03-14 14:25:16', '2013-03-14 14:25:16');
