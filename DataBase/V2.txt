-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Bieres'
-- 
-- ---

DROP TABLE IF EXISTS `Bieres`;
		
CREATE TABLE `Bieres` (
  `id` INT NOT NULL AUTO_INCREMENT DEFAULT NotNull,
  `NomBie` VARCHAR NOT NULL DEFAULT 'NULL',
  `BrasserieID` INTEGER NOT NULL DEFAULT NULL,
  `CatBieID` INTEGER NULL DEFAULT NULL,
  `StyBieID` INTEGER NULL DEFAULT NULL,
  `Alc` INTEGER NOT NULL DEFAULT NULL,
  `IBU` INTEGER NULL DEFAULT NULL,
  `EBC` INTEGER NULL DEFAULT NULL,
  `PresentationBie` MEDIUMTEXT NULL DEFAULT NULL,
  `Ingredients` MEDIUMTEXT NULL DEFAULT NULL,
  `Photobie` VARCHAR NULL DEFAULT NULL,
  `Codebarre` INTEGER NULL DEFAULT NULL,
  `ForBieID` INTEGER NULL DEFAULT NULL,
  `TypVerBieID` INTEGER NULL DEFAULT NULL,
  `DatecreaBie` YEAR NULL DEFAULT NULL,
  `DateAjoutBie` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Brasseries'
-- 
-- ---

DROP TABLE IF EXISTS `Brasseries`;
		
CREATE TABLE `Brasseries` (
  `IDBra` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `NomBra` VARCHAR NOT NULL DEFAULT 'NULL',
  `TypBraID` INTEGER NULL DEFAULT NULL,
  `Adresse` VARCHAR NOT NULL DEFAULT 'NULL',
  `CPBraID` INTEGER NULL DEFAULT NULL,
  `PayBraID` INTEGER NULL DEFAULT NULL,
  `SiteWeb` VARCHAR NULL DEFAULT NULL,
  `Facebook` INTEGER NULL DEFAULT NULL,
  `Instagram` INTEGER NULL DEFAULT NULL,
  `DateCreaBra` YEAR NULL DEFAULT NULL,
  `Logo` VARCHAR NULL DEFAULT NULL,
  `PresentationBra` MEDIUMTEXT NULL DEFAULT NULL,
  `StaBraID` INTEGER NULL DEFAULT NULL,
  `DateAjoutBra` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`IDBra`)
);

-- ---
-- Table 'CodePostal'
-- 
-- ---

DROP TABLE IF EXISTS `CodePostal`;
		
CREATE TABLE `CodePostal` (
  `CP` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `Villes` VARCHAR NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`CP`)
);

-- ---
-- Table 'Pays'
-- 
-- ---

DROP TABLE IF EXISTS `Pays`;
		
CREATE TABLE `Pays` (
  `idPay` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `Pays` INTEGER NOT NULL DEFAULT NULL,
  PRIMARY KEY (`idPay`)
);

-- ---
-- Table 'TypeBrasseries'
-- 
-- ---

DROP TABLE IF EXISTS `TypeBrasseries`;
		
CREATE TABLE `TypeBrasseries` (
  `IDTyp` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `TypeBra` INTEGER NOT NULL DEFAULT NULL,
  PRIMARY KEY (`IDTyp`)
);

-- ---
-- Table 'CategoriesBieres'
-- 
-- ---

DROP TABLE IF EXISTS `CategoriesBieres`;
		
CREATE TABLE `CategoriesBieres` (
  `IDCat` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `NomCat` INTEGER NOT NULL DEFAULT NULL,
  PRIMARY KEY (`IDCat`)
);

-- ---
-- Table 'StylesBieres'
-- 
-- ---

DROP TABLE IF EXISTS `StylesBieres`;
		
CREATE TABLE `StylesBieres` (
  `IDSty` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `Style` INTEGER NOT NULL DEFAULT NULL,
  PRIMARY KEY (`IDSty`)
);

-- ---
-- Table 'Formats'
-- 
-- ---

DROP TABLE IF EXISTS `Formats`;
		
CREATE TABLE `Formats` (
  `IDFor` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `Formats` VARCHAR NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`IDFor`)
);

-- ---
-- Table 'TypeVerres'
-- 
-- ---

DROP TABLE IF EXISTS `TypeVerres`;
		
CREATE TABLE `TypeVerres` (
  `IDVerre` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `TypeVer` INTEGER NOT NULL DEFAULT NULL,
  PRIMARY KEY (`IDVerre`)
);

-- ---
-- Table 'StatutBrasserie'
-- 
-- ---

DROP TABLE IF EXISTS `StatutBrasserie`;
		
CREATE TABLE `StatutBrasserie` (
  `IDStatut` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `Statut` VARCHAR NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`IDStatut`)
);

-- ---
-- Table 'FormatsBieres'
-- 
-- ---

DROP TABLE IF EXISTS `FormatsBieres`;
		
CREATE TABLE `FormatsBieres` (
  `BieForID` INTEGER NULL DEFAULT NULL,
  `IDFor` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  PRIMARY KEY (`BieForID`)
);

-- ---
-- Table 'BieresBrasseries'
-- 
-- ---

DROP TABLE IF EXISTS `BieresBrasseries`;
		
CREATE TABLE `BieresBrasseries` (
  `BrasserieID` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `BieresID` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`BrasserieID`)
);

-- ---
-- Table 'Utilisateur'
-- 
-- ---

DROP TABLE IF EXISTS `Utilisateur`;
		
