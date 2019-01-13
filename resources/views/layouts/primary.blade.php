@extends('layouts.two-column')

@section('left-column')
	@include($page)
@endsection

@section('right-column')
	@include('parts.widgets.user-menu')

	@if (Route::currentRouteName() !== "site.section.all")
		@include('parts.widgets.section-list')
	@endif

	@include('parts.widgets.popular-post')

	@if (Route::currentRouteName() !== "site.tag.all")
		@include('parts.widgets.tags')
	@endif
@endsection
