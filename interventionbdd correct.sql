-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 13 Avril 2017 à 07:49
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `interventionbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `ID_commune` int(11) NOT NULL AUTO_INCREMENT,
  `nomCommune` varchar(40) NOT NULL,
  `ID_departement` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_commune`),
  KEY `FK_commune_ID_departement` (`ID_departement`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`ID_commune`, `nomCommune`, `ID_departement`) VALUES
(1, 'Buthiers', 1),
(2, 'L''Île-Saint-Denis', 2),
(3, 'Saint-Maurice', 3),
(4, 'Cesson', 1),
(5, 'Palaiseau', 4),
(6, 'Claye-Souilly', 1),
(7, 'Lieusaint', 1),
(8, 'Changis-sur-Marne', 1),
(9, 'Roissy-en-France', 5),
(10, 'Nanterre', 6),
(11, 'Savigny-le-Temple', 1),
(12, 'Paris', 7),
(13, 'Lagny-sur-Marne', 1),
(14, 'Gonesse', 5),
(15, 'Viarmes', 5),
(16, 'Lisses', 4),
(17, 'Souppes-sur-Loing', 1),
(18, 'Chelles', 1),
(19, 'Varennes-sur-Seine', 1),
(20, 'Barcy', 1),
(21, 'Meaux', 1),
(22, 'Moissy-Cramayel', 1),
(23, 'Villiers-le-Bel', 5),
(24, 'Noisy-le-Grand', 2),
(25, 'Jouy-en-Josas', 8),
(26, 'Vert-Saint-Denis', 1),
(27, 'Bobigny', 2),
(28, 'Ivry-sur-Seine', 3),
(29, 'Lesches', 1),
(30, 'Sarcelles', 5),
(31, 'Massy', 4),
(32, 'Bonneuil-en-France', 5),
(33, 'Magny-le-Hongre', 1),
(34, 'Hérouville', 5),
(35, 'Saint-Pierre-du-Perray', 4),
(36, 'Vanves', 6),
(37, 'Bailly-Romainvilliers', 1),
(38, 'Wissous', 4),
(39, 'Saint-Aubin', 4),
(40, 'Marolles-sur-Seine', 1),
(41, 'Tigery', 4),
(42, 'Versailles', 8),
(43, 'Saclay', 4),
(44, 'Saint-Germain-en-Laye', 8),
(45, 'Ville-Saint-Jacques', 1),
(46, 'Messy', 1),
(47, 'Tigery', 1),
(48, 'Baillet-en-France', 5),
(49, 'Montévrain', 1);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `ID_departement` int(11) NOT NULL AUTO_INCREMENT,
  `nomDepartement` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_departement`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`ID_departement`, `nomDepartement`) VALUES
(1, 'Seine-et-Marne'),
(2, 'Seine-Saint-Denis'),
(3, 'Val-de-Marne'),
(4, 'Essonne'),
(5, 'Val-d''Oise'),
(6, 'Hauts-de-Seine'),
(7, 'Paris'),
(8, 'Yvelines');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `id_intervention` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `ID_site` varchar(150) NOT NULL,
  PRIMARY KEY (`id_intervention`),
  KEY `FK_intervention_ID_site` (`ID_site`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `intervention`
--

INSERT INTO `intervention` (`id_intervention`, `date_debut`, `date_fin`, `ID_site`) VALUES
(1, '2003-08-01', '2003-10-30', 'fff52f4ac0a03ea9b7b28a8cbd72342496b090d1'),
(2, '2003-11-17', '2003-11-28', 'c1bc0481830a95a92f5362f4ee56beb6f20cecec'),
(3, '2005-05-10', '2005-07-11', '62b70a56d30f1d919e56c27e7a589718ea6354b9'),
(4, '2005-11-15', '2005-12-01', '7d21bc7ae33d449bc79b7517e989582c14e48fcf'),
(5, '2010-04-02', '2010-07-02', '51a31e49c694d8f10d90e4afb6f9e02e9da958f5'),
(6, '2001-12-01', '2002-03-21', '1bc37299baa6fbf11e71c3e32cde79e8e99ad429'),
(7, '2002-06-01', '2002-08-01', '23a2e7feb7558e1c27746369c7fd280963c6bd56'),
(8, '1995-07-24', '2004-12-04', '4be6b6aed37124d060eaed99652cc27a6c98398f'),
(9, '2003-09-08', '2003-10-20', '3b7946c831edaa8058503fa26cfd3fd8220bb7b6'),
(10, '2003-09-08', '2003-10-31', 'd988641aaed819a7151eabf475e9fc14519c9648'),
(11, '2003-12-01', '2004-01-31', '762886e8e8427f493712e98bd23b2f19c0169259'),
(12, NULL, NULL, 'df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17'),
(13, '2004-12-01', '2004-12-31', '82c3915fbb292d347c83d664ee3f93ec80c6cbe5'),
(14, '2006-03-08', '2006-05-08', 'd75ed3329c46cd0d46d0aed17b7acf5926fb1bfb'),
(15, '2010-03-22', '2010-07-13', 'aa9a2768321abf2945733e7e60f63933a772fd21'),
(16, '2013-04-15', NULL, 'a82b18922060a5dee67dd71cb41de8f2d1ec236b'),
(17, '2013-01-14', NULL, 'ac0a79e7cdc311fadca94750f00fde1e1df6ec36'),
(18, '2013-06-03', NULL, 'bec45f5c938d0c1fef247f1b541722c9fd2e21d4'),
(19, NULL, NULL, '8721e13a977a2cbf12d800f6f111230feae22148'),
(20, NULL, NULL, '947e24980decdf88ac1737184ed8cb9c8708bb4f'),
(21, NULL, NULL, 'cb32eb29e39b6f9f1ade07d45a070e2e200c0cd1'),
(22, '2002-04-15', '2002-07-26', '2d91109d86b30d9a689eaaabf01f282c691ea8b6'),
(23, '2008-02-18', '2008-07-31', 'e524d248477bcaf60374696eaf30bdc9129ac0ec'),
(24, '2006-09-01', '2007-03-31', '2eb0aab8297c80ad37bd20f808569534405adfc7'),
(25, '2002-07-15', '2002-10-04', '91beb94e0eab65e0672d53374979919828ca3feb'),
(26, '2004-05-04', '2004-06-30', '3844a9842f60335416bbd808408dd371e6c92242'),
(27, '2004-08-01', '2006-05-01', '23b88e14595f626ab167884900c30417d17570a0'),
(28, '2002-07-29', '2002-11-28', 'f6b3fd32a002bf75ddc6040b11d7ee0f3d9c0f36'),
(29, '2003-07-28', '2003-08-31', '374955e877106f14be20c727184527b5c7f99cb0'),
(30, '2004-04-26', '2004-06-30', '55d3153c8edd055d436b5109ffae4458f5a38191'),
(31, '2009-09-07', '2009-11-15', '57c6068b69514d5638b08cb96823892a6f3e0805'),
(32, '2002-01-01', '2002-06-01', '5b94a8a1e4be04882b4b359d89fb59d6dbad7396'),
(33, '2003-06-16', '2004-03-05', 'ad75e3a97dec8ad64a9ba56a1099c36a456faa6e'),
(34, '2003-09-29', '2004-10-18', '3f29421c8f5e8dad51827f1571e7b4cb9dd4be7f'),
(35, '2004-09-01', '2004-12-07', '1c8553f68eaaa94d634a146db1171478ef95dc25'),
(36, '2006-03-20', '2006-07-21', '6cfef81d75dc44df95b912d70c82da53c662aaf0'),
(37, '2006-10-15', '2007-03-15', 'c70bbfce2d3f01efb41b0a232fac2f47a1175d32'),
(38, '2004-10-21', '2004-12-24', '46319224ba97875eed5191a28ecfe8a1fcb2e6dc'),
(39, '2008-10-27', '2009-05-25', 'd374471ec9c42aece8406e34ff4ac2bc1882f8d9'),
(40, '2010-05-31', '2010-06-10', '9d5f40aa0a3ff72c0943c26dbe64aece4af3c806'),
(41, NULL, NULL, '50cf39534de4c245cf55f973acfb7b3d7acdefda'),
(42, '2002-10-15', '2003-05-31', '529ae7bef039e468c3d45d5faf50da1f3298921e'),
(43, '2002-09-23', '2002-11-19', 'aa966cc4dbdc306a2ea14dceba23faa347666cbd'),
(44, '2003-04-02', '2003-06-14', '65b958cb72b4b731a87eec7f2735d624883edd31'),
(45, '2003-03-15', '2003-08-31', 'e4d9d15ead5778de06fef6848c19c6a73839adb9'),
(46, '2006-11-01', '2006-11-30', 'eedfd272fee622908451a2cfc76e06db177c362f'),
(47, '2009-05-12', '2009-05-07', 'db823ed6abc67e4daa61f78afd5c0a09b991abc9'),
(48, '2002-11-20', '2003-04-04', '2b3055fb286cce800c90bbd1e3dafeeefb612bc1'),
(49, '2006-08-01', '2006-09-01', 'd7d184443f1135765a2c3603872feb5a0e14f4a9'),
(50, NULL, NULL, 'de62d01d7853c759b824f3f2f5bd78d39fe3cb9e'),
(51, '2001-12-03', '2002-02-28', 'c2fd8a075043c53c69aa930fc854faf851c2310b'),
(52, '2003-03-01', '2004-01-01', '51a195acdfed68462179ca0b135589d42eb927c8'),
(53, '2010-04-26', '2010-09-03', '4a77e7fc724eb97ac2d639660db6d6086386fc8c'),
(54, '2011-10-03', '2011-10-22', 'e05c40e2a977417c7f27071efeddb90f8b964b59'),
(55, NULL, NULL, '96fe20008ee0d4f4e5872173c8f04a405b2dae34'),
(56, NULL, NULL, 'e6eea76d4fc98d079ac204ebbc6f8d5299bf31fe'),
(57, NULL, NULL, '88142a377d62b399bfb84cb0e4feb97cbba856ef'),
(58, '2006-04-20', '2006-05-31', '25d919271194fd1ee4217a63778e507203ac73ff'),
(59, '2010-03-05', '2010-05-07', 'e3f0ebb37b8167b252e2579f57b6acbdb913ab14'),
(60, NULL, NULL, '9108fadc9efffb74de2a62e451a680f324959140'),
(61, '2011-09-01', '2011-10-10', '7ea386c4430021b87d93acdbc60984e5dd099f0b'),
(62, '2002-02-20', '2002-06-28', '2667b5d8501a1026f95ad67a5d163ac482c398d7'),
(63, '2004-08-09', '2004-10-08', '3f2e7ac2eb38f6e220f6a1d24d7d6c3fdf998193'),
(64, '2004-06-24', '2007-12-19', '37377f251badb17b51e5405705ac923776eb74c2'),
(65, '2009-06-15', '2009-10-15', '20d7f3c03b358ece5332ad82dfe7f89558517882'),
(66, '2010-11-01', '2011-05-01', '475ef7ac34cb105129cd3c7a0a69a1d404e17087'),
(67, '2004-11-08', '2004-12-24', '243514f4c3febd715b7dfd20e2e9e59133c7b7ff'),
(68, '2006-06-26', '2006-12-12', '01deb354c599ba98140fe63b42a2c13c7ad70bcc'),
(69, '2004-05-15', '2004-12-07', '32b9187e5f9d3355398d61840282d95048191b04'),
(70, '2007-03-19', '2007-11-30', '2824cf6a4cf8a45403179b950b8bd01042b78e11'),
(71, NULL, NULL, '7701cb2e1e7b9ade000e174def9680425316d8bd'),
(72, NULL, NULL, '11a3d2c1ee0a6fe1755d39116a98ba4e5afcf323'),
(73, '2006-09-04', '2007-01-05', '09b67f136d0db14e2f475c551db6b1ae22864335'),
(74, '2002-03-25', '2002-05-17', 'a842d472ea470ace7ce53cd36cbf16b1ab6106fd'),
(75, '2007-07-23', '2007-09-21', '97daf5771b0837a7fcef1c705edc03907a945707'),
(76, '2001-12-01', '2002-03-01', 'd6110ab435dee7ee2ab58bbbf63ff29efaafd9cf'),
(77, '2002-05-29', '2002-10-10', '031259dedb465802684076c3b73af34f4ea68c8b'),
(78, '2003-01-01', '2003-12-31', '877eccd694ed4ab2665bcfb776b2b65ffffdecb7'),
(79, NULL, NULL, '98c94d88954e82350219d7f43afa92df80b8d2e0'),
(80, NULL, NULL, 'f54fe6604659382d6ad6b85014bbc2c8b0455e6e'),
(81, NULL, NULL, '3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99');

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `ID_periode` int(11) NOT NULL AUTO_INCREMENT,
  `libellePeriode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `periode`
