<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=> ['required', 'integer'],
            'trip_id'=> ['required', 'integer'],
            'bus_seat_id' => 'required|unique:reservations,bus_seat_id,' . $this->id . ',id,trip_id,' . $this->trip_id
            // 'trip_id' => 'required|unique:reservations,trip_id,' . $this->id . ',id,bus_seat_id,' . $this->bus_seat_id
            
        ];
    }
}