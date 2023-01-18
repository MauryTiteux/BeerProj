-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 jan. 2023 à 17:24
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
-- Base de données : `database_beers`
--

-- --------------------------------------------------------

--
-- Structure de la table `beers`
--

DROP TABLE IF EXISTS `beers`;
CREATE TABLE IF NOT EXISTS `beers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `description` text COLLATE latin1_general_cs,
  `alcool` decimal(3,1) DEFAULT NULL,
  `ibu` float DEFAULT NULL,
  `ebc` float DEFAULT NULL,
  `style_id` int(11) DEFAULT '1',
  `type_verre_id` int(11) DEFAULT '1',
  `fermentation_id` int(11) DEFAULT '1',
  `picture` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `created_at` int(4) DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `beers`
--

INSERT INTO `beers` (`id`, `name`, `description`, `alcool`, `ibu`, `ebc`, `style_id`, `type_verre_id`, `fermentation_id`, `picture`, `created_at`, `date_add`) VALUES
(1, 'Delta IPA', 'Ce n\'est pas une biÃ¨re belge comme les autres. Ses houblons aromatiques apportent Ã  la Delta IPA des notes de litchi et de fruit de la passion avant de vous surprendre avec une amertume franche et dÃ©saltÃ©rante. La levure Saison apporte sa touche belge avec une touche Ã©picÃ©e et sÃ¨che.\r\n\r\nLa Delta IPA est notre premiÃ¨re biÃ¨re. LancÃ©e en 2013 alors que les IPA Ã©taient encore inconnues en Belgique. Elle est profondÃ©ment impliquÃ©e dans le processus de cocrÃ©ation, Ã©lue par plus de 850 Bruxellois Ã  l\'Ã©tÃ© 2013, contre trois autres prototypes (Alpha, Beta et Gamma). Aujourd\'hui, elle reste la star parmi les All-Stars !\r\n\r\nDÃ©couvrez notre interprÃ©tation exotique de Bruxelles !', '6.0', 45, 18, 1, 6, 1, '../ressources/img/bieres/Photo_Delta IPA.jpg', 2013, '2023-01-08 13:22:30'),
(2, 'l\'Orval', 'L\'Orval, une trappiste douce-amàre Ã  la saveur évolutive ! Une vraie référence belge !', '6.2', 45, 27, 3, 5, 4, '../ressources/img/bieres/Photo_Orval.jpg', 1931, '2023-01-08 13:31:10'),
(3, 'Duvel', 'Duvel est une biÃ¨re naturelle avec une amertume subtile, un arÃ´me raffinÃ© et un caractÃ¨re houblonnÃ© prononcÃ©. La refermentation en bouteille et une longue maturation garantissent un style pur, un pÃ©tillant dÃ©licat et un agrÃ©able goÃ»t alcool doux.', '8.5', 35, 8, 2, 2, 1, '../ressources/img/bieres/Photo_Duvel.jpeg', 1923, '2023-01-08 13:43:35'),
(4, 'Bush Caractère', 'CreÌeÌe en 1933 sous le nom de Â«BushBeerÂ», elle est une des plus anciennes bieÌ€res speÌciales belges et le fleuron de la Brasserie Dubuisson.', '12.0', 25, 30, 2, 5, 1, '../ressources/img/bieres/Photo_Bush Caractère.png', 1933, '2023-01-08 15:13:40'),
(5, 'Grosse Bertha', 'Grosse Bertha est le résultat du mÃ©lange entre les recettes d\'une tripel et d\'une hefeweizen. Sa levure allemande dÃ©gage des arÃ´mes de banane et de clou de girofle. Construit sur un mÃ©lange d\'orge brassicole et de blÃ©, il est voluptueux Ã  souhait.\r\n\r\nElle a remportÃ© notre Ã©lection en 2014 entre trois autres biÃ¨res de blÃ©.\r\n\r\nBref, c\'est l\'Oktoberfest Ã  Bruxelles !', '7.0', 20, 6, 4, 6, 1, '../ressources/img/bieres/Photo_Grosse Bertha.jpg', 2014, '2023-01-09 20:03:54');

-- --------------------------------------------------------

--
-- Structure de la table `beer_brewery`
--

DROP TABLE IF EXISTS `beer_brewery`;
CREATE TABLE IF NOT EXISTS `beer_brewery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beer_id` int(11) NOT NULL,
  `brewery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `beer_brewery`
--

INSERT INTO `beer_brewery` (`id`, `beer_id`, `brewery_id`) VALUES
(1, 1, 1),
(2, 2, 4),
(3, 3, 2),
(4, 4, 3),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `beer_fermentation`
--

DROP TABLE IF EXISTS `beer_fermentation`;
CREATE TABLE IF NOT EXISTS `beer_fermentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `beer_fermentation`
--

INSERT INTO `beer_fermentation` (`id`, `name`) VALUES
(1, 'fermentation haute'),
(2, 'fermentation basse'),
(3, 'fermentation spontanée'),
(4, 'fermentation mixte');

-- --------------------------------------------------------

--
-- Structure de la table `beer_format`
--

DROP TABLE IF EXISTS `beer_format`;
CREATE TABLE IF NOT EXISTS `beer_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beer_id` int(11) NOT NULL,
  `format_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDFor` (`format_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `beer_format`
