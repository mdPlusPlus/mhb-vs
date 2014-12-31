-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 31. Dez 2014 um 14:30
-- Server Version: 5.5.40-0ubuntu0.14.04.1
-- PHP-Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `symfony`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Angebot`
--

CREATE TABLE IF NOT EXISTS `Angebot` (
  `modul` int(11) NOT NULL,
  `mhb` int(11) NOT NULL,
  `fachgebiet` int(11) NOT NULL,
  `studiengang` int(11) NOT NULL,
  `Angebots_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Angebotsart` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `AbweichenderNameDE` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AbweichenderNameEN` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Angebots_ID`),
  KEY `IDX_945ABEF69D576088` (`modul`),
  KEY `IDX_945ABEF6B1D660BA` (`mhb`),
  KEY `IDX_945ABEF64FBE0E43` (`fachgebiet`),
  KEY `IDX_945ABEF6BA290AAB` (`studiengang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Angebot`
--

INSERT INTO `Angebot` (`modul`, `mhb`, `fachgebiet`, `studiengang`, `Angebots_ID`, `Angebotsart`, `Code`, `AbweichenderNameDE`, `AbweichenderNameEN`) VALUES
(1, 1, 34, 2, 1, 'Pflichtfach', 'B-IN-IG03', NULL, NULL),
(2, 1, 34, 2, 2, 'Pflichtfach', 'B-IN-IG02', NULL, NULL),
(3, 1, 34, 2, 3, 'Pflichtfach', 'B-IN-IG11', NULL, NULL),
(4, 1, 34, 2, 4, 'Pflichtfach', 'B-IN-IV02', NULL, NULL),
(16, 1, 34, 2, 5, 'Pflichtfach', 'B-IN-IG10', NULL, NULL),
(17, 1, 34, 2, 6, 'Pflichtfach', 'B-IN-IG04', NULL, NULL),
(18, 1, 34, 2, 7, 'Pflichtfach', 'B-IN-IG09', NULL, NULL),
(19, 1, 34, 2, 8, 'Pflichtfach', 'B-IN-IG06', NULL, NULL),
(20, 1, 34, 2, 9, 'Pflichtfach', 'B-IN-IG07', NULL, NULL),
(21, 1, 34, 2, 10, 'Pflichtfach', 'B-IN-IG08', NULL, NULL),
(5, 1, 34, 2, 11, 'Pflichtfach', 'B-IN-IV01', NULL, NULL),
(6, 1, 34, 2, 12, 'Pflichtfach', 'B-IN-V05', NULL, NULL),
(7, 1, 34, 2, 13, 'Pflichtfach', 'B-IN-V06', NULL, NULL),
(8, 1, 24, 2, 14, 'Pflichtfach', 'B-IN-MN02', NULL, NULL),
(9, 1, 24, 2, 15, 'Pflichtfach', 'B-IN-MN03', NULL, NULL),
(10, 1, 24, 2, 16, 'Pflichtfach', 'B-IN-MN04', NULL, NULL),
(11, 1, 24, 2, 17, 'Pflichtfach', 'B-IN-IG05', NULL, NULL),
(12, 1, 24, 2, 18, 'Pflichtfach', 'B-IN-IG01', NULL, NULL),
(22, 1, 35, 2, 19, 'Pflichtfach', 'B-IN-AG02', NULL, NULL),
(23, 1, 35, 2, 20, 'Pflichtfach', 'B-IN-AG03', NULL, NULL),
(24, 1, 36, 2, 21, 'Pflichtfach', 'B-IN-BW01', NULL, NULL),
(25, 1, 36, 2, 22, 'Pflichtfach', 'B-IN-BW02', NULL, NULL),
(26, 1, 37, 2, 23, 'Wahlpflichtfach', 'B-IN-WP01', NULL, NULL),
(28, 1, 37, 2, 24, 'Wahlpflichtfach', 'B-IN-WP02', NULL, NULL),
(29, 1, 37, 2, 25, 'Wahlpflichtfach', 'B-IN-WP03', NULL, NULL),
(30, 1, 37, 2, 26, 'Wahlpflichtfach', 'B-IN-WP04', NULL, NULL),
(81, 1, 37, 2, 27, 'Wahlpflichtfach', 'B-IN-WP06', NULL, NULL),
(32, 1, 37, 2, 28, 'Wahlpflichtfach', 'B-IN-WP07', NULL, NULL),
(33, 1, 37, 2, 29, 'Wahlpflichtfach', 'B-IN-WP17', NULL, NULL),
(34, 1, 37, 2, 30, 'Wahlpflichtfach', 'B-IN-WP08', NULL, NULL),
(35, 1, 37, 2, 31, 'Wahlpflichtfach', 'B-IN-WP09', NULL, NULL),
(36, 1, 37, 2, 32, 'Wahlpflichtfach', 'B-IN-WP10', NULL, NULL),
(37, 1, 37, 2, 33, 'Wahlpflichtfach', 'B-IN-WP11', NULL, NULL),
(38, 1, 37, 2, 34, 'Wahlpflichtfach', 'B-IN-WP12', NULL, NULL),
(39, 1, 37, 2, 35, 'Wahlpflichtfach', 'B-IN-WP13', NULL, NULL),
(44, 1, 37, 2, 36, 'Wahlpflichtfach', 'B-IN-WP05', NULL, NULL),
(40, 1, 37, 2, 37, 'Wahlpflichtfach', 'B-IN-WP15', NULL, NULL),
(49, 1, 37, 2, 38, 'Wahlpflichtfach', 'B-IN-WP14', NULL, NULL),
(121, 1, 37, 2, 39, 'Wahlpflichtfach', 'B-IN-WP16', NULL, NULL),
(41, 1, 37, 2, 40, 'Wahlpflichtfach', 'B-IN-WP18', NULL, NULL),
(42, 1, 37, 2, 41, 'Wahlpflichtfach', 'B-IN-WP19', NULL, NULL),
(43, 1, 37, 2, 42, 'Wahlpflichtfach', 'B-IN-WP20', NULL, NULL),
(45, 1, 37, 2, 43, 'Wahlpflichtfach', 'B-IN-WP21', NULL, NULL),
(46, 1, 37, 2, 44, 'Wahlpflichtfach', 'B-IN-WP22', NULL, NULL),
(53, 1, 37, 2, 45, 'Wahlpflichtfach', 'B-IN-WP23', NULL, NULL),
(47, 1, 37, 2, 46, 'Wahlpflichtfach', 'B-IN-WP24', NULL, NULL),
(62, 1, 37, 2, 47, 'Wahlpflichtfach', 'B-IN-WP25', NULL, NULL),
(48, 1, 38, 2, 48, 'Pflichtfach', 'B-IN-PP01', NULL, NULL),
(65, 1, 38, 2, 49, 'Pflichtfach', 'B-IN-PP02', NULL, NULL),
(66, 1, 38, 2, 50, 'Pflichtfach', 'B-IN-PP03', NULL, NULL),
(8, 2, 23, 3, 115, 'Pflichtfach', 'B-BI-MN01', NULL, NULL),
(54, 2, 23, 3, 116, 'Pflichtfach', 'B-BI-MN02', NULL, NULL),
(55, 2, 23, 3, 117, 'Pflichtfach', 'B-BI-MN03', NULL, NULL),
(56, 2, 23, 3, 118, 'Pflichtfach', 'B-BI-MN04', NULL, NULL),
(57, 2, 23, 3, 119, 'Pflichtfach', 'B-BI-MN05', NULL, NULL),
(12, 2, 25, 3, 120, 'Pflichtfach', 'B-BI-PI01', NULL, NULL),
(1, 2, 25, 3, 121, 'Pflichtfach', 'B-BI-PI02', NULL, NULL),
(2, 2, 25, 3, 122, 'Pflichtfach', 'B-BI-PI03', NULL, NULL),
(17, 2, 25, 3, 123, 'Pflichtfach', 'B-BI-PI04', NULL, NULL),
(19, 2, 25, 3, 124, 'Pflichtfach', 'B-BI-PI05', NULL, NULL),
(20, 2, 25, 3, 125, 'Pflichtfach', 'B-BI-PI08)', NULL, NULL),
(6, 2, 25, 3, 126, 'Pflichtfach', 'B-BI-PI10', NULL, NULL),
(7, 2, 25, 3, 127, 'Pflichtfach', 'B-BI-PI11', NULL, NULL),
(59, 2, 27, 3, 128, 'Pflichtfach', 'B-BI-PI06', NULL, NULL),
(60, 2, 27, 3, 129, 'Pflichtfach', 'B-BI-PI07', NULL, NULL),
(61, 2, 26, 3, 130, 'Pflichtfach', 'B-BI-PI09', NULL, NULL),
(63, 2, 26, 3, 131, 'Pflichtfach', 'B-BI-PB02', NULL, NULL),
(64, 2, 26, 3, 132, 'Pflichtfach', 'B-BI-PB03', NULL, NULL),
(67, 2, 26, 3, 133, 'Pflichtfach', 'B-BI-PB04', NULL, NULL),
(67, 2, 26, 3, 134, 'Pflichtfach', 'B-BI-PB04', NULL, NULL),
(69, 2, 26, 3, 135, 'Pflichtfach', 'B-BI-PB05', NULL, NULL),
(70, 2, 26, 3, 136, 'Pflichtfach', 'B-BI-PB01', NULL, NULL),
(72, 2, 28, 3, 137, 'Pflichtfach', 'B-BI-PÜ01', NULL, NULL),
(74, 2, 28, 3, 138, 'Pflichtfach', 'B-BI-PÜ02', NULL, NULL),
(24, 2, 28, 3, 139, 'Pflichtfach', 'B-BI-PÜ03', NULL, NULL),
(75, 2, 28, 3, 140, 'Pflichtfach', 'B-BI-PÜ04', NULL, NULL),
(21, 2, 29, 3, 141, 'Wahlpflichtfach', 'B-BI-WI01', NULL, NULL),
(28, 2, 30, 3, 142, 'Wahlpflichtfach', 'B-BI-WI02', NULL, NULL),
(16, 2, 30, 3, 143, 'Wahlpflichtfach', 'B-BI-WI03', NULL, NULL),
(26, 2, 30, 3, 144, 'Wahlpflichtfach', 'B-BI-WI04', NULL, NULL),
(30, 2, 30, 3, 145, 'Wahlpflichtfach', 'B-BI-WI08', NULL, NULL),
(5, 2, 30, 3, 146, 'Wahlpflichtfach', 'B-BI-WI09', NULL, NULL),
(77, 2, 31, 3, 147, 'Wahlpflichtfach', 'B-BI-WI07', NULL, NULL),
(78, 2, 30, 2, 148, 'Wahlpflichtfach', 'B-BI-WI10', NULL, NULL),
(79, 2, 31, 3, 149, 'Wahlpflichtfach', 'B-BI-WI05', NULL, NULL),
(80, 2, 31, 3, 151, 'Wahlpflichtfach', 'B-BI-WI06', NULL, NULL),
(81, 2, 31, 3, 152, 'Wahlpflichtfach', 'B-BI-WI11', NULL, NULL),
(83, 2, 29, 3, 153, 'Wahlpflichtfach', 'B-BI-WB01', NULL, NULL),
(84, 2, 29, 3, 154, 'Wahlpflichtfach', 'B-BI-WB02', NULL, NULL),
(86, 2, 29, 3, 155, 'Wahlpflichtfach', 'B-BI-WB03', NULL, NULL),
(87, 2, 29, 3, 156, 'Wahlpflichtfach', 'B-BI-WB04', NULL, NULL),
(89, 2, 29, 3, 157, 'Wahlpflichtfach', 'B-BI-WB05', NULL, NULL),
(90, 2, 29, 3, 158, 'Wahlpflichtfach', 'B-BI-WB06', NULL, NULL),
(92, 2, 29, 3, 159, 'Wahlpflichtfach', 'B-BI-WB07', NULL, NULL),
(93, 2, 29, 3, 160, 'Wahlpflichtfach', 'B-BI-WB08', NULL, NULL),
(94, 2, 29, 3, 161, 'Wahlpflichtfach', 'B-BI-WB09', NULL, NULL),
(8, 3, 42, 4, 162, 'Pflichtfach', 'B-IN-MN01', NULL, NULL),
(9, 3, 42, 4, 163, 'Pflichtfach', 'B-IN-MN02', NULL, NULL),
(12, 3, 42, 4, 164, 'Pflichtfach', 'B-IN-MN03', NULL, NULL),
(22, 3, 41, 4, 165, 'Pflichtfach', 'B-MC-AG01', NULL, NULL),
(23, 3, 41, 4, 166, 'Pflichtfach', 'B-MC-AG02', NULL, NULL),
(24, 3, 43, 4, 167, 'Pflichtfach', 'B-MC-BW01', NULL, NULL),
(82, 3, 43, 4, 168, 'Pflichtfach', 'B-MC-BW02', NULL, NULL),
(1, 3, 51, 4, 169, 'Pflichtfach', 'B-MC-IG01', NULL, NULL),
(2, 3, 51, 4, 170, 'Pflichtfach', 'B-MC-IG02', NULL, NULL),
(3, 3, 51, 4, 171, 'Pflichtfach', 'B-MC-IG03', NULL, NULL),
(16, 3, 51, 4, 172, 'Pflichtfach', 'B-MC-IG04', NULL, NULL),
(17, 3, 51, 4, 173, 'Pflichtfach', 'B-MC-IG05', NULL, NULL),
(19, 3, 51, 4, 174, 'Pflichtfach', 'B-MC-IG06', NULL, NULL),
(20, 3, 51, 4, 175, 'Pflichtfach', 'B-MC-IG07', NULL, NULL),
(6, 3, 51, 4, 176, 'Pflichtfach', 'B-MC-IG08', NULL, NULL),
(18, 3, 51, 4, 177, 'Pflichtfach', 'B-MC-IG09', NULL, NULL),
(51, 3, 52, 4, 178, 'Pflichtfach', 'B-MC-MC01', NULL, NULL),
(5, 3, 52, 4, 179, 'Pflichtfach', 'B-MC-MC02', NULL, NULL),
(52, 3, 52, 4, 180, 'Pflichtfach', 'B-MC-MC03', NULL, NULL),
(68, 3, 52, 4, 181, 'Pflichtfach', 'B-MC-MC04', NULL, NULL),
(71, 3, 52, 4, 182, 'Wahlpflichtfach', 'B-MC-MC05', NULL, NULL),
(73, 3, 52, 4, 183, 'Pflichtfach', 'B-MC-MC06', NULL, NULL),
(76, 3, 52, 4, 184, 'Pflichtfach', 'B-MC-MC07', NULL, NULL),
(44, 3, 52, 4, 185, 'Pflichtfach', 'B-MC-MC08', NULL, NULL),
(37, 3, 52, 4, 186, 'Pflichtfach', 'B-MC-MC09', NULL, NULL),
(48, 3, 45, 4, 187, 'Pflichtfach', 'B-MC-PP01', NULL, NULL),
(65, 3, 45, 4, 188, 'Pflichtfach', 'B-MC-PP02', NULL, NULL),
(66, 3, 45, 4, 189, 'Pflichtfach', 'B-MC-PP03', NULL, NULL),
(26, 3, 44, 4, 190, 'Wahlpflichtfach', 'B-MC-WP01', NULL, NULL),
(28, 3, 44, 4, 191, 'Wahlpflichtfach', 'B-MC-WP02', NULL, NULL),
(29, 3, 44, 4, 192, 'Wahlpflichtfach', 'B-MC-WP03', NULL, NULL),
(81, 3, 44, 4, 193, 'Pflichtfach', 'B-MC-WP04', NULL, NULL),
(32, 3, 44, 4, 194, 'Wahlpflichtfach', 'B-MC-WP05', NULL, NULL),
(33, 3, 44, 4, 195, 'Wahlpflichtfach', 'B-MC-WP06', NULL, NULL),
(35, 3, 44, 4, 196, 'Wahlpflichtfach', 'B-MC-WP08', NULL, NULL),
(34, 3, 44, 4, 197, 'Wahlpflichtfach', 'B-MC-WP07', NULL, NULL),
(36, 3, 44, 4, 198, 'Wahlpflichtfach', 'B-MC-WP09', NULL, NULL),
(38, 3, 44, 4, 199, 'Wahlpflichtfach', 'B-MC-WP10', NULL, NULL),
(39, 3, 44, 4, 200, 'Wahlpflichtfach', 'B-MC-WP11', NULL, NULL),
(40, 3, 44, 4, 201, 'Wahlpflichtfach', 'B-MC-WP12', NULL, NULL),
(49, 3, 44, 4, 202, 'Wahlpflichtfach', 'B-MC-WP13', NULL, NULL),
(41, 3, 44, 4, 203, 'Wahlpflichtfach', 'B-MC-WP15', NULL, NULL),
(42, 3, 44, 4, 204, 'Wahlpflichtfach', 'B-MC-WP16', NULL, NULL),
(45, 3, 44, 4, 206, 'Wahlpflichtfach', 'B-MC-WP18', NULL, NULL),
(46, 3, 44, 4, 207, 'Wahlpflichtfach', 'B-MC-WP19', NULL, NULL),
(53, 3, 44, 2, 208, 'Wahlpflichtfach', 'B-MC-WP20', NULL, NULL),
(85, 3, 44, 4, 209, 'Wahlpflichtfach', 'B-MC-WP21', NULL, NULL),
(11, 3, 44, 4, 210, 'Wahlpflichtfach', 'B-MC-WP22', NULL, NULL),
(88, 3, 44, 4, 211, 'Wahlpflichtfach', 'B-MC-WP23', NULL, NULL),
(91, 3, 44, 4, 212, 'Wahlpflichtfach', 'B-MC-WP24', NULL, NULL),
(99, 4, 47, 5, 213, 'Pflichtfach', 'M-IS-MN01', NULL, NULL),
(96, 4, 53, 5, 215, 'Pflichtfach', 'M-IS-IN02', NULL, NULL),
(97, 4, 53, 5, 216, 'Pflichtfach', 'M-IS-IN03', NULL, NULL),
(95, 4, 53, 5, 217, 'Pflichtfach', 'M-IS-IN01', NULL, NULL),
(98, 4, 53, 5, 218, 'Pflichtfach', 'M-IS-IN04', NULL, NULL),
(118, 3, 50, 4, 219, 'Pflichtfach', 'M-IS-PP01', NULL, NULL),
(101, 4, 48, 5, 220, 'Wahlpflichtfach', 'M-IS-WP02', NULL, NULL),
(102, 4, 48, 5, 221, 'Wahlpflichtfach', 'M-IS-WP04', NULL, NULL),
(100, 4, 48, 5, 222, 'Wahlpflichtfach', 'M-IS-WP03', NULL, NULL),
(103, 4, 48, 5, 223, 'Wahlpflichtfach', 'M-IS-WP06', NULL, NULL),
(104, 4, 48, 5, 224, 'Wahlpflichtfach', 'M-IS-WP07', NULL, NULL),
(105, 4, 48, 5, 225, 'Wahlpflichtfach', 'M-IS-WP08', NULL, NULL),
(106, 4, 48, 5, 226, 'Wahlpflichtfach', 'M-IS-WP09', NULL, NULL),
(107, 4, 48, 5, 227, 'Wahlpflichtfach', 'M-IS-WP12', NULL, NULL),
(109, 4, 49, 5, 228, 'Wahlpflichtfach', 'M-IS-WP01', NULL, NULL),
(110, 4, 49, 5, 229, 'Wahlpflichtfach', 'M-IS-WP05', NULL, NULL),
(111, 4, 49, 5, 230, 'Wahlpflichtfach', 'M-IS-WP11', NULL, NULL),
(112, 4, 49, 5, 231, 'Wahlpflichtfach', 'M-IS-WP10', NULL, NULL),
(113, 4, 49, 5, 232, 'Wahlpflichtfach', 'M-IS-WP16', NULL, NULL),
(114, 4, 53, 5, 233, 'Wahlpflichtfach', 'M-IS-WP18', NULL, NULL),
(121, 3, 44, 4, 234, 'Wahlpflichtfach', 'B-MC-WP14', NULL, NULL),
(120, 2, 23, 3, 235, 'Wahlpflichtfach', 'B-BI-MN01', NULL, NULL),
(6, 4, 48, 5, 236, 'Wahlpflichtfach', 'M-IS-WP13', NULL, NULL),
(7, 4, 48, 5, 237, 'Wahlpflichtfach', 'M-IS-WP14', NULL, NULL),
(108, 4, 48, 5, 238, 'Wahlpflichtfach', 'M-IS-WP15', NULL, NULL),
(118, 4, 50, 5, 239, 'Pflichtfach', 'M-IS-PP01', NULL, NULL),
(115, 4, 49, 5, 240, 'Wahlpflichtfach', 'M-IS-WP19', NULL, NULL),
(116, 1, 49, 5, 241, 'Pflichtfach', 'M-IS-WP20', NULL, NULL),
(116, 4, 49, 5, 243, 'Wahlpflichtfach', 'M-IS-WP20', NULL, NULL),
(122, 1, 34, 2, 244, 'Wahlpflichtfach', 'DUMMY', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Dozent`
--

CREATE TABLE IF NOT EXISTS `Dozent` (
  `roles_id` int(11) NOT NULL,
  `Dozenten_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Anrede` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Titel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Nachname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`Dozenten_ID`),
  UNIQUE KEY `UNIQ_D8E1B37AE7927C74` (`email`),
  KEY `IDX_D8E1B37A38C751C4` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Dozent`
--

INSERT INTO `Dozent` (`roles_id`, `Dozenten_ID`, `Anrede`, `Titel`, `Name`, `Nachname`, `email`, `password`, `is_active`) VALUES
(2, 1, 'Frau', 'Prof. Dr. rer. nat.', 'Antje', 'Krause', 'akrause@fh-bingen.de', '$2y$12$fnN0LbndK38qxVG49gMPDeiKCG6Bhwq5SiT74GyeXi/NXLORx368.', 1),
(1, 2, 'Herr', 'Prof. Dr.-Ing.', 'Klaus', 'Lang', 'lang@fh-bingen.de', '$2y$12$hDRRBnt13zqfBmwZdpKQEey1kAi1ltPTUKWpsWSe6dRuRja.HGe/S', 1),
(1, 3, 'Herr', 'Prof. Dr.-Ing.', 'Volker', 'Luckas', 'luckas@fh-bingen.de', '$2y$12$0PCp2dy4MBkpsAFUB6ETJ.TJWiTo9oQWbvTB2zwhMxapaltux/IkG', 1),
(2, 4, 'Herr', 'Prof. Dr. rer. nat.', 'Thomas', 'Marx', 'marx@fh-bingen.de', '$2y$12$hwt6cH3e.7VLR3JurA0PseyToZldyBAVg8nNQrtnwcd0vclZMiRca', 1),
(1, 5, 'Herr', 'Prof. Dr.', 'Frank', 'Mehler', 'mehler@fh-bingen.de', '$2y$12$L0k0mGCNzB1RfYZ/mFKlBex2xSkEhGXr.R30jR327beLjQUCVjLQm', 1),
(1, 6, 'Herr', 'Prof. Dr.-Ing.', 'Maximilian', 'Mengel', 'megel@fh-bingen.de', '$2y$12$L4GAmo1YEoR0qQkv.15smuig84DV4gLX3d3hymdtVLacAQQRj1bdG', 1),
(1, 7, 'Herr', 'Prof. Dr. rer. nat.', 'Hans-Christian', 'Rodrian', 'rodrian@fh-bingen.de', '$2y$12$0KnSXjYIQlH3kQEOH5OaROmcX2haI8h2j1tM3DVoyKI8ZqV/rfzo6', 1),
(2, 8, 'Herr', 'Prof. Dr.', 'Michael', 'Schmidt', 'schmidt@fh-bingen.de', '$2y$12$zkW8gkwXmn4.JnVMjq2vQeEsXVuiCsXU5BmomllybmQzN0wUXRGN2', 1),
(1, 9, 'Herr', 'Prof. Dr.-Ing.', 'Jörg', 'Schultz', 'schultz@fh-bingen.de', '$2y$12$d4zpFKaHNepmpE.gH7Jezul2sMUJ2PVOmSjVUaEqQNlSIpMFk2EkC', 1),
(2, 11, 'Herr', 'Prof. Dr.-Ing.', 'Cornelius', 'Wille', 'wille@fh-bingen.de', '$2y$12$anu/1mueigVTeKLFAffP1uTJbGdiQxwa25lCwe/nTWQXySL88quXu', 1),
(1, 12, 'Herr', 'Prof. Dr.', 'Rudolf', 'Winkel', 'winkel@fh-bingen.de', '$2y$12$omP4zqEH5fLCLiySkvwky.01kw4hX2Xw902IQPRiXmrdrXzuceIbC', 1),
(1, 13, 'Herr', 'Dipl.-Wirt.-Inf', 'Korhan', 'Ekinci', 'Korhan.ekinci@fh-mainz.de', '$2y$12$E6bplfTW3F7xgm2vhflCPeMDK7K/7saJ4U5Vk4XXn8w.ppDBddKra', 1),
(1, 14, 'Frau', 'Dipl.-Schau.', 'Andrea', 'Stasche', 'info@sprech-art.de', '$2y$12$Nn9JwxtEkPn5YRMiQhTa9uoaCvntBC2axP1wuppA1u1OaRvE5gnoG', 1),
(1, 15, 'Herr', 'Dipl.-Inf. (FH)', 'Martin', 'Raabe', 'm.raabe@fh-bingen.de', '$2y$12$Byijd8.uySdXexPF5qDS5Oqw/XO5hov5la2Is5MZDaUcYwSX3xBhy', 1),
(1, 16, 'Herr', 'RA', 'Wolfram', 'Zech', 'wolfram.zech@kanzlei-am-rheinkai.de', '$2y$12$4fZexzQdyqca.hhI4rct9.Fic7ArJ4P7VZ1QSRh0Ve/grz9XVm1Ja', 1),
(1, 17, 'Herr', 'Prof. Dr.-Ing.', 'Jens', 'Altenburg', 'j.altenburg@fh-bingen.de', '$2y$12$7nowgQ0k1JK0cMucBUA5aOg6YnO8eVRJMR2YFGIFEO0ruR6nZrgm.', 1),
(1, 18, 'Herr', 'Prof. Dr.', 'Johannes', 'Pellenz', 'johannes.pellenz@uni-koblenz.de', '$2y$12$k5jjZUKKTfhkQ0JeWgQ1I.xnxF8h6c6KpABed82qPS48bx8SRJek.', 1),
(1, 19, 'Herr', 'Prof. Dr.', 'Dieter', 'Kilsch', 'd.kilsch@fh-bingen.de', '$2y$12$lG0rUaIRZYcBCSj3sEmVruZXVibZ0.6WY7d9lH59wtT0984dxSvW2', 1),
(1, 20, 'Frau', 'Prof. Dr.', 'Cornelia', 'Lorenz-Haas', 'c.lorenz-haas@fh-bingen.de', '$2y$12$gguLg8gBTqoRPR5pREPmeOBfConucMvpU2nAJB0Ywz8kluFu1pFV.', 1),
(1, 21, 'Herr', 'Prof. Dr.-Ing.', 'Kai', 'Muffler', 'k.muffler@fh-bingen.de', '$2y$12$UHjd4x9ADkb3tnz7k6QVJ.q/U8y1yWoXGMWZ0FlQCGL1OSXjlvNxm', 1),
(1, 22, 'Herr', 'Prof. Dr. agr.', 'Claus Heinrich', 'Stier', 'c.stier@fh-bingen.de', '$2y$12$5iLTPL8AuIGhnkKutbu7t.DOb/0Dn/miC8jhhOqrYWhxM9VesaEm2', 1),
(1, 23, 'Herr', 'Prof. Dr.', 'Clemens', 'Weiß', 'c.weiss@fh-bingen.de', '$2y$12$F35zEBIotv3t21u2vQONFuSsUn1LUC7BFw7bhgFZEiq/MMfAy6ayW', 1),
(1, 24, 'Herr', 'Dr.', 'Heinrich', 'Wippermann', 'wippermann@fh-bingen.de', '$2y$12$tQLIU8m/qT.eP6CxHGk/meUyBHtr4FpwWE95V2oakeyyqpgNJCdZe', 1),
(1, 25, 'Frau', 'Mag. Phil.', 'Birgit', 'Höss', 'hoess@dummy.de', '$2y$12$vmAke2g2nQK6V3BTvABrl.f5YhBBDsyDW0HCE8aU/heQpnm68F6fW', 1),
(1, 26, 'Herr', 'Prof. Dr. med.', 'Andreas', 'Pfützner', 'pfützner@dummy.de', '$2y$12$3RgpVVCkaNvXUWULP7q1LuHOp03hugV/ZlmY7eONEXOibcEdH8Hm6', 1),
(1, 27, 'Frau', 'Prof. Dr.', 'Gabriele', 'Krczal-Gehring', 'krczal@dummy.de', '$2y$12$HZclYhoBoi3MwqU3lzrsWuV9UlYnGkW4aJGC1mxE3yGE0V2.D3Oie', 1),
(1, 28, 'Herr', 'Ph. D.', 'Michael', 'Mrosek', 'mrosek@dummy.de', '$2y$12$SEkXR/nodzximbNBsNrvc.mwT2.1FYWIafK5zc3Nn98JYiJr2r5wW', 1),
(1, 29, 'Herr', 'Dr.', 'Maik Jörg', 'Lehmann', 'lehmann@dummy.de', '$2y$12$7sqsDJT3dmQSHuGxRB19PeGiocmHAej8w1ckXUn6SoQ1DaWTwZnYe', 1),
(1, 30, 'Frau', 'Dr.', 'Caroline', 'Grunewald', 'grunewald@dummy.de', '$2y$12$44mKSpw.jHrAD7cI4OjuJ.3mgAJSdyJQU46fxND8BtqMJ5nVTYi8C', 1),
(1, 31, 'Herr', 'M. Sc.', 'Stefan', 'Erdmann', 'erdmann@dummy.de', '$2y$12$3RWahFho4JnLTABrUDD2..hiHr1MPelNIDeScM0XNH/BH127IvVuS', 1),
(1, 32, 'Frau', 'Prof. Dr.', 'Anett', 'Mehler-Bicher', 'mehler-bicher@dummy.de', '$2y$12$ywhhVNC2BUY6pUSpFhSvdup/NhR1hECxDFEH5DKhQ3dHoTQSS/wvq', 1),
(1, 33, 'Herr', 'Dr.', 'Patrick', 'Siegfried', 'siegfried@dummy.de', '$2y$12$xg2koB088B8n/U2oAQPVNeGOrCj78zM9JqUYqHR0I7Z5yfx3scu6y', 1),
(2, 34, 'Herr', 'Prof. Dr.', 'Hans', 'Rollo', 'rollo@test.com', '$2y$12$4vDOZvAAzem9IDNDhh.7Z.Fs1J0dIJPLjgH3hoN.xW63RpSNOpJdS', 1),
(2, 40, 'Herr', 'test', 'Peter', 'Wurst', 'wurst@test.com', '$2y$12$OULkzGIq7aJPnBWjncnmUe9srEcAmKwi8hFrGBcR7mMQDKi7idFuK', 1);

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Fachgebiet`
--

