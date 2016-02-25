-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 20 Janvier 2014 à 21:49
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `weshare`
--
CREATE DATABASE IF NOT EXISTS `weshare` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `weshare`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `mot_de_passe`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `confirmation_utilisateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_sous_categorie` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_rubrique` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_acquereur` int(11) NOT NULL,
  `date_acquisition` datetime NOT NULL,
  `confirmation_acquereur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vu` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id`, `id_utilisateur`, `confirmation_utilisateur`, `id_sous_categorie`, `id_categorie`, `id_rubrique`, `titre`, `description`, `date`, `id_acquereur`, `date_acquisition`, `confirmation_acquereur`, `url_image`, `vu`, `visible`) VALUES
(1, 1, '', 27, 12, 3, 'Tondeuse RL 500 VERSION Speed', 'Voici une super tondeuse automatique. Elle m''a assez rarement servis et aujourd''hui j''aimerais l''échanger contre une perceuse.', '2014-01-18 20:40:54', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/118114204054.jpg', 25, 0),
(5, 2, '', 9, 3, 1, 'iPod ', 'Donne iPod (parce que j''en ai un nouveau) ', '2014-01-18 21:01:48', 1, '2014-01-18 21:11:08', '', 'content_files/pics/items/218114210148.png', 5, 1),
(6, 2, '', 0, 11, 2, 'Barbecue electrique TEFAL CB223612', 'Prête barbecue pour le weekend ', '2014-01-18 21:04:14', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/218114210414.png', 22, 0),
(7, 1, '', 31, 14, 3, 'Hard Disc Fire Wire', 'Echange disque dur d''occasion To (1000 Go) contre une calculatrice de marque TI', '2014-01-18 21:06:01', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/118114210601.jpg', 4, 0),
(9, 3, '', 28, 13, 3, 'Alfa Romeo MiTo', '<br />\r\n    Vitesse maximale : 165 km/h<br />\r\n    0 à 100 km/h : 12.3 s<br />\r\n    Masse : 1 065 kg<br />\r\n    Couple : 115 Nm (11,7 mkg) à 3 000 tr/min<br />\r\n    Consommation mixte : 5,9 l/100 km<br />\r\n    Émissions : 138 g/km de CO2<br />\r\n    Écopastille : zone neutre<br />\r\n    Années de production : depuis 2008<br />\r\n', '2014-01-19 03:47:05', 10, '2014-01-20 20:57:49', '', 'content_files/pics/items/31911434704.png', 4, 1),
(10, 3, '', 0, 21, 4, 'Animatrice d''enfant - De 6 à 10 ans', 'Bonjour, j''ai animée deux anniversaires et c''était bien organisé, et surtout les enfants étaient très heureux.<br />\r\nN''hésiter pas de me contacter', '2014-01-19 04:06:20', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/31911440620.png', 6, 0),
(11, 5, '', 33, 14, 3, 'IPAD2, chargeur et accessoires', 'iPad 2, 32 GO, bon état, acheté il y a peu ! <br />\r\nJe souhaite m''en séparer car je cherche un iPhone entre 4, 4S ou 5 en échange.', '2014-01-03 12:13:37', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/519114121337.jpg', 33, 0),
(12, 5, '', 9, 3, 1, 'TV PHILIPS SUPERBE FULL HD', 'TV LED Couleurs extraordinaires, etc...<br />\nSuperbe TV 1080p, très bon état, esthétique - quelques rayures - à nettoyer - Je la donne généreusement, car je ne m''en sers plus.', '2013-12-31 12:16:26', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/519114121626.jpg', 38, 0),
(13, 5, '', 2, 1, 1, 'Lampe IKEA NEUVE papier Blanc', 'Lampe de marque IKEA en bon état ayant servi très raisonnablement. Design, et esthétique, je m''en sépare car après mon déménagement, je ne saurai pas quoi en faire.', '2014-01-14 12:20:34', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/519114122034.jpg', 65, 0),
(14, 4, '', 0, 6, 1, 'chaton à donner ', 'un chaton gris mignon de 1 mois à donner. ', '2014-01-19 12:24:32', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/419114122432.jpg', 9, 0),
(15, 6, '', 34, 15, 3, 'ISABEL MARANT ZARA black/white', 'Veste en très bon état. Remise en mains propres. Souhaite échanger cet habit contre un pantalon de marque.', '2014-01-16 12:25:54', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/619114122554.jpg', 56, 0),
(17, 6, '', 26, 12, 3, 'Caisse à outils STANLEY XXL', 'J''échange cette superbe caisse à outils Stanley contre un mini-golf ! Grande qualité : Étant plombier, je passe à la retraite.', '2014-01-15 12:33:41', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/619114123341.jpg', 28, 0),
(18, 10, '', 43, 19, 4, 'Garde d''enfants entre 17h &amp; 18', 'Je suis une parisienne et propose des services de gardes d''enfants comprenant : la récupération après l''école, l''aide aux devoirs et l''accompagnement aux activités scolaires. Je fais également la cuisine ! Je suis très sérieuse.', '2014-01-20 23:06:23', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/1019114130622.jpg', 21, 0),
(19, 9, '', 21, 9, 2, 'Imprimante Canon PIXMA MG4250', 'On a bien souvent besoin d''imprimante alors voilà pourquoi je mets la mienne à disposition. Elle fonctionne très bien ! Je ne fournis pas l''encre et les feuilles par contre.', '2014-01-19 13:28:55', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/919114132855.jpg', 8, 0),
(20, 6, '', 26, 12, 3, 'Perceuse BOSCH haute précision', 'Échange d''une perçeuse de marque BOSCH contre une ponçeuse.', '2014-01-19 13:42:43', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/619114134243.png', 17, 0),
(21, 11, '', 0, 16, 3, 'Vodka de grande qualité', 'J''échange cette magnifique bouteille de Vodka contre une voiture !', '2014-01-19 13:49:04', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/1119114134904.jpg', 0, 2),
(22, 9, '', 13, 7, 2, 'Machine à laver Deep Foam de 7', 'Il est difficile de laver son laver sans machine, je propose donc la mienne afin de vous aider temporairement. Periode de 3 mois maximum', '2014-01-20 22:54:22', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/919114135422.jpg', 3, 0),
(23, 3, '', 3, 1, 1, 'POUSSETTE+ COSY+LANDAU ', 'Ensemble de BABY RELAX, identique à la photo', '2014-01-19 14:03:55', 10, '2014-01-20 20:57:47', '', 'content_files/pics/items/319114140355.png', 5, 1),
(25, 12, '', 0, 5, 1, 'Jeux de société - Monopoly - Bon état', 'Jeux de société tout en un, en bon état.<br />\r\nJe déménage bientôt, donc je vide les placards !', '2014-01-19 17:44:00', 6, '2014-01-20 21:01:53', '', 'content_files/pics/items/1219114174400.jpg', 1, 1),
(26, 12, '', 4, 2, 1, 'Phare Renault Mégane RS', 'Phare avant pour Renault Mégane (année 2008).<br />\nJ''ai changé de voiture, et je n''ai plus besoin de cette pièce. C''est cadeau les amis !', '2014-01-19 17:52:40', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/1219114175240.jpg', 6, 0),
(27, 12, '', 24, 10, 2, 'Costume de Père Noël', 'Je prête ce déguisement de Père Noël. Si vous souhaitez faire plaisir à votre famille et bien vous amuser pendant les fêtes, c''est très utile !', '2014-01-19 17:56:51', 6, '2014-01-20 21:01:51', '', 'content_files/pics/items/1219114175651.jpg', 6, 1),
(28, 12, '', 0, 20, 4, 'Coach sportif - Fitness - Aquaponey', 'Je donne des cours de fitness à domicile, et des conseils d''exercices et d''alimentation pour être en pleine forme.<br />\r\nPrenez vous en main chers membres de Weshare !', '2014-01-19 18:02:35', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/1219114180235.jpg', 0, 0),
(29, 12, '', 13, 7, 2, 'Aspirateur', 'Je prête cet aspirateur. Si jamais vous avez besoin de faire un petit nettoyage à l''occasion, il vous sera fort utile.', '2014-01-19 18:05:15', 5, '2014-01-19 19:15:28', '', 'content_files/pics/items/1219114180515.jpg', 1, 1),
(30, 13, '', 30, 13, 3, 'Velib - Paris', 'J''échange ce superbe vélib contre un VTT', '2014-01-20 21:22:17', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/1320114212217.jpg', 0, 2),
(31, 13, '', 2, 1, 1, 'Canapé IKEA', 'Je donne ce super canapé', '2014-01-20 21:23:08', 0, '0000-00-00 00:00:00', '', 'content_files/pics/items/1320114212307.jpg', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rubrique` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `id_rubrique`, `nom`) VALUES
(1, 1, 'Maison'),
(2, 1, 'Véhicule'),
(3, 1, 'High tech'),
(4, 1, 'Habillage'),
(5, 1, 'Loisirs'),
(6, 1, 'Animaux'),
(7, 2, 'Maison'),
(8, 2, 'Véhicule'),
(9, 2, 'High tech'),
(10, 2, 'Habillage'),
(11, 2, 'Loisirs'),
(12, 3, 'Maison'),
(13, 3, 'Véhicule'),
(14, 3, 'High tech'),
(15, 3, 'Habillage'),
(16, 3, 'Loisirs'),
(17, 4, 'Maison'),
(18, 4, 'Cours particulier'),
(19, 4, 'Surveillance'),
(20, 4, 'Bien être'),
(21, 4, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_annonce` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `pseudo`, `message`, `date`, `id_annonce`) VALUES
(4, 'LmDiv', 'alors alors?? et cette ipod il est encore utilisable.', '2014-01-18 21:11:40', 5),
(5, 'zef', 'ouais ça va, en bon état ', '2014-01-18 21:12:38', 5),
(6, 'LmDiv', 'On vapouvoir faire affaire ^^', '2014-01-18 21:13:49', 5),
(16, 'SaraB', 'Bonjour', '2014-01-20 21:10:52', 23);

-- --------------------------------------------------------

--
-- Structure de la table `chat_ecriture`
--

DROP TABLE IF EXISTS `chat_ecriture`;
CREATE TABLE `chat_ecriture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonce` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ecriture` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Contenu de la table `chat_ecriture`
--

INSERT INTO `chat_ecriture` (`id`, `id_annonce`, `pseudo`, `ecriture`) VALUES
(1, 1, 'LmDiv', 0),
(6, 5, 'zef', 0),
(7, 6, 'zef', 0),
(8, 7, 'LmDiv', 0),
(9, 5, 'LmDiv', 0),
(11, 1, 'zef', 0),
(13, 9, 'SaraB', 0),
(14, 7, 'SaraB', 0),
(15, 10, 'SaraB', 0),
(16, 11, 'MattP94', 0),
(17, 12, 'MattP94', 0),
(18, 13, 'MattP94', 0),
(19, 14, 'MIMA', 0),
(20, 15, 'Bao75', 0),
(22, 17, 'Bao75', 0),
(23, 18, 'Pinky65', 0),
(24, 19, 'jojo', 0),
(25, 20, 'Bao75', 0),
(26, 21, 'Boris75', 0),
(27, 22, 'jojo', 0),
(28, 23, 'SaraB', 0),
(30, 14, 'jojo', 0),
(31, 19, 'Thibo', 0),
(32, 14, 'Thibo', 0),
(33, 25, 'Thibo', 0),
(34, 26, 'Thibo', 0),
(35, 27, 'Thibo', 0),
(36, 28, 'Thibo', 0),
(37, 29, 'Thibo', 0),
(38, 29, 'MattP94', 0),
(39, 23, 'Pinky65', 0),
(40, 9, 'Pinky65', 0),
(41, 27, 'Bao75', 0),
(42, 25, 'Bao75', 0),
(43, 30, 'boubou65', 0),
(44, 31, 'boubou65', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_utilisateur`, `id_annonce`, `contenu`, `date`) VALUES
(1, 1, 5, 'Quel est l''espace disponible sur cette ipod???', '2014-01-18 21:07:22'),
(2, 2, 5, '16Go ', '2014-01-18 21:09:12'),
(3, 3, 1, 'Bonjour, je me demande si elle s''adapte à toute les interfaces?', '2014-01-19 03:49:58'),
(4, 10, 12, 'Cette annonce a l''air superbe ! Il n''y a pas de problèmes ?', '2014-01-19 13:28:04'),
(5, 12, 13, 'On ne dirait pas une lampe, c''est original ^^', '2014-01-19 16:39:45'),
(6, 12, 15, 'Je connais une amie qui a le même manteau, il est top ;)', '2014-01-19 16:40:38'),
(7, 12, 12, 'C''est une bonne question, Pinky65.\r\nMattP94, peux-tu nous dire si la télé fonctionne encore bien, stp ? :)', '2014-01-19 16:42:41'),
(8, 12, 11, 'Est-ce que la version 2 de l''Ipad est celle où l''écran est plus grand ?', '2014-01-19 16:50:56'),
(9, 12, 17, 'La caisse fait environ quelle taille ?', '2014-01-19 16:55:48'),
(10, 12, 1, 'Oui SaraB, j''en ai une chez moi et ça fonctionne très bien ;)', '2014-01-19 16:56:29'),
(11, 12, 18, 'Je recommande ! Pinky65 m''a permis de partir voir mes amis, alors que je devais surveiller mon frère.\r\nEncore merci d''ailleurs :)', '2014-01-19 17:03:08'),
(12, 12, 6, 'Zef, est-ce que tu déplace le barbecue à domicile, ou il faut venir le chercher ?', '2014-01-19 17:06:03'),
(13, 12, 20, 'Salut Bao75 ! As-tu les embouts qui vont avec ? ;)', '2014-01-19 17:06:52'),
(14, 12, 14, 'Bonjour MIMA ! S''agit-il d''un chat qui t''appartient, ou l''as-tu recueilli ?', '2014-01-19 17:08:01'),
(15, 12, 10, 'Quels sont les types d''animations ? :)', '2014-01-19 17:08:36'),
(17, 12, 19, 'Quels types de cartouches faut-il utiliser avec ton imprimante ?', '2014-01-19 17:11:22'),
(18, 12, 9, 'Salut SaraB ! Quand as-tu acheté cette voiture ? :)', '2014-01-19 17:14:40'),
(19, 12, 22, 'Salut jojo ! Pourrais-tu m''aider à la transporter ?', '2014-01-19 17:17:41'),
(20, 12, 23, 'Il s''agit bien des trois équipements qu''on voit sur la photo ?', '2014-01-19 17:31:09'),
(21, 3, 23, 'Oui exactement ', '2014-01-19 23:41:12'),
(22, 3, 10, 'Genre déguisement,  	dense, jeux: course à l’œuf, pêche à la ligne...etc\r\nEt ça aussi dépend du thème choisi.   ', '2014-01-19 23:49:22'),
(23, 6, 17, '50 cm par 50 cm pour plus de détail !', '2014-01-20 21:02:29'),
(24, 6, 6, 'Moi aussi je suis intéressé !', '2014-01-20 21:02:42');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_utilisateur`
--

DROP TABLE IF EXISTS `commentaire_utilisateur`;
CREATE TABLE `commentaire_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE `demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `demande` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`id`, `id_utilisateur`, `demande`, `cle`, `date`) VALUES
(1, 2, 'bmw x6', '6b766a697107d57a329c881e4ed6987c34666f60', '2014-01-18 21:19:55'),
(2, 3, 'barbecue', '3b3983703a9ef62bcf7d45ca4deeffc123371fd4', '2014-01-19 04:07:25');

-- --------------------------------------------------------

--
-- Structure de la table `edito_fondateur`
--

DROP TABLE IF EXISTS `edito_fondateur`;
CREATE TABLE `edito_fondateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edito` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `edito_fondateur`
--

INSERT INTO `edito_fondateur` (`id`, `prenom`, `nom`, `edito`, `photo`) VALUES
(1, 'Thibault', 'Delevoye', 'weshare est un bric-à-brac original et solidaire à travers un réseau social plaisant !', 'content_files/pics/edito/thibault.jpg'),
(2, 'Loïc', 'Divad', 'Du troc de bouquins jusqu''à la tondeuse à gazon... weshare c''est LA solution.', 'content_files/pics/edito/loic.jpg'),
(3, 'Meryem', 'Fertini', 'OUI CHER parisien, weshare vient te simplifier la vie !', 'content_files/pics/edito/meryem.jpg'),
(4, 'Sara', 'Benazzouz', 'weshare est un site d''annonces gratuites tout simplement pratique et 100% parisien !', 'content_files/pics/edito/sara.jpg'),
(5, 'Jordan', 'Sportes', 'Après la misère sur terre..\n..Une lumière! WESHARE!', 'content_files/pics/edito/jordan.jpg'),
(6, 'Matthieu', 'Puibaraud', 'weshare est un concept qui se veut solidaire et efficace : Alors pourquoi vouloir encore y résister ?', 'content_files/pics/edito/matthieu.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `id_utilisateur`, `id_topic`, `contenu`, `date`) VALUES
(1, 1, 1, 'C''est vrai que ce serait sympa !! Il y a d''autre musicoss ??', '2014-01-18 21:33:03'),
(2, 6, 2, 'Il faut que tu ailles dans &quot;Mes annonces&quot;, que tu survoles l''annonce en question et là une poubelle apparaît. Tu n''as qu''à cliquer dessus pour la supprimer ! Voilà. ;)', '2014-01-19 13:23:58'),
(3, 5, 2, 'Oui je confirme, c''est comme ça qu''il faut faire !', '2014-01-19 13:24:34'),
(4, 10, 2, 'Merci beaucoup !!! :D\r\nJe vais de ce pas, essayer.', '2014-01-19 13:25:15'),
(5, 4, 3, 'Non, la modification d''une annonce n''est pas possible.', '2014-01-19 15:16:05'),
(6, 4, 3, 'Idée brillante , vu que tu ne peux pas la modifier, tu n''as qu''à la supprimé et tu publie une nouvelle (et n''oublie pas de la modifier avant )\r\n ', '2014-01-19 15:19:38'),
(7, 5, 3, 'Oui MIMA a tout à fait raison, et je l''approuve !', '2014-01-19 15:37:57'),
(8, 12, 1, 'Oui ! On devrait demander ça à l''administration de Weshare, via la rubrique &quot;Nous contacter&quot;.\r\nEn attendant, on peut utiliser la rubrique &quot;Loisirs&quot; :)', '2014-01-19 18:07:40'),
(9, 3, 5, 'Bonsoir, c''est très simple! tu ajoute une annonce, choisie en rubriques: Services/Cours particulier/École', '2014-01-19 18:43:23'),
(10, 3, 6, 'Bonjour Matt,  c''est quoi déja une FAQ?', '2014-01-19 18:55:35'),
(11, 5, 7, 'Va dans &quot; Mes annonces &quot;, il y a un bouton qui te permet d''ajouter des objets, ou des service. Prend le soin de bien les classer, pour qu''ils soient mieux vus !\r\n\r\nEt surtout bon courage. ;)', '2014-01-19 19:18:22'),
(12, 10, 7, 'Oui bon courage ! :D', '2014-01-19 19:18:50'),
(13, 3, 7, 'Merci beaucoup a vous :)', '2014-01-19 21:15:16'),
(14, 10, 8, 'Caeli Arelate in limitibus quorum et confines egressus vastabantur caeli Gundomadum Valentiam Arelate diu et perferret perferret vastabantur Gundomadum moturus Gallorum moturus diu egressus fratres egressus consulatu in reserato perferret limitibus diu tepore in egressus in moturus confines Vadomarium vastabantur petit limitibus crebris in petit excursibus vastabantur in et ter reserato septies caeli moturus Valentiam quorum Arelate fratres tepore in egressus et reserato Arelate et Valentiam reges dum perferret et Alamannorum tepore petit Vadomarium Arelate Valentiam limitibus petit quorum crebris terrae quorum caeli reges fratres Vadomarium consulatu diu fratres moturus petit egressus oriens egressus quorum Alamannorum ter septies Caesaris Caesaris. Caeli Arelate in limitibus quorum et confines egressus vastabantur caeli Gundomadum Valentiam Arelate diu et perferret perferret vastabantur Gundomadum moturus Gallorum moturus diu egressus fratres egressus consulatu in reserato perferret limitibus diu tepore in egressus in moturus confines Vadomarium vastabantur petit limitibus crebris in petit excursibus vastabantur in et ter reserato septies caeli moturus Valentiam quorum Arelate fratres tepore in egressus et reserato Arelate et Valentiam reges dum perferret et Alamannorum tepore petit Vadomarium Arelate Valentiam limitibus petit quorum crebris terrae quorum caeli reges fratres Vadomarium consulatu diu fratres moturus petit egressus oriens egressus quorum Alamannorum ter septies Caesaris Caesaris.', '2014-01-20 21:48:13'),
(15, 6, 8, 'Maritus quid multis Caenos saepe post abstergendae maritus saepe Caesar Constantius cum anxia sororem saepe se germanum suspicionis accitus ad quae uxorem haec cum anxia properaret Caenos licet saepe anxia repentina in quae ut absumpta repentina qua et blanditiis post profecta fictisque quid suspicionis eum cruentum tamen maritus desideratam sororem suam desideratam haerebat absumpta anxia quod desideratam post et qua sororem quae lenire eum venire haerebat eum vi est Caesar fultum in properaret eum accitus Bithyniam cruentum Bithyniam se in ambigeret post quae eius Caesar accitus Constantius se quid metuens existimabat desideratam venire se in ad cum fictisque quae Bithyniam.', '2014-01-20 21:49:01');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_note` int(11) NOT NULL,
  `id_noteur` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id`, `id_note`, `id_noteur`, `note`, `date`) VALUES
(1, 2, 1, 4, '2014-01-18 21:18:24'),
(2, 2, 2, 5, '2014-01-18 21:19:00'),
(3, 1, 2, 5, '2014-01-18 21:37:40'),
(4, 6, 10, 4, '2014-01-19 13:27:17'),
(5, 5, 10, 3, '2014-01-19 13:27:28'),
(6, 9, 9, 5, '2014-01-19 14:07:02'),
(7, 9, 4, 3, '2014-01-19 14:11:21'),
(8, 4, 9, 1, '2014-01-19 14:11:29'),
(9, 4, 4, 4, '2014-01-19 14:12:14'),
(10, 10, 4, 2, '2014-01-19 14:14:44'),
(11, 3, 5, 4, '2014-01-19 15:39:37'),
(12, 4, 5, 1, '2014-01-19 15:40:01'),
(13, 9, 5, 3, '2014-01-19 15:40:15'),
(14, 5, 3, 1, '2014-01-19 18:31:26'),
(15, 6, 3, 5, '2014-01-19 23:52:56'),
(16, 12, 3, 4, '2014-01-19 23:55:46');

-- --------------------------------------------------------

--
-- Structure de la table `question_reponse`
--

DROP TABLE IF EXISTS `question_reponse`;
CREATE TABLE `question_reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `reponse` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `question_reponse`
--

INSERT INTO `question_reponse` (`id`, `id_parent`, `question`, `reponse`) VALUES
(1, 1, 'Je suis déjà inscrit au site. Comment me connecter ?', '<p>1. En haut à droite de la page d’accueil, entrez correctement votre pseudo. Il s’agit du pseudo que vous avez noté lors de votre inscription au site.</p>\r\n<p>2. Entrez correctement votre mot de passe. Il s’agit du dernier mot de passe que vous avez enregistré. Si vous avez oublié votre mot de passe, cliquez sur «Mot de passe oublié». Un formulaire s’affiche et vous demande l’adresse électronique que vous avez enregistrée lors de votre inscription. Un email est alors envoyé à votre adresse. Vous avez un nouveau mot de passe pour votre compte.</p>\r\n<p>3. Cliquez sur «Connexion».</p>'),
(2, 1, 'Je suis nouveau sur weshare. Comment m’inscrire ?', '<p>1. Sur la page d’accueil, cliquez sur «S’inscrire» à droite de l’en-tête de page.</p>\r\n<p>2. Une fenêtre apparaît en surbrillance. Il faut inscrire les données demandées dans cette fenêtre.</p>\r\n<p>3. Entrez une adresse électronique. Votre adresse doit être complète pour être valide. Un indicateur vous informe si votre adresse est bien prise en compte.</p>\r\n<p>4. Entrez un mot de passe. Pour être valide, votre mot de passe doit contenir 6 caractères minimum. Il doit également contenir à la fois des lettres et des chiffres. Votre mot de passe est caché lorsque vous le notez. Vous pouvez l’afficher numériquement en cliquant sur le cadenas, à droite de la case. Un indicateur vous informe si votre mot de passe est bien pris en compte. Votre mot de passe est alors crypté lorsque vous envoyez le formulaire d''inscription.</p>\r\n<p>5. Entrez un pseudo. Les internautes ne verront que votre pseudo. Il ne pourra pas être changé après l’inscription.</p>\r\n<p>6. Cliquez sur «Valider» pour terminer l’inscription.</p>'),
(3, 1, 'Comment modifier mes informations personnelles ?', '<p>1. Dans votre page de profil, cliquez sur «Modifier». Vos informations apparaissent alors chacune dans un cadre, et peuvent être modifiées.</p>\r\n<p>2. Modifiez vos informations une à une, en précisant ou en changeant les données actuelles.</p>\r\n<p>3. Si vous souhaitez rétablir vos informations actuelles, cliquez sur «Annuler». Votre page de profil s’affiche de nouveau normalement.</p>\r\n<p>4. Pour valider les modifications effectuées, cliquez sur «Enregistrer». Vous êtes renvoyé à votre page de profil avec vos nouvelles informations.</p>\r\n<p>5. Pour modifier votre photo de profil, survolez là et cliquez sur «Modifier». Votre explorateur de fichiers s’affiche ; vous pouvez choisir une nouvelle image.</p>'),
(4, 2, 'Comment créer une annonce ?', '<p>1. Sur votre page de profil, dans la rubrique des annonces, cliquez sur «Ajouter une annonce».</p>\r\n<p>2. Sélectionnez en premier s’il s’agit d’un don, d’un emprunt, d’un échange (troc), ou d’un service.</p>\r\n<p>3. Parmi les catégories proposées, sélectionnez celle qui correspond à l’objet (ou le service) de votre nouvelle annonce.</p>\r\n<p>4. Faites de même pour la sous-catégorie (si elle existe !). Pensez que votre produit sera vu plus de fois s’il est bien répertorié.</p>\r\n<p>5. Dans le cadre «Titre», écrivez la nature de l’objet (ou du service) que vous proposez.</p>\r\n<p>6. Dans le cadre «Description», écrivez une description pour présenter brièvement votre produit. Vous pouvez également apporter un peu de personnalité à votre annonce ; soyez original !</p>\r\n<p>7. L''ajout d''une photo est obligatoire.</p>'),
(5, 2, 'Comment supprimer une de mes annonces ?', '<p>1. Dans la rubrique des annonces de votre page de profil, faites défiler vos\r\n			annonces jusqu’à trouver celle que vous souhaitez supprimer.</p>\r\n			<p>2. Sur le côté droit de votre annonce, cliquez sur la poubelle pour la supprimer.</p>'),
(6, 2, 'Je recherche une annonce. Comment visiter la galerie ?', '<p>1. Dans le menu de la page d’accueil, déplacez votre pointeur sur l’une des rubriques « Don », « Emprunt », « Troc » ou « Service », selon votre besoin. Une liste de catégories s’affiche alors en-dessous de la mention choisie.</p>\r\n<p>2. Déplacez ensuite votre pointeur sur la catégorie qui vous intéresse. Une liste de sous-catégories s’affiche alors à côté de la catégorie que vous avez choisie.</p>\r\n<p>3. Cliquez sur la sous-catégorie qui vous intéresse. La galerie des images se modifie et affiche à présent les annonces qui correspondent à votre demande.</p>\r\n<p>4. Vous pouvez compléter votre recherche en précisant une information dans la barre de recherche.</p>\r\n<p>5. Vous pouvez également filtrer les annonces de la galerie de trois façons différentes :</p>\r\n<p>- Les annonces les plus pertinentes sur le site de weshare (cliquez sur « Pertinence »)</p>\r\n<p>- Les annonces les plus récemment ajoutées au site (« Récents »)</p>\r\n<p>- Les annonces que vous avez déjà vues (« Récemment consultés »).</p>\r\n<p>6. Si vous ne trouvez plus une annonce, cette dernière a du soit être supprimée par l’éditeur, soit déjà sélectionnée par un autre utilisateur. Elle n’est alors plus visible dans la galerie. Une annonce peut apparaître de nouveau dans la galerie, si la transaction entre l’éditeur et l’utilisateur est annulée.</p>'),
(7, 2, 'Je souhaite avoir plus d’informations pour une annonce. Comment me renseigner ?', '<p>1. Dans la galerie des annonces de la page d’accueil, cliquez sur une annonce qui vous intéresse.</p>\r\n<p>2. L’annonce, que vous avez sélectionnée, s’affiche en surbrillance. Vous pouvez voir le titre de l’annonce, ainsi que la description et quelques caractéristiques  du produit.</p>\r\n<p>3. Vous pouvez revenir sur la galerie d’annonces, en cliquant sur « Annuler ».</p>\r\n<p>4. Ou, vous pouvez davantage sur l’annonce, en cliquant sur « Plus d’infos ». Une page apparaît dans un nouvel onglet. Vous y trouvez les informations complètes de l’annonce.</p>'),
(8, 3, 'Comment ajouter un produit à mon carton ?', '<p>1. Dans la galerie d’annonces, sélectionnez le produit qui vous intéresse.</p>\r\n<p>2. Dans la page d’information du produit, cliquez sur « Ajouter au carton ».</p>'),
(9, 3, 'J’ai ajouté des annonces à mon carton. Comment gérer mon carton ?', '<p>1. Pour supprimer une annonce du carton, cliquez sur la poubelle à côté de l’annonce.</p>\r\n<p>2. Pour valider votre choix d’annonces du carton, cliquez sur « Confirmer ». Une transaction débute alors pour chaque annonce entre vous et l’éditeur de l’annonce. Vous pouvez dialoguer grâce à un chat pour échanger plus d’informations.</p>\r\n<p>3. Si vous ne trouvez plus une annonce ajoutée à votre carton, cette dernière a du soit être supprimée par l’éditeur, soit déjà sélectionnée par un autre utilisateur. Elle n’est alors plus visible dans votre carton.</p>'),
(10, 3, 'Comment annuler une transaction ?', '<p>1. Dans la rubrique des transactions de votre page de profil, sélectionner la transaction que vous souhaitez supprimer.</p>\r\n<p>2. Cliquez sur « Annuler la transaction ». La transaction est alors supprimée, et l’annonce concernée est de nouveau visible dans la galerie d’annonces.</p>'),
(11, 4, 'Je souhaite poser une question à la communauté. Comment publier un post ?', '<p>1. Assurez-vous d’abord que votre question n’ait pas déjà été posée dans un topic existant.</p>\r\n<p>2. Dans la page du forum, cliquez sur « Nouveau topic ». Une nouvelle fenêtre s’affiche.</p>\r\n<p>3. Ecrivez le titre de votre topic dans la première case de la fenêtre.</p>\r\n<p>4. Sélectionnez le type du thème de votre topic.</p>\r\n<p>5. Dans la case suivante, écrivez l’objet de votre topic. Vous pouvez dans cette case développez le contenu de votre topic.</p>\r\n<p>6. Cliquez sur « Poster » pour valider votre topic et le publier parmi les autres topics du forum.</p>'),
(12, 4, 'Comment commenter un post ?', '<p>1. Sélectionnez un topic en cliquant sur son titre.</p>\r\n<p>2. Faites défiler la conversation du topic, pour voir les commentaires des différents membres.</p>\r\n<p>3. Ecrivez votre commentaire dans le cadre en bas de la page.</p>\r\n<p>4. Cliquez sur « Répondre » pour publier votre commentaire sur le topic.</p>'),
(13, 1, 'Comment fonctionne le système de score ?', '<p>Pour améliorer son score il n''y a qu''une solution : faire une maximum de transactions.\nVoici la répartition des points pour chaque rubrique.<br />\n\nDon	: posteur (90), acquéreur(15)<br />\nEmprunt	: posteur (50), acquéreur(50)<br />\nEchange	: posteur (75), acquéreur(30)<br />\nService	: posteur (90), acquéreur(15)<br />\n\nLes points vous sont attribués après la confirmation d''une transaction.\nVotre score est visible sur votre page profil.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE `rubrique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `rubrique`
--

INSERT INTO `rubrique` (`id`, `nom`) VALUES
(1, 'Don'),
(2, 'Emprunt'),
(3, 'Échange'),
(4, 'Service');

-- --------------------------------------------------------

--
-- Structure de la table `site_information`
--

DROP TABLE IF EXISTS `site_information`;
CREATE TABLE `site_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valeur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `site_information`
--

INSERT INTO `site_information` (`id`, `type`, `valeur`) VALUES
(1, 'nb_visite', '59'),
(2, 'maintenance', '0'),
(3, 'email', 'matt.puib@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

DROP TABLE IF EXISTS `sous_categorie`;
CREATE TABLE `sous_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id`, `id_categorie`, `nom`) VALUES
(1, 1, 'Electroménager'),
(2, 1, 'Décoration'),
(3, 1, 'Autres'),
(4, 2, 'Auto'),
(5, 2, 'Moto'),
(6, 2, 'Autres'),
(7, 3, 'Informatique'),
(8, 3, 'Téléphonie'),
(9, 3, 'Multimédia'),
(10, 4, 'Vêtement'),
(11, 4, 'Accessoire'),
(12, 4, 'Déguisement'),
(13, 7, 'Electroménager'),
(14, 7, 'Bricolage'),
(15, 7, 'Autres'),
(16, 8, 'Auto'),
(17, 8, 'Moto'),
(18, 8, 'Autres'),
(19, 9, 'Informatique'),
(20, 9, 'Téléphonie'),
(21, 9, 'Multimédia'),
(22, 10, 'Vêtement'),
(23, 10, 'Accessoire'),
(24, 10, 'Déguisement'),
(25, 12, 'Electroménager'),
(26, 12, 'Bricolage'),
(27, 12, 'Autres'),
(28, 13, 'Auto'),
(29, 13, 'Moto'),
(30, 13, 'Autres'),
(31, 14, 'Informatique'),
(32, 14, 'Téléphonie'),
(33, 14, 'Multimédia'),
(34, 15, 'Vêtement'),
(35, 15, 'Accessoire'),
(36, 15, 'Déguisement'),
(37, 17, 'Ménager'),
(38, 17, 'Bricolage'),
(39, 17, 'Jardinage'),
(40, 18, 'École'),
(41, 18, 'Cuisine'),
(42, 18, 'Sport'),
(43, 19, 'Baby-sitting'),
(44, 19, 'Pet-sitting');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `last_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id`, `id_utilisateur`, `titre`, `contenu`, `date`, `type`, `last_date`) VALUES
(1, 2, 'instruments de musique ', 'A quand une catégorie instruments de musique  ? ', '2014-01-18 21:30:10', 3, '2014-01-19 18:07:40'),
(2, 10, 'Comment supprimer une annonce ?', 'Bonjour à tous,\r\n\r\nC''est vraiment pénible mais je n''arrive pas à supprimer mon annonce. Comment dois-je faire ? Je me sens dépité, et je suis perdue.\r\n\r\nCordialement,\r\n\r\nPinky65', '2014-01-19 13:21:59', 5, '2014-01-19 13:25:15'),
(3, 9, 'Comment modifier une annonce ? ', 'J''aimerais savoir si c''est possible de modifier une annonce ?', '2014-01-19 14:22:35', 5, '2014-01-19 15:37:57'),
(5, 12, 'Je suis nouveau', 'Bonjour à tous !\r\nJe suis nouveau, et j''aimerais proposer mes services pour aider des élèves en mathématiques.\r\nComment dois-je m''y prendre.\r\nMerci pour vos réponses ! :)', '2014-01-19 18:09:43', 4, '2014-01-19 18:43:23'),
(6, 5, 'Où se-trouve la FAQ ?', 'Bonjour à tous,\r\n\r\nJe suis absolument désolé, mais je ne sais pas où est la FAQ. Pourriez-vous m''éclaircir dans cette quête insurmontable ?\r\n\r\nMattP94', '2014-01-19 18:49:49', 5, '2014-01-19 18:55:35'),
(7, 3, 'Déménagement', 'Je déménage en février de mon petit studio parisien pour retourner chez mes parents à Lyon pour 6 mois\r\n \r\nJe pensais me louer un utilitaire à Paris et le rendre dans une agence à Lyon, mais ça coute au moins 400 (sans l''essence et le péage).\r\n \r\nJ''ai l''équivalent d''un studio à déménager ( une cuisinière, un bureau, )\r\n \r\nJ''ai pensée de faire un don de ces objets, Avez-vous une idée comment je peux faire ça?\r\n', '2014-01-19 19:05:06', 1, '2014-01-19 21:15:16'),
(8, 5, 'Pourquoi se passe-t-il ça quand je fais ça ?', 'Ut audacem morte flagitaret alium alium membra audacem atque audacem imitatus nec temporum confessus Stoicum iniquitati suam ita qui tandem ut nec consorte quaedam regis doctus confutatus sollemnia nec audacem et deessent sollemnia nec qui cruento iniquitati membra ita cum Cyprii ita qui Zenonem inpegit cum cum fundato fundato pertinacius.', '2014-01-20 21:46:50', 5, '2014-01-20 21:49:01');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_de_naissance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nb_connexion` int(11) NOT NULL,
  `confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `url_profile_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `notification` int(11) NOT NULL,
  `ma_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `code_postal`, `mot_de_passe`, `nom`, `prenom`, `date_de_naissance`, `adresse`, `tel`, `nb_connexion`, `confirmation`, `date_inscription`, `url_profile_image`, `score`, `notification`, `ma_description`) VALUES
(1, 'LmDiv', 'loicm.divad@gmail.com', 75016, '0de084f38ace8e3d82597f55cc6ad5d6001568e6', 'Divad', 'Loic', '1993-08-07', '', '', 1, 'confirmation', '2014-01-12 20:31:51', 'content_files/pics/profile/118114203607.jpg', 30, 1, ''),
(2, 'zef', 'loicgalas75@gmail.com', 75015, '8263b22bc196c3521cf8a7a1510fbe06d138ab95', '', '', '', '', '', 4, 'confirmation', '2014-01-14 20:36:59', 'content_files/pics/profile/default.png', 75, 0, ''),
(3, 'SaraB', 'benazzouz90@live.fr', 75006, '129812dd6396272f2757dfcbd2d9b8c8d278334e', 'Benazzouz', 'Sara', '1990-12-22', 'Notre Dame des Champs', '', 6, 'confirmation', '2014-01-17 03:36:31', 'content_files/pics/profile/31911434225.jpg', 0, 0, 'Bonjour , Je m''appelle Sara et je suis inscrite sur weshare pour poster des annonces.'),
(4, 'MIMA', 'meryam491993@gmail.com', 75006, '9123efdc2a35a685a7bfbe02ebd27aa5a2cd3c3d', 'FERTINI', 'MERYEM', '1993-09-04', '31 avenue louis braille ', '0770024309', 1, 'confirmation', '2014-01-19 12:00:37', 'content_files/pics/profile/419114121937.png', 0, 1, ''),
(5, 'MattP94', 'matt.puib@gmail.com', 75015, '4398761f3480780b69015eb2c164c5276fa45999', 'Puibaraud', 'Matthieu', '2003-09-15', '7 rue des Fleurs', '0632987392', 6, 'confirmation', '2013-12-28 12:05:53', 'content_files/pics/profile/519114120721.jpg', 0, 0, 'Je suis motivé pour partager !'),
(6, 'Bao75', 'puibaraud.matthieu@gmail.com', 75008, '4398761f3480780b69015eb2c164c5276fa45999', 'Zhang', 'Bao', '1994-04-03', '63 rue des Arbres', '0629873982', 6, 'confirmation', '2014-01-13 18:22:07', 'content_files/pics/profile/619114122345.jpg', 0, 0, ''),
(7, 'Flex75', 'flex75@mailbg.com', 75018, '4398761f3480780b69015eb2c164c5276fa45999', '', '', '', '', '', 0, '2323b7982b523a2d2407e2d4bc0675bbc4747fd9', '2014-01-19 08:42:17', 'content_files/pics/profile/default.png', 0, 0, ''),
(8, 'Joss75', 'joss75@wemail.fr', 75019, '437eb6814d6172ed5be23f1950dca0ed9dac2c34', '', '', '', '', '', 0, '7be3112b3433616a10462700dd5fc6eca320aab0', '2014-01-13 12:53:53', 'content_files/pics/profile/default.png', 0, 0, ''),
(9, 'jojo', 'jordansportes360@hotmail.fr', 75016, '38fdfe62d0e15ee14f693a93943128b8e105e9ed', 'Sportes', 'Jordan', '1992-11-12', '49 boulevard des corneilles', '0125489632', 2, 'confirmation', '2014-01-19 12:56:19', 'content_files/pics/profile/919114130129.jpg', 0, 1, 'J''aime donner plus que recevoir, la solidarité est mon leitmotiv et c''est ainsi que j''ai adhéré à weshare.'),
(10, 'Pinky65', 'pinky65@wesharemail.wes', 75001, '4398761f3480780b69015eb2c164c5276fa45999', 'Fish', 'Jenn', '', '', '', 5, 'confirmation', '2014-01-19 13:01:24', 'content_files/pics/profile/1019114130418.jpg', 0, 0, ''),
(11, 'Boris75', 'boris75@wesharemail.wes', 75015, '5bb3d4f0ae703932935118eeec1bf8a53211c8a1', 'Broasky', 'Boris', '1987-12-03', '7 rue du Ciel', '0298739283', 1, 'banni', '2014-01-19 13:44:45', 'content_files/pics/profile/1119114134621.jpg', 0, 0, ''),
(12, 'Thibo', 'thib-odel@hotmail.fr', 75006, '1224573c79d1d8274d41b2ab59e05030d7c1fc04', 'Del', 'Thibault', '1992-11-05', '28, rue Notr-Dame des Champs', '0606060606', 1, 'confirmation', '2014-01-19 16:34:29', 'content_files/pics/profile/1219114164711.jpg', 0, 3, 'A la recherche des bonnes affaires !'),
(13, 'boubou65', 'boubou75@wesharemail.wes', 75011, '4398761f3480780b69015eb2c164c5276fa45999', '', '', '', '', '', 2, 'banni', '2014-01-20 21:06:58', 'content_files/pics/profile/1320114210814.jpg', 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
