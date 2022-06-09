@extends('layouts.userBar')
    @section('content')

   <h1>Current User: {{$value = session('c_id')}}</h1> 
<table border="1" width='100%'>
    <tr>
        <th>Name </th>
        <th>Email </th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td><a href="{{route('User.details',['id'=>$user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
        </tr>
    @endforeach
</table>
@endsection