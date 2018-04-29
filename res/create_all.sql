-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 10 Janvier 2011 à 02:02
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ticketresto`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `commentaire` varchar(200) NOT NULL,
  `solde` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adresse`, `email`, `commentaire`, `solde`) VALUES
(9, 'baron', 'bernadette', '', 'bernad@glai.com', 'test de comentaire', 4),
(10, 'Dupont', 'jean', 'rue des bananes 44000 nantes', '', '', 3.9),
(11, 'Dupond', 'Bernard', '', 'bernard@msn.com', '', 12),
(12, 'Dupond', 'pierre', '', '', '', 11.2),
(15, 'Dupond', 'test', '', '', '', -2.4),
(8, 'Bourdeau', 'julien', '16 imp stade r durand 44120 vertou', 'lalala@gmail.com', '', 0),
(17, 'Graah', 'fef', '', '', '', 9),
(18, 'webtest', 'julien', '', '', '', 0),
(19, 'anarchy', 'test', '', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `date` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `modif` double NOT NULL,
  `prevsolde` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id`, `client`, `date`, `modif`, `prevsolde`) VALUES
(36, 8, '09-Jan-11', -2, 2),
(35, 8, '09-Jan-11', 3.76, -1.76),
(34, 9, '09-Jan-11', 100.33, -96.33),
(33, 9, '09-Jan-11', 100.33, -96.33),
(32, 10, '09-Jan-11', -1.7, 5.6),
(31, 10, '09-Jan-11', 4.6, 1),
(30, 10, '09-Jan-11', -6, 7),
(29, 15, '09-Jan-11', -7.6, 5.2),
(28, 15, '09-Jan-11', 4.2, 1),
(27, 15, '09-Jan-11', 1, 0),
(26, 10, '09-Jan-11', 3.9, 3.1),
(25, 10, '09-Jan-11', 3, 0.1),
(24, 10, '09-Jan-11', -2.2, 2.3),
(23, 10, '09-Jan-11', -3, 5.3),
(22, 10, '09-Jan-11', 5.3, 0);
