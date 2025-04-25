<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ParentalController;
use App\Http\Controllers\api\ParentProfileController;
use App\Http\Controllers\api\OperatorController;
use App\Http\Controllers\api\PickupController;
use App\Http\Controllers\VanChildController;
use App\Models\Parental;
use App\Models\Operator;
use App\Http\Controllers\Controller;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/parents/{parents}', [ParentalController::class, 'show']);
Route::get('/parents', [ParentalController::class, 'index']);
Route::post('/parent-login', [ParentalController::class, 'parentLogin']);
Route::post('/operator-login', [OperatorController::class, 'operatorLogin']);

Route::group([], function() {
    Route::get('/parent-profile', [ParentProfileController::class, 'getProfile']);
    Route::post('/parent-logout', [ParentalController::class, 'parentLogout']);
    Route::get('/parent-children', [ParentProfileController::class, 'getChildrenByParent']);
    
});

Route::post('/verify-pickup', [PickupController::class, 'verifyPickup']);

Route::get('/operators/{operatorId}/children', [VanChildController::class, 'getChildrenByOperator']);

