-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 juin 2018 à 13:20
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
  `actu_contenu` longtext NOT NULL,
  `actu_image` varchar(255) NOT NULL,
  `actu_date_creation` date NOT NULL,
  PRIMARY KEY (`id_actu`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

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
(47, 'qsdqsd', 'qsdqds<em>qsdqsdqsd</em>', '1526659123962046612.jpg', '2018-05-18'),
(49, 'qsdqsdqqsdqsdazazeaez', 'qsdqsdqsdqsdqsdssssqqqqqqqqqqqqqqqq', '15271261651563005698.jpg', '2018-05-24');

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
-- Structure de la table `wb_equipe`
--

DROP TABLE IF EXISTS `wb_equipe`;
CREATE TABLE IF NOT EXISTS `wb_equipe` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_membre` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `role_membre` varchar(6000) COLLATE latin1_general_ci DEFAULT NULL,
  `img_membre` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `organigramme` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `wb_equipe`
--

INSERT INTO `wb_equipe` (`id_membre`, `nom_membre`, `role_membre`, `img_membre`, `organigramme`) VALUES
(1, 'Agn&egrave;s Tranduc', 'Administratrice- Coordinatrice', '1527117802858447174.jpg', 'admin'),
(2, 'Als&eacute;ny Solo Cherif', 'Cr&eacute;ateur - Animateursdfsfsf', 'solo.jpg', 'admin'),
(3, 'Bafana', 'Danseur et Percussionniste', '_Y5A7149.jpg', 'membre_guinee'),
(10, 'John', 'Danseur et Percussionniste', '15270914661697183052.jpg', 'benevole-parrain'),
(5, 'Rabab Lakaway Courriol', 'Accompagnatrice et financeur etctecgffgfgfgfgfgfgfgf', 'rabab.jpg', 'benevole-parrain'),
(9, 'sd', 'sdsd', '15270914371709642061.jpg', 'membre_guinee'),
(14, 'agaga', 'flute', '15271000291131548269.jpg', 'membre_guinee'),
(13, 'agaga', 'flute', '15271000361084971393.jpg', 'membre_guinee'),
(23, 'zfzefzf', 'zefzfezfz', '1527118976771301386.jpg', 'membre_guinee'),
(24, 'sdf', 'sdfsfd', '15271189951520728661.jpg', 'membre_guinee'),
(25, 'asasasa', 'jffj', '15278754651396543.jpg', 'membre_guinee');

-- --------------------------------------------------------

--
-- Structure de la table `wb_festisol`
--

DROP TABLE IF EXISTS `wb_festisol`;
CREATE TABLE IF NOT EXISTS `wb_festisol` (
  `id_festisol` int(11) NOT NULL AUTO_INCREMENT,
  `titre_festisol` varchar(255) NOT NULL,
  `contenu_festisol` longtext NOT NULL,
  `img_festisol` varchar(255) NOT NULL,
  `annee_festisol` int(4) NOT NULL,
  `lien_site_festisol` varchar(255) NOT NULL,
  PRIMARY KEY (`id_festisol`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wb_partenaires`
--

INSERT INTO `wb_partenaires` (`id_partenaire`, `nom_partenaire`, `img_partenaire`, `site_partenaire`) VALUES
(1, 'osdsdqsd', '1526657647173576393.jpg', 'https://www.gogooogle.com'),
(2, 'a', '2.jpg', NULL),
(3, 'a', '3', NULL),
(4, 'a', '4', NULL),
(5, 'a5', '5', NULL),
(6, 'a', '7', NULL),
(7, 'a', '6', NULL),
(8, 'FF', 'fddab09d5c6dc4281449caa9d6d4b3ee.jpg', 'https://www.fondationdefrance.org/fr'),
(10, 'sdfsq', '1527007968857046185.jpg', 'wahouq'),
(11, 'sdsd', '15270944482028664398.jpg', 'sdsd');

-- --------------------------------------------------------

--
-- Structure de la table `wb_projet_presentation`
--

DROP TABLE IF EXISTS `wb_projet_presentation`;
CREATE TABLE IF NOT EXISTS `wb_projet_presentation` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `projet_titre` varchar(255) NOT NULL,
  `projet_contenu` longtext NOT NULL,
  `projet_image` varchar(65000) NOT NULL,
  `projet_redirection` varchar(255) NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wb_projet_presentation`
--

INSERT INTO `wb_projet_presentation` (`id_projet`, `projet_titre`, `projet_contenu`, `projet_image`, `projet_redirection`) VALUES
(1, 'Projet HANDICAPABLE', 'La troupe Handicapable, une troupe de jeunes artistes guin&eacute;ens en situation de handicap moteur en Guin&eacute;e. Ces derniers m&egrave;nent dans toute la Guin&eacute;e des actions de sensibilisation en &eacute;tablissements scolaires et tous publics &agrave; travers des temps d\'&eacute;changes et la pr&eacute;sentation d\'un spectacle compos&eacute; de musique, chants, danses et sayn&egrave;tes...<br /><br /><br /><iframe src=\"//www.youtube.com/embed/eBf-a_AMANI\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe><br /><br />Cpuocou c\'est agnes<br /><br /><br /><hr /><br />\r\n<p style=\"font-size: 40px; font-family: Fresca;\">PARTIE 2<br /><br /></p>', '15270060501109262192.jpg', 'http://localhost/wombere/qui-sommes-nous#nos-moyens-d-action'),
(46, 'qsdqsdq', 'sdqsdqsd', '15274481971925059511.jpg', 'http://localhost/wombere/qui-sommes-nous#nos-valeurs'),
(40, 'qsdqsd', 'q<a>sdqsdqsdsdqqsdqsdqdqsdqsd</a><br /><br /><br /><a title=\"qsdqsdqsd\" href=\"http://google.com\">http://google.com</a>', '1526657851275514039.jpg', 'http://localhost/wombere/qui-sommes-nous#nos-moyens-d-action'),
(3, 'Le Festival des Solidarit&eacute;s', 'La troupe Handicapable, une troupe de jeunes artistes guin&eacute;ens en situation de handicap moteur en Guin&eacute;e. La troupe Handicapable, une troupe de jeunes artistes guin&eacute;ens en situation de handicap moteur en Guin&eacute;e.<br />La troupe Handicapable, une troupe de jeunes artistes guin&eacute;ens en situation de handicap moteur en Guin&eacute;e.<br />La troupe Handicapable, une troupe de jeunes artistes guin&eacute;ens en situation de handicap moteur en Guin&eacute;e.<br />La troupe Handicapable, une troupe de jeunes artistes guin&eacute;ens en situation de handicap moteur en Guin&eacute;e.', 'c3bf6901a5e664b5f62c2752c505b904.jpg', 'http://localhost/wombere/qui-sommes-nous#nos-moyens-d-action'),
(32, 'sdfsfs', '17:51:49<br /><br />17:51:51<br /><br /><br /><br />17:51:52<br /><br /><br />17:51:52', '8d38229188f759bd9434ab78bdf1511c.jpg', 'http://localhost/wombere/qui-sommes-nous#nos-moyens-d-action'),
(37, 'qdd', 'sqdqsdqsdsdsd<br /><br /><strong>Jaurai trop kiff&eacute;cxwc--wc-x</strong>', 'cde250a9983f527ba93accb36303c6d7.jpg', 'http://localhost/wombere/qui-sommes-nous#nos-moyens-d-action'),
(44, 'hjvjhvjhhjvj', 'jhvjhjhv', '15267666681334215442.jpg', 'http://localhost/wombere/qui-sommes-nous#nos-moyens-d-action'),
(47, 'fgdsgdfdg', 'dfgdfgdfgdfgdfgdfg', '15275867071800536822.jpg', 'http://google.com');

-- --------------------------------------------------------

--
-- Structure de la table `wb_qui_sommes_nous`
--

DROP TABLE IF EXISTS `wb_qui_sommes_nous`;
CREATE TABLE IF NOT EXISTS `wb_qui_sommes_nous` (
  `id_section` int(11) NOT NULL AUTO_INCREMENT,
  `titre_section` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `texte_main` longtext COLLATE latin1_general_ci NOT NULL,
  `img_main` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `titre_secondaire` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `texte_secondaire` longtext COLLATE latin1_general_ci,
  `img_secondaire` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `titre_ternaire` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `texte_ternaire` longtext COLLATE latin1_general_ci,
  `img_ternaire` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_section`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `wb_qui_sommes_nous`
--

INSERT INTO `wb_qui_sommes_nous` (`id_section`, `titre_section`, `texte_main`, `img_main`, `titre_secondaire`, `texte_secondaire`, `img_secondaire`, `titre_ternaire`, `texte_ternaire`, `img_ternaire`) VALUES
(1, 'Nos Valeurs', '<div class=\"postcell post-layout--right\">\r\n<div class=\"post-text\">\r\n<p>I&acute;m using htmlPurifier to prevent XSS Attacks from users and everything works ok on input type=\"text\" fields. But, when i try to clean tinyMCE textareas seems like htmlPurifier don&acute;t work, ex.:</p>\r\n<p><strong>Simple input text field</strong></p>\r\n<p>Input.:</p>\r\n<pre><code></code></pre>\r\n<pre class=\"lang-js prettyprint prettyprinted\"><code><span class=\"str\">&lt;script&gt;alert(\'test\');&lt;/script&gt;</span></code></pre>\r\n<pre><code></code></pre>\r\n</div>\r\n</div>\r\n<br /><br /><a class=\"text-primary\" href=\"../../prout.com\" target=\"_blank\" rel=\"noopener\"><strong>Womb&eacute;r&eacute; veut cr&eacute;er du lien avec les publics en France et les artistes de la troupe Handicapable afin de changer le regard que l&rsquo;on porte sur le handicap et d&rsquo;aller au del&agrave; des fronti&egrave;res et des pr&eacute;jug&eacute;s.</strong></a><br />L&rsquo;association Wombere compte organiser une tourn&eacute;e fran&ccedil;aise de la troupe Handicapable, de mi juillet &agrave; mi septembre 2016. Elle fait appel &agrave; toutes les structures, collectivit&eacute;s, festivals&hellip;, &agrave; les rejoindre afin de faire vivre au plus grand nombre cette belle aventure humaine.Le projet <strong>\"Handicapable\"</strong> m&egrave;ne dans toute la Guin&eacute;e des actions de sensibilisation en &eacute;tablissements scolaires et &agrave; tous publics &agrave; travers des temps d&rsquo;&eacute;changes et la pr&eacute;sentation d&rsquo;un spectacle compos&eacute; de musique, chants, danses et saynettes.<br /><br /><strong>Womb&eacute;r&eacute; veut cr&eacute;er du lien avec les publics en Fran</strong><strong>ce et les artistes de la troupe Handicapable afin de changer le regard que l&rsquo;on porte sur le handicap et d&rsquo;aller au del&agrave; des fronti&egrave;res et des pr&eacute;jug&eacute;s.</strong> <br /><br />L&rsquo;association Wombere compte organiser une tourn&eacute;e fran&ccedil;aise de la troupe Handicapable, de mi juillet &agrave; mi septembre 2016. Elle fait appel &agrave; toutes les structures, collectivit&eacute;s, festivals&hellip;, &agrave; les rejoindre afin de faire vivre au plus grand nombre cette belle aventure humaine.Le projet <strong>\"Handicapable\"</strong> m&egrave;ne dans toute la Guin&eacute;e des actions de sensibilisation en &eacute;tablissements scolaires et &agrave; tous publics &agrave; travers des temps d&rsquo;&eacute;changes et la pr&eacute;sentation d&rsquo;un spectacle compos&eacute; de musique, chants, danses et saynettes.<br /><br /><strong>Womb&eacute;r&eacute; veut cr&eacute;er du lien avec les publics en France et les artistes de la troupe Handicapable afin de changer le regard que l&rsquo;on porte sur le handicap et d&rsquo;aller au del&agrave; des fronti&egrave;res et des pr&eacute;jug&eacute;s.</strong> <br /><br />L&rsquo;association Wombere compte organiser une tourn&eacute;e fran&ccedil;aise de la troupe Handicapable, de mi juillet &agrave; mi septembre 2016. Elle fait appel &agrave; toutes les structures, collectivit&eacute;s, festivals&hellip;, &agrave; les rejoindre afin de faire vivre au plus grand nombre cette belle aventure humaine.Le projet <strong>\"Handicapable\"</strong> m&egrave;ne dans toute la Guin&eacute;e des actions de sensibilisation en &eacute;tablissements scolaires et &agrave; tous publics &agrave; travers des temps d&rsquo;&eacute;changes et la pr&eacute;sentation d&rsquo;un spectacle compos&eacute; de musique, chants, danses et saynettes.<br />WAHOUuuuuqsdqdqsdqsdvfcfv', '1527117781198019909.jpg', '', '', '', '', '', ''),
(2, 'Nos Objectifs', 'Le projet <strong>\"Handicapable\"</strong> m&egrave;ne dans toute la Guin&eacute;e des actions de sensibilisation en &eacute;tablissements scolaires et &agrave; tous publics &agrave; travers des temps d&rsquo;&eacute;changes et la pr&eacute;sentation d&rsquo;un spectacle compos&eacute; de musique, chants, danses et saynettes.<br /><br /><strong>Womb&eacute;r&eacute; veut cr&eacute;er du lien avec les publics en France et les artistes de la troupe Handicapable afin de changer le regard que l&rsquo;on porte sur le handicap et d&rsquo;aller au del&agrave; des fronti&egrave;res et des pr&eacute;jug&eacute;s.</strong> <br /><br />L&rsquo;association Wombere compte organiser une tourn&eacute;e fran&ccedil;aise de la troupe Handicapable, de mi juillet &agrave; mi septembre 2016. Elle fait appel &agrave; toutes les structures, collectivit&eacute;s, festivals&hellip;, &agrave; les rejoindre afin de faire vivre au plus grand nombre cette belle aventure humaine.', '15278737921117724216.jpg', '', '', '', '', '', ''),
(3, 'Nos Moyens d\'Action', 'Le projet Handicapable a &eacute;t&eacute; initialis&eacute; &agrave; Conakry, en R&eacute;publique de Guin&eacute;e. <br /><br /><br /><br /><br />Dans le cadre de ce projet l\'association Wombere m&egrave;ne des actions aussi bien en France qu\'en Guin&eacute;e. Le projet vise &agrave; cr&eacute;er du lien entre les deux cultures. Le fil conducteur de cette aventure humaine est le tournage du documentaire &laquo;Handicapable&raquo; par Billy Tour&eacute; en Guin&eacute;e et Laurent chevalier en France. Aujourd\'hui en Guin&eacute;e Conakry le projet vise &agrave; la professionnalisation d\'artistes ayant un handicap moteur et &agrave; la sensibilisation au handicap. <br /><br />La troupe Handicapable est ainsi n&eacute;e. Les 14 artistes qui la composent sont originaires de 3 groupes ethniques Guin&eacute;ens diff&eacute;rents: les sousous, les malenk&eacute;s et les peuls. <br /><br />Elle se compose de 6 musiciens et de 8 danseurs. Dans les rues de Guin&eacute;e il n\'est pas rare de voir des personnes en situation de handicap moteur dans les rues, la troupe d\'artistes d&eacute;montrent &agrave; travers leur art que le regard sur le handicap peut/doit changer. La mise en place d\'une r&eacute;sidence d\'artistes situ&eacute;e &agrave; 40km de la capitale facilite la formation de la troupe. Les artistes, les 2 formateurs et la cuisin&egrave;re sont log&eacute;s sur place.<br /><br /><br />wahou', '_Y5A7149.jpg', 'Echange fr&eacute;quent', 'Leur quotidien est rythm&eacute; par les 2 r&eacute;p&eacute;titions journali&egrave;res durant lesquelles ils r&eacute;p&egrave;tent le spectacle &laquo;handicap\'art&raquo; qu\'ils donnent en repr&eacute;sentations. Le spectacle compos&eacute; de rythmes traditionnels Guin&eacute;ens (djemb&eacute;, doundoumba et kryn) raconte le quotidien parfois difficile des personnes en situation de handicap en Guin&eacute;e.<br /><br />Ils content la faim, le rejet et la diff&eacute;rence avec humour et d&eacute;licatesse &agrave; travers des sayn&egrave;tes th&eacute;&acirc;trales, des morceaux traditionnels et des arrangements. La troupe Handicapable m&egrave;ne &eacute;galement des actions de sensibilisation dans les &eacute;coles Guin&eacute;enes.', '_Y5A6823.jpg', 'Discussion &amp; Partage', 'Une discussion sur le handicap est organis&eacute;e entre les &eacute;l&egrave;ves et une intervenante des clubs unesco, avec comme supports, un flyer de sensibilsation et un dvd traitant du handicap en france.<br /><br />Dans un second temps, les artistes pr&eacute;sentent des extraits du spectacle &laquo;Handicap\'art&raquo; puis la rencontre se fait. Quand le spectacle prends fin les enfants tout d\'abord interpell&eacute;s sont &eacute;merveill&eacute;s des capacit&eacute;s des artistes, c\'est une r&eacute;elle prise de conscience.', '1527173108675799984.jpg'),
(4, 'Notre Histoire', 'Le projet Handicapable a &eacute;t&eacute; initialis&eacute; &agrave; Conakry, en R&eacute;publique de Guin&eacute;e. Dans le cadre de ce projet l\'association Wombere m&egrave;ne des actions aussi bien en France qu\'en Guin&eacute;e. Le projet vise &agrave; cr&eacute;er du lien entre les deux cultures. Le fil conducteur de cette aventure humaine est le tournage du documentaire &laquo;Handicapable&raquo; par Billy Tour&eacute; en Guin&eacute;e et Laurent chevalier en France. <br /><br />Aujourd\'hui en Guin&eacute;e Conakry le projet vise &agrave; la professionnalisation d\'artistes ayant un handicap moteur et &agrave; la sensibilisation au handicap. La troupe Handicapable est ainsi n&eacute;e. Les 14 artistes qui la composent sont originaires de 3 groupes ethniques Guin&eacute;ens diff&eacute;rents: les sousous, les malenk&eacute;s et les peuls. Elle se compose de 6 musiciens et de 8 danseurs. <br /><br />Dans les rues de Guin&eacute;e il n\'est pas rare de voir des personnes en situation de handicap moteur dans les rues, la troupe d\'artistes d&eacute;montrent &agrave; travers leur art que le regard sur le handicap peut/doit changer. La mise en place d\'une r&eacute;sidence d\'artistes situ&eacute;e &agrave; 40km de la capitale facilite la formation de la troupe. Les artistes, les 2 formateurs et la cuisin&egrave;re sont log&eacute;s sur place.', '15270945821391721503.jpg', 'L\'avenir en France et en Guin&eacute;e', 'Le projet Handicapable a &eacute;t&eacute; initialis&eacute; &agrave; Conakry, en R&eacute;publique de Guin&eacute;e. Dans le cadre de ce projet l\'association Wombere m&egrave;ne des actions aussi bien en France qu\'en Guin&eacute;e. Le projet vise &agrave; cr&eacute;er du lien entre les deux cultures. Le fil conducteur de cette aventure humaine est le tournage du documentaire &laquo;Handicapable&raquo; par Billy Tour&eacute; en Guin&eacute;e et Laurent chevalier en France. Aujourd\'hui en Guin&eacute;e Conakry le projet vise &agrave; la professionnalisation d\'artistes ayant un handicap moteur et &agrave; la sensibilisation au handicap. La troupe Handicapable est ainsi n&eacute;e. Les 14 artistes qui la composent sont originaires de 3 groupes ethniques Guin&eacute;ens diff&eacute;rents: les sousous, les malenk&eacute;s et les peuls. Elle se compose de 6 musiciens et de 8 danseurs. Dans les rues de Guin&eacute;e il n\'est pas rare de voir des personnes en situation de handicap moteur dans les rues, la troupe d\'artistes d&eacute;montrent &agrave; travers leur art que le regard sur le handicap peut/doit changer. La mise en place d\'une r&eacute;sidence d\'artistes situ&eacute;e &agrave; 40km de la capitale facilite la formation de la troupe. Les artistes, les 2 formateurs et la cuisin&egrave;re sont log&eacute;s sur place.', '15270945821563437226.jpeg', '', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
(8, '15265703442002216975.jpg', '<a class=\"badge badge-light\" title=\"qsdqsd\" href=\"google.com\">qsddqsqsdqsdq</a>', 'accueil'),
(13, '1527874464258656596.jpg', '19:54:50<br /><br /><a class=\"btn btn-info\" href=\"https://www.docdroid.net/58O8pXJ/bb5e3f-9500f13002d9400b993dd65203e0fb6c.pdf#page=2\" target=\"_blank\" rel=\"noopener\">telecharger lepdf</a>', 'accueil'),
(12, '15278677291593985221.jpg', 'Wahou', 'accueil');

-- --------------------------------------------------------

--
-- Structure de la table `wb_wombere_france_guinee`
--

DROP TABLE IF EXISTS `wb_wombere_france_guinee`;
CREATE TABLE IF NOT EXISTS `wb_wombere_france_guinee` (
  `id_section` int(11) NOT NULL AUTO_INCREMENT,
  `titre_section` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `contenu_section` longtext COLLATE latin1_general_ci NOT NULL,
  `img_section` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `page` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_section`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `wb_wombere_france_guinee`
--

INSERT INTO `wb_wombere_france_guinee` (`id_section`, `titre_section`, `contenu_section`, `img_section`, `page`) VALUES
(1, 'nos cours', '&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae eius hic a suscipit unde veritatis odit error aliquid nobis ipsum ullam sapiente, expedita repudiandae quasi temporibus, laboriosam excepturi illum quaerat. Et ipsum officiis consequatur deleniti voluptates placeat ullam delectus molestias cupiditate nihil expedita nisi provident, velit praesentium sint eaque sequi, magni quisquam molestiae. Delectus fuga, obcaecati quas, odit autem ex. Sapiente, porro eaque totam? Sed cum veniam repellat, consectetur modi commodi quae consequatur quo. Rerum quas consequuntur neque aliquid qui corporis, facere ratione, eius quasi ex, fugiat omnis, laudantium saepe.', '1527875580894628505.jpg', 'wombere-france'),
(2, 'ateliers en &eacute;tablissements sp&eacute;cialis&eacute;s', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae eius hic a suscipit unde veritatis odit error aliquid nobis ipsum ullam sapiente, expedita repudiandae quasi temporibus, laboriosam excepturi illum quaerat.<br /><br />18:09:0218:09:0218:09:02<br /><br /><br />Et ipsum officiis consequatur deleniti voluptates placeat ullam delectus molestias cupiditate nihil expedita nisi provident, velit praesentium sint eaque sequi, magni quisquam molestiae. Delectus fuga, obcaecati quas, odit autem ex.rnrnSapiente, porro eaque totam? Sed cum veniam repellat, consectetur modi commodi quae consequatur quo. Rerum quas consequuntur neque aliquid qui corporis, facere ratione, eius quasi ex, fugiat omnis, laudantium saepe.', 'http://placehold.jp/300x300.png', 'wombere-france'),
(3, '&eacute;venements', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae eius hic a suscipit unde veritatis odit error aliquid nobis ipsum ullam sapiente, expedita repudiandae quasi temporibus, laboriosam excepturi illum quaerat.rnrnEt ipsum officiis consequatur deleniti voluptates placeat ullam delectus molestias cupiditate nihil expedita nisi provident, velit praesentium sint eaque sequi, magni quisquam molestiae. Delectus fuga, obcaecati quas, odit autem ex.rnrnSapiente, porro eaque totam? Sed cum veniam repellat, consectetur modi commodi quae consequatur quo. Rerum quas consequuntur neque aliquid qui corporis, facere ratione, eius quasi ex, fugiat omnis, laudantium saepe.', 'http://placehold.jp/300x300.png', 'wombere-france'),
(4, '&eacute;co-lieu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, exercitationem blanditiis, ut harum, officiis nostrum inventore dolore consequatur maxime nemo soluta, tenetur. Facilis placeat voluptatibus molestiae excepturi nam sint praesentium. Eveniet asperiores voluptas magnam nisi, officia quae laborum? Tempore repellendus quisquam, in magnam dignissimos asperiores soluta minima quasi explicabo eligendi dolorem nesciunt reiciendis quos suscipit adipisci ipsam ab voluptatem commodi?<br /><br /><br /><br />J\'adooooooore<br />18:36:1318:36:1318:36:1318:36:13', '1527762787292603085.jpg', 'wombere-guinee'),
(5, 'troupe handicapable', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, exercitationem blanditiis, ut harum, officiis nostrum inventore dolore consequatur maxime nemo soluta, tenetur. Facilis placeat voluptatibus molestiae excepturi nam sint praesentium. Eveniet asperiores voluptas magnam nisi, officia quae laborum? Tempore repellendus quisquam, in magnam dignissimos asperiores soluta minima quasi explicabo eligendi dolorem nesciunt reiciendis quos suscipit adipisci ipsam ab voluptatem commodi?<br /><br /><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, exercitationem blanditiis, ut harum, officiis nostrum inventore dolore consequatur maxime nemo soluta, tenetur. Facilis placeat voluptatibus molestiae excepturi nam sint praesentium. Eveniet asperiores voluptas magnam nisi, officia quae laborum? Tempore repellendus quisquam, in magnam dignissimos asperiores soluta minima quasi explicabo eligendi dolorem nesciunt reiciendis quos suscipit adipisci ipsam ab voluptatem commodi?<br /><br /><br /><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, exercitationem blanditiis, ut harum, officiis nostrum inventore dolore consequatur maxime nemo soluta, tenetur. Facilis placeat voluptatibus molestiae excepturi nam sint praesentium. Eveniet asperiores voluptas magnam nisi, officia quae laborum? Tempore repellendus quisquam, in magnam dignissimos asperiores soluta minima quasi explicabo eligendi dolorem nesciunt reiciendis quos suscipit adipisci ipsam ab voluptatem commodi?<br /><br /><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, exercitationem blanditiis, ut harum, officiis nostrum inventore dolore consequatur maxime nemo soluta, tenetur. Facilis placeat voluptatibus molestiae excepturi nam sint praesentium. Eveniet asperiores voluptas magnam nisi, officia quae laborum? Tempore repellendus quisquam, in magnam dignissimos asperiores soluta minima quasi explicabo eligendi dolorem nesciunt reiciendis quos suscipit adipisci ipsam ab voluptatem commodi?', '15277628442048320039.jpg', 'wombere-guinee'),
(6, 'd&eacute;couverte de la guin&eacute;e et de son art', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, exercitationem blanditiis, ut harum, officiis nostrum inventore dolore consequatur maxime nemo soluta, tenetur. Facilis placeat voluptatibus molestiae excepturi nam sint praesentium. Eveniet asperiores voluptas magnam nisi, officia quae laborum? Tempore repellendus quisquam, in magnam dignissimos asperiores soluta minima quasi explicabo eligendi dolorem nesciunt reiciendis quos suscipit adipisci ipsam ab voluptatem commodi?', '1527769887426002684.jpg', 'wombere-guinee');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
