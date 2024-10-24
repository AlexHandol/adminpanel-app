@extends('layout.layout')
@section('content')
    <main class="content">
        @include('includes.breadcrumb')
        <form action="{{ route('profile.view.update', $user->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-10">
                        <h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="text-left">
                            <img src="{{ $user->getImageURL() }}" class="avatar img-circle img-thumbnail" alt="avatar">
                            <input type="file" name="profile_image" class="text-center center-block file-upload mt-1"
                                style="font-size: 14px;">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h5>User Name</h5>
                                        </label>
                                        <input type="text" class="form-control" name="username" placeholder="Username"
                                            value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name">
                                            <h5>First name</h5>
                                        </label>
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="First Name" value="{{ $user->first_name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name">
                                            <h5>Last name</h5>
                                        </label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                            value="{{ $user->last_name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="phone">
                                            <h5>Phone</h5>
                                        </label>
                                        <input type="text" class="form-control" name="phone_number"
                                            placeholder="Phone Number" value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h5>Email</h5>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="You@Email.com" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h5>Password</h5>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password">
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
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
