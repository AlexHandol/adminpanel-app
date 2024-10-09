@extends('layout.layout')
@section('content')
    <main class="content">
        @include('includes.breadcrumb')
        @include('includes.success-message')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        {{-- <div class="dataTables_length" id="datatables-reponsive_length" style="font-size: 12px;">
                            აჩვენე <label>
                                <select id="limiter" name="datatables-reponsive_length" aria-controls="datatables-reponsive"
                                    class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label> ჩანაწერი
                        </div> --}}
                        <div class="dataTables_length" id="datatables-reponsive_length" style="font-size: 12px;">
                            აჩვენე <label>
                                <select id="limiter" name="limit" aria-controls="datatables-reponsive"
                                    class="form-select form-select-sm" onchange="updateLimit()">
                                    <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                                </select>
                            </label> ჩანაწერი
                        </div>
                    </div>
                    @include('includes.search-bar')
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table responsive dataTable no-footer dtr-inline collapsed"
                                aria-describedby="datatables-reponsive_info">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Phone Number</th>
                                        <th>GPS ID</th>
                                        <th>SIM Number</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if ($accounts->isNotEmpty())
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->full_name }}</td>
                                                <td>{{ $account->phone_number }}</td>
                                                <td>{{ $account->gps_id }}</td>
                                                <td>{{ $account->sim_number }}</td>
                                                <td>{{ $account->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $account->tariffs->tariff_name }}</td>
                                                <td>{{ $account->statuses->status_name }}</td>
                                                <td>
                                                    <a href="{{ route('accounts.view.show', $account->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">No matches found.</td>
                                        </tr>
                                    @endif --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="row table-footer">
                        <div class="col-sm-12 col-md-5 pagination-container">
                            {{ $accounts->withQueryString()->links() }}
                        </div>
                    </div> --}}



                    {{-- AJAX AUTO SEARCH AND LIMIT --}}

                    <div class="row table-footer">
                        <div class="col-sm-12 col-md-6">
                            <div id="entries-summary" class="d-flex justify-content-start align-items-center">
                                Showing<span id="start-entry" style="margin: 0 2px;"></span> to <span id="end-entry" style="margin: 0 2px;"></span> of <span
                                    id="total-entries" style="margin: 0 2px;"></span> entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 pagination-container">
                            <!-- Pagination links will be dynamically rendered here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
