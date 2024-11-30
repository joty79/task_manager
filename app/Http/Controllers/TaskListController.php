<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskListController extends Controller
{
    public function index()
    {
        $taskLists = auth()->user()->taskLists()->withCount(['tasks', 'tasks as completed_tasks_count' => function ($query) {
            $query->where('is_completed', true);
        }])->get();

        return view('task-lists.index', compact('taskLists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();
        
        TaskList::create($validated);

        return redirect()->route('task-lists.index')->with('success', 'Task list created successfully.');
    }

    public function show(TaskList $taskList)
    {
        Gate::authorize('view', $taskList);
        
        $tasks = $taskList->tasks()
            ->orderBy('deadline')
            ->orderBy('priority')
            ->get();

        return view('task-lists.show', compact('taskList', 'tasks'));
    }
} 