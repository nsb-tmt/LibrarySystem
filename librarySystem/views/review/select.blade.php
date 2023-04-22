@extends('layouts.baseMyPage')
@section('title','書籍登録')
@section('main')
<br><br><br><br><br>
<h1>本をさがす</h1>
<form action="/review/selectInfo" method="post">
@csrf
  <table class="searchTable">
      <tr><td>書籍名：</td><td><input type="text" name="titlekey"></td></tr>
      <tr><td>著者名：</td><td><input type="text" name="authorkey" ></td></tr>
      <tr><td>表示順：</td><td><select name="sort">
    <option value="updated_at" selected>新規登録順</option>
    <option value="title">名前順</option>
    <option value="price">価格順</option>
    <option value="sumScore">レビュー数</option>
    <option value="avgScore">点数順</option>
  </select></td></tr>
  </table>
  <button type="submit" id="orangeBtn">検索</button>
</form>
    @isset($records)
    <h1>さがしたけっか</h1>
さがした本のなまえ「{{ $titlekey }}」,本を書いたひと「{{ $authorkey }}」
    <table class="table">
<tr><th scope="col">ひょうし</th><th scope="col" >ISBN</th><th scope="col">本のなまえ</th><th scope="col">書いたひと</th>
<th scope="col">かいしゃ</th><th scope="col">ねだん</th><th scope="col">かんそうの数</th><th scope="col">せいせき</th></tr>
@forelse($records as $record)
<tr>
@if(!isset($record->img))
  <td><img src="/img/noImage.jpg" alt="" srcset="" style="width:80%"></td>  
@else
  @if(strpos($record->img,"https:")!==false)
  <td><img src="{{$record->img}}" alt="" srcset="" style="width:80%"></td>
  @else
  <td><img src="{{ Storage::url($record->img)}}" alt="" srcset="" style="width:30%"></td>  
  @endif
@endif
<td>{{ $record->isbn }}</td>
<td>{{ $record->title }}</td>
<td>{{ $record->author }}</td>
<td>{{ $record->publisher }}</td>
<td>  @if(!isset($record->price))
    不明
    @else
    {{ number_format($record->price) }} 円
    @endif</td>
<td>{{ count($record->reviews) }} 件</td>
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
<td id="detail"><form action="/review/reviewInfo" method="get"><input type="hidden" name="isbn" value="{{ $record->isbn }}" >
@csrf
<button type="submit" id="orangeBtn">くわしく</button>
</form></td>
</tr>
@empty
<br>
<p>該当するデータがありません</p>
<hr>
@endforelse
</table>
<br>

@endisset
@endsection