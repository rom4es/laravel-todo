@extends('layouts.main')

@section('title', 'Список дел')

@section('content')

<h1 class="mb-3">Список дел</h1>
<a href="{{ route('todo.create') }}" class="btn btn-primary mb-3">Добавить</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Статус</th>
            <th scope="col">Проиритет</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Текст Текст Текст</td>
            <td>Выполнено</td>
            <td>Высокий</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Текст Текст Текст</td>
            <td>Выполнено</td>
            <td>Высокий</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Текст Текст Текст</td>
            <td>Выполнено</td>
            <td>Высокий</td>
        </tr>
    </tbody>
</table>

@endsection