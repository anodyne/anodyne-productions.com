<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Heartbeat;
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
            $game = Game::factory()
                ->create([
                    'created_at' => $date = fake()->dateTimeBetween('-6 months'),
                    'updated_at' => fake()->boolean ? $date : now(),
                ]);

            Heartbeat::factory()->create([
                'game_id' => $game->id,
                'active_users' => $totalUsers = fake()->numberBetween(1, 10),
                'active_primary_characters' => $totalPrimaryCharacters = fake()->numberBetween(1, 10),
                'active_secondary_characters' => $totalSecondaryCharacters = fake()->numberBetween(0, 10),
                'active_support_characters' => $totalSupportCharacters = fake()->numberBetween(5, 20),
                'total_stories' => $totalStories = fake()->numberBetween(1, 10),
                'total_posts' => $totalPosts = fake()->numberBetween(10, 1000),
                'total_post_words' => $totalPostWords = fake()->numberBetween(1000, 100000),
            ]);

            for ($h = 1; $h <= 30; $h++) {
                $startingTotalPosts = $totalPosts;
                $startingTotalPostWords = $totalPostWords;

                Heartbeat::factory()->create([
                    'game_id' => $game->id,
                    'active_users' => $totalUsers,
                    'active_primary_characters' => $totalPrimaryCharacters,
                    'active_secondary_characters' => $totalSecondaryCharacters,
                    'active_support_characters' => $totalSupportCharacters,
                    'total_stories' => $totalStories,
                    'total_posts' => $totalPosts = fake()->numberBetween($totalPosts, $totalPosts + fake()->numberBetween(1, 20)),
                    'total_post_words' => $totalPostWords = fake()->numberBetween($totalPostWords, $totalPostWords + fake()->numberBetween(1000, 100000)),

                    'diff_total_posts' => $totalPosts - $startingTotalPosts,
                    'diff_total_post_words' => $totalPostWords - $startingTotalPostWords,
                ]);
            }
        }
    }
}