--

INSERT INTO `periode` (`ID_periode`, `libellePeriode`) VALUES
(1, 'Agriculture, élevage'),
(2, 'Habitats, architecture, édifices'),
(3, 'Industrie, artisanat'),
(4, 'Sciences et méthodes de l''archéologie'),
(5, 'Vie quotidienne, usages'),
(6, 'Cultes et pratiques funéraires'),
(7, 'Échange et transport'),
(8, 'Chasse, pêche, cueillette'),
(9, 'Paysage et environnement'),
(10, 'Peuplement, occupation espace'),
(11, 'Organisation sociale et politique'),
(12, 'Arts, biens de prestige');

-- --------------------------------------------------------

--
-- Structure de la table `periodeintervention`
--

DROP TABLE IF EXISTS `periodeintervention`;
CREATE TABLE IF NOT EXISTS `periodeintervention` (
  `ID_site` varchar(150) NOT NULL,
  `ID_periode` int(11) NOT NULL,
  KEY `FK_periodeintervention_ID_site` (`ID_site`),
  KEY `FK_periodeintervention_ID_periode` (`ID_periode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `periodeintervention`
--

INSERT INTO `periodeintervention` (`ID_site`, `ID_periode`) VALUES
('01deb354c599ba98140fe63b42a2c13c7ad70bcc', 2),
('09b67f136d0db14e2f475c551db6b1ae22864335', 2),
('11a3d2c1ee0a6fe1755d39116a98ba4e5afcf323', 9),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 2),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 3),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 6),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 7),
('23a2e7feb7558e1c27746369c7fd280963c6bd56', 2),
('23b88e14595f626ab167884900c30417d17570a0', 2),
('23b88e14595f626ab167884900c30417d17570a0', 7),
('25d919271194fd1ee4217a63778e507203ac73ff', 2),
('25d919271194fd1ee4217a63778e507203ac73ff', 10),
('2824cf6a4cf8a45403179b950b8bd01042b78e11', 2),
('2b3055fb286cce800c90bbd1e3dafeeefb612bc1', 2),
('2b3055fb286cce800c90bbd1e3dafeeefb612bc1', 7),
('37377f251badb17b51e5405705ac923776eb74c2', 2),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 2),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 3),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 5),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 10),
('475ef7ac34cb105129cd3c7a0a69a1d404e17087', 6),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 1),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 2),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 3),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 4),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 5),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 6),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 7),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 9),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 10),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 11),
('50cf39534de4c245cf55f973acfb7b3d7acdefda', 2),
('50cf39534de4c245cf55f973acfb7b3d7acdefda', 7),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 1),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 2),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 3),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 4),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 5),
('55d3153c8edd055d436b5109ffae4458f5a38191', 2),
('57c6068b69514d5638b08cb96823892a6f3e0805', 1),
('57c6068b69514d5638b08cb96823892a6f3e0805', 2),
('57c6068b69514d5638b08cb96823892a6f3e0805', 3),
('57c6068b69514d5638b08cb96823892a6f3e0805', 5),
('57c6068b69514d5638b08cb96823892a6f3e0805', 6),
('57c6068b69514d5638b08cb96823892a6f3e0805', 7),
('57c6068b69514d5638b08cb96823892a6f3e0805', 9),
('57c6068b69514d5638b08cb96823892a6f3e0805', 10),
('57c6068b69514d5638b08cb96823892a6f3e0805', 11),
('5b94a8a1e4be04882b4b359d89fb59d6dbad7396', 2),
('5b94a8a1e4be04882b4b359d89fb59d6dbad7396', 10),
('6cfef81d75dc44df95b912d70c82da53c662aaf0', 2),
('762886e8e8427f493712e98bd23b2f19c0169259', 2),
('7701cb2e1e7b9ade000e174def9680425316d8bd', 10),
('7ea386c4430021b87d93acdbc60984e5dd099f0b', 2),
('7ea386c4430021b87d93acdbc60984e5dd099f0b', 3),
('7ea386c4430021b87d93acdbc60984e5dd099f0b', 5),
('82c3915fbb292d347c83d664ee3f93ec80c6cbe5', 2),
('82c3915fbb292d347c83d664ee3f93ec80c6cbe5', 6),
('877eccd694ed4ab2665bcfb776b2b65ffffdecb7', 2),
('877eccd694ed4ab2665bcfb776b2b65ffffdecb7', 6),
('877eccd694ed4ab2665bcfb776b2b65ffffdecb7', 7),
('88142a377d62b399bfb84cb0e4feb97cbba856ef', 2),
('88142a377d62b399bfb84cb0e4feb97cbba856ef', 5),
('9108fadc9efffb74de2a62e451a680f324959140', 2),
('9108fadc9efffb74de2a62e451a680f324959140', 3),
('91beb94e0eab65e0672d53374979919828ca3feb', 2),
('96fe20008ee0d4f4e5872173c8f04a405b2dae34', 2),
('96fe20008ee0d4f4e5872173c8f04a405b2dae34', 7),
('98c94d88954e82350219d7f43afa92df80b8d2e0', 11),
('98c94d88954e82350219d7f43afa92df80b8d2e0', 12),
('9d5f40aa0a3ff72c0943c26dbe64aece4af3c806', 12),
('a82b18922060a5dee67dd71cb41de8f2d1ec236b', 2),
('a82b18922060a5dee67dd71cb41de8f2d1ec236b', 6),
('a82b18922060a5dee67dd71cb41de8f2d1ec236b', 10),
('a842d472ea470ace7ce53cd36cbf16b1ab6106fd', 2),
('aa9a2768321abf2945733e7e60f63933a772fd21', 2),
('aa9a2768321abf2945733e7e60f63933a772fd21', 7),
('ac0a79e7cdc311fadca94750f00fde1e1df6ec36', 2),
('ac0a79e7cdc311fadca94750f00fde1e1df6ec36', 6),
('bec45f5c938d0c1fef247f1b541722c9fd2e21d4', 2),
('d6110ab435dee7ee2ab58bbbf63ff29efaafd9cf', 2),
('d75ed3329c46cd0d46d0aed17b7acf5926fb1bfb', 2),
('d75ed3329c46cd0d46d0aed17b7acf5926fb1bfb', 10),
('d7d184443f1135765a2c3603872feb5a0e14f4a9', 2),
('d7d184443f1135765a2c3603872feb5a0e14f4a9', 6),
('db823ed6abc67e4daa61f78afd5c0a09b991abc9', 10),
('df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17', 8),
('df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17', 9),
('df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17', 10),
('e05c40e2a977417c7f27071efeddb90f8b964b59', 6),
('e524d248477bcaf60374696eaf30bdc9129ac0ec', 10),
('e6eea76d4fc98d079ac204ebbc6f8d5299bf31fe', 6),
('eedfd272fee622908451a2cfc76e06db177c362f', 2),
('eedfd272fee622908451a2cfc76e06db177c362f', 3),
('f54fe6604659382d6ad6b85014bbc2c8b0455e6e', 2),
('f54fe6604659382d6ad6b85014bbc2c8b0455e6e', 5),
('f54fe6604659382d6ad6b85014bbc2c8b0455e6e', 10),
('f6b3fd32a002bf75ddc6040b11d7ee0f3d9c0f36', 2),
('f6b3fd32a002bf75ddc6040b11d7ee0f3d9c0f36', 3);

-- --------------------------------------------------------

--
-- Structure de la table `site_intervention`
--

DROP TABLE IF EXISTS `site_intervention`;
CREATE TABLE IF NOT EXISTS `site_intervention` (
  `ID_site` varchar(150) NOT NULL,
  `nom_site` varchar(60) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `ID_commune` int(11) NOT NULL,
  PRIMARY KEY (`ID_site`),
  KEY `FK_site_intervention_ID_commune` (`ID_commune`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `site_intervention`
--

INSERT INTO `site_intervention` (`ID_site`, `nom_site`, `latitude`, `longitude`, `ID_commune`) VALUES
('01deb354c599ba98140fe63b42a2c13c7ad70bcc', 'Le Champtier à Cailles', 48.6086540222168, 2.537264347076416, 7),
('031259dedb465802684076c3b73af34f4ea68c8b', 'Les Pétreaux 1', 48.958187103271484, 3.0083024501800537, 8),
('09b67f136d0db14e2f475c551db6b1ae22864335', 'Centre commercial 2', 48.621429443359375, 2.5443830490112305, 7),
('11a3d2c1ee0a6fe1755d39116a98ba4e5afcf323', 'Domaine national : Petite Terrasse et Grand rond-point', 48.90089416503906, 2.1007912158966064, 44),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 'Les Monts Gardés 3', 48.94855880737305, 2.717437982559204, 6),
('1c8553f68eaaa94d634a146db1171478ef95dc25', 'La Pelle à four sud', 48.96054458618164, 3.014953374862671, 8),
('20d7f3c03b358ece5332ad82dfe7f89558517882', 'La Plaine du Moulin à Vent - fouille 2009', 48.575584411621094, 2.6095521450042725, 4),
('23a2e7feb7558e1c27746369c7fd280963c6bd56', 'ZAC de la Pyramide, lot C3', 48.6431999206543, 2.544872283935547, 7),
('23b88e14595f626ab167884900c30417d17570a0', 'Le Mont Blanc', 48.58353805541992, 2.5877187252044678, 11),
('243514f4c3febd715b7dfd20e2e9e59133c7b7ff', 'ZAC de la Pépinière', 48.64577865600586, 2.5129776000976562, 41),
('25d919271194fd1ee4217a63778e507203ac73ff', 'Plaine du Moulin à Vent (protohistorique)', 48.57917785644531, 2.610853910446167, 4),
('2667b5d8501a1026f95ad67a5d163ac482c398d7', 'L''Orme des Merisiers', 48.71068572998047, 2.1451494693756104, 39),
('2824cf6a4cf8a45403179b950b8bd01042b78e11', 'Cour du Grand Commun - Louis XIII aux origines du château de', 48.804534912109375, 2.121450901031494, 42),
('2b3055fb286cce800c90bbd1e3dafeeefb612bc1', 'Rond-Point Schumann', 48.64202880859375, 2.540362596511841, 7),
('2d91109d86b30d9a689eaaabf01f282c691ea8b6', 'À l''est de Beaumoulin', 48.19180679321289, 2.7080318927764893, 17),
('2eb0aab8297c80ad37bd20f808569534405adfc7', '30-32 rue Gustave-Nast', 48.88069152832031, 2.585216522216797, 18),
('32b9187e5f9d3355398d61840282d95048191b04', 'La Pelle à four', 48.96147918701172, 3.012946128845215, 8),
('37377f251badb17b51e5405705ac923776eb74c2', 'ZAC de la Pyramide, lots D-E-F', 48.635498046875, 2.5609536170959473, 7),
('374955e877106f14be20c727184527b5c7f99cb0', 'Zi Nord, Lot D1', 48.964481353759766, 2.904905319213867, 21),
('3844a9842f60335416bbd808408dd371e6c92242', 'Le Marais du Colombier', 48.36348342895508, 2.931549310684204, 19),
('3b7946c831edaa8058503fa26cfd3fd8220bb7b6', 'Le Moulin', 49.002262115478516, 2.500492811203003, 9),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 'Les Vingt-deux-arpents', 48.85839080810547, 2.7602462768554688, 49),
('3f29421c8f5e8dad51827f1571e7b4cb9dd4be7f', '60 quai des Tuileries - Musée de l''Orangerie', 48.85834884643555, 2.322464942932129, 12),
('3f2e7ac2eb38f6e220f6a1d24d7d6c3fdf998193', 'La Croix Saint-Jacques (2)', 48.379695892333984, 3.0238232612609863, 40),
('46319224ba97875eed5191a28ecfe8a1fcb2e6dc', '69, rue Gambetta', 49.006561279296875, 2.394763231277466, 23),
('475ef7ac34cb105129cd3c7a0a69a1d404e17087', '19-25 Avenue Grouard', 48.87971115112305, 2.7199034690856934, 13),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 'La Fontaine Plamond, aéroport du Bourget phase 1', 48.96878433227539, 2.4240670204162598, 32),
('4be6b6aed37124d060eaed99652cc27a6c98398f', '5000 ans de vie rurale à Changis-sur-Marne', 48.966270446777344, 3.0053491592407227, 8),
('50cf39534de4c245cf55f973acfb7b3d7acdefda', 'Saint-Clément, La Bichère', 48.59379196166992, 2.631316661834717, 26),
('51a195acdfed68462179ca0b135589d42eb927c8', 'Église Saint-Clair', 49.100616455078125, 2.1321756839752197, 34),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 'Campus de l''École polytechnique', 48.71151351928711, 2.2101995944976807, 5),
('529ae7bef039e468c3d45d5faf50da1f3298921e', 'Hôpital Avicenne', 48.91324234008789, 2.4255547523498535, 27),
('55d3153c8edd055d436b5109ffae4458f5a38191', 'Parc d''activités de Chanteloup', 48.635719299316406, 2.582951068878174, 22),
('57c6068b69514d5638b08cb96823892a6f3e0805', 'Cours Baleine, ZAC entrée sud II', 48.97979736328125, 2.4384260177612305, 14),
('5b94a8a1e4be04882b4b359d89fb59d6dbad7396', 'Jardin de la Méridienne', 48.63969802856445, 2.551431179046631, 7),
('62b70a56d30f1d919e56c27e7a589718ea6354b9', 'Les Serres de l''hôpital Esquirol', 48.81779479980469, 2.427532434463501, 3),
('65b958cb72b4b731a87eec7f2735d624883edd31', '44-46, rue Raspail', 48.80842208862305, 2.3905298709869385, 28),
('6cfef81d75dc44df95b912d70c82da53c662aaf0', 'Plaine du Moulin à Vent (gallo-romain)', 48.5853385925293, 2.601656198501587, 4),
('762886e8e8427f493712e98bd23b2f19c0169259', 'ZAC de la Grange du Bois, lot A1', 48.60546112060547, 2.5755014419555664, 11),
('7701cb2e1e7b9ade000e174def9680425316d8bd', 'Val d''Albian, La Grande Mare, La Mare aux Saules', 48.75613784790039, 2.1838958263397217, 43),
('7d21bc7ae33d449bc79b7517e989582c14e48fcf', 'Plaine du Moulin à Vent, zone sud', 48.57009506225586, 2.6054587364196777, 4),
('7ea386c4430021b87d93acdbc60984e5dd099f0b', 'Zone sud ouest aéroport Paris-Orly', 48.721168518066406, 2.3297293186187744, 38),
('82c3915fbb292d347c83d664ee3f93ec80c6cbe5', 'ZAC du Carré Sénart, bureaux, parkings', 48.614471435546875, 2.542870044708252, 7),
('8721e13a977a2cbf12d800f6f111230feae22148', 'Rue de Rivoli', 48.86012649536133, 2.3430917263031006, 12),
('877eccd694ed4ab2665bcfb776b2b65ffffdecb7', 'ZAC des Fossés Neufs', 48.632606506347656, 2.5121910572052, 47),
('88142a377d62b399bfb84cb0e4feb97cbba856ef', 'Rue Gaudray', 48.82087326049805, 2.2842302322387695, 36),
('9108fadc9efffb74de2a62e451a680f324959140', '25 rue Saint-Fiacre - 124 rue de Châage', 48.96887969970703, 2.884437084197998, 21),
('91beb94e0eab65e0672d53374979919828ca3feb', 'ZAC de la Pyramide, lot C1', 48.6395149230957, 2.5505504608154297, 7),
('947e24980decdf88ac1737184ed8cb9c8708bb4f', 'Collège des Bernardins', 48.847434997558594, 2.355952024459839, 12),
('96fe20008ee0d4f4e5872173c8f04a405b2dae34', 'Le Buisson Ribeau, Lac VIII', 48.61162567138672, 2.519820213317871, 35),
('97daf5771b0837a7fcef1c705edc03907a945707', 'Hameau gaulois et <I>villa</I> romaine à Ville-Saint-Jacques', 48.35773849487305, 2.908405065536499, 45),
('98c94d88954e82350219d7f43afa92df80b8d2e0', 'Centre de vacances CNPO', 49.065670013427734, 2.2998883724212646, 48),
('9d5f40aa0a3ff72c0943c26dbe64aece4af3c806', 'Domaine du Montcel', 48.76573181152344, 2.173616886138916, 25),
('a82b18922060a5dee67dd71cb41de8f2d1ec236b', 'Paris, Préfecture de police, bâtiment d''accueil - 2 rue de L', 48.85505294799805, 2.3465781211853027, 12),
('a842d472ea470ace7ce53cd36cbf16b1ab6106fd', 'Les Monts Gardés 1', 48.95091247558594, 2.713233470916748, 6),
('aa966cc4dbdc306a2ea14dceba23faa347666cbd', '64 rue Gay-Lussac - 3 rue des Ursulines', 48.84202194213867, 2.343169927597046, 12),
('aa9a2768321abf2945733e7e60f63933a772fd21', '9 rue Gambetta', 48.87840270996094, 2.7042839527130127, 13),
('ac0a79e7cdc311fadca94750f00fde1e1df6ec36', 'Église Saint-Pierre-et-Saint-Paul', 48.98798370361328, 2.447396755218506, 14),
('ad75e3a97dec8ad64a9ba56a1099c36a456faa6e', '1 place Paul Claudel, théâtre national de l''Odéon', 48.84934616088867, 2.3388805389404297, 12),
('bec45f5c938d0c1fef247f1b541722c9fd2e21d4', 'Place Pierre Salvi', 49.12575149536133, 2.368608236312866, 15),
('c1bc0481830a95a92f5362f4ee56beb6f20cecec', '66-70, Rue Du Landy', 48.915164947509766, 2.3596301078796387, 2),
('c2fd8a075043c53c69aa930fc854faf851c2310b', 'Courtalin', 48.870548248291016, 2.8164517879486084, 33),
('c70bbfce2d3f01efb41b0a232fac2f47a1175d32', 'ZAC Entrée sud de Gonesse', 48.97922897338867, 2.449784755706787, 14),
('cb32eb29e39b6f9f1ade07d45a070e2e200c0cd1', 'ZAC du bois de Chaland', 48.602317810058594, 2.440223217010498, 16),
('d374471ec9c42aece8406e34ff4ac2bc1882f8d9', '4 rue des Mastraits - Nécropole du haut Moyen Âge', 48.84737777709961, 2.5481088161468506, 24),
('d6110ab435dee7ee2ab58bbbf63ff29efaafd9cf', 'La Mare au Roi', 48.96726608276367, 2.7225263118743896, 46),
('d75ed3329c46cd0d46d0aed17b7acf5926fb1bfb', 'Plaine du Moulin à Vent (ext. sud bassin)', 48.5704460144043, 2.5977165699005127, 4),
('d7d184443f1135765a2c3603872feb5a0e14f4a9', 'Merigest', 48.621604919433594, 2.5384116172790527, 7),
('d988641aaed819a7151eabf475e9fc14519c9648', 'Avenue Jules-Quentin', 48.89854049682617, 2.1840643882751465, 10),
('db823ed6abc67e4daa61f78afd5c0a09b991abc9', 'Rue du Pérou', 48.72084045410156, 2.3069839477539062, 31),
('de62d01d7853c759b824f3f2f5bd78d39fe3cb9e', 'Zone de servitude ILS', 48.97307586669922, 2.4376654624938965, 32),
('df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17', 'Musée du Quai Branly', 48.86157989501953, 2.2979423999786377, 12),
('e05c40e2a977417c7f27071efeddb90f8b964b59', '19-25 avenue Grouard', 48.879642486572266, 2.7202935218811035, 13),
('e3f0ebb37b8167b252e2579f57b6acbdb913ab14', 'Le Prieuré', 48.83854293823242, 2.804725170135498, 37),
('e4d9d15ead5778de06fef6848c19c6a73839adb9', 'Les Prés de Refuge', 48.93731689453125, 2.7979114055633545, 29),
('e524d248477bcaf60374696eaf30bdc9129ac0ec', '62  rue Henry-Farman', 48.83222579956055, 2.2742929458618164, 12),
('e6eea76d4fc98d079ac204ebbc6f8d5299bf31fe', '53-57, rue du Maréchal-Leclerc', 48.81764602661133, 2.4262402057647705, 3),
('eedfd272fee622908451a2cfc76e06db177c362f', 'Place de la Libération, rue des Piliers, rue Pierre-Brossole', 48.99628448486328, 2.3794710636138916, 30),
('f54fe6604659382d6ad6b85014bbc2c8b0455e6e', '22 rue d''Ulm / 9-11 rue Pierre et Marie Curie / 193 rue Sain', 48.8438835144043, 2.3448944091796875, 12),
('f6b3fd32a002bf75ddc6040b11d7ee0f3d9c0f36', 'Le Marais de Narcy', 49.00826644897461, 2.879018783569336, 20),
('fff52f4ac0a03ea9b7b28a8cbd72342496b090d1', 'Le dessus-de-Rochefort', 48.27002716064453, 2.4358813762664795, 1);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `ID_theme` int(11) NOT NULL AUTO_INCREMENT,
  `nomTheme` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`ID_theme`, `nomTheme`) VALUES
(1, 'Agriculture, élevage'),
(2, 'Habitats, architecture, édifices'),
(3, 'Industrie, artisanat'),
(4, 'Sciences et méthodes de l''archéologie'),
(5, 'Vie quotidienne, usages'),
(6, 'Cultes et pratiques funéraires'),
(7, 'Échange et transport'),
(8, 'Chasse, pêche, cueillette'),
(9, 'Paysage et environnement'),
(10, 'Peuplement, occupation espace'),
(11, 'Organisation sociale et politique'),
(12, 'Arts, biens de prestige');

-- --------------------------------------------------------

--
-- Structure de la table `themeintervention`
--

DROP TABLE IF EXISTS `themeintervention`;
CREATE TABLE IF NOT EXISTS `themeintervention` (
  `ID_site` varchar(150) NOT NULL,
  `ID_theme` int(11) NOT NULL,
  KEY `FK_themeintervention_ID_site` (`ID_site`),
  KEY `FK_themeintervention_ID_theme` (`ID_theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `themeintervention`
--

INSERT INTO `themeintervention` (`ID_site`, `ID_theme`) VALUES
('01deb354c599ba98140fe63b42a2c13c7ad70bcc', 2),
('09b67f136d0db14e2f475c551db6b1ae22864335', 2),
('11a3d2c1ee0a6fe1755d39116a98ba4e5afcf323', 9),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 2),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 3),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 6),
('1bc37299baa6fbf11e71c3e32cde79e8e99ad429', 7),
('23a2e7feb7558e1c27746369c7fd280963c6bd56', 2),
('23b88e14595f626ab167884900c30417d17570a0', 2),
('23b88e14595f626ab167884900c30417d17570a0', 7),
('25d919271194fd1ee4217a63778e507203ac73ff', 2),
('25d919271194fd1ee4217a63778e507203ac73ff', 10),
('2824cf6a4cf8a45403179b950b8bd01042b78e11', 2),
('2b3055fb286cce800c90bbd1e3dafeeefb612bc1', 2),
('2b3055fb286cce800c90bbd1e3dafeeefb612bc1', 7),
('37377f251badb17b51e5405705ac923776eb74c2', 2),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 2),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 3),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 5),
('3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99', 10),
('475ef7ac34cb105129cd3c7a0a69a1d404e17087', 6),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 1),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 2),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 3),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 4),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 5),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 6),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 7),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 9),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 10),
('4a77e7fc724eb97ac2d639660db6d6086386fc8c', 11),
('50cf39534de4c245cf55f973acfb7b3d7acdefda', 2),
('50cf39534de4c245cf55f973acfb7b3d7acdefda', 7),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 1),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 2),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 3),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 4),
('51a31e49c694d8f10d90e4afb6f9e02e9da958f5', 5),
('55d3153c8edd055d436b5109ffae4458f5a38191', 2),
('57c6068b69514d5638b08cb96823892a6f3e0805', 1),
('57c6068b69514d5638b08cb96823892a6f3e0805', 2),
('57c6068b69514d5638b08cb96823892a6f3e0805', 3),
('57c6068b69514d5638b08cb96823892a6f3e0805', 5),
('57c6068b69514d5638b08cb96823892a6f3e0805', 6),
('57c6068b69514d5638b08cb96823892a6f3e0805', 7),
('57c6068b69514d5638b08cb96823892a6f3e0805', 9),
('57c6068b69514d5638b08cb96823892a6f3e0805', 10),
('57c6068b69514d5638b08cb96823892a6f3e0805', 11),
('5b94a8a1e4be04882b4b359d89fb59d6dbad7396', 2),
('5b94a8a1e4be04882b4b359d89fb59d6dbad7396', 10),
('6cfef81d75dc44df95b912d70c82da53c662aaf0', 2),
('762886e8e8427f493712e98bd23b2f19c0169259', 2),
('7701cb2e1e7b9ade000e174def9680425316d8bd', 10),
('7ea386c4430021b87d93acdbc60984e5dd099f0b', 2),
('7ea386c4430021b87d93acdbc60984e5dd099f0b', 3),
('7ea386c4430021b87d93acdbc60984e5dd099f0b', 5),
('82c3915fbb292d347c83d664ee3f93ec80c6cbe5', 2),
('82c3915fbb292d347c83d664ee3f93ec80c6cbe5', 6),
('877eccd694ed4ab2665bcfb776b2b65ffffdecb7', 2),
('877eccd694ed4ab2665bcfb776b2b65ffffdecb7', 6),
('877eccd694ed4ab2665bcfb776b2b65ffffdecb7', 7),
('88142a377d62b399bfb84cb0e4feb97cbba856ef', 2),
('88142a377d62b399bfb84cb0e4feb97cbba856ef', 5),
('9108fadc9efffb74de2a62e451a680f324959140', 2),
('9108fadc9efffb74de2a62e451a680f324959140', 3),
('91beb94e0eab65e0672d53374979919828ca3feb', 2),
('96fe20008ee0d4f4e5872173c8f04a405b2dae34', 2),
('96fe20008ee0d4f4e5872173c8f04a405b2dae34', 7),
('98c94d88954e82350219d7f43afa92df80b8d2e0', 11),
('98c94d88954e82350219d7f43afa92df80b8d2e0', 12),
('9d5f40aa0a3ff72c0943c26dbe64aece4af3c806', 12),
('a82b18922060a5dee67dd71cb41de8f2d1ec236b', 2),
('a82b18922060a5dee67dd71cb41de8f2d1ec236b', 6),
('a82b18922060a5dee67dd71cb41de8f2d1ec236b', 10),
('a842d472ea470ace7ce53cd36cbf16b1ab6106fd', 2),
('aa9a2768321abf2945733e7e60f63933a772fd21', 2),
('aa9a2768321abf2945733e7e60f63933a772fd21', 7),
('ac0a79e7cdc311fadca94750f00fde1e1df6ec36', 2),
('ac0a79e7cdc311fadca94750f00fde1e1df6ec36', 6),
('bec45f5c938d0c1fef247f1b541722c9fd2e21d4', 2),
('d6110ab435dee7ee2ab58bbbf63ff29efaafd9cf', 2),
('d75ed3329c46cd0d46d0aed17b7acf5926fb1bfb', 2),
('d75ed3329c46cd0d46d0aed17b7acf5926fb1bfb', 10),
('d7d184443f1135765a2c3603872feb5a0e14f4a9', 2),
('d7d184443f1135765a2c3603872feb5a0e14f4a9', 6),
('db823ed6abc67e4daa61f78afd5c0a09b991abc9', 10),
('df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17', 8),
('df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17', 9),
('df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17', 10),
('e05c40e2a977417c7f27071efeddb90f8b964b59', 6),
('e524d248477bcaf60374696eaf30bdc9129ac0ec', 10),
('e6eea76d4fc98d079ac204ebbc6f8d5299bf31fe', 6),
('eedfd272fee622908451a2cfc76e06db177c362f', 2),
('eedfd272fee622908451a2cfc76e06db177c362f', 3),
('f54fe6604659382d6ad6b85014bbc2c8b0455e6e', 2),
('f54fe6604659382d6ad6b85014bbc2c8b0455e6e', 5),
('f54fe6604659382d6ad6b85014bbc2c8b0455e6e', 10),
('f6b3fd32a002bf75ddc6040b11d7ee0f3d9c0f36', 2),
('f6b3fd32a002bf75ddc6040b11d7ee0f3d9c0f36', 3);

