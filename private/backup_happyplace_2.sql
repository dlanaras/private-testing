-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jan 2021 um 15:21
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `happyplace`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `apprentices`
--

CREATE TABLE `apprentices` (
  `id` int(11) NOT NULL,
  `prename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `markers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `apprentices`
--

INSERT INTO `apprentices` (`id`, `prename`, `lastname`, `place_id`, `markers_id`) VALUES
(3, 'Maurin', 'Genfer Maurin', 3, 3),
(24, 'Andrew', 'Longitude', 4, 4),
(25, 'Tobias', 'Bertschi', 5, 5),
(33, 'Dimitrios', 'Lanaras', 4, 4),
(34, 'test', 'test', 5, 5),
(35, 'maurin', 'maurin', 6, 6),
(36, 'tobi', 'tobi', 7, 7),
(37, 'biigtest', 'tes', 8, 8),
(38, 'biigtest', 'tes', 9, 9),
(39, 'as', 'as', 10, 10),
(41, 'Last', 'Test', 12, 12);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT '#FFFFFF',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `markers`
--

INSERT INTO `markers` (`id`, `icon`, `color`, `description`) VALUES
(1, NULL, '#FFFFFF', NULL),
(2, NULL, '#FFFFFF', NULL),
(3, NULL, '#FFFFFF', NULL),
(4, NULL, '#FFFFFF', NULL),
(5, NULL, '#FFFFFF', NULL),
(6, NULL, '#FFFFFF', NULL),
(7, NULL, '#FFFFFF', NULL),
(8, NULL, '#FFFFFF', NULL),
(9, NULL, '#FFFFFF', NULL),
(10, NULL, '#FFFFFF', NULL),
(11, NULL, '#FFFFFF', NULL),
(12, NULL, '#FFFFFF', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `places`
--

INSERT INTO `places` (`id`, `name`, `latitude`, `longitude`) VALUES
(1, 'Genf', '3', '3'),
(2, 'Jura', '6', '6'),
(3, 'Appenzell Innerrhoden', '9', '9'),
(4, 'tonhausen', '15.555555', '8.7777777'),
(5, 'Altdorf', '17', '17'),
(6, 'Staefa', ' 8.734937715047039', '47.24046324045664'),
(7, 'Stäfa', '47.24046324045664', '8.73099'),
(8, 'test', '10', '10'),
(9, 'testing', '12', '12'),
(10, 'as', '8', '19'),
(12, 'somewhere', '60', '60');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`) VALUES
(1, 'root', 'root');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `apprentices`
--
ALTER TABLE `apprentices`
  ADD PRIMARY KEY (`id`,`place_id`,`markers_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_apprentices_place_idx` (`place_id`),
  ADD KEY `fk_apprentices_markers1_idx` (`markers_id`);

--
-- Indizes für die Tabelle `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `icon_UNIQUE` (`icon`);

--
-- Indizes für die Tabelle `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `apprentices`
--
ALTER TABLE `apprentices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT für Tabelle `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `apprentices`
--
ALTER TABLE `apprentices`
  ADD CONSTRAINT `fk_apprentices_markers1` FOREIGN KEY (`markers_id`) REFERENCES `markers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apprentices_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
