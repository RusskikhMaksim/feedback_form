@extends('layouts.client_layout')
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

<div class="register">
    <div class="container">
        <h1>Регистрация</h1>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="client-email">email</label>
                <input id="client-email" name="email" type="email" required>
            </div>
            <div class="form-group">
                <label for="client-name">name</label>
                <input id="client-name" name="name" type="text" required>
            </div>
            <div class="form-group">
                <label for="client-password">password</label>
                <input id="client-password" name="password" type="password" required>
            </div>
            <div class="form-group">
                <label for="client-confirm-password">Confirm password</label>
                <input id="client-confirm-password" name="confirm_password" type="password" required>
            </div>

            <button type="submit" class="btn btn-success">Зарегистрироваться</button>

        </form>


    </div>
</div>
@endsection
