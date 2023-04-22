<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('css')
    <style>
a {
  text-decoration: none;
}
/* header */
#header {
  background-color:white;
  width: 100%;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 30px;
  position: fixed;
  top: 0;
  box-sizing: border-box;

}/* nav */
#header .nav__list {
  list-style: none;
  display: flex;
}
#header .nav__item a {
  font-weight: lighter;
  padding: 10px 15px;

}
#header .nav__item a:hover {
  text-decoration: underline;
}

#myTitle{
  font-size:30px;
}
</style>
</head>
<body>
    @section('main')
    @show
  <header id="header">
  <div id="myTitle"><a href="/myPage/myPage">書籍レビューサイト</a></div>
  <nav>
    <ul class="nav__list">
      <li class="nav__item">ユーザー：{{$user}}</a></li>
      <li class="nav__item"><a href="/myPage/myPage">マイページ</a></li>
      <li class="nav__item"><a href="/db/book">書籍登録</a></li>
      <li class="nav__item"><a href="/review/selectTop">レビュー</a></li>
      <li class="nav__item"><a href="/login/logout">ログアウト</a></li>
    </ul>
  </nav>
</header>
    </div>
  </div>
</div>
</body>
</html>