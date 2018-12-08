<div class="single-post">
	<h2>{{ nl2br($post->title) }}</h2>
	<ul class="tags">
		@foreach ($post->tags as $tag)
			@if ($tag->name)
				<li class="tags__item">
					<a class="tags__link" href="/post/tag/{{ $tag->id }}">{{ $tag->name }}</a>
				</li>
			@endif
		@endforeach
	</ul>
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

	@if (Auth::check() && $post->user->id === Auth::user()->id)
		<a class="post__change post__change--edit" href="/post/edit/{{ $post->id }}">
			<i class="fa fa-pencil"></i>
		</a>
		<a class="post__change post__change--delete" href="/post/delete/{{ $post->id }}" onclick="return confirm('Удалить статью?')">
			<i class="fa fa-times"></i>
		</a>
	@endif
</div>
