@extends('layouts.two-column')

@section('left-column')
	@include($page)
@endsection

@section('right-column')
	@include('parts.widgets.user-menu')
	@include('parts.widgets.popular-post')
	@if (Route::currentRouteName() !== "site.tag.all")
		@include('parts.widgets.tags')
	@endif
@endsection
