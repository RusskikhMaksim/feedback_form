@extends('layouts.admin_layout')


@section('title', 'Рассмотренные заявки')

@section('appealsNavigation')
    <a href="{{route('getAdminPanel')}}">Активные заявки</a>
@endsection

@section('content')
    <script>

    </script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Рассмотренные заявки</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- /.row -->
            <!-- Main row  -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        ID
                                    </th>
                                    <th>
                                        Тема
                                    </th>
                                    <th>
                                        Сообщение
                                    </th>
                                    <th>
                                        Имя клиента
                                    </th>
                                    <th>
                                        Почта клиента
                                    </th>
                                    <th>
                                        Прикреплённый файл
                                    </th>
                                    <th>
                                        Время создания
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appeals as $appeal)
                                    <tr>
                                        <td>
                                            {{$appeal->appeal_id}}
                                        </td>
                                        <td>
                                            {{$appeal->subject}}
                                        </td>
                                        <td>
                                            {{$appeal->message}}
                                        </td>
                                        <td>
                                            {{$appeal->client_name}}
                                        </td>
                                        <td>
                                            {{$appeal->client_email}}
                                        </td>
                                        <td>
                                            {{$appeal->file}}
                                        </td>
                                        <td>
                                            {{$appeal->created_at}}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Просмотр
                                            </a>
                                            <form action="{{route('reviewAppeal', $appeal->appeal_id)}}" method="POST">
                                                @csrf
                                                <button id="is_reviewed{{$appeal->appeal_id}}" type="submit" class="btn btn-success btn-sm delete-btn" href="#">
                                                    Рассмотрено
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
