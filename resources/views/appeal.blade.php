@extends('layouts.client_layout')
@section('content')
    <h1>Заявка</h1>
    <form action="{{route('appeal')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="subject">Тема</label>
            <input id="subject" name="subject" type="text" required>
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <input id="message" name="message" type="text" required>
        </div>
        <div class="form-group">
            <label for="file">Прикрепить файл</label>
            <input id="file" name="file" type="file" required>
        </div>

        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection

