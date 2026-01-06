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
        Schema::create('actualite_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actualite_id')->constrained('actualites')->onDelete('cascade');
            $table->string('image_path');
            $table->string('alt_text')->nullable();
            $table->string('caption')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            
            $table->index(['actualite_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actualite_images');
    }
};