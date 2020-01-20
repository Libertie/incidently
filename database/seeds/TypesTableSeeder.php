<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'Arson'],
            ['name' => 'Assault/Battery'],
            ['name' => 'Bio-Terror Threat'],
            ['name' => 'Blockade'],
            ['name' => 'Bombing'],
            ['name' => 'Bomb Threat'],
            ['name' => 'Burglary'],
            ['name' => 'Chemical Attack'],
            ['name' => 'Death Threat'],
            ['name' => 'Harassing Calls'],
            ['name' => 'Hate Mail'],
            ['name' => 'Internet Threat'],
            ['name' => 'Invasion'],
            ['name' => 'Protest'],
            ['name' => 'Robbery'],
            ['name' => 'Stalking'],
            ['name' => 'Suspicious Package'],
            ['name' => 'Trespass'],
            ['name' => 'Vandalism'],
            ['name' => 'Other']
        ]);
    }
}
