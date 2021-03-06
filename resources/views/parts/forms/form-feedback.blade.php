<form method="POST" class="form feedback-form">
	@csrf

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

@include('parts.errors')

<div class="alert alert-danger--ajax">
	<ul>
	</ul>
</div>
