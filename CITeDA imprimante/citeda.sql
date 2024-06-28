-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 14 juin 2024 à 10:12
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
-- Structure de la table `depenses`
--

CREATE TABLE `depenses` (
  `id_dep` int(11) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `montant` int(10) NOT NULL,
  `date_depense` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id_dep`, `motif`, `montant`, `date_depense`) VALUES
(2, 'Achat de papier ram', 2334, '2024-06-13 21:08:12'),
(3, 'Achat de papier ram', 12345, '2024-06-13 21:12:11'),
(4, 'Achat de papier ram', 12345, '2024-06-13 21:15:17'),
(5, 'Achat de papier ram', 4332, '2024-06-13 21:19:38'),
(6, 'Achat de papier ram 30', 3000, '2024-06-14 06:58:28'),
(7, 'Achat de papier ram 38', 500, '2024-06-14 07:53:14');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id_his` int(10) NOT NULL,
  `idimpr` int(10) NOT NULL,
  `d_i_phbn` int(10) NOT NULL,
  `n_i_phbn` int(10) NOT NULL,
  `d_i_phclr` int(10) NOT NULL,
  `n_i_phclr` int(10) NOT NULL,
  `d_i_impbn` int(10) NOT NULL,
  `n_i_impbn` int(10) NOT NULL,
  `d_i_impclr` int(10) NOT NULL,
  `n_i_impclr` int(10) NOT NULL,
  `date_his` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_his`, `idimpr`, `d_i_phbn`, `n_i_phbn`, `d_i_phclr`, `n_i_phclr`, `d_i_impbn`, `n_i_impbn`, `d_i_impclr`, `n_i_impclr`, `date_his`) VALUES
(1, 1, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, '2024-06-08 10:18:34'),
(2, 4, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, '2024-06-08 10:18:39'),
(3, 6, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, '2024-06-08 10:18:43'),
(4, 7, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, '2024-06-08 10:18:46'),
(18, 1, 1000, 1050, 1000, 1050, 1000, 1050, 1000, 1050, '2024-06-13 08:18:39'),
(19, 1, 1050, 1060, 1050, 1067, 1050, 1080, 1050, 1120, '2024-06-13 08:19:27'),
(22, 4, 1000, 1021, 1000, 1034, 1000, 1043, 1000, 1021, '2024-06-13 08:21:43'),
(25, 1, 1060, 1065, 1067, 1067, 1080, 1086, 1120, 1124, '2024-06-13 08:31:11'),
(26, 1, 1065, 1065, 1067, 1067, 1086, 1086, 1124, 1124, '2024-06-13 08:33:19'),
(27, 4, 1021, 1025, 1034, 1038, 1043, 1049, 1021, 1025, '2024-06-13 08:38:19'),
(30, 1, 1065, 1065, 1067, 1067, 1086, 1086, 1124, 1124, '2024-06-13 20:46:12'),
(31, 1, 1065, 1069, 1067, 1069, 1086, 1088, 1124, 1124, '2024-06-13 20:46:39'),
(32, 12, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, '2024-06-13 22:32:47'),
(33, 12, 1500, 1550, 1500, 1580, 1500, 1500, 1500, 1580, '2024-06-13 22:35:56'),
(34, 1, 1069, 1070, 1069, 1089, 1088, 1088, 1124, 1124, '2024-06-13 23:48:55'),
(35, 1, 1070, 1070, 1089, 1089, 1088, 1088, 1124, 1124, '2024-06-14 06:28:10'),
(36, 6, 1000, 1050, 1000, 1040, 1000, 1030, 1000, 1020, '2024-06-14 06:42:05');

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
(6, 'Ascii', 20, 40, 20, 50),
(7, 'Dell', 20, 50, 40, 30),
(12, 'Zeeus', 12, 43, 23, 54);

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
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id_dep`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id_his`),
  ADD KEY `id_imp` (`idimpr`);

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
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id_his` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `imprimente`
--
ALTER TABLE `imprimente`
  MODIFY `idimpr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `historique_ibfk_1` FOREIGN KEY (`idimpr`) REFERENCES `imprimente` (`idimpr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
