<div class="user-menu">
	@if (!Auth::check())
		<a class="button medium icon fa-sign-in" href="/user/sign-in">Войти</a>
		<br>
		<br>
		<a class="button alt icon fa-user-plus" href="/user/sign-up">Зарегистрироваться</a>
	@else
		<p class="user-menu__greeting">
			Hello, <a class="user-menu__profile-link" href="/user/profile">{{ Auth::user()->login }} <span class="icon fa-user"></span></a>
		</p>
		<a class="button alt icon fa-sign-out" href="/user/sign-out">Выйти</a>
	@endif
</div>
