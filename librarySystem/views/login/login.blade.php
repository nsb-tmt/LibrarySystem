<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
</head>
<body>
<div class="title">
        <h1>ログイン</h1>
    </div>

    <form action="/login/check" method="POST">
        @csrf
        ユーザーID：<input type="text" name="user" @if(isset($user)) value="{{$user}}" @endif required><br>
        パスワード：<input type="text" name="password" @if(isset($password)) value="{{$password}}" @endif required><br>
        <br>
        <button type="submit" id="orangeBtn">ログイン</button>
    </form>
    <div class="regBtn">
    <a class="bt-samp53" href="/login/register">登録</a>
    </div>
</body>
</html>
