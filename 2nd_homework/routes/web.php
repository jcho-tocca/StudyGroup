<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', 'PostController');
// // 一覧画面
// Route::get('/posts', 'PostController@index');
// // 新規登録画面
// Route::get('/posts/create', 'PostController@create');
// // 登録処理
// Route::post('/posts', 'PostController@store');
// // 編集画面
// Route::get('/posts/{post}/edit', 'PostController@edit');
// // 編集処理
// Route::put('/posts/{post}', 'PostController@update');
// // 詳細
// Route::get('/posts/{post}', 'PostController@show');
// // 削除
// Route::get('/posts/{post}', 'PostController@destroy');

