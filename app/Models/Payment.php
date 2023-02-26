<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const STATUS_PAID = 1;
    const STATUS_REDUX = 2;
    const DESCOUNT_AFTER = 5;
    const DESCOUNT_VALUE = 0.1; // 10 % OFF
    protected $fillable = [
        'reservation_id',
        'amount_paid',
        'payment_status'
    ];

}
