<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alternatif;
use Faker\Generator as Faker;

$factory->define(Alternatif::class, function (Faker $faker) {
    return [
        //
        'project_id' => 1,
        'nama' => $faker->name,
        'nisn' => rand(1000000, 9999999)
    ];
});
