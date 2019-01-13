@if (!empty($post))
<!-- popular-post -->
<section class="box popular-post">
	<h2 class="icon fa-star-o popular-post__main-title">Популярный пост</h2>
	<article class="popular-post__wrapper">
		@if (!empty($post->image))
			<a class="popular-post__image-link" href="{{ route('site.post.show', $post->slug) }}" class="image featured">
				<img class="popular-post__image" src="{{ $post->image }}" alt="">
			</a>
		@endif
		<h3 class="popular-post__title">
			<a href="{{ route('site.post.show', $post->slug) }}">{{ $post->title }}</a>
		</h3>
		<p class="popular-post__content">
			@if (mb_strlen($post->content) >= 200)
				{{ mb_substr($post->content, 0, 200) }}<span> ...</span>
			@else
				{{ $post->content }}
			@endif
		</p>
	</article>
		@if (mb_strlen($post->content) >= 200)
			<p class="popular-post__more">
				<a class="popular-post__more-link" href="{{ route('site.post.show', $post->slug) }}">
					Прочитать пост полностью <span class="icon fa-angle-right"></span>
				</a>
			</p>
		@endif
</section><!-- /popular-post -->
@endif
