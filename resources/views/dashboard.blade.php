@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard</h1>
<p>Selamat datang, {{ Auth::user()->name }}! Ini adalah dashboard Anda. Di sini Anda dapat melihat ringkasan aktivitas terbaru, menyelesaikan tugas, atau menjelajahi fitur lainnya.</p>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Tasks</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalTasks }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Pending Tasks</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pendingTasks }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Completed Tasks</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $completedTasks }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Tasks</div>
                <div class="card-body">
                    @if($recentTasks->isEmpty())
                        <p>No recent tasks found.</p>
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentTasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->due_date }}</td>
                                            <td>{{ $task->user->name }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
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
