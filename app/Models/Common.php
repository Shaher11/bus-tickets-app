<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;

    const NOT_ACTIVE = 0; // Soft Delete
    const IS_ACTIVE = 1;

    public static function decodeIsActive($is_active)
    {
        if ($is_active == self::IS_ACTIVE) {
            return ["id" => self::IS_ACTIVE, "name" => "Active"];
        }elseif ($is_active == self::NOT_ACTIVE) {
            return ["id" => self::NOT_ACTIVE, "name" => "Deleted"];
        }else {
            return '';
        }
    }
}
