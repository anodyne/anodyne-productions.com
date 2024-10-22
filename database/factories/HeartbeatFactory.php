<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Heartbeat>
 */
class HeartbeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_id' => 1,
            'status_response_code' => 200,
            'active_users' => fake()->numberBetween(1, 10),
            'active_primary_characters' => fake()->numberBetween(1, 10),
            'active_secondary_characters' => fake()->numberBetween(0, 10),
            'active_support_characters' => fake()->numberBetween(5, 20),
            'total_stories' => fake()->numberBetween(1, 10),
            'total_posts' => fake()->numberBetween(10, 1000),
            'total_post_words' => fake()->numberBetween(1000, 100000),

            'diff_total_posts' => 0,
            'diff_total_post_words' => 0,
        ];
    }
}
