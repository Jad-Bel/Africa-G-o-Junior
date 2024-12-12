-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 déc. 2024 à 15:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeux_geo`
--

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE `continent` (
  `continent_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `continent`
--

INSERT INTO `continent` (`continent_id`, `nom`) VALUES
(1, 'Afriqua'),
(2, 'Europe'),
(3, 'Asia'),
(4, 'Australia'),
(5, 'America');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `Population` bigint(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `langue` varchar(50) NOT NULL,
  `continent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `Population`, `nom`, `langue`, `continent_id`) VALUES
(60, 54409800, 'Tanzanie', 'Swahili, Anglais', 1),
(61, 24206000, 'Ghana', 'Anglais', 1),
(62, 8791800, 'Rwanda', 'Kinyarwanda, Anglais, Français', 1),
(63, 30417859, 'Mozambique', 'Portugais', 1),
(64, 20832869, 'Burkina Faso', 'Français', 1),
(65, 16914985, 'Mali', 'Français', 1),
(66, 13865000, 'Somalie', 'Somali, Arabe', 1),
(67, 16008543, 'Zambie', 'Anglais', 1),
(68, 23816940, 'Madagascar', 'Malagasy, Français', 1),
(69, 12317400, 'Togo', 'Français', 1),
(70, 34318800, 'Ouganda', 'Anglais, Swahili', 1),
(71, 19125000, 'Soudan', 'Arabe, Anglais', 1),
(72, 27202686, 'Côte d’Ivoire', 'Français', 1),
(73, 2278825, 'Namibie', 'Anglais', 1),
(74, 9724723, 'Guinée', 'Français', 1),
(75, 25511044, 'Zimbabwe', 'Anglais, Shona, Sindebele', 1),
(76, 1261375, 'Djibouti', 'Français, Arabe', 1),
(77, 2073000, 'Botswana', 'Anglais, Setswana', 1),
(78, 2120000, 'Lesotho', 'Anglais, Sesotho', 1),
(79, 6709000, 'Libye', 'Arabe', 1),
(80, 1386914, 'Eswatini', 'Anglais, Siswati', 1),
(81, 6565082, 'Sierra Leone', 'Anglais', 1),
(82, 2125426, 'Gabon', 'Français', 1),
(83, 2342000, 'Mauritanie', 'Arabe', 1),
(85, 333333, 'Maroc', 'arabe', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `capital` tinyint(1) DEFAULT NULL,
  `id_pays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom`, `capital`, `id_pays`) VALUES
(1, 'Rabat', 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`continent_id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`),
  ADD KEY `continent_id` (`continent_id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`),
  ADD KEY `id_pays` (`id_pays`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `continent`
--
ALTER TABLE `continent`
  MODIFY `continent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`continent_id`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
