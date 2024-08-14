@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
      @csrf
      @method('put')
      <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}">
        @error('title')
            <span>{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="description">Description</label>
        <textarea rows="3" name="description" id="description">{{ $task->description }}</textarea>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="long_description">Long Description</label>
        <textarea rows="6" name="long_description" id="long_description">{{ $task->long_description }}</textarea>
        @error('long_description')
            <span>{{ $message }}</span>
        @enderror
      </div>

      <div><button type="submit">Save changes</button></div>
    </form>
@endsection