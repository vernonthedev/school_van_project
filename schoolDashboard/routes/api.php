<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/drivers', App\Http\Controllers\DriverController::class);

Route::apiResource('/operators', App\Http\Controllers\OperatorController::class);

Route::apiResource('/parent_to_students', App\Http\Controllers\ParentToStudentController::class);

Route::apiResource('/students', App\Http\Controllers\StudentController::class);

Route::apiResource('/trips', App\Http\Controllers\TripController::class);

Route::apiResource('/vans', App\Http\Controllers\VanController::class);
