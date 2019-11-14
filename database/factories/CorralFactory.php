<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corral;
use Faker\Generator as Faker;

$factory->define(Corral::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
