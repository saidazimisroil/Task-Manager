@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>

  @if ($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif

  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>

  <div>
    <a href="{{ route('tasks.edit', ['task' => $task]) }}" type="button">Edit Task</a>

    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
      @csrf
      @method('delete')

      <button type="submit">Delete</button>
    </form>
  </div>
@endsection