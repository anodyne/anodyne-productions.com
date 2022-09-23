<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTables extends Migration
{
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type');
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->timestamps();
        });

        // Schema::create('products_files', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_id')->constrained('products');
        //     $table->string('filename');
        //     $table->timestamps();
        // });

        // Schema::create('products_questions', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_id')->constrained('products');
        //     $table->text('question');
        //     $table->text('answer');
        //     $table->timestamps();
        // });

        // Schema::create('products_ratings', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_id')->constrained('products');
        //     $table->foreignId('user_id')->constrained('users');
        //     $table->integer('value');
        //     $table->timestamps();
        // });

        // Schema::create('products_reviews', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_id')->constrained('products');
        //     $table->foreignId('user_id')->constrained('users');
        //     $table->text('content');
        //     $table->timestamps();
        // });

        // Schema::create('products_versions', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('file_id')->constrained('products_files');
        //     $table->string('version');
        // });
    }
}
