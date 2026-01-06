<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->text('resume');
            $table->longText('contenu');
            $table->string('image_affiche')->nullable();
            $table->enum('statut', ['brouillon', 'publie'])->default('brouillon');
            $table->timestamp('date_publication')->nullable();
            
            // Vérifier si la table categories existe avant de créer la contrainte
            if (Schema::hasTable('categories')) {
                $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            } else {
                $table->unsignedBigInteger('category_id')->nullable();
            }
            
            $table->json('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->timestamps();
            
            $table->index(['statut', 'date_publication']);
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actualites');
    }
};