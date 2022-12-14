-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 oct. 2021 à 20:52
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

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

-- --------------------------------------------------------

--
-- Structure de la table `bieres`
--

CREATE TABLE `bieres` (
  `ID` int(11) NOT NULL,
  `NomBie` varchar(25) NOT NULL,
  `BrasseriesID` int(11) DEFAULT NULL,
  `CatBieID` int(11) DEFAULT NULL,
  `StyBieID` int(11) DEFAULT NULL,
  `Alc` int(11) DEFAULT NULL,
  `IBU` int(11) DEFAULT NULL,
  `EBC` int(11) DEFAULT NULL,
  `PresentationBie` mediumtext DEFAULT NULL,
  `Ingredients` text DEFAULT 'Eau, Malt, Houblon, Levures.',
  `PhotoBie` varchar(255) DEFAULT NULL,
  `codeBarre` int(25) DEFAULT NULL,
  `ForBieID` int(11) DEFAULT NULL,
  `TypVerBieID` int(11) DEFAULT NULL,
  `DateCreaBie` year(4) DEFAULT NULL,
  `DateAjoutBie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bieresbrasseries`
--

CREATE TABLE `bieresbrasseries` (
  `BrasseriesID` int(11) NOT NULL,
  `BieresID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `brasseries`
--

CREATE TABLE `brasseries` (
  `IDBra` int(11) NOT NULL,
  `NomBra` varchar(25) NOT NULL,
  `typBraID` int(11) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `CPBraID` int(11) DEFAULT NULL,
  `PayBraID` int(11) DEFAULT NULL,
  `SiteWeb` text DEFAULT NULL,
  `Facebook` text DEFAULT NULL,
  `Instagram` text DEFAULT NULL,
  `DateCreaBra` datetime DEFAULT NULL,
  `Logo` text DEFAULT NULL,
  `PresentationBra` mediumtext DEFAULT NULL,
  `StaBraID` int(11) DEFAULT NULL,
  `DateAjoutBra` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categoriesbieres`
--

CREATE TABLE `categoriesbieres` (
  `IdCat` int(11) NOT NULL,
  `NomCat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `codepostal`
--

CREATE TABLE `codepostal` (
  `CP` int(11) NOT NULL,
  `Villes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formats`
--

CREATE TABLE `formats` (
  `IdFor` int(11) NOT NULL,
  `Formats` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formatsbieres`
--

CREATE TABLE `formatsbieres` (
  `BieForID` int(11) NOT NULL,
  `IDFor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `IdPay` int(11) NOT NULL,
  `Pays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `statutbrasseries`
--

CREATE TABLE `statutbrasseries` (
  `IdStatut` int(11) NOT NULL,
  `Statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stylesbieres`
--

CREATE TABLE `stylesbieres` (
  `IdSty` int(11) NOT NULL,
  `Style` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typebrasseries`
--

CREATE TABLE `typebrasseries` (
  `IdTyp` int(11) NOT NULL,
  `TypeBra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typeverres`
--

CREATE TABLE `typeverres` (
  `IdVerre` int(11) NOT NULL,
  `TypeVer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bieres`
--
ALTER TABLE `bieres`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DateAjoutBie` (`DateAjoutBie`),
  ADD KEY `CatBieID` (`CatBieID`),
  ADD KEY `StyBieID` (`StyBieID`),
  ADD KEY `TypVerBieID` (`TypVerBieID`),
  ADD KEY `ForBieID` (`ForBieID`),
  ADD KEY `BrasseriesID` (`BrasseriesID`);

--
-- Index pour la table `bieresbrasseries`
--
ALTER TABLE `bieresbrasseries`
  ADD PRIMARY KEY (`BrasseriesID`),
  ADD KEY `BieresID` (`BieresID`);

--
-- Index pour la table `brasseries`
--
ALTER TABLE `brasseries`
  ADD PRIMARY KEY (`IDBra`),
  ADD UNIQUE KEY `DateAjoutBra` (`DateAjoutBra`),
  ADD KEY `typBraID` (`typBraID`),
  ADD KEY `CPBraID` (`CPBraID`),
  ADD KEY `PayBraID` (`PayBraID`),
  ADD KEY `StaBraID` (`StaBraID`);

--
-- Index pour la table `categoriesbieres`
--
ALTER TABLE `categoriesbieres`
  ADD PRIMARY KEY (`IdCat`);

--
-- Index pour la table `codepostal`
--
ALTER TABLE `codepostal`
  ADD PRIMARY KEY (`CP`);

--
-- Index pour la table `formats`
--
ALTER TABLE `formats`
  ADD PRIMARY KEY (`IdFor`);

--
-- Index pour la table `formatsbieres`
--
ALTER TABLE `formatsbieres`
  ADD PRIMARY KEY (`BieForID`),
  ADD KEY `IDFor` (`IDFor`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`IdPay`);

--
-- Index pour la table `statutbrasseries`
--
ALTER TABLE `statutbrasseries`
  ADD PRIMARY KEY (`IdStatut`);

--
-- Index pour la table `stylesbieres`
--
ALTER TABLE `stylesbieres`
  ADD PRIMARY KEY (`IdSty`);

--
-- Index pour la table `typebrasseries`
--
ALTER TABLE `typebrasseries`
  ADD PRIMARY KEY (`IdTyp`);

--
-- Index pour la table `typeverres`
--
ALTER TABLE `typeverres`
  ADD PRIMARY KEY (`IdVerre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bieres`
--
ALTER TABLE `bieres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `brasseries`
--
ALTER TABLE `brasseries`
  MODIFY `IDBra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categoriesbieres`
--
ALTER TABLE `categoriesbieres`
  MODIFY `IdCat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formats`
--
ALTER TABLE `formats`
  MODIFY `IdFor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `IdPay` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statutbrasseries`
--
ALTER TABLE `statutbrasseries`
  MODIFY `IdStatut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stylesbieres`
--
ALTER TABLE `stylesbieres`
  MODIFY `IdSty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typebrasseries`
--
ALTER TABLE `typebrasseries`
  MODIFY `IdTyp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typeverres`
--
ALTER TABLE `typeverres`
  MODIFY `IdVerre` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bieres`
--
ALTER TABLE `bieres`
  ADD CONSTRAINT `bieres_ibfk_1` FOREIGN KEY (`CatBieID`) REFERENCES `categoriesbieres` (`IdCat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bieres_ibfk_2` FOREIGN KEY (`StyBieID`) REFERENCES `stylesbieres` (`IdSty`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bieres_ibfk_3` FOREIGN KEY (`TypVerBieID`) REFERENCES `typeverres` (`IdVerre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bieres_ibfk_4` FOREIGN KEY (`ForBieID`) REFERENCES `formatsbieres` (`BieForID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bieres_ibfk_5` FOREIGN KEY (`BrasseriesID`) REFERENCES `bieresbrasseries` (`BrasseriesID`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `bieresbrasseries`
--
ALTER TABLE `bieresbrasseries`
  ADD CONSTRAINT `bieresbrasseries_ibfk_1` FOREIGN KEY (`BieresID`) REFERENCES `brasseries` (`IDBra`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `brasseries`
--
ALTER TABLE `brasseries`
  ADD CONSTRAINT `brasseries_ibfk_1` FOREIGN KEY (`typBraID`) REFERENCES `typebrasseries` (`IdTyp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `brasseries_ibfk_2` FOREIGN KEY (`CPBraID`) REFERENCES `codepostal` (`CP`) ON UPDATE CASCADE,
  ADD CONSTRAINT `brasseries_ibfk_3` FOREIGN KEY (`PayBraID`) REFERENCES `pays` (`IdPay`) ON UPDATE CASCADE,
  ADD CONSTRAINT `brasseries_ibfk_4` FOREIGN KEY (`StaBraID`) REFERENCES `statutbrasseries` (`IdStatut`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `formatsbieres`
--
ALTER TABLE `formatsbieres`
  ADD CONSTRAINT `formatsbieres_ibfk_1` FOREIGN KEY (`IDFor`) REFERENCES `formats` (`IdFor`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
