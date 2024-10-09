<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Tariff;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        // $accounts = Account::with('statuses')->with('tariffs')->orderBy('created_at', 'DESC');

        // if (request()->has('search')) {
        //     $searchTerm = request()->get('search', '');

        //     $accounts = $accounts->where(function ($query) use ($searchTerm) {
        //         $query->where('full_name', 'like', '%' . $searchTerm . '%')
        //             ->orWhere('gps_id', 'like', '%' . $searchTerm . '%');
        //     });
        // }

        // return view('accounts', [
        //     'accounts' => $accounts->paginate(10)
        // ]);

        // AJAX AUTO SEARCH AND LIMIT


        // Set default limit
        $limit = request()->get('limit', 10);

        $accounts = Account::with('statuses', 'tariffs')->orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $searchTerm = request()->get('search', '');

            $accounts = $accounts->where(function ($query) use ($searchTerm) {
                $query->where('full_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gps_id', 'like', '%' . $searchTerm . '%');
            });
        }

        return view('accounts', [
            'accounts' => $accounts->paginate($limit)
        ]);
    }
    // AJAX AUTO SEARCH AND LIMIT

    public function search(Request $request)
    {
        $limit = $request->get('limit', 10);
        $page = $request->get('page', 1);

        $accounts = Account::with('statuses', 'tariffs')->orderBy('created_at', 'DESC');

        if ($request->has('search')) {
            $searchTerm = $request->get('search', '');

            $accounts = $accounts->where(function ($query) use ($searchTerm) {
                $query->where('full_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gps_id', 'like', '%' . $searchTerm . '%');
            });
        }

        $paginatedAccounts = $accounts->paginate($limit, ['*'], 'page', $page);

        return response()->json($paginatedAccounts);
    }

    public function register()
    {
        $tariffs = Tariff::all();
        return view('registration', compact('tariffs'));
    }

    public function store()
    {
        request()->validate([
            'full_name' => 'required|string|regex:/^[\p{L} ]+$/u',
            'phone_number' => 'required|integer|digits:9',
            'gps_id' => 'required|integer|digits:10',
            'sim_number' => 'required|integer|digits:9',
            'tariff_id' => 'required|exists:tariffs,id'
        ], [
            'full_name.required' => 'Full Name is required',
            'full_name.regex' => 'Full Name can only contain letters and spaces.'
        ]);

        $account = Account::create(
            [
                'full_name' => request()->get('full_name', ''),
                'phone_number' => request()->get('phone_number', ''),
                'gps_id' => request()->get('gps_id', ''),
                'sim_number' => request()->get('sim_number', ''),
                'tariff_id' => request()->get('tariff_id'),
            ]
        );

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
    }

    public function show(Account $account)
    {
        return view('accounts.view.show', compact('account'));
    }

    public function edit(Account $account)
    {
        $tariffs = Tariff::all();
        return view('accounts.view.edit', compact('account', 'tariffs'));
    }

    public function update(Account $account)
    {
        request()->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required|integer|digits:9',
            'gps_id' => 'required|integer|digits:10',
            'sim_number' => 'required|integer|digits:9'
        ]);

        $account->full_name = request()->get('full_name', '');
        $account->phone_number = request()->get('phone_number', '');
        $account->gps_id = request()->get('gps_id', '');
        $account->sim_number = request()->get('sim_number', '');
        $account->tariff_id = request()->get('tariff_id');
        $account->save();

        return redirect()->route('accounts.view.show', $account->id)->with('success', 'Account updated successfully!');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully!');
    }
}
