@extends('errors.layout')

@section('code', '429')
@section('title', __('Слишком много запросов'))

@section('image')
<div style="background-image: url('/assets/images/blured-city-2.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Извините, вы делаете слишком много запросов на наш сервер.'))
