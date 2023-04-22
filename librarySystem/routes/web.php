<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return view('login.login');
});
//ログイン回り
Route::post('/login/check','LoginController@login');
Route::get('/login/logout','LoginController@logout');

//ユーザー登録
Route::get('/login/register',function(){
    return view('login.register');
});
Route::post('/login/save','LoginController@regist');
//マイページ
Route::get('/myPage/myPage','MyPageController@viewRecent');

//書籍情報の登録
Route::get('/db/book',function(Request $req){
    $data=['user'=>$req->session()->get('user','')];
    return view('db.bookRegist',$data);
});
Route::post('/db/store','DbController@store'); // 新規登録

//レビュー回り
Route::get('/review/selectTop','ReviewController@selectTop');
Route::get('/review/selectInfo','ReviewController@selectInfo');
Route::post('/review/selectInfo','ReviewController@selectInfo');
Route::get('/review/reviewInfo','ReviewController@reviewInfo');
Route::get('/review/editReview','ReviewController@editReview');
Route::post('/review/editReview','ReviewController@editReview');
Route::post('/review/updateReview','ReviewController@updateReview');
Route::post('/review/insertReview','ReviewController@insertReview');
Route::post('/review/storeReview','ReviewController@storeReview');