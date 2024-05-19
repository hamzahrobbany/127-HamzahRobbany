@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                Task Details
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" readonly>{{ $task->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ $task->status }}" readonly>
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="text" class="form-control" id="priority" name="priority" value="{{ $task->priority }}" readonly>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
