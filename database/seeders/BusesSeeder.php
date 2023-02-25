<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bus::create([
            'company_model_id' => 1,
            'plate_number' => 'MR-1526',
        ]);
        Bus::create([
            'company_model_id' => 2,
            'plate_number' => 'VO-478',
        ]);
    }
}
