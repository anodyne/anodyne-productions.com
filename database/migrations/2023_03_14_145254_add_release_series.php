<?php

use App\Models\ReleaseSeries;
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
        Schema::create('release_series', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });

        Schema::table('releases', function (Blueprint $table) {
            $table->foreignIdFor(ReleaseSeries::class)->after('version');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('releases', function (Blueprint $table) {
            $table->dropColumn('release_series_id');
        });

        Schema::dropIfExists('release_series');
    }
};
