-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 29 mai 2020 à 08:15
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alertecitoyen62141cdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `accept`
--

DROP TABLE IF EXISTS `accept`;
CREATE TABLE IF NOT EXISTS `accept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_departement` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `nom_ville`, `cp`, `nom_departement`) VALUES
(1, 'Douai', '59500', 'Nord'),
(2, 'Sin-le-Noble', '59450', 'Nord'),
(3, 'Waziers', '59119', 'Nord'),
(4, 'Auby', '59950', 'Nord'),
(5, 'Cuincy', '59553', 'Nord'),
(6, 'Lallaing', '59167', 'Nord'),
(7, 'Roost-Warendin', '59286', 'Nord'),
(8, 'Flers-en-Escrebieux', '59128', 'Nord'),
(9, 'Flines-les-raches', '59148', 'Nord'),
(10, 'Dechy', '59187', 'Nord'),
(11, 'Lambres-lez-Douai', '59552', 'Nord'),
(12, 'Guesnain', '59287', 'Nord'),
(13, 'Raimbeaucourt', '59283', 'Nord'),
(14, 'Arleux', '59151', 'Nord'),
(15, 'Courchelettes', '59552', 'Nord'),
(16, 'Râches', '59194', 'Nord'),
(17, 'Faumont', '59310', 'Nord'),
(18, 'Féchain', '59247', 'Nord');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_envoi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `sujet`, `message`, `date_envoi`) VALUES
(23, 'test', 'david', 'torkhan@wanadoo.fr', 'ceci est un test', 'car il en faut', '2020-04-09 09:07:08'),
(24, 'test', 'david', 'torkhan@wanadoo.fr', 'ceci est un test', 'car il en faut', '2020-04-09 09:09:36'),
(25, 'test', 'david', 'torkhan@wanadoo.fr', 'ceci est un test', 'car il en faut', '2020-04-09 09:10:04'),
(26, 'fghfghfg', 'fghfghfg', 'torkhan2706@gmail.com', 'test', 'fdsfdf sdgg sgdsgsg g', '2020-04-09 09:12:51'),
(27, 'fghfghfg', 'fghfghfg', 'torkhan2706@gmail.com', 'test', 'fdsfdf sdgg sgdsgsg g', '2020-04-09 09:26:21'),
(28, 'fghfghfg', 'fghfghfg', 'torkhan2706@gmail.com', 'test', 'fdsfdf sdgg sgdsgsg g', '2020-04-09 09:38:01'),
(29, 'fghfghfg', 'fghfghfg', 'torkhan2706@gmail.com', 'test', 'fdsfdf sdgg sgdsgsg g', '2020-04-09 09:38:45'),
(30, 'fghfghfg', 'fghfghfg', 'torkhan2706@gmail.com', 'test', 'fdsfdf sdgg sgdsgsg g', '2020-04-09 09:39:18'),
(31, 'fghfghfg', 'fghfghfg', 'fghfgh@ghfdg.ht', 'dfgdfgfd', 'qsfqfv', '2020-04-09 09:39:39'),
(32, 'fghfghfg', 'fghfghfg', 'fghfgh@ghfdg.ht', 'dfgdfgfd', 'qsfqfv', '2020-04-09 09:42:47'),
(33, 'fghfghfg', 'fghfghfg', 'fghfgh@ghfdg.ht', 'dfgdfgfd', 'qsfqfv', '2020-04-09 10:18:48'),
(34, 'fghfghfg', 'fghfghfg', 'fghfgh@ghfdg.ht', 'dfgdfgfd', 'qsfqfv', '2020-04-09 10:18:53');

-- --------------------------------------------------------

--
-- Structure de la table `destinataire`
--

