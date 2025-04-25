<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ParentalController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\VanController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VanChildController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::fallback (function(){return redirect('/dashboard');});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //driver routes
    Route::resource('all-drivers', DriverController::class)
     ->names('drivers')
     ->parameters(['all-drivers' => 'driver']);

    Route::resource('all-parents', ParentalController::class)
     ->names('parents')
     ->parameters(['all-parents' => 'parent']);

    Route::resource('all-children', ChildController::class)
     ->names('children')
     ->parameters(['all-children' => 'children']);
    
    Route::resource('all-vans', VanController::class)
     ->names('vans')
     ->parameters(['all-vans' => 'van']);
    
    Route::resource('all-trips', TripController::class)
     ->names('trips')
     ->parameters(['all-trips' => 'trip']);
    
    Route::resource('all-operators', OperatorController::class)
     ->names('operators')
     ->parameters(['all-operators' => 'operator']);

    // Route::resource('all-van-children', VanChildController::class)
    //  ->names('assignment')
    //  ->parameters(['all-van-children' => 'van-child']);

    
    Route::get('/assignments', [VanChildController::class, 'index'])->name('assignment.index');
    Route::post('/assignments/add', [VanChildController::class, 'addChildToVan'])->name('assignment.addChildToVan');
    Route::delete('/assignments/{id}', [VanChildController::class, 'removeChildFromVan'])->name('assignment.remove');
    Route::put('/assignments/{id}', [VanChildController::class, 'update'])->name('assignment.update');
    Route::get('/assignments/{id}/edit', [VanChildController::class, 'edit'])->name('assignment.edit');
});

require __DIR__.'/auth.php';
