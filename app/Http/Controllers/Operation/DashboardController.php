<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Operation\Operation;
use App\Models\Operation\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $trucks = Truck::count();

         return view('dashboard')
         ->with('trucks',$trucks);
    }
    public function operation()
    {
        $operations  = DB::table('operations')
        ->select(
            'operations.operationid',
            'operations.volume as tone_given',
            'customers.name',
            DB::raw('SUM(performances.tone)as performed_tone'),
            DB::raw('SUM(performances.trip)as trip'),
        )
        ->leftJoin('customers', 'operations.customer_id', '=', 'customers.id')
        ->leftJoin('performances', 'performances.operation_id', '=', 'operations.id')

        ->where('operations.status', '=', 1)
        ->where('operations.is_closed', '=', 0)
        ->groupBy('operations.id')
        ->orderBy('operations.created_at','DESC')
        ->get();
        return $operations;
        // dd($operations);
    //    return   $operation;
    }
}
