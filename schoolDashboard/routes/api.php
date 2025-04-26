<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

// === AUTH ROUTES ===
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// === ROUTES PER ROLE ===

// ADMIN - can access everything
Route::middleware(['auth:sanctum', 'ability:*'])->group(function () {
    Route::apiResource('/students', App\Http\Controllers\API\StudentController::class);
    Route::apiResource('/vans', App\Http\Controllers\API\VanController::class);
    Route::apiResource('/drivers', App\Http\Controllers\API\DriverController::class);
    Route::apiResource('/operators', App\Http\Controllers\API\OperatorController::class);
    Route::apiResource('/trips', App\Http\Controllers\API\TripController::class);
    Route::apiResource('/parent_to_students', App\Http\Controllers\API\ParentToStudentController::class);
});


// PARENT ROUTES
Route::middleware(['auth:sanctum', 'ability:parent:view-self,parent:update-self,student:view-own,trip:*,van:view,driver:view'])->group(function () {
    Route::apiResource('/parent_to_students', App\Http\Controllers\API\ParentToStudentController::class);
    Route::apiResource('/students', App\Http\Controllers\API\StudentController::class)->only(['index', 'show']);
    Route::apiResource('/vans', App\Http\Controllers\API\VanController::class)->only(['index', 'show']);
    Route::apiResource('/drivers', App\Http\Controllers\API\DriverController::class)->only(['index', 'show']);
    Route::apiResource('/trips', App\Http\Controllers\API\TripController::class)->only(['index', 'show']);
});


// DRIVER ROUTES
Route::middleware(['auth:sanctum', 'ability:trip:*,van:view,operator:view'])->group(function () {
    Route::apiResource('/trips', App\Http\Controllers\API\TripController::class);
    Route::apiResource('/vans', App\Http\Controllers\API\VanController::class)->only(['index', 'show']);
    Route::apiResource('/operators', App\Http\Controllers\API\OperatorController::class)->only(['index', 'show']);
});


// OPERATOR ROUTES
Route::middleware(['auth:sanctum', 'ability:trip:*,van:view,driver:view'])->group(function () {
    Route::apiResource('/trips', App\Http\Controllers\API\TripController::class);
    Route::apiResource('/vans', App\Http\Controllers\API\VanController::class)->only(['index', 'show']);
    Route::apiResource('/drivers', App\Http\Controllers\API\DriverController::class)->only(['index', 'show']);
});
