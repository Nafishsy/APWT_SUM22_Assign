@extends('layouts.userBar')

@section('content')

    <center>
        <h4>Username: {{$user->name}}</h4>
        <h4>Email: {{$user->email}}</h4>
        <h4>Role: {{$user->type}}</h4>
    </center>

@endsection