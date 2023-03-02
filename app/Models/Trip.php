<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // upcoming, ticketing, in-progress, finished, canceled

    const STATUS_UPCOMING = 0;
    const STATUS_TICKETING = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_FINISHED = 3;
    const STATUS_CANCELED = 4;

    const TRIP_TYPE_SHORT = 1;
    const TRIP_TYPE_LONG = 2;

    protected $fillable = [
        'bus_id',
        'departure_city_id',
        'arrival_city_id',
        'distance',
        'trip_type',
        'trip_date',
        'estimated_arrival_date',
        'fare_amount',
        'total_amount',
        'status',
    ];
    public static function decodeStatus($status)
    {
        if ($status == self::STATUS_UPCOMING) {
            return ["id" => self::STATUS_UPCOMING, "name" => "UPCOMING"];
        }elseif ($status == self::STATUS_TICKETING) {
            return ["id" => self::STATUS_TICKETING, "name" => "TICKETING"];
        }elseif ($status == self::STATUS_IN_PROGRESS) {
            return ["id" => self::STATUS_IN_PROGRESS, "name" => "IN PROGRESS"];
        }elseif ($status == self::STATUS_FINISHED) {
            return ["id" => self::STATUS_FINISHED, "name" => "FINISHED"];
        }elseif ($status == self::STATUS_CANCELED) {
            return ["id" => self::STATUS_CANCELED, "name" => "CANCELED"];
        }else {
            return '';
        }
    }
    public static function decodeTripType($trip_type)
    {
        if ($trip_type == self::TRIP_TYPE_SHORT) {
            return ["name" => "SHORT TRIP"];
        }elseif ($trip_type == self::TRIP_TYPE_LONG) {
            return ["name" => "LONG TRIP"];
        }else {
            return '';
        }
    }

    public function bus(){
        
        return $this->belongsTo(Bus::class);
    }
    public function departure_city(){
        
        return $this->belongsTo(City::class,'departure_city_id');
    }
    public function arrival_city(){
        
        return $this->belongsTo(City::class, 'arrival_city_id');
    }

    public function delete(){

        $this->is_active = Common::NOT_ACTIVE;
        $this->save();

        return true;
    }
}
