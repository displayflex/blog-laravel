<article class="single-post">
	<h2>{{ $post->title }}</h2>
	<ul class="tags">
		@foreach ($post->tags as $tag)
			@if ($tag->name)
				<li class="tags__item">
					<a class="tags__link" href="/post/tag/{{ $tag->id }}">{{ $tag->name }}</a>
				</li>
			@endif
		@endforeach
	</ul>
	<small>{{ getRusDate($post->updated_at) }}</small>
	<p class="single-post__author">
		@can('view', App\Models\Profile::class)
			Автор: <a class="single-post__author-link" href="/user/{{ $post->user->id }}">{{ $post->user->login }}</a>
		@else
			Автор: {{ $post->user->login }}
		@endcan
	</p>
	<div class="single-post__image-wrapper">
		{{-- <img src="/assets/images/pic0{{ mt_rand(4,6) }}.jpg" alt=""> --}}
		<img class="single-post__image" src="{{ $post->image }}" alt="">
	</div>
	<p>{{ nl2br($post->content) }}</p>
	<span class="single-post__views-count">
		<i class="fa fa-eye"></i> {{ $post->views_count }}
	</span>
	@can('update', App\Models\Post::class)
		@if ($post->user->id === Auth::user()->id)
			<a class="single-post__change single-post__change--edit" href="/post/edit/{{ $post->id }}">
				<i class="fa fa-pencil"></i>
			</a>
		@endif
	@endcan
	@can('delete', App\Models\Post::class)
		@if ($post->user->id === Auth::user()->id)
			<a class="single-post__change single-post__change--delete" href="/post/delete/{{ $post->id }}" onclick="return confirm('Удалить статью?')">
				<i class="fa fa-times"></i>
			</a>
		@endif
	@endcan
	<a class="single-post__back" href="/"><i class="fa fa-arrow-left"></i> На главную</a>
</article>
