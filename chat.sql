-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 15 Septembre 2017 à 15:23
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `message` varchar(300) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `instant` datetime DEFAULT NULL,
  `num` int(11) DEFAULT '1',
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`message`, `pseudo`, `instant`, `num`, `ID`) VALUES
('salut ', 'bob', '2017-08-08 00:00:00', 1, 1),
('yo !', 'bub', '2017-08-08 00:00:00', 1, 2),
('re', 'bib', '2017-08-08 00:00:00', 1, 3),
('blbop', 'bob', '2017-08-08 00:00:00', 1, 4),
('blop', 'bob', '2017-08-27 00:00:00', 1, 5),
('bob', 'bob', '2017-08-27 00:00:00', 1, 6),
('kik', 'bob', '2017-08-27 00:00:00', 1, 7),
('loplmml ftuj', 'bob', '2017-08-27 00:00:00', 1, 8),
('jkuhpm', 'blop', '2017-08-27 00:00:00', 1, 9),
('yoyoyoypopopopo', 'blopi', NULL, 1, 10),
('yoyoyoypopopopo', 'blopi', NULL, 1, 11),
('yoyoyoypopopopo', 'blopi', NULL, 1, 12),
('youpi', 'blopi', NULL, 1, 13),
('yop', 'blopi', NULL, 1, 14),
('salut', 'blopi', NULL, 1, 15),
('yop', 'blopi', NULL, 1, 16),
('yoyo', 'blopi', NULL, 1, 17),
('damdi damdam ', 'blopi', NULL, 1, 18),
('wxc', 'blopi', NULL, 1, 19),
('dfvbxd', 'blopi', NULL, 1, 20),
('hello', 'blopi', NULL, 1, 21),
('lalala', 'blopi', NULL, 1, 22),
('bloblip', 'yop', NULL, 1, 23),
('nini', 'lblbobole', NULL, 1, 24),
('fve', 'zdf', NULL, 1, 25),
('ji', 'jkoo', NULL, 1, 26),
('bgr', 'efg', NULL, 1, 27),
('zlhjbdg', 'xbf', NULL, 1, 28),
('blç', 'nfsvc', NULL, 1, 29),
('bob', 'yop', NULL, 1, 30),
('blop', 'yop', NULL, 1, 31),
('lhdsV', ' WCX', NULL, 1, 32),
('KHGC', 'khtdiy', NULL, 1, 33),
('bob', 'salut', NULL, 1, 34),
('bob', 'jytze', NULL, 1, 35),
('bob', 'lkjkl', NULL, 1, 36),
('bob', 'puput', NULL, 1, 37),
('gygy', 'gaga', NULL, 1, 38),
('bob', 'bj', NULL, 1, 39),
('bob', 'gygy', NULL, 1, 40),
('gagoulelle', 'lol', NULL, 1, 41),
('tutu', 'lol', NULL, 1, 42),
('tutu', 'msijef', NULL, 1, 43),
('bob', 'cnoz', NULL, 1, 44),
('gygy', 'es ce qu\'on me voit', NULL, 1, 45),
('bob', 'je suis la', NULL, 1, 46),
('bob', 'mzdf', NULL, 1, 47),
('futy', 'blop', NULL, 1, 48),
('futy', 'blop', NULL, 1, 49),
('gygy', 'ksjdv', NULL, 1, 50),
('gygy', 'lbsdf', NULL, 1, 51),
('turfu', 'mqdnf', NULL, 1, 52),
('gygyg', 'huqsfd', NULL, 1, 53),
('tutu', 'vfdpsdfv', NULL, 1, 54),
('isidoris2', 'j\'ai du respet', NULL, 1, 55),
('isidoris2', 'aze', NULL, 1, 56),
('isidoris2', 'aze', NULL, 1, 57),
('isidoris2', 'raz', NULL, 1, 58),
('isidoris2', 'r', NULL, 1, 59),
('isidoris2', 'azr', NULL, 1, 60),
('isidoris2', 'az', NULL, 1, 61),
('isidoris2', 'ra', NULL, 1, 62),
('isidoris2', 'zr', NULL, 1, 63),
('isidoris2', 'azer', NULL, 1, 64),
('isidoris2', 'azre', NULL, 1, 65),
('isidoris2', 'azr', NULL, 1, 66),
('isidoris2', 'az', NULL, 1, 67),
('isidoris2', 'r', NULL, 1, 68),
('isidoris2', 'azreazr', NULL, 1, 69),
('isidoris2', 'azer', NULL, 1, 70),
('isidoris2', 'azr', NULL, 1, 71),
('isidoris2', 'azr', NULL, 1, 72),
('isidoris2', 'azr', NULL, 1, 73),
('isidoris2', 'ezra', NULL, 1, 74),
('isidoris2', 'az', NULL, 1, 75),
('isidoris2', 'rza', NULL, 1, 76),
('yo', 'salut', '0000-00-00 00:00:00', 1, 77),
('tyty', 'blop', '0000-00-00 00:00:00', 1, 78),
('bob', 'fly', '2017-09-15 10:15:19', 1, 79);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;