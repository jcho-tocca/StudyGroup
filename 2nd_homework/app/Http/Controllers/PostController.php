<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 一覧
     *
     * @return void
     */
    public function index() {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * 詳細
     *
     * @return void
     */
    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }
    
    /**
     * 新規登録
     *
     * @return void
     */
    public function create() {

        return view('posts.create');
    }

    /**
     * 登録処理
     *
     * @return void
     */
    public function store(Post $post) {

        request()->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);

        $post = Post::create([
            'title' => request('title'),
            'content' => request('content') 
        ]);
        
        return redirect('/posts')->with('success', '登録に成功しました。');
    }

    /**
     * 編集画面
     *
     * @return void
     */
    public function edit(Post $post) {

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * 編集処理
     *
     * @return void
     */
    public function update(Post $post) {

        request()->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);

        $post->update([
            'title' => request('title'),
            'content' => request('content')
        ]);

        
        return redirect('/posts')->with('success', '編集に成功しました。');
    }

    /**
     * 削除
     *
     * @return void
     */
    public function destroy(Post $post) {
        $post->delete();
        return redirect('/posts')->with('success', '削除に成功しました。');
    }
}
