@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
        <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td><a href="/chat/{{$user->id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection