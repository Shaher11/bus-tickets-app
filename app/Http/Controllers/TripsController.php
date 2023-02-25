<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Resources\TripsResource;
use App\Models\Trip;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    use HttpResponses;
    public function index()
    {
        return TripsResource::collection(
            Trip::get()
        );
    }

    public function store(StoreTripRequest $request)
    {
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}