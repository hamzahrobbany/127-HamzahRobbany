@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard</h1>
    <p>Selamat datang, {{ Auth::user()->name }}! Ini adalah dashboard Anda. Di sini Anda dapat melihat ringkasan aktivitas terbaru, menyelesaikan tugas, atau menjelajahi fitur lainnya.</p>

    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-header">Total Tasks</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalTasks }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card text-white bg-success">
                <div class="card-header">Completed Tasks</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $completedTasks }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Tasks</div>
                <div class="card-body">
                    @if($recentTasks->isEmpty())
                        <p class="text-muted">No recent tasks found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Due Date</th>
                                        <th>Assigned User</th>
                                        <th>Labels</th>
                                        <th>Comments</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentTasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>
                                                <span class="badge
                                                    @if($task->status == 'Not Started') bg-secondary
                                                    @elseif($task->status == 'In Progress') bg-warning
                                                    @elseif($task->status == 'Completed') bg-success
                                                    @endif">{{ $task->status }}</span>
                                            </td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->due_date }}</td>
                                            <td>{{ $task->user->name }}</td>
                                            <td>{{ $task->labels }}</td>
                                            <td>{{ $task->comments }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm" title="View"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                    @if($task->status != 'Completed')
                                                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to mark this task as completed?');">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-success btn-sm" title="Complete"><i class="fas fa-check"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
