<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(RegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
