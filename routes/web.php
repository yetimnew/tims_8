<?php

use App\Http\Controllers\Operation\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth'], 'namespace' => 'Operation'], function () {

    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::get('/profile',                  [ProfileController::class,'index'])->name('profile');
    Route::post('/profile',                  [ProfileController::class,'update'])->name('profile.update');
    // Route::post('/profile/update',          [ 'ProfileController@update', 'as' => 'profile.update']);

});

require __DIR__.'/auth.php';
