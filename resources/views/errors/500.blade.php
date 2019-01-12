@extends('errors.layout')

@section('code', '500')
@section('title', __('Ошибка'))

@section('image')
<div style="background-image: url('/assets/images/blured-city-2.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Упс, что то пошло не так на наших серверах.'))
