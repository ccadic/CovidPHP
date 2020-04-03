-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 avr. 2020 à 01:06
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `covid19`
--

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

CREATE TABLE `usagers` (
    `id_demandeur` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    `etablissement` varchar(254) NOT NULL,
    `nom` varchar(254) NOT NULL,
    `prenom` varchar(254) NOT NULL,
    `email` varchar(254) NOT NULL,
    `telephone` varchar(12) NOT NULL,
    `adresse` text NOT NULL,
    `zip` varchar(8) NOT NULL,
    `ville` varchar(254) NOT NULL,
    `password` varchar(254) NOT NULL,
    `categorie` int(1) NOT NULL COMMENT '0 est demandeur 1 est offreur',
    `annonce` text NOT NULL,
    `online` int(1) NOT NULL,
    PRIMARY KEY (`id_demandeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
