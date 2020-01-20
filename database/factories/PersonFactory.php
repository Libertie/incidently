<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nickname' => ucwords($faker->word()),
        'hair_color' => $faker->randomElement(Config::get('options.person.hair_color')),
        'hair_length' => $faker->randomElement(Config::get('options.person.hair_length')),
        'height' => $faker->randomElement(Config::get('options.person.height')),
        'skin' => $faker->randomElement(Config::get('options.person.skin')),
        'gender' => $faker->randomElement(Config::get('options.person.gender')),
        'voice' => $faker->randomElement(Config::get('options.person.voice')),
        'age' => $faker->randomElement(Config::get('options.person.age')),
        'description' => $faker->paragraph()
    ];
});
