<?php

use App\Http\Controllers\HRM\DashboardController;
use App\Http\Controllers\Maintenance\DownTimeController;
use App\Http\Controllers\Maintenance\JobCarTypeController;
use App\Http\Controllers\Maintenance\JobIdentController;
use App\Http\Controllers\Maintenance\JobSystemController;
use App\Http\Controllers\Maintenance\JobTypeController;
use App\Http\Controllers\Maintenance\OpenJobCardController;
use App\Http\Controllers\HRM\PersonaleController;
use App\Http\Controllers\Maintenance\WorkshopController;
use App\Http\Controllers\Operation\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {

    // Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::get('/dashboard',  'App\Http\Controllers\Operation\DashboardController@index')->name('dashboard');
    Route::get('/dashboard/operation',  'App\Http\Controllers\Operation\DashboardController@operation')->name('dashboard.operation');

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
    Route::post('/driver_truck/update_dt/{id}',   'App\Http\Controllers\Operation\DriverTruckController@update_dt')->name('driver_truck.update_dt');
    Route::resource('driver_truck', 'App\Http\Controllers\Operation\DriverTruckController');
    Route::get('ajaxRequest', 'App\Http\Controllers\Operation\PerformanceController@ajaxRequest')->name('performace.distance');
    Route::post('ajaxRequest', 'App\Http\Controllers\Operation\PerformanceController@ajaxRequestPost')->name('performace.distance');
    Route::resource('performance', 'App\Http\Controllers\Operation\PerformanceController');
    Route::resource('distance', 'App\Http\Controllers\Operation\DistanceController');

    //Maintenace
    // Route::resource('downtime', ' App\Http\Controllers\Maintenance\DownTimeController');
    // Route::resource('job_card_type', ' App\Http\Controllers\Maintenance\JobCarTypeController');
    // Route::resource('job_system', ' App\Http\Controllers\Maintenance\JobSystemController');
    // Route::resource('job_type', ' App\Http\Controllers\Maintenance\JobTypeController');
    // Route::resource('job_ident', ' App\Http\Controllers\Maintenance\JobIdentController');
    // Route::resource('workshop', ' App\Http\Controllers\Maintenance\WorkshopController');
    // Route::post('open_job_card/append', ' App\Http\Controllers\Maintenance\OpenJobCardController@jobIdent')->name('open_job_card.append');
    // Route::resource('open_job_card', ' App\Http\Controllers\Maintenance\OpenJobCardController');
});

    Route::group(['middleware' => ['auth'], 'prefix' => 'maintenance'], function () {
        Route::resource('/', 'App\Http\Controllers\Maintenance\DashboardController');
        Route::resource('downtime', 'App\Http\Controllers\Maintenance\DownTimeController');
        Route::resource('job_card_type', JobCarTypeController::class);
        Route::resource('job_system', JobSystemController::class);
        Route::resource('job_type', JobTypeController::class);
        Route::resource('job_ident', JobIdentController::class);
        Route::resource('workshop', WorkshopController::class);
        Route::post('open_job_card/append', [OpenJobCardController::class, 'jobIdent'])->name('open_job_card.append');
        Route::resource('open_job_card', OpenJobCardController::class);
    });

    Route::group(['middleware' => ['auth'], 'prefix' => 'hrm'], function () {
        Route::get('/', [DashboardController::class,'index'])->name('hrm');
        // Route::get('/personale/deactivate/{id}',                     [PersonalesController::class,'deactivate'])->name('personale.deactivate');
        // Route::post('/personale/deactivate_store/{id}',                 [PersonalesController::class, 'deactivate_store'])->name('personale.deactivate_store');
        // Route::post('/personale/activate/{id}',                  [PersonalesController::class,'activate'])->name('personale.activate');
        // Route::get('/personale/{personale:firstname}/show/',                 [PersonalesController::class, 'show'])->name('personale.show');
        // Route::post('personale/append',  [PersonalesController::class,'pay_grade_level'])->name('personale.append');
        Route::resource('personale', PersonaleController::class);
        // Route::resource('department', 'DepartementsController');
        // Route::resource('branch', 'BranchesController');
        // Route::resource('job_title', 'JobTitleController');
        // Route::resource('pay_grade', 'PayGradeController');
        // Route::resource('pay_grade_level', 'PayGradeLevelController');
        // Route::resource('promotion', 'EmployeesPromotionController');
        // Route::resource('leave_type', 'LeaveTypeController');
        // Route::resource('holiday', 'HolidayController');
        // Route::resource('work_week', 'WorkWeekController');
        // Route::resource('leave_period', 'LeavePeriodController');
        // Route::resource('leave_entitlement', 'LeaveEntitlementController');
        // Route::resource('leave', 'LeaveController');
        // Route::post('leave/append', 'LeaveController@list_of_leave')->name('leave.append');
        // Route::post('leave_entitlement/append', 'LeaveEntitlementController@list_of_leave')->name('leave_entitlement.append');

        // Route::get('employees_dependant/create/{id}', 'EmployeesDependantsContactController@create')->name('employees_dependant.create');
        // Route::POST('employees_dependant/store',      'EmployeesDependantsContactController@store')->name('employees_dependant.store');
        // Route::get('employees_dependant/edit/{id}',      'EmployeesDependantsContactController@edit')->name('employees_dependant.edit');
        // Route::patch('/employees_dependant/update/{id}',       'EmployeesDependantsContactController@update')->name('employees_dependant.update');
        // Route::DELETE('/employees_dependant/destroy/{id}',       'EmployeesDependantsContactController@destroy')->name('employees_dependant.destroy');

        // Route::get('emergence_contact/create/{id}', 'EmployeesEmergencyContactController@create')->name('emergence_contact.create');
        // Route::POST('emergence_contact/store',      'EmployeesEmergencyContactController@store')->name('emergence_contact.store');
        // Route::get('emergence_contact/edit/{id}',      'EmployeesEmergencyContactController@edit')->name('emergence_contact.edit');
        // Route::patch('/emergence_contact/update/{id}',       'EmployeesEmergencyContactController@update')->name('emergence_contact.update');
        // Route::DELETE('/emergence_contact/destroy/{id}',       'EmployeesEmergencyContactController@destroy')->name('emergence_contact.destroy');

        // Route::get('experience/create/{id}', 'WorkExperianceController@create')->name('experience.create');
        // Route::POST('experience/store',      'WorkExperianceController@store')->name('experience.store');
        // Route::get('experience/edit/{id}',      'WorkExperianceController@edit')->name('experience.edit');
        // Route::patch('/experience/update/{id}',       'WorkExperianceController@update')->name('experience.update');
        // Route::DELETE('/experience/destroy/{id}',       'WorkExperianceController@destroy')->name('experience.destroy');

        // Route::get('education/create/{id}', 'EducationController@create')->name('education.create');
        // Route::POST('education/store',      'EducationController@store')->name('education.store');
        // Route::get('education/edit/{id}',      'EducationController@edit')->name('education.edit');
        // Route::patch('/education/update/{id}',       'EducationController@update')->name('education.update');
        // Route::DELETE('/education/destroy/{id}',       'EducationController@destroy')->name('education.destroy');

        // Route::resource('education', 'EducationController')->except('index');
    });


require __DIR__.'/auth.php';
