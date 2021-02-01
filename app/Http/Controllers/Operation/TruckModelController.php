<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Operation\TruckModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TruckModelController extends Controller
{
    public function index()
    {
        $truck_models = TruckModel::get();
        return view('operation.truck_model.index')
        ->with('truck_models', $truck_models);
    }

    public function create()
    {
        return view('operation.truck_model.create');
    }

    public function store(Request $request)
    {
      $data =   $this->validate($request, [
            'name' => 'required|unique:truck_models',
            'company' => '',
            'production_date' =>  'nullable|date',
            'comment' =>  '',
        ]);
        TruckModel::create($data);

        Session::flash('success', 'Truck Model  registered successfully');
        return redirect()->route('truck_model.index');
    }

    public function edit(TruckModel $truck_model)
    {
        return view('operation.truck_model.edit')->with('truck_model', $truck_model);
    }

    public function update(Request $request,$id)
    {
        // dd( $truck_model->id);
      $data =   $this->validate($request, [
        'name' => 'required|unique:truck_models,name, ' . $id,
        'company' => '',
        'production_date' =>  'nullable|date',
        'comment' =>  '',
        ]);

       TruckModel::findOrFail($id)->update($data);
        Session::flash('success', 'Truck Model  Updated successfully');
        return redirect()->route('truck_model.index');
    }


    public function destroy(TruckModel $truck_model)
    {
        // dd($truck_model);
        // $truck = Truck::where('vehecletype_id', '=', $truck_model->id)->first();
        // if (isset($truck)) {
        //     Session::flash('error', 'unable to delete vehecle Model Assigned to Plate  ' . $truck->plate);
        //     return redirect()->back();
        // } else {
        //     $vehecletype->delete();
        //     Session::flash('success', 'vehecle Model  deleted successfuly');
        //     return redirect()->back();
        // }
        $truck_model->delete();
        Session::flash('success', 'Truck Model  deleted successfully');
            return redirect()->back();
    }
}
