@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Task Details
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" disabled>{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $task->status }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="text" class="form-control" id="priority" name="priority" value="{{ $task->priority }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="user_name">Assigned User Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $task->user->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="user_email">Assigned User Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" value="{{ $task->user->email }}" disabled>
                    </div>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
