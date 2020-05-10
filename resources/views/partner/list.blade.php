@extends('common.app')

@section('content')
    @foreach( $partners as $partner )

    <div class= "index">
        <p>{{ $partner->name }}</p>
    </div>
    @endforeach
@endsection