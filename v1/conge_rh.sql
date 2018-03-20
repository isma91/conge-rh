-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 19 Mars 2018 à 19:54
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `conge_rh`
--
CREATE DATABASE IF NOT EXISTS `conge_rh` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `conge_rh`;

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `salaries_id` int(10) UNSIGNED NOT NULL,
  `acquis` tinyint(4) NOT NULL COMMENT 'Nombre de jour de cong?s disponible pour l''ann?e en cours',
  `pris` tinyint(4) NOT NULL COMMENT 'Nombre de jour de cong?s pris sur l''ann?e en cours'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conges`
--

INSERT INTO `conges` (`salaries_id`, `acquis`, `pris`) VALUES
(1, 45, 8),
(2, 25, 6),
(3, 10, 2),
(4, 8, 0);

-- --------------------------------------------------------

--
-- Structure de la table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dateBegin` date NOT NULL,
  `dateEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salaries`
--

INSERT INTO `salaries` (`id`, `firstName`, `lastName`, `address`, `dateBegin`, `dateEnd`) VALUES
(1, 'Anne', 'Dauvergne', '2 rue des lauriers 33000 Bordeaux', '2011-05-06', '0000-00-00'),
(2, 'Alexandre', 'Dujardin', '6 avenue Bossuet 33320 LE TAILLAN-MEDOC', '2008-06-14', '0000-00-00'),
(3, 'Jeanne', 'Lacombe', '138 avenue G?n?ral de Gaulle', '2013-01-06', '0000-00-00'),
(4, 'Patrick', 'Lemaire', '110 Bis avenue Ausone 33290 PESSAC', '2013-02-26', '0000-00-00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD UNIQUE KEY `salaries_id` (`salaries_id`);

--
-- Index pour la table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
