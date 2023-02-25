<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\TripsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public Routes
Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);



// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function(){

    // Route::group(['middleware' => 'role:Admin' ], function () {
            Route::resource('/trips', TripsController::class);
    // });
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::resource('/reservations', ReservationsController::class);
});