-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 02 Juillet 2019 à 21:12
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Horaire`
--
ALTER TABLE `Horaire`
  MODIFY `idHoraire` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
