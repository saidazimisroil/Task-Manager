@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}" method="POST">
      @csrf
      @isset($task)
          @method('PUT')
      @endisset

      <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
        @error('title')
            <span>{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="description">Description</label>
        <textarea rows="3" name="description" id="description">{{ $task->description ?? old('description') }}</textarea>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="long_description">Long Description</label>
        <textarea rows="6" name="long_description" id="long_description">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
            <span>{{ $message }}</span>
        @enderror
      </div>

      <div>
        <button type="submit">
          @isset($task)
            Edit Task
          @else
            Add task
          @endisset
        </button>
      </div>
    </form>
@endsection