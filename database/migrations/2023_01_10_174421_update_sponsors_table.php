<?php

use App\Models\SponsorTier;
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
        Schema::table('sponsors', function (Blueprint $table) {
            $table->string('display_name')->nullable()->after('name');
            $table->string('email')->nullable()->after('display_name');
            $table->foreignIdFor(SponsorTier::class)->nullable()->after('email');

            $table->dropColumn('tier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropColumn('display_name');
            $table->dropColumn('email');
            $table->dropConstrainedForeignIdFor(SponsorTier::class);

            $table->string('tier');
        });
    }
};
