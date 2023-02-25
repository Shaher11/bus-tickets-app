<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesSeeder::class); 
        $this->call(RolesSeeder::class); 
        $this->call(UsersSeeder::class); 
        $this->call(CompaniesSeeder::class); 
        $this->call(CompanyModelsSeeder::class); 
        $this->call(BusesSeeder::class); 
        $this->call(SeatsSeeder::class); 
        $this->call(TripsSeeder::class); 
    }
}
