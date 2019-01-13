<article class="single-post">
	<h2 class="single-post__title">{{ $post->title }}</h2>
	<ul class="tags">
		@foreach ($post->tags as $tag)
			@if ($tag->name)
				<li class="tags__item">
					<a class="tags__link" href="{{ route('site.tag.show', $tag->slug) }}">{{ $tag->name }}</a>
				</li>
			@endif
		@endforeach
	</ul>
	<small>{{ getRusDate($post->updated_at) }}</small>
	<p class="single-post__author">
		@can('view', App\Models\Profile::class)
			Автор: <a class="single-post__author-link" href="{{ route('site.user.profile', $post->user->id) }}">{{ $post->user->login }}</a>
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
			<a class="single-post__change" href="{{ route('site.post.edit', $post->slug) }}">
				<i class="fa fa-pencil"></i>
			</a>
		@endif
	@endcan
	@can('destroy', App\Models\Post::class)
		@if ($post->user->id === Auth::user()->id)
			<form class="single-post__delete-form" action="{{ route('site.post.destroy', $post->slug) }}" method="POST">
				@method('DELETE')
				@csrf

				<button class="single-post__delete-button" type="submit" onclick="return confirm('Удалить статью?')">
					<i class="fa fa-times"></i>
				</button>
			</form>
		@endif
	@endcan
	<a class="single-post__back" href="{{ route('site.main.index') }}"><i class="fa fa-arrow-left"></i> На главную</a>
</article>
