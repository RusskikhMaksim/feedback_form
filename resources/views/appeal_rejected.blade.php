@extends('layouts.client_layout')
@section('style')
    <link rel="stylesheet" href="/client/appeal.css">
@endsection

@section('content')
<a class="logout-link" href="{{route('logout')}}">Log Out</a>
<div class="container-rejected">
    <h1 class="appeal-title-rejected">К сожалению, пока что мы не можем позволить вам оставить заявку.</h1>
    <p class="appeal-text-rejected">Извините, но оставлять заявки разрешено не чаще, чем раз в сутки. Сделайте это позже.</p>
</div>
@endsection
