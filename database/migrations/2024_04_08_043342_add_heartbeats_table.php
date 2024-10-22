<?php

use App\Models\Game;
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
        Schema::create('heartbeats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Game::class);
            $table->integer('status_response_code')->nullable();

            $table->integer('active_users')->nullable();
            $table->integer('active_primary_characters')->default(0);
            $table->integer('active_secondary_characters')->default(0);
            $table->integer('active_support_characters')->default(0);
            $table->integer('total_stories')->nullable();
            $table->integer('total_story_groups')->nullable();
            $table->integer('total_posts')->nullable();
            $table->integer('total_post_words')->nullable();

            $table->integer('diff_active_users')->nullable();
            $table->integer('diff_active_primary_characters')->default(0);
            $table->integer('diff_active_secondary_characters')->default(0);
            $table->integer('diff_active_support_characters')->default(0);
            $table->integer('diff_total_stories')->nullable();
            $table->integer('diff_total_story_groups')->nullable();
            $table->integer('diff_total_posts')->nullable();
            $table->integer('diff_total_post_words')->nullable();

            $table->dateTime('last_published_post')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heartbeats');
    }
};
