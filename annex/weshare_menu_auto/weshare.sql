-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 30 Novembre 2013 à 19:59
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `weshare`
--
CREATE DATABASE IF NOT EXISTS `weshare` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `weshare`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rubrique` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `id_rubrique`, `nom`) VALUES
(1, 1, 'Catégorie 1'),
(2, 1, 'Catégorie 2'),
(3, 2, 'Catégorie 1'),
(4, 2, 'Catégorie 2'),
(5, 2, 'Catégorie 3'),
(6, 2, 'Catégorie 4'),
(7, 3, 'Catégorie 1'),
(8, 3, 'Catégorie 2'),
(9, 4, 'Catégorie 1'),
(10, 4, 'Catégorie 2'),
(11, 4, 'Catégorie 3');

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE `rubrique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `rubrique`
--

INSERT INTO `rubrique` (`id`, `nom`) VALUES
(1, 'Don'),
(2, 'Emprunt'),
(3, 'Échange'),
(4, 'Service');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

DROP TABLE IF EXISTS `sous_categorie`;
CREATE TABLE `sous_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id`, `id_categorie`, `nom`) VALUES
(1, 2, 'Sous-catégorie 1'),
(2, 2, 'Sous-catégorie 2'),
(3, 2, 'Sous-catégorie 3'),
(4, 4, 'Sous-catégorie 1'),
(5, 6, 'Sous-catégorie 1'),
(6, 6, 'Sous-catégorie 2'),
(7, 7, 'Sous-catégorie 1'),
(8, 7, 'Sous-catégorie 2'),
(9, 7, 'Sous-catégorie 3'),
(10, 11, 'Sous-catégorie 1'),
(11, 11, 'Sous-catégorie 2'),
(12, 11, 'Sous-catégorie 3'),
(13, 11, 'Sous-catégorie 4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
