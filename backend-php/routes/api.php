<?php

use App\Http\Controllers\DroneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('drones', DroneController::class);
Route::post('drones/{id}', [DroneController::class, 'store']);
Route::get('drones/edit/{id}', [DroneController::class, 'edit']);
