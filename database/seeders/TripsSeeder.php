<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::create([
            'bus_id' => 1,
            'departure_city_id' => 1,
            'arrival_city_id' => 2,
            'distance' => '90',
            'trip_type' => 1,
            'trip_date' => '2023-01-2 00:01:06',
            'estimated_arrival_date' => '2023-01-2 00:03:06',
            'fare_amount' => '200',
            'total_amount' => '230',
            'status' => Trip::STATUS_FINISHED,
        ]);
        Trip::create([
            'bus_id' => 2,
            'departure_city_id' => 1,
            'arrival_city_id' => 3,
            'distance' => '150',
            'trip_type' => 2,
            'trip_date' => '2023-01-22 00:07:06',
            'estimated_arrival_date' => '2023-01-23 00:07:06',
            'fare_amount' => '200',
            'total_amount' => '230',
            'status' => Trip::STATUS_FINISHED,
        ]);
        Trip::create([
            'bus_id' => 1,
            'departure_city_id' => 1,
            'arrival_city_id' => 2,
            'distance' => '90',
            'trip_type' => 1,
            'trip_date' => '2023-01-12 00:03:06',
            'estimated_arrival_date' => '2023-01-2 00:05:06',
            'fare_amount' => '100',
            'total_amount' => '120',
            'status' => Trip::STATUS_CANCELED,
        ]);
        Trip::create([
            'bus_id' => 1,
            'departure_city_id' => 1,
            'arrival_city_id' => 2,
            'distance' => '90',
            'trip_type' => 1,
            'trip_date' => '2023-01-12 00:03:06',
            'estimated_arrival_date' => '2023-01-2 00:05:06',
            'fare_amount' => '100',
            'total_amount' => '120',
            'status' => Trip::STATUS_TICKETING,
        ]);
        Trip::create([
            'bus_id' => 2,
            'departure_city_id' => 1,
            'arrival_city_id' => 3,
            'distance' => '150',
            'trip_type' => 2,
            'trip_date' => '2023-01-22 00:07:06',
            'estimated_arrival_date' => '2023-01-23 00:07:06',
            'fare_amount' => '200',
            'total_amount' => '230',
            'status' => Trip::STATUS_TICKETING,
        ]);
    }
}
