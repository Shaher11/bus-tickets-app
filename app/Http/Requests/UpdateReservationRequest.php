<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'trip_id'=> ['required','integer'],
            'passenger_email'=> ['required','email','max:255'],
            'bus_seat_id' => 'required|unique:reservations,bus_seat_id,' . $this->id . ',id,trip_id,' . $this->trip_id 
        ];
    }
}
