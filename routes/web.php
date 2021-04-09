<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operation\ZoneController;
use App\Http\Controllers\Operation\PlaceController;
use App\Http\Controllers\Operation\TruckController;
use App\Http\Controllers\Operation\DriverController;
use App\Http\Controllers\Operation\RegionController;
use App\Http\Controllers\Operation\WoredaController;
use App\Http\Controllers\Operation\ProfileController;
use App\Http\Controllers\Operation\CustomerController;
use App\Http\Controllers\Operation\DashboardController;
use App\Http\Controllers\Operation\DistanceController;
use App\Http\Controllers\Operation\OperationController;
use App\Http\Controllers\Operation\TruckModelController;
use App\Http\Controllers\Operation\DriverTruckController;
use App\Http\Controllers\Operation\PerformanceController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard',  [DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/operation',  [DashboardController::class,'operation'])->name('dashboard.operation');
    Route::get('/profile',                  [ProfileController::class,'index'])->name('profile');
    Route::post('/profile',                  [ProfileController::class,'update'])->name('profile.update');
    Route::resource('truck_model', TruckModelController::class)->except('show');
    Route::get('truck/{truck}/activate', [TruckController::class,'activate'])->name('truck.activate');
    Route::get('truck/{truck}/deactivate', [TruckController::class,'deactivate'])->name('truck.deactivate');
    Route::resource('truck', TruckController::class);
    Route::get('driver/{driver}/activate', [DriverController::class,'activate'])->name('driver.activate');
    Route::get('driver/{driver}/deactivate', [DriverController::class,'deactivate'])->name('driver.deactivate');
    Route::resource('driver', DriverController::class);
    Route::resource('region', RegionController::class);
    Route::resource('zone', ZoneController::class);
    Route::resource('woreda', WoredaController::class);
    Route::resource('place', PlaceController::class);
    Route::resource('customer', CustomerController::class);
    Route::get('/operation/close/{operation}',     [OperationController::class,'close'])->name('operation.close');
    Route::get('/operation/open/{operation}',      [OperationController::class,'open'])->name('operation.open');
    Route::PATCH('/operation/update2/{operation}',   [OperationController::class,'update2'])->name('operation.update2');
    Route::resource('operation', OperationController::class);
    // Route::get('/driver_truck/detach/{id}',  DriverTruckController::class,'detach')->name('driver_truck.detach');
    // Route::post('/driver_truck/update_dt/{id}',   [DriverTruckController::class,'update_dt'])->name('driver_truck.update_dt');
    // Route::resource('driver_truck', DriverTruckController::class);
    Route::get('ajaxRequest', [PerformanceController::class,'ajaxRequest'])->name('performace.distance');
    Route::post('ajaxRequest', [PerformanceController::class,'ajaxRequestPost'])->name('performace.distance');
    Route::resource('performance', PerformanceController::class);
    Route::resource('distance', DistanceController::class);

    //Maintenace
    // Route::resource('downtime', ' App\Http\Controllers\Maintenance\DownTimeController');
    // Route::resource('job_card_type', ' App\Http\Controllers\Maintenance\JobCarTypeController');
    // Route::resource('job_system', ' App\Http\Controllers\Maintenance\JobSystemController');
    // Route::resource('job_type', ' App\Http\Controllers\Maintenance\JobTypeController');
    // Route::resource('job_ident', ' App\Http\Controllers\Maintenance\JobIdentController');
    // Route::resource('workshop', ' App\Http\Controllers\Maintenance\WorkshopController');
    // Route::post('open_job_card/append', ' App\Http\Controllers\Maintenance\OpenJobCardController''jobIdent')->name('open_job_card.append');
    // Route::resource('open_job_card', ' App\Http\Controllers\Maintenance\OpenJobCardController');
});
