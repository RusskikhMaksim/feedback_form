@extends('layouts.client_layout')

@section('content')
    <h1>Start page</h1>
    <a href="{{route('getRegisterForm')}}">Регистрация</a>
    <a href="">Авторизация</a>
@endsection
