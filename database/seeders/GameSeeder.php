<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 150; $i++) {
            Game::factory()
                ->create([
                    'created_at' => $date = fake()->dateTimeBetween('-6 months'),
                    'updated_at' => fake()->boolean ? $date : now(),
                ]);
        }
    }
}
