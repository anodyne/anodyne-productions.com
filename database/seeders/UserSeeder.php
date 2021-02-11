<?php

namespace Database\Seeders;

use Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Staff 1',
            'email' => 'staff1@staff.com',
            'password' => Hash::make('secret'),
            'role' => 'staff',
        ]);

        User::factory()->create([
            'name' => 'Staff 2',
            'email' => 'staff2@staff.com',
            'password' => Hash::make('secret'),
            'role' => 'staff',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'),
        ]);

        User::factory()->create([
            'name' => 'Bad User',
            'email' => 'bad-user@user.com',
            'password' => Hash::make('secret'),
            'is_exchange_author' => false,
        ]);
    }
}
