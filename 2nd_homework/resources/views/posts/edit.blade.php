@extends('posts.layout')

@section('title', '編集')

@section('content')

<h1>編集</h1>
<form action="/posts/{{ $post->id }}" method="post">
	@csrf
	@method('PUT')
	<div class="form-group">
	  <label for="exampleFormControlInput1">タイトル</label>
	  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title', isset($post->title) ? $post->title : '') }}">
	</div>
	@error('title')
	<div class="alert alert-danger" role="alert">
		{{ $message }}
	  </div>
	@enderror
	<div class="form-group">
	  <label for="exampleFormControlTextarea1">内容</label>
	  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ old('content', isset($post->content) ? $post->content : '') }}</textarea>
	</div>
	@error('content')
	<div class="alert alert-danger" role="alert">
		{{ $message }}
	  </div>
	@enderror
	<button class="btn btn-primary" type="submit">登録</button>
  </form>
@endsection