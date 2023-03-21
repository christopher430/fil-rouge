-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 mars 2023 à 07:18
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
-- Base de données : `filrougeback`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `forname` varchar(50) DEFAULT NULL,
  `email` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `forname`, `email`, `password`) VALUES
(1, 'Corongiu', 'Christopher', 'christopher.corongiu@gmail.com', '$2y$10$iHRJyPR2HdNQESPl1u.k8O.VXPx4A4PDSJE07XXT1j1/3crE9.iEu');

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` int(11) DEFAULT NULL,
  `identifier_product` int(11) DEFAULT NULL,
  `identifier_customer` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `row_total` decimal(15,2) DEFAULT NULL,
  `comment` text,
  `id_customers` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_customers` (`id_customers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `is_enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `is_enabled`) VALUES
(1, 'Action', 'Ca bouge', 1),
(2, 'Aventure', 'Epique', 1),
(3, 'RPG', 'rpg', 1),
(4, 'Simulation', 'simulation', 1),
(5, 'Sport', 'sport', 1),
(6, 'Stratégie', 'stratégie', 1);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `forname` varchar(50) DEFAULT NULL,
  `billing_adress` varchar(255) DEFAULT NULL,
  `delivery_adress` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editions`
--

DROP TABLE IF EXISTS `editions`;
CREATE TABLE IF NOT EXISTS `editions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editions`
--

INSERT INTO `editions` (`id`, `name`) VALUES
(1, 'Standard'),
(2, 'Limité'),
(3, 'Collector');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_identifier` int(11) DEFAULT NULL,
  `customers_name` varchar(50) DEFAULT NULL,
  `customers_forname` varchar(50) DEFAULT NULL,
  `customers_email` varchar(255) DEFAULT NULL,
  `billing_adress` varchar(255) DEFAULT NULL,
  `delivery_adress` varchar(255) DEFAULT NULL,
  `carts_identifier` int(11) DEFAULT NULL,
  `carts_price` int(11) DEFAULT NULL,
  `carts_quantity` varchar(50) DEFAULT NULL,
  `carts_row_total` decimal(15,2) DEFAULT NULL,
  `products_identifier` int(11) DEFAULT NULL,
  `products_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `path`) VALUES
(1, 'XBOX Series X', 'assets/images/uploads/xboxx.png'),
(2, 'PS5', 'assets/images/uploads/ps5.png'),
(3, 'PS4', 'assets/images/uploads/ps4.png'),
(4, 'Nintendo Switch', 'assets/images/uploads/switch.png'),
(5, 'XBOX One', 'assets/images/uploads/xboxone.png'),
(6, 'PS3', 'assets/images/uploads/ps3.png'),
(7, 'XBOX 360', 'assets/images/uploads/xbox360.png');

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

DROP TABLE IF EXISTS `platforms`;
CREATE TABLE IF NOT EXISTS `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `id_pictures` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pictures` (`id_pictures`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `platforms`
--

INSERT INTO `platforms` (`id`, `name`, `id_pictures`) VALUES
(1, 'XBOX series X', 1),
(2, 'PS5', 2),
(3, 'PS4', 3),
(4, 'Nintendo Switch', 4),
(5, 'XBOX One', 5),
(6, 'PS3', 6),
(7, 'XBOX 360', 7);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `features_1` varchar(50) DEFAULT NULL,
  `features_2` varchar(50) DEFAULT NULL,
  `is_enabled` tinyint(1) DEFAULT NULL,
  `id_sub_categories` int(11) DEFAULT NULL,
  `id_pictures` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sub_categories` (`id_sub_categories`),
  KEY `id_pictures` (`id_pictures`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products_platforms_editions`
--

DROP TABLE IF EXISTS `products_platforms_editions`;
CREATE TABLE IF NOT EXISTS `products_platforms_editions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_products` int(11) DEFAULT NULL,
  `id_platforms` int(11) DEFAULT NULL,
  `id_editions` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`),
  KEY `id_platforms` (`id_platforms`),
  KEY `id_editions` (`id_editions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `is_enabled` tinyint(1) DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categories` (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `description`, `is_enabled`, `id_categories`) VALUES
(1, 'MMORPG', NULL, 1, 1),
(2, 'Beat\'em all', NULL, 1, 1),
(3, 'FPS', 'fps', 1, 1),
(4, 'Monde ouvert', 'Monde ouvert', 1, 2),
(5, 'Narratif', 'Narratif', 1, 2),
(6, 'Bac à sable', 'Bac à sable', 1, 2),
(7, 'Anime', 'Anime', 1, 3),
(8, 'Dark Fantaisy', 'Dark Fantaisy', 1, 3),
(9, 'Survie', 'Survie', 1, 4),
(10, 'Construction', 'Construction', 1, 4),
(11, 'Conduite', 'Conduite', 1, 4),
(12, 'Football', 'Football', 1, 5),
(13, 'Combat', 'Combat', 1, 5),
(14, 'Automobile', 'Automobile', 1, 5),
(15, 'MOBA', 'MOBA', 1, 6),
(16, 'Tour par tour', 'Tour par tour', 1, 6),
(17, 'Tower defense', 'Tower defense', 1, 6);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`id`);

--
-- Contraintes pour la table `platforms`
--
ALTER TABLE `platforms`
  ADD CONSTRAINT `platforms_ibfk_1` FOREIGN KEY (`id_pictures`) REFERENCES `pictures` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_pictures`) REFERENCES `pictures` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `products_platforms_editions`
--
ALTER TABLE `products_platforms_editions`
  ADD CONSTRAINT `products_platforms_editions_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_platforms_editions_ibfk_2` FOREIGN KEY (`id_platforms`) REFERENCES `platforms` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_platforms_editions_ibfk_3` FOREIGN KEY (`id_editions`) REFERENCES `editions` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
