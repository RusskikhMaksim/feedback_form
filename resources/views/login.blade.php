@extends('layouts.client_layout')
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

    <div class="login">
        <div class="container">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="client_email">Введите email</label>
                    <input id="client_email" name="email" type="email">
                </div>
                <div class="form-group">
                    <label for="user_password">Введите пароль</label>
                    <input id="user_password" name="password" type="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Войти</button>
                </div>
            </form>
        </div>
    </div>
@endsection
