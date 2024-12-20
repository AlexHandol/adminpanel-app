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
                                <tbody id="tbody">
                                    {{-- Automatically Fetching From JavaScript--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row table-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_info" id="dataTables_info" role="status" aria-live="polite">
                                    Showing <span id="start-entry"></span> to <span id="end-entry"></span> of <span
                                        id="total-entries"></span> entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5 pagination-container">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTables_paginate">
                                    <!-- Pagination links will be dynamically rendered here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('accounts.modal.filter-account-modal')
    </main>
@endsection
