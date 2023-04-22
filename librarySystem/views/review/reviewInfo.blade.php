@extends('layouts.base')
@section('title','書籍詳細')
@section('main')
@push('css')
<link rel="stylesheet" href="/css/db.css">
@endpush
<br><br><br><br><br>
@php
$flag=true;
@endphp
<table class="table">
@forelse($records as $record)
<tr>
    @if(!isset($record->img))
    <td rowspan="7"><img src="/img/noImage.jpg" alt="" srcset=""></td>
    @else
    <td rowspan="7"><img src="{{$record->img}}" alt="" srcset=""></td>
    @endif
    <td scope="col">ISBN</td><td>{{ $record->isbn }}</td></tr><tr>
    <td scope="col">本のなまえ</td><td>{{ $record->title }}</td></tr><tr>
    <td scope="col">書いたひと</td><td>{{ $record->author }}</td></tr><tr>
    <td scope="col">かいしゃ</td><td>{{ $record->publisher }}</td></tr><tr>
    <td scope="col">ねだん</td><td>
    @if(!isset($record->price))
    不明
    @else
    {{ number_format($record->price) }} 円
    @endif
    </td></tr><tr>
    <td scope="col">かんそうの数</td><td>{{ count($record->reviews) }} 件</td></tr><tr>
    <td scope="col">みんなのてんすう</td>
@if(count($record->reviews)===0)
<td>評価なし</td>
@else
<td>{{ round($record->avgScore,1) }}/5点
<section>
  <div class="progress-thin-base">
    <div class="progress-bar bg-info" style="width:{{ round($record->avgScore,1)*20 }}%">
      <div v-if="stripes" class="progress-border"></div>
    </div>
 </div>
</section>
</td>
@endif
</tr>
@empty
<tr>
@if(!isset($noRecords->img))
<td rowspan="7"><img src="/img/noImage.jpg" alt="" srcset=""></td>
@else
<td rowspan="7"><img src="{{$noRecords->img}}" alt="" srcset=""></td>
@endif
<td scope="col">ISBN</td><td>{{ $noRecords->isbn }}</td></tr><tr>
<td scope="col">本のなまえ</td><td>{{ $noRecords->title }}</td></tr><tr>
<td scope="col">書いたひと</td><td>{{ $noRecords->author }}</td></tr><tr>
<td scope="col">かいしゃ</td><td>{{ $noRecords->publisher }}</td></tr><tr>
<td scope="col">ねだん</td><td>
  @if(!isset($record->price))
  不明
  @else
  {{ number_format($record->price) }} 円
  @endif</td></tr><tr>
<td scope="col">かんそうの数</td>  <td>{{ count($noRecords->reviews) }} 件</td></tr><tr>
<td scope="col">みんなのてんすう</td>  <td>{{ round($noRecords->avgScore,1) }}/5点
<section>
  <div class="progress-thin-base">
    <div class="progress-bar bg-info" style="width:0%">
      <div v-if="stripes" class="progress-border"></div>
    </div>
 </div>
</section>
</td>
@endforelse
</table>

<table class="table">
<tr><th>かんそうを書いた人</th><th>読んだかんそう</th><th>てんすう</th><th>かんそうを書いた日</th></tr>
@forelse($reviewInfo as $record)
    <td>{{ $record->user->user }}</td>
    <td>{{ $record->review }}</td>
    <td>{{ $record->score }}</td>
    <td>{{ $record->created_at }}</td>
    @if($record->user_id===$userName)
    @php
    $flag=false;
    @endphp
    <td><form action="/review/editReview" method="post"><input type="hidden" name="isbn" value="{{ $record->isbn_id }}" >
    @csrf
    <button type="submit" id="orangeBtn">かんそうのへんしゅう</button>
    </form></td>
    @endif
</tr>
@empty
<tr>
<td colspan="4">かんそうが書かれてないです</td>
</tr>
@endforelse
</table>
@if($flag)
<form action="/review/insertReview" method="post"><input type="hidden" name="isbn" value="{{ $isbn }}" >
    @csrf
    <br><br>
    <button type="submit" id="orangeBtn">かんそうを書く</button>
    <br>
</form>
@endif
@endsection