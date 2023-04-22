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
  width: 100%;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 30px;
  position: fixed;
  top: 0;
  box-sizing: border-box;

}
#header .logo img{
  mix-blend-mode: multiply;
  height: auto;
  justify-content: space-between;
}

/* nav */
#header .nav__list {
  list-style: none;
  display: flex;
}
#header .nav__item a {
    color: #775435;
    font-weight: lighter;
  padding: 10px 15px;

}
#header .nav__item a:hover {
  text-decoration: underline;
}
    </style>

</head>
<body>
    @section('main')
    @show
    <header id="header">
  <h1 class="logo"><img src="../../../../img/kumasan.png" alt=""></h1>
  <nav>
    <ul class="nav__list">
    <li class="nav__item">{{$user}}ちゃんがログイン中</a></li>
    <li class="nav__item"><a href="/myPage/myPage">まいぺーじにもどる</a></li>
    <li class="nav__item"><a href="/db/book">本をとーろく</a></li>
    <li class="nav__item"><a href="/review/selectTop">本をさがす</a></li>
    <li class="nav__item"><a href="/login/logout">ログアウト</a></li>

    </ul>
  </nav>
</header>
    </div>
  </div>
</div>
</body>
</html>