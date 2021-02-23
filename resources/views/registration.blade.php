@extends('layouts.client_layout')

@section('style')
<link rel="stylesheet" href="/client/auth.css">
@endsection


@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="main-content">
    <div class="main-content__inner">
        <h1 class="auth-title">Регистрация</h1>
        <form class="auth-form" action="{{route('register')}}" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-group__input" id="client-email" name="email" type="email" placeholder="email" required>
            </div>
            <div class="form-group">
                <input class="form-group__input" id="client-name" name="name" type="text" placeholder="name" required>
            </div>
            <div class="form-group">
                <input class="form-group__input" id="client-password" name="password" type="password" placeholder="password" required>
            </div>
            <div class="form-group">
                <input class="form-group__input" id="client-confirm-password" name="confirm_password" type="password" placeholder="confirm password" required>
            </div>

            <button type="submit" class="btn btn-success" id="auth-button">Зарегистрироваться</button>

        </form>


    </div>
</div>
@endsection
