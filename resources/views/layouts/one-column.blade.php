@extends('layouts.base')

@section('header')
	@include('parts.header')
@endsection

@section('content')
	<!-- Main Wrapper -->
	<div id="main-wrapper">
		<div class="wrapper style2">
			<div class="inner">
				<div class="container">
					@yield('center-column')
				</div>
			</div>
		</div>
	</div><!-- /Main Wrapper -->
@endsection

@section('footer')
	@include('parts.footer')
@endsection

@section('bottom-scripts')
	@include('parts.bottom-scripts')
@endsection
