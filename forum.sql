-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 fév. 2020 à 22:30
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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `title`, `description`, `user_id`, `date`, `topic_id`, `private`) VALUES
(45, 'play store', 'apps', 5, '2020-02-13 14:08:46', 34, 'Admin'),
(44, 'play game', 'PS4', 5, '2020-02-13 14:08:30', 34, 'Admin'),
(43, 'confÃ©rence', 'tout les lundi', 5, '2020-02-13 14:06:00', 35, 'Admin'),
(42, 'How to', 'tout les mardi', 5, '2020-02-13 14:05:31', 35, 'Admin');

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
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `interaction`
--

INSERT INTO `interaction` (`id`, `user_id`, `message_id`, `aime`, `aimepas`) VALUES
(98, '5', 89, 0, 0),
(97, '5', 88, 0, 0),
(96, '5', 87, 0, 0),
(95, '5', 86, 0, 0),
(94, '5', 85, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `user_id`, `message`, `date`, `conv_id`) VALUES
(89, 5, 'hi', '2020-02-13 14:11:15', 42),
(88, 5, 'yes ', '2020-02-13 14:11:01', 43),
(87, 5, 'test teste teste', '2020-02-13 14:09:38', 44),
(86, 5, 'test test', '2020-02-13 14:09:28', 45),
(85, 5, 'nice job', '2020-02-13 14:09:19', 45);

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `user_id`, `date`, `private`) VALUES
(34, 'Home', 'chez moi', 5, '2020-02-13 13:56:39', 'prive'),
(35, 'Ecole', 'Travailler', 5, '2020-02-13 13:57:06', 'public');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `name`, `surname`, `rank`, `date`) VALUES
(5, 'admin', '$2y$12$ZuJF8Q6ET/Vbew3go7.En.Jgzo3HfL8Bg5asUBvJQcdZz5cgFhMhO', 'admin', 'admin', 'Admin', '2020-02-13 13:46:12'),
(2, 'test', '$2y$12$vxz.tFgMRFnpSCPZxE7ViucUFVDJDKo8ex06yfhyJDYQSVin17kT6', 'test', 'test', 'Menbre', '2020-01-29 16:32:06'),
(4, 'momo', '$2y$12$JUNdKtetL5krYdT5JMbJD.zG4X19LH2/AtIhZGkApWdeyDr/7PMqK', 'momo', 'momo', 'Membre', '2020-02-13 11:44:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
