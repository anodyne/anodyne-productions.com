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
        Schema::create('heartbeat_reports', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('attempted')->nullable();
            $table->integer('successful')->nullable();
            $table->integer('unreachable')->nullable();
            $table->integer('abandoned')->nullable();
            $table->integer('inactive')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heartbeat_reports');
    }
};
