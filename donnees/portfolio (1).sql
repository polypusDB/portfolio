-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 11:05 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `imageprojet`
--

CREATE TABLE `imageprojet` (
  `id_projet` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imageprojet`
--

INSERT INTO `imageprojet` (`id_projet`, `id_image`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `src` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `meta` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id_image`, `src`, `role`, `meta`) VALUES
(1, './images/art_pub_mtl_miniature.jpg', 'miniature', 'artpubmtl_miniature'),
(2, './images/mokup.png', 'mokup', 'mokup art-pub-mtl'),
(3, './images/VaisseauMiniature.png', 'miniature', 'miniature vaisseau'),
(4, './images/vaisseauDetails.png', 'mokup', 'miniature vaisseau'),
(5, './images/miniature_sunshine-01.png', 'miniature', 'miniature sunshine'),
(6, './images/mockup_sunshine.png', 'mokup', 'mukup sunshine'),
(7, './images/miniature_scaphandre-01.png', 'miniature', 'miniature scaphandre'),
(8, './images/details_scaphandre.png', 'mokup', 'details_scaphandre_3D'),
(9, './images/miniature_matis-01.png', 'miniature', 'miniature_matis'),
(10, './images/mockup_Matis.png', 'mokup', 'mokup_matis'),
(11, './images/art_pub_mtl_miniature.jpg', 'miniature', 'artpubmtl_vue'),
(12, './images/mokup.png', 'mokup', 'mokup_vue');

-- --------------------------------------------------------

--
-- Table structure for table `languageprogramme`
--

CREATE TABLE `languageprogramme` (
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languageprogramme`
--

INSERT INTO `languageprogramme` (`nom`) VALUES
('JavaScript'),
('Ajax'),
('PHP'),
('HTML'),
('CSS'),
('Maya'),
('Unity'),
('C#'),
('Vue.js');

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `titre` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `lien_web` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`titre`, `id`, `description`, `type`, `lien_web`) VALUES
('ART-PUB-MTL', 1, 'ééééééééééééééééééé', 'WEB', 'https://github.com/les-mieux-meilleurs/art-pub-mtl'),
('Vue', 6, 'jfjfjfjfj', 'WEB', 'lines'),
('Vaisseau 3D', 2, 'je suis un vaisseau lalalaalalalal', '3D', 'lien_lien'),
('Sunshine Village', 3, 'test', 'WEB', 'LIEN WEB'),
('Scaphandre', 4, 'travail de 3d', '3D', 'lien web'),
('Matis', 5, 'DESCRIPTIONS', 'Jeux', 'LIEN LIEN');

-- --------------------------------------------------------

--
-- Table structure for table `projet_languages`
--

CREATE TABLE `projet_languages` (
  `id_projet` int(11) NOT NULL,
  `nom_lang` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet_languages`
--

INSERT INTO `projet_languages` (`id_projet`, `nom_lang`) VALUES
(1, 'Ajax'),
(1, 'CSS'),
(1, 'HTML'),
(1, 'JavaScript'),
(1, 'PHP'),
(2, 'Maya'),
(3, 'CSS'),
(3, 'HTML'),
(3, 'JavaScript'),
(3, 'PHP'),
(4, 'Maya'),
(5, 'C#'),
(5, 'Unity'),
(6, 'HTML'),
(6, 'Vue.js');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imageprojet`
--
ALTER TABLE `imageprojet`
  ADD PRIMARY KEY (`id_projet`,`id_image`),
  ADD KEY `id_image` (`id_image`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projet_languages`
--
ALTER TABLE `projet_languages`
  ADD PRIMARY KEY (`id_projet`,`nom_lang`),
  ADD KEY `nom_lang` (`nom_lang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
