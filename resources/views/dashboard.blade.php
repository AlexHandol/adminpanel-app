@extends('layout.layout')

@section('content')
    <h1>Hello, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
@endsection
