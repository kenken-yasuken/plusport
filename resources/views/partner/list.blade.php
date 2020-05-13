@extends('common.app')

@section('content')
    @foreach( $partners as $partner )
        <div class= "index">
            <form action="/partner/detail">
                <input type="hidden" name="partner_id" value="{{ $partner->id }}">
                <input type="submit" value="{{ $partner->nickname }}">
            </form>
        </div>
    @endforeach
@endsection