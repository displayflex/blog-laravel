<form method="POST" class="form post-form" action="{{ route('site.post.editPost', $post->slug) }}">
	{{ csrf_field() }}
	<div class="form-item">
		<label for="post-form__title">Заголовок <span>*</span></label>
		<input name="title" type="text" placeholder="Введите заголовок поста" id="post-form__title" value="{{ $post->title }}">
	</div>
	<div class="form-item">
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
	<div class="form-item">
		<label for="post-form__content">Контент <span>*</span></label>
		<textarea name="content" id="post-form__content" placeholder="Введите содержимое поста">{{ $post->content }}</textarea>
	</div>
	<div class="form-item">
		<input type="submit" value="Редактировать пост">
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
