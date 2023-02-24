<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function login()
    {
        return "test login";
    }
    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());

    //    dd($request->all());

        $user = User::create([
            'first_name'=> $request->first_name,
            'last_name' => $request->last_name,
            'ssn_id'    => $request->ssn_id,
            'gender'    => $request->gender,
            'mobile'    => $request->mobile,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'password'  => Hash::make($request->password),
        ]);

        return $this->success([
            'user' =>$user,
            'token' =>$user->createToken('API Token of' . $user->name)->plainTextToken,
        ]);
    }
    public function logout()
    {
        return response()->json('this logout');
    }
}
