<?php

use App\Enums\ReleaseSeverity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->string('version');
            $table->string('date')->nullable();
            $table->string('severity')->default(ReleaseSeverity::patch->value);
            $table->text('notes')->nullable();
            $table->string('link')->default('https://anodyne-productions.com/nova');
            $table->string('upgrade_guide_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('releases');
    }
};