DROP TABLE IF EXISTS `destinataire`;
CREATE TABLE IF NOT EXISTS `destinataire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_destinataire_id` int(11) DEFAULT NULL,
  `id_validation_id` int(11) DEFAULT NULL,
  `id_adresse_id` int(11) DEFAULT NULL,
  `id_motif_id` int(11) DEFAULT NULL,
  `prenom_destinataire` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_destinataire` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mail_destinataire` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_telephone_destinataire` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_rue_destinataire` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_rue_destinataire1` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_rue_destinataire2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ok_sms_destinataire` tinyint(1) DEFAULT NULL,
  `ok_mail_destinataire` tinyint(1) DEFAULT NULL,
  `accord_rgpd_destinataire` tinyint(1) DEFAULT NULL,
  `date_enregistrement_destinataire` datetime DEFAULT NULL,
  `date_validation_destinataire` datetime DEFAULT NULL,
  `date_modification_destinataire` datetime DEFAULT NULL,
  `statut_destinataire` longblob,
  PRIMARY KEY (`id`),
  KEY `IDX_FEA9FF925F3C2ABE` (`id_type_destinataire_id`),
  KEY `IDX_FEA9FF921C0F9935` (`id_validation_id`),
  KEY `IDX_FEA9FF92E86D5C8B` (`id_adresse_id`),
  KEY `IDX_FEA9FF928035548C` (`id_motif_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `destinataire`
--

INSERT INTO `destinataire` (`id`, `id_type_destinataire_id`, `id_validation_id`, `id_adresse_id`, `id_motif_id`, `prenom_destinataire`, `nom_destinataire`, `adresse_mail_destinataire`, `numero_telephone_destinataire`, `numero_rue_destinataire`, `nom_rue_destinataire1`, `nom_rue_destinataire2`, `ok_sms_destinataire`, `ok_mail_destinataire`, `accord_rgpd_destinataire`, `date_enregistrement_destinataire`, `date_validation_destinataire`, `date_modification_destinataire`, `statut_destinataire`) VALUES
(92, 1, 2, 13, NULL, 'dfr', 'Leclercq', 'sfddsf@dfg.fr', '06 20 50 41 46', '92', 'sdfsdf', NULL, 1, 1, 1, '2020-04-06 14:43:55', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(93, 1, 2, 12, NULL, 'dfr', 'Leclercq', 'sfddsf@dfg.fr', '06 20 50 41 46', '92', 'sdfsdf', NULL, 1, 1, 1, '2020-04-06 14:58:14', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(94, 1, 2, 2, NULL, 'david', 'Maurice', 'sfddsf@dfg.fr', NULL, '92', 'rue du paradis', NULL, 0, 1, 1, '2020-04-06 16:29:57', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(96, 1, 2, 1, NULL, 'roger', 'Durand', 'sfd25dsf@dfg.fr', NULL, '952', 'rue de l\'espérance', NULL, 0, 1, 1, '2020-04-15 13:20:31', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(97, 1, 2, 16, NULL, 'roger', 'Durand', 'sfd25dsf@dfg.fr', NULL, '952', 'rue de l\'espérance', NULL, 0, 1, 1, '2020-04-15 13:26:12', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(98, 1, 2, 3, NULL, 'toto', 'toto', 'sfddsf@dfg.fr', '06 20 50 41 46', '952', 'rue de l\'espérance', NULL, 1, 1, 1, '2020-04-16 09:05:48', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(99, 1, 2, 15, NULL, 'refus', 'test', 'sfddsf@dfg.fr', NULL, '92', 'rue du paradis', NULL, 0, 1, 1, '2020-04-16 13:36:34', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(100, 1, 2, 14, NULL, 'dfr', 'tesrefus', 'sfd25dsf@dfg.fr', NULL, '92', 'rue de l\'espérance', NULL, 0, 1, 1, '2020-04-16 13:40:22', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(101, 1, 2, 10, NULL, 'roger', 'Leclercq', 'torkhan@wanadoo.fr', NULL, '92', 'rue des alouettes', NULL, 0, 1, 1, '2020-04-16 13:55:58', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(102, 1, 2, 9, NULL, 'david', 'Leclercq', 'torkhan@wanadoo.fr', NULL, '92', 'rue des alouettes', NULL, 0, 1, 1, '2020-04-16 14:02:18', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(103, 1, 2, 8, NULL, 'david', 'Leclercq', 'torkhan@wanadoo.fr', NULL, '952', 'rue des alouettes', NULL, 0, 1, 1, '2020-04-16 14:06:11', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(104, 1, 2, 14, NULL, 'david', 'Leclercq', 'cedlec@wanadoo.fr', NULL, '92 ter', 'sdfsdf', NULL, 0, 1, 1, '2020-04-16 14:11:47', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(105, 1, 2, 8, NULL, 'Coleen', 'Leclercq', 'torkhan@wanadoo.fr', '0600000000', '92', 'des tests', NULL, 1, 1, 1, '2020-05-04 14:26:13', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(106, 1, 2, 8, NULL, 'garou', 'garou', 'torkhan@wanadoo.fr', NULL, '81', 'barbusse', NULL, 0, 1, 1, '2020-05-10 11:35:42', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(107, 1, 2, 8, NULL, 'garou', 'garou', 'torkhan@wanadoo.fr', NULL, '81', 'barbusse', NULL, 0, 1, 1, '2020-05-10 11:35:57', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(108, 1, 2, 8, NULL, 'garou', 'garou', 'torkhan@wanadoo.fr', NULL, '81', 'barbusse', NULL, 0, 1, 1, '2020-05-10 11:38:56', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(109, 1, 2, 8, NULL, 'gazrou', 'garou', 'torkhan@wanadoo.fr', NULL, '81', 'barbusse', NULL, 0, 1, 1, '2020-05-12 15:12:29', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(118, 1, 2, 14, NULL, 'zrzerzerze', 'rzerzerzerzer', 'sfd25dsf@dfg.fr', NULL, '92', 'sdfsdf', NULL, 0, 1, 1, '2020-05-12 15:23:33', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(119, 1, 2, 14, NULL, 'sfddsfsdfdsfdsfsdfsdfdsf', 'sfsf', 'sfddsf@dfg.fr', NULL, '92', 'rue du paradis', NULL, 0, 1, 1, '2020-05-12 15:51:10', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(120, 1, 2, 14, NULL, 'azazeaze', 'azeaeazeaze', 'torkhan@wanadoo.fr', NULL, '92 ter', 'rue des alouettes', NULL, 0, 1, 1, '2020-05-12 16:21:01', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(121, 1, 2, 14, NULL, 'testmail', 'Leclercq', 'torkhan@wanadoo.fr', NULL, '92', 'rue du paradis', NULL, 0, 1, 1, '2020-05-13 15:46:11', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(122, 1, 2, 14, NULL, 'df3', 'Leclercq', 'torkhan@wanadoo.fr', NULL, '38', 'rue des alouettes', NULL, 0, 1, 1, '2020-05-14 09:26:29', '2020-05-28 16:48:16', '2020-05-28 16:48:16', NULL),
(123, 1, 3, 18, NULL, 'Complet', 'Test', 'torkhan@wanadoo.fr', NULL, '92', 'rue du paradis', NULL, 0, 1, 1, '2020-05-20 11:02:34', '2020-05-28 16:51:14', '2020-05-28 16:51:14', NULL),
(124, 1, 3, 14, NULL, 'testmail', 'Leclercq', 'torkhan@wanadoo.fr', NULL, '92', 'rue du paradis', NULL, 0, 1, 1, '2020-05-13 15:46:11', '2020-05-28 16:51:14', '2020-05-28 16:51:14', NULL),
(125, 1, 3, 14, NULL, 'df3', 'Leclercq', 'torkhan@wanadoo.fr', NULL, '38', 'rue des alouettes', NULL, 0, 1, 1, '2020-05-14 09:26:29', '2020-05-28 16:51:14', '2020-05-28 16:51:14', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_intervention_id` int(11) DEFAULT NULL,
  `nom_intervention` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rue_intervention` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_intervention` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut_intervention` datetime DEFAULT NULL,
  `date_fin_intervention` datetime DEFAULT NULL,
  `commentaire_intervention` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_modification_intervention` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D11814AB756A5DB3` (`id_type_intervention_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`id`, `id_type_intervention_id`, `nom_intervention`, `rue_intervention`, `ville_intervention`, `longitude`, `latitude`, `date_debut_intervention`, `date_fin_intervention`, `commentaire_intervention`, `date_modification_intervention`) VALUES
