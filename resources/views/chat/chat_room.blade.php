@extends('common.app')

@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
                <div id="comment-data"></div>
            </div>
        </div>
    </div>
</div>

<form method="POST" action='ChatController@addComment'>
    @csrf
    <input id="partner_id" type="hidden" name="partner_id" value='{{ $partnerID }}'>
    <input id="login_id" type="hidden" name="login_id" value='{{ $loginID }}'>

    @if ( $errors->any() )
        <div class= "error-container">
            <ul>
                @foreach ( $errors->all() as $error )
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="comment" placeholder="push massage (shift + Enter)"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>

@endsection

@section('js')
    <script src="{{ asset('js/comment.js') }}"></script>
@endsection