CREATE TABLE IF NOT EXISTS `Fachgebiet` (
  `studiengang` int(11) NOT NULL,
  `Fachgebiets_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Titel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Fachgebiets_ID`),
  KEY `IDX_E30D93BA290AAB` (`studiengang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Fachgebiet`
--

INSERT INTO `Fachgebiet` (`Fachgebiets_ID`, `studiengang`, `Titel`) VALUES
(23, 3, 'Mathematisch-Naturwissenschaftliche Grundlagen'),
(24, 2, 'Mathematisch-Naturwissenschaftliche Grundlagen'),
(25, 3, 'Pflichtveranstaltungen Informatik'),
(26, 3, 'Pflichtveranstaltungen Biotechnik'),
(27, 3, 'Pflichtveranstaltungen Bioinformatik'),
(28, 3, 'Pflichtveranstaltungen Übergreifende Inhalte'),
(29, 3, 'Wahlpflichtveranstaltungen Biotechnik'),
(30, 3, 'Wahlpflichtveranstaltungen Informatik'),
(31, 3, 'Wahlpflichtveranstaltungen Bioinformatik'),
(32, 3, 'Praxisphase'),
(33, 3, 'Bachelorarbeit'),
(34, 2, 'Informatik'),
(35, 2, 'Allgemeine Grundlagen'),
(36, 2, 'Betriebswirtschaftliche Inhalte'),
(37, 2, 'Wahlpflichtfächer'),
(38, 2, 'Praxis'),
(41, 4, 'Allgemeine Grundlagen'),
(42, 4, 'Mathematisch-Naturwissenschaftliche Grundlagen'),
(43, 4, 'Betriebswirtschaftliche Inhalte'),
(44, 4, 'Wahlpflichtfächer'),
(45, 4, 'Praxis'),
(47, 5, 'Mathematik'),
(48, 5, 'Wahlpflichtfächer Informatik'),
(49, 5, 'Wahlpflichtfächer Übergreifend'),
(50, 5, 'Praxis'),
(51, 4, 'Informatik'),
(52, 4, 'Mobile Computing'),
(53, 5, 'Informatik'),
(66, 10, 'FG3'),
(67, 10, 'FG4'),
(68, 10, 'FG5');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kernfach`
--

CREATE TABLE IF NOT EXISTS `Kernfach` (
  `modul` int(11) NOT NULL,
  `vertiefung` int(11) NOT NULL,
  `Kernfach_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Kernfach_ID`),
  KEY `IDX_F252DFB09D576088` (`modul`),
  KEY `IDX_F252DFB0E28D2D8E` (`vertiefung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Kernfach`
--

INSERT INTO `Kernfach` (`modul`, `vertiefung`, `Kernfach_ID`) VALUES
(28, 4, 1),
(29, 5, 2),
(30, 5, 3),
(30, 2, 4),
(44, 2, 5),
(44, 5, 6),
(32, 5, 7),
(34, 4, 8),
(34, 5, 9),
(35, 5, 10),
(36, 5, 11),
(37, 2, 12),
(37, 5, 13),
(38, 5, 14),
(38, 2, 15),
(39, 2, 16),
(49, 2, 17),
(40, 2, 18),
(40, 4, 19),
(40, 5, 20),
(121, 4, 21),
(33, 4, 22),
(33, 2, 23),
(41, 5, 24),
(42, 4, 25),
(20, 2, 26),
(45, 4, 27),
(46, 4, 28),
(53, 4, 29);

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Lehrende`
--

CREATE TABLE IF NOT EXISTS `Lehrende` (
  `modul` int(11) NOT NULL,
  `dozent` int(11) NOT NULL,
  `Lehrende_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Lehrende_ID`),
  KEY `IDX_D7D38F7E9D576088` (`modul`),
  KEY `IDX_D7D38F7EDF4DB64C` (`dozent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Lehrende`
--

INSERT INTO `Lehrende` (`modul`, `dozent`, `Lehrende_ID`) VALUES
(1, 1, 1),
(17, 1, 2),
(12, 4, 3),
(22, 14, 4),
(1, 5, 5),
(2, 3, 6),
(3, 3, 7),
(4, 6, 8),
(16, 8, 9),
(17, 7, 10),
(18, 2, 11),
(19, 8, 12),
(20, 11, 13),
(21, 3, 14),
(5, 7, 15),
(6, 4, 16),
(7, 4, 17),
(8, 12, 18),
(9, 12, 19),
(10, 12, 20),
(11, 2, 21),
(23, 16, 22),
(24, 5, 23),
(25, 5, 24),
(25, 13, 25),
(26, 2, 26),
(28, 2, 27),
(29, 6, 28),
(30, 11, 29),
(32, 3, 30),
(37, 3, 35),
(38, 7, 36),
(39, 3, 37),
(40, 8, 38),
(48, 7, 39),
(48, 8, 40),
(33, 4, 41),
(34, 4, 42),
(35, 7, 43),
(36, 3, 44),
(44, 7, 48),
(49, 11, 50),
(121, 8, 51),
(41, 7, 52),
(42, 8, 53),
(43, 11, 54),
(45, 2, 55),
(46, 8, 56),
(47, 15, 57),
(62, 8, 58),
(54, 24, 59),
(56, 22, 60),
(57, 21, 61),
(58, 20, 62),
(59, 1, 63),
(60, 1, 64),
(61, 1, 65),
(63, 1, 66),
(64, 22, 67),
(67, 1, 68),
(69, 1, 69),
(70, 1, 70),
(72, 25, 71),
(74, 1, 72),
(75, 1, 73),
(77, 1, 74),
(78, 1, 75),
(79, 19, 76),
(80, 19, 77),
(83, 21, 78),
(67, 21, 79),
(86, 27, 80),
(87, 26, 81),
(89, 24, 82),
(90, 1, 83),
(92, 24, 84),
(93, 24, 85),
(94, 1, 86),
(30, 2, 87),
(52, 2, 88),
(68, 6, 89),
(71, 31, 90),
(73, 11, 91),
(76, 4, 92),
(119, 7, 93),
(82, 5, 94),
(85, 11, 95),
(88, 11, 96),
(91, 6, 97),
(95, 4, 98),
(96, 11, 99),
(97, 8, 100),
(98, 5, 101),
(99, 12, 102),
(100, 12, 103),
(101, 6, 104),
(102, 1, 105),
(103, 1, 106),
(104, 7, 107),
(105, 3, 108),
(105, 7, 109),
(106, 3, 110),
(107, 4, 111),
(108, 4, 112),
(109, 4, 113),
(110, 32, 114),
(111, 33, 116),
(112, 2, 117),
(113, 4, 118),
(114, 4, 119),
(115, 4, 120),
(116, 4, 121),
(117, 19, 122),
(84, 1, 123),
(51, 2, 124);

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Modulhandbuch`
--

CREATE TABLE IF NOT EXISTS `Modulhandbuch` (
  `MHB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Versionsnummer` int(11) NOT NULL,
  `Erstellungsdatum` date NOT NULL,
  `Beschreibung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gueltigAb` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `gehoertZu` int(11) NOT NULL,
  PRIMARY KEY (`MHB_ID`),
  KEY `IDX_5B069A3DD1399647` (`gueltigAb`),
  KEY `IDX_5B069A3DA4DC89DA` (`gehoertZu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Modulhandbuch`
--

INSERT INTO `Modulhandbuch` (`gueltigAb`, `gehoertZu`, `MHB_ID`, `Versionsnummer`, `Erstellungsdatum`, `Beschreibung`) VALUES
('SS14', 2, 1, 1, '2014-12-13', 'MHB INF SS14'),
('SS14', 3, 2, 1, '2014-12-13', 'MHB BBI SS14'),
('SS14', 4, 3, 1, '2014-12-13', 'MHB MOCO SS14'),
('SS14', 5, 4, 1, '2014-12-13', 'MHB MINF SS14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_77FF01C357698A6A` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Roles`
--

INSERT INTO `Roles` (`id`, `name`, `role`) VALUES
(1, 'ROLE_DOZENT', 'ROLE_DOZENT'),
(2, 'ROLE_SGL', 'ROLE_SGL');

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Semester`
--

CREATE TABLE IF NOT EXISTS `Semester` (
  `Semester` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Semester`
--

INSERT INTO `Semester` (`Semester`) VALUES
('SS14'),
('SS15'),
('SS16'),
('SS17'),
('WS13'),
('WS14'),
('WS15'),
('WS16'),
('WS17');

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Semesterplan`
--

CREATE TABLE IF NOT EXISTS `Semesterplan` (
  `modul` int(11) NOT NULL,
  `dozent` int(11) NOT NULL,
  `semester` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Semesterplan_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SWSUebung` int(11) NOT NULL,
  `SWSVorlesung` int(11) NOT NULL,
  `AnzahlUebungsgruppen` int(11) NOT NULL,
  `GroesseUebungsgruppen` int(11) NOT NULL,
  PRIMARY KEY (`Semesterplan_ID`),
  KEY `IDX_3E93F4AE9D576088` (`modul`),
  KEY `IDX_3E93F4AEDF4DB64C` (`dozent`),
  KEY `IDX_3E93F4AEF7388EED` (`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Semesterplan`
--

INSERT INTO `Semesterplan` (`modul`, `dozent`, `semester`, `Semesterplan_ID`, `SWSUebung`, `SWSVorlesung`, `AnzahlUebungsgruppen`, `GroesseUebungsgruppen`) VALUES
(1, 5, 'WS14', 1, 0, 0, 0, 0),
(2, 3, 'WS14', 2, 0, 0, 0, 0),
(3, 3, 'SS14', 3, 0, 0, 0, 0),
(4, 6, 'WS14', 4, 0, 0, 0, 0),
(16, 8, 'WS14', 5, 0, 0, 0, 0),
(17, 4, 'SS14', 6, 0, 0, 0, 0),
(17, 4, 'WS14', 7, 0, 0, 0, 0),
(18, 2, 'SS14', 8, 0, 0, 0, 0),
(19, 8, 'WS14', 9, 0, 0, 0, 0),
(20, 11, 'SS14', 10, 0, 0, 0, 0),
(21, 3, 'SS14', 11, 0, 0, 0, 0),
(5, 7, 'SS14', 12, 0, 0, 0, 0),
(6, 4, 'WS14', 13, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Studiengang`
--

CREATE TABLE IF NOT EXISTS `Studiengang` (
  `sgl` int(11) NOT NULL,
  `Studiengang_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fachbereich` int(11) NOT NULL,
  `Grad` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Titel` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Kuerzel` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Beschreibung` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Studiengang_ID`),
  UNIQUE KEY `UNIQ_3CB5857C42E95482` (`Titel`),
  UNIQUE KEY `UNIQ_3CB5857C1583ADB2` (`Kuerzel`),
  KEY `IDX_3CB5857CC74EDF08` (`sgl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Studiengang`
--

INSERT INTO `Studiengang` (`Studiengang_ID`, `Fachbereich`, `Grad`, `Titel`, `Kuerzel`, `Beschreibung`, `sgl`) VALUES
(2, 2, 'Bachelor', 'Informatik', 'BInf', 'Ab dem Wintersemester 2012/13 bietet Ihnen das Studium der Informatik ein nach aktuellen Anforderungen der Berufswelt konzipiertes 7-semestriges Studienprogramm. Sie erwerben eine fundierte Ausbildung zum Informatiker, die für unterschiedliche Tätigkeiten in vielen Bereichen eines sehr attraktiven IT-Arbeitsmarktes qualifiziert:', 8),
(3, 2, 'Bachelor', 'Angewandte Bioinformatik', 'BBI', 'Seit dem Wintersemester 2012/13 bietet die FH Bingen das Studium der "Angewandten Bioinformatik" als 7-semestrigen Bachelor-Studiengang (Bachelor of Science) an. Die Studierenden erwerben ein breites Spektrum an anwendungsbezogenem Wissen in den Fachgebieten Biotechnologie und Informatik und in der sie verbindenden Bioinformatik. Mit diesem Wissen haben Absolventen sowohl in der Forschung als auch in der Industrie sehr gute Berufschancen. Die FH Bingen verfügt über eine moderne Ausstattung und ein sehr gutes Betreuungsverhältnis, d.h. Lehrveranstaltungen finden in kleinen Gruppen statt, die eine individuelle und persönliche Betreuung der Studierenden ermöglichen.', 1),
(4, 2, 'Bachelor', 'Mobile Computing', 'MoCo', 'Zum Wintersemester 2012/13 startete an der Fachhochschule Bingen der bundesweit erste Bachelor-Studiengang Mobile Computing. Der Studiengang stellt die revolutionäre Entwicklung hin zu mobilen Computersystemen in den Fokus der Ausbildung.   In sieben Semestern erwerben die Studierenden eine vollwertige Ausbildung zum Informatiker mit dem Abschluss „Bachelor of Science“. Die Ausbildung qualifiziert  in besonderer Weise für die Umsetzung mobiler Anwendungen in verschiedenen Aufgabengebieten im Umfeld Mobiler Systeme.', 11),
(5, 2, 'Master', 'Informationssysteme', 'MInf', 'Das Studium zielt auf eine spätere berufliche Tätigkeit in Unternehmen, die Informationssysteme planen, entwickeln oder betreiben. Unter einem "Informationssystem" verstehen wir ein komplexes, multifunktionelles System unterschiedlicher informationstechnologischer Komponenten, die miteinander verknüpft sind und zur Verarbeitung großer Datenmengen dienen. Die Spannweite von Informationssystemen umfasst dabei Wissensmanagementsysteme ebenso wie Enterprise-Resource-Planning-Systeme (ERP), Internetbasierte Systeme und Bioinformations-Services.', 4),
(10, 2, 'Bachelor', 'Test-Studiengang', 'TEST', 'Test', 34);

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Studienplan`
--

CREATE TABLE IF NOT EXISTS `Studienplan` (
  `startsemester` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `modul` int(11) NOT NULL,
  `studiengang` int(11) NOT NULL,
  `Studienplan_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Regelsemester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Studienplan_ID`),
  KEY `IDX_7E7DD6273B53343` (`startsemester`),
  KEY `IDX_7E7DD629D576088` (`modul`),
  KEY `IDX_7E7DD62BA290AAB` (`studiengang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Studienplan`
--

INSERT INTO `Studienplan` (`Studienplan_ID`, `RegelSemester`, `startsemester`, `Modul`, `Studiengang`) VALUES
(1, '1', 'WS13', 8, 2),
(2, '1', 'WS13', 16, 2),
(3, '1', 'WS13', 2, 2),
(5, '1', 'WS13', 1, 2),
(6, '1', 'WS13', 12, 2),
(7, '2', 'WS13', 9, 2),
(8, '2', 'WS13', 24, 2),
(9, '2', 'WS13', 17, 2),
(10, '2', 'WS13', 18, 2),
(11, '2', 'WS13', 3, 2),
(12, '3', 'WS13', 10, 2),
(13, '3', 'WS13', 19, 2),
(14, '3', 'WS13', 11, 2),
(15, '3', 'WS13', 4, 2),
(16, '4', 'WS13', 22, 2),
(17, '4', 'WS13', 20, 2),
(18, '4', 'WS13', 21, 2),
(19, '4', 'WS13', 5, 2),
(20, '5', 'WS13', 23, 2),
(21, '5', 'WS13', 25, 2),
(22, '5', 'WS13', 6, 2),
(23, '6', 'WS13', 7, 2),
(24, '6', 'WS13', 48, 2),
(25, '7', 'WS13', 65, 2),
(26, '7', 'WS13', 66, 2),
(27, '1', 'WS13', 1, 4),
(28, '1', 'WS13', 2, 4),
(29, '1', 'WS13', 16, 4),
(30, '1', 'WS13', 8, 4),
(31, '1', 'WS13', 12, 4),
(32, '2', 'WS13', 18, 4),
(33, '2', 'WS13', 17, 4),
(34, '2', 'WS13', 3, 4),
(35, '2', 'WS13', 52, 4),
(36, '3', 'WS13', 5, 4),
(37, '3', 'WS13', 68, 4),
(38, '3', 'WS13', 71, 4),
(39, '3', 'WS13', 19, 4),
(40, '4', 'WS13', 51, 4),
(41, '4', 'WS13', 37, 4),
(42, '4', 'WS13', 20, 4),
(43, '4', 'WS13', 22, 4),
(44, '5', 'WS13', 82, 4),
(45, '5', 'WS13', 6, 4),
(46, '5', 'WS13', 44, 4),
(47, '5', 'WS13', 73, 4),
(48, '6', 'WS13', 76, 4),
(49, '6', 'WS13', 23, 4),
(50, '6', 'WS13', 24, 4),
(51, '6', 'WS13', 48, 4),
(52, '7', 'WS13', 65, 4),
(53, '7', 'WS13', 66, 4),
(54, '1', 'SS14', 52, 4),
(55, '1', 'SS14', 8, 4),
(56, '1', 'SS14', 18, 4),
(57, '1', 'SS14', 12, 4),
(58, '1', 'SS14', 22, 4),
(59, '2', 'SS14', 51, 4),
(60, '2', 'SS14', 1, 4),
(61, '2', 'SS14', 2, 4),
(62, '2', 'SS14', 16, 4),
(63, '2', 'SS14', 17, 4),
(64, '3', 'SS14', 5, 4),
(65, '3', 'SS14', 3, 4),
(66, '3', 'SS14', 20, 4),
(67, '3', 'SS14', 9, 4),
(68, '3', 'SS14', 24, 4),
(69, '4', 'SS14', 68, 4),
(70, '4', 'SS14', 119, 4),
(71, '4', 'SS14', 19, 4),
(72, '4', 'SS14', 6, 4),
(73, '4', 'SS14', 82, 4),
(74, '5', 'SS14', 21, 4),
(75, '5', 'SS14', 37, 4),
(76, '5', 'SS14', 76, 4),
(77, '5', 'SS14', 71, 4),
(78, '6', 'SS14', 73, 4),
(79, '6', 'SS14', 48, 4),
(80, '7', 'SS14', 65, 4),
(81, '7', 'SS14', 66, 4),
(82, '7', 'WS13', 65, 3),
(83, '7', 'WS13', 66, 3),
(84, '6', 'WS13', 7, 3),
(85, '6', 'WS13', 64, 3),
(86, '5', 'WS13', 70, 3),
(87, '5', 'WS13', 6, 3),
(88, '4', 'WS13', 56, 3),
(89, '4', 'WS13', 63, 3),
(90, '4', 'WS13', 24, 3),
(91, '4', 'WS13', 61, 3),
(92, '4', 'WS13', 60, 3),
(93, '4', 'WS13', 20, 3),
(94, '3', 'WS13', 1, 3),
(95, '3', 'WS13', 2, 3),
(96, '3', 'WS13', 19, 3),
(97, '3', 'WS13', 58, 3),
(98, '3', 'WS13', 69, 3),
(99, '2', 'WS13', 54, 3),
(100, '2', 'WS13', 67, 3),
(101, '2', 'WS13', 72, 3),
(102, '2', 'WS13', 75, 3),
(103, '2', 'WS13', 59, 3),
(104, '2', 'WS13', 17, 3),
(106, '1', 'WS13', 12, 3),
(107, '1', 'WS13', 74, 3),
(108, '1', 'WS13', 55, 3),
(109, '1', 'WS13', 57, 3),
(110, '1', 'SS14', 12, 3),
(111, '1', 'SS14', 17, 3),
(112, '1', 'SS14', 59, 3),
(113, '1', 'SS14', 59, 3),
(114, '1', 'SS14', 72, 3),
(115, '1', 'SS14', 56, 3),
(116, '2', 'SS14', 2, 3),
(117, '2', 'SS14', 74, 3),
(118, '2', 'SS14', 55, 3),
(119, '2', 'SS14', 57, 3),
(120, '3', 'SS14', 54, 3),
(121, '3', 'SS14', 67, 3),
(122, '3', 'SS14', 24, 3),
(123, '3', 'SS14', 20, 3),
(124, '3', 'SS14', 60, 3),
(125, '3', 'SS14', 61, 3),
(126, '4', 'SS14', 1, 3),
(127, '4', 'SS14', 19, 3),
(128, '4', 'SS14', 58, 3),
(129, '4', 'SS14', 69, 3),
(130, '5', 'SS14', 7, 3),
(131, '5', 'SS14', 64, 3),
(132, '5', 'SS14', 63, 3),
(133, '6', 'SS14', 70, 3),
(134, '6', 'SS14', 6, 3),
(135, '7', 'SS14', 65, 3),
(136, '7', 'SS14', 66, 3),
(137, '1', 'WS13', 99, 5),
(138, '1', 'WS13', 95, 5),
(139, '1', 'WS13', 107, 5),
(140, '2', 'WS13', 96, 5),
(142, '2', 'WS13', 98, 5),
(144, '3', 'SS14', 118, 5),
(145, '1', 'SS14', 96, 5),
(146, '1', 'SS14', 97, 5),
(147, '2', 'WS13', 97, 5),
(148, '1', 'SS14', 98, 5),
(149, '3', 'SS14', 118, 5),
(150, '2', 'SS14', 99, 5),
(151, '2', 'SS14', 95, 5),
(152, '2', 'SS14', 107, 5),
(153, '1', 'SS14', 8, 2),
(154, '1', 'SS14', 22, 2),
(155, '1', 'SS14', 12, 2),
(156, '1', 'SS14', 18, 2),
(157, '2', 'SS14', 16, 2),
(158, '2', 'SS14', 11, 2),
(159, '2', 'SS14', 17, 2),
(160, '2', 'SS14', 1, 2),
(161, '2', 'SS14', 2, 2),
(162, '3', 'SS14', 9, 2),
(163, '3', 'SS14', 20, 2),
(164, '4', 'SS14', 19, 2),
(165, '4', 'SS14', 4, 2),
(166, '3', 'SS14', 3, 2),
(167, '3', 'SS14', 21, 2),
(168, '5', 'SS14', 7, 2),
(169, '6', 'SS14', 48, 2),
(170, '7', 'SS14', 65, 2),
(171, '7', 'SS14', 66, 2),
(172, '4', 'SS14', 10, 2),
(173, '4', 'SS14', 25, 2),
(174, '1', 'SS14', 24, 2),
(175, '5', 'SS14', 23, 2),
(176, '5', 'SS14', 5, 2),
(177, '6', 'SS14', 6, 2),
(178, '2', 'SS14', 120, 3),
(179, '1', 'WS13', 120, 3);

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Veranstaltung`
--

CREATE TABLE IF NOT EXISTS `Veranstaltung` (
  `modulbeauftragter` int(11) NOT NULL,
  `Modul_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Erstellungsdatum` date NOT NULL,
  `Versionsnummer` int(11) NOT NULL,
  `Status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Kuerzel` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `NameEN` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Haeufigkeit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dauer` int(11) DEFAULT NULL,
  `Lehrveranstaltungen` longtext COLLATE utf8_unicode_ci,
  `KontaktzeitVL` int(11) DEFAULT NULL,
  `KontaktzeitSonstige` int(11) DEFAULT NULL,
  `Selbststudium` int(11) DEFAULT NULL,
  `Gruppengroesse` int(11) DEFAULT NULL,
  `Lernergebnisse` longtext COLLATE utf8_unicode_ci,
  `Inhalte` longtext COLLATE utf8_unicode_ci,
  `Pruefungsformen` longtext COLLATE utf8_unicode_ci,
  `Sprache` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Literatur` longtext COLLATE utf8_unicode_ci,
  `Leistungspunkte` int(11) DEFAULT NULL,
  `VoraussetzungLP` longtext COLLATE utf8_unicode_ci,
  `VoraussetzungInhalte` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Modul_ID`),
  KEY `IDX_217D6026F3B07FDF` (`modulbeauftragter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Veranstaltung`
--

INSERT INTO `Veranstaltung` (`Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `modulbeauftragter`, `KontaktzeitVL`, `KontaktzeitSonstige`, `VoraussetzungLP`, `VoraussetzungInhalte`) VALUES
(1, '2014-12-11', 1, 'Freigegeben', 'IGRU2', 'Grundlagen der Informatik 2', 'Introduction to Computer Science 2', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 70, 'Kenntnisse von Grundbegriffen der Graphentheorie\r\nEinblick in Prinzipien von Programmiersprachen\r\nFähigkeit, formale Sprachen mittels Grammatiken zu definieren und anzuwenden (z.B. bei der Konstruktion von Automaten)\r\nGrundkenntnisse von Modellen zur Berechenbarkeit, z.B. Turingmaschine. Grenzen der Berechenbarkeit und Beispiele von NP-vollständigen Problemen\r\nGrundbegriffe der diskreten Wahrscheinlichkeitsrechnung\r\nKenntnis von Grundbegriffen der Informationstheorie\r\nDatenkompression: Fähigkeit Redundanz zu erkennen und zu vermeiden. Anwendung von verlustfreien Codie-rungsverfahren zur Verringerung der Redundanz\r\nVerlustbehaftete Kompression: Kenntnisse von Verfahren, Daten mit kaum merkbarem Verlust zu komprimie-ren\r\nKenntnisse von Verfahren der Fehlererkennung und -korrektur\r\nGrundkenntnisse der Kryptographie', '- Graphentheorie und Modellbildung\r\n- Konzepte von Programmiersprachen, Anwendung von Rekursion\r\n- Formale Sprachen\r\n- Berechenbarkeitstheorie\r\n- Komplexitätstheorie\r\n- Diskrete Wahrscheinlichkeitstheorie\r\n-Informationstheorie, Entscheidungsbäume\r\n- Datenkompression (verlustfrei)\r\n- Verlustbehaftete Kompression\r\n- Fehlererkennung und -korrektur\r\n- Kryptographie: Symmetrische und asymmetrische Verfahren.', 'Schriftliche Klausur;;', 'deutsch', 'H.-P. Gumm, M. Sommer: Einführung in die Informatik. Verlag Oldenbourg, München\r\nH. Herold, B. Lurz, J. Wohlrab, Grundlagen der Informatik, Verlag Pearson, München\r\nUwe Schöning, Ideen der Informatik: Grundlegende Modelle und Konzepte der Theoretischen Infor-matik, München\r\nPeter Rechenberg, Gustav Pomberger: Informatik Handbuch, Verlag Hanser: München, Wien\r\nP. Becker, Mathematische Grundlagen für die Informatik, Graphentheorie, ZFH Koblenz', 6, 5, NULL, NULL, NULL, NULL),
(2, '2014-12-11', 1, 'Freigegeben', 'PROG1', 'Programmieren 1', 'Programming 1', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 70, 'Die Studierenden verstehen den grundsätzlichen Ansatz und die Vorgehensweise der objektorien-tierten Programmierung. Sie verstehen den Aufbau und die Wechselwirkung von Objekten und be-herrschen die grundlegenden Programmiertechniken in Java. Sie sind in der Lage korrekten, lesba-ren und wartbaren Code zu erzeugen und kennen einige grundlegende Klassen der Java-Bibliothek.', 'Einführung in die Programmiersprachen, prozedurale und objektorientierte Programmierung\r\nArithmetik und Variablen, primitive Datentypen, Wertebereiche\r\nKontrollstrukturen (Sequenz, Selektion, Iteration, Rekursion)\r\nKlassen, Referenztypen, Werte- und Referenzsemantik\r\nZeichen und Zeichenketten\r\nFelder\r\nGeneralisierung, Spezialisierung, Interfaces\r\nAssertions und Exceptions', 'Schriftliche Klausur;;', 'deutsch', 'C. S. Horstmann, G. Cornell: Core Java, Volume I Fundamentals, 8th Edition, Prentice Hall 2008, ISBN 978-0-13235476-9\r\nC. Ullenboom: Java ist auch eine Insel - Programmieren mit der Java Standard Edition Version 6, 9. Auflage, Galileo Computing 2010, ISBN 978-3-83621506-0\r\nR. Schiedermeier: Programmieren mit Java. 2. Auflage, Pearson Studium 2010, ISBN 978-3-86894031-2\r\nG. Krüger, T. Stark: Handbuch der Java Programmierung Standard Edition Version 6, 6. Auflage, Addison-Wesley 2009, ISBN 978-3-82732874-8', 6, 3, NULL, NULL, NULL, NULL),
(3, '2014-12-11', 1, 'Freigegeben', 'PROG2', 'Programmieren 2', 'Programming 2', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 105, 70, 'Die Studierenden erlangen ein vertieftes Verständnis objektorientierter Programmentwicklung. Sie sind in der Lage größere Anwendungen zu strukturieren und zu erstellen. Sie verstehen das Konzept der Klassenhierarchien und beherrschen dessen Nutzung in Verbindung mit vorgefertigten Bibliothe-ken und Entwurfsmustern. Die Studierenden verstehen das Konzept der Schnittstellen und können diese definieren und einsetzen. Sie kennen grafische Benutzerschnittstellen und sind in der Lage diese zu erstellen.', '- Packages\r\n- Dokumentation\r\n- Ein- und Ausgabe\r\n- Java Collection Framework\r\n- Generics\r\n- Iteratoren\r\n- GUI Programmierung\r\n- Einführung in Design Patterns', 'Schriftliche Klausur;;', 'deutsch', 'C. S. Horstmann, G. Cornell: Core Java 2 Volume II – Advanced Features. Sun Microsystems Press 2008, 8. Auflage, ISBN 978-0-13235479-0\r\nC. Ullenboom: Java ist auch eine Insel - Programmieren mit der Java Standard Edition Version 6, 9. Auflage, Galileo Computing 2010, ISBN 978-3-83621506-0\r\nR. Schiedermeier: Programmieren mit Java. 2. Auflage, Pearson Studium 2010, ISBN 978-3-86894031-2\r\nG. Krüger, T. Stark: Handbuch der Java Programmierung Standard Edition Version 6, 6. Auflage, Addison-Wesley 2009, ISBN 978-3-82732874-8\r\nE. Gamma, R. Helm, R. Johnson, J. Vlissides (Gang of Four): Design Patterns - Elements of Reusa-ble Object-Oriented Software, Addison-Wesley, 1995. ISBN 978-0-20163-361-0\r\nE. Freeman, E. Freeman, K. Sierra: Head First Design Patterns. O''Reilly Media, November 2004, ISBN 978-0-59600712-6', 6, 3, NULL, NULL, NULL, NULL),
(4, '2014-12-11', 1, 'Freigegeben', 'PROG3', 'Programmieren 3', 'Programming 3', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 70, 'Kenntnis und Anwendung einer prozeduralen Programmiersprache. Fähigkeit zur modularen Pro-grammierung. Fähigkeit zur Abschätzung von Vor- und Nachteile von Zeigern versus Referenzen. Verständnis der Mechanismen bei Referenzen und On-Reference Aufrufen. Fähigkeit zur Verglei-chenden Wertung der Objekt-Orientierten und der Modularen Programmierung. Fähigkeit bei der Entwicklung eigener Programme Operatoren, dynamischen Speicher und multiple Vererbung zu nutzen.', '- Syntax der Programmiersprache C\r\n- Parameterübergabe in C\r\n- Zeiger\r\n- Zeiger und Arrays\r\n- Dynamische Datenstrukturen\r\n- C++ Klassen\r\n- Konstruktoren, Destruktoren, Speicher belegen und freigeben\r\n- Multiple Vererbung\r\n- Operatoren\r\n- Operator-Funktionen, Operator-Methoden\r\n- Friend Operatoren\r\n- Spezielle Operatoren wie Zuweisungs-, Ein- und Ausgabe- Operatoren\r\n- Templates\r\n- Exceptions', 'Schriftliche Klausur;;', 'deutsch', 'T. Rauber; G. Rünger: Parallel Programming for Multicore and Cluster Systems. Springer, ISBN 978-3-642-04817-3\r\nC. Breshears: The Art of Concurrency: A Thread Monkey''s Guide to Writing Parallel Applications. O''Reilly Media, ISBN 978-0596521530\r\nA. Tanenbaum, M. van Steen: Distributed Systems: Principles and Paradigms. Prentice Hall, ISBN 978-0-136-13553-1\r\nG. Bengel, C. Baun, M. Kunze, K.-U. Stucky: Masterkurs Parallele und Verteilte Systeme: Grundla-gen der Programmierung von Multicoreprozessoren, Multiprozessoren, Cluster und Grid. Vie-weg+Teubner, ISBN 978-3-834-80394-8\r\nR. Oechsle: Parallele und verteilte Anwendungen in Java. Hanser, 3. Auflage, ISBN 978-3-446-42459-3\r\nO. Haase: Kommunikation in verteilten Anwendungen. Oldenbourg Verlag, 2. Auflage, ISBN 978-3-48658481-3', 6, 6, NULL, NULL, NULL, NULL),
(5, '2014-12-11', 1, 'Freigegeben', 'WTEC', 'Web-Technologien', 'Web Technologies', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Studierende kennen\r\n• Architekturen web-basierter verteilter Anwendungssysteme\r\n• Aktuelle Paradigmen, Standards, Werkzeuge und Technologien\r\nzur Erstellung web-zentrierter Anwendungen\r\nSie sind in der Lage\r\n• Selbstständig unter Nutzung entsprechender Frameworks webbasierte\r\nverteilte Anwendungssysteme zu erstellen\r\n• Die Möglichkeiten, Grenzen und Entwicklungsperspektiven\r\naktueller Werkzeuge und Technologien einzuschätzen', '- Verteilte Systeme (Architektur moderner Web-Anwendungen, Client/Server Architektur, Middle-ware)\r\n- Konzepte der J2EE Plattformarchitektur und Technologiebestandteile\r\n- Enterprise Java Beans (EJB Architektur, Entity-, Session-,Message Driven Beans, EJB-Transaktionen, EJP-Entwurf, JDBC)\r\n- Java Server Pages und Servlets (Servlets, JSP, MVCParadigma, Jakarta Struts)\r\n- Corba, Java Naming and Directory Interface JNDI, Java Message Service JMS\r\n- Web Services (SOAP, UDDI, WSDL, Apache Axis, XML-RPC)\r\n- Java & XML (XML Schema, Java Architecture for XML Binding\r\nJAXB, Java API for XML Processing JAXP, DOM/SAX/XSLT)\r\n- JBoss, Apache, Tomcat, Axis\r\n- Transaktionskonzepte, Sicherheit', 'Schriftliche Klausur;;', 'deutsch', '- Ramin Assisi: J2EE mit Eclipse 3 und JBoss, Hanser\r\nFachbuchverlag, ISBN: 3-446-22739-3\r\n- Jim Farley, William Crawford, Prakash Malani: Java Enterprise\r\nin a Nutshell, O''Reilly, ISBN: 0-596-10142-2\r\n- Paul J. Perrone, Venkata S. R. K. R. Chaganti: Building Java\r\nEnterprise System with J2EE, Sams, ISBN: 0-672-31795-8\r\n- Rod Johnson: Expert One-to-One J2EE Design and\r\nDevelopment, Wrox Press, ISBN: 0-764-54385-7', 3, 7, NULL, NULL, NULL, NULL),
(6, '2014-12-11', 1, 'Freigegeben', 'ITSEC', 'IT-Sicherheit', 'IT Security', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 70, '- Die Studierenden haben fundierte Kenntnisse über Arten der Sicherheitsbedrohungen an IT-Systemen und Maßnahmen zur Abwehr.\r\n- Die Studierenden kennen die wesentlichen Begriffe, Konzepte und Technologien der IT-Sicherheit. Sie können diese exemplarisch anwenden.\r\n- Sie haben vertiefte Kenntnisse in der Anwendung der modernen Kryptographie.\r\n- Die Studierende besitzen Kenntnis der Prinzipien zum Entwurf, Umsetzung und Betrieb sicherer Informationssysteme.\r\n- Sie kennen die Bedeutung der IT-Sicherheit für die Gesellschaft und kritische Infrastrukturen. Die Studierenden verstehen das einer Public-Key-Infrastruktur zugrunde liegende Vertrauensmodell und können die Vertrauensstufe in eine PKI bewerten.\r\nDie Studierenden sind mit den rechtlichen Grundlagen für IT-Systeme (Bundesdatenschutzgesetz, Strafgesetzbuch, Bürgerliches Gesetzbuch) vertraut und können zwischen den Persönlichkeitsrech-ten von Mitarbeitern und dem Schutzbedürfnis des Arbeitgebers abwägen.', '- It Sicherheit: Zielsetzungen, Einsatzbereiche, Basisbegriffe, Sicherheitsdienste\r\n- Kryptologie: Synchrone und asynchrone Verfahren, Einsatzgebiete und Algorithmen, Public-Private-Key Verfahren und Infrastrukturen.\r\n- Sichere Informationssysteme: Plattformsicherheit, Applikationssicherheit, Sicherheit in Unterneh-mensarchitekturen, Mechanismen und Konstruktionsprinzipien, Technologien und deren Anwen-dung.\r\n- Rechtliche Aspekte: Gesetze, Durchsetzung, Datenschutzbeauftragte/Organisation.', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung,\r\nKriha, Walter; Schmitz, Roland. Sichere Systeme. Springer. Stuttgart. 2009.\r\nErtel, Wolfgang. Angewandte Kryptographie. Carl Hanser Verlag. München. 2007.\r\nBuchmann, Johannes. Einführung in die Kryptographie, 5. Auflage. Springer. 2010.\r\nSchmidt, Klaus. Der IT Security Manager. Carl Hanser Verlag. München. 2006.', 6, 4, NULL, NULL, NULL, NULL),
(7, '2014-12-11', 1, 'Freigegeben', 'TINF', 'Theoretische Informatik', 'Theoretical Computer Science', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Tiefere Kenntnis der Automatentheorie. Fähigkeit verschiedene Automaten zu analysieren und Probleme darin zu formulieren. Sie beherrschen reguläre Sprachen und sind mit der Theorie der Turing-Maschinen vertraut, inklusive deren Beweise und Charakteristika.\r\nDie Studierenden kennen die wichtigsten Komplexitätsklassen von\r\nAlgorithmen und können Lösungsalgorithmen für typische\r\nProblemstellungen der Informatik hinsichtlich ihrer Effizienz bewerten.\r\nSie kennen das Prinzip formaler Sprachen und können sie in typischen\r\nAnwendungsszenarien einsetzen.', '- Automatentheorie\r\nTuring-Maschinen (deterministische, indeterminierte, universelle), Entscheidbarkeit, aufzählbar vs abzählbar, Registermaschinen (LOOP, WHILE, GOTO), Mächtigkeit\r\n- Komplexitätstheorie\r\nKomplexitätsklassen, vollständige und harte Probleme, Satz von Cook, Nachweisbarkeit von NP-Vollständig\r\n- Berechenbarkeit\r\nBerechenbarkeitsmodelle, Semi-Entscheidbarkeit, Gödelisierung, my-rekursive Funktionen, , Lambda-Kalkül', 'Schriftliche Klausur;;', 'deutsch', 'Erk, Katrin; Priese, Lutz: Theoretische Informatik: Eine umfassende Einführung. 3.Auflage. Springer-Verlag. Berlin. 2009.\r\nSchöning, Uwe: Theoretische Informatik - kurz gefasst. Spektrum Akademischer Verlag. 2008.\r\nHoffmann, Dirk: Theoretische Informatik. Hanser Fachbuch. 2009.\r\nKreuzer, Martin; Kühling, Stefan. Logik für Informatiker. Person Studium. München. 2006.\r\nHopcroft, J.; Ullman, J. Introduction to Automata Theory, Languages, and Computation. Addison Wesely. Reading. 1976', 6, 4, NULL, NULL, NULL, NULL),
(8, '2014-12-11', 1, 'Freigegeben', 'MAT1', 'Mathematik 1', 'Mathematics 1', 'jedes Semester', 1, 'Vorlesung;;Übung;;', 120, 70, 'DieStudierenden kennen die grundlegenden Bausteine der Mathematik wie Mengen, Relationen und Funktionen, sowie elementare Beweisverfahren.\r\nDie Studierenden kennen die Eigenschaften insbesondere reeller und komplexer Zahlen, sowie Beispiele grundlegender algebraischer Strukturen (Gruppen, Ringe, Körper).\r\nSie können entscheiden, ob Folgen bzw. Reihen konvergent sind oder nicht und ggf. Grenzwerte berechnen.\r\nDie Studierenden sollen elementare Funktionen der Analysis und ggf. ihre Darstellung als Potenz-reihen kennen. Sie sollen die Begriffe ''Stetigkeit'', ''Differenzierbarkeit'' und ''Integrierbarkeit'' reeller Funktionen einer Variable kennen und beurteilen können, welche dieser Eigenschaften eine gege-bene Funktion hat.', '- Grundlagen (Mengen, Relationen, Funktionen, Beweisverfahren)\r\n- Zahlen (natürliche, ganze, rationale, reelle und komplexe)\r\n- Beispiele von Gruppen, Ringen und Körpern\r\n- elementare Funktionen der Algebra und Analysis\r\n- Folgen und Reihen (Konvergenz, Grenzwert), Potenzreihen\r\n- Stetigkeit und Differenzierbarkeit von Funktionen\r\n- Differential- und Integralrechnung in einer Veränderlichen, Taylorentwicklung', 'Schriftliche Klausur;;', 'deutsch', '- Stingl: Mathematik für Fachhochschulen, ISBN 3-446-18668-9\n- Brill: Mathematik für Informatiker, Hanser-Verlag, ISBN 3-446-22802-0\n- Papula: Mathematik für Ingenieure und Naturwissenschaftler Band 1 und 2, ISBN 3834805459 und ISBN 3834805645\n- Teschl: Mathematik für Informatiker, Band 1 und 2, ISBN 3540774319 und ISBN 3540280642', 6, 12, NULL, NULL, NULL, NULL),
(9, '2014-12-11', 1, 'Freigegeben', 'MAT2', 'Mathematik 2', 'Mathematics 2', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Die Studierenden kennen die Begriffe Vektorraum, Basis und Dimension und können diese auf kon-krete Vektorräume anwenden. Sie können lineare Gleichungssysteme und Grundaufgaben der ana-lytischen Geometrie lösen. Die Studierenden sollen fortgeschrittene Aufgaben zum Matrizenkalkül (Eigenvektoren und Eigenwerte, Basistransformationen) lösen können.\r\nDie Studierenden sollen partielle Ableitungen berechnen können und einige ihrer Anwendungen kennen. Sie sollen elementare Aufgaben der mehrdimensionalen Analysis und der Fourieranalysis lösen können.', '- Lineare Algebra (Vektorraum, Basis, Matrizen, Determinanten, Lineare Gleichungssysteme)\r\n- Analytische Geometrie im R^2 und R^3\r\n- Eigenwerte und Eigenvektoren, Basistransformationen, orthogonale Matrizen\r\n- Partielle Ableitungen, Richtungsableitung, Extremwertprobleme\r\n- Kurven-, Flächen und Volumenintegrale\r\n- Fourierreihen und Fouriertransformation', 'Schriftliche Klausur;;', 'deutsch', '- Stingl: Mathematik für Fachhochschulen, ISBN 3-446-18668-9\r\n- Brill: Mathematik für Informatiker, Hanser-Verlag, ISBN 3-446-22802-0\r\n- Papula: Mathematik für Ingenieure und Naturwissenschaftler Band 1 und 2, ISBN 3834805459 und ISBN 3834805645\r\n- Teschl: Mathematik für Informatiker, Band 1 und 2, ISBN 3540774319 und ISBN 3540280642', 6, 12, NULL, NULL, NULL, NULL),
(10, '2014-12-11', 1, 'Freigegeben', 'MAT3', 'Mathematik 3', 'Mathematics 3', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Die Studierenden sollen den Kontext der numerischen Analysis, ihre Grundbegriffe (wie Kondition eines Problems und Stabilität eines Algorithmus), sowie die Darstellung reeller Zahlen durch Ma-schinen-zahlen und die damit verbundenen Probleme kennen.\r\nDie Studierenden sollen gängige numerische Verfahren zur Lösung von Systemen linearer und nichtlinearer Gleichungen, zur Interpolation und Approximation, zur numerischen Berechnung von Ableitungen und Integralen und zur numerischen Lösung von Anfangswertprobleme gewöhnlicher Differentialgleichungen verstehen und anwenden können.\r\nDie Studierenden sollen Grundbegriffe der Wahrscheinlichkeitstheorie kennen und die Ereigniswahr-scheinlichkeit in elementaren Zufallsexperimenten berechnen können. Sie sollen beschreibende Statistiken verstehen und erstellen sowie elementare statistische Test- und Schätzverfahren anwen-den können.', '- Maschinenzahlen\r\n- Numerische Lösung linearer Gleichungssysteme\r\n- Nullstellenbestimmung nichtlinearer Gleichungssysteme\r\n- Interpolation und Approximation\r\n- Numerische Differentiation und Integration\r\n- Numerische Lösung von Anfangswertproblemen gewöhnlicher Differentialgleichungen\r\n- Beschreibende Statistik, Verteilungsparameter, Korrelation und Regression\r\n- Wahrscheinlichkeitsrechnung: Ereignisalgebra, Unabhängigkeit, bedingte Wahrscheinlichkeit, Zufallsvariablen, wichtige diskrete und kontinuierliche Verteilungen\r\n- Schließende Statistik: Punkt- und Intervallschätzungen, Hypothesentests', 'Schriftliche Klausur;;', 'deutsch', '- Knorrenschild: Numerische Mathematik, ISBN 3446422285\r\n- Schwarz, Köckler: Numerische Mathematik, ISBN 3834806838\r\n- Burden, Faires: Numerical Analysis, ISBN 0-534-40499-5\r\n- Sachs: Wahrscheinlichkeitsrechnung und Statistik, ISBN 978-3-446-42045-8\r\n- Stingl: Mathematik für Fachhochschulen, ISBN 3-446-18668-9\r\n- Teschl: Mathematik für Informatiker, Band 1 und 2, ISBN 3540774319 und ISBN 3540280642', 6, 11, NULL, NULL, NULL, NULL),
(11, '2014-12-11', 1, 'Freigegeben', 'REAR', 'Rechnerarchitektur und Technische Grundlagen der Informatik', 'Computer Architecture and technical foundations of Computer ', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 70, 'Strukturierung eines Rechnersystems von Hardware bis Betriebssystem kennen und verstehen.\r\nStruktur und Funktion des Von-Neumann-Rechners verstehen und mit realen Systemen vergleichen können.\r\nArchitektur, beispielhafter Aufbau und Funktionsweise moderner Prozessoren, Speicher und Kom-munikationsstrukturen verstehen und analysieren.', 'Von Neumann-Rechner, Abwicklermodell\r\nProzessoren: Steuerkreismodell, CISC- und RISC-Architekturen\r\nPipelining, Superskalar- und Multicore-Architekturen\r\nKommunikationssysteme im Rechner\r\nSpeicherarchitektur, Caches\r\nEin-/Ausgabe', 'Schriftliche Klausur;;', 'deutsch', 'Folienunterlagen zur Vorlesung,\r\nTanenbaum: Computerarchitektur\r\nPatterson, Hennessy: Rechnerorganisation und Entwurf', 3, 2, NULL, NULL, NULL, NULL),
(12, '2014-12-11', 1, 'Freigegeben', 'IGRU1', 'Grundlagen der Informatik 1', 'Introduction to Computer Science 1', 'jedes Semester', 1, 'Vorlesung;;Übung;;', 105, 70, '- Kenntnis von Grundzügen der Geschichte der Informatik.\r\n- Kenntnis von Gebieten und Methoden der Logik.\r\n- Fähigkeit logische Methoden anzuwenden.\r\n- Kenntnis von Zahlensystemen und -darstellungen.\r\n- Verständnis von Rundungs- und Rechenfehlern.\r\n- Fähigkeit zum Um-/Rechnen in verschiedene/n Zahlensysteme/n\r\n- Verständnis des Aufbaus und der Funktion eines Von Neumann Rechners\r\n- Fähigkeit einfache maschinennahe Programme zu erstellen.', '- Geschichte der Informatik\r\n- Logik: Boolesche-, Prädikaten-, Schaltalgebra\r\n- Zahlensysteme und -darstellungen\r\n- von Neumann-Architektur\r\n- Spezifikation\r\n- Assembler', 'Schriftliche Klausur;;', 'deutsch', 'Gumm, H.P.; Sommer, M. Einführung in die Informatik. Oldenbourg Verlag 2010.\r\nRausch, P. Informatik für Ingenieure, Vieweg.\r\nBöttcher, A. Kneißl, F. Informatik für Ingenieure, Oldenbourg. 2001.\r\nSchneider, U. Werner, D. Taschenbuch der Informatik. Fachbuchverlag Leipzig. 2007.\r\nKreuzer, Martin. Kühling, Stefan. Logik für Informatiker. Pearson. 2006.\r\nBalzert, Helmut. Lehrbuch Grundlagen der Informatik. Spektrum Verlag. 1999', 6, 6, NULL, NULL, NULL, NULL),
(16, '2014-12-11', 1, 'Freigegeben', 'BESY', 'Betriebssysteme', 'Operation Systems', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Die Studierenden verstehen und kennen die Grundkonzepte und Aufgaben (Prozesse, Dateien, Speicherverwaltung) von Betriebssystemen in verschiedenen Betriebssystemen identifizieren und können diese handhaben.\r\nDen grundlegenden Aufbau von Betriebssystemen kennen. Verschiedene Arten von Betriebssyste-men kennen sowie verschiedene Betriebssystemarchitekturen unterscheiden können. Wichtige Sys-temschnittstellen und deren Verwendung an einfachen Beispielen in Programmen kennent', 'Betriebssysteme:\r\n-Architektur, Aufgaben, Konzepte und Grundlagen von Betriebssystemen\r\n- Systemschnittstelle\r\n- Die Unix Shell\r\n- Betriebssystemarten\r\n- Prozess- und Betriebsmittelsteuerung\r\n- Synchronisationskonzepte\r\n- Interprozesskommunikation\r\n- Speicherverwaltung\r\n- Dateisysteme und Ein-/Ausgabe.', 'Schriftliche Klausur;;', 'deutsch', '- Skript zur Vorlesung,\r\n- Peter Mandl, Grundkurs Betriebssysteme, Vieweg 2013, ISBN 978-3-8348-1897-3\r\n-Eduard Glatz, Betriebssysteme: Grundlagen, Konzepte, Systemprogrammierung, dpunkt verlag 2010, ISBN 978-3898646789\r\n- Andrew S. Tanenbaum: Modern Operating Systems, Prentice Hall International 2013, ISBN 978-12920257734', 6, 8, NULL, NULL, NULL, NULL),
(17, '2014-12-11', 1, 'Freigegeben', 'ALDA', 'Algorithmen und Datenstrukturen', 'Algorithm and Data Structures', 'jedes Semester', 1, 'Vorlesung;;Übung;;', 120, 50, 'Die Studierenden verstehen das Konzept abstrakter Datentypen. Sie kennen elementare Daten-strukturen sowie darauf arbeitende Algorithmen und verstehen deren Vor- und Nachteile.\r\nDie Studierenden kennen allgemeine Konzepte zum Entwurf von Algorithmen (z.B. Greedy-Verfahren, Divide-and-Conquer-Verfahren) und erkennen Gemeinsamkeiten innerhalb von Algorith-menfamilien.\r\nSie sind in der Lage, adäquate Algorithmen und Datenstrukturen für gegebene Probleme auszuwäh-len, anzupassen und anzuwenden, sowie sich selbstständig neue Algorithmen und Datenstrukturen anzueignen. Sie können für gegebene Probleme zielgerichtet und methodisch sinnvolle algorithmi-sche Lösungen entwerfen.\r\nAufbauend auf ihren Kenntnissen können die Studierenden Angaben zu Zeit- und Speicheraufwand von Algorithmen interpretieren und für grundlegende Problemstellungen selbst analysieren.', '- Algorithmus, Datenstruktur, abstrakter Datentyp\r\n- Listen, Stacks, Queues\r\n- Suchen, Sortieren\r\n- Komplexität\r\n- Bäume, Graphen, Speichern & Traversierung von Bäumen und Graphen, Balancierte Bäume, dy-namisches Balancieren\r\n- Rekursive Algorithmen / Iterative Algorithmen\r\n- Elementare Algorithmen für Graphen, Fluß- und Wegeprobleme\r\n- Problemlösungsstrategien (Greedy, Backtracking, ...)\r\n- Ausgewählte Probleme (Traveling Salesman, Knapsack-Problem, ...)\r\n- Hashing\r\n- Hierarchisierung und Strukturierung komplexer Problemstellungen.', 'Schriftliche Klausur;;', 'deutsch', '- Ottmann/Widmayer: Algorithmen und Datenstrukturen; Spektrum Akademischer Verlag, 4. Auflage\r\n- R. H. Güting, S. Dieker: Datenstrukturen und Algorithmen, Teubner Verlag, 2. Auflage\r\n- G. Saake, K.-U. Sattler: Algorithmen und Datenstrukturen – Eine Einführung mit Java, dpunkt Ver-lag, 2. Auflage', 6, 4, NULL, NULL, NULL, NULL),
(18, '2014-12-11', 1, 'Freigegeben', 'KONE', 'Kommunikation und Netze', 'Communication and Computer Networks', 'Sommersemester', 1, 'Vorlesung;;Labor;;', 105, 70, '- Grundstrukturen und -funktionen von Kommunikationssystemen kennen und auf bestehende Sys-teme anwenden.\r\n- Schichtenmodelle auf reale Systeme anwenden und erarbeiten.\r\n- Ethernet, Funknetzwerke und TCP/IP-Architektur verstehen.\r\n- Einfache Lokale Netzwerke planen, aufbauen und in Betrieb nehmen können.\r\n- IP-Konfiguration analysieren, in einfachen Umgebungen planen, konfigurieren und in Betrieb neh-men können.\r\n- Grundstruktur verteilter Anwendungen, Client-/Server-Prinzip verstehen und auf vorhandene An-wendungen übertragen können.\r\n- Grundkonzepte von Vermittlungssystemen verstehen.\r\n- Datenvekehrsprotokolle in lokalen Netzen aufzeichnen, analysieren und bewerten können. Neue Kommunikationstechniken in bekannte Konzepte einordnen können und sich in Funktionsweise und Konfigurationen einarbeiten können.', '- Grundstrukturen von Kommunikationssystemen\r\n- Grundfunktionen und -begriffe\r\n- Schichtenmodelle\r\n- Ethernet-Netzwerke, WLAN\r\n- TCP-/IP-Architektur\r\n- IP-Adressierung, Routing\r\n- TCP-/UDP-Funktionen\r\n- Client-/Server-Architektur\r\n- Vermittlungsmodelle und Beispiele\r\n- Protokollanalyse im lokalen Netzwerk, Konfiguration und Verhalten von Rechnern im lokalen Netz', 'Schriftliche Klausur;;', 'deutsch', '- Foliendateien zur Vorlesung, Übungsblätter, Laboraufgabenblätter\r\n- Peterson, Davie: Computernetze\r\n- Tanenbaum: Computer-Netzwerke. Prentice-Hall\r\n- RFCs', 6, 2, NULL, NULL, NULL, NULL),
(19, '2014-12-11', 1, 'Freigegeben', 'DABA', 'Datenbanken', 'Database Systems', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 70, 'Die Studierenden kennen Abstraktions-, Analyse- und Modellierungstechniken zur Erstellung eines Datenbank-Entwurfs für eine konkrete Anwendung. Die Studierenden beherrschen die wichtigsten Grundlagen der Datenmodellierung und der der Normalisierung.\r\nSie kennen das Transaktionskonzept, wesentliche Aufgaben von Datenbankmanagementsytemen sowie grundlegende Aufgaben der Administration von Datenbank-Servern.\r\nSie beherrschen die wichtigsten Grundelemente der Datenbank-Sprache SQL und kennen die Rela-tionenalgebra als deren Grundlage.', 'Entwurf von Datenbanken:\r\n- ER-Modell, Relationales Modell, Entwurf von relationalen Datenbanken\r\n- Datenbankprogrammierung:\r\n- SQL, Stored Procedures und Trigger\r\n- DB Interfaces zu Programmiersprachen z.B. JDBC\r\nDatenbanken:\r\n- Grundlagen der physischen\r\n- Überblick Transaktionskonzept und seiner Implikationen: ACID\r\n- Mehrbenutzersynchronisation\r\n- Autorisierung, Sicherheitsaspekte', 'Schriftliche Klausur;;', 'deutsch', '- Skript zur Vorlesung,\r\n- Kemper, A.: „Datenbanksysteme“, 8. Auflage, 2011, Oldenbourg\r\n- Elmasri, R.: „Grundlagen von Datenbanksystemen“, Bachelorausgabe, 2009, Pearson\r\n- Heuer, A.: „Datenbanken - Konzepte und Sprachen“, 3. Auflage, 2007, Mitp-Verlag', 6, 8, NULL, NULL, NULL, NULL),
(20, '2014-12-11', 1, 'Freigegeben', 'SENG', 'Software Engineering', 'Software Engineering', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, NULL, 'Die Studierenden entwickeln Verständnis für die Softwareentwicklung als Prozess.\r\nDie Studierenden kennen wichtige Vorgehensmodelle und Beschreibungsformen für Artefakte. Sie entwickeln die Fähigkeit, Softwaresysteme auf verschiedenen Abstraktionsebenen zu beschreiben.\r\nDie Studierenden besitzen die Fähigkeit zum systematischen Entwurf einfacher Softwaresysteme - von der Anforderung zur Implementation. Sie haben Kenntnisse der Grundkonzepte der objektorien-tiertem Softwarenentwicklung.\r\nDie Studierenden beherrschen den Umgang mit UML und CASE Werkzeugen. Sie erwerben die Befähigung zur Teamarbeit, Präsentation von Artefakten, Einhaltung von Standards und Terminen.', '- Überblick über wichtige Gebiete des Software Engineerings\r\n- Softwareentwicklung: Phasen und Vorgehensmodelle\r\n- Systemanalyse und Anforderungsfestlegung\r\n- Software-Entwurf und Software-Architekturen\r\n- Implementierung\r\n- Testen und Integration\r\n- Installation, Abnahme und Wartung\r\n- Softwareergonomie\r\n- Aufwandsschätzung von IT-Projekten.', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung,\r\nBücher mit Titel:\r\n- Ludewig J., Lichter H.: Software Engineering, dpunkt.verlag, ISBN 3-89864-268-2\r\n- Grechenig T. u.a.: Softwaretechnik, Pearson Studium, ISBN 978-3-86894-007-7\r\n- Bell D.: Software Engineering for Students, Addsion-Wesley, ISBN 0-321-26127-5\r\n- Maciaszek, L.. A. Liong, B. L.: Practical Software Engineering,\r\nAddison Wesley, ISBN 0-321-20465-4, 2004\r\n- Sommerville I.: Software Engineering, Person Studium, ISBN 3-\r\n8273-7001-9, 2001\r\n- Dumke, R.: Software Engineering - Eine Einführung für Informatiker\r\nund Ingenieure, Vieweg Publ., ISBN 3-528-35355-4, 2003\r\n- UML 2.0 Das umfassende Handbuch, Galileo Computing, ISBN\r\n3-89842-573-8, 2005\r\n- Born M., Holz E., Kath O.:Softwareentwicklung mit UML 2, Addison\r\nWesley, ISBN 3-8273-2086-0, 2004.', 6, 11, NULL, NULL, NULL, NULL),
(21, '2014-12-11', 1, 'Freigegeben', 'PARA', 'Parallele Datenverarbeitung', 'Parallel Data Processing', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Die Studierenden kennen grundlegende Konzepte und Paradigmen von parallelen und verteilten Systemen (insbesondere Kommunikation, Synchronisation, Konsistenz, Fehlertoleranz, verteilte Namensräume, verteilte Dateisysteme, Distributed Shared Memory) sowie systematische Methoden zum Entwurf paralleler und verteilter Programme. Sie können verteilte Anwendungen in Java oder C/C++ im Client-Server-Modell unter Verwendung des Nachrichten-Paradigmas oder mit Hilfe von RPC / RMI entwickeln. Die Studierenden erhalten ferner einen Einblick in das Cluster und Grid Computing.', 'Begriffe der Parallelverarbeitung\r\nArchitektur paralleler Plattformen\r\nParallele Programmiermodelle\r\nLaufzeitanalyse\r\nMessage Passing\r\nThreads\r\nCluster Computing\r\nGrid Computing', 'Schriftliche Klausur;;', 'deutsch', 'T. Rauber; G. Rünger: Parallel Programming for Multicore and Cluster Systems. Springer, ISBN 978-3-642-04817-3\r\nC. Breshears: The Art of Concurrency: A Thread Monkey''s Guide to Writing Parallel Applications. O''Reilly Media, ISBN 978-0596521530\r\nA. Tanenbaum, M. van Steen: Distributed Systems: Principles and Paradigms. Prentice Hall, ISBN 978-0-136-13553-1\r\nG. Bengel, C. Baun, M. Kunze, K.-U. Stucky: Masterkurs Parallele und Verteilte Systeme: Grundla-gen der Programmierung von Multicoreprozessoren, Multiprozessoren, Cluster und Grid. Vie-weg+Teubner, ISBN 978-3-834-80394-8\r\nR. Oechsle: Parallele und verteilte Anwendungen in Java. Hanser, 3. Auflage, ISBN 978-3-446-42459-3\r\nO. Haase: Kommunikation in verteilten Anwendungen. Oldenbourg Verlag, 2. Auflage, ISBN 978-3-48658481-3', 6, 3, NULL, NULL, NULL, NULL),
(22, '2014-12-11', 1, 'Freigegeben', 'KOKO', 'Kommunikative Kompetenz', 'Communication Competence', 'Sommersemester', 1, 'Vorlesung;;Übung;;Seminar;;', 105, 30, 'Fertigkeiten zur Präsentation:\r\n- über verbale, paraverbale und nonverbale Fertigkeiten für eine wirkungsvolle Selbstdarstellung, Rede und Präsentation verfügen\r\n- verschiedene Redeformen ausarbeiten können\r\n- Informationen optisch aufbereiten und verschiedene Medien einsetzen können\r\n- mit Angst und Lampenfieber umgehen können\r\n- Störungen und Einwände bewältigen können\r\n- Präsentationen souverän durchführen können\r\n\r\nFertigkeiten zur beruflichen Kommunikation:\r\n- Ablauf des zwischenmenschlichen Kommunikationsprozesses, Einflussgrößen, Missverständnisse und Störungen im Kommunikationsprozess verstehen\r\n- über Fähigkeiten zur Bewältigung komplexer Anforderungssituationen der zwischenmenschlichen Kommunikation im beruflichen Alltag verfügen:\r\n- eigenes Gesprächsverhalten reflektieren und bewusst gestalten\r\n- partnerzentriert auf den Gesprächspartner eingehen\r\n- mit anderen im Team konstruktiv zusammenarbeiten\r\n- Methoden zur beruflichen Konfliktbewältigung kennen und einsetzen\r\nSeminar:\r\n- aktuelle Fachkenntnisse selbstständig erwerben\r\n- komplexe fachlich Zusammenhänge auf Wesentliches reduzieren und darstellen können\r\n- Fachdiskussionen führen können\r\n- schriftliche Zusammenfassungen erstellen können', '- Verbale, paraverbale und nonverbale Mitteilungsformen und deren gezielter Einsatz bei Selbstdar-stellung, Reden, Präsentationen\r\n- Inhaltliche Ausarbeitung verschiedener Redeformen\r\n- Visualisierungsmöglichkeiten und Einsatz verschiedener Medien\r\n- Umgang mit Angst und Lampenfieber\r\n- Bewältigung von Störungen und Einwänden\r\nKommunikation:\r\n- Psychologische Kommunikationsmodelle\r\n- Störungen und Konflikte in der zwischenmenschlichen Kommunikation\r\n- Kommunikative Fertigkeiten im beruflichen Dialog:\r\n\r\n- Partnerzentrierte Gesprächsführung\r\n- Aktives Zuhören\r\n- Argumentationsstrategien und Einwandtechniken\r\n- Feedback geben und effektiv verwerten\r\n- Konstruktive Kritik- und Ärgeräußerung\r\n- Konflikte im beruflichen Alltag und ihre Bewältigung\r\nSeminar:\r\n- Inhalte werden ausgewählt aus aktuellen Trends in Wissenschaft und Industrie der Informations-technologie', 'Schriftliche Klausur;;Vortrag;;', 'deutsch', 'Albert Thiele: Präsentieren Sie einfach, Frankfurter Allgemeine Buch. Wolfgang Mentzel: Rhetorik: Sicher und erfolgreich sprechen, dtv. Josef W. Seifert: Visualisieren, Präsentieren, Moderieren, Gabal.\r\nUwe Vigenschow u.a.: Softskills für Softwareentwickler, dpunkt. Friedemann Schulz von Thun: Miteinander reden, 1-3, Rowohlt. Friedemann Schulz von Thun, Johannes Rupel, Roswitha Stratmann: Miteinander reden: Kommuni-kationspsychologie für Führungskräfte, Rowohlt.\r\nAlbert Thiele: Die Kunst zu überzeugen: Faire und unfaire Dialektik, Springer. Elisabeth Bonneau: Stilvoll zum Erfolg: Der moderne Business-Knigge, Hoffmann und Campe. Vera Birkenbihl: Signale des Körpers: Körpersprache verstehen, mvg-Verlag.\r\nLiteratur zum Seminar:\r\nEntsprechend der jeweils aktuellen Aufgabenstellung aus dem Gebiet der Informatik.', 6, 14, NULL, NULL, NULL, NULL),
(23, '2014-12-11', 1, 'Freigegeben', 'JURA', 'Juristische Aspekte', 'Legal Aspects', 'jedes Semester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Die Studierenden haben ein Bewusstsein für Rechtsfragen und kennen\r\nmögliche rechtliche Implikationen ihres späteren Arbeitsumfeldes. Dazu\r\ngehört insbesondere die Kenntnisse über Grundlagen des bürgerlichen\r\nGesetzbuchs BGB sowie rechtliche Aspekte der Informatik.', '- Einteilung der Rechtsgebiete\r\n- Aus dem Zivilrecht: Grundlagen des Allgemeinen Teils des Schuldrechtes und des Sachenrechtes des BGB, Vertragsrecht\r\n- Aufbau der Gerichtsbarkeit in Deutschland einschließlich Grundlagen Prozessrecht\r\n- Internetrecht (Domainrecht, Vertragsrecht im Internet, Urheberrecht,\r\nHaftung nach dem Teledienstegesetz, Grundlagen Datenschutz).', 'Schriftliche Klausur;;', 'deutsch', '• Führich, Ernst: Wirtschaftsprivatrecht\r\n• Enders, Matthias / Hetger, Winfried: Grundzüge der betrieblichen\r\nRechtsfragen\r\n• Ullrich, Norbert: Wirtschaftsrecht für Betriebswirte\r\n• Wörlen, Rainer: Handelsrecht mit Gesellschaftsrecht\r\n• Führich, Ernst; Werdahn, Ingrid: Wirtschaftsprivatrecht in Fällen\r\nund Fragen.', 6, 16, NULL, NULL, NULL, NULL),
(24, '2014-12-11', 1, 'Freigegeben', 'BWL1', 'Betriebswirtschaftslehre 1', 'Business Administration', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Allgemeiner Überblick über die Teilgebiete der Betriebswirtschaftslehre und betrieblicher Funktionen\r\nVerständnis wesentlicher Verknüpfungspunkte der kaufmännischen Aspekte zu den technischen Bereichen des Unternehmens\r\nKenntnisse grundlegender Methoden der Betriebswirtschaftslehre in unterschiedlichen Bereichen des Unternehmens\r\nFähigkeiten, grundlegende Problemstellungen von Unternehmen mit betriebswirtschaftlichen Ent-scheidungskriterien zu lösen.', '- Gegenstand der Betriebswirtschaftslehre\r\n- Aufbau des Betriebes inkl. betrieblicher Produktionsfaktoren, Wahl der Rechtsform\r\n- Einblick externes und internes Rechnungswesen\r\n- Grundlagen der Produktion und Produktionsplanung\r\n- Grundzüge von Vertrieb und Marketing mit typischen absatzpolitischen Instrumenten\r\n- Statische und dynamische Verfahren der Investitionsrechnung, Quellen der Finanzierung.', 'Schriftliche Klausur;;', 'deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nG. Wöhe, Einführung in die Allgemeine Betriebswirtschaftslehre, Verlag Vahlen, München\r\nJ.-P. Thommen und A.-K. Achleitner: Allgemeine Betriebswirtschaftslehre: Umfassende Einführung aus managementorientierter Sicht, Gabler-Verlag, Wiesbaden.', 6, 5, NULL, NULL, NULL, NULL),
(25, '2014-12-11', 1, 'Freigegeben', 'BWL2', 'Betriebswirtschaftslehre 2', 'Business Administration 2', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 70, 'Die Studierenden vertiefen die BWL Grundkenntnisse aus dem Pflichtmodul Betriebswirtschaft ins-besondere im Bereich der Unternehmensgründung und Kostenrechnung.\r\nZiel ist, für Informatiker praxisrelevante betriebswirtschaftliche Inhalte zu vermitteln und diese Me-thoden bzw. zugehörigen Werkzeuge (z.B. betriebswirtschaftliche Standardsoftware) im Unterneh-men anwenden zu können.\r\nZur Abdeckung des Moduls "Betriebswirtschaftslehre 2" wird ein speziell für Informatiker geplantes Modul angeboten..', 'Grundlagen der Unternehmensgründung\r\nInternes Rechnungswesen\r\n- Überblick über das interne Rechnungswesen\r\n- Planung und Kontrolle von Einzelkosten und Gemeinkosten\r\n- Plankalkulation und Kostenmanagement\r\nDurchführung betriebliche Geschäftsprozesse mit ERP-Systemen\r\n- Grundbegriffe, Ziele, Architektur/Aufbau von ERP-Systemen\r\n- Durchführung von Fallstudien in ERP-Systemen mit Bezug zu Einkauf, Produktion, Vertrieb und Logistik\r\nAktuelle wirtschaftsinformatische Themen, wie bspw. Online Marketing, Bedeutung von Social Media für die Unternehmenswelt etc.', 'Schriftliche Klausur;;schriftliche Ausarbeitung;;', 'deutsch', 'Haberstock, Lothar, Kostenrechnung I, S + W Steuer- und Wirtschaftsverlage Hamburg\r\nCoenenberg, A. G., „Kostenrechnung und Kostenanalyse“, Stuttgart\r\nOlfert, Klaus: Kostenrechnung, Verlag Friedrich Kiehl GmbH, Ludwigshafen\r\nOlaf Jacob (Hrsg.): ERP Value. Signifikante Vorteile mit ERP-Systemen. Springer Verlag\r\nMarcel Siegenthaler und Cyrill Schmid: ERP für KMU. Business Software für Produktion, Handel und Service. BPX-Edition\r\nWeitere Literaturhinweise gemäß der Unterlagen zur Veranstaltung)', 6, 5, NULL, NULL, NULL, NULL),
(26, '2014-12-11', 1, 'Freigegeben', 'REIN', 'Rechnersystem-Infrastrukturen', 'Computer Systems Infrastructures', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, '-Konzeptionen von Speichern, Speichersystemen und Speicherhierarchien verstehen, anwenden und bewerten.\r\n- Konzeption von Speichernetzwerken verstehen\r\n- Konzepte und Technologien von SAN und NAS-Speichern verstehen, anwenden und bewerten\r\n- Servicekonzepte wie ILM und Business Continuity kennen', '- Speichermedien, RAID, Speichersysteme\r\n- Speichernetze\r\n- NAS und weitere Arten von Datenspeichern\r\n- Backup, Replikationen, Snapshots\r\n- Sicherheit und Management von Speichersystemen', 'Schriftliche Klausur;;', 'deutsch', 'EMC Education Service: Information Storage and Management\r\nTroppens, Erkens, Müller: Speichernetze', 6, 2, NULL, NULL, NULL, NULL),
(28, '2014-12-11', 1, 'Freigegeben', 'ADMIN', 'Administration', 'Administration', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Konzeption und Adminstrativen Umgang mit Netzwerk- und Rechnerdiensten verstehen, anwenden und auf neue Aufgabenstellungen übertragen können.\r\nWichtige Aufgaben bei der Administration von vernetzten Arbeitsumgebungen verstehen und durchführen\r\nTypische netzwerkweite Dienste kennen und konfigurieren\r\nDiensteverwaltung in vernetzten Umgebungen verstehen und einsetzen', '- Exemplarisches Kennenlernen wichtiger Dienste im Netz\r\n- DNS\r\n- Verzeichnisdienste\r\n- Mailarchitektur\r\n- Netzwerksicherheit\r\n- Netzwerkmanagement', 'Schriftliche Klausur;;', 'deutsch', 'Folienunterlagen\r\nLiteratur abhängig von Projektthemen', 6, 2, NULL, NULL, NULL, NULL),
(29, '2014-12-11', 1, 'Freigegeben', 'MUME', 'Multimedia', 'Multimedia', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 35, 'Kenntnis und Verständnis gängiger Multimedia Formate und Systeme. Fähigkeit zur Anwendung verschiedener Kompressions- und Fehlerkorrekturalgorithmen. Fähigkeit zur Analyse von Anwen-dungsfällen und Auswahl adäquater Formate, Systeme und Techniken. Fähigkeit zur Entwicklung eines Multimedialen Systems unter Berücksichtigung gegebener Randbedingungen. Fähigkeit zur Einschätzung der Aufwände bei der Erstellung eines Multimedialen Systems.', 'Lehrinhalte im theoretischen Teil sind:\r\n- Diskrete und kontinuierliche Medien, Multimedia Datenformate:\r\n- Kompression & Fehlerkorrektur\r\n- Bilder\r\n- Audio\r\n- Video\r\n- Multimedia Systeme: Anforderungen und Konzepte\r\n- Datenmengen, Synchronität\r\n- Aufbau von MM-Systemen\r\n- Speichermedien (CD, DVD, Blue-Ray u. ä.)\r\n- Erstellung von Multimedia Präsentationen\r\n- Programmierumgebungen\r\n- Autorensysteme\r\n- Skriptsprachen\r\n- 3D-Welten (z.B. VRML, X3D)\r\nIm praktischen Teil wird das theoretische Wissen in Form eines Multimedia Projektes umgesetzt. Hierbei sind folgende Arbeiten durchzuführen:\r\n- Planungs – und Managementarbeiten\r\n- Projektplan\r\n- Pflichtenheft\r\n- Storyboard\r\n- Umsetzungsarbeiten für mehrere Versionen eines Multimedia-Informationssystem ( z.B. Stand-Alone-Version, Web-Version und Interaktive Demo).', 'Projektarbeit;;', 'deutsch', 'R. Steinmetz: Multimedia Technologie: Grundlagen, Komponenten und Systeme. ISBN 3-540-62060-5, Springer Verlag.\r\nP. A. Henning: Taschenbuch Multimedia.ISBN 3-446-21274-4, Fachbuchverlag Leipzig.\r\nR. S. Schifman, G. Heinrich: Multimedia-Projektmanagement. ISBN 3-540-67120-X, Springer Ver-lag.', 6, 6, NULL, NULL, NULL, NULL),
(30, '2014-12-11', 1, 'Freigegeben', 'MOBI', 'Mobile Computing', 'Mobile Computing', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden erwerben Grundkenntnisse über die mobile Kommunikation mit dem Schwerpunkt auf digitaler Datenübertragung. Sie können Anwendungen unter der Nutzung aktueller mobiler Techniken und Protokolle entwickeln. Die Studenten können selbständig die Anforderungen erfas-sen, die Software planen, implementieren, testen und in vorhandene Systeme integrieren. Sie sind in der Lage die notwendigen Werkzeuge und Techniken auszuwählen und einzusetzen.', '- Grundlagen, Techniken und Protokolle für mobile Vernetzungen\r\n- Konzepte und technische Grundlagen der Programmierung mobiler Endgeräte\r\n- Entwicklungsschritte mobiler Applikationen\r\n- Mobile Anwendungen als Verteilte Systeme (Client- Server Sicht)\r\n- Verfahren zur Positionsbestimmung (GPS)\r\n- Entwicklung von Anwendungen mit Ortsbezogenheit\r\n- Mobiles Internet und seine Anwendungen\r\n- Ad-hoc-Vernetzung\r\n- Sicherheit mobiler Anwendungen.', 'Projektarbeit;;', 'deutsch', 'Skript zur Vorlesung,\r\nBücher mit Titel:\r\n- Fuchß T.: Mobile Computing - Grundlagen und Konzepte für mobile Anwendungen, Hanser, ISBN 978-3-446-22976-1, 2009\r\n- Mosemann H.; Kose M.: Android, ISBN 978-3-446-41728-1, 2009\r\n- Schiller J.: Mobilkommunikation, Pearson, ISBN 3-8273-7060-4, 2003\r\n- Roth J.: Mobile Computing Grundlagen, Technik, Konzepte, dpunkt.verlag, ISBN 3-89864-366-2, 2005\r\n- Mahgoub I.; Ilyas M.: Mobile Computing Handbook, CRC Press Inc, ISBN 0-84931-971-4, 2004\r\n- Meier R.: Professional Android 2 Application Development, John Wiley & Sons, ISBN 978-0470565520, 2010\r\n- Stäuble M.: Programmieren für iPhone und iPad, Dpunkt Verlag, ISBN 978-3898646895, 2011\r\n- Lehner F.: Mobile und drahtlose Informationssysteme, Springer, ISBN 3-540-43981-1, 2002.', 3, 11, NULL, NULL, NULL, NULL),
(32, '2014-12-11', 1, 'Freigegeben', 'GPU', 'GPU Programmierung', 'GPU Programming', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden verstehen den grundsätzlichen Ansatz und die Vorgehensweise zur Programmie-rung einer Graphics Processing Unit (GPU) unter Verwendung der Open Computing Language (O-penCL). Sie kennen den Aufbau und die Funktionsweise einer GPU und beherrschen die erforderli-chen Programmiertechniken. Die Studierenden können einfache Probleme hinsichtlich Ihrer Eignung für das GPU Computing analysieren, mögliche Lösungen in OpenCL implementieren und auf korrek-te Funktionalität überprüfen.', 'Historie des GPU Computing\r\nEinführung in OpenCL\r\nGPU Architekturen\r\nOpenCL Puffer\r\nGPU Speichermodell\r\nGPU Threads und Management\r\nPerformanz Optimierung\r\nAnwendungsbeispiel: Partikelsystem\r\nOpenCL Erweiterungen\r\nOpenCL Events, Synchronisation und Profiling\r\nFehlersuche / Debugging\r\nOpenCL im GPU Verbund', 'Schriftliche Klausur;;', 'deutsch', 'A. Munshi, B. Gaster, T. G. Mattson: OpenCL Programming Guide. Addison-Wesley, ISBN 978-0-321-74964-2\r\nD. Kirk, W.-M. W. Hwu: Programming Massively Parallel Processors: A Hands-On Approach (Appli-cations of GPU Computing Series). Morgan Kaufman, ISBN 978-0-123-81472-2\r\nJ. Sanders, E. Kandrot: CUDA by Example: An Introduction to General-Purpose GPU Programming. Addison-Wesley Longman, ISBN 978-0-131-38768-3\r\nW.-M. W. Hwu: GPU Computing Gems (Applications of Gpu Computing). Academic Press, ISBN 978-0-123-84988-5', 3, 3, NULL, NULL, NULL, NULL),
(33, '2014-12-11', 1, 'Freigegeben', 'BPM', 'Geschäftsprozess-Modellierung', 'Business Process Modelling', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 20, '- Kenntnis der geschäftlichen und organisatorischen Motivation und Ziele des Geschäftsprozessma-nagements.\r\n- Kenntnis der Bedeutung, Abgrenzung und Potentiale des BPM\r\n- Kenntnis der Aufgaben, Rollen, Verantwortlichkeiten und Abläufe des Geschäftsprozessmanage-ment und unterstützenden Methoden.\r\n- Kenntnis, Beherrschung und praktischen Erfahrung ausgewählter Notation zum BPM.\r\n- Fähigkeit der eigenständigen Durchführung von BPM.', '- Historie, Entwicklung und Abgrenzung des BPM.\r\n- Arten und Zusammenwirken von Geschäftsprozessen\r\n- Identifikation, Standardisierung, Modellierung, Optimierung und Implementierung von Geschäfts-prozessen.\r\n- Notation für BPM, insbesondere BPMN und BPEL\r\n- Framework und Vorgehensmodell zur Modellierung und Umsetzung\r\n- Praxisbeispiel und eigene Anwendung', 'Projektarbeit;;', 'deutsch', 'Schmelzer, Hermann; Sesselmann, Wolfgang. Geschäftsprozessmanagement in der Praxis: Kunden zufrieden stellen - Produktivität steigern - Wert erhöhen. Hanser Wirtschaft. 2010.\r\nFreund, Jakob; Rücker, Bernd. Praxishandbuch BPMN 2.0. Hanser Fachbuch. 2010.\r\nAllweyer, Thomas. BPMN 2.0 - Business Process Model and Notation: Einführung in den Standard für die Geschäftsprozessmodellierung. Books on Demand. 2009.\r\nLessen, Tammo van; Lübke, Daniel; Nitzsche, Jörg. Geschäftsprozesse automatisieren mit BPEL. Dpunkt Verlag. 2011.\r\nEABPM. Business Process Management Common Body of Knowledge (CBOK). Schmidt Dr. Goetz Verlag. 2009.', 6, 4, NULL, NULL, NULL, NULL),
(34, '2014-12-11', 1, 'Freigegeben', 'EPRON', 'Enterprise Programmierung', 'Enterprise Programming', 'Sommersemester', 1, 'Vorlesung;;Übung;;Praxisprojekt;;', 120, 20, '- Kenntnis der spezifischen Anforderungen der Enterprise Programmierung.\r\n- Kenntnisse der Konzepte und Technologien der Enterprise Programmierung\r\n- Fähigkeit zur eigenständigen Mitarbeit bei Aufgaben zur Enterprise Programmierung und Systemin-tegration\r\n- Theoretische und praktische Kenntnis der wichtigsten Frameworks, Container und Technologien zur Enterprise Programmierung.\r\n- Kenntnisse und Erfahrungen zur gemeinschaftlichen, verteilten Entwicklung.', 'Motivation, Kontext und Einsatz von Enterprise Programming.\r\n- Unterscheidung der Entwicklung von Anwendungssysteme und Enterprise Programming\r\n- Ansätze, Konzepte, Technologien und Frameworks der Enterprise Programmierung\r\n- Kooperative Entwicklung innerhalb von Unternehmen bis hin zu Continuous Integration\r\n- Transparenz, lose Kopplung, Container-Unabhängigkeit\r\n- Konzepte und Technologien zu: Persistenz, (verteilte) Transaktionen, Dependency Injection, Mes-saging, Services, Integration/ remote-Serviecs, Orchestration', 'Vortrag;;schriftliche Ausarbeitung;;', 'deutsch', 'Ihns, O.; Harbeck, D.; Heldt, S.; Koscheck, H.: EJB 3 professionell. dpunkt.verlag. Heidelberg. 2007.\r\nOates, Richard; Langer, Thomas; Wille, Stefan; Lueckow, Torsten; Bachlmayr, Gerald. Spring & Hibernate. Carl Hanser Verlag. München. 2008.\r\nBreidenbach, Wall. Spring im Einsatz. Hanser-Verlag. 2010.\r\nWiest. Continuous Integration mit Hudson. dpunkt-Verlag. 2010.\r\nBiskup, Wloka, Helmberger. Spring Praxishandbuch: Integration und Testing. Entwickler.Press. 2008.\r\nBiskup, Stalitz, Steiger, Wloka: Spring Praxishandbuch: Band 2: Dynamisierung, Verteilung und Sicherheit. Entwickler.Press. 2009.', 6, 4, NULL, NULL, NULL, NULL);
INSERT INTO `Veranstaltung` (`Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `modulbeauftragter`, `KontaktzeitVL`, `KontaktzeitSonstige`, `VoraussetzungLP`, `VoraussetzungInhalte`) VALUES
(35, '2014-12-11', 1, 'Freigegeben', 'GRAF1', 'Computergrafik 1', 'Computergraphics 1 Kennnummer B-IN-WP09 Arbeitsbelastung', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Grundlegendes Verständnis der Mechanismen generativer Computergrafik; Beherrschen eines Gra-fik-API (OpenGL); Fähigkeit, einfache Modelle, Animationen und artikulierte Objekte mit Mitteln des Grafik-API zu programmieren; Fähigkeit, eine interaktive grafische Applikation (z.B. Spiel, Demo) mit Hilfe von OpenGL zu erstellen.', '- Hard- and Software für Computergrafik\r\n- Transformationen, Modeling\r\n- Viewing\r\n- Visibility\r\n- Shading\r\n- Rasterisierung\r\n- Texture Mapping\r\n- Fortgeschrittene Konzepte: Freies Wandern in der Szene, Schatten, Nebel, ....', 'Projektarbeit;;', 'deutsch', 'Interactive Computer Graphics - A Top-Down Approach: Edward Angel, Fifth Edition, Addison-Wesley.', 6, 7, NULL, NULL, NULL, NULL),
(36, '2014-12-11', 1, 'Freigegeben', 'J3D', 'Graphikprogrammierung mit Java 3D', 'Computer Graphics Programming with Java 3D', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden vertiefen ihre Kenntnisse im Bereich der objektorientierten Programmierung mit Java. Sie können eine umfangreiche Aufgabe im Team bearbeiten und sind in der Lage, die Arbeiten in Form eines Projektes selbstständig zu organisieren. Die Studierenden können ihre Kenntnisse der Projektarbeit und des Projektmanagements sowie ihre Programmierkenntnisse in einem Anwen-dungsprojekt aus dem Gebiet der Grafischen Datenverarbeitung praktisch umsetzen. Hierfür setzen die Studierenden Bibliotheken wie Java3D, JOGL oder JMonkey selbstständig ein.', 'Die Studierenden bearbeiten ein Anwendungsprojekt aus dem Bereich der Grafischen Datenverar-beitung in einer Kleingruppe. Die gesamte Projektorganisation und das Projektmanagement liegen in den Händen der Studierenden. Für die Realisierung werden aktuelle Hardware (AR-Glasses, Datag-love, Brain Interface etc.) und verschiedene Bibliotheken (Java3D, JOGL oder JMonkey) eingesetzt, in die sich die Studierenden selbstständig einarbeiten.', 'Schriftliche Klausur;;', 'deutsch', 'L. Ammeraal, K. Zhang: Computer Graphics for Java Programmers. John Wiley & Sons, ISBN 978-0-470-03160-5\r\nD. Selman: Java 3D Programming. Manning, ISBN 978-1-930-11035-9\r\nF. Klawonn: Grundkurs Computergrafik mit Java: Die Grundlagen verstehen und einfach umsetzen mit Java 3D. Vieweg+Teubner, ISBN 978-3-834-81223-0', 6, 3, NULL, NULL, NULL, NULL),
(37, '2014-12-11', 1, 'Freigegeben', 'MCI1', 'Mensch-Computer-Interaktion 1', 'Human-Computer-Interaction 1', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden sollen die wesentlichen Ansätze benutzerorientierter Analyse- und Entwicklungs-methoden kennen und kritisch reflektieren sowie menschliche, soziale und organisatorische Fakto-ren berücksichtigen können. Sie sollen verstehen, wie Menschen und Computer kommunizieren, handeln und reagieren. Die Studierenden wissen welche Interaktionsformen es für die Kommunikati-on mit dem Computer gibt. Sie verfügen über die Kompetenz zur Entwicklung von Programmen, die der Anwender erfolgreich benutzen kann. Die Studierenden besitzen theoretische und praktische Kenntnisse für die Entwicklung "user-centered-design" orientierter Mensch-Computer-Systeme. Sie erwerben die Fähigkeit zur Optimierung eines Mensch-Computer Systems und können diese aus Sicht der Anwender sehen und bewerten.', 'Einführung in die Mensch-Computer-Interaktion\r\nSoftware Ergonomie\r\nWahrnehmung\r\nGedächtnis und Erfahrung\r\nHandlungsprozesse\r\nKommunikation\r\nNormen und Gesetze\r\nRichtlinien\r\nHardware\r\nInteraktionsformen\r\nGrafische Dialogsysteme\r\nUsability Engineering\r\nSocial Engineering', 'Schriftliche Klausur;;', 'deutsch', 'M. Dahm: Grundlagen der Mensch-Computer-Interaktion. Pearson Studium, ISBN 978-3-827-37175-1\r\nM. Heinecke: Mensch-Computer-Interaktion. Fachbuch Verlag Leipzig, ISBN 978-3-827-37175-1.\r\nT. Stapelkamp: Screen- und Interfacedesign. Gestaltung und Usability für Hard- und Software. Springer, ISBN 978-3-540-32949-7\r\nM. Herczeg: Software-Ergonomie: Theorien, Modelle und Kriterien für gebrauchstaugliche interaktive Computersysteme. Oldenbourg, ISBN 978-3-486-58725-8\r\nM. Herczeg: Interaktionsdesign. Gestaltung interaktiver und multimedialer Systeme. Oldenbourg, ISBN 978-3-486-27565-0\r\nB. Shneiderman, C. Plaisant: Designing the User Interface. Addison-Wesley, ISBN 978-0-321-19786-3.\r\nS. Heim: The Resonant Interface: HCI Foundations for Interaction Design. Addison-Wesley, ISBN 978-0-321-37596-4.\r\nH. Sharp, Y. Rogers, J. Preece: Interaction Design - Beyond Human-Computer Interaction. Wiley & Sons, ISBN 978-0-470-01866-8', 6, 3, NULL, NULL, NULL, NULL),
(38, '2014-12-11', 1, 'Freigegeben', 'USER', 'Usabilitiy und User Experience', 'Usability and User Experience', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden kennen aktuellste Entwicklungen in der Bereichen "Usability" und "User Experi-ence.\r\nDie Studierenden sind in der Lage, eigenverantwortlich wissenschaftliche Recherche zu betreiben und sich benötigte Informationen, Methoden und Verfahren eigenständig zu erarbeiten.\r\nDie Studierenden können Lösungen für komplexe Fragestellungen im Themenbereich "Usability" und "User Experience" systematisch erarbeiten und diese (möglicherweise in Gruppenarbeit) prak-tisch umsetzen.', 'Aktuelle Themen aus dem Bereich "Usability" und "User Experience".', 'Schriftliche Klausur;;', 'deutsch', 'Wird jeweils zu Beginn der Veranstaltung angegeben', 6, 7, NULL, NULL, NULL, NULL),
(39, '2014-12-12', 1, 'Freigegeben', 'MCI2', 'Mensch-Computer-Interaktion 2', 'Human-Computer-Interaction 2', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden sollen ihr Wissen und ihre Kenntnisse aus Mensch-Computer-Interaktion 1 vertiefen und weiter entwickeln. Am Beispiel von Qt 4 lernen Sie eine modernes Bibliothek und Werkzeuge \r\nzur effizienten Erstellung von Benutzungsoberflächen kennen.\r\n-Die Studierenden können komplexe \r\nuser-centered-design orientierte Benutzungsoberflächen entwerfen und mit Hilfe von Qt4 implementieren und validieren. Dabei setzen Sie alle Werkzeuge des Qt User Interface Toolkit sicher und effektiv ein.', '-Qt für Einsteiger -Erste Schritte\r\n-Erstellung von Dialogfeldern\r\n-Erstellung von Hauptfenstern\r\n-Programmierung der Anwendung-Funktionalität\r\n-Erstellung benutzerdefinierter Widgets\r\n-Layout-Verwaltung\r\n-Ereignisverarbeitung\r\n-2D-Grafik\r\n-Drag & Drop\r\n-Klassen für die Element Präsentation\r\n-Containerklassen\r\n-Ein- und Ausgabe\r\n-Datenbanken\r\n-Multithreading\r\n-Netzwerkprogrammierung\r\n-XML\r\n-', 'Schriftliche Klausur;;', 'deutsch', '-J. Blanchette und M. Summerfield: C++ GUI Programming with Qt4. Prentice Hall International, \r\nISBN 978-0-132-35416-5\r\n-M. Summerfield: Advanced Qt Programming: Creating Great Software with C++ and Qt 4. Prentice \r\nHall International, ISBN 978-0-321-63590-7\r\n-A. Ezust, P. Ezust: An Introduction to Design Patterns in C++ with Qt 4. Prentice Hall International, \r\nISBN 978-0-131-87905-8\r\n-D. Molkentin und A. Pönitz: Qt 4. Einführung in die Applikationsentwicklung. Open Source Press, \r\nISBN 978-3-937-51499-4\r\n-J. Wolf: Qt 4.6 - GUI-Entwicklung mit C++: Das umfassende Handbuch. Galileo Computing, ISBN \r\n978-3-836-21542-8', 6, 3, NULL, NULL, NULL, NULL),
(40, '2014-12-12', 1, 'Freigegeben', 'REQ', 'Requirements Engineering', 'Requirements Engineering', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden sollen die Fähigkeit erwerben, Anforderungen in IT-Projekten systematisch ermitteln, dokumentieren, prüfen, abstimmen und verwalten zu können. ---Sie kennen Methoden zur Erstellung von Anforderung-Modellen und können diese anwenden. \r\n-Die Studierenden kennen Möglichkeiten der Werkzeugunterstützung für das Requirements-Management.', '-Theoretische Grundlagen \r\n-Grundlagen und Klassen von Informationssystemen \r\n-Anwendungen im Unternehmen und unternehmen-übergreifende Anwendungen \r\n-Planung, Realisierung und Einführung von betrieblichen Informationssystemen \r\n-Grundlegende Aspekte des Informationsmanagements\r\n-weitere Aspekte der Wirtschaftsinformatik .', 'Schriftliche Prüfung;;', 'deutsch', '-Skript zur Vorlesung, \r\n-Mertens P, Bodendorf F., Grundzüge der Wirtschaftsinformatik, Springer\r\n-Schwarzer B., Krcmar H., Grundlagen betrieblicher Informationssysteme, Schäffer-Poeschel\r\n-Abts, D., Grundkurs Wirtschaftsinformatik: Eine kompakte und praxisorientierte Einführung, Vieweg+Teubner\r\n-Hansen H.R., Neumann G., Wirtschaftsinformatik 1 + 2, UTB Stuttgartl\r\n', 6, 8, NULL, NULL, NULL, NULL),
(41, '2014-12-12', 1, 'Freigegeben', 'GRAF2', 'Computergrafik 2 ', 'Computergraphics 2', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 10, '-Vertiefe Verständnis der Mechanismen generativer Computergrafik\r\n-Beherrschen fortgeschrittener Methoden der grafischen Programmierung (z.B. Shader-Programmierung, fortgeschrittene Animation-verfahren\r\n-Beherrschen eines Computergrafik-Frameworks oder einer Rendering/Game-Engine)\r\n-Fähigkeit, komplexe Modelle, Animationen und Effekte mit Mitteln der betrachteten Software-Tools zu implementieren\r\n-Fähigkeit, eine komplexe, interaktive grafische Applikation zu erstellen', '-Jeweils zu Beginn der Veranstaltung vereinbart: z. B. vertiefte Low-Level\r\nProgrammierung (Shader-Programmierung)\r\n-Programmierung von Rendering- bzw. Game-Engines\r\n-Programmierung mit Hilfe von High-Level-API''s, Einbinden aktueller 3D-Eingabegeräte, etc.', 'Projektarbeit;;', 'deutsch', NULL, 6, 7, NULL, NULL, NULL, NULL),
(42, '2014-12-12', 1, 'Freigegeben', 'BI', 'Business Intelligence', 'Business Intelligence', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 30, 'Die Studierenden erlernen, wie mithilfe von analytischen Applikationen (Business Intelligence) die Ziele und Strategien eines Unternehmens gesteuert und gemessen werden können.\r\n-Sie wissen, wieder Key Performance Indikatoren einer IT Organisation definiert und mithilfe von Systemen gemanagt werden können.\r\n-Abstraktion, Modellierung, Teamfähigkeit, Entscheidungskompetenz und Präsentation werden anhand der Diskussion realer Umsetzung-Szenarien gefördert\r\n', '-Business Intelligence und Data Warehouse Systeme\r\n-Analytische Applikationen \r\n-IT Controlling\r\n-Corporate Performance Management', 'Schriftliche Prüfung;;', 'deutsch', '-Skript zur Vorlesung, \r\n-Gluchowski, P.; Gabriel, R.; Dittmar, C.: Management Support Systeme und Business Intelligence\r\n-Computergestützte Informationssysteme für Fach- und Führungskräfte, Springer\r\nKemper, H.G.: Business Intelligence - Grundlagen und praktische Anwendungen, Vieweg+Teubner', 6, 8, NULL, NULL, NULL, NULL),
(43, '2014-12-11', 1, 'Freigegeben', 'SQUAL', 'Software Qualität Management ', 'Software Quality Management', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden erhalten Kenntnisse über die in der SW--Industrie üblichen Verfahren zum Qualitätsmanagement bei der Software-Entwicklung \r\n-Sie lernen Methoden und Techniken der Software Qualitätssicherung auf konkrete Praxis-relevante Einzelfälle oder Situationen anzuwenden\r\n-Die Studenten werden befähigt Methoden und Verfahrensweisen zur Qualitätssicherung bei der SoftwareEntwicklung bezüglich ihrer Zweckmäßigkeit zu beurteilen, auszuwählen und anzuwenden', '- Software Qualitätsmanagement - Überblick\r\n- Verankerung von Qualität in Design und Codierung\r\n- Test-Planung, Test-stufen und Testmethoden\r\n- Versios-, Konfiguration- und Änderungsmanagement\r\n- Qualitätsmanagement in frühen Phasen\r\n- Objektorientiertes Testen und Testautomatisierung\r\n- Qualität-Modelle (ISO 15504, CMMI, ...)\r\n- Qualitätsmanagement by Objectices (IT-Prozesse)\r\n- Qualität durch Organisation und Kommunikation\r\n- IT-Risikomanagement\r\n- Methoden und Werkzeuge zur Messung und Bewertung von Software\r\n- Methoden zur Aufwandsschätzung von IT-Projekten\r\n- Kennzahlen-Systeme\r\n- Qualitätsmanagement in komplexen Architekturen an konkreten Fallbeispielen.', 'Schriftliche Klausur;;', 'deutsch', '-Skript zur Vorlesung, \r\nBücher mit Titel: \r\n-Hoffmann D. W.: Software Qualität, Springer, ISBN 978-3-540-76322-2, 2008\r\n-Schneider K.: Abenteuer Software Qualität, dpunkt.verlag, ISBN 978-3-89864-472-3, 2007\r\n-Sneed H. M. u.a.: Software in Zahlen, Hanser, 978-3-446-42175-2, 2010\r\n-Deacon, J.: Object-Oriented Analysis and Design, Addison-Wesley, ISBN 0-321-26317-0, 2005\r\n-Perry, W. E.: Software Testen, mitp-Verlag, ISBN 3-8266-0887-9, 2003\r\n-Kan, S. H. Metrics and Models in Software Quality Engineering,Addison-Wesley, ISBN 0-201-72915-6, 2002\r\n-Vigenschow, U.: Objektorientiertes Testen und Testautomatisierung in der Praxis, dpunkt.verlag, ISBN 389864-305-0, 2005.', 6, 11, NULL, NULL, NULL, NULL),
(44, '2014-12-12', 1, 'Freigegeben', 'WEBU', 'Web Usability', 'Web Usability', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden kennen die grundlegenden Aspekte des Themengebiets "Web Usability".\r\n-Die Studierenden können existierende WebSeiten im Hinblick auf deren Nutzbarkeit und Benutzerfreundlichkeit untersuchen und bewerten. \r\n-Sie sind in der Lage, existierende Web-Seiten zu verbessern und neue Web-Seiten unter Aspekten guter Nutzbarkeit zu planen', '-Usability: Begriffe\r\n-Der Benutzer\r\n-Benutzerverhalten im Web\r\n-Benutzeranforderungen\r\n-Web-Site Usability\r\n-Interaktionsmechanismen und -muster\r\n-Webseiten-Navigation, Formulare, Suche\r\n-Personalisieren\r\n-Texte für das Web\r\n-E-Commerce Usability\r\n-Usability & Web 2.0\r\n-Usability Testing\r\n-Accessibility: Barrierefreie bzw. -arme Web-Seiten\r\n-Hintergründe und Fakten\r\n-Gesetzliche Vorgaben\r\n-Konzepte und Maßnahmen\r\n-Strukturierung von Web-Auftritten: Information-Architektur\r\n-Web-Projektierung; Fahrplan zum Erstellen von Web-Auftritten', 'Mündliche Prüfung;;Projektarbeit;;', 'deutsch', '-Steve Krug: Don''t make me think: A common sense approach to Web Usability; New Riders, 2nd ed. (18. August 2005)\r\n-Frank Puscher: Leitfaden Web-Usability: Strategien, Werkzeuge und Tipps für mehr Benutzerfreundlichkeit; dpunkt Verlag\r\n-Morville, Rosenfeld: Information Architecture for the World Wide Web: Designing Large-Scale Web \r\nSites; O''Reilly Media; 3 edition (November 27, 2006)\r\n-Sydik: Design Accessible Web Sites: 36 Keys to Creating Content for All Audiences and Platforms; Pragmatic Bookshelf; 1st edition (November 5, 2007)', 6, 7, NULL, NULL, NULL, NULL),
(45, '2014-12-12', 1, 'Freigegeben', 'SEMA', 'Service Management', 'Service Management', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, '-Kenntnisse der Architektur und Aufgabenbereiche zur \r\nIT-Dienstleistungserbringung (ITIL)\r\n-Verstehen der Aufgabenbereiche des IT-Service Management\r\n-Analysieren von Anwendungsumgebungen auf Service-Einsatz\r\n-Exemplarisches Anwenden einzelner Service- und Managementaufgaben auf Fallbeispiele', '-Service-Management-Konzepte\r\n-ITIL-Lebenszyklus, Module und Prozesse\r\n-Alternative Ansätze zum Servicemanagement', 'Schriftliche Klausur;;Vortrag;;', 'deutsch', '-Böttcher: IT-Servicemanagement mit ITIL V3\r\n-Tiemeyer: Handbuch IT-Management\r\n-OGC: ITIL Handbücher', 6, 2, NULL, NULL, NULL, NULL),
(46, '2014-12-12', 1, 'Freigegeben', 'IMAN', 'Information Management', 'Information Management', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden sollen Ziele und Aufgaben des strategischen, taktischen und operativen Informationsmanagements kennen.\r\n-Sie erkennen die Bedeutung der Informationsverarbeitung in heutigen Unternehmen vor dem Hintergrund der kontinuierlichen Entwicklung und Verflechtung betrieblicher \r\nInformationssysteme.\r\n-Die Studierenden sollen Informationssystemarchitekturen und Frameworks zur Definition von IT Strategien verstehen sowie die Grundlagen des IT-Controllings, Knowledge und Qualitätsmanagements kennen.\r\n-Sie bauen ein Verständnis für das praktische Umsetzen strategischer Informationsverarbeitungsziele auf.\r\n-Sie können die Notwendigkeit, Probleme und Lösungsansätze für die Wirtschaftlichkeitsanalyse erläutern. \r\n-Sie können die Überlegungen zur Make-or-by-Entscheidung nachvollziehen und entsprechend auf praktische Situationen anwenden. \r\n-Sie können den Ablauf und die Maßnahmen des Einführungsprozesses von Informationssystemen beschreiben', '-Ziele und Aufgaben des Informationsmanagements \r\n-Strategisches Informationsmanagement \r\n-Informationssystemarchitekturen und Integration\r\n-Frameworks zur Definition von IT Strategien \r\n-IT Controlling \r\n-Knowledge Management \r\n-Planung und Aufbau geeigneter IT Infrastrukturen \r\n-Sicherheitsmanagement.', 'Schriftliche Klausur;;', 'deutsch', '-Skript zur Vorlesung, \r\n-Krcmar, H.: Information Management; Springer\r\n-Tietmeyer, E.: Handbuch IT-Management, Konzepte, Methoden, Lösungen und Arbeitshilfen für die \r\nPraxis, Hanser\r\n-Österle, H.; Winter, R.; Baumöl U.: Business Engineering: Auf dem Weg zum Unternehmen des \r\nInformationszeitalters; Springer\r\n-Zarnekow, R.; Brenner, W.; Pilgram, U.: Integriertes Informationsmanagement: Strategien und \r\nLösungen für das Management von IT-Dienstleistungen (Business Engineering); Springer', 6, 8, NULL, NULL, NULL, NULL),
(47, '2014-12-12', 1, 'Freigegeben', 'RTOS', 'Echtzeit-Betriebssysteme', 'Real Time Operation Systems', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 10, '-Die Studierenden kennen den grundlegenden Aufbau von Echtzeit-Betriebssystemen (RTOS – Realtime-Operating Systems). Sie können verschiedene Arten von  Echtzeit-Betriebssystemen sowie deren Entwicklungsumgebungen unterscheiden.\r\n-Die Studierenden verstehen und kennen die besonderen Anforderungen der Echtzeitfägigkeit bezüglich der Grundkonzepte und Aufgaben (Prozesse, Dateien, Speicherverwaltung) von Betriebssystemen und können diese handhaben.\r\n-Die Studierenden beherrschen den grundlegenden Umgang mit Entwicklungsumgebungen für Echtzeitanwendungen besonders im Bereich Embedded Computing.', 'Echtzeit-Betriebssysteme:\r\n-Architektur, Aufgaben, Konzepte und Grundlagen von Echtzeit-Betriebssystemen\r\n-Scheduler\r\n-Echtzeit-Betriebssystemarten \r\n-Prozess- und Betriebsmittelsteuerung, Synchronisationskonzepte, Interprozesskommunikation\r\n-Speicherverwaltung\r\n-Edit-Compile-Debug-Zyklus\r\n-Leistungs-Messung\r\n-Vermessung und Beurteilung von Echtzeit-Verhalten\r\n-Embedded Computing\r\n-Board-Support-Package\r\n-Middleware\r\n-Dateisysteme und Ein-/Ausgabe.', 'schriftliche Ausarbeitung;;', 'deutsch', '- Skript zur Vorlesung, \r\n- Erich Ehses et al, Betriebssysteme, Pearson Studium 2005, ISBN 3-8274-7156-2\r\n- Peter Mandl, Grundkurs Betriebssysteme, Vieweg 2008, ISBN 978-3-8348-0392-4\r\n- Andrew S. Tanenbaum: Modern Operating Systems, Pearson Education 2009, ISBN 978-0-13-813459-4', 6, 15, NULL, NULL, NULL, NULL),
(48, '2014-12-12', 1, 'Freigegeben', 'PROJ', 'Studienprojekt und Projektmanagement', 'Student Project and Project Management', 'jedes Semester', 1, 'Vorlesung;;Übung;;', 300, 35, '-Die Studierenden kennen die wesentlichen Aspekte und grundlegenden Methoden professionellen Projektmanagements im Hinblick auf Projektvorbereitung, Projektplanung, Projektdurchführung und Abschluss. \r\n-Die Studierenden vertiefen ihre Kenntnisse und entwickeln Erfahrungen zur Aufwands und Kostenschätzung sowie zur praxisgerechten, effektiven und effizienten Durchführung von Softwareprojekten.\r\n-Die Studierenden können eine umfangreiche Aufgabe im Team bearbeiten und sind in der Lage, die Arbeiten in der Form eines Projektes selbstständig zu organisieren. \r\n-Die Studierenden beherrschen eine grundlegende Palette von Werkzeugen zum Projekt- und Qualitätsmanagement.\r\n-Sie können ihre Kenntnisse der Projektarbeit und des Projektmanagements und ihre fachspezifischen Kenntnisse in einem Anwendungsprojekt praktisch umsetzen.', 'Im Modul Studienprojekt führen die Studierenden in Gruppenarbeit ein praxisnahes InformatikProjekt, nach Möglichkeit zusammen mit einem externen Partner aus Wirtschaft oder Forschung entsprechend eines vorgegebenen Anforderungskataloges durch. Dabei üben sie die professionelle Zusammenarbeit in Entwicklungsteams (ca. 4-6 Personen). Sie nutzen dabei die zuvor im Verlauf ihres Studiums erworbenen Fachkenntnisse und erfahren die Bedeutung von Projektmanagement Methoden und Softskills.\r\nDie Studierenden-Gruppen werden bei der Projektdurchführung von je zwei Professoren unterstützt.\r\nDie erforderlichen theoretischen Grundlagen des Projektmanagements werden in einer teilweise in \r\nBlockunterricht durchgeführten Vorlesung vermittelt:\r\n-Begriffliche Grundlagen des Projektmanagements\r\n-Projektphasen\r\n-Zeit- und Aufwandsplanung\r\n-Ressourcenplanung\r\n-Risikoplanung\r\n-Konfliktmanagement, Änderungsmanagement\r\n-Konfigurations- und Fehlermanagement \r\n-Projektkontrolle\r\n-Projektorganisation (innere und äußere)\r\n-Führung von Projekten.', 'Projektarbeit;;\r\nSeminarvortrage;;\r\nSchriftliche Ausarbeitung;;', 'deutsch', '-Skript zur Vorlesung, \r\n-Hölzle: Projektmanagement - Kompetent führen, Erfolge präsentieren. Haufe, 2. Auflage, 2007.\r\n-Hindel et al.: Basiswissen Software-Projektmanagement. dpunkt.verlag, 3. Auflage, 2009.\r\n-Tumuscheit: Überleben im Projekt: 10 Projektfallen und wie man sie umgeht. Redline Wirtschaft, \r\n2007', 12, 8, NULL, NULL, NULL, NULL),
(49, '2014-12-12', 1, 'Freigegeben', 'MESY', 'Modellbasierte Entwicklung', 'Model Based Software Engineering', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Absolventinnen und Absolventen des Moduls besitzen umfassende Kompetenz, Modellierung im Prozess der Softwareentwicklung sinnvoll einzusetzen.\r\nDie Studierenden können Modelle zur Beschleunigung, Effizienzverbesserung und Qualitätsverbes-serung der Softwareentwicklung einsetzen\r\nSie sind in der Lage Modellierungstechniken und Modellierungsumgebungen zu bewerten und den Anforderungen entsprechend auszuwählen.', '- Formale Erfassung von Anforderungen\r\n- Analyse und Bewertung von Modellen und Metamodellen\r\n- Domain spezifische Sprachen\r\n- Code Generatoren\r\n- Model zu Model Transformationen\r\n- Umsetzung von Software Entwicklungsprojekten mit Modellierungsumgebungen.', 'schriftliche Ausarbeitung;;Projektarbeit;;', 'deutsch', 'Skript zur Vorlesung,\r\nBücher mit Titel:\r\n- Stahl T., Völter M.: Modellgetriebene Softwareentwicklung, dpunkt.verlag, ISBN 3-89864-310-7, 2005\r\n- Klar M.,Klar S.: Einfach Generieren, Hanser, ISBN 978-3-446-40448-9, 2006\r\n- Kastens U., Büning H. K.: Modellierung, Hanser, ISBN 978-3-446-41537-9, 2008\r\n- Gruhn V., Pieper D., Röttgers C.: MDA, Springer, ISBN 3-540-28744-2, 2006\r\n- Mellor S. J. u.a.: MDA Distilled, Addison Wesley, ISBN 978-0-201-78891-4, 2004\r\n- Warmer J., Kleppe A.: Object Constraint Language 2.0, mitp, ISBN 3-8266-1445-3, 2004\r\n- Zeppenfeld K.,Wolters R.: Generative Software-Entwicklung mit der MDA, Spektrum Akademischer Verlag, ISBN 978-3-8274-1555-4, 2006.', 6, 11, NULL, NULL, NULL, NULL),
(51, '2014-12-12', 1, 'Freigegeben', 'MOKO', 'Mobile Kommunikationsnetze', 'Mobile Communication Networks', 'Sommersemester', 1, 'Vorlesung;;Labor;;', 120, 25, '-Anforderungen und aktuelle Ausprägungen von Mobilnetzen (Mobilfunk, WLAN) kennen und beurteilen.\r\n-Architekturen und Schichtenmodelle von Mobilnetzen verstehen. \r\n- Internet-Konnektivität über mobile Netze verstehen und anwenden. \r\n-Spezielle Techniken für Mobile Anbindung wie Mobile IP und sichere Kommunikation verstehen  und anwenden.\r\n-Leistungsverhalten von Mobilen Anwendungen und Netzen analysieren und bewerten.', '-Entwicklung der Mobilen Datenkommunikation \r\n-Kommunikationsstrukturen (Infrastruktur, Adhoc) \r\n-GPRS, UMTS, LTE \r\n-WLAN-Vertiefung, Bluetooth u.a. \r\n-Sicherheit in mobilen Netzen \r\n-IP in mobilen Netzen, IPv6, PPP \r\n-Mobile-IP-Konzept \r\n-IP-Tunnel und VPN \r\n-Leistung in mobilen Netzen', 'Schriftliche Klausur;;', 'deutsch', '-Foliendateien zur Vorlesung, Übungsblätter, Laboraufgabenblätter \r\n-Peterson, Davie: Computernetze \r\n-Sauter: Grundkurs Mobile Kommunikationssysteme \r\n-RFCs', 6, 2, NULL, NULL, NULL, NULL),
(52, '2014-12-12', 1, 'Freigegeben', 'EMOC', 'Einführung in das Mobile Computing', 'Introduction to Mobile Computing', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden erwerben Grundlagen, Techniken und Konzepte zum Gebiet des Mobile Compuing.\r\n-Die Studierenden kennen verschiedene Techniken und Protokolle aus dem mobilen Umfeld und \r\nkennen deren Vor- und Nachteile. \r\n-Sie sind in der Lage für verschiedene mobile Einsatzszenarien die geeigneten Technologien vorzuschlagen.\r\n-Die Studierenden können Werkzeuge und Techniken zur Entwicklung mobiler Anwendungen auswählen.', '- Begriffe und Arten von Mobilität \r\n- Grundlagen, Techniken und Protokolle für mobile Vernetzungen \r\n- Mobile Endgeräte und Rechnerarchitektur mobiler Geräte \r\n- Leistung mobiler Hardware \r\n- Konzepte und Grundlagen der Programmierung mobiler Endgeräte \r\n- Entwicklungsschritte mobiler Applikationen \r\n- Mobile Anwendungen als Verteilte Systeme (Client- Server Sicht) \r\n- Verfahren zur Positionsbestimmung (GPS) \r\n- Entwicklung von Anwendungen mit Ortsbezogenheit \r\n- Mobiles Internet und seine Anwendungen \r\n- Sicherheit in mobilen Netzen.', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung, \r\nBücher mit Titel: \r\n- Fuchß T.: Mobile Computing - Grundlagen und Konzepte für mobile Anwendungen, Hanser, ISBN \r\n978-3-446-22976-1, 2009 \r\n- Zeppenfeld K.; Bollmann T.: Mobile Computing, W3L GmbH, ISBN 978-3868340051, 2010 \r\n- Schiller J.: Mobilkommunikation, Pearson, ISBN 3-8273-7060-4, 2003 \r\n- Roth J.: Mobile Computing Grundlagen, Technik, Konzepte, dpunkt.verlag, ISBN 3-89864-366-2, \r\n2005 \r\n- Mahgoub I.; Ilyas M.: Mobile Computing Handbook, CRC Press Inc, ISBN 0-84931-971-4, 2004 \r\n- Alby T. Das mobile Web, Hanser, ISBN 978-3446415072, 2008 \r\n- Lehner F.: Mobile und drahtlose Informationssysteme, Springer, ISBN 3-540-43981-1, 2002.', 6, 2, NULL, NULL, NULL, NULL),
(53, '2014-12-12', 1, 'Freigegeben', 'BWLWP', 'BWL Vertiefung', 'Business Administration 3', 'jedes Semester', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden vertiefen die BWL Grundkenntnisse aus den Pflichtmodulen Betriebswirtschaft in \r\nausgewählten betriebswirtschaftlichen Bereichen.\r\n-Ziel ist, für Informatiker praxisrelevante betriebswirtschaftliche Inhalte zu vertiefen. Zur Abdeckung \r\ndes Moduls "BWL Vertiefung" wird ein speziell für Informatiker geplantes Modul angeboten, aber es \r\nkönnen nach Rücksprache mit dem Prüfungsausschuss auch aus anderen Studiengängen Module mit wirtschaftlichem Bezug gewählt werden (z.B. Logistik, VWL, Marketing, Investitions-, Finanzierungs- und Kostenplanung, Controlling etc.). -Hierbei ist jedoch zu beachten, dass 6 ECTS erreicht werden müssen (z.B. durch die Auswahl von zwei 3 ECTS-Modulen).', 'Die konkreten Lehrinhalte hängen von dem gewählten Modul ab; auch bei dem speziell für Informatiker  angebotenem BWL Wahlpflichtfach sind die inhaltlichen Schwerpunkte variabel und sollen in für \r\nInformatiker relevanten Themen der BWL vertiefende Inhalte erschließen.', 'Schriftliche Klausur;;Vortrag;;schriftliche Ausarbeitung;;', 'deutsch', 'Vorlesungsunterlagen und Literaturangaben darin', 6, 8, NULL, NULL, NULL, NULL),
(54, '2014-12-12', 1, 'Freigegeben', 'MAT2', 'Mathematik für Bioinformatiker', 'Mathematics for Bioinformaticians', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 30, 15, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die grundlegenden diskreten Strukturen (Gruppen, Ringe, Körper) zu benennen und mit\r\nihen zu rechnen\r\n- grundlegende Verfahren zur numerischen Differentiation und Integration zu beschreiben\r\nund diese auf Probleme der Biologie anzuwenden\r\n- gewöhnliche Differentialgleichungen zu klassifizieren und Anfangswertprobleme linearer\r\nDifferentialgleichungen und Differentialgleichungen 1. Ordnung zu lösen\r\n- mehrdimensionales Differenzieren und Integrieren auf elementare Funktionen anzuwenden\r\n- die Grundlagen der theoretischen Informatik wiederzugeben und fortgeschrittene\r\nmathematische Fragestellungen mit Hilfe eines Computeralgebrasystems zu lösen', '- Elementare Gruppen-, Ring- u. Körpertheorie\r\n- Numerische Anwendungen in der Biologie: numerische Differentiation und Integration, finite\r\nDifferenzen\r\n- Partielle Ableitungen, mehrfache Integrale\r\n- Differentialgleichungen, insbesondere von Wachstumsprozessen\r\n- Graphen- und Komplexitätstheorie\r\n- Grundlagen der Perkolationstheorie', 'Schriftliche Klausur;;', 'deutsch', 'Furlan, Peter; Das Gelbe Rechenbuch, Bd. 1 - Bd. 3, Verlag A. Furlan, aktuelle Ausgabe\r\nPapula, L.; Mathematik für Ingenieure und Naturwissenschaft-ler, Bd. 1 - Bd. 3, Vieweg-Verlag\r\nWiesbaden, aktuelle Auflage', 3, 24, NULL, NULL, NULL, NULL),
(55, '2014-12-12', 1, 'Freigegeben', 'BIOW', 'Biowissenschaften', 'Life Sciences', 'Wintersemester', 1, 'Vorlesung;;Praxisprojekt;;', 75, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- den Aufbau und die Funktion der Organismen (Pflanzen, Tiere und Mikroorganismen)\r\naufzuzählen\r\n- die Organismen histologisch, morphologisch und funktionell darzustellen\r\n- die Ansprüche der Mikroorganismen an Nährstoffe und Umweltbedingungen zuzuordnen\r\n- das Konzept der Hygiene mit den Teilbereichen Sterilisation, Desinfektion und\r\nKonservierung zu beschreiben\r\n- die Basistechniken mikrobiologischen Arbeitens und des sicheren Umgangs mit\r\nMikroorganismen anzuwenden', 'Vorlesung, 1 SWS Botanik Prof. Zimmermann: Vom Urknall zum Organismus, Einteilung der\r\nBotanik, Aufbau einer Pflanzenzelle, Phylogenie der Pflanzen, Organe der Kormophyten, Wurzel,\r\nSprossachse, Laubblatt, Blüte, Fruchtbildung und Früchte\r\nVorlesung, 1 SWS Zoologie Prof. Deventer: Tierische Zellen, Gewebetypen, Vermehrungsstrategien,\r\nKrankheitserreger für den Menschen, Generations- und Wirtswechsel, Evolution und Entwicklung.\r\nSystematik des Zoologischen Systems, die morphologische Entwicklung vom Ein- zum Vielzeller\r\nVorlesung, 1 SWS Mikrobiologie Prof. Krefft: Einführung in die Zelle, chemische Bestandteile der\r\nZelle, Moleküle und Makromoleküle der Zelle, Unterschiede Prokaryonten - Eukaryonten, Aufbau der\r\nBakterienzellen (Prokaryonten)\r\nVorlesung, 2 SWS Mikrobiologie Prof. Steinmüller: 1. Wachstum von Mikroorganismen - Nährstoffe,\r\nWachstumsbedingungen, Kulturmethoden, Physiologie des Wachstums, Messung des Wachstums,\r\nHemmung des Wachstums. 2. Hygiene - Sterilisation, Desinfektion, Konservierung, Steriles\r\nArbeiten.\r\nPraktikum, 2 SWS Frau Dipl.-Ing. Vosseberg-Hammel: Herstellen von Nährmedien, sterile\r\nArbeitstechniken, Nachweis von Mikroorganismen in der Luft und auf Oberflächen, Kolonie- und\r\nZellmorphologie von Mikroorganismen, verschiedene Färbemethoden, verschiedene Verfahren zur\r\nBestimmung von Zellzahl und Zellmasse', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung Botanik und Zoologie\r\nLüttge, U.; M. Kluge; G. Thiel (2010): Botanik.- Wiley-VCH-Verlag, ISBN 978-3-527-32030-1\r\nNultsch, W. (2001): Allgemeine Botanik.- 7. Aufl., Thieme Verlag, ISBN 3-13-383311-1\r\nBurda, H.; G. Hilken; J. Zrzavy (2008): Systematische Zoologie.- UTB basics Ulmer Verlag\r\nStorch, V.; U. Welsch (2005): Kurzes Lehrbuch der Zoologie.-Spektrum\r\nWehner, R.; W. Gehring (2007): Zoologie.- Georg Thieme Verlag\r\nFolien zur Vorlesung Mikrobiologie, Krefft\r\nM.T.Madigan & J.M.Martinko: Brock Mikrobiologie, Pearson Studium, ISBN: 978-3-8273-7358-8\r\nH.Cypionka, Grundlagen der Mikrobiologie, Springer Verlag, ISBN: 978-3-642-05095-4\r\nB.Alberts, D.Bray, K.Hopkin, A.Johnson, J.Lewis, M.Raff, K.Roberts, P.Walter: Lehrbuch der\r\nmolekularen Zellbiologie, Wiley-VCH Verlag GmbH & Co.KGaA, ISBN:978-3-527-31160-6\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nWallhäußer, K.H.: Praxis der Sterilisation - Desinfektion - Konservierung; Georg Thieme Verlag\r\nStuttgart', 6, 33, NULL, NULL, NULL, NULL),
(56, '2014-12-12', 1, 'Freigegeben', 'GENE', 'Genetik', 'Genetics', 'Sommersemester', 1, 'Vorlesung;;', 60, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- den molekularen Aufbau und die Funktion des Erbmaterials zu beschreiben\r\n- die Genwirkungen und das Zusammenspiel von Genotyp und Umwelt zu erklären\r\n- die genetischen Vererbungsmechanismen zu charakterisieren', 'Lokalisation der Erbsubstanz, Genexpression, Gen- und Genomstrukturen, extrachromosomales\r\nErbmaterial, genetische Regulation, Veränderung des Erbmaterials, Genwirkung, Genotyp und\r\nUmwelt, Prinzipien der Vererbung, Einführung in die Populationsgenetik, Einführung in die\r\nQuantitative Genetik', 'Schriftliche Klausur;;', 'deutsch', 'Brown: Genome und Gene. Lehrbuch der molekularen Genetik. 3. Aufl., Spektrum Akad. Verlag,\r\n2007\r\nKlug u.a.: Genetik. Studium Biologie. 8. Aufl., Pearson Verlag, 2007\r\nGraw: Genetik. 5. Aufl., Springer Verlag, 2010\r\nFolienvorlagen zur Vorlesung', 3, 22, NULL, NULL, NULL, NULL),
(57, '2014-12-12', 1, 'Freigegeben', 'ALCE', 'Allgemeine Chemie', 'Chemistry', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 90, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- Grundbegriffe, Definitionen sowie die Formelsprache der Chemie zu beherrschen\r\n- chemische Reaktionsgleichungen zu lösen\r\n- grundlegende Prinzipien der chemischen Bindung zu kennen\r\n- Gleichgewichtsreaktionen zu beschreiben und zu berechnen\r\n- Abläufe von Säure/Base-Reaktionen zu beherrschen\r\n- Grundbegriffe der Elektrochemie zu kennen und Redoxgleichungen zu erstellen\r\n- Gesetze der Reaktionskinetik und Katalyse anzuwenden\r\n- Grundwissen über chemische und physikalische Prozesse der Trinkwassergewinnung zu\r\nkennen\r\n- optische Drehwinkel zur Bestimmung der Konzentration von Kohlehydratlösungen zu\r\nermitteln (Praktikum)\r\n- Leitfähigkeiten von Salzlösungen in Abhängigkeit von Temperatur und Konzentration zu\r\nerhalten (Praktikum)', '- Stöchiometrie von Formeln und Reaktionsgleichungen\r\n- Atomaufbau und Einflussgrößen der chemischen Bindungen\r\n- Massenwirkungsgesetz sowie die physikalisch/chemischen Einflussgrößen\r\n- Säuren/Laugen\r\n- Elektrochemische Grundlagen und technische Anwendungen\r\n- Reaktionskinetik und Katalyse\r\n- Trinkwassergewinnung\r\n- Praktikum: Polarimeterie und Leitfähigkeitsmessung', 'Schriftliche Klausur;;', 'deutsch', 'T. L. Brown, H. Eugene LeMay, Bruce E. Bursten Chemie "Pearson Studium" , jeweils neuste\r\nAuflage', 6, 23, NULL, NULL, NULL, NULL),
(58, '2014-12-12', 1, 'Freigegeben', 'STAT', 'Statistik', 'Statistics', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- selbständig einfache statistische Verfahren unter Benutzung eines Statistikprogramms auf\r\nStichprobendaten anzuwenden\r\n- grundlegende statistische Fachbegriffe zu erklären und bei komplexeren Datenanalysen\r\nmit einem statistischen Berater zu kommunizieren. Sie verfügen über „Beratbarkeit“.\r\n- zu entscheiden, ob sie ein statistisches Problem mit den erlernten Methoden selber\r\nadäquat lösen können oder ob eine fachliche Beratung erforderlich ist', 'Wahrscheinlichkeitsrechnung:\r\n- Vorgänge mit zufälligen Ergebnissen\r\n- Grundgesetze der Wahrscheinlichkeit, Gesetz der großen Zahlen, Kombinatorik\r\n- Zufallsvariable, diskrete Verteilungen (binomial, Poisson, hypergeometrisch)\r\n- stetige Verteilungen (Gleich-, Exponential-, Normal-, Chi-Quadrat-, t- und F-Verteilung)\r\n- Parameter von Verteilungen (Erwartungswert, Varianz, Standardabweichung,\r\nVariationskoeffizient, Momente, Median, Quantile)\r\n- Standardisierung und Transformation, zentraler Grenzwertsatz\r\n- bivariate Verteilungen, Korrelation und Kovarianz\r\nDeskriptive Statistik:\r\n- empirische Verteilungsfunktionen, Histogramme, Stichprobenparameter\r\nSchließende Statistik (Schätzen und Teilen):\r\n- t-Tests, Konfidenzbereiche, einfaktorielle Varianzanalyse, multiple Mittelwertvergleiche\r\n- lineare und nicht-lineare Regression, Methoden der kleinsten Quadrate,\r\nLikelihoodschätzmethode\r\n- Kontingenztafeln, Chi-Quadrat-Test, exakter Fisher-Test für 2x2-Tafeln\r\n- nichparametrische Verfahren', 'Schriftliche Klausur;;', 'deutsch', 'Vorlesungsskript\r\nJ.Hartung: Statistik, ISBN 3-486-24984-3\r\nL.Sachs: Angewandte Statistik, ISBN 3-540-12800-X\r\nBeispieldateien für das Praktikum', 6, 20, NULL, NULL, NULL, NULL),
(59, '2014-12-12', 1, 'Freigegeben', 'BIDA', 'Bioinformatische Datenanalyse', 'Bioinformatics Data Analysis', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 105, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- problemangepasste Algorithmen und Datenstrukturen auszuwählen und in einer\r\nSkriptsprache (insb. Perl) zu implementieren\r\n- einfache Programmierhilfen einzusetzen\r\n- Module aus Bibliotheken (z.B. BioPerl) einzusetzen und einfache Anwendungen mit\r\nihnen zu entwickeln\r\n- unter einem Unix-Betriebssystem zu arbeiten\r\n- biologischer Datenbanken und ihrer Formate einzuordnen und im Internet zu nutzen\r\n- Anwendungen zu entwickeln, die biologische Daten verarbeiten', 'Der Kurs umfasst folgende Themen\r\n- Perl: Dokumentation, Sprache, Anwendung anhand typischer Bioinformatikprobleme\r\n- BioPerl und CPAN\r\n- Einfache Entwicklungsumgebungen (Debugger, intelligente Editoren usw.)\r\n- Grundlagen des Umgangs mit einem Unix-Betriebssystem (Suse Linux, Ubuntu usw.)\r\n- Schwerpunkt: Implementierung von Algorithmen und Datenstrukturen anhand von\r\nBeispielen mit Bioinformatikrelevanz, z.B. Bäume und Phylogenien\r\n- Biologische Sequenzen (DNA, RNA, Proteine)\r\n- Einführung in einfache Fragestellungen der Biologie und Medizin\r\n- Informationssysteme und Datenbanken von NCBI, EBI\r\n- Spezielle Datenbanken (PDB, SCOP, SwissProt, KEGG usw.)\r\n- Textmining und Datamining biologischer Datenbanken für die funktionelle Annotation', 'Schriftliche Klausur;;Projektarbeit;;', 'deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nJ. Ziegler, Programmieren lernen mit Perl, Springer Verlag\r\nL. Wall, T. Christiansen, J. Orwant, R. Schwartz, Programming Perl, Programmieren mit Perl,\r\nO''Reilly\r\nJ.D. Tisdall, Einführung in Perl für Bioinformatik, O''Reilly\r\nJ.D. Tisdall, Beginning Perl for Bioinformatics, O''Reilly\r\nJ.D. Tisdall, Mastering Perl for Bioinformatics, O''Reilly\r\nC. Gibas, P. Jambeck, Developing Bioinformatics Computer Skills, O''Reilly\r\nR.A. Dwyer, Genomic Perl: From Bioinformatics Basics to Working Code, Cambridge University\r\nPress\r\nM.D. LeBlanc, B.D. Dyer, Perl for Exploring DNA, Oxford University Press\r\nD.W. Mount, Bioinformatics: sequence and genome analysis, CSHL Press', 6, 1, NULL, NULL, NULL, NULL),
(60, '2014-12-12', 1, 'Freigegeben', 'ALBI', 'Algorithmische Bioinformatik', 'Bioinformatics Algorithms', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 30, '- geeignete Algorithmen zur Lösung bioinformatischer Fragestellungen zu bewerten und zu\r\nimplementieren\r\n- Bioinformatische Softwarepakete zu testen, zu vergleichen und zu beurteilen\r\n- Methoden zur Verarbeitung biologischer Daten problemorientiert auszuwählen', 'Der Kurs umfasst folgende Themen\r\n- Quantifizierung von Sequenzähnlichkeit, Scorematrizen, Alignmentstatistik\r\n- Alignments (global, lokal) und Alignment-Methoden (Dynamische Programmierung, Needleman-\r\nWunsch, Smith-Waterman)\r\n- Sequenzierung und Assemblierung\r\n- Phylogenie, vergleichende Genomik\r\n- Profile und positionsabhängige Scorematrizen\r\n- Suche von Sequenzmustern (Blast, Psi-Blast, Phi-Blast usw.)\r\n- Hidden Markov Modelle\r\n- Strukturvorhersage von Proteinen (Sekundärstruktur, Tertiärstruktur; Threading, Comparative\r\nModelling, Ab initio)\r\n- Sekundärstrukturvorhersage von RNA\r\n- Grundlagen der Auswertung von Array-Experimenten (Microarrays usw.)\r\n- Biologische Netze (metabolisch, regulatorisch) und ihre Modellierung mit Graphen\r\n- Anwendung von bioinformatischen Softwarepaketen', 'Schriftliche Klausur;;Projektarbeit;;', 'deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nR. Merkl und S. Waack, Bioinformatik Interaktiv: Algorithmen und Praxis, Wiley-VCH\r\nH.-J. Böckenhauer und D. Bongartz, Algorithmische Grundlagen der Bioinformatik -\r\nModelle, Methoden und Komplexität, Teubner\r\nN.C. Jones, P.A. Pevzner , An Introduction to Bioinformatics Algorithms, The MIT Press\r\nG. Steger, Bioinformatik. Methoden zur Vorhersage von RNA- und Proteinstruktur, Birkhäuser\r\nD.W. Mount, Bioinformatics: sequence and genome analysis, CSHL Press', 6, 21, NULL, NULL, NULL, NULL),
(61, '2014-12-12', 1, 'Freigegeben', 'SYBI', 'Systembiologie', 'Systems Biology', 'Sommersemester', 1, 'Vorlesung;;', 60, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- aktuelle Entwicklungen in der Systembiologie zu bewerten und einzuordnen\r\n- biologische Objekte in Beziehung zueinander zu stellen und als Gesamtsystem zu\r\ncharakterisieren\r\n- grundlegende Methoden und Datensammlungen der Systembiologie erklären\r\n- Software und Daten problemorientiert auszuwählen', 'Der Kurs umfasst folgende Themen\r\n- Einführung in die Systembiologie\r\n- vom Genotyp zum Phänotyp\r\n- Analyse von Hochdurchsatzdaten\r\n- Modellierung und Modularität\r\n- Regulatorische und metabolische Netzwerke\r\n- Molekulare Interaktionen\r\n- Komplexität und Robustheit zellulärer Systeme\r\n- mathematische Modellierungsmethoden\r\n- Software, Datenbanken und Datenformate', 'Schriftliche Klausur;;', 'deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nS. Eckstein, Informationsmanagement in der Systembiologie, Springer, Berlin\r\nE.Klipp, W.Liebermeister, C. Wierling, A. Kowald, H. Lehrach, R. Herwig, Systems Biology: A\r\nTextbook, Wiley VCH\r\nU. Alon, An Introduction to Systems Biology: Design Principles of Biological Circuits, Chapman and\r\nHall/CRC\r\nZ. Szallasi, J. Stelling, V. Periwal, System Modeling in Cellular Biology: From Concepts to Nuts and\r\nBolts, MIT Press', 3, 1, NULL, NULL, NULL, NULL),
(62, '2014-12-12', 1, 'Freigegeben', 'dummy', 'Vertiefung Datenbankprogrammierung', NULL, 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, '-Die Studierenden kennen weiterführende Konzepte von SQL am Beispiel des Oracle DBMS. -Sie sind in der Lage, die verschiedenen Sprachkonstrukte sicher anzuwenden und komplexe Anfragen selbständig zu formulieren.\r\n-Die Studierenden vertiefen ihre Kenntnisse aus dem Pflichtmodul „Datenbanken“. -Sie kennen die Architektur des Oracle DBMS und können einige Aufgaben der Datenbankadministration übernehmen . \r\n-Die Studierenden erwerben die Kenntnisse und Kompetenzen für die Zertifizierung zum \r\n“Oracle Database SQL Expert', 'SQL und PL/SQL:\r\nRetrieving Data (from single and multiple tables)\r\nRestricting and Sorting \r\nSingle-Row Functions\r\nAggregated Data and Grouping \r\nSubqueries, Set Operators\r\nManipulating Data and large Data Sets \r\nData in Time Zones\r\nHierarchical Retrieval\r\nRegular Expression suppport\r\nManaging Objects and User Access\r\nOracle Stored Procedures with Packages (PL/SQL)\r\nDBMS Structure and Administration: \r\nOracle Database Architecture', 'Mündliche Prüfung;;Vortrag;;', 'deutsch', '- Kemper, A.: „Datenbanksysteme“, Oldenbourg \r\n- O’Hearn, Steve: “SQL Cretified Expert Exam Guide”, 2010, Oracle Press\r\n- Biju, Thomas, Oracle Database 11g Administrator Certified Associate Study Guide, 2009, Oracle Press\r\n- Ahrends, J. et al.: „Oracle 11g Release 2 für den DBA“,2010, Addison-Wesley', 6, 8, NULL, NULL, NULL, NULL),
(63, '2014-12-12', 1, 'Freigegeben', 'ZEBI', 'Zellbiologie', 'Cell Biology', 'Sommersemester', 1, 'Vorlesung;;Seminar;;', 105, 6, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Komplexität des Aufbaus und der Funktion der eukaryontischen Zellen herzuleiten\r\n- die Evolutionsmechanismen zuzuordnen\r\n- die Methoden der Zellbiologie zu vergleichen und zu beurteilen\r\n- die vielen Kompartimente mit ihren spezialisierten Funktionen zu identifizieren\r\n- die Mechanismen des Transports zwischen den Kompartimenten in Bezug zu setzen\r\n- die Mechanismen der Kommunikation zwischen Zellen zu begründen\r\n- die komplexen Netzwerke der Kommunikation und der Stoffwechselwege zu verknüpfen\r\n- die komplexen Vorgänge einer Zelle nachzuvollziehen und die Defekte in diesen Systemen\r\nzu erkennen\r\n- durch einen Seminarvortrag zu beweisen, dass sie zellbiologischen Aspekte nachvollziehen\r\nkönnen\r\n- die mikroskopischen Verfahren zu bewerten', 'Vorlesung: Organisationsprinzipien lebender Systeme\r\nOrganisation der Eukaryontenzelle, sowie Evolutionsgedanken zur Entwicklung vom Prokaryonten\r\nzum Eukaryonten\r\nGrundlagen der Entwicklung vom Einzeller zum Vielzeller\r\nGrundlagen zellbiologischer Methoden\r\nKompartimente in der Zelle, ihre Morphologie und ihre Funktion\r\nTransportmechanismen von „kleinen“ und „großen“ Molekülen aus dem extrazellulären Raum und\r\nzwischen den verschiedenen Kompartimenten\r\nSignalübertragung in der Zelle\r\nPraktikum: verschiedene Mikroskopiertechniken: Phasenkontrast- und\r\nFluoreszenzmikroskopie', 'Schriftliche Klausur;;', 'deutsch', 'Folien zu der Vorlesung\r\nB. Alberts, A. Johnson, J. Lewis, M. Raff, K. Roberts, P. Walter: Molekularbiologie der Zelle, 978-3-\r\n527-32384-8\r\nJ.M. Berg, J.L. Tymoczko, L.Stryer: Biochemie, Elsevier, Spektrum Akademischer Verlag, ISBN 978-\r\n3-8274-1800-5\r\nH. Lodish, A. Berk, S. L. Zipursky, P. Matsudaira, D. Baltimore, J. E. Darnell: Molekulare Zellbiologie,\r\nSpektrum Akademischer Verlag, ISBN 3-8274-1077-0\r\nD. Nelson, M. Cox: Lehninger Biochemie, Springer Verlag, ISBN 978-3-540-68637-8\r\nD. Voet, J. G. Voet, C. W. Pratt: Lehrbuch der Biochemie, Wiley-VCH Verlag, Weinheim, New York,\r\nISBN 973-3-527-32667-9', 6, 1, NULL, NULL, NULL, NULL),
(64, '2014-12-12', 1, 'Freigegeben', 'GENT', 'Gentechnik', 'Genetic Engineering', 'Sommersemester', 1, 'Vorlesung;;Praxisprojekt;;', 90, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Methoden der Gentechnik anzuwenden\r\n- die wichtigen Zielsetzungen und Anwendungsgebiete der Gentechnik zuzuordnen\r\n- Chancen und Gefahren der Gentechnik differenziert zu beurteilen\r\n- aktuelle Entwicklungen der Gentechnik zu verstehen und ihre Relevanz einzuordnen\r\n- gentechnische Methoden praktisch anzuwenden', 'Methoden der Gentechnologie: Isolieren und Bearbeiten von Nukleinsäuren, chemische DNASynthese\r\nund Einsatz von Gen-Sonden, Auftrenn- und Blotting-Verfahren, Polymerase-\r\nKettenreaktion (PCR), DNA-Sequenzierung\r\nDNA-Klonierung und gentechnische Herstellung von Eiweißprodukten\r\nSomatische Gentherapie beim Menschen\r\nGenomanalyse, Genkartierung, Sequenzierung von Genomen, Gendiagnose\r\nBesondere Anwendungsgebiete der Gentechnik in Landwirtschaft und Umweltschutz\r\nPraktikum: Anwendung gentechnischer Methoden im Rahmen von Versuchsansätzen zur Klonierung\r\neines Genkomplexes für Biolumineszenz sowie zur Genomanalyse', 'Schriftliche Klausur;;', 'deutsch', 'Brown: Gentechnologie für Einsteiger. Spektrum Akad. Verlag, 5. Aufl., 2007\r\nBrown: Genome und Gene. Lehrbuch der molekularen Genetik. Spektrum Akad. Verlag, 3. Aufl.,\r\n2007\r\nJahnsohn, Rothhämel: Gentechnische Methoden. Spektrum Akad. Verlag, 5. Aufl., 2012\r\nFolienvorlagen zur Vorlesung, Praktikumsvorschriften', 6, 22, NULL, NULL, NULL, NULL),
(65, '2014-12-12', 1, 'Freigegeben', 'PRAX', 'Praxisphase', 'Practical Course', 'jedes Semester', 12, 'Selbststudium und Konsultationen;;', 435, 1, 'Technische und organisatorische Zusammenhänge in Unternehmen verstehen lernen.\r\nFähigkeit umfassende Arbeiten unter betrieblichen Gegebenheiten eigenständig, im Team oder \r\nleitend durchzuführen.\r\nPraktische Erfahrungen im Berufsfeld der Informatik gewinnen\r\nTheoretisches Wissen aus dem Studium in betrieblichen Projekten praktisch einsetzen können', 'Struktur des Betriebes\r\n- Unmittelbares Arbeitsumfeld\r\n- Arbeitsmittel, -Methoden und -Formen der betrieblichen Arbeit, insbesondere Team- und Einzelarbeit\r\nSpezifische Aufgabenstellung des Studierenden\r\n- Spezifische Lösung und Dokumentation der Aufgabe', 'Vortrag;;Dokumentation;;', 'deutsch', 'Leitbild u. Leitsätze des betreuenden Betriebs\r\nFachliche Quellen im Unternehmen', 15, 8, NULL, NULL, NULL, NULL);
INSERT INTO `Veranstaltung` (`Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `modulbeauftragter`, `KontaktzeitVL`, `KontaktzeitSonstige`, `VoraussetzungLP`, `VoraussetzungInhalte`) VALUES
(66, '2014-12-12', 1, 'Freigegeben', 'BACH', 'Bachelor-Arbeit und Kolloquium', 'Bachelor Thesis', 'jedes Semester', 12, 'Vorlesung;;Übung;;', 345, 1, 'Die Bachelorarbeit ist eine schriftliche Prüfungsarbeit. Sie soll zeigen, dass die Kandidatin oder der \r\nKandidat in der Lage ist, innerhalb einer vorgegebenen Frist ein Problem aus einem Fachgebiet \r\nselbständig nach wissenschaftlichen Methoden zu bearbeiten und die gewonnenen Ergebnisse \r\nverständlich und folgerichtig darzustellen.\r\nIm Kolloquium präsentiert der Studierende die Ergebnisse der Bachelor-Arbeit.\r\nDas Kolloquium dient auch dazu, die Eigenständigkeit der Leistung des Studierenden zu überprü-\r\nfen', 'In Abhängigkeit vom jeweiligen Themengebiet', 'Projektarbeit;;Kolloquium;;', 'deutsch', 'In Abhängigkeit vom jeweiligen Themengebiet', 12, 8, NULL, NULL, NULL, NULL),
(67, '2014-12-12', 1, 'Freigegeben', 'MIBI', 'Mikrobiologie', 'Microbiology', 'Sommersemester', 1, 'Vorlesung;;Übung;;Praxisprojekt;;', 180, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Besonderheiten industrieller Mikroorganismen wiederzugeben\r\n- die Grundlagen von Stammentwicklung und Stammkonservierung zu benennen\r\n- den Ablaufes von Infektionen - Angriff der Bakterien und Abwehr des Wirtes aufzuzählen\r\n- die Prinzipien der Übertragung von infektiösen Partikeln zu nennen\r\n- die Vielfalt der Organismen im Bereich der Mikroorganismen kennenzulernen\r\n- die Bedeutung von Stammbäumen zuzuordnen\r\n- die Systematik der Organismen zu nennen und beschreiben zu können\r\n- die Teilgebiete der Systematik (Taxonomie, Klassifizierung und Nomenklatur) zu\r\ncharakterisieren\r\n- die Grundprinzipien des mikrobiellen Stoffwechsels wiederzugeben\r\n- die Bedeutung von Katabolismus und Anabolismus zuzuordnen sowie deren\r\nthermodynamischen Grundprinzipien zuzuordnen\r\n- die Grundzüge der Regulationsprinzipien des Stoffwechsels zu nennen\r\n- Versuchsprotokolle naturwissenschaftlich darzustellen', 'Vorlesung Mikrobiologie 2 SWS Teil Prof. Steinmüller: 1. Industrielle Mikroorganismen - Suche\r\nnach neuen Wirkstoffen (Screening); Hochleistungs-Mikroorganismen (Stammentwicklung);\r\nKonservierung von Produktionsstämmen (Stammhaltung). 2. Pathogene Mikroorganismen -\r\nNormale Flora; Mechanismen der Pathogenität; Übertragungswege bei Infektionen; Opportunistische\r\nErreger; Beispiele bakterieller Infektionen\r\nVorlesung Mikrobiologie 3 SWS, Teil Prof. Krefft: Kenntnisse zum Aufbau von Viren und Pilzen,\r\nÜberblick zur Systematik der Organismen. Grundlagen zum Stoffwechsel. Prinzipien der\r\nBioenergetik. Einige Stoffwechselwege der Mikroorganismen: Glycolyse und der Katabolismus der\r\nKohlenhydrate, Citratzyklus, Atmungskette, Gärungen. Zu diesen Teil der Vorlesung werden\r\ntheoretische Übungen als Hausarbeiten ausgegeben.\r\nPraktikum Mikrobiologie, 1 SWS, Verständnis zu der Wirkungsweise von Antibiotika,\r\nAgardiffusionstest. Aufbau und Eigenschaften der bakteriellen Zellwand, lysieren Grampositiver und\r\nGramnegativer Keime, Identifizierung von Keimen, prakisch und theoretisch mit Erstellung eines\r\nphylogenetischen Stammbaumes.', 'Schriftliche Klausur;;', 'deutsch', 'Folien zur Vorlesung Teil Krefft und Taschenlehrbuch Biologie Mikrobiologie, Hrsg. Katharina Munk,\r\nThieme Verlag, ISBN: 9783131448613 ;Taschenlehrbuch Biologie Biochemie - Zellbiologie, Hrsg.\r\nKatharina Munk, Thieme Verlag, ISBN 9783131448316; M.T.Madigan & J.M.Martinko, Brock\r\nMikrobiologie, Pearson Studium, ISBN: 978-3-8273-7358-8; Mikrobiologie, Slonczewski, J. L.&\r\nFoster, J. W., Springer Verlag, ISBN 978-3-8274-2909-4 D.Nelson & M.Cox, Lehninger Biochemie,\r\nSpriger Verlag, ISBN: 3-540-41813-X', 9, 1, NULL, NULL, NULL, NULL),
(68, '2014-12-12', 1, 'Freigegeben', 'HAPO', 'Hardwarenahe Programmierung', 'Hardware Oriented Programming', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 25, 'Kenntnis und Anwendung einer hardwarenahen prozeduralen Programmiersprache. Anwendung von \r\nZeigern und Referenzen sowie Abschätzung der Vor- und Nachteile bei konkreten Anwendungsszenarien. Die Studierenden können auf Basis der erlernten Programmiersprache Roboter programmieren, indem sie Sensordaten abrufen, miteinander verknüpfen und verarbeiten und darauffolgend \r\nAktoren ansteuern. Sie können die Beobachtungen und Ergebnisse auf die theoretischen Grundlagen zurückführen und die erprobten Beispiele auf reale Anwendungen übertragen.', '- Syntax der Programmiersprache C/C++ \r\n- Parameterübergabe, Zeiger und Arrays \r\n- Dynamische Datenstrukturen \r\n- C++ Klassen \r\n- Konstruktoren, Destruktoren, Speicher belegen und freigeben \r\n- Multiple Vererbung und Operatoren \r\n- Aufnahme, Filterung und Verknüpfung (Fusion) von Sensordaten \r\n- Aufbereitung von Sensordaten zur Modellbildung und darauffolgenden Ansteuerung von Aktoren \r\n- Erkennung von Fehlregelungen und Korrekturmöglichkeiten', 'Schriftliche Klausur;;', 'deutsch', 'Kerninghan, Ritchie: Programmieren in ANSI C, Hanser Verlag \r\nSchildt:C++ Ent-Packt, MITP-Verlag \r\nBreymann: C++, Einführung und professionelleProgrammierung, Hanser Verlag \r\nThrun/Burgard/Fox: Probabilistic Robotics. MIT Press, 2005.t', 6, 6, NULL, NULL, NULL, NULL),
(69, '2014-12-12', 1, 'Freigegeben', 'BICO1', 'Biochemie 1 und Einführung in die Biotechnik', 'Biochemistry 1 and Introduction to Bioengineering', 'Wintersemester', 1, 'Vorlesung;;Labor;;', 105, 6, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- die Anwendungsgebiete der Biotechnik zu erklären\r\n- die Spezialgebiete bzw. die Vertiefungsmöglichkeiten der Biotechnik zu verstehen und zu\r\nbeschreiben\r\n- die Grundlagen der Biochemie wiederzugeben\r\n- biochemische Reaktionen zuzuordnen\r\n- die Bedeutung von Konfiguration und Konformation für ein Makromolekül zu\r\ncharakterisieren\r\n- den Aufbau eines Proteins zu erklären\r\n- die Methoden zur Aufreinigung von Proteinen aufzuzeigen\r\n- die Funktion von Proteinen und Enzymen zu erklären', 'Vorlesung Biotechnik Einführung: Was ist Biotechnologie? Überblick zu den Teilgebieten der\r\nBiotechnik: Lebensmittelbiotechnik, Enzyme für Haushalt und Technik, Industrielle Biotechnik,\r\nUmweltbiotechnik, Grüne Biotechnik, medizinische Biotechnologie, marine oder aquatische\r\nBiotechnik, analytische Biotechnologie und das Humangenom\r\nVorlesung Biochemie I: Eigenschaften von Biomolekülen; Biochemische Reaktionen;\r\nEigenschaften der Aminosäuren, der Peptide und der Proteine; Grundlegendes Verständnis zur\r\ndreidimensionalen Struktur der Proteine; Proteinkonformationen: Primär-, Sekundär-, Tertiär und\r\nQuartärstrukturen von Proteinen; Funktion von Proteinen und Enzymen; Enzymkinetik\r\nPraktikum Biochemie: Aufreinigung eines Proteins, Nachweis der Reinigung und\r\nAktivitätsbestimmung der Aufreinigungsfraktionen, Enzymkinetik\r\nÜbung Biotechnik: theoretische Ausarbeitung eines kleinen Projekts', 'Schriftliche Klausur;;schriftliche Ausarbeitung;;Projektarbeit;;', 'deutsch', 'Folien zur Vorlesung,\r\nW.J.Thiemann & M.A.Palladino, Biotechnologie, Pearson Studium, ISBN: 978-3-8273-7236-9\r\nR.Renneberg, Biotechnologie für Einsteiger, Spektrum, ISBN: 3-8274-1538-1\r\nM.Wink (Hrsg.) Molekulare Biotechnologie, Wiley-VCH, ISBN: 978-3-527-32655-6\r\nD.Voet, J.G.Voet & C.W.Pratt, Lehrbuch der Biochemie, Wiley-VCH, ISBN:978-3-527-32667-9\r\nD.Nelson & M.Cox, Lehninger Biochemie, Springer, ISBN:3-540-41813-X\r\nJ.M.Berg, J.L.Tymoczko & L. Stryer, Biochemie, Spektrum, ISBN:978-3-8274-1800-5\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nH.R.Horton, L.A. Moran, K.G. Scrimgeour, M.D.Perry & J.D. Rawn, Biochemie, Pearson Studium,\r\nISBN: 978-3.8273-7312-0\r\nA.M.Lesk, An Introduction to Protein Science, Oxford University Press, ISBN: 0 19 926511 9', 6, 28, NULL, NULL, NULL, NULL),
(70, '2014-12-12', 1, 'Freigegeben', 'BICO2', 'Biochemie 2', 'Biochemistry 2', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- Interaktion und Funktion von Makromolekülen (Proteine/DNA/RNA) in Abhängigkeit von\r\nihrer Konformation zu erklären\r\n- dynamische Konformationen der DNA zu charakterisieren\r\n- die Bedeutung der DNA-Polymerasen während der Replikation aufzuzeigen\r\n- die Wichtigkeit von DNA-Reparaturmechanismen für eine mutationsfreie Weitergabe der\r\ngenetischen Information zu analysieren\r\n- Mechanismen der Rekombination zu identifizieren\r\n- Mechanismen der Transkription und Translation in ihrer Komplexität zu begründen', 'DNA-Aufbau; Eigenschaften, Stuktur, Gene und Chromosomen; DNA-Stoffwechsel: Replikation,\r\nReparatur, Rekombination; RNA-Stoffwechsel: Transkription, Processing; Proteinstoffwechsel: Der\r\ngenetische Code, Proteinsynthese', 'Schriftliche Klausur;;', 'deutsch', 'Folien zur Vorlesung,\r\nD.Voet, J.G.Voet & C.W.Pratt, Lehrbuch der Biochemie, Wiley-VCH, ISBN:978-3-527-32667-9\r\nD.Nelson & M.Cox, Lehninger Biochemie, Springer, ISBN:3-540-41813-X\r\nJ.M.Berg, J.L.Tymoczko & L. Stryer, Biochemie, Spektrum, ISBN:978-3-8274-1800-5\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nH.R.Horton, L.A. Moran, K.G. Scrimgeour, M.D.Perry & J.D. Rawn, Biochemie, Pearson Studium,\r\nISBN: 978-3.8273-7312-0', 6, 28, NULL, NULL, NULL, NULL),
(71, '2014-12-12', 1, 'Freigegeben', 'EMA', 'Entwicklung mobiler Anwendungen', 'Mobile Application Development', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden erwerben Kenntnisse zum Entwurf und der Implementierung von Apps für mobile \r\nSysteme. Sie beherrschen den Workflow von der Idee bis zur Bereitstellung einer App. \r\nDie Studierenden lernen die Programmiersprache Objective-C sowie die Entwicklungsumgebung \r\nXCode kennen. Sie verstehen die Grundlagen des User Interface Designs und sind in der Lage diese durch Entwicklung von UI Prototypen anzuwenden. Die Studierenden beherrschen die wichtigsten.\r\nFrameworks zur Erstellung iOS spezifischer Applikationen. Sie lernen die verschiedenen \r\nCross-Plattform-Ansätze (Nativ, Hybrid, Web) und Web Frameworks (Sencha Touch, jQuery Mobile) \r\nkennen und erwerben Fähigkeiten zur Entwicklung mobiler Anwendungen unter Verwendung von \r\nHTML, CSS und JavaScript. Die Studierenden sind mit Technologien im Enterprise Umfeld (EMM, \r\nMEAP, Webservices) vertraut und wissen diese einzuordnen. Zu den zu trainierenden Softskills zählen Teamfähigkeit, Präsentationstechniken, Erschließung von \r\nLiteratur und eigenverantwortliches Arbeiten.Die Studierenden erwerben Kenntnisse zum Entwurf \r\nund der Implementierung von Apps für mobile Systeme. Sie beherrschen den Workflow von der Idee \r\nbis zur Bereitstellung einer App', 'Programmiersprache Objective C \r\n- XCode, Simulator, Instruments, Debugging, Interface Builder \r\n- User Interface Design und Apple Bedienkonzept \r\n- Mock-Up Erstellung mittels XCode Storyboard \r\n- iOS Foundation Framework, Cocoa Touch, Application Lifecycle, Speicherverwaltung \r\n- Entwurfsmuster wie MVC, Delegation, Observer \r\n- Aufbau „Apple Developer Program“ (Zertifikate, Provisionierung)\r\n Persistenz-Schicht Core Data \r\n- Enterprise Technologien (EMM, MEAP, Webservices) \r\n- Multithreading unter iOS (Blocks, Grand Central Dispatch) \r\n- Cross Platform Development (jQuery Mobile, Sencha Touch, PhoneGap, Nativ, Hybrid, Web) \r\n- Eigenständige Entwicklung einer App', 'Projektarbeit;;', 'deutsch', 'Skript zur Vorlesung, \r\nBücher mit Titel: \r\n- Kochan, S.: Programming in Objective-C 2.0, Addison-Wesley Longman, ISBN: 978-0321566157, \r\n2009 \r\n- Hillgas A. ;Fenologio M.: Objective-C Programming: The Big Nerd Ranch Guide, Addison-Wesley, \r\nISBN 978-0321706287, 2011 \r\n- Hillegass A.; Conway J.: iOS Programming: The Big Nerd Ranch Guide, Addison-Wesley, ISBN \r\n978-0321773777, 2011 \r\n- Mark D.: Beginning iOS 6 Development: Exploring the iOS SDK, Apress, ISBN 978-1430245124, \r\n2013 \r\n- Conway J.; Hillegass A.: iOS-Programmierung für iPhone und iPad: Der Big Nerd Ranch-Guide, \r\nAddison-Wesley, ISBN 978-3827330154, 2011.-', 6, 31, NULL, NULL, NULL, NULL),
(72, '2014-12-12', 1, 'Freigegeben', 'EFE', 'Englisch', 'English for Engineers', 'Sommersemester', 1, 'Vorlesung;;', 60, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- Vokabular aus den Bereichen Informationstechnologie, Biologie, Physik, Ingenieurwesen und\r\nWirtschaft einzusetzen\r\n- sprachlichen Mittel zum Beschreiben, Erörtern, Argumentieren, Schildern, logischen Verknüpfen\r\nund Moderieren anzuwenden\r\n- sich Wissen, Vokabular und Strukturen mittels englischer Texte/Artikel anzueignen und\r\ndaraufhin zu kommentieren, weiter- und wiederzugeben, zu evaluieren\r\n- die englische Sprache grammatikalisch richtig zu verwenden', '- Vokabular in oben genannten technischen und ökologischen Bereichen - mittels Fachartikel und\r\nenglischer Originalquellen\r\n- Souveräner schriftlicher und mündlicher Ausdruck durch workshops: academic writing,\r\npresenting, conversation\r\n- Idiomatische Ausdrucksweise\r\n- Sprachrichtigkeit\r\n- Kommunikationstraining – language is a tool', 'Schriftliche Klausur;;Mündliche Prüfung;;', 'englisch', 'aktuelle Lehrbücher Technical English, aktuelle Fachartikel, Pressequellen (e.g.The Guardian, The\r\nIndependent, The New York Times, Scientific American), BBC documentaries etc .', 3, 25, NULL, NULL, NULL, NULL),
(73, '2014-12-12', 1, 'Freigegeben', 'OBIS', 'Ortsbezogene Informationssysteme', 'Location Based Information Systems', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden sollen ... \r\n- Information mit geographischem Bezug aufbereiten, für die Interaktion mit dem Benutzer/der Benutzerin visualisieren (GeoTagging) und die Kommunikation mit einem Web Server realisieren können; dabei kommen Grundlagen der Web-2.0-Programmierung (XHTML, CSS, JavaScript/DOM, \r\nAJAX, Java) und PHP zum Einsatz \r\n- typische GeoDatenFormate (GPX, KML) verstehen und auch mit XSLT verarbeiten können \r\n- entsprechende Anwendungen und Bedienoberflächen konzipieren und auch für mobile Computer \r\nrealisieren können \r\n- eine GeoDatenAnwendung in einer Geodateninfrastruktur konzipieren und realisieren können', 'Konzeption und Realisation typischer Kartendienste unter Einbeziehung mobiler Computer \r\n-Namensdienste im Web \r\n-GeoTagging (mit Google Maps) \r\n-Datenakquisition und -aufbereitung \r\n-Verarbeitung von XML-Formaten (KML, GPX, SVG) \r\n-XSLT-Grundlagen und Anwendungen \r\n-Strukturtransformationen mit XSLT \r\n-API-Programmierung mobiler Computer', 'Vortrag;;schriftliche Ausarbeitung;;', 'deutsch', 'J. Roth: Mobile Computing, dpunkt Verlag, Sept. 2005 \r\n- J. Schiller, A. Voisard (eds), Location-Based Services, Morgan Kaufmann Publishers, Mai 2004 \r\n- A. Küpper: Location-Based Services, John Wiley & Sons, 2005 \r\n- http://code.google.com/intl/de-DE/apis/maps/documentation/mapsdata/developers_guide_java.html \r\nFrederik Ramm, Jochen Topf: OpenStreetMap Die freie Weltkarte nutzen und mitgestalten. lehmanns media. 1, Auflage 2009. ISBN 978-3-86541-320-8t', 6, 11, NULL, NULL, NULL, NULL),
(74, '2014-12-12', 1, 'Freigegeben', 'SEBI', 'Seminar Bioinformatik', 'Bioinformatics Seminar', 'Wintersemester', 1, 'Vorlesung;;Seminar;;', 45, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- verbale, paraverbale und nonverbale Fertigkeiten für eine wirkungsvolle Selbstdarstellung, Rede\r\nund Präsentation einzuordnen\r\n- verschiedener Redeformen zu charakterisieren\r\n- Präsentationen mit verschiedene Medien optisch ansprechend aufzubereiten\r\n- Methoden, um mit Angst und Lampenfieber beim Präsentieren umzugehen, einzuordnen\r\n- Präsentationen zu halten\r\n- komplexe fachlich Zusammenhänge auf Wesentliches zu reduzieren\r\n- Fachdiskussionen zu führen\r\n- Schriftliche Zusammenfassungen zu erstellen', 'Grundlagen der Präsentation:\r\n- gezielter Einsatz von verbalen, paraverbalen und nonverbalen Mitteilungen bei\r\nSelbstdarstellung, Reden, Präsentationen\r\n- Inhaltliche Ausarbeitung verschiedener Redeformen\r\n- Visualisierungsmöglichkeiten und Einsatz verschiedener Medien\r\n- Umgang mit Angst und Lampenfieber bei Präsentationen\r\nSeminar:\r\n- Inhalte werden ausgewählt aus aktuellen Trends in Wissenschaft und Industrie', 'Vortrag;;Durchführung Übung;;', 'deutsch', 'Präsentieren:\r\nAlbert Thiele: Präsentieren Sie einfach, Frankfurter Allgemeine Buch.\r\nWolfgang Mentzel: Rhetorik: Sicher und erfolgreich sprechen, dtv.\r\nJosef W. Seifert: Visualisieren, Präsentieren, Moderieren, Gabal.\r\nAlbert Thiele: Die Kunst zu überzeugen: Faire und unfaire Dialektik, Springer.\r\nElisabeth Bonneau: Stilvoll zum Erfolg: Der moderne Business-Knigge, Hoffmann und Campe.\r\nVera Birkenbihl: Signale des Körpers: Körpersprache verstehen, mvg-Verlag.\r\nSeminar:\r\nFachzeitschriften (Bioinformatics, PloS, BioMedCentral) u.ä.', 3, 1, NULL, NULL, NULL, NULL),
(75, '2014-12-12', 1, 'Freigegeben', 'WIAS', 'Wissenschaftliches Arbeiten und Schreiben', 'Academic research and writing', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 60, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- zu einer vorgegebenen Aufgabenstellung selbständig geeignete wissenschaftlich-technische\r\nMethoden zur Bearbeitung auszuwählen und zu verwenden\r\n- grundlegender Methoden des Lernens, des aktiven Lesens, der Literaturrecherche, des\r\nZeitmanagements und der Selbstorganisation anzuwenden\r\n- eines wissenschaftlich-technischen Text zu erstellen\r\n- geeigneter persönlicher Mechanismen zum Umgang mit Schreibblockaden zu entwickeln und\r\neinzusetzen', 'Der Kurs umfasst folgende Themen\r\n- Grundlagen des Lernvorgangs im Gehirn, individuelle Fähigkeiten des Wissenserwerbs\r\n- Literaturrecherche\r\n- aktives Lesen von Fachliteratur (z.B. „Querlesen“)\r\n- Aufarbeiten von Gelesenem (z.B. Exzerpieren, Mind Maps)\r\n- Arbeits- und Zeitplanung\r\n- strukturiertes Schreiben (z.B. Abbau von Schreibblockaden)\r\n- Zitieren, Literaturverwaltung (z.B. BibTex)\r\n- Charakteristika wissenschaftlich-technischer Texte\r\n- Aufbau von Bachelor-, Master- und Doktorarbeiten\r\n- Sicherung guter wissenschaftlicher Praxis (entsprechend DFG)', 'schriftliche Ausarbeitung;;', 'deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nH. Esselborn-Krumbiegel: Von der Idee zum Text - Eine Anleitung zum wissenschaftlichen\r\nSchreiben, Schöningh UTB\r\nN. Franck & J. Stary: Die Technik wissenschaftlichen Arbeitens, Schöningh UTB\r\nP. Schlager & M. Thibud: Wissenschaftlich mit Latex arbeiten, Pearson Verlag\r\nP. Rechenberg: Technisches Schreiben (nicht nur) für Informatiker, Hanser Verlag\r\nO. Kruse: Keine Angst vor dem leeren Blatt - ohne Schreibblockaden durchs Studium, campus\r\nconcret\r\nH. F. Ebel & C. Bliefert: Bachelor-, Master- und Doktorarbeit - Anleitungen für den\r\nnaturwissenschaftlich-technischen Nachwuchs, Wiley-VCH\r\nC. Grüning: Garantiert erfolgreich lernen - Wie Sie Ihre Lese- und Lernfähigkeit steigern, Verlag\r\nGrüning\r\nK. Samac, M. Prenner, H. Schwetz: Die Bachelorarbeit an Universität und Fachhochschule: Ein\r\nLehr- und Lernbuch zur Gestaltung wissenschaftlicher Arbeiten, facultas wuv UTB Stuttgart\r\nF. Vester: Denken, Lernen, Vergessen, dtv', 3, 1, NULL, NULL, NULL, NULL),
(76, '2014-12-12', 1, 'Freigegeben', 'MOVS', 'Mobile und verteilte Systeme', 'Mobile and Distributed Systems', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 25, 'Kenntnis spezifischer Problem und zu erreichender Ziele bei der Integration von Systemen \r\n- Kenntnis und Fähigkeit zur Anwendung verschiedener Integrations-Pattern und deren direkter und indirekter Anwendung in Technologien und Lösungen. \r\n- Kenntnis der wichtigsten Technologien und Architekturen für verteilte Anwendungen mit mobilen Endgeräten und derer spezifischen Vor- und Nachteile. \r\n- Fähigkeit, bei gegebener Aufgabenstellung/Szenario eine begründete Empfehlung für die technologische \r\nArchitektur aussprechen zu können, inklusive eines qualifizierten Katalogs nutzbarer Frameworks. \r\n- Erlernen des praktischen Umgangs mit Technologien (Middleware) und Konzepten (Architekturen) zur \r\nIntegration von verteilten Anwendungen und Integration von mobilen Endgeräten anhand von kleinen Beispielen', 'Verteilung, Synchronisation und Kooperation von Anwendungen und Diensten auf Systemebene, insbesondere bei den am weitesten verbreiteten mobilen Systemen. \r\n- Integration-Patterns für Verteilte Systeme- Konzepte (Synchron, Asynchron, Proxy) und Middleware-Technologien zur Integration von Informationssystemen. Eigenschaften von Verteilten Systemen (Charakteristiken, Konsistenz, Replikation, Fault-Tolerance) und \r\nZiele der Umsetzung (Loose Kopplung, Flexibilität). \r\n- Systemarchitekturen und Technologien zur Umsetzung von verteilten Informationssystemen (P2P, GRID, \r\nSOA, REST, CLOUD) und deren Anwendbarkeit auf mobile Systeme', 'Schriftliche Klausur;;', 'deutsch', 'Tanenbaum, Andrew. Distributed Systems - Principles and Paradigms, 2nd edition. Pearson Prentice Hall. \r\n2007 \r\nSchill, Alexander;Springer, Thomas: Verteilte Systeme: Grundlagen und Basistechnologien. Springer-Verlag. \r\nHeidelberg. 2012 \r\nMeier, Reto: Professional Android 4 Application Development. John Wiley & Sons. 2012.', 6, 4, NULL, NULL, NULL, NULL),
(77, '2014-12-12', 1, 'Freigegeben', 'MICR', 'Microarrayanalyse mit R', 'Microarray analysis using R', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- grundlegende Methoden zur Analyse von Microarraydaten in der medizinischen Diagnostik\r\neinzuordnen und anzuwenden\r\n- die gesamte Verarbeitungskette ausgehend von der Bildverarbeitung bis zur medizinischen\r\nDiagnose zu beschreiben\r\n- selbständig kleinere Programme in der statistischen Programmiersprache R zu schreiben\r\n- vorhandene Programmpakete (R, Bioconductor) anzuwenden\r\n- statistische Methoden zur Datenanalyse auszuwählen und deren Ergebnisse zu interpretieren.', 'Der Kurs umfasst folgende Themen\r\n- Einführung in die medizinische Diagnostik mit Microarrays und Expressionsdaten\r\n- Einführung in Software zur Erkennung und Verarbeitung von Microarraybilddaten\r\n- Durchführung von linearer und nicht-linearer Regression zur Korrektur experimenteller Artefakte\r\n- Durchführung von Normalisierungen, um verschiedene Experimente vergleichbar zu machen\r\n- Messung und Bewertung von Variablilität in biologischen Daten\r\n- Analyse von Beziehungen zwischen Genen, Geweben, Behandlungen, Experimenten usw.\r\n- Reduktion großer Datenmengen, Auswahl relevanter Daten\r\n- Umgang mit (zu kleinen) Stichproben, Bootstrapping\r\n- Distanzen und Korrelationskoeffizienten\r\n- Clustering und Klassifikation, Grundlagen des Data Mining\r\n- Visualisierung von Ergebnissen (Boxplot, Heat-Map, Dendrogramm usw.)', 'Schriftliche Klausur;;Projektarbeit;;', 'deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nBärlocher, F.: Biostatistik. Praktische Einführung in Konzepte und Methoden, Thieme, 2008\r\nStekel, D.: Microarray Bioinformatics, Cambridge University Press, 2003\r\nSpeed, T. (Hrsg.): Statistical Analysis of Gene Expression Microarray Data, Chapman & Hall/CRC,\r\n2003\r\nSachs, L. & Hedderich, J.: Angewandte Statistik - Methodensammlung mit R, Springer-Verlag, 2009\r\nMount, D.: Bionformatics - Sequence and Genome Analysis, CSHL Press, 2.Auflage, 2004\r\nAdler, J.: R in a Nutshell, O’Reilly, 2010\r\nLogan, M.: Biostatistical Design and Analysis Using R, John Wiley & Sons, 2010\r\nStatistische Programmiersprache R (http://www.r-project.org/)\r\nBioconductor – Sammlung von Softwarepaketen zur Analyse biologischer Daten mit R\r\n(http://www.bioconductor.org/)', 6, 1, NULL, NULL, NULL, NULL),
(78, '2014-12-12', 1, 'Freigegeben', 'CIBO', 'Current Bioinformatics', 'Current Bioinformatics', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- aktueller Probleme und Lösungsverfahren aus der Bioinformatik zu bewerten\r\n- umfassende Bioinformatikprobleme zu analysieren und Lösungen zu skizzieren\r\n- in Fachliteratur zu recherchieren\r\n- existierende Bioinformatiksysteme zu analysieren und ihre Stärken und Schwächen zu\r\nbeurteilen\r\n- im Team Bioinformatikfragestellungen zu bearbeiten\r\n- aktuelle Resultate aus Forschung und Entwicklung zu beurteilen und zu präsentieren', 'Die Lehrinhalte werden jeweils nach dem aktuellen Stand der Forschung und Entwicklung zusammengestellt.\r\nBeispiele:\r\nAutomatische Funktionsannotation\r\nDatenanalyse in der Medizinischen Diagnostik\r\nExperimentelle Bioinformatik\r\nAnalyse von Next-Generation-Sequencing-Daten', 'Vortrag;;Projektarbeit;;', 'englisch', 'OpenAccess-Zeitschriften aus der Public Library of Science (PLoS), BioMedCentral (z.B.\r\nBioMedCentral Bioinformatics), Nature, Science, Bioinformatics, Nucleic Acids Research usw', 6, 1, NULL, NULL, NULL, NULL),
(79, '2014-12-12', 1, 'Freigegeben', 'NEUR', 'Neuronale Netze', 'Neural Networks', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 60, 35, '- Beherrschen der grundlegenden Funktionsweise neuronaler Netze\r\n- Verständnis der verschiedenen Lernverfahren mit ihren Vor- und Nachteilen\r\n- Verständnis der notwendigen Datenaufbereitung und Versuchsplanung\r\n- Kennenlernen der Beurteilung trainierter Netze\r\n- Überblick über Anwendungsbereiche der verschiedenen Netztypen', 'Netzmodelle: Schwellenwertelement, Perzeptron, vorwärtsgerichtete Netze, sensorische und\r\nmotorische Karten.\r\nLernverfahren: Hebbsches Lernen, Gradientenabstieg, Levenberg-Marquardt\r\nBeurteilung der Netze und Versuchsplanung\r\nAnwendungen: Klassifizierungen, Wegeoptimierung, Funktionsapproximation, Prozesskontrolle und\r\n-optimierung, Erkennen von Molekularstrukuren', 'Schriftliche Klausur;;Mündliche Prüfung;;', 'deutsch', 'Skript neuronale Netze in elektronischer Form\r\nRojas, R.: Neuronal Networks. Springer, New York, 1996. ISBN 3-540-60505-3.\r\nZupan, J. and J. Gasteiner: Neuronal Networks in Chemistry and Drug Design. Wiley VCH,\r\nWeinheim, 1999. ISBN 3-527-29779-0', 3, 19, NULL, NULL, NULL, NULL),
(80, '2014-12-12', 1, 'Freigegeben', 'EVOL', 'Evolutionäre Algorithmen', 'Evolutionary Algorithms', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 60, 35, '- Überblick über klassische Optimierungsaufgaben\r\n- Beherrschen des Mutations-Selektions-Verfahrens, sowie der Simulated-Annealing-, der\r\nThreshold -Accepting - und der Sintflut-Methode\r\n- Verständnis der Genetischen Operationen\r\n- Fähigkeit zur Anwendung der Genetischen Algorithmen und der Genetischen Programmierung\r\n- Überblick über Evolutionsstrategien', 'Klassische Optimierungsverfahren\r\nMutations-Selektions-Verfahren\r\nGenetische Algorithmen\r\nEvolutionsstrategien\r\nGenetische Programmierung', 'Schriftliche Klausur;;', 'deutsch', 'Kinnebrock, Werner: Optimierung mit genetischen und selektiven Algorithmen, ISBN 3-486-22697-5\r\nLeach, Andrew A.: Molecular Modelling. ISBN 0-582-38210-6.\r\nMerkl, Rainer und Waack, Stephan: Bioinformatik Interaktiv. ISBN 3-527-30662-5.\r\nSteger, G.: Bioinformatik. Birkhäuser, Basel, 2003. ISBN 3764369515.\r\nWeicker, K.: Evolutionäre Algorithmen. Teubner, Stuttgart, 2002. ISBN 3-519-00362-7.', 3, 19, NULL, NULL, NULL, NULL),
(81, '2014-12-12', 1, 'Freigegeben', 'PROFI', 'Individuelle Profilbildung', 'Individual Profiling', 'wechselnd', 1, 'Selbststudium und Konsultationen;;', 150, 1, 'Das Wahlfach zielt auf die individuelle Profilbildung der Studierenden. Sie sollen im Rahmen einer\r\nfrei definierten Aufgabe zeigen, dass sie komplexe Probleme mit begrenzter Unterstützung durch\r\nden Betreuer weitgehend selbstständig lösen können. Es wird erwartet, dass die Studierenden sich\r\neigenständig in die erforderlichen Techniken zur Lösung des gestellten Problems einarbeiten. Die zu\r\nbearbeitenden Probleme sollen so gestellt sein, dass sie nicht komplett mit Mitteln aus Pflichtvorlesungen\r\ngelöst werden können. .', 'Die Inhalte bilden aktuelle Gebiete der Informatik, Bioinformatik oder Biotechnik, in denen sich die\r\nStudierenden vertiefen wollen. Die Wahl des Themas erfolgt im Dialog zwischen Studierenden und\r\nHochschullehrer.', 'Projektarbeit;;', 'deutsch', 'Bücher zum jeweiligen Themengebiet', 6, 1, NULL, NULL, NULL, NULL),
(82, '2014-12-12', 1, 'Freigegeben', 'MOBU', 'Mobile Business', 'Mobile Business', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 105, 25, 'Die Studierenden kennen das Spektrum der vorhandenen technologischen Möglichkeiten und können diese in Bezug setzen zu den aktuellen Geschäftsmodellen des Mobile Computing. Sie kennen \r\nnationale und internationale Unterschiede bei den Angeboten sowie Sie das gesamte Spektrum der \r\nWertschöpfungsmöglichkeiten anhand von Beispielen zu bewerten wissen', 'Introduction to Mobile Business \r\n - Infrastrukturen mobiler Kommunikationssysteme \r\n - Kabellose (Internet) orientierte Infrastrukturen und Protokolle \r\n - Mobile Kommunikationsdienste. \r\n - Smartcards und deren Anwendungen im Mobile Business \r\n - Mobile Endgeräte: Typen und Einsatzspektrum \r\n - Konzepte für Betriebssysteme Mobiler Endgeräte \r\n - Marktüberblick - Betriebssysteme für mobile Endgeräte und Sicherheitsaspekte. \r\nÖkonomische Grundlagen \r\n - Electronic Business vs. Mobile Business. \r\n - Marktstrukturen und Wertschöpfung \r\n - Geschäftsmodelle \r\n - Mobile Marketing \r\n - nationale und internationale Dienste \r\n - Akzeptanz- und Erfolgsfaktoren im Mobile Business \r\n - Sicherheitsanforderungen und Infrastrukturen \r\n - rechtliche Grundlagen \r\n - Bewertung und Zukunftsperspektiven Beispiele mobiler Business Anwendungen \r\n- Vorstellung verschiedener Anwendungen im B2B und B2C Bereich \r\n- Darstellung der spezifischen ökonomischen Eigenschaften und Wertschöpfung.', 'Schriftliche Klausur;;', 'deutsch', 'Bauer, Dirks, Bryant: Erfolgsfaktoren des Mobile Marketing. Springer. 2008. \r\nTurowski, Klaus; Pousttvhi, Key: Mobile Commerce: Grundlagen und Techniken. Springer. 2003.\r\nLogara, Tomislav: M-Business kompakt: Grundlagenwissen zu Kommunikationstechnologien, Endgeräten, Anwendungen und Mobile Security, 2008.', 6, 5, NULL, NULL, NULL, NULL),
(83, '2014-12-12', 1, 'Freigegeben', 'BICO3', 'Biochemie 3', 'Biochemistry 3', 'Sommersemester', 1, 'Vorlesung;;', 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Grundprinzipien der Genregulation herzuleiten\r\n- die Regulation der Genexpression zu analysieren\r\n- die Methoden der Gentherapie zu diskutieren', 'Regulation der Genexpression; Gentherapie; Aktuelle ausgewählte Themen der Biochemie', 'Schriftliche Klausur;;schriftliche Ausarbeitung;;', 'deutsch', 'Folien zur Vorlesung,\r\nD.Voet, J.G.Voet & C.W.Pratt, Lehrbuch der Biochemie, Wiley-VCH, ISBN:978-3-527-32667-9\r\nD.Nelson & M.Cox, Lehninger Biochemie, Springer, ISBN:3-540-41813-X\r\nJ.M.Berg, J.L.Tymoczko & L. Stryer, Biochemie, Spektrum, ISBN:978-3-8274-1800-5\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nH.R.Horton, L.A. Moran, K.G. Scrimgeour, M.D.Perry & J.D. Rawn, Biochemie, Pearson Studium,\r\nISBN: 978-3.8273-7312-0\r\naktuelle englische Artikel zu den Themen', 3, 28, NULL, NULL, NULL, NULL),
(84, '2014-12-12', 1, 'Freigegeben', 'MIBI2', 'Mikrobiologie 2', 'Microbiology 2', 'Wintersemester', 1, 'Vorlesung;;Seminar;;', 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die spezielle Stoffwechselleistung der Mikroorganismen zu erklären\r\n- die Vielfalt der Stoffwechselwege der Mikroorganismen in Abhängigkeit des Lebensraumes\r\nzu identifizieren\r\n- komplexe und aktuelle Stoffwechselleistungen im Vortrag zu präsentieren', 'Spezielle mikrobiologische Stoffwechselwege:\r\nZellwand Biosynthese, Sporenbildung, Chemolithotropie, Anaerobe Atmung, spezielle aktuelle\r\nKapitel des mikrobiellen Stoffwechsels', 'Vortrag;;', 'deutsch', 'Folien zur Vorlesung\r\nTaschenlehrbuch Biologie Mikrobiologie, Hrsg. Katharina Munk, Thieme Verlag, ISBN:\r\n9783131448613\r\nG.Fuchs (Hrsg.) Allgemeine Mikrobiologie, Thieme Verlag, ISBN: 978-3-13-444608-1\r\nM.T.Madigan & J.M.Martinko, Brock Mikrobiologie, Pearson Studium, ISBN: 978-3-8273-7358-8\r\nJ.L.Slonczewski, J.W.Foster & K.M.Gillen, Microbiology, An Evolving Science, Norton, ISBN: 978-0-\r\n393-97857-5\r\nD.Nelson & M.Cox, Lehninger Biochemie, Spriger Verlag, ISBN: 3-540-41813-X\r\naktuelle englische Artikel zu den Themen', 3, 1, NULL, NULL, NULL, NULL),
(85, '2014-12-12', 1, 'Freigegeben', 'ANDR', 'Mobile Anwendungen mit Android', 'Android Development', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden erwerben Kenntnisse über die Entwicklung mobiler Anwendungen mit dem Android Framework. \r\nSie können Anwendungen (APPs) ausgehend von Anforderungen konzipieren und unter Nutzung \r\ndes aktuellen Android SDK umsetzen. \r\nDie Studierenden lernen selbständig Aufgabenstellungen in einer Gruppe innerhalb vorgegebenen \r\nRahmenbedingungen wie Funktionale Anforderungen und verfügbares Zeitbudget zu entwickeln. Sie \r\nsind in der Lage die notwendigen Werkzeuge und Techniken auszuwählen und einzusetzen. \r\nDie Studierenden vertiefen ihre Kenntnisse zu Softwareschnittstellen und Softwaretests', '- Konzepte und technische Grundlagen der Programmierung mobiler Endgeräte \r\n- Entwicklungsschritte mobiler Applikationen \r\n- Software Plattform Android \r\n- GUI-Programmierung für mobile Geräte \r\n- Persistenz und mobile Datenbanken \r\n- Software-Komponenten in Android \r\n- Threads, Server-Prozesse, Benachrichtigungen \r\n- Entwicklung von Anwendungen mit Ortsbezogenheit \r\n- Netzwerkprogrammierung für mobile Geräte \r\n- Mobiles Internet und seine Anwendungen \r\n- Sicherheit mobiler Anwendungen..', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung, \r\nBücher mit Titel: \r\n- Fuchß T.: Mobile Computing - Grundlagen und Konzepte für mobile Anwendungen, Hanser, ISBN \r\n978-3-446-22976-1, 2009 \r\n- Mosemann H., Kose M.: Android, ISBN 978-3-446-41728-1, 2009 \r\n- Meier R.: Professional Android 2 Application Development, John Wiley & Sons, ISBN 978-\r\n0470565520, 2010 \r\n- Becker A., Pant M.: Android 2. Grundlagen der Programmierung, dpunkt Verlag, ISBN: 978-3-\r\n89864-677-2, 2010 \r\nKünneth T.: Android 3: Apps entwickeln mit dem Android SDK, Galileo Computing, ISBN: 978-\r\n3836216975, 2011 \r\nGarenta M.: Einführung in die Android-Entwicklung, O''Reilly, ISBN: 978-3868991147, 2011.', 6, 11, NULL, NULL, NULL, NULL),
(86, '2014-12-12', 1, 'Freigegeben', 'GGEN', 'Grüne Gentechnik', 'Plant Biotechnology', 'Sommersemester', 1, 'Vorlesung;;', 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- Risiko-Evaluierung transgener Pflanzen zu debattieren\r\n- Anwendungsbereiche transgener Pflanzen herzuleiten\r\n- Transformationstechniken zu erklären\r\n- Lösungsvorschläge für die Anwendung transgener Pflanzen wissenschaftlich zu erarbeiten\r\n- epigenetische Regulationsvorgänge zu verstehen', 'Anbautechnischer und gesetzlicher HIntergrund der Produktion mit gentechnisch veränderten\r\nPflanzen\r\nMorphologie und Systematik der Pflanzen\r\nPflanzenentwicklung\r\nGewebekultur als Werkzeug der Gentechnik\r\nTransformationstechniken (Agrobakterientransfer, Partikelbeschuss)\r\nDesign und Anaqlyse transgener Pflanzen\r\nPhytopathologie mit Schwerpunkt Etablierung rekombinanter Schaderreger-Resistenzen (Viren,\r\nPilze, Bakterien, Insekten)\r\nPflanzenviren\r\nGrundlagen Epigenetics\r\nMolecular Farming', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung,\r\nBücher-Empfehlung:\r\nPlant Biotechnology: The Genetic Manipulation of Plants, Slater, Scott and Fowler, Paperback: 372\r\npages, Publisher: Oxford University Press, USA; 2 edition (March 23, 2008), Language: English,\r\nISBN-10: 0199282617 ".\r\nPlant Biotechnology and Genetics: Principles, Techniques and Applications. C. Neal Stewart Jr.\r\nHardcover: 374 pages, Publisher: Wiley-Interscience (June 2, 2008), Language: English, ISBN-10:\r\n0470043814”', 3, 27, NULL, NULL, NULL, NULL),
(87, '2014-12-12', 1, 'Freigegeben', 'KLIF', 'Angewandte Klinische Forschung in der Biotechnologie', 'Clinical Research', 'Wintersemester', 2, 'Vorlesung;;', 120, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Grundlagen und Methoden der klinischen Forschung zur Zulassung von biotechnologischen\r\nProdukten und Medizinprodukten einzuordnen\r\n- den vollen Ablauf einer klinischen Erprobung zu verstehen\r\n- ein Verständnis für die praktische Herangehensweise an ein klinisches Forschungsprojekt zu\r\nentwickeln\r\n- den gegebenen gesetzlichen und ethischen Rahmen der Durchführung klinischer\r\nStudienprojekte am Menschen und die dafür notwendigen Dokumente und Voraussetzungen\r\naufzuzeigen\r\n- die Grundlagen der GMP anzuwenden\r\n- die gegebenen gesetzlichen und ethischen Rahmen der Herstellung von Arzneimitteln und\r\nMedizinprodukten einschließlich der dafür notwendigen Dokumente und Voraussetzungen\r\neinzuordnen', 'Grundlagen der klinischen Forschung\r\nrechtliche und ethische Rahmenbedingungen\r\nGCP (Gute Klinische Praxis)\r\nVerantwortlichkeiten im Rahmen klinischer Studien\r\nPraktische Studiendurchführung\r\nInhalte des Studienprotokolls\r\nInhalte der Prüfarztinformation\r\nEthikanträge und Behördenmeldungen\r\nMonitoring klinischer Prüfungen\r\nDatenmanagement\r\nBiometrie\r\nMethoden und Techniken der klinischen Forschung\r\nAnforderungen an QM-Systeme\r\nAufbau von QM-Systemen\r\nISO 13485\r\nISO 9001\r\nGrundlagen für die Herstellung von Arzneimitteln und Medizinprodukten\r\nBesondere Anforderungen an die Hygiene im GMP', 'Schriftliche Klausur;;', 'deutsch', 'Gesetzliche Regelungen (Arzneimittelgesetz)\r\nISO 9001:2008\r\nISO 13485:2003\r\nGood Clinical Practice Guidlines Friedman/Furberg/Demets: Fundamentals of Cllinical Trials, Springer-Verlag 1998\r\nCleophas: Statistics Applied to Clinical Trials; Kluwer-Academic-Publishers\r\nGute Hygiene Praxis; Pharma Technologie Journal (2. Auflage), ISSN 0931-9700. Concept,\r\nHeidelberg', 6, 26, NULL, NULL, NULL, NULL),
(88, '2014-12-12', 1, 'Freigegeben', 'AMOS', 'Autonome Mobile Systeme', 'Autonomous Mobile Systems', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden erwerben breite Kenntnisse über die Autonome Mobile Systeme und deren technische Realisierung.Besonders Aktoren, Sensoren Zustandsfilter, Lokalisierung und Kartierung stehen dabei im Mittelpunkt.', 'Sensoren: Grundlagen, Sensoren zur Positionsbestimmung, Sensoren zur \r\nUmgebungserfassung, Sensordatenverarbeitung \r\n‐	Aktoren/Aktuatoren, Kinematik, Inverse Kinematik, Arbeitsraum, \r\nKonfigurationsraum \r\n‐	Bayes Filter, Kalman Filter, Erweiterter Kalmanfilter, UKF \r\n‐		Scanmatching: Korrespondenzproblem, Bestimmung der Transformation: \r\nICP (Iterative closest point), Idc (Iterative Dual Correspondences),IMRP \r\n(IterativeMatching-Range-Points), MbIcp (Metric Based Iterative Closest \r\nPoints) \r\n‐.	Bildverarbeitung, Filter, Kantenextraktion, Harris Corner, Stereo, \r\nKalibrierung, SIFT \r\n‐	Lokalisation: Markov-Lokalisation. Monte Carlo-Lokalisation, Partikel Filter \r\n‐	Karten, Mapping, (Prob.) SLAM, Graph SLAM, Schleifenschluss \r\n‐	Robotik Kontrollarchitekturen: Lose gekoppelte Systeme, ROS \r\n‐	Planung und Exploration: Dijkstra, A*, Next-Best-View, Frontier based \r\nexploration, Path transform, Exploration Transform.', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung, \r\nBücher mit Titel: \r\nPaul Besl and Neil McKay. A method for registration of 3-d \r\nshapes. IEEE Transaction on Pattern Analysis and Machine \r\nIntelligence, 14(2):239–256, 1992. \r\nEdsger. W. Dijkstra. A note on two problems in connexion with \r\ngraphs. In Numerische Mathematik, volume 1, pages 269–271. \r\nMathematisch Centrum, Amsterdam, The Netherlands, 1959. \r\nGregory Dudek and Michael Jenkin. Computational principles of \r\nmobile robotics. Cambridge Univ. Press, 2000\r\nMiguel Angel Garc´ıa. Modelling built environments from large \r\nrange images using adaptive triangular meshes. 8th \r\nInternational Symposium on Intelligent Robotic Systems, \r\npages 23–29, jul 2000. \r\nHéctor H. Gonzáles-Banos and Jean-Claude Latombe. Navigation \r\nstrategies for exploring indoor environments. The International \r\nJournal of Robotics Research, 2002.', 6, 11, NULL, NULL, NULL, NULL),
(89, '2014-12-12', 1, 'Freigegeben', 'GIPF', 'Giftige Inhaltsstoffe in Pflanzen', 'Toxic Ingredients in Plants', 'Sommersemester', 1, 'Vorlesung;;', 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- giftige Pflanzeninhaltsstoffe in chemische Stoffklassen einzuordnen\r\n- Anzucht, Vermehrung und Hauptinhaltsstoffe der Pflanzen zu beschreiben\r\n- die besprochenen Pflanzen geschichtlich und ethnologisch-medizinisch zuzuordnen\r\n- Symptome bei Vergiftungen mit Pflanzen zu identifizieren', 'Pflanzeninhaltsstoffe mit Giftwirkung klassifizieren\r\nGiftklassen\r\nWirkungsmechanismen bei Giften\r\nheimische Giftpflanzen\r\nEthnobotanik und Ethnomedizin\r\nAnzucht diverser Giftpflanzen, Extraktion einiger Inhaltsstoffe\r\nAufklärung von Wirkungsmechanismen', 'Schriftliche Klausur;;', 'deutsch', 'Roth, Daunderer, Kormann, Gift-Pflanzen-Gifte; NIKOL Verlagsgesellschaft mbH & Co. KG\r\nHausen, Vieluf, Allergiepflanzen; NIKOL Verlagsgesellschaft mbH & Co. KG\r\nNeuwinger, African Ethnobotany; Chapman & Hall, ISBN 3-8261-0077-8', 3, 24, NULL, NULL, NULL, NULL),
(90, '2014-12-12', 1, 'Freigegeben', 'BIOT1', 'Biotechnologie 1', 'Biotechnology 1', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 105, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- grundlegende Techniken biotechnologischer Verfahren zuzuordnen\r\n- Optimierungsmethoden von Verfahren aufzuzeigen\r\n- Methoden der Modellierung biotechnologischer Prozesse zu erklären\r\n- die Methoden der Zellimmobilisierung aufzuzeigen\r\n- Sicherheitsaspekte in Labor und Produktion anzuwenden\r\n- das GMP-Konzept (Good Manufacturing Practice) zu beschreiben\r\n- Kostenaspekte biotechnologischer Produktionen in Bezug zu setzen', 'Medienoptimierung\r\nProzessoptimierung\r\nModellbildung\r\nZell-Immobilisierung\r\nAufarbeitung\r\nQualitätskontrolle\r\nSicherheit und Auflagen\r\nDokumentation\r\nGMP\r\nKosten\r\nPraktikum zur Medienoptimierung', 'Schriftliche Klausur;;', 'deutsch', 'Crueger, W.;Crueger,A.: Biotechnologie - Lehrbuch der angewandten Mikrobiologie; R.Oldenbourg\r\nChmiel, H.: Bioprozeßtechnik Bd I und II; G.Fischer Verlag\r\nClark, D.P., Pazdernik, N.J.; Molekulare Biotechnologie - Grundlagen und Anwendungen, Spektrum\r\nAkademischer Verlag', 6, 1, NULL, NULL, NULL, NULL),
(91, '2014-12-12', 1, 'Freigegeben', 'WIAP', 'Mobile Anwendungen für Microsoft Windows', 'Windows Phone Development', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden erwerben Kenntnisse über die Entwicklung mobiler Anwendungen für Windows \r\nGeräte. \r\nSie können Anwendungen (APPs) ausgehend von Anforderungen konzipieren und unter Nutzung \r\ndes aktuellen Visual Studio umsetzen. Insbesondere können Sie die Einsatzbereiche der verschiedenen von Microsoft bereitgestellten Werkzeuge, APIs und Plattformen einschätzen und selbständig \r\nentscheiden bei welcher Aufgabenstellung welche Technologien einzusetzen sind. \r\nDie Studierenden lernen selbständig Aufgabenstellungen in einer Gruppe innerhalb vorgegebenen \r\nRahmenbedingungen zu entwickeln. \r\nDie Studierenden vertiefen ihre Kenntnisse zu Softwareschnittstellen und Softwaretests', '- Konzepte und technische Grundlagen der Programmierung von Microsoft Apps \r\n- Gegenüberstellung Windows- vs. Windows-Phone-Plattform \r\n Übersicht über die jeweiligen APIs, Sprachen und Einsatzszenarien \r\n- Software Visual Studio \r\n- Windows Phone Apps entwickeln für und mit: \r\n Windows Runtime \r\n .Net \r\n Native \r\n- Windows-Apps entwickeln für und mit: \r\n WindowsRT \r\n HTML&JavaScript \r\n XAML & C#/VB/C++ \r\n DirectX & C++ \r\n- Nutzung von Contracts: Search & Share \r\n- Daten-Persistenz und App-Life-Cycle \r\n-Einbinden von Devices und Sensoren \r\n- Test und Vertrieb von Apps', 'Schriftliche Klausur;;', 'deutsch', 'Skript zur Vorlesung, \r\nBücher mit Titel: \r\n- A. Whitechapel, S. McKenna: Windows Phone 8 Development Internals, Microsoft Press, 2012 \r\n- R. Ehlert, G. Woiwode, J. Debus: Windows Phone 8, Grundlagen und Praxis der App-Entwicklung, \r\ndpunkt.verlag, 2013 \r\n- L.Regnicoli, P. Pialorsi, R. Brunetti: Building Windows 8 Apps with Microsoft Visual C++, Microsoft \r\nPress 2013 \r\n- L.Regnicoli, P. Pialorsi, R. Brunetti: Building Windows 8 Apps with Microsoft Visual C# and Visual \r\nBasic, Microsoft Press 2013 \r\n- Kraig, Brockschmidt: Programming Windows 8 Apps with HTML, CSS and JavaScript, Microsoft \r\nPress2012 .', 6, 6, NULL, NULL, NULL, NULL),
(92, '2014-12-12', 1, 'Freigegeben', 'PFAL1', 'Proteinfaltung 1', 'Protein folding 1', 'Sommersemester', 1, 'Vorlesung;;', 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Theorien physikalischer Strukturbestimmungsmethoden zu beschreiben und diese konkret\r\nzu bewerten\r\n- Faltungspfade zu diskutieren und die Folgerungen aus Fehlfaltungen von Proteinen\r\neinzuschätzen', 'Ableitung grundlegender Struktureigenschaften von Biopolymeren\r\nRöntgenstrukturanalyse\r\nNMR- und IR – Spektroskopie\r\nZelleigene Faltungshilfen\r\nFehlfaltungen und ihre medizinische Relevanz', 'Schriftliche Klausur;;', 'deutsch', 'Aktuelle Publikationen des Fachgebietes', 3, 24, NULL, NULL, NULL, NULL),
(93, '2014-12-12', 1, 'Freigegeben', 'PFAL2', 'Proteinfaltung 2', 'Protein folding 2', 'Sommersemester', 1, 'Vorlesung;;', 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- anhand der Grundlagen der Polymerchemie und des physikalischen Verhaltens von Proteinen\r\nin gelartigen Umgebungen durch Analogieschlüsse aus Aminosäurensequenzen Sekundärund\r\nTertiärstrukturvorhersagen zu bewerten\r\n- die theoretischen Grundlagen bei der Betrachtung von Protein-Protein-Wechselwirkungen\r\nsowie die gängigen Verfahren und Werkzeuge der Molekülmechanik zur Strukturvorhersage bei\r\nProteinen zu beschreiben und anzuwenden', 'Modellsysteme für Proteine\r\nTheoretische Ableitung von Strukturinformationen aus der Aminosäuresequenz\r\nProtein-Protein-Wechselwirkungen\r\nMolekülmechanik\r\nab initio und semiempirische Methoden zur Strukturvorhersage von Molekülen und Makromolekülen', 'Schriftliche Klausur;;', 'deutsch', 'Aktuelle Publikationen des Fachgebietes', 3, 24, NULL, NULL, NULL, NULL),
(94, '2014-12-12', 1, 'Freigegeben', 'PACE', 'Pharmazeutische Chemie', 'Pharmaceutical chemistry', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 105, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- Aufbau und Nomenklatur der organischen Chemie zu beschreiben\r\n- Grundlagen der Nomenklatur der optischen Isomerie einzuordnen\r\n- grundlegenden Begriffe der Pharmakologie zu erklären\r\n- Applikation,Resorption, Verteilung und Elimination von Arzneistoffen aufzuzeigen\r\n- die Abläufe der Biotransformation zu charakterisieren\r\n- Aufbau und Wirkungsweise von Rezeptoren zu erklären\r\n- die Problematik von Arzneimittelwechselwirkungen zu diskutieren\r\n- Grundlagen über die Wirkmechanismen im Nervensystem einzuordnen\r\n- Grundlagen im Bereich des Molecular Modeling anzuwenden', 'Einteilung der organischen Verbindungen und deren systematische Nomenklatur\r\nOptische Isomerie mit Beispielen für pharmazeutische Wirksubstanzen\r\nGrundbegriffe und Definitionen der Pharmakologie\r\nAufbau und typische Abläufe einer Pharmakokinetik\r\nAblauf und Besonderheiten der Pharmakodynamik\r\nRezeptorvermittelte und rezeptorunabhängige Arzneimitteleffekte\r\nUnerwünschte Arzneimittelwirkungen', 'Schriftliche Klausur;;', 'deutsch', 'T. L. Brown, H. Eugene LeMay, Bruce E. Bursten "Chemie" Pearson Studium , neuste Auflage\r\nPaula Y. Bruice "Organische Chemie" Pearson Studium jeweils neuste Auflage\r\nE. Mutschler, G. Geisslinger, H.K. Kroemer, M. Schäfer-Körting "Arzneimittelwirkungen"\r\nWissenschaftliche Verlagsgesellschaft Stuttgart neuste Auflage', 6, 21, NULL, NULL, NULL, NULL);
INSERT INTO `Veranstaltung` (`Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `modulbeauftragter`, `KontaktzeitVL`, `KontaktzeitSonstige`, `VoraussetzungLP`, `VoraussetzungInhalte`) VALUES
(95, '2014-12-12', 1, 'Freigegeben', 'VSYS', 'Verteilte Systeme', 'Distributed Systems', 'Wintersemester', 1, 'Vorlesung;;Labor;;', 120, 24, 'Die Studenten haben Kenntnis spezifischer Probleme und zu erreichender Ziele bei der Integration von Anwendungen innerhalb eines Unternehmens und zwischen Unterneh-men. Sie können fachliche und technische Herausforderungen bei der Systemintegration klassifizieren und kennen Lösungskonzepte, die sie auch anzuwenden beherrschen. Die Studenten kennen die verschiedenen Integrations-Patterns und deren direkte und indi-rekte Anwendung in Technologien und Lösungen. Sie beherrschen die verschiedenen Technologien zur Umsetzung in ihren Grundzügen.\r\nDie Studenten kennen die Charakteristika der wichtigsten Unternehmensarchitekturen für verteilte Anwendungen und derer spezifischen Vor- und Nachteile. Sie können Archi-tekturen anhand dieser Kriterien bewerben.\r\nBei gegebener Aufgabenstellung/Szenario können die Studenten eine begründete Emp-fehlung für die Unternehmensarchitektur aussprechen zu können, inklusive eines Kata-logs nutzbarer Technologien. Die Studenten beherrschen den praktischen Umgangs mit Technologien (Middleware) und Konzepten (Architekturen) zur Integration von verteilten Anwendungen anhand von kleinen Beispielen.', '- Verteilung, Synchronisation und Kooperation von Anwendungen und Diensten auf Sys-temebene\r\n- Integration-Patterns für Verteilte Systeme.\r\n- Konzepte (Synchron, Asynchron, Proxy) und Middleware-Technologien (CORBA, EJB, Web Services, ESB, Messaging) zur Integration von Unternehmensanwendungen.\r\n- Eigenschaften von Verteilten Systemen (Charakteristiken, Konsistenz, Replikation, Fault-Tolerance) und Ziele der Umsetzung (Loose Kopplung, Flexibilität, Orchestrierung und Choreography).\r\n- Aufgaben im Rahmen der Enterprise Integration Application.\r\n- Systemarchitekturen und Technologien zur Umsetzung von Unternehmensarchitekturen (P2P, GRID, SOA, REST, CLOUD).', 'Schriftliche Klausur;;', 'deutsch', 'Vorlesungsskript zur Vorlesung,\r\nBücher:\r\nHohpe, Gregor; Woolf, Bobby. Enterprise Integration Patterns. Addison-Wesley Longman. Amsterdam. 2003.\r\nDunkel, Jürgen; Eberhart, Andreas; Fischer, Stefan; Kleiner, Carsten; Koschel, Arne. Sys-temarchitekturen für verteilte Anwendungen. Hanser Fachbuch. 2008.\r\nJosuttis, Nicolai. SOA in der Praxis: System-Design für verteilte Geschäftsprozesse. Dpunkt Verlag. 2008.\r\nTanenbaum, Andrew. Distributed Systems - Principles and Paradigms, 2nd edition. Pear-son Prentice Hall. 2007\r\nTilkov, Stefan. Rest und HTTP. dpunkt.verlag. Heidelberg. 2009', 6, 4, NULL, NULL, NULL, NULL),
(96, '2014-12-12', 1, 'Freigegeben', 'SYSE', 'Architektur von Informationssystemen', 'Architecture of Information Systems', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, NULL, NULL, 'Schriftliche Klausur;;Projektarbeit;;', 'deutsch', NULL, 6, 11, NULL, NULL, NULL, NULL),
(97, '2014-12-12', 1, 'Freigegeben', 'VEDA', 'Vertiefung Datenbanksysteme', 'Advanced Database Systems', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden kennen die Architektur und den Aufbau von Datenbanksystemen. Sie kennen physische Speicher- und Indexstrukturen. Sie verstehen die Problematik von Mehrbenutzersynchronisation, der Serialisierbarkeit auch bei langandauernden Transak-tionen, sowie des Logging und Recovery. Sie können Datenbanken für OLTP und OLAP Applikationen entwerfen und entwickeln. Sie kennen neben dem relationalen Mo-dell auch andere Modelle und Konzepte, bspw. aus dem Bereich objektorientierten Da-tenbanken sowie der der NoSQL Datenbanken.', '- Schichtenmodelle von Datenbanksystemen\r\n- Physische Speicherungsstrukturen\r\n- Verschiedene Indexstrukturen\r\n- Transaktionsverwaltung und erweiterte Transaktions-Konzepte\r\n- Synchronisation und Sperrverfahren\r\n- Serialisierbarkeit\r\n- Log-Dateien und Recovery\r\n- Datawarehouse und OLAP\r\n- Objektorientiertes und Objektrelationales Modell\r\n- Verteilte Datenbanken\r\n- Replikationstechniken\r\n- NoSQL Datenbanken', 'Schriftliche Klausur;;', 'deutsch', '- Skript zur Vorlesung\r\n- Date, C.J.: „An Introduction to Database Systems“,McGraw-Hill\r\n- Garcia-Molina, H..: „Database Systems - The Complete Book, Pearson\r\n- Heuer, A: „Datenbanken - Konzepte und Sprachen“, Mitp-Verlag\r\n- Heuer, A: „Datenbanken: Implementierungstechniken“, Mitp-Verlag\r\n- Elmasri, A.: „Fundamentals of Database Systems“, “,Addison Wesley\r\n- Kemper, A.: „Datenbanksysteme“ , Oldenbourg\r\n- Kemper, H.G.: Business Intelligence - Grundlagen und praktische Anwendungen, Vie-weg+Teubner\r\n- Ramakrishnan, R.: „Database Management Systems“, 3. Auflage 2002, McGraw-Hill\r\n- Endlich, S. et al.: „NoSQL: Einstieg in die Welt nichtrelationaler Web 2.0 Datenbanken“, Hanser.', 6, 8, NULL, NULL, NULL, NULL),
(98, '2014-12-12', 1, 'Freigegeben', 'SYSA', 'Systemanalyse', 'System Analysis', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden erwerben Kenntnisse über Methoden und Modelle der Systemanalyse. Sie können Systemanforderungen erfassen und Systemgrenzen bestimmen.\r\nDie Studierenden können Techniken und Methoden zur Systemanalyse zielorientiert auswählen und anwenden.', '- Systeme und Modelle\r\n- Vorgehen in der Systemanalyse\r\n- Modellierungssprachen, Methoden und Werkzeuge zur Systemanalyse (z.B. BPMN)\r\n- Prinzipien der Systemstrukturierung\r\n- Methoden zum Aufbau von Informationssystemen, z.B. serviceorientierte Ansätze.', 'Vortrag;;Projektarbeit;;', 'deutsch', '- Skript zur Vorlesung, Projektaufgabe\r\n- H. Krallmann, M. Schönherr, M. Trier: Systemanalyse im Unternehmen, Oldenbourg Verlag München Wien\r\n- Sophist Group, Rupp C.: Systemanalyse kompakt, Spektrum Akademischer Verlag\r\n- Th. Allweyer, BPMN 2.0 Business Process Model and Notation, Books on Demand GmbH, Norderstedt\r\n- D. Imboden, S. Koch; Systemanalyse, Einführung in die mathematische Modellierung', 6, 5, NULL, NULL, NULL, NULL),
(99, '2014-12-12', 1, 'Freigegeben', 'HÖMA', 'Höhere Mathematik', 'Higher mathematics for information systems', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden kennen die grundlegenden Begriffe, Theoreme und Algorithmen der Algebra und Diskreten Mathematik, welche für das tiefergehende Verständnis verschie-dener Gebiete\r\n- der theoretischen Informatik (wie Algorithmen, Datenstrukturen, Sprachen und Komple-xitätstheorie) und\r\n- der angewandten Informatik (wie Kryptographie, Codierungstheorie und CAGD)\r\nbenötigt werden. Sie können diese Verfahren anwenden.', '- Relationen (Äquivalenz-, Ordnungs-, Kongruenzrelationen)\r\n- Gruppen, Ringe, Körper\r\n- Partielle geordnete Mengen und Verbände\r\n- Abzählende Kombinatorik\r\n- Graphen und Digraphen', 'Schriftliche Klausur;;', 'deutsch', 'Tafelanschrieb in Englisch (Deutsch bei Bedarf)\r\nLiteratur: Kapitel aus:\r\n- Fraleigh: A First Course in Abstract Algebra, ISBN-10: 0321156080\r\n- Witt: Algebraische Grundlagen der Informatik, ISBN-10: 3834801208\r\n- Wüstholz: Algebra, ISBN-10: 352807291\r\n- Aigner: Diskrete Mathematik, ISBN-10: 3834800848', 6, 12, NULL, NULL, NULL, NULL),
(100, '2014-12-12', 1, 'Freigegeben', 'KRYP', 'Kryptologie', 'Cryptology', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden kennen ausgewählte historische und moderne Verschlüsselungs- und Signaturverfahren und verstehen deren Stärken und Schwächen in Hinblick auf die Si-cherheitsziele: Vertraulichkeit, Integrität, Authentizität und Verbindlichkeit.\r\nDie Studierenden kennen die mathematischen Grundlagen moderner Verschlüsselungs-verfahren, ihr Sicherheitsniveau sowie elementare kryptoanalytische Techniken. Sie kön-nen die sachgemäße Anwendung der Verfahren in verschiedenen Kontexten abschätzen.', 'Elementare algorithmische Zahlentheorie: Rechnen in Restklassenringen und endlichen Körpern, Primzahlerzeugung, –test und –zerlegung, diskreter Logarithmus\r\n- Klassische Chiffren, affin lineare Chiffren, Hashfunktionen, Stromchiffren, Blockchiffren, Feistelchiffren, DES, AES\r\n- Public-Key Verschlüsselung: Diffie-Hellman, ElGamal, RSA, elliptische Kurven .', 'Schriftliche Klausur;;', 'deutsch', '- Buchmann: Einführung in die Kryptographie, 5. Auflage, ISBN 3642111858\r\n- Hoffstein, Pipfer, Silverman: An Introduction to Mathematical Cryptography, ISBN 1441926747\r\n- Ertel: Angewandte Kryptographie, 3. Auflage, ISBN 344641195X\r\n- CrypTool – Lernsoftware (http://www.cryptool.org).', 6, 12, NULL, NULL, NULL, NULL),
(101, '2014-12-12', 1, 'Freigegeben', 'ELEA', 'E-Learning', 'E-Learning', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Kenntnis der verschiedenen Nutzer und Rollen eines LM-Systems sowie deren Anforde-rungen an das LM-System. Fähigkeit zur Analyse der Anforderungen und Fähigkeit zur Abbildung der Anforderungen auf verschiedene Dienste und Schnittstellen. Verständnis des Zusammenspiels von mehreren Nutzungs-Gruppen und- Rollen in einem LM-System. Integration von Diensten und Basisfunktionalitäten zu Rollenspezifischen Nutzungsszena-rien und entsprechenden Nutzungsschnittstellen. Beurteilung eines LM-Systems aus ver-schiedenen Sichten heraus: einerseits der Anwendersicht (z. B. als Kurs-Autor, der ein Kursfragment erstellt) und andererseits als System-Entwickler, der das LM-System funkti-onal erweitert..', 'Vorgestellt werden die Aufgaben und das Zusammenspiel der verschiedenen Nutzer und Rollen eines Lern-Management-Systems (LM-Systems). Herausgearbeitet werden die Rollen der Lernenden, der Dozenten, der Tutoren, der Autoren und der Administratoren. Deren unterschiedliche Aufgaben werden betrachtet (beispielsweise die Kursmaterial-Verwaltung, die Benutzer-, Rechte- und Kostenverwaltung, das Einbindung externer Res-sourcen, usw.). Die sich ergebenden Anforderungen an ein LM-System werden abgelei-tet. Dienste und Schnittstellen von LM-Systemen werden betrachtet. Weiterhin werden die Charakteristiken verschiedener Lernformen, sowie Normen und Standards im Bereich von LM-Systeme (SCORM, Dublin-Core, LMO, …) vorgestellt. Der Lernmaterial-Lifecycle wird vermittelt. Das theoretische Wissen wird im Rahmen von zwei kleinen Teamphasen vertieft/umgesetzt.\r\nZum einen wird die prototypische Erstellung und Integration eines E-Learning-Kursfragmentes in ein LM-System durchgeführt. Hierbei werden Kursmaterialien geplant und erstellt. Diese werden modularisiert, mit Meta-Daten versehen und in ein LM-System integriert.\r\nWeiterhin wird die Entwicklung von LM-Systemen betrachtet. Hierzu wird entweder ba-sierend auf einer Anforderungsanalyse einer bestimmten Nutzergruppe eine neu umzu-setzende Funktionalität identifiziert und diese dann in ein LMS integriert oder es werden Vergleichende Analysen von bestehenden LMS vor genommen ..', 'Dokumentation;;Projektarbeit;;', 'deutsch', 'Vorlesungsskript zur Vorlesung. Bücher\r\n A. Schreiber: CBT-Anwendungen professionell entwickeln, Springer Verlag Wien: Studien Verlag.\r\n R. S. Schifman, G. Heinrich: Multimedia Projektmanagement, Springer Verlag\r\n R. Schulmeister: Lernplattformen für das virtuelle Lernen. Evaluation und Didak-tik. ISBN: 3486272500. R. Oldenbourg Verlag: München u.a.\r\nP. Baumgartner et. al.: E-Learning Praxishandbuch: Auswahl von Lernplattformen. Marktübersicht - Funktionen - Fachbegriffe. Innsbruck-Wien: Studien Verlag..', 6, 6, NULL, NULL, NULL, NULL),
(102, '2014-12-12', 1, 'Freigegeben', 'DAMA', 'Data Mining', 'Data Mining', 'Wintersemester', 1, 'Vorlesung;;Übung;;Praxisprojekt;;', 120, 25, 'Ziel der Lehrveranstaltung ist es, die Studierenden in die Anwendungsszenarien des Data Mining einzuführen. Die Studierenden kennen und verstehen erfolgreiche Data-Mining-Anwendungen und die dabei verwendeten Methoden. Die Studierenden sind in der Lage, entsprechend einer Fragestellung geeignete Data-Mining-Methoden auszuwählen, zu implementieren und Datenanalysen durchzuführen.', 'Der Kurs umfasst folgende Themen\r\n Theoretische Grundlagen des Data Mining und des Maschinellen Lernens\r\n Beispielanwendungen aus der Biologie/Meidzin (z.B. Expressionsdaten, Diagnostik) und der Wirtschaft (z.B. Email-Filter, Internetversteigerungen, Preisentwicklung)\r\n Datenauswahl, Datenvorverarbeitung\r\n Implementierungswerkzeuge\r\n Valididerung und Verifizierung der Ergebnisse\r\n Wissensrepräsentation und Interpretation\r\n Anwendungs-Szenarien: Regelextraktion, Clusteranalyse, Klassifizierung, Regression', 'Mündliche Prüfung;;', 'deutsch', 'Präsentationsfolien zur Vorlesung\r\nRichard O. Duda; Peter E. Hart; David G. Stork (2000) Pattern Classification, Wiley-Interscience\r\nMichael R. Berthold (Editor); David J. Hand (Editor) (2003) Intelligent Data Analysis, Springer-Verlag\r\nJürgen Paetz (2006) Soft Computing in der Bioinformatik, Springer-Verlag\r\nP.-N. Tan, M. Steinbach, V. Kumar (2006) Introduction to Data Mining, Addison-Wesley\r\nM.F. Hornick, E. Marcade, S. Venkayala (2006) Java Data Mining: Strategy, Standard, and Practice: A Practi-cal Guide for architecture, design, and implementation, Morgan Kaufmann\r\nI. H. Witten, E. Frank: Data Mining, Morgan Kaufmann Publishers, 2000.\r\nD.M. Dziuda: Data Mining for Genomics and Proteomics, Wiley, 2010\r\nSoftware WEKA (http://www.cs.waikato.ac.nz/ml/weka/), RapidMiner (http://rapid-i.com/) und Statistische Programmiersprache R (http://www.r-project.org/)\r\nData Mining Cup (http://www.data-mining-cup.de/)', 6, 1, NULL, NULL, NULL, NULL),
(103, '2014-12-12', 1, 'Freigegeben', 'AITL', 'Advanced IT in Life Sciences', 'Advanced IT in Life Sciences', 'Wintersemester', 1, 'Vorlesung;;Übung;;Praxisprojekt;;', 120, 25, 'Die Studierenden kennen aktuelle Methoden und einschlägige Fachliteratur der Bioin-formatik. Die Studierenden sind in der Lage, aus einem breiten Repertoire von Metho-den, Lösungsverfahren für biologische bzw. medizinische Fragestellungen anzuwenden, umzusetzen und zu bewerten. Ziel der Lehrveranstaltung ist es, die Studierenden zu be-fähigen, fortgeschrittene Methoden kritisch zu analysieren..', 'Die Lehrinhalte werden jeweils nach dem aktuellen Stand der Forschung und Entwicklung zusammengestellt.\r\nBeispiele:\r\n- Extraktion komplexer Genotyp-Phänotyp-Beziehungen aus biomedizinischen Datenbanken\r\n- Simulation biomolekularer Systeme auf Rechner-Clustern\r\n- Analyse von DNA-Microarray Daten\r\n- Verarbeitung von Next-Generation-Sequencing-Daten\r\n- Konzeption einer Verarbeitungspipeline für biomedizinische Daten im Labor', 'Mündliche Prüfung;;', 'deutsch', 'Präsentationsfolien zur Vorlesung\r\nFachartikel aus z.B. Zeitschriften aus der Reihe „PloS“ (Public Library of Science), insbes. PloS Computational Biology, BMC, insbes. BMC Bioinformatics, Bioinformatics\r\nW. J. Ewens, G. R. Grant: Statistical Methods in Bioinformatics, Springer, 2005\r\nD. Stekel: Microarray Bioinformatics, Cambridge, 2003\r\nD.M. Dziuda: Data Mining for Genomics and Proteomics, Wiley, 2010', 6, 1, NULL, NULL, NULL, NULL),
(104, '2014-12-12', 1, 'Freigegeben', 'GRAP', 'Grafische Systeme', 'Graphical Systems', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 10, '- Die Studierenden kennen aktuellste Entwicklungen im Bereich der interaktiven 3D-Computergrafik, z.B. aktuellste Algorithmen und Verfahren zur Entwicklung interaktiver 3D-Applikationen, aktuelle 3D Ein-/ Ausgabegeräte, aktuelle Interface-Technologien.\r\n- Die Studierenden sind in der Lage, eigenverantwortlich wissenschaftliche Recherche zu betreiben und sich benötigte technologische Grundlagen eigenständig zu erarbeiten.\r\n- Die Studierenden sind in der Lage, sich eigenverantwortlich in die Bedienung komplexer Software-API’s oder Softwarepakete einzuarbeiten.\r\n- Die Studierenden können Lösungen für komplexe grafische Fragestellungen systema-tisch erarbeiten sowie komplexe Systeme konzipieren und (möglicherweise in Gruppen-arbeit) entwickeln.', 'Fortgeschrittene Verfahren, Algorithmen und Technologien in den Bereichen Computer-graphik und Animation; Echtzeitgrafik; Verfahren im Bereich virtuelle und erweiterte Rea-lität; grafische Darstellung im WWW; grafische Darstellung auf mobilen Systemen.', 'Mündliche Prüfung;;Projektarbeit;;', 'deutsch', 'Wird jeweils zu Beginn der Veranstaltung angegeben.', 6, 7, NULL, NULL, NULL, NULL),
(105, '2014-12-12', 1, 'Freigegeben', 'WIVI', 'Visualisierungssysteme', 'Visualization Systems', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 10, 'Die Studierenden können das Gebiet der wissenschaftlichen Visualisierung definieren und im Hinblick auf benachbarte Forschungsrichtungen einordnen und abgrenzen. Sie kennen grundlegende Visualisierungsparadigmen, den Visualisierungsprozess und die Visualisie-rungspipeline. Sie verfügen über Hintergrundwissen zur menschlichen Wahrnehmung und Informationsverarbeitung.\r\nDie Studierenden kennen gängige Methoden zur Daten- und Informationsvisualisierung, können diese im Hinblick auf Eigenschaften und Anwendungsfelder in der wissenschaftli-chen Diskussion darstellen und charakterisieren, sowie die Verfahren beispielhaft anwen-den. Sie sind in der Lage, selbstständig gegebene Problemstellungen zu analysieren und zu klassifizieren sowie geeignete Verfahren zur Visualisierung auszuwählen und anzuwen-den.\r\nDie Studierenden können gängige Visualisierungssysteme nennen und gegeneinander abgrenzen. Sie können Software-Komponenten zur Visualisierung unter Verwendung eines Visualisierungs-Frameworks selbstständig entwickeln oder bestehende individuell anpassen.', 'Visualisierungsprozess und Visualisierungspipeline\r\n- Menschliche Wahrnehmung und Informationsverarbeitung\r\n- Grundlegende Visualisierungstechniken, Konzepte und Methoden\r\n- Visualisierung räumlicher Daten\r\n- Visualisierung multivariater Daten\r\n- Visualisierung von Bäumen, Graphen und Netzwerken\r\n- Text- und Dokumentenvisualisierung\r\n- Interaktionskonzepte und -Techniken\r\n- Vergleich und Evaluierung von Visualisierungstechniken\r\n- Systeme und Frameworks zur Visualisierung', 'Mündliche Prüfung;;Projektarbeit;;', 'deutsch', 'M. Ward, G. Grinstein, D. Keim: Interactive Data Visualization, ISBN 1568814739\r\nW. Schroeder, K. Martin, B. Lorensen: The Visualization Toolkit. ISBN 193093419X\r\nH. Schumann, W. Müller: Visualisierung. ISBN 3-540-64944-1\r\nW. Schroeder, K. Martin, B. Lorensen: The Visualization Toolkit. ISBN 0-13-954694-4', 6, 7, NULL, NULL, NULL, NULL),
(106, '2014-12-12', 1, 'Freigegeben', 'SIMU', 'Simulation', 'Simulation', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden kennen die methodischen Grundlagen der Modellbildung und Simulati-on von Systemen aus diversen Anwendungsbereichen. Sie sind mit den wichtigsten Kom-ponenten, der Arbeitsweise und dem Umgang mit einem Simulationssystem vertraut. Die Studierenden kennen die verschiedenen Methoden der Zeitführung. Sie sind in der Lage Simulationssprachen und -systeme zu verstehen und mit ihnen umzugehen. Darüber hin-aus sind die Studierenden in der Lage für eine konkrete Problemstellung selbstständig ein Modell zu entwickeln, zu implementieren und Simulationen fachgerecht durchzuführen. Außerdem können Sie eigenständig Softwarekomponenten eines Simulationssystems entwickeln oder bestehende individuell anpassen.', '- Problemstellung der Modellierung und Simulation\r\n- Konzepte der Modellbildung\r\n- Kontinuierliche Modelle: Verfahren zur Gewinnung der Systemgleichungen in verschie-denen Anwendungsgebieten\r\n- Methoden der kontinuierlichen Simulation (numerische Verfahren zur Lösung der auf-tretenden Gleichungen)\r\n- Diskrete Modelle (Entscheidungsmodelle, Reihenfolgeprobleme, Ereignisse)\r\n- Methoden der diskreten Simulation (Petri-Netze, zellulare Automaten, Scheduling)\r\n- Simulationssysteme/Simulatoren (Vorstellung verschiedener Systeme und deren Ver-wendung)\r\n- Simulationssprachen\r\n- Analyse und Interpretation von Simulationsexperimenten\r\n- Validierung und Verifikation eines Simulationsmodells durch Implementation in einem Simulationssystem.', 'Schriftliche Klausur;;', 'deutsch', 'J. Banks (ed.): Handbook of Simulation: Principles, Methodology, Advances, Applications, and Practice: Modelling, Estimation and Control. John Wiley & Sons, ISBN 978-0-471-13403-9\r\nJ. Banks, J. S. II Carson, B. L. Nelson, D. M. Nicol: Discrete-Event System Simulation. Pearson Education, ISBN 978-0-138-15037-2\r\nP. Bratley, B. L. Fox, L. E. Schrage: A Guide to Simulation. Springer, ISBN 978-0-387-96467-6\r\nT. T. Allen: Introduction to Discrete Event Simulation and Agent-based Modeling: Voting Systems, Health Care, Military, and Manufacturing. Springer, ISBN 978-0-857-29138-7\r\nA. M. Law: Simulation Modeling & Analysis. McGraw-Hill Professional, ISBN 978-0-071-25519-6', 6, 3, NULL, NULL, NULL, NULL),
(107, '2014-12-12', 1, 'Freigegeben', 'WISE', 'Wissenschaftliches Seminar', 'Scientific Course', 'Sommersemester', 1, 'Seminar;;', 120, 25, 'Die Studenten können sich den aktuellen Stand der Wissenschaft für ein Spezialgebiet sowie die Inhalte einer aktuellen wissenschaftlichen Publikation selbstständig erarbeiten. Sie können aktuelle wissenschaftlicher Ergebnisse selbstständig aufbereiten und darauf-folgend in englischer Sprache präsentieren. Die Studenten haben die Fähigkeit eine Ein-ordung und Bewertung eines wissenschaftlichen Beitrags vorzunehmen und dessen Be-deutung für die Forschung und Anwendung differenziert zu unterscheiden.', '-aktuelle wissenschaftliche Publikationen aus allen Gebieten der Informatik, wie bspw. Datenbanktechnologien, IT-Sicherheit, Systemarchitekturen, Software-Engineering, Com-pilerbau, Betriebssysteme, Verschlüsselungstechnologien, Web-Technologien, Mobile-Systeme etc.', 'Mündliche Prüfung;;', 'deutsch', 'Proceedings zu wissenschaftlichen Konferenzen und Papern', 6, 4, NULL, NULL, NULL, NULL),
(108, '2014-12-12', 1, 'Freigegeben', 'PROM', 'Master Projekt', 'Master Project', 'Sommersemester', 1, 'Praxisprojekt;;', 150, 25, 'Fähigkeit zur Anwendung relevanter Methoden des Projektmanagements;\r\nÜben von Moderationstätigkeiten;\r\nKenntnis und Verständnis wesentlicher wissenschaftstheoretischer Konzepte sowie Über-blick über projektrelevante wissenschaftliche Methoden;\r\nReflexion grundlegender Aspekte der Projekt- und Berufstätigkeit', 'Angeleitetes Erstellen einer kleineren wissenschaftlichen Arbeit deren Schwierigkeitsgrad der späteren Beru\r\nfspraxis entspricht. Die Betreuung erfolgt durch eine Lehrperson.\r\nHierbei werden systematische Vorgehensweisen und sinnvolle Arbeitstechniken eingeübt sowie die Verbindung zu Anwendungsgebieten der Informatik hergestellt.\r\nDie konkreten Inhalte des Projektes ergeben sich aus der Aufgabenstellung', 'Vortrag;;Projektarbeit;;', 'deutsch', NULL, 6, 5, NULL, NULL, NULL, NULL),
(109, '2014-12-12', 1, 'Freigegeben', 'PROJM', 'Projektmanagement', 'Project Management', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studenten erwerben Fähigkeiten zur Planung und Leitung komplexer Projekte aus Wissenschaft, Industrie und Gesellschaft. Sie kennen die wesentlichen Vorgehensmodelle und Methoden, kennen deren spezifische Charakteristika und Anwendungsgebiete. Sie entwickeln die Fähigkeit Softwareentwicklungsprojekte eigenverantwortlich planen, or-ganisieren und leiten zu können. Die Studenten können Machbarkeitsstudien, Ressour-cenabschätzungen und Aufwandsschätzungen erstellen und Schlussfolgerungen daraus ziehen. Sie können Risiken und sicherheitsrelevante Bereiche für Projekte analysieren und bewerten. Die Studenten entwickeln Teamfähigkeit und die Fähigkeit Probleme selbstän-dig zu lösen..', '- Komplexitätsbetrachtungen großer Softwaresysteme\r\n- Vorgehensmodelle der Softwareentwicklung (V-Modell, RUP, Extreme Programming, Scrum etc.)\r\n- Anwendung von Vorgehensmodellen und deren spezifische Eigenschaften,\r\n- Planungstechniken und Checklisten zur Projektplanung\r\n- Werkzeuge und Hilfsmittel zum Projektmanagement\r\n- Verfolgung von Anforderungen von der Analyse bis zur Umsetzung\r\n- Änderungs- und Konfigurationsmanagement\r\n- Zeitmanagement und Ressourcenmanagement\r\n- Standards zum Projektmanagement\r\n- Aufwandsschätzung (Function Point Analyse und andere)\r\n- Metriken basierte Prozesssteuerung und Kontrolle..', 'Mündliche Prüfung;;', 'deutsch', 'Höhn, Reinhard; Höppner, Stephan. Das V-Modell XT. Grundlagen, Methodik und Anwen-dungen. Springer. 2008.\r\nWolf, Henning; Roock, Stefan; Lippert, Martin. eXtreme Programming: Eine Einführung mit Empfehlungen und Erfahrungen aus der Praxis. Dpunkt. 2005.\r\nPichler, Roman. Scrum - Agiles Projektmanagement erfolgreich einsetzen. Dpunkt. 2007. ISBN10 3898644782.\r\nVerstegen, Gerhard. Projektmanagement mit dem Rational Unified Process. Springer. Berlin. 2008.\r\nEbel, Nadin. PRINCE2:2009 - für Projektmanagement mit Methode. Addison-Wesley. München. 2011.\r\nA Guide to the Project Management Body of Knowledge. Project Management Institute. 2010.\r\nFunction Point Analyse\r\nPoensgen, Benjamin; Bock, Bertram. Die Function-Point-Analyse: Ein Praxishandbuch. dpunkt Verlag. 2005.\r\nHindel, Bernd; Hörmann, Klaus; Müller, Markus; Schmied, Jürgen. Basiswissen Software-Projektmanagement. dpunkt.verlag. 2006..', 6, 4, NULL, NULL, NULL, NULL),
(110, '2014-12-12', 1, 'Freigegeben', 'EBUS', 'E-Business', 'E-Business', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Studierenden kennen die Grundbegriffe des e-Business und können die dazu notwen-digen Technologien einordnen. Sie kennen Anwendungsgebiete des e-Business und kön-nen den Nutzen elektronischer Geschäftsbeziehungen für Unternehmen bewerten.\r\nDie Studierenden sind mit den betrieblichen Problemstellungen des e-Business vertraut und können diese analysieren und bewerten. Sie kennen die Veränderungen und Verän-derungsprozesse durch Informationstechnologie und können diese positiv für betriebliche Prozesse einsetzen.\r\nDie Studierenden kennen Konzepte und Modelle des e-Business und können diese auf konkrete Unternehmensbeispiele anwenden (Case Studies).', '- Einführung in e-Business\r\n- Grundlagen Internettechnologie und Internetökonomie\r\n- Einsatzbereiche (nach Funktionen) des e-Business\r\n- Ausgewählte Fallstudien (aus unterschiedlichen Bereichen)\r\n- Entwicklungstendenzen (z.B. Mobile Technologien)', 'Mündliche Prüfung;;Projektarbeit;;', 'deutsch', 'Kollmann, T.: E-Business, Gabler.\r\nPicot, A.; Reichwald, R.; Wigand: R.T.: Die grenzenlose Unternehmung, Gabler.\r\nWirtz, B.: Electronic Business, Gabler.\r\nApplegate, L; Austin, R.; McFarland, F. W.: Corporate Information Strategy and Management - Text and Cases, McGraw-Hill.', 6, 32, NULL, NULL, NULL, NULL),
(111, '2014-12-12', 1, 'Freigegeben', 'UCON', 'Unternehmensführung / Controlling', 'Business Management', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, 'Die Teilnehmer sollen die Voraussetzungen für nachhaltigen Unternehmenserfolg ken-nen, analysieren und beurteilen lernen. Dies umfasst die Entwicklungsschritte von der Vision zum Leitbild, den Einfluss von Unternehmenspolitik und Unternehmenskultur, die Herausbildung einer Corporate Identity und ihre Erneuerung in Change Prozessen und die Konzepte der Unternehmenssteuerung. Weiter werden die Studierenden ein Basisver-ständnis von Unternehmensstrategien entwickeln, zentrale Methoden zur strategischen Analyse und zur Strategieentwicklung kennen und anwenden lernen und Unternehmens-prozesse der Strategieentwicklung und -implementierung verstehen.\r\nStudierende erleben den Bezugsrahmen wirtschaftlicher Entscheidungen und deren Be-deutung für das IT Management durch den Einsatz von kleinen Fallbeispielen, die zu prä-sentieren und diskutieren sind. Die Studierenden können Veränderungen am Markt durch geeignete Transformationen von Werteketten und Geschäftssystemen erkennen, analy-sieren und für die Unternehmensführung nutzen..', 'Einführung in das integrierte Managementmodell\r\n- Vision, Leitbild und Unternehmenspolitik\r\n- Unternehmensverfassung und Corporate Governance\r\n- Unternehmenskultur, Corporate Identity und Change Management\r\n- Konzepte der Unternehmenssteuerung\r\n- Grundlagen Unternehmensstrategien\r\n- Instrumente zur Strategischen Analyse\r\n- Instrumente zur Strategieentwicklung\r\n- Prozesse der Strategieentwicklung und Implementierung\r\n- Ausgewählte Probleme des operativen Managements)', 'Schriftliche Klausur;;', 'deutsch', 'Bleicher, Knut: Das Konzept Integriertes Management. 5. revidierte und erweiterte Auflage. Ffm./N.Y\r\nStern, Joel M./John S. Shiely/Irwin Ross: Wertorientierte Unternehmensführung mit Added Value. Strategie, Umsetzung. Praxisbeispiele. München\r\nKühn, R.; Grünig, R: Grundlagen der strategischen Planung. Bern\r\nRobbins, S. Organisation der Unternehmung, Pearson; 9. Aufl. München\r\nBecker, J., Knackstedt, R., Pfeiffer, D.: Wertschöpfungsnetzwerke, Physica.\r\nWeiber, R. (Hrsg.): Handbuch Electronic Business, Gabler.\r\nMoore, G. A.: Dealing with Darwin, John Wiley & Sons..', 6, 33, NULL, NULL, NULL, NULL),
(112, '2014-12-12', 1, 'Freigegeben', 'BUET', 'Business-Etikette und Führungskompetenz', 'Business-Etikette und Führungskompetenz', 'wechselnd', 1, 'Vorlesung;;Übung;;', 120, 25, 'Business-Etikette - Etiketteregeln und moderne Umgangsformen in verschiedenen Kommunikationssituati-onen beherrschen:\r\n- interkulturelle Besonderheiten in der Kommunikation kennen und bei beruflichen Kon-takten mit Menschen aus verschiedenen Kulturen souverän auftreten können\r\n- Benimmregeln in der Rolle des Gastgebers und des Gastes im Unternehmen anwenden können\r\n- Regeln der Begrüßung, Vorstellung und Verabschiedung im beruflichen Miteinander anwenden können\r\n- geeignete Themen und Tabuthemen beim Smalltalk im Beruf kennen\r\n- Verhandlungen mit Kunden positiv und zielführend führen können\r\n- über Medien wie Telefon, Brief und E-Mail stilvoll Kontakt aufnehmen und positiv ge-stalten können\r\n- Geschäftsessen souverän absolvieren können\r\nFührungskompetenz\r\n- Rollen in Arbeitsteams, Gruppenstrukturen und Gruppenprozesse kennen\r\n- Führungsstile, Führungsaufgaben und Führungsmethoden kennen und anwenden kön-nen\r\n- Teamsitzungen leiten können\r\n- Mitarbeitergespräche führen können', 'Business-Etikette - Begriffe Etikette und moderne Umgangsformen\r\n- Souveränes Auftreten im globalen beruflichen Umfeld\r\n- Kontaktaufnahme und -gestaltung in ausgewählten Face-to-Face-Situationen\r\n- Kontaktaufnahme und -gestaltung über Medien wie Telefon, Brief und E-Mail\r\n- Geschäftsessen: Gutes Benehmen am Tisch\r\nFührungskompetenz\r\n- Rollen in Arbeitsteams\r\n- Gruppenstrukturen\r\n- Gruppenprozesse\r\n- Führungsstile, Führungsaufgaben und Führungsmethoden\r\n- Vorbereitung, Durchführung und Nachbereitung von Teambesprechungen\r\n- Konstruktive Mitarbeitergespräche', 'Schriftliche Klausur;;Mündliche Prüfung;;', 'deutsch', 'Elisabeth Bonneau: Stilvoll zum Erfolg: Der moderne Business-Knigge, Hoffmann und Campe.\r\nKai Oppel und Stephan Kilian: Business-Knigge international, Haufe-Lexware.\r\nGerhard Meyer-Uhl und Elke Uhl-Vetter: Business-Etikette in Europa: Stilsicher auftreten, Umgangsformen beherrschen, Gabler.\r\nGerhard Maletzke: Interkulturelle Kommunikation, Westdeutscher Verlag.\r\nRoger Fisher, William Ury und Bruce Patton: Das Harvard-Konzept - Der Klassiker der Ver-handlungstechnik, Campus.\r\nHartmut Laufer: Grundlagen erfolgreicher Mitarbeiterführung: Führungspersönlichkeit - Führungsmethoden - Führungsinstrumente, Gabal-Verlag.\r\nUwe Vigenschow, Björn Schneider und Ines Melrose: Soft Skills für IT-Führungskräfte und Projektleiter - Softwareentwickler führen und coachen, Hochleistungsteams aufbauen, dpunkt.', 6, 2, NULL, NULL, NULL, NULL),
(113, '2014-12-12', 1, 'Freigegeben', 'BPA', 'Geschäftsprozessautomatisierung', 'Business Process Automation', 'jedes Semester', 1, 'Vorlesung;;Übung;;', 120, 15, 'Die Studierenden beherrschen die Modellierung von Geschäftsprozessen auf Basis der BPMN. Sie können Business Processes in Worflows überführen und dabei entsprechend detaillieren sowie technische Details ergänzen. Die Workflows können sie für die Automa-tisierung vorbereiten. Sie haben exemplarisch gelernt, Workflows in Unternehmensarchi-tekturen zu integrieren und innerhalb von Execution Engines zu automatisieren..', '- Vorgehen bei der Modellierung von Geschäftsprozessen\r\n- BPMN als Notation für die Modellierung von Geschäftsprozessen\r\n- Frameworks, Werkzeuge und Vorgehensmodelle zur Modellierung von Ge-schäftsprozessen\r\n- Technologien und Lösungsmuster für die Integration\r\n- Praxisbeispiel und eigene Anwendung anhand von ausgewählten Technologien und am Beispiel von Activiti\r\n- BPMN Kompensation (Effekte einer Aktionen ungeschehen machen) und Trans-aktion (zur Sicherstellung konsistenter Ergebnisse) in Activiti\r\n- Anforderungen und Umsetzungsmöglichkeiten von Prozessinformationssystemen', 'Projektarbeit;;', 'deutsch', 'Freund, Jakob; Rücker, Bernd. Praxishandbuch BPMN 2.0. Hanser Fachbuch. 2010.\r\nAllweyer, Thomas. BPMN 2.0 - Business Process Model and Notation: Einführung in den Standard für die Geschäftsprozessmodellierung. Books on Demand. 2009.\r\nLessen, Tammo van; Lübke, Daniel; Nitzsche, Jörg. Geschäftsprozesse automatisieren mit BPEL. Dpunkt Verlag. 2011.\r\nEABPM. Business Process Management Common Body of Knowledge (CBOK). Schmidt Dr. Goetz Verlag. 2009..', 3, 4, NULL, NULL, NULL, NULL),
(114, '2014-12-12', 1, 'Freigegeben', 'ERPT', 'ERP-Technologien', 'ERP-Technologies', 'Sommersemester', 1, 'Vorlesung;;Praxisprojekt;;', 120, 15, 'Die Studenten haben den strukturellen Aufbau von ERP-Systemen und exemplarische Techno-logien erlernt, die in diesem Kontext zum Einsatz kommen. Sie haben das Modulkonzept und Prinzip des Customizings von Standardsoftware anhand von Beispielen nachvollzogen.\r\nAnhand von Beispielen aus Materialwirtschaft, Vertrieb und Supply Chain Execution wissen die Stu-dierenden integrative Prozessketten aus der ERP Standardsoftware und das zugrundelie-gende betriebswirtschaftliche und technische Konzept. Sie haben die Umsetzung von geschäftli-chen Anfor-derungen und Abläufen in Standardsoftware nachvollzogen.\r\nDie Studierenden beherrschen einzelne ERP-Technologien und können diese für die Entwicklung von mobilen ERP-Prozessen einsetzen. Sie haben ein erstes Verständnis zum Aufsetzen, Durch-füh-ren und Steuern von ERP-Arbeitspaketen erworben und wissen um die spezifischen Anfor-derungen in diesem Kontext.', 'Architektur von ERP-Systemen (am Beispiel von SAP)\r\n- Geschäftsprozesse und Workflows in SAP Supply Chain (MM, PP, SD, WM, Integration in FI/CO)\r\n- SAP NetWeaver und SAP ECC\r\n- Grundlagen der ABAP Programmierung\r\n- Web Dynpro für ABAP\r\n- Business Server Pages; insbesondere zur Entwicklung von SAP Web-Apps\r\n- Technologien zur Entwicklung von mobilen Anwendungen (ITSmobile, Mobisys Solution Builder kurz MSB)\r\n- Management und Durchführung von “SAP-Projekten”.', 'Projektarbeit;;', 'deutsch', NULL, 6, 4, NULL, NULL, NULL, NULL),
(115, '2014-12-12', 1, 'Freigegeben', 'ITSU', 'IT-Systeme in Unternehmen', 'IT Systems in Companies', 'Sommersemester', 1, 'Seminar;;', 90, 30, 'Die Studierenden kennen die in mittelständischen und großen Unternehmen eingesetzten Hard und Softwaresysteme: Sowohl die konzeptionellen Grundlagen als auch konkrete Realisierun-gen, Einsatz und Betriebsszenarien wie Cloud Computing oder SaaS sind ihnen thematisch ver-traut. Sie kennen den Markt der vorgestellten, unternehmensrelevanten IT Komponenten sowie Entwicklungsrichtungen bei ausgesuchten Anbietern. Sie sind in der Lage, strategische IT Archi-tekturen weiter zu konkretisieren. Die für das IT Management relevanten Realisierungsmöglich-keiten sowie Risiken und unternehmenstypische Herausforderungen wie Datensicherheit und Datenschutz sind ihnen bekannt. Die Studierenden lernen, sich kritisch mit den Produkten un-terschiedlicher Hersteller auseinander zusetzen und begründete Einsatzentscheidungen zu treffen. Bei der Präsentation von Ergebnissen vor Teams lernen die Studierenden den Umgang mit aufkommender Kritik und mit Konflikten innerhalb der Teams. Selbstmotivati-on/Selbststudium:\r\n- Heimarbeit/Übung (Breite): Nach einführender Vorstellung von Konzepten und Grundlagen ausgesuchter IT Komponenten arbeiten sich die Studierenden selbständig in konkrete Produkte unterschiedlicher Anbieter ein. Die Studierenden erfahren, inwieweit sich Anbieter an Stan-dards halten, und gewinnen insbesondere einen Eindruck der Breite möglicher Realisierungen.\r\n- Heimarbeit/Übung (Tiefe): Bei ausgesuchten Konzepten arbeiten sich die Studierenden punk-tuell in Realisierungsdetails ein. Die Studierenden gewinnen einen Eindruck der fachlichen und technischen Tiefe möglicher Realisierungen.\r\n- Heimarbeit/Übung (Entwurf): Die Studierenden erarbeiten für ausgesuchte Aufgabenstellun-gen eine konkrete Architektur und bestimmen konkrete Produkte, die für einen Einsatz in Frage kommen. Die Studierenden lernen dabei, wie sie grundlegende und konzeptionelle Überlegun-gen und Planungen mit konkreten Produkten realisieren.', 'IT Komponenten und IT Architekturen\r\nTypische Einsatz- und Betriebsszenarien\r\nMarkt und Anbieter\r\nRisiken und Herausforderungen\r\nTypische Beispiele für Inhalte sind:\r\n- Rechenzentren mit Server- und Storage-Systemen; Cloud Computing; Green IT; Datensi-cherheit und Datenschutz\r\n- Applikationsserver; Skalierung und Kapazitätsplanungen;\r\n- Load Balancing; Ausfallsicherheit; Eigenentwicklungen\r\n- Identity und Access Management; Enterprise Directories Felder', 'Schriftliche Klausur;;', 'deutsch', 'Literatur:\r\nMetzler-Andelberg; C.: Identity Management, dpunkt.verlag.\r\nReese, G.: Cloud Application Architectures, O''Reilly.\r\nTroppens, U.; Erkens, R.; Müller, W.: Speichernetze, dpunkt-verlag.\r\nLampe, F.: Green-IT, Virtualisierung und Thin Clients, Vieweg + Teubner. Jeweils neueste Auflage', 6, 4, NULL, NULL, NULL, NULL),
(116, '2014-12-12', 1, 'Freigegeben', 'ITRM', 'IT-Resource Management', 'IT-Resource Management', 'Sommersemester', 1, 'Seminar;;', 90, 30, 'Die Veranstaltung behandelt das Management wichtiger IT Ressourcen: Menschen, Informatio-nen, Anwendungen und Infrastruktur. Die Studierenden lernen die Gestaltungsmöglichkeiten der\r\nBeschaffung dieser Ressourcen kennen (IT Sourcing). Sie kennen rechtliche und vertragsrechtli-che\r\nGrundlagen, können Anforderungen aufnehmen sowie kritisch hinterfragen und IT Spezifikatio-nen erarbeiten. Sie können IT Beschaffungsvorhaben konzipieren, gestalten und durchführen. Die Ausgestaltung von Service Level Agreements ist ihnen geläufig und durch Sie anwendbar.\r\nIn diesem Modul wird das Management der wichtigen IT Ressourcen und auch deren Beschaf-fung\r\n(„Sourcing“) behandelt. Dazu gehören die Schlüsselkompetenzen Verhandeln\r\nsowie juristische und vertragliche Aspekte zu formulieren, aber auch Teamfähigkeit, Kommuni-kation und Präsentation.\r\nDie Lehrveranstaltung wird in der Regel mit einem Competence Workshop verbunden. Studie-rende sind in die Konzeption, Vorbereitung, Organisation und Durchführung involviert; sie set-zen\r\nsich intensiv mit geeigneten Themenbereichen innerhalb eines gegebenen Themenschwer-punkts\r\nwie z.B. IT Sourcing auseinander und wählen geeignete Unternehmen sowie entsprechende Referenten aus. Diese vermitteln in Impulsreferaten Studierenden praxisnahes Wissen. Die Studierenden haben die Möglichkeit, Referenten direkt zu befragen und ihr Wissen anwen-dungsorientiert zu vertiefen.\r\nSelbstmotivation/Selbststudium:\r\n- Heimarbeit/Übung (Breite): Die Wiederholung rechtlicher Grundlagen auf Basis ausgewählter Literatur führen die Studierenden selbständig durch.\r\n- Heimarbeit/Übung (Tiefe): Die Erstellung eines Pflichtenhefts insbesondere hinsichtlich der Spezifikation geeigneter Service Level Agreements üben die Studierenden im Rahmen einer\r\nkleineren Projektarbeit.', 'Ressourcen im Unternehmen / IT unterstütztes Management von Ressourcen\r\nIT Vertragsrecht und Anforderungsmanagement\r\nService Level Agreements\r\nIT Portfolio-Management\r\nInvestitions- und Lizenzmanagement\r\nIT Sourcing-Modelle\r\nTypische Beispiele für Inhalte sind:\r\n- IT Vertragsrecht\r\n- Anforderungsmanagement\r\n- Service Level Agreements\r\n- IT Portfolio- und Lebenszyklusmanagement', 'Schriftliche Klausur;;', 'deutsch', 'Zarnekow, R.: Produktionsmanagement von IT Dienstleistungen. Springer Verlag.\r\nJouanne-Diedrich, H.; Zarnekow, R.; Brenner, W.: Industrialisierung des IT Sourcings, in: HMD Praxis der Wirtschaftsinformatik 245, 2005, S. 18–27', 6, 4, NULL, NULL, NULL, NULL),
(117, '2014-12-12', 1, 'Freigegeben', 'KINT', 'Künstliche Intelligenz', 'Artificial Intelligence', 'Wintersemester', 1, 'Vorlesung;;Übung;;Praxisprojekt;;', 150, 30, 'Die Studierenden können vorwärtsgerichtete Netze aufbauen, ihre Architektur und Topologie festlegen, Trainingsdaten aufbereiten und ihre Ausgaben berechnen.\r\nSie können Verfahren zur Parameterreduktion auswählen und durchführen. Sie vergleichen Lern-verfahren und bewerten die Qualität der Netze und der zugrundeliegenden Daten anhand statisti-scher Auswertungen. Sie analysieren trainierte Netze, auch bez. einer Verbesserung der Ver-suchsplanung.\r\nDie Studierenden nutzen Kohonen-Netze zur Lösung topologischer Optimierungsprobleme und zur Klassenbildung und analysieren dadurch die Daten. Sie nutzen die Klassenbildung zur Ver-besserung der Lernfähigkeit vorwärts gerichteter Netze.\r\nSie verstehen die Arbeitsweise von Boltzmann-Maschinen und SVM (support vector machines) und können deren Kernfunktionen auswählen.\r\nSie erhalten einen Überblick über Anwendungsbereiche der verschiedenen Netztypen.\r\nDie Studierenden arbeiten sich in einem Projekt in existierende Software ein und erweitern diese. Sie trainieren Netze und analysieren die Ergebnisse, sie dokumentieren und präsentieren diese.', 'Netzmodelle: Schwellenwertelement, Perzeptron, vorwärtsgerichtete Netze, Hopfield-Netze, Boltz-mann-Maschinen, Sensorische und motorische Karten, Support Vector Machines.\r\nLernverfahren: Hebbsches Lernen, Gradientenabstieg, Levenberg-Marquardt, "Alles dem Sieger"\r\nDatenvorbereitung: Transformation der Trainingsdaten, Hauptachsenanalyse, Dimensionsanalyse\r\nBeurteilung der Netze und Versuchsplanung\r\nAnwendungen: Klassifizierungen, Mustererkennung, Wegeoptimierung, Funktionsapproximation, Prozesskontrolle und -optimierung, Vorhersagen bei Zeitreihen\r\nAufbau, Training von Netzen, Bewertung eines Netztrainings; Erweiterung und Änderung der benutz-ten MatLab-Software', 'Projektarbeit;;', 'deutsch', 'Skript in elektronischer Form\nNauck, D., F. Klawonn und R. Kruse: Neuronale Netze und Fuzzy-Systeme. Vieweg, Braunschweig, 1994. ISBN 3-528-05265-1\nRojas, R.: Neuronal Networks. Springer, New York, 1996. ISBN 3-540-60505-3.\nShawe-Taylor, John and Nello Cristianini: An Introduction to Support Vector Machines and other kernl-based learning methods. Cambridge University Press, Cambridge, UK, 2000. ISBN 3-519-06444-8.\nZupan, J. and J. Gasteiner: Neuronal Networks in Chemistry and Drug Design. Wiley VCH, Wein-heim, 1999. ISBN 3-527-29779-0.', 6, 19, NULL, NULL, NULL, NULL),
(118, '2014-12-12', 1, 'Freigegeben', 'MAST', 'Masterarbeit mit Kolloquium', 'Master Thesis', 'jedes Semester', 1, 'Selbststudium und Konsultationen;;', 870, NULL, 'Die Studenten werden befähigt ein komplexes Problem oder Aufgabenstellung aus Wis-senschaft, Industrie oder Gesellschaft selbständig zu bearbeiten und zu lösen. Dabei sind sie in der Lage verschiedene Lösungsansätze beurteilen und bewerten zu können. Zur Aufgabenlösung wenden sie das während des Studiums erworbene fachliche und fach-übergreifende Wissen an. Die Studenten planen und organisieren ihre wissenschaftliche Arbeit selbständig. Wissenschaftliche Informationsquellen können analysiert und ausge-wertet werden. Die Ergebnisse werden in der Masterarbeit wissenschaftlich exakt formu-liert und dargestellt. Im Rahmen des Kolloquiums präsentieren die Studenten ihre Vorge-hensweise, Methoden und Ergebnisse zusammenhängend und logisch.', 'Die Masterarbeit wird entweder an der Hochschule oder bei bzw. in Zusammenarbeit mit einem Unternehmen / einer Institution erstellt.\r\nDer Hochschullehrer fungiert als Betreuer. Er unterstützt die Studierenden im persönli-chen Gespräch hinsichtlich der Einhaltung der o.g. Lern- und Qualifikationsziele.\r\nJe nach Aufgabenstellung können auch mehrere Studierende am gleichen Projekt jedoch jeder für sich eigenständig arbeiten..', 'Vortrag;;schriftliche Ausarbeitung;;', 'deutsch', NULL, 15, 4, NULL, NULL, NULL, NULL),
(119, '2014-12-15', 1, 'Freigegeben', 'WEMU', 'Web and Mobile Usability', 'Web and Mobile Usability', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 120, 25, '- Kenntnis spezifischer Problem und zu erreichender Ziele bei der Integration von Systemen\r\n- Kenntnis und Fähigkeit zur Anwendung verschiedener Integrations-Pattern und deren direkter und\r\nindirekter Anwendung in Technologien und Lösungen.\r\n- Kenntnis der wichtigsten Technologien und Architekturen für verteilte Anwendungen mit mobilen\r\nEndgeräten und derer spezifischen Vor- und Nachteile.\r\n- Fähigkeit, bei gegebener Aufgabenstellung/Szenario eine begründete Empfehlung für die technologische\r\nArchitektur aussprechen zu können, inklusive eines qualifizierten Katalogs nutzbarer\r\nFrameworks.\r\n- Erlernen des praktischen Umgangs mit Technologien (Middleware) und Konzepten (Architekturen)\r\nzur Integration von verteilten Anwendungen und Integration von mobilen Endgeräten anhand von\r\nkleinen Beispielen', 'Die Vorlesung befasst sich mit folgenden Themen:\r\n- Usability: Begriffe / Definitionen, warum Usability\r\n- Der Benutzer\r\n- Benutzerverhalten im Web\r\n- Benutzeranforderungen\r\n- Unterschiede bei mobiler Nutzung\r\n- Strukturierung von Web-Sites: Informations-Architektur\r\n- Informationsarchitektur: Motivation, Begriffe\r\n- Organisationssysteme, Bezeichnungs-Systeme, Navigationssysteme, Suchsysteme\r\n- Mobile Usability: Strategien für mobile Websites und -Apps\r\n- Besonderheiten und Probleme bei der Nutzung mobiler Systeme\r\n- Umsetzung von Usability-Anforderungen für mobile Systeme\r\n- Responsive Web Design: Flexibles Design für mobile und stationäre Endgeräte\r\n- Usability Testing\r\n- Grundlagen und Methoden\r\n- Einführung in das Eye-Tracking für stationäre und mobile Endgeräte\r\n- Weitere Aspekte\r\n- E-Commerce Usability\r\n- Accessibility\r\n- Integration von Usability-Betrachtungen in den Entwicklungsprozess: Web-Projektierung; Fahrplan\r\nzum Erstellen von Web-Auftritten und Web-Apps.', 'Mündliche Prüfung;;Projektarbeit;;', 'deutsch', '- Steve Krug: Don''t make me think: A common sense approach to Web Usability; New Riders, 3rd\r\nrevised edition (December 24, 2013),\r\n- Morville, Rosenfeld: Information Architecture for the World Wide Web: Designing Large-Scale Web\r\nSites; O''Reilly Media; 3 edition (November 27, 2006),\r\n- Florence Maurice: Mobile Webseiten: Strategien, Dos und Don’ts für Webentwickler. Von Responsive\r\nWebdesign über jQuery Mobile bis zu separaten mobilen Seiten; Carl Hanser Verlag GmbH &\r\nCo. KG (2012)\r\n- Responsive Webdesign: Anpassungsfähige Websites programmieren und gestalten; Galileo Computing;\r\n1. Auflage (12. Dezember 2013)\r\n- Sydik: Design Accessible Web Sites: 36 Keys to Creating Content for All Audiences and Plat-forms;\r\nPragmatic Bookshelf; 1st edition (November 5, 2007)\r\n- Jens Jacobsen: Website Konzeption; dpunkt.verlag GmbH;\r\n7. aktualisierte Auflage (27. November 2013).', 3, 7, NULL, NULL, NULL, NULL),
(120, '2014-12-17', 1, 'Freigegeben', 'INMA1', 'Mathematik', 'Mathematics', 'Wintersemester', 1, 'Vorlesung;;Übung;;', 60, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- mathematische Grundkonzepte (Vektoroperationen, Gaußsches Eliminationsverfahren,\r\nDeterminantenrechnung, Matrixalgebra, Interpolationsverfahren, Ableitung und Integration\r\nelementarer Funktionen einer und mehrerer unabhängiger Variablen sowie\r\nzusammengesetzter Ausdrücke) wiederzugeben und anzuwenden\r\n- komplexe naturwissenschaftliche Zusammenhänge mathematisch zu modellieren', 'Gleichungen, lineare Gleichungssysteme, Determinanten\r\nFolgen und Reihen\r\nGrundlagen der Gruppentheorie, Permutationsgruppen\r\nKomplexe Zahlen\r\nVektorräume, Matrixalgebra\r\nFunktionen, Interpolationsverfahren\r\nDifferenzialrechnung für Funktionen einer und mehrerer Variablen\r\nIntegralrechnung (Riemannsches Integral) für Funktionen einer und mehrerer Variablen', 'Schriftliche Klausur;;', 'deutsch', 'Arens, Hettlich, Karpfinger, Kockelkorn, Lichtenegger, Stachel : Mathematik, Spektrum\r\nAkademischer Verlag, ISBN 978-3-8274-1758-9\r\nSwokowski, Olinick, Pence : Calculus, ISBN 0-534-93624-5\r\nMangoldt, Hans von ; Knopp, Konrad : Höhere Mathematik I bis IV, S. Hirzel Verlag,\r\nISBN 978-3777604749\r\nHeuser, H : Lehrbuch der Analysis Teil 1, Teubner Verlag, ISBN 978-3-8351-0131-9', 9, 24, NULL, NULL, NULL, NULL);
INSERT INTO `Veranstaltung` (`Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `modulbeauftragter`, `KontaktzeitVL`, `KontaktzeitSonstige`, `VoraussetzungLP`, `VoraussetzungInhalte`) VALUES
(121, '2014-12-17', 1, 'Freigegeben', 'WINF', 'Grundlagen Wirtschaftsinformatik', 'Foundations Business Informatics', 'Sommersemester', 1, 'Vorlesung;;Übung;;', 120, 30, 'Die Studierenden sind in der Lage, die grundlegenden theoretischen und praktischen Aspekte der\r\nWirtschaftsinformatik wiederzugeben, zu erklären und zu erläutern.\r\nDie Studierenden sollen Anwendungsgebiete betrieblicher Informationssysteme in der Grundstruktur\r\nerfassen sowie grundlegende Kenntnisse über die Struktur, Funktionalität und Einsatzpotentiale von dezidierten operativen Systemen und von Management-Support-Systemen erwerben. Sie sollen\r\ndabei Zusammenhänge zwischen den Anwendungsgebieten der Wirtschaftsinformatik erkennen\r\nkönnen.\r\nDie Studierenden sollen grundlegende Aspekte des betrieblichen Managements von Informationsverarbeitung\r\nkennen und einordnen können.', '- Theoretische Grundlagen\r\n- Grundlagen und Klassen von Informationssystemen\r\n- Anwendungen im Unternehmen und unternehmensübergreifende Anwendungen\r\n- Planung, Realisierung und Einführung von betrieblichen Informationssystemen\r\n- Grundlegende Aspekte des Informationsmanagements\r\n- weitere Aspekte der Wirtschaftsinformatik .', 'Schriftliche Klausur;;', 'deutsch', '- Skript zur Vorlesung,\r\n- Mertens P, Bodendorf F., Grundzüge der Wirtschaftsinformatik, Springer\r\n- Schwarzer B., Krcmar H., Grundlagen betrieblicher Informationssysteme, Schäffer-Poeschel\r\n- Abts, D., Grundkurs Wirtschaftsinformatik: Eine kompakte und praxisorientierte Einführung, Vieweg+\r\nTeubner\r\n- Hansen H.R., Neumann G., Wirtschaftsinformatik 1 + 2, UTB Stuttgartl', 6, 8, NULL, NULL, NULL, NULL),
(122, '2014-12-21', 1, 'in Planung', 'TEST', 'TEST MODUL', 'TEST MODUL', 'wechselnd', 0, 'Vorlesung;;', 1, 1, 'TEST\r\nErgebnis 1\r\nErgebnis 2', 'TEST', 'Schriftliche Klausur;;', 'englisch', 'TEST', 3, 8, NULL, NULL, NULL, NULL),
(125, '2014-12-28', 0, 'in Planung', 'qwer', 'planung3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL),
(127, '2014-12-30', 1, 'freigegeben', 'YATM', 'Noch ein Testmodul', 'Yet another test module', 'jedes Semester', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'deutsch', NULL, 3, 1, NULL, NULL, 'a:2:{i:0;s:17:"Prüfungsleistung";i:1;s:15:"Studienleistung";}', NULL);

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Vertiefung`
--

CREATE TABLE IF NOT EXISTS `Vertiefung` (
  `studiengang` int(11) NOT NULL,
  `Vertiefung_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Vertiefung_ID`),
  UNIQUE KEY `UNIQ_ADD02E5EFE11D138` (`Name`),
  KEY `IDX_ADD02E5EBA290AAB` (`studiengang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Daten für Tabelle `Vertiefung`
--

INSERT INTO `Vertiefung` (`studiengang`, `Vertiefung_ID`, `Name`) VALUES
(2, 2, 'Softwaretechnik'),
(2, 4, 'Unternehmens IT'),
(2, 5, 'Graphisch Interaktive Systeme'),
(10, 15, 'Test-VR1'),
(10, 24, 'Test-VR3'),
(10, 26, 'Test-VR4');

-- --------------------------------------------------------


--
-- Tabellenstruktur für Tabelle `Voraussetzungen`
--

CREATE TABLE IF NOT EXISTS `Voraussetzungen` (
  `modul` int(11) NOT NULL,
  `modulVoraussetzung` int(11) NOT NULL,
  PRIMARY KEY (`modul`,`modulVoraussetzung`),
  KEY `IDX_ACC54BBD9D576088` (`modul`),
  KEY `IDX_ACC54BBDBC4DD28F` (`modulVoraussetzung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `Voraussetzungen`
--

INSERT INTO `Voraussetzungen` (`modul`, `modulVoraussetzung`) VALUES
(48, 3),
(67, 55);


--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Angebot`
--
ALTER TABLE `Angebot`
  ADD CONSTRAINT `FK_945ABEF6BA290AAB` FOREIGN KEY (`studiengang`) REFERENCES `Studiengang` (`Studiengang_ID`),
  ADD CONSTRAINT `FK_945ABEF64FBE0E43` FOREIGN KEY (`fachgebiet`) REFERENCES `Fachgebiet` (`Fachgebiets_ID`),
  ADD CONSTRAINT `FK_945ABEF69D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_945ABEF6B1D660BA` FOREIGN KEY (`mhb`) REFERENCES `Modulhandbuch` (`MHB_ID`);

--
-- Constraints der Tabelle `Dozent`
--
ALTER TABLE `Dozent`
  ADD CONSTRAINT `FK_D8E1B37A38C751C4` FOREIGN KEY (`roles_id`) REFERENCES `Roles` (`id`);

--
-- Constraints der Tabelle `Fachgebiet`
--
ALTER TABLE `Fachgebiet`
  ADD CONSTRAINT `FK_E30D93BA290AAB` FOREIGN KEY (`studiengang`) REFERENCES `Studiengang` (`Studiengang_ID`);

--
-- Constraints der Tabelle `Kernfach`
--
ALTER TABLE `Kernfach`
  ADD CONSTRAINT `FK_F252DFB0E28D2D8E` FOREIGN KEY (`vertiefung`) REFERENCES `Vertiefung` (`Vertiefung_ID`),
  ADD CONSTRAINT `FK_F252DFB09D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`);

--
-- Constraints der Tabelle `Lehrende`
--
ALTER TABLE `Lehrende`
  ADD CONSTRAINT `FK_D7D38F7EDF4DB64C` FOREIGN KEY (`dozent`) REFERENCES `Dozent` (`Dozenten_ID`),
  ADD CONSTRAINT `FK_D7D38F7E9D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`);

--
-- Constraints der Tabelle `Modulhandbuch`
--
ALTER TABLE `Modulhandbuch`
  ADD CONSTRAINT `FK_5B069A3DA4DC89DA` FOREIGN KEY (`gehoertZu`) REFERENCES `Studiengang` (`Studiengang_ID`),
  ADD CONSTRAINT `FK_5B069A3DD1399647` FOREIGN KEY (`gueltigAb`) REFERENCES `Semester` (`Semester`);

--
-- Constraints der Tabelle `Semesterplan`
--
ALTER TABLE `Semesterplan`
  ADD CONSTRAINT `FK_3E93F4AEF7388EED` FOREIGN KEY (`semester`) REFERENCES `Semester` (`Semester`),
  ADD CONSTRAINT `FK_3E93F4AE9D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_3E93F4AEDF4DB64C` FOREIGN KEY (`dozent`) REFERENCES `Dozent` (`Dozenten_ID`);

--
-- Constraints der Tabelle `Studiengang`
--
ALTER TABLE `Studiengang`
  ADD CONSTRAINT `FK_3CB5857CC74EDF08` FOREIGN KEY (`sgl`) REFERENCES `Dozent` (`Dozenten_ID`);

--
-- Constraints der Tabelle `Studienplan`
--
ALTER TABLE `Studienplan`
  ADD CONSTRAINT `FK_7E7DD62BA290AAB` FOREIGN KEY (`studiengang`) REFERENCES `Studiengang` (`Studiengang_ID`),
  ADD CONSTRAINT `FK_7E7DD6273B53343` FOREIGN KEY (`startsemester`) REFERENCES `Semester` (`Semester`),
  ADD CONSTRAINT `FK_7E7DD629D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`);

--
-- Constraints der Tabelle `Veranstaltung`
--
ALTER TABLE `Veranstaltung`
  ADD CONSTRAINT `FK_217D6026F3B07FDF` FOREIGN KEY (`modulbeauftragter`) REFERENCES `Dozent` (`Dozenten_ID`);

--
-- Constraints der Tabelle `Vertiefung`
--
ALTER TABLE `Vertiefung`
  ADD CONSTRAINT `FK_ADD02E5EBA290AAB` FOREIGN KEY (`studiengang`) REFERENCES `Studiengang` (`Studiengang_ID`);

--
-- Constraints der Tabelle `Voraussetzungen`
--
ALTER TABLE `Voraussetzungen`
  ADD CONSTRAINT `FK_ACC54BBDBC4DD28F` FOREIGN KEY (`modulVoraussetzung`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_ACC54BBD9D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
