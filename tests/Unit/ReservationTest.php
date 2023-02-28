<?php

namespace Tests\Unit;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
   
    public function test_reservations_table_in_database()
    {           
        $this->assertDatabaseHas('reservations', [
            'id'=> 15
        ]);

        $this->assertDatabaseMissing('reservations', [
            'id'=> 120
        ]);
    }

    public function test_same_trip_seat_duplication()
    {
        $reservation1 = Reservation::make([
                        'user_id'=> 1,
                        'trip_id'=> '1',
                        'passenger_email'=> 'ggg@email.com',
                        'bus_seat_id'=> '11',
                    ]);
        
        $reservation2 = Reservation::make([
                        'user_id'=> 1,
                        'trip_id'=> '1',
                        'passenger_email'=> 'lll@email.com',
                        'bus_seat_id'=> '12',
                    ]);
        
        $this->assertTrue( ($reservation1->trip_id == $reservation2->trip_id) && ($reservation1->bus_seat_id != $reservation2->bus_seat_id) );
    }


}
