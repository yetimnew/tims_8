<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverCreateRequest;
use App\Http\Requests\DriverUpdateRequest;
use App\Models\Operation\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{

    public function index()
    {
        $drivers = Driver::latest()->get();
        return view('operation.driver.index')->with('drivers', $drivers);
    }

    public function create()
    {
        $driver = new  Driver;
        return view('operation.driver.create')->with('driver', $driver);
    }

    public function store(DriverCreateRequest $request, Driver $driver)
    {
        $driver->create($request->all());

        Session::flash('success',  $driver->name .  ' registered successfully');
        return redirect()->route('driver.index');
    }

    public function show(Driver $driver)
    {
        return view('operation.driver.show')->with('driver', $driver);
    }

    public function edit(Driver $driver)
    {
        return view('operation.driver.edit')->with('driver', $driver);
    }

    public function update(DriverUpdateRequest $request,Driver $driver)
    {
        $driver->update($request->all());
        Session::flash('success',  $driver->name . ' updated successfully');
        return redirect()->route('driver.show', $driver->id);
    }


    public function destroy(Driver $driver)
    {
        $driver->delete();
        Session::flash('success', $driver->name . ' deleted successfully');
        return redirect()->route('driver.index');

        $driver = Driver::findOrFail($id);
        $driver_id =  $driver->driverid;
        $td = DriverTuck::where('driverid', '=', $driver_id)->first();
        // dd($td->plate);
        if ($td) {
            Session::flash('error', 'Not deleted ! ' . $driver->name . ' is attached to Plate ' . $td->plate);
            return redirect()->back();
        } else {
            $driver->status = 0;
            $driver->save();
            Session::flash('success', $driver->name . ' deleted successfuly');
            return redirect()->back();
        }
    }
    public function deactivate($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->status = 0;
        $driver->save();
        Session::flash('success', $driver->name . ' Deactivate successfuly');
        return redirect()->back();
    }
}
