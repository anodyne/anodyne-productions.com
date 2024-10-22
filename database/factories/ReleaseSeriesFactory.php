<?php

namespace Database\Factories;

use App\Models\ReleaseSeries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReleaseSeries>
 */
class ReleaseSeriesFactory extends Factory
{
    protected $model = ReleaseSeries::class;

    public function definition(): array
    {
        return [
            'name' => 'Nova '.fake()->semver(),
            'include_in_compatibility' => fake()->boolean(),
        ];
    }
}
