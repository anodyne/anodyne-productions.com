<?php

namespace Database\Factories;

use App\Enums\AddonType;
use App\Models\Addon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddonFactory extends Factory
{
    protected $model = Addon::class;

    public function definition()
    {
        return [
            'name' => str($this->faker->words(3, true))->title(),
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(AddonType::cases()),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'published' => $this->faker->randomElement([true, false]),
            'install_instructions' => $this->faker->paragraphs(2, asText: true),
        ];
    }
}
