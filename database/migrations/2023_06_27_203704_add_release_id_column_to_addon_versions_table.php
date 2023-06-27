<?php

use App\Models\ReleaseSeries;
use App\Models\Version;
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
        Schema::create('release_version', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Version::class);
            $table->foreignIdFor(ReleaseSeries::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('release_version');
    }
};
