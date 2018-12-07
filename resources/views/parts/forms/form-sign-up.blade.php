<form method="POST" class="form user" action="{{ route('site.user.signUpPost') }}">
	{{ csrf_field() }}
	<div class="form-item {{ $errors->has('login') ? 'has-error' : '' }}">
		<label for="user__login">Логин <span>*</span></label>
		<input name="login" type="text" placeholder="Введите логин" id="user__login" value="{{ old('login') }}">
	</div>
	<div class="form-item {{ $errors->has('email') ? 'has-error' : '' }}">
		<label for="user__email">E-mail <span>*</span></label>
		<input name="email" type="email" placeholder="Введите e-mail" id="user__email" value="{{ old('email') }}">
	</div>
	<div class="form-item {{ $errors->has('password') ? 'has-error' : '' }}">
		<label for="user__password">Пароль <span>*</span></label>
		<input name="password" type="password" placeholder="Введите пароль" id="user__password" value="{{ old('password') }}">
	</div>
	<div class="form-item {{ $errors->has('submitPassword') ? 'has-error' : '' }}">
		<label for="user__submitPassword">Подтверждение пароля <span>*</span></label>
		<input name="submitPassword" type="password" placeholder="Повторите пароль" id="user__submitPassword" value="{{ old('submitPassword') }}">
	</div>
	<div class="form-item {{ $errors->has('phone') ? 'has-error' : '' }}">
		<label for="user__phone">Номер телефона</label>
		<input name="phone" type="text" placeholder="Введите номер телефона" id="user__phone" value="{{ old('phone') }}">
	</div>
	<div class="form-item">
		<label for="user__isConfirmed">Согласен с условиями сайта <span>*</span></label>
		<input name="isConfirmed" type="checkbox" id="user__isConfirmed">
	</div>
	<div class="form-item">
		<input type="submit" value="Зарегистрироваться">
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
