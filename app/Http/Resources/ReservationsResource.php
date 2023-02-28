<?php

namespace App\Http\Resources;

use App\Models\Common;
use App\Models\Reservation;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationsResource extends JsonResource
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
                'passenger_email' => $this->passenger_email,
                'status' => Reservation::decodeStatus($this->status),
                'is_active' => Common::decodeIsActive($this->is_active),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                // 'user'=> [
                //     'id' => (string)$this->user->id,
                //     'full_name' => $this->user->first_name .' '.$this->user->last_name,
                //     'email' => $this->user->email,
                //     'ssn_id' => $this->user->ssn_id,
                //     'mobile' => $this->user->mobile
                // ],
                'reservation_info'=> [
                    'seat_number' => $this->bus_seat->seat->name,
                    'total_paid_amount' => ($this->payment)? $this->payment->amount_paid.' EGP' : '',
                ],
                'trip_info'=> [
                    'id' => (string)$this->trip->id,
                    'departure_city' => $this->trip->departure_city->name,
                    'arrival_city' => $this->trip->arrival_city->name,
                    'plate_number' => $this->trip->bus->plate_number,
                    'bus_model' => $this->trip->bus->bus_model->name
                ],
            ]
        ];
    }
}
