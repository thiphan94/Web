-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2019 at 10:10 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thi_phan`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_categorie_cat`
--

DROP TABLE IF EXISTS `t_categorie_cat`;
CREATE TABLE IF NOT EXISTS `t_categorie_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_intitule` varchar(100) DEFAULT NULL,
  `cat_statut` char(1) NOT NULL,
  `cat_date` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_categorie_cat`
--

INSERT INTO `t_categorie_cat` (`cat_id`, `cat_intitule`, `cat_statut`, `cat_date`) VALUES
(1, 'Travail', 'R', '2019-11-03'),
(2, 'Programme', 'G', '2019-11-03'),
(3, 'Boutique', 'R', '2019-11-02'),
(4, 'Gestion', 'G', '2019-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `t_compte_cpt`
--

DROP TABLE IF EXISTS `t_compte_cpt`;
CREATE TABLE IF NOT EXISTS `t_compte_cpt` (
  `cpt_pseudo` varchar(60) NOT NULL,
  `cpt_mot_depass` char(40) NOT NULL,
  PRIMARY KEY (`cpt_pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_mot_depass`) VALUES
('pandora', '3bd3e10655b6fa156e636f4881194916'),
('zara', 'f6a86760a346912834f1b438e3b4867f'),
('mango', '8a81e4616c060c77fc4f1d7d4f38ad90'),
('robert', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `t_information_inf`
--

DROP TABLE IF EXISTS `t_information_inf`;
CREATE TABLE IF NOT EXISTS `t_information_inf` (
  `inf_id` int(11) NOT NULL,
  `inf_texte` varchar(60) NOT NULL,
  `inf_date` date NOT NULL,
  `inf_etat` char(1) NOT NULL,
  `cpt_pseudo` varchar(60) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`inf_id`),
  KEY `t_inf_t_cpt_FK` (`cpt_pseudo`),
  KEY `t_inf_t_cat_FK` (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_information_inf`
--

INSERT INTO `t_information_inf` (`inf_id`, `inf_texte`, `inf_date`, `inf_etat`, `cpt_pseudo`, `cat_id`) VALUES
(524, 'CDI vendeur/se 35h', '2019-11-03', 'L', 'pandora', 1),
(546, 'Nouvelle carte fidélité', '2019-11-03', 'L', 'zara', 3),
(653, 'portefeuille trouvé', '2019-11-02', 'L', 'mango', 3),
(754, 'Reunion fin d\'annee', '2019-12-13', 'L', 'robert', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_liste_lis`
--

DROP TABLE IF EXISTS `t_liste_lis`;
CREATE TABLE IF NOT EXISTS `t_liste_lis` (
  `cat_id` int(11) NOT NULL,
  `url_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`,`url_id`),
  KEY `t_lis_t_url_FK` (`url_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_liste_lis`
--

INSERT INTO `t_liste_lis` (`cat_id`, `url_id`) VALUES
(1, 321),
(2, 76),
(4, 39);

-- --------------------------------------------------------

--
-- Table structure for table `t_news_new`
--

DROP TABLE IF EXISTS `t_news_new`;
CREATE TABLE IF NOT EXISTS `t_news_new` (
  `new_num` int(11) NOT NULL,
  `new_titre` varchar(60) NOT NULL,
  `new_texte` varchar(200) NOT NULL,
  `new_date` date NOT NULL,
  `new_etat` char(1) NOT NULL,
  `cpt_pseudo` varchar(60) NOT NULL,
  PRIMARY KEY (`new_num`),
  KEY `t_new_t_cpt_FK` (`cpt_pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_news_new`
--

INSERT INTO `t_news_new` (`new_num`, `new_titre`, `new_texte`, `new_date`, `new_etat`, `cpt_pseudo`) VALUES
(1, 'Sale season ', 'Soldes sur une sélection d\'articles signalés en magasin 30 et 50% de remise.', '2019-11-03', 'L', 'pandora'),
(3, 'New collection', '', '2019-11-03', 'C', 'zara'),
(2, 'Mid Term Sale', '30% - 50% ', '2019-11-02', 'L', 'mango');

-- --------------------------------------------------------

--
-- Table structure for table `t_profil_pfl`
--

DROP TABLE IF EXISTS `t_profil_pfl`;
CREATE TABLE IF NOT EXISTS `t_profil_pfl` (
  `pfl_nom` varchar(60) NOT NULL,
  `pfl_prenom` varchar(60) NOT NULL,
  `pfl_email` varchar(60) NOT NULL,
  `pfl_validite` char(1) NOT NULL,
  `pfl_statut` char(1) NOT NULL,
  `pfl_date` date NOT NULL,
  `cpt_pseudo` varchar(60) NOT NULL,
  PRIMARY KEY (`cpt_pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`pfl_nom`, `pfl_prenom`, `pfl_email`, `pfl_validite`, `pfl_statut`, `pfl_date`, `cpt_pseudo`) VALUES
('Henri', 'Louis', 'pandora@gmail.com', 'A', 'R', '2019-11-01', 'pandora'),
('Mosby', 'Ted', 'zara@gmail.com', 'D', 'R', '2019-11-02', 'zara'),
('Burble', 'Lara', 'mango@gmail.com', 'D', 'R', '2019-10-31', 'mango'),
('Saint', 'Robert', 'strobert@gmail.com', 'A', 'G', '2019-12-01', 'robert');

-- --------------------------------------------------------

--
-- Table structure for table `t_url_url`
--

DROP TABLE IF EXISTS `t_url_url`;
CREATE TABLE IF NOT EXISTS `t_url_url` (
  `url_id` int(11) NOT NULL,
  `url_nom` char(40) NOT NULL,
  `url_chaîne` char(40) NOT NULL,
  PRIMARY KEY (`url_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_url_url`
--

INSERT INTO `t_url_url` (`url_id`, `url_nom`, `url_chaîne`) VALUES
(321, 'CDI', 'http://ccrdl.pandora.anff'),
(76, 'Fidelite', 'http://ccrdl.zara.fled'),
(39, 'Trouve', 'http://ccrdl.mango.df');

-- --------------------------------------------------------

--
-- Table structure for table `t_visuel_vis`
--

DROP TABLE IF EXISTS `t_visuel_vis`;
CREATE TABLE IF NOT EXISTS `t_visuel_vis` (
  `vis_id` int(11) NOT NULL,
  `vis_descriptif` varchar(60) NOT NULL,
  `vis_fichier` char(40) DEFAULT NULL,
  `vis_date` date NOT NULL,
  `vis_visibilite` char(1) NOT NULL,
  `cpt_pseudo` varchar(60) NOT NULL,
  PRIMARY KEY (`vis_id`),
  KEY `t_vis_t_cpt_FK` (`cpt_pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_visuel_vis`
--

INSERT INTO `t_visuel_vis` (`vis_id`, `vis_descriptif`, `vis_fichier`, `vis_date`, `vis_visibilite`, `cpt_pseudo`) VALUES
(145, 'sale', 'pandora-solde-2019.jpg', '2019-11-03', 'L', 'pandora'),
(754, 'collection 2019', 'new_2019_zara.jpg', '2019-11-03', 'C', 'zara'),
(143, 'sale', 'sale_mango.jpg', '2019-11-02', 'L', 'mango');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
