<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    use HasFactory;
    protected $table = 'bus_seat';

    public function seat(){
        
        return $this->belongsTo(Seat::class);
    }
}
