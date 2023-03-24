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
            ['name' => 'Pulsar', 'type' => AddonType::theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 'all'],
            ['name' => 'Titan', 'type' => AddonType::theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 'all'],
            ['name' => 'Picard 2380s Duty Uniform', 'type' => AddonType::rank, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Anti-spam questions', 'type' => AddonType::extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Mission post summary', 'type' => AddonType::extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Picard 2390s Duty Uniform', 'type' => AddonType::rank, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Serenity', 'type' => AddonType::theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Star Trek Online Duty Uniform', 'type' => AddonType::rank, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 'all'],
            ['name' => 'Nautilus', 'type' => AddonType::theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Ordered mission posts', 'type' => AddonType::extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
            ['name' => 'Pulsar Classic', 'type' => AddonType::theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Titan Classic', 'type' => AddonType::theme, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 1],
            ['name' => 'Extension manager', 'type' => AddonType::extension, 'user_id' => User::inRandomOrder()->first()->id, 'products' => 2],
        ];

        foreach ($data as $addonData) {
            $products = $addonData['products'];

            unset($addonData['products']);

            Addon::factory()
                ->hasQuestions(mt_rand(0, 5))
                ->hasVersions(mt_rand(1, 5))
                ->hasAttached(
                    $products === 'all' ? Product::published()->get() : Product::find($products)
                )
                ->create(array_merge($addonData, ['published' => true]));
        }
    }
}
