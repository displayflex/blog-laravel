@extends('errors.layout')

@section('code', '503')
@section('title', __('Сервис недоступен'))

@section('image')
<div style="background-image: url('/assets/images/blured-city-3.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Извините, мы делаем техническое обслуживание. Пожалуйста, зайдите в ближайшее время.'))
