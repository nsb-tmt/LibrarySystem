@extends('layouts.base')
@section('title','レビュー編集')
@section('main')
@push('css')
<link rel="stylesheet" href="/css/db.css">
@endpush
<br><br><br><br><br>
<div class="title">
<h1>かんそうの上書き・消す</h1>
</div>
@isset($reviewInfo)
<form action="/review/updateReview" method="post">
    @csrf
<table class="table"><tr>
<input type="hidden" name="isbn" value="{{ $reviewInfo->isbn_id }}" >
<input type="hidden" name="user_id" value="{{ $reviewInfo->user_id }}" >
<td scope="col">たいとる</td><td><input type="text" name="title" value="{{ $isbnInfo->title }}" readonly></td></tr><tr>
<td scope="col">ゆーざー名</td><td><input type="text" name="user" value="{{ $user }}" readonly></td></tr><tr>
<td scope="col">れびゅー</td><td><textarea type="text" name="review" value="review" required>{{ $reviewInfo->review }}</textarea></td></tr><tr>
<td scope="col">てんすう</td><td><input type='number' name="score" min=0 max=5 value="{{ $reviewInfo->score }}" required></td></tr>
</table>
<br>
<button type="submit" name="update" id="orangeBtn">上書き</button><br>
<button type="submit" name="delete" id="orangeBtn">かんそうを消す</button>
</form>
@endisset
@endsection