<form method="POST" class="form sign-in" action="{{ route('site.user.signInPost') }}">
	{{ csrf_field() }}
	<div class="form-item">
		<label for="sign-in__login">Логин</label>
		<input name="login" type="text" placeholder="Введите логин" id="sign-in__login" value="{{ old('login') }}">
	</div>
	<div class="form-item">
		<label for="sign-in__password">Пароль</label>
		<input name="password" type="password" placeholder="Введите пароль" id="sign-in__password" value="{{ old('password') }}">
	</div>
	<div class="form-item">
		<label for="sign-in__remember">Запомнить меня</label>
		<input name="remember" type="checkbox" id="sign-in__remember">
	</div>
	<div class="form-item">
		<input type="submit" value="Войти на сайт">
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
