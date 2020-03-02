<?php

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));

    return [
        'incident_id' => factory(\App\Incident::class),
        'file' => $faker->picsum(),
        'caption' => $faker->sentence()
    ];
});
