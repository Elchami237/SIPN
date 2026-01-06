-- Script SQL pour créer la table actualites
-- Exécutez ce script dans votre base de données MySQL

CREATE TABLE IF NOT EXISTS `actualites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `contenu` longtext NOT NULL,
  `image_affiche` varchar(255) DEFAULT NULL,
  `statut` enum('brouillon','publie') NOT NULL DEFAULT 'brouillon',
  `date_publication` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_description` json DEFAULT NULL,
  `meta_keywords` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actualites_slug_unique` (`slug`),
  KEY `actualites_statut_date_publication_index` (`statut`,`date_publication`),
  KEY `actualites_slug_index` (`slug`),
  KEY `actualites_category_id_foreign` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Ajouter la contrainte de clé étrangère si la table categories existe
-- (Vous pouvez commenter cette ligne si la table categories n'existe pas)
-- ALTER TABLE `actualites` ADD CONSTRAINT `actualites_category_id_foreign` 
-- FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;