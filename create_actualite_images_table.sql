-- Script SQL pour créer la table actualite_images
-- Exécutez ce script dans votre base de données MySQL après avoir créé la table actualites

CREATE TABLE IF NOT EXISTS `actualite_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `actualite_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actualite_images_actualite_id_foreign` (`actualite_id`),
  KEY `actualite_images_actualite_id_order_index` (`actualite_id`,`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Ajouter la contrainte de clé étrangère
ALTER TABLE `actualite_images` 
ADD CONSTRAINT `actualite_images_actualite_id_foreign` 
FOREIGN KEY (`actualite_id`) REFERENCES `actualites` (`id`) ON DELETE CASCADE;