@extends('errors.layout')

@section('code', '403')
@section('title', __('Доступ запрещен'))

@section('image')
<div style="background-image: url('/assets/images/blured-city-2.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Извините, Вам запрещён доступ к данной странице.'))
