-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 28 oct. 2020 à 14:59
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
-- Base de données :  `mystockage`
--

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Site_Url` varchar(900) NOT NULL,
  `Site_Name` varchar(955) NOT NULL,
  `Database_Mdp` varchar(955) NOT NULL,
  `Online` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`Id`, `Site_Url`, `Site_Name`, `Database_Mdp`, `Online`) VALUES
(25, 'http://localhost/protecsante', 'protecsante', 'protecsante', 'Non'),
(23, 'http://fm3s.monades.fr', 'fm3s', 'M0nades77', 'Oui'),
(24, 'https://panierdelaferme.com/', 'Le panier de la ferme', 'M0nades77', 'Oui');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(400) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Role` varchar(400) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Password`, `Role`) VALUES
(3, 'marlène', '$2y$11$5880110f6b4d07093c6ceOgrMPOcM6PD8RaxipyxE2RPwwBwWOfZe', 'admin'),
(2, 'marlène', '$2y$11$1bc7ca92beb5a6e2f2048uzfr0Klqu8tYF0aQazbo7EBUB7g2qLEO', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
