<form method="POST" class="form feedback-form">
	{{ csrf_field() }}
	<div class="form-item">
		<label for="feedback-form__name">Имя или никнейм <span>*</span></label>
		<input name="name" type="text" placeholder="Введите Ваше имя" id="feedback-form__name" value="{{ old('name') }}">
	</div>
	<div class="form-item">
		<label for="feedback-form__email">Адрес e-mail <span>*</span></label>
		<input name="email" type="email" placeholder="Введите Ваш e-mail" id="feedback-form__email" value="{{ old('email') }}">
	</div>
	<div class="form-item">
		<label for="feedback-form__message">Текст сообщения <span>*</span></label>
		<textarea name="message" id="feedback-form__message" placeholder="Введите Ваше сообщение">{{ old('message') }}</textarea>
	</div>
	<div class="form-item">
		<input type="submit" value="Отправить сообщение">
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

<div class="alert alert-danger--ajax">
	<ul>
	</ul>
</div>
