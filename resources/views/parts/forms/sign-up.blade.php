<form method="POST" class="form sign-up" action="{{ route('site.user.signUpPost') }}">
	{{ csrf_field() }}
	<div class="form-item {{ $errors->has('login') ? 'has-error' : '' }}">
		<label for="sign-up__login">Имя/никнейм <span>*</span></label>
		<input name="login" type="text" placeholder="Введите логин" id="sign-up__login" value="{{ old('login') }}">
	</div>
	<div class="form-item {{ $errors->has('email') ? 'has-error' : '' }}">
		<label for="sign-up__email">E-mail <span>*</span></label>
		<input name="email" type="email" placeholder="Введите e-mail" id="sign-up__email" value="{{ old('email') }}">
	</div>
	<div class="form-item {{ $errors->has('password') ? 'has-error' : '' }}">
		<label for="sign-up__password">Пароль <span>*</span></label>
		<input name="password" type="password" placeholder="Введите пароль" id="sign-up__password" value="{{ old('password') }}">
	</div>
	<div class="form-item {{ $errors->has('submitPassword') ? 'has-error' : '' }}">
		<label for="sign-up__submitPassword">Подтверждение пароля <span>*</span></label>
		<input name="submitPassword" type="password" placeholder="Повторите пароль" id="sign-up__submitPassword" value="{{ old('submitPassword') }}">
	</div>
	<div class="form-item {{ $errors->has('phone') ? 'has-error' : '' }}">
		<label for="sign-up__phone">Номер телефона</label>
		<input name="phone" type="text" placeholder="Введите номер телефона" id="sign-up__phone" value="{{ old('phone') }}">
	</div>
	<div class="form-item">
		<label for="sign-up__isConfirmed">Согласен с условиями сайта <span>*</span></label>
		<input name="isConfirmed" type="checkbox" id="sign-up__isConfirmed">
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
