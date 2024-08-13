@extends('layouts.app')

@section('title', 'List of Tasks')
    
@section('content')
  <div>
    @forelse ($tasks as $task)
      <li><a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a></li>
    @empty
      <h3>There is no any task</h3>
    @endforelse
  </div>
@endsection