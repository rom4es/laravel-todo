@extends('layouts.main')

@section('title', 'Список задач')

@section('content')

<h1 class="mb-3">Список задач</h1>
<a href="{{ route('todo.create') }}" class="btn btn-primary mb-2">Добавить задачу</a>

<hr />
<form action="{{ route('todo.index') }}" method="get">
    <div class="row mb-3">
        <div class="col-3">
            <label for="priority_id" class="form-label">Приоритет</label>
            <select class="form-select" name="filter[priority_id]" id="priority_id">
                <option value="">Любой</option>
                @foreach($priorities as $priority)
                <option value="{{$priority->id}}" {{ $priority->id == request()->input('filter.priority_id') ? 'selected' : '' }}>{{$priority->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3 d-flex align-items-end">
            <div class="form-check">
                <input class="form-check-input" name="filter[onlyUnfulfilled]" type="checkbox" id="onlyUnfulfilled">
                <label class="form-check-label" for="onlyUnfulfilled">
                    Только невыполненные
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Применить фильтр</button>
</form>

<hr />

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Приоритет</th>
            <th scope="col">Статус</th>
            <th scope="col" style="width: 92px;"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($todos as $todo)
        <tr>
            <td>{{$todo->id}}</td>
            <td>{{$todo->name}}</td>
            <td>{{$todo->priority->name}}</td>
            <td>{{$todo->getDoneValue()}}</td>
            <td>
                <div class="table-actions">
                    <form action="{{ route('todo.changeStatus', ['todoId' => $todo->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-link">
                            @if($todo->done)
                            <i class="bi bi-x-circle-fill cursor-pointer me-2" title="Пометить как невыполненную"></i>
                            @else
                            <i class="bi bi-check-circle cursor-pointer me-2" title="Выполнить" style="color: green;"></i>
                            @endif
                        </button>
                    </form>

                    <a href="{{ route('todo.edit', ['todoId' => $todo->id]) }}">
                        <i class="bi bi-pencil-fill cursor-pointer me-2" title="Редактировать"></i>
                    </a>

                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#deleteTodoModal-{{$todo->id}}">
                        <i class="bi bi-trash-fill cursor-pointer" title="Удалить"></i>
                    </button>
                    <div class="modal fade" id="deleteTodoModal-{{$todo->id}}" tabindex="-1" aria-labelledby="deleteTodoModalLabel-{{$todo->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteTodoModalLabel-{{$todo->id}}">Вы действительно хотите удалить задачу #{{$todo->id}}?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                    <form action="{{ route('todo.destroy', ['todoId' => $todo->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection