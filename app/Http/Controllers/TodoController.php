<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Todo;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = QueryBuilder::for(Todo::class)
            ->allowedFilters(['priority_id'])
            ->get();
        $priorities = Priority::get();
        return view('todo.index', ['todos' => $todos, 'priorities' => $priorities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priority::get();
        return view('todo.create', ['priorities' => $priorities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'priority_id' => ['required'],
        ]);

        $newTodo = Todo::create([
            'name' => $request->name,
            'priority_id' => $request->priority_id,
            'done' => false
        ]);

        return redirect()->route('todo.index')->with('success', 'Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id', $id)->first();
        $priorities = Priority::get();
        return view('todo.edit', ['todo' => $todo, 'priorities' => $priorities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'priority_id' => ['required'],
        ]);

        Todo::where('id', $id)->update([
            'name' => $request->name,
            'priority_id' => $request->priority_id,
        ]);

        return redirect()->route('todo.index')->with('success', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::where('id', $id)->delete();
        return back()->with('success', 'Запись удалена');
    }

    public function changeStatus($id)
    {
        $todo = Todo::where('id', $id)->first();
        $todo->toggleDone()->save();

        return back()->with('success', 'Статус изменен');
    }
}
