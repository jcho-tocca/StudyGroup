@extends('posts.layout')

@section('title', '詳細')

@section('content')

<h1>詳細</h1>
<h2>ID</h2>
<div>{{ $post->id }}</div>
<h2>タイトル</h2>
<div>{{ $post->title }}</div>

<h2>内容</h2>
<div>{{ $post->content }}</div>

@endsection