<div class="user-menu">
	@if (!Auth::check())
		<a class="button medium icon fa-sign-in" href="{{ route('site.user.signIn') }}">Войти</a>
		<br>
		<br>
		<a class="button alt icon fa-user-plus" href="{{ route('site.user.signUp') }}">Зарегистрироваться</a>
	@else
		<p class="user-menu__greeting">
			Hello, <a class="user-menu__profile-link" href="{{ route('site.user.profile', Auth::user()->id) }}">{{ Auth::user()->login }} <span class="icon fa-user"></span></a>
		</p>
		<a class="button alt icon fa-sign-out" href="{{ route('site.user.signOut') }}">Выйти</a>
	@endif
</div>
