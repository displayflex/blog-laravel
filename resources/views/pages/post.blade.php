<div class="single-post">
	<h2>{{ nl2br($post->title) }}</h2>
	<small>{{ nl2br(getRusDate($post->updated_at)) }}</small>
	<p class="single-post__author">
		@if (Auth::check())
			Автор: <a class="single-post__author-link" href="user/{{ $post->user->id }}">{{ $post->user->login }}</a>
		@else
			Автор: {{ $post->user->login }}
		@endif
	</p>
	<p>{{ nl2br($post->content) }}</p>
	<a href="/"><i class="fa fa-level-up"></i> На главную</a>
</div>
