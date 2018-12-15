@if (!empty($post))
<!-- popular-post -->
<section class="box popular-post">
	<h2 class="icon fa-star-o popular-post__main-title">Популярный пост</h2>
	<article class="popular-post__wrapper">
		@if (!empty($post->image))
			<a class="popular-post__image-link" href="{{ route('site.post.post', $post->id) }}" class="image featured">
				<img class="popular-post__image" src="{{ $post->image }}" alt="">
			</a>
		@endif
		<h3 class="popular-post__title">
			<a href="{{ route('site.post.post', $post->id) }}">{{ $post->title }}</a>
		</h3>
		<p class="popular-post__content">
			@if (mb_strlen($post->content) >= 200)
				{{ mb_substr($post->content, 0, 200) }}
				<a class="popular-post__read-more" href="{{ route('site.post.post', $post->id) }}"> ...</a>
			@else
				{{ $post->content }}
			@endif
		</p>
	</article>
</section><!-- /popular-post -->
@endif
