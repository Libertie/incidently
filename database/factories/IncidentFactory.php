<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Incident::class, function (Faker $faker) {
    $occurred_at = $faker->dateTimeBetween('-1 months', 'now');
    return [
        'submitted_by' => ucwords($faker->name),
        'witnessed_by' => ucwords($faker->name),
        'location' => $faker->randomElement(explode(',', env('APP_LOCATIONS'))),
        'description' => $faker->paragraphs(rand(3, 5), true),
        'leo' => $faker->boolean,
        'occurred_at' => $occurred_at
    ];
});
