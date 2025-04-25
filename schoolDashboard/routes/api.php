<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/drivers', App\Http\Controllers\API\DriverController::class);

Route::apiResource('/operators', App\Http\Controllers\API\OperatorController::class);

Route::apiResource('/parent_to_students', App\Http\Controllers\API\ParentToStudentController::class);

Route::apiResource('/students', App\Http\Controllers\API\StudentController::class);

Route::apiResource('/trips', App\Http\Controllers\API\TripController::class);

Route::apiResource('/vans', App\Http\Controllers\API\VanController::class);
