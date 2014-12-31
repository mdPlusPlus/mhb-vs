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
-- Tabellenstruktur für Tabelle `Semester`
--

CREATE TABLE IF NOT EXISTS `Semester` (
  `Semester` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Semester`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Tabellenstruktur für Tabelle `Studienplan`
--

CREATE TABLE IF NOT EXISTS `Studienplan` (
  `startsemester` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Studienplan_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RegelSemester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Modul` int(11) NOT NULL,
  `Studiengang` int(11) NOT NULL,
  PRIMARY KEY (`Studienplan_ID`),
  KEY `IDX_7E7DD6273B53343` (`startsemester`),
  KEY `IDX_7E7DD625C964F8C` (`Modul`),
  KEY `IDX_7E7DD623CB5857C` (`Studiengang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `FK_7E7DD623CB5857C` FOREIGN KEY (`Studiengang`) REFERENCES `Studiengang` (`Studiengang_ID`),
  ADD CONSTRAINT `FK_7E7DD625C964F8C` FOREIGN KEY (`Modul`) REFERENCES `Veranstaltung` (`Modul_ID`),
  ADD CONSTRAINT `FK_7E7DD6273B53343` FOREIGN KEY (`startsemester`) REFERENCES `Semester` (`Semester`);

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
