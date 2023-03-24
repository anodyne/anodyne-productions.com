<?php

use App\Enums\CompatibilityStatus;
use App\Models\Addon;
use App\Models\ReleaseSeries;
use App\Models\User;
use App\Models\Version;
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
        Schema::create('addon_compatibility', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Addon::class);
            $table->foreignIdFor(Version::class)->nullable();
            $table->foreignIdFor(ReleaseSeries::class);
            $table->string('status')->default(CompatibilityStatus::unknown->value);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addon_compatibility');
    }
};
