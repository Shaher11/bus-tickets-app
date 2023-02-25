<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Cairo',
        ]);
        City::create([
            'name' => 'Alex',
        ]);
        City::create([
            'name' => 'Aswan',
        ]);
    }
}
