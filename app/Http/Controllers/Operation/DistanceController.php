<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Operation\Distance;
use App\Models\Operation\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class DistanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $distances =  DB::select("SELECT distances.id, places.name as orgion, OperationPlace_1.name as destination , distances.km as distance
            FROM places AS OperationPlace_1
            RIGHT JOIN (distances LEFT JOIN places ON distances.origin_id=places.id)
             ON OperationPlace_1.id = distances.destination_id");

            return DataTables::of($distances)
                ->addColumn('details', function ($distances) {
                    $button = '<a href="' . route('distance.show', $distances->id) . '"> <i class="fa fa-edit"></a>';
                    return $button;
                })
                ->rawColumns(['details'])
                ->make(true);
        }
        return view('operation.distance.index');
    }

    public function create(Distance $distance)
    {
        $places = Place::orderBy('name')->get();
        return view('operation.distance.create')
            ->with('distance', $distance)
            ->with('places', $places);
    }
    public function show(Distance $distance)
    {
        dd( $distance->origins());
        //  $dd = Distance::findOrFail($id);
        // $distances =  DB::select("SELECT
        // distances.id, places.name as orgion,
        //  zones.name as zones,
        //  woredas.name as woreda,
        //   OperationPlace_1.name as destination ,
        //    distances.km as distance
        // FROM places AS OperationPlace_1
        // RIGHT JOIN (distances LEFT JOIN places ON distances.origin_id=places.id)
        //  ON OperationPlace_1.id = distances.destination_id
        // LEFT JOIN woredas ON OperationPlace_1.woreda_id=woredas.id
        // LEFT JOIN zones ON woredas.zone_id=zones.id
        //   where distances.id = $dd->id ");
        // $distancesss =  collect($distances);
        // $distance = $distancesss->first();
        return view('operation.distance.show')
            ->with('distance', $distance);
    }


    public function store(Request $request, Distance $distance)
    {
// dd($request->all());
        $this->validate($request, [
            'origin_id' => 'required',
            'destination_id' => 'required|different:origin_id',
            'km' => 'required',
        ]);

        $distances =  DB::table('distances')->where('origin_id', '=',  $request->origin_id)->Where('destination_id', '=',  $request->destination_id)->get();
        if ($distances->count() >= 1) {

            Session::flash('error', 'Distance  already registered!');
            return redirect()->back();
        } else {

            $distance->origin_id =  $request->origin_id;
            $distance->destination_id =  $request->destination_id;
            $distance->km = $request->km;
            $distance->status = 1;
            $distance->created_by = Auth::user()->id;
            $distance->updated_by = Auth::user()->id;

            $distance->save();
            Session::flash('success',  ' Distance registered successfully');
            return redirect()->route('distance.index');
        }
    }


    public function edit($id)
    {
        // dd();
        $distance = Distance::findOrFail($id);
        $distances = Distance::all();
        $places = Place::orderBy('name')->get();
        return view('operation.distance.edit')
            ->with('distance', $distance)
            ->with('places', $places)
            ->with('distances', $distances);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'origin' => 'required',
            'destination' => 'required|different:origin',
            'km' => 'required',
        ]);

        $distance = Distance::findOrFail($id);
        $distance->origin_id = $request->origin;
        $distance->destination_id = $request->destination;
        $distance->km = $request->km;

        $distance->save();
        Session::flash('success',  ' Distance Updated successfuly');
        return redirect()->route('distance');
    }

    public function destroy($id)
    {
        $distance = Distance::findOrFail($id);
        // dd($distance);
        $performance = Performance::where('orgion_id', '=', $distance->origin_id)
            ->where('destination_id', '=', $distance->destination_id)->count();
        if ($performance > 0) {
            Session::flash('error', 'UNABLE TO DELETE!!  Distance is registerd In ' . $performance . ' Performances');
            return redirect()->back();
        } else {
            $distance->delete();
            Session::flash('info', 'The distance b/n ' . $distance->origin_name . ' and ' . $distance->destination_name . ' deleted successfuly');
            return redirect()->route('distance');
        }
    }
    public function allDistance()
    {
        $distances =  Distance::where('status', 1)->orderBy('destination_name')
            ->get();

        return DataTables::of($distances)->addColumn('action', function () {
            '<a onclick="showData(. $distances->id.)" class="btn btn-sm"> show </a>' . '' . '<a onclick="showData(. $distances->id.)" class="btn btn-sm"> show </a>';
        })->make(true);
    }
}
