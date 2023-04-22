@extends('layouts.base')
@section('title','レビュー削除完了')
@section('main')
@push('css')
<link rel="stylesheet" href="/css/db.css">
@endpush
<br><br><br><br><br>
<div class="title">
<h1>かんそうを消しました</h1>
</div>
<table class="table"><tr>
<td scope="col">たいとる</td><td>{{ $bookTitle->title }}</td></tr><tr>
<td scope="col">ゆーざー名</td><td>{{ $user }}</td></tr><tr>
<td scope="col">かんそう</td><td>{{ $beforeReview }}</td></tr><tr>
<td scope="col">てんすう</td><td>{{ $beforeScore }}</td></tr>
</table>
@endsection