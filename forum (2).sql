-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 fév. 2020 à 18:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `topic_id` int(11) NOT NULL,
  `private` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `title`, `description`, `user_id`, `date`, `topic_id`, `private`) VALUES
(17, 'nouriture', 'des', 1, '2020-02-18 19:12:37', 102, 'Admin'),
(15, 'les erreur php', 'aie sa fait mal', 4, '2020-02-18 13:58:47', 100, 'Membre'),
(14, 'LE php genial', 'alala', 1, '2020-02-18 11:34:54', 98, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `interaction`
--

DROP TABLE IF EXISTS `interaction`;
CREATE TABLE IF NOT EXISTS `interaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `message_id` int(11) NOT NULL,
  `aime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `interaction`
--

INSERT INTO `interaction` (`id`, `user_id`, `message_id`, `aime`) VALUES
(189, '4', 96, -1),
(188, '1', 96, 1),
(185, '4', 95, 1),
(184, '4', 94, -1),
(183, '1', 94, 1),
(181, '4', 88, -1),
(180, '1', 69, -1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `conv_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `user_id`, `message`, `date`, `conv_id`) VALUES
(93, 1, 'gyfyj', '2020-02-18 17:40:11', 14),
(96, 1, 'les gars', '2020-02-18 19:12:44', 17);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `private` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `user_id`, `date`, `private`) VALUES
(102, 'public2', 'aie', 1, '2020-02-18 19:11:01', 'public'),
(98, 'Les premier test', 'Test php', 1, '2020-02-14 17:19:19', 'prive'),
(100, 'public', 'test', 1, '2020-02-18 13:58:17', 'public'),
(103, 'plat', 'plat', 1, '2020-02-18 19:11:32', 'public');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `name`, `surname`, `rank`, `date`) VALUES
(1, 'admin', '$2y$12$ayf3HiiH13OinFOgb60WtOsbmWBfSW.SWJpTZ861hm8unuyXNvEu2', 'admin', 'admin', 'Admin', '2020-02-14 14:39:09'),
(2, 'test', '$2y$12$vxz.tFgMRFnpSCPZxE7ViucUFVDJDKo8ex06yfhyJDYQSVin17kT6', 'test', 'test', 'Membre', '2020-02-14 14:39:09'),
(3, 'like', '$2y$12$cDD8fIYdNDrDfdC/moWYkeBVHlDL50lKonKvc6lsiQb10c/f4ke/G', 'like', 'like', 'Membre', '2020-02-14 14:39:09'),
(4, 'luc', '$2y$12$r/jgaFQEuEPGDgz2ofO/VOLBYnqrK1LC5hlrx/p.IzlmC35I5wK2q', 'luc', 'luc', 'Moderateur', '2020-02-14 14:39:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
