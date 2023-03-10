<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'trip_id',
        'bus_seat_id',
        'passenger_email',
        'status'
    ];

    const STATUS_RESERVED  = 1;
    const STATUS_CANCELED = 2;

    public static function decodeStatus($status)
    {
        if ($status == self::STATUS_RESERVED) {
            return ["name" => "RESERVED"];
        }elseif ($status == self::STATUS_CANCELED) {
            return ["name" => "CANCELED"];
        }else {
            return '';
        }
    }
    public function user(){
        
        return $this->belongsTo(User::class);
    }
    public function trip(){
        
        return $this->belongsTo(Trip::class);
    }
    public function bus_seat(){
        
        return $this->belongsTo(BusSeat::class);
    }
    public function payment(){
        
        return $this->hasOne(Payment::class);
    }

    /**
     * Soft delete 
     */
    public function delete(){

        $this->is_active = Common::NOT_ACTIVE;
        $this->save();

        return true;
    }
}
