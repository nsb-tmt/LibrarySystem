<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規書籍登録</title>
</head>
<body>
@extends('layouts.baseMyPage')
@section('title','書籍登録')
@section('main')
<br><br><br><br><br>


<h1>未登録書籍の登録</h1>
<p>未登録の書籍を登録することができます。<br>登録した書籍はレビューページでレビューを書くことができます。</p>
<hr>
<h2>ISBN番号検索</h2>
<p>10桁、13桁のISBN番号で書籍を検索します。</p>
ISBN:<input id="getIsbn" type="text" name="isbn" value="">
<br>
<br>
<button id="getBookInfo">検索</button><br>
<hr>
<h2>書籍名・著者名検索</h2>
<p>検索した書籍の登録を押下するとISBN検索窓に番号が自動入力され、書籍が検索されます。<br>
ISBN番号が存在してもOpenBDにデータが存在しないこともあるようです。</p>
書籍名：<input id="getTitle" type="text" name="isbn" value=""><br>
著者名：<input id="getAuthor" type="text" name="isbn" value=""><br>
<br>
<button id="getGoogleInfo">検索</button><br>
<hr>
@isset($errMsg)
  <p id="errorPHP" style="color:#ff6347">{{$errMsg}}</p>
@endisset
<p id="errorJS"></p><!-- JSのエラーはここに表示　-->
@isset($success)
<!-- -->
<div id="success">
  <hr>
  <p>書籍を登録しました</p>
  <table class="table">
    <tr><th>表紙</th><th>ISBN番号</th><th>書籍名</th><th>著者</th><th>出版社</th><th>価格</th></tr>
    <tr>
      <td><img src="{{$cover}}" alt="" id="thumbnail" style="width:80%"></td>
      <td>{{$isbn}}</td>
      <td>{{$title}}</td>
      <td>{{$author}}</td>
      <td>{{$publisher}}</td>
      <td>{{$price}}</td>
    </tr>
  </table>
    <p>書籍説明：{{$description}}</p>
  <br>
  <br>
</div>
@endisset
<div id="searchContainer"><!--　JSでの検索結果を格納　-->
</div>
<div id="display" style="display:none">
  <div id="p-container">
    <table class="table">
      <tr><th>表紙</th><th>ISBN番号</th><th>書籍名</th><th>著者</th><th>出版社</th><th>価格</th></tr>
      <tr>
        <td><img src="#" alt="" id="thumbnail" style="width:80%"></td>
        <td><span id="p-isbn"></span></td>
        <td><span id="p-title"></span></td>
        <td><span id="p-author"></span></td>
        <td><span id="p-publisher"></span></td>
        <td><span id="p-price"></span></td>
      </tr>
    </table>
    <div class="description">
      <p style="width:30%">書籍説明：<span  id="p-description"></span></p>
    </div>
  </div>
  <hr>
  <h2>この書籍情報で登録しますか</h2>
  <form enctype="multipart/form-data" action="/db/store" method="post">
        @csrf
        <!--各種データの表示-->
      <div id="input" style="display:none;">
      <p>情報が欠けている箇所は編集出来ます。</p>
        <input id="cover" type="text" name="cover" value="" style="display:none" readonly>
        <table class="table">
          <tr id="coverFile" style="display:none"><td scope="col">表紙</td><td><input type="file" name="coverFile" ></td></tr>
          <tr><td scope="col">ISBN番号</td><td><input id="isbn" type="text" name="isbn" value="" readonly></td></tr>
          <tr><td scope="col">書籍名</td><td><input id="title" type="text" name="title" value="" readonly></td></tr>
          <tr><td scope="col">著者</td><td><input id="author" type="text" name="author" value="" readonly></td></tr>
          <tr><td scope="col">出版社</td><td><input id="publisher" type="text" name="publisher" value=""readonly></td></tr>
          <tr><td scope="col">価格</td><td><input id="price" type="text" name="price" value="" readonly></td></tr>
          <tr><td scope="col">書籍説明</td><td><textarea id="description" type="text" name="description" value="" readonly></textarea></td></tr>
        </table>            
      </div>
      <input type="submit" value="登録" class="btn-primary">
  </form>
  <br>
  <br>
</div>
<script src="/js/regist.js"></script>
<script src="/js/regist.js"></script>
@endsection
</body>
</html>