-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 07 avr. 2026 à 16:59
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
(1, 4, 'Esther', 'Alabaster', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-01.png', 1, '2025-09-12 14:30:00'),
(2, 1, 'The Kinfolk Table', 'Nathan Williams', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-02.png', 1, '2025-10-05 09:15:00'),
(3, 1, 'Wabi Sabi', 'Beth Kempton', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-03.png', 1, '2025-11-18 16:45:00'),
(5, 17, 'Delight!', 'Justin Rossow', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-05.png', 0, '2026-01-14 08:00:00'),
(7, 8, 'Minimalist Graphics', 'Julia Schonlau', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-07.png', 1, '2026-02-03 10:45:00'),
(9, 17, 'Innovation', 'Matt Ridley', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-09.png', 1, '2026-02-17 17:20:00'),
(10, 10, 'Psalms', 'Alabaster', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-10.png', 1, '2026-02-25 09:30:00'),
(11, 3, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-11.png', 0, '2026-03-01 12:15:00'),
(12, 17, 'A Book Full Of Hope', 'Rupi Kaur', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-12.png', 0, '2026-03-05 15:40:00'),
(13, 12, 'The Subtle Art Of...', 'Mark Manson', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-13.png', 1, '2026-03-10 08:50:00'),
(15, 17, 'Company Of One', 'Paul Jarvis', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-15.png', 1, '2026-03-18 16:00:00'),
(16, 15, 'The Two Towers', 'J.R.R Tolkien', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'assets/img/book/book-16.png', 1, '2026-03-21 10:00:00'),
(17, 16, 'Dune', 'Frank Herbert', 'Un chef-d\'œuvre de la science-fiction qui transporte le lecteur sur la planète Arrakis. Une saga épique mêlant politique, religion et écologie dans un univers désertique fascinant.', 'assets/img/book/book-01.png', 0, '2026-04-01 10:00:00'),
(18, 16, 'Neuromancien', 'William Gibson', 'Le roman fondateur du cyberpunk. Une plongée vertigineuse dans un futur où hackers et intelligences artificielles se côtoient dans un monde connecté et dangereux.', 'assets/img/book/book-03.png', 1, '2026-04-02 14:30:00'),
(19, 16, 'Blade Runner', 'Philip K. Dick', 'Un roman visionnaire qui questionne la frontière entre l\'humain et l\'artificiel. Dans un futur dystopique, un chasseur de primes traque des androïdes presque indiscernables des humains.', 'assets/img/book/book-05.png', 0, '2026-04-03 08:00:00'),
(20, 16, 'Fondation', 'Isaac Asimov', 'Le premier tome de la saga monumentale d\'Asimov. Un mathématicien prédit la chute de l\'Empire Galactique et met en place un plan pour préserver le savoir de l\'humanité.', 'assets/img/book/book-07.png', 1, '2026-04-03 09:30:00');

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

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `recipient_id`, `content`, `created_at`, `is_read`) VALUES
(1, 16, 1, 'Bonjour, ton livre m\'intéresse beaucoup !', '2026-04-01 10:00:00', 1),
(2, 1, 16, 'Super ! Tu veux l\'échanger contre quoi ?', '2026-04-01 10:05:00', 1),
(3, 16, 1, 'J\'ai un roman de Zola si ça te convient.', '2026-04-01 10:10:00', 1),
(4, 1, 16, 'Parfait, ça marche pour moi !', '2026-04-01 10:15:00', 1),
(5, 2, 16, 'Salut, est-ce que ton livre est encore disponible ?', '2026-04-02 14:00:00', 1),
(6, 16, 2, 'Oui tout à fait, tu es intéressée ?', '2026-04-02 14:10:00', 1),
(7, 2, 16, 'Oui ! Je t\'envoie une proposition demain.', '2026-04-02 14:20:00', 1),
(8, 16, 3, 'Hello, j\'ai vu que tu cherches des BD ?', '2026-04-03 09:00:00', 1),
(9, 3, 16, 'Oui exactement ! Tu en as à proposer ?', '2026-04-03 09:15:00', 0),
(10, 16, 3, 'J\'ai Tintin et Astérix, ça t\'irait ?', '2026-04-03 09:20:00', 0),
(11, 10, 16, 'Bonjour, je suis intéressé par ton échange.', '2026-04-04 16:00:00', 0),
(12, 16, 10, 'Avec plaisir ! Qu\'est-ce que tu proposes ?', '2026-04-04 16:10:00', 1),
(13, 10, 16, 'Un livre de cuisine si ça te dit !', '2026-04-04 16:20:00', 0),
(14, 16, 1, 'test message', '2026-04-07 11:01:14', 0),
(15, 17, 1, 'Bonjour, ton livre m\'intéresse beaucoup !', '2026-04-05 09:00:00', 1),
(16, 1, 17, 'Super ! Tu veux l\'échanger contre quoi ?', '2026-04-05 09:10:00', 1),
(17, 17, 1, 'J\'ai un roman de Zola si ça te convient.', '2026-04-05 09:20:00', 1),
(18, 1, 17, 'Parfait, ça marche pour moi !', '2026-04-05 09:30:00', 0),
(19, 2, 17, 'Salut, est-ce que ton livre est encore dispo ?', '2026-04-05 11:00:00', 1),
(20, 17, 2, 'Oui tout à fait, tu es intéressée ?', '2026-04-05 11:15:00', 1),
(21, 2, 17, 'Oui ! Je t\'envoie une proposition demain.', '2026-04-05 11:30:00', 1),
(22, 17, 3, 'Hello, j\'ai vu que tu cherches des BD ?', '2026-04-06 14:00:00', 1),
(23, 3, 17, 'Oui exactement ! Tu en as à proposer ?', '2026-04-06 14:20:00', 1),
(24, 17, 3, 'J\'ai Tintin et Astérix, ça t\'irait ?', '2026-04-06 14:40:00', 1),
(25, 3, 17, 'Génial, je suis partant !', '2026-04-06 15:00:00', 0),
(26, 10, 17, 'Bonjour, je suis intéressé par ton échange.', '2026-04-06 16:00:00', 1),
(27, 17, 10, 'Avec plaisir ! Qu\'est-ce que tu proposes ?', '2026-04-06 16:20:00', 1),
(28, 10, 17, 'Un livre de cuisine si ça te dit !', '2026-04-06 16:40:00', 1),
(29, 17, 10, 'Bonne idée, envoie moi les détails.', '2026-04-06 17:00:00', 1),
(30, 17, 1, 'Bonjour, ton livre m\'intéresse beaucoup !', '2026-04-05 09:00:00', 1),
(31, 1, 17, 'Super ! Tu veux l\'échanger contre quoi ?', '2026-04-05 09:10:00', 1),
(32, 17, 1, 'J\'ai Milk & Honey de Rupi Kaur à proposer.', '2026-04-05 09:20:00', 1),
(33, 1, 17, 'Parfait, ça marche pour moi !', '2026-04-05 09:30:00', 0),
(34, 2, 17, 'Salut, est-ce que Hygge est encore dispo ?', '2026-04-05 11:00:00', 1),
(35, 17, 2, 'Oui tout à fait, tu es intéressée ?', '2026-04-05 11:15:00', 1),
(36, 2, 17, 'Oui ! Je t\'envoie une proposition demain.', '2026-04-05 11:30:00', 1),
(37, 17, 3, 'Hello, tu as des BD à échanger ?', '2026-04-06 14:00:00', 1),
(38, 3, 17, 'Oui j\'ai Thinking Fast & Slow, ça t\'intéresse ?', '2026-04-06 14:20:00', 1),
(39, 17, 3, 'Carrément ! Je te propose Narnia en échange.', '2026-04-06 14:40:00', 1),
(40, 3, 17, 'Génial, c\'est parti !', '2026-04-06 15:00:00', 0),
(41, 10, 17, 'Bonjour, Milwaukee Mission m\'intéresse !', '2026-04-06 16:00:00', 1),
(42, 17, 10, 'Avec plaisir, qu\'est-ce que tu proposes ?', '2026-04-06 16:20:00', 1),
(43, 10, 17, 'J\'ai Psalms de Alabaster à échanger.', '2026-04-06 16:40:00', 1),
(44, 17, 10, 'Bonne idée, envoie moi les détails !', '2026-04-06 17:00:00', 1),
(45, 17, 16, 'Salut', '2026-04-07 11:54:20', 1),
(46, 17, 16, 'Un de tes livres m\'intéresse', '2026-04-07 11:54:54', 1),
(47, 16, 17, 'Hello', '2026-04-07 11:58:40', 0),
(48, 16, 17, 'Ok, lequel ?', '2026-04-07 11:58:49', 0);

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
(1, 'alexlecture@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Alexlecture', 'assets/img/avatar/icons8-avatar-100.png', '2026-03-20 08:42:41'),
(2, 'nathalie@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Nathalire', 'assets/img/avatar/icons8-avatar-100-2.png', '2026-03-12 08:42:41'),
(3, 'sas634@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Sas634', 'assets/img/avatar/icons8-avatar-100-3.png', '2026-03-04 08:42:41'),
(4, 'camilleclublit@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'CamilleClubLit', 'assets/img/avatar/icons8-avatar-100-6.png', '2024-06-15 14:22:10'),
(5, 'juju1432@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Juju1432', 'assets/img/avatar/icons8-avatar-100.png', '2025-01-08 09:45:33'),
(6, 'hugo1990.12@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Hugo1990_12', 'assets/img/avatar/icons8-avatar-100-2.png', '2024-11-22 18:30:05'),
(7, 'christiane75014@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Christiane75014', 'assets/img/avatar/icons8-avatar-100-3.png', '2025-03-02 11:12:48'),
(8, 'hamzalecture@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Hamzalecture', 'assets/img/avatar/icons8-avatar-100-6.png', '2024-08-19 16:55:20'),
(9, 'louben50@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Lou&Ben50', 'assets/img/avatar/icons8-avatar-100.png', '2025-07-30 08:03:17'),
(10, 'lolobzh@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Lolobzh', 'assets/img/avatar/icons8-avatar-100-2.png', '2024-04-11 20:41:59'),
(11, 'ml95@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'ML95', 'assets/img/avatar/icons8-avatar-100-3.png', '2025-09-14 13:28:42'),
(12, 'virogo33@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Virogo33', 'assets/img/avatar/icons8-avatar-100-6.png', '2024-12-05 07:16:38'),
(13, 'annikabrahms@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'AnnikaBrahms', 'assets/img/avatar/icons8-avatar-100.png', '2025-05-21 15:09:55'),
(14, 'victoirefabr912@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Victoirefabr912', 'assets/img/avatar/icons8-avatar-100-2.png', '2024-09-28 10:37:24'),
(15, 'lotrfanclub67@gmail.com', '$2y$10$abcdefghijklmnopqrstuuABCDEFGHIJKLMNOPQRSTUVWXYZ012', 'Lotrfanclub67', 'assets/img/avatar/icons8-avatar-100-3.png', '2025-02-17 19:50:11'),
(16, 'farid.zaffalone@gmail.com', '$2y$10$PUMMC0pcngsJbGK/USOm0ekuQtZVRLvuAzYwujjQ2agPpTPcbZ8A6', 'Farid83300', 'assets/img/avatar/icons8-avatar-100-2.png', '2026-03-29 16:52:29'),
(17, 'evaluateur@tomtroc.fr', '$2y$10$gUra2XkeFw8n.b0aNxc7pO36kR0SMA518kPsejrKbYrcEVbqT51SS', 'Evaluateur', 'assets/img/avatar/icons8-avatar-100-2.png', '2026-04-07 11:36:40');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
