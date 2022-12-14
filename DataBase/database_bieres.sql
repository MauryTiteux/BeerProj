-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 14 déc. 2022 à 18:18
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database_bieres`
--
CREATE DATABASE IF NOT EXISTS `database_bieres` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE `database_bieres`;

-- --------------------------------------------------------

--
-- Structure de la table `bieres`
--

DROP TABLE IF EXISTS `bieres`;
CREATE TABLE IF NOT EXISTS `bieres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NomBie` varchar(25) COLLATE latin1_general_cs NOT NULL,
  `BrasseriesID` int(11) DEFAULT NULL,
  `CatBieID` int(11) DEFAULT NULL,
  `StyBieID` int(11) DEFAULT NULL,
  `Alc` int(11) DEFAULT NULL,
  `IBU` int(11) DEFAULT NULL,
  `EBC` int(11) DEFAULT NULL,
  `PresentationBie` mediumtext COLLATE latin1_general_cs,
  `Ingredients` text COLLATE latin1_general_cs,
  `PhotoBie` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `codeBarre` int(25) DEFAULT NULL,
  `ForBieID` int(11) DEFAULT NULL,
  `TypVerBieID` int(11) DEFAULT NULL,
  `DateCreaBie` year(4) DEFAULT NULL,
  `DateAjoutBie` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DateAjoutBie` (`DateAjoutBie`),
  KEY `CatBieID` (`CatBieID`),
  KEY `StyBieID` (`StyBieID`),
  KEY `TypVerBieID` (`TypVerBieID`),
  KEY `ForBieID` (`ForBieID`),
  KEY `BrasseriesID` (`BrasseriesID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `bieresbrasseries`
--

DROP TABLE IF EXISTS `bieresbrasseries`;
CREATE TABLE IF NOT EXISTS `bieresbrasseries` (
  `BrasseriesID` int(11) NOT NULL,
  `BieresID` int(11) NOT NULL,
  PRIMARY KEY (`BrasseriesID`),
  KEY `BieresID` (`BieresID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `brasseries`
--

DROP TABLE IF EXISTS `brasseries`;
CREATE TABLE IF NOT EXISTS `brasseries` (
  `IDBra` int(11) NOT NULL AUTO_INCREMENT,
  `NomBra` varchar(25) COLLATE latin1_general_cs NOT NULL,
  `typBraID` int(11) DEFAULT NULL,
  `Adresse` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `CPBraID` int(11) DEFAULT NULL,
  `PayBraID` int(11) DEFAULT NULL,
  `SiteWeb` text COLLATE latin1_general_cs,
  `Facebook` text COLLATE latin1_general_cs,
  `Instagram` text COLLATE latin1_general_cs,
  `DateCreaBra` datetime DEFAULT NULL,
  `Logo` text COLLATE latin1_general_cs,
  `PresentationBra` mediumtext COLLATE latin1_general_cs,
  `StaBraID` int(11) DEFAULT NULL,
  `DateAjoutBra` datetime DEFAULT NULL,
  PRIMARY KEY (`IDBra`),
  UNIQUE KEY `DateAjoutBra` (`DateAjoutBra`),
  KEY `typBraID` (`typBraID`),
  KEY `CPBraID` (`CPBraID`),
  KEY `PayBraID` (`PayBraID`),
  KEY `StaBraID` (`StaBraID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `categoriesbieres`
--

DROP TABLE IF EXISTS `categoriesbieres`;
CREATE TABLE IF NOT EXISTS `categoriesbieres` (
  `IdCat` int(11) NOT NULL AUTO_INCREMENT,
  `NomCat` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`IdCat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `codepostal`
--

DROP TABLE IF EXISTS `codepostal`;
CREATE TABLE IF NOT EXISTS `codepostal` (
  `CP` int(11) NOT NULL,
  `Villes` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`CP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `formats`
--

DROP TABLE IF EXISTS `formats`;
CREATE TABLE IF NOT EXISTS `formats` (
  `IdFor` int(11) NOT NULL AUTO_INCREMENT,
  `Formats` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`IdFor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `formatsbieres`
--

DROP TABLE IF EXISTS `formatsbieres`;
CREATE TABLE IF NOT EXISTS `formatsbieres` (
  `BieForID` int(11) NOT NULL,
  `IDFor` int(11) NOT NULL,
  PRIMARY KEY (`BieForID`),
  KEY `IDFor` (`IDFor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `IdPay` int(11) NOT NULL AUTO_INCREMENT,
  `Pays` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`IdPay`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `statutbrasseries`
--

DROP TABLE IF EXISTS `statutbrasseries`;
CREATE TABLE IF NOT EXISTS `statutbrasseries` (
  `IdStatut` int(11) NOT NULL AUTO_INCREMENT,
  `Statut` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`IdStatut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `stylesbieres`
--

DROP TABLE IF EXISTS `stylesbieres`;
CREATE TABLE IF NOT EXISTS `stylesbieres` (
  `IdSty` int(11) NOT NULL AUTO_INCREMENT,
  `Style` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`IdSty`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `typebrasseries`
--

DROP TABLE IF EXISTS `typebrasseries`;
CREATE TABLE IF NOT EXISTS `typebrasseries` (
  `IdTyp` int(11) NOT NULL AUTO_INCREMENT,
  `TypeBra` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`IdTyp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `typeverres`
--

DROP TABLE IF EXISTS `typeverres`;
CREATE TABLE IF NOT EXISTS `typeverres` (
  `IdVerre` int(11) NOT NULL AUTO_INCREMENT,
  `TypeVer` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`IdVerre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtil` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(25) COLLATE latin1_general_cs DEFAULT NULL,
  `Mail` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `Mdp` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `RoleId` int(11) DEFAULT NULL,
  `Token` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUtil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurbieres`
--

DROP TABLE IF EXISTS `utilisateurbieres`;
CREATE TABLE IF NOT EXISTS `utilisateurbieres` (
  `IdUtil` int(11) NOT NULL AUTO_INCREMENT,
  `IdBieres` int(11) DEFAULT NULL,
  `NombresBue` int(6) DEFAULT NULL,
  `Note` int(2) DEFAULT NULL,
  `Commentaire` mediumtext COLLATE latin1_general_cs,
  `FirstDrink` time DEFAULT NULL,
  `LastDrink` time DEFAULT NULL,
  `Fav` binary(1) DEFAULT '0',
  PRIMARY KEY (`IdUtil`),
  KEY `IdBieres` (`IdBieres`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
