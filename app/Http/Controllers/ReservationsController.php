<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationsResource;
use App\Models\BusSeat;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Trip;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    use HttpResponses;
    public function index()
    {
        return ReservationsResource::collection(
            Reservation::get()
        );
    }

    public function store(Request $request)
    {
        $trip = Trip::where(['departure_city_id'=>$request->departure_city_id, 'arrival_city_id'=> $request->arrival_city_id ])->whereStatus(Trip::STATUS_TICKETING)->first();
        
        $busSeatsCount = BusSeat::whereBusId($trip->bus_id)->get()->count();
        $reservationsCount =  Reservation::whereTripId($trip->id)->get()->count();

        if($busSeatsCount < $reservationsCount){ return $this->error('', 'Sorry, all seats been reserved', 401); }
        if(!$trip){return $this->error('', 'This trip not exists', 401);}
        if($trip->status != Trip::STATUS_TICKETING){ return $this->error('', 'You can not reserve on this trip', 401); }
        if(!count($request->reservations)){ return $this->error('', 'Please complite the form', 401); }

        foreach($request->reservations as $reserve){
            $reservation = Reservation::create([
                'user_id'=> Auth::user()->id,
                'trip_id'=> $trip->id,
                'passenger_email'=> $reserve['passenger_email'],
                'bus_seat_id'=> $reserve['bus_seat_id']
            ]);

            $discount_value = 0;

            if(count($request->reservations) > Payment::DESCOUNT_AFTER){
                
                $discount_value = $reserve['amount_paid'] * Payment::DESCOUNT_VALUE;
            }

            Payment::create([
                'reservation_id'=> $reservation->id,
                'amount_paid'=> $reserve['amount_paid'] - $discount_value,
            ]);
        }

        return new ReservationsResource($reservation);
    }

    // publice static function payment($reservation)
    // {
    //     Payment::create([
    //         'reservation_id'=> $reservation->id,
    //         'amount_paid'=> $reservation->amount_paid,
    //     ]);
        
    // }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
