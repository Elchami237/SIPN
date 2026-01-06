<?php

// Script temporaire pour créer la table actualites manuellement
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

// Configuration de la base de données (ajustez selon votre configuration)
$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'sipn_v2', // Ajustez le nom de votre base de données
    'username' => 'root',     // Ajustez votre nom d'utilisateur
    'password' => '',         // Ajustez votre mot de passe
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

try {
    // Créer la table actualites
    Capsule::schema()->create('actualites', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->string('slug')->unique();
        $table->text('resume');
        $table->longText('contenu');
        $table->string('image_affiche')->nullable();
        $table->enum('statut', ['brouillon', 'publie'])->default('brouillon');
        $table->timestamp('date_publication')->nullable();
        $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
        $table->json('meta_description')->nullable();
        $table->json('meta_keywords')->nullable();
        $table->timestamps();
        
        $table->index(['statut', 'date_publication']);
        $table->index('slug');
    });

    echo "✅ Table 'actualites' créée avec succès!\n";

} catch (Exception $e) {
    echo "❌ Erreur lors de la création de la table: " . $e->getMessage() . "\n";
}