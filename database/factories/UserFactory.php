<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Domain\Account\Models\User;
use Illuminate\Support\Facades\Hash;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => str_replace('.', '-', $faker->userName),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('secret'),
        'remember_token' => Str::random(10),
        'bio' => $faker->paragraph,
    ];
});
