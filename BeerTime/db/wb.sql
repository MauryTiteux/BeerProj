-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.11-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour wb
DROP DATABASE IF EXISTS `wb`;
CREATE DATABASE IF NOT EXISTS `wb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `wb`;

-- Listage de la structure de table wb. bieres
DROP TABLE IF EXISTS `bieres`;
CREATE TABLE IF NOT EXISTS `bieres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NomBie` varchar(25) NOT NULL,
  `BrasseriesID` int(11) DEFAULT NULL,
  `CatBieID` int(11) DEFAULT NULL,
  `StyBieID` int(11) DEFAULT NULL,
  `Alc` int(11) DEFAULT NULL,
  `IBU` int(11) DEFAULT NULL,
  `EBC` int(11) DEFAULT NULL,
  `PresentationBie` mediumtext DEFAULT NULL,
  `Ingredients` text DEFAULT NULL,
  `PhotoBie` varchar(255) DEFAULT NULL,
  `codeBarre` int(25) DEFAULT NULL,
  `ForBieID` int(11) DEFAULT NULL,
  `TypVerBieID` int(11) DEFAULT NULL,
  `DateCreaBie` year(4) DEFAULT NULL,
  `DateAjoutBie` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  UNIQUE KEY `DateAjoutBie` (`DateAjoutBie`),
  KEY `CatBieID` (`CatBieID`),
  KEY `StyBieID` (`StyBieID`),
  KEY `TypVerBieID` (`TypVerBieID`),
  KEY `ForBieID` (`ForBieID`),
  KEY `BrasseriesID` (`BrasseriesID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table wb. utilisateur
DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(25) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Mdp` varchar(255) DEFAULT NULL,
  `RoleId` int(11) DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table wb. utilisateurbieres
DROP TABLE IF EXISTS `utilisateurbieres`;
CREATE TABLE IF NOT EXISTS `utilisateurbieres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdBieres` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `NombresBue` int(6) DEFAULT NULL,
  `Note` int(2) DEFAULT NULL,
  `Commentaire` mediumtext DEFAULT NULL,
  `FirstDrink` time DEFAULT NULL,
  `LastDrink` time DEFAULT NULL,
  `Fav` binary(1) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `IdBieres` (`IdBieres`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- Les données exportées n'étaient pas sélectionnées.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
