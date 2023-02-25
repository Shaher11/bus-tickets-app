<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationsResource;
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
        // $validator = Validator::make($request->reservations, [
        //     'trip_id'=> ['required', 'array','integer'],
        //     'passenger_email'=> ['required', 'array','email','max:255'],
        //     // 'bus_seat_id' => 'required|unique:reservations,bus_seat_id,' . $reservation->bus_seat_id . ',id,trip_id,' . $reservation->trip_id
    
        // ]);

        // $data = $request->validated($request->all());

        $trip = Trip::whereId($request->trip_id)->first();

        if(!$trip){return $this->error('', 'This trip not exists', 401);}
        if($trip->status != Trip::STATUS_TICKETING){ return $this->error('', 'You can not reserve on this trip', 401); }
        if(!count($request->reservations)){ return $this->error('', 'Please complite the form', 401); }

        foreach($request->reservations as $reservation){
            // dd($reservation['passenger_email']);
            Reservation::create([
                'user_id'=> Auth::user()->id,
                'trip_id'=> $request->trip_id,
                'passenger_email'=> $reservation['passenger_email'],
                'bus_seat_id'=> $reservation['bus_seat_id']
            ]);
        }

        return new ReservationsResource($reservation);
    }

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
