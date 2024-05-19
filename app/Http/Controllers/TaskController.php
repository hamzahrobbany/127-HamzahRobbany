<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{

    public function index(Request $request)
{
    $query = Task::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhere('description', 'LIKE', "%{$search}%")
              ->orWhere('status', 'LIKE', "%{$search}%")
              ->orWhere('priority', 'LIKE', "%{$search}%")
              ->orWhere('due_date', 'LIKE', "%{$search}%")
              ->orWhereHas('user', function ($q) use ($search) {
                  $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
              });
        });
    }

    $tasks = $query->with('user')->paginate(10);

    return view('tasks.index', compact('tasks'));
}



    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        $task = Task::with('user')->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
