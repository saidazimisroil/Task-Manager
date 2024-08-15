<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  return view('index', [
      'tasks' => Task::latest()->paginate(7)
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
  ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', [
      'task' => $task
  ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
  return view('show', [
      'task' => $task
  ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
  $task = Task::create(array_merge($request->validated(), ['completed' => false]));

  return redirect()->route('tasks.show', ['task' => $task])
    ->with('success', 'Task has been created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  $task->update($request->validated());

  return redirect()->route('tasks.show', ['task' => $task])
    ->with('success', 'Task has been updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();

  return redirect()->route('tasks.index')
    ->with('success','Task has been deleted successfully');
})->name('tasks.destroy');
