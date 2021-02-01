<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\TruckCreateRequest;
use App\Http\Requests\TruckUpdateRequest;
use App\Models\Operation\Truck;
use App\Models\Operation\TruckModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::active()->orderBy('updated_at', 'DESC')->get();
        return view('operation.truck.index')->with('trucks', $trucks);
    }

    public function create()
    {
        $truck = new Truck;
        $truck_models = TruckModel::all();
        if (!$truck_models->count()) {
            Session::flash('info', 'You must have some Vehecle Model before attempting to create Truck');
            return redirect()->route('truck_model.create');
        }
        return view('operation.truck.create')
            ->with('truck', $truck)
            ->with('truck_models', $truck_models);
    }

    public function store(TruckCreateRequest $request)
    {
        Truck::create($request->all());
        Session::flash('success', 'Truck  registered successfully');
        return redirect()->route('truck.index');
    }

    public function show(Truck $truck)
    {
        return view('operation.truck.show')->with('truck', $truck);
    }

    public function edit(Truck $truck)
    {
        $truck_models = TruckModel::all();
        return view('operation.truck.edit')
            ->with('truck', $truck)
            ->with('truck_models', $truck_models);
    }

    public function update(TruckUpdateRequest $request,Truck $truck)
    {
        $truck->update($request->all());
        Session::flash('success', 'Truck updated successfully');
        return redirect()->route('truck.index');
    }

    public function destroy($id)
    {
        $truck = Truck::findOrFail($id);
        $plate =  $truck->plate;
        $td = DriverTuck::where('plate', '=', $plate)
            ->where('status', '=', 1)
            ->where('is_attached', '=', 1)
            ->first();
        if ($td) {
            $driver = Driver::where('driverid', '=', $td->driverid)->first();
            Session::flash('error', 'Not deleted ! ' . $plate . ' is attached to driver ' . $driver->name);
            return redirect()->back();
        } else {
            $truck->status = 0;
            $truck->save();
            Session::flash('success', 'vehecle  deleted successfuly');
            return redirect()->route('truck');
        }
    }
    public function deactivate(Truck $truck)
    {
        $truck->status = 0;
        $truck->save();
        Session::flash('success', $truck->plate . ' Deactivate successfully');
        return redirect()->back();
    }
    public function activate(Truck $truck)
    {
        $truck->status = 1;
        $truck->save();
        Session::flash('success', $truck->plate . ' Activated successfully');
        return redirect()->back();
    }
    public function freeTrucks()
    {
        $free_trucks =   DB::table('trucks')
            ->select(
                'trucks.*',
                DB::raw('SUM(driver_truck.is_attached) as tone'),
                DB::raw('max(driver_truck.date_detach) as date_detach')
            )
            ->leftJoin('driver_truck', 'trucks.id', '=', 'driver_truck.truck_id')
            ->where('trucks.status', '=', 1)
            ->GROUPBY('trucks.id')
            ->havingRaw('tone = 0')
            ->orHavingRaw('tone  is null')
            ->orderBy('trucks.plate')
            ->get();
        // dd($free_trucks);
        $free_drivers =   DB::table('drivers')
            ->select(
                'drivers.*',
                DB::raw('SUM(driver_truck.is_attached) as tone'),
                DB::raw('max(driver_truck.date_detach) as date_detach')
            )
            ->leftJoin('driver_truck', 'drivers.id', '=', 'driver_truck.driver_id')
            ->where('drivers.status', '=', 1)
            ->GROUPBY('drivers.id')
            ->havingRaw('tone = 0')
            ->orHavingRaw('tone  is null')
            ->orderBy('drivers.name')
            ->get();
        // dd( $free_drivers);
        return view('operation.truck.free_trucks')
            ->with('free_trucks', $free_trucks)
            ->with('free_drivers', $free_drivers);
    }
}
