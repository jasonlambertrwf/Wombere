-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 19 mai 2018 à 21:45
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wombere`
--

-- --------------------------------------------------------

--
-- Structure de la table `wb_actu`
--

DROP TABLE IF EXISTS `wb_actu`;
CREATE TABLE IF NOT EXISTS `wb_actu` (
  `id_actu` int(4) NOT NULL AUTO_INCREMENT,
  `actu_titre` varchar(255) NOT NULL,
  `actu_contenu` text NOT NULL,
  `actu_image` varchar(65000) NOT NULL,
  `actu_date_creation` date NOT NULL,
  PRIMARY KEY (`id_actu`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wb_actu`
--

INSERT INTO `wb_actu` (`id_actu`, `actu_titre`, `actu_contenu`, `actu_image`, `actu_date_creation`) VALUES
(1, 'News n°1', 'Je suis la nouvelle n°1. Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'Locaux-Wombere.jpg', '2018-04-30'),
(2, 'News n°2', 'Je suis la nouvelle n°2. Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'jouons-ensemble.jpg', '2018-05-01'),
(3, 'News n°3', 'Je suis la nouvelle n°3. Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'wombere-dance.jpg', '2018-05-02'),
(7, 'News n°4', 'Je suis la nouvelle n°4. Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'alseny-solo.jpg', '2018-05-03'),
(8, 'News n&deg;5 faite par agnes', 'Je suis la nouvelle n&deg;5. Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', '5017d1ea8a00ee5e9bd86bee26ab715f.jpg', '2018-05-08'),
(42, 'ce soir c causette', '<em>qsdqsdqsdqsdqsdqsdqsdqsdqsdqds</em>', '15265720091981685821.jpg', '2018-05-17'),
(43, 'sdfsf', 'sdfsfdfd', '43f963bdb5433ed479b8ab300ef326dc.jpg', '2018-05-17'),
(44, 'sdfdsf', 'sdfsdfsdf', '1526572956359975515.jpg', '2018-05-17'),
(45, 'hgghg', 'hghghgh', '1526572966106332843.jpg', '2018-05-17'),
(46, 'sdfsdf', 'sdfsfsdfsf', '15265730101169166325.jpg', '2018-05-17'),
(47, 'qsdqsd', 'qsdqds<em>qsdqsdqsd</em>', '1526659123962046612.jpg', '2018-05-18');

-- --------------------------------------------------------

--
-- Structure de la table `wb_admin`
--

DROP TABLE IF EXISTS `wb_admin`;
CREATE TABLE IF NOT EXISTS `wb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `status_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wb_admin`
--

INSERT INTO `wb_admin` (`id_admin`, `login_admin`, `password_admin`, `status_admin`) VALUES
(1, 'agnes', 'wombere', 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `wb_partenaires`
--

DROP TABLE IF EXISTS `wb_partenaires`;
CREATE TABLE IF NOT EXISTS `wb_partenaires` (
  `id_partenaire` int(11) NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(255) NOT NULL,
  `img_partenaire` varchar(255) NOT NULL,
  `site_partenaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_partenaire`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wb_partenaires`
--

INSERT INTO `wb_partenaires` (`id_partenaire`, `nom_partenaire`, `img_partenaire`, `site_partenaire`) VALUES
(1, 'osdsdqsd', '1526657647173576393.jpg', 'https://www.google.com'),
(2, 'a', '2.jpg', NULL),
(3, 'a', '3', NULL),
(4, 'a', '4', NULL),
(5, 'a5', '5', NULL),
(6, 'a', '7', NULL),
(7, 'a', '6', NULL),
(8, 'FF', 'fddab09d5c6dc4281449caa9d6d4b3ee.jpg', 'https://www.fondationdefrance.org/fr');

-- --------------------------------------------------------

--
-- Structure de la table `wb_projet_presentation`
--

DROP TABLE IF EXISTS `wb_projet_presentation`;
CREATE TABLE IF NOT EXISTS `wb_projet_presentation` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `projet_titre` varchar(255) NOT NULL,
  `projet_contenu` text NOT NULL,
  `projet_image` varchar(65000) NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wb_projet_presentation`
--

INSERT INTO `wb_projet_presentation` (`id_projet`, `projet_titre`, `projet_contenu`, `projet_image`) VALUES
(1, 'Projet HANDICAPABLE', 'La troupe Handicapable, une troupe de jeunes artistes guinéens en situation de handicap moteur en Guinée. Ces derniers mènent dans toute la Guinée des actions de sensibilisation en établissements scolaires et tous publics à travers des temps d\'échanges et la présentation d\'un spectacle composé de musique, chants, danses et saynètes... ', 'Handicapable.jpg'),
(40, 'qsdqsd', 'q<a>sdqsdqsdsdqqsdqsdqdqsdqsd</a><br /><br /><br /><a title=\"qsdqsdqsd\" href=\"http://google.com\">http://google.com</a>', '1526657851275514039.jpg'),
(3, 'Le Festival des Solidarit&eacute;s', '<p><span>La troupe Handicapable, une troupe de jeunes artistes guin&eacute;ens en situation de handicap moteur en Guin&eacute;e. </span></p>\r\n<p><span>Ces derniers m&egrave;nent dans toute la Guin&eacute;e des actions de sensibilisation en &eacute;tablissements scolaires et tous publics &agrave; travers des temps d\'&eacute;changes et la pr&eacute;sentation d\'un spectacle </span></p>\r\n<p><span>compos&eacute; de musique, chants, danses et sayn&egrave;tes...</span></p>', 'c3bf6901a5e664b5f62c2752c505b904.jpg'),
(42, 'sdfdsfsdf', 'sdfsdfsdf<strong>sdfsdfsdfsf</strong>', '1526572268102924925.jpg'),
(32, 'sdfsfs', '<p>sdfdsfsdf19:53:51</p>\r\n<p>&nbsp;</p>\r\n<p>7:53:55 PM</p>', '8d38229188f759bd9434ab78bdf1511c.jpg'),
(37, 'qdd', 'sqdqsdqsdsdsd<br /><br /><strong>Jaurai trop kiff&eacute;</strong>', 'cde250a9983f527ba93accb36303c6d7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `wb_slider_img`
--

DROP TABLE IF EXISTS `wb_slider_img`;
CREATE TABLE IF NOT EXISTS `wb_slider_img` (
  `id_slider_img` int(11) NOT NULL AUTO_INCREMENT,
  `slider_img` varchar(255) NOT NULL,
  `texte_slider_img` varchar(255) NOT NULL,
  `slider_page` varchar(255) NOT NULL,
  PRIMARY KEY (`id_slider_img`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wb_slider_img`
--

INSERT INTO `wb_slider_img` (`id_slider_img`, `slider_img`, `texte_slider_img`, `slider_page`) VALUES
(1, '_Y5A6702.jpg', 'Associationde Solidarité et de Partage', 'accueil'),
(2, '_Y5A6704.jpg', 'Associationde Solidarité et de Partage', 'accueil'),
(3, '_Y5A6909.jpg', 'Associationde Solidarité et de Partage', 'accueil'),
(4, '_Y5A6823.jpg', 'Associationde Solidarité et de Partage', 'accueil'),
(5, '_Y5A6879.jpg', 'Jouons avec les mains', 'accueil'),
(6, '_Y5A6702.jpg', 'Associationde Solidarité et de Partage', 'accueil'),
(7, '43b5768fff8eb2b9099144731f4854e8.jpg', 'Super album : Ce soir c\'est sambasa', 'accueil'),
(8, '15265703442002216975.jpg', 'qsddqs', 'accueil');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
