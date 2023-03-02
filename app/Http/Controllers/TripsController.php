<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Resources\TripsResource;
use App\Models\Role;
use App\Models\Trip;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripsController extends Controller
{
    use HttpResponses;
    public function index()
    {
        return $this->isNotAdmin() ? $this->isNotAdmin() : TripsResource::collection(Trip::get());
    }

    public function store(StoreTripRequest $request)
    {
        if(Auth::user()->role_id !== Role::Admin ){ return $this->error('', 'Sorry, Unauthorized operation', 403); }

        $data = $request->validated($request->all());

        if($request->distance >= 100 ){
            $data['trip_type'] = Trip::TRIP_TYPE_LONG;
        }else{
            $data['trip_type'] = Trip::TRIP_TYPE_SHORT;
        }

        $trip = Trip::create([
            'bus_id'=> $request->bus_id,
            'departure_city_id' => $request->departure_city_id,
            'arrival_city_id'    => $request->arrival_city_id,
            'fare_amount'    => $request->fare_amount,
            'total_amount'    => $request->total_amount,
            'trip_date'    => $request->trip_date,
            'estimated_arrival_date'    => $request->estimated_arrival_date,
            'distance'     => $request->distance,
            'trip_type'   => $data['trip_type'],
        ]);

        return new TripsResource($trip);
    }

    public function destroy(Trip $trip)
    {
        if(Auth::user()->role_id !== Role::Admin ){ return $this->error('', 'Sorry, Unauthorized operation', 403); }

        // Soft delete -> check Reservation model
        return  $trip->delete();
    }

    public function isNotAdmin()
    {
        if(Auth::user()->role_id !== Role::Admin ){ 
            return $this->error('', 'Sorry, Unauthorized operation', 403); 
        }
        
    }
}
