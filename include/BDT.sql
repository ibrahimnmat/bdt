-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2015 at 04:29 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdt_fresh`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambilan`
--

CREATE TABLE IF NOT EXISTS `ambilan` (
  `ambilanDesc` varchar(50) NOT NULL,
  UNIQUE KEY `ambilanDesc` (`ambilanDesc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambilan`
--

INSERT INTO `ambilan` (`ambilanDesc`) VALUES
('PISMP JAN 2012'),
('PISMP JAN 2013'),
('PISMP JUN 2013');

-- --------------------------------------------------------

--
-- Table structure for table `elektif`
--

CREATE TABLE IF NOT EXISTS `elektif` (
  `elektifDesc` varchar(100) NOT NULL,
  UNIQUE KEY `elektifDesc` (`elektifDesc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elektif`
--

INSERT INTO `elektif` (`elektifDesc`) VALUES
('BAHASA INGGERIS'),
('BAHASA MELAYU'),
('KEMAHIRAN HIDUP'),
('MATEMATIK'),
('PENDIDIKAN JASMANI'),
('PENDIDIKAN KESIHATAN'),
('PENDIDIKAN MORAL'),
('PENDIDIKAN SENI VISUAL'),
('PENDIDIKAN SIVIK & KEWARGANEGARAAN');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE IF NOT EXISTS `kursus` (
  `kursusDesc` varchar(60) NOT NULL,
  UNIQUE KEY `kursusDesc` (`kursusDesc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`kursusDesc`) VALUES
('BAHASA CINA'),
('BAHASA INGGERIS'),
('BAHASA MELAYU'),
('PEMULIHAN'),
('PENDIDIKAN JASMANI'),
('PENDIDIKAN SENI VISUAL'),
('PENGAJIAN MATEMATIK'),
('PENGAJIAN SOSIAL'),
('PRASEKOLAH'),
('SEJARAH');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE IF NOT EXISTS `pelajar` (
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `icno` varchar(12) NOT NULL,
  `intake` varchar(80) NOT NULL,
  `major` varchar(80) NOT NULL,
  `elektif` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `pensyarah` varchar(100) NOT NULL,
  `pensyarah2` varchar(100) NOT NULL,
  `gurubimbing` varchar(100) NOT NULL,
  `tempoh` varchar(100) NOT NULL,
  PRIMARY KEY (`icno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pensyarah`
--

CREATE TABLE IF NOT EXISTS `pensyarah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
  `sekolahDesc` varchar(100) NOT NULL,
  UNIQUE KEY `sekolahDesc` (`sekolahDesc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `upload_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) NOT NULL,
  `file_size` int(6) unsigned NOT NULL,
  `file_type` varchar(30) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `pensyarah` varchar(100) DEFAULT NULL,
  `file_who` varchar(80) NOT NULL,
  `file_comment` varchar(80) DEFAULT NULL,
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_id`),
  KEY `file_name` (`file_name`),
  KEY `data_entered` (`date_entered`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `registerdate` datetime NOT NULL,
  `lastvisitDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `usertype`, `registerdate`, `lastvisitDate`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0000-00-00 00:00:00', '2015-08-20 10:27:55'),
(3, 'pegdata', 'pegdata', 'e10adc3949ba59abbe56e057f20f883e', 'pegdata', '0000-00-00 00:00:00', '2014-08-07 08:56:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
