-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 04 Juillet 2019 à 16:57
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `CST`
--

-- --------------------------------------------------------

--
-- Structure de la table `Horaire`
--

CREATE TABLE `Horaire` (
  `idHoraire` bigint(20) NOT NULL,
  `dateHoraire` date NOT NULL,
  `timeHoraire` time NOT NULL,
  `comHoraire` text NOT NULL,
  `idLieuInter` bigint(20) NOT NULL,
  `idTypeInter` bigint(20) NOT NULL,
  `idPersonne` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Horaire`
--

INSERT INTO `Horaire` (`idHoraire`, `dateHoraire`, `timeHoraire`, `comHoraire`, `idLieuInter`, `idTypeInter`, `idPersonne`) VALUES
(1, '2019-07-02', '08:00:00', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `LieuInter`
--

CREATE TABLE `LieuInter` (
  `idLieuInter` bigint(20) NOT NULL,
  `nomLieuInter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `LieuInter`
--

INSERT INTO `LieuInter` (`idLieuInter`, `nomLieuInter`) VALUES
(1, 'PECH DAVID'),
(2, 'LEO LAGRANGE'),
(3, 'LA RAMEE'),
(4, 'SALLE DE FORMATION'),
(5, 'AUTRES');

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE `Personne` (
  `idPersonne` bigint(20) NOT NULL,
  `nomPersonne` varchar(255) NOT NULL,
  `prenomPersonne` varchar(255) NOT NULL,
  `mailPersonne` varchar(255) NOT NULL,
  `mdpPersonne` varchar(255) NOT NULL,
  `idRole` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`idPersonne`, `nomPersonne`, `prenomPersonne`, `mailPersonne`, `mdpPersonne`, `idRole`) VALUES
(1, 'CROZES', 'CYRIL', 'cyril.crozes@gmail.com', '6f667c39e0bf514104c40e0eadfe3ccf24634819351b34b8d6313347f6c63bd9', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

CREATE TABLE `Role` (
  `idRole` bigint(20) NOT NULL,
  `nomRole` varchar(255) NOT NULL,
  `valueRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Role`
--

INSERT INTO `Role` (`idRole`, `nomRole`, `valueRole`) VALUES
(1, 'admin', 2),
(2, 'redacteur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `TypeInter`
--

CREATE TABLE `TypeInter` (
  `idTypeInter` bigint(20) NOT NULL,
  `nomTypeInter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TypeInter`
--

INSERT INTO `TypeInter` (`idTypeInter`, `nomTypeInter`) VALUES
(1, 'Sportif - Entrainement'),
(2, 'Sportif - Compétition'),
(3, 'Sportif - PPG'),
(4, 'BNSSA - Entrainement'),
(5, 'BNSSA - Règlementation'),
(6, 'SECOURISME - PSC1'),
(7, 'SECOURISME - FC PSC1'),
(8, 'SECOURISME - PSE 1'),
(9, 'SECOURISME - FC PSE 1'),
(10, 'SECOURISME - PSE 2'),
(11, 'SECOURISME - FC PSE 2'),
(12, 'SECOURISME - PSS1'),
(13, 'SECOURISME - SST'),
(14, 'SECOURISME - FO PSC'),
(15, 'SECOURISME - FO PSE'),
(16, 'SECOURISME - FO ');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Horaire`
--
ALTER TABLE `Horaire`
  ADD PRIMARY KEY (`idHoraire`),
  ADD KEY `fk_horaire_personne` (`idPersonne`),
  ADD KEY `fk_horaire_typeinter` (`idTypeInter`),
  ADD KEY `fk_horaire_lieuinter` (`idLieuInter`);

--
-- Index pour la table `LieuInter`
--
ALTER TABLE `LieuInter`
  ADD PRIMARY KEY (`idLieuInter`);

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`idPersonne`),
  ADD KEY `fk_personne_role` (`idRole`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `TypeInter`
--
ALTER TABLE `TypeInter`
  ADD PRIMARY KEY (`idTypeInter`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Horaire`
--
ALTER TABLE `Horaire`
  MODIFY `idHoraire` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `LieuInter`
--
ALTER TABLE `LieuInter`
  MODIFY `idLieuInter` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Personne`
--
ALTER TABLE `Personne`
  MODIFY `idPersonne` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `idRole` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `TypeInter`
--
ALTER TABLE `TypeInter`
  MODIFY `idTypeInter` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Horaire`
--
ALTER TABLE `Horaire`
  ADD CONSTRAINT `fk_horaire_lieuinter` FOREIGN KEY (`idLieuInter`) REFERENCES `LieuInter` (`idLieuInter`),
  ADD CONSTRAINT `fk_horaire_personne` FOREIGN KEY (`idPersonne`) REFERENCES `Personne` (`idPersonne`),
  ADD CONSTRAINT `fk_horaire_typeinter` FOREIGN KEY (`idTypeInter`) REFERENCES `TypeInter` (`idTypeInter`);

--
-- Contraintes pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD CONSTRAINT `fk_personne_role` FOREIGN KEY (`idRole`) REFERENCES `Role` (`idRole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
