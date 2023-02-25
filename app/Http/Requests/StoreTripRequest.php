<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
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
            'bus_id'=> ['required', 'integer'],
            'departure_city_id'=> ['required', 'integer'],
            'arrival_city_id'=> ['required', 'integer'],
            'fare_amount'=> ['required'],
            'total_amount'=> ['required'],
            'trip_date'=> ['required'],
            'estimated_arrival_date'=> ['required'],
            'distance'=> ['required'],
           
        ];
    }
}
