-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Mai 2017 à 07:58
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `numCat` int(10) UNSIGNED NOT NULL,
  `nameCat` varchar(20) NOT NULL,
  `miniAge` int(3) UNSIGNED NOT NULL,
  `maxiAge` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contestant`
--

DROP TABLE IF EXISTS `contestant`;
CREATE TABLE `contestant` (
  `numCont` int(10) UNSIGNED NOT NULL,
  `name` varchar(36) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `dBirth` date NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `streetName` varchar(32) NOT NULL,
  `pCode` varchar(5) NOT NULL,
  `city` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telNum` varchar(10) DEFAULT NULL,
  `isAdmin` int(1) UNSIGNED NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `pwd` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `numCourse` int(10) UNSIGNED NOT NULL,
  `nameCourse` varchar(15) NOT NULL,
  `coeff` int(2) UNSIGNED NOT NULL,
  `closed` int(1) NOT NULL DEFAULT '0',
  `numTourn` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `make`
--

DROP TABLE IF EXISTS `make`;
CREATE TABLE `make` (
  `score` int(10) NOT NULL DEFAULT '0',
  `numReg` int(10) UNSIGNED NOT NULL,
  `numCourse` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `numReg` int(10) UNSIGNED NOT NULL,
  `numPermit` varchar(15) DEFAULT NULL,
  `parentAut` int(1) DEFAULT NULL,
  `paid` int(1) NOT NULL,
  `bib` int(3) DEFAULT NULL,
  `numCont` int(10) UNSIGNED NOT NULL,
  `numTourn` int(10) UNSIGNED NOT NULL,
  `numCat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE `tournament` (
  `numTourn` int(10) UNSIGNED NOT NULL,
  `nameTourn` varchar(20) NOT NULL,
  `dStart` date NOT NULL,
  `dEnd` date NOT NULL,
  `regClosed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`numCat`),
  ADD UNIQUE KEY `nameCat` (`nameCat`),
  ADD UNIQUE KEY `miniAge` (`miniAge`),
  ADD UNIQUE KEY `maxiAge` (`maxiAge`);

--
-- Index pour la table `contestant`
--
ALTER TABLE `contestant`
  ADD PRIMARY KEY (`numCont`),
  ADD UNIQUE KEY `u_mail` (`email`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`numCourse`),
  ADD KEY `numTourn` (`numTourn`);

--
-- Index pour la table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`numReg`,`numCourse`),
  ADD KEY `numReg` (`numReg`),
  ADD KEY `numCourse` (`numCourse`);

--
-- Index pour la table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`numReg`),
  ADD KEY `numCont` (`numCont`),
  ADD KEY `numTourn` (`numTourn`),
  ADD KEY `numCat` (`numCat`);

--
-- Index pour la table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`numTourn`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `numCat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `contestant`
--
ALTER TABLE `contestant`
  MODIFY `numCont` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `numCourse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `registration`
--
ALTER TABLE `registration`
  MODIFY `numReg` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `numTourn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_tourn_course` FOREIGN KEY (`numTourn`) REFERENCES `tournament` (`numTourn`) ON DELETE CASCADE;

--
-- Contraintes pour la table `make`
--
ALTER TABLE `make`
  ADD CONSTRAINT `fk_contest_make` FOREIGN KEY (`numReg`) REFERENCES `registration` (`numReg`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_course_make` FOREIGN KEY (`numCourse`) REFERENCES `course` (`numCourse`) ON DELETE CASCADE;

--
-- Contraintes pour la table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `fk_cat_reg` FOREIGN KEY (`numCat`) REFERENCES `category` (`numCat`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_contest_reg` FOREIGN KEY (`numCont`) REFERENCES `contestant` (`numCont`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tourn_reg` FOREIGN KEY (`numTourn`) REFERENCES `tournament` (`numTourn`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
