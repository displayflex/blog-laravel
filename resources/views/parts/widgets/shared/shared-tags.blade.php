@if (!empty($tags))
<!-- tags -->
<section class="box tags-widget">
	<h2 class="icon fa-tags tags-widget__title">Тэги</h2>
	<ul class="tags-widget__list">
		@foreach ($tags as $tag)
			<li class="tags-widget__item">
				<a href="{{ route('site.tag.show', $tag->slug) }}" class="tags-widget__link">{{ $tag->name }}</a>
			</li>
		@endforeach
	</ul>
	<p class="tags-widget__more">
		<a class="tags-widget__more-link" href="{{ route('site.tag.index') }}">
			Посмотреть все теги <span class="icon fa-angle-right"></span>
		</a>
	</p>
</section><!-- /tags -->
@endif
