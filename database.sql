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
