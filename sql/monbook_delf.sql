-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 06 juil. 2020 à 15:34
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monbook_delf`
--

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `titre_projet` varchar(250) NOT NULL,
  `chapo` varchar(250) DEFAULT NULL,
  `texte` text NOT NULL,
  `annee_realisation` int(11) NOT NULL,
  `client` varchar(250) DEFAULT NULL,
  `lien` varchar(250) DEFAULT NULL,
  `ordre` int(11) NOT NULL,
  `online` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre_projet`, `chapo`, `texte`, `annee_realisation`, `client`, `lien`, `ordre`, `online`) VALUES
(1, 'Ada Hôtel', NULL, 'Création d\'un site virtuel sur un hôtel', 2020, NULL, NULL, 1, NULL),
(2, 'Codevores', NULL, 'Création d\'une plateforme entre développeurs et clients', 2020, NULL, NULL, 2, NULL),
(3, 'Hôpital Ada', NULL, 'Création d\'un site sur un hôpital virtuel.', 2020, NULL, NULL, 3, NULL),
(4, 'musée Wylwich', NULL, 'Création d\'un site virtuel d\'un musée.', 2020, NULL, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projet_techno`
--

CREATE TABLE `projet_techno` (
  `projet_id` int(11) NOT NULL,
  `techno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet_techno`
--

INSERT INTO `projet_techno` (`projet_id`, `techno_id`) VALUES
(0, 1),
(0, 2),
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `simpledonnee`
--

CREATE TABLE `simpledonnee` (
  `id_simpledonnee` int(11) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `simpledonnee`
--

INSERT INTO `simpledonnee` (`id_simpledonnee`, `genre`, `contenu`) VALUES
(1, 'TITRE_ACCUEIL', 'Webmaster, my new life!'),
(2, 'TEXTE_ACCUEIL', 'J\'ai découvert le code en poussant la porte d\'un atelier et je ne savais pas que ce jour-là allait déterminer la suite de mon parcours professionnel. Je suis retombée en enfance quand j\'inventais des codes avec mes amies. Suite à cet atelier, je me suis lancée dans l\'aventure et j\'ai suivi une formation qui m\'a ouvert plusieurs chemins. Je vous laisse voir les projets fait au cours de cette formation. '),
(3, 'LINKEDIN', 'https://www.linkedin.com/checkpoint/challengesV2/AQGGIeJ4NaDDRwAAAXLWsPPWsJIpT-LbMBFEqBJeYVvnFJy5mwEibdktKzvEd9MS9w3vPkuwCQMIQEFMn0of5DTpI-ScK1LwWA'),
(4, 'MAIL', 'delphine.dumont.pro@gmail.com'),
(5, 'TELEPHONE', '06 82 61 97 27');

-- --------------------------------------------------------

--
-- Structure de la table `technologie`
--

CREATE TABLE `technologie` (
  `id_techno` int(11) NOT NULL,
  `nom_techno` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technologie`
--

INSERT INTO `technologie` (`id_techno`, `nom_techno`) VALUES
(1, 'HTML5'),
(2, 'CSS3'),
(3, 'JS'),
(4, 'PHP');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `identifiant` varchar(250) NOT NULL,
  `motdepasse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `identifiant`, `motdepasse`) VALUES
(1, 'delfine', 'admin_1', 'toto_1'),
(2, 'zoe', 'admin_2', 'toto_2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `simpledonnee`
--
ALTER TABLE `simpledonnee`
  ADD PRIMARY KEY (`id_simpledonnee`);

--
-- Index pour la table `technologie`
--
ALTER TABLE `technologie`
  ADD PRIMARY KEY (`id_techno`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `simpledonnee`
--
ALTER TABLE `simpledonnee`
  MODIFY `id_simpledonnee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `technologie`
--
ALTER TABLE `technologie`
  MODIFY `id_techno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
