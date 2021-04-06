<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRM\LeaveController;
use App\Http\Controllers\HRM\HolidayController;
use App\Http\Controllers\HRM\BranchesController;
use App\Http\Controllers\HRM\JobTitleController;
use App\Http\Controllers\HRM\PayGradeController;
use App\Http\Controllers\HRM\WorkWeekController;
use App\Http\Controllers\HRM\DashboardController;
use App\Http\Controllers\HRM\EducationController;
use App\Http\Controllers\HRM\LeaveTypeController;
use App\Http\Controllers\HRM\PersonaleController;
use App\Http\Controllers\Operation\ZoneController;
use App\Http\Controllers\HRM\LeavePeriodController;
use App\Http\Controllers\Operation\PlaceController;
use App\Http\Controllers\Operation\TruckController;
use App\Http\Controllers\HRM\DepartementsController;
use App\Http\Controllers\Operation\DriverController;
use App\Http\Controllers\Operation\RegionController;
use App\Http\Controllers\Operation\WoredaController;
use App\Http\Controllers\HRM\PayGradeLevelController;
use App\Http\Controllers\Operation\ProfileController;
use App\Http\Controllers\HRM\WorkExperianceController;
use App\Http\Controllers\Operation\CustomerController;
use App\Http\Controllers\Operation\DistanceController;
use App\Http\Controllers\Maintenance\JobTypeController;
use App\Http\Controllers\Operation\OperationController;
use App\Http\Controllers\HRM\LeaveEntitlementController;
use App\Http\Controllers\Maintenance\JobIdentController;
use App\Http\Controllers\Maintenance\WorkshopController;
use App\Http\Controllers\Operation\TruckModelController;
use App\Http\Controllers\Maintenance\JobSystemController;
use App\Http\Controllers\Operation\DriverTruckController;
use App\Http\Controllers\Operation\PerformanceController;
use App\Http\Controllers\HRM\EmployeesPromotionController;
use App\Http\Controllers\Maintenance\JobCarTypeController;
use App\Http\Controllers\Maintenance\OpenJobCardController;
use App\Http\Controllers\HRM\EmployeesEmergencyContactController;
use App\Http\Controllers\HRM\EmployeesDependantsContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/',  [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'operation'], function () {

    Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/operation',  [DashboardController::class, 'operation'])->name('dashboard.operation');

    Route::get('/profile',                  [ProfileController::class,'index'])->name('profile');
    Route::post('/profile',                  [ProfileController::class,'update'])->name('profile.update');
    Route::resource('truck_model', TruckModelController::class);
    Route::get('truck/{truck}/activate', [TruckController::class, 'activate'])->name('truck.activate');
    Route::get('truck/{truck}/deactivate', [TruckController::class, 'deactivate'])->name('truck.deactivate');
    Route::resource('truck', TruckController::class);
    Route::get('driver/{driver}/activate', [DriverController::class, 'activate'])->name('driver.activate');
    Route::get('driver/{driver}/deactivate', [DriverController::class, 'deactivate'])->name('driver.deactivate');
    Route::resource('driver', DriverController::class);
    Route::resource('region', RegionController::class);
    Route::resource('zone', ZoneController::class);
    Route::resource('woreda', WoredaController::class);
    Route::resource('place', PlaceController::class );
    Route::resource('customer', CustomerController::class);
    Route::get('/operation/close/{operation}',     [OperationController::class, 'close'])->name('operation.close');
    Route::get('/operation/open/{operation}',      [OperationController::class, 'open'])->name('operation.open');
    Route::PATCH('/operation/update2/{operation}',   [OperationController::class, 'update2'])->name('operation.update2');
    Route::resource('operation', OperationController::class );
    Route::get('/driver_truck/detach/{id}',  [DriverTruckController::class, 'detach'])->name('driver_truck.detach');
    Route::post('/driver_truck/update_dt/{id}',   [DriverTruckController::class, 'update_dt'])->name('driver_truck.update_dt');
    Route::resource('driver_truck', DriverTruckController::class);
    Route::get('ajaxRequest', [PerformanceController::class, 'ajaxRequest'])->name('performace.distance');
    Route::post('ajaxRequest', [PerformanceController::class, 'ajaxRequestPost'])->name('performace.distance');
    Route::resource('performance', PerformanceController::class );
    Route::resource('distance', DistanceController::class );
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
        Route::get('/personale/deactivate/{id}',                     [PersonaleController::class,'deactivate'])->name('personale.deactivate');
        Route::post('/personale/deactivate_store/{id}',                 [PersonaleController::class, 'deactivate_store'])->name('personale.deactivate_store');
        Route::post('/personale/activate/{id}',                  [PersonaleController::class,'activate'])->name('personale.activate');
        Route::get('/personale/{personale:firstname}/show/',                 [PersonaleController::class, 'show'])->name('personale.show');
        Route::post('personale/append',  [PersonaleController::class,'pay_grade_level'])->name('personale.append');
        Route::resource('personale', PersonaleController::class);
        Route::resource('department', DepartementsController::class);
        Route::resource('branch', BranchesController::class);
        Route::resource('job_title', JobTitleController::class);
        Route::resource('pay_grade', PayGradeController::class);
        Route::resource('pay_grade_level', PayGradeLevelController::class);
        Route::resource('promotion', EmployeesPromotionController::class);
        Route::resource('leave_type', LeaveTypeController::class);
        Route::resource('holiday', HolidayController::class);
        Route::resource('work_week', WorkWeekController::class);
        Route::resource('leave_period', LeavePeriodController::class);
        Route::resource('leave_entitlement', LeaveEntitlementController::class);
        Route::resource('leave', LeaveController::class);
        Route::post('leave/append', [LeaveController::class, 'list_of_leave'])->name('leave.append');
        Route::post('leave_entitlement/append', [LeaveEntitlementController::class, 'list_of_leave'])->name('leave_entitlement.append');

        // Route::resource('employees_dependant', EmployeesDependantsContactController::class);
        Route::get('employees_dependant/create/{id}', [EmployeesDependantsContactController::class,'create'])->name('employees_dependant.create');
        Route::POST('employees_dependant/store',      [EmployeesDependantsContactController::class,'store'])->name('employees_dependant.store');
        Route::get('employees_dependant/edit/{id}',      [EmployeesDependantsContactController::class,'edit'])->name('employees_dependant.edit');
        Route::patch('/employees_dependant/update/{id}',       [EmployeesDependantsContactController::class,'update'])->name('employees_dependant.update');
        Route::DELETE('/employees_dependant/destroy/{id}',       [EmployeesDependantsContactController::class,'destroy'])->name('employees_dependant.destroy');

        Route::get('emergence_contact/create/{id}', [EmployeesEmergencyContactController::class,'create'])->name('emergence_contact.create');
        Route::POST('emergence_contact/store',      [EmployeesEmergencyContactController::class,'store'])->name('emergence_contact.store');
        Route::get('emergence_contact/edit/{id}',      [EmployeesEmergencyContactController::class,'edit'])->name('emergence_contact.edit');
        Route::patch('/emergence_contact/update/{id}',       [EmployeesEmergencyContactController::class,'update'])->name('emergence_contact.update');
        Route::DELETE('/emergence_contact/destroy/{id}',       [EmployeesEmergencyContactController::class,'destroy'])->name('emergence_contact.destroy');

        Route::get('experience/create/{id}', [WorkExperianceController::class,'create'])->name('experience.create');
        Route::POST('experience/store',      [WorkExperianceController::class,'store'])->name('experience.store');
        Route::get('experience/edit/{id}',      [WorkExperianceController::class,'edit'])->name('experience.edit');
        Route::patch('/experience/update/{id}',       [WorkExperianceController::class,'update'])->name('experience.update');
        Route::DELETE('/experience/destroy/{id}',       [WorkExperianceController::class,'destroy'])->name('experience.destroy');

        Route::get('education/create/{id}', [EducationController::class,'create'])->name('education.create');
        Route::POST('education/store',      [EducationController::class,'store'])->name('education.store');
        Route::get('education/edit/{id}',      [EducationController::class,'edit'])->name('education.edit');
        Route::patch('/education/update/{id}',       [EducationController::class,'update'])->name('education.update');
        Route::DELETE('/education/destroy/{id}',       [EducationController::class,'destroy'])->name('education.destroy');

        // Route::resource('education', 'EducationController')->except('index');
    });


require __DIR__.'/auth.php';
