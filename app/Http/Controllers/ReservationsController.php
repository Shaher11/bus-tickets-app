<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationsResource;
use App\Models\Reservation;
use App\Models\Trip;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    use HttpResponses;
    public function index()
    {
        return ReservationsResource::collection(
            Reservation::get()
        );
    }

    public function store(StoreReservationRequest $request)
    {
        $data = $request->validated($request->all());
        $trip = Trip::whereId($request->trip_id)->first();
        
        if(!$trip){return $this->error('', 'This trip not exists', 401);}

        if($trip->status != Trip::STATUS_TICKETING){ return $this->error('', 'You can not reserve on this trip', 401); }

        $reservation = Reservation::create([
            'user_id'=> $request->user_id,
            'trip_id'=> $request->trip_id,
            'bus_seat_id'=> $request->bus_seat_id
        ]);

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
