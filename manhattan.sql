-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Mai 2015 à 07:50
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `manhattan`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`id_article` int(11) NOT NULL,
  `titreArticle` varchar(150) NOT NULL,
  `corpsArticle` text NOT NULL,
  `date_Aticle` date NOT NULL,
  `imageArticle` varchar(50) NOT NULL,
  `Mem_pseudo` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `titreArticle`, `corpsArticle`, `date_Aticle`, `imageArticle`, `Mem_pseudo`) VALUES
(1, 'a', 'salut', '2001-02-03', 'a', 'a'),
(2, 'z', 'z', '2015-04-01', 'z', 'z'),
(3, 'e', 'e', '2015-04-07', 'e', 'e');

-- --------------------------------------------------------

--
-- Structure de la table `catart`
--

CREATE TABLE IF NOT EXISTS `catart` (
  `Cat_nomCategorie` varchar(100) NOT NULL,
  `Art_id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `nomCategorie` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`nomCategorie`) VALUES
('test');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id_commentaire` int(11) NOT NULL,
  `titreCommentaire` varchar(150) NOT NULL,
  `corpsCommentaire` text NOT NULL,
  `date_commentaire` date NOT NULL,
  `etat` int(11) NOT NULL,
  `Art_id_article` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `titreCommentaire`, `corpsCommentaire`, `date_commentaire`, `etat`, `Art_id_article`) VALUES
(1, 'test', 'salut', '2018-09-18', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compteurvisiteur`
--

CREATE TABLE IF NOT EXISTS `compteurvisiteur` (
  `date_Compteur` date NOT NULL,
  `ipUser` varchar(50) NOT NULL,
  `Art_id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dislike`
--

CREATE TABLE IF NOT EXISTS `dislike` (
  `idDislike` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `Art_id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dislike`
--

INSERT INTO `dislike` (`idDislike`, `pseudo`, `Art_id_article`) VALUES
(0, 'a', 1);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `idLikes` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `Art_id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`idLikes`, `pseudo`, `Art_id_article`) VALUES
(0, 'a', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `droit` int(11) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`nom`, `prenom`, `pseudo`, `email`, `droit`, `avatar`, `mdp`) VALUES
('a', 'a', 'a', 'a@a', 0, 'a', 'a');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `catart`
--
ALTER TABLE `catart`
 ADD PRIMARY KEY (`Art_id_article`,`Cat_nomCategorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`nomCategorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `compteurvisiteur`
--
ALTER TABLE `compteurvisiteur`
 ADD PRIMARY KEY (`ipUser`,`Art_id_article`);

--
-- Index pour la table `dislike`
--
ALTER TABLE `dislike`
 ADD PRIMARY KEY (`idDislike`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`idLikes`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
 ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
