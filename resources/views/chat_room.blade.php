@extends('layouts.app')

@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
                <!-- todo: delete later -> 以下チャットルームview確認用のため -->
                <!-- @include('components.comment')
                @include('components.comment')
                @include('components.comment')
                @include('components.comment')
                @include('components.comment')
                @include('components.comment')
                @include('components.comment') -->
                aaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            </div>
        </div>
    </div>
</div>

<div class="comment-container row justify-content-center">
    <div class="input-group comment-area">
        <textarea class="form-control" placeholder="input massage" aria-label="With textarea"></textarea>
        <button type="input-group-prepend button" class="btn btn-outline-primary comment-btn">Submit</button>
    </div>
</div>

@endsection