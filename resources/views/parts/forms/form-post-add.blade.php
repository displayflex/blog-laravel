<form method="POST" class="form post" action="{{ route('site.post.addPost') }}">
	{{ csrf_field() }}
	<div class="form-item">
		<label for="post__title">Заголовок <span>*</span></label>
		<input name="title" type="text" placeholder="Введите заголовок поста" id="post__title" value="{{ old('title') }}">
	</div>
	<div class="form-item">
		<label for="post__content">Контент <span>*</span></label>
		<textarea name="content" id="post__content" placeholder="Введите содержимое поста">{{ old('content') }}</textarea>
	</div>
	<div class="form-item">
		<input type="submit" value="Добавить пост">
	</div>
</form>

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li class="warning-msg">{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
