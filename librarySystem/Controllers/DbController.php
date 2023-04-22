<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isbn; // 利用するモデルの読み込み

class DbController extends Controller
{
    public function store(Request $req)
    {
        //isbnの重複を確認
        if(!empty(Isbn::where('isbn',$req->isbn)->first())){
            $data=[
                'errMsg'=>'既に登録されている書籍です',
                'user'=>$req->session()->get('user','')
            ];
            return view('db.bookRegist',$data);
        }        
        //DBへ登録
        $isbn = new Isbn();
        $isbn->isbn = $req->isbn;
        $isbn->title = $req->title;
        $isbn->author = $req->author;
        $isbn->publisher = $req->publisher;
        $isbn->price = $req->price;
        if(isset($req->coverFile)){
            //画像ファイルを受け取る時
            $dir = 'img/bookCover';
            $file_name = $req->file('coverFile')->getClientOriginalName();
            $req->file('coverFile')->storeAs('public/'. $dir, $file_name);
            $isbn->img='storage/'. $dir.'/'.$file_name;
        }else{
            $isbn->img = $req->cover;
        }
        $isbn->save();

        $data = [
            'success' => 'true',
            'isbn' => $req->isbn,
            'title' => $req->title,
            'author' => $req->author,
            'publisher' => $req->publisher,
            'price' => $req->price,
            'cover' => $req->cover, 
            'description' => $req->description,    
            //'thumbnail' => $req->thumbnail,
            //'volume' => $req->volume,
            //'series' => $req->series,
            //'pubdate' => $req->pubdate,
            'user'=>$req->session()->get('user','')
        ];
        return view('db.bookRegist', $data);
    }
}
