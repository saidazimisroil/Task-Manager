@extends('layouts.app')

@section('title', 'Add a new Task')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
      @csrf
      <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title')
            <span>{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="description">Description</label>
        <textarea rows="3" name="description" id="description">{{ old('description') }}</textarea>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="long_description">Long Description</label>
        <textarea rows="6" name="long_description" id="long_description">{{ old('long_description') }}</textarea>
        @error('long_description')
            <span>{{ $message }}</span>
        @enderror
      </div>

      <div><button type="submit">Add task</button></div>
    </form>
@endsection