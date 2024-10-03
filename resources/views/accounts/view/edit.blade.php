@extends('layout.layout')
@section('content')
    <main class="content">
        @include('includes.breadcrumb')
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-11 ">
                    <div class="card g-2">
                        <div class="card-body">
                            <form action="{{ route('accounts.view.update', $account->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control mt-1" placeholder="Full Name"
                                        value="{{ $account->full_name }}">
                                    @error('full_name')
                                        <span class="d-block fs-6 text-danger mt-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control mt-1"
                                        placeholder="Phone Number" value="{{ $account->phone_number }}">
                                    @error('phone_number')
                                        <span class="d-block fs-6 text-danger mt-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label>GPS ID</label>
                                    <input type="number" name="gps_id" class="form-control mt-1" placeholder="GPS ID"
                                        value="{{ $account->gps_id }}">
                                    @error('gps_id')
                                        <span class="d-block fs-6 text-danger mt-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label>Sim Number</label>
                                    <input type="number" name="sim_number" class="form-control mt-1"
                                        placeholder="Sim Number" value="{{ $account->sim_number }}">
                                    @error('sim_number')
                                        <span class="d-block fs-6 text-danger mt-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-1">
                                    <label>Tariff</label>
                                    <select name="tariff_id" class="form-control mt-1">
                                        <option value="{{ $account->tariff_id }}">-{{ $account->tariffs->tariff_name }}
                                        </option>
                                        @foreach ($tariffs as $tariff)
                                            <option value="{{ $tariff->id }}">{{ $tariff->tariff_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sim_number')
                                        <span class="d-block fs-6 text-danger mt-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
