-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 mars 2020 à 14:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `meetgeek`
--

-- --------------------------------------------------------

--
-- Structure de la table `aime`
--

DROP TABLE IF EXISTS `aime`;
CREATE TABLE IF NOT EXISTS `aime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEcrit` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

DROP TABLE IF EXISTS `ecrit`;
CREATE TABLE IF NOT EXISTS `ecrit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text,
  `dateEcrit` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idAuteur` int(11) NOT NULL,
  `idAmi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecrit`
--

INSERT INTO `ecrit` (`id`, `titre`, `contenu`, `dateEcrit`, `image`, `idAuteur`, `idAmi`) VALUES
(35, '', 'Ahaha, trop marrant les étudiants ! Les 2e année en galèrent de ouf avec leur minifacebook.<br>\r\nBientôt le redoublement pour certains !!<br>\r\nA l\'année prochaine !', '2019-12-13 14:55:16', NULL, 23, 23),
(23, '', 'Ces étudiants en 2ème année, ils sont incroyable en plus ! Année validée ! :)', '2019-12-09 14:00:46', NULL, 23, 30),
(21, '', 'Incroyable ce minifacebook !', '2019-12-09 13:58:36', NULL, 23, 23),
(34, '', 'Mon minifacebook est prêt pour le 17 décembre !', '2019-12-13 16:52:52', 'uploads/connexion.png', 6, 23),
(84, '', 'Tu n\'es qu\'une petite PIZZA', '2019-12-16 21:17:25', NULL, 6, 9),
(37, '', 'T\'es penses quoi de MeetGeek ? Ca te dirait d\'en discuter autour d\'une bonne pizza ? ', '2019-12-13 17:04:05', 'uploads/pizza.png', 23, 1),
(39, '', 'Go faire un S4 WEB, les amis !!!!!!', '2019-12-13 19:54:11', NULL, 6, 6),
(68, 'énorme ton avatar ', 'Mais je préfère le chat sushi hihi', '2019-12-16 16:43:49', 'uploads/flat,750x,075,f-pad,750x1000,f8f8f8.u4.jpg', 24, 6),
(71, 'J\'adore ce minifacebook ', 'Le lien du site sera sur mon portfolio ;) ', '2019-12-16 17:04:18', NULL, 6, 6),
(80, 'TabTab', 'Yo le sang, ça farte ?', '2019-12-16 19:23:07', NULL, 7, 23),
(52, 'Mr Dubois pas content ...', 'Il a perdu son jeu de carte collector, rt si c\'est trise', '2019-12-15 23:12:37', NULL, 23, 23),
(63, '', '', '2019-12-16 14:46:41', 'uploads/mage.jpg', 23, 23),
(64, '', 'ROBOT.mp3', '2019-12-16 16:17:05', 'uploads/HMZU2.jfif', 27, 27),
(65, 'Coucou !', 'Ton avatar est très beau cher collègue !', '2019-12-16 16:22:49', NULL, 27, 23),
(66, 'Une partie de GO ?', 'J\'aimerais t\'affronter demain soir, es-tu disponible ? ', '2019-12-16 16:33:13', 'uploads/téléchargement.jfif', 27, 23),
(67, 'AVEC PLAISIR !!!', 'J\'accepte ton invitation pour la pizza mais je prends celle à l\'ananas ;)', '2019-12-16 16:35:51', NULL, 1, 23);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

DROP TABLE IF EXISTS `lien`;
CREATE TABLE IF NOT EXISTS `lien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur1` int(11) NOT NULL,
  `idUtilisateur2` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`id`, `idUtilisateur1`, `idUtilisateur2`, `etat`) VALUES
(85, 6, 1, 'banni'),
(53, 6, 9, 'ami'),
(128, 1, 7, 'attente'),
(126, 23, 22, 'attente'),
(91, 23, 21, 'attente'),
(92, 23, 20, 'attente'),
(90, 1, 23, 'ami'),
(89, 1, 21, 'attente'),
(88, 1, 20, 'attente'),
(87, 1, 9, 'attente'),
(98, 6, 21, 'banni'),
(127, 23, 25, 'attente'),
(96, 7, 23, 'ami'),
(97, 26, 23, 'attente'),
(102, 27, 23, 'ami'),
(103, 27, 1, 'ami'),
(100, 6, 24, 'ami'),
(79, 6, 22, 'attente'),
(80, 6, 23, 'ami'),
(83, 6, 25, 'ami'),
(104, 27, 22, 'ami'),
(105, 27, 6, 'ami'),
(106, 27, 25, 'attente'),
(107, 27, 20, 'ami'),
(108, 27, 21, 'attente'),
(109, 27, 26, 'attente'),
(110, 1, 24, 'attente'),
(111, 27, 21, 'ami'),
(112, 27, 21, 'ami'),
(113, 24, 21, 'ami'),
(114, 24, 26, 'attente'),
(115, 24, 25, 'attente'),
(116, 24, 28, 'attente'),
(117, 24, 22, 'attente'),
(118, 24, 20, 'attente'),
(119, 21, 20, 'attente'),
(120, 21, 25, 'attente'),
(121, 21, 26, 'attente'),
(122, 21, 22, 'attente'),
(123, 21, 28, 'attente'),
(125, 6, 7, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remember` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `email`, `remember`, `avatar`) VALUES
(1, 'gilles', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'gilles@toto.fr', '', 'avatar/lesang.jpg'),
(6, 'sarah', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'gilles@toto.fr', NULL, 'avatar/bulldogfr.gif'),
(7, 'JUL LE SANG', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'gilles@toto.fr', NULL, 'avatar/jul.jpg'),
(8, 'Arthur', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'gilles@toto.fr', NULL, 'avatar/arthur.jpg'),
(9, 'Pizza', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'gilles@toto.fr', NULL, 'avatar/pizza.png'),
(23, 'Tabary', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'tabary@toto.fr', NULL, 'avatar/mage.jpg'),
(22, 'Pikachu', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'pikachu@toto.fr', NULL, 'avatar/pikachu.png'),
(21, 'Sonic', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'sonic@toto.fr', NULL, 'avatar/sonic.jpg'),
(20, 'Mario', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'mario@toto.fr', NULL, 'avatar/mario.jfif'),
(24, 'Helena', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'helena@toto.fr', NULL, 'avatar/Aashe.png'),
(25, 'PacMac', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'pacmac@toto.fr', NULL, 'avatar/pacmac.jpg'),
(26, 'PereNoel', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'perenoel@toto.fr', NULL, 'avatar/perenoel.jpg'),
(27, 'Dubois', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'dubois@toto.fr', NULL, 'avatar/robot.jpg'),
(28, 'Sans', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'sans@toto.fr', NULL, 'avatar/sans.jpg'),
(30, 'Audemard', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'audemard@toto.fr', NULL, 'avatar/tortue.jpg'),
(41, 'viseur', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'viseur@toto.fr', NULL, 'avatar/86278422-graduation-cap-étudiant-avatar-pixel-art-cartoon-rétro-style-de-jeu.jpg'),
(40, 'sushi', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'sushi@toto.fr', NULL, 'avatar/flat,750x,075,f-pad,750x1000,f8f8f8.u4.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
