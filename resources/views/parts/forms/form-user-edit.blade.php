<form method="POST" class="form profile" action="{{ route('site.user.editPost', $user->id) }}">
	{{ csrf_field() }}
	<div class="form-item">
		<label for="profile__login">Логин</label>
		<input name="login" type="text" placeholder="Введите логин" id="profile__login" value="{{ $user->login }}" disabled>
	</div>
	<div class="form-item">
		<label for="profile__email">E-mail</label>
		<input name="email" type="text" placeholder="Введите e-mail" id="profile__email" value="{{ $user->email }}">
	</div>
	<div class="form-item">
		<label for="profile__name">Имя</label>
		<input name="name" type="text" placeholder="Введите имя" id="profile__name" value="{{ $user->profile->name ?? '' }}">
	</div>
	<div class="form-item">
		<label for="profile__surname">Фамилия</label>
		<input name="surname" type="text" placeholder="Введите фамилию" id="profile__surname" value="{{ $user->profile->surname ?? '' }}">
	</div>
	<div class="form-item">
		<label for="profile__phone">Телефон</label>
		<input name="phone" type="text" placeholder="Введите номер телефона" id="profile__phone" value="{{ $user->profile->phone ?? '' }}">
	</div>
	<div class="form-item">
		<label for="profile__birthdate">Дата рождения</label>
		<input name="birthdate" type="date" placeholder="Введите Ваш день рождения" id="profile__birthdate" value="{{ $user->profile->birthdate ?? '' }}">
	</div>
	<div class="form-item">
		<input type="submit" value="Изменить профиль">
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
