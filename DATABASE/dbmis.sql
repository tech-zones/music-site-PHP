-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 05:15 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblalbum`
--

CREATE TABLE IF NOT EXISTS `tblalbum` (
`id` int(100) NOT NULL,
  `albumcat` int(100) DEFAULT NULL,
  `albumname` varchar(60) DEFAULT NULL,
  `albumsinger` varchar(100) DEFAULT NULL,
  `albumwriter` varchar(100) DEFAULT NULL,
  `albumdesc` varchar(250) DEFAULT NULL,
  `albumimage` varchar(30) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblalbum`
--

INSERT INTO `tblalbum` (`id`, `albumcat`, `albumname`, `albumsinger`, `albumwriter`, `albumdesc`, `albumimage`) VALUES
(96, 29, 'Slipknot', 'Slipknot', 'Slipknot', 'the rock', 'slipknot.jpg'),
(95, 29, 'Slapshock', 'Slapshock', 'Slapshock', 'the best', 'slap.jpg'),
(97, 33, 'AndrewE Rap', 'Andrew E', 'Andrew E', 'pinoy', 'AndrewE1.jpg'),
(98, 29, 'Amber Pacific', 'Amber Pacific', 'Them', 'the rock', 'Amber2.jpg'),
(99, 35, 'Parokya ', 'Parokya ', 'Parokya ', 'the pinoy band', 'parokya1.jpg'),
(100, 28, 'TREy Songz', 'Trey', 'Trey', 'Trey songs', 'trey.jpg'),
(101, 32, 'How to Love', 'Lil Wayne', 'Lil Wayne', 'Lil Wayne', 'Lilwayne.jpg'),
(102, 33, 'Eminem''s ', 'Eminem', 'Eminem', 'Eminem', 'EMRAP.jpg'),
(103, 32, 'T.I. Songs', 'T.I.', 'T.I.', 'T.I.', 'TI.jpg'),
(104, 34, 'Ayos Land Ako', 'Rocksteddy', 'Rocksteddy', 'Rocksteddy', 'Rocksteddy.jpg'),
(105, 30, 'Boyce Avenue', 'Boyce Avenue', 'Boyce Avenue', 'Boyce Avenue', 'Boyce1.jpg'),
(106, 35, 'Bale Wala', 'Siakol', 'Siakol', 'the best', 'siakol.jpg'),
(107, 35, 'Tommorow', 'Bamboo', 'Bamboo', 'Astig', 'bamboo.jpg'),
(108, 35, 'Stars', 'Callalily', 'Callalily', 'Callalily', 'Callalily.jpg'),
(109, 35, 'Crying', 'Silent Sanctuary', 'Silent Sanctuary', 'Silent Sanctuary', 'silent_sanctuary.jpg'),
(110, 35, 'Bagong Liwanag', 'Rivermaya', 'Rivermaya', 'Rivermaya', 'rivermaya.jpg'),
(111, 35, 'Awit Para Sayo', 'Eric Santos', 'John Talbo', 'dadadasd', 'ericsantos.jpg'),
(112, 29, 'OK COMPUTER OKNOTOK', 'Thom Yorke', 'Thom Yorke, Johnny Greenwood, Colin Greenwood, Ed O'' Brien, Philip Selway', 'OK Computer OKNOTOK 1997 2017 is a reissue of the 1997 album OK Computer by the English alternative rock band Radiohead. It was released in June 2017, the album''s 20th anniversary, following the acquisition of Radiohead''s back catalogue by XL Recordi', '51MASwsu9rL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
`id` int(10) NOT NULL,
  `catname` varchar(50) DEFAULT NULL,
  `catdesc` varchar(250) DEFAULT NULL,
  `catimage` varchar(30) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `catname`, `catdesc`, `catimage`) VALUES
