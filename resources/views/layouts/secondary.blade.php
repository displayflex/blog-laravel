@extends('layouts.one-column')

@section('center-column')
	<div class="row">
		<div class="col-8 off-2 col-10-medium off-1-medium">
			@include($page)
		</div>
	</div>
@endsection
