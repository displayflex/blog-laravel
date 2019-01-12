@extends('errors.layout')

@section('code', '404')
@section('title', __('Страница не найдена'))

@section('image')
<div style="background-image: url('/assets/images/blured-city-4.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Извините, страница которую Вы ищите, не может быть найдена.'))
