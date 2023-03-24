<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });

        collect([
            ['name' => 'Nova 1', 'published' => true],
            ['name' => 'Nova 2', 'published' => true],
            ['name' => 'Nova 3', 'published' => false],
        ])->each([Product::class, 'create']);

        Schema::create('productables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->morphs('productable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productables');
        Schema::dropIfExists('products');
    }
};
