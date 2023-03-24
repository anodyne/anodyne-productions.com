<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('addons', function (Blueprint $table) {
            $table->longText('install_instructions')->nullable()->after('published');
        });

        Schema::table('addon_versions', function (Blueprint $table) {
            $table->longText('install_instructions')->nullable()->after('release_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addons', function (Blueprint $table) {
            $table->dropColumn('install_instructions');
        });

        Schema::table('addon_versions', function (Blueprint $table) {
            $table->dropColumn('install_instructions');
        });
    }
};
