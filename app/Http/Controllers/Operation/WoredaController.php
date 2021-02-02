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

class WoredaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $woredas =  DB::table('woredas')
                ->select(
                    'woredas.id as id',
                    'woredas.name as woredaName',
                    'zones.name as zoneaName',
                    'regions.name as regionsaName',
                    'woredas.comment as woredaComment'
                )
                // ->LEFTJOIN('woredas', 'woredas.id', '=', 'woredas.woreda_id')
                ->LEFTJOIN('zones', 'zones.id', '=', 'woredas.zone_id')
                ->LEFTJOIN('regions', 'regions.id', '=', 'zones.region_id')
                ->orderBy('woredas.name')
                ->get();

            return DataTables::of($woredas)
                ->addColumn('details', function ($woredas) {
                    $button = '<a href="' . route('woreda.show', $woredas->id) . '"> <i class="fa fa-edit"></a>';
                    return $button;
                })
                ->rawColumns(['details'])
                ->make(true);
        }
        return view('operation.woreda.index');
    }

    public function create(Woreda $woreda)
    {
        // $woreda = new Woreda();
        $regions = Region::all();
        $zones = Zone::with('region')->orderBy('name')->get();
        $woredas = Woreda::all();
        if ($regions->count() == 0) {
            Session::flash('info', 'You must have some Region  before attempting to create Truck');
            return redirect()->route('region.index');
        }

        return view('operation.woreda.create')
            ->with('woreda', $woreda)
            ->with('regions', $regions)
            ->with('zones', $zones)
            ->with('woredas', $woredas);
    }

    public function store(Request $request,Woreda $woreda )
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:woredas',
            'zone_id' => 'required',
            'comment' => '',
        ]);

        $woreda->create($request->all());
        Session::flash('success', 'woreda  registered successfully');
        return redirect()->route('woreda.index');
    }

    public function show(Woreda $woreda)
    {
        $places = Place::where('woreda_id', '=', $woreda->id)->orderBy('name')->get();
        return view('operation.woreda.show')
            ->with('places', $places)
            ->with('woreda', $woreda);
    }

    public function edit(Woreda $woreda)
    {
        $woredas = Woreda::with('zone')->get();
        $zones = Zone::with('region')->orderBy('name')->get();
        return view('operation.woreda.edit')
            ->with('zones', $zones)
            ->with('woreda', $woreda)
            ->with('woredas', $woredas);
    }

    public function update(Request $request, Woreda $woreda)
    {
        $this->validate($request, [
            'name' => 'required|unique:woredas,name,' . $woreda->id,
            'zone_id' => 'required',
            'comment' => '',
        ]);


        $woreda->update($request->all());
        Session::flash('success', 'woreda updated successfully');
        return redirect()->route('woreda.show',  $woreda->id);
    }

    public function destroy(Woreda $woreda)
    {
        $woreda->delete();
        Session::flash('success', 'woreda ' . $woreda->name . ' Deleted successfully!!');
        return redirect()->route('woreda.index');

        $place = Place::where('woreda_id', '=', $woreda->id)
            ->get();

        if ($place->count() == 0) {
            $woreda->delete();
            Session::flash('success', 'woreda ' . $woreda->name . ' Deleted successfully!!');
            return redirect()->route('woreda');
        } else {

            Session::flash('error', 'UNABLE TO DELETE!!  Woreda  ' .  $place->count() . ' Plces  registerd on this woreda');
            return redirect()->back();
        }
    }
}
