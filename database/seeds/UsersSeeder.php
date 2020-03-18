<?php

use Domain\Account\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = factory(User::class)->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
        ]);

        $adminUser->attachRoles(['admin', 'user']);

        $deletedJohn = factory(User::class)->create([
            'deleted_at' => now()->subDays(31),
        ]);

        $deletedJohn->attachRole('user');

        $deletedSusie = factory(User::class)->create([
            'deleted_at' => now()->subDays(10),
        ]);

        $deletedSusie->attachRole('user');

        activity()->performedOn($deletedJohn)->by($adminUser)->log('test');
        activity()->performedOn($deletedJohn)->by($deletedJohn)->log('test');

        activity()->performedOn($deletedSusie)->by($adminUser)->log('test');
        activity()->performedOn($deletedSusie)->by($deletedSusie)->log('test');
    }
}
