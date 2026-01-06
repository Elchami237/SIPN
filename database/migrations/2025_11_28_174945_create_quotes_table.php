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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->enum('service_type', ['location', 'genie_civil', 'construction', 'tp']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('description');
            $table->string('budget_range')->nullable();
            $table->json('attachments')->nullable(); // Array de chemins vers fichiers PDF/images
            $table->enum('status', ['pending', 'processing', 'quoted', 'closed'])->default('pending');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
