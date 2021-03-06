<form method="POST" class="form post-form" action="{{ route('site.post.update', $post->slug) }}">
	@method('PATCH')
	@csrf

	<div class="form-item {{ $errors->has('title') ? 'has-error' : '' }}">
		<label for="post-form__title">Заголовок <span>*</span></label>
		<input name="title" type="text" placeholder="Введите заголовок поста" id="post-form__title" value="{{ old('title', $post->title) }}">
	</div>

	<div class="form-item {{ $errors->has('section') ? 'has-error' : '' }}">
		<label for="post-form__section">Раздел</label>
		<select name="section" id="post-form__section">
			@foreach ($sections as $section)
				<option
					value="{{ $section->name }}"
					@if ($section->name === $post->section->name)
						{{ ' selected' }}
					@endif
				>
					{{ $section->name }}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-item {{ $errors->has('content') ? 'has-error' : '' }}">
		<label for="post-form__content">Контент <span>*</span></label>
		<textarea name="content" id="post-form__content" placeholder="Введите содержимое поста">{{ old('content', $post->content) }}</textarea>
	</div>

	<div class="form-item">
		<input type="submit" value="Редактировать пост">
	</div>
</form>

@include('parts.errors')
