@if (!empty($sections))
<!-- section-list -->
<section class="box sections">
	<h2 class="icon fa-tasks sections__main-title">Разделы</h2>
	<ul class="sections__list">
		@foreach ($sections as $section)
			<li class="sections__item">
				<a class="sections__link" href="{{ route('site.section.section', $section->slug) }}">
					{{ $section->name }} &nbsp;<span class="sections__count">({{ $section->posts_count }})</span>
				</a>
			</li>
		@endforeach
	</ul>
	<p class="sections__more">
		<a class="sections__more-link" href="{{ route('site.section.all') }}">
			Посмотреть все разделы <span class="icon fa-angle-right"></span>
		</a>
	</p>
</section><!-- /section-list -->
@endif
