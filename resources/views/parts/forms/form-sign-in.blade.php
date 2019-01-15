<form method="POST" class="form user" action="{{ route('site.user.signInPost') }}">
	@csrf

	<div class="form-item">
		<label for="user__login">Логин</label>
		<input name="login" type="text" placeholder="Введите логин" id="user__login" value="{{ old('login') }}">
	</div>

	<div class="form-item">
		<label for="user__password">Пароль</label>
		<input name="password" type="password" placeholder="Введите пароль" id="user__password" value="{{ old('password') }}">
	</div>

	<div class="form-item">
		<label for="user__remember">Запомнить меня</label>
		<input name="remember" type="checkbox" id="user__remember">
	</div>

	<div class="form-item">
		<input type="submit" value="Войти на сайт">
	</div>
</form>

@include('parts.errors')
