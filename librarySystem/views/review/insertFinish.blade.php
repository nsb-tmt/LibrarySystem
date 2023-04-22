@extends('layouts.base')
@section('title','レビュー新規追加完了')
@section('main')
@push('css')
<link rel="stylesheet" href="/css/db.css">
@endpush
<br><br><br><br><br>
<div class="title">
<h1>かんそうを書きました</h1>
</div>
<table class="table"><tr>
<td scope="col">たいとる</td><td>{{ $title }}</td></tr><tr>
<td scope="col">ゆーざー名</td><td>{{ $user }}</td></tr><tr>
<td scope="col">かんそう</td><td>{{ $reviewInfo }}</td></tr><tr>
<td scope="col">てんすう</td><td>{{ $score }}</td></tr>
</table>
@endsection