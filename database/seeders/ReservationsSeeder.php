<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reservation::factory(10)->create(); //

        Reservation::create([
            'user_id' => 3,
            'trip_id' => 3,
            'bus_seat_id' => 1,
            'passenger_email' => 'joseph-aa@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 3,
            'trip_id' => 3,
            'bus_seat_id' => 2,
            'passenger_email' => 'ffjoseph-aa@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 1,
            'trip_id' => 4,
            'bus_seat_id' => 1,
            'passenger_email' => 'joseph-aa@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 1,
            'trip_id' => 4,
            'bus_seat_id' => 2,
            'passenger_email' => 'seph-bb@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 2,
            'trip_id' => 4,
            'bus_seat_id' => 3,
            'passenger_email' => 'dodojose-r@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 2,
            'trip_id' => 4,
            'bus_seat_id' => 4,
            'passenger_email' => 'lmsjose-rr@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 2,
            'trip_id' => 5,
            'bus_seat_id' => 1,
            'passenger_email' => 'wwljose-rr@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 2,
            'trip_id' => 5,
            'bus_seat_id' => 2,
            'passenger_email' => 'qqjose-rr@gmail.com',
        ]);
        Reservation::create([
            'user_id' => 2,
            'trip_id' => 5,
            'bus_seat_id' => 3,
            'passenger_email' => 'lljose-rr@gmail.com',
        ]);
    }
}
