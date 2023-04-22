<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報の登録</title>
</head>
<body>
<div class="title">
        <h1>新規ユーザー登録</h1>
    </div>
    <form action="/login/save" method="post">
        @csrf
        ユーザーID：<input type="text" name="user"><br>
        パスワード：<input type="text" name="password"><br>
        <button type="submit" id="orangeBtn">登録</button>
    </form>
    <div class="regBtn">
    <a class="bt-samp53" href="/">ログイン</a>
    </div>
    <!--  エラーメッセージ表示 -->
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @isset($errMsg)
        <p>{{$errMsg}}</p>
    @endisset

</body>
</html>