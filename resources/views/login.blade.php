@extends('layouts.client_layout')
@section('style')
    <link rel="stylesheet" href="/client/auth.css">
@endsection

@section('content')
    @if ($errors->any())
        <ul>
        @foreach($errors as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
        </ul>
    @endif

    <div class="main-content">
        <div class="main-content__inner">
            <h1 class="auth-title">Войти</h1>
            <form class="auth-form" action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-group__input" id="client_email" name="email" type="email" placeholder="email">
                </div>
                <div class="form-group">
                    <input class="form-group__input" id="user_password" name="password" type="password" placeholder="password">
                </div>
                <button id="auth-button" type="submit" class="btn btn-success">Войти</button>
            </form>
        </div>
    </div>
@endsection
