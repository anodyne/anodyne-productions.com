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
            $table->integer('active_users')->nullable();
            $table->integer('active_characters')->nullable();
            $table->integer('total_stories')->nullable();
            $table->integer('total_story_groups')->nullable();
            $table->integer('total_posts')->nullable();
            $table->integer('total_post_words')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn([
                'active_users',
                'active_characters',
                'total_stories',
                'total_story_groups',
                'total_posts',
                'total_post_words',
            ]);
        });
    }
};
