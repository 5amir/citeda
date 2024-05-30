-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 30 mai 2024 à 10:47
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
(1, 1, '2024-05-23', 20, 12, 10, 5),
(3, 1, '2024-05-06', 33, 21, 45, 10),
(25, 1, '2024-05-29', 1, 4, 6, 4),
(26, 1, '2024-05-30', 2, 2, 2, 2);

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
(1, 'HP', 153, 25, 25, 50),
(4, 'Laser2', 4, 44, 3, 4),
(6, 'Ascii', 2, 4, 2, 6),
(7, 'Dell', 20, 50, 40, 32),
(9, 'Zeeus', 120, 30, 23, 50);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`iduser`, `nom`, `email`, `password`, `profil`) VALUES
(1, 'FANOU', 'fanou@gmail.com', '$2y$10$VCDpX1d0IQ1Y98q4j7JVx.D7IGBhQ1Iug9r.q4A0AtpESTsHME1gG', 'PDG');

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
  MODIFY `idenr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `imprimente`
--
ALTER TABLE `imprimente`
  MODIFY `idimpr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
