@extends('layouts.two-column')

@section('left-column')
	@include($page)
@endsection

@section('right-column')
	@include('parts.widgets.user-menu')
	@include('parts.widgets.spotlight')
@endsection
