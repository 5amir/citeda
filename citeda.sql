-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 31 mai 2024 à 13:59
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `citeda`
--

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

CREATE TABLE `enregistrer` (
  `idenr` int(10) NOT NULL,
  `idimpr` int(10) NOT NULL,
  `dateajout` date NOT NULL,
  `nbrphbn` int(15) NOT NULL,
  `nbrphclr` int(15) NOT NULL,
  `nbrimpbn` int(15) NOT NULL,
  `nbrimpclr` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enregistrer`
--

INSERT INTO `enregistrer` (`idenr`, `idimpr`, `dateajout`, `nbrphbn`, `nbrphclr`, `nbrimpbn`, `nbrimpclr`) VALUES
(28, 1, '2024-05-30', 10, 10, 10, 10),
(29, 4, '2024-05-30', 10, 10, 10, 10),
(30, 1, '2024-05-30', 5, 5, 5, 5),
(31, 6, '2024-05-31', 10, 20, 3, 5),
(32, 7, '2024-05-31', 4, 6, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `imprimente`
--

CREATE TABLE `imprimente` (
  `idimpr` int(10) NOT NULL,
  `nomimpr` varchar(30) NOT NULL,
  `prixphbn` int(10) NOT NULL,
  `priximbn` int(10) NOT NULL,
  `prixphclr` int(10) NOT NULL,
  `priximclr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `imprimente`
--

INSERT INTO `imprimente` (`idimpr`, `nomimpr`, `prixphbn`, `priximbn`, `prixphclr`, `priximclr`) VALUES
(1, 'HP', 10, 25, 50, 100),
(4, 'Laser2', 40, 50, 30, 100),
(6, 'Ascii', 20, 40, 20, 60),
(7, 'Dell', 20, 50, 40, 30);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `passworduser` varchar(100) NOT NULL,
  `profil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`iduser`, `nom`, `email`, `passworduser`, `profil`) VALUES
(1, 'FANOU', 'fanou@gmail.com', '$2y$10$VCDpX1d0IQ1Y98q4j7JVx.D7IGBhQ1Iug9r.q4A0AtpESTsHME1gG', 'PDG'),
(2, 'OYEOLA', 'celeste@gmail.com', '$2y$10$J1aXpiX3wzW648wje6PEK.ioK4At.7SC68UVmiUS9HTWGp747MId2', 'Secretaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD PRIMARY KEY (`idenr`),
  ADD KEY `idimpr` (`idimpr`);

--
-- Index pour la table `imprimente`
--
ALTER TABLE `imprimente`
  ADD PRIMARY KEY (`idimpr`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  MODIFY `idenr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `imprimente`
--
ALTER TABLE `imprimente`
  MODIFY `idimpr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD CONSTRAINT `enregistrer_ibfk_1` FOREIGN KEY (`idimpr`) REFERENCES `imprimente` (`idimpr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
