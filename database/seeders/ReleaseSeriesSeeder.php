<?php

namespace Database\Seeders;

use App\Models\ReleaseSeries;
use Illuminate\Database\Seeder;

class ReleaseSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReleaseSeries::factory()->create(['name' => 'Nova 2.7']);
        ReleaseSeries::factory()->create(['name' => 'Nova 2.6']);
    }
}