(34, 'ALTERNATIVE', 'the one of the best', 'alternative.jpg'),
(33, 'RAP', 'the rap', 'RAP.jpg'),
(32, 'HIPHOP', 'the hiphop', 'HIPHOP.jpg'),
(28, 'RNB', 'The best to rnb', 'RNB.jpg'),
(29, 'ROCK', 'the rock', 'ROCK.jpg'),
(30, 'ACOUSTIC', 'the acoustic', 'ACOUSTIC.jpg'),
(35, 'OPM', 'Pinoy music', 'opm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE IF NOT EXISTS `tblfeedback` (
`f_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblip`
--

CREATE TABLE IF NOT EXISTS `tblip` (
`ip_id` int(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `time` varchar(60) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblip`
--

INSERT INTO `tblip` (`ip_id`, `ip`, `time`) VALUES
(56, '127.0.0.1', '1330586719'),
(57, '127.0.0.1', '1331066469'),
(58, '127.0.0.1', '1331170565'),
(59, '127.0.0.1', '1355904608'),
(60, '127.0.0.1', '1356076870'),
(61, '127.0.0.1', '1356489054');

-- --------------------------------------------------------

--
-- Table structure for table `tblsongs`
--

CREATE TABLE IF NOT EXISTS `tblsongs` (
`id` int(100) NOT NULL,
  `songcat` varchar(10) DEFAULT NULL,
  `songalbum` varchar(50) DEFAULT NULL,
  `songsinger` varchar(100) DEFAULT NULL,
  `songdesc` varchar(250) DEFAULT NULL,
  `songfile` varchar(50) DEFAULT NULL,
  `songwriter` varchar(100) NOT NULL,
  `songpoints` int(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsongs`
--

INSERT INTO `tblsongs` (`id`, `songcat`, `songalbum`, `songsinger`, `songdesc`, `songfile`, `songwriter`, `songpoints`) VALUES
(53, 'OPM', '111', 'Eric Santos', 'dsfs', 'Ill never go.mp3', 'John Talbo', 0),
(39, 'HIPHOP', '101', 'Lil Wayne', 'Lil Wayne', 'Lil Wayne - Beat Without Bass.mp3', 'Lil Wayne', 12),
(38, 'OPM', '99', 'Parokya ', 'Parokya ', 'Parokya Ni Edgar - One And Only You.mp3', 'Parokya ', 0),
(37, 'ROCK', '98', 'Amber Pacific', 'Amber Pacific', 'Amber Pacific - Falling Away.mp3', 'Them', 2),
(36, 'ROCK', '96', 'Slipknot', 'Slipknot', 'Slipknot - Before I Forget.mp3', 'Slipknot', 0),
(41, 'ALTERNATIV', '104', 'Rocksteddy', 'Rocksteddy', 'Rocksteady Wag na lang.mp3', 'Rocksteddy', 14),
(42, 'ALTERNATIV', '99', 'Parokya ', 'Parokya ', 'Parokya Ni Edgar - Gitara.mp3', 'Parokya ', 0),
(43, 'ACOUSTIC', '105', 'Boyce Avenue', 'Boyce Avenue', 'Boyce Avenue - Because of You.mp3', 'Boyce Avenue', 24),
(44, 'ACOUSTIC', '105', 'Boyce Avenue', 'Boyce Avenue', 'Boyce Avenue - Every Breath.mp3', 'Boyce Avenue', 0),
(45, 'RAP', '102', 'Eminem', 'EminemEminem', 'Eminen 8 miles.mp3', 'Eminem', 3),
(46, 'RNB', '100', 'Trey', 'Trey', 'Trey Songs-I need a girl.mp3', 'Trey', 1),
(48, 'OPM', '107', 'Bamboo', 'ok din to', 'Hallelujah.MP3', 'Bamboo', 0),
(49, 'OPM', '108', 'Callalily', 'Callalily', 'Stars.mp3', 'Callalily', 0),
(50, 'OPM', '109', 'Silent Sanctuary', 'dasdasd', 'Summer Song.mp3', 'Silent Sanctuary', 0),
(51, 'OPM', '110', 'Rivermaya', 'dasdasd', 'Sleep.mp3', 'Rivermaya', 0),
(52, 'OPM', '106', 'Siakol', 'dsad', 'Ill never go.mp3', 'Siakol', 0),
(54, 'ACOUSTIC', '105', 'Boyce Avenue', 'ghg', 'Firework.mp3', 'Boyce Avenue', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
`user_id` int(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `name`, `username`, `password`) VALUES
(15, 'jaryl alvero', 'jaryl', 'alvero'),
(3, 'john', 'john', 'talbo'),
(4, 'Harry Den', 'harry', 'pass'),
(5, 'rolando', 'rolando', 'parado'),
(10, 'alvin', 'alvin', 'espejo');

-- --------------------------------------------------------

--
-- Table structure for table `tblvotes`
--

CREATE TABLE IF NOT EXISTS `tblvotes` (
`vid` int(10) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vpoints` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvotes`
--

INSERT INTO `tblvotes` (`vid`, `vname`, `vpoints`) VALUES
(7, 'Waray2x Hip-hop', 15),
(6, 'Waray2x Rock', 51),
(5, 'Waray2x Rap', 35),
(8, 'Waray2x Acoustic', 40),
(9, 'Waray2x RNB', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblalbum`
--
ALTER TABLE `tblalbum`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
 ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tblip`
--
ALTER TABLE `tblip`
 ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `tblsongs`
--
ALTER TABLE `tblsongs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tblvotes`
--
ALTER TABLE `tblvotes`
 ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblalbum`
--
ALTER TABLE `tblalbum`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tblip`
--
ALTER TABLE `tblip`
MODIFY `ip_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tblsongs`
--
ALTER TABLE `tblsongs`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblvotes`
--
ALTER TABLE `tblvotes`
MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
