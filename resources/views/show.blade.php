@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>

  @if ($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif

  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>

  <p>
    Status: 
    <b>
      @if ($task->completed)
        Completed
      @else
        Not completed
      @endif  
    </b>
  </p>

  <div>
    <a href="{{ route('tasks.edit', ['task' => $task]) }}" type="button">Edit Task</a>

    <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
      @csrf
      @method('PUT')

      <button type="submit">
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

      <button type="submit">Delete</button>
    </form>
  </div>
@endsection