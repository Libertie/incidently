<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Incident::class, function (Faker $faker) {
    return [
        'submitted_by' => ucwords($faker->name),
        'witnessed_by' => ucwords($faker->name),
        'location' => $faker->randomElement(['Outside', 'Lobby', 'Office', 'Stairwell', 'Bathroom']),
        'description' => $faker->paragraph(),
        'leo' => $faker->boolean,
        'occurred_at' => $faker->dateTimeBetween('-1 months', 'now')
    ];
});
