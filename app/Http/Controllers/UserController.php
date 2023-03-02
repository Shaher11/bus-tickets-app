<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function frequentTrips(User $user)
    {
        // $passenger = User::whereRoleId(Role::Passenger)->whereId($user->id)->get();
        // ->orderBy('grades.id','DESC')

        $reservations = Reservation::select('id','passenger_email')->whereUserId($user->id)->get()->toArray();

        // dd( $reservations);

    }
}
