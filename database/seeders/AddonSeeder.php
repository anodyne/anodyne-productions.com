<?php

namespace Database\Seeders;

use Domain\Exchange\Models\Addon;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 35; $i++) {
            Addon::factory()->forUser()->create();
        }
    }
}
