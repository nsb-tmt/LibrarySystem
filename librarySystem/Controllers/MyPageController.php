<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Isbn;
use App\Models\User;

class MyPageController extends Controller
{
    public function viewRecent(Request $req){
        $user=$req->session()->get('user','');
        if(strlen($user)<5){
            //ユーザーIDは五文字以上
            //ログイン情報がないときはトップに戻る
            //ユーザー情報をフラッシュしてログインページに行く
            $req->session()->flush();
            return redirect('/');
        }
        //ユーザーIDからユーザーテーブルを取得
        $userId= User::where('user',$user)->first();
        //ユーザーの記述したレビューの一覧を送信
        $data= [
            'records'=> Review::where('user_id',$userId->id)->get(),
            'user'=>$user
         ];
        return view('myPage.myPage',$data);
    }
}
