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
        Schema::table('heartbeats', function (Blueprint $table) {
            $table->string('nova_release_series')->nullable()->after('game_id');
            $table->string('nova_release')->nullable()->after('nova_release_series');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('heartbeats', function (Blueprint $table) {
            $table->dropColumn([
                'nova_release_series',
                'nova_release',
            ]);
        });
    }
};
