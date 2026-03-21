-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 21 mars 2026 à 20:26
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tom-troc`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `user_id`, `title`, `author`, `description`, `photo`, `availability`, `created_at`) VALUES
(1, 4, 'Esther', 'Alabaster', 'Un recueil magnifique qui explore la foi et la beauté à travers des illustrations et des textes poétiques. Une lecture contemplative et apaisante.', 'assets/img/book/book-01.png', 1, '2025-09-12 14:30:00'),
(2, 1, 'The Kinfolk Table', 'Nathan Williams', 'Un livre qui célèbre l\'art de recevoir simplement. Recettes, portraits et réflexions sur le partage autour d\'une table entre amis.', 'assets/img/book/book-02.png', 1, '2025-10-05 09:15:00'),
(3, 1, 'Wabi Sabi', 'Beth Kempton', 'Une invitation à embrasser l\'imperfection et la simplicité inspirée de la philosophie japonaise. Un guide pour ralentir et apprécier l\'essentiel.', 'assets/img/book/book-03.png', 1, '2025-11-18 16:45:00'),
(4, 6, 'Milk & honey', 'Rupi Kaur', 'Un recueil de poèmes puissants sur l\'amour, la perte, le traumatisme et la guérison. Des mots bruts qui touchent en plein cœur.', 'assets/img/book/book-04.png', 1, '2025-12-01 11:20:00'),
(5, 5, 'Delight!', 'Justin Rossow', 'Une exploration joyeuse et colorée du bonheur quotidien. L\'auteur nous invite à redécouvrir l\'émerveillement dans les petites choses de la vie.', 'assets/img/book/book-05.png', 0, '2026-01-14 08:00:00'),
(6, 7, 'Milwaukee Mission', 'Elder Cooper Low', 'Un récit captivant sur la découverte de soi à travers le service aux autres. Une histoire inspirante de dévouement et de transformation personnelle.', 'assets/img/book/book-06.png', 1, '2026-01-28 19:30:00'),
(7, 8, 'Minimalist Graphics', 'Julia Schonlau', 'Un ouvrage de référence sur le design graphique minimaliste. Des exemples inspirants et des principes clés pour créer avec moins.', 'assets/img/book/book-07.png', 1, '2026-02-03 10:45:00'),
(8, 6, 'Hygge', 'Meik Wiking', 'Le guide ultime du bonheur à la danoise. Découvrez comment créer une atmosphère chaleureuse et profiter des plaisirs simples au quotidien.', 'assets/img/book/book-08.png', 1, '2026-02-10 14:00:00'),
(9, 9, 'Innovation', 'Matt Ridley', 'Une analyse fascinante de comment les innovations naissent et se propagent. L\'auteur déconstruit les mythes autour du génie solitaire.', 'assets/img/book/book-09.png', 1, '2026-02-17 17:20:00'),
(10, 10, 'Psalms', 'Alabaster', 'Une édition contemporaine et épurée des Psaumes, accompagnée d\'illustrations modernes. Un bel objet qui invite à la méditation.', 'assets/img/book/book-10.png', 1, '2026-02-25 09:30:00'),
(11, 3, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'L\'œuvre majeure du prix Nobel d\'économie sur nos deux systèmes de pensée. Un livre qui change notre façon de comprendre nos décisions.', 'assets/img/book/book-11.png', 0, '2026-03-01 12:15:00'),
(12, 11, 'A Book Full Of Hope', 'Rupi Kaur', 'Des poèmes lumineux sur la résilience et l\'espoir. Rupi Kaur nous rappelle que même dans l\'obscurité, la lumière finit toujours par percer.', 'assets/img/book/book-12.png', 1, '2026-03-05 15:40:00'),
(13, 12, 'The Subtle Art Of...', 'Mark Manson', 'Un guide de développement personnel rafraîchissant et sans filtre. L\'auteur nous apprend à choisir nos combats et accepter nos limites.', 'assets/img/book/book-13.png', 1, '2026-03-10 08:50:00'),
(14, 13, 'Narnia', 'C.S Lewis', 'Le classique intemporel qui transporte dans un monde fantastique peuplé de créatures magiques. Une aventure épique pour tous les âges.', 'assets/img/book/book-14.png', 0, '2026-03-14 11:30:00'),
(15, 14, 'Company Of One', 'Paul Jarvis', 'Pourquoi rester petit est la prochaine grande tendance. Un plaidoyer intelligent pour les entrepreneurs qui préfèrent la liberté à la croissance.', 'assets/img/book/book-15.png', 1, '2026-03-18 16:00:00'),
(16, 15, 'The Two Towers', 'J.R.R Tolkien', 'Le deuxième tome épique du Seigneur des Anneaux. La communauté est brisée mais l\'aventure continue dans les terres sauvages de la Terre du Milieu.', 'assets/img/book/book-16.png', 1, '2026-03-21 10:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `sender_id` int NOT NULL,
  `recipient_id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `profile_picture`, `created_at`) VALUES
(1, 'alexlecture@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Alexlecture', 'assets/img/avatar/defaut-avatar.png', '2026-03-20 08:42:41'),
(2, 'nathalie@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Nathalire', 'assets/img/avatar/defaut-avatar.png', '2026-03-12 08:42:41'),
(3, 'sas634@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Sas634', 'assets/img/avatar/defaut-avatar.png', '2026-03-04 08:42:41'),
(4, 'camilleclublit@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'CamilleClubLit', 'assets/img/avatar/defaut-avatar.png', '2024-06-15 14:22:10'),
(5, 'juju1432@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Juju1432', 'assets/img/avatar/defaut-avatar.png', '2025-01-08 09:45:33'),
(6, 'hugo1990.12@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Hugo1990_12', 'assets/img/avatar/defaut-avatar.png', '2024-11-22 18:30:05'),
(7, 'christiane75014@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Christiane75014', 'assets/img/avatar/defaut-avatar.png', '2025-03-02 11:12:48'),
(8, 'hamzalecture@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Hamzalecture', 'assets/img/avatar/defaut-avatar.png', '2024-08-19 16:55:20'),
(9, 'louben50@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Lou&Ben50', 'assets/img/avatar/defaut-avatar.png', '2025-07-30 08:03:17'),
(10, 'lolobzh@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Lolobzh', 'assets/img/avatar/defaut-avatar.png', '2024-04-11 20:41:59'),
(11, 'ml95@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'ML95', 'assets/img/avatar/defaut-avatar.png', '2025-09-14 13:28:42'),
(12, 'virogo33@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Virogo33', 'assets/img/avatar/defaut-avatar.png', '2024-12-05 07:16:38'),
(13, 'annikabrahms@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'AnnikaBrahms', 'assets/img/avatar/defaut-avatar.png', '2025-05-21 15:09:55'),
(14, 'victoirefabr912@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Victoirefabr912', 'assets/img/avatar/defaut-avatar.png', '2024-09-28 10:37:24'),
(15, 'lotrfanclub67@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Lotrfanclub67', 'assets/img/avatar/defaut-avatar.png', '2025-02-17 19:50:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
