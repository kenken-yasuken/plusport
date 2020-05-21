<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/user_detail.css">
</head>
<body>
    <div class="card card-one">
        <header>
        <div class="avatar">
            <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="ヤスケン" />
        </div>
        </header>

        <h3>{{ $nickName }}</h3>
        <div class="desc">
            <p>{{"※feelingカラム追加後、値をここへ表示する"}}</p>
        </div>
        <div class="fa-like">
            <form method="post" action="/reaction/like">
            @csrf
                <input type="hidden" name="to_user_id" value="{{ $toUserID }}">
                <button type="submit"><img class="fa fa-like" src="/images/like.png"></button>
            </form>
            <div class="clear"></div>
        </div>

        <footer>
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
        </footer>
    </div>
</body>
</html>
