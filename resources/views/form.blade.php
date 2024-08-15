@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}" method="POST">
      @csrf
      @isset($task)
          @method('PUT')
      @endisset

      <div class="mb-4">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" 
          value="{{ $task->title ?? old('title') }}"
          @class(['border-red-500' => $errors->has('title')]) />

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="description">Description</label>
        <textarea rows="3" name="description" id="description"
          @class(['border-red-500' => $errors->has('description')]) >{{ $task->description ?? old('description') }}</textarea>

        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="long_description">Long Description</label>
        <textarea rows="6" name="long_description" id="long_description"
          @class(['border-red-500' => $errors->has('long_description')]) >{{ $task->long_description ?? old('long_description') }}</textarea>

        @error('long_description')
            <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center gap-2">
        <button type="submit" class="btn">
          @isset($task)
            Edit Task
          @else
            Add task
          @endisset
        </button>

        <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
      </div>
    </form>
@endsection