-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Mai 2017 à 07:51
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fbc`
--



DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `contestant`;
DROP TABLE IF EXISTS `tournament`;
DROP TABLE IF EXISTS `registration`;
DROP TABLE IF EXISTS `course`;
DROP TABLE IF EXISTS `make`;




-- --------------------------------------------------------

--
-- Structure de la table `category`
--


CREATE TABLE IF NOT EXISTS `category` (
  `numCat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameCat` varchar(20) NOT NULL,
  `miniAge` int(3) UNSIGNED NOT NULL,
  `maxiAge` int(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`numCat`)
) ENGINE=InnoDB DEFAULT CHARSET= utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contestant`
--


CREATE TABLE IF NOT EXISTS `contestant` (
  `numCont` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(36) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `dBirth` date NOT NULL,
  `sexe` char(1) NOT NULL,
  `streetName` varchar(32) NOT NULL,
  `pCode` int(5) UNSIGNED NOT NULL,
  `city` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telNum` int(10) NOT NULL,
  `sizeBib` char(3) NOT NULL,
  `numPermit` varchar(15) DEFAULT NULL,
  `isAdmin` int(1) UNSIGNED NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `pwd` char(40) DEFAULT NULL,
  PRIMARY KEY (`numCont`)
  
) ENGINE=InnoDB DEFAULT CHARSET= utf8;

-- --------------------------------------------------------


--
-- Structure de la table `tournament`
--


CREATE TABLE IF NOT EXISTS `tournament` (
  `numTourn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameTourn` varchar(20) NOT NULL,
  `dStart` date NOT NULL,
  `dEnd` date NOT NULL,
  PRIMARY KEY (`numTourn`)
) ENGINE=InnoDB DEFAULT CHARSET= utf8;



-- --------------------------------------------------------

--
-- Structure de la table `registration`
--


CREATE TABLE IF NOT EXISTS `registration` (
  `numReg` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numPermit` varchar(15) NOT NULL,
  `parentAut` int(1) NOT NULL,
  `paid` int(1) NOT NULL,
  `bib` int(3) NOT NULL,
  `numCont` int(10) UNSIGNED NOT NULL,
  `numTourn` int(10) UNSIGNED NOT NULL,
  `numCat` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`numReg`),
  INDEX `numCont` (`numCont`),
  INDEX `numTourn` (`numTourn`),
  INDEX `numCat` (`numCat`),
  CONSTRAINT fk_contest_reg
    FOREIGN KEY (`numCont`)
    REFERENCES contestant(`numCont`)
	ON DELETE CASCADE,
  CONSTRAINT fk_tourn_reg
    FOREIGN KEY (`numTourn`)
    REFERENCES tournament(`numTourn`)
	ON DELETE CASCADE,
  CONSTRAINT fk_cat_reg
    FOREIGN KEY (`numCat`)
    REFERENCES category(`numCat`)
	ON DELETE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET= utf8;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--


CREATE TABLE IF NOT EXISTS `course` (
  `numCourse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameCourse` varchar(15) NOT NULL,
  `coeff` int(2) UNSIGNED NOT NULL,
  `numTourn` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`numCourse`),
  INDEX `numTourn` (`numTourn`),
  CONSTRAINT fk_tourn_course
    FOREIGN KEY (`numTourn`)
    REFERENCES tournament(`numTourn`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET= utf8;


-- --------------------------------------------------------


--
-- Structure de la table `make`
--


CREATE TABLE IF NOT EXISTS `make` (
  `score` int(10) NOT NULL DEFAULT '0',
  `numReg` int(10) UNSIGNED NOT NULL,
  `numCourse` int(10) UNSIGNED NOT NULL,
  INDEX `numReg` (`numReg`),
  INDEX `numCourse` (`numCourse`),
  PRIMARY KEY (`numReg` , `numCourse`),  
  CONSTRAINT fk_regis_make
    FOREIGN KEY (`numReg`)
    REFERENCES registration(`numReg`)
	ON DELETE CASCADE,
  CONSTRAINT fk_course_make
    FOREIGN KEY (`numCourse`)
    REFERENCES course(`numCourse`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET= utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
