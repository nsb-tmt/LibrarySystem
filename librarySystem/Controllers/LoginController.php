<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Http\Requests\UserRegist;

class LoginController extends Controller
{
    public function login(Request $req){
        $userInfo = User::where('user',$req->user)->where('password',$req->password)->first();
        
        if(empty($userInfo)){
            return redirect("/");
        }
        if($userInfo->password != $req->password){
            return redirect("/");
        }
        $req->session()->put('user',$req->user);
        $userId=User::where('user',$req->user)->first();
        $req=session()->put('userName',$userId->id);
        $data= [
            'records'=> Review::all()
        ];
        return redirect('/myPage/myPage');
    }
    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
    public function regist(UserRegist $req,){
        //バリデーション　最小5文字、英数字のみ、null拒否
        $user=User::where('user',$req->user)->first();
        if(!empty($user)){
            //ユーザー情報が重複したとき
            $data=[
                'errMsg'=>'既に使用されている名前です'
            ];
            return view('login.register',$data);
        }
        //DBにユーザー登録
        $newUser = new User();
        $newUser->user=$req->user;
        $newUser->password=$req->password;
        $newUser->save();
        
        //登録情報を入力した状態のログインページに移動
        $data=[ 
            'user'=>$req->user,
            'password'=>$req->password
        ];
        return view('login.login',$data);

    }
}
