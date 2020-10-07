<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            // 'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
        ]);

        // $adminUser->attachRoles(['admin', 'user']);

        // $deletedJohn = User::factory()->create([
        //     'deleted_at' => now()->subDays(31),
        // ]);

        // $deletedJohn->attachRole('user');

        // $deletedSusie = User::factory()->create([
        //     'deleted_at' => now()->subDays(10),
        // ]);

        // $deletedSusie->attachRole('user');
    }
}
