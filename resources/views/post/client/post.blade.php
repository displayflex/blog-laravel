@extends('main')

@section('content')
	<h2>{{ nl2br($post['title']) }}</h2>
	<small>{{ nl2br($post['date']) }}</small>
	<p>{{ nl2br($post['content']) }}</p>
	<a href="/"><i class="fa fa-level-up"></i> На главную</a>
@endsection
