<?php

use Illuminate\Database\Seeder;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = App\Type::all();

        $incident = factory(App\Incident::class, 3)
            ->create()
            ->each(function ($incident) use ($types) {
                $incident->people()->createMany(
                    factory(App\Person::class, rand(1, 3))->make()->toArray()
                );
                $incident->types()->attach(
                    $types->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
    }
}
