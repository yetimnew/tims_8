<?php

namespace App\Http\Controllers\Operation;

use Illuminate\Http\Request;
use App\Models\Operation\Truck;
use App\Http\Controllers\Controller;
use App\Models\Operation\TruckModel;
use Illuminate\Support\Facades\Session;

class TruckModelController extends Controller
{
    public function index()
    {
        return view('operation.truck_model.index')
        ->with('truck_models', TruckModel::get());
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
        // dd(Truck::first());
        $truck = Truck::where('truck_model_id', '=', $truck_model->id)->first();
        if (isset($truck)) {
            Session::flash('error', 'unable to delete vehecle Model Assigned to Plate  ' . $truck->plate);
            return redirect()->back();
        } else {
            $truck_model->delete();
            Session::flash('success', 'vehecle Model  deleted successfully');
            return redirect()->back();
        }

    }
}
