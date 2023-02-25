<?php

namespace App\Http\Resources;

use App\Models\Common;
use App\Models\Trip;
use Illuminate\Http\Resources\Json\JsonResource;

class TripsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'attibutes' => [
                'fare_amount' => $this->fare_amount,
                'total_amount' => $this->total_amount,
                'distance' => $this->distance . ' KM',
                'type' => Trip::decodeTripType($this->trip_type),
                'status' => Trip::decodeStatus($this->status),
                'is_active' => Common::decodeIsActive($this->is_active),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'bus'=> [
                    'id' => (string)$this->bus->id,
                    'plate_number' => $this->bus->plate_number,
                    'bus_model' => $this->bus->bus_model->name
                ],
                'departure_city'=> [
                    'id' => (string)$this->departure_city->id,
                    'departure_city' => $this->departure_city->name
                ],
                'arrival_city'=> [
                    'id' => (string)$this->arrival_city->id,
                    'arrival_city' => $this->arrival_city->name
                ]
            ]
        ];
    }
}
