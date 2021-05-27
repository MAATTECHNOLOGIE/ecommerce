-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 16 mai 2021 à 18:33
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prunekcr_evoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`, `updated_at`, `created_at`) VALUES
(21, 'vêtement', '2021-05-14 13:42:21', '2021-05-14 13:42:21'),
(22, 'chaussure', '2021-05-14 13:42:37', '2021-05-14 13:42:37'),
(24, 'accessoire', '2021-05-16 07:28:44', '2021-05-16 07:28:44');

-- --------------------------------------------------------

--
-- Structure de la table `catg_has_scatgs`
--

CREATE TABLE `catg_has_scatgs` (
  `id` int(11) NOT NULL,
  `Idcatg` varchar(11) NOT NULL,
  `Idscatg` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `catg_has_scatgs`
--

INSERT INTO `catg_has_scatgs` (`id`, `Idcatg`, `Idscatg`, `created_at`, `updated_at`) VALUES
(13, '22', '7', '2021-05-14 13:44:55', '2021-05-14 13:44:55'),
(14, '22', '8', '2021-05-14 13:45:05', '2021-05-14 13:45:05'),
(15, '21', '9', '2021-05-14 13:45:26', '2021-05-14 13:45:26'),
(16, '21', '6', '2021-05-14 13:45:36', '2021-05-14 13:45:36');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` text,
  `prenom` text,
  `domicile` text COMMENT 'Domicile ',
  `ville` text,
  `pays` text,
  `numero_telephone` text,
  `mail` text,
  `pass` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `montant` int(11) DEFAULT NULL,
  `dateComd` text,
  `numComd` text COMMENT 'Numéro unique de la commande\n',
  `Statut` int(11) DEFAULT NULL COMMENT '0 : New\r\n\r\n1 : livré\r\n\r\n2 : refusé',
  `paiement` text COMMENT '1 : Payé à la livraison\r\n2 : Payer avant  la livraison',
  `solde` int(11) DEFAULT NULL COMMENT '1:soldé/0:non soldé',
  `client_id` int(11) NOT NULL,
  `lieuLivraison` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `montant`, `dateComd`, `numComd`, `Statut`, `paiement`, `solde`, `client_id`, `lieuLivraison`, `created_at`, `updated_at`) VALUES
(26, 3004, '11-04-2021 09:44:02', '20210411094402', 1, '1', 0, 8, 'Côte d\'ivoire-Yamoussoukro : 3000 cfa', '2021-04-11 07:44:03', '2021-04-11 07:44:03'),
(27, 2036, '11-04-2021 18:15:06', '20210411181506', 0, '1', 0, 8, 'Côte d\'ivoire-Abidjan : 2000 cfa', '2021-04-11 16:15:07', '2021-04-11 16:15:07'),
(31, 10001, '19-04-2021 15:38:10', '20210419153810', 1, '1', 0, 11, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-04-19 13:38:10', '2021-04-19 13:38:10');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `images` text,
  `produits_id` int(11) NOT NULL,
  `produits_categorie_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id` int(11) NOT NULL,
  `livraison` varchar(45) DEFAULT NULL COMMENT 'prix de la livraison\n',
  `ville_id` int(11) NOT NULL,
  `ville_pays_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `livraison`, `ville_id`, `ville_pays_id`, `updated_at`, `created_at`) VALUES
(3, '5000', 3, 1, '2021-04-19 13:11:21', '2021-04-19 13:11:21');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `pays` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `pays`, `updated_at`, `created_at`) VALUES
(1, 'Côte d\'ivoire', '2021-04-19 09:54:35', '2021-04-19 09:54:35');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` text,
  `prix` text,
  `img` text,
  `description` text,
  `categorie_id` int(11) NOT NULL,
  `idsctg` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `statut` int(11) NOT NULL COMMENT '0:nouvelle / 1:publie/2:bloque'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `img`, `description`, `categorie_id`, `idsctg`, `updated_at`, `created_at`, `statut`) VALUES
