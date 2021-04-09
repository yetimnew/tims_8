<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverCreateRequest;
use App\Http\Requests\DriverUpdateRequest;
use App\Models\Operation\Driver;
use App\Models\Operation\DriverTruck;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{

    public function index()
    {
        session(
            ['key' => 'Driver',
            'route' =>route('driver.index')]
        );
        return view('operation.driver.index')->with('drivers',  Driver::latest()->get());
    }

    public function create()
    {
        return view('operation.driver.create')->with('driver', new  Driver);
    }

    public function store(DriverCreateRequest $request, Driver $driver)
    {
        $driver->create($request->validated());
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

        $td = DriverTruck::where('driver_id', '=', $driver->id)->first();
        if ($td) {
            Session::flash('error', 'Not deleted ! ' . $driver->name . ' is attached to Plate ' . $td->plate);
            return redirect()->back();
        } else {
            $driver->status = 0;
            $driver->save();
            Session::flash('success', $driver->name . ' deleted successfully');
            return redirect()->back();
        }
    }
    public function deactivate(Driver $driver)
    {
        $driver->status = 0;
        $driver->save();
        Session::flash('success', $driver->name . ' Deactivate successfully');
        return redirect()->back();
    }
    public function activate(Driver $driver)
    {
        $driver->status = 1;
        $driver->save();
        Session::flash('success', $driver->name . ' Activated successfully');
        return redirect()->back();
    }
}
