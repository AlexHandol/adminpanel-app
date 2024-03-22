<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);

        // if (request()->has('search')) {
        //     $customers = $customers->where('content', 'like', '%' . request()->get('search', '') . '%');
        // }

        $data = [
            'customers' => $customers,
        ];

        if ($customers->isEmpty()) {
            $data['notFoundMessage'] = 'No Records Found';
        }

        return view('customers', $data);
    }

    public function store()
    {
        request()->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required|integer|digits:9',
            'gps_id' => 'required|integer|digits:10',
            'sim_number' => 'required|integer|digits:9'
        ]);

        $customer = Customer::create(
            [
                'full_name' => request()->get('full_name', ''),
                'phone_number' => request()->get('phone_number', ''),
                'gps_id' => request()->get('gps_id', ''),
                'sim_number' => request()->get('sim_number', ''),
            ]
        );
        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function show(Customer $customer)
    {
        return view('customers.view.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
