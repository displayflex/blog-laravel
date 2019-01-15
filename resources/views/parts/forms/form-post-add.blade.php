<form method="POST" class="form post-form" action="{{ route('site.post.store') }}">
	@csrf

	<div class="form-item {{ $errors->has('title') ? 'has-error' : '' }}">
		<label for="post-form__title">Заголовок <span>*</span></label>
		<input name="title" type="text" placeholder="Введите заголовок поста" id="post-form__title" value="{{ old('title') }}">
	</div>

	<div class="form-item {{ $errors->has('content') ? 'has-error' : '' }}">
		<label for="post-form__content">Контент <span>*</span></label>
		<textarea name="content" id="post-form__content" placeholder="Введите содержимое поста">{{ old('content') }}</textarea>
	</div>

	<div class="form-item {{ $errors->has('tags') ? 'has-error' : '' }}">
		<label for="post-form__tags">Теги</label>
		<input name="tags" type="text" placeholder="Перечислите теги через запятую" id="post-form__tags" value="{{ old('tags') }}">
	</div>

	<div class="form-item {{ $errors->has('section') ? 'has-error' : '' }}">
		<label for="post-form__section">Раздел</label>
		<select name="section" id="post-form__section">
			@foreach ($sections as $section)
				<option value="{{ $section->name }}">{{ $section->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-item">
		<input type="submit" value="Добавить пост">
	</div>
</form>

@include('parts.errors')
