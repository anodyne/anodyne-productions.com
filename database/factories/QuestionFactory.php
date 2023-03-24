<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence,
            'answer' => $this->faker->paragraphs($this->faker->numberBetween(1, 3), true),
            'published' => $this->faker->randomElement([true, false]),
        ];
    }
}
