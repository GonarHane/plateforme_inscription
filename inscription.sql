-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 10 nov. 2022 à 15:13
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `roles` varchar(50) DEFAULT NULL,
  `mdp` text NOT NULL,
  `etat` int(11) DEFAULT 1,
  `date_ajout` date DEFAULT current_timestamp(),
  `date_modif` date DEFAULT NULL,
  `date_archive` date DEFAULT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `matricule`, `nom`, `prenom`, `mail`, `roles`, `mdp`, `etat`, `date_ajout`, `date_modif`, `date_archive`, `photo`) VALUES
(19, 'US9lv', 'diallo', 'abdou', 'abdou@gmail.com', 'utilisateur', '$2y$10$hY51pEsLwOT8AS53T/hEJuaTD7jndYcLdYfRwKBfYxjpFJwNhmXiy', 1, '2022-11-07', NULL, NULL, NULL),
(20, 'US9jm', 'ba', 'ada', 'ba@gmail.com', 'administrateur', '$2y$10$tERXoR6ymNyVO1hrrbTCoO8XvvzVzuwFvBk3hE3E5ehOtLPvdONDK', 1, '2022-11-07', NULL, NULL, NULL),
(21, 'USo3u', 'fall', 'sidi', 'fa@gmail.com', 'utilisateur', '$2y$10$/h9UssSNdySHr.si.NEkV.4Vih7wZBJlEpv3O9m7wDoCCxJnQFcji', 1, '2022-11-07', NULL, NULL, NULL),
(22, 'US6fc', 'hane', 'gone', 'hane@gmail.com', 'utilisateur', '$2y$10$Cj1UFSjkaF8yHQMlHkfG6.HV916/6KOXGCV7kHrFeHmj5fe2Qa1sa', 1, '2022-11-07', NULL, NULL, NULL),
(23, 'US9dg', 'Sarr', 'Mamadou', 'sarr@gmail.com', 'administrateur', '$2y$10$whNcvmw4MTX/PZ142qYpH.W13m1md3zIrcxe2jtBi/mFtLVRQODyW', 1, '2022-11-07', NULL, NULL, NULL),
(24, 'US57k', 'hane', 'gonar', 'go@gmail.com', 'administrateur', '$2y$10$iimevTaH11bTjptie1WfEuo0et2kjEINIhYDhVM7aDFP1dUBU7fCu', 1, '2022-11-09', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
