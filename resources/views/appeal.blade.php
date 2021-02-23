@extends('layouts.client_layout')

@section('style')
    <link rel="stylesheet" href="/client/appeal.css">
@endsection

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <a class="logout-link" href="{{route('logout')}}">Log Out</a>
    <div class="main-content">
        <div class="main-content__inner">
            <h1 class="appeal-title">Заявка</h1>
            <form class="appeal-form" action="{{route('appeal')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-group__label" for="subject">Тема</label>
                    <input class="form-group__input" id="subject" name="subject" type="text" required>
                </div>
                <div class="form-group">
                    <label class="form-group__label" for="message">Сообщение</label>
                    <textarea class="form-group__input-message" id="message" name="message" type="text" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-group__label" for="file">Прикрепить файл</label>
                    <input class="form-group__input" id="file" name="file" type="file">
                </div>
                <button id="appeal-button" type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>
@endsection

