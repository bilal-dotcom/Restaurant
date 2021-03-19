Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@bilal-dotcom 
bilal-dotcom
/
Bonne-Bouffe
1
10
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
Settings
Bonne-Bouffe/bonnebouffe.sql
@bilal-dotcom
bilal-dotcom Create bonnebouffe.sql
…
Latest commit 87b3b62 on Sep 21, 2020
 History
 1 contributor
153 lines (125 sloc)  4.88 KB
  
-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 22 sep. 2020 à 03:59
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bonnebouffetp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('admin1', 'code1');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idmembre` varchar(20) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `datedenaissance` date NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idmembre`, `prenom`, `nom`, `telephone`, `adresse`, `datedenaissance`, `login`, `password`) VALUES
('KilMb1992', 'Mbappe', 'Kilian', '514-2982455', '6787 Rue briand', '1992-02-18', 'kiki', '123'),
('MarPa1993', 'Paul', 'Marc', '514-9870001', '6787 Rue briand', '1993-05-10', 'mm', 'mm'),
('TomAb1997', 'Abraham', 'Tommy', '514-9843421', '4522 Boul Juer', '1997-02-23', 'tommy', '123'),
('VinJu2000', 'Junior', 'Vinicius', '514-5230012', '7564 Rue nul', '2000-07-12', 'vini', '123');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idrecette` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `ingredient` varchar(500) NOT NULL,
  `preparation` varchar(500) NOT NULL,
  `nombrepersonne` int(10) NOT NULL,
  `cout` decimal(10,0) NOT NULL,
  `dateinscrite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(100) NOT NULL,
  `idmembre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idrecette`, `nom`, `ingredient`, `preparation`, `nombrepersonne`, `cout`, `dateinscrite`, `photo`, `idmembre`) VALUES
(1, 'atassi', 'eau haricot', 'bouillieeeeeeeee', 3, '12', '2019-10-15 00:42:15', 'atassi.jpg', 'VinJu2000 '),
(2, 'agoun', 'arachide eau chaude', 'battre', 1, '120', '2019-10-30 04:00:00', 'agoun.jpg', 'MarPa1993 '),
(3, 'sole', 'bar egg', 'braiser ok', 2, '55', '2019-10-17 04:00:00', 'sole.jpg', 'KilMb1992 '),
(4, 'riz', 'ble eau', 'machine', 1, '10', '2019-10-16 04:00:00', 'riz.jpg', 'VinJu2000 '),
(5, 'salade', 'feuille laitue', 'melange', 3, '12', '2019-10-17 04:00:00', 'salade.jpg', 'KilMb1992'),
(6, 'salade de fruits', 'banane raisin banane', 'melanger', 1, '8', '2019-10-17 04:00:00', 'fruits.jpg', 'MarPa1993'),
(7, 'steak', 'viande oil', 'cut', 1, '23', '2019-10-24 04:00:00', 'steak.jpg', 'TomAb1997'),
(8, 'crevette', 'eau assais', 'bien couper', 1, '14', '2019-10-29 04:00:00', 'crevette.jpg', 'MarPa1993'),
(9, 'calamar', 'poisson eau', 'fish', 2, '25', '2019-10-30 04:00:00', 'calamar.jpg', 'VinJu2000'),
(10, 'rizgras', 'riz piment legumes', 'machine', 1, '23', '2019-10-30 04:00:00', 'rizgras.jpg', 'KilMb1992'),
(11, 'amiwo', 'pate poisson', 'prpopre', 2, '56', '2019-11-06 05:00:00', 'amiwo.jpg', 'VinJu2000'),
(12, 'pates', 'pate mais', 'melange', 2, '4', '2019-10-31 04:00:00', 'pates.jpg', 'MarPa1993'),
(13, 'bouillie', 'mais ', 'bouillie', 2, '9', '2019-11-01 04:00:00', 'bouillie.jpg', 'KilMb1992');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idmembre`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idrecette`),
  ADD KEY `FK_recette` (`idmembre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idrecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `FK_recette` FOREIGN KEY (`idmembre`) REFERENCES `membre` (`idmembre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
