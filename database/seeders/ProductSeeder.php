<?php

namespace Database\Seeders;

use Domain\Exchange\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 35; $i++) {
            Product::factory()
                ->forUser()
                ->create();
        }
    }
}