--

INSERT INTO `beer_format` (`id`, `beer_id`, `format_id`) VALUES
(1, 1, 3),
(2, 1, 20),
(3, 2, 3),
(4, 3, 1),
(5, 3, 3),
(6, 3, 13),
(7, 3, 20),
(8, 4, 3),
(9, 4, 13),
(10, 4, 20),
(11, 5, 3),
(13, 5, 20);

-- --------------------------------------------------------

--
-- Structure de la table `beer_glasses`
--

DROP TABLE IF EXISTS `beer_glasses`;
CREATE TABLE IF NOT EXISTS `beer_glasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `beer_glasses`
--

INSERT INTO `beer_glasses` (`id`, `name`) VALUES
(1, 'Droit'),
(2, 'Ballon'),
(10, 'Flute'),
(4, 'Originale'),
(11, 'Calice'),
(6, 'Tulipe évasée'),
(7, 'Pinte'),
(8, 'Chope'),
(9, 'Weizenbecke'),
(3, 'Ballon évasé'),
(5, 'Tulipe');

-- --------------------------------------------------------

--
-- Structure de la table `beer_styles`
--

DROP TABLE IF EXISTS `beer_styles`;
CREATE TABLE IF NOT EXISTS `beer_styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Style` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `beer_styles`
--

INSERT INTO `beer_styles` (`id`, `name`) VALUES
(1, 'Saison IPA'),
(2, 'Belge Forte'),
(3, 'Trappiste'),
(4, 'Hefeweizen belge');

-- --------------------------------------------------------

--
-- Structure de la table `brewery`
--

DROP TABLE IF EXISTS `brewery`;
CREATE TABLE IF NOT EXISTS `brewery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE latin1_general_cs NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `adres` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `cp_id` int(11) DEFAULT NULL,
  `land_id` int(11) DEFAULT NULL,
  `website` mediumtext COLLATE latin1_general_cs,
  `facebook` mediumtext COLLATE latin1_general_cs,
  `instagram` mediumtext COLLATE latin1_general_cs,
  `creation_date` int(4) DEFAULT NULL,
  `logo` mediumtext COLLATE latin1_general_cs,
  `description` longtext COLLATE latin1_general_cs,
  `status_id` int(11) DEFAULT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `DateAjoutBra` (`add_date`),
  UNIQUE KEY `NomBra` (`name`),
  KEY `typBraID` (`type_id`),
  KEY `CPBraID` (`cp_id`),
  KEY `PayBraID` (`land_id`),
  KEY `StaBraID` (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `brewery`
--

INSERT INTO `brewery` (`id`, `name`, `type_id`, `adres`, `cp_id`, `land_id`, `website`, `facebook`, `instagram`, `creation_date`, `logo`, `description`, `status_id`, `add_date`) VALUES
(1, 'Brussels Beer Project', 1, 'Rue Antoine Dansaert 188', 3, 1, 'https://www.beerproject.be/', 'https://www.facebook.com/brusselsbeerproject', 'https://www.instagram.com/brusselsbeerproject/', 2013, '../ressources/img/brasserie/logo_Brussels Beer Project.png', 'Brussels Beer Project est une marque de bière belge artisanale, elle possède une brasserie à Dansaert et une seconde à Anderlecht. C\'est une des rares brasseries à s\'occuper à la fois de la production dans ses sites, mais aussi d\'avoir des enseignes de vente et dégustation, leurs taprooms : deux à Paris, trois à Bruxelles et une à Tokyo.', 1, '2022-12-27 17:32:58'),
(2, 'Duvel', 3, 'Breendonk-Dorp 58 ', 5, 3, 'https://www.duvel.com', 'https://www.facebook.com/duvelbelgium', 'https://www.instagram.com/duvel_belgium', 1871, '../ressources/img/brasserie/logo_Duvel.jpg', 'L\'histoire de Duvel Moortgat est celle du respect de la tradition et des valeurs familiales. Aujourd\'hui, la quatrième génération de la famille Moortgat veille sur l\'héritage du fondateur Jan-Leonard Moortgat et de ses deux fils Albert et Victor.', 1, '2023-01-05 23:08:08'),
(3, 'Dubuisson', 3, 'Chaussée de Mons 28', 6, 1, 'https://www.dubuisson.com', 'https://www.facebook.com/brasseriedubuisson', 'https://www.instagram.com/brasserie_dubuisson/', 1769, '../ressources/img/brasserie/logo_Dubuisson.png', 'La brasserie Dubuisson est une brasserie belge, créée en 1769 Ã  Pipaix. Elle est connue pour ses différentes bières Bush, ainsi que pour la Cuvée des Trolls. Elle est la brasserie la plus ancienne de Wallonie. La Bush se décline sous le nom de Scaldis dans certains pays.', 1, '2023-01-05 23:31:40'),
(4, 'Abbaye Notre-Dame d\'Orval', 4, 'Orval 2', 7, 1, 'https://www.orval.be/fr/page/447-untitled-page-447', '', 'https://www.instagram.com/explore/locations/343417249/brasserie-dorval/', 1931, '../ressources/img/brasserie/logo_Abbaye Notre-Dame d\'Orval.jpg', 'Le dÃ©veloppement des activitÃ©s de la Brasserie dâ€™Orval dÃ©coule directement des orientations de la communautÃ© monastique. Une partie des revenus gÃ©nÃ©rÃ©s par la vente de ses produits est consacrÃ©e au soutien dâ€™Å“uvres de solidaritÃ©.', 1, '2023-01-08 13:14:39');

-- --------------------------------------------------------

--
-- Structure de la table `brewery_status`
--

DROP TABLE IF EXISTS `brewery_status`;
CREATE TABLE IF NOT EXISTS `brewery_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `brewery_status`
--

INSERT INTO `brewery_status` (`id`, `name`) VALUES
(1, 'Ouverte'),
(2, 'Fermée');

-- --------------------------------------------------------

--
-- Structure de la table `brewery_type`
--

DROP TABLE IF EXISTS `brewery_type`;
CREATE TABLE IF NOT EXISTS `brewery_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `brewery_type`
--

INSERT INTO `brewery_type` (`id`, `name`) VALUES
(1, 'Brasserie Artisanale'),
(2, 'Micro-Brasserie'),
(3, 'Brasserie industrielle'),
(4, 'Brasserie Trappiste');

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postal_code` int(11) NOT NULL,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Villes` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id`, `postal_code`, `name`) VALUES
(1, 1000, 'Bruxelles'),
(2, 1300, 'Wavre'),
(3, 2870, 'Puurs-Sint-Amands'),
(4, 5000, 'Namur'),
(5, 4000, 'Liège'),
(6, 7904, 'Leuze-en-Hainaut'),
(7, 6823, 'Florenville');

-- --------------------------------------------------------

--
-- Structure de la table `formats`
--

DROP TABLE IF EXISTS `formats`;
CREATE TABLE IF NOT EXISTS `formats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `formats`
--

INSERT INTO `formats` (`id`, `name`) VALUES
(1, '20cl'),
(2, '25cl'),
(3, '33cl'),
(4, '341ml'),
(5, '355ml'),
(6, '375ml'),
(7, '50cl'),
(8, '66cl'),
(9, '70cl'),
(10, '75cl'),
(11, '800ml'),
(12, '1L'),
(13, '1,5L'),
(14, 'Fût TORPs'),
(15, '2,5L'),
(16, '3L'),
(17, 'Mini-Fût'),
(18, 'BeerTender'),
(19, 'PerfectDraft'),
(20, 'Fût');

-- --------------------------------------------------------

--
-- Structure de la table `land`
--

DROP TABLE IF EXISTS `land`;
CREATE TABLE IF NOT EXISTS `land` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Pays` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `land`
--

INSERT INTO `land` (`id`, `name`) VALUES
(1, 'Belgique'),
(2, 'France'),
(3, 'Allemagne');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'utilisateur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `password_hash` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `session_token` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `session_token`, `role_id`) VALUES
(1, 'admin', 'romain.troonbeeckx@gmail.com', '$2y$10$RfeZX4rH60xoVq/ml04Q6O9qXiciyRFGC.KSf95l97QUbyvWmd9sS', '7198c2f25614a643ddd4ac938ce3364a16e5568527bef1c4905024c07d52f31e', 2),
(2, 'Romain', 'romain.troonbeeckx@hotmail.com', '$2y$10$s8EuYmRWpy/tkZMTXFSGXuqaDNVJK5rUumpPF/VYu.D4qRMWNAiWG', '276700292768cc5550fdd03c872730c1d3796961af20d4b5ae3399e0feffff7f', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_beers`
--

DROP TABLE IF EXISTS `users_beers`;
CREATE TABLE IF NOT EXISTS `users_beers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` mediumtext COLLATE latin1_general_cs,
  `rating` float DEFAULT NULL,
  `consumed` int(6) DEFAULT NULL,
  `consumed_first` datetime DEFAULT NULL,
  `consumed_last` datetime DEFAULT NULL,
  `is_favorite` binary(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `users_beers`
--

INSERT INTO `users_beers` (`id`, `beer_id`, `user_id`, `comment`, `rating`, `consumed`, `consumed_first`, `consumed_last`, `is_favorite`) VALUES
(1, 1, 2, NULL, NULL, 3, '2023-01-08 14:19:55', '2023-01-08 14:20:20', 0x31),
(2, 2, 2, NULL, NULL, 4, '2023-01-08 14:19:58', '2023-01-08 14:20:19', 0x31),
(3, 3, 2, NULL, NULL, 1, '2023-01-08 14:20:00', '2023-01-08 14:20:00', NULL),
(4, 4, 2, NULL, NULL, 2, '2023-01-08 14:20:03', '2023-01-08 14:20:16', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
