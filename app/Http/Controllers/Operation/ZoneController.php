<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Operation\Region;
use App\Models\Operation\Woreda;
use App\Models\Operation\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ZoneController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $zones =  DB::table('zones')
                ->select(
                    'zones.id as id',
                    'zones.name as zoneName',
                    'regions.name as regionsaName',
                    'zones.comment as zoneComment',
                )
                // ->LEFTJOIN('zones', 'zones.id', '=', 'zones.woreda_id')
                ->LEFTJOIN('regions', 'regions.id', '=', 'zones.region_id')
                ->orderBy('zones.name')
                ->get();

 return DataTables::of($zones)
                ->addColumn('details', function ($zones) {
                    $button = '<a href="' . route('zone.show', $zones->id) . '"> <i class="fa fa-edit"></a>';
                    return $button;
                })
                ->rawColumns(['details'])
                ->make(true);
        }
        return view('operation.zone.index');
    }

    public function create()
    {
        $zone = new Zone();
        $regions = Region::all();
        $zones = Zone::all();
        $zones = zone::all();
        if ($regions->count() == 0) {
            Session::flash('info', 'You must have some Region  before attempting to create Truck');
            return redirect()->route('region.create');
        }

        return view('operation.zone.create')
            ->with('zone', $zone)
            ->with('regions', $regions)
            ->with('zones', $zones)
            ->with('zones', $zones);
    }

    public function store(Request $request, Zone $zone)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:zones',
            'region_id' => 'required',
        ]);

        $zone->create($request->all());
        Session::flash('success', 'zone  registered successfully');
        return redirect()->route('zone.index');
    }

    public function show( Zone $zone)
    {
        $woredas = Woreda::where('zone_id', '=', $zone->id)
            ->orderBy('name')->get();

        return view('operation.zone.show')
            ->with('woredas', $woredas)
            ->with('zone', $zone);
    }

    public function edit(Zone $zone)
    {
        $zones = Zone::with('region')->get();
        $regions = Region::all();
        // dd($zones);
        return view('operation.zone.edit')
            ->with('zones', $zones)
            ->with('regions', $regions)
            ->with('zone', $zone);
    }

    public function update(Request $request,Zone $zone)
    {
        $this->validate($request, [
            'name' => 'required',
            'region_id' => 'required',
        ]);

        $zone->update($request->all());
        Session::flash('success', 'zone updated successfully');
        return redirect()->route('zone.show', $zone->id);
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        Session::flash('success', 'zone ' . $zone->name . ' Deleted successfully!!');
        return redirect()->route('zone.index');

        // $zone = zone::findOrFail($id);
        // $woreda = Woreda::where('zone_id', '=', $zone->id)
        //     ->get();
        // // dd($woreda);

        // if ($woreda->count() == 0) {
        //     $zone->delete();
        //     Session::flash('success', 'zone ' . $zone->name . ' Deleted successfully!!');
        //     return redirect()->route('zone');
        // } else {

        //     Session::flash('error', 'UNABLE TO DELETE!!  zone  ' .  $woreda->count() . ' Plces  registerd on this zone');
        //     return redirect()->back();
        // }
    }
}
