<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('task-lists.index');
    })->name('dashboard');

    Route::get('/task-lists', [TaskListController::class, 'index'])->name('task-lists.index');
    Route::post('/task-lists', [TaskListController::class, 'store'])->name('task-lists.store');
    Route::get('/task-lists/{taskList}', [TaskListController::class, 'show'])->name('task-lists.show');

    Route::post('/task-lists/{taskList}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/{task}/toggle-complete', [TaskController::class, 'toggleComplete'])->name('tasks.toggle-complete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
