-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 08, 2019 at 09:30 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `CST`
--

-- --------------------------------------------------------

--
-- Table structure for table `Horaire`
--

CREATE TABLE `Horaire` (
  `idHoraire` bigint(20) NOT NULL,
  `dateHoraire` date NOT NULL,
  `timeHoraire` time NOT NULL,
  `comHoraire` text,
  `idLieuInter` bigint(20) NOT NULL,
  `idTypeInter` bigint(20) NOT NULL,
  `idPersonne` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Horaire`
--

INSERT INTO `Horaire` (`idHoraire`, `dateHoraire`, `timeHoraire`, `comHoraire`, `idLieuInter`, `idTypeInter`, `idPersonne`) VALUES
(1, '2019-07-03', '02:00:00', 'Blablabla Pookie ferme la porte dans les cookies dans le sac', 3, 1, 1),
(2, '2019-06-13', '04:00:00', 't\'es la plus bonne bonne de mes copines ', 1, 4, 1),
(3, '2019-07-19', '01:00:00', 'efçueziei', 3, 9, 1),
(4, '2019-07-11', '08:00:00', 'cacaca', 3, 5, 2),
(5, '2019-07-20', '02:00:00', 'zdaz', 4, 7, 1),
(6, '2019-05-02', '03:00:00', '1111', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `LieuInter`
--

CREATE TABLE `LieuInter` (
  `idLieuInter` bigint(20) NOT NULL,
  `nomLieuInter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LieuInter`
--

INSERT INTO `LieuInter` (`idLieuInter`, `nomLieuInter`) VALUES
(1, 'PECH DAVID'),
(2, 'LEO LAGRANGE'),
(3, 'LA RAMEE'),
(4, 'SALLE DE FORMATION'),
(5, 'AUTRES');

-- --------------------------------------------------------

--
-- Table structure for table `Personne`
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
-- Dumping data for table `Personne`
--

INSERT INTO `Personne` (`idPersonne`, `nomPersonne`, `prenomPersonne`, `mailPersonne`, `mdpPersonne`, `idRole`) VALUES
(1, 'CROZES', 'CYRIL', 'cyril.crozes@gmail.com', 'D8467FBE34891AEE837EC982F9D55C09C25E00CD7ED95A0330B9C1A9B21EDC03', 1),
(2, 'IMBERT', 'MARIE-CECILE', 'mariececile.imbert@gmail.com', 'DBE3F945784A911CF0ADEEE5E4DCE906F495664F5097A762B05A58B4B543BE88', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `idRole` bigint(20) NOT NULL,
  `nomRole` varchar(255) NOT NULL,
  `valueRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`idRole`, `nomRole`, `valueRole`) VALUES
(1, 'admin', 2),
(2, 'redacteur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TypeInter`
--

CREATE TABLE `TypeInter` (
  `idTypeInter` bigint(20) NOT NULL,
  `nomTypeInter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TypeInter`
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
(16, 'SECOURISME - FO '),
(17, 'ADMINISTRATIF'),
(18, 'MAINTENANCE OPERATIONNEL'),
(19, 'DEMARCHAGE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Horaire`
--
ALTER TABLE `Horaire`
  ADD PRIMARY KEY (`idHoraire`),
  ADD KEY `fk_horaire_personne` (`idPersonne`),
  ADD KEY `fk_horaire_typeinter` (`idTypeInter`),
  ADD KEY `fk_horaire_lieuinter` (`idLieuInter`);

--
-- Indexes for table `LieuInter`
--
ALTER TABLE `LieuInter`
  ADD PRIMARY KEY (`idLieuInter`);

--
-- Indexes for table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`idPersonne`),
  ADD KEY `fk_personne_role` (`idRole`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `TypeInter`
--
ALTER TABLE `TypeInter`
  ADD PRIMARY KEY (`idTypeInter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Horaire`
--
ALTER TABLE `Horaire`
  MODIFY `idHoraire` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `LieuInter`
--
ALTER TABLE `LieuInter`
  MODIFY `idLieuInter` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Personne`
--
ALTER TABLE `Personne`
  MODIFY `idPersonne` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `idRole` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `TypeInter`
--
ALTER TABLE `TypeInter`
  MODIFY `idTypeInter` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Horaire`
--
ALTER TABLE `Horaire`
  ADD CONSTRAINT `fk_horaire_lieuinter` FOREIGN KEY (`idLieuInter`) REFERENCES `LieuInter` (`idLieuInter`),
  ADD CONSTRAINT `fk_horaire_personne` FOREIGN KEY (`idPersonne`) REFERENCES `Personne` (`idPersonne`),
  ADD CONSTRAINT `fk_horaire_typeinter` FOREIGN KEY (`idTypeInter`) REFERENCES `TypeInter` (`idTypeInter`);

--
-- Constraints for table `Personne`
--
ALTER TABLE `Personne`
  ADD CONSTRAINT `fk_personne_role` FOREIGN KEY (`idRole`) REFERENCES `Role` (`idRole`);
