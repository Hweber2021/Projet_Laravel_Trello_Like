<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Workplace;
use Faker\Generator as Faker;

$factory->define(Workplace::class, function (Faker $faker) {
    $name = $faker->word();
    return [
        'user_id' => $faker->unique()->randomDigit,
        'name' => $name,
        'slug' => Str::slug($name),
    ];
});
