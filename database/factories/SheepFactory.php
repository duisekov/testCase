<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corral;
use App\Sheep;
use Faker\Generator as Faker;

$factory->define(Sheep::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
