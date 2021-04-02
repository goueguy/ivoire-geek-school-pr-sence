-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 02 avr. 2021 à 18:55
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_presence`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenants`
--

CREATE TABLE `apprenants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `sexe` varchar(8) NOT NULL,
  `lieu_habitation` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `apprenants`
--

INSERT INTO `apprenants` (`id`, `nom`, `prenoms`, `email`, `telephone`, `sexe`, `lieu_habitation`, `date_inscription`) VALUES
(13, 'keita', 'Abdou karim', 'abdou.keita@gmail.com', '0801234556', 'Homme', 'Riviéra Anono', '2021-04-01 06:55:50'),
(20, 'test', 'test', 'test@gmail.com', '0709162397', 'Homme', 'Cocody Faya', '2021-04-02 05:23:37'),
(21, 'jilo', 'jilo', 'jlguy@yahoo.fr', '0709162397', 'Homme', 'Cocody Faya', '2021-04-02 05:24:11');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id` int(11) NOT NULL,
  `id_apprenant` int(11) NOT NULL,
  `date_jour` date NOT NULL,
  `statut` varchar(3) NOT NULL DEFAULT 'Non',
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`id`, `id_apprenant`, `date_jour`, `statut`, `date_ajout`) VALUES
(9, 1, '2021-03-29', 'Oui', '2021-03-29 07:34:44'),
(10, 1, '2021-03-31', 'Oui', '2021-03-31 05:41:25'),
(11, 10, '2021-03-31', 'Oui', '2021-03-31 10:32:50'),
(12, 11, '2021-04-01', 'Oui', '2021-04-01 11:41:51'),
(13, 12, '2021-04-01', 'Oui', '2021-04-01 04:19:58'),
(15, 13, '2021-04-02', 'Oui', '2021-04-02 08:34:36'),
(16, 14, '2021-04-02', 'Oui', '2021-04-02 11:16:01'),
(17, 21, '2021-04-02', 'Oui', '2021-04-02 05:26:16'),
(18, 20, '2021-04-02', 'Oui', '2021-04-02 06:43:18');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenoms`, `email`, `password`, `date_ajout`) VALUES
(1, 'goueguy', 'jean-louis', 'jlagoueguy@gmail.com', '79aafe839b67b8038ea6a878441ff9a0', '2021-04-01 15:11:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenants`
--
ALTER TABLE `apprenants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenants`
--
ALTER TABLE `apprenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
