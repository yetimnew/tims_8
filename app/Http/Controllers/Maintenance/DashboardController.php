<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Operation\Truck;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trucks = Truck::count();
        return view('maintenance.dashboard')
        ->with('trucks',$trucks);
    }
}
