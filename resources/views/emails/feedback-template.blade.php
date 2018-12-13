<strong>Автор:</strong> {{ $data['name'] }}<br>
<strong>E-mail:</strong> {{ $data['email'] }}<br><br>
<strong>Сообщение:</strong><br>
{!! nl2br($data['message']) !!}
