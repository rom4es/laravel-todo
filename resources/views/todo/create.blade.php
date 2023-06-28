@extends('layouts.main')

@section('title', 'Создать запись')

@section('content')

<a href="{{ route('todo.index') }}" type="button" class="btn btn-sm btn-outline-dark mb-3">< Вернуться к списку</a>
<h1 class="mb-3">Создать запись</h1>
<form method="post" action="{{ route('todo.store') }}" autocomplete="off">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-3">
        <label for="priority" class="form-label">Приоритет</label>
        <select class="form-select" name="priority" id="priority">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Добавить</button>
</form>

@endsection