-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 20 fév. 2020 à 15:28
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `title`, `description`, `user_id`, `date`, `topic_id`, `private`) VALUES
(14, 'LE php genial', 'alala', 1, '2020-02-18 11:34:54', 98, 'Admin'),
(15, 'test', 'test', 1, '2020-02-18 17:35:00', 30, 'Admin'),
(16, 'nji', 'jnk,j', 1, '2020-02-20 11:45:01', 100, 'Admin'),
(17, 'coucou', 'fete de momo', 4, '2020-02-20 13:34:52', 110, 'Moderateur'),
(18, 'test', 'test', 5, '2020-02-20 14:38:19', 112, 'Admin');

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
  `aimepas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `interaction`
--

INSERT INTO `interaction` (`id`, `user_id`, `message_id`, `aime`, `aimepas`) VALUES
(231, '1', 69, 1, 0),
(234, '1', 71, 1, 0),
(238, '1', 74, -1, 0),
(242, '4', 74, 1, 0),
(239, '1', 75, 1, 0),
(240, '5', 76, 1, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `user_id`, `message`, `date`, `conv_id`) VALUES
(71, 1, 'Le php est utile au dÃ©veloppement d\'un site', '2020-02-18 11:52:31', 14),
(70, 1, 'bhkvh\'cgfj', '2020-02-18 11:51:21', 14),
(69, 1, 'vhkvhk', '2020-02-18 11:47:18', 14),
(72, 1, 'saliut', '2020-02-20 11:45:10', 16),
(73, 1, 'C EST COOL LE PHP', '2020-02-20 11:46:26', 16),
(74, 4, 'C EST COOL LE PHP', '2020-02-20 13:35:10', 17),
(75, 1, 'yes', '2020-02-20 13:44:23', 17),
(76, 5, 'fdqfs', '2020-02-20 14:38:53', 18);

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
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `user_id`, `date`, `private`) VALUES
(98, 'Les premier test', 'Test php', 1, '2020-02-14 17:19:19', 'prive'),
(115, 'ihnin', 'nnin', 6, '2020-02-20 16:27:51', 'public'),
(113, 'admin', 'admin', 5, '2020-02-20 14:40:19', 'prive'),
(112, 'aurevoir', 'aurevoir', 5, '2020-02-20 14:38:05', 'public'),
(111, 'bonjour', 'bonjour', 5, '2020-02-20 14:37:51', 'public'),
(110, 'momo', 'fete de momo', 4, '2020-02-20 13:34:30', 'public'),
(114, 'khlhk', 'khhoij', 6, '2020-02-20 16:27:38', 'public');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `name`, `surname`, `rank`, `date`) VALUES
(6, 'admin', '$2y$12$roIB5oLF2Hn0UA3JPM.7WewNLxteG2NwdxjH9Exa.Opn2v2f/R3mO', 'admin', 'admin', 'Admin', '2020-02-20 16:16:26'),
(2, 'test', '$2y$12$vxz.tFgMRFnpSCPZxE7ViucUFVDJDKo8ex06yfhyJDYQSVin17kT6', 'test', 'test', 'Admin', '2020-02-14 14:39:09'),
(3, 'like', '$2y$12$cDD8fIYdNDrDfdC/moWYkeBVHlDL50lKonKvc6lsiQb10c/f4ke/G', 'like', 'like', 'Membre', '2020-02-14 14:39:09'),
(4, 'luc', '$2y$12$r/jgaFQEuEPGDgz2ofO/VOLBYnqrK1LC5hlrx/p.IzlmC35I5wK2q', 'luc', 'luc', 'Moderateur', '2020-02-14 14:39:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
