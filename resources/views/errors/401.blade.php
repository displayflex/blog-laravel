@extends('errors.layout')

@section('code', '401')
@section('title', __('Нет авторизации'))

@section('image')
<div style="background-image: url('/assets/images/blured-city-2.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Извините, Вы не авторизованы для доступа к данной странице.'))
