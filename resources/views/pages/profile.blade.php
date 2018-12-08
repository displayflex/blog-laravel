<h2 class="icon fa-file-text-o">Профиль пользователя</h2>

<table class="user-profile">
	<tbody>
		<tr>
			<td class="user-profile__data user-profile__data--first">Логин</td>
			<td class="user-profile__data user-profile__data--second">{{ $user->login }}</td>
		</tr>
		<tr>
			<td class="user-profile__data user-profile__data--first">E-mail</td>
			<td class="user-profile__data user-profile__data--second">{{ $user->email }}</td>
		</tr>
		<tr>
			<td class="user-profile__data user-profile__data--first">Имя</td>
			<td class="user-profile__data user-profile__data--second">{{ $user->profile->name ?? '--' }}</td>
		</tr>
		<tr>
			<td class="user-profile__data user-profile__data--first">Фамилия</td>
			<td class="user-profile__data user-profile__data--second">{{ $user->profile->surname ?? '--' }}</td>
		</tr>
		<tr>
			<td class="user-profile__data user-profile__data--first">Телефон</td>
			<td class="user-profile__data user-profile__data--second">{{ $user->profile->phone ?? '--' }}</td>
		</tr>
		<tr>
			<td class="user-profile__data user-profile__data--first">Дата рождения</td>
			<td class="user-profile__data user-profile__data--second">{{ $user->profile->birthdate ?? '--' }}</td>
		</tr>
	</tbody>
</table>

@if ($user->id === Auth::user()->id)
	<a class="button alt icon fa-pencil-square-o" href="/user/{{ $user->id }}/edit">Редктировать профиль</a>
@endif
