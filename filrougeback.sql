-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 16 avr. 2023 à 16:31
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
(1, 'Corongiu', 'Christopher', 'christopher.corongiu@gmail.com', '$2y$10$7W.B7Ae57hso2mf555J4EuNcHlf.jA54qoicUgp107jvpmZF4eMPq');

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
  `bounded` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carts`
--

INSERT INTO `carts` (`id`, `identifier`, `identifier_product`, `identifier_customer`, `price`, `quantity`, `row_total`, `bounded`) VALUES
(1, 1681204678, 1679392325, 1680871983, '12.99', 1, '12.99', 1);

-- --------------------------------------------------------

--
-- Structure de la table `carts_customers`
--

DROP TABLE IF EXISTS `carts_customers`;
CREATE TABLE IF NOT EXISTS `carts_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cart` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cart` (`id_cart`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carts_customers`
--

INSERT INTO `carts_customers` (`id`, `id_cart`, `id_customer`) VALUES
(1, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `identifier`, `name`, `forname`, `billing_adress`, `delivery_adress`, `email`, `password`) VALUES
(1, 1680871983, 'Corongiu', 'Christopher', '20 rue des Genettes 57430 Willerwald', '20 rue des Genettes 57430 Willerwald', 'christopher.corongiu@gmail.com', '$2y$10$V3Kh.z8oAoala3b/TTVugeISYBTwOheFg7lxPKQbiYFeEPM9Ud1Ny'),
(2, 1681368008, 'test', 'test', 'teest', 'teest', '1.2@gmail.com', '$2y$10$V3Kh.z8oAoala3b/TTVugeISYBTwOheFg7lxPKQbiYFeEPM9Ud1Ny');

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
(2, 'Limited'),
(3, 'Collector');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` int(11) DEFAULT NULL,
  `customer_identifier` int(11) DEFAULT NULL,
  `customers_name` varchar(50) DEFAULT NULL,
  `customers_forname` varchar(50) DEFAULT NULL,
  `customers_email` varchar(255) DEFAULT NULL,
  `billing_adress` varchar(255) DEFAULT NULL,
  `delivery_adress` varchar(255) DEFAULT NULL,
  `carts_identifier` int(11) DEFAULT NULL,
  `carts_price` decimal(15,2) DEFAULT NULL,
  `carts_quantity` int(11) DEFAULT NULL,
  `carts_row_total` decimal(15,2) DEFAULT NULL,
  `products_identifier` int(11) DEFAULT NULL,
  `products_name` varchar(50) DEFAULT NULL,
  `comment` text,
  `sent` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `identifier`, `customer_identifier`, `customers_name`, `customers_forname`, `customers_email`, `billing_adress`, `delivery_adress`, `carts_identifier`, `carts_price`, `carts_quantity`, `carts_row_total`, `products_identifier`, `products_name`, `comment`, `sent`) VALUES
(1, 1111, 1680871983, 'Corongiu', 'Christopher', 'christopher.corongiu@gmail.com', '20 rue des Genettes 57430 Willerwald', '20 rue des Genettes 57430 Willerwald', 1681204678, '12.99', 1, '12.99', 1679392325, 'Halo Masterchief', '', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
(7, 'XBOX 360', 'assets/images/uploads/xbox360.png'),
(8, 'gow3', 'assets/images/uploads/god-of-war-3.jpg'),
(9, 'gow4', 'assets/images/uploads/god-of-war-4.jpg'),
(10, 'haloMaster', 'assets/images/uploads/halo-masterchief.jpg'),
(11, 'spiderMan', 'assets/images/uploads/spider-man-e137148.jpg'),
(12, 'FrostPunk', 'assets/images/uploads/frost-punk-one-e168680.jpg');

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
  `price` decimal(15,2) DEFAULT NULL,
  `is_enabled` tinyint(1) DEFAULT NULL,
  `id_sub_categories` int(11) DEFAULT NULL,
  `id_pictures` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sub_categories` (`id_sub_categories`),
  KEY `id_pictures` (`id_pictures`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `identifier`, `name`, `description`, `features_1`, `features_2`, `price`, `is_enabled`, `id_sub_categories`, `id_pictures`) VALUES
(1, 1679390173, 'God Of War 3', 'La fureur de Kratos ne connaît pas de limites. Toujours désireux de faire couler le sang des dieux de l\'Olympe, le plus grand guerrier de tous les temps s\'apprête à reprendre du service dans un troisième épisode à sa mesure. Déjà létal, la palette de coups de Kratos semble s\'être largement étoffée pour ce God of War III.', 'PEGI 18', '', '16.00', 1, 2, 8),
(2, 1679392147, 'God Of War 4', 'God Of War 4', 'PEGI 18', '', '29.99', 1, 2, 9),
(3, 1679392325, 'Halo Masterchief', 'Halo Masterchief', 'PEGI 12', '', '12.99', 1, 3, 10),
(4, 1679393014, 'Spider Man', 'Spider Man', 'PEGI 12', '', '22.99', 1, 4, 11),
(5, 1679581648, 'FrostPunk', 'FrostPunk', 'PEGI 12', '', '7.64', 1, 9, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products_platforms_editions`
--

INSERT INTO `products_platforms_editions` (`id`, `id_products`, `id_platforms`, `id_editions`) VALUES
(3, 1, 6, NULL),
(4, 1, NULL, 1),
(5, 2, 2, NULL),
(6, 2, 3, NULL),
(7, 2, NULL, 1),
(8, 2, NULL, 2),
(9, 2, NULL, 3),
(10, 3, 7, NULL),
(11, 3, NULL, 1),
(12, 4, 3, NULL),
(13, 4, NULL, 1),
(14, 5, 5, NULL),
(15, 5, NULL, 1);

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
-- Contraintes pour la table `carts_customers`
--
ALTER TABLE `carts_customers`
  ADD CONSTRAINT `carts_customers_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `carts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_customers_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

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
