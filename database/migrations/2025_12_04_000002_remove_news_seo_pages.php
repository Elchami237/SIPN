<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Vérifier si la table seo_pages existe et a la colonne page_slug
        if (Schema::hasTable('seo_pages') && Schema::hasColumn('seo_pages', 'page_slug')) {
            // Supprimer les pages SEO liées aux actualités
            DB::table('seo_pages')->where('page_slug', 'news')->delete();
            DB::table('seo_pages')->where('page_slug', 'actualites')->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Vérifier si la table seo_pages existe et a la colonne page_slug
        if (Schema::hasTable('seo_pages') && Schema::hasColumn('seo_pages', 'page_slug')) {
            // Recréer les pages SEO pour les actualités si nécessaire
            DB::table('seo_pages')->insert([
                [
                    'page_name' => 'Actualités',
                    'page_slug' => 'news',
                    'meta_title' => json_encode(['fr' => 'Actualités - S.I.P.N.', 'en' => 'News - S.I.P.N.']),
                    'meta_description' => json_encode(['fr' => '', 'en' => '']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
};