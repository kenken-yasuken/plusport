@extends('layouts.app')

@section('content')
    @foreach( $partners as $partner )

    <div class= "index item">
        <ul>
            <li>
                <p>{{ $partner->name }}</p>
            </li>
        </ul>
    </div>
    @endforeach
@endsection