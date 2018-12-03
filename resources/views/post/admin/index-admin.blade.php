@extends('main')

@section('content')
	<h2 class="icon fa-file-text-o">Недавние посты</h2>

	@forelse ($posts as $post)
		<article class="box excerpt">
			<a href="#" class="image left">
				<img src="/assets/images/pic0{{ mt_rand(4,6) }}.jpg" alt="">
			</a>
			<div>
				<header>
					<span class="date">
						{{ $post['date'] }}
					</span>
					<h3>
						<a href="post/{{ $post['id'] }}">
							{{ $post['title'] }}
						</a>
					</h3>
				</header>
				<p>
					@if (strlen($post['content']) >= 150)
						{{ substr($post['content'], 0, 150) . ' ...' }}
					@else
						{{ $post['content'] }}
					@endif
				</p>
				<a href="/post/edit/{{ $post['id'] }}">
					<i class="fa fa-pencil"></i> Редактировать
				</a>
				<br>
				<a href="/post/delete/{{ $post['id'] }}" onclick="return confirm('Удалить статью?')">
					<i class="fa fa-times"></i> Удалить
				</a>
			</div>
		</article>
	@empty
		<p>No posts added...</p>
	@endforelse

	<a class="button alt icon fa-file-o" href="/post/add">Добавить</a>
@endsection
