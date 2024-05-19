@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Task List
                    <form action="{{ route('tasks.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search tasks" value="{{ request()->query('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-body">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

                    @if ($tasks->isEmpty())
                        <p>No tasks found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Due Date</th>
                                        <th>Assigned To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->due_date }}</td>
                                            <td>{{ $task->user->name }} ({{ $task->user->email }})</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this task?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $tasks->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
