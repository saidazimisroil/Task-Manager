@extends('layouts.app')

@section('title', 'List of Tasks')
    
@section('content')
  <nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
  </nav>

  <div>
    @forelse ($tasks as $task)
      <li>
        <a href="{{ route('tasks.show', ['task' => $task]) }}"
          @class(['line-through' => $task->completed])>{{ $task->title }}</a>
      </li>
    @empty
      <h3>There is no any task</h3>
    @endforelse
  </div>

  @if ($tasks->count())
    <nav class="mt-4">
      {{ $tasks->links() }}
    </nav>
  @endif
@endsection