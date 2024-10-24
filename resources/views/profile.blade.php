@extends('layout.layout')
@section('content')
    <main class="content">
        @include('includes.breadcrumb')
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10">
                    <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="text-left">
                        <img src="{{ $user->getImageURL() }}" class="avatar img-circle img-thumbnail" alt="avatar">
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h5>User Name : {{ $user->username }}</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h5>First Name : {{ $user->first_name }}</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h5>Last Name : {{ $user->last_name }}</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h5>Phone Number : {{ $user->phone_number }}</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h5>Email : {{ $user->email }}</h5>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="password2">
                                            <h5>Verify</h5>
                                        </label>
                                        <input type="password" class="form-control" name="password2" id="password2"
                                            placeholder="password2" title="enter your password2.">
                                    </div>
                                </div> --}}
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <a href="{{ route('profile.view.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
