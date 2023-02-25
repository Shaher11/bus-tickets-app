<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Common;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=1; $i <= 10; $i++){
            
            Seat::create([
                'name' => 'A'.$i,
            ]);
            Seat::create([
                'name' => 'B'.$i,
            ]);
        }

        $buses = Bus::where('is_active', Common::IS_ACTIVE)->get();
        $seats = Seat::get();

        foreach($buses as $buse){
            foreach($seats as $seat){

                $buse->bus_seat()->attach($seat->id);
            }
        }
    }
}
