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
        Schema::table('addon_versions', function (Blueprint $table) {
            $table->unsignedInteger('legacy_id')->nullable()->after('published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addon_versions', function (Blueprint $table) {
            $table->dropColumn('legacy_id');
        });
    }
};
