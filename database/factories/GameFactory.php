<?php

namespace Database\Factories;

use App\Enums\GameGenre;
use App\Models\Release;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => str(fake()->words(3, asText: true))->title(),
            'url' => fake()->url,
            'genre' => fake()->randomElement(GameGenre::cases()),
            'release_id' => Release::factory(),
            'php_version' => fake()->randomElement(['7.4', '8.0', '8.1', '8.2', '8.3']),
            'db_driver' => 'mysqli',
            'db_version' => fake()->randomElement(['5.7', '8.0']),
            'server_software' => fake()->randomElement(['nginx/1.23.1', 'apache/1.17.2']),
            'active_users' => fake()->numberBetween(1, 30),
            'active_characters' => fake()->numberBetween(10, 100),
            'total_stories' => fake()->numberBetween(1, 50),
            'total_story_groups' => fake()->numberBetween(0, 10),
            'total_posts' => fake()->numberBetween(0, 10000),
            'total_post_words' => fake()->numberBetween(0, 5000000),
        ];
    }
}
