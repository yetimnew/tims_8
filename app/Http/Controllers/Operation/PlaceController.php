<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Operation\Place;
use App\Models\Operation\Region;
use App\Models\Operation\Woreda;
use App\Models\Operation\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $places =  DB::table('places')
                ->select(
                    'places.id as id',
                    'places.name as placeName',
                    'woredas.name as woredaName',
                    'zones.name as zoneaName',
                    'regions.name as regionsaName',
                    'places.comment as placeComment'
                )
                ->LEFTJOIN('woredas', 'woredas.id', '=', 'places.woreda_id')
                ->LEFTJOIN('zones', 'zones.id', '=', 'woredas.zone_id')
                ->LEFTJOIN('regions', 'regions.id', '=', 'zones.region_id')
                ->orderBy('places.name')
                ->get();

            return DataTables::of($places)
                ->addColumn('details', function ($places) {

                    $button = '<a href="' . route('place.show', $places->id) . '"> <i class="fa fa-edit"></a>';
                    return $button;
                })
                ->rawColumns(['details'])
                ->make(true);
        }
        return view('operation.place.index');
    }

    public function create(Place $place)
    {
        $regions = Region::all();
        $zones = Zone::all();
        $woredas = Woreda::orderBy('name')->get();
        if ( $woredas->count() == 0) {
            Session::flash('info', 'You must have some Woreda  before attempting to create Truck');
            return redirect()->route('woreda.index');
        }

        return view('operation.place.create')
            ->with('place', $place)
            ->with('regions', $regions)
            ->with('zones', $zones)
            ->with('woredas', $woredas);
    }

    public function store(Request $request, Place $place)
    {
        // dd($request->all());
        $this->validate($request, [
            'woreda_id' => 'required',
            'name' => 'required|unique:places',
            'comment'=>''
        ]);

        $place->create($request->all());
        Session::flash('success', 'place  registered successfully');
        return redirect()->route('place.index');
    }

    public function show(Place $place)
    {
        // $performance_origion =  Performance::where('orgion_id', '=', $place->id)->count();
        // $performance_destination =  Performance::where('destination_id', '=', $place->id)->count();
        // $osperformance_origion =  Outsource_performance::where('orgion_id', '=', $place->id)->count();
        // $osperformance_destination =  Outsource_performance::where('destination_id', '=', $place->id)->count();
        // dd($performance);
        return view('operation.place.show')
            // ->with('performance_origion', $performance_origion)
            // ->with('performance_destination', $performance_destination)
            // ->with('osperformance_origion', $osperformance_origion)
            // ->with('osperformance_destination', $osperformance_destination)
            ->with('place', $place);
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        $woredas = Woreda::with('zone')->orderBy('name')->get();
        $zones = Zone::with('region')->get();
        $regions = Region::all();
        return view('operation.place.edit')
            ->with('zones', $zones)
            ->with('regions', $regions)
            ->with('place', $place)
            ->with('woredas', $woredas);
    }

    public function update(Request $request, Place $place)
    {
        $this->validate($request, [
            'woreda_id' => 'required',
            'name' => 'required|unique:places,name,' . $place->id,
            'comment'=>''
        ]);
        $place->update($request->all());
        Session::flash('success', 'place updated successfully');
        return redirect()->route('place.index');
    }

    public function destroy( Place $place)
    {
        $place->delete();
        Session::flash('success', 'Place Deleted successfully!!');
        return redirect()->route('place.index');

        // $distance = Distance::where('origin_id', '=', $place->id)
        //     ->orwhere('destination_id', '=', $place->id)
        //     ->get();
        // if ($distance->count() > 0) {
        //     Session::flash('error', 'UNABLE TO DELETE!!  Distance is registerd by this place');
        //     return redirect()->back();
        // } else {
        //     $performance = Performance::where('orgion_id', '=', $place->id)
        //         ->orwhere('destination_id', '=', $place->id)
        //         ->count();

        //     $osperformance = Outsource_performance::where('orgion_id', '=', $place->id)
        //         ->orwhere('destination_id', '=', $place->id)
        //         ->count();
        //     // dd($performance);
        //     if ($performance +  $osperformance <= 0) {
        //         $place->delete();
        //         Session::flash('success', 'Place Deleted successfully!!');
        //         return redirect()->route('place');
        //     } else {
        //         Session::flash('error', 'UNABLE TO DELETE!!  Performance is registerd by this place');
        //         return redirect()->back();
        //     }
        // }
    }
    public function allPlaces()
    {
        // $places = Place::with('woreda')->active()->get();
        $places =  DB::table('places')
            ->select(
                'places.id as id',
                'places.name as placeName',
                'woredas.name as woredaName',
                'zones.name as zoneaName',
                'regions.name as regionsaName',
                'places.comment as placeComment'
            )
            ->LEFTJOIN('woredas', 'woredas.id', '=', 'places.woreda_id')
            ->LEFTJOIN('zones', 'zones.id', '=', 'woredas.zone_id')
            ->LEFTJOIN('regions', 'regions.id', '=', 'zones.region_id')
            // ->where('outsource_performances.operation_id', $operation->id)
            ->orederBy('placeName');
        // ->get();

        // $places = DB::Place::with('woreda')->active()->get();
        return DataTables::of($places)->make(true);
    }
}

