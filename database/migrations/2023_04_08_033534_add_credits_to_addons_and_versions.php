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
        Schema::table('addons', function (Blueprint $table) {
            $table->text('credits')->nullable()->after('install_instructions');
        });

        Schema::table('addon_versions', function (Blueprint $table) {
            $table->text('credits')->nullable()->after('upgrade_instructions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addons', function (Blueprint $table) {
            $table->dropColumn('credits');
        });

        Schema::table('addon_versions', function (Blueprint $table) {
            $table->dropColumn('credits');
        });
    }
};
