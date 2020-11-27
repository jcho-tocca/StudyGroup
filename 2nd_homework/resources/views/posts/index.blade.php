@extends('posts.layout')

@section('title', '一覧')

@section('content')
	<h1>一覧</h1>
	<a class="btn btn-primary" href="/posts/create" role="button">新規登録</a>
	<table class="table">
		<thead>
		  <tr>
			<th scope="col">ID</th>
			<th scope="col">タイトル</th>
			<th scope="col">編集</th>
			<th scope="col">削除</th>
		  </tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
					<td>
						<a class="btn btn-success" href="/posts/{{ $post->id }}/edit" role="button">編集</a>
					</td>
					<td>
						<form action="/posts/{{ $post->id }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">削除</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	  </table>
@endsection