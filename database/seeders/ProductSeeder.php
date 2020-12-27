<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Marketplace\Models\Product;

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
