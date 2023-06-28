@extends('layouts.main')

@section('title', 'Редактировать запись')

@section('content')

<a href="{{ route('todo.index') }}" type="button" class="btn btn-sm btn-outline-dark mb-3">
    ← Вернуться к списку</a>

<h1 class="mb-3">Редактировать запись</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('todo.store') }}" autocomplete="off">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3">
        <label for="priority_id" class="form-label">Приоритет</label>
        <select class="form-select" name="priority_id" id="priority_id" required>
            @foreach($priorities as $priority)
            <option value="{{$priority->id}}">{{$priority->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Добавить</button>
</form>

@endsection