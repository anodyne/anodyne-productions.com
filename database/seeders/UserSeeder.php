<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Staff',
            'email' => 'staff@staff.com',
            'password' => Hash::make('secret'),
            'role' => 'staff',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
