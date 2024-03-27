@extends('layout.layout')
@section('content')
    <main class="content">
        @include('includes.breadcrumb')
        @include('includes.success-message')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatables-reponsive_length" style="font-size: 12px;">
                            აჩვენე <label>
                                <select id="limiter" name="datatables-reponsive_length" aria-controls="datatables-reponsive"
                                    class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label> ჩანაწერი
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="d-flex justify-content-end ">
                            <form class="input-group-sm" role="search">
                                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                            </form>
                            <button class="btn btn-secondary btn-sm ms-1 mb-1" type="button" id="button-addon2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
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
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->full_name }}</td>
                                            <td>{{ $customer->phone_number }}</td>
                                            <td>{{ $customer->gps_id }}</td>
                                            <td>{{ $customer->sim_number }}</td>
                                            <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $customer->status_name }}</td>
                                            <td>
                                                <a href="{{ route('customers.view.show', $customer->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @isset($notFoundMessage)
                                        <td colspan="10" class="text-center"><i class="fa-solid fa-circle-info"></i>
                                            {{ $notFoundMessage }}</td>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row table-footer">
                        <div class="col-sm-12 col-md-5 pagination-container">
                            {{-- Pagination goes here --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
