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
            <th scope="col">Приоритет</th>
            <th scope="col">Статус</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($todos as $todo)
        <tr>
            <td>{{$todo->id}}</td>
            <td>{{$todo->name}}</td>
            <td>{{$todo->priority->name}}</td>
            <td>{{$todo->getDoneValue()}}</td>
            <td style="width: 92px">
                @if($todo->done)
                <i class="bi bi-x-circle-fill cursor-pointer me-2"></i>
                @else
                <i class="bi bi-check-circle cursor-pointer me-2" style="color: green;"></i>
                @endif
                <a href="{{ route('todo.edit', ['todoId' => $todo->id]) }}">
                    <i class="bi bi-pencil-fill cursor-pointer me-2"></i>
                </a>
                <i class="bi bi-trash-fill cursor-pointer"></i>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection