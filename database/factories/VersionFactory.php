<?php

namespace Database\Factories;

use App\Models\Version;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class VersionFactory extends Factory
{
    protected $model = Version::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'version' => $this->faker->semver(),
            'release_notes' => $this->faker->paragraph,
            'install_instructions' => mt_rand(0, 1) === 1 ? $this->faker->paragraphs(2, asText: true) : '',
            'upgrade_instructions' => $this->faker->paragraph,
            'published' => $this->faker->randomElement([true, false]),
        ];
    }
}
