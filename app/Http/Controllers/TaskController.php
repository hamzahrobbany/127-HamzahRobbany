<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    // Method to display a list of tasks
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

        $tasks = $query->with('user')->paginate(5);

        return view('tasks.index', compact('tasks'));
    }

    // Method to show the form for creating a new task
    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    // Method to store a newly created task in the database
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'status' => 'required|in:Not Started,In Progress,Completed', // Validasi nilai status
        'priority' => 'required|in:Low,Medium,High', // Validasi nilai priority
        'due_date' => 'required|date',
        'user_id' => 'required|exists:users,id',
    ]);

    $task = Task::create($request->except('labels'));
    $task->labels = $request->input('labels');
    $task->comments = $request->input('comments');
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
}


    // Method to display a specific task
    public function show($id)
    {
        $task = Task::with('user')->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    // Method to show the form for editing a specific task
    public function edit(Task $task)
    {
        $users = User::all(); // Get all users for the dropdown in the edit form
        return view('tasks.edit', compact('task', 'users'));
    }

    // Method to update a specific task in the database
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'due_date' => 'required|date',
            'labels' => 'nullable|string',
            'comments' => 'nullable|string',
            'user_id' => 'required|exists:users,id'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Method to delete a specific task from the database
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
