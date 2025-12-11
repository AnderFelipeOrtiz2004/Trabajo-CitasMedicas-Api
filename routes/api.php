<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/citas', [AppointmentController::class, 'index']);
Route::post('/citas', [AppointmentController::class, 'store']);
Route::get('/citas/{id}', [AppointmentController::class, 'show']);
Route::put('/citas/{id}', [AppointmentController::class, 'update']);
Route::delete('/citas/{id}', [AppointmentController::class, 'destroy']);