CREATE TABLE `Utilisateur` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `Pseudo` VARCHAR(25) NOT NULL DEFAULT 'NULL',
  `mail` VARCHAR NOT NULL DEFAULT 'NULL',
  `Mdp` VARCHAR NOT NULL DEFAULT 'NULL',
  `RoleId` VARCHAR NOT NULL DEFAULT 'NULL',
  `Token` INTEGER NOT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'UtilisateurBieres'
-- 
-- ---

DROP TABLE IF EXISTS `UtilisateurBieres`;
		
CREATE TABLE `UtilisateurBieres` (
  `idUtil` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `IdBieres` INTEGER NULL DEFAULT NULL,
  `NombresBue` INTEGER NULL DEFAULT NULL,
  `Note` INT NOT NULL DEFAULT NULL,
  `Commentaire` MEDIUMTEXT NOT NULL DEFAULT 'NULL',
  `FirstDrink` TIME NULL DEFAULT NULL,
  `LastDrink` TIME NULL DEFAULT NULL,
  `Fav` BINARY NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUtil`)
);

-- ---
-- Table 'Role'
-- 
-- ---

DROP TABLE IF EXISTS `Role`;
		
CREATE TABLE `Role` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `role` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `Bieres` ADD FOREIGN KEY (BrasserieID) REFERENCES `BieresBrasseries` (`BrasserieID`);
ALTER TABLE `Bieres` ADD FOREIGN KEY (CatBieID) REFERENCES `CategoriesBieres` (`IDCat`);
ALTER TABLE `Bieres` ADD FOREIGN KEY (StyBieID) REFERENCES `StylesBieres` (`IDSty`);
ALTER TABLE `Bieres` ADD FOREIGN KEY (ForBieID) REFERENCES `FormatsBieres` (`BieForID`);
ALTER TABLE `Bieres` ADD FOREIGN KEY (TypVerBieID) REFERENCES `TypeVerres` (`IDVerre`);
ALTER TABLE `Brasseries` ADD FOREIGN KEY (IDBra) REFERENCES `BieresBrasseries` (`BieresID`);
ALTER TABLE `Brasseries` ADD FOREIGN KEY (TypBraID) REFERENCES `TypeBrasseries` (`IDTyp`);
ALTER TABLE `Brasseries` ADD FOREIGN KEY (CPBraID) REFERENCES `CodePostal` (`CP`);
ALTER TABLE `Brasseries` ADD FOREIGN KEY (PayBraID) REFERENCES `Pays` (`idPay`);
ALTER TABLE `Brasseries` ADD FOREIGN KEY (StaBraID) REFERENCES `StatutBrasserie` (`IDStatut`);
ALTER TABLE `FormatsBieres` ADD FOREIGN KEY (IDFor) REFERENCES `Formats` (`IDFor`);
ALTER TABLE `Utilisateur` ADD FOREIGN KEY (id) REFERENCES `UtilisateurBieres` (`idUtil`);
ALTER TABLE `Utilisateur` ADD FOREIGN KEY (RoleId) REFERENCES `Role` (`id`);
ALTER TABLE `UtilisateurBieres` ADD FOREIGN KEY (IdBieres) REFERENCES `Bieres` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Bieres` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Brasseries` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `CodePostal` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Pays` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `TypeBrasseries` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `CategoriesBieres` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `StylesBieres` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Formats` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `TypeVerres` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `StatutBrasserie` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `FormatsBieres` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `BieresBrasseries` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Utilisateur` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `UtilisateurBieres` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Role` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Bieres` (`id`,`NomBie`,`BrasserieID`,`CatBieID`,`StyBieID`,`Alc`,`IBU`,`EBC`,`PresentationBie`,`Ingredients`,`Photobie`,`Codebarre`,`ForBieID`,`TypVerBieID`,`DatecreaBie`,`DateAjoutBie`) VALUES
-- ('','','','','','','','','','','','','','','','');
-- INSERT INTO `Brasseries` (`IDBra`,`NomBra`,`TypBraID`,`Adresse`,`CPBraID`,`PayBraID`,`SiteWeb`,`Facebook`,`Instagram`,`DateCreaBra`,`Logo`,`PresentationBra`,`StaBraID`,`DateAjoutBra`) VALUES
-- ('','','','','','','','','','','','','','');
-- INSERT INTO `CodePostal` (`CP`,`Villes`) VALUES
-- ('','');
-- INSERT INTO `Pays` (`idPay`,`Pays`) VALUES
-- ('','');
-- INSERT INTO `TypeBrasseries` (`IDTyp`,`TypeBra`) VALUES
-- ('','');
-- INSERT INTO `CategoriesBieres` (`IDCat`,`NomCat`) VALUES
-- ('','');
-- INSERT INTO `StylesBieres` (`IDSty`,`Style`) VALUES
-- ('','');
-- INSERT INTO `Formats` (`IDFor`,`Formats`) VALUES
-- ('','');
-- INSERT INTO `TypeVerres` (`IDVerre`,`TypeVer`) VALUES
-- ('','');
-- INSERT INTO `StatutBrasserie` (`IDStatut`,`Statut`) VALUES
-- ('','');
-- INSERT INTO `FormatsBieres` (`BieForID`,`IDFor`) VALUES
-- ('','');
-- INSERT INTO `BieresBrasseries` (`BrasserieID`,`BieresID`) VALUES
-- ('','');
-- INSERT INTO `Utilisateur` (`id`,`Pseudo`,`mail`,`Mdp`,`RoleId`,`Token`) VALUES
-- ('','','','','','');
-- INSERT INTO `UtilisateurBieres` (`idUtil`,`IdBieres`,`NombresBue`,`Note`,`Commentaire`,`FirstDrink`,`LastDrink`,`Fav`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `Role` (`id`,`role`) VALUES
-- ('','');