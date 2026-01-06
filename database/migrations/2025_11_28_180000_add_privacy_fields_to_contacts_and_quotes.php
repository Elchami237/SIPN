<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->timestamp('ip_stored_at')->nullable()->after('ip_address');
            $table->index('created_at');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->string('ip_address', 45)->nullable()->after('status');
            $table->timestamp('ip_stored_at')->nullable()->after('ip_address');
            $table->index('created_at');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('ip_stored_at');
            $table->dropIndex(['created_at']);
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['ip_address', 'ip_stored_at']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['status']);
        });
    }
};
