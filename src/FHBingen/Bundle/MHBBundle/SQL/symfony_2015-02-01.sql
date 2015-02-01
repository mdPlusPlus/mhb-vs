-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 01. Feb 2015 um 15:07
-- Server Version: 5.5.41-0ubuntu0.14.04.1
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
  `fachgebiet` int(11) NOT NULL,
  `studiengang` int(11) NOT NULL,
  `Angebots_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Angebotsart` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `AbweichenderNameDE` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AbweichenderNameEN` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Angebots_ID`),
  KEY `IDX_945ABEF69D576088` (`modul`),
  KEY `IDX_945ABEF64FBE0E43` (`fachgebiet`),
  KEY `IDX_945ABEF6BA290AAB` (`studiengang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=280 ;

--
-- Daten für Tabelle `Angebot`
--

INSERT INTO `Angebot` (`modul`, `fachgebiet`, `studiengang`, `Angebots_ID`, `Angebotsart`, `Code`, `AbweichenderNameDE`, `AbweichenderNameEN`) VALUES
(1, 34, 2, 1, 'Pflichtfach', 'B-IN-IG03', NULL, NULL),
(3, 34, 2, 3, 'Pflichtfach', 'B-IN-IG11', NULL, NULL),
(4, 34, 2, 4, 'Pflichtfach', 'B-IN-IV02', NULL, NULL),
(16, 34, 2, 5, 'Pflichtfach', 'B-IN-IG10', NULL, NULL),
(17, 34, 2, 6, 'Pflichtfach', 'B-IN-IG04', NULL, NULL),
(18, 34, 2, 7, 'Pflichtfach', 'B-IN-IG09', NULL, NULL),
(19, 34, 2, 8, 'Pflichtfach', 'B-IN-IG06', NULL, NULL),
(20, 34, 2, 9, 'Pflichtfach', 'B-IN-IG07', NULL, NULL),
(21, 34, 2, 10, 'Pflichtfach', 'B-IN-IG08', NULL, NULL),
(5, 34, 2, 11, 'Pflichtfach', 'B-IN-IV01', NULL, NULL),
(6, 34, 2, 12, 'Pflichtfach', 'B-IN-V05', NULL, NULL),
(7, 34, 2, 13, 'Pflichtfach', 'B-IN-V06', NULL, NULL),
(8, 24, 2, 14, 'Pflichtfach', 'B-IN-MN02', NULL, NULL),
(9, 24, 2, 15, 'Pflichtfach', 'B-IN-MN03', NULL, NULL),
(10, 24, 2, 16, 'Pflichtfach', 'B-IN-MN04', NULL, NULL),
(11, 24, 2, 17, 'Pflichtfach', 'B-IN-IG05', NULL, NULL),
(12, 24, 2, 18, 'Pflichtfach', 'B-IN-IG01', NULL, NULL),
(22, 35, 2, 19, 'Pflichtfach', 'B-IN-AG02', NULL, NULL),
(23, 35, 2, 20, 'Pflichtfach', 'B-IN-AG03', NULL, NULL),
(24, 36, 2, 21, 'Pflichtfach', 'B-IN-BW01', NULL, NULL),
(25, 36, 2, 22, 'Pflichtfach', 'B-IN-BW02', NULL, NULL),
(26, 37, 2, 23, 'Wahlpflichtfach', 'B-IN-WP01', NULL, NULL),
(28, 37, 2, 24, 'Wahlpflichtfach', 'B-IN-WP02', NULL, NULL),
(29, 37, 2, 25, 'Wahlpflichtfach', 'B-IN-WP03', NULL, NULL),
(30, 37, 2, 26, 'Wahlpflichtfach', 'B-IN-WP04', NULL, NULL),
(81, 37, 2, 27, 'Wahlpflichtfach', 'B-IN-WP06', NULL, NULL),
(32, 37, 2, 28, 'Wahlpflichtfach', 'B-IN-WP07', NULL, NULL),
(33, 37, 2, 29, 'Wahlpflichtfach', 'B-IN-WP17', NULL, NULL),
(34, 37, 2, 30, 'Wahlpflichtfach', 'B-IN-WP08', NULL, NULL),
(35, 37, 2, 31, 'Wahlpflichtfach', 'B-IN-WP09', NULL, NULL),
(36, 37, 2, 32, 'Wahlpflichtfach', 'B-IN-WP10', NULL, NULL),
(37, 37, 2, 33, 'Wahlpflichtfach', 'B-IN-WP11', NULL, NULL),
(38, 37, 2, 34, 'Wahlpflichtfach', 'B-IN-WP12', NULL, NULL),
(39, 37, 2, 35, 'Wahlpflichtfach', 'B-IN-WP13', NULL, NULL),
(44, 37, 2, 36, 'Wahlpflichtfach', 'B-IN-WP05', NULL, NULL),
(40, 37, 2, 37, 'Wahlpflichtfach', 'B-IN-WP15', NULL, NULL),
(49, 37, 2, 38, 'Wahlpflichtfach', 'B-IN-WP14', NULL, NULL),
(121, 37, 2, 39, 'Wahlpflichtfach', 'B-IN-WP16', NULL, NULL),
(41, 37, 2, 40, 'Wahlpflichtfach', 'B-IN-WP18', NULL, NULL),
(42, 37, 2, 41, 'Wahlpflichtfach', 'B-IN-WP19', NULL, NULL),
(43, 37, 2, 42, 'Wahlpflichtfach', 'B-IN-WP20', NULL, NULL),
(45, 37, 2, 43, 'Wahlpflichtfach', 'B-IN-WP21', NULL, NULL),
(46, 37, 2, 44, 'Wahlpflichtfach', 'B-IN-WP22', NULL, NULL),
(53, 37, 2, 45, 'Wahlpflichtfach', 'B-IN-WP23', NULL, NULL),
(47, 37, 2, 46, 'Wahlpflichtfach', 'B-IN-WP24', NULL, NULL),
(62, 37, 2, 47, 'Wahlpflichtfach', 'B-IN-WP25', NULL, NULL),
(48, 38, 2, 48, 'Pflichtfach', 'B-IN-PP01', NULL, NULL),
(65, 38, 2, 49, 'Pflichtfach', 'B-IN-PP02', NULL, NULL),
(66, 38, 2, 50, 'Pflichtfach', 'B-IN-PP03', NULL, NULL),
(54, 23, 3, 116, 'Pflichtfach', 'B-BI-MN02', NULL, NULL),
(55, 23, 3, 117, 'Pflichtfach', 'B-BI-MN03', NULL, NULL),
(56, 23, 3, 118, 'Pflichtfach', 'B-BI-MN04', NULL, NULL),
(57, 23, 3, 119, 'Pflichtfach', 'B-BI-MN05', NULL, NULL),
(12, 25, 3, 120, 'Pflichtfach', 'B-BI-PI01', NULL, NULL),
(1, 25, 3, 121, 'Pflichtfach', 'B-BI-PI02', NULL, NULL),
(17, 25, 3, 123, 'Pflichtfach', 'B-BI-PI04', NULL, NULL),
(19, 25, 3, 124, 'Pflichtfach', 'B-BI-PI05', NULL, NULL),
(20, 25, 3, 125, 'Pflichtfach', 'B-BI-PI08', NULL, NULL),
(6, 25, 3, 126, 'Pflichtfach', 'B-BI-PI10', NULL, NULL),
(7, 25, 3, 127, 'Pflichtfach', 'B-BI-PI11', NULL, NULL),
(59, 27, 3, 128, 'Pflichtfach', 'B-BI-PI06', NULL, NULL),
(60, 27, 3, 129, 'Pflichtfach', 'B-BI-PI07', NULL, NULL),
(61, 26, 3, 130, 'Pflichtfach', 'B-BI-PI09', NULL, NULL),
(63, 26, 3, 131, 'Pflichtfach', 'B-BI-PB02', NULL, NULL),
(64, 26, 3, 132, 'Pflichtfach', 'B-BI-PB03', NULL, NULL),
(67, 26, 3, 133, 'Pflichtfach', 'B-BI-PB04', NULL, NULL),
(69, 26, 3, 135, 'Pflichtfach', 'B-BI-PB05', NULL, NULL),
(70, 26, 3, 136, 'Pflichtfach', 'B-BI-PB01', NULL, NULL),
(72, 28, 3, 137, 'Pflichtfach', 'B-BI-PÜ01', NULL, NULL),
(74, 28, 3, 138, 'Pflichtfach', 'B-BI-PÜ02', NULL, NULL),
(24, 28, 3, 139, 'Pflichtfach', 'B-BI-PÜ03', 'Betriebswirtschaftslehre', NULL),
(75, 28, 3, 140, 'Pflichtfach', 'B-BI-PÜ04', NULL, NULL),
(21, 29, 3, 141, 'Wahlpflichtfach', 'B-BI-WI01', NULL, NULL),
(28, 30, 3, 142, 'Wahlpflichtfach', 'B-BI-WI02', NULL, NULL),
(16, 30, 3, 143, 'Wahlpflichtfach', 'B-BI-WI03', NULL, NULL),
(26, 30, 3, 144, 'Wahlpflichtfach', 'B-BI-WI04', NULL, NULL),
(30, 30, 3, 145, 'Wahlpflichtfach', 'B-BI-WI08', NULL, NULL),
(5, 30, 3, 146, 'Wahlpflichtfach', 'B-BI-WI09', NULL, NULL),
(77, 31, 3, 147, 'Wahlpflichtfach', 'B-BI-WI07', NULL, NULL),
(78, 30, 3, 148, 'Wahlpflichtfach', 'B-BI-WI10', NULL, NULL),
(79, 31, 3, 149, 'Wahlpflichtfach', 'B-BI-WI05', NULL, NULL),
(80, 31, 3, 151, 'Wahlpflichtfach', 'B-BI-WI06', NULL, NULL),
(81, 31, 3, 152, 'Wahlpflichtfach', 'B-BI-WI11', NULL, NULL),
(83, 29, 3, 153, 'Wahlpflichtfach', 'B-BI-WB01', NULL, NULL),
(84, 29, 3, 154, 'Wahlpflichtfach', 'B-BI-WB02', NULL, NULL),
(86, 29, 3, 155, 'Wahlpflichtfach', 'B-BI-WB03', NULL, NULL),
(87, 29, 3, 156, 'Wahlpflichtfach', 'B-BI-WB04', NULL, NULL),
(89, 29, 3, 157, 'Wahlpflichtfach', 'B-BI-WB05', NULL, NULL),
(90, 29, 3, 158, 'Wahlpflichtfach', 'B-BI-WB06', NULL, NULL),
(92, 29, 3, 159, 'Wahlpflichtfach', 'B-BI-WB07', NULL, NULL),
(93, 29, 3, 160, 'Wahlpflichtfach', 'B-BI-WB08', NULL, NULL),
(94, 29, 3, 161, 'Wahlpflichtfach', 'B-BI-WB09', NULL, NULL),
(8, 42, 4, 162, 'Pflichtfach', 'B-IN-MN01', NULL, NULL),
(9, 42, 4, 163, 'Pflichtfach', 'B-MC-MN02', NULL, NULL),
(12, 42, 4, 164, 'Pflichtfach', 'B-MC-MN03', NULL, NULL),
(22, 41, 4, 165, 'Pflichtfach', 'B-MC-AG01', NULL, NULL),
(23, 41, 4, 166, 'Pflichtfach', 'B-MC-AG02', NULL, NULL),
(24, 43, 4, 167, 'Pflichtfach', 'B-MC-BW01', NULL, NULL),
(82, 43, 4, 168, 'Pflichtfach', 'B-MC-BW02', NULL, NULL),
(1, 51, 4, 169, 'Pflichtfach', 'B-MC-IG01', NULL, NULL),
(3, 51, 4, 171, 'Pflichtfach', 'B-MC-IG03', NULL, NULL),
(16, 51, 4, 172, 'Pflichtfach', 'B-MC-IG04', NULL, NULL),
(17, 51, 4, 173, 'Pflichtfach', 'B-MC-IG05', NULL, NULL),
(19, 51, 4, 174, 'Pflichtfach', 'B-MC-IG06', NULL, NULL),
(20, 51, 4, 175, 'Pflichtfach', 'B-MC-IG07', NULL, NULL),
(6, 51, 4, 176, 'Pflichtfach', 'B-MC-IG08', NULL, NULL),
(18, 51, 4, 177, 'Pflichtfach', 'B-MC-IG09', NULL, NULL),
(51, 52, 4, 178, 'Pflichtfach', 'B-MC-MC01', NULL, NULL),
(5, 52, 4, 179, 'Pflichtfach', 'B-MC-MC02', NULL, NULL),
(52, 52, 4, 180, 'Pflichtfach', 'B-MC-MC03', NULL, NULL),
(68, 52, 4, 181, 'Pflichtfach', 'B-MC-MC04', NULL, NULL),
(71, 52, 4, 182, 'Wahlpflichtfach', 'B-MC-MC05', NULL, NULL),
(73, 52, 4, 183, 'Pflichtfach', 'B-MC-MC06', NULL, NULL),
(76, 52, 4, 184, 'Pflichtfach', 'B-MC-MC07', NULL, NULL),
(37, 52, 4, 186, 'Pflichtfach', 'B-MC-MC09', 'Mensch-Maschine-Interaktion', NULL),
(48, 45, 4, 187, 'Pflichtfach', 'B-MC-PP01', NULL, NULL),
(65, 45, 4, 188, 'Pflichtfach', 'B-MC-PP02', NULL, NULL),
(66, 45, 4, 189, 'Pflichtfach', 'B-MC-PP03', NULL, NULL),
(26, 44, 4, 190, 'Wahlpflichtfach', 'B-MC-WP01', NULL, NULL),
(28, 44, 4, 191, 'Wahlpflichtfach', 'B-MC-WP02', NULL, NULL),
(29, 44, 4, 192, 'Wahlpflichtfach', 'B-MC-WP03', NULL, NULL),
(81, 44, 4, 193, 'Pflichtfach', 'B-MC-WP04', NULL, NULL),
(32, 44, 4, 194, 'Wahlpflichtfach', 'B-MC-WP05', NULL, NULL),
(33, 44, 4, 195, 'Wahlpflichtfach', 'B-MC-WP06', NULL, NULL),
(35, 44, 4, 196, 'Wahlpflichtfach', 'B-MC-WP08', NULL, NULL),
(34, 44, 4, 197, 'Wahlpflichtfach', 'B-MC-WP07', NULL, NULL),
(36, 44, 4, 198, 'Wahlpflichtfach', 'B-MC-WP09', NULL, NULL),
(38, 44, 4, 199, 'Wahlpflichtfach', 'B-MC-WP10', NULL, NULL),
(39, 44, 4, 200, 'Wahlpflichtfach', 'B-MC-WP11', NULL, NULL),
(40, 44, 4, 201, 'Wahlpflichtfach', 'B-MC-WP12', NULL, NULL),
(49, 44, 4, 202, 'Wahlpflichtfach', 'B-MC-WP13', NULL, NULL),
(41, 44, 4, 203, 'Wahlpflichtfach', 'B-MC-WP15', NULL, NULL),
(42, 44, 4, 204, 'Wahlpflichtfach', 'B-MC-WP16', NULL, NULL),
(45, 44, 4, 206, 'Wahlpflichtfach', 'B-MC-WP18', NULL, NULL),
(46, 44, 4, 207, 'Wahlpflichtfach', 'B-MC-WP19', NULL, NULL),
(53, 44, 4, 208, 'Wahlpflichtfach', 'B-MC-WP20', NULL, NULL),
(85, 44, 4, 209, 'Wahlpflichtfach', 'B-MC-WP21', NULL, NULL),
(11, 44, 4, 210, 'Wahlpflichtfach', 'B-MC-WP22', NULL, NULL),
(88, 44, 4, 211, 'Wahlpflichtfach', 'B-MC-WP23', NULL, NULL),
(91, 44, 4, 212, 'Wahlpflichtfach', 'B-MC-WP24', NULL, NULL),
(99, 47, 5, 213, 'Pflichtfach', 'M-IS-MN01', NULL, NULL),
(96, 53, 5, 215, 'Pflichtfach', 'M-IS-IN02', NULL, NULL),
(97, 53, 5, 216, 'Pflichtfach', 'M-IS-IN03', NULL, NULL),
(95, 53, 5, 217, 'Pflichtfach', 'M-IS-IN01', NULL, NULL),
(98, 53, 5, 218, 'Pflichtfach', 'M-IS-IN04', NULL, NULL),
(101, 48, 5, 220, 'Wahlpflichtfach', 'M-IS-WP03', NULL, NULL),
(102, 48, 5, 221, 'Wahlpflichtfach', 'M-IS-WP04', NULL, NULL),
(100, 48, 5, 222, 'Wahlpflichtfach', 'M-IS-WP02', NULL, NULL),
(103, 48, 5, 223, 'Wahlpflichtfach', 'M-IS-WP06', NULL, NULL),
(104, 48, 5, 224, 'Wahlpflichtfach', 'M-IS-WP07', NULL, NULL),
(105, 48, 5, 225, 'Wahlpflichtfach', 'M-IS-WP08', NULL, NULL),
(106, 48, 5, 226, 'Wahlpflichtfach', 'M-IS-WP09', NULL, NULL),
(107, 48, 5, 227, 'Wahlpflichtfach', 'M-IS-WP12', NULL, NULL),
(109, 49, 5, 228, 'Wahlpflichtfach', 'M-IS-WP01', NULL, NULL),
(110, 49, 5, 229, 'Wahlpflichtfach', 'M-IS-WP05', NULL, NULL),
(111, 49, 5, 230, 'Wahlpflichtfach', 'M-IS-WP11', NULL, NULL),
(112, 49, 5, 231, 'Wahlpflichtfach', 'M-IS-WP10', NULL, NULL),
(113, 49, 5, 232, 'Wahlpflichtfach', 'M-IS-WP16', NULL, NULL),
(114, 53, 5, 233, 'Wahlpflichtfach', 'M-IS-WP18', NULL, NULL),
(121, 44, 4, 234, 'Wahlpflichtfach', 'B-MC-WP14', NULL, NULL),
(120, 23, 3, 235, 'Pflichtfach', 'B-BI-MN01', NULL, NULL),
(6, 48, 5, 236, 'Wahlpflichtfach', 'M-IS-WP13', NULL, NULL),
(7, 48, 5, 237, 'Wahlpflichtfach', 'M-IS-WP14', NULL, NULL),
(108, 48, 5, 238, 'Wahlpflichtfach', 'M-IS-WP15', NULL, NULL),
(118, 50, 5, 239, 'Pflichtfach', 'M-IS-PP01', NULL, NULL),
(115, 49, 5, 240, 'Wahlpflichtfach', 'M-IS-WP19', NULL, NULL),
(116, 49, 5, 243, 'Wahlpflichtfach', 'M-IS-WP20', NULL, NULL),
(58, 26, 3, 245, 'Pflichtfach', 'B-BI-MN06', NULL, NULL),
(117, 49, 5, 246, 'Wahlpflichtfach', 'M-IS-WP21', NULL, NULL),
(119, 52, 4, 247, 'Pflichtfach', 'B-MC-MC08', NULL, NULL),
(43, 44, 4, 258, 'Wahlpflichtfach', 'B-MC-WP17', NULL, NULL),
(65, 32, 3, 259, 'Pflichtfach', 'B-BI-PP01', NULL, NULL),
(66, 33, 3, 260, 'Pflichtfach', 'B-BI-BA01', NULL, NULL),
(140, 34, 2, 261, 'Pflichtfach', 'B-IN-IG02', NULL, NULL),
(140, 25, 3, 262, 'Pflichtfach', 'B-BI-PI03', 'Objektorientierte Programmierung', 'Objectoriented Programming'),
(140, 51, 4, 263, 'Pflichtfach', 'B-MC-IG02', NULL, NULL),
(153, 37, 2, 274, 'Wahlpflichtfach', 'DUMMY', NULL, NULL),
(154, 72, 12, 275, 'Pflichtfach', 'DUMMY', NULL, NULL),
(152, 29, 3, 277, 'Wahlpflichtfach', 'DUMMY', NULL, NULL),
(155, 48, 5, 278, 'Wahlpflichtfach', 'DUMMY', NULL, NULL),
(156, 73, 12, 279, 'Pflichtfach', 'DUMMY', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Daten für Tabelle `Dozent`
--

INSERT INTO `Dozent` (`roles_id`, `Dozenten_ID`, `Anrede`, `Titel`, `Name`, `Nachname`, `email`, `password`, `is_active`) VALUES
(2, 1, 'Frau', 'Prof. Dr. rer. nat.', 'Antje', 'Krause', 'akrause@fh-bingen.de', '$2y$12$mZoe2eY36iWK2MXNXxfK1eX8BuiarcfoBAs2sgmThW/T0MQQi25oi', 1),
(1, 2, 'Herr', 'Prof. Dr.-Ing.', 'Klaus', 'Lang', 'lang@fh-bingen.de', '$2y$12$.vVcGXWa/52t4dwUHC4jeOOPeSM8M7M1aI2xspukgQm6Y/g.FhRQC', 1),
(1, 3, 'Herr', 'Prof. Dr.-Ing.', 'Volker', 'Luckas', 'luckas@fh-bingen.de', '$2y$12$VMFUgOgMjzd0ofaXok8LXO5AcHRe2YY06R6x.i5C/vljmYcL/ZbF.', 1),
(2, 4, 'Herr', 'Prof. Dr. rer. nat.', 'Thomas', 'Marx', 'marx@fh-bingen.de', '$2y$12$ETZ1twmyqHE/Fk599EfDdeFVt11Cm6Fs1XZOAUxrHbXKZ7ket6hiG', 1),
(1, 5, 'Herr', 'Prof. Dr.', 'Frank', 'Mehler', 'mehler@fh-bingen.de', '$2y$12$bgDs9fspG2f5b72MwRT.ROI2Kc9zgWyWRnh3niC7D.LIo/UAXjdSy', 1),
(1, 6, 'Herr', 'Prof. Dr.-Ing.', 'Maximilian', 'Mengel', 'megel@fh-bingen.de', '$2y$12$AihOTjHkAJtFAY297X.J4eb.mhEaSZ8/twqyx6aoccnT5jiQkb8dG', 1),
(1, 7, 'Herr', 'Prof. Dr. rer. nat.', 'Hans-Christian', 'Rodrian', 'rodrian@fh-bingen.de', '$2y$12$z5bKAtbD8b7rZ.s4fgcB.OBHqximvX8/SZihzrlIP3ZvoS9JvNHy.', 1),
(2, 8, 'Herr', 'Prof. Dr.', 'Michael', 'Schmidt', 'schmidt@fh-bingen.de', '$2y$12$LzyVHjkkSYwsBTWpCdW2sOq2MytwUN9dWMcNb.UyqPN8vGDCcymka', 1),
(1, 9, 'Herr', 'Prof. Dr.-Ing.', 'Jörg', 'Schultz', 'schultz@fh-bingen.de', '$2y$12$d5ApVjTh2Xojug4Wzieq1e5PfwsEzBagpIvzQK0DaPEbUts5OwMgu', 1),
(2, 11, 'Herr', 'Prof. Dr.-Ing.', 'Cornelius', 'Wille', 'wille@fh-bingen.de', '$2y$12$igAu7VKFxazM1OoeHDoiPOquQlSFcF7B5Fohs1engUH3qTSdAeXze', 1),
(1, 12, 'Herr', 'Prof. Dr.', 'Rudolf', 'Winkel', 'winkel@fh-bingen.de', '$2y$12$b1DjhEnMOnLb.NDnQLVDBehLS4KLLesbEoi9O5Y.ZWjtRE2Nku9pm', 1),
(1, 13, 'Herr', 'Dipl.-Wirt.-Inf', 'Korhan', 'Ekinci', 'Korhan.ekinci@fh-mainz.de', '$2y$12$mf9NzWf6OQeGPtnzDNNZ5.mw.A9GhiLtwGOywUluXaMq/8U/RNINS', 1),
(1, 14, 'Frau', 'Dipl.-Schau.', 'Andrea', 'Stasche', 'info@sprech-art.de', '$2y$12$nOsfDbM5vzObpgQjLqA9hORZxqYQsXIlOBJAqU5DSkarlPfBwIoiC', 1),
(1, 15, 'Herr', 'Dipl.-Inf. (FH)', 'Martin', 'Raabe', 'm.raabe@fh-bingen.de', '$2y$12$Si6/J8JR2UYUItQvrKcZ5egpKGraBAINYUu/7nBDIq.zXaipqv/FG', 1),
(1, 16, 'Herr', 'RA', 'Wolfram', 'Zech', 'wolfram.zech@kanzlei-am-rheinkai.de', '$2y$12$fogGOIdS4TdkM/gOXUsMJeghNK2PsD8ljWn7W1NOW7dyrijww7hE6', 1),
(1, 17, 'Herr', 'Prof. Dr.-Ing.', 'Jens', 'Altenburg', 'j.altenburg@fh-bingen.de', '$2y$12$ujWKnro5Xy194LLKuH1YAejI/2dB2Y/CPIKEwp6jDFUURosVJiHNW', 1),
(1, 18, 'Herr', 'Prof. Dr.', 'Johannes', 'Pellenz', 'johannes.pellenz@uni-koblenz.de', '$2y$12$Bnm48xe2nkxi1nUFcppza.YltvViy702zqxbCNYz8myYSH7yfCKK.', 1),
(1, 19, 'Herr', 'Prof. Dr.', 'Dieter', 'Kilsch', 'd.kilsch@fh-bingen.de', '$2y$12$MaiwKMuWbjt.j101jmQyT.h/zGK/ySo5Q/MZHrb0QxgbyJHzgLFVa', 1),
(1, 20, 'Frau', 'Prof. Dr.', 'Cornelia', 'Lorenz-Haas', 'c.lorenz-haas@fh-bingen.de', '$2y$12$5ecnXWu.7urayrHY7ymfE.aUDoFFS730pJotA0st2.KZYROFuo1VC', 1),
(1, 21, 'Herr', 'Prof. Dr.-Ing.', 'Kai', 'Muffler', 'k.muffler@fh-bingen.de', '$2y$12$TLrZiCCfW48JClgnjA0IZuk55yIhZ5BZAusqMEk8WByAasYfPaVCe', 1),
(1, 22, 'Herr', 'Prof. Dr. agr.', 'Claus Heinrich', 'Stier', 'c.stier@fh-bingen.de', '$2y$12$35XRGfHk00LQlnFdAcKVbuDDFHdaeGyXn8ukhbOIOdjBnJJXrGgh.', 1),
(1, 23, 'Herr', 'Prof. Dr.', 'Clemens', 'Weiß', 'c.weiss@fh-bingen.de', '$2y$12$dligDo5Vj1GB5RRKkD8opO1yfSxE2nP9JF6yDrAyEAkjv8egul0lW', 1),
(1, 24, 'Herr', 'Dr.', 'Heinrich', 'Wippermann', 'wippermann@fh-bingen.de', '$2y$12$YuoicqLbCTktqZNViZpRfetQ5IWSjFjFgPSycTMoW4v43WjRR6BlS', 1),
(1, 25, 'Frau', 'Mag. Phil.', 'Birgit', 'Höss', 'hoess@dummy.de', '$2y$12$dkMJCyNGkJIGZsNdRy9LF.caPSB.f9zuBPWEeAaSQ0PNe.m6IscLK', 1),
(1, 26, 'Herr', 'Prof. Dr. med.', 'Andreas', 'Pfützner', 'pfützner@dummy.de', '$2y$12$cVkQuRGIas.oBk7bOQ2HbupGu5MQs.MgIJCnySQWY2tzXxgzb76Lu', 1),
(1, 27, 'Frau', 'Prof. Dr.', 'Gabriele', 'Krczal-Gehring', 'krczal@dummy.de', '$2y$12$sEGeuKCAxrTpRWAv6EWLvOVZLK7OcrWypZaldH/WuUpT60uTiakiK', 1),
(1, 28, 'Herr', 'Ph. D.', 'Michael', 'Mrosek', 'mrosek@dummy.de', '$2y$12$p2kA87hgsIz1LkjLq0auTekk.TABrtO9eUzIHrae.hIur/Qt.5kdi', 1),
(1, 29, 'Herr', 'Dr.', 'Maik Jörg', 'Lehmann', 'lehmann@dummy.de', '$2y$12$5xSClw5Mt1x8JEtSNH1ML.Rzbd.zC8bNjUSRYg3hA71J6wgzgn9H.', 1),
(1, 30, 'Frau', 'Dr.', 'Caroline', 'Grunewald', 'grunewald@dummy.de', '$2y$12$yR1PPBCukKgZiIv3Opur3.faVJOHHuOagmaDBBwx6X2atANJ6dVja', 1),
(1, 31, 'Herr', 'M. Sc.', 'Stefan', 'Erdmann', 'erdmann@dummy.de', '$2y$12$oIIRVwq5Zqr/OpyaO1CVreHhjwpQbly70.I5bxkjxR/OMVb3KbkQe', 1),
(1, 32, 'Frau', 'Prof. Dr.', 'Anett', 'Mehler-Bicher', 'mehler-bicher@dummy.de', '$2y$12$8ivumejj04jkuvEnSUQzPuEMgUyL8zQFk1uOKma.IYbFupzuAcrEu', 1),
(1, 33, 'Herr', 'Dr.', 'Patrick', 'Siegfried', 'siegfried@dummy.de', '$2y$12$A4rZ3LYfrXJ.HfDlYppBmu.HyAWab7M9iMulpBHI9pmbSlLs9beLC', 1),
(1, 44, 'Herr', NULL, 'Dummy', 'N.N.', 'test@test.com', '$2y$12$YPhz2PnWdrDNnWPDDYbweewgIrN7/epvgkx6Q8yhK9WTXRis2sB62', 1),
(1, 45, 'Herr', NULL, 'Dummy', 'Alle', 'lolo@test.com', '$2y$12$bJNEnJygUKltjgOUouBxSe1e9YHIe4BPeI1tA8Ib9wz4//50mNRiy', 1),
(1, 46, 'Herr', 'Prof. Dr.', 'Wolfgang', 'Vieweg', 'vieweg@fh-bingen.de', '$2y$12$SPj.rOWoqxrkffKsI5Kiv.h8lepwuKRZCJMwLTgXvPAADY7qzGuqi', 1),
(2, 51, 'Herr', 'Test', 'Test', 'Test', 'test@email.com', '$2y$12$QeO1i1nc66r.Lcned6Bjk.xVU01tIp5Z0wOYcGgMWnetbkBTXfgei', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Daten für Tabelle `Fachgebiet`
--

INSERT INTO `Fachgebiet` (`studiengang`, `Fachgebiets_ID`, `Titel`) VALUES
(3, 23, 'Mathematisch-Naturwissenschaftliche Grundlagen'),
(2, 24, 'Mathematisch-Naturwissenschaftliche Grundlagen'),
(3, 25, 'Pflichtveranstaltungen Informatik'),
(3, 26, 'Pflichtveranstaltungen Biotechnik'),
(3, 27, 'Pflichtveranstaltungen Bioinformatik'),
(3, 28, 'Pflichtveranstaltungen Übergreifende Inhalte'),
(3, 29, 'Wahlpflichtveranstaltungen Biotechnik'),
(3, 30, 'Wahlpflichtveranstaltungen Informatik'),
(3, 31, 'Wahlpflichtveranstaltungen Bioinformatik'),
(3, 32, 'Praxisphase'),
(3, 33, 'Bachelorarbeit'),
(2, 34, 'Informatik'),
(2, 35, 'Allgemeine Grundlagen'),
(2, 36, 'Betriebswirtschaftliche Inhalte'),
(2, 37, 'Wahlpflichtfächer'),
(2, 38, 'Praxis'),
(4, 41, 'Allgemeine Grundlagen'),
(4, 42, 'Mathematisch-Naturwissenschaftliche Grundlagen'),
(4, 43, 'Betriebswirtschaftliche Inhalte'),
(4, 44, 'Wahlpflichtfächer'),
(4, 45, 'Praxis'),
(5, 47, 'Mathematik'),
(5, 48, 'Wahlpflichtfächer Informatik'),
(5, 49, 'Wahlpflichtfächer Übergreifend'),
(5, 50, 'Praxis'),
(4, 51, 'Informatik'),
(4, 52, 'Mobile Computing'),
(5, 53, 'Informatik'),
(12, 72, 'Fachgebiete1'),
(12, 73, 'Fachgebiete3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

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
(53, 4, 29),
(153, 2, 41),
(152, 2, 42);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lehrende`
--

CREATE TABLE IF NOT EXISTS `Lehrende` (
  `modul` int(11) NOT NULL,
  `dozent` int(11) NOT NULL,
  PRIMARY KEY (`modul`,`dozent`),
  KEY `IDX_D7D38F7E9D576088` (`modul`),
  KEY `IDX_D7D38F7EDF4DB64C` (`dozent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `Lehrende`
--

INSERT INTO `Lehrende` (`modul`, `dozent`) VALUES
(1, 1),
(1, 5),
(3, 3),
(4, 6),
(5, 7),
(6, 4),
(7, 4),
(8, 12),
(9, 12),
(10, 12),
(11, 2),
(12, 4),
(12, 6),
(16, 8),
(17, 1),
(17, 7),
(18, 2),
(19, 8),
(20, 11),
(21, 3),
(22, 11),
(22, 14),
(23, 16),
(24, 5),
(25, 5),
(25, 13),
(26, 2),
(28, 2),
(29, 6),
(30, 11),
(32, 3),
(33, 4),
(34, 4),
(35, 7),
(36, 3),
(37, 3),
(38, 7),
(39, 3),
(40, 8),
(41, 7),
(42, 44),
(43, 11),
(44, 7),
(45, 2),
(46, 44),
(47, 15),
(48, 7),
(48, 8),
(49, 11),
(51, 2),
(52, 2),
(52, 44),
(53, 44),
(54, 24),
(55, 33),
(55, 44),
(56, 22),
(57, 44),
(58, 20),
(59, 1),
(60, 1),
(61, 1),
(62, 8),
(63, 44),
(64, 22),
(65, 45),
(66, 45),
(67, 44),
(68, 6),
(69, 44),
(70, 44),
(71, 31),
(72, 25),
(73, 44),
(74, 1),
(75, 1),
(76, 4),
(77, 1),
(78, 1),
(79, 19),
(80, 19),
(81, 45),
(82, 5),
(83, 44),
(84, 44),
(85, 11),
(86, 27),
(87, 26),
(88, 44),
(89, 24),
(90, 44),
(91, 6),
(92, 24),
(93, 24),
(94, 44),
(95, 4),
(96, 11),
(97, 8),
(98, 5),
(99, 12),
(100, 12),
(101, 6),
(102, 1),
(103, 1),
(104, 7),
(105, 3),
(105, 7),
(106, 3),
(107, 4),
(108, 4),
(109, 4),
(110, 32),
(111, 33),
(112, 44),
(113, 4),
(114, 4),
(115, 44),
(116, 44),
(117, 19),
(118, 45),
(119, 7),
(120, 24),
(121, 44),
(140, 3),
(152, 51),
(153, 8),
(154, 1),
(154, 2),
(155, 8),
(156, 44);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Daten für Tabelle `Modulhandbuch`
--

INSERT INTO `Modulhandbuch` (`MHB_ID`, `Versionsnummer`, `Erstellungsdatum`, `Beschreibung`, `gueltigAb`, `gehoertZu`) VALUES
(1, 1, '2014-12-13', 'MHB INF SS14', 'SS14', 2),
(2, 1, '2014-12-13', 'MHB BBI SS14', 'SS14', 3),
(3, 1, '2014-12-13', 'MHB MOCO SS14', 'SS14', 4),
(4, 1, '2014-12-13', 'MHB MINF SS14', 'SS14', 5),
(45, 1, '2015-01-30', 'zrtzrt', 'WS17', 12),
(46, 2, '2015-01-30', 'asdasd', 'WS17', 12),
(47, 3, '2015-01-30', 'asdasd', 'WS17', 12),
(48, 4, '2015-01-30', 'yxcvyxcv', 'WS17', 12),
(49, 5, '2015-01-30', 'fachgebiet test', 'SS14', 12);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ModulhandbuchZuweisung`
--

CREATE TABLE IF NOT EXISTS `ModulhandbuchZuweisung` (
  `mhb` int(11) NOT NULL,
  `angebot` int(11) NOT NULL,
  PRIMARY KEY (`mhb`,`angebot`),
  KEY `IDX_67AE706BB1D660BA` (`mhb`),
  KEY `IDX_67AE706B5BE7876A` (`angebot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `ModulhandbuchZuweisung`
--

INSERT INTO `ModulhandbuchZuweisung` (`mhb`, `angebot`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 135),
(2, 136),
(2, 137),
(2, 138),
(2, 139),
(2, 140),
(2, 141),
(2, 142),
(2, 143),
(2, 144),
(2, 145),
(2, 146),
(2, 147),
(2, 148),
(2, 149),
(2, 151),
(2, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 158),
(2, 159),
(2, 160),
(2, 161),
(2, 235),
(2, 245),
(3, 162),
(3, 163),
(3, 164),
(3, 165),
(3, 166),
(3, 167),
(3, 168),
(3, 169),
(3, 171),
(3, 172),
(3, 173),
(3, 174),
(3, 175),
(3, 176),
(3, 177),
(3, 178),
(3, 179),
(3, 180),
(3, 181),
(3, 182),
(3, 183),
(3, 184),
(3, 186),
(3, 187),
(3, 188),
(3, 189),
(3, 190),
(3, 191),
(3, 192),
(3, 193),
(3, 194),
(3, 195),
(3, 196),
(3, 197),
(3, 198),
(3, 199),
(3, 200),
(3, 201),
(3, 202),
(3, 203),
(3, 204),
(3, 206),
(3, 207),
(3, 208),
(3, 209),
(3, 210),
(3, 211),
(3, 212),
(3, 234),
(3, 247),
(4, 213),
(4, 215),
(4, 216),
(4, 217),
(4, 218),
(4, 220),
(4, 221),
(4, 222),
(4, 223),
(4, 224),
(4, 225),
(4, 226),
(4, 227),
(4, 228),
(4, 229),
(4, 230),
(4, 231),
(4, 232),
(4, 233),
(4, 236),
(4, 237),
(4, 238),
(4, 239),
(4, 240),
(4, 243),
(4, 246),
(45, 275),
(45, 279),
(46, 275),
(46, 279),
(47, 275),
(47, 279),
(48, 275),
(48, 279),
(49, 275),
(49, 279);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

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
  PRIMARY KEY (`Semester`),
  UNIQUE KEY `UNIQ_E4EECBBE4EECBB` (`Semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `Semesterplan`
--

INSERT INTO `Semesterplan` (`modul`, `dozent`, `semester`, `Semesterplan_ID`, `SWSUebung`, `SWSVorlesung`, `AnzahlUebungsgruppen`, `GroesseUebungsgruppen`) VALUES
(1, 5, 'WS14', 1, 0, 0, 0, 0),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `Studiengang`
--

INSERT INTO `Studiengang` (`sgl`, `Studiengang_ID`, `Fachbereich`, `Grad`, `Titel`, `Kuerzel`, `Beschreibung`) VALUES
(8, 2, 2, 'Bachelor', 'Informatik', 'B-IN', 'Ab dem Wintersemester 2012/13 bietet Ihnen das Studium der Informatik ein nach aktuellen Anforderungen der Berufswelt konzipiertes 7-semestriges Studienprogramm. Sie erwerben eine fundierte Ausbildung zum Informatiker, die für unterschiedliche Tätigkeiten in vielen Bereichen eines sehr attraktiven IT-Arbeitsmarktes qualifiziert:'),
(1, 3, 2, 'Bachelor', 'Angewandte Bioinformatik', 'BBI', 'Seit dem Wintersemester 2012/13 bietet die FH Bingen das Studium der "Angewandten Bioinformatik" als 7-semestrigen Bachelor-Studiengang (Bachelor of Science) an. Die Studierenden erwerben ein breites Spektrum an anwendungsbezogenem Wissen in den Fachgebieten Biotechnologie und Informatik und in der sie verbindenden Bioinformatik. Mit diesem Wissen haben Absolventen sowohl in der Forschung als auch in der Industrie sehr gute Berufschancen. Die FH Bingen verfügt über eine moderne Ausstattung und ein sehr gutes Betreuungsverhältnis, d.h. Lehrveranstaltungen finden in kleinen Gruppen statt, die eine individuelle und persönliche Betreuung der Studierenden ermöglichen.'),
(11, 4, 2, 'Bachelor', 'Mobile Computing', 'MoCo', 'Zum Wintersemester 2012/13 startete an der Fachhochschule Bingen der bundesweit erste Bachelor-Studiengang Mobile Computing. Der Studiengang stellt die revolutionäre Entwicklung hin zu mobilen Computersystemen in den Fokus der Ausbildung.   In sieben Semestern erwerben die Studierenden eine vollwertige Ausbildung zum Informatiker mit dem Abschluss „Bachelor of Science“. Die Ausbildung qualifiziert  in besonderer Weise für die Umsetzung mobiler Anwendungen in verschiedenen Aufgabengebieten im Umfeld Mobiler Systeme.'),
(4, 5, 2, 'Master', 'Informationssysteme', 'MInf', 'Das Studium zielt auf eine spätere berufliche Tätigkeit in Unternehmen, die Informationssysteme planen, entwickeln oder betreiben. Unter einem "Informationssystem" verstehen wir ein komplexes, multifunktionelles System unterschiedlicher informationstechnologischer Komponenten, die miteinander verknüpft sind und zur Verarbeitung großer Datenmengen dienen. Die Spannweite von Informationssystemen umfasst dabei Wissensmanagementsysteme ebenso wie Enterprise-Resource-Planning-Systeme (ERP), Internetbasierte Systeme und Bioinformations-Services.'),
(51, 12, 1, 'Bachelor', 'Abnahme Test', 'ABT', 'Test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Studienplan`
--

CREATE TABLE IF NOT EXISTS `Studienplan` (
  `StartSemester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modul` int(11) NOT NULL,
  `studiengang` int(11) NOT NULL,
  `Studienplan_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Regelsemester` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Studienplan_ID`),
  KEY `IDX_7E7DD629D576088` (`modul`),
  KEY `IDX_7E7DD62BA290AAB` (`studiengang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=412 ;

--
-- Daten für Tabelle `Studienplan`
--

INSERT INTO `Studienplan` (`StartSemester`, `modul`, `studiengang`, `Studienplan_ID`, `Regelsemester`) VALUES
('WS', 8, 2, 1, '[1]'),
('WS', 16, 2, 2, '[1]'),
('WS', 1, 2, 5, '[1]'),
('WS', 12, 2, 6, '[1]'),
('WS', 9, 2, 7, '[2]'),
('WS', 24, 2, 8, '[2]'),
('WS', 17, 2, 9, '[2]'),
('WS', 18, 2, 10, '[2]'),
('WS', 3, 2, 11, '[2]'),
('WS', 10, 2, 12, '[3]'),
('WS', 19, 2, 13, '[3]'),
('WS', 11, 2, 14, '[3]'),
('WS', 4, 2, 15, '[3]'),
('WS', 22, 2, 16, '[4]'),
('WS', 20, 2, 17, '[4]'),
('WS', 21, 2, 18, '[4]'),
('WS', 5, 2, 19, '[4]'),
('WS', 23, 2, 20, '[5]'),
('WS', 25, 2, 21, '[5]'),
('WS', 6, 2, 22, '[5]'),
('WS', 7, 2, 23, '[6]'),
('WS', 48, 2, 24, '[6]'),
('WS', 65, 2, 25, '[7]'),
('WS', 66, 2, 26, '[7]'),
('WS', 1, 4, 27, '[1]'),
('WS', 16, 4, 29, '[1]'),
('WS', 8, 4, 30, '[1]'),
('WS', 12, 4, 31, '[1]'),
('WS', 18, 4, 32, '[2]'),
('WS', 17, 4, 33, '[2]'),
('WS', 3, 4, 34, '[2]'),
('WS', 52, 4, 35, '[2]'),
('WS', 5, 4, 36, '[3]'),
('WS', 68, 4, 37, '[3]'),
('WS', 71, 4, 38, '[3]'),
('WS', 19, 4, 39, '[3]'),
('WS', 51, 4, 40, '[4]'),
('WS', 37, 4, 41, '[4]'),
('WS', 20, 4, 42, '[4]'),
('WS', 22, 4, 43, '[4]'),
('WS', 82, 4, 44, '[5]'),
('WS', 6, 4, 45, '[5]'),
('WS', 44, 4, 46, '[5]'),
('WS', 73, 4, 47, '[5]'),
('WS', 76, 4, 48, '[6]'),
('WS', 23, 4, 49, '[6]'),
('WS', 24, 4, 50, '[6]'),
('WS', 48, 4, 51, '[6]'),
('WS', 65, 4, 52, '[7]'),
('WS', 66, 4, 53, '[7]'),
('SS', 52, 4, 54, '[1]'),
('SS', 8, 4, 55, '[1]'),
('SS', 18, 4, 56, '[1]'),
('SS', 12, 4, 57, '[1]'),
('SS', 22, 4, 58, '[1]'),
('SS', 51, 4, 59, '[2]'),
('SS', 1, 4, 60, '[2]'),
('SS', 16, 4, 62, '[2]'),
('SS', 17, 4, 63, '[2]'),
('SS', 5, 4, 64, '[3]'),
('SS', 3, 4, 65, '[3]'),
('SS', 20, 4, 66, '[3]'),
('SS', 9, 4, 67, '[3]'),
('SS', 24, 4, 68, '[3]'),
('SS', 68, 4, 69, '[4]'),
('SS', 119, 4, 70, '[4]'),
('SS', 19, 4, 71, '[4]'),
('SS', 6, 4, 72, '[4]'),
('SS', 82, 4, 73, '[4]'),
('SS', 21, 4, 74, '[5]'),
('SS', 37, 4, 75, '[5]'),
('SS', 76, 4, 76, '[5]'),
('SS', 71, 4, 77, '[5]'),
('SS', 73, 4, 78, '[6]'),
('SS', 48, 4, 79, '[6]'),
('SS', 65, 4, 80, '[7]'),
('SS', 66, 4, 81, '[7]'),
('WS', 65, 3, 82, '[7]'),
('WS', 66, 3, 83, '[7]'),
('WS', 7, 3, 84, '[6]'),
('WS', 64, 3, 85, '[6]'),
('WS', 70, 3, 86, '[5]'),
('WS', 6, 3, 87, '[5]'),
('WS', 56, 3, 88, '[4]'),
('WS', 63, 3, 89, '[4]'),
('WS', 24, 3, 90, '[4]'),
('WS', 61, 3, 91, '[4]'),
('WS', 60, 3, 92, '[4]'),
('WS', 20, 3, 93, '[4]'),
('WS', 1, 3, 94, '[3]'),
('WS', 19, 3, 96, '[3]'),
('WS', 58, 3, 97, '[3]'),
('WS', 69, 3, 98, '[3]'),
('WS', 54, 3, 99, '[2]'),
('WS', 67, 3, 100, '[2]'),
('WS', 72, 3, 101, '[2]'),
('WS', 75, 3, 102, '[2]'),
('WS', 59, 3, 103, '[2]'),
('WS', 17, 3, 104, '[2]'),
('WS', 12, 3, 106, '[1]'),
('WS', 74, 3, 107, '[1]'),
('WS', 55, 3, 108, '[1]'),
('WS', 57, 3, 109, '[1]'),
('SS', 12, 3, 110, '[1]'),
('SS', 17, 3, 111, '[1]'),
('SS', 59, 3, 112, '[1]'),
('SS', 59, 3, 113, '[1]'),
('SS', 72, 3, 114, '[1]'),
('SS', 56, 3, 115, '[1]'),
('SS', 74, 3, 117, '[2]'),
('SS', 55, 3, 118, '[2]'),
('SS', 57, 3, 119, '[2]'),
('SS', 54, 3, 120, '[3]'),
('SS', 67, 3, 121, '[3]'),
('SS', 24, 3, 122, '[3]'),
('SS', 20, 3, 123, '[3]'),
('SS', 60, 3, 124, '[3]'),
('SS', 61, 3, 125, '[3]'),
('SS', 1, 3, 126, '[4]'),
('SS', 19, 3, 127, '[4]'),
('SS', 58, 3, 128, '[4]'),
('SS', 69, 3, 129, '[4]'),
('SS', 7, 3, 130, '[5]'),
('SS', 64, 3, 131, '[5]'),
('SS', 63, 3, 132, '[5]'),
('SS', 70, 3, 133, '[6]'),
('SS', 6, 3, 134, '[6]'),
('SS', 65, 3, 135, '[7]'),
('SS', 66, 3, 136, '[7]'),
('WS', 99, 5, 137, '[1]'),
('WS', 95, 5, 138, '[1]'),
('WS', 107, 5, 139, '[1]'),
('WS', 96, 5, 140, '[2]'),
('WS', 98, 5, 142, '[2]'),
('SS', 118, 5, 144, '[3]'),
('SS', 96, 5, 145, '[1]'),
('SS', 97, 5, 146, '[1]'),
('WS', 97, 5, 147, '[2]'),
('SS', 98, 5, 148, '[1]'),
('SS', 118, 5, 149, '[3]'),
('SS', 99, 5, 150, '[2]'),
('SS', 95, 5, 151, '[2]'),
('SS', 107, 5, 152, '[2]'),
('SS', 8, 2, 153, '[1]'),
('SS', 22, 2, 154, '[1]'),
('SS', 12, 2, 155, '[1]'),
('SS', 18, 2, 156, '[1]'),
('SS', 16, 2, 157, '[2]'),
('SS', 11, 2, 158, '[2]'),
('SS', 17, 2, 159, '[2]'),
('SS', 1, 2, 160, '[2]'),
('SS', 9, 2, 162, '[3]'),
('SS', 20, 2, 163, '[3]'),
('SS', 19, 2, 164, '[4]'),
('SS', 4, 2, 165, '[4]'),
('SS', 3, 2, 166, '[3]'),
('SS', 21, 2, 167, '[3]'),
('SS', 7, 2, 168, '[5]'),
('SS', 48, 2, 169, '[6]'),
('SS', 65, 2, 170, '[7]'),
('SS', 66, 2, 171, '[7]'),
('SS', 10, 2, 172, '[4]'),
('SS', 25, 2, 173, '[4]'),
('SS', 24, 2, 174, '[1]'),
('SS', 23, 2, 175, '[5]'),
('SS', 5, 2, 176, '[5]'),
('SS', 6, 2, 177, '[6]'),
('SS', 120, 3, 178, '[2]'),
('WS', 120, 3, 179, '[1]'),
('SS', 21, 3, 185, '[5]'),
('WS', 21, 3, 186, '[6]'),
('SS', 28, 3, 187, '[5]'),
('WS', 28, 3, 188, '[6]'),
('SS', 16, 3, 189, '[5]'),
('WS', 16, 3, 190, '[6]'),
('SS', 26, 3, 191, '[5]'),
('WS', 26, 3, 192, '[6]'),
('SS', 30, 3, 193, '[5]'),
('WS', 30, 3, 194, '[6]'),
('SS', 5, 3, 195, '[5]'),
('WS', 5, 3, 196, '[6]'),
('SS', 77, 3, 197, '[6]'),
('WS', 77, 3, 198, '[5]'),
('SS', 78, 3, 199, '[6]'),
('WS', 78, 3, 200, '[5]'),
('SS', 79, 3, 201, '[5]'),
('WS', 79, 3, 202, '[6]'),
('SS', 80, 3, 203, '[5]'),
('WS', 80, 3, 204, '[6]'),
('SS', 81, 3, 205, '[5]'),
('WS', 81, 3, 206, '[6]'),
('SS', 83, 3, 207, '[5]'),
('WS', 83, 3, 208, '[6]'),
('SS', 84, 3, 209, '[6]'),
('WS', 84, 3, 210, '[5]'),
('SS', 86, 3, 211, '[5]'),
('WS', 86, 3, 212, '[6]'),
('SS', 87, 3, 213, '[5]'),
('WS', 87, 3, 214, '[6]'),
('SS', 89, 3, 215, '[5]'),
('WS', 89, 3, 216, '[6]'),
('SS', 90, 3, 217, '[5]'),
('WS', 90, 3, 218, '[6]'),
('SS', 92, 3, 219, '[5]'),
('WS', 92, 3, 220, '[6]'),
('SS', 93, 3, 221, '[5]'),
('WS', 93, 3, 222, '[6]'),
('SS', 94, 3, 223, '[5]'),
('WS', 94, 3, 224, '[6]'),
('SS', 26, 2, 225, '[4,5,6]'),
('WS', 26, 2, 226, '[4,5,6]'),
('SS', 28, 2, 227, '[4,5,6]'),
('WS', 28, 2, 228, '[4,5,6]'),
('SS', 29, 2, 229, '[4,5,6]'),
('WS', 29, 2, 230, '[4,5,6]'),
('SS', 30, 2, 231, '[4,5,6]'),
('WS', 30, 2, 232, '[4,5,6]'),
('SS', 81, 2, 233, '[4,5,6]'),
('WS', 81, 2, 234, '[4,5,6]'),
('SS', 32, 2, 235, '[4,5,6]'),
('WS', 32, 2, 236, '[4,5,6]'),
('SS', 33, 2, 237, '[5]'),
('WS', 33, 2, 238, '[6]'),
('SS', 34, 2, 239, '[5]'),
('WS', 34, 2, 240, '[6]'),
('SS', 35, 2, 241, '[4,5,6]'),
('WS', 35, 2, 242, '[4,5,6]'),
('SS', 36, 2, 243, '[4,5,6]'),
('WS', 36, 2, 244, '[4,5,6]'),
('SS', 37, 2, 245, '[4,5,6]'),
('WS', 37, 2, 246, '[4,5,6]'),
('SS', 38, 2, 247, '[4,5,6]'),
('WS', 38, 2, 248, '[4,5,6]'),
('SS', 39, 2, 249, '[4,5,6]'),
('WS', 39, 2, 250, '[4,5,6]'),
('SS', 44, 2, 251, '[4,5,6]'),
('WS', 44, 2, 252, '[4,5,6]'),
('SS', 40, 2, 253, '[4,5,6]'),
('WS', 40, 2, 254, '[4,5,6]'),
('SS', 49, 2, 255, '[4,5,6]'),
('WS', 49, 2, 256, '[4,5,6]'),
('SS', 121, 2, 257, '[4,5,6]'),
('WS', 121, 2, 258, '[4,5,6]'),
('WS', 41, 2, 259, '[4,5,6]'),
('SS', 41, 2, 260, '[4,5,6]'),
('SS', 42, 2, 261, '[4,5,6]'),
('WS', 42, 2, 262, '[4,5,6]'),
('SS', 43, 2, 263, '[4,5,6]'),
('WS', 43, 2, 264, '[4,5,6]'),
('SS', 45, 2, 265, '[4,5,6]'),
('WS', 45, 2, 266, '[4,5,6]'),
('SS', 46, 2, 267, '[4,5,6]'),
('WS', 46, 2, 268, '[4,5,6]'),
('SS', 53, 2, 269, '[4,5,6]'),
('WS', 53, 2, 270, '[4,5,6]'),
('SS', 47, 2, 271, '[4,5,6]'),
('WS', 47, 2, 272, '[4,5,6]'),
('SS', 62, 2, 273, '[4,5,6]'),
('WS', 62, 2, 274, '[4,5,6]'),
('SS', 100, 5, 275, '[1]'),
('WS', 100, 5, 276, '[2]'),
('SS', 101, 5, 277, '[2]'),
('WS', 101, 5, 278, '[1]'),
('SS', 102, 5, 279, '[2]'),
('WS', 102, 5, 280, '[1]'),
('SS', 103, 5, 281, '[2]'),
('WS', 103, 5, 282, '[1]'),
('SS', 104, 5, 283, '[1]'),
('WS', 104, 5, 284, '[2]'),
('WS', 105, 5, 285, '[1]'),
('WS', 105, 5, 286, '[2]'),
('SS', 106, 5, 287, '[1]'),
('WS', 106, 5, 288, '[2]'),
('SS', 107, 5, 289, '[1]'),
('WS', 107, 5, 290, '[2]'),
('SS', 6, 5, 291, '[1]'),
('WS', 6, 5, 292, '[2]'),
('SS', 7, 5, 293, '[1]'),
('WS', 7, 5, 294, '[2]'),
('SS', 108, 5, 295, '[1]'),
('WS', 108, 5, 296, '[2]'),
('SS', 109, 5, 297, '[1]'),
('WS', 109, 5, 298, '[2]'),
('SS', 110, 5, 299, '[2]'),
('WS', 110, 5, 300, '[1]'),
('SS', 111, 5, 301, '[2]'),
('WS', 111, 5, 302, '[1]'),
('SS', 113, 5, 303, '[3]'),
('WS', 113, 5, 304, '[3]'),
('SS', 114, 5, 305, '[1]'),
('WS', 114, 5, 306, '[2]'),
('SS', 115, 5, 307, '[1]'),
('WS', 115, 5, 308, '[2]'),
('SS', 116, 5, 309, '[1]'),
('WS', 116, 5, 310, '[2]'),
('SS', 117, 5, 311, '[2]'),
('WS', 117, 5, 312, '[1]'),
('SS', 26, 4, 313, '[4,5,6]'),
('WS', 26, 4, 314, '[4,5,6]'),
('SS', 28, 4, 315, '[4,5,6]'),
('WS', 28, 4, 316, '[4,5,6]'),
('SS', 29, 4, 317, '[4,5,6]'),
('WS', 29, 4, 318, '[4,5,6]'),
('SS', 81, 4, 319, '[4,5,6]'),
('WS', 81, 4, 320, '[4,5,6]'),
('WS', 32, 4, 321, '[4,5,6]'),
('WS', 32, 4, 322, '[4,5,6]'),
('SS', 33, 4, 323, '[5]'),
('WS', 33, 4, 324, '[6]'),
('SS', 34, 4, 325, '[5]'),
('WS', 34, 4, 326, '[6]'),
('SS', 35, 4, 327, '[4,5,6]'),
('WS', 35, 4, 328, '[4,5,6]'),
('SS', 36, 4, 329, '[4,5,6]'),
('WS', 36, 4, 330, '[4,5,6]'),
('SS', 38, 4, 331, '[4,5,6]'),
('WS', 38, 4, 332, '[4,5,6]'),
('SS', 39, 4, 333, '[4,5,6]'),
('WS', 39, 4, 334, '[4,5,6]'),
('SS', 40, 4, 335, '[4,5,6]'),
('WS', 40, 4, 336, '[4,5,6]'),
('SS', 49, 4, 337, '[4,5,6]'),
('WS', 49, 4, 338, '[4,5,6]'),
('SS', 121, 4, 340, '[4,5,6]'),
('WS', 121, 4, 341, '[4,5,6]'),
('SS', 41, 4, 342, '[4,5,6]'),
('WS', 41, 4, 343, '[4,5,6]'),
('SS', 42, 4, 344, '[4,5,6]'),
('WS', 42, 4, 345, '[4,5,6]'),
('SS', 43, 4, 346, '[4,5,6]'),
('WS', 43, 4, 347, '[4,5,6]'),
('SS', 45, 4, 348, '[4,5,6]'),
('WS', 45, 4, 349, '[4,5,6]'),
('SS', 46, 4, 350, '[4,5,6]'),
('WS', 46, 4, 351, '[4,5,6]'),
('SS', 53, 4, 352, '[4,5,6]'),
('WS', 53, 4, 353, '[4,5,6]'),
('SS', 85, 4, 354, '[4,5,6]'),
('WS', 85, 4, 355, '[4,5,6]'),
('SS', 11, 4, 356, '[2]'),
('WS', 11, 4, 357, '[3]'),
('SS', 88, 4, 358, '[4,5,6]'),
('WS', 88, 4, 359, '[4,5,6]'),
('SS', 91, 4, 360, '[4,5,6]'),
('WS', 91, 4, 361, '[4,5,6]'),
('SS', 43, 4, 368, '[4,5,6]'),
('WS', 43, 4, 369, '[4,5,6]'),
('SS', 65, 3, 370, '[7]'),
('WS', 65, 3, 371, '[7]'),
('SS', 66, 3, 372, '[7]'),
('WS', 66, 3, 373, '[7]'),
('SS', 140, 2, 374, '[2]'),
('WS', 140, 2, 375, '[2]'),
('SS', 140, 3, 376, '[2]'),
('WS', 140, 3, 377, '[3]'),
('SS', 140, 4, 378, '[2]'),
('WS', 140, 4, 379, '[1]'),
('SS', 153, 2, 400, '[2]'),
('WS', 153, 2, 401, '[2]'),
('SS', 154, 12, 402, '[1]'),
('WS', 154, 12, 403, '[2]'),
('SS', 152, 3, 406, '[1]'),
('WS', 152, 3, 407, '[1]'),
('SS', 155, 5, 408, '[1]'),
('WS', 155, 5, 409, '[2]'),
('SS', 156, 12, 410, '[3]'),
('WS', 156, 12, 411, '[3]');

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
  `Name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `NameEN` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Haeufigkeit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dauer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lehrveranstaltungen` longtext COLLATE utf8_unicode_ci,
  `KontaktzeitVL` int(11) DEFAULT NULL,
  `KontaktzeitSonstige` int(11) DEFAULT NULL,
  `Selbststudium` int(11) DEFAULT NULL,
  `Gruppengroesse` int(11) DEFAULT NULL,
  `Lernergebnisse` longtext COLLATE utf8_unicode_ci,
  `Inhalte` longtext COLLATE utf8_unicode_ci,
  `Pruefungsformen` longtext COLLATE utf8_unicode_ci,
  `Sprache` longtext COLLATE utf8_unicode_ci,
  `Literatur` longtext COLLATE utf8_unicode_ci,
  `Leistungspunkte` int(11) DEFAULT NULL,
  `VoraussetzungLP` longtext COLLATE utf8_unicode_ci,
  `VoraussetzungInhalte` longtext COLLATE utf8_unicode_ci,
  `SpracheSonstiges` longtext COLLATE utf8_unicode_ci,
  `Autor` longtext COLLATE utf8_unicode_ci,
  `PruefungsformSonstiges` longtext COLLATE utf8_unicode_ci,
  `PruefungsleistungSonstiges` longtext COLLATE utf8_unicode_ci,
  `StudienleistungSonstiges` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Modul_ID`),
  KEY `IDX_217D6026F3B07FDF` (`modulbeauftragter`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=157 ;

--
-- Daten für Tabelle `Veranstaltung`
--

INSERT INTO `Veranstaltung` (`modulbeauftragter`, `Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `KontaktzeitVL`, `KontaktzeitSonstige`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `VoraussetzungLP`, `VoraussetzungInhalte`, `SpracheSonstiges`, `Autor`, `PruefungsformSonstiges`, `PruefungsleistungSonstiges`, `StudienleistungSonstiges`) VALUES
(5, 1, '2015-01-17', 2, 'Freigegeben', 'IGRU2', 'Grundlagen der Informatik 2', 'Introduction to Computer Science 2', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 70, 'Kenntnisse von Grundbegriffen der Graphentheorie\r\nEinblick in Prinzipien von Programmiersprachen\r\nFähigkeit, formale Sprachen mittels Grammatiken zu definieren und anzuwenden (z.B. bei der Konstruktion von Automaten)\r\nGrundkenntnisse von Modellen zur Berechenbarkeit, z.B. Turingmaschine. Grenzen der Berechenbarkeit und Beispiele von NP-vollständigen Problemen\r\nGrundbegriffe der diskreten Wahrscheinlichkeitsrechnung\r\nKenntnis von Grundbegriffen der Informationstheorie\r\nDatenkompression: Fähigkeit Redundanz zu erkennen und zu vermeiden. Anwendung von verlustfreien Codierungsverfahren zur Verringerung der Redundanz\r\nVerlustbehaftete Kompression: Kenntnisse von Verfahren, Daten mit kaum merkbarem Verlust zu komprimieren\r\nKenntnisse von Verfahren der Fehlererkennung und -korrektur\r\nGrundkenntnisse der Kryptographie', '- Graphentheorie und Modellbildung\r\n- Konzepte von Programmiersprachen, Anwendung von Rekursion\r\n- Formale Sprachen\r\n- Berechenbarkeitstheorie\r\n- Komplexitätstheorie\r\n- Diskrete Wahrscheinlichkeitstheorie\r\n- Informationstheorie, Entscheidungsbäume\r\n- Datenkompression (verlustfrei)\r\n- Verlustbehaftete Kompression\r\n- Fehlererkennung und -korrektur\r\n- Kryptographie: Symmetrische und asymmetrische Verfahren.', '["Schriftliche Klausur"]', 'Deutsch', 'H.-P. Gumm, M. Sommer: Einführung in die Informatik. Verlag Oldenbourg, München\r\nH. Herold, B. Lurz, J. Wohlrab, Grundlagen der Informatik, Verlag Pearson, München\r\nUwe Schöning, Ideen der Informatik: Grundlegende Modelle und Konzepte der Theoretischen Infor-matik, München\r\nPeter Rechenberg, Gustav Pomberger: Informatik Handbuch, Verlag Hanser: München, Wien\r\nP. Becker, Mathematische Grundlagen für die Informatik, Graphentheorie, ZFH Koblenz', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(3, 3, '2015-01-16', 2, 'Freigegeben', 'PROG2', 'Programmieren 2', 'Programming 2', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 70, 'Die Studierenden erlangen ein vertieftes Verständnis objektorientierter Programmentwicklung. \r\nSie sind in der Lage größere Anwendungen zu strukturieren und zu erstellen.\r\nSie verstehen das Konzept der Klassenhierarchien und beherrschen dessen Nutzung in Verbindung mit vorgefertigten Bibliotheken und Entwurfsmustern. Die Studierenden verstehen das Konzept der Schnittstellen und können diese definieren und einsetzen. Sie kennen grafische Benutzerschnittstellen und sind in der Lage diese zu erstellen.', '- Packages\r\n- Dokumentation\r\n- Ein- und Ausgabe\r\n- Java Collection Framework\r\n- Generics\r\n- Iteratoren\r\n- GUI Programmierung\r\n- Einführung in Design Patterns', '["Schriftliche Klausur"]', 'Deutsch', 'C. S. Horstmann, G. Cornell: Core Java 2 Volume II – Advanced Features. Sun Microsystems Press 2008, 8. Auflage, ISBN 978-0-13235479-0\r\nC. Ullenboom: Java ist auch eine Insel - Programmieren mit der Java Standard Edition Version 6, 9. Auflage, Galileo Computing 2010, ISBN 978-3-83621506-0\r\nR. Schiedermeier: Programmieren mit Java. 2. Auflage, Pearson Studium 2010, ISBN 978-3-86894031-2\r\nG. Krüger, T. Stark: Handbuch der Java Programmierung Standard Edition Version 6, 6. Auflage, Addison-Wesley 2009, ISBN 978-3-82732874-8\r\nE. Gamma, R. Helm, R. Johnson, J. Vlissides (Gang of Four): Design Patterns - Elements of Reusa-ble Object-Oriented Software, Addison-Wesley, 1995. ISBN 978-0-20163-361-0\r\nE. Freeman, E. Freeman, K. Sierra: Head First Design Patterns. O''Reilly Media, November 2004, ISBN 978-0-59600712-6', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Schulmathematik', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(6, 4, '2015-01-17', 2, 'Freigegeben', 'PROG3', 'Programmieren 3', 'Programming 3', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 70, '- Kenntnis und Anwendung einer prozeduralen Programmiersprache\r\n- Fähigkeit zur modularen Programmierung\r\n- Fähigkeit zur Abschätzung von Vor- und Nachteile von Zeigern versus Referenzen\r\n- Verständnis der Mechanismen bei Referenzen und On-Reference Aufrufen\r\n- Fähigkeit zur Vergleichenden Wertung der Objekt-Orientierten und der Modularen Programmierung\r\n- Fähigkeit bei der Entwicklung eigener Programme Operatoren, dynamischen Speicher und multiple Vererbung zu nutzen', '- Syntax der Programmiersprache C\r\n- Parameterübergabe in C\r\n- Zeiger\r\n- Zeiger und Arrays\r\n- Dynamische Datenstrukturen\r\n- C++ Klassen\r\n- Konstruktoren, Destruktoren, Speicher belegen und freigeben\r\n- Multiple Vererbung\r\n- Operatoren\r\n- Operator-Funktionen, Operator-Methoden\r\n- Friend Operatoren\r\n- Spezielle Operatoren wie Zuweisungs-, Ein- und Ausgabe- Operatoren\r\n- Templates\r\n- Exceptions', '["Schriftliche Klausur"]', 'Deutsch', 'T. Rauber; G. Rünger: Parallel Programming for Multicore and Cluster Systems. Springer, ISBN 978-3-642-04817-3\r\nC. Breshears: The Art of Concurrency: A Thread Monkey''s Guide to Writing Parallel Applications. O''Reilly Media, ISBN 978-0596521530\r\nA. Tanenbaum, M. van Steen: Distributed Systems: Principles and Paradigms. Prentice Hall, ISBN 978-0-136-13553-1\r\nG. Bengel, C. Baun, M. Kunze, K.-U. Stucky: Masterkurs Parallele und Verteilte Systeme: Grundla-gen der Programmierung von Multicoreprozessoren, Multiprozessoren, Cluster und Grid. Vie-weg+Teubner, ISBN 978-3-834-80394-8\r\nR. Oechsle: Parallele und verteilte Anwendungen in Java. Hanser, 3. Auflage, ISBN 978-3-446-42459-3\r\nO. Haase: Kommunikation in verteilten Anwendungen. Oldenbourg Verlag, 2. Auflage, ISBN 978-3-48658481-3', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Objekt-orientierte Programmierkenntnisse', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(7, 5, '2015-01-17', 2, 'Freigegeben', 'WTEC', 'Web-Technologien', 'Web Technologies', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Studierende kennen\r\n- Architekturen web-basierter verteilter Anwendungssysteme\r\n- Aktuelle Paradigmen, Standards, Werkzeuge und Technologien\r\nzur Erstellung web-zentrierter Anwendungen\r\n\r\nSie sind in der Lage\r\n- Selbstständig unter Nutzung entsprechender Frameworks webbasierte\r\nverteilte Anwendungssysteme zu erstellen\r\n- Die Möglichkeiten, Grenzen und Entwicklungsperspektiven\r\naktueller Werkzeuge und Technologien einzuschätzen', '- Verteilte Systeme (Architektur moderner Web-Anwendungen, Client/Server Architektur, Middle-ware)\r\n- Konzepte der J2EE Plattformarchitektur und Technologiebestandteile\r\n- Enterprise Java Beans (EJB Architektur, Entity-, Session-,Message Driven Beans, EJB-Transaktionen, EJP-Entwurf, JDBC)\r\n- Java Server Pages und Servlets (Servlets, JSP, MVCParadigma, Jakarta Struts)\r\n- Corba, Java Naming and Directory Interface JNDI, Java Message Service JMS\r\n- Web Services (SOAP, UDDI, WSDL, Apache Axis, XML-RPC)\r\n- Java & XML (XML Schema, Java Architecture for XML Binding JAXB, Java API for XML Processing JAXP, DOM/SAX/XSLT)\r\n- JBoss, Apache, Tomcat, Axis\r\n- Transaktionskonzepte, Sicherheit', '["Schriftliche Klausur"]', 'Deutsch', '- Ramin Assisi: J2EE mit Eclipse 3 und JBoss, Hanser\r\nFachbuchverlag, ISBN: 3-446-22739-3\r\n- Jim Farley, William Crawford, Prakash Malani: Java Enterprise\r\nin a Nutshell, O''Reilly, ISBN: 0-596-10142-2\r\n- Paul J. Perrone, Venkata S. R. K. R. Chaganti: Building Java\r\nEnterprise System with J2EE, Sams, ISBN: 0-672-31795-8\r\n- Rod Johnson: Expert One-to-One J2EE Design and\r\nDevelopment, Wrox Press, ISBN: 0-764-54385-7', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(4, 6, '2015-01-17', 2, 'Freigegeben', 'ITSEC', 'IT-Sicherheit', 'IT Security', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 70, '- Die Studierenden haben fundierte Kenntnisse über Arten der Sicherheitsbedrohungen an IT-Systemen und Maßnahmen zur Abwehr\r\n- Die Studierenden kennen die wesentlichen Begriffe, Konzepte und Technologien der IT-Sicherheit. \r\nSie können diese exemplarisch anwenden.\r\n\r\n- Sie haben vertiefte Kenntnisse in der Anwendung der modernen Kryptographie\r\n- Die Studierende besitzen Kenntnis der Prinzipien zum Entwurf, Umsetzung und Betrieb sicherer Informationssysteme\r\n- Sie kennen die Bedeutung der IT-Sicherheit für die Gesellschaft und kritische Infrastrukturen. Die Studierenden verstehen das einer Public-Key-Infrastruktur zugrunde liegende Vertrauensmodell und können die Vertrauensstufe in eine PKI bewerten\r\n\r\n- Die Studierenden sind mit den rechtlichen Grundlagen für IT-Systeme (Bundesdatenschutzgesetz, Strafgesetzbuch, Bürgerliches Gesetzbuch) vertraut und können zwischen den Persönlichkeitsrech-ten von Mitarbeitern und dem Schutzbedürfnis des Arbeitgebers abwägen.', '- It Sicherheit: Zielsetzungen, Einsatzbereiche, Basisbegriffe, Sicherheitsdienste\r\n- Kryptologie: Synchrone und asynchrone Verfahren, Einsatzgebiete und Algorithmen, Public-Private-Key Verfahren und Infrastrukturen\r\n- Sichere Informationssysteme: Plattformsicherheit, Applikationssicherheit, Sicherheit in Unterneh-mensarchitekturen, Mechanismen und Konstruktionsprinzipien, Technologien und deren Anwendung\r\n- Rechtliche Aspekte: Gesetze, Durchsetzung, Datenschutzbeauftragte/Organisation', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung\r\nKriha, Walter; Schmitz, Roland. Sichere Systeme. Springer. Stuttgart. 2009\r\nErtel, Wolfgang. Angewandte Kryptographie. Carl Hanser Verlag. München. 2007\r\nBuchmann, Johannes. Einführung in die Kryptographie, 5. Auflage. Springer. 2010\r\nSchmidt, Klaus. Der IT Security Manager. Carl Hanser Verlag. München. 2006', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Grundlagen Programmieren , Betriebssysteme', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an den Übungen'),
(4, 7, '2015-01-17', 2, 'Freigegeben', 'TINF', 'Theoretische Informatik', 'Theoretical Computer Science', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 70, '- Tiefere Kenntnis der Automatentheorie\r\n- Fähigkeit verschiedene Automaten zu analysieren und Probleme darin zu formulieren\r\n- Sie beherrschen reguläre Sprachen und sind mit der Theorie der Turing-Maschinen vertraut, inklusive deren Beweise und Charakteristika.\r\n- Die Studierenden kennen die wichtigsten Komplexitätsklassen von\r\nAlgorithmen und können Lösungsalgorithmen für typische\r\nProblemstellungen der Informatik hinsichtlich ihrer Effizienz bewerten\r\n\r\n- Sie kennen das Prinzip formaler Sprachen und können sie in typischen\r\nAnwendungsszenarien einsetzen.', '- Automatentheorie\r\nTuring-Maschinen (deterministische, indeterminierte, universelle), Entscheidbarkeit, aufzählbar vs abzählbar, Registermaschinen (LOOP, WHILE, GOTO), Mächtigkeit\r\n- Komplexitätstheorie\r\nKomplexitätsklassen, vollständige und harte Probleme, Satz von Cook, Nachweisbarkeit von NP-Vollständig\r\n- Berechenbarkeit\r\nBerechenbarkeitsmodelle, Semi-Entscheidbarkeit, Gödelisierung, my-rekursive Funktionen, , Lambda-Kalkül', '["Schriftliche Klausur"]', 'Deutsch', 'Erk, Katrin; Priese, Lutz: Theoretische Informatik: Eine umfassende Einführung. 3.Auflage. Springer-Verlag. Berlin. 2009\r\nSchöning, Uwe: Theoretische Informatik - kurz gefasst. Spektrum Akademischer Verlag. 2008\r\nHoffmann, Dirk: Theoretische Informatik. Hanser Fachbuch. 2009\r\nKreuzer, Martin; Kühling, Stefan. Logik für Informatiker. Person Studium. München. 2006\r\nHopcroft, J.; Ullman, J. Introduction to Automata Theory, Languages, and Computation. Addison Wesely. Reading. 1976', 6, '["Pr\\u00fcfungsleistung"]', 'Logik, Grundlagen zu formalen Sprachen', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(12, 8, '2015-01-16', 2, 'Freigegeben', 'MAT1', 'Mathematik 1', 'Mathematics 1', 'jedes Semester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 30, 90, 70, 'Die Studierenden kennen die grundlegenden Bausteine der Mathematik wie Mengen, Relationen und Funktionen, sowie elementare Beweisverfahren.\r\nDie Studierenden kennen die Eigenschaften insbesondere reeller und komplexer Zahlen, sowie Beispiele grundlegender algebraischer Strukturen (Gruppen, Ringe, Körper).\r\nSie können entscheiden, ob Folgen bzw. Reihen konvergent sind oder nicht und ggf. Grenzwerte berechnen.\r\nDie Studierenden sollen elementare Funktionen der Analysis und ggf. ihre Darstellung als Potenz-reihen kennen. \r\nSie sollen die Begriffe ''Stetigkeit'', ''Differenzierbarkeit'' und ''Integrierbarkeit'' reeller Funktionen einer Variable kennen und beurteilen können, welche dieser Eigenschaften eine gege-bene Funktion hat.', '- Grundlagen (Mengen, Relationen, Funktionen, Beweisverfahren)\r\n- Zahlen (natürliche, ganze, rationale, reelle und komplexe)\r\n- Beispiele von Gruppen, Ringen und Körpern\r\n- elementare Funktionen der Algebra und Analysis\r\n- Folgen und Reihen (Konvergenz, Grenzwert), Potenzreihen\r\n- Stetigkeit und Differenzierbarkeit von Funktionen\r\n- Differential- und Integralrechnung in einer Veränderlichen, Taylorentwicklung', '["Schriftliche Klausur"]', 'Deutsch', '- Stingl: Mathematik für Fachhochschulen, ISBN 3-446-18668-9\r\n- Brill: Mathematik für Informatiker, Hanser-Verlag, ISBN 3-446-22802-0\r\n- Papula: Mathematik für Ingenieure und Naturwissenschaftler Band 1 und 2, ISBN 3834805459 und ISBN 3834805645\r\n- Teschl: Mathematik für Informatiker, Band 1 und 2, ISBN 3540774319 und ISBN 3540280642', 6, '["Pr\\u00fcfungsleistung"]', 'Schulmathematik, ggf. Vorkurs "Mathematik"', 'Fachbegriffe auch in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(12, 9, '2015-01-16', 2, 'Freigegeben', 'MAT2', 'Mathematik 2', 'Mathematics 2', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 30, 90, 70, 'Die Studierenden kennen die Begriffe Vektorraum, Basis und Dimension und können diese auf konkrete Vektorräume anwenden.\r\nSie können lineare Gleichungssysteme und Grundaufgaben der analytischen Geometrie lösen.\r\nDie Studierenden sollen fortgeschrittene Aufgaben zum Matrizenkalkül (Eigenvektoren und Eigenwerte, Basistransformationen) lösen können.\r\n\r\nDie Studierenden sollen partielle Ableitungen berechnen können und einige ihrer Anwendungen kennen. Sie sollen elementare Aufgaben der mehrdimensionalen Analysis und der Fourieranalysis lösen können.', '- Lineare Algebra (Vektorraum, Basis, Matrizen, Determinanten, Lineare Gleichungssysteme)\r\n- Analytische Geometrie im R² und R³\r\n- Eigenwerte und Eigenvektoren, Basistransformationen, orthogonale Matrizen\r\n- Partielle Ableitungen, Richtungsableitung, Extremwertprobleme\r\n- Kurven-, Flächen und Volumenintegrale\r\n- Fourierreihen und Fouriertransformation', '["Schriftliche Klausur"]', 'Deutsch', '- Stingl: Mathematik für Fachhochschulen, ISBN 3-446-18668-9\r\n- Brill: Mathematik für Informatiker, Hanser-Verlag, ISBN 3-446-22802-0\r\n- Papula: Mathematik für Ingenieure und Naturwissenschaftler Band 1 und 2, ISBN 3834805459 und ISBN 3834805645\r\n- Teschl: Mathematik für Informatiker, Band 1 und 2, ISBN 3540774319 und ISBN 3540280642', 6, '["Pr\\u00fcfungsleistung"]', 'Mathematik 1', 'Fachbegriffe auch in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(12, 10, '2015-01-17', 2, 'Freigegeben', 'MAT3', 'Mathematik 3', 'Mathematics 3', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 30, 90, 70, 'Die Studierenden sollen den Kontext der numerischen Analysis, ihre Grundbegriffe (wie Kondition eines Problems und Stabilität eines Algorithmus), sowie die Darstellung reeller Zahlen durch Maschinenzahlen und die damit verbundenen Probleme kennen.\r\nDie Studierenden sollen gängige numerische Verfahren zur Lösung von Systemen linearer und nichtlinearer Gleichungen, zur Interpolation und Approximation, zur numerischen Berechnung von Ableitungen und Integralen und zur numerischen Lösung von Anfangswertprobleme gewöhnlicher Differentialgleichungen verstehen und anwenden können.\r\nDie Studierenden sollen Grundbegriffe der Wahrscheinlichkeitstheorie kennen und die Ereigniswahr-scheinlichkeit in elementaren Zufallsexperimenten berechnen können. Sie sollen beschreibende Statistiken verstehen und erstellen sowie elementare statistische Test- und Schätzverfahren anwenden können.', '- Maschinenzahlen\r\n- Numerische Lösung linearer Gleichungssysteme\r\n- Nullstellenbestimmung nichtlinearer Gleichungssysteme\r\n- Interpolation und Approximation\r\n- Numerische Differentiation und Integration\r\n- Numerische Lösung von Anfangswertproblemen gewöhnlicher Differentialgleichungen\r\n- Beschreibende Statistik, Verteilungsparameter, Korrelation und Regression\r\n- Wahrscheinlichkeitsrechnung: Ereignisalgebra, Unabhängigkeit, bedingte Wahrscheinlichkeit, Zufallsvariablen, wichtige diskrete und kontinuierliche Verteilungen\r\n- Schließende Statistik: Punkt- und Intervallschätzungen, Hypothesentests', '["Schriftliche Klausur"]', 'Deutsch', '- Knorrenschild: Numerische Mathematik, ISBN 3446422285\r\n- Schwarz, Köckler: Numerische Mathematik, ISBN 3834806838\r\n- Burden, Faires: Numerical Analysis, ISBN 0-534-40499-5\r\n- Sachs: Wahrscheinlichkeitsrechnung und Statistik, ISBN 978-3-446-42045-8\r\n- Stingl: Mathematik für Fachhochschulen, ISBN 3-446-18668-9\r\n- Teschl: Mathematik für Informatiker, Band 1 und 2, ISBN 3540774319 und ISBN 3540280642', 6, '["Pr\\u00fcfungsleistung"]', 'Mathematik 1, Mathematik 2', 'Englisch bei Bedarf, Tafelanschrieb in Englisch, Deutsch bei Bedarf', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(2, 11, '2015-01-16', 2, 'Freigegeben', 'REAR', 'Rechnerarchitektur und Technische Grundlagen der Informatik', 'Computer Architecture and technical foundations of Computer Science', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 15, 15, 70, 'Strukturierung eines Rechnersystems von Hardware bis Betriebssystem kennen und verstehen.\r\nStruktur und Funktion des Von-Neumann-Rechners verstehen und mit realen Systemen vergleichen können.\r\nArchitektur, beispielhafter Aufbau und Funktionsweise moderner Prozessoren, Speicher und Kommunikationsstrukturen verstehen und analysieren.', '- Von Neumann-Rechner, Abwicklermodell\r\n- Prozessoren: Steuerkreismodell, CISC- und RISC-Architekturen\r\n- Pipelining, Superskalar- und Multicore-Architekturen\r\n- Kommunikationssysteme im Rechner\r\n- Speicherarchitektur, Caches\r\n- Ein-/Ausgabe', '["Schriftliche Klausur"]', 'Deutsch', 'Folienunterlagen zur Vorlesung\r\nTanenbaum: Computerarchitektur\r\nPatterson, Hennessy: Rechnerorganisation und Entwurf', 3, '["Pr\\u00fcfungsleistung"]', 'Informatikgrundlagen', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(6, 12, '2015-01-17', 2, 'Freigegeben', 'IGRU1', 'Grundlagen der Informatik 1', 'Introduction to Computer Science 1', 'jedes Semester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 70, '- Kenntnis von Grundzügen der Geschichte der Informatik\r\n- Kenntnis von Gebieten und Methoden der Logik\r\n- Fähigkeit logische Methoden anzuwenden\r\n- Kenntnis von Zahlensystemen und -darstellungen\r\n- Verständnis von Rundungs- und Rechenfehlern\r\n- Fähigkeit zum Um-/Rechnen in verschiedene/n Zahlensysteme/n\r\n- Verständnis des Aufbaus und der Funktion eines Von Neumann Rechners\r\n- Fähigkeit einfache maschinennahe Programme zu erstellen', '- Geschichte der Informatik\r\n- Logik: Boolesche-, Prädikaten-, Schaltalgebra\r\n- Zahlensysteme und -darstellungen\r\n- von Neumann-Architektur\r\n- Spezifikation\r\n- Assembler', '["Schriftliche Klausur"]', 'Deutsch', 'Gumm, H.P.; Sommer, M. Einführung in die Informatik, Oldenbourg Verlag, 2010\r\nRausch, P. Informatik für Ingenieure, Vieweg\r\nBöttcher, A. Kneißl, F. Informatik für Ingenieure, Oldenbourg, 2001\r\nSchneider, U. Werner, D. Taschenbuch der Informatik, Fachbuchverlag Leipzig, 2007\r\nKreuzer, Martin. Kühling, Stefan. Logik für Informatiker, Pearson, 2006\r\nBalzert, Helmut. Lehrbuch Grundlagen der Informatik, Spektrum Verlag, 1999', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(8, 16, '2015-01-26', 5, 'Freigegeben', 'BESY', 'Betriebssysteme', 'Operating Systems', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 70, 'Die Studierenden verstehen und kennen die Grundkonzepte und Aufgaben von Betriebssystemen (Prozesse, Dateien, Speicherverwaltung) und können diese in verschiedenen Betriebssystemen handhaben.\r\nDen grundlegenden Aufbau von Betriebssystemen kennen. Verschiedene Arten von Betriebssystemen kennen sowie verschiedene Betriebssystemarchitekturen unterscheiden können. Wichtige Systemschnittstellen und deren Verwendung an einfachen Beispielen in Programmen kennen. \r\nDie Studierenden beherrschen den Umgang mit der Unix/Linux Shell und sind in der Lage einfache Shell-Skripte zu erstellen', 'Betriebssysteme:\r\n- Architektur, Aufgaben, Konzepte und Grundlagen von Betriebssystemen\r\n- Systemschnittstelle\r\n- Die Unix Shell\r\n- Betriebssystemarten\r\n- Prozess- und Betriebsmittelsteuerung\r\n- Synchronisationskonzepte\r\n- Interprozesskommunikation\r\n- Speicherverwaltung\r\n- Dateisysteme und Ein-/Ausgabe', '["Schriftliche Klausur"]', 'Deutsch', '- Skript zur Vorlesung\r\n- Peter Mandl, Grundkurs Betriebssysteme, Vieweg 2013, ISBN 978-3-8348-1897-3\r\n-Eduard Glatz, Betriebssysteme: Grundlagen, Konzepte, Systemprogrammierung, dpunkt verlag 2010, ISBN 978-3898646789\r\n- Andrew S. Tanenbaum: Modern Operating Systems, Prentice Hall International 2013, ISBN 978-12920257734', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Schulmathematik', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(4, 17, '2015-01-17', 2, 'Freigegeben', 'ALDA', 'Algorithmen und Datenstrukturen', 'Algorithm and Data Structures', 'jedes Semester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 45, 105, 50, 'Die Studierenden verstehen das Konzept abstrakter Datentypen. Sie kennen elementare Datenstrukturen sowie darauf arbeitende Algorithmen und verstehen deren Vor- und Nachteile.\r\nDie Studierenden kennen allgemeine Konzepte zum Entwurf von Algorithmen (z.B. Greedy-Verfahren, Divide-and-Conquer-Verfahren) und erkennen Gemeinsamkeiten innerhalb von Algorithmenfamilien.\r\nSie sind in der Lage, adäquate Algorithmen und Datenstrukturen für gegebene Probleme auszuwählen, anzupassen und anzuwenden, sowie sich selbstständig neue Algorithmen und Datenstrukturen anzueignen. Sie können für gegebene Probleme zielgerichtet und methodisch sinnvolle algorithmische Lösungen entwerfen.\r\nAufbauend auf ihren Kenntnissen können die Studierenden Angaben zu Zeit- und Speicheraufwand von Algorithmen interpretieren und für grundlegende Problemstellungen selbst analysieren.', '- Algorithmus, Datenstruktur, abstrakter Datentyp\r\n- Listen, Stacks, Queues\r\n- Suchen, Sortieren\r\n- Komplexität\r\n- Bäume, Graphen, Speichern & Traversierung von Bäumen und Graphen, Balancierte Bäume, dynamisches Balancieren\r\n- Rekursive Algorithmen / Iterative Algorithmen\r\n- Elementare Algorithmen für Graphen, Fluß- und Wegeprobleme\r\n- Problemlösungsstrategien (Greedy, Backtracking, ...)\r\n- Ausgewählte Probleme (Traveling Salesman, Knapsack-Problem, ...)\r\n- Hashing\r\n- Hierarchisierung und Strukturierung komplexer Problemstellungen', '["Schriftliche Klausur"]', 'Deutsch', '- Ottmann, Widmayer: Algorithmen und Datenstrukturen, Spektrum Akademischer Verlag, 4. Auflage\r\n- R. H. Güting, S. Dieker: Datenstrukturen und Algorithmen, Teubner Verlag, 2. Auflage\r\n- G. Saake, K.-U. Sattler: Algorithmen und Datenstrukturen – Eine Einführung mit Java, dpunkt Verlag, 2. Auflage', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(2, 18, '2015-01-16', 2, 'Freigegeben', 'KONE', 'Kommunikation und Netze', 'Communication and Computer Networks', 'Sommersemester', '1 Semester', '["Vorlesung","Labor"]', 60, 15, 105, 70, '- Grundstrukturen und -funktionen von Kommunikationssystemen kennen und auf bestehende Systeme anwenden\r\n- Schichtenmodelle auf reale Systeme anwenden und erarbeiten\r\n- Ethernet, Funknetzwerke und TCP/IP-Architektur verstehen\r\n- Einfache Lokale Netzwerke planen, aufbauen und in Betrieb nehmen können\r\n- IP-Konfiguration analysieren, in einfachen Umgebungen planen, konfigurieren und in Betrieb nehmen können\r\n- Grundstruktur verteilter Anwendungen, Client-/Server-Prinzip verstehen und auf vorhandene Anwendungen übertragen können\r\n- Grundkonzepte von Vermittlungssystemen verstehen\r\n- Datenvekehrsprotokolle in lokalen Netzen aufzeichnen, analysieren und bewerten können. Neue Kommunikationstechniken in bekannte Konzepte einordnen können und sich in Funktionsweise und Konfigurationen einarbeiten können', '- Grundstrukturen von Kommunikationssystemen\r\n- Grundfunktionen und -begriffe\r\n- Schichtenmodelle\r\n- Ethernet-Netzwerke, WLAN\r\n- TCP-/IP-Architektur\r\n- IP-Adressierung, Routing\r\n- TCP-/UDP-Funktionen\r\n- Client-/Server-Architektur\r\n- Vermittlungsmodelle und Beispiele\r\n- Protokollanalyse im lokalen Netzwerk, Konfiguration und Verhalten von Rechnern im lokalen Netz', '["Schriftliche Klausur"]', 'Deutsch', '- Foliendateien zur Vorlesung, Übungsblätter, Laboraufgabenblätter\r\n- Peterson, Davie: Computernetze\r\n- Tanenbaum: Computer-Netzwerke. Prentice-Hall\r\n- RFCs', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Schulmathematik, binäre Informationsdarstellung', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an Laborübungen'),
(8, 19, '2015-01-17', 2, 'Freigegeben', 'DABA', 'Datenbanken', 'Database Systems', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 70, 'Die Studierenden kennen Abstraktions-, Analyse- und Modellierungstechniken zur Erstellung eines Datenbank-Entwurfs für eine konkrete Anwendung. Die Studierenden beherrschen die wichtigsten Grundlagen der Datenmodellierung und der der Normalisierung.\r\nSie kennen das Transaktionskonzept, wesentliche Aufgaben von Datenbankmanagementsytemen sowie grundlegende Aufgaben der Administration von Datenbank-Servern.\r\nSie beherrschen die wichtigsten Grundelemente der Datenbank-Sprache SQL und kennen die Relationenalgebra als deren Grundlage.', 'Entwurf von Datenbanken:\r\n- ER-Modell, Relationales Modell, Entwurf von relationalen Datenbanken\r\n- Datenbankprogrammierung:\r\n- SQL, Stored Procedures und Trigger\r\n- DB Interfaces zu Programmiersprachen z.B. JDBC\r\nDatenbanken:\r\n- Grundlagen der physischen\r\n- Überblick Transaktionskonzept und seiner Implikationen: ACID\r\n- Mehrbenutzersynchronisation\r\n- Autorisierung, Sicherheitsaspekte', '["Schriftliche Klausur"]', 'Deutsch', '- Skript zur Vorlesung\r\n- Kemper, A.: „Datenbanksysteme“, 8. Auflage, 2011, Oldenbourg\r\n- Elmasri, R.: „Grundlagen von Datenbanksystemen“, Bachelorausgabe, 2009, Pearson\r\n- Heuer, A.: „Datenbanken - Konzepte und Sprachen“, 3. Auflage, 2007, Mitp-Verlag', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Grundlagen der Informatik I, Einführung Programmieren', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(11, 20, '2015-01-17', 2, 'Freigegeben', 'SENG', 'Software Engineering', 'Software Engineering', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 100, 'Die Studierenden entwickeln Verständnis für die Softwareentwicklung als Prozess.\r\nDie Studierenden kennen wichtige Vorgehensmodelle und Beschreibungsformen für Artefakte. Sie entwickeln die Fähigkeit, Softwaresysteme auf verschiedenen Abstraktionsebenen zu beschreiben.\r\nDie Studierenden besitzen die Fähigkeit zum systematischen Entwurf einfacher Softwaresysteme - von der Anforderung zur Implementation. Sie haben Kenntnisse der Grundkonzepte der objektorientiertem Softwarenentwicklung.\r\nDie Studierenden beherrschen den Umgang mit UML und CASE Werkzeugen. Sie erwerben die Befähigung zur Teamarbeit, Präsentation von Artefakten, Einhaltung von Standards und Terminen.', '- Überblick über wichtige Gebiete des Software Engineerings\r\n- Softwareentwicklung: Phasen und Vorgehensmodelle\r\n- Systemanalyse und Anforderungsfestlegung\r\n- Software-Entwurf und Software-Architekturen\r\n- Implementierung\r\n- Testen und Integration\r\n- Installation, Abnahme und Wartung\r\n- Softwareergonomie\r\n- Aufwandsschätzung von IT-Projekten.', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung\r\n\r\nBücher mit Titel:\r\n- Ludewig J., Lichter H.: Software Engineering, dpunkt.verlag, ISBN 3-89864-268-2\r\n- Grechenig T. u.a.: Softwaretechnik, Pearson Studium, ISBN 978-3-86894-007-7\r\n- Bell D.: Software Engineering for Students, Addsion-Wesley, ISBN 0-321-26127-5\r\n- Maciaszek, L.. A. Liong, B. L.: Practical Software Engineering, Addison Wesley, ISBN 0-321-20465-4, 2004\r\n- Sommerville I.: Software Engineering, Person Studium, ISBN 3-\r\n8273-7001-9, 2001\r\n- Dumke, R.: Software Engineering - Eine Einführung für Informatiker und Ingenieure, Vieweg Publ., ISBN 3-528-35355-4, 2003\r\n- UML 2.0 Das umfassende Handbuch, Galileo Computing, ISBN 3-89842-573-8, 2005\r\n- Born M., Holz E., Kath O.:Softwareentwicklung mit UML 2, Addison Wesley, ISBN 3-8273-2086-0, 2004.', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an den Übungen'),
(3, 21, '2015-01-17', 2, 'Freigegeben', 'PARA', 'Parallele Datenverarbeitung', 'Parallel Data Processing', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 70, 'Die Studierenden kennen grundlegende Konzepte und Paradigmen von parallelen und verteilten Systemen (insbesondere Kommunikation, Synchronisation, Konsistenz, Fehlertoleranz, verteilte Namensräume, verteilte Dateisysteme, Distributed Shared Memory) sowie systematische Methoden zum Entwurf paralleler und verteilter Programme. Sie können verteilte Anwendungen in Java oder C/C++ im Client-Server-Modell unter Verwendung des Nachrichten-Paradigmas oder mit Hilfe von RPC / RMI entwickeln. Die Studierenden erhalten ferner einen Einblick in das Cluster und Grid Computing.', '- Begriffe der Parallelverarbeitung\r\n- Architektur paralleler Plattformen\r\n- Parallele Programmiermodelle\r\n- Laufzeitanalyse\r\n- Message Passing\r\n- Threads\r\n- Cluster Computing\r\n- Grid Computing', '["Schriftliche Klausur"]', 'Deutsch', 'T. Rauber; G. Rünger: Parallel Programming for Multicore and Cluster Systems, Springer, ISBN 978-3-642-04817-3\r\nC. Breshears: The Art of Concurrency: A Thread Monkey''s Guide to Writing Parallel Applications, O''Reilly Media, ISBN 978-0596521530\r\nA. Tanenbaum, M. van Steen: Distributed Systems: Principles and Paradigms. Prentice Hall, ISBN 978-0-136-13553-1\r\nG. Bengel, C. Baun, M. Kunze, K.-U. Stucky: Masterkurs Parallele und Verteilte Systeme: Grundlagen der Programmierung von Multicoreprozessoren, Multiprozessoren, Cluster und Grid, Vieweg+Teubner, ISBN 978-3-834-80394-8\r\nR. Oechsle: Parallele und verteilte Anwendungen in Java. Hanser, 3. Auflage, ISBN 978-3-446-42459-3\r\nO. Haase: Kommunikation in verteilten Anwendungen. Oldenbourg Verlag, 2. Auflage, ISBN 978-3-48658481-3', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Programmieren 1', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(11, 22, '2015-01-16', 2, 'Freigegeben', 'KOKO', 'Kommunikative Kompetenz', 'Communication Competence', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung","Seminar"]', 0, 0, 180, 30, 'Fertigkeiten zur Präsentation:\r\n- über verbale, paraverbale und nonverbale Fertigkeiten für eine wirkungsvolle Selbstdarstellung, Rede und Präsentation verfügen\r\n- verschiedene Redeformen ausarbeiten können\r\n- Informationen optisch aufbereiten und verschiedene Medien einsetzen können\r\n- mit Angst und Lampenfieber umgehen können\r\n- Störungen und Einwände bewältigen können\r\n- Präsentationen souverän durchführen können\r\n\r\nFertigkeiten zur beruflichen Kommunikation:\r\n- Ablauf des zwischenmenschlichen Kommunikationsprozesses, Einflussgrößen, Missverständnisse und Störungen im Kommunikationsprozess verstehen\r\n- über Fähigkeiten zur Bewältigung komplexer Anforderungssituationen der zwischenmenschlichen Kommunikation im beruflichen Alltag verfügen:\r\n- eigenes Gesprächsverhalten reflektieren und bewusst gestalten\r\n- partnerzentriert auf den Gesprächspartner eingehen\r\n- mit anderen im Team konstruktiv zusammenarbeiten\r\n- Methoden zur beruflichen Konfliktbewältigung kennen und einsetzen\r\n\r\nSeminar:\r\n- aktuelle Fachkenntnisse selbstständig erwerben\r\n- komplexe fachlich Zusammenhänge auf Wesentliches reduzieren und darstellen können\r\n- Fachdiskussionen führen können\r\n- schriftliche Zusammenfassungen erstellen können', '- Verbale, paraverbale und nonverbale Mitteilungsformen und deren gezielter Einsatz bei Selbstdarstellung, Reden, Präsentationen\r\n- Inhaltliche Ausarbeitung verschiedener Redeformen\r\n- Visualisierungsmöglichkeiten und Einsatz verschiedener Medien\r\n- Umgang mit Angst und Lampenfieber\r\n- Bewältigung von Störungen und Einwänden\r\n\r\nKommunikation:\r\n- Psychologische Kommunikationsmodelle\r\n- Störungen und Konflikte in der zwischenmenschlichen Kommunikation\r\n- Kommunikative Fertigkeiten im beruflichen Dialog:\r\n\r\n- Partnerzentrierte Gesprächsführung\r\n- Aktives Zuhören\r\n- Argumentationsstrategien und Einwandtechniken\r\n- Feedback geben und effektiv verwerten\r\n- Konstruktive Kritik- und Ärgeräußerung\r\n- Konflikte im beruflichen Alltag und ihre Bewältigung\r\n\r\nSeminar:\r\n- Inhalte werden ausgewählt aus aktuellen Trends in Wissenschaft und Industrie der Informations-technologie', '{"1":"Vortrag","0":"M\\u00fcndliche Pr\\u00fcfung"}', 'Deutsch', 'Albert Thiele: Präsentieren Sie einfach, Frankfurter Allgemeine Buch\r\nWolfgang Mentzel: Rhetorik: Sicher und erfolgreich sprechen, dtv \r\nJosef W. Seifert: Visualisieren, Präsentieren, Moderieren, Gabal \r\nUwe Vigenschow u.a.: Softskills für Softwareentwickler, dpunkt\r\nFriedemann Schulz von Thun: Miteinander reden, 1-3, Rowohlt\r\nFriedemann Schulz von Thun, Johannes Rupel, Roswitha Stratmann: Miteinander reden: Kommuni-kationspsychologie für Führungskräfte, Rowohlt\r\n\r\nAlbert Thiele: Die Kunst zu überzeugen: Faire und unfaire Dialektik, Springer \r\nElisabeth Bonneau: Stilvoll zum Erfolg: Der moderne Business-Knigge, Hoffmann und Campe Vera Birkenbihl: Signale des Körpers: Körpersprache verstehen, mvg-Verlag\r\n\r\nLiteratur zum Seminar:\r\nEntsprechend der jeweils aktuellen Aufgabenstellung aus dem Gebiet der Informatik.', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'erfolgreiche Modulklausur und bewerteter Seminarvortrag mit schriftlicher Ausarbeitung, die Gesamtnote ergibt sich aus beiden Prüfungsteilen zu je 50 %', 'erfolgreiche Teilnahme an den Übungen'),
(16, 23, '2015-01-16', 2, 'Freigegeben', 'JURA', 'Juristische Aspekte', 'Legal Aspects', 'jedes Semester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 70, 'Die Studierenden haben ein Bewusstsein für Rechtsfragen und kennen mögliche rechtliche Implikationen ihres späteren Arbeitsumfeldes. Dazu gehört insbesondere die Kenntnisse über Grundlagen des bürgerlichen Gesetzbuchs BGB sowie rechtliche Aspekte der Informatik.', '- Einteilung der Rechtsgebiete\r\n- Aus dem Zivilrecht: Grundlagen des Allgemeinen Teils des Schuldrechtes und des Sachenrechtes des BGB, Vertragsrecht\r\n- Aufbau der Gerichtsbarkeit in Deutschland einschließlich Grundlagen Prozessrecht\r\n- Internetrecht (Domainrecht, Vertragsrecht im Internet, Urheberrecht, Haftung nach dem Teledienstegesetz, Grundlagen Datenschutz).', '["Schriftliche Klausur"]', 'Deutsch', '- Führich, Ernst: Wirtschaftsprivatrecht\r\n- Enders, Matthias / Hetger, Winfried: Grundzüge der betrieblichen Rechtsfragen\r\n- Ullrich, Norbert: Wirtschaftsrecht für Betriebswirte\r\n- Wörlen, Rainer: Handelsrecht mit Gesellschaftsrecht\r\n- Führich, Ernst; Werdahn, Ingrid: Wirtschaftsprivatrecht in Fällen und Fragen.', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(5, 24, '2015-01-17', 2, 'Freigegeben', 'BWL1', 'Betriebswirtschaftslehre 1', 'Business Administration', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 70, '- Allgemeiner Überblick über die Teilgebiete der Betriebswirtschaftslehre und betrieblicher Funktionen\r\n- Verständnis wesentlicher Verknüpfungspunkte der kaufmännischen Aspekte zu den technischen Bereichen des Unternehmens\r\n- Kenntnisse grundlegender Methoden der Betriebswirtschaftslehre in unterschiedlichen Bereichen des Unternehmens\r\n- Fähigkeiten, grundlegende Problemstellungen von Unternehmen mit betriebswirtschaftlichen Entscheidungskriterien zu lösen', '- Gegenstand der Betriebswirtschaftslehre\r\n- Aufbau des Betriebes inkl. betrieblicher Produktionsfaktoren, Wahl der Rechtsform\r\n- Einblick externes und internes Rechnungswesen\r\n- Grundlagen der Produktion und Produktionsplanung\r\n- Grundzüge von Vertrieb und Marketing mit typischen absatzpolitischen Instrumenten\r\n- Statische und dynamische Verfahren der Investitionsrechnung, Quellen der Finanzierung', '["Schriftliche Klausur"]', 'Deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nG. Wöhe, Einführung in die Allgemeine Betriebswirtschaftslehre, Verlag Vahlen, München\r\nJ.-P. Thommen und A.-K. Achleitner: Allgemeine Betriebswirtschaftslehre: Umfassende Einführung aus managementorientierter Sicht, Gabler-Verlag, Wiesbaden', 6, '["Pr\\u00fcfungsleistung"]', 'Schulmathematik', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(5, 25, '2015-01-17', 2, 'Freigegeben', 'BWL2', 'Betriebswirtschaftslehre 2', 'Business Administration 2', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 0, 0, 180, 70, 'Die Studierenden vertiefen die BWL Grundkenntnisse aus dem Pflichtmodul Betriebswirtschaft insbesondere im Bereich der Unternehmensgründung und Kostenrechnung.\r\nZiel ist, für Informatiker praxisrelevante betriebswirtschaftliche Inhalte zu vermitteln und diese Methoden bzw. zugehörigen Werkzeuge (z.B. betriebswirtschaftliche Standardsoftware) im Unternehmen anwenden zu können.\r\n\r\nZur Abdeckung des Moduls "Betriebswirtschaftslehre 2" wird ein speziell für Informatiker geplantes Modul angeboten.', 'Grundlagen der Unternehmensgründung\r\n\r\nInternes Rechnungswesen\r\n- Überblick über das interne Rechnungswesen\r\n- Planung und Kontrolle von Einzelkosten und Gemeinkosten\r\n- Plankalkulation und Kostenmanagement\r\n\r\nDurchführung betriebliche Geschäftsprozesse mit ERP-Systemen\r\n- Grundbegriffe, Ziele, Architektur/Aufbau von ERP-Systemen\r\n- Durchführung von Fallstudien in ERP-Systemen mit Bezug zu Einkauf, Produktion, Vertrieb und Logistik\r\n\r\nAktuelle wirtschaftsinformatische Themen, wie bspw. Online Marketing, Bedeutung von Social Media für die Unternehmenswelt etc.', '["Schriftliche Klausur","Hausarbeit"]', 'Deutsch', 'Haberstock, Lothar, Kostenrechnung I, S + W Steuer- und Wirtschaftsverlage Hamburg\r\nCoenenberg, A. G., „Kostenrechnung und Kostenanalyse“, Stuttgart\r\nOlfert, Klaus: Kostenrechnung, Verlag Friedrich Kiehl GmbH, Ludwigshafen\r\nOlaf Jacob (Hrsg.): ERP Value. Signifikante Vorteile mit ERP-Systemen, Springer Verlag\r\nMarcel Siegenthaler und Cyrill Schmid: ERP für KMU. Business Software für Produktion, Handel und Service. BPX-Edition\r\n\r\nWeitere Literaturhinweise gemäß der Unterlagen zur Veranstaltung', 6, '["Pr\\u00fcfungsleistung"]', 'Modul „Betriebswirtschaft“ als Voraussetzung empfohlen', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulklausur oder Ausarbeitung', NULL),
(2, 26, '2015-01-17', 2, 'Freigegeben', 'REIN', 'Rechnersystem-Infrastrukturen', 'Computer Systems Infrastructures', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, '-Konzeptionen von Speichern, Speichersystemen und Speicherhierarchien verstehen, anwenden und bewerten\r\n- Konzeption von Speichernetzwerken verstehen\r\n- Konzepte und Technologien von SAN und NAS-Speichern verstehen, anwenden und bewerten\r\n- Servicekonzepte wie ILM und Business Continuity kennen', '- Speichermedien, RAID, Speichersysteme\r\n- Speichernetze\r\n- NAS und weitere Arten von Datenspeichern\r\n- Backup, Replikationen, Snapshots\r\n- Sicherheit und Management von Speichersystemen', '["Schriftliche Klausur"]', 'Deutsch', 'EMC Education Service: Information Storage and Management\r\nTroppens, Erkens, Müller: Speichernetze', 6, '["Pr\\u00fcfungsleistung"]', 'Rechnerarchitektur, Kommunikationssysteme', 'Unterlagen vollständig Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(2, 28, '2015-01-21', 3, 'Freigegeben', 'ADMIN', 'Administration', 'Administration', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, '- Konzeption und Adminstrativen Umgang mit Netzwerk- und Rechnerdiensten verstehen, anwenden und auf neue Aufgabenstellungen übertragen können.\r\n- Wichtige Aufgaben bei der Administration von vernetzten Arbeitsumgebungen verstehen und durchführen\r\n- Typische netzwerkweite Dienste kennen und konfigurieren\r\n- Diensteverwaltung in vernetzten Umgebungen verstehen und einsetzen', '- Exemplarisches Kennenlernen wichtiger Dienste im Netz\r\n- DNS\r\n- Verzeichnisdienste\r\n- Mailarchitektur\r\n- Netzwerksicherheit\r\n- Netzwerkmanagement', '["Schriftliche Klausur"]', 'Deutsch', 'Folienunterlagen\r\nLiteratur abhängig von Projektthemen', 6, '["Pr\\u00fcfungsleistung"]', 'Schulmathematik', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(6, 29, '2015-01-16', 2, 'Freigegeben', 'MUME', 'Multimedia', 'Multimedia', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 0, 0, 180, 35, 'Kenntnis und Verständnis gängiger Multimedia Formate und Systeme. Fähigkeit zur Anwendung verschiedener Kompressions- und Fehlerkorrekturalgorithmen. Fähigkeit zur Analyse von Anwendungsfällen und Auswahl adäquater Formate, Systeme und Techniken. Fähigkeit zur Entwicklung eines Multimedialen Systems unter Berücksichtigung gegebener Randbedingungen. Fähigkeit zur Einschätzung der Aufwände bei der Erstellung eines Multimedialen Systems.', 'Lehrinhalte im theoretischen Teil sind:\r\n- Diskrete und kontinuierliche Medien, Multimedia Datenformate:\r\n- Kompression & Fehlerkorrektur\r\n- Bilder\r\n- Audio\r\n- Video\r\n- Multimedia Systeme: Anforderungen und Konzepte\r\n- Datenmengen, Synchronität\r\n- Aufbau von MM-Systemen\r\n- Speichermedien (CD, DVD, Blue-Ray u. ä.)\r\n- Erstellung von Multimedia Präsentationen\r\n- Programmierumgebungen\r\n- Autorensysteme\r\n- Skriptsprachen\r\n- 3D-Welten (z.B. VRML, X3D\r\n\r\nIm praktischen Teil wird das theoretische Wissen in Form eines Multimedia Projektes umgesetzt. Hierbei sind folgende Arbeiten durchzuführen:\r\n- Planungs – und Managementarbeiten\r\n- Projektplan\r\n- Pflichtenheft\r\n- Storyboard\r\n- Umsetzungsarbeiten für mehrere Versionen eines Multimedia-Informationssystem ( z.B. Stand-Alone-Version, Web-Version und Interaktive Demo).', '["Hausarbeit"]', 'Deutsch', 'R. Steinmetz: Multimedia Technologie: Grundlagen, Komponenten und Systeme. ISBN 3-540-62060-5, Springer Verlag\r\nP. A. Henning: Taschenbuch Multimedia.ISBN 3-446-21274-4, Fachbuchverlag Leipzig\r\nR. S. Schifman, G. Heinrich: Multimedia-Projektmanagement. ISBN 3-540-67120-X, Springer Verlag', 6, '["Pr\\u00fcfungsleistung"]', 'Informatik Grundlagen', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Erfolgreich bearbeitetes Projekt', NULL),
(11, 30, '2015-01-17', 2, 'Freigegeben', 'MOBI', 'Mobile Computing', 'Mobile Computing', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 30, 25, 'Die Studierenden erwerben Grundkenntnisse über die mobile Kommunikation mit dem Schwerpunkt auf digitaler Datenübertragung. Sie können Anwendungen unter der Nutzung aktueller mobiler Techniken und Protokolle entwickeln. \r\nDie Studenten können selbständig die Anforderungen erfassen, die Software planen, implementieren, testen und in vorhandene Systeme integrieren. Sie sind in der Lage die notwendigen Werkzeuge und Techniken auszuwählen und einzusetzen.', '- Grundlagen, Techniken und Protokolle für mobile Vernetzungen\r\n- Konzepte und technische Grundlagen der Programmierung mobiler Endgeräte\r\n- Entwicklungsschritte mobiler Applikationen\r\n- Mobile Anwendungen als Verteilte Systeme (Client- Server Sicht)\r\n- Verfahren zur Positionsbestimmung (GPS)\r\n- Entwicklung von Anwendungen mit Ortsbezogenheit\r\n- Mobiles Internet und seine Anwendungen\r\n- Ad-hoc-Vernetzung\r\n- Sicherheit mobiler Anwendungen.', '["Hausarbeit"]', 'Deutsch', 'Skript zur Vorlesung\r\n\r\nBücher mit Titel:\r\n- Fuchß T.: Mobile Computing - Grundlagen und Konzepte für mobile Anwendungen, Hanser, ISBN 978-3-446-22976-1, 2009\r\n- Mosemann H.; Kose M.: Android, ISBN 978-3-446-41728-1, 2009\r\n- Schiller J.: Mobilkommunikation, Pearson, ISBN 3-8273-7060-4, 2003\r\n- Roth J.: Mobile Computing Grundlagen, Technik, Konzepte, dpunkt.verlag, ISBN 3-89864-366-2, 2005\r\n- Mahgoub I.; Ilyas M.: Mobile Computing Handbook, CRC Press Inc, ISBN 0-84931-971-4, 2004\r\n- Meier R.: Professional Android 2 Application Development, John Wiley & Sons, ISBN 978-0470565520, 2010\r\n- Stäuble M.: Programmieren für iPhone und iPad, Dpunkt Verlag, ISBN 978-3898646895, 2011\r\n- Lehner F.: Mobile und drahtlose Informationssysteme, Springer, ISBN 3-540-43981-1, 2002', 3, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'und Ausarbeitung', 'erfolgreiches Praxisprojekt und Hausarbeit', NULL),
(3, 32, '2015-01-16', 2, 'Freigegeben', 'GPU', 'GPU Programmierung', 'GPU Programming', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 30, 25, 'Die Studierenden verstehen den grundsätzlichen Ansatz und die Vorgehensweise zur Programmie-rung einer Graphics Processing Unit (GPU) unter Verwendung der Open Computing Language (OpenCL). Sie kennen den Aufbau und die Funktionsweise einer GPU und beherrschen die erforderlichen Programmiertechniken. Die Studierenden können einfache Probleme hinsichtlich Ihrer Eignung für das GPU Computing analysieren, mögliche Lösungen in OpenCL implementieren und auf korrekte Funktionalität überprüfen.', '- Historie des GPU Computing\r\n- Einführung in OpenCL\r\n- GPU Architekturen\r\n- OpenCL Puffer\r\n- GPU Speichermodell\r\n- GPU Threads und Management\r\n- Performanz Optimierung\r\n- Anwendungsbeispiel: Partikelsystem\r\n- OpenCL Erweiterungen\r\n- OpenCL Events, Synchronisation und Profiling\r\n- Fehlersuche / Debugging\r\n- OpenCL im GPU Verbund', '["Schriftliche Klausur"]', 'Deutsch', 'A. Munshi, B. Gaster, T. G. Mattson: OpenCL Programming Guide. Addison-Wesley, ISBN 978-0-321-74964-2\r\nD. Kirk, W.-M. W. Hwu: Programming Massively Parallel Processors: A Hands-On Approach (Appli-cations of GPU Computing Series). Morgan Kaufman, ISBN 978-0-123-81472-2\r\nJ. Sanders, E. Kandrot: CUDA by Example: An Introduction to General-Purpose GPU Programming. Addison-Wesley Longman, ISBN 978-0-131-38768-3\r\nW.-M. W. Hwu: GPU Computing Gems (Applications of Gpu Computing). Academic Press, ISBN 978-0-123-84988-5', 3, '["Pr\\u00fcfungsleistung"]', 'Parallele Datenverarbeitung', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL);
INSERT INTO `Veranstaltung` (`modulbeauftragter`, `Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `KontaktzeitVL`, `KontaktzeitSonstige`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `VoraussetzungLP`, `VoraussetzungInhalte`, `SpracheSonstiges`, `Autor`, `PruefungsformSonstiges`, `PruefungsleistungSonstiges`, `StudienleistungSonstiges`) VALUES
(4, 33, '2015-01-16', 2, 'Freigegeben', 'BPM', 'Geschäftsprozess-Modellierung', 'Business Process Modelling', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 20, '- Kenntnis der geschäftlichen und organisatorischen Motivation und Ziele des Geschäftsprozessmanagements\r\n- Kenntnis der Bedeutung, Abgrenzung und Potentiale des BPM\r\n- Kenntnis der Aufgaben, Rollen, Verantwortlichkeiten und Abläufe des Geschäftsprozessmanage-ment und unterstützenden Methoden\r\n- Kenntnis, Beherrschung und praktischen Erfahrung ausgewählter Notation zum BPM\r\n- Fähigkeit der eigenständigen Durchführung von BPM', '- Historie, Entwicklung und Abgrenzung des BPM\r\n- Arten und Zusammenwirken von Geschäftsprozessen\r\n- Identifikation, Standardisierung, Modellierung, Optimierung und Implementierung von Geschäftsprozessen.\r\n- Notation für BPM, insbesondere BPMN und BPEL\r\n- Framework und Vorgehensmodell zur Modellierung und Umsetzung\r\n- Praxisbeispiel und eigene Anwendung', '["Hausarbeit"]', 'Englisch', 'Schmelzer, Hermann; Sesselmann, Wolfgang. Geschäftsprozessmanagement in der Praxis: Kunden zufrieden stellen - Produktivität steigern - Wert erhöhen, Hanser Wirtschaft, 2010\r\nFreund, Jakob; Rücker, Bernd. Praxishandbuch BPMN 2.0, Hanser Fachbuch, 2010\r\nAllweyer, Thomas. BPMN 2.0 - Business Process Model and Notation: Einführung in den Standard für die Geschäftsprozessmodellierung, Books on Demand, 2009\r\nLessen, Tammo van; Lübke, Daniel; Nitzsche, Jörg. Geschäftsprozesse automatisieren mit BPEL, Dpunkt Verlag, 2011\r\nEABPM. Business Process Management Common Body of Knowledge (CBOK). Schmidt Dr. Goetz, Verlag, 2009', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'Übungen und Praxis in Deutsch', 'Prof. Dr. Schmidt', NULL, 'bspw. Anwendung des BPM und Ausarbeitung/Dokumentation der Ergebnisse', NULL),
(4, 34, '2015-01-16', 2, 'Freigegeben', 'EPRO', 'Enterprise Programmierung', 'Enterprise Programming', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung","Praxisprojekt"]', 30, 30, 120, 20, '- Kenntnis der spezifischen Anforderungen der Enterprise Programmierung\r\n- Kenntnisse der Konzepte und Technologien der Enterprise Programmierung\r\n- Fähigkeit zur eigenständigen Mitarbeit bei Aufgaben zur Enterprise Programmierung und Systemintegration\r\n- Theoretische und praktische Kenntnis der wichtigsten Frameworks, Container und Technologien zur Enterprise Programmierung\r\n- Kenntnisse und Erfahrungen zur gemeinschaftlichen, verteilten Entwicklung', 'Motivation, Kontext und Einsatz von Enterprise Programming:\r\n- Unterscheidung der Entwicklung von Anwendungssysteme und Enterprise Programming\r\n- Ansätze, Konzepte, Technologien und Frameworks der Enterprise Programmierung\r\n- Kooperative Entwicklung innerhalb von Unternehmen bis hin zu Continuous Integration\r\n- Transparenz, lose Kopplung, Container-Unabhängigkeit\r\n- Konzepte und Technologien zu: Persistenz, (verteilte) Transaktionen, Dependency Injection, Messaging, Services, Integration/remote-Serviecs, Orchestration', '["Vortrag","Hausarbeit"]', 'Deutsch', 'Ihns, O.; Harbeck, D.; Heldt, S.; Koscheck, H.: EJB 3 professionell, dpunkt.verlag, Heidelberg, 2007\r\nOates, Richard; Langer, Thomas; Wille, Stefan; Lueckow, Torsten; Bachlmayr, Gerald. Spring & Hibernate, Carl Hanser Verlag, München, 2008\r\nBreidenbach, Wall. Spring im Einsatz, Hanser-Verlag, 2010\r\nWiest. Continuous Integration mit Hudson, dpunkt-Verlag, 2010,\r\nBiskup, Wloka, Helmberger. Spring Praxishandbuch: Integration und Testing. Entwickler.Press. 2008.\r\nBiskup, Stalitz, Steiger, Wloka: Spring Praxishandbuch: Band 2: Dynamisierung, Verteilung und Sicherheit. Entwickler.Press. 2009.', 6, '["Pr\\u00fcfungsleistung"]', 'tiefere Programmierkenntnisse', 'Vorlesung in Englisch und Deutsch, Übungen und Praxisprojekt in Deutsch', 'Prof. Dr. Schmidt', NULL, 'Erfolgreicher Abschluss und Dokumentation des begleitenden Praxisprojekts', NULL),
(7, 35, '2015-01-16', 4, 'Freigegeben', 'GRAF1', 'Computergrafik 1', 'Computergraphics 1', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '- Grundlegendes Verständnis der Mechanismen generativer Computergrafik\r\n- Beherrschen eines Grafik-API (OpenGL)\r\n- Fähigkeit, einfache Modelle, Animationen und artikulierte Objekte mit Mitteln des Grafik-API zu programmieren\r\n- Fähigkeit, eine interaktive grafische Applikation (z.B. Spiel, Demo) mit Hilfe von OpenGL zu erstellen.', '- Hard- and Software für Computergrafik\r\n- Transformationen, Modeling\r\n- Viewing\r\n- Visibility\r\n- Shading\r\n- Rasterisierung\r\n- Texture Mapping\r\n- Fortgeschrittene Konzepte: Freies Wandern in der Szene, Schatten, Nebel, ....', '["Hausarbeit"]', 'Deutsch', 'Interactive Computer Graphics - A Top-Down Approach: Edward Angel, Fifth Edition, Addison-Wesley', 6, '["Pr\\u00fcfungsleistung"]', 'Solide Programmierkenntnisse', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Lösen einer praktischen Problemstellung (Programmieraufgabe) als Abschlussleistung', NULL),
(3, 36, '2015-01-16', 2, 'Freigegeben', 'J3D', 'Graphikprogrammierung mit Java 3D', 'Computer Graphics Programming with Java 3D', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden vertiefen ihre Kenntnisse im Bereich der objektorientierten Programmierung mit Java. Sie können eine umfangreiche Aufgabe im Team bearbeiten und sind in der Lage, die Arbeiten in Form eines Projektes selbstständig zu organisieren. Die Studierenden können ihre Kenntnisse der Projektarbeit und des Projektmanagements sowie ihre Programmierkenntnisse in einem Anwendungsprojekt aus dem Gebiet der Grafischen Datenverarbeitung praktisch umsetzen. Hierfür setzen die Studierenden Bibliotheken wie Java3D, JOGL oder JMonkey selbstständig ein.', 'Die Studierenden bearbeiten ein Anwendungsprojekt aus dem Bereich der Grafischen Datenverarbeitung in einer Kleingruppe. \r\nDie gesamte Projektorganisation und das Projektmanagement liegen in den Händen der Studierenden. \r\nFür die Realisierung werden aktuelle Hardware (AR-Glasses, Datag-love, Brain Interface etc.) und verschiedene Bibliotheken (Java3D, JOGL oder JMonkey) eingesetzt, in die sich die Studierenden selbstständig einarbeiten.', '["Schriftliche Klausur"]', 'Deutsch', 'L. Ammeraal, K. Zhang: Computer Graphics for Java Programmers. John Wiley & Sons, ISBN 978-0-470-03160-5\r\nD. Selman: Java 3D Programming. Manning, ISBN 978-1-930-11035-9\r\nF. Klawonn: Grundkurs Computergrafik mit Java: Die Grundlagen verstehen und einfach umsetzen mit Java 3D. Vieweg+Teubner, ISBN 978-3-834-81223-0', 6, '["Pr\\u00fcfungsleistung"]', 'Programmieren 2, Computergraphik 1', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(3, 37, '2015-01-16', 2, 'Freigegeben', 'MCI1', 'Mensch-Computer-Interaktion 1', 'Human-Computer-Interaction 1', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden sollen die wesentlichen Ansätze benutzerorientierter Analyse- und Entwicklungsmethoden kennen und kritisch reflektieren sowie menschliche, soziale und organisatorische Faktoren berücksichtigen können. Sie sollen verstehen, wie Menschen und Computer kommunizieren, handeln und reagieren. Die Studierenden wissen welche Interaktionsformen es für die Kommunikation mit dem Computer gibt. Sie verfügen über die Kompetenz zur Entwicklung von Programmen, die der Anwender erfolgreich benutzen kann. Die Studierenden besitzen theoretische und praktische Kenntnisse für die Entwicklung "user-centered-design" orientierter Mensch-Computer-Systeme. Sie erwerben die Fähigkeit zur Optimierung eines Mensch-Computer Systems und können diese aus Sicht der Anwender sehen und bewerten.', '- Einführung in die Mensch-Computer-Interaktion\r\n- Software Ergonomie\r\n- Wahrnehmung\r\n- Gedächtnis und Erfahrung\r\n- Handlungsprozesse\r\n- Kommunikation\r\n- Normen und Gesetze\r\n- Richtlinien\r\n- Hardware\r\n- Interaktionsformen\r\n- Grafische Dialogsysteme\r\n- Usability Engineering\r\n- Social Engineering', '["Schriftliche Klausur"]', 'Deutsch', 'M. Dahm: Grundlagen der Mensch-Computer-Interaktion, Pearson Studium, ISBN 978-3-827-37175-1\r\nM. Heinecke: Mensch-Computer-Interaktion, Fachbuch Verlag Leipzig, ISBN 978-3-827-37175-1\r\nT. Stapelkamp: Screen- und Interfacedesign. Gestaltung und Usability für Hard- und Software, Springer, ISBN 978-3-540-32949-7\r\nM. Herczeg: Software-Ergonomie: Theorien, Modelle und Kriterien für gebrauchstaugliche interaktive Computersysteme, Oldenbourg, ISBN 978-3-486-58725-8\r\nM. Herczeg: Interaktionsdesign. Gestaltung interaktiver und multimedialer Systeme, Oldenbourg, ISBN 978-3-486-27565-0\r\nB. Shneiderman, C. Plaisant: Designing the User Interfac,. Addison-Wesley, ISBN 978-0-321-19786-3\r\nS. Heim: The Resonant Interface: HCI Foundations for Interaction Design, Addison-Wesley, ISBN 978-0-321-37596-4\r\nH. Sharp, Y. Rogers, J. Preece: Interaction Design - Beyond Human-Computer Interaction, Wiley & Sons, ISBN 978-0-470-01866-8', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(7, 38, '2015-01-16', 2, 'Freigegeben', 'USER', 'Usabilitiy und User Experience', 'Usability and User Experience', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 0, 0, 180, 25, 'Die Studierenden kennen aktuellste Entwicklungen in der Bereichen "Usability" und "User Experience.\r\nDie Studierenden sind in der Lage, eigenverantwortlich wissenschaftliche Recherche zu betreiben und sich benötigte Informationen, Methoden und Verfahren eigenständig zu erarbeiten.\r\nDie Studierenden können Lösungen für komplexe Fragestellungen im Themenbereich "Usability" und "User Experience" systematisch erarbeiten und diese (möglicherweise in Gruppenarbeit) praktisch umsetzen.', 'Aktuelle Themen aus dem Bereich "Usability" und "User Experience".', '["Schriftliche Klausur"]', 'Deutsch', 'Wird jeweils zu Beginn der Veranstaltung angegeben', 6, '["Pr\\u00fcfungsleistung"]', 'Erfolgreiche Teilnahme an der Veranstaltung "Web Usability" hilfreich, aber nicht unbedingt erforderlich', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(3, 39, '2015-01-16', 2, 'Freigegeben', 'MCI2', 'Mensch-Computer-Interaktion 2', 'Human-Computer-Interaction 2', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '- Die Studierenden sollen ihr Wissen und ihre Kenntnisse aus Mensch-Computer-Interaktion 1 vertiefen und weiter entwickeln. Am Beispiel von Qt 4 lernen Sie eine modernes Bibliothek und Werkzeuge zur effizienten Erstellung von Benutzungsoberflächen kennen.\r\n- Die Studierenden können komplexe user-centered-design orientierte Benutzungsoberflächen entwerfen und mit Hilfe von Qt4 implementieren und validieren. Dabei setzen Sie alle Werkzeuge des Qt User Interface Toolkit sicher und effektiv ein.', '- Qt für Einsteiger \r\n- Erste Schritte\r\n- Erstellung von Dialogfeldern\r\n- Erstellung von Hauptfenstern\r\n- Programmierung der Anwendung-Funktionalität\r\n- Erstellung benutzerdefinierter Widgets\r\n- Layout-Verwaltung\r\n- Ereignisverarbeitung\r\n- 2D-Grafik\r\n- Drag & Drop\r\n- Klassen für die Element Präsentation\r\n- Containerklassen\r\n- Ein- und Ausgabe\r\n- Datenbanken\r\n- Multithreading\r\n- Netzwerkprogrammierung\r\n- XML', '["Schriftliche Klausur"]', 'Deutsch', '- J. Blanchette und M. Summerfield: C++ GUI Programming with Qt4. Prentice Hall International, \r\nISBN 978-0-132-35416-5\r\n- M. Summerfield: Advanced Qt Programming: Creating Great Software with C++ and Qt 4, Prentice Hall International, ISBN 978-0-321-63590-7\r\n- A. Ezust, P. Ezust: An Introduction to Design Patterns in C++ with Qt 4, Prentice Hall International, ISBN 978-0-131-87905-8\r\n- D. Molkentin und A. Pönitz: Qt 4. Einführung in die Applikationsentwicklung, Open Source Press, \r\nISBN 978-3-937-51499-4\r\n- J. Wolf: Qt 4.6 - GUI-Entwicklung mit C++: Das umfassende Handbuch, Galileo Computing, ISBN \r\n978-3-836-21542-8', 6, '["Pr\\u00fcfungsleistung"]', 'Programmieren 3, Mensch-Computer-Interaktion 1', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(8, 40, '2015-01-16', 2, 'Freigegeben', 'REQ', 'Requirements Engineering', 'Requirements Engineering', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '-Die Studierenden sollen die Fähigkeit erwerben, Anforderungen in IT-Projekten systematisch ermitteln, dokumentieren, prüfen, abstimmen und verwalten zu können. \r\n-Sie kennen Methoden zur Erstellung von Anforderung-Modellen und können diese anwenden. \r\n-Die Studierenden kennen Möglichkeiten der Werkzeugunterstützung für das Requirements-Management.', '- Theoretische Grundlagen \r\n- Grundlagen und Klassen von Informationssystemen \r\n- Anwendungen im Unternehmen und unternehmen-übergreifende Anwendungen \r\n- Planung, Realisierung und Einführung von betrieblichen Informationssystemen \r\n- Grundlegende Aspekte des Informationsmanagements\r\n- weitere Aspekte der Wirtschaftsinformatik', '["Schriftliche Klausur","M\\u00fcndliche Pr\\u00fcfung"]', 'Deutsch', '-Skript zur Vorlesung\r\n-Mertens P, Bodendorf F., Grundzüge der Wirtschaftsinformatik, Springer\r\n-Schwarzer B., Krcmar H., Grundlagen betrieblicher Informationssysteme, Schäffer-Poeschel\r\n-Abts, D., Grundkurs Wirtschaftsinformatik: Eine kompakte und praxisorientierte Einführung, Vieweg+Teubner\r\n-Hansen H.R., Neumann G., Wirtschaftsinformatik 1 + 2, UTB Stuttgart', 6, '["Pr\\u00fcfungsleistung"]', 'Einführung in das Software Engineering', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'bestandene schriftliche oder mündliche Prüfung', NULL),
(7, 41, '2015-01-16', 2, 'Freigegeben', 'GRAF2', 'Computergrafik 2', 'Computergraphics 2', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 0, 0, 180, 10, '- Vertiefe Verständnis der Mechanismen generativer Computergrafik\r\n- Beherrschen fortgeschrittener Methoden der grafischen Programmierung (z.B. Shader-Programmierung, fortgeschrittene Animationverfahren\r\n- Beherrschen eines Computergrafik-Frameworks oder einer Rendering/Game-Engine\r\n- Fähigkeit, komplexe Modelle, Animationen und Effekte mit Mitteln der betrachteten Software-Tools zu implementieren\r\n- Fähigkeit, eine komplexe, interaktive grafische Applikation zu erstellem', '- Jeweils zu Beginn der Veranstaltung vereinbart: z. B. vertiefte Low-Level Programmierung (Shader-Programmierung)\r\n- Programmierung von Rendering- bzw. Game-Engines\r\n- Programmierung mit Hilfe von High-Level-API''s, Einbinden aktueller 3D-Eingabegeräte, etc.', '["Hausarbeit"]', 'Deutsch', 'Wird je nach Themenausprägung zu Beginn der Veranstaltung bekannt gegeben', 6, '["Pr\\u00fcfungsleistung"]', 'Computergrafik 1', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Abschlussarbeit', NULL),
(8, 42, '2015-01-15', 1, 'Freigegeben', 'BI', 'Business Intelligence', 'Business Intelligence', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 30, 'Die Studierenden erlernen, wie mithilfe von analytischen Applikationen (Business Intelligence) die Ziele und Strategien eines Unternehmens gesteuert und gemessen werden können.\r\nSie wissen, wie der Key Performance Indikatoren einer IT Organisation definiert und mithilfe von Systemen gemanagt werden können.\r\nAbstraktion, Modellierung, Teamfähigkeit, Entscheidungskompetenz und Präsentation werden anhand der Diskussion realer Umsetzung-Szenarien gefördert', '- Business Intelligence und Data Warehouse Systeme\r\n- Analytische Applikationen \r\n- IT Controlling\r\n- Corporate Performance Management', '["Schriftliche Klausur"]', 'Deutsch', '- Skript zur Vorlesung\r\n- Gluchowski, P.; Gabriel, R.; Dittmar, C.: Management Support Systeme und Business Intelligence\r\n- Computergestützte Informationssysteme für Fach- und Führungskräfte, Springer\r\nKemper, H.G.: Business Intelligence - Grundlagen und praktische Anwendungen, Vieweg+Teubner', 6, '["Pr\\u00fcfungsleistung"]', 'Datenbanksysteme', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(11, 43, '2015-01-17', 2, 'Freigegeben', 'SQUAL', 'Software Qualität Management', 'Software Quality Management', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '- Die Studierenden erhalten Kenntnisse über die in der SW-Industrie üblichen Verfahren zum Qualitätsmanagement bei der Software-Entwicklung \r\n- Sie lernen Methoden und Techniken der Software Qualitätssicherung auf konkrete praxisrelevante Einzelfälle oder Situationen anzuwenden\r\n- Die Studenten werden befähigt Methoden und Verfahrensweisen zur Qualitätssicherung bei der Software-Entwicklung bezüglich ihrer Zweckmäßigkeit zu beurteilen, auszuwählen und anzuwenden', '- Software Qualitätsmanagement \r\n- Überblick\r\n- Verankerung von Qualität in Design und Codierung\r\n- Test-Planung, Test-stufen und Testmethoden\r\n- Versios-, Konfiguration- und Änderungsmanagement\r\n- Qualitätsmanagement in frühen Phasen\r\n- Objektorientiertes Testen und Testautomatisierung\r\n- Qualität-Modelle (ISO 15504, CMMI, ...)\r\n- Qualitätsmanagement by Objectices (IT-Prozesse)\r\n- Qualität durch Organisation und Kommunikation\r\n- IT-Risikomanagement\r\n- Methoden und Werkzeuge zur Messung und Bewertung von Software\r\n- Methoden zur Aufwandsschätzung von IT-Projekten\r\n- Kennzahlen-Systeme\r\n- Qualitätsmanagement in komplexen Architekturen an konkreten Fallbeispielen.', '["Schriftliche Klausur"]', 'Deutsch', '-Skript zur Vorlesung\r\n\r\nBücher mit Titel: \r\n-Hoffmann D. W.: Software Qualität, Springer, ISBN 978-3-540-76322-2, 2008\r\n-Schneider K.: Abenteuer Software Qualität, dpunkt.verlag, ISBN 978-3-89864-472-3, 2007\r\n-Sneed H. M. u.a.: Software in Zahlen, Hanser, 978-3-446-42175-2, 2010\r\n-Deacon, J.: Object-Oriented Analysis and Design, Addison-Wesley, ISBN 0-321-26317-0, 2005\r\n-Perry, W. E.: Software Testen, mitp-Verlag, ISBN 3-8266-0887-9, 2003\r\n-Kan, S. H. Metrics and Models in Software Quality Engineering,Addison-Wesley, ISBN 0-201-72915-6, 2002\r\n-Vigenschow, U.: Objektorientiertes Testen und Testautomatisierung in der Praxis, dpunkt.verlag, ISBN 389864-305-0, 2005.', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Software Engineering', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'aktive Teilnahme an den Übungen'),
(7, 44, '2015-01-17', 2, 'Freigegeben', 'WEBU', 'Web Usability', 'Web Usability', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '- Die Studierenden kennen die grundlegenden Aspekte des Themengebiets "Web Usability"\r\n- Die Studierenden können existierende WebSeiten im Hinblick auf deren Nutzbarkeit und Benutzerfreundlichkeit untersuchen und bewerten\r\n- Sie sind in der Lage, existierende Web-Seiten zu verbessern und neue Web-Seiten unter Aspekten guter Nutzbarkeit zu planen', '- Usability: Begriffe\r\n- Der Benutzer\r\n- Benutzerverhalten im Web\r\n- Benutzeranforderungen\r\n- Web-Site Usability\r\n- Interaktionsmechanismen und -muster\r\n- Webseiten-Navigation, Formulare, Suche\r\n- Personalisieren\r\n- Texte für das Web\r\n- E-Commerce Usability\r\n- Usability & Web 2.0\r\n- Usability Testing\r\n- Accessibility: Barrierefreie bzw. -arme Web-Seiten\r\n- Hintergründe und Fakten\r\n- Gesetzliche Vorgaben\r\n- Konzepte und Maßnahmen\r\n- Strukturierung von Web-Auftritten: Information-Architektur\r\n- Web-Projektierung; Fahrplan zum Erstellen von Web-Auftritten', '["M\\u00fcndliche Pr\\u00fcfung","Hausarbeit"]', 'Deutsch', '-Steve Krug: Don''t make me think: A common sense approach to Web Usability, New Riders, 2nd ed. (18. August 2005)\r\n-Frank Puscher: Leitfaden Web-Usability: Strategien, Werkzeuge und Tipps für mehr Benutzerfreundlichkeit, dpunkt Verlag\r\n-Morville, Rosenfeld: Information Architecture for the World Wide Web: Designing Large-Scale Web Sites, O''Reilly Media; 3 edition (November 27, 2006)\r\n-Sydik: Design Accessible Web Sites: 36 Keys to Creating Content for All Audiences and Platforms, Pragmatic Bookshelf; 1st edition (November 5, 2007)', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Die Bewertung erfolgt auf Basis der erarbeiteten Vorträge, der Resultate der Übungen, sowie - je nach Verlauf des Kurses - entweder einer mündlichen Abschlussprüfung oder den Resultaten der Bearbeitung einer abschließenden praktischen Aufgabe', NULL),
(2, 45, '2015-01-16', 2, 'Freigegeben', 'SEMA', 'Service Management', 'Service Management', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, '- Kenntnisse der Architektur und Aufgabenbereiche zur IT-Dienstleistungserbringung (ITIL)\r\n- Verstehen der Aufgabenbereiche des IT-Service Management\r\n- Analysieren von Anwendungsumgebungen auf Service-Einsatz\r\n- Exemplarisches Anwenden einzelner Service- und Managementaufgaben auf Fallbeispiele', '- Service-Management-Konzepte\r\n- ITIL-Lebenszyklus, Module und Prozesse\r\n- Alternative Ansätze zum Servicemanagement', '["Schriftliche Klausur","Vortrag"]', 'Deutsch', '- Böttcher: IT-Servicemanagement mit ITIL V3\r\n- Tiemeyer: Handbuch IT-Management\r\n- OGC: ITIL Handbücher', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Informatikgrundlagen, Kommunikationssysteme', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(8, 46, '2015-01-16', 2, 'Freigegeben', 'IMAN', 'Information Management', 'Information Management', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 30, 90, 25, '- Die Studierenden sollen Ziele und Aufgaben des strategischen, taktischen und operativen Informationsmanagements kennen.\r\n- Sie erkennen die Bedeutung der Informationsverarbeitung in heutigen Unternehmen vor dem Hintergrund der kontinuierlichen Entwicklung und Verflechtung betrieblicher Informationssysteme.\r\n- Die Studierenden sollen Informationssystemarchitekturen und Frameworks zur Definition von IT Strategien verstehen sowie die Grundlagen des IT-Controllings, Knowledge und Qualitätsmanagements kennen.\r\n- Sie bauen ein Verständnis für das praktische Umsetzen strategischer Informationsverarbeitungsziele auf.\r\n- Sie können die Notwendigkeit, Probleme und Lösungsansätze für die Wirtschaftlichkeitsanalyse erläutern. \r\n- Sie können die Überlegungen zur Make-or-by-Entscheidung nachvollziehen und entsprechend auf praktische Situationen anwenden. \r\n- Sie können den Ablauf und die Maßnahmen des Einführungsprozesses von Informationssystemen beschreiben.', '- Ziele und Aufgaben des Informationsmanagements \r\n- Strategisches Informationsmanagement \r\n- Informationssystemarchitekturen und Integration\r\n- Frameworks zur Definition von IT Strategien \r\n- IT Controlling \r\n- Knowledge Management \r\n- Planung und Aufbau geeigneter IT Infrastrukturen \r\n- Sicherheitsmanagement', '["Schriftliche Klausur"]', 'Deutsch', '- Skript zur Vorlesung\r\n- Krcmar, H.: Information Management; Springer\r\n- Tietmeyer, E.: Handbuch IT-Management, Konzepte, Methoden, Lösungen und Arbeitshilfen für die Praxis, Hanser\r\n- Österle, H.; Winter, R.; Baumöl U.: Business Engineering: Auf dem Weg zum Unternehmen des \r\nInformationszeitalters; Springer\r\n- Zarnekow, R.; Brenner, W.; Pilgram, U.: Integriertes Informationsmanagement: Strategien und \r\nLösungen für das Management von IT-Dienstleistungen (Business Engineering); Springer', 6, '["Pr\\u00fcfungsleistung"]', 'Schulmathematik', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(15, 47, '2015-01-17', 2, 'Freigegeben', 'RTOS', 'Echtzeit-Betriebssysteme', 'Real Time Operation Systems', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 10, '- Die Studierenden kennen den grundlegenden Aufbau von Echtzeit-Betriebssystemen (RTOS – Realtime-Operating Systems). Sie können verschiedene Arten von  Echtzeit-Betriebssystemen sowie deren Entwicklungsumgebungen unterscheiden.\r\n- Die Studierenden verstehen und kennen die besonderen Anforderungen der Echtzeitfägigkeit bezüglich der Grundkonzepte und Aufgaben (Prozesse, Dateien, Speicherverwaltung) von Betriebssystemen und können diese handhaben.\r\n- Die Studierenden beherrschen den grundlegenden Umgang mit Entwicklungsumgebungen für Echtzeitanwendungen besonders im Bereich Embedded Computing.', 'Echtzeit-Betriebssysteme:\r\n- Architektur, Aufgaben, Konzepte und Grundlagen von Echtzeit-Betriebssystemen\r\n- Scheduler\r\n- Echtzeit-Betriebssystemarten \r\n- Prozess- und Betriebsmittelsteuerung, Synchronisationskonzepte, Interprozesskommunikation\r\n- Speicherverwaltung\r\n- Edit-Compile-Debug-Zyklus\r\n- Leistungs-Messung\r\n- Vermessung und Beurteilung von Echtzeit-Verhalten\r\n- Embedded Computing\r\n- Board-Support-Package\r\n- Middleware\r\n- Dateisysteme und Ein-/Ausgabe', '["Hausarbeit"]', 'Deutsch', '- Skript zur Vorlesung\r\n- Erich Ehses et al, Betriebssysteme, Pearson Studium 2005, ISBN 3-8274-7156-2\r\n- Peter Mandl, Grundkurs Betriebssysteme, Vieweg 2008, ISBN 978-3-8348-0392-4\r\n- Andrew S. Tanenbaum: Modern Operating Systems, Pearson Education 2009, ISBN 978-0-13-813459-4', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Schulmathematik, BESY/AUMA, Programmieren in C/C++', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', '(in Deutsch oder Englisch)', 'Erfolgreiche Bearbeitung einer benoteten Hausarbeit', 'praktische Aufgaben zu RTOS-MBED, Pike-OS; aktive Teilnahme an Übungen'),
(8, 48, '2015-01-16', 2, 'Freigegeben', 'PROJ', 'Studienprojekt und Projektmanagement', 'Student Project and Project Management', 'jedes Semester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 300, 35, '- Die Studierenden kennen die wesentlichen Aspekte und grundlegenden Methoden professionellen Projektmanagements im Hinblick auf Projektvorbereitung, Projektplanung, Projektdurchführung und Abschluss. \r\n- Die Studierenden vertiefen ihre Kenntnisse und entwickeln Erfahrungen zur Aufwands und Kostenschätzung sowie zur praxisgerechten, effektiven und effizienten Durchführung von Softwareprojekten.\r\n- Die Studierenden können eine umfangreiche Aufgabe im Team bearbeiten und sind in der Lage, die Arbeiten in der Form eines Projektes selbstständig zu organisieren. \r\n- Die Studierenden beherrschen eine grundlegende Palette von Werkzeugen zum Projekt- und Qualitätsmanagement.\r\n- Sie können ihre Kenntnisse der Projektarbeit und des Projektmanagements und ihre fachspezifischen Kenntnisse in einem Anwendungsprojekt praktisch umsetzen.', 'Im Modul Studienprojekt führen die Studierenden in Gruppenarbeit ein praxisnahes Informatikprojekt, nach Möglichkeit zusammen mit einem externen Partner aus Wirtschaft oder Forschung entsprechend eines vorgegebenen Anforderungskataloges durch. Dabei üben sie die professionelle Zusammenarbeit in Entwicklungsteams (ca. 4-6 Personen). Sie nutzen dabei die zuvor im Verlauf ihres Studiums erworbenen Fachkenntnisse und erfahren die Bedeutung von Projektmanagement Methoden und Softskills.\r\nDie Studierenden-Gruppen werden bei der Projektdurchführung von je zwei Professoren unterstützt.\r\n\r\nDie erforderlichen theoretischen Grundlagen des Projektmanagements werden in einer teilweise in Blockunterricht durchgeführten Vorlesung vermittelt:\r\n- Begriffliche Grundlagen des Projektmanagements\r\n- Projektphasen\r\n- Zeit- und Aufwandsplanung\r\n- Ressourcenplanung\r\n- Risikoplanung\r\n- Konfliktmanagement, Änderungsmanagement\r\n- Konfigurations- und Fehlermanagement \r\n- Projektkontrolle\r\n- Projektorganisation (innere und äußere)\r\n- Führung von Projekten', '[]', 'Deutsch', '- Skript zur Vorlesung\r\n- Hölzle: Projektmanagement - Kompetent führen, Erfolge präsentieren, Haufe, 2. Auflage, 2007.\r\n- Hindel et al.: Basiswissen Software-Projektmanagement, dpunkt.verlag, 3. Auflage, 2009.\r\n- Tumuscheit: Überleben im Projekt: 10 Projektfallen und wie man sie umgeht, Redline Wirtschaft, \r\n2007', 12, '["Pr\\u00fcfungsleistung"]', 'fortgeschrittene Programmierkenntnisse, Datenbanken, Grundlagen des Software-Engeineering', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Note und Leistungspunkte werden auf der Grundlage des Projektergebnisses, der schriftlichen Ausarbeitung und des Seminarvortrages vergeben', 'Erfolgreiche Projektdurchführung', NULL),
(11, 49, '2015-01-16', 2, 'Freigegeben', 'MESY', 'Modellbasierte Entwicklung', 'Model Based Software Engineering', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Absolventinnen und Absolventen des Moduls besitzen umfassende Kompetenz, Modellierung im Prozess der Softwareentwicklung sinnvoll einzusetzen.\r\nDie Studierenden können Modelle zur Beschleunigung, Effizienzverbesserung und Qualitätsverbes-serung der Softwareentwicklung einsetzen.\r\nSie sind in der Lage Modellierungstechniken und Modellierungsumgebungen zu bewerten und den Anforderungen entsprechend auszuwählen.', '- Formale Erfassung von Anforderungen\r\n- Analyse und Bewertung von Modellen und Metamodellen\r\n- Domain spezifische Sprachen\r\n- Code Generatoren\r\n- Model zu Model Transformationen\r\n- Umsetzung von Software Entwicklungsprojekten mit Modellierungsumgebungen.', '["Hausarbeit"]', 'Deutsch', 'Skript zur Vorlesung\r\nBücher mit Titel:\r\n- Stahl T., Völter M.: Modellgetriebene Softwareentwicklung, dpunkt.verlag, ISBN 3-89864-310-7, 2005\r\n- Klar M.,Klar S.: Einfach Generieren, Hanser, ISBN 978-3-446-40448-9, 2006\r\n- Kastens U., Büning H. K.: Modellierung, Hanser, ISBN 978-3-446-41537-9, 2008\r\n- Gruhn V., Pieper D., Röttgers C.: MDA, Springer, ISBN 3-540-28744-2, 2006\r\n- Mellor S. J. u.a.: MDA Distilled, Addison Wesley, ISBN 978-0-201-78891-4, 2004\r\n- Warmer J., Kleppe A.: Object Constraint Language 2.0, mitp, ISBN 3-8266-1445-3, 2004\r\n- Zeppenfeld K.,Wolters R.: Generative Software-Entwicklung mit der MDA, Spektrum Akademischer Verlag, ISBN 978-3-8274-1555-4, 2006.', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Erfolgreicher Abschluss und Dokumentation des begleitenden Praxisprojekts', NULL),
(2, 51, '2015-01-15', 1, 'Freigegeben', 'MOKO', 'Mobile Kommunikationsnetze', 'Mobile Communication Networks', 'Sommersemester', '1 Semester', '["Vorlesung","Labor"]', 60, 0, 120, 25, '-Anforderungen und aktuelle Ausprägungen von Mobilnetzen (Mobilfunk, WLAN) kennen und beurteilen\r\n-Architekturen und Schichtenmodelle von Mobilnetzen verstehen\r\n- Internet-Konnektivität über mobile Netze verstehen und anwenden \r\n-Spezielle Techniken für Mobile Anbindung wie Mobile IP und sichere Kommunikation verstehen  und anwenden\r\n-Leistungsverhalten von Mobilen Anwendungen und Netzen analysieren und bewerten', '-Entwicklung der Mobilen Datenkommunikation \r\n-Kommunikationsstrukturen (Infrastruktur, Adhoc) \r\n-GPRS, UMTS, LTE \r\n-WLAN-Vertiefung, Bluetooth u.a. \r\n-Sicherheit in mobilen Netzen \r\n-IP in mobilen Netzen, IPv6, PPP \r\n-Mobile-IP-Konzept \r\n-IP-Tunnel und VPN \r\n-Leistung in mobilen Netzen', '["Schriftliche Klausur"]', 'Deutsch', '-Foliendateien zur Vorlesung, Übungsblätter, Laboraufgabenblätter \r\n-Peterson, Davie: Computernetze \r\n-Sauter: Grundkurs Mobile Kommunikationssysteme \r\n-RFCs', 6, '["Pr\\u00fcfungsleistung"]', 'Lehrveranstaltung Kommunikationssysteme und -netze', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(2, 52, '2015-01-15', 1, 'Freigegeben', 'EMOC', 'Einführung in das Mobile Computing', 'Introduction to Mobile Computing', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '-Die Studierenden erwerben Grundlagen, Techniken und Konzepte zum Gebiet des Mobile Compuing\r\n-Die Studierenden kennen verschiedene Techniken und Protokolle aus dem mobilen Umfeld und \r\nkennen deren Vor- und Nachteile\r\n-Sie sind in der Lage für verschiedene mobile Einsatzszenarien die geeigneten Technologien vorzuschlagen\r\n-Die Studierenden können Werkzeuge und Techniken zur Entwicklung mobiler Anwendungen auswählen', '- Begriffe und Arten von Mobilität \r\n- Grundlagen, Techniken und Protokolle für mobile Vernetzungen \r\n- Mobile Endgeräte und Rechnerarchitektur mobiler Geräte \r\n- Leistung mobiler Hardware \r\n- Konzepte und Grundlagen der Programmierung mobiler Endgeräte \r\n- Entwicklungsschritte mobiler Applikationen \r\n- Mobile Anwendungen als Verteilte Systeme (Client- Server Sicht) \r\n- Verfahren zur Positionsbestimmung (GPS) \r\n- Entwicklung von Anwendungen mit Ortsbezogenheit \r\n- Mobiles Internet und seine Anwendungen \r\n- Sicherheit in mobilen Netzen', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung\r\n\r\nBücher mit Titel: \r\n- Fuchß T.: Mobile Computing - Grundlagen und Konzepte für mobile Anwendungen, Hanser, ISBN 978-3-446-22976-1, 2009\r\n- Zeppenfeld K.; Bollmann T.: Mobile Computing, W3L GmbH, ISBN 978-3868340051, 2010 \r\n- Schiller J.: Mobilkommunikation, Pearson, ISBN 3-8273-7060-4, 2003 \r\n- Roth J.: Mobile Computing Grundlagen, Technik, Konzepte, dpunkt.verlag, ISBN 3-89864-366-2, \r\n2005 \r\n- Mahgoub I.; Ilyas M.: Mobile Computing Handbook, CRC Press Inc, ISBN 0-84931-971-4, 2004 \r\n- Alby T. Das mobile Web, Hanser, ISBN 978-3446415072, 2008 \r\n- Lehner F.: Mobile und drahtlose Informationssysteme, Springer, ISBN 3-540-43981-1, 2002', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an Laborübungen'),
(8, 53, '2015-01-15', 1, 'Freigegeben', 'BWLWP', 'BWL Vertiefung', 'Business Administration 2', 'jedes Semester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '- Die Studierenden vertiefen die BWL Grundkenntnisse aus den Pflichtmodulen Betriebswirtschaft in ausgewählten betriebswirtschaftlichen Bereichen.\r\n- Ziel ist, für Informatiker praxisrelevante betriebswirtschaftliche Inhalte zu vertiefen. Zur Abdeckung des Moduls "BWL Vertiefung" wird ein speziell für Informatiker geplantes Modul angeboten, aber es können nach Rücksprache mit dem Prüfungsausschuss auch aus anderen Studiengängen Module mit wirtschaftlichem Bezug gewählt werden (z.B. Logistik, VWL, Marketing, Investitions-, Finanzierungs- und Kostenplanung, Controlling etc.). \r\n- Hierbei ist jedoch zu beachten, dass 6 ECTS erreicht werden müssen (z.B. durch die Auswahl von zwei 3 ECTS-Modulen).', 'Die konkreten Lehrinhalte hängen von dem gewählten Modul ab; auch bei dem speziell für Informatiker  angebotenem BWL Wahlpflichtfach sind die inhaltlichen Schwerpunkte variabel und sollen in für Informatiker relevanten Themen der BWL vertiefende Inhalte erschließen.', '["Schriftliche Klausur"]', 'Deutsch', 'Vorlesungsunterlagen und Literaturangaben darin', 6, '["Pr\\u00fcfungsleistung"]', 'Modul „Betriebswirtschaft“ als Voraussetzung empfohlen, aber nicht zwingend', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulklausur oder Vortrag mit Ausarbeitung', NULL),
(24, 54, '2015-01-17', 2, 'Freigegeben', 'MAT2', 'Mathematik für Bioinformatiker', 'Mathematics for Bioinformaticians', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 30, 15, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die grundlegenden diskreten Strukturen (Gruppen, Ringe, Körper) zu benennen und mit ihen zu rechnen\r\n- grundlegende Verfahren zur numerischen Differentiation und Integration zu beschreiben und diese auf Probleme der Biologie anzuwenden\r\n- gewöhnliche Differentialgleichungen zu klassifizieren und Anfangswertprobleme linearer Differentialgleichungen und Differentialgleichungen 1. Ordnung zu lösen\r\n- mehrdimensionales Differenzieren und Integrieren auf elementare Funktionen anzuwenden\r\n- die Grundlagen der theoretischen Informatik wiederzugeben und fortgeschrittene mathematische Fragestellungen mit Hilfe eines Computeralgebrasystems zu lösen', '- Elementare Gruppen-, Ring- u. Körpertheorie\r\n- Numerische Anwendungen in der Biologie: numerische Differentiation und Integration, finite Differenzen\r\n- Partielle Ableitungen, mehrfache Integrale\r\n- Differentialgleichungen, insbesondere von Wachstumsprozessen\r\n- Graphen- und Komplexitätstheorie\r\n- Grundlagen der Perkolationstheorie', '["Schriftliche Klausur"]', 'Deutsch', 'Furlan, Peter; Das Gelbe Rechenbuch, Bd. 1 - Bd. 3, Verlag A. Furlan, aktuelle Ausgabe\r\nPapula, L.; Mathematik für Ingenieure und Naturwissenschaft-ler, Bd. 1 - Bd. 3, Vieweg-Verlag\r\nWiesbaden, aktuelle Auflage', 3, '["Pr\\u00fcfungsleistung"]', 'Modul Mathematik', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(33, 55, '2015-01-19', 3, 'Freigegeben', 'BIOW', 'Biowissenschaften', 'Life Sciences', 'Wintersemester', '1 Semester', '["Vorlesung","Praxisprojekt"]', 75, 30, 75, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- den Aufbau und die Funktion der Organismen (Pflanzen, Tiere und Mikroorganismen) aufzuzählen\r\n- die Organismen histologisch, morphologisch und funktionell darzustellen\r\n- die Ansprüche der Mikroorganismen an Nährstoffe und Umweltbedingungen zuzuordnen\r\n- das Konzept der Hygiene mit den Teilbereichen Sterilisation, Desinfektion und Konservierung zu beschreiben\r\n- die Basistechniken mikrobiologischen Arbeitens und des sicheren Umgangs mit Mikroorganismen anzuwenden', 'Vorlesung, 1 SWS Botanik Prof. Zimmermann: Vom Urknall zum Organismus, Einteilung der\r\nBotanik, Aufbau einer Pflanzenzelle, Phylogenie der Pflanzen, Organe der Kormophyten, Wurzel,\r\nSprossachse, Laubblatt, Blüte, Fruchtbildung und Früchte\r\n\r\nVorlesung, 1 SWS Zoologie Prof. Deventer: Tierische Zellen, Gewebetypen, Vermehrungsstrategien, Krankheitserreger für den Menschen, Generations- und Wirtswechsel, Evolution und Entwicklung\r\nSystematik des Zoologischen Systems, die morphologische Entwicklung vom Ein- zum Vielzeller\r\n\r\nVorlesung, 1 SWS Mikrobiologie Prof. Krefft: Einführung in die Zelle, chemische Bestandteile der\r\nZelle, Moleküle und Makromoleküle der Zelle, Unterschiede Prokaryonten - Eukaryonten, Aufbau der Bakterienzellen (Prokaryonten) \r\n\r\nVorlesung, 2 SWS Mikrobiologie Prof. Steinmüller: 1. Wachstum von Mikroorganismen - Nährstoffe, Wachstumsbedingungen, Kulturmethoden, Physiologie des Wachstums, Messung des Wachstums, Hemmung des Wachstums. 2. Hygiene - Sterilisation, Desinfektion, Konservierung,  Steriles Arbeiten\r\n\r\nPraktikum, 2 SWS Frau Dipl.-Ing. Vosseberg-Hammel: Herstellen von Nährmedien, sterile\r\nArbeitstechniken, Nachweis von Mikroorganismen in der Luft und auf Oberflächen, Kolonie- und\r\nZellmorphologie von Mikroorganismen, verschiedene Färbemethoden, verschiedene Verfahren zur Bestimmung von Zellzahl und Zellmasse', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung Botanik und Zoologie\r\nLüttge, U.; M. Kluge; G. Thiel (2010): Botanik.- Wiley-VCH-Verlag, ISBN 978-3-527-32030-1\r\nNultsch, W. (2001): Allgemeine Botanik.- 7. Aufl., Thieme Verlag, ISBN 3-13-383311-1\r\nBurda, H.; G. Hilken; J. Zrzavy (2008): Systematische Zoologie.- UTB basics Ulmer Verlag\r\nStorch, V.; U. Welsch (2005): Kurzes Lehrbuch der Zoologie.-Spektrum\r\nWehner, R.; W. Gehring (2007): Zoologie.- Georg Thieme Verlag\r\nFolien zur Vorlesung Mikrobiologie, Krefft\r\nM.T.Madigan & J.M.Martinko: Brock Mikrobiologie, Pearson Studium, ISBN: 978-3-8273-7358-8\r\nH.Cypionka, Grundlagen der Mikrobiologie, Springer Verlag, ISBN: 978-3-642-05095-4\r\nB.Alberts, D.Bray, K.Hopkin, A.Johnson, J.Lewis, M.Raff, K.Roberts, P.Walter: Lehrbuch der\r\nmolekularen Zellbiologie, Wiley-VCH Verlag GmbH & Co.KGaA, ISBN:978-3-527-31160-6\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nWallhäußer, K.H.: Praxis der Sterilisation - Desinfektion - Konservierung; Georg Thieme Verlag\r\nStuttgart', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'Praktikum erfolgreich abgeschlossen'),
(22, 56, '2015-01-17', 2, 'Freigegeben', 'GENE', 'Genetik', 'Genetics', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- den molekularen Aufbau und die Funktion des Erbmaterials zu beschreiben\r\n- die Genwirkungen und das Zusammenspiel von Genotyp und Umwelt zu erklären\r\n- die genetischen Vererbungsmechanismen zu charakterisieren', 'Lokalisation der Erbsubstanz, Genexpression, Gen- und Genomstrukturen, extrachromosomales\r\nErbmaterial, genetische Regulation, Veränderung des Erbmaterials, Genwirkung, Genotyp und\r\nUmwelt, Prinzipien der Vererbung, Einführung in die Populationsgenetik, Einführung in die\r\nQuantitative Genetik', '["Schriftliche Klausur"]', 'Deutsch', 'Brown: Genome und Gene. Lehrbuch der molekularen Genetik. 3. Aufl., Spektrum Akad. Verlag,\r\n2007\r\nKlug u.a.: Genetik. Studium Biologie. 8. Aufl., Pearson Verlag, 2007\r\nGraw: Genetik. 5. Aufl., Springer Verlag, 2010\r\nFolienvorlagen zur Vorlesung', 3, '["Pr\\u00fcfungsleistung"]', 'Schulbiologie', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(1, 57, '2015-01-17', 3, 'Freigegeben', 'ALCE', 'Allgemeine Chemie', 'Chemistry', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 30, 90, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- Grundbegriffe, Definitionen sowie die Formelsprache der Chemie zu beherrschen\r\n- chemische Reaktionsgleichungen zu lösen\r\n- grundlegende Prinzipien der chemischen Bindung zu kennen\r\n- Gleichgewichtsreaktionen zu beschreiben und zu berechnen\r\n- Abläufe von Säure/Base-Reaktionen zu beherrschen\r\n- Grundbegriffe der Elektrochemie zu kennen und Redoxgleichungen zu erstellen\r\n- Gesetze der Reaktionskinetik und Katalyse anzuwenden\r\n- Grundwissen über chemische und physikalische Prozesse der Trinkwassergewinnung zu\r\nkennen\r\n- optische Drehwinkel zur Bestimmung der Konzentration von Kohlehydratlösungen zu\r\nermitteln (Praktikum)\r\n- Leitfähigkeiten von Salzlösungen in Abhängigkeit von Temperatur und Konzentration zu\r\nerhalten (Praktikum)', '- Stöchiometrie von Formeln und Reaktionsgleichungen\r\n- Atomaufbau und Einflussgrößen der chemischen Bindungen\r\n- Massenwirkungsgesetz sowie die physikalisch/chemischen Einflussgrößen\r\n- Säuren/Laugen\r\n- Elektrochemische Grundlagen und technische Anwendungen\r\n- Reaktionskinetik und Katalyse\r\n- Trinkwassergewinnung\r\n- Praktikum: Polarimeterie und Leitfähigkeitsmessung', '["Schriftliche Klausur"]', 'Deutsch', 'T. L. Brown, H. Eugene LeMay, Bruce E. Bursten Chemie "Pearson Studium" , jeweils neuste\r\nAuflage', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Schulmathematik, Vorkurs Chemie', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreich absolviertes Praktikum'),
(20, 58, '2015-01-17', 2, 'Freigegeben', 'STAT', 'Statistik', 'Statistics', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- selbständig einfache statistische Verfahren unter Benutzung eines Statistikprogramms auf Stichprobendaten anzuwenden\r\n- grundlegende statistische Fachbegriffe zu erklären und bei komplexeren Datenanalysen mit einem statistischen Berater zu kommunizieren. Sie verfügen über „Beratbarkeit“.\r\n- zu entscheiden, ob sie ein statistisches Problem mit den erlernten Methoden selber adäquat lösen können oder ob eine fachliche Beratung erforderlich ist', 'Wahrscheinlichkeitsrechnung:\r\n- Vorgänge mit zufälligen Ergebnissen\r\n- Grundgesetze der Wahrscheinlichkeit, Gesetz der großen Zahlen, Kombinatorik\r\n- Zufallsvariable, diskrete Verteilungen (binomial, Poisson, hypergeometrisch)\r\n- stetige Verteilungen (Gleich-, Exponential-, Normal-, Chi-Quadrat-, t- und F-Verteilung)\r\n- Parameter von Verteilungen (Erwartungswert, Varianz, Standardabweichung, Variationskoeffizient, Momente, Median, Quantile)\r\n- Standardisierung und Transformation, zentraler Grenzwertsatz\r\n- bivariate Verteilungen, Korrelation und Kovarianz\r\n\r\nDeskriptive Statistik:\r\n- empirische Verteilungsfunktionen, Histogramme, Stichprobenparameter \r\n\r\nSchließende Statistik (Schätzen und Teilen):\r\n- t-Tests, Konfidenzbereiche, einfaktorielle Varianzanalyse, multiple Mittelwertvergleiche\r\n- lineare und nicht-lineare Regression, Methoden der kleinsten Quadrate, Likelihoodschätzmethode\r\n- Kontingenztafeln, Chi-Quadrat-Test, exakter Fisher-Test für 2x2-Tafeln\r\n- nichparametrische Verfahren', '["Schriftliche Klausur"]', 'Deutsch', 'Vorlesungsskript\r\n\r\nJ.Hartung: Statistik, ISBN 3-486-24984-3\r\nL.Sachs: Angewandte Statistik, ISBN 3-540-12800-X\r\nBeispieldateien für das Praktikum', 6, '["Pr\\u00fcfungsleistung"]', 'keine', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(1, 59, '2015-01-17', 2, 'Freigegeben', 'BIDA', 'Bioinformatische Datenanalyse', 'Bioinformatics Data Analysis', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- problemangepasste Algorithmen und Datenstrukturen auszuwählen und in einer Skriptsprache (insb. Perl) zu implementieren\r\n- einfache Programmierhilfen einzusetzen\r\n- Module aus Bibliotheken (z.B. BioPerl) einzusetzen und einfache Anwendungen mit ihnen zu entwickeln\r\n- unter einem Unix-Betriebssystem zu arbeiten\r\n- biologischer Datenbanken und ihrer Formate einzuordnen und im Internet zu nutzen\r\n- Anwendungen zu entwickeln, die biologische Daten verarbeiten', 'Der Kurs umfasst folgende Themen\r\n- Perl: Dokumentation, Sprache, Anwendung anhand typischer Bioinformatikprobleme\r\n- BioPerl und CPAN\r\n- Einfache Entwicklungsumgebungen (Debugger, intelligente Editoren usw.)\r\n- Grundlagen des Umgangs mit einem Unix-Betriebssystem (Suse Linux, Ubuntu usw.)\r\n- Schwerpunkt: Implementierung von Algorithmen und Datenstrukturen anhand von Beispielen mit Bioinformatikrelevanz, z.B. Bäume und Phylogenien\r\n- Biologische Sequenzen (DNA, RNA, Proteine)\r\n- Einführung in einfache Fragestellungen der Biologie und Medizin\r\n- Informationssysteme und Datenbanken von NCBI, EBI\r\n- Spezielle Datenbanken (PDB, SCOP, SwissProt, KEGG usw.)\r\n- Textmining und Datamining biologischer Datenbanken für die funktionelle Annotation', '["Schriftliche Klausur","Hausarbeit"]', 'Deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nJ. Ziegler, Programmieren lernen mit Perl, Springer Verlag\r\nL. Wall, T. Christiansen, J. Orwant, R. Schwartz, Programming Perl, Programmieren mit Perl,\r\nO''Reilly\r\nJ.D. Tisdall, Einführung in Perl für Bioinformatik, O''Reilly\r\nJ.D. Tisdall, Beginning Perl for Bioinformatics, O''Reilly\r\nJ.D. Tisdall, Mastering Perl for Bioinformatics, O''Reilly\r\nC. Gibas, P. Jambeck, Developing Bioinformatics Computer Skills, O''Reilly\r\nR.A. Dwyer, Genomic Perl: From Bioinformatics Basics to Working Code, Cambridge University\r\nPress\r\nM.D. LeBlanc, B.D. Dyer, Perl for Exploring DNA, Oxford University Press\r\nD.W. Mount, Bioinformatics: sequence and genome analysis, CSHL Press', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Durchführung des Programmierprojektes');
INSERT INTO `Veranstaltung` (`modulbeauftragter`, `Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `KontaktzeitVL`, `KontaktzeitSonstige`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `VoraussetzungLP`, `VoraussetzungInhalte`, `SpracheSonstiges`, `Autor`, `PruefungsformSonstiges`, `PruefungsleistungSonstiges`, `StudienleistungSonstiges`) VALUES
(1, 60, '2015-01-17', 2, 'Freigegeben', 'ALBI', 'Algorithmische Bioinformatik', 'Bioinformatics Algorithms', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- geeignete Algorithmen zur Lösung bioinformatischer Fragestellungen zu bewerten und zu implementieren\r\n- Bioinformatische Softwarepakete zu testen, zu vergleichen und zu beurteilen\r\n- Methoden zur Verarbeitung biologischer Daten problemorientiert auszuwählen', 'Der Kurs umfasst folgende Themen\r\n- Quantifizierung von Sequenzähnlichkeit, Scorematrizen, Alignmentstatistik\r\n- Alignments (global, lokal) und Alignment-Methoden (Dynamische Programmierung, Needleman-\r\nWunsch, Smith-Waterman)\r\n- Sequenzierung und Assemblierung\r\n- Phylogenie, vergleichende Genomik\r\n- Profile und positionsabhängige Scorematrizen\r\n- Suche von Sequenzmustern (Blast, Psi-Blast, Phi-Blast usw.)\r\n- Hidden Markov Modelle\r\n- Strukturvorhersage von Proteinen (Sekundärstruktur, Tertiärstruktur; Threading, Comparative\r\nModelling, Ab initio)\r\n- Sekundärstrukturvorhersage von RNA\r\n- Grundlagen der Auswertung von Array-Experimenten (Microarrays usw.)\r\n- Biologische Netze (metabolisch, regulatorisch) und ihre Modellierung mit Graphen\r\n- Anwendung von bioinformatischen Softwarepaketen', '["Schriftliche Klausur","Hausarbeit"]', 'Deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nR. Merkl und S. Waack, Bioinformatik Interaktiv: Algorithmen und Praxis, Wiley-VCH\r\nH.-J. Böckenhauer und D. Bongartz, Algorithmische Grundlagen der Bioinformatik -\r\nModelle, Methoden und Komplexität, Teubner\r\nN.C. Jones, P.A. Pevzner , An Introduction to Bioinformatics Algorithms, The MIT Press\r\nG. Steger, Bioinformatik. Methoden zur Vorhersage von RNA- und Proteinstruktur, Birkhäuser\r\nD.W. Mount, Bioinformatics: sequence and genome analysis, CSHL Press', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Bioinformatische Datenanalyse, Modul Algorithmen und Datenstrukturen', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Durchführung des Projektes'),
(1, 61, '2015-01-17', 2, 'Freigegeben', 'SYBI', 'Systembiologie', 'Systems Biology', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- aktuelle Entwicklungen in der Systembiologie zu bewerten und einzuordnen\r\n- biologische Objekte in Beziehung zueinander zu stellen und als Gesamtsystem zu charakterisieren\r\n- grundlegende Methoden und Datensammlungen der Systembiologie erklären\r\n- Software und Daten problemorientiert auszuwählen', 'Der Kurs umfasst folgende Themen\r\n- Einführung in die Systembiologie\r\n- vom Genotyp zum Phänotyp\r\n- Analyse von Hochdurchsatzdaten\r\n- Modellierung und Modularität\r\n- Regulatorische und metabolische Netzwerke\r\n- Molekulare Interaktionen\r\n- Komplexität und Robustheit zellulärer Systeme\r\n- mathematische Modellierungsmethoden\r\n- Software, Datenbanken und Datenformate', '["Schriftliche Klausur"]', 'Deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\n\r\nS. Eckstein, Informationsmanagement in der Systembiologie, Springer, Berlin\r\nE.Klipp, W.Liebermeister, C. Wierling, A. Kowald, H. Lehrach, R. Herwig, Systems Biology: A\r\nTextbook, Wiley VCH\r\nU. Alon, An Introduction to Systems Biology: Design Principles of Biological Circuits, Chapman and\r\nHall/CRC\r\nZ. Szallasi, J. Stelling, V. Periwal, System Modeling in Cellular Biology: From Concepts to Nuts and\r\nBolts, MIT Press', 3, '["Pr\\u00fcfungsleistung"]', 'Modul Bioinformatische Datenanalyse, Modul Algorithmen und Datenstrukturen, Modul\r\nBiowissenschaften', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(8, 62, '2015-01-17', 2, 'Freigegeben', 'DPRO', 'Vertiefung Datenbankprogrammierung', 'Advanced Database Programming', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, '- Die Studierenden kennen weiterführende Konzepte von SQL am Beispiel des Oracle DBMS\r\n- Sie sind in der Lage, die verschiedenen Sprachkonstrukte sicher anzuwenden und komplexe Anfragen selbständig zu formulieren\r\n- Die Studierenden vertiefen ihre Kenntnisse aus dem Pflichtmodul „Datenbanken“\r\n- Sie kennen die Architektur des Oracle DBMS und können einige Aufgaben der Datenbankadministration übernehmen\r\n- Die Studierenden erwerben die Kenntnisse und Kompetenzen für die Zertifizierung zum „Oracle Database SQL Expert“', 'SQL und PL/SQL:\r\n- Retrieving Data (from single and multiple tables)\r\n- Restricting and Sorting \r\n- Single-Row Functions\r\n- Aggregated Data and Grouping \r\n- Subqueries, Set Operators\r\n- Manipulating Data and large Data Sets \r\n- Data in Time Zones\r\n- Hierarchical Retrieval\r\n- Regular Expression suppport\r\n- Managing Objects and User Access\r\n- Oracle Stored Procedures with Packages (PL/SQL)\r\n- DBMS Structure and Administration: \r\n- Oracle Database Architecture', '["M\\u00fcndliche Pr\\u00fcfung","Vortrag"]', 'Deutsch', '- Kemper, A.: „Datenbanksysteme“, Oldenbourg \r\n- O’Hearn, Steve: “SQL Cretified Expert Exam Guide”, 2010, Oracle Press\r\n- Biju, Thomas, Oracle Database 11g Administrator Certified Associate Study Guide, 2009, Oracle Press\r\n- Ahrends, J. et al.: „Oracle 11g Release 2 für den DBA“,2010, Addison-Wesley', 6, '["Pr\\u00fcfungsleistung"]', 'Modul Datenbanken', 'und Englisch', 'Prof. Dr. Schmidt', 'Vortrag und Durchführung einer praktischen Übung (Gewicht 50%),  Erfolgreiche Zertifizierung zum “Oracle Database SQL Expert” (Zertifizierungsgebühr trägt der Studierende) (Gewicht 50%) ODER mündliche Prüfung (Gewicht 50%)', 'Bestandene Modulprüfung', NULL),
(1, 63, '2015-01-19', 3, 'Freigegeben', 'ZEBI', 'Zellbiologie', 'Cell Biology', 'Sommersemester', '1 Semester', '["Vorlesung","Seminar"]', 60, 15, 105, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Komplexität des Aufbaus und der Funktion der eukaryontischen Zellen herzuleiten\r\n- die Evolutionsmechanismen zuzuordnen\r\n- die Methoden der Zellbiologie zu vergleichen und zu beurteilen\r\n- die vielen Kompartimente mit ihren spezialisierten Funktionen zu identifizieren\r\n- die Mechanismen des Transports zwischen den Kompartimenten in Bezug zu setzen\r\n- die Mechanismen der Kommunikation zwischen Zellen zu begründen\r\n- die komplexen Netzwerke der Kommunikation und der Stoffwechselwege zu verknüpfen\r\n- die komplexen Vorgänge einer Zelle nachzuvollziehen und die Defekte in diesen Systemen zu erkennen\r\n- durch einen Seminarvortrag zu beweisen, dass sie zellbiologischen Aspekte nachvollziehen können\r\n- die mikroskopischen Verfahren zu bewerten', 'Vorlesung: Organisationsprinzipien lebender Systeme\r\nOrganisation der Eukaryontenzelle, sowie Evolutionsgedanken zur Entwicklung vom Prokaryonten zum Eukaryonten\r\nGrundlagen der Entwicklung vom Einzeller zum Vielzeller\r\nGrundlagen zellbiologischer Methoden\r\nKompartimente in der Zelle, ihre Morphologie und ihre Funktion\r\nTransportmechanismen von „kleinen“ und „großen“ Molekülen aus dem extrazellulären Raum und zwischen den verschiedenen Kompartimenten\r\nSignalübertragung in der Zelle\r\nPraktikum: verschiedene Mikroskopiertechniken: Phasenkontrast- und Fluoreszenzmikroskopie', '["Schriftliche Klausur"]', 'Deutsch', 'Folien zu der Vorlesung\r\nB. Alberts, A. Johnson, J. Lewis, M. Raff, K. Roberts, P. Walter: Molekularbiologie der Zelle, 978-3-\r\n527-32384-8\r\nJ.M. Berg, J.L. Tymoczko, L.Stryer: Biochemie, Elsevier, Spektrum Akademischer Verlag, ISBN 978-\r\n3-8274-1800-5\r\nH. Lodish, A. Berk, S. L. Zipursky, P. Matsudaira, D. Baltimore, J. E. Darnell: Molekulare Zellbiologie,\r\nSpektrum Akademischer Verlag, ISBN 3-8274-1077-0\r\nD. Nelson, M. Cox: Lehninger Biochemie, Springer Verlag, ISBN 978-3-540-68637-8\r\nD. Voet, J. G. Voet, C. W. Pratt: Lehrbuch der Biochemie, Wiley-VCH Verlag, Weinheim, New York,\r\nISBN 973-3-527-32667-9', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Module Mikrobiologie und Biochemie 1', 'Seminarliteratur in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreicher Vortrag des Seminars und Praktikumsbericht'),
(22, 64, '2015-01-17', 2, 'Freigegeben', 'GENT', 'Gentechnik', 'Genetic Engineering', 'Sommersemester', '1 Semester', '["Vorlesung","Praxisprojekt"]', 60, 30, 90, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Methoden der Gentechnik anzuwenden\r\n- die wichtigen Zielsetzungen und Anwendungsgebiete der Gentechnik zuzuordnen\r\n- Chancen und Gefahren der Gentechnik differenziert zu beurteilen\r\n- aktuelle Entwicklungen der Gentechnik zu verstehen und ihre Relevanz einzuordnen\r\n- gentechnische Methoden praktisch anzuwenden', 'Methoden der Gentechnologie: Isolieren und Bearbeiten von Nukleinsäuren, chemische DNASynthese und Einsatz von Gen-Sonden, Auftrenn- und Blotting-Verfahren, Polymerase-\r\nKettenreaktion (PCR), DNA-Sequenzierung\r\nDNA-Klonierung und gentechnische Herstellung von Eiweißprodukten\r\nSomatische Gentherapie beim Menschen\r\nGenomanalyse, Genkartierung, Sequenzierung von Genomen, Gendiagnose\r\nBesondere Anwendungsgebiete der Gentechnik in Landwirtschaft und Umweltschutz\r\n\r\nPraktikum: Anwendung gentechnischer Methoden im Rahmen von Versuchsansätzen zur Klonierung eines Genkomplexes für Biolumineszenz sowie zur Genomanalyse', '["Schriftliche Klausur"]', 'Deutsch', 'Brown: Gentechnologie für Einsteiger. Spektrum Akad. Verlag, 5. Aufl., 2007\r\nBrown: Genome und Gene. Lehrbuch der molekularen Genetik. Spektrum Akad. Verlag, 3. Aufl.,\r\n2007\r\nJahnsohn, Rothhämel: Gentechnische Methoden. Spektrum Akad. Verlag, 5. Aufl., 2012\r\nFolienvorlagen zur Vorlesung, Praktikumsvorschriften', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Genetik', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme am Praktikum'),
(8, 65, '2015-01-16', 3, 'Freigegeben', 'PRAX', 'Praxisphase', 'Practical Course', 'jedes Semester', '12 Wochen', '["Selbststudium und Konsultationen"]', 0, 15, 435, 1, '- Technische und organisatorische Zusammenhänge in Unternehmen verstehen lernen.- \r\n- Fähigkeit umfassende Arbeiten unter betrieblichen Gegebenheiten eigenständig, im Team oder \r\nleitend durchzuführen\r\n- Praktische Erfahrungen im Berufsfeld der Informatik gewinnen\r\n- Theoretisches Wissen aus dem Studium in betrieblichen Projekten praktisch einsetzen können', '- Struktur des Betriebes\r\n- Unmittelbares Arbeitsumfeld\r\n- Arbeitsmittel, -Methoden und -Formen der betrieblichen Arbeit, insbesondere Team- und Einzelarbeit\r\n- Spezifische Aufgabenstellung des Studierenden\r\n- Spezifische Lösung und Dokumentation der Aufgabe', '["Vortrag"]', 'Deutsch', 'Leitbild u. Leitsätze des betreuenden Betriebs\r\nFachliche Quellen im Unternehmen', 15, '["Pr\\u00fcfungsleistung"]', 'Stoff des Bachelorstudiums, Schwerpunkte je nach Thema', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Dokumentation und Präsentation', 'Bestandene Modulprüfung', NULL),
(8, 66, '2015-01-17', 3, 'Freigegeben', 'BACH', 'Bachelor-Arbeit und Kolloquium', 'Bachelor Thesis', 'jedes Semester', '12 Wochen', '["Vorlesung","\\u00dcbung"]', 0, 15, 435, 1, 'Die Bachelorarbeit ist eine schriftliche Prüfungsarbeit. \r\nSie soll zeigen, dass die Kandidatin oder der Kandidat in der Lage ist, innerhalb einer vorgegebenen Frist ein Problem aus einem Fachgebiet selbständig nach wissenschaftlichen Methoden zu bearbeiten und die gewonnenen Ergebnisse verständlich und folgerichtig darzustellen.\r\n\r\nIm Kolloquium präsentiert der Studierende die Ergebnisse der Bachelor-Arbeit.\r\nDas Kolloquium dient auch dazu, die Eigenständigkeit der Leistung des Studierenden zu überprü-\r\nfen.', 'In Abhängigkeit vom jeweiligen Themengebiet', '[]', 'Deutsch', 'In Abhängigkeit vom jeweiligen Themengebiet', 15, '["Pr\\u00fcfungsleistung"]', 'Alle Studieninhalte, Schwerpunkte je nach Themengebiet', 'oder Englisch', 'Prof. Dr. Schmidt', 'Die Gesamtnote ergibt sich aus der Bewertung der Bachelor-Arbeit mit einem Anteil von 12 LP und des Kolloquiums mit einem Anteil von 3 LP durch die Gutachter', 'Bestandene Bachelorarbeit inkl. erfolgreich durchgeführtem Kolloquium', NULL),
(1, 67, '2015-01-19', 3, 'Freigegeben', 'MIBI', 'Mikrobiologie', 'Microbiology', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung","Praxisprojekt"]', 60, 15, 195, 8, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Besonderheiten industrieller Mikroorganismen wiederzugeben\r\n- die Grundlagen von Stammentwicklung und Stammkonservierung zu benennen\r\n- den Ablaufes von Infektionen - Angriff der Bakterien und Abwehr des Wirtes aufzuzählen\r\n- die Prinzipien der Übertragung von infektiösen Partikeln zu nennen\r\n- die Vielfalt der Organismen im Bereich der Mikroorganismen kennenzulernen\r\n- die Bedeutung von Stammbäumen zuzuordnen\r\n- die Systematik der Organismen zu nennen und beschreiben zu können\r\n- die Teilgebiete der Systematik (Taxonomie, Klassifizierung und Nomenklatur) zu charakterisieren\r\n- die Grundprinzipien des mikrobiellen Stoffwechsels wiederzugeben\r\n- die Bedeutung von Katabolismus und Anabolismus zuzuordnen sowie deren thermodynamischen Grundprinzipien zuzuordnen\r\n- die Grundzüge der Regulationsprinzipien des Stoffwechsels zu nennen\r\n- Versuchsprotokolle naturwissenschaftlich darzustellen', 'Vorlesung Mikrobiologie 2 SWS Teil Prof. Steinmüller: \r\n1. Industrielle Mikroorganismen - Suche nach neuen Wirkstoffen (Screening); Hochleistungs-Mikroorganismen (Stammentwicklung); Konservierung von Produktionsstämmen (Stammhaltung). \r\n2. Pathogene Mikroorganismen - Normale Flora; Mechanismen der Pathogenität;  bertragungswege bei Infektionen; Opportunistische Erreger; Beispiele bakterieller Infektionen\r\n\r\nVorlesung Mikrobiologie 3 SWS, Teil Prof. Krefft: Kenntnisse zum Aufbau von Viren und Pilzen,\r\nÜberblick zur Systematik der Organismen. Grundlagen zum Stoffwechsel. Prinzipien der Bioenergetik. Einige Stoffwechselwege der Mikroorganismen: Glycolyse und der Katabolismus der\r\nKohlenhydrate, Citratzyklus, Atmungskette, Gärungen. Zu diesen Teil der Vorlesung werden theoretische Übungen als Hausarbeiten ausgegeben.\r\n\r\nPraktikum Mikrobiologie, 1 SWS, Verständnis zu der Wirkungsweise von Antibiotika, Agardiffusionstest. Aufbau und Eigenschaften der bakteriellen Zellwand, lysieren Grampositiver und Gramnegativer Keime, Identifizierung von Keimen, prakisch und theoretisch mit Erstellung eines phylogenetischen Stammbaumes.', '["Schriftliche Klausur"]', 'Deutsch', 'Folien zur Vorlesung Teil Krefft und Taschenlehrbuch Biologie Mikrobiologie, Hrsg. Katharina Munk,\r\nThieme Verlag, ISBN: 9783131448613 ;Taschenlehrbuch Biologie Biochemie - Zellbiologie, Hrsg.\r\nKatharina Munk, Thieme Verlag, ISBN 9783131448316; M.T.Madigan & J.M.Martinko, Brock\r\nMikrobiologie, Pearson Studium, ISBN: 978-3-8273-7358-8; Mikrobiologie, Slonczewski, J. L.&\r\nFoster, J. W., Springer Verlag, ISBN 978-3-8274-2909-4 D.Nelson & M.Cox, Lehninger Biochemie,\r\nSpriger Verlag, ISBN: 3-540-41813-X', 9, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Biowissenschaften', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme am Praktikum und Übungen'),
(6, 68, '2015-01-15', 1, 'Freigegeben', 'HAPO', 'Hardwarenahe Programmierung', 'Hardware Oriented Programming', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Kenntnis und Anwendung einer hardwarenahen prozeduralen Programmiersprache. Anwendung von Zeigern und Referenzen sowie Abschätzung der Vor- und Nachteile bei konkreten Anwendungsszenarien. Die Studierenden können auf Basis der erlernten Programmiersprache Roboter programmieren, indem sie Sensordaten abrufen, miteinander verknüpfen und verarbeiten und darauffolgend Aktoren ansteuern. Sie können die Beobachtungen und Ergebnisse auf die theoretischen Grundlagen zurückführen und die erprobten Beispiele auf reale Anwendungen übertragen.', '- Syntax der Programmiersprache C/C++ \r\n- Parameterübergabe, Zeiger und Arrays \r\n- Dynamische Datenstrukturen \r\n- C++ Klassen \r\n- Konstruktoren, Destruktoren, Speicher belegen und freigeben \r\n- Multiple Vererbung und Operatoren \r\n- Aufnahme, Filterung und Verknüpfung (Fusion) von Sensordaten \r\n- Aufbereitung von Sensordaten zur Modellbildung und darauffolgenden Ansteuerung von Aktoren \r\n- Erkennung von Fehlregelungen und Korrekturmöglichkeiten', '["Schriftliche Klausur"]', 'Deutsch', 'Kerninghan, Ritchie: Programmieren in ANSI C, Hanser Verlag \r\nSchildt:C++ Ent-Packt, MITP-Verlag \r\nBreymann: C++, Einführung und professionelleProgrammierung, Hanser Verlag \r\nThrun/Burgard/Fox: Probabilistic Robotics. MIT Press, 2005', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an Laborübungen)'),
(1, 69, '2015-01-17', 2, 'Freigegeben', 'BIOC1', 'Biochemie 1 und Einführung in die Biotechnik', 'Biochemistry 1 and Introduction to Bioengineering', 'Wintersemester', '1 Semester', '["Vorlesung","Labor"]', 60, 15, 105, 6, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- die Anwendungsgebiete der Biotechnik zu erklären\r\n- die Spezialgebiete bzw. die Vertiefungsmöglichkeiten der Biotechnik zu verstehen und zu\r\nbeschreiben\r\n- die Grundlagen der Biochemie wiederzugeben\r\n- biochemische Reaktionen zuzuordnen\r\n- die Bedeutung von Konfiguration und Konformation für ein Makromolekül zu\r\ncharakterisieren\r\n- den Aufbau eines Proteins zu erklären\r\n- die Methoden zur Aufreinigung von Proteinen aufzuzeigen\r\n- die Funktion von Proteinen und Enzymen zu erklären', 'Vorlesung Biotechnik Einführung: \r\nWas ist Biotechnologie? Überblick zu den Teilgebieten der Biotechnik: \r\nLebensmittelbiotechnik, Enzyme für Haushalt und Technik, Industrielle Biotechnik,\r\nUmweltbiotechnik, Grüne Biotechnik, medizinische Biotechnologie, marine oder aquatische\r\nBiotechnik, analytische Biotechnologie und das Humangenom\r\n\r\nVorlesung Biochemie I: Eigenschaften von Biomolekülen; Biochemische Reaktionen;\r\nEigenschaften der Aminosäuren, der Peptide und der Proteine; Grundlegendes Verständnis zur\r\ndreidimensionalen Struktur der Proteine; Proteinkonformationen: Primär-, Sekundär-, Tertiär und\r\nQuartärstrukturen von Proteinen; Funktion von Proteinen und Enzymen; Enzymkinetik\r\nPraktikum Biochemie: Aufreinigung eines Proteins, Nachweis der Reinigung und\r\nAktivitätsbestimmung der Aufreinigungsfraktionen, Enzymkinetik\r\n\r\nÜbung Biotechnik: theoretische Ausarbeitung eines kleinen Projekts', '["Schriftliche Klausur"]', 'Deutsch', 'Folien zur Vorlesung,\r\nW.J.Thiemann & M.A.Palladino, Biotechnologie, Pearson Studium, ISBN: 978-3-8273-7236-9\r\nR.Renneberg, Biotechnologie für Einsteiger, Spektrum, ISBN: 3-8274-1538-1\r\nM.Wink (Hrsg.) Molekulare Biotechnologie, Wiley-VCH, ISBN: 978-3-527-32655-6\r\nD.Voet, J.G.Voet & C.W.Pratt, Lehrbuch der Biochemie, Wiley-VCH, ISBN:978-3-527-32667-9\r\nD.Nelson & M.Cox, Lehninger Biochemie, Springer, ISBN:3-540-41813-X\r\nJ.M.Berg, J.L.Tymoczko & L. Stryer, Biochemie, Spektrum, ISBN:978-3-8274-1800-5\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nH.R.Horton, L.A. Moran, K.G. Scrimgeour, M.D.Perry & J.D. Rawn, Biochemie, Pearson Studium,\r\nISBN: 978-3.8273-7312-0\r\nA.M.Lesk, An Introduction to Protein Science, Oxford University Press, ISBN: 0 19 926511 9', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Biowissenschaften und Modul Mikrobiologie', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme am Praktikum, Abgabe Hausarbeit'),
(1, 70, '2015-01-17', 3, 'Freigegeben', 'BIOC2', 'Biochemie 2', 'Biochemistry 2', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 15, 105, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- Interaktion und Funktion von Makromolekülen (Proteine/DNA/RNA) in Abhängigkeit von ihrer Konformation zu erklären\r\n- dynamische Konformationen der DNA zu charakterisieren\r\n- die Bedeutung der DNA-Polymerasen während der Replikation aufzuzeigen\r\n- die Wichtigkeit von DNA-Reparaturmechanismen für eine mutationsfreie Weitergabe der genetischen Information zu analysieren\r\n- Mechanismen der Rekombination zu identifizieren\r\n- Mechanismen der Transkription und Translation in ihrer Komplexität zu begründen', '- DNA-Aufbau: Eigenschaften, Stuktur, Gene und Chromosomen \r\n- DNA-Stoffwechsel: Replikation, Reparatur, Rekombination\r\n- RNA-Stoffwechsel: Transkription, Processing\r\n- Proteinstoffwechsel: Der genetische Code, Proteinsynthese', '["Schriftliche Klausur"]', 'Deutsch', 'Folien zur Vorlesung,\r\nD.Voet, J.G.Voet & C.W.Pratt, Lehrbuch der Biochemie, Wiley-VCH, ISBN:978-3-527-32667-9\r\nD.Nelson & M.Cox, Lehninger Biochemie, Springer, ISBN:3-540-41813-X\r\nJ.M.Berg, J.L.Tymoczko & L. Stryer, Biochemie, Spektrum, ISBN:978-3-8274-1800-5\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nH.R.Horton, L.A. Moran, K.G. Scrimgeour, M.D.Perry & J.D. Rawn, Biochemie, Pearson Studium,\r\nISBN: 978-3.8273-7312-0', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Biochemie 1', 'Lesen von englischen Veröffentlichungen', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an den Übungen'),
(31, 71, '2015-01-15', 1, 'Freigegeben', 'EMA', 'Entwicklung mobiler Anwendungen', 'Mobile Application Development', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden erwerben Kenntnisse zum Entwurf und der Implementierung von Apps für mobile Systeme. \r\nSie beherrschen den Workflow von der Idee bis zur Bereitstellung einer App. \r\nDie Studierenden lernen die Programmiersprache Objective-C sowie die Entwicklungsumgebung \r\nXCode kennen. Sie verstehen die Grundlagen des User Interface Designs und sind in der Lage diese durch Entwicklung von UI Prototypen anzuwenden. Die Studierenden beherrschen die wichtigsten Frameworks zur Erstellung iOS spezifischer Applikationen. Sie lernen die verschiedenen Cross-Plattform-Ansätze (Nativ, Hybrid, Web) und Web Frameworks (Sencha Touch, jQuery Mobile) kennen und erwerben Fähigkeiten zur Entwicklung mobiler Anwendungen unter Verwendung von HTML, CSS und JavaScript. \r\nDie Studierenden sind mit Technologien im Enterprise Umfeld (EMM, MEAP, Webservices) vertraut und wissen diese einzuordnen. Zu den zu trainierenden Softskills zählen Teamfähigkeit, Präsentationstechniken, Erschließung von Literatur und eigenverantwortliches Arbeiten.Die Studierenden erwerben Kenntnisse zum Entwurf und der Implementierung von Apps für mobile Systeme. Sie beherrschen den Workflow von der Idee bis zur Bereitstellung einer App.', 'Programmiersprache Objective C \r\n- XCode, Simulator, Instruments, Debugging, Interface Builder \r\n- User Interface Design und Apple Bedienkonzept \r\n- Mock-Up Erstellung mittels XCode Storyboard \r\n- iOS Foundation Framework, Cocoa Touch, Application Lifecycle, Speicherverwaltung \r\n- Entwurfsmuster wie MVC, Delegation, Observer \r\n- Aufbau „Apple Developer Program“ (Zertifikate, Provisionierung)\r\n Persistenz-Schicht Core Data \r\n- Enterprise Technologien (EMM, MEAP, Webservices) \r\n- Multithreading unter iOS (Blocks, Grand Central Dispatch) \r\n- Cross Platform Development (jQuery Mobile, Sencha Touch, PhoneGap, Nativ, Hybrid, Web) \r\n- Eigenständige Entwicklung einer App', '["Projektarbeit"]', 'Deutsch', 'Skript zur Vorlesung, \r\nBücher mit Titel: \r\n- Kochan, S.: Programming in Objective-C 2.0, Addison-Wesley Longman, ISBN: 978-0321566157, \r\n2009 \r\n- Hillgas A. ;Fenologio M.: Objective-C Programming: The Big Nerd Ranch Guide, Addison-Wesley, \r\nISBN 978-0321706287, 2011 \r\n- Hillegass A.; Conway J.: iOS Programming: The Big Nerd Ranch Guide, Addison-Wesley, ISBN \r\n978-0321773777, 2011 \r\n- Mark D.: Beginning iOS 6 Development: Exploring the iOS SDK, Apress, ISBN 978-1430245124, \r\n2013 \r\n- Conway J.; Hillegass A.: iOS-Programmierung für iPhone und iPad: Der Big Nerd Ranch-Guide, \r\nAddison-Wesley, ISBN 978-3827330154, 2011.-', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Java Programmierkenntnisse, Hardwarenahe Programmierung', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Erfolgreiche Bearbeitung und Präsentation einer Projektarbeit', 'Erfolgreicher Abschluss des Projekts)', 'erfolgreiche Teilnahme an den Übungen'),
(25, 72, '2015-01-17', 2, 'Freigegeben', 'EFE', 'Englisch', 'English for Engineers', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- Vokabular aus den Bereichen Informationstechnologie, Biologie, Physik, Ingenieurwesen und Wirtschaft einzusetzen\r\n- sprachlichen Mittel zum Beschreiben, Erörtern, Argumentieren, Schildern, logischen Verknüpfen\r\nund Moderieren anzuwenden\r\n- sich Wissen, Vokabular und Strukturen mittels englischer Texte/Artikel anzueignen und daraufhin zu kommentieren, weiter- und wiederzugeben, zu evaluieren\r\n- die englische Sprache grammatikalisch richtig zu verwenden', '- Vokabular in oben genannten technischen und ökologischen Bereichen - mittels Fachartikel und\r\nenglischer Originalquellen\r\n- Souveräner schriftlicher und mündlicher Ausdruck durch workshops: academic writing, presenting, conversation\r\n- Idiomatische Ausdrucksweise\r\n- Sprachrichtigkeit\r\n- Kommunikationstraining – language is a tool', '["Schriftliche Klausur","M\\u00fcndliche Pr\\u00fcfung"]', 'Englisch', 'aktuelle Lehrbücher Technical English, aktuelle Fachartikel, Pressequellen (e.g.The Guardian, The\r\nIndependent, The New York Times, Scientific American), BBC documentaries etc .', 3, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Sprachkenntniss auf B1/B2 Niveau nach CEF empfohlen', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung und mündliche Ergänzungsprüfung (max. 10 min) nach der Klausur (Notenanteil 25 %)', NULL),
(11, 73, '2015-01-15', 1, 'Freigegeben', 'OBIS', 'Ortsbezogene Informationssysteme', 'Location Based Information Systems', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden sollen ... \r\n- Information mit geographischem Bezug aufbereiten, für die Interaktion mit dem Benutzer/der Benutzerin visualisieren (GeoTagging) und die Kommunikation mit einem Web Server realisieren können; dabei kommen Grundlagen der Web-2.0-Programmierung (XHTML, CSS, JavaScript/DOM, AJAX, Java) und PHP zum Einsatz \r\n- typische GeoDatenFormate (GPX, KML) verstehen und auch mit XSLT verarbeiten können \r\n- entsprechende Anwendungen und Bedienoberflächen konzipieren und auch für mobile Computer realisieren können \r\n- eine GeoDatenAnwendung in einer Geodateninfrastruktur konzipieren und realisieren können', 'Konzeption und Realisation typischer Kartendienste unter Einbeziehung mobiler Computer \r\n-Namensdienste im Web \r\n-GeoTagging (mit Google Maps) \r\n-Datenakquisition und -aufbereitung \r\n-Verarbeitung von XML-Formaten (KML, GPX, SVG) \r\n-XSLT-Grundlagen und Anwendungen \r\n-Strukturtransformationen mit XSLT \r\n-API-Programmierung mobiler Computer', '{"1":"Projektarbeit"}', 'Deutsch', 'J. Roth: Mobile Computing, dpunkt Verlag, Sept. 2005 \r\n- J. Schiller, A. Voisard (eds), Location-Based Services, Morgan Kaufmann Publishers, Mai 2004 \r\n- A. Küpper: Location-Based Services, John Wiley & Sons, 2005 \r\n- http://code.google.com/intl/de-DE/apis/maps/documentation/mapsdata/developers_guide_java.html \r\nFrederik Ramm, Jochen Topf: OpenStreetMap Die freie Weltkarte nutzen und mitgestalten. lehmanns media. 1, Auflage 2009. ISBN 978-3-86541-320-8t', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'erfolgreich bearbeitetes Projekt, Referatsvortrag und schriftliche Ausarbeitung', NULL),
(1, 74, '2015-01-17', 2, 'Freigegeben', 'SEBI', 'Seminar Bioinformatik', 'Bioinformatics Seminar', 'Wintersemester', '1 Semester', '["Vorlesung","Seminar"]', 45, 0, 45, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- verbale, paraverbale und nonverbale Fertigkeiten für eine wirkungsvolle Selbstdarstellung, Rede und Präsentation einzuordnen\r\n- verschiedener Redeformen zu charakterisieren\r\n- Präsentationen mit verschiedene Medien optisch ansprechend aufzubereiten\r\n- Methoden, um mit Angst und Lampenfieber beim Präsentieren umzugehen, einzuordnen\r\n- Präsentationen zu halten\r\n- komplexe fachlich Zusammenhänge auf Wesentliches zu reduzieren\r\n- Fachdiskussionen zu führen\r\n- Schriftliche Zusammenfassungen zu erstellen', 'Grundlagen der Präsentation:\r\n- gezielter Einsatz von verbalen, paraverbalen und nonverbalen Mitteilungen bei Selbstdarstellung, Reden, Präsentationen\r\n- Inhaltliche Ausarbeitung verschiedener Redeformen\r\n- Visualisierungsmöglichkeiten und Einsatz verschiedener Medien\r\n- Umgang mit Angst und Lampenfieber bei Präsentationen\r\n\r\nSeminar:\r\n- Inhalte werden ausgewählt aus aktuellen Trends in Wissenschaft und Industrie', '["Vortrag"]', 'Deutsch', 'Präsentieren:\r\nAlbert Thiele: Präsentieren Sie einfach, Frankfurter Allgemeine Buch.\r\nWolfgang Mentzel: Rhetorik: Sicher und erfolgreich sprechen, dtv.\r\nJosef W. Seifert: Visualisieren, Präsentieren, Moderieren, Gabal.\r\nAlbert Thiele: Die Kunst zu überzeugen: Faire und unfaire Dialektik, Springer.\r\nElisabeth Bonneau: Stilvoll zum Erfolg: Der moderne Business-Knigge, Hoffmann und Campe.\r\nVera Birkenbihl: Signale des Körpers: Körpersprache verstehen, mvg-Verlag\r\n\r\nSeminar:\r\nFachzeitschriften (Bioinformatics, PloS, BioMedCentral) u.ä.', 3, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', NULL, 'Prof. Dr. Schmidt', NULL, 'Erfolgreicher Seminarvortrag', 'erfolgreich bearbeitete Übungen'),
(1, 75, '2015-01-17', 2, 'Freigegeben', 'WIAS', 'Wissenschaftliches Arbeiten und Schreiben', 'Academic research and writing', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 0, 60, 30, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- zu einer vorgegebenen Aufgabenstellung selbständig geeignete wissenschaftlich-technische Methoden zur Bearbeitung auszuwählen und zu verwenden\r\n- grundlegender Methoden des Lernens, des aktiven Lesens, der Literaturrecherche, des Zeitmanagements und der Selbstorganisation anzuwenden\r\n- eines wissenschaftlich-technischen Text zu erstellen\r\n- geeigneter persönlicher Mechanismen zum Umgang mit Schreibblockaden zu entwickeln und einzusetzen', 'Der Kurs umfasst folgende Themen\r\n- Grundlagen des Lernvorgangs im Gehirn, individuelle Fähigkeiten des Wissenserwerbs\r\n- Literaturrecherche\r\n- aktives Lesen von Fachliteratur (z.B. „Querlesen“)\r\n- Aufarbeiten von Gelesenem (z.B. Exzerpieren, Mind Maps)\r\n- Arbeits- und Zeitplanung\r\n- strukturiertes Schreiben (z.B. Abbau von Schreibblockaden)\r\n- Zitieren, Literaturverwaltung (z.B. BibTex)\r\n- Charakteristika wissenschaftlich-technischer Texte\r\n- Aufbau von Bachelor-, Master- und Doktorarbeiten\r\n- Sicherung guter wissenschaftlicher Praxis (entsprechend DFG)', '["Hausarbeit"]', 'Deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nH. Esselborn-Krumbiegel: Von der Idee zum Text - Eine Anleitung zum wissenschaftlichen\r\nSchreiben, Schöningh UTB\r\nN. Franck & J. Stary: Die Technik wissenschaftlichen Arbeitens, Schöningh UTB\r\nP. Schlager & M. Thibud: Wissenschaftlich mit Latex arbeiten, Pearson Verlag\r\nP. Rechenberg: Technisches Schreiben (nicht nur) für Informatiker, Hanser Verlag\r\nO. Kruse: Keine Angst vor dem leeren Blatt - ohne Schreibblockaden durchs Studium, campus\r\nconcret\r\nH. F. Ebel & C. Bliefert: Bachelor-, Master- und Doktorarbeit - Anleitungen für den\r\nnaturwissenschaftlich-technischen Nachwuchs, Wiley-VCH\r\nC. Grüning: Garantiert erfolgreich lernen - Wie Sie Ihre Lese- und Lernfähigkeit steigern, Verlag\r\nGrüning\r\nK. Samac, M. Prenner, H. Schwetz: Die Bachelorarbeit an Universität und Fachhochschule: Ein\r\nLehr- und Lernbuch zur Gestaltung wissenschaftlicher Arbeiten, facultas wuv UTB Stuttgart\r\nF. Vester: Denken, Lernen, Vergessen, dtv', 3, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreich bestandene Übungen'),
(4, 76, '2015-01-15', 1, 'Freigegeben', 'MOVS', 'Mobile und verteilte Systeme', 'Mobile and Distributed Systems', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Kenntnis spezifischer Problem und zu erreichender Ziele bei der Integration von Systemen \r\n- Kenntnis und Fähigkeit zur Anwendung verschiedener Integrations-Pattern und deren direkter und indirekter Anwendung in Technologien und Lösungen. \r\n- Kenntnis der wichtigsten Technologien und Architekturen für verteilte Anwendungen mit mobilen Endgeräten und derer spezifischen Vor- und Nachteile. \r\n- Fähigkeit, bei gegebener Aufgabenstellung/Szenario eine begründete Empfehlung für die technologische \r\nArchitektur aussprechen zu können, inklusive eines qualifizierten Katalogs nutzbarer Frameworks. \r\n- Erlernen des praktischen Umgangs mit Technologien (Middleware) und Konzepten (Architekturen) zur \r\nIntegration von verteilten Anwendungen und Integration von mobilen Endgeräten anhand von kleinen Beispielen', 'Verteilung, Synchronisation und Kooperation von Anwendungen und Diensten auf Systemebene, insbesondere bei den am weitesten verbreiteten mobilen Systemen. \r\n- Integration-Patterns für Verteilte Systeme- Konzepte (Synchron, Asynchron, Proxy) und Middleware-Technologien zur Integration von Informationssystemen. Eigenschaften von Verteilten Systemen (Charakteristiken, Konsistenz, Replikation, Fault-Tolerance) und \r\nZiele der Umsetzung (Loose Kopplung, Flexibilität). \r\n- Systemarchitekturen und Technologien zur Umsetzung von verteilten Informationssystemen (P2P, GRID, \r\nSOA, REST, CLOUD) und deren Anwendbarkeit auf mobile Systeme', '["Schriftliche Klausur","Projektarbeit"]', 'Deutsch', 'Tanenbaum, Andrew. Distributed Systems - Principles and Paradigms, 2nd edition. Pearson Prentice Hall. \r\n2007 \r\nSchill, Alexander;Springer, Thomas: Verteilte Systeme: Grundlagen und Basistechnologien. Springer-Verlag. \r\nHeidelberg. 2012 \r\nMeier, Reto: Professional Android 4 Application Development. John Wiley & Sons. 2012.', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Lösung einer Vorstellung einer praktischen Aufgabenstellung (exemplarische Anwendung einer spezifischen Technologie anhand eines Beispiels/Dummy), alternativ: Modulklausur (90 Min.)', 'Bestandene Modulprüfung', NULL),
(1, 77, '2015-01-17', 2, 'Freigegeben', 'MICR', 'Microarrayanalyse mit R', 'Microarray analysis using R', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- grundlegende Methoden zur Analyse von Microarraydaten in der medizinischen Diagnostik einzuordnen und anzuwenden\r\n- die gesamte Verarbeitungskette ausgehend von der Bildverarbeitung bis zur medizinischen Diagnose zu beschreiben\r\n- selbständig kleinere Programme in der statistischen Programmiersprache R zu schreiben\r\n- vorhandene Programmpakete (R, Bioconductor) anzuwenden\r\n- statistische Methoden zur Datenanalyse auszuwählen und deren Ergebnisse zu interpretieren.', 'Der Kurs umfasst folgende Themen\r\n- Einführung in die medizinische Diagnostik mit Microarrays und Expressionsdaten\r\n- Einführung in Software zur Erkennung und Verarbeitung von Microarraybilddaten\r\n- Durchführung von linearer und nicht-linearer Regression zur Korrektur experimenteller Artefakte\r\n- Durchführung von Normalisierungen, um verschiedene Experimente vergleichbar zu machen\r\n- Messung und Bewertung von Variablilität in biologischen Daten\r\n- Analyse von Beziehungen zwischen Genen, Geweben, Behandlungen, Experimenten usw.\r\n- Reduktion großer Datenmengen, Auswahl relevanter Daten\r\n- Umgang mit (zu kleinen) Stichproben, Bootstrapping\r\n- Distanzen und Korrelationskoeffizienten\r\n- Clustering und Klassifikation, Grundlagen des Data Mining\r\n- Visualisierung von Ergebnissen (Boxplot, Heat-Map, Dendrogramm usw.)', '["Schriftliche Klausur"]', 'Deutsch', 'Präsentationsfolien und Aufgabensammlung zur Vorlesung\r\nBärlocher, F.: Biostatistik. Praktische Einführung in Konzepte und Methoden, Thieme, 2008\r\nStekel, D.: Microarray Bioinformatics, Cambridge University Press, 2003\r\nSpeed, T. (Hrsg.): Statistical Analysis of Gene Expression Microarray Data, Chapman & Hall/CRC,\r\n2003\r\nSachs, L. & Hedderich, J.: Angewandte Statistik - Methodensammlung mit R, Springer-Verlag, 2009\r\nMount, D.: Bionformatics - Sequence and Genome Analysis, CSHL Press, 2.Auflage, 2004\r\nAdler, J.: R in a Nutshell, O’Reilly, 2010\r\nLogan, M.: Biostatistical Design and Analysis Using R, John Wiley & Sons, 2010\r\nStatistische Programmiersprache R (http://www.r-project.org/)\r\nBioconductor – Sammlung von Softwarepaketen zur Analyse biologischer Daten mit R\r\n(http://www.bioconductor.org/)', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Statistik, Modul Bioinf. Datenanalyse', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreich durchgeführte Projektarbeit'),
(1, 78, '2015-01-17', 2, 'Freigegeben', 'CBIO', 'Current Bioinformatics', 'Current Bioinformatics', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Am Ende des Moduls sind die Studierenden in der Lage:\r\n- aktueller Probleme und Lösungsverfahren aus der Bioinformatik zu bewerten\r\n- umfassende Bioinformatikprobleme zu analysieren und Lösungen zu skizzieren\r\n- in Fachliteratur zu recherchieren\r\n- existierende Bioinformatiksysteme zu analysieren und ihre Stärken und Schwächen zu\r\nbeurteilen\r\n- im Team Bioinformatikfragestellungen zu bearbeiten\r\n- aktuelle Resultate aus Forschung und Entwicklung zu beurteilen und zu präsentieren', 'Die Lehrinhalte werden jeweils nach dem aktuellen Stand der Forschung und Entwicklung zusammengestellt.\r\nBeispiele:\r\nAutomatische Funktionsannotation\r\nDatenanalyse in der Medizinischen Diagnostik\r\nExperimentelle Bioinformatik\r\nAnalyse von Next-Generation-Sequencing-Daten', '["Vortrag","Hausarbeit"]', 'Englisch', 'OpenAccess-Zeitschriften aus der Public Library of Science (PLoS), BioMedCentral (z.B. BioMedCentral Bioinformatics), Nature, Science, Bioinformatics, Nucleic Acids Research usw', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Bioinformatische Datenanalyse, Modul Algorithmische Bioinformatik, Modul\r\nDatenbanken', NULL, 'Prof. Dr. Schmidt', 'englischsprachiger Vortrag', 'Bestandene Modulprüfung', 'erfolgreich durchgeführte Projektarbeit'),
(19, 79, '2015-01-17', 2, 'Freigegeben', 'NEUR', 'Neuronale Netze', 'Neural Networks', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 0, 60, 35, '- Beherrschen der grundlegenden Funktionsweise neuronaler Netze\r\n- Verständnis der verschiedenen Lernverfahren mit ihren Vor- und Nachteilen\r\n- Verständnis der notwendigen Datenaufbereitung und Versuchsplanung\r\n- Kennenlernen der Beurteilung trainierter Netze\r\n- Überblick über Anwendungsbereiche der verschiedenen Netztypen', 'Netzmodelle: Schwellenwertelement, Perzeptron, vorwärtsgerichtete Netze, sensorische und motorische Karten.\r\nLernverfahren: Hebbsches Lernen, Gradientenabstieg, Levenberg-Marquardt\r\nBeurteilung der Netze und Versuchsplanung\r\nAnwendungen: Klassifizierungen, Wegeoptimierung, Funktionsapproximation, Prozesskontrolle und -optimierung, Erkennen von Molekularstrukuren', '["Schriftliche Klausur","M\\u00fcndliche Pr\\u00fcfung"]', 'Deutsch', 'Skript neuronale Netze in elektronischer Form\r\n\r\nRojas, R.: Neuronal Networks. Springer, New York, 1996. ISBN 3-540-60505-3.\r\nZupan, J. and J. Gasteiner: Neuronal Networks in Chemistry and Drug Design. Wiley VCH,\r\nWeinheim, 1999. ISBN 3-527-29779-0', 3, '["Pr\\u00fcfungsleistung"]', 'Mathematik', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(19, 80, '2015-01-17', 2, 'Freigegeben', 'EVOL', 'Evolutionäre Algorithmen', 'Evolutionary Algorithms', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 0, 60, 35, '- Überblick über klassische Optimierungsaufgaben\r\n- Beherrschen des Mutations-Selektions-Verfahrens, sowie der Simulated-Annealing-, der Threshold -Accepting - und der Sintflut-Methode\r\n- Verständnis der Genetischen Operationen\r\n- Fähigkeit zur Anwendung der Genetischen Algorithmen und der Genetischen Programmierung\r\n- Überblick über Evolutionsstrategien', 'Klassische Optimierungsverfahren\r\nMutations-Selektions-Verfahren\r\nGenetische Algorithmen\r\nEvolutionsstrategien\r\nGenetische Programmierung', '["Schriftliche Klausur","M\\u00fcndliche Pr\\u00fcfung"]', 'Deutsch', 'Kinnebrock, Werner: Optimierung mit genetischen und selektiven Algorithmen, ISBN 3-486-22697-5\r\nLeach, Andrew A.: Molecular Modelling. ISBN 0-582-38210-6.\r\nMerkl, Rainer und Waack, Stephan: Bioinformatik Interaktiv. ISBN 3-527-30662-5.\r\nSteger, G.: Bioinformatik. Birkhäuser, Basel, 2003. ISBN 3764369515.\r\nWeicker, K.: Evolutionäre Algorithmen. Teubner, Stuttgart, 2002. ISBN 3-519-00362-7.', 3, '["Pr\\u00fcfungsleistung"]', 'Mathematik', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(8, 81, '2015-01-17', 2, 'Freigegeben', 'PROFI', 'Individuelle Profilbildung', 'Individual Profiling', 'wechselnd', '1 Semester', '["Selbststudium und Konsultationen"]', 0, 30, 150, 1, 'Das Wahlfach zielt auf die individuelle Profilbildung der Studierenden. Sie sollen im Rahmen einer\r\nfrei definierten Aufgabe zeigen, dass sie komplexe Probleme mit begrenzter Unterstützung durch\r\nden Betreuer weitgehend selbstständig lösen können. \r\nEs wird erwartet, dass die Studierenden sich eigenständig in die erforderlichen Techniken zur Lösung des gestellten Problems einarbeiten. Die zu bearbeitenden Probleme sollen so gestellt sein, dass sie nicht komplett mit Mitteln aus Pflichtvorlesungen gelöst werden können.', 'Die Inhalte bilden aktuelle Gebiete der Informatik, Bioinformatik oder Biotechnik, in denen sich die\r\nStudierenden vertiefen wollen. Die Wahl des Themas erfolgt im Dialog zwischen Studierenden und\r\nHochschullehrer.', '["Hausarbeit"]', 'Deutsch', 'Bücher zum jeweiligen Themengebiet', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'oder Englisch', 'Prof. Dr. Schmidt', NULL, 'schriftliche Hausarbeit und praktische Projektarbeit', NULL),
(5, 82, '2015-01-15', 1, 'Freigegeben', 'MOBU', 'Mobile Business', 'Mobile Business', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden kennen das Spektrum der vorhandenen technologischen Möglichkeiten und können diese in Bezug setzen zu den aktuellen Geschäftsmodellen des Mobile Computing. Sie kennen nationale und internationale Unterschiede bei den Angeboten sowie Sie das gesamte Spektrum der Wertschöpfungsmöglichkeiten anhand von Beispielen zu bewerten wissen', 'Introduction to Mobile Business \r\n - Infrastrukturen mobiler Kommunikationssysteme \r\n - Kabellose (Internet) orientierte Infrastrukturen und Protokolle \r\n - Mobile Kommunikationsdienste. \r\n - Smartcards und deren Anwendungen im Mobile Business \r\n - Mobile Endgeräte: Typen und Einsatzspektrum \r\n - Konzepte für Betriebssysteme Mobiler Endgeräte \r\n - Marktüberblick - Betriebssysteme für mobile Endgeräte und Sicherheitsaspekte\r\n\r\nÖkonomische Grundlagen \r\n - Electronic Business vs. Mobile Business\r\n - Marktstrukturen und Wertschöpfung \r\n - Geschäftsmodelle \r\n - Mobile Marketing \r\n - nationale und internationale Dienste \r\n - Akzeptanz- und Erfolgsfaktoren im Mobile Business \r\n - Sicherheitsanforderungen und Infrastrukturen \r\n - rechtliche Grundlagen \r\n - Bewertung und Zukunftsperspektiven Beispiele mobiler Business Anwendungen \r\n- Vorstellung verschiedener Anwendungen im B2B und B2C Bereich \r\n- Darstellung der spezifischen ökonomischen Eigenschaften und Wertschöpfung', '["Schriftliche Klausur"]', 'Deutsch', 'Bauer, Dirks, Bryant: Erfolgsfaktoren des Mobile Marketing. Springer. 2008. \r\nTurowski, Klaus; Pousttvhi, Key: Mobile Commerce: Grundlagen und Techniken. Springer. 2003.\r\nLogara, Tomislav: M-Business kompakt: Grundlagenwissen zu Kommunikationstechnologien, Endgeräten, Anwendungen und Mobile Security, 2008.', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(1, 83, '2015-01-17', 2, 'Freigegeben', 'BIOC3', 'Biochemie 3', 'Biochemistry 3', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Grundprinzipien der Genregulation herzuleiten\r\n- die Regulation der Genexpression zu analysieren\r\n- die Methoden der Gentherapie zu diskutieren', 'Regulation der Genexpression\r\nGentherapie \r\nAktuelle ausgewählte Themen der Biochemie', '["Schriftliche Klausur"]', 'Deutsch', 'Folien zur Vorlesung,\r\nD.Voet, J.G.Voet & C.W.Pratt, Lehrbuch der Biochemie, Wiley-VCH, ISBN:978-3-527-32667-9\r\nD.Nelson & M.Cox, Lehninger Biochemie, Springer, ISBN:3-540-41813-X\r\nJ.M.Berg, J.L.Tymoczko & L. Stryer, Biochemie, Spektrum, ISBN:978-3-8274-1800-5\r\nP.Y.Bruice: Organische Chemie, Pearson Studium, ISBN:978-3-8273-7190-4\r\nH.R.Horton, L.A. Moran, K.G. Scrimgeour, M.D.Perry & J.D. Rawn, Biochemie, Pearson Studium,\r\nISBN: 978-3.8273-7312-0\r\naktuelle englische Artikel zu den Themen', 3, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Biochemie 1 und Modul Biochemie 2', 'lesen von englischen Veröffentlichungen', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an der Hausarbeit'),
(1, 84, '2015-01-19', 3, 'Freigegeben', 'MIBI2', 'Mikrobiologie 2', 'Microbiology 2', 'Wintersemester', '1 Semester', '["Vorlesung","Seminar"]', 30, 0, 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die spezielle Stoffwechselleistung der Mikroorganismen zu erklären\r\n- die Vielfalt der Stoffwechselwege der Mikroorganismen in Abhängigkeit des Lebensraumes zu identifizieren\r\n- komplexe und aktuelle Stoffwechselleistungen im Vortrag zu präsentieren', 'Spezielle mikrobiologische Stoffwechselwege:\r\nZellwand Biosynthese, Sporenbildung, Chemolithotropie, Anaerobe Atmung, spezielle aktuelle Kapitel des mikrobiellen Stoffwechsels', '["Vortrag"]', 'Deutsch', 'Folien zur Vorlesung\r\nTaschenlehrbuch Biologie Mikrobiologie, Hrsg. Katharina Munk, Thieme Verlag, ISBN:\r\n9783131448613\r\nG.Fuchs (Hrsg.) Allgemeine Mikrobiologie, Thieme Verlag, ISBN: 978-3-13-444608-1\r\nM.T.Madigan & J.M.Martinko, Brock Mikrobiologie, Pearson Studium, ISBN: 978-3-8273-7358-8\r\nJ.L.Slonczewski, J.W.Foster & K.M.Gillen, Microbiology, An Evolving Science, Norton, ISBN: 978-0-\r\n393-97857-5\r\nD.Nelson & M.Cox, Lehninger Biochemie, Spriger Verlag, ISBN: 3-540-41813-X\r\naktuelle englische Artikel zu den Themen', 3, '["Pr\\u00fcfungsleistung"]', 'keine', 'Fachliteratur in Englisch', 'Prof. Dr. Schmidt', NULL, 'Erfolgreicher Seminarvortrag', NULL);
INSERT INTO `Veranstaltung` (`modulbeauftragter`, `Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `KontaktzeitVL`, `KontaktzeitSonstige`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `VoraussetzungLP`, `VoraussetzungInhalte`, `SpracheSonstiges`, `Autor`, `PruefungsformSonstiges`, `PruefungsleistungSonstiges`, `StudienleistungSonstiges`) VALUES
(11, 85, '2015-01-15', 1, 'Freigegeben', 'ANDR', 'Mobile Anwendungen mit Android', 'Android Development', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden erwerben Kenntnisse über die Entwicklung mobiler Anwendungen mit dem Android Framework. \r\nSie können Anwendungen (APPs) ausgehend von Anforderungen konzipieren und unter Nutzung \r\ndes aktuellen Android SDK umsetzen. \r\nDie Studierenden lernen selbständig Aufgabenstellungen in einer Gruppe innerhalb vorgegebenen Rahmenbedingungen wie Funktionale Anforderungen und verfügbares Zeitbudget zu entwickeln. Sie sind in der Lage die notwendigen Werkzeuge und Techniken auszuwählen und einzusetzen. \r\nDie Studierenden vertiefen ihre Kenntnisse zu Softwareschnittstellen und Softwaretests', '- Konzepte und technische Grundlagen der Programmierung mobiler Endgeräte \r\n- Entwicklungsschritte mobiler Applikationen \r\n- Software Plattform Android \r\n- GUI-Programmierung für mobile Geräte \r\n- Persistenz und mobile Datenbanken \r\n- Software-Komponenten in Android \r\n- Threads, Server-Prozesse, Benachrichtigungen \r\n- Entwicklung von Anwendungen mit Ortsbezogenheit \r\n- Netzwerkprogrammierung für mobile Geräte \r\n- Mobiles Internet und seine Anwendungen \r\n- Sicherheit mobiler Anwendungen..', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung\r\n\r\nBücher mit Titel: \r\n- Fuchß T.: Mobile Computing - Grundlagen und Konzepte für mobile Anwendungen, Hanser, ISBN \r\n978-3-446-22976-1, 2009 \r\n- Mosemann H., Kose M.: Android, ISBN 978-3-446-41728-1, 2009 \r\n- Meier R.: Professional Android 2 Application Development, John Wiley & Sons, ISBN 978-\r\n0470565520, 2010 \r\n- Becker A., Pant M.: Android 2. Grundlagen der Programmierung, dpunkt Verlag, ISBN: 978-3-\r\n89864-677-2, 2010 \r\nKünneth T.: Android 3: Apps entwickeln mit dem Android SDK, Galileo Computing, ISBN: 978-\r\n3836216975, 2011 \r\nGarenta M.: Einführung in die Android-Entwicklung, O''Reilly, ISBN: 978-3868991147, 2011.', 6, '["Pr\\u00fcfungsleistung"]', 'Java Programmierkenntnisse, Grundkenntnisse Mensch-Maschine-Interaktion', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Vorstellung einer praktischen Aufgabenstellung (exemplarische Anwendung einer spezifischen Technologie anhand eines Beispiels/Dummy und Anfertigung einer schriftlichen Ausarbeitung zur Aufgabenstellung), alternativ: Modulklausur (90 Min.)', 'erfolgreiches Präsentation des Praxisprojekt und schriftliche Ausarbeitung', NULL),
(27, 86, '2015-01-17', 2, 'Freigegeben', 'GGEN', 'Grüne Gentechnik', 'Plant Biotechnology', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- Risiko-Evaluierung transgener Pflanzen zu debattieren\r\n- Anwendungsbereiche transgener Pflanzen herzuleiten\r\n- Transformationstechniken zu erklären\r\n- Lösungsvorschläge für die Anwendung transgener Pflanzen wissenschaftlich zu erarbeiten\r\n- epigenetische Regulationsvorgänge zu verstehen', 'Anbautechnischer und gesetzlicher HIntergrund der Produktion mit gentechnisch veränderten Pflanzen\r\nMorphologie und Systematik der Pflanzen\r\nPflanzenentwicklung\r\nGewebekultur als Werkzeug der Gentechnik\r\nTransformationstechniken (Agrobakterientransfer, Partikelbeschuss)\r\nDesign und Anaqlyse transgener Pflanzen\r\nPhytopathologie mit Schwerpunkt Etablierung rekombinanter Schaderreger-Resistenzen (Viren, Pilze, Bakterien, Insekten)\r\nPflanzenviren\r\nGrundlagen Epigenetics\r\nMolecular Farming', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung\r\n\r\nBücher-Empfehlung:\r\nPlant Biotechnology: The Genetic Manipulation of Plants, Slater, Scott and Fowler, Paperback: 372 pages, Publisher: Oxford University Press, USA; 2 edition (March 23, 2008), Language: English, ISBN-10: 0199282617\r\nPlant Biotechnology and Genetics: Principles, Techniques and Applications. C. Neal Stewart Jr.\r\nHardcover: 374 pages, Publisher: Wiley-Interscience (June 2, 2008), Language: English, ISBN-10:\r\n0470043814', 3, '["Pr\\u00fcfungsleistung"]', 'Grundkenntnisse Genetik und Molekularbiologie', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(26, 87, '2015-01-17', 2, 'Freigegeben', 'KLIF', 'Angewandte Klinische Forschung in der Biotechnologie', 'Clinical Research', 'Wintersemester', '2 Semester', '["Vorlesung"]', 60, 0, 120, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Grundlagen und Methoden der klinischen Forschung zur Zulassung von biotechnologischen\r\nProdukten und Medizinprodukten einzuordnen\r\n- den vollen Ablauf einer klinischen Erprobung zu verstehen\r\n- ein Verständnis für die praktische Herangehensweise an ein klinisches Forschungsprojekt zu\r\nentwickeln\r\n- den gegebenen gesetzlichen und ethischen Rahmen der Durchführung klinischer\r\nStudienprojekte am Menschen und die dafür notwendigen Dokumente und Voraussetzungen\r\naufzuzeigen\r\n- die Grundlagen der GMP anzuwenden\r\n- die gegebenen gesetzlichen und ethischen Rahmen der Herstellung von Arzneimitteln und\r\nMedizinprodukten einschließlich der dafür notwendigen Dokumente und Voraussetzungen\r\neinzuordnen', 'Grundlagen der klinischen Forschung\r\nrechtliche und ethische Rahmenbedingungen\r\nGCP (Gute Klinische Praxis)\r\nVerantwortlichkeiten im Rahmen klinischer Studien\r\nPraktische Studiendurchführung\r\nInhalte des Studienprotokolls\r\nInhalte der Prüfarztinformation\r\nEthikanträge und Behördenmeldungen\r\nMonitoring klinischer Prüfungen\r\nDatenmanagement\r\nBiometrie\r\nMethoden und Techniken der klinischen Forschung\r\nAnforderungen an QM-Systeme\r\nAufbau von QM-Systemen\r\nISO 13485\r\nISO 9001\r\nGrundlagen für die Herstellung von Arzneimitteln und Medizinprodukten\r\nBesondere Anforderungen an die Hygiene im GMP', '["Schriftliche Klausur"]', 'Deutsch', 'Gesetzliche Regelungen (Arzneimittelgesetz)\r\nISO 9001:2008\r\nISO 13485:2003\r\nGood Clinical Practice Guidlines Friedman/Furberg/Demets: Fundamentals of Cllinical Trials, Springer-Verlag 1998\r\nCleophas: Statistics Applied to Clinical Trials; Kluwer-Academic-Publishers\r\nGute Hygiene Praxis; Pharma Technologie Journal (2. Auflage), ISSN 0931-9700. Concept,\r\nHeidelberg', 6, '["Pr\\u00fcfungsleistung"]', 'keine', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(11, 88, '2015-01-15', 1, 'Freigegeben', 'AMOS', 'Autonome Mobile Systeme', 'Autonomous Mobile Systems', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden erwerben breite Kenntnisse über die Autonome Mobile Systeme und deren technische Realisierung.Besonders Aktoren, Sensoren Zustandsfilter, Lokalisierung und Kartierung stehen dabei im Mittelpunkt.', 'Sensoren: Grundlagen, Sensoren zur Positionsbestimmung, Sensoren zur \r\nUmgebungserfassung, Sensordatenverarbeitung \r\n‐	Aktoren/Aktuatoren, Kinematik, Inverse Kinematik, Arbeitsraum, \r\nKonfigurationsraum \r\n‐	Bayes Filter, Kalman Filter, Erweiterter Kalmanfilter, UKF \r\n‐		Scanmatching: Korrespondenzproblem, Bestimmung der Transformation: \r\nICP (Iterative closest point), Idc (Iterative Dual Correspondences),IMRP \r\n(IterativeMatching-Range-Points), MbIcp (Metric Based Iterative Closest \r\nPoints) \r\n‐.	Bildverarbeitung, Filter, Kantenextraktion, Harris Corner, Stereo, \r\nKalibrierung, SIFT \r\n‐	Lokalisation: Markov-Lokalisation. Monte Carlo-Lokalisation, Partikel Filter \r\n‐	Karten, Mapping, (Prob.) SLAM, Graph SLAM, Schleifenschluss \r\n‐	Robotik Kontrollarchitekturen: Lose gekoppelte Systeme, ROS \r\n‐	Planung und Exploration: Dijkstra, A*, Next-Best-View, Frontier based \r\nexploration, Path transform, Exploration Transform.', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung\r\n\r\nBücher mit Titel: \r\nPaul Besl and Neil McKay. A method for registration of 3-d \r\nshapes. IEEE Transaction on Pattern Analysis and Machine \r\nIntelligence, 14(2):239–256, 1992\r\nEdsger. W. Dijkstra. A note on two problems in connexion with \r\ngraphs. In Numerische Mathematik, volume 1, pages 269–271\r\nMathematisch Centrum, Amsterdam, The Netherlands, 1959\r\nGregory Dudek and Michael Jenkin. Computational principles of \r\nmobile robotics. Cambridge Univ. Press, 2000\r\nMiguel Angel Garc´ıa. Modelling built environments from large \r\nrange images using adaptive triangular meshes. 8th \r\nInternational Symposium on Intelligent Robotic Systems, \r\npages 23–29, jul 2000\r\nHéctor H. Gonzáles-Banos and Jean-Claude Latombe. Navigation \r\nstrategies for exploring indoor environments. The International \r\nJournal of Robotics Research, 2002', 6, '["Pr\\u00fcfungsleistung"]', 'Mathe 1 und 2', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(24, 89, '2015-01-17', 2, 'Freigegeben', 'GIPF', 'Giftige Inhaltsstoffe in Pflanzen', 'Toxic Ingredients in Plants', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- giftige Pflanzeninhaltsstoffe in chemische Stoffklassen einzuordnen\r\n- Anzucht, Vermehrung und Hauptinhaltsstoffe der Pflanzen zu beschreiben\r\n- die besprochenen Pflanzen geschichtlich und ethnologisch-medizinisch zuzuordnen\r\n- Symptome bei Vergiftungen mit Pflanzen zu identifizieren', 'Pflanzeninhaltsstoffe mit Giftwirkung klassifizieren\r\nGiftklassen\r\nWirkungsmechanismen bei Giften\r\nheimische Giftpflanzen\r\nEthnobotanik und Ethnomedizin\r\nAnzucht diverser Giftpflanzen, Extraktion einiger Inhaltsstoffe\r\nAufklärung von Wirkungsmechanismen', '["Schriftliche Klausur"]', 'Deutsch', 'Roth, Daunderer, Kormann, Gift-Pflanzen-Gifte; NIKOL Verlagsgesellschaft mbH & Co. KG\r\nHausen, Vieluf, Allergiepflanzen; NIKOL Verlagsgesellschaft mbH & Co. KG\r\nNeuwinger, African Ethnobotany; Chapman & Hall, ISBN 3-8261-0077-8', 3, '["Pr\\u00fcfungsleistung"]', 'Grundlagen der Chemie', NULL, 'Prof. Dr. Schmidt', 'werden am Anfang des Semesters festgelegt, in der Regel eine Klausur (90 min)', 'Bestandene Modulprüfung oder bestandene andere Prüfungsform', NULL),
(1, 90, '2015-01-19', 3, 'Freigegeben', 'BIOT1', 'Biotechnologie 1', 'Biotechnology 1', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- grundlegende Techniken biotechnologischer Verfahren zuzuordnen\r\n- Optimierungsmethoden von Verfahren aufzuzeigen\r\n- Methoden der Modellierung biotechnologischer Prozesse zu erklären\r\n- die Methoden der Zellimmobilisierung aufzuzeigen\r\n- Sicherheitsaspekte in Labor und Produktion anzuwenden\r\n- das GMP-Konzept (Good Manufacturing Practice) zu beschreiben\r\n- Kostenaspekte biotechnologischer Produktionen in Bezug zu setzen', 'Medienoptimierung\r\nProzessoptimierung\r\nModellbildung\r\nZell-Immobilisierung\r\nAufarbeitung\r\nQualitätskontrolle\r\nSicherheit und Auflagen\r\nDokumentation\r\nGMP\r\nKosten\r\nPraktikum zur Medienoptimierung', '["Schriftliche Klausur"]', 'Deutsch', 'Crueger, W.;Crueger,A.: Biotechnologie - Lehrbuch der angewandten Mikrobiologie; R.Oldenbourg\r\nChmiel, H.: Bioprozeßtechnik Bd I und II; G.Fischer Verlag\r\nClark, D.P., Pazdernik, N.J.; Molekulare Biotechnologie - Grundlagen und Anwendungen, Spektrum\r\nAkademischer Verlag', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Modul Mikrobiologie und Modul Biochemie 1', 'Literatur z.T. in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme am Praktikum'),
(6, 91, '2015-01-19', 2, 'Freigegeben', 'WIAP', 'Mobile Anwendungen für Microsoft Windows', 'Windows Phone Development', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden erwerben Kenntnisse über die Entwicklung mobiler Anwendungen für Windows \r\nGeräte. \r\nSie können Anwendungen (APPs) ausgehend von Anforderungen konzipieren und unter Nutzung \r\ndes aktuellen Visual Studio umsetzen. Insbesondere können Sie die Einsatzbereiche der verschiedenen von Microsoft bereitgestellten Werkzeuge, APIs und Plattformen einschätzen und selbständig entscheiden bei welcher Aufgabenstellung welche Technologien einzusetzen sind. \r\nDie Studierenden lernen selbständig Aufgabenstellungen in einer Gruppe innerhalb vorgegebenen Rahmenbedingungen zu entwickeln. \r\nDie Studierenden vertiefen ihre Kenntnisse zu Softwareschnittstellen und Softwaretests', '- Konzepte und technische Grundlagen der Programmierung von Microsoft Apps \r\n- Gegenüberstellung Windows- vs. Windows-Phone-Plattform \r\n   - Übersicht über die jeweiligen APIs, Sprachen und Einsatzszenarien \r\n- Software Visual Studio \r\n- Windows Phone Apps entwickeln für und mit: \r\n  - Windows Runtime \r\n   - .Net \r\n   - Native \r\n- Windows-Apps entwickeln für und mit: \r\n   - WindowsRT \r\n   - HTML&JavaScript \r\n   - XAML & C#/VB/C++ \r\n   - DirectX & C++ \r\n- Nutzung von Contracts: Search & Share \r\n- Daten-Persistenz und App-Life-Cycle \r\n-Einbinden von Devices und Sensoren \r\n- Test und Vertrieb von Apps', '["Schriftliche Klausur"]', 'Deutsch', 'Skript zur Vorlesung\r\n\r\nBücher mit Titel: \r\n- A. Whitechapel, S. McKenna: Windows Phone 8 Development Internals, Microsoft Press, 2012 \r\n- R. Ehlert, G. Woiwode, J. Debus: Windows Phone 8, Grundlagen und Praxis der App-Entwicklung, \r\ndpunkt.verlag, 2013 \r\n- L.Regnicoli, P. Pialorsi, R. Brunetti: Building Windows 8 Apps with Microsoft Visual C++, Microsoft \r\nPress 2013 \r\n- L.Regnicoli, P. Pialorsi, R. Brunetti: Building Windows 8 Apps with Microsoft Visual C# and Visual \r\nBasic, Microsoft Press 2013 \r\n- Kraig, Brockschmidt: Programming Windows 8 Apps with HTML, CSS and JavaScript, Microsoft \r\nPress2012', 6, '["Pr\\u00fcfungsleistung"]', 'Grundkenntnisse Mensch-Maschine-Interaktion', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Vorstellung einer praktischen Aufgabenstellung (exemplarische Anwendung einer spezifischen Technologie anhand eines Beispiels/Dummy und Anfertigung einer schriftlichen Ausarbeitung zur Aufgabenstellung), alternativ: Modulklausur (90 Min.)', 'erfolgreiche Vorstellung des Praxisprojekt und schriftliche Ausarbeitung', NULL),
(24, 92, '2015-01-17', 3, 'Freigegeben', 'PFAL1', 'Proteinfaltung 1', 'Protein folding 1', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- die Theorien physikalischer Strukturbestimmungsmethoden zu beschreiben und diese konkret zu bewerten\r\n- Faltungspfade zu diskutieren und die Folgerungen aus Fehlfaltungen von Proteinen einzuschätzen', 'Ableitung grundlegender Struktureigenschaften von Biopolymeren\r\nRöntgenstrukturanalyse\r\nNMR- und IR – Spektroskopie\r\nZelleigene Faltungshilfen\r\nFehlfaltungen und ihre medizinische Relevanz', '["Schriftliche Klausur"]', 'Deutsch', 'Aktuelle Publikationen des Fachgebietes', 3, '["Pr\\u00fcfungsleistung"]', 'Grundlagen der Chemie und Mathematik', NULL, 'Prof. Dr. Schmidt', 'werden am Anfang des Semesters festgelegt, in der Regel eine Klausur (90 min)', 'oder bestandene andere Prüfungsform', NULL),
(24, 93, '2015-01-17', 2, 'Freigegeben', 'PFAL2', 'Proteinfaltung 2', 'Protein folding 2', 'Sommersemester', '1 Semester', '["Vorlesung"]', 30, 0, 60, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- anhand der Grundlagen der Polymerchemie und des physikalischen Verhaltens von Proteinen in gelartigen Umgebungen durch Analogieschlüsse aus Aminosäurensequenzen Sekundärund Tertiärstrukturvorhersagen zu bewerten\r\n- die theoretischen Grundlagen bei der Betrachtung von Protein-Protein-Wechselwirkungen sowie die gängigen Verfahren und Werkzeuge der Molekülmechanik zur Strukturvorhersage bei Proteinen zu beschreiben und anzuwenden', 'Modellsysteme für Proteine\r\nTheoretische Ableitung von Strukturinformationen aus der Aminosäuresequenz\r\nProtein-Protein-Wechselwirkungen\r\nMolekülmechanik\r\nab initio und semiempirische Methoden zur Strukturvorhersage von Molekülen und Makromolekülen', '["Schriftliche Klausur"]', 'Deutsch', 'Aktuelle Publikationen des Fachgebietes', 3, '["Pr\\u00fcfungsleistung"]', 'Grundlagen der Chemie und Mathematik', NULL, 'Prof. Dr. Schmidt', 'werden am Anfang des Semesters festgelegt, in der Regel eine Klausur (90 min)', 'oder bestandene andere Prüfungsform', NULL),
(1, 94, '2015-01-19', 3, 'Freigegeben', 'PACE', 'Pharmazeutische Chemie', 'Pharmaceutical chemistry', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 15, 105, 25, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- Aufbau und Nomenklatur der organischen Chemie zu beschreiben\r\n- Grundlagen der Nomenklatur der optischen Isomerie einzuordnen\r\n- grundlegenden Begriffe der Pharmakologie zu erklären\r\n- Applikation,Resorption, Verteilung und Elimination von Arzneistoffen aufzuzeigen\r\n- die Abläufe der Biotransformation zu charakterisieren\r\n- Aufbau und Wirkungsweise von Rezeptoren zu erklären\r\n- die Problematik von Arzneimittelwechselwirkungen zu diskutieren\r\n- Grundlagen über die Wirkmechanismen im Nervensystem einzuordnen\r\n- Grundlagen im Bereich des Molecular Modeling anzuwenden', 'Einteilung der organischen Verbindungen und deren systematische Nomenklatur\r\nOptische Isomerie mit Beispielen für pharmazeutische Wirksubstanzen\r\nGrundbegriffe und Definitionen der Pharmakologie\r\nAufbau und typische Abläufe einer Pharmakokinetik\r\nAblauf und Besonderheiten der Pharmakodynamik\r\nRezeptorvermittelte und rezeptorunabhängige Arzneimitteleffekte\r\nUnerwünschte Arzneimittelwirkungen', '["Schriftliche Klausur"]', 'Deutsch', 'T. L. Brown, H. Eugene LeMay, Bruce E. Bursten "Chemie" Pearson Studium , neuste Auflage\r\nPaula Y. Bruice "Organische Chemie" Pearson Studium jeweils neuste Auflage\r\nE. Mutschler, G. Geisslinger, H.K. Kroemer, M. Schäfer-Körting "Arzneimittelwirkungen"\r\nWissenschaftliche Verlagsgesellschaft Stuttgart neuste Auflage', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Erweiterte Kenntnisse aus dem Bereich der organischen Chemie', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme am Praktikum'),
(4, 95, '2015-01-14', 1, 'Freigegeben', 'VSYS', 'Verteilte Systeme', 'Distributed Systems', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 24, 'Die Studenten haben Kenntnis spezifischer Probleme und zu erreichender Ziele bei der Integration von Anwendungen innerhalb eines Unternehmens und zwischen Unternehmen. Sie können fachliche und technische Herausforderungen bei der Systemintegration klassifizieren und kennen Lösungskonzepte, die sie auch anzuwenden beherrschen. Die Studenten kennen die verschiedenen Integrations-Patterns und deren direkte und indi-rekte Anwendung in Technologien und Lösungen. Sie beherrschen die verschiedenen Technologien zur Umsetzung in ihren Grundzügen.\r\nDie Studenten kennen die Charakteristika der wichtigsten Unternehmensarchitekturen für verteilte Anwendungen und derer spezifischen Vor- und Nachteile. Sie können Architekturen anhand dieser Kriterien bewerben.\r\nBei gegebener Aufgabenstellung/Szenario können die Studenten eine begründete Empfehlung für die Unternehmensarchitektur aussprechen zu können, inklusive eines Katalogs nutzbarer Technologien. Die Studenten beherrschen den praktischen Umgangs mit Technologien (Middleware) und Konzepten (Architekturen) zur Integration von verteilten Anwendungen anhand von kleinen Beispielen.', '- Verteilung, Synchronisation und Kooperation von Anwendungen und Diensten auf Systemebene\r\n- Integration-Patterns für Verteilte Systeme\r\n- Konzepte (Synchron, Asynchron, Proxy) und Middleware-Technologien (CORBA, EJB, Web Services, ESB, Messaging) zur Integration von Unternehmensanwendungen\r\n- Eigenschaften von Verteilten Systemen (Charakteristiken, Konsistenz, Replikation, Fault-Tolerance) und Ziele der Umsetzung (Loose Kopplung, Flexibilität, Orchestrierung und Choreography)\r\n- Aufgaben im Rahmen der Enterprise Integration Application\r\n- Systemarchitekturen und Technologien zur Umsetzung von Unternehmensarchitekturen (P2P, GRID, SOA, REST, CLOUD)', '["Schriftliche Klausur"]', 'Englisch', 'Vorlesungsskript zur Vorlesung,\r\nBücher:\r\nHohpe, Gregor; Woolf, Bobby. Enterprise Integration Patterns. Addison-Wesley Longman. Amsterdam. 2003.\r\nDunkel, Jürgen; Eberhart, Andreas; Fischer, Stefan; Kleiner, Carsten; Koschel, Arne. Sys-temarchitekturen für verteilte Anwendungen. Hanser Fachbuch. 2008.\r\nJosuttis, Nicolai. SOA in der Praxis: System-Design für verteilte Geschäftsprozesse. Dpunkt Verlag. 2008.\r\nTanenbaum, Andrew. Distributed Systems - Principles and Paradigms, 2nd edition. Pear-son Prentice Hall. 2007\r\nTilkov, Stefan. Rest und HTTP. dpunkt.verlag. Heidelberg. 2009', 6, '["Pr\\u00fcfungsleistung"]', 'Parallele Datenverarbeitung, Software Engineering', 'Übungen in Deutsch und Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(11, 96, '2015-01-06', 1, 'Freigegeben', 'SYSE', 'Architektur von Informationssystemen', 'Architecture of Information Systems', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', NULL, NULL, 120, 25, NULL, NULL, '["Schriftliche Klausur","Projektarbeit"]', 'Deutsch, einzelne Abschnitte in Englisch', NULL, 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Grundlagen Softwareengineering', NULL, 'Prof. Dr. Schmidt', NULL, NULL, NULL),
(8, 97, '2015-01-14', 1, 'Freigegeben', 'VEDA', 'Vertiefung Datenbanksysteme', 'Advanced Database Systems', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden kennen die Architektur und den Aufbau von Datenbanksystemen. Sie kennen physische Speicher- und Indexstrukturen. Sie verstehen die Problematik von Mehrbenutzersynchronisation, der Serialisierbarkeit auch bei langandauernden Transaktionen, sowie des Logging und Recovery. Sie können Datenbanken für OLTP und OLAP Applikationen entwerfen und entwickeln. Sie kennen neben dem relationalen Modell auch andere Modelle und Konzepte, bspw. aus dem Bereich objektorientierten Datenbanken sowie der der NoSQL Datenbanken.', '- Schichtenmodelle von Datenbanksystemen\r\n- Physische Speicherungsstrukturen\r\n- Verschiedene Indexstrukturen\r\n- Transaktionsverwaltung und erweiterte Transaktions-Konzepte\r\n- Synchronisation und Sperrverfahren\r\n- Serialisierbarkeit\r\n- Log-Dateien und Recovery\r\n- Datawarehouse und OLAP\r\n- Objektorientiertes und Objektrelationales Modell\r\n- Verteilte Datenbanken\r\n- Replikationstechniken\r\n- NoSQL Datenbanken', '["Schriftliche Klausur"]', 'Deutsch', '- Skript zur Vorlesung\r\n- Date, C.J.: „An Introduction to Database Systems“,McGraw-Hill\r\n- Garcia-Molina, H..: „Database Systems - The Complete Book, Pearson\r\n- Heuer, A: „Datenbanken - Konzepte und Sprachen“, Mitp-Verlag\r\n- Heuer, A: „Datenbanken: Implementierungstechniken“, Mitp-Verlag\r\n- Elmasri, A.: „Fundamentals of Database Systems“, “,Addison Wesley\r\n- Kemper, A.: „Datenbanksysteme“ , Oldenbourg\r\n- Kemper, H.G.: Business Intelligence - Grundlagen und praktische Anwendungen, Vie-weg+Teubner\r\n- Ramakrishnan, R.: „Database Management Systems“, 3. Auflage 2002, McGraw-Hill\r\n- Endlich, S. et al.: „NoSQL: Einstieg in die Welt nichtrelationaler Web 2.0 Datenbanken“, Hanser', 6, '["Pr\\u00fcfungsleistung"]', 'Grundlagen Datenbanksysteme, insbesondere relationale Datenbanken', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(5, 98, '2015-01-14', 1, 'Freigegeben', 'SYSA', 'Systemanalyse', 'System Analysis', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, 'Die Studierenden erwerben Kenntnisse über Methoden und Modelle der Systemanalyse. Sie können Systemanforderungen erfassen und Systemgrenzen bestimmen.\r\nDie Studierenden können Techniken und Methoden zur Systemanalyse zielorientiert auswählen und anwenden.', '- Systeme und Modelle\r\n- Vorgehen in der Systemanalyse\r\n- Modellierungssprachen, Methoden und Werkzeuge zur Systemanalyse (z.B. BPMN)\r\n- Prinzipien der Systemstrukturierung\r\n- Methoden zum Aufbau von Informationssystemen, z.B. serviceorientierte Ansätze.', '["Vortrag","Projektarbeit"]', 'Deutsch', '- Skript zur Vorlesung, Projektaufgabe\r\n- H. Krallmann, M. Schönherr, M. Trier: Systemanalyse im Unternehmen, Oldenbourg Verlag München Wien\r\n- Sophist Group, Rupp C.: Systemanalyse kompakt, Spektrum Akademischer Verlag\r\n- Th. Allweyer, BPMN 2.0 Business Process Model and Notation, Books on Demand GmbH, Norderstedt\r\n- D. Imboden, S. Koch; Systemanalyse, Einführung in die mathematische Modellierung', 6, '["Pr\\u00fcfungsleistung"]', 'Bachelor Informatik bzw. vergleichbarer Abschluss', NULL, 'Prof. Dr. Schmidt', NULL, 'erfolgreicher Vortrag und erfolgreiche Projektarbeit', NULL),
(12, 99, '2015-01-14', 1, 'Freigegeben', 'HÖMA', 'Höhere Mathematik', 'Higher mathematics for information systems', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 15, 105, 25, 'Die Studierenden kennen die grundlegenden Begriffe, Theoreme und Algorithmen der Algebra und Diskreten Mathematik, welche für das tiefergehende Verständnis verschiedener Gebiete\r\n- der theoretischen Informatik (wie Algorithmen, Datenstrukturen, Sprachen und Komplexitätstheorie) und\r\n- der angewandten Informatik (wie Kryptographie, Codierungstheorie und CAGD)\r\nbenötigt werden. Sie können diese Verfahren anwenden.', '- Relationen (Äquivalenz-, Ordnungs-, Kongruenzrelationen)\r\n- Gruppen, Ringe, Körper\r\n- Partielle geordnete Mengen und Verbände\r\n- Abzählende Kombinatorik\r\n- Graphen und Digraphen', '["Schriftliche Klausur"]', 'Deutsch', 'Literatur: Kapitel aus:\r\n- Fraleigh: A First Course in Abstract Algebra, ISBN-10: 0321156080\r\n- Witt: Algebraische Grundlagen der Informatik, ISBN-10: 3834801208\r\n- Wüstholz: Algebra, ISBN-10: 352807291\r\n- Aigner: Diskrete Mathematik, ISBN-10: 3834800848\r\n- Beutelspacher, Zschiegner: Diskrete Mathematik für Einsteiger, ISBN-10: 383481248X\r\n- Biggs: Discrete Mathematics, ISBN-10: 0198507178\r\n- Davey , Priestley: Introduction to Lattices and Order, 2nd Ed., ISBN-10: 0521784514', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'Englisch bei Bedarf, Tafelanschrieb in Englisch (Deutsch bei Bedarf)', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(12, 100, '2015-01-14', 1, 'Freigegeben', 'KRYP', 'Kryptologie', 'Cryptology', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 15, 120, 25, 'Die Studierenden kennen ausgewählte historische und moderne Verschlüsselungs- und Signaturverfahren und verstehen deren Stärken und Schwächen in Hinblick auf die Sicherheitsziele: Vertraulichkeit, Integrität, Authentizität und Verbindlichkeit.\r\nDie Studierenden kennen die mathematischen Grundlagen moderner Verschlüsselungsverfahren, ihr Sicherheitsniveau sowie elementare kryptoanalytische Techniken. Sie können die sachgemäße Anwendung der Verfahren in verschiedenen Kontexten abschätzen.', 'Elementare algorithmische Zahlentheorie: Rechnen in Restklassenringen und endlichen Körpern, Primzahlerzeugung, –test und –zerlegung, diskreter Logarithmus\r\n- Klassische Chiffren, affin lineare Chiffren, Hashfunktionen, Stromchiffren, Blockchiffren, Feistelchiffren, DES, AES\r\n- Public-Key Verschlüsselung: Diffie-Hellman, ElGamal, RSA, elliptische Kurven', '["Schriftliche Klausur"]', 'Deutsch', '- Buchmann: Einführung in die Kryptographie, 5. Auflage, ISBN 3642111858\r\n- Hoffstein, Pipfer, Silverman: An Introduction to Mathematical Cryptography, ISBN 1441926747\r\n- Ertel: Angewandte Kryptographie, 3. Auflage, ISBN 344641195X\r\n- CrypTool – Lernsoftware (http://www.cryptool.org).', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'Englisch bei Bedarf, Tafelanschrieb in Englisch (Deutsch bei Bedarf)', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'che Teilnahme an den Übungen'),
(6, 101, '2015-01-14', 1, 'Freigegeben', 'ELEA', 'E-Learning', 'E-Learning', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, 'Kenntnis der verschiedenen Nutzer und Rollen eines LM-Systems sowie deren Anforderungen an das LM-System. Fähigkeit zur Analyse der Anforderungen und Fähigkeit zur Abbildung der Anforderungen auf verschiedene Dienste und Schnittstellen. Verständnis des Zusammenspiels von mehreren Nutzungs-Gruppen und- Rollen in einem LM-System. Integration von Diensten und Basisfunktionalitäten zu Rollenspezifischen Nutzungsszenarien und entsprechenden Nutzungsschnittstellen. Beurteilung eines LM-Systems aus verschiedenen Sichten heraus: einerseits der Anwendersicht (z. B. als Kurs-Autor, der ein Kursfragment erstellt) und andererseits als System-Entwickler, der das LM-System funktional erweitert.', 'Vorgestellt werden die Aufgaben und das Zusammenspiel der verschiedenen Nutzer und Rollen eines Lern-Management-Systems (LM-Systems). Herausgearbeitet werden die Rollen der Lernenden, der Dozenten, der Tutoren, der Autoren und der Administratoren. Deren unterschiedliche Aufgaben werden betrachtet (beispielsweise die Kursmaterial-Verwaltung, die Benutzer-, Rechte- und Kostenverwaltung, das Einbindung externer Ressourcen, usw.). Die sich ergebenden Anforderungen an ein LM-System werden abgeleitet. Dienste und Schnittstellen von LM-Systemen werden betrachtet. Weiterhin werden die Charakteristiken verschiedener Lernformen, sowie Normen und Standards im Bereich von LM-Systeme (SCORM, Dublin-Core, LMO, …) vorgestellt. Der Lernmaterial-Lifecycle wird vermittelt. Das theoretische Wissen wird im Rahmen von zwei kleinen Teamphasen vertieft/umgesetzt.\r\nZum einen wird die prototypische Erstellung und Integration eines E-Learning-Kursfragmentes in ein LM-System durchgeführt. Hierbei werden Kursmaterialien geplant und erstellt. Diese werden modularisiert, mit Meta-Daten versehen und in ein LM-System integriert.\r\nWeiterhin wird die Entwicklung von LM-Systemen betrachtet. Hierzu wird entweder basierend auf einer Anforderungsanalyse einer bestimmten Nutzergruppe eine neu umzusetzende Funktionalität identifiziert und diese dann in ein LMS integriert oder es werden Vergleichende Analysen von bestehenden LMS vor genommen.', '[]', 'Deutsch', 'Vorlesungsskript zur Vorlesung. Bücher\r\n- A. Schreiber: CBT-Anwendungen professionell entwickeln, Springer Verlag Wien: Studien Verlag.\r\n- R. S. Schifman, G. Heinrich: Multimedia Projektmanagement, Springer Verlag\r\n- R. Schulmeister: Lernplattformen für das virtuelle Lernen. Evaluation und Didak-tik. ISBN: 3486272500. R. Oldenbourg Verlag: München u.a.\r\nP. Baumgartner et. al.: E-Learning Praxishandbuch: Auswahl von Lernplattformen. Marktübersicht - Funktionen - Fachbegriffe. Innsbruck-Wien: Studien Verlag', 6, '["Pr\\u00fcfungsleistung"]', 'Multimediale Grundkenntnisse', NULL, 'Prof. Dr. Schmidt', 'inkl. Dokumentation', 'Erfolgreiche Bearbeitung zweier benoteter Projektarbeiten', NULL),
(1, 102, '2015-01-14', 1, 'Freigegeben', 'DAMI', 'Data Mining', 'Data Mining', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung","Praxisprojekt"]', 30, 30, 120, 25, 'Ziel der Lehrveranstaltung ist es, die Studierenden in die Anwendungsszenarien des Data Mining einzuführen. Die Studierenden kennen und verstehen erfolgreiche Data-Mining-Anwendungen und die dabei verwendeten Methoden. Die Studierenden sind in der Lage, entsprechend einer Fragestellung geeignete Data-Mining-Methoden auszuwählen, zu implementieren und Datenanalysen durchzuführen.', 'Der Kurs umfasst folgende Themen\r\n- Theoretische Grundlagen des Data Mining und des Maschinellen Lernens\r\n- Beispielanwendungen aus der Biologie/Meidzin (z.B. Expressionsdaten, Diagnostik) und der Wirtschaft (z.B. Email-Filter, Internetversteigerungen, Preisentwicklung)\r\n- Datenauswahl, Datenvorverarbeitung\r\n- Implementierungswerkzeuge\r\n- Valididerung und Verifizierung der Ergebnisse\r\n- Wissensrepräsentation und Interpretation\r\n- Anwendungs-Szenarien: Regelextraktion, Clusteranalyse, Klassifizierung, Regression', '["M\\u00fcndliche Pr\\u00fcfung"]', 'Englisch', 'Präsentationsfolien zur Vorlesung\r\nRichard O. Duda; Peter E. Hart; David G. Stork (2000) Pattern Classification, Wiley-Interscience\r\nMichael R. Berthold (Editor); David J. Hand (Editor) (2003) Intelligent Data Analysis, Springer-Verlag\r\nJürgen Paetz (2006) Soft Computing in der Bioinformatik, Springer-Verlag\r\nP.-N. Tan, M. Steinbach, V. Kumar (2006) Introduction to Data Mining, Addison-Wesley\r\nM.F. Hornick, E. Marcade, S. Venkayala (2006) Java Data Mining: Strategy, Standard, and Practice: A Practi-cal Guide for architecture, design, and implementation, Morgan Kaufmann\r\nI. H. Witten, E. Frank: Data Mining, Morgan Kaufmann Publishers, 2000.\r\nD.M. Dziuda: Data Mining for Genomics and Proteomics, Wiley, 2010\r\nSoftware WEKA (http://www.cs.waikato.ac.nz/ml/weka/), RapidMiner (http://rapid-i.com/) und Statistische Programmiersprache R (http://www.r-project.org/)\r\nData Mining Cup (http://www.data-mining-cup.de/)', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', NULL, 'Prof. Dr. Schmidt', NULL, 'englischsprachiger Vortrag', 'Praxisprojekt'),
(1, 103, '2015-01-14', 1, 'Freigegeben', 'AITL', 'Advanced IT in Life Sciences', 'Advanced IT in Life Sciences', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung","Praxisprojekt"]', 30, 30, 120, 25, 'Die Studierenden kennen aktuelle Methoden und einschlägige Fachliteratur der Bioinformatik. Die Studierenden sind in der Lage, aus einem breiten Repertoire von Methoden, Lösungsverfahren für biologische bzw. medizinische Fragestellungen anzuwenden, umzusetzen und zu bewerten. \r\nZiel der Lehrveranstaltung ist es, die Studierenden zu befähigen, fortgeschrittene Methoden kritisch zu analysieren.', 'Die Lehrinhalte werden jeweils nach dem aktuellen Stand der Forschung und Entwicklung zusammengestellt.\r\n\r\nBeispiele:\r\n- Extraktion komplexer Genotyp-Phänotyp-Beziehungen aus biomedizinischen Datenbanken\r\n- Simulation biomolekularer Systeme auf Rechner-Clustern\r\n- Analyse von DNA-Microarray Daten\r\n- Verarbeitung von Next-Generation-Sequencing-Daten\r\n- Konzeption einer Verarbeitungspipeline für biomedizinische Daten im Labor', '["M\\u00fcndliche Pr\\u00fcfung"]', 'Englisch', 'Präsentationsfolien zur Vorlesung\r\nFachartikel aus z.B. Zeitschriften aus der Reihe „PloS“ (Public Library of Science), insbes. PloS Computational Biology, BMC, insbes. BMC Bioinformatics, Bioinformatics\r\nW. J. Ewens, G. R. Grant: Statistical Methods in Bioinformatics, Springer, 2005\r\nD. Stekel: Microarray Bioinformatics, Cambridge, 2003\r\nD.M. Dziuda: Data Mining for Genomics and Proteomics, Wiley, 2010', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', NULL, 'Prof. Dr. Schmidt', NULL, 'englischsprachiger Vortrag', 'Praxisprojekt'),
(7, 104, '2015-01-14', 1, 'Freigegeben', 'GRAP', 'Grafische Systeme', 'Graphical Systems', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 10, '- Die Studierenden kennen aktuellste Entwicklungen im Bereich der interaktiven 3D-Computergrafik, z.B. aktuellste Algorithmen und Verfahren zur Entwicklung interaktiver 3D-Applikationen, aktuelle 3D Ein-/ Ausgabegeräte, aktuelle Interface-Technologien.\r\n- Die Studierenden sind in der Lage, eigenverantwortlich wissenschaftliche Recherche zu betreiben und sich benötigte technologische Grundlagen eigenständig zu erarbeiten.\r\n- Die Studierenden sind in der Lage, sich eigenverantwortlich in die Bedienung komplexer Software-API’s oder Softwarepakete einzuarbeiten.\r\n- Die Studierenden können Lösungen für komplexe grafische Fragestellungen systematisch erarbeiten sowie komplexe Systeme konzipieren und (möglicherweise in Gruppenarbeit) entwickeln.', '-Fortgeschrittene Verfahren, Algorithmen und Technologien in den Bereichen Computergraphik und Animation\r\n- Echtzeitgrafik\r\n- Verfahren im Bereich virtuelle und erweiterte Realität\r\n- grafische Darstellung im WWW\r\n- grafische Darstellung auf mobilen Systemen', '["M\\u00fcndliche Pr\\u00fcfung","Projektarbeit"]', 'Deutsch', 'Wird jeweils zu Beginn der Veranstaltung angegeben.', 6, '["Pr\\u00fcfungsleistung"]', 'Beherrschen einer Programmiersprache, Grundverständnis von Computergrafik.', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Projektarbeit und mündliche Prüfung, typischerweise in Form eines Vortrags', 'erfolgreiche Projektbearbeitung und zugehöriger Vortrag', NULL),
(7, 105, '2015-01-14', 1, 'Freigegeben', 'WIVI', 'Visualisierungssysteme', 'Visualization Systems', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 10, 'Die Studierenden können das Gebiet der wissenschaftlichen Visualisierung definieren und im Hinblick auf benachbarte Forschungsrichtungen einordnen und abgrenzen. Sie kennen grundlegende Visualisierungsparadigmen, den Visualisierungsprozess und die Visualisierungspipeline. Sie verfügen über Hintergrundwissen zur menschlichen Wahrnehmung und Informationsverarbeitung.\r\n\r\nDie Studierenden kennen gängige Methoden zur Daten- und Informationsvisualisierung, können diese im Hinblick auf Eigenschaften und Anwendungsfelder in der wissenschaftlichen Diskussion darstellen und charakterisieren, sowie die Verfahren beispielhaft anwenden. Sie sind in der Lage, selbstständig gegebene Problemstellungen zu analysieren und zu klassifizieren sowie geeignete Verfahren zur Visualisierung auszuwählen und anzuwenden.\r\n\r\nDie Studierenden können gängige Visualisierungssysteme nennen und gegeneinander abgrenzen. Sie können Software-Komponenten zur Visualisierung unter Verwendung eines Visualisierungs-Frameworks selbstständig entwickeln oder bestehende individuell anpassen.', 'Visualisierungsprozess und Visualisierungspipeline\r\n- Menschliche Wahrnehmung und Informationsverarbeitung\r\n- Grundlegende Visualisierungstechniken, Konzepte und Methoden\r\n- Visualisierung räumlicher Daten\r\n- Visualisierung multivariater Daten\r\n- Visualisierung von Bäumen, Graphen und Netzwerken\r\n- Text- und Dokumentenvisualisierung\r\n- Interaktionskonzepte und -Techniken\r\n- Vergleich und Evaluierung von Visualisierungstechniken\r\n- Systeme und Frameworks zur Visualisierung', '["M\\u00fcndliche Pr\\u00fcfung","Projektarbeit"]', 'Deutsch', 'M. Ward, G. Grinstein, D. Keim: Interactive Data Visualization, ISBN 1568814739\r\nW. Schroeder, K. Martin, B. Lorensen: The Visualization Toolkit. ISBN 193093419X\r\nH. Schumann, W. Müller: Visualisierung. ISBN 3-540-64944-1\r\nW. Schroeder, K. Martin, B. Lorensen: The Visualization Toolkit. ISBN 0-13-954694-4', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'mündliche Prüfung (Vortrag) oder Projektarbeit (wird zu Beginn der Veranstaltung festge-legt)', 'Erfolgreicher Vortrag (bestandene mündliche Prüfung) oder erfolgreiche Bearbeitung einer Projektaufgabe', NULL),
(3, 106, '2015-01-14', 1, 'Freigegeben', 'SIMU', 'Simulation', 'Simulation', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studierenden kennen die methodischen Grundlagen der Modellbildung und Simulation von Systemen aus diversen Anwendungsbereichen. Sie sind mit den wichtigsten Komponenten, der Arbeitsweise und dem Umgang mit einem Simulationssystem vertraut. Die Studierenden kennen die verschiedenen Methoden der Zeitführung. Sie sind in der Lage Simulationssprachen und -systeme zu verstehen und mit ihnen umzugehen. Darüber hinaus sind die Studierenden in der Lage für eine konkrete Problemstellung selbstständig ein Modell zu entwickeln, zu implementieren und Simulationen fachgerecht durchzuführen. Außerdem können Sie eigenständig Softwarekomponenten eines Simulationssystems entwickeln oder bestehende individuell anpassen.', '- Problemstellung der Modellierung und Simulation\r\n- Konzepte der Modellbildung\r\n- Kontinuierliche Modelle: Verfahren zur Gewinnung der Systemgleichungen in verschiedenen Anwendungsgebieten\r\n- Methoden der kontinuierlichen Simulation (numerische Verfahren zur Lösung der auftretenden Gleichungen)\r\n- Diskrete Modelle (Entscheidungsmodelle, Reihenfolgeprobleme, Ereignisse)\r\n- Methoden der diskreten Simulation (Petri-Netze, zellulare Automaten, Scheduling)\r\n- Simulationssysteme/Simulatoren (Vorstellung verschiedener Systeme und deren Verwendung)\r\n- Simulationssprachen\r\n- Analyse und Interpretation von Simulationsexperimenten\r\n- Validierung und Verifikation eines Simulationsmodells durch Implementation in einem Simulationssystem.', '["Schriftliche Klausur"]', 'Deutsch', 'J. Banks (ed.): Handbook of Simulation: Principles, Methodology, Advances, Applications, and Practice: Modelling, Estimation and Control. John Wiley & Sons, ISBN 978-0-471-13403-9\r\nJ. Banks, J. S. II Carson, B. L. Nelson, D. M. Nicol: Discrete-Event System Simulation. Pearson Education, ISBN 978-0-138-15037-2\r\nP. Bratley, B. L. Fox, L. E. Schrage: A Guide to Simulation. Springer, ISBN 978-0-387-96467-6\r\nT. T. Allen: Introduction to Discrete Event Simulation and Agent-based Modeling: Voting Systems, Health Care, Military, and Manufacturing. Springer, ISBN 978-0-857-29138-7\r\nA. M. Law: Simulation Modeling & Analysis. McGraw-Hill Professional, ISBN 978-0-071-25519-6', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(4, 107, '2015-01-14', 1, 'Freigegeben', 'WISE', 'Wissenschaftliches Seminar', 'Scientific Course', 'Sommersemester', '1 Semester', '["Seminar"]', 60, 0, 120, 25, 'Die Studenten können sich den aktuellen Stand der Wissenschaft für ein Spezialgebiet sowie die Inhalte einer aktuellen wissenschaftlichen Publikation selbstständig erarbeiten. Sie können aktuelle wissenschaftlicher Ergebnisse selbstständig aufbereiten und darauffolgend in englischer Sprache präsentieren. Die Studenten haben die Fähigkeit eine Einordung und Bewertung eines wissenschaftlichen Beitrags vorzunehmen und dessen Bedeutung für die Forschung und Anwendung differenziert zu unterscheiden.', '-aktuelle wissenschaftliche Publikationen aus allen Gebieten der Informatik, wie bspw. Datenbanktechnologien, IT-Sicherheit, Systemarchitekturen, Software-Engineering, Compilerbau, Betriebssysteme, Verschlüsselungstechnologien, Web-Technologien, Mobile-Systeme etc.', '["M\\u00fcndliche Pr\\u00fcfung"]', 'Deutsch', 'Proceedings zu wissenschaftlichen Konferenzen und Papern', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', '(englischer Vortrag, mind. 60 Minuten)', 'Bestandene mündliche Prüfung / geeignete Präsentation des wissenschaftlichen Papers', NULL),
(4, 108, '2015-01-19', 3, 'Freigegeben', 'PROM', 'Master Projekt', 'Master Project', 'Sommersemester', '1 Semester', '["Praxisprojekt"]', 30, 0, 150, 25, 'Fähigkeit zur Anwendung relevanter Methoden des Projektmanagements\r\nÜben von Moderationstätigkeiten\r\nKenntnis und Verständnis wesentlicher wissenschaftstheoretischer Konzepte sowie Überblick über projektrelevante wissenschaftliche Methoden\r\nReflexion grundlegender Aspekte der Projekt- und Berufstätigkei', 'Angeleitetes Erstellen einer kleineren wissenschaftlichen Arbeit deren Schwierigkeitsgrad der späteren Berufspraxis entspricht. Die Betreuung erfolgt durch eine Lehrperson.\r\nHierbei werden systematische Vorgehensweisen und sinnvolle Arbeitstechniken eingeübt sowie die Verbindung zu Anwendungsgebieten der Informatik hergestellt.\r\nDie konkreten Inhalte des Projektes ergeben sich aus der Aufgabenstellung', '["Vortrag","Hausarbeit"]', 'Deutsch', '-', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(4, 109, '2015-01-14', 1, 'Freigegeben', 'PROJM', 'Projektmanagement', 'Project Management', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 25, 'Die Studenten erwerben Fähigkeiten zur Planung und Leitung komplexer Projekte aus Wissenschaft, Industrie und Gesellschaft. Sie kennen die wesentlichen Vorgehensmodelle und Methoden, kennen deren spezifische Charakteristika und Anwendungsgebiete. Sie entwickeln die Fähigkeit Softwareentwicklungsprojekte eigenverantwortlich planen, organisieren und leiten zu können. Die Studenten können Machbarkeitsstudien, Ressourcenabschätzungen und Aufwandsschätzungen erstellen und Schlussfolgerungen daraus ziehen. Sie können Risiken und sicherheitsrelevante Bereiche für Projekte analysieren und bewerten. Die Studenten entwickeln Teamfähigkeit und die Fähigkeit Probleme selbständig zu lösen.', '- Komplexitätsbetrachtungen großer Softwaresysteme\r\n- Vorgehensmodelle der Softwareentwicklung (V-Modell, RUP, Extreme Programming, Scrum etc.)\r\n- Anwendung von Vorgehensmodellen und deren spezifische Eigenschaften,\r\n- Planungstechniken und Checklisten zur Projektplanung\r\n- Werkzeuge und Hilfsmittel zum Projektmanagement\r\n- Verfolgung von Anforderungen von der Analyse bis zur Umsetzung\r\n- Änderungs- und Konfigurationsmanagement\r\n- Zeitmanagement und Ressourcenmanagement\r\n- Standards zum Projektmanagement\r\n- Aufwandsschätzung (Function Point Analyse und andere)\r\n- Metriken basierte Prozesssteuerung und Kontrolle.', '["M\\u00fcndliche Pr\\u00fcfung"]', 'Deutsch', 'Höhn, Reinhard; Höppner, Stephan, Das V-Modell XT, Grundlagen, Methodik und Anwendungen, Springer, 2008\r\nWolf, Henning, Roock, Stefan, Lippert, Martin, eXtreme Programming: Eine Einführung mit Empfehlungen und Erfahrungen aus der Praxis, Dpunkt, 2005\r\nPichler, Roman, Scrum - Agiles Projektmanagement erfolgreich einsetzen, Dpunkt. 2007, ISBN10 3898644782\r\nVerstegen, Gerhard. Projektmanagement mit dem Rational Unified Process. Springer. Berlin. 2008.\r\nEbel, Nadin. PRINCE2:2009 - für Projektmanagement mit Methode. Addison-Wesley. München. 2011.\r\nA Guide to the Project Management Body of Knowledge. Project Management Institute. 2010.\r\nFunction Point Analyse\r\nPoensgen, Benjamin; Bock, Bertram. Die Function-Point-Analyse: Ein Praxishandbuch. dpunkt Verlag. 2005.\r\nHindel, Bernd; Hörmann, Klaus; Müller, Markus; Schmied, Jürgen. Basiswissen Software-Projektmanagement. dpunkt.verlag. 2006..', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Grundlagen des Projektmanagements', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Vortrag, mind. 60 Minuten, Deutsch oder Englisch', 'bspw. erfolgreiche Behandlung des Seminarthemas: wesentliche Inhalte, gute und korrekte Darstellung, neueste Entwicklungen/Erkenntnisse', 'bspw. Nachweis grundlegender Kenntnisse zum Projektmanagement, bspw. via Zertifikat'),
(32, 110, '2015-01-14', 1, 'Freigegeben', 'EBUS', 'E-Business', 'E-Business', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, 'Die Studierenden kennen die Grundbegriffe des e-Business und können die dazu notwendigen Technologien einordnen. Sie kennen Anwendungsgebiete des e-Business und können den Nutzen elektronischer Geschäftsbeziehungen für Unternehmen bewerten.\r\nDie Studierenden sind mit den betrieblichen Problemstellungen des e-Business vertraut und können diese analysieren und bewerten. Sie kennen die Veränderungen und Veränderungsprozesse durch Informationstechnologie und können diese positiv für betriebliche Prozesse einsetzen.\r\nDie Studierenden kennen Konzepte und Modelle des e-Business und können diese auf konkrete Unternehmensbeispiele anwenden (Case Studies).', '- Einführung in e-Business\r\n- Grundlagen Internettechnologie und Internetökonomie\r\n- Einsatzbereiche (nach Funktionen) des e-Business\r\n- Ausgewählte Fallstudien (aus unterschiedlichen Bereichen)\r\n- Entwicklungstendenzen (z.B. Mobile Technologien)', '["M\\u00fcndliche Pr\\u00fcfung","Projektarbeit"]', 'Deutsch', 'Kollmann, T.: E-Business, Gabler\r\nPicot, A.; Reichwald, R.; Wigand: R.T.: Die grenzenlose Unternehmung, Gabler\r\nWirtz, B.: Electronic Business, Gabler\r\nApplegate, L; Austin, R.; McFarland, F. W.: Corporate Information Strategy and Management - Text and Cases, McGraw-Hill', 6, '["Pr\\u00fcfungsleistung"]', 'Bachelor Informatik bzw. vergleichbarer Abschluss', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Projektarbeit und mündliche Prüfung (Vortrag zur Projektarbeit)', 'erfolgreicher Vortrag und erfolgreiche Projektarbeit', NULL);
INSERT INTO `Veranstaltung` (`modulbeauftragter`, `Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Status`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `KontaktzeitVL`, `KontaktzeitSonstige`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `Sprache`, `Literatur`, `Leistungspunkte`, `VoraussetzungLP`, `VoraussetzungInhalte`, `SpracheSonstiges`, `Autor`, `PruefungsformSonstiges`, `PruefungsleistungSonstiges`, `StudienleistungSonstiges`) VALUES
(33, 111, '2015-01-14', 1, 'Freigegeben', 'UCON', 'Unternehmensführung / Controlling', 'Business Management', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, 'Die Teilnehmer sollen die Voraussetzungen für nachhaltigen Unternehmenserfolg kennen, analysieren und beurteilen lernen. Dies umfasst die Entwicklungsschritte von der Vision zum Leitbild, den Einfluss von Unternehmenspolitik und Unternehmenskultur, die Herausbildung einer Corporate Identity und ihre Erneuerung in Change Prozessen und die Konzepte der Unternehmenssteuerung. Weiter werden die Studierenden ein Basisverständnis von Unternehmensstrategien entwickeln, zentrale Methoden zur strategischen Analyse und zur Strategieentwicklung kennen und anwenden lernen und Unternehmensprozesse der Strategieentwicklung und -implementierung verstehen.\r\nStudierende erleben den Bezugsrahmen wirtschaftlicher Entscheidungen und deren Bedeutung für das IT Management durch den Einsatz von kleinen Fallbeispielen, die zu präsentieren und diskutieren sind. Die Studierenden können Veränderungen am Markt durch geeignete Transformationen von Werteketten und Geschäftssystemen erkennen, analysieren und für die Unternehmensführung nutzen.', 'Einführung in das integrierte Managementmodell\r\n- Vision, Leitbild und Unternehmenspolitik\r\n- Unternehmensverfassung und Corporate Governance\r\n- Unternehmenskultur, Corporate Identity und Change Management\r\n- Konzepte der Unternehmenssteuerung\r\n- Grundlagen Unternehmensstrategien\r\n- Instrumente zur Strategischen Analyse\r\n- Instrumente zur Strategieentwicklung\r\n- Prozesse der Strategieentwicklung und Implementierung\r\n- Ausgewählte Probleme des operativen Managements)', '["Schriftliche Klausur"]', 'Deutsch', 'Bleicher, Knut: Das Konzept Integriertes Management, 5. revidierte und erweiterte Auflage, Ffm./N.Y\r\nStern, Joel M./John S. Shiely/Irwin Ross: Wertorientierte Unternehmensführung mit Added Value, Strategie, Umsetzung, Praxisbeispiele, München\r\nKühn, R.; Grünig, R: Grundlagen der strategischen Planung, Bern\r\nRobbins, S. Organisation der Unternehmung, Pearson; 9. Aufl. München\r\nBecker, J., Knackstedt, R., Pfeiffer, D.: Wertschöpfungsnetzwerke, Physica\r\nWeiber, R. (Hrsg.): Handbuch Electronic Business, Gabler\r\nMoore, G. A.: Dealing with Darwin, John Wiley & Sons', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(4, 112, '2015-01-19', 2, 'Freigegeben', 'BUET', 'Business-Etikette und Führungskompetenz', 'Business-Etikette und Führungskompetenz', 'wechselnd', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 0, 120, 25, 'Business-Etikette - Etiketteregeln und moderne Umgangsformen in verschiedenen Kommunikationssituationen beherrschen:\r\n- interkulturelle Besonderheiten in der Kommunikation kennen und bei beruflichen Kontakten mit Menschen aus verschiedenen Kulturen souverän auftreten können\r\n- Benimmregeln in der Rolle des Gastgebers und des Gastes im Unternehmen anwenden können\r\n- Regeln der Begrüßung, Vorstellung und Verabschiedung im beruflichen Miteinander anwenden können\r\n- geeignete Themen und Tabuthemen beim Smalltalk im Beruf kennen\r\n- Verhandlungen mit Kunden positiv und zielführend führen können\r\n- über Medien wie Telefon, Brief und E-Mail stilvoll Kontakt aufnehmen und positiv gestalten können\r\n- Geschäftsessen souverän absolvieren können\r\nFührungskompetenz\r\n- Rollen in Arbeitsteams, Gruppenstrukturen und Gruppenprozesse kennen\r\n- Führungsstile, Führungsaufgaben und Führungsmethoden kennen und anwenden können\r\n- Teamsitzungen leiten können\r\n- Mitarbeitergespräche führen können', 'Business-Etikette - Begriffe Etikette und moderne Umgangsformen\r\n- Souveränes Auftreten im globalen beruflichen Umfeld\r\n- Kontaktaufnahme und -gestaltung in ausgewählten Face-to-Face-Situationen\r\n- Kontaktaufnahme und -gestaltung über Medien wie Telefon, Brief und E-Mail\r\n- Geschäftsessen: Gutes Benehmen am Tisch\r\nFührungskompetenz\r\n- Rollen in Arbeitsteams\r\n- Gruppenstrukturen\r\n- Gruppenprozesse\r\n- Führungsstile, Führungsaufgaben und Führungsmethoden\r\n- Vorbereitung, Durchführung und Nachbereitung von Teambesprechungen\r\n- Konstruktive Mitarbeitergespräche', '["Schriftliche Klausur","M\\u00fcndliche Pr\\u00fcfung"]', 'Deutsch', 'Elisabeth Bonneau: Stilvoll zum Erfolg: Der moderne Business-Knigge, Hoffmann und Campe\r\nKai Oppel und Stephan Kilian: Business-Knigge international, Haufe-Lexware\r\nGerhard Meyer-Uhl und Elke Uhl-Vetter: Business-Etikette in Europa: Stilsicher auftreten, Umgangsformen beherrschen, Gabler\r\nGerhard Maletzke: Interkulturelle Kommunikation, Westdeutscher Verlag\r\nRoger Fisher, William Ury und Bruce Patton: Das Harvard-Konzept - Der Klassiker der Verhandlungstechnik, Campus\r\nHartmut Laufer: Grundlagen erfolgreicher Mitarbeiterführung: Führungspersönlichkeit - Führungsmethoden - Führungsinstrumente, Gabal-Verlag\r\nUwe Vigenschow, Björn Schneider und Ines Melrose: Soft Skills für IT-Führungskräfte und Projektleiter - Softwareentwickler führen und coachen, Hochleistungsteams aufbauen, dpunkt', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Grundkenntnisse beruflicher Kommunikationsregeln', NULL, 'Prof. Dr. Schmidt', 'Prüfungsform wird zu Beginn der Veranstaltung festgelegt', 'Modulklausur oder Vortrag', 'erfolgreiche Teil-nahme an Übungen'),
(4, 113, '2015-01-14', 1, 'Freigegeben', 'BPA', 'Geschäftsprozessautomatisierung', 'Business Process Automation', 'jedes Semester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 30, 15, 'Die Studierenden beherrschen die Modellierung von Geschäftsprozessen auf Basis der BPMN. Sie können Business Processes in Worflows überführen und dabei entsprechend detaillieren sowie technische Details ergänzen. Die Workflows können sie für die Automatisierung vorbereiten. Sie haben exemplarisch gelernt, Workflows in Unternehmensarchitekturen zu integrieren und innerhalb von Execution Engines zu automatisieren.', '- Vorgehen bei der Modellierung von Geschäftsprozessen\r\n- BPMN als Notation für die Modellierung von Geschäftsprozessen\r\n- Frameworks, Werkzeuge und Vorgehensmodelle zur Modellierung von Geschäftsprozessen\r\n- Technologien und Lösungsmuster für die Integration\r\n- Praxisbeispiel und eigene Anwendung anhand von ausgewählten Technologien und am Beispiel von Activiti\r\n- BPMN Kompensation (Effekte einer Aktionen ungeschehen machen) und Transaktion (zur Sicherstellung konsistenter Ergebnisse) in Activiti\r\n- Anforderungen und Umsetzungsmöglichkeiten von Prozessinformationssystemen', '["Projektarbeit"]', 'Englisch', 'Freund, Jakob; Rücker, Bernd, Praxishandbuch BPMN 2.0, Hanser Fachbuch, 2010\r\nAllweyer, Thomas, BPMN 2.0 - Business Process Model and Notation: Einführung in den Standard für die Geschäftsprozessmodellierung, Books on Demand, 2009\r\nLessen, Tammo van; Lübke, Daniel; Nitzsche, Jörg, Geschäftsprozesse automatisieren mit BPEL, Dpunkt Verlag, 2011\r\nEABPM. Business Process Management Common Body of Knowledge (CBOK), Schmidt Dr. Goetz Verlag, 2009', 3, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'Übungen und Praxis in Deutsch', 'Prof. Dr. Schmidt', 'Anwendung des BPM an echten Beispielen und Ausarbeitung/Dokumentation der Ergebnisse', 'Vorstellung des Praxisprojekts / mündliche Verteidigung', 'praktische Anwendung und Ausarbeitung'),
(4, 114, '2015-01-14', 1, 'Freigegeben', 'ERPT', 'ERP-Technologien', 'ERP-Technologies', 'Sommersemester', '1 Semester', '["Vorlesung","Praxisprojekt"]', 60, 0, 120, 15, 'Die Studenten haben den strukturellen Aufbau von ERP-Systemen und exemplarische Technologien erlernt, die in diesem Kontext zum Einsatz kommen. Sie haben das Modulkonzept und Prinzip des Customizings von Standardsoftware anhand von Beispielen nachvollzogen.\r\nAnhand von Beispielen aus Materialwirtschaft, Vertrieb und Supply Chain Execution wissen die Studierenden integrative Prozessketten aus der ERP Standardsoftware und das zugrundelie-\r\ngende betriebswirtschaftliche und technische Konzept. Sie haben die Umsetzung von geschäftlichen Anforderungen und Abläufen in Standardsoftware nachvollzogen.\r\nDie Studierenden beherrschen einzelne ERP-Technologien und können diese für die Entwicklung von mobilen ERP-Prozessen einsetzen. Sie haben ein erstes Verständnis zum Aufsetzen, Durchführen und Steuern von ERP-Arbeitspaketen erworben und wissen um die spezifischen Anforderungen in diesem Kontext.', 'Architektur von ERP-Systemen (am Beispiel von SAP)\r\n- Geschäftsprozesse und Workflows in SAP Supply Chain (MM, PP, SD, WM, Integration in FI/CO)\r\n- SAP NetWeaver und SAP ECC\r\n- Grundlagen der ABAP Programmierung\r\n- Web Dynpro für ABAP\r\n- Business Server Pages; insbesondere zur Entwicklung von SAP Web-Apps\r\n- Technologien zur Entwicklung von mobilen Anwendungen (ITSmobile, Mobisys Solution Builder kurz MSB)\r\n- Management und Durchführung von “SAP-Projekten”.', '["Projektarbeit"]', 'Englisch', '-', 6, '["Pr\\u00fcfungsleistung"]', 'Grundlagen Softwareengineering', 'Übungen und Praxis in Deutsch', 'Prof. Dr. Schmidt', 'Bearbeitung eines ERP-Projekts: Vorstellung der Ergebnisse (45-60 Minuten, Deutsch) und Abgabe der Dokumentation', 'Teilnahme an der Blockveranstaltung und erfolgreiche Bearbeitung des Technologie-Projekts (inkl. Präsentation + Dokumentation)', NULL),
(4, 115, '2015-01-19', 3, 'Freigegeben', 'ITSU', 'IT-Systeme in Unternehmen', 'IT Systems in Companies', 'Sommersemester', '1 Semester', '["Seminar"]', 45, 15, 120, 30, 'Die Studierenden kennen die in mittelständischen und großen Unternehmen eingesetzten Hard und Softwaresysteme: Sowohl die konzeptionellen Grundlagen als auch konkrete Realisierungen, Einsatz und Betriebsszenarien wie Cloud Computing oder SaaS sind ihnen thematisch vertraut. Sie kennen den Markt der vorgestellten, unternehmensrelevanten IT Komponenten sowie Entwicklungsrichtungen bei ausgesuchten Anbietern. Sie sind in der Lage, strategische IT Archi-tekturen weiter zu konkretisieren. Die für das IT Management relevanten Realisierungsmöglichkeiten sowie Risiken und unternehmenstypische Herausforderungen wie Datensicherheit und Datenschutz sind ihnen bekannt. Die Studierenden lernen, sich kritisch mit den Produkten unterschiedlicher Hersteller auseinander zusetzen und begründete Einsatzentscheidungen zu treffen. Bei der Präsentation von Ergebnissen vor Teams lernen die Studierenden den Umgang mit aufkommender Kritik und mit Konflikten innerhalb der Teams. \r\n\r\nSelbstmotivation/Selbststudium:\r\n- Heimarbeit/Übung (Breite): Nach einführender Vorstellung von Konzepten und Grundlagen ausgesuchter IT Komponenten arbeiten sich die Studierenden selbständig in konkrete Produkte unterschiedlicher Anbieter ein. Die Studierenden erfahren, inwieweit sich Anbieter an Standards halten, und gewinnen insbesondere einen Eindruck der Breite möglicher Realisierungen.\r\n\r\n- Heimarbeit/Übung (Tiefe): Bei ausgesuchten Konzepten arbeiten sich die Studierenden punktuell in Realisierungsdetails ein. Die Studierenden gewinnen einen Eindruck der fachlichen und technischen Tiefe möglicher Realisierungen.\r\n\r\n- Heimarbeit/Übung (Entwurf): Die Studierenden erarbeiten für ausgesuchte Aufgabenstellungen eine konkrete Architektur und bestimmen konkrete Produkte, die für einen Einsatz in Frage kommen. Die Studierenden lernen dabei, wie sie grundlegende und konzeptionelle Überlegungen und Planungen mit konkreten Produkten realisieren.', 'IT Komponenten und IT Architekturen\r\nTypische Einsatz- und Betriebsszenarien\r\nMarkt und Anbieter\r\nRisiken und Herausforderungen\r\n\r\nTypische Beispiele für Inhalte sind:\r\n- Rechenzentren mit Server- und Storage-Systemen; Cloud Computing; Green IT; Datensicherheit und Datenschutz\r\n- Applikationsserver; Skalierung und Kapazitätsplanungen;\r\n- Load Balancing; Ausfallsicherheit; Eigenentwicklungen\r\n- Identity und Access Management; Enterprise Directories Felder', '["Schriftliche Klausur"]', 'Deutsch', 'Literatur:\r\nMetzler-Andelberg; C.: Identity Management, dpunkt.verlag\r\nReese, G.: Cloud Application Architectures, O''Reilly\r\nTroppens, U.; Erkens, R.; Müller, W.: Speichernetze, dpunkt-verlag\r\nLampe, F.: Green-IT, Virtualisierung und Thin Clients, Vieweg + Teubner\r\n\r\nJeweils neueste Auflage', 6, '["Pr\\u00fcfungsleistung"]', 'Grundlagen Wirtschaftsinformatik; Grundlagen IT Technologien', 'Übungen und Praxis in Deutsch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(4, 116, '2015-01-19', 3, 'Freigegeben', 'ITRM', 'IT-Resource Management', 'IT-Resource Management', 'Sommersemester', '1 Semester', '["Seminar"]', 45, 15, 120, 30, 'Die Veranstaltung behandelt das Management wichtiger IT Ressourcen: Menschen, Informationen, Anwendungen und Infrastruktur. \r\nDie Studierenden lernen die Gestaltungsmöglichkeiten derBeschaffung dieser Ressourcen kennen (IT Sourcing). \r\nSie kennen rechtliche und vertragsrechtliche Grundlagen, können Anforderungen aufnehmen sowie kritisch hinterfragen und IT Spezifikationen erarbeiten. Sie können IT Beschaffungsvorhaben konzipieren, gestalten und durchführen. Die Ausgestaltung von Service Level Agreements ist ihnen geläufig und durch Sie anwendbar.\r\nIn diesem Modul wird das Management der wichtigen IT Ressourcen und auch deren Beschaffung („Sourcing“) behandelt. Dazu gehören die Schlüsselkompetenzen Verhandeln\r\nsowie juristische und vertragliche Aspekte zu formulieren, aber auch Teamfähigkeit, Kommunikation und Präsentation.\r\nDie Lehrveranstaltung wird in der Regel mit einem Competence Workshop verbunden. Studierende sind in die Konzeption, Vorbereitung, Organisation und Durchführung involviert; sie setzen sich intensiv mit geeigneten Themenbereichen innerhalb eines gegebenen Themenschwerpunkts wie z.B. IT Sourcing auseinander und wählen geeignete Unternehmen sowie entsprechende Referenten aus. Diese vermitteln in Impulsreferaten Studierenden praxisnahes Wissen. Die Studierenden haben die Möglichkeit, Referenten direkt zu befragen und ihr Wissen anwendungsorientiert zu vertiefen.\r\n\r\nSelbstmotivation/Selbststudium:\r\n- Heimarbeit/Übung (Breite): Die Wiederholung rechtlicher Grundlagen auf Basis ausgewählter Literatur führen die Studierenden selbständig durch.\r\n- Heimarbeit/Übung (Tiefe): Die Erstellung eines Pflichtenhefts insbesondere hinsichtlich der Spezifikation geeigneter Service Level Agreements üben die Studierenden im Rahmen einer\r\nkleineren Projektarbeit.', '- Ressourcen im Unternehmen / IT unterstütztes Management von Ressourcen\r\n- IT Vertragsrecht und Anforderungsmanagement\r\n- Service Level Agreements\r\n- IT Portfolio-Management\r\n- Investitions- und Lizenzmanagement\r\n- IT Sourcing-Modelle\r\n\r\nTypische Beispiele für Inhalte sind:\r\n- IT Vertragsrecht\r\n- Anforderungsmanagement\r\n- Service Level Agreements\r\n- IT Portfolio- und Lebenszyklusmanagement', '["Schriftliche Klausur"]', 'Deutsch', 'Zarnekow, R.: Produktionsmanagement von IT Dienstleistungen. Springer Verlag.\r\nJouanne-Diedrich, H.; Zarnekow, R.; Brenner, W.: Industrialisierung des IT Sourcings, in: HMD Praxis der Wirtschaftsinformatik 245, 2005, S. 18–27', 6, '["Pr\\u00fcfungsleistung"]', 'keine', 'Übungen und Praxis in Deutsch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(19, 117, '2015-01-14', 1, 'Freigegeben', 'KINT', 'Künstliche Intelligenz', 'Artificial Intelligence', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung","Praxisprojekt"]', 30, 8, 142, 30, 'Die Studierenden können vorwärtsgerichtete Netze aufbauen, ihre Architektur und Topologie festlegen, Trainingsdaten aufbereiten und ihre Ausgaben berechnen.\r\nSie können Verfahren zur Parameterreduktion auswählen und durchführen. Sie vergleichen Lernverfahren und bewerten die Qualität der Netze und der zugrundeliegenden Daten anhand statistischer Auswertungen. Sie analysieren trainierte Netze, auch bezgl. einer Verbesserung der Versuchsplanung.\r\nDie Studierenden nutzen Kohonen-Netze zur Lösung topologischer Optimierungsprobleme und zur Klassenbildung und analysieren dadurch die Daten. Sie nutzen die Klassenbildung zur Verbesserung der Lernfähigkeit vorwärts gerichteter Netze.\r\nSie verstehen die Arbeitsweise von Boltzmann-Maschinen und SVM (support vector machines) und können deren Kernfunktionen auswählen.\r\nSie erhalten einen Überblick über Anwendungsbereiche der verschiedenen Netztypen.\r\nDie Studierenden arbeiten sich in einem Projekt in existierende Software ein und erweitern diese. Sie trainieren Netze und analysieren die Ergebnisse, sie dokumentieren und präsentieren diese.', 'Netzmodelle: Schwellenwertelement, Perzeptron, vorwärtsgerichtete Netze, Hopfield-Netze, Boltzmann-Maschinen, Sensorische und motorische Karten, Support Vector Machines.\r\nLernverfahren: Hebbsches Lernen, Gradientenabstieg, Levenberg-Marquardt, "Alles dem Sieger"\r\nDatenvorbereitung: Transformation der Trainingsdaten, Hauptachsenanalyse, Dimensionsanalyse\r\nBeurteilung der Netze und Versuchsplanung\r\nAnwendungen: Klassifizierungen, Mustererkennung, Wegeoptimierung, Funktionsapproximation, Prozesskontrolle und -optimierung, Vorhersagen bei Zeitreihen\r\nAufbau, Training von Netzen, Bewertung eines Netztrainings; Erweiterung und Änderung der benutzten MatLab-Software', '["Projektarbeit"]', 'Deutsch', 'Skript in elektronischer Form\r\nNauck, D., F. Klawonn und R. Kruse: Neuronale Netze und Fuzzy-Systeme. Vieweg, Braunschweig, 1994. ISBN 3-528-05265-1\r\nRojas, R.: Neuronal Networks. Springer, New York, 1996. ISBN 3-540-60505-3\r\nShawe-Taylor, John and Nello Cristianini: An Introduction to Support Vector Machines and other kernl-based learning methods. Cambridge University Press, Cambridge, UK, 2000. ISBN 3-519-06444-8\r\nZupan, J. and J. Gasteiner: Neuronal Networks in Chemistry and Drug Design. Wiley VCH, Wein-heim, 1999. ISBN 3-527-29779-0', 6, '["Pr\\u00fcfungsleistung"]', 'Mathematik aus ingenieurwissenschaftlichem Bachelorstudiengang', 'Übungen und Praxis in Deutsch', 'Prof. Dr. Schmidt', 'Projekt mit Ausarbeitung und Vortrag', 'Bestandene Modulprüfung', NULL),
(4, 118, '2015-01-14', 1, 'Freigegeben', 'MAST', 'Masterarbeit mit Kolloquium', 'Master Thesis', 'jedes Semester', '1 Semester', '["Selbststudium und Konsultationen"]', 0, 0, 450, 1, 'Die Studenten werden befähigt ein komplexes Problem oder Aufgabenstellung aus Wissenschaft, Industrie oder Gesellschaft selbständig zu bearbeiten und zu lösen. Dabei sind sie in der Lage verschiedene Lösungsansätze beurteilen und bewerten zu können. Zur Aufgabenlösung wenden sie das während des Studiums erworbene fachliche und fachübergreifende Wissen an. Die Studenten planen und organisieren ihre wissenschaftliche Arbeit selbständig. Wissenschaftliche Informationsquellen können analysiert und ausge-wertet werden. Die Ergebnisse werden in der Masterarbeit wissenschaftlich exakt formuliert und dargestellt. Im Rahmen des Kolloquiums präsentieren die Studenten ihre Vorgehensweise, Methoden und Ergebnisse zusammenhängend und logisch.', 'Die Masterarbeit wird entweder an der Hochschule oder bei bzw. in Zusammenarbeit mit einem Unternehmen / einer Institution erstellt.\r\nDer Hochschullehrer fungiert als Betreuer. Er unterstützt die Studierenden im persönlichen Gespräch hinsichtlich der Einhaltung der o.g. Lern- und Qualifikationsziele.\r\nJe nach Aufgabenstellung können auch mehrere Studierende am gleichen Projekt jedoch jeder für sich eigenständig arbeiten.', '["Vortrag","Schriftliche Ausarbeitung"]', 'Deutsch', 'Mustermasterarbeiten und -vorträge für das Kolloquium sowie eine Liste empfehlenswerter Grundlagenliteratur werden im Internet bereitgestellt', 15, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'benotete Masterarbeit und Vortrag (Kolloquium zur Masterarbeit, max. 30 Minuten, Deutsch oder Englisch)', 'Erfolgreiche Masterarbeit', 'Master-Kolloquium/Vortrag)'),
(7, 119, '2015-01-15', 1, 'Freigegeben', 'WEMU', 'Web and Mobile Usability', 'Web and Mobile Usability', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 30, 25, '- Kenntnis spezifischer Problem und zu erreichender Ziele bei der Integration von Systemen\r\n- Kenntnis und Fähigkeit zur Anwendung verschiedener Integrations-Pattern und deren direkter und indirekter Anwendung in Technologien und Lösungen.\r\n- Kenntnis der wichtigsten Technologien und Architekturen für verteilte Anwendungen mit mobilen\r\nEndgeräten und derer spezifischen Vor- und Nachteile.\r\n- Fähigkeit, bei gegebener Aufgabenstellung/Szenario eine begründete Empfehlung für die technologische\r\nArchitektur aussprechen zu können, inklusive eines qualifizierten Katalogs nutzbarer\r\nFrameworks\r\n- Erlernen des praktischen Umgangs mit Technologien (Middleware) und Konzepten (Architekturen)zur Integration von verteilten Anwendungen und Integration von mobilen Endgeräten anhand von kleinen Beispielen', 'Die Vorlesung befasst sich mit folgenden Themen:\r\n- Usability: Begriffe / Definitionen, warum Usability\r\n- Der Benutzer\r\n- Benutzerverhalten im Web\r\n- Benutzeranforderungen\r\n- Unterschiede bei mobiler Nutzung\r\n- Strukturierung von Web-Sites: Informations-Architektur\r\n- Informationsarchitektur: Motivation, Begriffe\r\n- Organisationssysteme, Bezeichnungs-Systeme, Navigationssysteme, Suchsysteme\r\n- Mobile Usability: Strategien für mobile Websites und -Apps\r\n- Besonderheiten und Probleme bei der Nutzung mobiler Systeme\r\n- Umsetzung von Usability-Anforderungen für mobile Systeme\r\n- Responsive Web Design: Flexibles Design für mobile und stationäre Endgeräte\r\n- Usability Testing\r\n- Grundlagen und Methoden\r\n- Einführung in das Eye-Tracking für stationäre und mobile Endgeräte\r\n- Weitere Aspekte\r\n- E-Commerce Usability\r\n- Accessibility\r\n- Integration von Usability-Betrachtungen in den Entwicklungsprozess: Web-Projektierung; Fahrplan zum Erstellen von Web-Auftritten und Web-Apps.', '["Schriftliche Klausur","Projektarbeit"]', 'Deutsch', '- Steve Krug: Don''t make me think: A common sense approach to Web Usability; New Riders, 3rd\r\nrevised edition (December 24, 2013),\r\n- Morville, Rosenfeld: Information Architecture for the World Wide Web: Designing Large-Scale Web\r\nSites; O''Reilly Media; 3 edition (November 27, 2006),\r\n- Florence Maurice: Mobile Webseiten: Strategien, Dos und Don’ts für Webentwickler. Von Responsive\r\nWebdesign über jQuery Mobile bis zu separaten mobilen Seiten; Carl Hanser Verlag GmbH &\r\nCo. KG (2012)\r\n- Responsive Webdesign: Anpassungsfähige Websites programmieren und gestalten; Galileo Computing;\r\n1. Auflage (12. Dezember 2013)\r\n- Sydik: Design Accessible Web Sites: 36 Keys to Creating Content for All Audiences and Plat-forms;\r\nPragmatic Bookshelf; 1st edition (November 5, 2007)\r\n- Jens Jacobsen: Website Konzeption; dpunkt.verlag GmbH;\r\n7. aktualisierte Auflage (27. November 2013).', 3, '["Pr\\u00fcfungsleistung"]', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Mündliche Prüfung oder Praxisprojekt. Das Praxisprojekt umfasst die Planung und Durchführung von Usability-Tests für mobile Geräte an einem konkreten Beispiel sowie das Erstellen eines Usability- Berichtes und Präsentation der Ergebnisse.', 'Die Bewertung erfolgt - je nach Verlauf des Kurses - auf Basis entweder einer mündlichen Abschlussprüfung oder der Resultate der Bearbeitung einer abschließenden praktischen Aufgabe', NULL),
(24, 120, '2015-01-19', 3, 'Freigegeben', 'INMA1', 'Mathematik', 'Mathematics', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 60, 60, 150, 30, 'Am Ende dieses Moduls sind die Studierenden in der Lage:\r\n- mathematische Grundkonzepte (Vektoroperationen, Gaußsches Eliminationsverfahren, Determinantenrechnung, Matrixalgebra, Interpolationsverfahren, Ableitung und Integration elementarer Funktionen einer und mehrerer unabhängiger Variablen sowie zusammengesetzter Ausdrücke) wiederzugeben und anzuwenden\r\n- komplexe naturwissenschaftliche Zusammenhänge mathematisch zu modellieren', 'Gleichungen, lineare Gleichungssysteme, Determinanten\r\nFolgen und Reihen\r\nGrundlagen der Gruppentheorie, Permutationsgruppen\r\nKomplexe Zahlen\r\nVektorräume, Matrixalgebra\r\nFunktionen, Interpolationsverfahren\r\nDifferenzialrechnung für Funktionen einer und mehrerer Variablen\r\nIntegralrechnung (Riemannsches Integral) für Funktionen einer und mehrerer Variablen', '["Schriftliche Klausur"]', 'Deutsch', 'Arens, Hettlich, Karpfinger, Kockelkorn, Lichtenegger, Stachel : Mathematik, Spektrum\r\nAkademischer Verlag, ISBN 978-3-8274-1758-9\r\nSwokowski, Olinick, Pence : Calculus, ISBN 0-534-93624-5\r\nMangoldt, Hans von ; Knopp, Konrad : Höhere Mathematik I bis IV, S. Hirzel Verlag,\r\nISBN 978-3777604749\r\nHeuser, H : Lehrbuch der Analysis Teil 1, Teubner Verlag, ISBN 978-3-8351-0131-9', 9, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Schulmathematik: Mengen, Zahlenbereiche, sicheres Umgehen mit Termumformungen,\r\nTrigonometrie', NULL, 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an den Übungen'),
(8, 121, '2015-01-16', 3, 'Freigegeben', 'WINF', 'Grundlagen Wirtschaftsinformatik', 'Foundations Business Informatics', 'Sommersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 30, 30, 120, 30, 'Die Studierenden sind in der Lage, die grundlegenden theoretischen und praktischen Aspekte der\r\nWirtschaftsinformatik wiederzugeben, zu erklären und zu erläutern.\r\nDie Studierenden sollen Anwendungsgebiete betrieblicher Informationssysteme in der Grundstruktur\r\nerfassen sowie grundlegende Kenntnisse über die Struktur, Funktionalität und Einsatzpotentiale von dezidierten operativen Systemen und von Management-Support-Systemen erwerben. Sie sollen dabei Zusammenhänge zwischen den Anwendungsgebieten der Wirtschaftsinformatik erkennen\r\nkönnen.\r\nDie Studierenden sollen grundlegende Aspekte des betrieblichen Managements von Informationsverarbeitung kennen und einordnen können.', '- Theoretische Grundlagen\r\n- Grundlagen und Klassen von Informationssystemen\r\n- Anwendungen im Unternehmen und unternehmensübergreifende Anwendungen\r\n- Planung, Realisierung und Einführung von betrieblichen Informationssystemen\r\n- Grundlegende Aspekte des Informationsmanagements\r\n- weitere Aspekte der Wirtschaftsinformatik', '["Schriftliche Klausur"]', 'Deutsch', '- Skript zur Vorlesung,\r\n- Mertens P, Bodendorf F., Grundzüge der Wirtschaftsinformatik, Springer\r\n- Schwarzer B., Krcmar H., Grundlagen betrieblicher Informationssysteme, Schäffer-Poeschel\r\n- Abts, D., Grundkurs Wirtschaftsinformatik: Eine kompakte und praxisorientierte Einführung, Vieweg+\r\nTeubner\r\n- Hansen H.R., Neumann G., Wirtschaftsinformatik 1 + 2, UTB Stuttgartl', 6, '["Pr\\u00fcfungsleistung"]', 'Programmieren 1, Datenbanksysteme', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(3, 140, '2015-01-17', 0, 'Freigegeben', 'PROG1', 'Programmieren 1', 'Programming 1', 'Wintersemester', '1 Semester', '["Vorlesung","\\u00dcbung"]', 45, 30, 105, 50, 'Die Studierenden verstehen den grundsätzlichen Ansatz und die Vorgehensweise der bjektorientierten Programmierung. Sie verstehen den Aufbau und die Wechselwirkung von Objekten und beherrschen die grundlegenden Programmiertechniken in Java. Sie sind in der Lage korrekten, lesbaren und wartbaren Code zu erzeugen und kennen einige grundlegende Klassen der Java-Bibliothek.', 'Einführung in die Programmiersprachen, prozedurale und objektorientierte Programmierung\r\nArithmetik und Variablen, primitive Datentypen, Wertebereiche\r\nKontrollstrukturen (Sequenz, Selektion, Iteration, Rekursion)\r\nKlassen, Referenztypen, Werte- und Referenzsemantik\r\nZeichen und Zeichenketten\r\nFelder\r\nGeneralisierung, Spezialisierung, Interfaces\r\nAssertions und Exceptions', '["Schriftliche Klausur"]', 'Deutsch', 'C. S. Horstmann, G. Cornell: Core Java, Volume I Fundamentals, 8th Edition, Prentice Hall 2008, ISBN 978-0-13235476-9\r\nC. Ullenboom: Java ist auch eine Insel - Programmieren mit der Java Standard Edition Version 6, 9. Auflage, Galileo Computing 2010, ISBN 978-3-83621506-0\r\nR. Schiedermeier: Programmieren mit Java. 2. Auflage, Pearson Studium 2010, ISBN 978-3-86894031-2\r\nG. Krüger, T. Stark: Handbuch der Java Programmierung Standard Edition Version 6, 6. Auflage, Addison-Wesley 2009, ISBN 978-3-82732874-8', 6, '["Pr\\u00fcfungsleistung","Studienleistung"]', 'Schulmathematik', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', 'erfolgreiche Teilnahme an Laborübungen'),
(51, 152, '2015-01-25', 0, 'Freigegeben', 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '{"Vorlesung":"Vorlesung","\\u00dcbung":"\\u00dcbung"}', 45, 30, 105, 25, 'Test', 'Test', '{"Schriftliche Klausur":"Schriftliche Klausur"}', 'Deutsch', 'Test', 6, '{"Pr\\u00fcfungsleistung":"Pr\\u00fcfungsleistung"}', 'keine', 'einzelne Abschnitte in Englisch', 'Test Test', 'Test', 'Bestandene Modulprüfung', NULL),
(8, 153, '2015-01-28', 16, 'Freigegeben', 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '{"Vorlesung":"Vorlesung","\\u00dcbung":"\\u00dcbung"}', 45, 30, 105, 25, 'Test', 'Test', '{"Schriftliche Klausur":"Schriftliche Klausur"}', 'Deutsch', 'Test', 6, '{"Pr\\u00fcfungsleistung":"Pr\\u00fcfungsleistung"}', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 'Bestandene Modulprüfung', 'Test'),
(51, 154, '2015-01-23', 37, 'Freigegeben', 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '{"Vorlesung":"Vorlesung","\\u00dcbung":"\\u00dcbung"}', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '{"Schriftliche Klausur":"Schriftliche Klausur"}', 'Deutsch', 'xcvbxcvb', 6, '{"Pr\\u00fcfungsleistung":"Pr\\u00fcfungsleistung"}', 'keine', 'einzelne Abschnitte in Englisch', 'Test Test', NULL, 'Bestandene Modulprüfung', NULL),
(8, 155, '2015-01-26', 0, 'Freigegeben', 'NDBS', 'Neue Datenbanksysteme', 'New Database Systems', 'wechselnd', '1 Semester', '{"Vorlesung":"Vorlesung","1":"Selbststudium und Konsultationen"}', 30, 30, 120, 25, 'NDBS ...', '...', '["Vortrag","Hausarbeit"]', 'Deutsch', '...', 6, '{"Pr\\u00fcfungsleistung":"Pr\\u00fcfungsleistung"}', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL),
(8, 156, '2015-02-01', 2, 'Freigegeben', 'TESTI', 'testikus', 'Englischer Titel', 'Sommersemester', '1 Wochen', '{"Vorlesung":"Vorlesung","\\u00dcbung":"\\u00dcbung"}', 30, 30, 120, 25, 'fhujsbfjk', 'mofdbjmopöm', '{"Schriftliche Klausur":"Schriftliche Klausur"}', 'Deutsch', 'fsgjfslgjpoö', 6, '{"Pr\\u00fcfungsleistung":"Pr\\u00fcfungsleistung"}', 'keine', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', NULL, 'Bestandene Modulprüfung', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `VeranstaltungHistory`
--

CREATE TABLE IF NOT EXISTS `VeranstaltungHistory` (
  `Modul_ID` int(11) NOT NULL,
  `Erstellungsdatum` date NOT NULL,
  `Versionsnummer` int(11) NOT NULL,
  `Kuerzel` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `NameEN` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Haeufigkeit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Dauer` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Lehrveranstaltungen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `KontaktzeitVL` int(11) NOT NULL,
  `KontaktzeitSonstige` int(11) NOT NULL,
  `Selbststudium` int(11) NOT NULL,
  `Gruppengroesse` int(11) NOT NULL,
  `Lernergebnisse` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Inhalte` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Pruefungsformen` longtext COLLATE utf8_unicode_ci NOT NULL,
  `PruefungsformSonstiges` longtext COLLATE utf8_unicode_ci,
  `Sprache` longtext COLLATE utf8_unicode_ci NOT NULL,
  `SpracheSonstiges` longtext COLLATE utf8_unicode_ci,
  `Autor` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Literatur` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Leistungspunkte` int(11) NOT NULL,
  `VoraussetzungLP` longtext COLLATE utf8_unicode_ci NOT NULL,
  `VoraussetzungInhalte` longtext COLLATE utf8_unicode_ci NOT NULL,
  `PruefungsleistungSonstiges` longtext COLLATE utf8_unicode_ci,
  `StudienleistungSonstiges` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Modul_ID`,`Versionsnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `VeranstaltungHistory`
--

INSERT INTO `VeranstaltungHistory` (`Modul_ID`, `Erstellungsdatum`, `Versionsnummer`, `Kuerzel`, `Name`, `NameEN`, `Haeufigkeit`, `Dauer`, `Lehrveranstaltungen`, `KontaktzeitVL`, `KontaktzeitSonstige`, `Selbststudium`, `Gruppengroesse`, `Lernergebnisse`, `Inhalte`, `Pruefungsformen`, `PruefungsformSonstiges`, `Sprache`, `SpracheSonstiges`, `Autor`, `Literatur`, `Leistungspunkte`, `VoraussetzungLP`, `VoraussetzungInhalte`, `PruefungsleistungSonstiges`, `StudienleistungSonstiges`) VALUES
(16, '2015-01-17', 2, 'BESY', 'Betriebssysteme', 'Operation Systems', 'Wintersemester', '1 Semester', '"[\\"Vorlesung\\",\\"\\\\u00dcbung\\"]"', 30, 30, 120, 70, 'Die Studierenden verstehen und kennen die Grundkonzepte und Aufgaben (Prozesse, Dateien, Speicherverwaltung) von Betriebssystemen in verschiedenen Betriebssystemen identifizieren und können diese handhaben.\r\nDen grundlegenden Aufbau von Betriebssystemen kennen. Verschiedene Arten von Betriebssystemen kennen sowie verschiedene Betriebssystemarchitekturen unterscheiden können. Wichtige Systemschnittstellen und deren Verwendung an einfachen Beispielen in Programmen kennent', 'Betriebssysteme:\r\n- Architektur, Aufgaben, Konzepte und Grundlagen von Betriebssystemen\r\n- Systemschnittstelle\r\n- Die Unix Shell\r\n- Betriebssystemarten\r\n- Prozess- und Betriebsmittelsteuerung\r\n- Synchronisationskonzepte\r\n- Interprozesskommunikation\r\n- Speicherverwaltung\r\n- Dateisysteme und Ein-/Ausgabe', '"[\\"Schriftliche Klausur\\"]"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', '- Skript zur Vorlesung\r\n- Peter Mandl, Grundkurs Betriebssysteme, Vieweg 2013, ISBN 978-3-8348-1897-3\r\n-Eduard Glatz, Betriebssysteme: Grundlagen, Konzepte, Systemprogrammierung, dpunkt verlag 2010, ISBN 978-3898646789\r\n- Andrew S. Tanenbaum: Modern Operating Systems, Prentice Hall International 2013, ISBN 978-12920257734', 6, '"[\\"Pr\\\\u00fcfungsleistung\\",\\"Studienleistung\\"]"', 'Schulmathematik', NULL, NULL),
(16, '2015-01-26', 3, 'BESY', 'Betriebssysteme', 'Operating Systems', 'Wintersemester', '1 Semester', '"[\\"Vorlesung\\",\\"\\\\u00dcbung\\"]"', 30, 30, 120, 70, 'Die Studierenden verstehen und kennen die Grundkonzepte und Aufgaben von Betriebssystemen (Prozesse, Dateien, Speicherverwaltung) und können diese in verschiedenen Betriebssystemen handhaben.\r\nDen grundlegenden Aufbau von Betriebssystemen kennen. Verschiedene Arten von Betriebssystemen kennen sowie verschiedene Betriebssystemarchitekturen unterscheiden können. Wichtige Systemschnittstellen und deren Verwendung an einfachen Beispielen in Programmen kennen. \r\nDie Studierenden beherrschen den Umgang mit der Unix/Linux Shell und sind in der Lage einfache Shell-Skripte zu erstellen', 'Betriebssysteme:\r\n- Architektur, Aufgaben, Konzepte und Grundlagen von Betriebssystemen\r\n- Systemschnittstelle\r\n- Die Unix Shell\r\n- Betriebssystemarten\r\n- Prozess- und Betriebsmittelsteuerung\r\n- Synchronisationskonzepte\r\n- Interprozesskommunikation\r\n- Speicherverwaltung\r\n- Dateisysteme und Ein-/Ausgabe', '"[\\"Schriftliche Klausur\\"]"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', '- Skript zur Vorlesung\r\n- Peter Mandl, Grundkurs Betriebssysteme, Vieweg 2013, ISBN 978-3-8348-1897-3\r\n-Eduard Glatz, Betriebssysteme: Grundlagen, Konzepte, Systemprogrammierung, dpunkt verlag 2010, ISBN 978-3898646789\r\n- Andrew S. Tanenbaum: Modern Operating Systems, Prentice Hall International 2013, ISBN 978-12920257734', 6, '"[\\"Pr\\\\u00fcfungsleistung\\",\\"Studienleistung\\"]"', 'Schulmathematik', NULL, NULL),
(16, '2015-01-26', 4, 'BESY', 'Betriebssysteme', 'Operating Systems', 'Wintersemester', '1 Semester', '"[\\"Vorlesung\\",\\"\\\\u00dcbung\\"]"', 45, 30, 105, 70, 'Die Studierenden verstehen und kennen die Grundkonzepte und Aufgaben von Betriebssystemen (Prozesse, Dateien, Speicherverwaltung) und können diese in verschiedenen Betriebssystemen handhaben.\r\nDen grundlegenden Aufbau von Betriebssystemen kennen. Verschiedene Arten von Betriebssystemen kennen sowie verschiedene Betriebssystemarchitekturen unterscheiden können. Wichtige Systemschnittstellen und deren Verwendung an einfachen Beispielen in Programmen kennen. \r\nDie Studierenden beherrschen den Umgang mit der Unix/Linux Shell und sind in der Lage einfache Shell-Skripte zu erstellen', 'Betriebssysteme:\r\n- Architektur, Aufgaben, Konzepte und Grundlagen von Betriebssystemen\r\n- Systemschnittstelle\r\n- Die Unix Shell\r\n- Betriebssystemarten\r\n- Prozess- und Betriebsmittelsteuerung\r\n- Synchronisationskonzepte\r\n- Interprozesskommunikation\r\n- Speicherverwaltung\r\n- Dateisysteme und Ein-/Ausgabe', '"[\\"Schriftliche Klausur\\"]"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', '- Skript zur Vorlesung\r\n- Peter Mandl, Grundkurs Betriebssysteme, Vieweg 2013, ISBN 978-3-8348-1897-3\r\n-Eduard Glatz, Betriebssysteme: Grundlagen, Konzepte, Systemprogrammierung, dpunkt verlag 2010, ISBN 978-3898646789\r\n- Andrew S. Tanenbaum: Modern Operating Systems, Prentice Hall International 2013, ISBN 978-12920257734', 6, '"[\\"Pr\\\\u00fcfungsleistung\\",\\"Studienleistung\\"]"', 'Schulmathematik', NULL, NULL),
(153, '2015-01-23', 0, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 1, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 2, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 3, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 4, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 5, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 6, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 7, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-23', 8, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-24', 9, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-24', 10, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-24', 11, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-24', 12, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-26', 13, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-26', 14, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(153, '2015-01-28', 15, 'TEST', 'Test Modul', 'TestTest', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'Test', 'Test', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', 'Test', 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'Test', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 0, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvb', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 1, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 2, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 3, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 4, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 5, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 6, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 7, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 8, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 9, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 10, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 11, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 12, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 13, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 14, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 15, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 16, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 17, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 18, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 19, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 20, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 21, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 22, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 23, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 24, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 25, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 26, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 27, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 28, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 29, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 30, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 31, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 32, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 33, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 34, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 35, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(154, '2015-01-23', 36, 'TEST1', 'xcvbxcbxcv', 'bxcvbxcvb', 'Sommersemester', '1 Semester', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 45, 30, 105, 25, 'xcvbxcvbyfgsdfgsdfg', 'xcbxcvb', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Test Test', 'xcvbxcvb', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(156, '2015-01-28', 0, 'TESTI', 'testikus', 'Englischer Titel', 'Sommersemester', '1 Wochen', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 30, 30, 120, 25, 'fhujsbfjk', 'mofdbjmopöm', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'fsgjfslgjpoö', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL),
(156, '2015-02-01', 1, 'TESTI', 'testikus', 'Englischer Titel', 'Sommersemester', '1 Wochen', '"{\\"Vorlesung\\":\\"Vorlesung\\",\\"\\\\u00dcbung\\":\\"\\\\u00dcbung\\"}"', 30, 30, 120, 25, 'fhujsbfjk', 'mofdbjmopöm', '"{\\"Schriftliche Klausur\\":\\"Schriftliche Klausur\\"}"', NULL, 'Deutsch', 'einzelne Abschnitte in Englisch', 'Prof. Dr. Schmidt', 'fsgjfslgjpoö', 6, '"{\\"Pr\\\\u00fcfungsleistung\\":\\"Pr\\\\u00fcfungsleistung\\"}"', 'keine', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `Vertiefung`
--

INSERT INTO `Vertiefung` (`studiengang`, `Vertiefung_ID`, `Name`) VALUES
(2, 2, 'Softwaretechnik'),
(2, 4, 'Unternehmens IT'),
(2, 5, 'Graphisch Interaktive Systeme');

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
(67, 55),
(153, 1),
(153, 3),
(153, 4);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Angebot`
--
ALTER TABLE `Angebot`
  ADD CONSTRAINT `FK_945ABEF64FBE0E43` FOREIGN KEY (`fachgebiet`) REFERENCES `Fachgebiet` (`Fachgebiets_ID`),
  ADD CONSTRAINT `FK_945ABEF69D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_945ABEF6BA290AAB` FOREIGN KEY (`studiengang`) REFERENCES `Studiengang` (`Studiengang_ID`);

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
  ADD CONSTRAINT `FK_F252DFB09D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_F252DFB0E28D2D8E` FOREIGN KEY (`vertiefung`) REFERENCES `Vertiefung` (`Vertiefung_ID`);

--
-- Constraints der Tabelle `Lehrende`
--
ALTER TABLE `Lehrende`
  ADD CONSTRAINT `FK_D7D38F7E9D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_D7D38F7EDF4DB64C` FOREIGN KEY (`dozent`) REFERENCES `Dozent` (`Dozenten_ID`);

--
-- Constraints der Tabelle `Modulhandbuch`
--
ALTER TABLE `Modulhandbuch`
  ADD CONSTRAINT `FK_5B069A3DA4DC89DA` FOREIGN KEY (`gehoertZu`) REFERENCES `Studiengang` (`Studiengang_ID`),
  ADD CONSTRAINT `FK_5B069A3DD1399647` FOREIGN KEY (`gueltigAb`) REFERENCES `Semester` (`Semester`);

--
-- Constraints der Tabelle `ModulhandbuchZuweisung`
--
ALTER TABLE `ModulhandbuchZuweisung`
  ADD CONSTRAINT `FK_67AE706B5BE7876A` FOREIGN KEY (`angebot`) REFERENCES `Angebot` (`Angebots_ID`),
  ADD CONSTRAINT `FK_67AE706BB1D660BA` FOREIGN KEY (`mhb`) REFERENCES `Modulhandbuch` (`MHB_ID`);

--
-- Constraints der Tabelle `Semesterplan`
--
ALTER TABLE `Semesterplan`
  ADD CONSTRAINT `FK_3E93F4AE9D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_3E93F4AEDF4DB64C` FOREIGN KEY (`dozent`) REFERENCES `Dozent` (`Dozenten_ID`),
  ADD CONSTRAINT `FK_3E93F4AEF7388EED` FOREIGN KEY (`semester`) REFERENCES `Semester` (`Semester`);

--
-- Constraints der Tabelle `Studiengang`
--
ALTER TABLE `Studiengang`
  ADD CONSTRAINT `FK_3CB5857CC74EDF08` FOREIGN KEY (`sgl`) REFERENCES `Dozent` (`Dozenten_ID`);

--
-- Constraints der Tabelle `Studienplan`
--
ALTER TABLE `Studienplan`
  ADD CONSTRAINT `FK_7E7DD629D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_7E7DD62BA290AAB` FOREIGN KEY (`studiengang`) REFERENCES `Studiengang` (`Studiengang_ID`);

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
  ADD CONSTRAINT `FK_ACC54BBD9D576088` FOREIGN KEY (`modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_ACC54BBDBC4DD28F` FOREIGN KEY (`modulVoraussetzung`) REFERENCES `Veranstaltung` (`Modul_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
