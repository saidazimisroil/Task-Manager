@extends('layouts.app')

@section('title', 'List of Tasks')
    
@section('content')
  <a href="{{ route('tasks.create') }}">Edit Task</a>

  <div>
    @forelse ($tasks as $task)
      <li><a href="{{ route('tasks.show', ['task' => $task]) }}">{{ $task->title }}</a></li>
    @empty
      <h3>There is no any task</h3>
    @endforelse
  </div>

  @if ($tasks->count())
    <nav>
      {{ $tasks->links() }}
    </nav>
  @endif
@endsection