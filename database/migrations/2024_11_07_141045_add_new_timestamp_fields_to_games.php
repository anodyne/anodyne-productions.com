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
        Schema::table('games', function (Blueprint $table) {
            $table->dateTime('status_updated_at')->nullable()->after('status_inactive_days');
            $table->dateTime('nova_installed_at')->nullable();
            $table->dateTime('nova_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('status_updated_at');
            $table->dropColumn('nova_installed_at');
            $table->dropColumn('nova_updated_at');
        });
    }
};
