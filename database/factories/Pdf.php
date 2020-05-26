<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Pdf;
use Faker\Generator as Faker;

$factory->define(Pdf::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'file' => $faker->text
    ];
});
