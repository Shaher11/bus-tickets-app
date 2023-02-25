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
        'status'
    ];

    const STATUS_RESERVED  = 1;
    const STATUS_CANCELED = 2;
}
