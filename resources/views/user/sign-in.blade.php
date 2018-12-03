@extends('main')

@section('content')
	<h2 class="icon fa-file-text-o">Войти на сайт</h2>

	<form method="POST" class="form">
		{{ csrf_field() }}
		{{-- @foreach ($formBuilder->fields() as $item) --}}
		@foreach ($formBuilder as $field)
			<div class="form-item">
				{{ $field }}
			</div>
		@endforeach
	</form>

	<p class="warning-msg">{{ $msg }}</p>
@endsection
