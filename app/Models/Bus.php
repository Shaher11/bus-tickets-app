<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    public function bus_model(){
        
        return $this->belongsTo(CompanyModel::class,'company_model_id');
    }
}