-- --------------------------------------------------------

--
-- Structure de la table `typeintervention`
--

DROP TABLE IF EXISTS `typeintervention`;
CREATE TABLE IF NOT EXISTS `typeintervention` (
  `ID_type` int(11) NOT NULL,
  `ID_site` varchar(150) NOT NULL,
  KEY `FK_typeintervention_ID_type` (`ID_type`),
  KEY `FK_typeintervention_ID_site` (`ID_site`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typeintervention`
--

INSERT INTO `typeintervention` (`ID_type`, `ID_site`) VALUES
(1, '01deb354c599ba98140fe63b42a2c13c7ad70bcc'),
(1, '031259dedb465802684076c3b73af34f4ea68c8b'),
(1, '09b67f136d0db14e2f475c551db6b1ae22864335'),
(1, '11a3d2c1ee0a6fe1755d39116a98ba4e5afcf323'),
(1, '1bc37299baa6fbf11e71c3e32cde79e8e99ad429'),
(1, '1c8553f68eaaa94d634a146db1171478ef95dc25'),
(1, '20d7f3c03b358ece5332ad82dfe7f89558517882'),
(1, '23a2e7feb7558e1c27746369c7fd280963c6bd56'),
(1, '23b88e14595f626ab167884900c30417d17570a0'),
(1, '243514f4c3febd715b7dfd20e2e9e59133c7b7ff'),
(1, '25d919271194fd1ee4217a63778e507203ac73ff'),
(1, '2667b5d8501a1026f95ad67a5d163ac482c398d7'),
(1, '2824cf6a4cf8a45403179b950b8bd01042b78e11'),
(1, '2b3055fb286cce800c90bbd1e3dafeeefb612bc1'),
(1, '2d91109d86b30d9a689eaaabf01f282c691ea8b6'),
(1, '2eb0aab8297c80ad37bd20f808569534405adfc7'),
(1, '32b9187e5f9d3355398d61840282d95048191b04'),
(1, '37377f251badb17b51e5405705ac923776eb74c2'),
(1, '374955e877106f14be20c727184527b5c7f99cb0'),
(1, '3844a9842f60335416bbd808408dd371e6c92242'),
(1, '3b7946c831edaa8058503fa26cfd3fd8220bb7b6'),
(1, '3c3f51f79f90f4ca9a1a97dffa918f451d9c5f99'),
(1, '3f29421c8f5e8dad51827f1571e7b4cb9dd4be7f'),
(1, '3f2e7ac2eb38f6e220f6a1d24d7d6c3fdf998193'),
(1, '46319224ba97875eed5191a28ecfe8a1fcb2e6dc'),
(1, '475ef7ac34cb105129cd3c7a0a69a1d404e17087'),
(1, '4a77e7fc724eb97ac2d639660db6d6086386fc8c'),
(1, '4be6b6aed37124d060eaed99652cc27a6c98398f'),
(1, '50cf39534de4c245cf55f973acfb7b3d7acdefda'),
(1, '51a195acdfed68462179ca0b135589d42eb927c8'),
(1, '51a31e49c694d8f10d90e4afb6f9e02e9da958f5'),
(1, '529ae7bef039e468c3d45d5faf50da1f3298921e'),
(1, '55d3153c8edd055d436b5109ffae4458f5a38191'),
(1, '57c6068b69514d5638b08cb96823892a6f3e0805'),
(1, '5b94a8a1e4be04882b4b359d89fb59d6dbad7396'),
(1, '62b70a56d30f1d919e56c27e7a589718ea6354b9'),
(1, '65b958cb72b4b731a87eec7f2735d624883edd31'),
(1, '6cfef81d75dc44df95b912d70c82da53c662aaf0'),
(1, '762886e8e8427f493712e98bd23b2f19c0169259'),
(1, '7701cb2e1e7b9ade000e174def9680425316d8bd'),
(1, '7d21bc7ae33d449bc79b7517e989582c14e48fcf'),
(1, '7ea386c4430021b87d93acdbc60984e5dd099f0b'),
(1, '82c3915fbb292d347c83d664ee3f93ec80c6cbe5'),
(1, '8721e13a977a2cbf12d800f6f111230feae22148'),
(1, '877eccd694ed4ab2665bcfb776b2b65ffffdecb7'),
(1, '88142a377d62b399bfb84cb0e4feb97cbba856ef'),
(1, '9108fadc9efffb74de2a62e451a680f324959140'),
(1, '91beb94e0eab65e0672d53374979919828ca3feb'),
(1, '947e24980decdf88ac1737184ed8cb9c8708bb4f'),
(1, '96fe20008ee0d4f4e5872173c8f04a405b2dae34'),
(1, '97daf5771b0837a7fcef1c705edc03907a945707'),
(1, '98c94d88954e82350219d7f43afa92df80b8d2e0'),
(1, '9d5f40aa0a3ff72c0943c26dbe64aece4af3c806'),
(1, 'a82b18922060a5dee67dd71cb41de8f2d1ec236b'),
(1, 'a842d472ea470ace7ce53cd36cbf16b1ab6106fd'),
(1, 'aa966cc4dbdc306a2ea14dceba23faa347666cbd'),
(1, 'aa9a2768321abf2945733e7e60f63933a772fd21'),
(1, 'ac0a79e7cdc311fadca94750f00fde1e1df6ec36'),
(1, 'ad75e3a97dec8ad64a9ba56a1099c36a456faa6e'),
(1, 'bec45f5c938d0c1fef247f1b541722c9fd2e21d4'),
(1, 'c1bc0481830a95a92f5362f4ee56beb6f20cecec'),
(1, 'c2fd8a075043c53c69aa930fc854faf851c2310b'),
(1, 'c70bbfce2d3f01efb41b0a232fac2f47a1175d32'),
(1, 'cb32eb29e39b6f9f1ade07d45a070e2e200c0cd1'),
(1, 'd374471ec9c42aece8406e34ff4ac2bc1882f8d9'),
(1, 'd6110ab435dee7ee2ab58bbbf63ff29efaafd9cf'),
(1, 'd75ed3329c46cd0d46d0aed17b7acf5926fb1bfb'),
(1, 'd7d184443f1135765a2c3603872feb5a0e14f4a9'),
(1, 'd988641aaed819a7151eabf475e9fc14519c9648'),
(1, 'db823ed6abc67e4daa61f78afd5c0a09b991abc9'),
(1, 'de62d01d7853c759b824f3f2f5bd78d39fe3cb9e'),
(1, 'df308a4ac5c8c1cdfd54392fcd5c8b6932d5da17'),
(1, 'e05c40e2a977417c7f27071efeddb90f8b964b59'),
(1, 'e3f0ebb37b8167b252e2579f57b6acbdb913ab14'),
(1, 'e4d9d15ead5778de06fef6848c19c6a73839adb9'),
(1, 'e524d248477bcaf60374696eaf30bdc9129ac0ec'),
(1, 'e6eea76d4fc98d079ac204ebbc6f8d5299bf31fe'),
(1, 'eedfd272fee622908451a2cfc76e06db177c362f'),
(1, 'f54fe6604659382d6ad6b85014bbc2c8b0455e6e'),
(1, 'f6b3fd32a002bf75ddc6040b11d7ee0f3d9c0f36'),
(1, 'fff52f4ac0a03ea9b7b28a8cbd72342496b090d1');

-- --------------------------------------------------------

--
-- Structure de la table `type_intervention`
--

DROP TABLE IF EXISTS `type_intervention`;
CREATE TABLE IF NOT EXISTS `type_intervention` (
  `ID_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelleIntervention` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_intervention`
--

INSERT INTO `type_intervention` (`ID_type`, `libelleIntervention`) VALUES
(1, 'fouille');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `userpass` varchar(150) NOT NULL,
  `rankingaccess` int(1) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `FK_commune_ID_departement` FOREIGN KEY (`ID_departement`) REFERENCES `departement` (`ID_departement`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `FK_intervention_ID_site` FOREIGN KEY (`ID_site`) REFERENCES `site_intervention` (`ID_site`);

--
-- Contraintes pour la table `periodeintervention`
--
ALTER TABLE `periodeintervention`
  ADD CONSTRAINT `FK_periodeintervention_ID_periode` FOREIGN KEY (`ID_periode`) REFERENCES `periode` (`ID_periode`),
  ADD CONSTRAINT `FK_periodeintervention_ID_site` FOREIGN KEY (`ID_site`) REFERENCES `site_intervention` (`ID_site`);

--
-- Contraintes pour la table `site_intervention`
--
ALTER TABLE `site_intervention`
  ADD CONSTRAINT `FK_site_intervention_ID_commune` FOREIGN KEY (`ID_commune`) REFERENCES `commune` (`ID_commune`);

--
-- Contraintes pour la table `themeintervention`
--
ALTER TABLE `themeintervention`
  ADD CONSTRAINT `FK_themeintervention_ID_site` FOREIGN KEY (`ID_site`) REFERENCES `site_intervention` (`ID_site`),
  ADD CONSTRAINT `FK_themeintervention_ID_theme` FOREIGN KEY (`ID_theme`) REFERENCES `theme` (`ID_theme`);

--
-- Contraintes pour la table `typeintervention`
--
ALTER TABLE `typeintervention`
  ADD CONSTRAINT `FK_typeintervention_ID_site` FOREIGN KEY (`ID_site`) REFERENCES `site_intervention` (`ID_site`),
  ADD CONSTRAINT `FK_typeintervention_ID_type` FOREIGN KEY (`ID_type`) REFERENCES `type_intervention` (`ID_type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
