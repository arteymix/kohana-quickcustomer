-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 21 Octobre 2012 à 20:21
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `morencyphotodb`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `completed` datetime DEFAULT NULL COMMENT 'Si non-null, la ligne ne doit plus être modifiable !',
  `user_id` int(11) unsigned NOT NULL COMMENT 'Binds the order to a single user defined in the users table.',
  `details` text COMMENT 'Spécifications du client.',
  `address` text,
  `city` text,
  `state` text,
  `country` text,
  `postal_code` text,
  `phone` text,
  `fax` text,
  `mail` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains photos orders made by users.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE IF NOT EXISTS `disponibilites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `disponibilites`
--

INSERT INTO `disponibilites` (`id`, `nom`) VALUES
(1, 'Avant-midi'),
(2, 'Après-midi'),
(3, 'Soir');

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites_reservations`
--

CREATE TABLE IF NOT EXISTS `disponibilites_reservations` (
  `disponibilite_id` int(10) unsigned NOT NULL,
  `reservation_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`disponibilite_id`,`reservation_id`),
  KEY `reservation_id` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `description` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `nom`, `description`, `created`) VALUES
(3, 'qweqw', 'qweqwe', '0000-00-00 00:00:00'),
(4, 'Mariage de Jonny 2', 'Avec isabelle...', '0000-00-00 00:00:00'),
(5, '', '', '2012-09-28 12:23:31'),
(6, '', '', '2012-09-28 12:23:54'),
(7, '', '', '2012-09-28 12:24:01'),
(8, 'Mariage de Jonny', 'Beau', '2012-09-28 12:24:12'),
(9, 'Mariage de Jonny', 'Beau', '2012-09-28 12:25:02'),
(10, 'Mariage de Jonny', 'Beau', '2012-09-28 12:26:11'),
(11, '', '', '2012-09-28 12:26:47'),
(12, '', '', '2012-09-28 12:26:49'),
(13, '', '', '2012-09-28 12:26:52'),
(14, 'Maria', 'asd', '2012-09-28 12:28:08'),
(15, 'Gfsda', 'asd', '2012-09-28 12:29:17'),
(16, 'asd', 'asdasdas', '2012-10-06 23:50:57'),
(17, 'asd', 'asdasdas', '2012-10-06 23:51:57'),
(18, 'asd', 'asd', '2012-10-06 23:52:04'),
(19, 'asd', 'asd', '2012-10-06 23:53:56'),
(20, 'asd', 'asd', '2012-10-06 23:54:08'),
(21, 'asd', 'asd', '2012-10-06 23:54:37'),
(22, 'asd', 'asd', '2012-10-06 23:54:44'),
(23, 'asd', 'asd', '2012-10-06 23:55:50');

-- --------------------------------------------------------

--
-- Structure de la table `forfaits`
--

CREATE TABLE IF NOT EXISTS `forfaits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `forfaits`
--

INSERT INTO `forfaits` (`id`, `nom`) VALUES
(1, 'Forfait A'),
(2, 'Forfait B'),
(3, 'Forfait C');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  `product_spec_id` int(10) unsigned NOT NULL,
  `quantite` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `photo_id` (`photo_id`),
  KEY `order_id` (`order_id`),
  KEY `product_spec_id` (`product_spec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `specifications`
--

CREATE TABLE IF NOT EXISTS `specifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `description` text,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `specifications`
--

INSERT INTO `specifications` (`id`, `nom`, `description`, `hauteur`, `largeur`, `prix`) VALUES
(2, 'Photo 8 x 10', 'Une belle image.', 8, 10, 13.00);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `disponibilites_reservations`
--
ALTER TABLE `disponibilites_reservations`
  ADD CONSTRAINT `disponibilites_reservations_ibfk_1` FOREIGN KEY (`disponibilite_id`) REFERENCES `disponibilites` (`id`),
  ADD CONSTRAINT `disponibilites_reservations_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `produits_ibfk_3` FOREIGN KEY (`product_spec_id`) REFERENCES `specifications` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
