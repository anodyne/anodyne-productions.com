<?php

use App\Models\Addon;
use App\Models\User;
use App\Models\Version;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTables extends Migration
{
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type');
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });

        Schema::create('addon_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Addon::class);
            $table->string('version');
            $table->longText('release_notes')->nullable();
            $table->longText('upgrade_instructions')->nullable();
            $table->boolean('published')->default(true);
            $table->timestamps();
        });

        Schema::create('addon_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Addon::class);
            $table->text('question');
            $table->text('answer');
            $table->boolean('published')->default(true);
            $table->timestamps();
        });

        Schema::create('addon_downloads', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Addon::class);
            $table->foreignIdFor(Version::class);
            $table->foreignIdFor(User::class)->nullable();
            $table->timestamps();
        });

        Schema::create('addon_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Addon::class);
            $table->foreignIdFor(User::class);
            $table->integer('value');
            $table->timestamps();
        });

        // Schema::create('addon_reviews', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignIdFor(Addon::class);
        //     $table->foreignIdFor(User::class);
        //     $table->text('content');
        //     $table->timestamps();
        // });
    }
}
