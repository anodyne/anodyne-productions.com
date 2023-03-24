<?php

namespace Database\Factories;

use App\Enums\ReleaseSeverity;
use App\Models\ReleaseSeries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class ReleaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'version' => str($this->faker->words(3, asText: true))->title(),
            'notes' => $this->faker->paragraph,
            'severity' => $this->faker->randomElement(ReleaseSeverity::cases()),
            'date' => now(),
            'link' => $this->faker->url,
            'published' => true,
            'release_series_id' => ReleaseSeries::factory(),
        ];
    }
}
