@extends('layouts.client_layout')
@section('style')
    <link rel="stylesheet" href="/client/appeal.css">
@endsection

@section('content')
    <a class="logout-link" href="{{route('logout')}}">Log Out</a>
    <div class="container-success">
        <h1 class="appeal-title-success">Заявка успешно отправлена</h1>
    </div>
@endsection
