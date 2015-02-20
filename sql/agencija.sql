-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2015 at 08:18 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodatno`
--

CREATE TABLE IF NOT EXISTS `dodatno` (
`dodatnoID` int(11) NOT NULL,
  `wifi` int(2) NOT NULL,
  `zajtrk` int(2) NOT NULL,
  `kosilo` int(2) NOT NULL,
  `vecerja` int(2) NOT NULL,
  `promet` int(1) NOT NULL,
  `bar` int(1) NOT NULL,
  `terasa` int(1) NOT NULL,
  `igralnica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
`hotelID` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL,
  `kraj` varchar(255) COLLATE utf8_bin NOT NULL,
  `ulica` varchar(255) COLLATE utf8_bin NOT NULL,
  `posta` int(11) NOT NULL,
  `drzava` int(11) NOT NULL,
  `zvezdice` int(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastnikID` int(11) NOT NULL,
  `placilo` varchar(255) COLLATE utf8_bin NOT NULL,
  `valuta` varchar(255) COLLATE utf8_bin NOT NULL,
  `dodatnoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lastnik`
--

CREATE TABLE IF NOT EXISTS `lastnik` (
  `lastnikID` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_bin NOT NULL,
  `priimek` varchar(255) COLLATE utf8_bin NOT NULL,
  `kraj` varchar(255) COLLATE utf8_bin NOT NULL,
  `ulica` varchar(255) COLLATE utf8_bin NOT NULL,
  `posta` int(4) NOT NULL,
  `drzavaID` int(11) NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prostori`
--

CREATE TABLE IF NOT EXISTS `prostori` (
  `prostorID` int(11) NOT NULL,
  `vrsta` varchar(255) COLLATE utf8_bin NOT NULL,
  `opis` varchar(255) COLLATE utf8_bin NOT NULL,
  `hotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

CREATE TABLE IF NOT EXISTS `soba` (
  `sobaID` int(11) NOT NULL,
  `stevilka` int(11) NOT NULL,
  `nadstropje` int(11) NOT NULL,
  `st_postelj` int(2) NOT NULL,
  `klima` int(1) NOT NULL,
  `minibar` int(1) NOT NULL,
  `balkon` int(1) NOT NULL,
  `kvaliteta` varchar(255) COLLATE utf8_bin NOT NULL,
  `cenaNaDan` float NOT NULL,
  `hotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `uporabnik`
--

CREATE TABLE IF NOT EXISTS `uporabnik` (
`uporabnikID` int(10) NOT NULL,
  `ime` varchar(255) COLLATE utf8_bin NOT NULL,
  `priimek` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `geslo` varchar(255) COLLATE utf8_bin NOT NULL,
  `emailCode` varchar(255) COLLATE utf8_bin NOT NULL,
  `datumRegistracije` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `uporabnik`
--

INSERT INTO `uporabnik` (`uporabnikID`, `ime`, `priimek`, `email`, `geslo`, `emailCode`, `datumRegistracije`) VALUES
(1, 'Miha', 'FriÅ¡kovec', 'miha@gmail.com', 'bc59056214f3376da682893076ac4c653d643f69', 'c4853baffd3b5c228acd1a2dc95f506e', '2015-02-18 14:21:15'),
(2, 'Janez', 'Novak', 'janez@gmail.com', 'bc59056214f3376da682893076ac4c653d643f69', 'e3ed7c523097d8d12d50f8950fef8aa1', '2015-02-18 14:22:13'),
(3, 'BlaÅ¾', 'Bricelj', 'blaz@gmail.com', 'f4905cf17326aa3ce111788b1775146e3266b4a9', '476b453732e9addabef55ca46635810b', '2015-02-18 14:26:37'),
(4, 'Luka', 'Belloni', 'luka.kul@gmail.com', 'b46b3ebe4d7a52d245d23aa21f56a3a19ea52f7c', '30dfa209a711e1434684453f345e3ba8', '2015-02-19 07:10:50'),
(5, 'abc', 'Abc', 'grudi@gmsil.com', 'e4f06ca54a25b54e692692b4721cab0dc135b928', 'de38719dbdc3e9c849a0b9de2353c7ed', '2015-02-19 08:21:40'),
(6, 'Klemen', 'Kogovsek', 'klemen@gmail.com', 'bc59056214f3376da682893076ac4c653d643f69', 'f2c531e68a111a75945c97ac790ad7d8', '2015-02-20 13:03:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodatno`
--
ALTER TABLE `dodatno`
 ADD PRIMARY KEY (`dodatnoID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
 ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `soba`
--
ALTER TABLE `soba`
 ADD PRIMARY KEY (`sobaID`);

--
-- Indexes for table `uporabnik`
--
ALTER TABLE `uporabnik`
 ADD PRIMARY KEY (`uporabnikID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dodatno`
--
ALTER TABLE `dodatno`
MODIFY `dodatnoID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uporabnik`
--
ALTER TABLE `uporabnik`
MODIFY `uporabnikID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
