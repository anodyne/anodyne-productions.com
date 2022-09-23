<?php

namespace Database\Factories;

use Domain\Exchange\Models\Addon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddonFactory extends Factory
{
    protected $model = Addon::class;

    public function definition()
    {
        return [
            'name' => str($this->faker->words(3, true))->title(),
            'type' => $this->faker->randomElement([
                'theme',
                'extension',
                // 'genre',
                // 'rank'
            ]),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'published' => $this->faker->randomElement([true, false]),
        ];
    }
}
