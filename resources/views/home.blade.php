@extends('layouts.client_layout')

@section('content')
    <div class="main-content">
        <div class="main-content__inner">
            <h1 class="welcome">Добро пожаловать!</h1>
            <a class="registration" href="{{route('getRegisterForm')}}">Регистрация</a>
            <a class="authorization" href="{{route('getLoginForm')}}">Авторизация</a>
        </div>
    </div>
@endsection
