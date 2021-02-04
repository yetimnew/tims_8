<?php

use App\Http\Controllers\Operation\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::get('/profile',                  [ProfileController::class,'index'])->name('profile');
    Route::post('/profile',                  [ProfileController::class,'update'])->name('profile.update');
    Route::resource('truck_model', 'App\Http\Controllers\Operation\TruckModelController')->except('show');
    Route::get('truck/{truck}/activate', 'App\Http\Controllers\Operation\TruckController@activate')->name('truck.activate');
    Route::get('truck/{truck}/deactivate', 'App\Http\Controllers\Operation\TruckController@deactivate')->name('truck.deactivate');
    Route::resource('truck', 'App\Http\Controllers\Operation\TruckController');
    Route::get('driver/{driver}/activate', 'App\Http\Controllers\Operation\DriverController@activate')->name('driver.activate');
    Route::get('driver/{driver}/deactivate', 'App\Http\Controllers\Operation\DriverController@deactivate')->name('driver.deactivate');
    Route::resource('driver', 'App\Http\Controllers\Operation\DriverController');
    Route::resource('region', 'App\Http\Controllers\Operation\RegionController');
    Route::resource('zone', 'App\Http\Controllers\Operation\ZoneController');
    Route::resource('woreda', 'App\Http\Controllers\Operation\WoredaController');
    Route::resource('place', 'App\Http\Controllers\Operation\PlaceController');
    Route::resource('customer', 'App\Http\Controllers\Operation\CustomerController');
    Route::get('/operation/close/{operation}',     'App\Http\Controllers\Operation\OperationController@close')->name('operation.close');
    Route::get('/operation/open/{operation}',      'App\Http\Controllers\Operation\OperationController@open')->name('operation.open');
    Route::PATCH('/operation/update2/{operation}',   'App\Http\Controllers\Operation\OperationController@update2')->name('operation.update2');
    Route::resource('operation', 'App\Http\Controllers\Operation\OperationController');
    Route::get('/driver_truck/detach/{id}',  'App\Http\Controllers\Operation\DriverTruckController@detach')->name('driver_truck.detach');
    Route::resource('driver_truck', 'App\Http\Controllers\Operation\DriverTruckController');

});

require __DIR__.'/auth.php';
