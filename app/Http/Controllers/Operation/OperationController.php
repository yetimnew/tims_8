<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperationCreatedRequst;
use App\Http\Requests\OperationUpdatedRequest;
use App\Models\Operation\Customer;
use App\Models\Operation\Operation;
use App\Models\Operation\Place;
use App\Models\Operation\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::active()->orderBy('updated_at', 'DESC')->get();
        return view('operation.operation.index')->with('operations', $operations);
    }

    public function create()
    {

        $operation = new Operation;
        $places = Place::all();
        $customers = Customer::all();
        if ($places->count() == 0) {

            Session::flash('info', 'You must have some Region before attempting to create Operation');
            return redirect()->route('region.create');
        }

        if ($customers->count() == 0) {
            // toast('You must have some Customer before attempting to create Operation','info')->autoClose(5000)->position('top-end');

            Session::flash('info', 'You must have some Customer before attempting to create Operation');
            return redirect()->route('customer.create');
        }

        return view('operation.operation.create')
            ->with('places', $places)
            ->with('customers', $customers)
            ->with('operation', $operation);
    }

    public function store(OperationCreatedRequst $request, Operation $operation)
    {
        // dd($request->all());

        $operation = new Operation;
        $operation->operationid = $request->operationid;
        $operation->customer_id = $request->customer_id;
        $operation->start_date = $request->start_date;
        $operation->place_id = $request->place_id;
        $operation->volume = $request->volume;
        $operation->cargo_type = $request->cargo_type;
        $operation->tone = $request->tone;
        $operation->tariff = $request->tariff;
        $operation->created_by = Auth::user()->id;
        $operation->updated_by = Auth::user()->id;
        $operation->save();
        // alert()->success('SuccessAlert','operation  registerd successfuly.');
        Session::flash('success', 'operation  registered successfully');
        return redirect()->route('operation.index');
    }

    public function show(Operation $operation)
    {

        // $operation = Operation::findOrFail($id);
        // $operation = Operation::where('id', '=', $id)->first();
        // $performance =  DB::table('performances')
        //     ->select(
        //         DB::raw('SUM(performances.trip) as trip'),
        //         DB::raw('SUM(performances.CargoVolumMT) as mt'),
        //         DB::raw('SUM(performances.tonkm) as tonekm'),
        //         DB::raw('SUM(performances.DistanceWCargo) as dwc'),
        //         DB::raw('SUM(performances.DistanceWOCargo) as dwoc'),
        //         DB::raw('SUM(performances.fuelInBirr) as fuel'),
        //         DB::raw('SUM(performances.perdiem) as per'),
        //         DB::raw('SUM(performances.workOnGoing) as wog'),
        //         DB::raw('SUM(performances.other) as other')
        //     )
        //     ->LEFTJOIN('operations', 'operations.id', '=', 'performances.operation_id')
        //     ->where('performances.operation_id', $operation->id)
        //     ->first();

        // $outsource_performance =  DB::table('outsource_performances')
        //     ->select(
        //         // 'outsource_performances.trip',
        //         DB::raw('SUM(outsource_performances.trip) as trip'),
        //         DB::raw('SUM(outsource_performances.CargoVolumMT) as mt'),
        //         DB::raw('SUM(outsource_performances.tonkm) as tonekm'),
        //         DB::raw('SUM(outsource_performances.DistanceWCargo) as dwc'),
        //         DB::raw('SUM(outsource_performances.DistanceWOCargo) as dwoc'),
        //         DB::raw('SUM(outsource_performances.tonkm * outsource_performances.tariff) as revenue')

        //     )
        //     ->LEFTJOIN('operations', 'operations.id', '=', 'outsource_performances.operation_id')
        //     ->where('outsource_performances.operation_id', $operation->id)
        //     ->first();

        // $outsource_performance_km =  DB::table('outsource_performances')
        //     ->select(
        //         DB::raw('SUM(outsource_performances.DistanceWCargo) as dwc'),
        //         DB::raw('SUM(outsource_performances.DistanceWOCargo) as dwoc'),

        //     )
        //     ->LEFTJOIN('operations', 'operations.id', '=', 'outsource_performances.operation_id')
        //     ->where('outsource_performances.operation_id', $operation->id)
        //     ->Where('outsource_performances.trip', 1)
        //     ->first();

        // dd( $outsource_performance);

        return view('operation.operation.show')
            // ->with('performance', $performance)
            // ->with('outsource_performance', $outsource_performance)
            // ->with('outsource_performance_km', $outsource_performance_km)
            ->with('operation', $operation);
    }

    public function edit(Operation $operation)
    {

        // $operation = Operation::findorfail($id);
        $places = Place::all();
        $regions = Region::all();
        $customers = Customer::all();
        if ($regions->count() == 0) {
            return redirect()->route('region');
            // toast('You must have some Region before attempting to create Truck','info')->autoClose(5000)->position('top-end');
            Session::flash('info', 'You must have some Region before attempting to create Truck');
        }

        if ($customers->count() == 0) {
            return redirect()->route('customer');
            // toast('YYou must have some Customer before attempting to create Truck','info')->autoClose(5000)->position('top-end');
            Session::flash('info', 'You must have some Customer before attempting to create Truck');
        }

        return view('operation.operation.edit')
            ->with('operation', $operation)
            ->with('regions', $regions)
            ->with('customers', $customers)
            ->with('places', $places);
    }

    public function update(OperationUpdatedRequest $request , Operation $operation)
    {

        $operation->operationid = $request->operationid;
        $operation->customer_id = $request->customer_id;
        $operation->start_date = $request->start_date;
        $operation->place_id = $request->place_id;
        $operation->volume = $request->volume;
        $operation->cargo_type = $request->cargo_type;
        $operation->tone = $request->tone;
        $operation->tariff = $request->tariff;
        $operation->updated_by = Auth::user()->id;
        $operation->save();
        Session::flash('success', 'Operation updated successfully.');
        // alert()->success('SuccessAlert', 'operation updated successfully.');
        // Session::flash('success', 'operation updated successfuly' );
        return redirect()->route('operation.show' ,$operation->id );
    }


    public function destroy(Operation $operation)
    {
        // dd( $id);
        // $operation = Operation::findOrFail($id);
        $operation->delete();
        Session::flash('success', 'Operation deleted successfully');
        return redirect()->route('operation.index');

        $performance = Performance::where('operation_id', '=', $operation->id)->first();
        if (isset($performance)) {
            Session::flash('error', 'NOT DELETED ! There are records by this operation id');
            return redirect()->back();
        } else {
            $operation->delete();
            Session::flash('success', 'Operation deleted successfuly');
            return redirect()->route('operation');
        }
    }
    public function close(Operation $operation)
    {
        return view('operation.operation.close')->with('operation', $operation);
    }

    public function open(Operation $operation)
    {
        $operation->is_closed = 0;
        $operation->end_date = Null;
        $operation->save();
        Session::flash('success', 'Operation Opened successfully');
        // return redirect()->route('operation');
        return redirect()->back();
    }
    public function update2(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'end_date' => 'required',
            'remark' => '',
        ]);

        $operation = Operation::findOrFail($id);

        $operation->end_date = $request->end_date;
        $operation->remark = $request->remark;
        $operation->is_closed = 1;
        $operation->save();
        Session::flash('success', 'Operation Updated successfuly');
        return redirect()->route('operation.index');
    }
}

