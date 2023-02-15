<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(User::class, function (Faker $faker) {
    return [
        'nama'         => $faker->name,
        'email'        => $faker->unique()->safeEmail,
        'no_hp'        => null,
        'password'     => \Hash::make("123456"), // password
        'level'        => "admin",
        'status'       => null,
        'no_identitas' => null,
        'foto'         => null,
    ];
});
