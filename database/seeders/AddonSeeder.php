<?php

namespace Database\Seeders;

use App\Enums\AddonType;
use App\Models\Addon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Pulsar', 'type' => AddonType::Theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 'all'],
            ['name' => 'Titan', 'type' => AddonType::Theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 'all'],
            ['name' => 'Picard 2380s Duty Uniform', 'type' => AddonType::Rank, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Anti-spam questions', 'type' => AddonType::Extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Mission post summary', 'type' => AddonType::Extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Picard 2390s Duty Uniform', 'type' => AddonType::Rank, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Serenity', 'type' => AddonType::Theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Star Trek Online Duty Uniform', 'type' => AddonType::Rank, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 'all'],
            ['name' => 'Nautilus', 'type' => AddonType::Theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Ordered mission posts', 'type' => AddonType::Extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Pulsar Classic', 'type' => AddonType::Theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Titan Classic', 'type' => AddonType::Theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Extension manager', 'type' => AddonType::Extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
        ];

        foreach ($data as $addonData) {
            $products = $addonData['products'];

            unset($addonData['products']);

            Addon::factory()
                ->hasQuestions(mt_rand(0, 5))
                ->hasVersions(mt_rand(1, 5))
                ->hasReviews(mt_rand(1, 10))
                ->hasAttached(
                    $products === 'all' ? Product::published()->get() : Product::find($products)
                )
                ->create(array_merge($addonData, ['published' => true]));
        }
    }
}
