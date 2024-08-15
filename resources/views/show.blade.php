@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">🔙 Go back to the task list</a>
  </div>
  <p class="text-slate-700 mb-4">{!! nl2br(e($task->description)) !!}</p>

  @if ($task->long_description)
    <p class="text-slate-700 mb-4">{!! nl2br(e($task->long_description)) !!}</p>
  @endif

  <p class="text-sm mb-4 text-slate-500">Created {{ $task->created_at->diffForHumans() }} - Updated {{ $task->updated_at->diffForHumans() }}</p>

  <p class="mb-4">
    Status: 
      @if ($task->completed)
        <span class="font-medium text-green-500">Completed</span>
      @else
        <span class="font-medium text-red-500">Not completed</span>
      @endif  
  </p>

  <div class="flex gap-2">
    <a href="{{ route('tasks.edit', ['task' => $task]) }}" type="button" class="btn">Edit Task</a>
  
    <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
      @csrf
      @method('PUT')
      
      <button type="submit" class="btn">
        Make as 
        @if ($task->completed)
          not completed
        @else 
          completed
        @endif
      </button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
      @csrf
      @method('delete')
      
      <button type="submit" class="btn">Delete</button>
    </form>
  </div>
@endsection