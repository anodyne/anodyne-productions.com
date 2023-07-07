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
        Schema::table('release_series', function (Blueprint $table) {
            $table->boolean('include_in_compatibility')->default(true)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('release_series', function (Blueprint $table) {
            $table->dropColumn('include_in_compatibility');
        });
    }
};
