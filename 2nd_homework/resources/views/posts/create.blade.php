@extends('posts.layout')

@section('title', '新規登録')

@section('content')

<h1>新規登録</h1>
<form action="/posts" method="post">
	@csrf
	<div class="form-group">
	  <label for="exampleFormControlInput1">タイトル</label>
	  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}">
	</div>
	@error('title')
	<div class="alert alert-danger" role="alert">
		{{ $message }}
	  </div>
	@enderror
	<div class="form-group">
	  <label for="exampleFormControlTextarea1">内容</label>
	  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ old('content') }}</textarea>
	</div>
	@error('content')
	<div class="alert alert-danger" role="alert">
		{{ $message }}
	  </div>
	@enderror
	<button class="btn btn-primary" type="submit">登録</button>
  </form>
@endsection