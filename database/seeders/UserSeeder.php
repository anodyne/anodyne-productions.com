<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'anodyne',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'role' => UserRole::Admin,
        ]);

        User::factory()->create([
            'name' => 'Staff 1',
            'username' => 'staff-1',
            'email' => 'staff1@staff.com',
            'password' => Hash::make('secret'),
            'role' => UserRole::Staff,
        ]);

        User::factory()->create([
            'name' => 'Staff 2',
            'username' => 'staffTwo',
            'email' => 'staff2@staff.com',
            'password' => Hash::make('secret'),
            'role' => UserRole::Staff,
        ]);

        User::factory()->create([
            'name' => 'User',
            'username' => 'user47',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'),
        ]);

        User::factory()->create([
            'name' => 'Bad User',
            'username' => 'Bad_to_the_bone',
            'email' => 'bad-user@user.com',
            'password' => Hash::make('secret'),
            'is_addon_author' => false,
        ]);
    }
}
