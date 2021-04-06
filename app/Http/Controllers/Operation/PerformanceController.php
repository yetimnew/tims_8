<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerformanceCreateRequest;
use App\Http\Requests\PerformanceUpdateRequest;
use App\Models\Operation\Distance;
use App\Models\Operation\Operation;
use App\Models\Operation\Performance;
use App\Models\Operation\Place;
use App\Models\Operation\Truck;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class PerformanceController extends Controller
{
    public function index(Request  $request)
    {
        if ($request->ajax()) {
            $performances =  DB::table('performances')
                ->select(
                    // 'performances.*',
                    'performances.id as id',
                    'performances.fo_number as fo',
                    'performances.driver_truck_id as td',
                    'drivers.name as dname',
                    'trucks.plate as plate',
                    'performances.date_dispatch as ddate',
                    'places.name as orgion',
                    'performances.ton_km as tonkm',
                    'performances.tone as tone',
                    'performances.is_returned as is_returned',
                    'performances.trip as trip'
                )
                ->LEFTJOIN('driver_truck', 'driver_truck.id', '=', 'performances.driver_truck_id')
                ->LEFTJOIN('drivers', 'drivers.id', '=', 'driver_truck.driver_id')
                ->LEFTJOIN('trucks', 'trucks.id', '=', 'driver_truck.truck_id')
                ->JOIN('places', 'places.id', '=', 'performances.destination_id')
                ->where('driver_truck.status', 1)
                 ->orderBy('performances.created_at', 'DESC')
                // ->limit(400)
                ->get();
            return DataTables::of($performances)
                ->addColumn('details', function ($performances) {
                    $button = '<a href="' . route('performance.show', $performances->id) . '"> <i class="fa fa-edit"></a>';
                    return $button;
                })->editColumn('tone', function ($data) {
                    return number_format($data->tone, 2);
                })->editColumn('tonkm', function ($data) {
                    return number_format($data->tonkm, 2);
                })->editColumn('is_returned', function ($data) {
                    if ($data->is_returned == 1) {
                        $button = 'Returned';
                    } else {
                        $button = 'Not Returned';
                    }
                    return $button;
                })->editColumn('trip', function ($data) {
                    if ($data->trip == 1) {
                        $button = 'Trip';
                    } else {
                        $button = 'Part Of Trip';
                    }
                    return $button;
                })
                ->rawColumns(['details'])
                ->make(true);
        }
        return view('operation.performance.index');
    }

    public function create(Performance $performance)
    {
        $operations =  Operation::active()->where('is_closed',  0)->get();
        $place = Place::with(['woreda'])->active()->orderBy('name')->get();

        $driver_truck = DB::table('driver_truck')
            ->join('drivers', 'drivers.id', '=', 'driver_truck.driver_id')
            ->join('trucks', 'trucks.id', '=', 'driver_truck.truck_id')
            ->select('driver_truck.*', 'drivers.name as Name', 'drivers.driverid as DriverId', 'trucks.plate AS Plate')
            ->where('driver_truck.status', '=', 1)
            ->orderBy('driver_truck.updated_at', 'DESC')
            ->get();
        if ($place->count() < 2) {
            Session::flash('info', 'You must have two or more Place before attempting to create Performance');
            return redirect()->route('place.create');
        }
        if (Truck::active()->count() <= 0) {
            Session::flash('info', 'You must have some Truck  before attempting to create Performance');
            return redirect()->route('driver_truck.create');
        }
        if ($operations->count() == 0) {
            Session::flash('info', 'You must have some Operation  before attempting to create Performance');
            return redirect()->route('operation.create');
        }

        return view('operation.performance.create')
            ->with('operations', $operations)
            // ->with('trucks', $trucks)
            ->with('performance', $performance)
            ->with('driver_truck', $driver_truck)
            ->with('place', $place);
    }

    public function store(PerformanceCreateRequest $request, Performance $performance)
    {
        // dd($request->validated());
         $available_tone = Operation::where('id', $request->operation_id)->sum('volume');
        $lifted_ton_erte = Performance::where('operation_id', $request->operation)->sum('tone');
        $lifted_ton_os = 0;
        $total_uplifted =  $lifted_ton_erte +  $lifted_ton_os;

        if ($total_uplifted <  $available_tone) {
            // $performance::create($request->all());
            $performance->create($request->validated());

            $unreturended = Performance::where('driver_truck_id', '=', $performance->driver_truck_id)->where('is_returned', '=', 0)->get();
            if ($unreturended->count() > 0) {
                Session::flash('error', 'This Truck Or Driver is not returned yet. Do not forget to return');
                return redirect()->route('performance.index');
            } else {
                Session::flash('success', 'Performance  registered successfully');
                return redirect()->route('performance.index');
            }

        } else {
            Session::flash('error', 'NOT REGISTERED This Operation is Full');
            return redirect()->back();
        }
    }

    public function show(Performance $performance)
    {
        // $performance = Performance::with('destination')->findOrFail($id);
        // dd($performance->origin->name);
        $start =  Carbon::parse($performance->DateDispach);
        $end  =  Carbon::parse($performance->returned_date);
        $difinday = $end->diffInDays($start);
        $diffinhour = $end->diffInHours($start);
        $operations = Operation::active()->get();
        $driver_detail =  DB::table('driver_truck')
        ->join('drivers', 'drivers.id', '=', 'driver_truck.driver_id')
        ->join('trucks', 'trucks.id', '=', 'driver_truck.truck_id')
        ->select('driver_truck.*', 'drivers.name as Name', 'drivers.driverid as DriverId', 'trucks.plate AS Plate')
        ->where('driver_truck.status', '=', 1)
        ->orderBy('driver_truck.updated_at', 'DESC')
        ->get();
        // dd( $driver_detail);
        return view('operation.performance.show')
            ->with('performance', $performance)
            ->with('operations', $operations)
            ->with('difinday', $difinday)
            ->with('diffinhour', $diffinhour)
            ->with('driver_detail', $driver_detail);
    }

    public function edit(Performance $performance)
    {
        $operations =  Operation::active()->get();
        $place = Place::active()->get();
        $trucks = Truck::active()->get();

        $driver_truck = DB::table('driver_truck')
        ->join('drivers', 'drivers.id', '=', 'driver_truck.driver_id')
        ->join('trucks', 'trucks.id', '=', 'driver_truck.truck_id')
        ->select('driver_truck.*', 'drivers.name as Name', 'drivers.driverid as DriverId', 'trucks.plate AS Plate')
        ->where('driver_truck.status', '=', 1)
        ->orderBy('driver_truck.updated_at', 'DESC')
        ->get();

        return view('operation.performance.edit')
            ->with('performance', $performance)
            ->with('operations', $operations)
            ->with('place', $place)
            ->with('driver_truck', $driver_truck)
            ->with('trucks', $trucks);
        // ->with('drivers',$drivers);

    }

    public function update(PerformanceUpdateRequest $request, Performance $performance)
    {
    $performance->update($request->validated());
     Session::flash('success', 'FO  Number ' . $performance->fo_number . ' updated successfully');
        return redirect()->route('performance.show', $performance->id);
    }

    public function destroy($id)
    {
        $performance = Performance::findOrFail($id);
        $performance->delete();
        Session::flash('success', 'Performance deleted successfuly');
        return redirect()->route('performance.index');
    }
    public function statusList()
    {
        return [
            'All' => Performance::active()->count(),
            'Returned' => Performance::returned()->count(),
            'Not returned' => Performance::notreturned()->count(),
        ];
    }
    public function driver_truck()
    {
        $trucks =  DB::table('driver_truck')
            ->select(
                'driver_truck.id',
                'driver_truck.driverid',
                'driver_truck.plate',
                'driver_truck.date_recived',
                'driver_truck.status',
                'drivers.name'
            )
            ->LEFTJOIN('drivers', 'drivers.driverid', '=', 'driver_truck.driverid')
            ->get();
        return $trucks;
    }

    // ajax request
    public function ajaxRequest()

    {
        return view('operation.performance.index');
    }


    public function ajaxRequestPost(Request $request)

    {
        $data = $request->all();
        $origion = $request->origion;
        $destination = $request->destination;

        $distance = Distance::where('origin_id', '=', $origion)
            ->where('destination_id', '=', $destination)
            ->pluck('km')
            ->first();

        if (!$distance) {
            $distance = Distance::where('origin_id', '=', $destination)
                ->where('destination_id', '=', $origion)
                ->pluck('km')
                ->first();
            if (!$distance) {
                $distance = 0;
                return $distance;
            }
            return $distance;
        }
        return $distance;
    }
    public function driverNameAndPlate()
    {
        $trucks =  DB::table('driver_truck')
            ->select(
                'driver_truck.id',
                'driver_truck.driver_id',
                'driver_truck.truck_id',
                'driver_truck.date_recived',
                'driver_truck.status',
                'drivers.name',
                'trucks.plate'
            )
            ->LEFTJOIN('drivers', 'drivers.id', '=', 'driver_truck.driver_id')
            ->LEFTJOIN('trucks', 'trucks.id', '=', 'driver_truck.truck_id')
            ->where('driver_truck.status', 1)
            ->where('driver_truck.is_attached', 1)
            ->where('drivers.status', 1)
            ->where('trucks.status', 1)
            ->get();
        return $trucks;
    }

    public function despach_data_and_retun_date_diff()
    {
      $performances = Performance::where('trip','=',1)->orderBy('DateDispach', 'DESC')->limit(100)->get();
        return view('operation.performance.dipachreturn')
            ->with('performances', $performances);
    }
    public function despach_data_and_retun_date_diff_store(Request $request)
    {
        $start1 = $request->input('startDate');
        $start =  $start1 . ' 00:00:00';

        $end1 = $request->input('endDate');
        $end = $end1 . ' 23:59:59';

        $diff = abs(strtotime($end) - strtotime($start));

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));


        if ($end >= $start) {

            $number =  $request->input('number');
            $performances = Performance::with('orgion')->with('destination')->with('driver_truck')
                ->whereBetween('DateDispach', [$start, $end])
                  ->where('trip','=',1)
                ->orderBy('DateDispach', 'DESC')->limit($number ? $number : 15)->get();
            return view('operation.performance.dipachreturnstore')
                ->with('start', $start)
                ->with('end', $end)
                ->with('months', $months)
                ->with('days', $days)
                ->with('years', $years)
                ->with('performances', $performances);
        } else {

            Session::flash('info', 'Cheeck the input Date Please');
            return redirect()->route('performance_by_truck');
        }
    }
    public function allperformance()
    {
        $performances =  DB::table('performances')
            ->select(
                'performances.*',
                'performances.driver_truck_id',
                'drivers.name as dname',
                'trucks.plate as plate',
                'places.name as orgion'
            )
            ->LEFTJOIN('driver_truck', 'driver_truck.id', '=', 'performances.driver_truck_id')
            ->LEFTJOIN('drivers', 'drivers.id', '=', 'driver_truck.driver_id')
            ->LEFTJOIN('trucks', 'trucks.id', '=', 'driver_truck.truck_id')
            ->JOIN('places', 'places.id', '=', 'performances.orgion_id')
            ->where('driver_truck.status', 1)
            ->where('drivers.status', 1)
            ->where('trucks.status', 1)
            ->orderBy('performances.created_at', 'DESC')
            ->get();
        return DataTables($performances)->make(true);
    }
    public function forchart()
    {
        $pr = Performance::all();
        $chart = new PerformanceChart;
        return view('operation.performance.dipachreturnstore')->with('chart', $chart);
    }
}
