<h2 class="icon fa-tags">Тэги</h2>

<ul class="tags-all__list">
	@foreach ($alltags as $tag)
		<li class="tags-all__item">
			<a href="{{ route('site.tag.tag', $tag->slug) }}" class="tags-all__link">{{ $tag->name }}</a>
		</li>
	@endforeach
</ul>
