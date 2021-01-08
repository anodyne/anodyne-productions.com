<?php

namespace Database\Factories;

use Domain\Exchange\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'type' => $this->faker->randomElement(['theme', 'extension', 'genre', 'rank']),
            'rating' => $this->faker->randomFloat(1, 1, 5),
        ];
    }
}
