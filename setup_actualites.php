<?php
/**
 * Script de configuration des actualités
 * Exécutez ce script pour créer les tables nécessaires
 */

echo "=== Configuration du système d'actualités ===\n\n";

// Vérifier si nous sommes dans un projet Laravel
if (!file_exists('artisan')) {
    echo "❌ Erreur: Ce script doit être exécuté à la racine d'un projet Laravel\n";
    exit(1);
}

// Charger l'environnement Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

try {
    echo "1. Vérification de la connexion à la base de données...\n";
    DB::connection()->getPdo();
    echo "✅ Connexion réussie\n\n";

    echo "2. Création de la table 'actualites'...\n";
    
    // Créer la table actualites si elle n'existe pas
    if (!Schema::hasTable('actualites')) {
        DB::statement("
            CREATE TABLE `actualites` (
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
                KEY `actualites_slug_index` (`slug`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
        echo "✅ Table 'actualites' créée\n";
    } else {
        echo "ℹ️  Table 'actualites' existe déjà\n";
    }

    echo "3. Création de la table 'actualite_images'...\n";
    
    // Créer la table actualite_images si elle n'existe pas
    if (!Schema::hasTable('actualite_images')) {
        DB::statement("
            CREATE TABLE `actualite_images` (
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
                KEY `actualite_images_actualite_id_order_index` (`actualite_id`,`order`),
                CONSTRAINT `actualite_images_actualite_id_foreign` 
                FOREIGN KEY (`actualite_id`) REFERENCES `actualites` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
        echo "✅ Table 'actualite_images' créée\n";
    } else {
        echo "ℹ️  Table 'actualite_images' existe déjà\n";
    }

    echo "4. Création du dossier de stockage...\n";
    $storagePath = storage_path('app/public/actualites');
    if (!is_dir($storagePath)) {
        mkdir($storagePath, 0755, true);
        echo "✅ Dossier de stockage créé: $storagePath\n";
    } else {
        echo "ℹ️  Dossier de stockage existe déjà\n";
    }

    $galleryPath = storage_path('app/public/actualites/gallery');
    if (!is_dir($galleryPath)) {
        mkdir($galleryPath, 0755, true);
        echo "✅ Dossier galerie créé: $galleryPath\n";
    } else {
        echo "ℹ️  Dossier galerie existe déjà\n";
    }

    echo "\n🎉 Configuration terminée avec succès !\n";
    echo "\nVous pouvez maintenant :\n";
    echo "- Accéder à l'administration des actualités\n";
    echo "- Créer vos premières actualités avec des galeries d'images\n";
    echo "- Exécuter les seeders si vous le souhaitez\n\n";

} catch (Exception $e) {
    echo "❌ Erreur: " . $e->getMessage() . "\n";
    echo "\nVeuillez vérifier :\n";
    echo "- Votre configuration de base de données dans .env\n";
    echo "- Que MySQL est démarré\n";
    echo "- Que la base de données existe\n\n";
    exit(1);
}