<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/drivers', App\Http\Controllers\DriverController::class);

Route::resource('/operators', App\Http\Controllers\OperatorController::class);

Route::resource('/parent_to_students', App\Http\Controllers\ParentToStudentController::class);

Route::resource('/students', App\Http\Controllers\StudentController::class);

Route::resource('/trips', App\Http\Controllers\TripController::class);

Route::resource('/vans', App\Http\Controllers\VanController::class);
