<?php

use App\Http\Controllers\Operation\ProfileController;
// use App\Http\Controllers\Operation\TruckModelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::get('/profile',                  [ProfileController::class,'index'])->name('profile');
    Route::post('/profile',                  [ProfileController::class,'update'])->name('profile.update');
    Route::resource('truck_model', 'App\Http\Controllers\Operation\TruckModelController');

});

require __DIR__.'/auth.php';
