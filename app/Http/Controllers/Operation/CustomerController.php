<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Operation\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::active()->get();
        return view('operation.customer.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer;
        return view('operation.customer.create')->with('customer', $customer);
    }

    public function store(Request $request, Customer $customer)
    {
        $data = request()->validate([
            'name' => 'required|unique:customers,name',
            'address' => 'required',
            'office_number' => '',
            'mobile' => '',
            'remark' => '',

        ]);
        $customer->create($request->all());
        Session::flash('success', 'customer  registered successfully');
        return redirect()->route('customer.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('operation.customer.edit')
            ->with('customer', $customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|unique:customers,name,' . $customer->id,
            'address' => 'required',
            'office_number' => '',
            'mobile' => '',
            'remark' => '',

        ]);

        $customer->update($request->all());
        Session::flash('success', 'customer updated successfully');
        return redirect()->route('customer.index');
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();
        Session::flash('success', 'Customer Deleted Successfully!! ');
        return redirect()->back();

        // $operation = Operation::where('customer_id', '=', $customer->id)->first();
        // if (isset($operation)) {
        //     // $customer->status = 0;
        //     Session::flash('error', 'UNABLE TO DELETE !! Customer ');
        //     return redirect()->back();
        // } else {
        //     $customer->delete();
        //     Session::flash('success', 'Customer Deleted Successfuly!! ');
        //     return redirect()->back();
        // }
    }
}