(36, 'Chemises Bleu', '5000', 'storage/app/public/imgProd/Z4ECo6Sgeu9FoXSg8LFVWQTAYONjFA8YMLSSj4ep.png', 'un produit fait local par PRUNEK', 21, 9, '2021-05-14 13:47:22', '2021-05-14 13:47:22', 1),
(37, 'Chemises orange', '8000', 'storage/app/public/imgProd/KtjjihzhWLkl4yP0A8Jt8JBsUYhMJceLcO5D8F1y.png', 'Achetez et rendrez vous beau chez PRUNEK', 21, 9, '2021-05-14 13:48:07', '2021-05-14 13:48:07', 1),
(38, 'Paire Adidas', '5000', 'storage/app/public/imgProd/O9FgjNfpXOqrGymVeK3gDsjYINmwUllrh2PDu3gg.png', 'Que de beaux articles avec nous', 22, 10, '2021-05-15 21:43:16', '2021-05-15 21:43:16', 1),
(39, 'Sac gucci', '5000', 'storage/app/public/imgProd/RbExrNaHRQG0HQWCCeMue0zu0yXj9iUU3z1BkbXq.jpeg', 'rendez vous tres chics', 24, 10, '2021-05-16 07:32:24', '2021-05-16 07:32:24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_clients`
--

CREATE TABLE `produits_has_clients` (
  `id` int(11) NOT NULL,
  `produits_id` int(11) NOT NULL,
  `produits_categorie_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `datecomd` text NOT NULL,
  `numComd` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits_has_clients`
--

INSERT INTO `produits_has_clients` (`id`, `produits_id`, `produits_categorie_id`, `client_id`, `qte`, `montant`, `datecomd`, `numComd`, `updated_at`, `created_at`) VALUES
(6, 38, 7, 8, 1, 4, '10-04-2021 21:43:34', '20210410214334', '2021-04-10 19:43:34', '2021-04-10 19:43:34'),
(7, 38, 7, 8, 1, 4, '10-04-2021 21:44:49', '20210410214449', '2021-04-10 19:44:49', '2021-04-10 19:44:49'),
(8, 38, 7, 8, 1, 4, '10-04-2021 21:45:37', '20210410214537', '2021-04-10 19:45:37', '2021-04-10 19:45:37'),
(9, 38, 7, 8, 1, 4, '10-04-2021 21:45:46', '20210410214546', '2021-04-10 19:45:47', '2021-04-10 19:45:47'),
(10, 38, 7, 8, 1, 4, '10-04-2021 21:46:08', '20210410214608', '2021-04-10 19:46:08', '2021-04-10 19:46:08'),
(11, 38, 7, 8, 1, 4, '10-04-2021 21:46:18', '20210410214618', '2021-04-10 19:46:18', '2021-04-10 19:46:18'),
(12, 38, 7, 8, 1, 4, '10-04-2021 21:46:50', '20210410214650', '2021-04-10 19:46:50', '2021-04-10 19:46:50'),
(13, 38, 7, 8, 1, 4, '11-04-2021 07:45:27', '20210411074527', '2021-04-11 05:45:27', '2021-04-11 05:45:27'),
(14, 38, 7, 8, 1, 4, '11-04-2021 07:45:47', '20210411074547', '2021-04-11 05:45:47', '2021-04-11 05:45:47'),
(15, 38, 7, 8, 1, 4, '11-04-2021 07:51:26', '20210411075126', '2021-04-11 05:51:26', '2021-04-11 05:51:26'),
(16, 38, 7, 8, 1, 4, '11-04-2021 07:53:42', '20210411075342', '2021-04-11 05:53:42', '2021-04-11 05:53:42'),
(17, 38, 7, 8, 1, 4, '11-04-2021 07:53:57', '20210411075357', '2021-04-11 05:53:57', '2021-04-11 05:53:57'),
(23, 38, 7, 8, 1, 4, '11-04-2021 09:44:02', '20210411094402', '2021-04-11 07:44:02', '2021-04-11 07:44:02'),
(24, 38, 7, 8, 9, 36, '11-04-2021 18:15:06', '20210411181506', '2021-04-11 16:15:06', '2021-04-11 16:15:06'),
(28, 9, 15, 11, 1, 5001, '19-04-2021 15:38:10', '20210419153810', '2021-04-19 13:38:10', '2021-04-19 13:38:10');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `devises` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `logo` text NOT NULL,
  `site` text NOT NULL,
  `tel` text NOT NULL,
  `lieu` text NOT NULL,
  `heur` text NOT NULL,
  `pass` text NOT NULL,
  `year` varchar(225) NOT NULL,
  `about` text NOT NULL,
  `plays` text NOT NULL,
  `faceb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `devises`, `mail`, `logo`, `site`, `tel`, `lieu`, `heur`, `pass`, `year`, `about`, `plays`, `faceb`) VALUES
(1, 'cfa', 'contact@prunekcreation.com', 'storage/imgLogo/Hsto2eyxGqZGfRwpe2OWxB6pipCsoD7oD0E0Dsbc.png', 'PRUNEK', '+225 01 01 08 43 57', 'Abidjan - Marcory (Stade Champroux)', '24H/24', '1234NG', '2021', 'On avait envie de créer une marque qui a du sens, en laquelle les gens pourraient croire et qui pourrait représenter nos valeurs et nos origines.\r\nNos designs originaux et uniques, vous permettront de vous exprimer et d’affirmer votre style en toute élégance.', 'https://www.playstore.com/', 'https://www.facebook.com/Dianys-105084564762334');

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `fichier` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `fichier2` text NOT NULL,
  `fichier3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `slides`
--

INSERT INTO `slides` (`id`, `fichier`, `updated_at`, `created_at`, `fichier2`, `fichier3`) VALUES
(16, 'myapp/storage/app/public/slide/sPOEc0Ugee1Rc4xjlqoAhCMtEk4YQP4Jlip2as44.png', '2021-04-05 17:37:07', '2021-04-05 17:37:07', 'myapp/storage/app/public/slide/qVhROub5DKmFU0jtDx0xqkCHRGK3q9tzD5L1rz9g.png', 'myapp/storage/app/public/slide/7hj6OpwIY3NFXsphvA2gYDfUullaXDAdykCHjQMk.png');

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

CREATE TABLE `souscategories` (
  `id` int(11) NOT NULL,
  `libele` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `souscategories`
--

INSERT INTO `souscategories` (`id`, `libele`, `created_at`, `updated_at`) VALUES
(10, 'aucun', '2021-05-15 21:42:38', '2021-05-15 21:42:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `pays_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `ville`, `pays_id`, `updated_at`, `created_at`) VALUES
(1, 'Abibjan', 1, '2021-04-19 09:54:35', '2021-04-19 09:54:35'),
(2, 'Cocody', 1, '2021-04-19 09:55:24', '2021-04-19 09:55:24'),
(3, 'Dabou', 1, '2021-04-19 13:11:21', '2021-04-19 13:11:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `catg_has_scatgs`
--
ALTER TABLE `catg_has_scatgs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`,`client_id`),
  ADD KEY `fk_commandes_client1_idx` (`client_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`,`produits_id`,`produits_categorie_id`),
  ADD KEY `fk_images_produits1_idx` (`produits_id`,`produits_categorie_id`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`,`ville_id`,`ville_pays_id`),
  ADD KEY `fk_livraison_ville1_idx` (`ville_id`,`ville_pays_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`,`categorie_id`),
  ADD KEY `fk_produits_categorie_idx` (`categorie_id`);

--
-- Index pour la table `produits_has_clients`
--
ALTER TABLE `produits_has_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`,`pays_id`),
  ADD KEY `fk_ville_pays1_idx` (`pays_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `catg_has_scatgs`
--
ALTER TABLE `catg_has_scatgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `produits_has_clients`
--
ALTER TABLE `produits_has_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