(4, 3, 'Int n°29 décret préfectoral du 22/04/20', 'du colibris', 'Douai', NULL, NULL, '2020-04-01 00:00:00', '2020-04-04 00:00:00', 'de 02h00 à 03h00', '2020-05-05 10:23:27'),
(5, 2, 'Dératisation', 'du colibri', 'Douai', NULL, NULL, '2020-05-01 00:00:00', '2020-05-01 00:00:00', NULL, '2020-04-28 10:23:44'),
(6, 3, 'test', 'du colibri', 'Douai', NULL, NULL, '2020-05-06 00:00:00', '2020-05-07 00:00:00', NULL, '2020-05-04 10:04:21');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur_id` int(11) DEFAULT NULL,
  `id_type_message_id` int(11) DEFAULT NULL,
  `id_destinataire_id` int(11) DEFAULT NULL,
  `id_intervention_id` int(11) DEFAULT NULL,
  `contenu_message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_envoi` datetime DEFAULT NULL,
  `statut_message` longblob,
  `image1` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_modification_message` datetime DEFAULT NULL,
  `commentaire_message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_debut_intervention` datetime DEFAULT NULL,
  `date_fin_intervention` datetime DEFAULT NULL,
  `id_type_intervention_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6BD307FC6EE5C49` (`id_utilisateur_id`),
  KEY `IDX_B6BD307FA7270684` (`id_type_message_id`),
  KEY `IDX_B6BD307F4DA68CE6` (`id_destinataire_id`),
  KEY `IDX_B6BD307F67F0FBEB` (`id_intervention_id`),
  KEY `IDX_B6BD307F756A5DB3` (`id_type_intervention_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_utilisateur_id`, `id_type_message_id`, `id_destinataire_id`, `id_intervention_id`, `contenu_message`, `date_envoi`, `statut_message`, `image1`, `image2`, `image3`, `date_modification_message`, `commentaire_message`, `date_debut_intervention`, `date_fin_intervention`, `id_type_intervention_id`) VALUES
