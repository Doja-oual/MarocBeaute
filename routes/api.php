<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('auth/register',[UserController::class,'createUser']);
Route::post('/auth/login',[UserController::class,'loginUser']);