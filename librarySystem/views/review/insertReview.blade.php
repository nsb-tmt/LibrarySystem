@extends('layouts.base')
@section('title','レビュー新規追加')
@section('main')
@push('css')
<link rel="stylesheet" href="/css/db.css">
@endpush
<br><br><br><br><br>
<div class="title">
<h1>かんそうを書く</h1>
</div>
<form action="/review/storeReview" method="post">
    @csrf
<table class="table"><tr>
<input type="hidden" name="isbn_id" value="{{ $isbnInfo->id }}" >
<td scope="col">たいとる</td><td><input type="text" name="title" value="{{ $isbnInfo->title }}" readonly></td></tr><tr>
<td scope="col">ゆーざー名</td><td><input type="text" name="user" value="{{ $userInfo->user }}" readonly></td></tr><tr>
<td scope="col">かんそう</td><td><textarea type="text" name="review" value="review" rows="3" required autofocus></textarea></td></tr><tr>
<td scope="col">てんすう</td><td><input type='number' name="score" min=0 max=5 value=3 required></td></tr>
</table>
<button type="submit" name="update" id="orangeBtn">かんそうのとうろく</button>
</form>
@endsection