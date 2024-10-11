@extends('layout.layout')
@section('content')
    <main class="content">
        @include('includes.breadcrumb')
        @include('includes.success-message')
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12 col-md-6">
                    <button type="button" class="btn btn-warning btn-sm mb-3" title="ანგარიშის წაშლა" data-bs-toggle="modal"
                        data-bs-target="#filterAccountModalLabel">
                        <i class="fa fa-filter"></i>
                        <strong>FILTER</strong>
                    </button>
                </div>
                <div class="row">
                    @include('includes.limiter')
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
                                        <th>Tariff</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($accounts->isNotEmpty())
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
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row table-footer">
                        <div class="col-sm-12 col-md-5 pagination-container">
                            {{ $accounts->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('accounts.modal.filter-account-modal')
    </main>
@endsection
