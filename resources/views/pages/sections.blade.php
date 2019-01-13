<h2 class="icon fa-tasks">Разделы</h2>

{{-- <ul class="sections-all__list">
	@foreach ($allSections as $section)
		<li class="sections-all__item">
			<a href="{{ route('site.section.section', $section->slug) }}" class="sections-all__link">{{ $section->name }}</a>
		</li>
	@endforeach
</ul> --}}

<ul class="sections-all__list">
	@foreach ($allSections as $section)
		<li class="sections__item">
			<a class="sections__link" href="{{ route('site.section.section', $section->slug) }}">
				{{ $section->name }} &nbsp;<span class="sections__count">({{ $section->posts_count }})</span>
			</a>
		</li>
	@endforeach
</ul>
