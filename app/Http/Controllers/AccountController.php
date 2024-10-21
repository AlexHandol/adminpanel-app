<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Tariff;
use App\Models\Status;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Account $account)
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
        $tariffs = Tariff::all();
        $statuses = Status::all();

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
        ], compact('account', 'tariffs', 'statuses'));
    }
    // AJAX AUTO SEARCH AND LIMIT

    public function search(Request $request)
    {
        $limit = $request->get('limit', 10);
        $page = $request->get('page', 1);

        // Start building the query using the Account model
        $accounts = Account::with('statuses', 'tariffs')->orderBy('created_at', 'DESC');

        // Apply search logic
        if ($request->has('search')) {
            $searchTerm = $request->get('search', '');

            $accounts = $accounts->where(function ($query) use ($searchTerm) {
                $query->where('full_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('phone_number', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gps_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('sim_number', 'like', '%' . $searchTerm . '%');
            });
        }

        // Apply filter logic
        if ($request->has('status_id')) {
            $statusId = $request->get('status_id');
            if ($statusId != '') {
                $accounts = $accounts->where('status_id', $statusId);
            }
        }
        // For example, filtering by tariff_id:
        if ($request->has('tariff_id')) {
            $tariffId = $request->get('tariff_id');
            if ($tariffId != '') {
                $accounts = $accounts->where('tariff_id', $tariffId);
            }
        }
        // If you need to filter by created_at date, add that here
        if ($request->has('create-date')) {
            $createDate = $request->get('create-date');
            if ($createDate != '') {
                $accounts = $accounts->whereDate('created_at', $createDate);
            }
        }

        // Paginate the results
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
        $comments = $account->comments()->orderBy('created_at', 'DESC')->paginate(5);

        return view('accounts.view.show', compact('account', 'comments'));
    }

    public function edit(Account $account)
    {
        $tariffs = Tariff::all();
        $statuses = Status::all();
        return view('accounts.view.edit', compact('account', 'tariffs', 'statuses'));
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
        $account->status_id = request()->get('status_id');
        $account->save();

        return redirect()->route('accounts.view.show', $account->id)->with('success', 'Account updated successfully!');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully!');
    }
}
