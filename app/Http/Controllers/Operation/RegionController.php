<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Operation\Region;
use App\Models\Operation\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::with('zones')->get();
        return view('operation.region.index')->with('regions', $regions);
    }

    public function create()
    {
        $region = new Region;
        return view('operation.region.create')->with('region', $region);
    }

    public function store(Request $request, Region $region)
    {
      $data =   $this->validate($request, [

           'name' => 'required|unique:regions|max:60',
            'comment' => ''
        ]);
        $region->create($request->all());
          Session::flash('success', 'region  registered successfully');
        return redirect()->route('region.index');
    }

    public function edit(Region $region)
    {
        $zones = Zone::where('region_id', '=', $region->id)->get();
        return view('operation.region.edit')
            ->with('zones', $zones)
            ->with('region', $region);
    }

    public function update(Request $request,Region $region)
    {
      $this->validate($request, [
             'name' => 'required|unique:regions,name,' . $region->id
        ]);
        $region->update($request->all());
        Session::flash('success', 'region updated successfully');
        return redirect()->route('region.index');
    }

    public function destroy(Region $region)
    {
        $region->delete();
        Session::flash('success', 'Region Deleted successfully!!');
        return redirect()->back();

        // $zones = Zone::where('region_id', '=', $region->id)->get();
        // if ($zones->count() >= 1) {
        //     Session::flash('error', 'UNABLE TO DELETE!!  Zone is registerd by this Region');
        //     return redirect()->back();
        // } else {
        //     $operation = Operation::where('region_id', '=', $region->id)->get();
        //     if ($operation->count() >= 1) {
        //         Session::flash('error', 'UNABLE TO DELETE!!  Operation is registered by this Region');
        //         return redirect()->back();
        //     } else {

        //         $region->delete();
        //         Session::flash('success', 'Region Deleted successfully!!');
        //         return redirect()->back();
        //     }
        // }
    }
}