(2, 12, 3, NULL, 4, 'De 03h00 à 04h00', '2020-04-23 10:36:33', NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-01 00:00:00', '2015-01-01 00:00:00', 3),
(3, 12, 2, NULL, 5, 'à partir de 13h', '2020-04-28 10:24:57', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-01 00:00:00', '2020-05-01 00:00:00', 2),
(4, 12, 3, NULL, 6, NULL, '2020-05-04 10:06:46', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-06 00:00:00', '2020-05-07 00:00:00', NULL),
(5, 23, 3, NULL, 5, NULL, '2020-05-05 12:31:23', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-15 00:00:00', '2020-05-16 00:00:00', NULL),
(6, 12, 4, NULL, 6, NULL, '2020-05-05 15:41:18', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-14 00:00:00', '2020-05-16 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200315131540', '2020-03-25 10:18:08');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE IF NOT EXISTS `motif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motif_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id`, `motif_type`) VALUES
(2, 'Rénovation réseau'),
(4, 'Rénovation réseau');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_service_id` int(11) DEFAULT NULL,
  `nom_service` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_rue_service` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_rue_service1` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_rue_service2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_service` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_service` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mail_service` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_telephone_service` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire_service` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_modification_service` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E19D9AD21901BC4B` (`id_type_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `id_type_service_id`, `nom_service`, `numero_rue_service`, `nom_rue_service1`, `nom_rue_service2`, `cp_service`, `ville_service`, `adresse_mail_service`, `numero_telephone_service`, `commentaire_service`, `date_modification_service`) VALUES
(1, 1, 'Mairie', '82', 'jj', NULL, '59500', 'Arras', 'dsfdsf@fdg.fr', NULL, NULL, '2020-03-31 15:36:18');

-- --------------------------------------------------------

--
-- Structure de la table `type_destinataire`
--

DROP TABLE IF EXISTS `type_destinataire`;
CREATE TABLE IF NOT EXISTS `type_destinataire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destinataire_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_destinataire`
--

INSERT INTO `type_destinataire` (`id`, `destinataire_type`) VALUES
(1, 'Particulier'),
(2, 'Professionnel');

-- --------------------------------------------------------

--
-- Structure de la table `type_intervention`
--

DROP TABLE IF EXISTS `type_intervention`;
CREATE TABLE IF NOT EXISTS `type_intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intervention_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_intervention`
--

INSERT INTO `type_intervention` (`id`, `intervention_type`) VALUES
(2, 'Travaux de voiries'),
(3, 'Coupure de courant');

-- --------------------------------------------------------

--
-- Structure de la table `type_message`
--

DROP TABLE IF EXISTS `type_message`;
CREATE TABLE IF NOT EXISTS `type_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_message`
--

INSERT INTO `type_message` (`id`, `message_type`) VALUES
(2, 'Message de haute importance'),
(3, 'Information travaux'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `type_service`
--

DROP TABLE IF EXISTS `type_service`;
CREATE TABLE IF NOT EXISTS `type_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_service`
--

INSERT INTO `type_service` (`id`, `service_type`) VALUES
(1, 'Atelier de la Mairie'),
(2, 'Edf');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` datetime NOT NULL,
  `id_service_id` int(11) NOT NULL,
  `nom_utilisateur` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_utilisateur` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_modification_utilisateur` datetime DEFAULT NULL,
  `commentaire_utilisateur` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D64948D62931` (`id_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `statut`, `username`, `create_at`, `id_service_id`, `nom_utilisateur`, `prenom_utilisateur`, `date_modification_utilisateur`, `commentaire_utilisateur`) VALUES
(12, 'torkhan@wanadoo.fr', '[\"ROLE_SUPER_ADMIN\"]', '$2y$13$4eWDcq7oB2ahcVMlsSENI.3iHKCCryh6wlSf/UBLBFlUtiC.pPbse', NULL, 'admin', '2020-04-09 09:16:10', 1, 'Leclercq', 'Cédric', NULL, NULL),
(23, 'admin@admin.fr', '[\"ADMIN\"]', '$2y$13$SSYlM5oxgVIr0UPF/Lem3ejIvd5RVKsMKiuGI.T01fq0TCbBBHLza', NULL, NULL, '2020-04-29 10:06:23', 1, 'admin', 'admin', NULL, NULL),
(25, 'jeanbond@orange.fr', '[\"ROLE_ADMIN\"]', '$2y$13$pEloHrPwdj.PRdme2D7i/O6oXrsk9Siotc/sZsH.LtPiF3b3hivne', NULL, NULL, '2020-05-05 14:40:39', 1, 'Bond', 'Jean', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_service_id` int(11) NOT NULL,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_utilisateur` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_utilisateur` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_utilisateur` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_utilisateur` tinyint(1) DEFAULT NULL,
  `date_modification_utilisateur` datetime DEFAULT NULL,
  `commentaire_utilisateur` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_1D1C63B348D62931` (`id_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `validation`
--

DROP TABLE IF EXISTS `validation`;
CREATE TABLE IF NOT EXISTS `validation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat_validation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `validation`
--

INSERT INTO `validation` (`id`, `etat_validation`) VALUES
(1, 'En attente'),
(2, 'Accepté'),
(3, 'Refusé');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `destinataire`
--
ALTER TABLE `destinataire`
  ADD CONSTRAINT `FK_FEA9FF921C0F9935` FOREIGN KEY (`id_validation_id`) REFERENCES `validation` (`id`),
  ADD CONSTRAINT `FK_FEA9FF925F3C2ABE` FOREIGN KEY (`id_type_destinataire_id`) REFERENCES `type_destinataire` (`id`),
  ADD CONSTRAINT `FK_FEA9FF928035548C` FOREIGN KEY (`id_motif_id`) REFERENCES `motif` (`id`),
  ADD CONSTRAINT `FK_FEA9FF92E86D5C8B` FOREIGN KEY (`id_adresse_id`) REFERENCES `adresse` (`id`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `FK_D11814AB756A5DB3` FOREIGN KEY (`id_type_intervention_id`) REFERENCES `type_intervention` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307F4DA68CE6` FOREIGN KEY (`id_destinataire_id`) REFERENCES `destinataire` (`id`),
  ADD CONSTRAINT `FK_B6BD307F67F0FBEB` FOREIGN KEY (`id_intervention_id`) REFERENCES `intervention` (`id`),
  ADD CONSTRAINT `FK_B6BD307F756A5DB3` FOREIGN KEY (`id_type_intervention_id`) REFERENCES `type_intervention` (`id`),
  ADD CONSTRAINT `FK_B6BD307FA7270684` FOREIGN KEY (`id_type_message_id`) REFERENCES `type_message` (`id`),
  ADD CONSTRAINT `FK_B6BD307FC6EE5C49` FOREIGN KEY (`id_utilisateur_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_E19D9AD21901BC4B` FOREIGN KEY (`id_type_service_id`) REFERENCES `type_service` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64948D62931` FOREIGN KEY (`id_service_id`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B348D62931` FOREIGN KEY (`id_service_id`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
