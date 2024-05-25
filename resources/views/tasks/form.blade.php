<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title ?? '') }}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $task->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        <option value="pending" {{ (old('status') == 'pending' || ($task->status ?? '') == 'pending') ? 'selected' : '' }}>Pending</option>
        <option value="in-progress" {{ (old('status') == 'in-progress' || ($task->status ?? '') == 'in-progress') ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ (old('status') == 'completed' || ($task->status ?? '') == 'completed') ? 'selected' : '' }}>Completed</option>
    </select>
</div>
<div class="form-group">
    <label for="priority">Priority</label>
    <select class="form-control" id="priority" name="priority">
        <option value="low" {{ (old('priority') == 'low' || ($task->priority ?? '') == 'low') ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ (old('priority') == 'medium' || ($task->priority ?? '') == 'medium') ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ (old('priority') == 'high' || ($task->priority ?? '') == 'high') ? 'selected' : '' }}>High</option>
    </select>
</div>
<div class="form-group">
    <label for="due_date">Due Date</label>
    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date ?? '') }}">
</div>
<div class="form-group">
    <label for="labels">Labels</label>
    <input type="text" class="form-control" id="labels" name="labels" value="{{ old('labels', $task->labels ?? '') }}">
</div>
<div class="form-group">
    <label for="user_id">Assign to User</label>
    <select class="form-control" id="user_id" name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ (old('user_id') == $user->id || ($task->user_id ?? '') == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="comments">Comments</label>
    <textarea class="form-control" id="comments" name="comments" rows="3">{{ old('comments', $task->comments ?? '') }}</textarea>
</div>
