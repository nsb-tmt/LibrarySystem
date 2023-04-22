@extends('layouts.base')
@section('title','レビュー編集完了')
@section('main')
@push('css')
<link rel="stylesheet" href="/css/db.css">
@endpush
<br><br><br><br><br>
<div class="title">
<h1>かんそうをあたらしくしたよ</h1>
</div>
<table class="table"><tr>
<td scope="col">たいとる</td><td>{{ $bookTitle->title }}</td></tr><tr>
<td scope="col">ゆーざー名</td><td>{{ $user }}</td></tr><tr>
</table>
<table class="table"><tr>
<td></td>
<td>前のかんそう</td>
<td>あたらしいかんそう</td></tr><tr>
<td scope="col">かんそう</td><td>{{ $beforeReview }}</td><td>{{ $newReview }}</td></tr><tr>
<td scope="col">てんすう</td><td>{{ $beforeScore }}</td><td>{{ $newScore }}</td></tr>
</table>
@endsection