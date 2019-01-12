@extends('errors.layout')

@section('code', '419')
@section('title', __('Закончился срок действия'))

@section('image')
<div style="background-image: url('/assets/images/blured-city-2.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Извините, ваща сессия закончилась. Обновите страницу и попробуйте снова.'))
