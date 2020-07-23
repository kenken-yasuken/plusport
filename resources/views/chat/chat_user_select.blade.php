@extends('common.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>名前</th>
            <th>年齢</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th>{{$user->nickname}}</th>
            <td>{{$user->age}}</td>
            <td><a href="/chat/{{$user->id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection